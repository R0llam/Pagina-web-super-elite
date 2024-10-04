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
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Ofertas</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="Imagenes/Icono.png">
    <link rel="stylesheet" href="Estilos_modal_enviar_curriculo.css">
</head>

<body>

    <div class="modal">
        <div class="modal_container">
            <?php if (!empty($user)):  ?>
            <?php header('location: Empleoh.php'); ?>
            <?php else: ?>
            <img src="svg/Autenticacion.svg" class="modal_img">
            <h2 class="modal_title">¡Inicia Sesión! </h2>
            <p class="modal_paragraph">Tienes que haber iniciado sesión para acceder a esta opción</p>
            <div class="container_btn">
                <a href="Productos.php" class="btn-modal btn-secondary">Cerrar</a>
                <a href="IniciarSesionh.php" class="btn-modal btn-primary">Iniciar Sesión</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>

</html>