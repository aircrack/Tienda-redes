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
		 
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/icons.css" />
		<link rel="stylesheet" type="text/css" href="css/style5.css" />		 	
		<script src="js/modernizr.custom.js"></script>
		 <link rel="stylesheet" href="css/bootstrap.css">

 
  <script src="js/jquery-1.8.3.min.js"></script>
  <script src="js/bootstrap.js"></script>

	</head>
	<body>
		
		<div id="themodal" class="modal hide fade">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
				<h3 class="text-info">Ingresa tus datos</h3>
			</div>
			<div class="modal-body">
				 <form action="iniciarl.php" method="POST">
               	 <input type="text" class="form-control" placeholder="nombre" name="nombre" required><br><br>
               		 <input type="password" class="form-control" placeholder="password" name="password">  
	               	<div class="modal-footer">
					<a href="#" class="btn" data-dismiss="modal">Cerrar</a>
					<button id="yesbutton" type="submit" class="btn btn-primary" >Iniciar Session</button>
					</div>
    			</form>	
			</div>
		</div>


		<?php
	if(isset($_POST['nombre'])){
		?>
		<div class="codrops-header" align="center">
	<h4><p>Bienvenid@! Has iniciado sesion como : <strong><?php echo $_POST['nombre']; ?></strong> &nbsp &nbsp &nbsp &nbsp <strong>¿No eres tu?  </strong><a href="cerrar.php">Cerrar session</a> </p></h4>				
		</div>
		<?php
	}else{
		if(isset($_SESSION['nombre'])){
			?>
	<div class="codrops-header" align="center">
	<h4><p>Bienvenid@! Has iniciado sesion como : <strong> <?php echo $_SESSION['nombre']; ?></strong>	 &nbsp &nbsp &nbsp &nbsp <strong>¿No eres tu?  </strong><a href="cerrar.php">Cerrar session</a> </p></h4>			
		</div>
			<?
		}else{
		?>
	<div class="codrops-header">
		<h4><p><a href="registro.php">Registrarme</a> para poder comprar &nbsp &nbsp &nbsp &nbsp  Si ya tienes cuenta  <a href="#themodal" role="button" class="btn btn-primary" data-toggle="modal">Iniciar Session</a></P></h4>	

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

		<div class="container">	
		<div class="row">
			<h3>Somos la mejor opción para comprar gadgets del momento y tecnologias que ya tienen mucho tiempo en el mercado</h3>
			
<div class="span4">
	
				<p>Si no tienes tarjeta de credito, puedes pagar a travez de </p> 
				<img src="imagenes/compropago.jpg" alt="">
</div>
<div class="span4">
	
				<p>Si tienes tarjeta de credito, puedes pagar a travez de </p> 
				<img src="imagenes/paypal-logo.png" alt="">
</div>
		</div>
			</div>
	</body>
	<script src="js/classie.js"></script>
	<script src="js/borderMenu.js"></script>
</html>