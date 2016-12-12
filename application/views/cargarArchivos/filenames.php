<?php
 if($files){
 	echo heading('Archivo(s) disponible(s) para descargar', 3);

	  foreach($files as $file){
         
		  echo anchor('Main_controller/downloads/'.$file, $file).br(1); 
                   
	  }
echo br(1).anchor('Main_controller/formCarga', 'Subir otro archivo'); 	
 }else{

echo heading('No hay archivos para descargar', 3).anchor('Main_controller/formCarga', 'Subir un Archivo');

 } 
	