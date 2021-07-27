<?php 

	session_start();

	$alert = '';

	if(!empty($_SESSION['active'])){

		header('Location: sistema/');

	} else {

	if(!empty($_POST)){

		if(empty($_POST['txtuser']) || empty($_POST['txtpass'])){

			$alert = 'Llene los espacios que se requiere';

		} else {

			require_once 'conexion.php';

			$user = mysqli_real_escape_string($conection, $_POST['txtuser']);

			$pass = md5(mysqli_real_escape_string($conection, $_POST['txtpass']));

			$query = mysqli_query($conection, "SELECT * FROM usuarios WHERE usuario = '$user' AND pass = '$pass'");

			$respuesta = mysqli_num_rows($query);

			if ($respuesta > 0) {

				$datos = mysqli_fetch_array($query);

				$_SESSION['active'] = true;

				$_SESSION['idUser'] = $datos['id_usuario'];

				$_SESSION['user'] = $datos['usuario'];

				$_SESSION['nombre'] = $datos['nombres'];

				$_SESSION['contra'] = $datos['pass'];

				$_SESSION['priv'] = $datos['privilegio'];

				header('Location: sistema/ ');

			} else {

				$alert = 'Los datos ingresados son incorrectos';

				session_destroy();

				}

			}

		}
	}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sistema informático</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body background="https://backgroundcheckall.com/wp-content/uploads/2017/12/responsive-background-image-10.jpg">
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-90 p-b-30">
				<form class="login100-form validate-form" method="POST">
					<p align="center"><font size="6">Iniciar sesión</font></p>
					<div class="text-center p-t-55 p-b-30"></div>
					<div>
						<input class="input100" type="text" name="txtuser" placeholder="Usuario">
						<span class="focus-input100"></span>
					</div>
					</br>
					<div>
						</span>
						<input class="input100" type="password" name="txtpass" placeholder="Contraseña">
						<span class="focus-input100"></span>
					</br>
						<div align="center"><?php echo isset($alert)? $alert : ''; ?></div>
					</div>
					</br>
				  <div class="container-login100-form-btn">
                  <input name="submit" type="submit" class="login100-form-btn" id="submit" value="Ingresar">
		
					</div>

					</div>
					
				</form>
			</div>
		</div>
	</div>
	
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>