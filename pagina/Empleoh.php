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
    <TITLE>Enviar Currículo</TITLE>
    <link rel="shortcut icon" type="image/x-icon" href="Imagenes/Icono.png">
    <link rel="stylesheet" href="Estilos_Empleo_10.css">
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


    <section class="Registro">

        <h1>Síntesis Curricular</h1>
        <p class="Parrafo">Para solicitar empleo por favor ingrese su currículo en formato PDF, el nombre del archivo
            tiene que ser de la siguiente forma: (Nombre_Apellido.pdf)</p>
        <div class="PDF"><img class="IMG" src="Imagenes/PDF-1.png" alt="PDF"></div>

        <p>Inserta un archivo PDF:</p>
        <form method="post" enctype="multipart/form-data" action="Empleo.php">

            <div id="file">
                <p id="texto">Seleccionar Archivo</p>
                <input type="file" name="archivo" id="imagen" required="obligatorio" />
            </div>

            <p>Nombre del Archivo:</p>
            <div class="contenedor">
                <input class="controles" type="text" name="nombre" maxlength="100" required="obligatorio" />
            </div>

            <div class="contenedor">
                <input class="Boton1" type="submit" value="Guardar" />
                <input class="Boton2" type="reset" value="Restablecer" />
            </div>
        </form>
    </section>

    <br>
    <br>
    <br>

    <?php
	include("Footer.php");
	?>

    <script src="js/modal_cerrar_sesion.js"></script>
    <script src="js/app.js"></script>
</BODY>

</HTML>