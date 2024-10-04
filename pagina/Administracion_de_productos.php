<?php 
	error_reporting(0);

	$ID=$_POST['ID'];
	$Nombre=$_POST['NombreP'];
	$Categoria_P=$_POST['Categoria_P'];
	$Precio=$_POST['Precio'];
	$Cantidad=$_POST['Cantidad'];
	$marca=$_POST['ID_Marca'];
	$Descripcion=$_POST['Descripcion'];
	$fecha_de_vencimiento=$_POST['Fecha_de_vencimiento'];
	$archivo2=$_FILES['Imagen'];
	$archivo=$_FILES["Imagen"]["name"];
	$Categoria=explode('.',$archivo2['name'])[1];
	move_uploaded_file($_FILES["Imagen"]["tmp_name"],"../Productos/".$archivo);

	$message= '';
	if ($Categoria_P == '') {
		$message='Error al Registrar';
		$message2='No se seleccionó la categoría';
	}
	else{
		if ($Categoria == 'jpg' || $Categoria == 'jpeg' || $Categoria == 'png' || $Categoria == '') {
		include("database2.php");
		$conexion= conexion();
		$query2=listar_productos2($conexion,$ID);
		$row = mysqli_fetch_assoc($query2);
			if (!empty($row)) {

				$message='Error al Registrar';
				$message2='Este producto ya se encuentra registrado';
			}
			else{
				if($fecha_de_vencimiento != null){
					$query= insertar_P2($conexion,$ID,$Nombre,$Categoria_P,$Precio,$archivo,$Cantidad,$fecha_de_vencimiento,$marca,$Descripcion);
					if ($query) {
					$message='Registro Exitoso';
					$message2='Su producto se registró de manera correcta';
					}
					else{
					$message='Error al Registrar';
					$message2='Este producto ya se encuentra registrado';
					}
				}
				else{
					$query= insertar_P($conexion,$ID,$Nombre,$Categoria_P,$Precio,$archivo,$Cantidad,$marca,$Descripcion);
					if ($query) {
					$message='Registro Exitoso';
					$message2='Su producto se registró de manera correcta';
					}
					else{
					$message='Error al Registrar';
					$message2='Este producto ya se encuentra registrado';
					}
				}
			}
		}
		else{
			$message='Error al Registrar';
			$message2='Inserte una imagen con formato JPG';
		}
	}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilos_modal_registro_producto.css">
    <link rel="shortcut icon" type="image/x-icon" href="Imagenes/Icono.png">
    <title>Registrar Productos</title>
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
                <a href="Administracion_de_productosh.php" class="btn-modal btn-secondary">Cerrar</a>
            </div>
            <?php }else{?>
            <img src="svg\neutral_face.svg" class="modal_img">
            <h2 class="modal_title"><?= $message ?></h2>
            <p class="modal_paragraph"><?= $message2 ?></p>
            <div class="container_btn">
                <a href="Administracion_de_productosh.php" class="btn-modal btn-secondary">Cerrar</a>
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