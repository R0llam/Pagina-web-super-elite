<?php
	include("database2.php");
	$conexion= conexion();
	session_start();
	$id=$_POST['ID'];
	$Nombre=$_POST['NombreP'];
	$Precio=$_POST['Precio'];
	$archivo2=$_FILES['Imagen'];
	$Cantidad=$_POST['Cantidad'];
	$Descripcion=$_POST['descripcion'];
	$duracion=$_POST['Duracion'];
	$query5=listar_Ofertas2($conexion,$id);
	$row=mysqli_fetch_array($query5);
	$fecha=$row['Fecha_Fin_O'];
	$fecha2=date('Y-m-d H:i:s', strtotime($fecha.'+' .$duracion.'days'));
	$message= '';
		
		if ($archivo2['size']==0) {
		$query=editar_o1($conexion, $id, $Nombre, $Precio,$Cantidad,$fecha2,$Descripcion);
				if ($query) {
				$message= 'Actualización Completada';
				$message2= 'Su oferta se actualizo de manera correcta';
				}
				else{
				$message='Error al Actualizar';
				$message2= 'Hubo un error al actualizar, por favor inténtelo de nuevo';
				}
				
			}
			
		else{
			$archivo=$_FILES["Imagen"]["name"];
			$Categoria=explode('.',$archivo2['name'])[1];
			move_uploaded_file($_FILES["Imagen"]["tmp_name"],"../Ofertas/".$archivo);
			if ($Categoria == 'jpg' || $Categoria == 'jpeg' || $Categoria == 'png') {
			$query= editar_o2($conexion,$id,$Nombre,$Precio,$archivo,$Cantidad,$fecha2,$Descripcion);
			$message= '';
				if ($query) {
				$message= 'Actualización Completada';
				$message2= 'Su oferta se actualizo de manera correcta';
				}
				else{
				$message='Error al Actualizar';
				$message2= 'Hubo un error al actualizar, por favor inténtelo de nuevo';
				}
			}
			else{
				$message='Error al Actualizar';
				$message2= 'Inserte una imagen con formato JPG';
			}
		}
		if(isset($_SESSION['OfertaP'])){
			$Oferta_P=$_SESSION['OfertaP'];					
				if(isset($_SESSION['OfertaP'])){
					for($i=0;$i<=count($Oferta_P)-1;$i ++){
						if(isset($Oferta_P[$i])){
							if($Oferta_P[$i]!=NULL){
								$id2= $Oferta_P[$i]['ID'];
								$Cantidad2 = $Oferta_P[$i]['Cantidad_OP'];
								if($Cantidad2>= 1){
									$Cantidad2 = $Oferta_P[$i]['Cantidad_OP'];
								}
								else{
									$Cantidad2 = 1;
								}
								$query2 = "INSERT INTO oferta_producto (ID_Oferta,ID_P,Cantidad_PO) VALUES ('$id', '$id2', '$Cantidad2')";
								$result = mysqli_query($conexion,$query2);
							}
						}
					}
				}
			}
			unset( $_SESSION["OfertaP"] );
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilos_modal_editar_ofertas.css">
    <link rel="shortcut icon" type="image/x-icon" href="Imagenes/Icono.png">
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
                <a href="Administracion_de_ofertas2.php" class="btn-modal btn-secondary">Cerrar</a>
            </div>
            <?php }else{?>
            <img src="svg\neutral_face.svg" class="modal_img">
            <h2 class="modal_title"><?= $message ?></h2>
            <p class="modal_paragraph"><?= $message2 ?></p>
            <div class="container_btn">
                <a href="Administracion_de_ofertas2.php" class="btn-modal btn-secondary">Cerrar</a>
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