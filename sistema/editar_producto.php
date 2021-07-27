<?php 

	include "../conexion.php";

	if(!empty($_POST)) {

		$alert = '';

		if(empty($_POST['txtdescripcion']) || empty($_POST['txtprecio']) || empty($_POST['txtcantidad']) || empty($_POST['slctcategoria'])) {

			$alert = '<p class="alerta">Todos los campos son obligatorios</p>';

	} else {

		$idProducto = $_POST['idproducto'];
		$descripcion = $_POST['txtdescripcion'];
		$precio = $_POST['txtprecio'];
		$cantidad = $_POST['txtcantidad'];
		$categoria = $_POST['slctcategoria'];

		$query_modificar = mysqli_query($conection, "UPDATE productos SET descripcion = '$descripcion', precio = '$precio', 
			cantidad = '$cantidad', categoria = '$categoria' WHERE id_producto = $idProducto");

		if ($query_modificar) {

			$alert = '<p class="alerta">El producto se ha actualizado</p>';

		} else {

			$alert = '<p class="alerta">Error al actualizar</p>';

		}
	}
}

	//Mostrando datos del productos

	if (empty($_GET['id'])) {

		header('Location: listado_productos.php');

	} 

		$id_producto = $_GET['id'];

		$sql = mysqli_query($conection, "SELECT p.id_producto, p.descripcion, p.precio, p.cantidad, (c.categoria) as categoria, (p.categoria) as idCat FROM productos p INNER JOIN categorias c ON p.categoria = c.id_categoria WHERE id_producto = $id_producto;");

		$resultado_sql = mysqli_num_rows($sql);

	if ($resultado_sql == 0) {

			header('Location: listado_productos.php');

		} else {

			$opcion = "";

			while ($datos = mysqli_fetch_array($sql)) {

				$idproducto = $datos['id_producto'];
				$descripcion = $datos['descripcion'];
				$precio = $datos['precio'];
				$cantidad = $datos['cantidad'];
				$categoria = $datos['categoria'];
				$id_categoria = $datos['idCat'];

				if ($id_categoria == 1) {

					$opcion = '<option value="'.$id_categoria.'" select>'.$categoria.'</option>';

				}

				else if ($id_categoria == 2){

					$opcion = '<option value="'.$id_categoria.'" select>'.$categoria.'</option>';

				}

				else if ($id_categoria == 3){

					$opcion = '<option value="'.$id_categoria.'" select>'.$categoria.'</option>';

				}

				else if ($id_categoria == 4){

					$opcion = '<option value="'.$id_categoria.'" select>'.$categoria.'</option>';

				}

				else if ($id_categoria == 5){

					$opcion = '<option value="'.$id_categoria.'" select>'.$categoria.'</option>';

				}

				else if ($id_categoria == 6){

					$opcion = '<option value="'.$id_categoria.'" select>'.$categoria.'</option>';

				}

			}

		}

?>

<?php 

	include 'includes/scripts.php';

 ?>

<?php 

	include 'includes/header.php';

 ?>

<body>
	
	<div class="contenido">
		<div class="formularioNuevoProducto">

			</br>

			<font color="#7A7A7A"><h1 align="center"><i class="fas fa-pencil-alt"></i> Editar producto</h1>
			</font>

			</br>

			<hr>

			</br>

			<form method="POST" action="" class="nuevoProducto">

				<input type="text" hidden="hidden" name="idproducto" value="<?php echo $id_producto; ?>">

				<label for="txtdescripcion">Nombre de producto:</label>
				<br>
				<input type="text" name="txtdescripcion" value="<?php echo $descripcion; ?>">
				<br>
				<br>
				<label for="txtprecio">Precio:</label>
				<br>
				<input type="text" name="txtprecio" value="<?php echo $precio; ?>">
				<br>
				<br>
				<label for="txtcantida">Cantidad:</label>
				<br>
				<input type="text" name="txtcantidad" value="<?php echo $cantidad; ?>">
				<br>
				<br>
				<label for="slctcategoria">Categoria:</label>
				<br>

				<?php 

					$query_categoria = mysqli_query($conection, "SELECT * FROM categorias");

					$resultado_categoria = mysqli_num_rows($query_categoria);

				 ?>

				<select name="slctcategoria">

				<?php 

					echo $opcion;

					if ($resultado_categoria > 0) {

						while ($cat = mysqli_fetch_array($query_categoria)) { ?>

							<option value="<?php echo $cat["id_categoria"] ?>"><?php echo $cat["categoria"] ?></option>

					<?php }

				} ?>

				</select>
				<br>
				<br>
				<input type="submit" name="btnregistrar" class="btnregistrar" value="Registrar producto">
				<br>
				<br>
				<div class="alert"><?php echo isset($alert)? $alert : ''; ?></div>
				<br>
			</form>
		</div>	
	</div>
</body>