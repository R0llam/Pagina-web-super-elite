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
    <title>Desarrolladores</title>
    <link rel="shortcut icon" type="image/x-icon" href="Imagenes/Icono.png">
    <link rel="stylesheet" href="Estilos_Desarrolladores_11.css">
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
            <a href="Ayudah.php">
                <img src="svg/arrow-left.svg" alt="">
            </a>
        </div>
    </div>

    <br>
	<br>

    <h1>Desarrolladores de la Página Web</h1>

    <section class="card">

        <div class="card_perfil">
            <div class="card_nombre">
                <div class="Imagen_1">
                </div>
                <h2>Brallam Rosario</h2>
                <p class="Parrafo_1">Diseñador web </p>
            </div>
            <hr>
            <div class="card_descripcion">
                <p>Número de Contacto: 04247417991</p>
            </div>
        </div>

        <div class="card_perfil">
            <div class="card_nombre">
                <div class="Imagen_2">
                </div>
                <h2>Issak Gonzalez</h2>
                <p class="Parrafo_1">Diseñador web </p>
            </div>
            <hr>
            <div class="card_descripcion">
                <p>Número de Contacto: 04122937942 </p>
            </div>
        </div>

        <div class="card_perfil">
            <div class="card_nombre">
                <div class="Imagen_3">
                </div>
                <h2>Yonmar Valladares</h2>
                <p class="Parrafo_1">Diseñador web </p>
            </div>
            <hr>
            <div class="card_descripcion">
                <p>Número de Contacto: 04121576434</p>
            </div>
        </div>

    </section>

    <div class="Descripcion">
        <p class="texto_descripcion">Puedes contactarnos por medio de los números de teléfonos que se muestran en
            pantalla ante cualquier duda que tengas sobre el funcionamiento de la página web.</p>
    </div>

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