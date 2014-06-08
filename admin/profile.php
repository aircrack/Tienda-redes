<?php
session_start();
include("../conexion.php");
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Perfil</title>
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
      <li><a href="index.php#registrados" >Usuarios Registrados</a></li>
      <li><a href="index.php#mas" >Productos mas vendidos</a></li>
      <li><a href="index.php#menos" >Productos menos vendidos</a></li>
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
<br><br><br>

<div class="container">
	<div class="row">
		<div class="span2">
		<img src="../imagenes/admin1.jpg" alt=""> 
		<ul class="nav nav-list">
            <li class="active"><a href="profile.php">Perfil</a></li>
            <li><a href="#">Dar de alta productos</a></li>                                  
          </ul>
		</div>
				<div class="span6"><h4>¡Bienvenido! <br> Aqui podra encontrar lo necesario para administrar los productos
        que tiene en existencia para la venta y algunas otras opciones de consulta </h4>
        </div>
				<div class="span2"> <strong class="text-success"><h4>Usted tiene Permisos para:</h4></strong>
					<ul class="nav nav-list">
            <li class="active"><a href="profile.php">Dar de alta</a></li>
            <li><a>Eliminar</a></li>     
               <li><a>Actualizar</a></li>                                  
                  <li><a>Consultar</a></li>     
          </ul>
        </div>
	</div>
  <div class="row">
  <div class="span4"></div>
    <div class="span8">

      <form class="control-group">
        <h2 class="form-signin-heading">Articulos</h2>
        <input type="text" class="form-control" placeholder="Email " autofocus> <br>
        <input type="password" class="form-control" placeholder="Contraseña"><br>
        <input type="text" class="form-control" placeholder="Direccion"><br>
        <input type="text" class="form-control" placeholder="Telefono"><br>
    <button class="btn btn-lg btn-primary" type="submit">Sign in</button>
      </form>
    </div> 
  </div>
</div>


</body>
</html>