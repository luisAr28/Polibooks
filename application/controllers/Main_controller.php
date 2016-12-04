<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Main_controller extends CI_Controller

	{
        var $sel;
        
        public function __construct(){
			parent::__construct();
            $this->load->helper('url_helper');
          
            $this->load->library('form_validation');
            
		}
		
		public function index()
		{
			/*$this->load->model('Profesor');*/
			$this->load->model('Main');
            $mun = $this->Main->obtenerM();
            $edo = $this->Main->obtenerE();
            $sel['municipio'] = $mun;
            $sel['estado'] = $edo;
            
			$t['page_title']="Prueba";
			
			/*$usuarios = $this->Profesor->getData();
			
			$data['usuarios']=$usuarios;*/
			
            $this->load->view('header',$t);
			$this->load->view('Main_view',$sel);
            $this->load->view('footer');
		}
        
        public function Registro()
            {
                
                $this->load->model('Main');
                $mun = $this->Main->obtenerM();
                $edo = $this->Main->obtenerE();
                $sel['municipio'] = $mun;
                $sel['estado'] = $edo;
                
                $t['page_title']="Registro";
             
                $this->load->helper('form');
                $this->load->library('form_validation');
                $this->form_validation->set_rules('us', 'Usuario', 'required');
                $this->form_validation->set_rules('nombre', 'Nombre', 'required');
                $this->form_validation->set_rules('appaterno', 'ApPaterno', 'required');
                $this->form_validation->set_rules('apmaterno', 'ApMaterno', 'required');
                $this->form_validation->set_rules('calle', 'Calle', 'required');
                $this->form_validation->set_rules('pass', 'Password', 'required');
                if ($this->form_validation->run() === FALSE)
                {
                   
                    $this->load->view('header',$t);
                    $this->load->view('Main_view',$sel);
                    $this->load->view('footer');
                }
                else
                {

                    $us = $this->Main->reg();
                    if (empty($us))
                        {
                            echo '<script language="javascript">alert("Registro correcto");</script>'; 
                      
                            $this->Main->agregaAlumno();
                            redirect('Main_controller/index');                            
                        }
                    else{
                            echo '<script language="javascript">alert("Usuario ya registrado");</script>'; 
                      
                            redirect('Main_controller/index');
                        
                        }
                    
                    
                }    
            }
        
        public function iniciar_sesion()
          {
            $t['page_title']="Prueba";
            $this->load->model('Main');
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('usuario', 'Usuario', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
              
            $mun = $this->Main->obtenerM();
            $edo = $this->Main->obtenerE();
            $sel['municipio'] = $mun;
            $sel['estado'] = $edo;
              
            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('header',$t);
                $this->load->view('Main_view',$sel);
                $this->load->view('footer');
            }
            else
            {
                $us = $this->Main->iniciar_sesion();
                if (empty($us)){
                redirect('Main_view',$sel);
                }
                else{
                      $datos = array( 'idUsuario'  => $us->idUsuario);
                      $this->session->set_userdata($datos);
                      redirect('Main_controller/perfil');
                    }
            }
          }
        
        public function cerrar()
        {
            $this->load->model('Main');
            $mun = $this->Main->obtenerM();
            $edo = $this->Main->obtenerE();
            $sel['municipio'] = $mun;
            $sel['estado'] = $edo;
            
            $t['page_title']="Prueba";
            $datos = array( 'idUsuario'  => '');
            $this->session->unset_userdata($datos);
            $this->load->view('header',$t);
            $this->load->view('Main_view',$sel);
            $this->load->view('footer');
        }
        
        public function perfil()
		{
			$this->load->model('Main');/*modelo*/
			
			$t['page_title']="Perfil";
			
             $id = $this->session->idUsuario;
			$this->db->select('Tipo');
            $this->db->from('usuarios');
            $this->db->where('idUsuario="'.$id.'"');
            $tipo = $this->db->get();
            
            foreach($tipo->result() as $t)                    
             if($t->Tipo==1) 
             {
                $usuarios = $this->Main->obtenerDatos($this->session->idUsuario);
			   
            
			    $data['usuarios']=$usuarios;
                 
                
                $this->load->view('header',$t);
			    $this->load->view('Perfil1',$data);
                $this->load->view('footer');
             }
            
            if($t->Tipo==2)
            {
                $usuarios = $this->Main->obtenerDat($this->session->idUsuario);
                
			    $data['usuarios']=$usuarios;
                
                $this->load->view('header',$t);
                $this->load->view('Perfil2',$data);
                $this->load->view('footer');
             }
            
            if($t->Tipo==3)
            {
                $this->load->view('header',$t);
                $this->load->view('Perfil3');
                $this->load->view('footer');
             }
            
            if($t->Tipo==4)
            {
                $this->load->view('header',$t);
                $this->load->view('Perfil4');
                $this->load->view('footer');
             }
			
            
		}
        
        public function buscaTuto()
		{
			$this->load->model('Profesor');/*modelo*/
			
			$t['page_title']="Tutorados";
			
			$usuarios = $this->Profesor->obtenerTutorados($this->session->idProfesor);
			
			$data['usuarios']=$usuarios;
			
            $this->load->view('header',$t);
			$this->load->view('Profesor_tutorados',$data);
            $this->load->view('footer');
		}
        
        public function calificar()
		{
			$this->load->model('Profesor');/*modelo*/
			
			$t['page_title']="Calificar";
			
			$usuarios = $this->Profesor->calf($this->session->idProfesor);
			
			$data['usuarios']=$usuarios;
			
            $this->load->view('header',$t);
			$this->load->view('Calificar',$data);
            $this->load->view('footer');
		}
	}
?>