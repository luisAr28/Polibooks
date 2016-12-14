
<body>
 <script> $(function(){$('#datos').dataTable();})</script>
 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="perfil">Home</a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                 <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      Biblioteca <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a href="#">Acción #1</a></li>
                      <li><a href="#">Acción #2</a></li>
                      <li><a href="#">Acción #3</a></li>
                      <li class="divider"></li>
                      <li><a href="#">Acción #4</a></li>
                      <li class="divider"></li>
                      <li><a href="#">Acción #5</a></li>
                    </ul>
                  </li>
                 <!-- <li>
                      <a href="buscaDis">Biblioteca</a>
                  </li>-->
              </ul>
                <div class="navbar-form navbar-left" role="search">
                  <div class="form-group">
                    <input type="text" id="libro" class="form-control" placeholder="Buscar libro" name="lib">
                  </div>
                  <button class="btn btn-default" onclick="lib()">Enviar</button>
                </div>
              <ul class="nav navbar-nav">
                  <li>
                      <a href="formCarga">Impresiones</a>
                  </li>
                  <li>
                      <a href="<?php echo base_url(); ?>Main_controller/cerrar">Cerrar Sesión</a>
                  </li>
              </ul>
          </div>
          <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
</nav>
<div id="principal">
<div class="container">
<div class="col-md-6">	
<?=heading('Suba un archivo pdf', 2);?>
<?=$error;?>

<?=form_open_multipart('Main_controller/do_upload');?>
<input type="file" name="userfile" size="20" />
<br />
<button type="submit" class="btn btn-primary btn_form" ><span class="glyphicon glyphicon-file"></span> Subir Archivo</button>
<?=form_close()?>
</div>
 <div class="col-md-offset-6">
<h1>Mis archivos</h1>
          
  
    
      

           <?php if($impresiones==NULL)
           {
              echo "<h3>No hay archivos disponible<h3>";
           }else{ ?><table class="table table-hover" id="datos">
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
     
    <button type="submit" class="btn btn-danger btn_form"><span class="glyphicon glyphicon-remove"></span> Eliminar</button></form></td>
      
     
       </tr>
       <?php } }?>
           </tbody>
  </table>
  </div>
</div>
</div>
</body>
</html>
