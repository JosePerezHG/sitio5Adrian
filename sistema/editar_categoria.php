<?php 

	include "../conexion.php";

	if(!empty($_POST)) {

		$alert = '';

		if(empty($_POST['txtcategoria'])) {

			$alert = '<p class="alerta">Todos los campos son obligatorios</p>';

	} else {

		$idCategoria = $_POST['idcategoria'];

		$categoria = $_POST['txtcategoria'];

		$query = mysqli_query($conection, "SELECT * FROM categorias WHERE categoria = '$categoria'");

		$resultado = mysqli_num_rows($query);

		if ($resultado > 0) {

			$alert = '<p class="alerta">La categoría ya existe</p>';

		} else {

		$query_insert = mysqli_query($conection, "UPDATE categorias SET categoria = '$categoria' WHERE id_categoria = '$idCategoria'");

		if ($query_insert) {

			$alert = '<p class="alerta">La categoría se ha actualizado</p>';

		} else {

			$alert = '<p class="alerta">Error al actualizar</p>';

				}
			}	
		}
	}

	//Mostrando datos de la categoría

	if (empty($_GET['id'])) {

		header('Location: listado_categorias.php');

	}

	$id_categoria = $_GET['id'];

	$sql = mysqli_query($conection, "SELECT * FROM categorias WHERE id_categoria = $id_categoria");

	$resultado_sql = mysqli_num_rows($sql);

	if ($resultado_sql == 0) {

		header('Location: listado_categorias.php');

	} else {

		while ($datos = mysqli_fetch_array($sql)) {

			$id_cat = $datos['id_categoria'];
			$categoria = $datos['categoria'];

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

			<font color="#7A7A7A"><h1 align="center"><i class="fas fa-pencil-alt"></i> Editar categoría</h1>
			</font>

			</br>

			<hr>

			</br>

			<form method="POST" action="" class="nuevoProducto">

				<input type="text" hidden="hidden" name="idcategoria" value="<?php echo $id_categoria ?>">

				<label for="txtdescripcion">Nombre de categoría</label>
				<br>
				<input type="text" name="txtcategoria" value="<?php echo $categoria ?>">
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