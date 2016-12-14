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

<table class="table table-hover" id="datos">
                    <thead>
                        <tr >

                            <th>Maquina</th>
                            <th>Nombre Maquina</th>
                            <th></th>
                         </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($disponibles as $c):?>

                        <tr>

                        <td><?=$c->idComputadora?></td>
                        <td><?=$c->Nombre?></td>
                        
                        </tr>

                        <?php endforeach;?>
                    </tbody>
                </table>
 <div class="form-group">        
<?= form_open('http://localhost/Polibooks/Main_controller/obtenerCompuPrestamo2') ?>
<?php
    $compu=array(
    'name' => 'compu',
    'placeholder' => 'escribe el número de computadora',
    'class'=>'form-control'
    );

    $alumno=array(
    'name' => 'boleta',
    'placeholder' => 'Boleta',
    'class'=>'form-control'
    );
?>

<?= form_label('Computadora: ','compu') ?>
<?= form_input($compu) ?>
</br></br>
<?= form_label('Boleta: ','boleta') ?>
<?= form_input($alumno) ?>
</br></br>
<button type="submit" class="btn btn-primary btn_form"><span class="glyphicon glyphicon-time"></span> Reservar </button>
<?= form_close()?>
</br>
</div>
</div>
<br>
</div>
</div>
</body>
</html>
