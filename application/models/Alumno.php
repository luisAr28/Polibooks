<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
	class Alumno extends CI_Model
		{
			function Alumno_model()
			{
				parent::__construct();
			}
        
            function get_Lib($q)
            {
                $this->db->select('*');
                $this->db->like('Nombre', $q,'both');
                $query = $this->db->get('libro');
                
                if($query->num_rows() > 0)
                {
                  foreach ($query->result_array() as $row)
                  {
                        $new_row['label']=htmlentities(stripslashes($row['Nombre']));
                        $new_row['value']=htmlentities(stripslashes($row['Nombre']));
                        $row_set[] = $new_row; //build an array
                    //  $data[] = $row;
                  }
                  echo json_encode($row_set); //format the array into json data
                }
            }
            
            function obtenerLibros($info)
            {
                $info = str_replace("_"," ",$info);
                $sql = "select l.idLibro,l.Nombre,concat(a.Nombre,concat(' ',a.ApPaterno)) as Autor, l.Editorial,l.Cantidad from libro l, autor a where l.idAutor=a.idAutor and l.Nombre=?";
                $data = $this->db->query($sql,array($info));
              //  echo $sql;
                return $data->result();
            }
            
            function obtenerLibrosID($info)
            {
                $info = str_replace("_"," ",$info);
                $sql = "select l.idLibro,l.Nombre,concat(a.Nombre,concat(' ',a.ApPaterno)) as Autor, l.Editorial,l.Cantidad from libro l, autor a where l.idAutor=a.idAutor and l.idLibro=?";
                $data = $this->db->query($sql,array($info));
              //  echo $sql;
                return $data->result();
            }
            
            function presLibros($info,$id)
            {
                $fecha = "select now() as fecha";
                $fechP = $this->db->query($fecha);
                                
                $fecha = "SELECT DATE_ADD(NOW(), INTERVAL 7 DAY) as fecha";
                $fechE = $this->db->query($fecha);
                                
                foreach($fechP->result() as $f)
                    {
                        $f1=$f->fecha;
                    }
             
                    
                foreach($fechE->result() as $f)
                    {
                        $f2=$f->fecha;
                    }
              
                
                $sql="insert into prestamolibro values(?,?,?,?,0,0)";
                
                $this->db->query($sql,array($id,$info,$f1,$f2));
            }
		}
?>