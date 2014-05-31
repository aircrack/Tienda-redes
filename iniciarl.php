<?php
session_start();
$_SESSION['nombre'] = $_POST['nombre'];  
$_SESSION['password'] = $_POST['password'];  


//Redireccionar a la pagina de login
	if ($_SESSION['nombre']=='administrador' && $_SESSION['password']=='Padilla.1' ) {		
	header ("Location: admin/index.php");	 
	}
else{
	header ("Location: index.php");	 
}

?>

