<?php
session_start();
include("../conexion.php");

?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
     <link rel="stylesheet" href="../css/bootstrap.css">
	 <link rel="stylesheet" href="../css/bootstrap.min.css">
         <link rel="stylesheet" href="../css/bootstrap-responsive.css">
         <link rel="stylesheet" href="../css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="../css/main.css">
        <script src="../js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>	
        <script src="../js/bootstrap.js"></script> 
        <script src="../js/jquery-1.8.3.min.js"></script> 
        <style>
        body  {
  background: #1abc9c;
}</style>
</head>
<body>
	
<?php
if ($_SESSION['nombre']=='administrador') {
 ?>
 <div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <a class="brand"> <strong>Administración</strong></a>
    <ul class="nav">
    <li  class="active"><a href="../index.php">Inicio</a></li>
      <li><a href="#registrados" >Usuarios Registrados</a></li>
      <li><a href="#mas" >Productos mas vendidos</a></li>
      <li><a href="#menos" >Productos menos vendidos</a></li>
      <li>
    <?php
  if(isset($_POST['nombre'])){
    ?>
    <div class="codrops-header" align="center">
  <h4><p><strong><?php echo $_POST['nombre']; ?></strong> &nbsp &nbsp &nbsp &nbsp <strong>¿No eres tu?  </strong><a href="../cerrar.php">Cerrar session</a> </p></h4>       
    </div>
    <?php
  }else{
    if(isset($_SESSION['nombre'])){
      ?>
  <div class="codrops-header" align="center">
  <h4><p> <strong> <?php echo $_SESSION['nombre']; ?></strong>   &nbsp &nbsp &nbsp &nbsp <strong>  </strong><a href="../cerrar.php">Cerrar session</a> </p></h4>     
    </div>
      <?
    }else{
    ?>
  <div class="codrops-header">
    <h4><p><a href="../index.php#registraruser">Registrarme</a> para poder comprar &nbsp &nbsp &nbsp &nbsp  Si ya tienes cuenta <a href="../index.php#iniciosession">Inicia session</a></P></h4>     
    </div>
    <?php
    }
  }
?></li>
    </ul>
  </div>
</div>
<br><br>


<div class="container">
<div class="row">
  <div class="span2">
 
    <h5>Usuario <strong><?php echo $_SESSION['nombre']; ?></strong></h5> <br>
    <img src="../imagenes/admin1.jpg" alt=""> 
    <a href="profile.php"><h4>Perfil</h4></a>
          <ul class="nav nav-list">
            <li class="active"><a href="#">Perfil</a></li>
            <li><a href="#">Dar de alta productos</a></li>          
          </ul>
    </div>
    <div class="span10">
    <h1 align="center">Agregar productos</h1>
    </div>
</div>
</div>


        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>

        <script src="../js/vendor/bootstrap.min.js"></script>
        <script src="../js/main.js"></script>
<?php
}
else
{
?>
<script language='javascript'> alert('No tienes permisos para estar aqui :('); 
  document.location=('../index.php');</script> 
  <?php     
}
 ?>


</body>
</html>