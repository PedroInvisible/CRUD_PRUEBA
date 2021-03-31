<?php
	include '../models/empleados.php';
	$empleados=new Empleados();

	//Request: creacion de nuevo usuario
	if(isset($_POST['create']))
	{
		if($empleados->newUser($_POST) && $empleados->rolUser($_POST)){
			header('location: ../index.php?page=new&success=true&folder='.$_GET['folder']);
		}else{
			header('location: ../index.php?page=new&error=true&folder='.$_GET['folder']);
		}
	}

	//Request: editar usuario
	if(isset($_POST['edit']))
	{		
		if($empleados->setEditUser($_POST) && $empleados->setEditRolUser($_POST)){
			header('location: ../index.php?page=edit&id='.$_POST['id'].'&success=true&folder='.$_GET['folder']);
		}else{
			header('location: ../index.php?page=edit&id='.$_POST['id'].'&error=true&folder='.$_GET['folder']);
		}
	}	

?>