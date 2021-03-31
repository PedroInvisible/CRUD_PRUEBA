<?php

  include './models/empleados.php';
  $title="Listado de Usuarios";

  $user     = new empleados();
  $id       = isset($_GET['id'])?$_GET['id']:null;
  

  if($user->deleteUser($_GET['id'])){
    header('location: index.php?page=empleados&success=true&folder='.$_GET['folder']);
}else{
    header('location: index.php?page=empleados&error=true&folder='.$_GET['folder']);
}
?> 
  <input type="hidden" name="id" value="<?php echo $id ?>">
</form>