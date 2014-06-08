<?php
	//session_start();
	include "../conexion.php";
	 $con = mysql_connect($host,$user,$pw) or die("Problema al conectar");
  mysql_select_db($db,$con) or die("Problema al conectar la BD");
	//if(isset($_SESSION['Usuario'])){
	//}else{
	//	header("Location: ./index.php?Error=Acceso denegado");
	//}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="./modificar.js"></script>
	
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
		
		<h1>MODIFICAR Y/O ELIMINAR</h1>
		<table width="100%">
			<tr>
				<td>Id</td>
				<td>Nombre</td>
				<td>Descripcion</td>
				<td>Precio</td>
				<td>Eliminar</td>
				<td>Modificar</td>
			</tr>
		<?php 
		 $con = mysql_connect($host,$user,$pw) or die("Problema al conectar");
  mysql_select_db($db,$con) or die("Problema al conectar la BD");
			$resultado=mysql_query("select * from productos");
			while($row=mysql_fetch_array($resultado)){
				echo '
				<tr>
					<td>
						<input type="hidden" value="'.$row[0].'">'.$row[0].'
						<input type="hidden" class="imagen" value="'.$row[3].'">
					</td>
					<td><input type="text" class="nombre" value="'.$row[1].'"></td>
					<td><input type="text" class="descripcion" value="'.$row[2].'"></td>
					<td><input type="text" class="precio" value="'.$row[4].'"></td>
					<td><button class="eliminar" data-id="'.$row[0].'">Eliminar</button></td>
					<td><button class="modificar" data-id="'.$row[0].'">Modificar</button></td>
				</tr>
				';
			}
		?>
	</table>
	</section>
</body>
</html>