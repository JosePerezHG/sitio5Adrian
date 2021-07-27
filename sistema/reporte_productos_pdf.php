<?php 

	include 'pdf/conexion.php';

	include '/pdf/plantilla.php';

	$query = "SELECT p.id_producto, p.descripcion, p.cantidad, p.precio, c.categoria FROM productos p INNER JOIN categorias c ON p.categoria = c.id_categoria";

	$resultado = $mysqli->query($query);

	$pdf = new PDF();

	$pdf -> AliasNbPages();

	$pdf -> AddPage();

	$pdf -> SetFillColor(232,232,232);

	$pdf -> SetFont('Arial','B','13');

	$pdf -> Cell(20,6,'Codigo',1,0,'C',1);

	$pdf -> Cell(95,6,'Descripcion',1,0,'C',1);

	$pdf -> Cell(40,6,'Cantidad',1,0,'C',1);

	$pdf -> Cell(35,6,'Precio',1,1,'C',1);

	while ($row = $resultado->fetch_assoc()) {

		$pdf -> Cell(20,6,$row['id_producto'],1,0,'C');

		$pdf -> Cell(95,6,utf8_decode($row['descripcion']),1,0,'J');

		$pdf -> Cell(40,6,$row['cantidad'],1,0,'C');

		$pdf -> Cell(35,6,$row['precio'],1,1,'J',0);

	}

	$pdf -> Output();

 ?>