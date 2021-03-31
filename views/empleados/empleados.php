<?php

	include './models/empleados.php';
	$user  = new Empleados();

	//Si utiliza el filtro de busqueda
	if(isset($search)){
		$empleados = $user->getempleadosBySearch($dataSearch);
	}else{
		//Trae todos los usuarios
		$dataSearch=NULL;
		$empleados =$user->getempleados();
	}

	$title="Listado de Usuarios";
	


	
?>
<div class="row">
	<div class="col text-center">
		<i class="material-icons" style="font-size: 80px;">people</i>
	</div>
</div>
<div class="row">
	<div class="col">
		<form action="./index.php" method="post" accept-charset="utf-8" class="form-inline">
			<div class="form-group mx-sm-3 mb-2">
    			<input type="text" class="form-control" name="dataSearch" autofocus required placeholder="Buscador" value="<?= $dataSearch;  ?>">
  			</div>
  			<button type="submit" name="btnSearch" class="btn btn-primary mb-2">Buscar</button><br>
		</form>
	</div><br>
</div><br>
<div class="form-group text-center">
    <?php
        if(isset($_GET['success'])){
    ?>
            <br><div class="alert alert-success">
                El usuario se ha Eliminado con Exito.
            </div>
    <?php
        }else if(isset($_GET['error'])){
    ?>
           <br> <div class="alert alert-danger">
                Ha ocurrido un error al Eliminar el usuario, por favor intente de nuevo.
            </div>
    <?php
        }
    ?>
    </div>
<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover table-sm">
			<thead class="thead-light">
				<th>Id</th>
				<th class="text-center">Nombres</th>
				<th class="text-center">E-mail</th>
				<th class="text-center">Sexo</th>
				<th class="text-center">Area</th>
				<th class="text-center">Boletin</th>
				<th class="text-center">Descripcion</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
			</thead>
			<tbody>
				<?php

					if(count($empleados)>0){

						foreach ($empleados as $column =>$value) {
							if ($value['sexo'] == 'M'){
								$sexo= "Masculino";
							}elseif ($value['sexo'] == 'F'){
								$sexo= "Femenino";
							}else{
								$sexo= "";
							}
				
							if ($value['boletin'] == 1){
								$boletin= "Si";
							}elseif ($value['boletin'] == 0){
								$boletin= "No";
							}else{
								$boletin= "";
							}
				
							if(isset($value['area_id'])){
								$id = $value['area_id'];
				
								$areas = $user->getAreas($id);
								foreach ($areas as $column =>$nombre) {
									$area = $nombre['nombre'];
								}
							}else{
								$area = '';
							}
				?>

							<tr id="row<?= $value['id']; ?>">
								<td><?= $value['id']; ?></td>
								<td><?= $value['nombre']; ?></td>
								<td><a href="./index.php?page=new_email&email=<?= $value['email']; ?>&folder=email&nombre=<?= $value['nombre']; ?>" title="Enviar correo electrónico."><?= $value['email']; ?></a></td>
								<td><?=$sexo;  ?></td>
								<td><?= $area; ?></td>
								<td><?= $boletin; ?></td>
								<td><?= $value['descripcion']; ?></td>
								<td class="text-center">
									<a href="./index.php?page=edit&id=<?= $value['id'] ?>&folder=empleados" title="Editar usuario: <?= $value['nombre']?>">
										<i class="material-icons btn_edit">edit</i>
									</a>
								</td>
								<td class="text-center">
									<a href="./index.php?page=delete&id=<?= $value['id'] ?>&folder=empleados" title="Eliminar usuario: <?= $value['nombre']?>">
										<i class="material-icons btn_delete">delete</i>
									</a>
								</td>
								
							</tr>
							</tr>
				<?php
						}
					}else{
				?>
					<tr>
						<td colspan="5">
							<div class="alert alert-info">
								No se encontraron usuarios.
							</div>
						</td>
					</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
	<div class="row">
		<div class="col">
			<div class="alert alert-success" id="msgSuccess" style="display: none;"></div>
			<div class="alert alert-danger" id="msgDanger" style="display: none;"></div>
		</div>
	</div>
	