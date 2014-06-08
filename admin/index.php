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
   
        <script src="../js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>	
        <script src="../js/bootstrap.js"></script> 
        <script src="../js/jquery-1.8.3.min.js"></script> 

        <style>
        body  {
  background: #1abc9c;
}</style>
</head>
<body>
	<br><br>
<?php
if ($_SESSION['nombre']=='administrador') {
 ?>
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


<div class="container">


<div class="row">
  <div class="span12">
 
          <div class="bs-docs-example">
            <div class="tabbable tabs-left">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#lA" data-toggle="tab">Usuarios registrados</a></li>
                <li><a href="#lB" data-toggle="tab">Productos mas vendidos</a></li>
                <li><a href="#lC" data-toggle="tab">Productos menos vendidos</a></li>
                 <li><a href="#lD" data-toggle="tab">Productos</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="lA">
                                      <div class="span9">
                <h3 class='text-info' align="center" id="registrados">Lista de usuarios registrados</h3>
                   <?php

                   $con = mysql_connect($host,$user,$pw) or die("Problema al conectar");
                   mysql_select_db($db,$con) or die("Problema al conectar la BD");
                  $result_set= mysql_query("Select nombre,email from usuarios;",$con);

                  print "<table class='table table-striped table-bordered table-hover table-condensed'>";
                  //Imprime las cabeceras
                  for ($c=0; $c<mysql_num_fields($result_set); $c++) {
                       print "<th class='text-warning'> <h4>". mysql_field_name($result_set, $c)." </h4></th>";
                     }   
                      print "<th class='text-warning'> <h4>Permisos</h4></th>";
                   
                  //Imprime todas las filas
                  while ($record=mysql_fetch_row($result_set)) {
                    print "<tr class='error'>";
                    for ($c=0; $c<mysql_num_fields($result_set); $c++) {
                       print "<td class='text-info'> <h4>". $record[$c]."</h4></td>" ;         
                   }
                   print "<td> <button type='button' class='btn btn-inverse btn-mini' href='#elimina' data-toggle='modal'>Eliminar</button></td>";
                    print "</tr>";
                   }
                   print "</table>";

                  ?>

                </div>
                </div>
                <div class="tab-pane" id="lB">
                  
                                          <div class="span9">
                          <h3 class='text-info' align="center" id="mas">Los productos mas vendidos  :D </h3>
                             <?php

                             $con = mysql_connect($host,$user,$pw) or die("Problema al conectar");
                             mysql_select_db($db,$con) or die("Problema al conectar la BD");
                            $result_set= mysql_query("select cantidad, subtotal,p.descripcion from renglon r join produtos p on r.produtos_id=p.id order by cantidad desc LIMIT 20",$con);

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
                </div>
                <div class="tab-pane" id="lC">
                                              <div class="span9">
                              <h3 class='text-info' align="center" id="menos">Productos no tan vendidos</h3>
                                 <?php

                                 $con = mysql_connect($host,$user,$pw) or die("Problema al conectar");
                                 mysql_select_db($db,$con) or die("Problema al conectar la BD");
                                $result_set= mysql_query("select cantidad, subtotal,p.descripcion from renglon r join produtos p on r.produtos_id=p.id order by cantidad asc LIMIT 20",$con);

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
                </div>
                  <div class="tab-pane" id="lD">
   <?php
$var="";
$var1="";
$var2="";
$var3="";

if(isset($_POST["btn"])){
$btn=$_POST["btn"];
$id=$_POST["id"];
$nom=$_POST["descripcion"];
$dir=$_POST["categoria"];
$ed=$_POST["precio"];

      if($btn=="Eliminar"){ 
      $sql="delete from clientes where id='$id'";
      
      $cs=mysql_query($sql,$cn);
      echo "<script> alert('Se elimino correctamente');</script>";
      }

    if($btn=="Agregar"){
    $sql="insert into clientes values ('$id','$nom','$dir','$ed')";
    
    $cs=mysql_query($sql,$cn);
    echo "<script> alert('Se insertó correctamente');</script>";
    }
      if($btn=="Buscar"){
      $sql="select * from clientes where id='$id'";
      $cs=mysql_query($sql,$cn);
      while($resul=mysql_fetch_array($cs)){
      $var=$resul[0];
      $var1=$resul[1];
      $var2=$resul[2];
      $var3=$resul[3];
      }
      }
    if($btn=="Actualizar"){
    $sql="update clientes set descripcion='$nom',categoria='$dir',precio='$ed' where id='$id'";
    $cs=mysql_query($sql,$cn);
    echo "<script> alert('Se actualizo correctamente');</script>";
    }

            }
?>
<div class="span2"> <br>
  <img src="../imagenes/admin1.jpg" alt="img de producto" class="img-rounded"> <br><br>
  <input type="submit"   value="Elegir imagen" class="btn btn-success">
</div>
<div class="span7">
   
  <form action="" method="post" name="form" class="control-group">
  <input type="text" name="id" value="<?php echo $var?>" placeholder="id"><br>
    <input type="text" name="descripcion" value="<?php echo $var1?>" placeholder="descripcion" class="form-control"><br>
    <input type="text" name="categoria" value="<?php echo $var2?>" placeholder="categoria" class="form-control"><br>
    <input type="text" name="precio" value="<?php echo $var3?>" placeholder="precio" class="form-control"><br>
    <input type="submit"  name="btn" value="Agregar" class="btn btn-success" class="form-control">
    <input type="submit"  name="btn" value="Eliminar" class="btn btn-danger" class="form-control">
    <input type="submit"  name="btn" value="Buscar" class="btn btn-success" class="form-control">
    <input type="submit"  name="btn" value="Actualizar" class="btn btn-success" class="form-control">
  </form>
 
</div>


                  </div>  
              </div>
            </div> <!-- /tabbable -->
          </div>
   <br> 
        </div>
 
</div>  
</div>


        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>

        <script src="../js/vendor/bootstrap.min.js"></script>
        <script src="../js/main.js"></script>
<?php
}
else
{
?>
<script language='javascript'> alert('No tienes permisos para estar aqui :('); 
  document.location=('../index.php');</script> 
  <?php     
}
 ?>  <br><br><br><br> <br>
 <div id="pie">
  <div class="container"> 
  <div class="row-fluid">
     <div class="span12">     
      <a rel="license" href="http://creativecommons.org/licenses/by/4.0/"><img alt="Licencia Creative Commons" style="border-width:0" src="http://i.creativecommons.org/l/by/4.0/88x31.png" /></a><br /><span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">Gadgets-Redes</span> por <a xmlns:cc="http://creativecommons.org/ns#" href="https://github.com/luisalfredomoctezuma/Tienda-redes/graphs/contributors" property="cc:attributionName" rel="cc:attributionURL">Luis Alfredo-Gerson-Luis Antonio-Joaquin</a> se distribuye bajo una <a rel="license" href="http://creativecommons.org/licenses/by/4.0/">Licencia Creative Commons Atribución 4.0 Internacional</a>.    
              <p>&copy; 2013 LAMoctezuma, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>              
    </div>
  </div>
  <div class="row-fluid">
    <div class="span6"> 
    <h5><a href="">Blog</a></h5>
    <h5><a href="">Documentacion</a></h5>
    <h5><a href="">Terminos y condiciones</a></h5>
    </div>
    <div class="span6"> 
    <h5>Puedes descargar y contribuir con el proyecto<a href="https://github.com/luisalfredomoctezuma/Tienda-redes">Github</a> </h5>
    <h5>Mira el proyecto en produccion en <a href="http://tienda-redes.herokuapp.com/">Heroku</a></h5>
    </div>
  </div>
  </div>
</div>


</body>
</html>