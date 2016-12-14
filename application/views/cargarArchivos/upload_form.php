
<body>
<div class="container">
<div class="col-md-6">	
<?=heading('Suba un archivo pdf', 2);?>
<?=$error;?>

<?=form_open_multipart('Main_controller/do_upload');?>
<input type="file" name="userfile" size="20" />
<br />
<input type="submit" value="Subir Archivo" />
<?=form_close()?>
<h5><?=br(1).anchor('Main_controller/info', 'Listado de archivos para descargar'); ?></h5>
<h6><?=anchor('Main_controller/Perfil', 'Volver al menu principal'); ?></h6>
</div>
 <div class="col-md-offset-6">
<h1>Mis archivos</h1>
          
  
    
      

           <?php if($impresiones==NULL)
           {
              echo "<h3>No hay archivos disponible<h3>";
           }else{ ?><table class="table table-hover">
    <thead>
      <tr>
       
        <th>Nombre del Archivo</th>
        <th>Numero de Paginas</th>
        <th>Credito Disponible</th>
        <th>Eliminar</th>
      </tr>
    </thead>
    <tbody>
    <?php

      foreach ($impresiones as $impresion) { ?>
      <tr>
      <td><?php echo anchor('Main_controller/downloads'.$impresion->archivo, $impresion->archivo); ?></td>
      
      <td><?= $impresion->noPaginas;?></td>
      <td><?= $impresion->credito;?></td>
      <td>
      <form action="elimarDocumento" method="post">
      <?php $idimpresion=array('name'=>'idimpresion','type'=>'hidden','value'=>$impresion->idimpresion);?>
      <?=form_input($idimpresion) ?>
     
    <button type="submit">Eliminar</button></form></td>
      
     
       </tr>
       <?php } }?>
           </tbody>
  </table>
  </div>
</div>
</body>
</html>
