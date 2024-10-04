<?php 
	session_start();
	
	require 'database.php';
	
	if (isset($_SESSION['usuario_id'])) {
		$records = $conn->prepare('SELECT id, usuario, contrasena FROM users WHERE id = :id');
		$records->bindparam(':id', $_SESSION['usuario_id']);
		$records->execute();
		$resultados = $records->fetch(PDO::FETCH_ASSOC);

		$user = null;

		if(count($resultados) > 0 ){
			$user = $resultados;
		}
		else{
			header('location CerrarSesion.php');
		}
	}
	$id_usuario=$user['id'];
	$nombre=$_POST['nombre'];
	$fecha=date('Y-m-d');
	$archivo2=$_FILES['archivo'];
	$archivo=$_FILES["archivo"]["name"];
	$categoria=explode('.',$archivo2['name'])[1];
	move_uploaded_file($_FILES["archivo"]["tmp_name"],"../Empleo/".$archivo);
	if ($categoria == 'pdf') {
			include("database2.php");
	$conexion= conexion();
	$sql="INSERT INTO empleo(nombre,fecha,archivo,ID) Values ('$nombre','$fecha', '$archivo','$id_usuario')";
	$query = mysqli_query($conexion, $sql);
	$message= '';
		if ($query) {
		$message= 'Envío Exitoso';
		$message2= 'Su currículo se envió de manera correcta';
		$sql2= "SELECT * FROM notificaciones Where ID_No=3";
		$query2 = mysqli_query($conexion, $sql2);
		$datos= mysqli_fetch_assoc($query2);
		$Cantidad1= $datos['Cantidad_No'];
		$suma= $Cantidad1 + 1;
		$sql3="UPDATE notificaciones SET Cantidad_No='$suma' Where ID_No=3";
		$query3 = mysqli_query($conexion, $sql3);
		}
		else{
		$message=$archivoBLOB;
		}
	}
	else{
		$message='Error al Enviar';
		$message2= 'Envíe su currículo en formato PDF';
	}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar Currículo</title>
	<link rel="shortcut icon" type="image/x-icon" href="Imagenes/Icono.png">
    <link rel="stylesheet" href="Estilos_modal_empleo.css">
</head>

<body>

    <div class="modal">
        <div class="modal_container">
            <?php if (!empty($message)){ 
			if ($message == 'Envío Exitoso'){
			?>
            <img src="svg/checklist.svg" class="modal_img">
            <h2 class="modal_title"><?= $message ?></h2>
            <p class="modal_paragraph"><?= $message2 ?></p>
            <div class="container_btn">
                <a href="Empleoh.php" class="btn-modal btn-secondary">Cerrar</a>
            </div>
            <?php }else{?>
            <img src="svg\neutral_face.svg" class="modal_img">
            <h2 class="modal_title"><?= $message ?></h2>
            <p class="modal_paragraph"><?= $message2 ?></p>
            <div class="container_btn">
                <a href="Empleoh.php" class="btn-modal btn-secondary">Cerrar</a>
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