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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="shortcut icon" type="image/x-icon" href="Imagenes/Icono.png">
    <link rel="stylesheet" href="Estilo_Categorias_Productos_10.css">
    <?php include("link.php");?>
</head>

<body>

    <?php if (!empty($user) and $user['id'] == '1'): ?>
    <?php
			include("barra_de_navegacion1.php");
			
		?>
    <br>
    <br>
    <br>
    <br>


    <?php elseif (!empty($user)): ?>
    <?php
			include("barra_de_navegacion2.php");
			
		?>
    <br>
    <br>
    <br>
    <br>


    <?php else: ?>
    <?php
			include("barra_de_navegacion3.php");
			
		?>
    <br>
    <br>
    <br>
    <br>

    <?php endif; ?>

    <div class="contenedor_volver">
        <div class="volver">
            <a href="Index.php">
                <img src="svg/arrow-left.svg" alt="">
            </a>
        </div>
    </div>


    <h1 class="title">Categorías</h1>

    <div class="Parrafo">
        <p class="texto_parrafo">El local comercial Inversiones Super Elite C.A trabaja con el precio del dólar del
            Banco Central de
            Venezuela.</p>
        <div class="Logo_BCV">
            <img src="Imagenes/Vectores/Img_4.png">
        </div>
    </div>

    <div class="container_all">

        <div class="contenedor">
            <?php
				include("database2.php");
				$conexion=conexion();
				$query=listar_Categorias($conexion);
				while ($row = mysqli_fetch_assoc($query)) {
				$id = $row ['Categoria_P_ID'];
				$Nombre = $row ['Categoria'];
				$Imagen = $row ['Imagen_P'];
			?>

            <div class="card">
                <a href="Productos2.php?IDC=<?php echo $id?>" class="title_card">
                    <?php 
				$valor="<img class='card-img' height='100' src='../Categorias/$Imagen' class='card-img'></img>";
				echo $valor; ?>

                    <div class="card2">
                        <h4><?php echo $Nombre?></h4>
                    </div>
                </a>
            </div>
            <?php
			}
			?>
        </div>
    </div>

    <br>
    <br>
    <br>
    <br>

    <?php
	include("Footer.php");
	?>

    <script src="js/modal_cerrar_sesion.js"></script>
    <script src="js/app.js"></script>
    <script src="js/modal.js"></script>
</body>

</html>