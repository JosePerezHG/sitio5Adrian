<?php 

	include "../conexion.php";

	if(!empty($_POST)){

		$alert = '';

		if(empty($_POST['txtnombres']) || empty($_POST['txtusuario']) || empty($_POST['txtemail']) || empty($_POST['slctprivilegio'])) {

			$alert = '<p class="alerta">Todos los campos son obligatorios</p>';

		} else {

			$idUsuario = $_POST['id_usuario'];
			$nombres = $_POST['txtnombres'];
			$usuario = $_POST['txtusuario'];
			$contra = md5($_POST['txtpass']);
			$email = $_POST['txtemail'];
			$privilegio = $_POST['slctprivilegio'];



			$query = mysqli_query($conection, "SELECT * FROM usuarios WHERE (usuario = '$usuario' AND id_usuario != $idUsuario) OR (email = '$email' AND id_usuario != $idUsuario);");

			$resultado = mysqli_num_rows($query);

			if ($resultado > 0) {

				$alert = '<p class="alerta">El usuario o email ya existe</p>';
				
			} else {

				if (empty($_POST['txtpass'])) {

					$query_modificar = mysqli_query($conection, "UPDATE usuarios SET usuario = '$usuario', nombres = '$nombres', email = '$email', privilegio = '$privilegio', estado_user = 1 WHERE id_usuario = '$idUsuario'");

				} else {

					$query_modificar = mysqli_query($conection, "UPDATE usuarios SET usuario = '$usuario', pass = '$contra', nombres = '$nombres', email = '$email', privilegio = '$privilegio' WHERE id_usuario = '$idUsuario'");

				}

				if ($query_modificar) {

					$alert = '<p class="alerta">El usuario se ha modificado</p>';

				} else {

					$alert = '<p class="alerta">Error modificar el registro</p>';

				}
			}
		}
	}

	//Mostrando los datos del usuario

	if (empty($_REQUEST['id'])) {

		header('Location: listado_usuarios.php');

	}

	$id_usuario = $_GET['id'];

	$query = mysqli_query($conection, "SELECT u.nombres, u.usuario, u.email, (u.privilegio) as id_privilegio, (p.privilegio) as privilegio FROM usuarios u INNER JOIN privilegios p ON u.privilegio = p.id_privilegio WHERE id_usuario = $id_usuario");

	$resultado = mysqli_num_rows($query);

	if ($resultado == 0) {

		header('Location: listado_usuarios.php');

	} else {

		$option = "";

		while ($datos = mysqli_fetch_array($query)) {

			$nombres = $datos['nombres'];
			$usuario = $datos['usuario'];
			$email = $datos['email'];
			$id_privilegio = $datos['id_privilegio'];
			$privilegio = $datos['privilegio'];

			if ($id_privilegio == 1) { 

				$opcion = '<option value="'.$id_privilegio.'" select>'.$privilegio.'</option>';

			}

			elseif ($id_privilegio == 2) { 

				$opcion = '<option value="'.$id_privilegio.'" select>'.$privilegio.'</option>';

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

			<font color="#7A7A7A"><h1 align="center"><i class="fas fa-pencil-alt"></i> Editar usuario</h1>
			</font>

			</br>

			<hr>

			</br>

			<form method="POST" action="" class="nuevoProducto">

				<input type="text" hidden="hidden" name="id_usuario" value="<?php echo $id_usuario ?>">

				<label for="txtnombres">Nombres y apellidos: </label>
				<br>
				<input type="text" name="txtnombres" value="<?php echo $nombres ?>">
				<br>
				<br>
				<label for="txtusuario">Usuario:</label>
				<br>
				<input type="text" name="txtusuario" value="<?php echo $usuario ?>">
				<br>
				<br>
				<label for="txtpass">Contraseña:</label>
				<br>
				<input type="password" name="txtpass" placeholder="Contraseña">
				<br>
				<br>
				<label for="txtemail">Email:</label>
				<br>
				<input type="text" name="txtemail" value="<?php echo $email ?>">
				<br>
				<br>
				<label for="slctprivilegio">Privilegio:</label>
				<br>

				<?php 

					$query_privilegio = mysqli_query($conection, "SELECT * FROM privilegios");

					$resultado_privilegio = mysqli_num_rows($query_privilegio);

				 ?>

				<select name="slctprivilegio">

				<?php 

					echo $opcion;

					if ($resultado_privilegio > 0) {

						while ($priv = mysqli_fetch_array($query_privilegio)) { ?>

							<option value="<?php echo $priv["id_privilegio"] ?>"><?php echo $priv["privilegio"] ?></option>

					<?php }

				} ?>

				</select>
				<br>
				<br>
				<input type="submit" name="btnregistrar" class="btnregistrar" value="Modificar usuario">
				<br>
				<br>
				<div class="alert"><?php echo isset($alert)? $alert : ''; ?></div>
				<br>
			</form>
		</div>	
	</div>
</body>