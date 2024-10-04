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
    <title>Ayuda</title>
    <link rel="shortcut icon" type="image/x-icon" href="Imagenes/Icono.png">
    <link rel="stylesheet" href="Estilos_Ayuda_11.css">
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
    <br>

    <?php elseif (!empty($user)): ?>
    <?php
			include("barra_de_navegacion2.php");
			
		?>
    <br>
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
    <br>

    <?php endif; ?>

    <div class="contenedor_volver">
        <div class="volver">
            <a href="Index.php">
                <img src="svg/arrow-left.svg" alt="">
            </a>
        </div>
    </div>

    <div class="titulo">
        <h1>Ayuda</h1>
    </div>

    <br>
    <br>
    
    <div class="contenedor">
        <div class="card">

            <div class="card-details">
                <img class="img_2" src="Imagenes/Vectores/Img_6.png">
                <h1 class="text-title-2">Manual de Usuario</h1>
                <p class="text-body-2">Aquí puedes conocer el funcionamiento de la página para los usuarios.</p>
            </div>

            <a href="Manual_Usuarioh.php"><button class="card-button">Ir</button></a>
        </div>

        <div class="card">

            <div class="card-details">
                <img class="img_3" src="Imagenes/Vectores/Img_13.png">
                <h1 class="text-title-3">Desarrolladores de la Página</h1>
                <p class="text-body-3">En este apartado puedes ver lo datos de los desarrolladores de la página.</p>
            </div>

            <a href="Desarrolladoresh.php"><button class="card-button">Ir</button></a>
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
    <script src="js/modal.js"></script>
    <script src="js/app.js"></script>
</body>

</html>