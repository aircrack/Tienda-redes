



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



<?php
session_start();
include "../conexion.php";

$con = mysql_connect($host,$user,$pw) or die("Problema al conectar");

  mysql_select_db($db,$con) or die("Problema al conectar la BD");

  			$arreglo=$_SESSION['carrito'];


  			$total=0;

  		for ($j=0; $j <count($arreglo) ; $j++) { 
  			$total= $total+($arreglo[$j]['Precio']*$arreglo[$j]['Cantidad']);
  		}


		
		mysql_query("insert into venta (id,total,usuarios_id) values (".$_SESSION['idventa'].",".$total.",".$_SESSION['idusuario'].")");


		for($i=0; $i<count($arreglo);$i++){	
			mysql_query("insert into renglon (cantidad,subtotal,venta_id,productos_id) values(
				".$arreglo[$i]['Cantidad'].",
				".($arreglo[$i]['Precio']*$arreglo[$i]['Cantidad']).",
				".$_SESSION['idventa'].",
				".$arreglo[$i]['Id'].")"
			)or die(mysql_error());
		}


		$total=0;
		$tabla='<table border="1">
			<tr>
			<th>Nombre</th>
			<th>Cantidad</th>
			<th>Precio</th>
			<th>Subtotal</th>
			</tr>';
		for($i=0;$i<count($arreglo);$i++){
			$tabla=$tabla.'<tr>
				<td>'.$arreglo[$i]['Nombre'].'</td>
				<td>'.$arreglo[$i]['Cantidad'].'</td>
				<td>'.$arreglo[$i]['Precio'].'</td>
				<td>'.$arreglo[$i]['Cantidad']*$arreglo[$i]['Precio'].'</td>
				</tr>
			';
			$total=$total+($arreglo[$i]['Cantidad']*$arreglo[$i]['Precio']);
		}
		$tabla=$tabla.'</table>';
		//echo $tabla;
		$nombre=$_SESSION['nombre'];
		$comentario='

			<div style="
				border:1px solid #d6d2d2;
				border-radius:5px;
				padding:10px;
				width:800px;
				heigth:300px;
			">
			<center>
				
				<h1>Muchas gracias por comprar en mi carrito de compras</h1>
			</center>
			<p>Hola '.$nombre.' muchas gracias por comprar aquí te mando los detalles de tu compra</p>
			<p>Lista de Artículos<br>
				'.$tabla.'
				<br>
				Total del pago es: '.$total.'

			</p>
			</div>

		';

		echo $comentario;
		unset($_SESSION['carrito']);

		

?>




</body>
</html>