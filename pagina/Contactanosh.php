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
    <title>Contáctanos</title>
    <link rel="shortcut icon" type="image/x-icon" href="Imagenes/Icono.png">
    <link rel="stylesheet" href="Estilos_Contactanos_10.css">
    <link rel="stylesheet" href="Estilos_modal_contactanos.css">
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

        <?php 
			$id=$user['id'];
			include 'database2.php';
			$conexion=conexion();
			$query=listar_U($conexion,$id);
			$datos= mysqli_fetch_assoc($query);
			$Nombre=$datos ['Nombre'];
			$Apellido=$datos['Apellido'];
			$Correo_Electronico=$datos['Correo_Electronico'];
			?>

        <h1>Contáctanos</h1>
        <form name="Contactanos" action="Contactanos.php?ID=<?php echo $id?>" method="post">

            <label for="Nombres_C">Nombre:<input class="controles" type="text" name="Nombres_C" id="Nombres_C" required
                    onkeypress="return Enter(this, event, 'NO', 'LET')" required="obligatorio" maxlength="50"
                    placeholder="Escribe Tus Nombres" value="<?php echo $Nombre ?>" /></label>

            <label for="Apellidos_C">Apellido:<input class="controles" type="text" name="Apellidos_C" id="Apellidos_C"
                    required onkeypress="return Enter(this, event, 'NO', 'LET')" required="obligatorio" maxlength="50"
                    placeholder="Escribe Tus Apellidos" value="<?php echo $Apellido ?>" /></label>

            <label for="Correo Electronico_C">Correo Electrónico:<input class="controles" type="email"
                    name="Correo Electronico_C" id="Correo Electronico_C" required="obligatorio" maxlength="50"
                    placeholder="Escribe Tu Correo Electrónico" value="<?php echo $Correo_Electronico ?>" /></label>

            <label for="Telefono">Teléfono:<input class="controles" type="text" name="Telefono" id="Telefono" required
                    onkeypress="return Enter(this, event, 'SI', 'NUM3')" required="obligatorio" maxlength="12"
                    placeholder="Escribe Tu Teléfono" /></label>

            <label for="Asunto">Asunto:<input class="controles" type="text" name="Asunto" id="Asunto" required
                    onkeypress="return Enter(this, event, 'NO', 'LET-NUM')" required="obligatorio" maxlength="50"
                    placeholder="Escribe tu Asunto" /></label>

            <label for="Mensaje">Mensaje:</Label><textarea class="controles" type="text" Name="Mensaje" rows="5"
                cols="15" id="Mensaje" required="obligatorio" maxlength="200"
                placeholder="Escribe tu Comentario"></textarea>

            <div class="contenedor">
                <input class="Boton1" type="submit" value="Enviar" />
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

    <!-- <div class="modal">
	<div class="modal_container">
		<img src="svg\full_inbox.svg" class="modal_img">
		<h2 class="modal_title">Mensaje Enviado con Éxito</h2>
		<p class="modal_paragraph">Gracias por enviar tu mensaje pronto lo revisaremos</p>
		<div class="container_btn">
			<a href="#" class="btn-modal btn-secondary">Cerrar</a>
		</div>
	</div>
</div>

	<script src="js\modal_contactanos.js"></script> -->

    <script src="js/modal_cerrar_sesion.js"></script>
    <script src="js/app.js"></script>
    <script src="js\validacion_num_let.js" type="text/javascript"></script>
</body>

</html>