
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
           <?php foreach($usuarios as $u):?>
         <h1><?=$u->idUsuario?></h1>
         <h1><?=$u->Nombre?></h1>
         <h1><?=$u->ApPaterno?></h1>
         <h1><?=$u->ApMaterno?></h1>
          <!--  </form>-->
          <?php endforeach;?>
        <!--</form>-->
	</body>
