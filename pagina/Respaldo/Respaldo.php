<?php 

$GET_U=get_current_user();

?>
<?php
include '../database2.php';
$conexion=conexion();
$query=listar_precio($conexion);
$datos= mysqli_fetch_assoc($query);
$Precio=$datos['Precio_B'];
?>
<?php
session_start();

require '../database.php';
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
    header('location ../CerrarSesion.php');
}
}
?>

<!DOCTYPE html>
<html>

<head>
    <script>
    function abre() {
        window.open("Recuperar.php", "v",
            "location=no,menubar=no,toolbar=no,scrollbars=yes,resizable=yes,status=yes,fullscreen=yes");
    }
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respaldar Base de Datos</title>
    <link rel="shortcut icon" type="image/x-icon" href="../Imagenes/Icono.png">
    <link rel="stylesheet" type="text/css" href="../Estilos_Acceso_Denegado.css">
    <link rel="stylesheet" href="../Estilos_respaldo_base_datos.css">
    <link rel="stylesheet" href="../Estilos_Menu_Desplegable_Admin.css">
    <link rel="stylesheet" href="../Estilos_footer.css">
    <link rel="stylesheet" href="../Estilos_modales.css">
</head>

<body>

    <?php if (!empty($user) and $user['id'] == '1'): ?>

    <?php
	include("barra_de_navegacion_admin.php");
	?>

    <div class="contenedor_volver">
        <div class="volver">
            <a href="../Administrador.php">
                <img src="svg/arrow-left.svg" alt="">
            </a>
        </div>
    </div>

    <br>
    <br>
    <br>
    <br>

    <div class="Registro">
        <div class="inicio">
            <h1>Respaldar Base de Datos</h1>

            <div class="Imagen">
                <img src="svg\data-hosting.svg" alt="Imagen" class="IMG">
            </div>

            <div class="container_btn_respaldo">
                <form action="Respaldar.php" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                    <button type="submit" id="exportar" name="exportar"
                        class="btn-modal-respaldo btn-success">Respaldar</button>
                </form>

                <button type="button" id="recuperar" name="recuperar" onclick="abre();"
                    class="btn-modal-respaldo btn-primary">Recuperar</button>
            </div>

        </div>
    </div>

    <br>
    <br>
    <br>

    <?php
		include("../Footer.php");
	?>

    <?php elseif (!empty($user)): ?>
    <div class="modal">
        <div class="modal_container">
            <img src="svg\neutral_face.svg" class="modal_img">
            <h2 class="modal_title">Acceso Denegado</h2>
            <p class="modal_paragraph">Lo siento no tienes permitido el acceso.</p>
            <div class="container_btn">
                <a href="../Index.php" class="btn-modal btn-secondary">Cerrar</a>
            </div>
            <?php else: ?>
            <img src="svg\neutral_face.svg" class="modal_img">
            <h2 class="modal_title">Acceso Denegado</h2>
            <p class="modal_paragraph">Lo siento no tienes permitido el acceso.</p>
            <div class="container_btn">
                <a href="../Index.php" class="btn-modal btn-secondary">Cerrar</a>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <script src="../js/app_admin.js"></script>
    <script src="../js/modal_cerrar_sesion.js"></script>

</body>

</html>