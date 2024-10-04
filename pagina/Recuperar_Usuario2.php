<?php
	error_reporting(0);

	require 'database.php';

		$message= '';

		
		$records = $conn->prepare('SELECT usuario, contrasena, Nombre FROM users WHERE Correo_Electronico = :Correo_Electronico ');
		$records->bindparam(':Correo_Electronico', $_POST['Correo_Electronico']);
		$records->execute();
		$resultados= $records->fetch(PDO::FETCH_ASSOC);

			if ($_POST['Nombre'] == $resultados ['Nombre']) {
				$usuario=$resultados['usuario'];
				$contrasena=$resultados['contrasena'];
			$message = "Sus datos se recuperaron de manera exitosa";
			$message2 = "Su usuario es: $usuario";
			$message3 = "Su contraseña es: $contrasena";
			}
			else{
				$message = 'No se pudieron recuperar sus datos';
				$message2 = 'Correo Electrónico o Nombre Incorrecto';
			}
			
			?>
			
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Recuperación</title>
	<link rel="shortcut icon" type="image/x-icon" href="Imagenes/Icono.png">
	<link rel="stylesheet" href="Estilos_modal_recuperar_usuario.css">
</head>
<body>

<div class="modal">
	<div class="modal_container">
		<?php if (!empty($message)){ 
			if ($message == 'Sus datos se recuperaron de manera exitosa'){
			?>
		<img src="svg\maintenance.svg" class="modal_img">
		<h2 class="modal_title"><?= $message ?></h2>
		<p class="modal_paragraph"><?= $message2 ?></p>
		<p class="modal_paragraph"><?= $message3 ?></p>
		<div class="container_btn">
			<a href="IniciarSesionh.php" class="btn-modal btn-secondary">Cerrar</a>
		</div>
		<?php }else{?>
		<img src="svg\neutral_face.svg" class="modal_img">
		<h2 class="modal_title"><?= $message ?></h2>
		<p class="modal_paragraph"><?= $message2 ?></p>
		<div class="container_btn">
			<a href="Recuperar_Usuario.php" class="btn-modal btn-secondary">Cerrar</a>
		</div>
		<?php 
		}
		}
		else{?>
		<div class="container_btn">
			<a href="Contactanosh.php" class="btn-modal btn-secondary">Cerrar</a>
		</div>
		<?php }?>
	</div>
</div>

</body>
</html>