<?php 

	include '../conexion.php';

	if (!empty($_POST)) {

		$alert = '';

		if (empty($_POST['txtcategoria'])) {

			$alert = '<p class="alerta">El campo es obligatorio</p>';

		} else {

			$categoria = $_POST['txtcategoria'];

			$query = mysqli_query($conection, "SELECT * FROM categorias WHERE categoria = '$categoria'");

			$resultado = mysqli_num_rows($query);

			if ($resultado > 0) {

				$alert = '<p class="alerta">La categoría ya existe</p>';

			} else {

				$query_insert = mysqli_query($conection, "INSERT INTO categorias (id_categoria, categoria) VALUES ('NULL', 
					'$categoria')");

				if ($query_insert) {

					$alert = '<p class="alerta">Se ha agregado el registro</p>';

				} else {

					$alert = '<p class="alerta">Error al crear nueva categoría</p>';

				}

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
		<div class="formularioNuevaCategoria">

			</br>

			<font color="#7A7A7A"><h1 align="center"><i class="fas fa-plus-circle"></i>Agregar nueva categoría</h1>
			</font>

			</br>

			<hr>

			</br>

			<form method="POST" action="" class="nuevaCategoria">

				<label for="txtcategoria">Nombre de la categoría: </label>
				<br>
				<input type="text" name="txtcategoria" placeholder="Categoría">
				<br>
				<br>
				<input type="submit" name="btnregistrar" class="btnregistrar" value="Registrar categoría">
				<br>
				<br>
				<div><?php echo isset($alert)? $alert : ''; ?></div>
				<br>
			</form>
		</div>	
	</div>
</body>