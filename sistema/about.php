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
		<div class="about">		
			<p align="center"><img src="img/about.png" width="300" height="300">
				</p>
			</br>
				<font face="Arial"><p align="justify">
					<label>1. Adrián Edinson Meza Muñoz</label>

					</br>
					</br>

					<label>2. Billy Huaroc Gonzales</label>

					</br>
					</br>

					<label>3. Tapia Salinas Alex</label>

					</br>
					</br>

					<label>4. Tarky Perca Dick</label>

					</br>
					</br>

					<label>5. Flores Cerda Javier</label>

					</br>
					</br>

                                        <label>6. Cabreras Hurtado Luis</label>

					</br>
					</br>				
                               </font>
			</p>
		</div>
	</div>
</body>