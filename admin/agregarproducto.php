<?php
//session_start();
	include "../conexion.php";
//	if(isset($_SESSION['Usuario'])){

//	}else{
//		header("Location: ./index.php?Error=Acceso denegado");
//	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<script type="text/javascript" src="./js/jquery-1.10.2.js"></script>
	<script type="text/javascript"  src="./js/scripts.js"></script>
	
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
	





<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <a class="brand"> <strong>Administración</strong></a>
    <ul class="nav">
    <li  class="active"><a href="../index.php">Inicio</a></li>
      <li><a href="#registrados" >Usuarios Registrados</a></li>
      <li><a href="#mas" >Productos mas vendidos</a></li>
      <li><a href="#menos" >Productos menos vendidos</a></li>
      <li><a href="agregarproducto.php">Agregar productos</a></li>
      <li><a href="modificar.php" >Modificar productos</a></li>
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









	
	<section>
	

	<center><h1>Agregar un Nuevo Producto</h1></center>
	<form action="altaproducto.php" method = "post" enctype="multipart/form-data">
		<fieldset>
			Nombre<br>
			<input type="text" name="nombre">
		</fieldset>
		<fieldset>
			Descripción<br>
			<input type="text" name="descripcion">
		</fieldset>
		<fieldset>
			Imagen<br>
			<input type="file" name="file">
		</fieldset>
		<fieldset>
			Precio<br>
			<input type="text" name="precio">
		</fieldset>
		<input type="submit" name="accion" value="Enviar" class="aceptar">
	</form>	
	
		</form>
	</section>
</body>
</html>