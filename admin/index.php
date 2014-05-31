<?php
session_start();
include("../conexion.php");
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
	 <link rel="stylesheet" href="../css/bootstrap.min.css">
         <link rel="stylesheet" href="../css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="../css/main.css">
        <script src="../js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>	
        <style>
        body  {
  background: #1abc9c;
}</style>
</head>
<body>
	
<div class="navbar">
  <div class="navbar-inner">
    <a class="brand" >Administracion</a>
    <ul class="nav">
    <li  class="active"><a href="../index.php">Inicio</a></li>
      <li><a href="#" >Productos mas vendidos</a></li>
      <li><a href="#">Productos menos vendidos</a></li>
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
    <h4><p><a href="registro.php">Registrarme</a> para poder comprar &nbsp &nbsp &nbsp &nbsp  Si ya tienes cuenta <a href="../iniciar.php">Inicia session</a></P></h4>     
    </div>
    <?php
    }
  }
?></li>
    </ul>
  </div>
</div>



<div class="container">
<div class="row">
  <div class="span1"> </div>
  <div class="span10">
    <table class="table table-striped table-bordered table-hover table-condensed">
<caption ><h1>Productos mas vendidos en esta semana</h1></caption>
<thead>
<th class="text-warning"><h3>Nombre</h3></th>
<th class="text-warning"><h3>Cantidad</h3></th>
<th class="text-warning"><h3>otro</h3></th>
</thead>


<tr class="error">
<td><a href="#">Google Glass</a></td>
<td class="text-success" > 3 </td>
<td  >otro</td>
</tr>


<tr>
<td><a href="#">Router cisco</a></td>
<td  class="text-info"> 20 </td>
<td >otro</td>
</tr>
 
</table>

  </div>
    <div class="span1"> </div>
</div>  
</div>




        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>

        <script src="../js/vendor/bootstrap.min.js"></script>
        <script src="../js/main.js"></script>
</body>
</html>