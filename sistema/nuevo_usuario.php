<?php 

	include "../conexion.php";

	if(!empty($_POST)) {

		$alert = '';

		if(empty($_POST['txtnombres']) || empty($_POST['txtuser']) || empty($_POST['txtpass']) || empty($_POST['txtemail'])
		|| empty($_POST['slctprivilegio'])) {

			$alert = '<p class="alerta">Todos los campos son obligatorios</p>';

		} else {

			$nombres = $_POST['txtnombres'];
			$usuario = $_POST['txtuser'];
			$pass = md5($_POST['txtpass']);
			$email = $_POST['txtemail'];
			$privilegio = $_POST['slctprivilegio'];

			$query = mysqli_query($conection, "SELECT * FROM usuarios WHERE usuario = '$usuario' OR email = '$email'");

			$resultado = mysqli_num_rows($query);

			if ($resultado > 0) {

				$alert = '<p class="alerta">El usuario o email ya existe</p>';

			} else {

				$query_insertando = mysqli_query($conection, "INSERT INTO usuarios(usuario, pass, nombres, email, privilegio) VALUES ('$usuario','$pass','$nombres','$email','$privilegio');");

				if ($query_insertando) {

					$alert = '<p class="alerta">Se ha registrado el usuario</p>';

				} else {

					$alert = '<p class"alerta">Error al registrar</p>';

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
		<div class="formularioNuevoProducto">

			</br>

			<font color="#7A7A7A"><h1 align="center"><i class="fas fa-user-plus"></i> Agregar nuevo usuario</h1>
			</font>

			</br>

			<hr>

			</br>

			<form method="POST" action="" class="nuevoProducto">

				<label for="txtnombres">Nombres y apellidos:</label>
				<br>
				<input type="text" name="txtnombres" placeholder="Nombres">
				<br>
				<br>
				<label for="txtuser">Usuario:</label>
				<br>
				<input type="text" name="txtuser" placeholder="Usuario">
				<br>
				<br>
				<label for="txtpass">Contraseña:</label>
				<br>
				<input type="password" name="txtpass" placeholder="Contraseña">
				<br>
				<br>
				<label for="txtemail">Email:</label>
				<br>
				<input type="text" name="txtemail" placeholder="Email">
				<br>
				<br>
				<label for="slctprivilegio">Privilegio:</label>
				<br>

				<?php 

					$query_privilegio = mysqli_query($conection, "SELECT * FROM privilegios");

					$resultado_privilegio = mysqli_num_rows($query_privilegio);

				 ?>

				<select name="slctprivilegio">

					<option value="">Seleccione: </option>

					<?php if ($resultado_privilegio > 0) {

						while ($priv = mysqli_fetch_array($query_privilegio)) { ?>

							<option value="<?php echo $priv["id_privilegio"]; ?>"><?php echo $priv["privilegio"]; ?></option>

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