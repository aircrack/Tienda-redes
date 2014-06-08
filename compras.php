<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Catalog</title>

              <link rel="stylesheet" href="css/bootstrap.css">
   <link rel="stylesheet" href="css/bootstrap.min.css">
         <link rel="stylesheet" href="css/bootstrap-responsive.css">
         <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
   
        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script> 
        <script src="js/bootstrap.js"></script> 
        <script src="js/jquery-1.8.3.min.js"></script> 

<link rel="stylesheet" type="text/css" href="css/estilos.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script type="text/javascript"  href="js/scripts.js"></script>



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

<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <a class="brand"> <strong>Administración</strong></a>
    <ul class="nav">
    <li  class="active"><a href="../index.php">Inicio</a></li>
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
include "conexion.php";

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
      ?>

            <div class="row">
            <div class="span12">
                <center>
                <br> <br><br><br>
                <h1>Productos que seleccionaste para comprar</h1>
            </center>
            <p>Hola <?echo $nombre?> muchas gracias por comprar aquí te mando los detalles de tu compra</p>
            <p>Lista de Artículos<br>
                <?php echo $tabla ?>
                <br>
                Total del pago es: <?php echo $total ?> 

            </p>
            </div>
            </div>

       <?php
        unset($_SESSION['carrito']);

        

?>
        </div>

  




        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
</body>
</html>