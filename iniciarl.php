<?php
session_start();
$_SESSION['nombre'] = $_POST['nombre'];  
$_SESSION['password'] = $_POST['password'];  
$nombr=$_POST['nombre'];
$contra=$_POST['password'];
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
 $nom=$_POST["password"];
 $userr = mysql_query("SELECT * FROM usuarios WHERE contrasena='".$nom."';", $con);
 $idventa= mysql_query("select (id+1) from venta order by id desc limit 1;");
$resul=mysql_fetch_array($userr);
$resul2=mysql_fetch_array($idventa);


 //esta variable contiene el id del usuario para la insercion a la tabla venta
 $_SESSION['idusuario']=$resul[0];
 //esta variable contiene el id de la venta para incestar en la tabla renglon 
 $_SESSION['idventa']=$resul2[0];


$contras=$contra.' ';

  if ($contras==$resul[2]) {
    header ("Location: index.php");  
  }else{
    session_destroy();
      echo "<script language='javascript'> alert('No estas registrado".$var."   ');  document.location=('index.php');</script>";        
  }


} 


?>

