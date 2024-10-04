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
    <title>Conócenos</title>
    <link rel="shortcut icon" type="image/x-icon" href="Imagenes/Icono.png">
    <link rel="stylesheet" href="Estilos_Conocenos_15.css">
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

    <h1 class="titulo">Conócenos</h1>

    <div class="container">

        <div class="historia">
            <h1 class="titulo_historia">Historia</h1>

            <p class="parrafo_historia">El local comercial Inversiones Super Elite C.A se fundó por Enhui Yu en mayo del
                2017 con la finalidad de emprender un negocio que diera un servicio justo y eficiente a los ciudadanos
                Boconeses así como planteándose como objetivo el llegar a ser un centro de comercio principal para el
                municipio Boconó.</p>

            <div class="imagen_historia"><img src="Imagenes/Personal.jpg" title="Personal de Súper Élite"></div>

        </div>

        <div class="localizacion">

            <h1 class="titulo_localizacion">Localización</h1>

            <p class="parrafo_localizacion">El local “Inversiones. Super Elite CA” se encuentra ubicado en
                Venezuela/Estado Trujillo/Municipio Boconó/Parroquia Boconó en la calle Miranda.</p>

            <div class="imagen_localizacion"><img src="Imagenes/Localización.png" title="Localización"></div>

            <center><a class="vinculo"
                    href="https://www.google.com/maps/place/Bocon%C3%B3+3103,+Trujillo/@9.2460686,-70.2707551,43m/data=!3m1!1e3!4m5!3m4!1s0x8e7cd7351e5fc717:0x1362b77b513305d5!8m2!3d9.2534438!4d-70.2497616?hl=es">Presioné
                    Aquí para ir a Google Maps</a></center>

        </div>

        <div class="contenedor">

            <div class="mision">
                <h1 class="titulo_mision">Misión</h1>
                <P class="parrafo_mision">Brindar un servicio de comercio justo y eficiente a todos los ciudadanos.</P>
            </div>

            <div class="vision">
                <h1 class="titulo_vision">Visión</h1>
                <p class="parrafo_vision">Ser el principal centro de comercio en la ciudad.</p>
            </div>

        </div>

    </div>

    <br>
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