
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
                      <a href="buscaTuto">Impresiones</a>
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
	
	<!--	<form name="tabla" action="http://localhost/Polibooks/Main_controller/perfil" method="POST">-->
           <?php foreach($usuarios as $u):?>
         <h1><?=$u->idUsuario?></h1>
         <h1><?=$u->Nombre?></h1>
         <h1><?=$u->ApPaterno?></h1>
         <h1><?=$u->ApMaterno?></h1>
         <h1><?=$u->Credito?></h1>
          <!--  </form>-->
          <?php endforeach;?>
        <!--</form>-->
        
      <script>
         function lib()
         {
             var info = document.getElementById("libro").value;
             info = info.split(" ").join("_"); 
          //   alert(info);
             window.location.href = "http://localhost/Polibooks/Main_controller/buscaLibro/"+info;

         }
      </script>
	</body>
