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
    <title>Administración de Contáctanos</title>
    <link rel="shortcut icon" type="image/x-icon" href="Imagenes/Icono.png">
    <link rel="stylesheet" type="text/css" href="Estilos_Administracion_Contactanos_10.css">
    <link rel="stylesheet" type="text/css" href="Estilos_Buscador.css">
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
    <br>

    <h1>Mensajes Enviados</h1>

    <br>
    <main>
        <div class="container">

            <div class="container_select_buscador">

                <div class="texto_select">
                    <label for="num_registros">Mostrar: </label>
                </div>

                <div class="container_select">
                    <select name="num_registros" id="num_registros" class="form-select">
                        <option value="5">5</option>
                        <option value="10">10</option>
                    </select>
                </div>


                <div class="container-fluid">
                    <input type="text" required onkeypress="return Enter(this, event, 'NO', 'LET-NUM')" name="campo"
                        id="campo" placeholder="Buscar Mensaje" class="form-control me-2">
                </div>

            </div>

            <br>

            <div class="container">
                <div class="table-responsive">
                    <table class="table table-secondary table-bordered table_id" id="tblDatos">
                        <thead class="table-dark">
                            <th class="sort asc"><img src="assets\arrow-down-up.svg" class="ordenar_img">#</th>
                            <th class="sort asc"><img src="assets\arrow-down-up.svg" class="ordenar_img">Nombre</th>
                            <th class="sort asc"><img src="assets\arrow-down-up.svg" class="ordenar_img">Apellido</th>
                            <th class="sort asc"><img src="assets\arrow-down-up.svg" class="ordenar_img">Correo
                                Electrónico</th>
                            <th class="sort asc"><img src="assets\arrow-down-up.svg" class="ordenar_img">Teléfono</th>
                            <th class="sort asc"><img src="assets\arrow-down-up.svg" class="ordenar_img">Asunto</th>
                            <th class="sort asc"><img src="assets\arrow-down-up.svg" class="ordenar_img">Mensaje</th>
                            <th class="sort asc"><img src="assets\arrow-down-up.svg" class="ordenar_img">Acciones</th>
                        </thead>

                        <!-- El id del cuerpo de la tabla. -->

                        <tbody id="content">

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="container_page">

                <div class="Mostrar_registros">
                    <label id="lbl-total"></label>
                </div>

                <div class="col-12 col-md-4" id="nav-paginacion"></div>

                <input type="hidden" id="pagina" value="1">
                <input type="hidden" id="orderCol" value="0">
                <input type="hidden" id="orderType" value="asc">

            </div>
        </div>
    </main>

    <br>
    <br>
    <br>

    <?php
	include("Footer.php");
	?>

    <?php
        include("database2.php");
        $conexion=conexion(); 
		$suma= 0;
		$sql3="UPDATE notificaciones SET Cantidad_No='$suma' Where ID_No=1";
		$query3 = mysqli_query($conexion, $sql3);
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

    <script src="TablaCON.js"></script>
    <script src="js\app_admin.js"></script>
    <script src="js\page.js"></script>
    <script src="js/modal_cerrar_sesion.js"></script>
</body>

</html>