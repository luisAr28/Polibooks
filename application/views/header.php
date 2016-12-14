<!DOCTYPE html>
<html class="full">
  <head>
    <meta charset="utf-8">

    <title>PoliBookS</title>


<!-- Link de bootstrap -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Hoja para los estilos que estaran en todas las paginas del projecto -->
<link rel="stylesheet" href="<?php echo base_url(); ?>js/jquery/jquery-ui.css" type="text/css" charset="utf-8">
 
 <link rel="stylesheet" href="<?php echo base_url(); ?>css/perfil.css" type="text/css" charset="utf-8">
 <link rel="stylesheet" href="<?php echo base_url(); ?>css/estiloIndex.css" type="text/css" charset="utf-8">
 <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery/jquery-ui.js"></script>
<!--<script type="text/javascript" src="../js/m.js"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
      <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>-->
 <script>
      
     $(function(){
  $("#libro").autocomplete({
    source: '<?php echo base_url(); ?>/Main_controller/get_Libro' 
      // path to the get_birds method
     //source: "get_birds"
  });
});  
     
     /*
     $(function(){
      $("#libro").autocomplete({
        source: 'get_Libro' 
          // path to the get_birds method
         //source: "get_birds"
      });
    });*/
      </script>
      
 
 
  </head>
