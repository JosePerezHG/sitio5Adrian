<?php 

	include "../conexion.php";

	if(!empty($_POST)) {

		$alert = '';

		if(empty($_POST['txtdescripcion']) || empty($_POST['txtprecio']) || empty($_POST['txtcantidad']) || empty($_POST['slctcategoria'])) {

			$alert = '<p class="alerta">Todos los campos son obligatorios</p>';

	} else {

		$descripcion = $_POST['txtdescripcion'];
		$precio = $_POST['txtprecio'];
		$cantidad = $_POST['txtcantidad'];
		$categoria = $_POST['slctcategoria'];

		$query_insert = mysqli_query($conection, "INSERT INTO productos (id_producto,descripcion,precio,cantidad,categoria)VALUES ('NULL','$descripcion','$precio','$cantidad','$categoria')");

		if ($query_insert) {

			$alert = '<p class="alerta">El producto se ha registrado</p>';

		} else {

			$alert = '<p class="alerta">Error al registrar</p>';

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

			<font color="#7A7A7A"><h1 align="center">Agregar nuevo producto</h1>
			</font>

			</br>

			<hr>

			</br>

			<form method="POST" action="" class="nuevoProducto">

				<label for="txtdescripcion">Nombre de producto:</label>
				<br>
				<input type="text" name="txtdescripcion" placeholder="Descripción">
				<br>
				<br>
				<label for="txtprecio">Precio:</label>
				<br>
				<input type="text" name="txtprecio" placeholder="Precio">
				<br>
				<br>
				<label for="txtcantida">Cantidad:</label>
				<br>
				<input type="text" name="txtcantidad" placeholder="Cantidad">
				<br>
				<br>
				<label for="slctcategoria">Categoria:</label>
				<br>

				<?php 

					$query_categoria = mysqli_query($conection, "SELECT * FROM categorias");

					$resultado_categoria = mysqli_num_rows($query_categoria);

				 ?>

				<select name="slctcategoria">

					<option value="">Seleccione: </option>

					<?php if ($resultado_categoria > 0) {

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