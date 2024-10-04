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
    <title>Administración Productos/Ofertas</title>
    <link rel="shortcut icon" type="image/x-icon" href="Imagenes/Icono.png">
    <link rel="stylesheet" type="text/css" href="Estilos_Acceso_Denegado.css">
    <link rel="stylesheet" type="text/css" href="Estilos_Pg_Principal_Admin_Productos_12.css">
    <?php include("link_admin.php");?>
</head>

<body>

    <?php if (!empty($user) and $user['id'] == '1'): ?>

    <?php
	include("barra_de_navegacion_admin.php");
	?>

    <div class="contenedor_volver">
        <div class="volver">
            <a href="Administrador.php">
                <img src="svg/arrow-left.svg" alt="">
            </a>
        </div>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="titulo">
        <h1>Productos/Ofertas</h1>
    </div>

    <br>
    <br>
    <br>

    <div class="contenedor">

        <div class="card">

            <div class="card-details">
                <img class="img_1" src="Imagenes/Vectores/Img_2.png">
                <h1 class="text-title-1">Registrar Productos</h1>
                <p class="text-body-1">Registra nuevos productos</p>
            </div>

            <a href="Administracion_de_productosh.php"><button class="card-button">Ir</button></a>
        </div>

        <div class="card">

            <div class="card-details">
                <img class="img_2" src="Imagenes/Vectores/Img_1.png">
                <h1 class="text-title-2">Editar/Eliminar Productos</h1>
                <p class="text-body-2">Edita o elimina los productos previamente registrados </p>
            </div>

            <a href="Administracion_de_productos2.php"><button class="card-button">Ir</button></a>
        </div>

        <div class="card">

            <div class="card-details">
                <img class="img_3" src="Imagenes/Vectores/Img_15.png">
                <h1 class="text-title-3">Registrar Ofertas</h1>
                <p class="text-body-3">Registra nuevas Ofertas</p>
            </div>

            <a href="Administracion_de_ofertash.php"><button class="card-button">Ir</button></a>
        </div>

        <div class="card">

            <div class="card-details">
                <img class="img_4" src="Imagenes/Vectores/Img_1.png">
                <h1 class="text-title-4">Editar/Eliminar Ofertas</h1>
                <p class="text-body-4">Edita o elimina las ofertas previamente registradas </p>
            </div>

            <a href="Administracion_de_ofertas2.php"><button class="card-button">Ir</button></a>
        </div>

    </div>

    <br>
    <br>
    <br>
    <br>

    <?php
    include("Footer.php");
    ?>

    <?php elseif (!empty($user)): ?>
    <div class="modal">
        <div class="modal_container">
            <img src="svg\neutral_face.svg" class="modal_img">
            <h2 class="modal_title">Acceso Denegado</h2>
            <p class="modal_paragraph">Lo siento no tienes permitido el acceso.</p>
            <div class="container_btn">
                <a href="Index.php" class="btn-modal btn-secondary">Cerrar</a>
            </div>
            <?php else: ?>
            <img src="svg\neutral_face.svg" class="modal_img">
            <h2 class="modal_title">Acceso Denegado</h2>
            <p class="modal_paragraph">Lo siento no tienes permitido el acceso.</p>
            <div class="container_btn">
                <a href="IniciarSesionh.php" class="btn-modal btn-secondary">Cerrar</a>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <script src="js\app_admin.js"></script>
    <script src="js/modal_cerrar_sesion.js"></script>
</body>

</html>