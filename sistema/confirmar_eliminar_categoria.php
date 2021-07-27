<?php 

	include '../conexion.php';

	if (!empty($_POST)) {

		$idCategoria = $_POST['id_categoria'];

		//$query_eliminar = mysqli_query($conection, "DELETE FROM productos WHERE id_producto = $idProducto");

		$query_eliminar = mysqli_query($conection, "UPDATE categorias SET estado_cat = 0 WHERE id_categoria = $idCategoria");

		if ($query_eliminar) {

			header('Location: listado_categorias.php');

		} else { ?>

			<script type="text/javascript">
   			 alert('No se ha podido eliminar');
  			</script>

		<?php }

	} 

	if (empty($_REQUEST['id'])) {

		header('Location: listado_categorias.php');

	} else {

		$id_categoria = $_GET['id'];

		$query = mysqli_query($conection, "SELECT id_categoria, categoria FROM categorias WHERE id_categoria = $id_categoria;");

		$resultado = mysqli_num_rows($query);

		if ($resultado > 0) {

			while ($datos = mysqli_fetch_array($query)) {

				$categoria = $datos['categoria'];

			}
				
		} else {

				header('Location: listado_categorias.php');

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
			<p align="center"><img src="img/eliminar.png" width="300" height="280">
				</p>
			</br>
				<font face="Arial"><p align="justify">
					<div class="formularioEliminar">
						<h2>¿Está seguro de eliminar el siguiente registro?</h2>
						<p>Descripción: <span></span><?php echo $categoria; ?></p>
						<br>
						<form method="POST" action="">

							<input type="text" hidden="hidden" name="id_categoria" value="<?php echo $id_categoria ?>">							
							<a href="listado_categorias.php">
							<input class="btn_cancelar" type="button" value="Cancelar"></a>
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