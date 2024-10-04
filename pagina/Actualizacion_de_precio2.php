<?php
	include("database2.php");
	$conexion= conexion();
	$Precio=$_POST['Precio_B'];
	$fecha=date('Y-m-d');
	$message='';
	$query=editar_precio($conexion,$Precio,$fecha);
				if ($query) {
				$message= 'Éxito al Actualizar';
				$message2= 'Todos los precios se han actualizado ';
				}
				else{
					$message= 'Error al Actualizar ';
					$message2= 'Hubo un error al actualizar, por favor inténtelo de nuevo';
				}
				?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="Imagenes/Icono.png">
    <link rel="stylesheet" href="Estilos_modal_actualizacion_precio.css">
    <title>Actualización de Precio</title>
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
                <a href="Actualizacion_de_precio.php" class="btn-modal btn-secondary">Cerrar</a>
            </div>
            <?php }else{?>
            <img src="svg\neutral_face.svg" class="modal_img">
            <h2 class="modal_title"><?= $message ?></h2>
            <p class="modal_paragraph"><?= $message2 ?></p>
            <div class="container_btn">
                <a href="Actualizacion_de_precio.php" class="btn-modal btn-secondary">Cerrar</a>
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