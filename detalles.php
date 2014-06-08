<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Carrito de Compras</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript"  href="./js/scripts.js"></script>
</head>
<body>
	
	<section>
		
	<?php
		include 'conexion.php';
  $con = mysql_connect($host,$user,$pw) or die("Problema al conectar");

  mysql_select_db($db,$con) or die("Problema al conectar la BD");

		$re=mysql_query("select * from productos where id=".$_GET['id'])or die(mysql_error());
		while ($f=mysql_fetch_array($re)) {
		?>
			
			<center>
				<img src="./productos/<?php echo $f['imagen'];?>"><br>
				<span><?php echo $f['descripcion'];?></span><br>
				<span>Categoria: <?php echo $f['categoria'];?></span><br>
				<span>Precio: <?php echo $f['precio'];?></span><br>
				<a href="./carritodecompras.php?id=<?php  echo $f['id'];?>">Añadir al carrito de compras</a>
			</center>
		
	<?php
		}
	?>
		
		

		
	</section>
</body>
</html>