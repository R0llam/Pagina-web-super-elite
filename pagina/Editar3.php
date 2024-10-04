<?php
	include("database2.php");
	$conexion= conexion();
	$id=$_POST['ID'];
	$Nombre=$_POST['NombreP'];
	$Categoria_P=$_POST['Categoria_P'];
	$fecha_de_vencimiento=$_POST['Fecha_de_vencimiento'];
	$Precio=$_POST['Precio'];
	$marca=$_POST['ID_Marca'];
	$Descripcion=$_POST['Descripcion'];
	$archivo2=$_FILES['Imagen'];
	$Cantidad=$_POST['Cantidad'];
	$message= '';
	if 	($Categoria_P == '') {
		$message='Error al Actualizar';
		$message2= 'No se seleccionó la categoría';
	} 
	else{
		
		if ($archivo2['size']==0) {
			if($fecha_de_vencimiento != null){
				$query=editar_producto4($conexion, $id, $Nombre, $Categoria_P,$Cantidad,$Precio,$fecha_de_vencimiento,$marca,$Descripcion);
				if ($query) {
					$message= 'Actualización Completada';
					$message2= 'Su producto se actualizo de manera correcta';
				}
				else{
					$message='Error al Actualizar';
					$message2= 'No se seleccionó la categoría';
				}
			}
			else{
				$query=editar_producto1($conexion, $id, $Nombre, $Categoria_P,$Cantidad,$Precio,$marca,$Descripcion);
				if ($query) {
					$message= 'Actualización Completada';
					$message2= 'Su producto se actualizo de manera correcta';
				}
				else{
					$message='Error al Actualizar';
					$message2= 'No se seleccionó la categoría';
				}
			}
		}
		else{
			$archivo2=$_FILES['Imagen'];
			$archivo=$_FILES["Imagen"]["name"];
			$Categoria=explode('.',$archivo2['name'])[1];
			move_uploaded_file($_FILES["Imagen"]["tmp_name"],"../Productos/".$archivo);
			if ($Categoria == 'jpg' || $Categoria == 'jpeg' || $Categoria == 'png') {
				if($fecha_de_vencimiento != null){
				$query= editar_producto3($conexion,$id,$Nombre,$Categoria_P,$Precio,$Cantidad,$archivo,$fecha_de_vencimiento,$marca,$Descripcion);
				$message= '';
					if ($query) {
					$message= 'Actualización Completada';
					$message2= 'Su producto se actualizo de manera correcta';
					}
					else{
					$message='Error al Actualizar';
					$message2= 'No se seleccionó la categoría';
					}
				}
				else{
					$query= editar_producto2($conexion,$id,$Nombre,$Categoria_P,$Precio,$Cantidad,$archivo,$marca,$Descripcion);
					$message= '';
						if ($query) {
						$message= 'Actualización Completada';
						$message2= 'Su producto se actualizo de manera correcta';
						}
						else{
						$message='Error al Actualizar';
						$message2= 'No se seleccionó la categoría';
						}
				}
			}
			else{
				$message='Error al Actualizar';
				$message2= 'Inserte una imagen con formato JPG';
			}
		}
	}
	
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="Imagenes/Icono.png">
    <link rel="stylesheet" href="Estilos_modal_editar_productos.css">
    <title>Editar</title>
</head>

<body>

    <div class="modal">
        <div class="modal_container">
            <?php if (!empty($message)){ 
			if ($message == 'Actualización Completada'){
			?>
            <img src="svg\data-process.svg" class="modal_img">
            <h2 class="modal_title"><?= $message ?></h2>
            <p class="modal_paragraph"><?= $message2 ?></p>
            <div class="container_btn">
                <a href="Administracion_de_productos2.php" class="btn-modal btn-secondary">Cerrar</a>
            </div>
            <?php }else{?>
            <img src="svg\neutral_face.svg" class="modal_img">
            <h2 class="modal_title"><?= $message ?></h2>
            <p class="modal_paragraph"><?= $message2 ?></p>
            <div class="container_btn">
                <a href="Administracion_de_productos2.php" class="btn-modal btn-secondary">Cerrar</a>
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