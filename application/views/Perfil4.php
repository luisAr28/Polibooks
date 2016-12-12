
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
	<div class="container">
<h1>Caja</h1>
          
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Boleta </th>
        <th>Nombre</th>
        <th>Apellido Paterno</th>
        <th>Apellido Materno</th>
        <th>Credito Actual</th>
      </tr>
    </thead>
    <tbody>
    
      

           <?php

      foreach ($alumnos as $alumno) { ?>
      <tr>
      <td><?= $alumno->idAlumno;?></td>
      <td><?= $alumno->nombre;?></td>
      <td><?= $alumno->apPaterno;?></td>
      <td><?= $alumno->apMaterno;?></td>
      <td><?= $alumno->credito;?></td>
      <td>
      <?=form_open('/Main_controller/recibirDato')?>
      <?php 
      $credito= array('name'=>'credito','placeholder'=>'Ingrese saldo');
      $id=array('name'=>'id','type'=>'hidden','value'=>$alumno->idAlumno);
      $email=array('name'=>'email','type'=>'hidden','value'=>$alumno->email);
      ?>
      <?=form_label('Credito: ','credito')?>
      <?=form_input($credito) ?>
      <?=form_input($id) ?>
      <?=form_input($email) ?>
      <?=form_submit('','Recargar')?>
      <?=form_close()?>
      </td>
       </tr>
       <?php } ?>
           </tbody>
  </table>
</div>
	</body>