<?php 

	include '../conexion.php';

	if (!empty($_POST)) {

		$idProducto = $_POST['id_producto'];

		//$query_eliminar = mysqli_query($conection, "DELETE FROM productos WHERE id_producto = $idProducto");

		$query_eliminar = mysqli_query($conection, "UPDATE productos SET estado = 0 WHERE id_producto = $idProducto");

		if ($query_eliminar) {

			header('Location: listado_productos.php');

		} else { ?>

			<script type="text/javascript">
   			 alert('No se ha podido eliminar');
  			</script>

		<?php }

	}

	if (empty($_REQUEST['id'])) {

		header('Location: listado_productos.php');
	
	} else {

		$id_producto = $_GET['id'];

		$query = mysqli_query($conection, "SELECT p.descripcion, c.categoria FROM productos p INNER JOIN categorias c ON p.categoria = c.id_categoria WHERE id_producto = $id_producto;");

		$resultado = mysqli_num_rows($query);

		if ($resultado > 0) {

			while ($datos = mysqli_fetch_array($query)) {

				$descripcion = $datos['descripcion'];
				$categoria = $datos['categoria'];

			}

		} else {

			header('Location: listado_productos.php');

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
		<div class="about">	
			<br>
			<p align="center"><font size="5" color="#7A7A7A"><i class="fas fa-trash-alt"></i> Eliminar producto</font></p>	
			<br>
			<p align="center"><img src="img/eliminar.png" width="245" height="230">
			</p>
			</br>
				<font face="Arial"><p align="justify">
					<div class="formularioEliminar">
						<h2>¿Está seguro de eliminar el siguiente registro?</h2>
						<br>
						<p>Descripción: <span><?php echo $descripcion; ?></span></p>
						<p>Categoría: <span><?php echo $categoria; ?></span></p>
						<br>
						<form method="POST" action="">

							<input type="text" hidden="hidden" name="id_producto" value="<?php echo $id_producto; ?>">							
							<a href="listado_productos.php"><input class="btn_cancelar" type="button" value="Cancelar"></a>
							<input class="btn_aceptar" type="submit" name="" value="Aceptar">

						</form>

					</div>
					</br>
					</br>
				</font>
			</p>
		</div>
	</div>
</body>