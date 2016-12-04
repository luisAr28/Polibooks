<?
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
                    $this->db->insert('alumno');
                }
			/*function getData()
			{
				$usuarios=$this->db->get('profesor');
				
				return $usuarios->result();
			}*/
        
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
        
          /*  function obtenerTutorados($idProfesor)
            {
                $sql = "SELECT a.Nombre,a.ApPaterno,a.ApMaterno,e.Escuela from alumno a, escuela e,
                profesor p where a.idProfesor=p.idProfesor and a.idEscuela=e.idEscuela and p.idProfesor=? and a.Estado='1'";
                $tutorado = $this->db->query($sql,array($idProfesor));
                return $tutorado->result();
            }
        
            function calf($idProfesor)
            {
                $sql = "SELECT a.Nombre,a.ApPaterno,a.ApMaterno,s.calificacion from alumno a, alumnoasignatura s, profesorasignatura c  where a.idAlumno=s.idAlumno and s.idAsignatura=c.idAsignatura and c.idProfesor=?";
                $tutorado = $this->db->query($sql,array($idProfesor));
                return $tutorado->result();
            }
			*/
		}

?>