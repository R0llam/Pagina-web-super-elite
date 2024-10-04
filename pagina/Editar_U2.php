<?php
	include("database2.php");
	$conexion= conexion();
	$id=$_GET['id'];
	$Nombre=$_POST['Nombre'];
	$Apellido=$_POST['Apellido'];
	$Correo_Electronico=$_POST['Correo_Electronico'];
    $usuario=$_POST['usuario'];
    $contrasena=$_POST['contrasena'];
	$message= '';
	$query=editar_U($conexion, $id, $Nombre, $Apellido, $Correo_Electronico, $usuario, $contrasena);
				if ($query) {
				$message= 'Éxito al Actualizar';
				$message2= 'Sus datos se actualizaron de manera correcta';
				}
				else{
				$message='Error al Actualizar';
				$message2= 'Este usuario ya existe';
				}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/x-icon" href="Imagenes/Icono.png">
    <link rel="stylesheet" href="Estilos_modal_editar_usuario.css">
    <title>Editar</title>
</head>

<body>

<div class="modal">
        <div class="modal_container">
            <?php if (!empty($message)){ 
			if ($message == 'Éxito al Actualizar'){
			?>
            <img src="svg\data-process.svg" class="modal_img">
            <h2 class="modal_title"><?= $message ?></h2>
            <p class="modal_paragraph"><?= $message2 ?></p>
            <div class="container_btn">
                <a href="Editar_U.php?id=<?php echo $id?>" class="btn-modal btn-secondary">Cerrar</a>
            </div>
            <?php }else{?>
            <img src="svg\neutral_face.svg" class="modal_img">
            <h2 class="modal_title"><?= $message ?></h2>
            <p class="modal_paragraph"><?= $message2 ?></p>
            <div class="container_btn">
                <a href="Editar_U.php?id=<?php echo $id?>" class="btn-modal btn-secondary">Cerrar</a>
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