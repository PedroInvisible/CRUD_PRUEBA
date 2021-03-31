<?php
	include dirname(__file__,2)."/config/conexion.php";
	/**
	*
	*/
	class empleados
	{
		public $conn;
		public $link;

		function __construct()
		{
			$this->conn   = new Conexion();
			$this->link   = $this->conn->conectarse();
		}

		//Trae todos los usuarios registrados
		public function getempleados()
		{
			$query  ="SELECT * FROM empleados";
			$result =mysqli_query($this->link,$query);
			$data   =array();
			while ($data[]=mysqli_fetch_assoc($result));
			array_pop($data);
			return $data;
		}

		//Crea un nuevo usuario
		public function newUser($data){
			$query  ="INSERT INTO empleados (nombre, email, sexo, area_id, boletin, descripcion) VALUES ('".$data['nombre']."','".$data['email']."','".$data['sexo']."','".$data['area_id']."','".$data['boletin']."','".$data['descripcion']."')";
			$result =mysqli_query($this->link,$query);
			if(mysqli_affected_rows($this->link)>0){
				return true;
			}else{
				return false;
			}
		}

		//Obtiene el usuario por id
		public function getUserById($id=NULL){
			if(!empty($id)){
				$query  ="SELECT * FROM empleados WHERE id=".$id;
				$result =mysqli_query($this->link,$query);
				$data   =array();
				while ($data[]=mysqli_fetch_assoc($result));
				array_pop($data);
				return $data;
			}else{
				return false;
			}
		}

		//Obtiene el usuario por id
		public function setEditUser($data){
			if(!empty($data['id'])){
				$query  ="UPDATE empleados SET nombre='".$data['nombre']."',email='".$data['email']."', sexo='".$data['sexo']."' WHERE id=".$data['id'];
				$result =mysqli_query($this->link,$query);
				if($result){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}

		//Borra el usuario por id
		public function deleteUser($id=NULL){
			if(!empty($id)){
				$query  ="DELETE FROM empleados WHERE id=".$id;
				$result =mysqli_query($this->link,$query);
				if(mysqli_affected_rows($this->link)>0){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}

		//Filtro de busqueda
		public function getempleadosBySearch($data=NULL){
			if(!empty($data)){
				$query  ="SELECT * FROM empleados WHERE nombre LIKE'%".$data."%' OR email LIKE'%".$data."%'";
				$result =mysqli_query($this->link,$query);
				$data   =array();
				while ($data[]=mysqli_fetch_assoc($result));
				array_pop($data);
				return $data;
			}else{
				return false;
			}
		}

		public function getAreas($id=NULL){
			if(!empty($id)){
				$query  ="SELECT nombre FROM areas WHERE idareas=".$id;
				$result =mysqli_query($this->link,$query);
				$data   =array();
				while ($data[]=mysqli_fetch_assoc($result));
				array_pop($data);
				return $data;
			}else{
				return false;
			}
		}


		//Trae todas las areas
		public function getAllAreas()
		{
			$query  ="SELECT * FROM areas";
			$result =mysqli_query($this->link,$query);
			$data   =array();
			while ($data[]=mysqli_fetch_assoc($result));
			array_pop($data);
			return $data;
		}


	}
