<?php
	session_start();
	error_reporting(0);
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
    <title>Iv-SuperElite</title>
    <link rel="shortcut icon" type="image/x-icon" href="Imagenes/Icono.png">
    <link rel="stylesheet" type="text/css" href="Estilos_Acceso_Denegado.css">
    <link rel="stylesheet" href="Estilo_Pagina_Principal.css">
    <link rel="stylesheet" href="Estilos_Administrados.css">
    <?php include("link_admin.php");?>
</head>

<body>

    <?php if (!empty($user) and $user['id'] == '1'): ?>

    <?php
    include("barra_de_navegacion_admin.php");
    ?>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="container_cards">

        <a href="Usuarios.php" class="link">
            <div class="card">
                <div class="text">
                    <p class="second_text"><?php 
                    include("database2.php");
                    $conexion=conexion();
                    $sqla1="SELECT * FROM users";
                    $querya1=mysqli_query($conexion,$sqla1);
                    $num_row=$querya1->num_rows -1;
                    echo $num_row;
                    ?></p>
                    <p class="title">Clientes Registrados</p>
                </div>
                <div class="img_card">
                    <img src="assets\people-fill.svg" class="img">
                </div>
            </div>
        </a>

        <a href="Administracion_de_productos2.php" class="link">
            <div class="card">
                <div class="text">
                    <p class="second_text"><?php 
                    $sqla2="SELECT * FROM productos";
                    $querya2=mysqli_query($conexion,$sqla2);
                    $num_row=$querya2->num_rows;
                    echo $num_row;
                    ?></p>
                    <p class="title">Productos Registrados</p>
                </div>
                <div class="img_card">
                    <img src="assets\cart4.svg" class="img">
                </div>
            </div>
        </a>

        <a href="Administracion_de_reservas.php" class="link">
            <div class="card">
                <div class="text">
                    <p class="second_text"><?php 
                    $sqla3="SELECT * FROM pedido_cp where estado='En espera'";
                    $querya3=mysqli_query($conexion,$sqla3);
                    $num_row=$querya3->num_rows;
                    echo $num_row;
                    ?></p>
                    <p class="title">Pedidos en Espera</p>
                </div>
                <div class="img_card">
                    <img src="assets\bag-dash-fill.svg" class="img">
                </div>
            </div>
        </a>

        <a href="Administracion_de_reservas_C2.php" class="link">
            <div class="card">
                <div class="text">
                    <p class="second_text"><?php 
                    $sqla4="SELECT * FROM pedido_cp where estado='Completada'";
                    $querya4=mysqli_query($conexion,$sqla4);
                    $num_row=$querya4->num_rows;
                    echo $num_row;
                    ?></p>
                    <p class="title">Pedidos Completados</p>
                </div>
                <div class="img_card">
                    <img src="assets\bag-check-fill.svg" class="img">
                </div>
            </div>
        </a>

        <a href="Curriculum2.php" class="link">
            <div class="card">
                <div class="text">
                    <p class="second_text"><?php 
                    $sqla5="SELECT * FROM empleo";
                    $querya5=mysqli_query($conexion,$sqla5);
                    $num_row=$querya5->num_rows;
                    echo $num_row;
                    ?></p>
                    <p class="title">Currículos</p>
                </div>
                <div class="img_card">
                    <img src="assets\file-earmark-person-fill.svg" class="img">
                </div>
            </div>
        </a>

        <a href="Administracion_contactanos.php" class="link">
            <div class="card">
                <div class="text">
                    <p class="second_text"><?php 
                    $sqla6="SELECT * FROM contactanos";
                    $querya6=mysqli_query($conexion,$sqla6);
                    $num_row=$querya6->num_rows;
                    echo $num_row;
                    ?></p>
                    <p class="title">Mensajes de Contáctanos</p>
                </div>
                <div class="img_card">
                    <img src="assets\envelope-fill.svg" class="img">
                </div>
            </div>
        </a>

    </div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>



    <?php
    include("Footer.php");
	?>

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

    <script src="js\app_admin.js"></script>
    <script src="js/modal_cerrar_sesion.js"></script>
</body>

</html>