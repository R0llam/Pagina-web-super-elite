<?php 
	$Nombre=$_POST['NombreP'];
    $Descripcion=$_POST['Descripcion'];
	$archivo2=$_FILES['Imagen'];
	$archivo=$_FILES["Imagen"]["name"];
	$Categoria=explode('.',$archivo2['name'])[1];
	move_uploaded_file($_FILES["Imagen"]["tmp_name"],"../Bancos/".$archivo);

	$message= '';
		if ($Categoria == 'jpg' || $Categoria == 'jpeg' || $Categoria == 'png' || $Categoria == '') {
		include("database2.php");
		$conexion= conexion();
		$query= insertar_CuentaB($conexion,$Nombre,$archivo,$Descripcion);
		
			if ($query) {
			$message= 'Registro Exitoso';
			$message2= 'Cuenta Bancaria registrada de manera correcta';
			}
			else{
			$message='Error al Registrar';
			$message2= 'Esta Cuenta Bancaria ya se encuentra registrada';
			}
		}
		else{
			$message='Error al Registrar';
			$message2= 'Inserte una imagen con formato JPG';
		}
 ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="Imagenes/Icono.png">
    <link rel="stylesheet" href="Estilos_modal_registro_categorias.css">
    <title>Administración de Categorias</title>
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
                <a href="Bancos.php" class="btn-modal btn-secondary">Cerrar</a>
            </div>
            <?php }else{?>
            <img src="svg\neutral_face.svg" class="modal_img">
            <h2 class="modal_title"><?= $message ?></h2>
            <p class="modal_paragraph"><?= $message2 ?></p>
            <div class="container_btn">
                <a href="Bancos.php" class="btn-modal btn-secondary">Cerrar</a>
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