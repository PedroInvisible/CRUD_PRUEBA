<?php
	
	include './models/empleados.php';
	$user  = new Empleados();


		//Trae todas las areas por nombre		
		$areas =$user->getAllAreas();


?>
<form action="./controllers/controller.php?folder=<?= $_GET['folder']; ?>" method="POST">
  <div class="row">
    <div class="col text-center">
      <i class="material-icons" style="font-size: 80px;">add</i>
    </div>
  </div>
  <div class="form-group">
  	<label for="name">Nombre Completo</label>
    <input type="text" class="form-control" id="nombre" name="nombre" autofocus placeholder="Nombres y Apellidos" required>
  </div>
  <div class="form-group">
  	 <label for="email">Correo Electronico</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Tu e-mail" required>
  </div>
  <div class="form-group">
  	<label for="last_name">Sexo</label><br>
	<input type='radio' id='sexo' name='sexo' placeholder='Sexo' value='M' required /> Masculino  
	<input type='radio' id='sexo' name='sexo' placeholder='Sexo' value='F' required /> Femenino
  </div>
  <div class="form-group">
  	 <label for="area">Area</label> <br>
	   <select name="area_id" id="area_id">
        <option selected="selected">Seleccione un Area</option>
		<?php foreach ($areas as $column => $area){ ?>
            <option value="<?php echo $area['idareas']; ?>" required ><?php echo $area['nombre']; ?></option>
            <?php
        }
        ?>
        </select>
  </div>
  <div class="form-group">
  	 <label for="descripcion">Descripcion</label>
	   <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Describe tu experiencia" required cols="40" rows="5"></textarea>
  </div>
  <label><input type="checkbox" name ="boletin" id="boletin" value="1"> Deseo Recibir mi boletin Informativo</label>
  
  <div class="form-group text-center">
  	<input type="submit" name="create" value="Crear" class="btn btn-primary">
  </div>
  <div class="form-group text-center">
  	<?php
  		if(isset($_GET['success'])){
	?>
			<div class="alert alert-success">
				El usuario ha sido creado.
			</div>
	<?php
  		}else if(isset($_GET['error'])){
  	?>
			<div class="alert alert-danger">
				Ha ocurrido un error al crear el usario, por favor intente de nuevo.
			</div>
	<?php
  		}
  	?>
  </div>
</form>