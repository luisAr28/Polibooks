
	<body>

	    <nav class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">
      <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Home</a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                  <li>
                      <a href="buscaDis">Libros</a>
                  </li>
                  <li>
                      <a href="buscaTuto">Computadoras</a>
                  </li>
                  <li>
                      <a href="cerrar">Cerrar Sesión</a>
                  </li>
                
              </ul>
          </div>
          <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
</nav>
	
	<!--	<form name="tabla" action="http://localhost/Polibooks/Main_controller/perfil" method="POST">-->
           
           <div class="container">
<h1>Impresiones</h1>
          
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Boleta </th>
        <th>Nombre del Archivo</th>
        <th>Numero de Paginas</th>
        <th>Credito Disponible</th>
        <th>Cobrar</th>
      </tr>
    </thead>
    <tbody>
    
      

           <?php     
      foreach ($impresiones as $impresion) { ?>
      <tr>
      <td><?= $impresion->idAlumno;?></td>
      <td><?php echo anchor('Main_controller/downloads'.$impresion->archivo, $impresion->archivo); ?></td>
      
      <td><?= $impresion->noPaginas;?></td>
      <td><?= $impresion->credito;?></td>
      <td>
      <form action="imprimeDocumento" method="post">
      <?php $idimpresion=array('name'=>'idimpresion','type'=>'hidden','value'=>$impresion->idimpresion);?>
      <?php $noPaginas=array('name'=>'noPaginas','type'=>'hidden','value'=>$impresion->noPaginas);?>
      <?php $credito=array('name'=>'credito','type'=>'hidden','value'=>$impresion->credito);?>
      <?php $idAlumno=array('name'=>'idAlumno','type'=>'hidden','value'=>$impresion->idAlumno);?>
      <?=form_input($idimpresion) ?>
      <?=form_input($noPaginas) ?>
      <?=form_input($credito) ?>
      <?=form_input($idAlumno) ?>
      <input type="submit" value="Cobrar"/></form></td>
      
     
       </tr>
       <?php } ?>
           </tbody>
  </table>
</div>
</body>
</html>
        <!--</form>-->
	</body>