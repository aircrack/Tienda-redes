<?php
session_start();
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
		<link rel="stylesheet" type="text/css" href="css/main.css" />		
		<script src="js/modernizr.custom.js"></script>
	</head>
	<body>

		<?php
	if(isset($_POST['nombre'])){
		?>
		<div class="codrops-header" align="center">
	<h3><p>Bienvenid@! Has iniciado sesion como : <strong><?php echo $_POST['nombre']; ?></strong> &nbsp &nbsp &nbsp &nbsp <strong>¿No eres tu?  </strong><a href="cerrar.php">Cerrar session</a> </p></h3>				
		</div>
		<?php
	}else{
		if(isset($_SESSION['nombre'])){
			?>
	<div class="codrops-header" align="center">
	<h3><p>Bienvenid@! Has iniciado sesion como : <strong> <?php echo $_SESSION['nombre']; ?></strong>	 &nbsp &nbsp &nbsp &nbsp <strong>¿No eres tu?  </strong><a href="cerrar.php">Cerrar session</a> </p></h3>			
		</div>
			<?
		}else{
		?>
	<div class="codrops-header">
		<h3><p><a href="registro.php">Registrarme</a> para poder comprar &nbsp &nbsp &nbsp &nbsp  Si ya tienes cuenta <a href="iniciar.php">Inicia session</a></P></h3>			
		</div>
		<?php
		}
	}
?>


	 <div id="principal">
		<div class="container">
		<h1>Gadgets y productos tecnológicos</h1>								
			
			

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





		</div> </div> 
	</body>
	<script src="js/classie.js"></script>
	<script src="js/borderMenu.js"></script>
</html>