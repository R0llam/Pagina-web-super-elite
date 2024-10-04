<?php 
	include("database2.php");
	require 'database.php';
	$message = '';
	$id=$_GET["ID"];
	$Telefono=$_POST['Telefono'];
	$Asunto=$_POST['Asunto'];
	$Mensaje=$_POST['Mensaje'];
	$conexion= conexion();
	$sql ="INSERT INTO contactanos (Telefono, Asunto, Mensaje, ID) VALUES ('$Telefono','$Asunto','$Mensaje', '$id')";
	$stmt = $conn->prepare($sql);
	$query = mysqli_query($conexion, $sql);
		if ($query) {
			$message = 'Mensaje Enviado con Éxito';
			$message2 = 'Gracias por enviar tu mensaje pronto lo revisaremos';
			$sql2= "SELECT * FROM notificaciones Where ID_No=1";
			$query2 = mysqli_query($conexion, $sql2);
			$datos= mysqli_fetch_assoc($query2);
			$Cantidad1= $datos['Cantidad_No'];
			$suma= $Cantidad1 + 1;
			$sql3="UPDATE notificaciones SET Cantidad_No='$suma' Where ID_No=1";
			$query3 = mysqli_query($conexion, $sql3);
		}
		else{
			$message = 'Error al Enviar el Mensaje';
			$message2 = 'Ha ocurrido un error vuelve a ingresar tus datos y inténtalo de nuevo';
		}
		
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Contáctanos</title>
	<link rel="shortcut icon" type="image/x-icon" href="Imagenes/Icono.png">
	<link rel="stylesheet" href="Estilos_modal_contactanos.css">
</head>
<body>
<div class="modal">
	<div class="modal_container">
		<?php if (!empty($message)){ 
			if ($message == 'Mensaje Enviado con Éxito'){
			?>
		<img src="svg\full_inbox.svg" class="modal_img">
		<h2 class="modal_title"><?= $message ?></h2>
		<p class="modal_paragraph"><?= $message2 ?></p>
		<div class="container_btn">
			<a href="Contactanosh.php" class="btn-modal btn-secondary">Cerrar</a>
		</div>
		<?php }else{?>
		<img src="svg\neutral_face.svg" class="modal_img">
		<h2 class="modal_title"><?= $message ?></h2>
		<p class="modal_paragraph"><?= $message2 ?></p>
		<div class="container_btn">
			<a href="Contactanosh.php" class="btn-modal btn-secondary">Cerrar</a>
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