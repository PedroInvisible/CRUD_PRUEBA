<?php
	define('HOMEDIR',__DIR__);

	include 'views/header.php';
	include 'toolbar.php';
	$page   =isset($_GET['page'])?$_GET['page']:'empleados';
	$folder =isset($_GET['folder'])?$_GET['folder']:'empleados';
	if(isset($_POST['btnSearch'])){
		$search     =true;
		$dataSearch =$_POST['dataSearch'];
	}
	include 'views/'.$folder.'/'.$page.'.php';
	include 'views/footer.php';
