<?php
session_start();
$_SESSION['nombre'] = $_POST['nombre'];  
$_SESSION['password'] = $_POST['password'];  

include("conexion.php");


///Redireccionar al index
	if ($_SESSION['nombre']=='administrador' && $_SESSION['password']=='Padilla.1' ) {		
	header ("Location: admin/index.php");	 
	}
else
{
  $con = mysql_connect($host,$user,$pw) or die("Problema al conectar");
  mysql_select_db($db,$con) or die("Problema al conectar la BD");
// consulta
 $nom=$_POST["nombre"];
 $userr = mysql_query("SELECT * FROM usuarios WHERE nombre='$nom'", $con);
 while($resul=mysql_fetch_array($userr)){
			$var=$resul[0];
			$var1=$resul[1];
									}
  if ($_SESSION['nombre']==$var && $_SESSION['password']==$var1 ) {
  	header ("Location: index.php");	 
  }else{
  	session_destroy();
  		echo "<script language='javascript'> alert('No estas registrado');  document.location=('index.php');</script>";  			
  }
} 


?>

