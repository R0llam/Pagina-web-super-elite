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
    <title>Recuperación</title>
    <link rel="shortcut icon" type="image/x-icon" href="Imagenes/Icono.png">
    <link rel="stylesheet" type="text/css" href="Estilos_Recuperacion.css">
    <?php include("link.php");?>
</head>

<body>

    <?php if (!empty($user) and $user['id'] == '1'): ?>
    <h1>Acceso Denegado</h1>
    <div class="Regresar">
        <p align="center"><a href="Index.php">Regresar a la Página Principal.</a></p>
        <?php elseif (!empty($user)): ?>
        <h1>Acceso Denegado</h1>
        <div class="Regresar">
            <p align="center"><a href="Index.php">Regresar a la Página Principal.</a></p>
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
                    <a href="IniciarSesionh.php">
                        <img src="svg/arrow-left.svg" alt="">
                    </a>
                </div>
            </div>

            <section class="Registro">

                <h1>Recuperación de Usuario y Contraseña</h1>

                <form name="Registro" action="Recuperar_Usuario2.php" method="post">
                    <label for="Nombre">Nombre:<input class="controles" type="text" name="Nombre" id="Nombre"
                            required="obligatorio" maxlength="50" placeholder="Escribe Tu Nombre" /></label>
                    <label for="Correo_Electronico">Correo Electrónico:<input class="controles" type="email"
                            name="Correo_Electronico" id="Correo_Electronico" required="obligatorio" maxlength="50"
                            placeholder="Escribe Tu Correo Electrónico" /></label>

                    <div class="contenedor">
                        <input class="Boton1" type="submit" value="Recuperar" />
                    </div>
                </form>

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