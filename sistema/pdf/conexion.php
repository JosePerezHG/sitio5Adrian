<?php 

	$mysqli = new mysqli('localhost','root','95553678','market');

	if ($mysqli->connect_error) {
		
		die('Error en la conexion' . $mysqli->connect_error);

	}

 ?>