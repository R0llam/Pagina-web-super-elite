<?php
include 'database2.php';
$conexion=conexion();
$query=listar_precio($conexion);
$datos= mysqli_fetch_assoc($query);
$Precio=$datos['Precio_B'];
?>
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
    <title>Actualización de Precio</title>
    <link rel="shortcut icon" type="image/x-icon" href="Imagenes/Icono.png">
    <link rel="stylesheet" type="text/css" href="Estilo_Actualizacion_Precio_10.css">
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

    <section class="Registro">
        <h1>Actualización de Precio</h1>
        <div class="Imagen"><img class="IMG" src="Imagenes/Vectores/Img_3.png" alt="Imagen"></div>
        <form name="Administracion_de_productos" action="Actualizacion_de_precio2.php" method="post"
            enctype="multipart/form-data">
            <label for="Precio_B">Precio del Dólar <input class="controles" type="text" name="Precio_B" id="Precio_B"
                    required="obligatorio" maxlength="50" required onkeypress="return Enter(this, event, 'SI', 'NUM2')"
                    placeholder="Escribe el precio del dólar" value="<?php echo $Precio; ?>" /></label>
            <div class="contenedor">
                <input class="Boton1" type="submit" value="Actualizar" />
            </div>
        </form>
    </section>

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
                <a href="Index.php" class="btn-modal btn-secondary">Cerrar</a>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <br>
    <br>
    <br>

    <?php
	include("Footer.php");
	?>

    <script src="js\app_admin.js"></script>
    <script src="js\validacion_num_let.js" type="text/javascript"></script>
    <script src="js/modal_cerrar_sesion.js"></script>

</body>

</html>