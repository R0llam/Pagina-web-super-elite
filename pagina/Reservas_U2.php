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
    <title>Mis Reservas</title>
    <link rel="shortcut icon" type="image/x-icon" href="Imagenes/Icono.png">
    <link rel="stylesheet" type="text/css" href="Estilos_Reserva_Usuario.css">
    <link rel="stylesheet" type="text/css" href="Estilos_Buscador.css">
    <?php include("link.php");?>
</head>

<body>

    <?php if (!empty($user)): ?>

    <?php
		include("barra_de_navegacion2.php");
        $ID=$_GET['id'];
		?>

    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="contenedor_volver">
        <div class="volver">
            <a href="Index.php">
                <img src="svg/arrow-left.svg" alt="">
            </a>
        </div>
    </div>

    <h1>Mis Reservas</h1>

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
                    <input type="text" name="campo" id="campo" placeholder="Buscar Reserva" class="form-control me-2">
                    <input type="hidden" id="id" name="id" value="<?php echo $ID; ?>">
                </div>

            </div>

            <br>

            <div class="container">
                <div class="table-responsive">
                    <table class="table table-secondary table-bordered table_id">
                        <thead class="table-dark">
                            <th class="sort asc"><img src="assets\arrow-down-up.svg" class="ordenar_img">Usuario</th>
                            <th class="sort asc"><img src="assets\arrow-down-up.svg" class="ordenar_img">Referencia</th>
                            <th class="sort asc"><img src="assets\arrow-down-up.svg" class="ordenar_img">Estado</th>
                            <th class="sort asc"><img src="assets\arrow-down-up.svg" class="ordenar_img">Tipo</th>
                            <th class="sort asc"><img src="assets\arrow-down-up.svg" class="ordenar_img">Comprobante</th>
                            <th class="sort asc"><img src="assets\arrow-down-up.svg" class="ordenar_img">Total $</th>
                            <th class="sort asc"><img src="assets\arrow-down-up.svg" class="ordenar_img">Total Bs</th>
                            <th class="sort asc"><img src="assets\arrow-down-up.svg" class="ordenar_img">Fecha</th>
                            <th class="sort asc"><img src="assets\arrow-down-up.svg" class="ordenar_img">Acciones</th>
                        </thead>

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

    <script src="TablaRU.js"></script>
    <script src="js/app.js"></script>
    <script src="js\page.js"></script>

    <br>
    <br>
    <br>

    <?php
	include("Footer.php");
	?>

    <?php endif; ?>

    <script src="js/modal_cerrar_sesion.js"></script>

</body>

</html>