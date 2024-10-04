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
    <title>Iniciar Sesión</title>
    <link rel="shortcut icon" type="image/x-icon" href="Imagenes/Icono.png">
    <link rel="stylesheet" type="text/css" href="Estilo_iniciar_sesion_10.css">
    <?php include("link.php");?>
</head>

<body>

    <?php if (!empty($user) and $user['id'] == '1'): ?>
    <h1>Acceso Denegado</h1>
    <div class="Regresar">
        <p align="center"><a href="Index.php">Regresar a la Página Principal.</a></p>
    </div>

    <?php elseif (!empty($user)): ?>
    <h1>Acceso Denegado</h1>
    <div class="Regresar">
        <p align="center"><a href="Index.php">Regresar a la Página Principal.</a></p>
    </div>

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

        <h1>Iniciar Sesión</h1>

        <p align="center">¿Es tu primera vez?&nbsp;&nbsp;<a class="vinculo" href="Registroh.php"><u>Regístrate</u></a>
        </p>
        <br>

        <form name="Registro" action="IniciarSesion.php" method="post" autocomplete="off">

            Usuario
            <div class="container">
                <input class="passw" type="text" name="usuario" id="usuario" required="obligatorio" size="20"
                    maxlength="50" placeholder="Escribe Tu Usuario" /></label>
                <img src="assets\person-fill.svg" alt="" class="icon_1">
            </div>

            Contraseña:
            <div class="container">
                <input class="passw" type="password" name="contrasena" required="obligatorio" size="20" maxlength="15"
                    placeholder="Escribe Tu Contraseña" id="input">
                <img src="Imagenes/Vectores/Img_10.png" alt="" class="icon_2" id="Eye">
            </div>

            <script src="Ver.js"></script>

            <br>
            <div class="contenedor">
                <input class="Boton1" type="submit" value="Entrar" />
            </div>

        </form>

        <br>
        <p align="center">¿Olvidaste tu usuario o contraseña?&nbsp;&nbsp;<a class="vinculo"
                href="Recuperar_Usuario.php"><u>Recuperar</u></a></p>

    </section>

    <br>
    <br>
    <br>

    <?php
	include("Footer.php");
	?>


    <script src="js/app.js"></script>
    <script src="js/modal.js"></script>

</body>

</html>