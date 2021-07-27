<?php 

	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'market';

	$conection = mysqli_connect($host, $user, $pass, $db);

	if(!$conection){

		echo "Error: No se ha podido establecer la conexión a la base de datos";

	}

 ?>