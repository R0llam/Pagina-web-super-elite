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
    <title>Registro</title>
    <link rel="shortcut icon" type="image/x-icon" href="Imagenes/Icono.png">
    <link rel="stylesheet" type="text/css" href="Estilo_Registro_10.css">
    <?php include("link.php");?>
    
</head>

<body>

    <?php if (!empty($user) and $user['id'] == '1'): ?>
    <h1>Acceso Denegado</h1>
    <div class="Regresar">
        <p align="center"><a href="Index.php">Regresar a la Página Principal.</a></p>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>

    <?php elseif (!empty($user)): ?>
    <h1>Acceso Denegado</h1>
    <div class="Regresar">
        <p align="center"><a href="Index.php">Regresar a la Página Principal.</a></p>
    </div>

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
            <a href="IniciarSesionh.php">
                <img src="svg/arrow-left.svg" alt="">
            </a>
        </div>
    </div>

    <section class="Registro">
        <h1>Registro</h1>
        <form name="Registro" action="Registro.php" method="post">
            <label for="Nombre">Nombre:<input class="controles" type="text" name="Nombre" id="Nombre"
                    required="obligatorio" maxlength="50" required onkeypress="return Enter(this, event, 'NO', 'LET')" placeholder="Escribe Tu Nombre" /></label>

            <label for="Apellidos">Apellido:<input class="controles" type="text" name="Apellido" id="Apellido" required onkeypress="return Enter(this, event, 'NO', 'LET')"
                    required="obligatorio" maxlength="50" placeholder="Escribe Tus Apellidos" /></label>

            <label for="Correo Electrónico">Correo Electrónico:<input class="controles" type="email"
                    name="Correo_Electronico" id="Correo_Electronico" required="obligatorio"  maxlength="50"
                    placeholder="Escribe Tu Correo Electrónico" /></label>

            Usuario:
            <div class="container">
                <input class="passw" type="text" name="usuario" id="usuario" required="obligatorio" size="20" maxlength="50"
                    placeholder="Escribe Tu Usuario" /></label>
                <img src="assets\person-fill.svg" alt="" class="icon_1">
            </div>

            Contraseña:
            <div class="container">
                <input class="passw" type="password" name="contrasena" required="obligatorio" size="20" maxlength="15"
                    placeholder="Escribe Tu Contraseña" id="input">
                <img src="Imagenes/Vectores/Img_10.png" alt="" class="icon_2" id="Eye">
            </div>

            <script src="Ver.js"></script>

            <div class="contenedor">
                <input class="Boton1" type="submit" value="Registrarse" />
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

    <script src="js/app.js"></script>
    <script src="js/modal.js"></script>
    <script src="js\validacion_num_let.js" type="text/javascript" ></script>
</body>

</html>