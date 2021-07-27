<?php session_start();

	if(empty($_SESSION['active'])) {

		header('Location: ../');

	}

 ?>
	<header>
		<nav class="navegacion">
			<div class="cabecera">Ferretería "Promart Center"
				<span>Perú, <?php echo fechaA(); ?></span>
			</div>
			<ul class="menu">
				<li><a href="index.php"><i class="fas fa-home"></i> Inicio</a></li>
				<li><a href="#"><i class="fas fa-archive"></i> Productos</a>
					<ul class="submenu">
						<li><a href="listado_productos.php"><i class="fas fa-list-alt"></i> Listado de productos</a></li>
						<li><a href="nuevo_producto.php"><i class="fas fa-plus"></i> Nuevo producto</a></li>
						<li><a href="listado_categorias.php"><i class="fas fa-list-ul"></i> Listado de categorías</a></li>
						<li><a href="nueva_categoria.php"><i class="fas fa-plus"></i> Nueva categoría</a></li>
						<li><a href="reporte_productos.php"><i class="fas fa-window-restore"></i> Reporte de productos</a></li>
					</ul>
				</li>
				<li><a href="#"><i class="fas fa-users"></i> Usuarios</a>
					<ul class="submenu">
						<li><a href="listado_usuarios.php"><i class="fas fa-server"></i> Listado de usuarios</a></li>
						<li><a href="nuevo_usuario.php"><i class="fas fa-user-plus"></i> Nuevo usuario</a></li>
					</ul>
				</li>
				<li><a href="#"><b><i class="fas fa-user"></i> <?php echo $_SESSION['user']; ?></b></a>
					<ul class="submenu">
						<li><a href="salir.php">Salir</a></li>
					</ul>
				<li><a href="about.php"><i class="fas fa-info-circle"></i> about</a></li>
			</ul>
		</nav>
	</header>