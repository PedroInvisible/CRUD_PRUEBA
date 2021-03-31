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
	include 'toolbar.php';

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
				$boletin= "Recibir";
			}elseif ($value['boletin'] == 0){
				$boletin= "No Recibir";
			}else{
				$boletin= "";
			}

		}
	}


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
  			<button type="submit" name="btnSearch" class="btn btn-primary mb-2">Buscar</button>
		</form>
	</div>
</div>
<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover table-sm">
			<thead class="thead-dark">
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
				?>

							<tr id="row<?= $value['id']; ?>">
								<td><?= $value['id']; ?></td>
								<td><?= $value['nombre']; ?></td>
								<td><a href="./index.php?page=new_email&email=<?= $value['email']; ?>&folder=email&nombre=<?= $value['nombre']; ?>" title="Enviar correo electrónico."><?= $value['email']; ?></a></td>
								<td><?=$sexo;  ?></td>
								<td><?= $value['area_id']; ?></td>
								<td><?= $boletin; ?></td>
								<td><?= $value['descripcion']; ?></td>
								<td class="text-center">
									<a href="./index.php?page=edit&id=<?= $value['id'] ?>&folder=empleados" title="Editar usuario: <?= $value['nombre']?>">
										<i class="material-icons btn_edit">edit</i>
									</a>
								</td>
								<td class="text-center">
									<a href="#" onclick="objUser.deleteUser(<?= $value['id'] ?>)" id="btnDeleteUser" title="Borrar usuario: <?= $value['nombre'] ?>">
										<i class="material-icons btn_delete">delete_forever</i>
									</a>
								</td>
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