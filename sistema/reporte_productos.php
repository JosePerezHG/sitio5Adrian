<?php 

	include '../conexion.php';

 ?>
 
<?php 

	include 'includes/scripts.php';

 ?>

<?php 

	include 'includes/header.php';

 ?>

<body>
	
	<div class="contenido">
		
		<div class="formularioListProductos">
			<font color="#7A7A7A">
				<h1 class="titulo"><i class="fas fa-print"></i> Reporte de productos</h1>
				<a href="reporte_productos_pdf.php"><input type="button" name="btnimpresion" class="btnImpresion" value="Reporte para impresión"></a>
			</font>
			<br>
			<hr>
			<form method="POST">
				
				<table>
					<?php $i=1; ?>
					<tr>
						<th>Nº</th>
						<th>Descripción</th>
						<th>Categoría</th>
						<th>Precio</th>
						<th>Cantidad</th>
					</tr>

					<?php

					$query = mysqli_query($conection, "SELECT p.id_producto, p.descripcion, p.precio, p.cantidad, c.categoria FROM productos p INNER JOIN categorias c ON p.categoria = c.id_categoria WHERE estado = 1 AND estado_cat = 1");

					$resultado = mysqli_num_rows($query);

					if ($resultado > 0) {

						while ($datos = mysqli_fetch_array($query)){ ?>

					<tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $datos["descripcion"]; ?></td>
						<td><?php echo $datos["categoria"]; ?></td>
						<td><?php echo $datos["precio"]; ?></td>
						<td><?php echo $datos["cantidad"]; ?></td>
						
					</tr>

					<?php	

						}
					}
				?>
				</table>
			</form>
			</div>
		</div>
	</div>
</body>