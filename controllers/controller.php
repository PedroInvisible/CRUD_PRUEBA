<?php
	include dirname(__file__,2).'/models/empleados.php';

	$empleados=new Empleados();

	//Request: creacion de nuevo usuario
	if(isset($_POST['create']))
	{
		if($empleados->newUser($_POST)){
			header('location: ../index.php?page=new&success=true&folder='.$_GET['folder']);
		}else{
			header('location: ../index.php?page=new&error=true&folder='.$_GET['folder']);
		}
	}

	//Request: editar usuario
	if(isset($_POST['edit']))
	{
		if($empleados->setEditUser($_POST)){
			header('location: ../index.php?page=edit&id='.$_POST['id'].'&success=true&folder='.$_GET['folder']);
		}else{
			header('location: ../index.php?page=edit&id='.$_POST['id'].'&error=true&folder='.$_GET['folder']);
		}
	}

	//Request: editar usuario
	if(isset($_GET['delete']))
	{
		if($empleados->deleteUser($_GET['id'])){
			echo json_encode(["success"=>true]);
		}else{
			echo json_encode(["error"=>true]);
		}
	}

?>