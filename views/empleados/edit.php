<?php

  include './models/empleados.php';
  $title="Listado de Usuarios";

  $user     = new empleados();
  $id       = isset($_GET['id'])?$_GET['id']:null;
  $empleados    = $user->getUserById($id);
  $nombre     = '';
  $sexo = '';
  $email    = '';
  if($empleados){
    $nombre   =$empleados[0]['nombre'];
    $sexo     =$empleados[0]['sexo'];
    $email    =$empleados[0]['email'];
  }

	include 'toolbar.php';
?>
<form action="./controllers/controller.php?folder=<?= $_GET['folder']; ?>" method="POST">
  <div class="row">
    <div class="col text-center">
      <i class="material-icons" style="font-size: 80px;">edit</i>
    </div>
  </div>
  <div class="form-group">
  	 <label for="name">Nombres</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Tus nombres" autofocus required value="<?php echo $nombre; ?>">
  </div>
  <div class="form-group">
  	 <label for="last_name">Sexo</label><br>
 <?PHP
    if($sexo == 'M'){

      echo "
      <input type='radio' id='sexo' name='sexo' placeholder='Sexo' required checked /> Masculino  
      <input type='radio' id='sexo' name='sexo' placeholder='Sexo' required /> Femenino
      ";

    }elseif ($sexo == 'F'){

      echo "
      <input type='radio' id='sexo' name='sexo' placeholder='Sexo' required /> Masculino  
      <input type='radio' id='sexo' name='sexo' placeholder='Sexo' required checked /> Femenino
      ";

    }else{
      echo "
      <input type='radio' id='sexo' name='sexo' placeholder='Sexo' required /> Masculino  
      <input type='radio' id='sexo' name='sexo' placeholder='Sexo' required /> Femenino
      ";

    }
 ?>
      
  </div>
  <div class="form-group">
  	 <label for="email">E-mail</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Tu e-mail" required value="<?php echo $email; ?>">
  </div>
  <div class="form-group text-center">
  	<input type="submit" name="edit" value="Editar" class="btn btn-primary">
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
  <input type="hidden" name="id" value="<?php echo $id ?>">
</form>