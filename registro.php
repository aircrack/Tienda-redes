<?php
  session_start();
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<link rel="stylesheet" href="css/bootstrap-responsive.css">
<link rel="stylesheet" href="css/bootstrap-responsive.min.css">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/main.js"></script>
<script src="js/vendor/bootstrap.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/vendor/jquery1-9.1.min.js"></script>
<body>
<br>
  <div class="container">
  <div class="row">
	<div class="span4">			</div>
	<div class="span4">
 

 <?php
  if(isset($_SESSION['nombre'])){
    echo "<p>Has iniciado sesion: " . $_SESSION['nombre'] . "";
    echo "<p><a href='index.php'>Cerrar Sesion</a></p>";
  }else {
?>
    <form action="index.php" method="POST">
				 <input type="text" class="form-control" placeholder="Email address" autofocus name="email" id="email"> <br> <br>
                <input type="text" class="form-control" placeholder="nombre" name="nombre" required id="nombre"><br><br>
                <input type="password" class="form-control" placeholder="Password" name="pass1" id="pass1">
                <input type="password" class="form-control" placeholder="Repeat Password " name="pass2" id="pass2">                      
                <button class="btn btn-lg btn-primary btn-block" type="submit">Registrarse</button>

               
               
    </form>
 <?php
  }
?>

	</div>
	<div class="span4"></div>
</div>
</div>
</body>
</html>