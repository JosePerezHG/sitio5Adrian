<?php 

	session_start();

	if(empty($_SESSION['active'])){

		header('Location: ../');

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
		<?php

		$usuario = "";

		?>
		<br>
		<font face="Bitstream Vera Sans Mono" size="6" color="#525252"><i class="far fa-building"></i> BIENVENIDO AL SISTEMA,

		<?php if ($_SESSION['user'] == 'admin'){

			$usuario = $_SESSION['user'];

		} else {

			$usuario = $_SESSION['nombre'];

		} 

		echo $usuario;

		?>
		</font>
		<br>
		<br>
		<hr>

	</div>

</body>