<?php
	session_start();
	$ID=$_POST['ID'];
	$Nombre=$_POST['NombreP'];
	$Precio=$_POST['Precio'];
	$cantidad=$_POST['Cantidad'];
	$Descripcion=$_POST['Descripcion'];
	$duracion=$_POST['Duracion'];
	$fecha=date('Y-m-d');
	$fecha2=date('Y-m-d', strtotime($fecha.'+' .$duracion.'days'));
	$archivo2=$_FILES['Imagen'];
	$archivo=$_FILES["Imagen"]["name"];
	$Categoria=explode('.',$archivo2['name'])[1];
	move_uploaded_file($_FILES["Imagen"]["tmp_name"],"../Ofertas/".$archivo);
	$message= '';
		if(isset($_SESSION['OfertaP'])){
		if ($Categoria == 'jpg' || $Categoria == 'jpeg' || $Categoria == 'png' || $Categoria == '') {
		include("database2.php");
		$conexion= conexion();
		$query2=listar_Ofertas2($conexion,$ID);
		$row = mysqli_fetch_assoc($query2);
			if (!empty($row)) {

				$message='Error al Registrar';
				$message2='Esta oferta ya se encuentra registrada';
			} 
			else {
				$query= insertar_o($conexion,$ID,$Nombre,$Precio,$fecha,$fecha2,$archivo,$cantidad,$Descripcion);
				if ($query) {
				$message= 'Registro Exitoso';
				$message2= 'Su oferta se registró de manera correcta';
				
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
								$query2 = "INSERT INTO oferta_producto (ID_Oferta,ID_P,Cantidad_PO) VALUES ('$ID', '$id2', '$Cantidad2')";
								$result = mysqli_query($conexion,$query2);
							}
						}
					}
				}
				}
				else{
				$message='Error al Registrar';
				$message2='Esta oferta ya se encuentra registrada';
				}
			}
		}
		else{
			$message='Error al Registrar';
			$message2='Inserte una imagen con formato JPG';
		}
		}
		else{
			$message='Error al Registrar';
			$message2='No se ha registrado ningún producto';
			}
		unset( $_SESSION["OfertaP"] );

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="Imagenes/Icono.png">
    <link rel="stylesheet" href="Estilos_modal_registro_ofertas.css">
    <title>Registrar Ofertas</title>
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
                <a href="Administracion_de_ofertash.php" class="btn-modal btn-secondary">Cerrar</a>
            </div>
            <?php }else{?>
            <img src="svg\neutral_face.svg" class="modal_img">
            <h2 class="modal_title"><?= $message ?></h2>
            <p class="modal_paragraph"><?= $message2 ?></p>
            <div class="container_btn">
                <a href="Administracion_de_ofertash.php" class="btn-modal btn-secondary">Cerrar</a>
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