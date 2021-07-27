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
		
		<div class="formularioListUsuarios">
			<br>
			<font color="#7A7A7A">
				<h1>Listado de Usuarios</h1>
			</font>
			<br>
			<hr>
			<form method="">
				
				<table>
					<?php $i=1; ?>
					<tr>
						<th>Nº</th>
						<th>Usuario</th>
						<th>Nombres</th>
						<th>Email</th>
						<th>Privilegios</th>
						<th>Acción</th>
					</tr>

					<?php 

					//Paginador

					$sql_registro = mysqli_query($conection, "SELECT COUNT(id_usuario) as total_usuarios FROM usuarios;");

					$resultado_registro = mysqli_fetch_array($sql_registro);

					$total_registro = $resultado_registro['total_usuarios'];

					$por_pagina = 7;

					if (empty($_GET['pagina'])) {

						$pagina = 1;

					} else {

						$pagina = $_GET['pagina'];

					}

					$desde = ($pagina - 1) * $por_pagina;

					$total_paginas = ceil($total_registro / $por_pagina);

					//Fin paginador

					$query = mysqli_query($conection, "SELECT u.id_usuario, u.usuario, u.nombres, u.email, p.privilegio FROM usuarios u INNER JOIN privilegios p ON u.privilegio = p.id_privilegio WHERE estado_user = 1 ORDER BY u.id_usuario ASC LIMIT $desde, $por_pagina;");

					$resultado = mysqli_num_rows($query);

					if ($resultado > 0) {

						while ($datos = mysqli_fetch_array($query)){ ?>

					<tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $datos["usuario"]; ?></td>
						<td><?php echo $datos["nombres"]; ?></td>
						<td><?php echo $datos["email"]; ?></td>
						<td><?php echo $datos["privilegio"]; ?></td>
						<td><a class="btn_editar" href="editar_usuario.php?id=<?php echo $datos['id_usuario']; ?>"><i class="fas fa-edit"></i>Editar</a>

							<?php if($datos["privilegio"] == 'Administrador'){ 

							} else { ?>

							<a class="btn_eliminar" href="confirmar_eliminar_usuario.php?id=<?php echo $datos['id_usuario']; ?>"><i class="fas fa-trash-alt"></i>Eliminar</a></td>

						<?php }

					?>
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