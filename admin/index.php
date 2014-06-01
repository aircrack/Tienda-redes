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
	
<div class="navbar">
  <div class="navbar-inner">
    <a class="brand" >Administracion</a>
    <ul class="nav">
    <li  class="active"><a href="../index.php">Inicio</a></li>
      <li><a href="#" id="registrados">Usuarios Registrados</a></li>
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
    <h4><p><a href="../index.php#registraruser">Registrarme</a> para poder comprar &nbsp &nbsp &nbsp &nbsp  Si ya tienes cuenta <a href="../index.php#iniciosession">Inicia session</a></P></h4>     
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
  <div class="span1"></div>
  <div class="span10">
  <h3 class='text-info' align="center">Lista de usuarios registrados</h3>
     <?php

     $con = mysql_connect($host,$user,$pw) or die("Problema al conectar");
     mysql_select_db($db,$con) or die("Problema al conectar la BD");
    $result_set= mysql_query("Select * from usuarios",$con);

    print "<table class='table table-striped table-bordered table-hover table-condensed'>";
    //Imprime las cabeceras
    for ($c=0; $c<mysql_num_fields($result_set); $c++) {
         print "<th class='text-warning'> <h4>". mysql_field_name($result_set, $c)." </h4></th>";
       }   
     
    //Imprime todas las filas
    while ($record=mysql_fetch_row($result_set)) {
      print "<tr class='error'>";
      for ($c=0; $c<mysql_num_fields($result_set); $c++) {
         print "<td class='text-info'> <h4>". $record[$c]  ."</h4></td>" ;
     }
      print "</tr>";
     }
     print "</table>";
    ?>

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