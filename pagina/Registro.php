<?php 
	require 'database.php';

	$message = '';
	
	$records = $conn->prepare('SELECT * FROM users WHERE Correo_Electronico = :Correo_Electronico ');
		$records->bindparam(':Correo_Electronico',$_POST['Correo_Electronico']);
		$records->execute();
		$resultados= $records->fetch(PDO::FETCH_ASSOC);
		if (empty($resultados)) {
			$records2 = $conn->prepare('SELECT * FROM users WHERE usuario = :usuario ');
			$records2->bindparam(':usuario', $_POST['usuario']);
			$records2->execute();
			$resultados2= $records2->fetch(PDO::FETCH_ASSOC);
			if (empty($resultados2)) {
				$tipo=1;
				$reservas=0;
				$sql = "INSERT INTO users (Nombre,Apellido,Correo_Electronico,usuario,contrasena,Tipo_ID,Reservas_Actuales) VALUES (:Nombre, :Apellido, :Correo_Electronico, :usuario, :contrasena,'$tipo','$reservas') ";
				$stmt = $conn->prepare($sql);
				$stmt->bindparam(':Nombre',$_POST['Nombre']);
				$stmt->bindparam(':Apellido',$_POST['Apellido']);
				$stmt->bindparam(':Correo_Electronico',$_POST['Correo_Electronico']);
				$stmt->bindparam(':usuario',$_POST['usuario']);
				$stmt->bindparam(':contrasena',$_POST['contrasena']);
				if ($stmt->execute()) {
					$message = 'Registro Exitoso';
					$message2 = 'Su usuario se ha registrado de manera correcta ';
				}
				else{
					$message = 'Error al registrar';
					$message2 = 'El usuario ingresado es invalido';
				}
			}
			else{
					$message = 'Error al registrar';
					$message2 = 'Este usuario ya se encuentra registrado';
				}
			}
			else{
					$message = 'Error al registrar';
					$message2 = 'Este correo electrónico ya se encuentra registrado';
				}
	?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="shortcut icon" type="image/x-icon" href="Imagenes/Icono.png">
    <link rel="stylesheet" href="Estilos_modal_resgistro.css">
</head>

<body>

    <div class="modal">
        <div class="modal_container">
            <?php if (!empty($message)){ 
			if ($message == 'Registro Exitoso'){
			?>
            <img src="svg\checklist.svg" class="modal_img">
            <h2 class="modal_title"><?= $message ?></h2>
            <p class="modal_paragraph"><?= $message2 ?></p>
            <div class="container_btn">
                <a href="IniciarSesionh.php" class="btn-modal btn-secondary">Cerrar</a>
            </div>
            <?php }else{?>
            <img src="svg\neutral_face.svg" class="modal_img">
            <h2 class="modal_title"><?= $message ?></h2>
            <p class="modal_paragraph"><?= $message2 ?></p>
            <div class="container_btn">
                <a href="Registroh.php" class="btn-modal btn-secondary">Cerrar</a>
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