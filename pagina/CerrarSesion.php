<?php 
	session_start();

	session_unset();

	session_destroy();

	$message = 'Sesión Cerrada Exitosamente';
	$message2 = 'Gracias por usar nuestros servicios vuelve pronto';

	?>
	<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>Cerrar Sesión</title>
			<link rel="shortcut icon" type="image/x-icon" href="Imagenes/Icono.png">
			<link rel="stylesheet" href="Estilos_modal_cerrar_sesion.css">
		</head>
		<body>

<div class="modal">
	<div class="modal_container">
	<?php if (!empty($message)){ 
			if ($message == 'Sesión Cerrada Exitosamente'){
			?>
		<img src="svg\lap_top.svg" class="modal_img">
		<h2 class="modal_title"><?= $message ?></h2>
		<p class="modal_paragraph"><?= $message2 ?></p>
		<div class="container_btn">
			<a href="Index.php" class="btn-modal btn-secondary">Cerrar</a>
		</div>
		<?php }else{?>
		<img src="svg\neutral_face.svg" class="modal_img">
		<h2 class="modal_title"><?= $message ?></h2>
		<p class="modal_paragraph"><?= $message2 ?></p>
		<div class="container_btn">
			<a href="Index.php" class="btn-modal btn-secondary">Cerrar</a>
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