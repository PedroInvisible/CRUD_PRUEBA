<?php

  include './models/empleados.php';
  $title="Listado de Usuarios";

  $user     = new Empleados();
  $id       = isset($_GET['id'])?$_GET['id']:null;
  $empleados    = $user->getUserById($id);
  $rol          = $user->getRolById($id);
  $areas        = $user->getAllAreas();

  $nombre     = '';
  $sexo = '';
  $email    = '';
  if($empleados){
    $nombre       =$empleados[0]['nombre'];
    $sexo         =$empleados[0]['sexo'];
    $email        =$empleados[0]['email'];
    $area_id      =$empleados[0]['area_id'];
    $boletin      =$empleados[0]['boletin'];
    $descripcion  =$empleados[0]['descripcion'];
  }
  if($rol){
    $rolid   =$rol[0]['rol_id'];
  }
?>
<form action="./controllers/controller.php?folder=<?= $_GET['folder']; ?>" method="POST">
  <div class="row">
    <div class="col text-center">
      <i class="material-icons" style="font-size: 80px;">edit</i>
    </div>
  </div>

  <div class="form-group text-center">
  	<?php
  		if(isset($_GET['success'])){
	?>
			<div class="alert alert-success">
				La informacion ha sido actualizada.
			</div>
	<?php
  		}else if(isset($_GET['error'])){
  	?>
			<div class="alert alert-danger">
				Ha ocurrido un error al editar la información, por favor intente de nuevo.
			</div>
	<?php
  		}
  	?>
  </div>
  <div class="form-group">
  	<label for="name">Nombre Completo</label>
    <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $nombre; ?>" autofocus placeholder="Nombres y Apellidos" required>
  </div>
  <div class="form-group">
  	 <label for="email">Correo Electronico</label>
    <input type="email" class="form-control" id="email" name="email" value="<?= $email; ?>" placeholder="Tu e-mail" required>
  </div>
  <div class="form-group">
  	 <label for="last_name">Sexo</label><br>
      <?PHP
          if($sexo == 'M'){

            echo "
            <input type='radio' id='sexo' name='sexo' value='M' required checked /> Masculino  
            <input type='radio' id='sexo' name='sexo' value='F' required /> Femenino
            ";

          }elseif ($sexo == 'F'){

            echo "
            <input type='radio' id='sexo' name='sexo' value='M' required /> Masculino  
            <input type='radio' id='sexo' name='sexo' value='F' required checked /> Femenino
            ";

          }else{
            echo "
            <input type='radio' id='sexo' name='sexo' value='M' required /> Masculino  
            <input type='radio' id='sexo' name='sexo' value='F' required /> Femenino
            ";

          }
      ?>
      
  </div>
  <div class="form-group">
  	 <label for="area">Area</label> <br>
	   <select name="area_id" id="area_id">
        <option selected="selected">Seleccione un Area</option>
          <?php 
            foreach ($areas as $column => $area){ 
              if (isset($area_id)){
                if ($area_id == $area['idareas']){
                echo "<option value='". $area['idareas']."' selected >". $area['nombre']."</option>";
                }else{
                  echo "<option value='". $area['idareas']."' required >". $area['nombre']."</option>";
                }
              }else{
                echo "<option value='". $area['idareas']."' required >". $area['nombre']."</option>";
              }
            }
          ?>
      </select>
  </div>
  <div class="form-group">
  	 <label for="descripcion">Descripcion</label>
	   <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Describe tu experiencia" required cols="40" rows="5"><?= $descripcion; ?></textarea>
  </div>
  <div class="form-group">

  <label for="last_name">Boletin</label><br>
  <label><?PHP
          if($boletin == '1'){

            echo "
            <input type='checkbox' id='boletin' name='boletin'  value='1'  checked />  Deseo Recibir mi boletin Informativo  
           
            ";

          }elseif ($boletin == '0'){

            echo "
            <input type='checkbox' id='boletin' name='boletin'  value='1'  />  Deseo Recibir mi boletin Informativo  
           
            ";

          }else{
            echo "
           
            <input type='checkbox' id='boletin' name='boletin'  value='1' />  Deseo Recibir mi boletin Informativo
            ";

          }
      ?></label>
  </div>
  <div class="form-group">
  <label for="descripcion">Roles</label> <br>

  <?PHP
          if($rolid == 1){

            echo "
            <input type='radio' id='rol' name='rol' value='1' required checked /> Profesional de Proyectos - Desarrollador <br>
            <input type='radio' id='rol' name='rol' value='2' required /> Gerente estrategico<br>
            <input type='radio' id='rol' name='rol' value='3' required /> Auxiliar administrativo<br>
            ";

          }elseif ($rolid == 2){

            echo "
            <input type='radio' id='rol' name='rol'   value='1' required /> Profesional de Proyectos - Desarrollador<br>  
            <input type='radio' id='rol' name='rol'   value='2' required checked /> Gerente estrategico<br>
            <input type='radio' id='rol' name='rol'  value='3' required /> Auxiliar administrativo<br>
            ";

          }elseif ($rolid == 3){

            echo "
            <input type='radio' id='rol' name='rol'  value='1' required /> Profesional de Proyectos - Desarrollador <br> 
            <input type='radio' id='rol' name='rol'   value='2' required  /> Gerente estrategico<br>
            <input type='radio' id='rol' name='rol'  value='3' required checked /> Auxiliar administrativo<br>
            ";

          }else{
            echo "
            <input type='radio' id='rol' name='rol'  value='1' required /> Profesional de Proyectos - Desarrollador  <br>
            <input type='radio' id='rol' name='rol'  value='2' required /> Gerente estrategico<br>
            <input type='radio' id='rol' name='rol'  value='3' required /> Auxiliar administrativo<br>
            ";

          }
      ?>

	    </div>
  <div class="form-group text-center">
  	<input type="submit" id="edit" name="edit" value="Editar" class="btn btn-primary"><br><br>
  </div> 
  <input type="hidden" name="id" value="<?php echo $id ?>">
</form>
  