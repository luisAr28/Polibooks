<?php
	class Main extends CI_Model
		{
			function Main_model()
			{
				parent::__construct();
			}
        
             public function iniciar_sesion()
              {
                   $usuario = $this->input->post('usuario');
                   $password = $this->input->post('password');
                   $sql = "SELECT * FROM usuarios WHERE idUsuario = ? AND contrasena = ? AND Estado!=0 LIMIT 1";
                   $query = $this->db->query($sql, array($usuario,$password));
                   return $query->row();
              }
			 public function reg()
              {
                   $usuario = $this->input->post('us');
                 
                   $sql = "SELECT idUsuario FROM usuarios WHERE idUsuario = ?";
                   $query = $this->db->query($sql, array($usuario));
                    
              }
            
                public function agregaAlumno()
                {
                    $usuario = $this->input->post('us');
                   $nom = $this->input->post('nombre');
                   $ap = $this->input->post('appaterno');
                   $am = $this->input->post('apmaterno');
                   $calle = $this->input->post('calle');
                   $mun = $this->input->post('municipio');
                   $edo = $this->input->post('estado');
                   $password = $this->input->post('pass');
                   $email = $this->input->post('email');
                    
                    
                    $this->db->set('idUsuario',$usuario);
                    $this->db->set('contrasena',$password);
                    $this->db->set('Estado',0);
                    $this->db->set('Tipo',1);
                    $this->db->insert('usuarios');
                    
                   /// $in = "insert into usuarios values(?,?,0,1)";
                //    $this->db->query($sql, array($usuario,$password));
                  //  $al = "insert into alumno values(?,?,?,?,?,?,?,0)";
                    //$re = $this->db->query($sql, array($usuario,$nom,$ap,$am,$calle,$mun,$edo));    
                    $this->db->set('idAlumno',$usuario);
                    $this->db->set('Nombre',$nom);
                    $this->db->set('ApPaterno',$ap);
                    $this->db->set('ApMaterno',$am);
                    $this->db->set('Calle',$calle);
                    $this->db->set('Municipio',$municipio);
                    $this->db->set('Edo',$edo);
                    $this->db->set('Credito',0);
                    $this->db->set('email',$email);
                    
                    $this->db->insert('alumno');
                }
        
            function obtenerDatos($idUsuario)
            {
                $sql = "select u.idUsuario,a.Nombre,a.ApPaterno,a.ApMaterno,a.Credito from usuarios u, alumno a where u.idUsuario=a.idAlumno 
                and u.idUsuario=? ";
                $info = $this->db->query($sql,array($idUsuario));
                return $info->result();
            }
            
            function obtenerDat($idUsuario)
            {
                $sql = "select u.idUsuario,p.Nombre,p.ApPaterno,p.ApMaterno from usuarios u, personal p where u.idUsuario=p.idPersonal 
                and u.idUsuario=? ";
                $info = $this->db->query($sql,array($idUsuario));
                return $info->result();
            }
            
            function obtenerM()
            {
                $sql = "select idMunicipio,nombre as Municipio from Municipio order by Municipio";
                $info = $this->db->query($sql);
                return $info->result();
            }
            
            function obtenerE()
            {
               $sql = "select idEstado,nombre as Estado from Estado order by Estado";
                $info = $this->db->query($sql);
                return $info->result();
            }
            function subirArchivo($nomfile,$id,$num)
            {
            
            $this->db->insert('impresiones',array('idimpresion'=>'','archivo'=>$nomfile,'estado'=>'1','idAlumno'=>$id,'noPaginas'=>$num));
              

            }
            function mostrarArchivos()
            {
              $query="select alumno.idAlumno,archivo,noPaginas,credito,idimpresion from impresiones,alumno where alumno.idAlumno=impresiones.idAlumno order by 1";
              $row=$this->db->query($query);
                if($row->num_rows()>0)
                  return $row->result();
                else 
                  return false;
            }
              function mostrarArchivos2($id)
            {
              
              $query="select alumno.idAlumno,archivo,noPaginas,credito,idimpresion from impresiones,alumno where alumno.idAlumno=impresiones.idAlumno and alumno.idAlumno=".$id;
              $row=$this->db->query($query);
                if($row->num_rows()>0)
                  return $row->result();
                else 
                  return false;
            }
            function mostrarAlumnos()
            {
              $query="select idAlumno,nombre,apPaterno,apMaterno,credito,email from alumno order by 3";
              $row=$this->db->query($query);
                if($row->num_rows()>0)
                  return $row->result();
                else 
                  return false;

            }
            function actualizaCredito($data)
            {
              $data2 = array(
                'credito'=>$data['creditof']+$data['credito']
                );
              $this->db->where('idAlumno', $data['id']);
              $this->db->update('alumno', $data2);

            }
            function credito($data)
            {
              $this->db->select('credito');
              $this->db->from('alumno');
              $this->db->where('idalumno',$data['id']);

              $query = $this->db->get();
              if($query->num_rows() > 0 )
              {
              return $query;
              }

            }
            function getNombre($data)
            {
              $this->db->select('nombre');
              $this->db->from('alumno');
              $this->db->where('idalumno',$data['id']);

              $query = $this->db->get();
              if($query->num_rows() > 0 )
              {
              return $query;
              }

            }
            function getEmail($data)
            {
              $this->db->select('email');
              $this->db->from('alumno');
              $this->db->where('idalumno',$data['id']);

              $query = $this->db->get();
              if($query->num_rows() > 0 )
              {
              return $query;
              }

            }
            function imprime($data)
            {
             $creditof=$data['credito']-$data['noPaginas'];
             $data2 = array(
                'credito'=>$creditof
                );
              $this->db->where('idAlumno', $data['id']);
              $this->db->update('alumno', $data2);

              $this->eliminaDocumento($data);
              



            }
          function eliminaDocumento($data)
          {
            $this->db->where('idimpresion', $data['idimpresion']);
                $this->db->delete('impresiones');
            
        }
  }

?>
