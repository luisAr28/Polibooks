<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Main_controller extends CI_Controller

	{
        var $sel;
        
        public function __construct(){
			parent::__construct();
            $this->load->helper('url_helper');
          
            $this->load->library('form_validation');
            $this->load->helper(array('download', 'file', 'url', 'html', 'form'));
            $this->folder = 'ArchivosImpresiones/';
		}
		
		public function index()
		{
			
			$this->load->model('Main');
            $mun = $this->Main->obtenerM();
            $edo = $this->Main->obtenerE();
            $sel['municipio'] = $mun;
            $sel['estado'] = $edo;
            
			$t['page_title']="Prueba";
			
			
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
                $data['impresiones']=$this->Main->mostrarArchivos();
                $this->load->view('Perfil3',$data);
                $this->load->view('footer');


             }
            
            if($t->Tipo==4)
            {
                $this->load->view('header',$t);
                $data['alumnos']=$this->Main->mostrarAlumnos();
                $this->load->view('Perfil4',$data);
                $this->load->view('footer');
             }
			
            
        }        
      /*  public function get_Libro()
        {
           // echo "<alert>Si</alert>";
            $this->load->model('Alumno');
            $keyword = $this->input->post('term');
 
            $data['response'] = 'false'; //Set default response

            $query = $this->Alumno->get_Lib($q);
            
            if($query->num_rows() > 0)
            {
               $data['response'] = 'true'; //Set response
               $data['message'] = array(); //Create array
               foreach($query->result() as $row)
               {
                  $data['message'][] = array('label'=> $row->nombre, 'value'=> $row->idAutor); //Add a row to array
               }
            }
            echo json_encode($data);
            

            if (isset($_GET['term']))
            {
              $q = strtolower($_GET['term']);
              
            }
        }*/
        
        public function get_Libro() 
        {
            if (!isset($_GET['term']))
                {
                    exit;
                }

            $this->load->model('Alumno');
            $q = strtolower($_GET['term']);
            $this->Alumno->get_Lib($q);
        }
        
        public function buscaLibro($info)
        {
                    
            $this->load->model('Alumno');/*modelo*/
			
			$t['page_title']="Libros";
			
			$usuarios = $this->Alumno->obtenerLibros($info);
			
			$data['usuarios']=$usuarios;
    
            $this->load->view('header',$t);
			$this->load->view('InfoLib',$data);
            $this->load->view('footer');
        }
        
        public function solicitaLib($info)
        {
            $this->load->model('Alumno');
            
            $this->db->select('Cantidad');
            $this->db->from('libro');
            $this->db->where('idLibro='.$info);
            $tipo = $this->db->get();
            
            foreach($tipo->result() as $t)                    
             if($t->Cantidad>0) 
             {
                 $id = $this->session->idUsuario;
                 $this->db->select('count(*) as numero');
                 $this->db->from('prestamolibro');
                 $this->db->where('idAlumno="'.$id.'"');
                 $num = $this->db->get();
                 
                 foreach($num->result() as $n)                    
                    if(($n->numero)<3) 
                    {
                        $this->Alumno->presLibros($info,$id);
                        
                    }
                    else
                    {
                        echo "<script>"."alert('No puedes solicitar mas de 3 prestamos');"."</script>";
                 
                        $usuarios = $this->Alumno->obtenerLibrosID($info);

                        $data['usuarios']=$usuarios;

                        $this->load->view('header',$t);
                        $this->load->view('InfoLib',$data);
                        $this->load->view('footer');
                    }
                 
               
                
                // redirect('Main_controller/perfil');
             }
             else
             {
                echo "<script>"."alert('Ejemplares no disponibles');"."</script>";
                 
                $usuarios = $this->Alumno->obtenerLibrosID($info);
			
                $data['usuarios']=$usuarios;

                $this->load->view('header',$t);
                $this->load->view('InfoLib',$data);
                $this->load->view('footer');
             }
         
        //    $this->load->view('header');
          //  $this->load->view('VerPrestamos',$data);
          //  $this->load->view('footer');
        }
	

//********obtener numero de paginas pdf
function numeroPaginasPdf($archivoPDF)
{
    $stream = fopen($archivoPDF, "r");
    $content = fread ($stream, filesize($archivoPDF));
 
    if(!$stream || !$content)
        return 0;
 
    $count = 0;
 
    $regex  = "/\/Count\s+(\d+)/";
    $regex2 = "/\/Page\W*(\d+)/";
    $regex3 = "/\/N\s+(\d+)/";
 
    if(preg_match_all($regex, $content, $matches))
        $count = max($matches);
 
    return $count[0];
}
//**********Formulario +++++++++++
public function formCarga()
    {$this->load->model('Main');
        $this->load->view('header');
        $id = $this->session->idUsuario;
        $data['impresiones']=$this->Main->mostrarArchivos2($id);
        $this->load->view('cargarArchivos/upload_form', array('error' => ' ','impresiones'=>$data['impresiones'] )); 
    }

//************ CARGA DE ARCHIVOS  ****************  
public function do_upload() 
    {      
        $config['upload_path'] = $this->folder;
        //$config['allowed_types'] = 'zip|rar|pdf|docx|txt|jpeg|png|jpg';
        $config['allowed_types']='pdf';
        $config['remove_spaces']=TRUE;
        $config['max_size'] = '2048';

        $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload())
        {
            $this->load->model('Main');
             $id = $this->session->idUsuario;
            
            $data['impresiones']=$this->Main->mostrarArchivos2($id);
            $error = array('error' => 'Este archivo no es un pdf','impresiones'=>$data['impresiones']);
           $this->load->view('header');
            $this->load->view('cargarArchivos/upload_form', $error);
        }
        else
        {
            $this->load->model('Main');
            $data = array('upload_data' => $this->upload->data());
            
            $num=$this->numeroPaginasPdf($data['upload_data']['full_path']);
            $nomfile=$data['upload_data']['orig_name'];
            $id = $this->session->idUsuario;
            //insert a la base de datos con el nombre del archivo , idalumno y el estado 
            $this->Main->subirArchivo($nomfile,$id,$num);
            $this->load->view('header');
           $this->load->view('cargarArchivos/upload_success', $data);

        }

   } 
//************ SE OBTIENEN LOS NOMBRES DE LOS ARCHIVOS ****************

public function info(){
    
    $files = get_filenames($this->folder, FALSE);
    
    if($files){
        $data['files']=$files;
             
        }else{
            $data['files']=NULL;
        }
    $this->load->view('header');
   $this->load->view('cargarArchivos/filenames',$data);    
 
}
//************ DESCARGA DE ARCHIVOS ***********************

        public function downloads($name){

       $data = file_get_contents($this->folder.$name);  
       force_download($name,$data); 
      
    }
    function recibirDato()
    {
        $this->load->model('Main');
        $data= array(
            'credito'=>$this->input->post('credito'),
            'id'=>$this->input->post('id'),
            'email'=>$this->input->post('email')
            );
        $data['creditof']=$this->getCredito($data);
        $this->Main->actualizaCredito($data);
        $data['creditof']=$this->getCredito($data);
        $data['nomb']=$this->getNombre($data);
         $this->sendMailGmail($data);
        $this->perfil();


    }
    function imprimeDocumento()
    {
        $this->load->model('Main');
          $data= array(
            'idimpresion'=>$this->input->post('idimpresion'),
            'noPaginas'=>$this->input->post('noPaginas'),
            'credito'=>$this->input->post('credito'),
            'id'=>$this->input->post('id')

            );
        $this->Main->imprime($data);
        $data['creditof']=$this->getCredito($data);
        $data['nomb']=$this->getNombre($data);
        $data['email']=$this->getEmail($data);
         $this->sendMailGmail($data);
        $this->perfil();


    }
    function elimarDocumento()
    {
        $this->load->model('Main');
        $data=array('idimpresion'=>$this->input->post('idimpresion'));
        $this->Main->eliminaDocumento($data);
        $this->formCarga();
        
    }
    function getCredito($data)
    {
        $query=$this->Main->credito($data);
        foreach ($query->result() as $row)
            {
            $val=$row->credito;
       
            }
        return $val;
    }
    function getNombre($data)
    {
        $query=$this->Main->getNombre($data);
        foreach ($query->result() as $row)
            {
            $val=$row->nombre;
       
            }
        return $val;
    }
     function getEmail($data)
    {
        $query=$this->Main->getEmail($data);
        foreach ($query->result() as $row)
            {
            $val=$row->email;
       
            }
        return $val;
    }


    
    public function sendMailGmail($data)
    {
        //cargamos la libreria email de ci
        $this->load->library("email");
 
        //configuracion para gmail
        $configGmail = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'polibooksipn@gmail.com',
            'smtp_pass' => 'polibooks123',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        );   
       
        //cargamos la configuración para enviar con gmail
        $this->email->initialize($configGmail);
 
        $this->email->from('Polibooks');
        $this->email->to($data['email']);
        $this->email->subject('Hol@'.$data['nomb']);
        $this->email->message('<h1>Este correo se envia para confirmar tu credito actual <h2>Credito Disponible:'.$data['creditof'].'<h3>Boleta:'.$data['id'].'<h4>Buen dia');
        $this->email->send();
        //con esto podemos ver el resultado
        //var_dump($this->email->print_debugger());
    }

    //Obtener el número de computadora para prestamo
    function obtenerCompuPrestamo(){

          $data = array(
            'alumno'=>$this->session->idUsuario,
            'computadora'=>$this->input->post('compu')
            );
          $this->load->model('Main');
          $this->Main->prestamoComputadora($data);
          $this->perfil();
        }

        function obtenerCompuPrestamo2(){

          $data = array(
            'computadora'=>$this->input->post('compu'),
            'alumno'=>$this->input->post('boleta')
            );
          $this->load->model('Main');
          $this->Main->prestamoComputadora($data);
          $this->verDisponibles();
        }

    public function verCompus(){
        $this->load->model('Main');
        $compus=$this->Main->obtenerDisponibles();
        $data['disponibles']=$compus;
        $this->load->view('header');
        $this->load->view('/Compus/compusAlumnos',$data);
    }

    public function verDisponibles(){
        $this->load->model('Main');
        $compus=$this->Main->obtenerDisponibles();
        $data['disponibles']=$compus;
        $this->load->view('header');
        $this->load->view('/Compus/adminCompusDisponibles',$data);
    }

    public function verOcupadas(){
        $this->load->model('Main');
        $compus=$this->Main->obtenerOcupadas();
        $data['disponibles']=$compus;
        $this->load->view('header');
        $this->load->view('/Compus/adminCompusOcupadas',$data);
    }

    function liberarCompuPrestamo(){

          $data = array(
            'computadora'=>$this->input->post('compu')
            );
          $this->load->model('Main');
          $this->Main->liberarComputadora($data);
        }

        function confirmarCompuPrestamo(){

          $data = array(
            'computadora'=>$this->input->post('compu')
            );
          $this->load->model('Main');
          $this->Main->confirmarComputadora($data);
        }
}

?>