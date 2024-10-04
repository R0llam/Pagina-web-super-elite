<?php 
	error_reporting(0);
	session_start();

	require 'database.php';

		$message= '';

		
		$records = $conn->prepare('SELECT id, usuario, contrasena FROM users WHERE usuario = :usuario ');
		$records->bindparam(':usuario', $_POST['usuario']);
		$records->execute();
		$resultados= $records->fetch(PDO::FETCH_ASSOC);

			if ($_POST['contrasena'] == $resultados ['contrasena']) {
			$_SESSION['usuario_id'] = $resultados ['id'];
			$message = 'Sesión Iniciada Exitosamente';
			$message2 = 'Bienvenido a nuestra página web :)';
			include("database2.php");
			$conexion= conexion();
			$id=$resultados ['id'];
			$fecha=date('Y-m-d');
			$sql="INSERT INTO historial_de_inicio_de_s (Fecha_de_inicio_de_s,ID) Values ('$fecha', '$id')";
			$query = mysqli_query($conexion, $sql);
			}
			else{
				$message = 'Usuario o Contraseña Incorrecto';
				$message2 = 'Verifica tus datos y vuelve a intentarlo';
			}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Iniciar Sesión</title>
	<link rel="shortcut icon" type="image/x-icon" href="Imagenes/Icono.png">
	<link rel="stylesheet" href="Estilos_modal_iniciar_sesion.css">
</head>
<body>

<div class="modal">
	<div class="modal_container">
	<?php if (!empty($message)){ 
			if ($message == 'Sesión Iniciada Exitosamente'){
			?>
		<img src="svg\authentication_2.svg" class="modal_img">
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
			<a href="IniciarSesionh.php" class="btn-modal btn-secondary">Cerrar</a>
		</div>
		<?php 
		}
		}
		else{?>
		<div class="container_btn">
			<a href="Index.php" class="btn-modal btn-secondary">Cerrar</a>
		</div>
		<?php }?>
	</div>
</div>
</body>
</html>