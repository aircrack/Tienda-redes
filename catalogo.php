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
                    <h2>Productos en oferta y promociones</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, ipsam, voluptatem impedit explicabo dicta illo ipsa vitae odio harum eum tempore doloremque omnis doloribus repudiandae suscipit saepe unde expedita praesentium.</p>
                    <a class="btn btn-warning btn-large" href="#">Ver</a>
                </div>
            </div>
<br>
<br>

<center>
<h1>Productos actualmente en venta</h1>
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

    $(function (){
        $('.carousel').carousel({
            interval:1000
        });
    });
    
</script>
<!--            <div class="row-fluid cajaproducto">
                <div class="span4">
                    <div class="boxsombra">
                        <h3>ROUTER1</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, enim aspernatur tempore voluptatem natus neque quasi molestiae. Porro, cupiditate, fuga odit esse deleniti ullam tenetur necessitatibus ut ratione laborum accusamus!
                         <a class="btn btn-warning btn-large" href="#">Comprar Ahora</a>
                        </p>
                    </div>
                </div>
                <div class="span4">
                    <div class="boxsombra">
                    <h3>ROUTER2</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, deserunt voluptate vitae mollitia aliquam non dolor cumque commodi nostrum blanditiis architecto corrupti quidem omnis tenetur odio at voluptatibus aspernatur rem.</p>
                      <a class="btn btn-warning btn-large" href="#">Comprar Ahora</a>
                    </div>
                </div>
                <div class="span4">
                    <div class="boxsombra">
                    <h3>ROUTER3</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, deserunt voluptate vitae mollitia aliquam non dolor cumque commodi nostrum blanditiis architecto corrupti quidem omnis tenetur odio at voluptatibus aspernatur rem.</p>
                  <a class="btn btn-warning btn-large" href="#">Comprar Ahora</a>
                    </div>
                </div>
            </div>

               <div class="row-fluid cajaproducto">
                <div class="span4">
                    <div class="boxsombra">
                        <h3>ROUTER1</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, enim aspernatur tempore voluptatem natus neque quasi molestiae. Porro, cupiditate, fuga odit esse deleniti ullam tenetur necessitatibus ut ratione laborum accusamus!                         
                        </p>
                        <a class="btn btn-warning btn-large" href="#">Comprar Ahora</a>
                    </div>
                </div>
                <div class="span4">
                    <div class="boxsombra">
                    <h3>ROUTER2</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, deserunt voluptate vitae mollitia aliquam non dolor cumque commodi nostrum blanditiis architecto corrupti quidem omnis tenetur odio at voluptatibus aspernatur rem.</p>
                      <a class="btn btn-warning btn-large" href="#">Comprar Ahora</a>
                    </div>
                </div>
                <div class="span4">
                    <div class="boxsombra">
                    <h3>ROUTER3</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, deserunt voluptate vitae mollitia aliquam non dolor cumque commodi nostrum blanditiis architecto corrupti quidem omnis tenetur odio at voluptatibus aspernatur rem.</p>
                  <a class="btn btn-warning btn-large" href="#">Comprar Ahora</a>
                    </div>
                </div>
            </div>

-->
</div>



        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
</body>
</html>