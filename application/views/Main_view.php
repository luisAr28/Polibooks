<body>
<script type="text/javascript">
$(document).ready(function(){
 $(document).ready(function () {
 $('#micontenido').fadeIn(1200);
 });
});
</script>
  <div class="container-fluid bg-1 text-center">
<br>
<img src="<?php echo base_url(); ?>/css/PoliBookS.png" >
 
</div>

<div id="vacio">

</div>
<div id="principal">

  <div id="body">
  <div class="container">

      <div class="row">

          <div class="col-md-5 col-sm-12 col-xs-12">
            <?php echo validation_errors(); ?>

              <?php echo form_open('Main_controller/Registro'); ?>
                    <h1><span>Registro</span></h1>
                    <div class="form-group">
                      <label class="label_form" for="usuario">Usuario</label>
                      <input type="input" class="form-control" name="us" /><br />
               
                      <label class="label_form" for="nombre">Nombre</label>
                      <input type="input" class="form-control" name="nombre" /><br />
                      
                      <label class="label_form" for="appaterno">A. Paterno</label>
                      <input type="input" class="form-control" name="appaterno" /><br />
                      
                      <label class="label_form" for="apmaterno">A. Materno</label>
                      <input type="input" class="form-control" name="apmaterno" /><br />

                      <label class="label_form" for="email">Email</label>
                      <input type="input" class="form-control" name="email" /><br />
                      
                      <label class="label_form" for="calle">Calle</label>
                      <input type="input" class="form-control" name="calle" /><br />
                      
                      <label class="label_form" for="municipio">Municipio</label>
                      <select class="form-control" name="municipio">    
                        <?php foreach ($municipio as $data):?>	
                            <option value="<?=$data->idMunicipio?>"><?=$data->Municipio?></option>
                        <?php endforeach; ?>
                      </select><br />
                      
                      <label class="label_form" for="estado">Estado</label>
                      <select class="form-control" name="estado">    
                        <?php foreach ($estado as $data):?>	
                            <option value="<?=$data->idEstado?>"><?=$data->Estado?></option>
                        <?php endforeach; ?>
                      </select><br />
                  
                      <label class="label_form" for="password">Password</label>
                      <input type="password" class="form-control" name="pass" /><br />
                    </div>

                   <!-- <input type="submit" class="btn btn-primary btn_form" name="submit" value="Registro" />-->
                  <button type="submit" class="btn btn-primary btn_form"><span class="glyphicon glyphicon-ok"></span> Registrarme</button>
               <!-- </form>-->
               <?php 
                $tag='</div>';
              echo form_close($tag) ?>
          <!--</div>-->
          <div class="col-md-1 col-sm-1 col-xs-1">
            
              
          </div>

          <div class="col-md-5 col-sm-10 col-xs-10">


            <?php echo validation_errors(); ?>

          <?php echo form_open('Main_controller/iniciar_sesion'); ?>
                <h1><span>Iniciar Sesion</span></h1>
                <div class="form-group">
                  <label class="label_form" for="usuario">Usuario</label>
                  <input type="input" class="form-control" name="usuario" /><br />
                </div>

                <div class="form-group">
                  <label class="label_form" for="password">Password</label>
                  <input type="password" class="form-control" name="password" /><br />
                </div>

              <button type="submit" class="btn btn-primary btn_form"><span class="glyphicon glyphicon-log-in"></span> Iniciar Sesion</button> 
            </form>
          </div>
          <div class="col-md-1 col-sm-1 col-xs-1"></div>
      </div>
      <!-- /.row -->
  </div>
  <!-- /.container -->
    </div>
</div>
</div>
</body>