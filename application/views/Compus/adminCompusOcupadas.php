<body>
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
                      Computadoras<b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a href="<?php echo base_url(); ?>Main_controller/verDisponibles">Disponibles</a></li>
                      <li><a href="<?php echo base_url(); ?>Main_controller/verOcupadas">Ocupadas</a></li>
                    </ul>
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
  <div id="container">
  <div class="container-fluid bg-1 text-center">


                         <?php if($disponibles==NULL)
                           {
                              echo "<h3>Ninguna Computadora esta Ocupada<h3>";
                           }else{
                         foreach ($disponibles as $c):?>
                        
                        <table class="table table-hover" id="datos">
                    <thead>
                        <tr>

                            <th>Maquina</th>
                            <th>Boleta Alumno</th>
                            
                         </tr>
                    </thead>
                    <tbody>
                        <tr>

                        <td><?=$c->idComputadora?></td>
                        <td><?=$c->idAlumno?></td>
                        
                        </tr>

                        <?php endforeach; }?>
                    </tbody>
                </table>
<div class="row">
<div class="col-md-6" >
<?= form_open('http://localhost/Polibooks/Main_controller/liberarCompuPrestamo') ?>
<?php
    $compu=array(
    'name' => 'compu',
    'placeholder' => 'escribe el número de computadora',
    'class'=>'form-control'
    );
?>

<?= form_label('Computadora: ','compu') ?>
<?= form_input($compu) ?>
<br/>
<button type="submit" class="btn btn-primary btn_form"><span class="glyphicon glyphicon-minus-sign"></span>Liberar</button>
<?= form_close()?>
<br>
</div>
<div class="col-md-offset-6">

<?= form_open('http://localhost/Polibooks/Main_controller/confirmarCompuPrestamo') ?>
<?php
    $compu=array(
    'name' => 'compu',
    'placeholder' => 'escribe el número de computadora',
    'class'=>'form-control'
    );
?>

<?= form_label('Computadora: ','compu') ?>
<?= form_input($compu) ?>
<br/>
<button type="submit" class="btn btn-success btn_form"><span class="glyphicon glyphicon-ok"></span></span> Confirmar </button>

<?= form_close()?>
<br>
</div>
</div>
</div>
</div>
</div>
</body>
</html>


