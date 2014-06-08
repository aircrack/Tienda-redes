<?php
	session_start();
	include 'conexion.php';
	$con = mysql_connect($host,$user,$pw) or die("Problema al conectar");
  mysql_select_db($db,$con) or die("Problema al conectar la BD");

	if(isset($_SESSION['carrito'])){


		if(isset($_GET['id'])){



					$arreglo=$_SESSION['carrito'];
					$encontro=false;
					$numero=0;


					for($i=0;$i<count($arreglo);$i++){
						if($arreglo[$i]['Id']==$_GET['id']){
							$encontro=true;
							$numero=$i;
						}
					}


					if($encontro==true){

						$arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
						$_SESSION['carrito']=$arreglo;

					}else{

						$descripcion="";
						$categoria="";
						$precio=0;
						$imagen="";
						$re=mysql_query("select * from productos where id=".$_GET['id']);
						while ($f=mysql_fetch_array($re)) {
                            $idd=$f['id'];
							$descripcion=$f['descripcion'];
							$categoria=$f['categoria'];
							$precio=$f['precio'];
							$imagen=$f['imagen'];
							

						}


						$datosNuevos=array('Id'=>$idd,
										'Nombre'=>$descripcion,
										'categoria'=>$categoria,
										'Precio'=>$precio,
										'Imagen'=>$imagen,
										'Cantidad'=>1);

						array_push($arreglo, $datosNuevos);
						$_SESSION['carrito']=$arreglo;

					}
		}




	}else{
		if(isset($_GET['id'])){
			$con = mysql_connect($host,$user,$pw) or die("Problema al conectar");
  mysql_select_db($db,$con) or die("Problema al conectar la BD");
			include 'conexion.php';
			$descripcion="";
			$categoria="";
			$precio=0;
			$imagen="";
			$re=mysql_query("select * from productos where id=".$_GET['id']);
			while ($f=mysql_fetch_array($re)) {
				$idd=$f['id'];
				$descripcion=$f['descripcion'];
				$categoria=$f['categoria'];
				$precio=$f['precio'];
				$imagen=$f['imagen'];
				
			}
			$arreglo[]=array('Id'=>$idd,
							'Nombre'=>$descripcion,
							'categoria'=>$categoria,
							'Precio'=>$precio,
							'Imagen'=>$imagen,
							'Cantidad'=>1);
			$_SESSION['carrito']=$arreglo;
		}
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Carrito de Compras</title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript"  src="js/scripts.js"></script>
</head>
<body>
	
	<section>
		<?php
			$total=0;
			if(isset($_SESSION['carrito'])){
			$datos=$_SESSION['carrito'];
			
			$total=0;
			for($i=0;$i<count($datos);$i++){
				
	?>
				<div class="producto">
					<center>
						<img src="./productos/<?php echo $datos[$i]['Imagen'];?>"><br>
						<span ><?php echo $datos[$i]['Nombre'];?></span><br>
						<span>Precio: <?php echo $datos[$i]['Precio'];?></span><br>
						<span>Cantidad: 
							<input type="text" value="<?php echo $datos[$i]['Cantidad'];?>"
							data-precio="<?php echo $datos[$i]['Precio'];?>"
							data-id="<?php echo $datos[$i]['Id'];?>"
							class="cantidad">
						</span><br>
						<span class="subtotal">Subtotal:<?php echo $datos[$i]['Cantidad']*$datos[$i]['Precio'];?></span><br>
						<a href="#" class="eliminar" data-id="<?php echo $datos[$i]['Id']?>">Eliminar</a>
					</center>
				</div>
			<?php
				$total=($datos[$i]['Cantidad']*$datos[$i]['Precio'])+$total;
			}
				
			}else{
				echo '<center><h2>No has añadido ningun producto</h2></center>';
			}
			echo '<center><h2 id="total">Total: '.$total.'</h2></center>';
			if($total!=0){
					//echo '<center><a href="./|compras/compras.php" class="aceptar">Comprar</a></center>';
			?>
				<form action="compras.php" method="post" id="formulario">
					<input type="hidden" name="cmd" value="_cart">
					<input type="hidden" name="upload" value="1">
					<input type="hidden" name="business" value="tu_correo_paypal@gmail.com">
					<input type="hidden" name="currency_code" value="MXN">
					
					<?php 
						for($i=0;$i<count($datos);$i++){
					?>
						<input type="hidden" name="item_name_<?php echo $i+1;?>" value="<?php echo $datos[$i]['Nombre'];?>">
						<input type="hidden" name="amount_<?php echo $i+1;?>" value="<?php echo $datos[$i]['Precio'];?>">
						<input	type="hidden" name="quantity_<?php echo $i+1;?>" value="<?php echo $datos[$i]['Cantidad'];?>">	
					<?php 
						}
					?>
						

					<center><input type="submit" value="comprar" class="aceptar" style="width:200px"></center>
			</form>
			<?php
			}
			
		?>
		<center><a href="catalogo.php">Ver catalogo</a></center>

		
	</section>
</body>
</html>