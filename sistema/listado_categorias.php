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
		
		<div class="formularioListCategorias">
			<br>
			<font color="#7A7A7A">
				<h1><i class="fas fa-clipboard-list"></i> Listado de categorías</h1>
			</font>
			<br>
			<hr>
			<form>
				
				<table>
					<?php $i=1; ?>
					<tr>
						<th>Nº</th>
						<th>Categoría</th>
						<th>Acción</th>
					</tr>

					<?php 

					//Paginador

					$sql_registro = mysqli_query($conection, "SELECT COUNT(id_categoria) as total_categorias FROM categorias;");

					$resultado_registro = mysqli_fetch_array($sql_registro);

					$total_registro = $resultado_registro['total_categorias'];

					$por_pagina = 5;

					if (empty($_GET['pagina'])) {

						$pagina = 1;

					} else {

						$pagina = $_GET['pagina'];

					}

					$desde = ($pagina - 1) * $por_pagina;

					$total_paginas = ceil($total_registro / $por_pagina);

					//Fin paginador

					$query = mysqli_query($conection, "SELECT id_categoria, categoria FROM categorias WHERE estado_cat = 1 ORDER BY id_categoria LIMIT $desde, 
						$por_pagina;");

					$resultado = mysqli_num_rows($query);

					if ($resultado > 0) {

						while ($datos = mysqli_fetch_array($query)){ ?>

					<tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $datos["categoria"]; ?></td>
						<td><a class="btn_editar" href="editar_categoria.php?id=<?php echo $datos['id_categoria']; ?>"><i class="fas fa-edit"></i>Editar</a>
							<a class="btn_eliminar" href="confirmar_eliminar_categoria.php?id=<?php echo $datos['id_categoria']; ?>"><i class="fas fa-trash-alt"></i>Eliminar</a></td>
					</tr>

				<?php 

						}

					}

				?>

				</table>
			</form>
			<div class="paginador">
					<ul>

						<?php 

							if ($pagina != 1) { ?>

						<li><a href="?pagina=<?php echo 1; ?>">|<</a></li>
						<li><a href="?pagina=<?php echo $pagina-1; ?>"><<</a></li>

						<?php 

							}

							for ($i=1; $i <= $total_paginas ; $i++) { 

								if ($i == $pagina) {

								echo '<li class="paginaSelected">'.$i.'</li>';	

								} else {

								echo '<li><a href="?pagina='.$i.'">'.$i.'</a></li>';
							
								}

							}

							if ($pagina != $total_paginas) { ?>

						<li><a href="?pagina=<?php echo $pagina + 1; ?>">>></a></li>
						<li><a href="?pagina=<?php echo $total_paginas; ?>">|></a></li>

					<?php } ?>

					</ul>
			</div>
		</div>
	</div>
</body>