<?php 

	include '../conexion.php';

	if ($_GET['id'] == 1) {

		header('Location: listado_usuarios.php');

	}

		if (!empty($_POST)) {

			$idUsuario = $_POST['id_usuario'];

			$query_eliminar = mysqli_query($conection, "UPDATE usuarios SET estado_user = 0 WHERE id_usuario = $idUsuario");

			if ($query_eliminar) {

				header('Location: listado_usuarios.php');

			} else { ?>

				<script type="text/javascript">
					alert('No se ha podido eliminar el registro');
				</script>

		<?php  }

		}

		//Mostrando los datos del usuario

		if (empty($_GET['id'])) {

			header('Location: listado_usuarios.php');

		} else {

			$id_usuario = $_GET['id'];

			$query = mysqli_query($conection, "SELECT u.usuario, u.nombres, p.privilegio FROM usuarios u INNER JOIN privilegios p ON u.privilegio = p.id_privilegio WHERE id_usuario = $id_usuario;");

			$resultado = mysqli_num_rows($query);

			if ($resultado > 0) {

				while ($datos = mysqli_fetch_array($query)) {

					$usuario = $datos['usuario'];
					$nombres = $datos['nombres'];
					$privilegio = $datos['privilegio'];

				}

			} else {


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
			<p align="center"><font size="5" color="#7A7A7A"><i class="fas fa-trash-alt"></i> Eliminar usuario</font></p>	
			<br>
			<p align="center"><img src="img/eliminar.png" width="245" height="230">
				</p>
			</br>
				<font face="Arial"><p align="justify">
					<div class="formularioEliminar">
						<h2>¿Está seguro de eliminar el siguiente registro?</h2>
						<br>
						<p>Usuario: <span><?php echo $usuario; ?></span></p>
						<p>Nombres: <span><?php echo $nombres; ?></span></p>
						<p>Privilegio: <span><?php echo $privilegio; ?></span></p>
						<br>
						<form method="POST" action="">

							<input type="text" name="id_usuario" hidden="hidden" value="<?php echo $id_usuario; ?>">						
							<a href="listado_usuarios.php"><input class="btn_cancelar" type="button" value="Cancelar"></a>
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