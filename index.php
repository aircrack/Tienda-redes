<?php

session_start();
session_destroy();
include("conexion.php");

if(isset($_POST['nombre']) && !empty($_POST['nombre']) && 
	isset($_POST['email']) && !empty($_POST['email']) &&
	isset($_POST['pass1']) && !empty($_POST['pass1']))
{
  $con = mysql_connect($host,$user,$pw) or die("Problema al conectar");

  mysql_select_db($db,$con) or die("Problema al conectar la BD");
// insercion de datos
  mysql_query("INSERT INTO usuarios (nombre,contrasena,email) VALUES (' $_POST[nombre] ','$_POST[pass1] ','$_POST[email] ') " , $con);
}
?>
<!DOCTYPE html>
<html lang="es" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>MarketPlace| Network</title>
		<meta name="description" content="Responsive Animated Border Menus with CSS Transitions" />
		<meta name="keywords" content="navigation, menu, responsive, border, overlay, css transition" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/icons.css" />
		<link rel="stylesheet" type="text/css" href="css/style5.css" />
		<script src="js/modernizr.custom.js"></script>
	</head>
	<body>
		<div class="container">
			<header class="codrops-header">
 

				<h1>Gadgets y productos tecnológicos   </h1>
													
			</header>

			<nav id="bt-menu" class="bt-menu">
				<a href="#" class="bt-menu-trigger"><span>Menu</span></a>
				<ul>
					<li><a href="catalogo.php">Catálogo</a></li>
					<li><a href="#">Clientes</a></li>
					<li><a href="sabermas.php" target="_black">Saber Mas</a></li>
					<li><a href="#">Contacto</a></li>
				</ul>
				<ul>
					<li><a href="https://twitter.com/LuisAlfredoMoc" class="bt-icon icon-twitter" target="_black">Twitter</a></li>
					<li><a href="https://plus.google.com/+LuisAlfredoMoctezumaPascual" class="bt-icon icon-gplus" target="_black">Google+</a></li>
					<li><a href="https://www.facebook.com/luisalfredomoctezuma" class="bt-icon icon-facebook" target="_black">Facebook</a></li>
					<li><a href="https://github.com/luisalfredomoctezuma" class="bt-icon icon-github" target="_black">icon-github</a></li>
				</ul>
			</nav>

<?php
	if(isset($_POST['nombre'])){
		$_SESSION['nombre'] = $_POST['nombre'];
		?>
		<div class="codrops-header" align="center">
		<p>Bienvenido! Has iniciado sesion: <?php echo $_POST['nombre']; ?> </p>
			<a href="index.php">¿No eres tu? Cerrar session</a>
			<br>			
		</div>

		<?php
	}else{
		if(isset($_SESSION['nombre'])){
			echo "Has iniciado Sesion: ".$_SESSION['nombre'];
			echo "<p><a href='index.php'>¿No eres tu? Cerrar Sesion</a></p>";

		}else{
		?>
		<div class="codrops-header" align="center">
		<p>Registrate para poder comprar</p>
			<a href="registro.php">Registrarse</a>
			<br>
			
		</div>
		<?php
		}
	}
?>



		</div> 
	</body>
	<script src="js/classie.js"></script>
	<script src="js/borderMenu.js"></script>
</html>