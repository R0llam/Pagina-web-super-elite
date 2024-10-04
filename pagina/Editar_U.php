<?php
$id=$_GET['id'];
include 'database2.php';
$conexion=conexion();
$query=listar_U($conexion,$id);
$datos= mysqli_fetch_assoc($query);
$Nombre=$datos ['Nombre'];
$Apellido=$datos['Apellido'];
$Correo_Electronico=$datos['Correo_Electronico'];
$usuario=$datos['usuario'];
$contrasena=$datos['contrasena'];
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
    <title>Usuario</title>
    <link rel="shortcut icon" type="image/x-icon" href="Imagenes/Icono.png">
    <link rel="stylesheet" type="text/css" href="Estilos_Editar_Usuario.css">
</head>

<body>

    <?php if (!empty($user) and $user['id'] == '1'): ?>
    <?php
            include("link_admin.php");
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

    <script src="js\app_admin.js"></script>

    <section class="Registro">
        <div class="img-usuario"><img src="Imagenes/Vectores/Img_12.png"></div>
        <h1>
            <font color="#fff"><?php echo $usuario; ?><font>
        </h1>
        <form name="Registro" action="Editar_U2.php?id=<?php echo $id?>" method="post">
            <label for="Nombre">Nombre:<input class="controles" type="text" name="Nombre" id="Nombre" required
                    onkeypress="return Enter(this, event, 'NO', 'LET')" required="obligatorio" maxlength="50"
                    placeholder="Escribe Tu Nombre" value="<?php echo $Nombre; ?>" /></label>

            <label for="Apellidos">Apellido:<input class="controles" type="text" name="Apellido" id="Apellido" required
                    onkeypress="return Enter(this, event, 'NO', 'LET')" required="obligatorio" maxlength="50"
                    placeholder="Escribe Tus Apellidos" value="<?php echo $Apellido; ?>" /></label>

            <label for="Correo Electrónico">Correo Electrónico:<input class="controles" type="email"
                    name="Correo_Electronico" id="Correo_Electronico" required="obligatorio" maxlength="50"
                    placeholder="Escribe Tu Correo Electrónico" value="<?php echo $Correo_Electronico; ?>" /></label>

            Usuario
            <div class="container">
                <input class="passw" type="text" name="usuario" id="usuario" required="obligatorio" size="20"
                    maxlength="10" placeholder="Escribe Tu Usuario" value="<?php echo $usuario; ?>" /></label>
                <img src="assets\person-fill.svg" alt="" class="icon_1">
            </div>

            Contraseña:
            <div class="container">
                <input class="passw" type="password" name="contrasena" required="obligatorio" size="20" maxlength="15"
                    placeholder="Escribe Tu Contraseña" id="input" value="<?php echo $contrasena; ?>">
                <img src="Imagenes/Vectores/Img_10.png" alt="" class="icon_2" id="Eye">
            </div>
            <script src="Ver.js"></script>
            <div class="contenedor">
                <input class="Boton2" type="submit" value="Editar" />
            </div>
        </form>
    </section>

    <?php elseif (!empty($user)): ?>
    <?php
    include("link.php");
    include("barra_de_navegacion2.php");
    ?>

    <div class="contenedor_volver">
        <div class="volver">
            <a href="Index.php">
                <img src="svg/arrow-left.svg" alt="">
            </a>
        </div>
    </div>


    <br>
    <br>
    <br>
    <br>
    <br>

    <script src="js/app.js"></script>

    <section class="Registro">
        <div class="img-usuario"><img src="Imagenes/Vectores/Img_12.png"></div>
        <h1>
            <font color="white"><?php echo $usuario; ?><font>
        </h1>
        <form name="Registro" action="Editar_U2.php?id=<?php echo $id?>" method="post">
            <label for="Nombre">Nombre:<input class="controles" type="text" name="Nombre" id="Nombre" required
                    onkeypress="return Enter(this, event, 'NO', 'LET')" required="obligatorio" maxlength="20"
                    placeholder="Escribe Tu Nombre" value="<?php echo $Nombre; ?>" /></label>

            <label for="Apellidos">Apellido:<input class="controles" type="text" name="Apellido" id="Apellido" required
                    onkeypress="return Enter(this, event, 'NO', 'LET')" required="obligatorio" maxlength="20"
                    placeholder="Escribe Tus Apellidos" value="<?php echo $Apellido; ?>" /></label>

            <label for="Correo Electrónico">Correo Electrónico:<input class="controles" type="email"
                    name="Correo_Electronico" id="Correo_Electronico" required="obligatorio" maxlength="50"
                    placeholder="Escribe Tu Correo Electrónico" value="<?php echo $Correo_Electronico; ?>" /></label>

            Usuario
            <div class="container">
                <input class="passw" type="text" name="usuario" id="usuario" required="obligatorio" size="20"
                    maxlength="10" placeholder="Escribe Tu Usuario" value="<?php echo $usuario; ?>" /></label>
                <img src="assets\person-fill.svg" alt="" class="icon_1">
            </div>

            Contraseña:
            <div class="container">
                <input class="passw" type="password" name="contrasena" required="obligatorio" size="20" maxlength="20"
                    placeholder="Escribe Tu Contraseña" id="input" value="<?php echo $contrasena; ?>">
                <img src="Imagenes/Vectores/Img_10.png" alt="" class="icon_2" id="Eye">
            </div>

            <script src="Ver.js"></script>
            <div class="contenedor">
                <input class="Boton2" type="submit" value="Editar" />
            </div>
        </form>
    </section>
    <?php else: ?>
    <h1>Acceso Denegado</h1>
    <div class="Regresar">
        <p align="center"><a href="Index.php">Regresar a la Página Principal.</a></p>
    </div>
    <?php endif; ?>

    <br>
    <br>
    <br>

    <?php
    include("Footer.php");
    ?>

    <script src="js/modal_cerrar_sesion.js"></script>
    <script src="js\validacion_num_let.js" type="text/javascript"></script>

</body>

</html>