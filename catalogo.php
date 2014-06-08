<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Catalog</title>
	 <link rel="stylesheet" href="css/bootstrap.min.css">
         <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>


<link rel="stylesheet" type="text/css" href="./css/estilos.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script type="text/javascript"  href="./js/scripts.js"></script>



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
    <h3><p>Bienvenid@! Has iniciado sesion como : <strong> <?php echo $_SESSION['nombre']; ?></strong>   &nbsp &nbsp &nbsp &nbsp <strong>¿No eres tu?  </strong><a href="cerrar.php">Cerrar session</a> </p></h3>           
        </div>
            <?
        }else{
        ?>
    <div class="codrops-header">
        <h3><p><a href="index.php#registraruser">Registrarme</a> para poder comprar &nbsp &nbsp &nbsp &nbsp  Si ya tienes cuenta <a href="index.php#iniciosession">Inicia session</a></P></h3>         
        </div>
        <?php
        }
    }
?>

<div class="container">
            
             <div class="row-fluid texto-destacado text-center">
                <div class="boxsombra boxdestacada">
                    <h2>Productos que tenemos en venta actualmente</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, ipsam, voluptatem impedit explicabo dicta illo ipsa vitae odio harum eum tempore doloremque omnis doloribus repudiandae suscipit saepe unde expedita praesentium.</p>
                   <!-- <a class="btn btn-warning btn-large" href="#">Ver</a>-->
                </div>
            </div>
<br>
<br>

<center>
<h1>Productos en oferta y otras promociones.</h1>
<div id="slidingcarousel" class="carousel slide">
    <div class="carousel-inner">
        <div class="item">
            <img src="imagenes/cable punto a punto.jpg" />
            <div class="carousel-caption">
                <h4>Cable punto a punto<h4>
                <a href="oferta.php">Ver oferta</a>
            </div>
        </div>
        <div class="item">
            <img src="imagenes/modem.jpg" />
            <div class="carousel-caption">
                <h4>Modems<h4>
                <a href="oferta.php">Ver oferta</a>
            </div>
        </div>
        <div class="item">
            <img src="imagenes/router.jpg" />
            <div class="carousel-caption">
                <h4>Routers<h4>
                <a href="oferta.php">Ver oferta</a>
            </div>
        </div>
        <div class="item">
            <img src="imagenes/serial.jpg" />
            <div class="carousel-caption">
                <h4>Cable serial<h4>
                <a href="oferta.php">Ver oferta</a>
            </div>
        </div>
        <div class="item">
            <img src="imagenes/switch.jpg" />
            <div class="carousel-caption">
                <h4>Switches<h4>
                <a href="oferta.php">Ver oferta</a>
            </div>
        </div>
        <div class="item">
            <img src="imagenes/servidor.jpg" />
            <div class="carousel-caption">
                <h4>Servidores cisco<h4>
                <a href="oferta.php">Ver oferta</a>
            </div>
        </div>
    </div>
    <a class="carousel-control left" href="#slidingcarousel" data-slide="prev">&lsaquo;</a>
    <a class="carousel-control right" href="#slidingcarousel" data-slide="next">&rsaquo;</a>
</div>

<script>

   /* $(function (){
        $('.carousel').carousel({
            interval:1000
        });
    });*/
    
</script>
        

</div>

<div>
    

  <section>
        
    <?php
    include 'conexion.php';
  $con = mysql_connect($host,$user,$pw) or die("Problema al conectar");
  mysql_select_db($db,$con) or die("Problema al conectar la BD");
        
        $re=mysql_query("select * from productos;")or die(mysql_error());
        while ($f=mysql_fetch_array($re)) {
        ?>
            <div class="producto">
            <center>
                <img src="./productos/<?php echo $f['imagen'];?>"><br>
                <span><?php echo $f['descripcion'];?></span><br><br>

                <a href="./detalles.php?id=<?php  echo $f['id'];?>">ver</a>
            </center>
        </div>
    <?php
        }
    ?>
        
        

        
    </section>


</div>

  




        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
</body>
</html>