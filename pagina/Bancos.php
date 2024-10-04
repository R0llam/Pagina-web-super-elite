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
		}else{
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
    <title>Administración de Cuentas Bancarias</title>
    <link rel="shortcut icon" type="image/x-icon" href="Imagenes/Icono.png">
    <link rel="stylesheet" type="text/css" href="Estilos_Administracion_Categorias_2.css">
    <link rel="stylesheet" type="text/css" href="Estilos_Acceso_Denegado.css">
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

    <h1 class="Titulo_P">Registro de Cuentas Bancarias</h1>

    <div class="Container_all">

        <div class="Contenedor_registro">
            <section class="Registro">

                <h1>Datos de la Cuenta Bancaria</h1>

                <form name="Categoria" action="Bancos2.php" method="post" enctype="multipart/form-data">

                    <label for="NombreP">Nombre:<input class="controles" type="text" name="NombreP" id="NombreP"
                            required onkeypress="return Enter(this, event, 'NO', 'LET')" required="obligatorio"
                            maxlength="50" placeholder="Escribe el nombre de la Cuenta Bancaria " /></label>

                    <label for="Descripcion">Descipción:<input class="controles" type="text" name="Descripcion"
                            id="Descripcion" required="obligatorio" maxlength="50"
                            placeholder="Escribe la descipción de la cuenta Bancaria " /></label>

                    <h2 class="titulo2">Imagen de la Carta</h2>

                    <p class="texto_imagen">La imagen Seleccionada tiene que ser de tipo JPG.</p>

                    <div id="file">
                        <p id="texto">Seleccionar Imagen</p>
                        <input type="file" name="Imagen" id="Imagen" required="obligatorio" />
                    </div>

                    <div class="contenedor">
                        <input class="Boton1" type="submit" value="Guardar" />
                        <input class="Boton2" type="reset" value="Restablecer" />
                    </div>

                </form>

            </section>
        </div>

        <div class="container_table">

            <h1 class="titulo_tabla">cuentas Bancarias Registradas</h1>

            <div class="table-responsive">
                <table class="table table-secondary table-bordered" id="tblDatos">
                    <thead class="table-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
				include("database2.php");
				$conexion=conexion();
				$sql="SELECT * FROM cuenta_bancaria";
	            $query = mysqli_query($conexion, $sql);
				while ($row = mysqli_fetch_assoc($query)) {
				$id = $row ['ID_Cuenta_Bancaria'];
				$Nombre = $row ['Nombre_CB'];
				?>
                        <tr>
                            <td><?php echo $Nombre; ?></td>
                            <td>
                                <a class='btn btn-danger' href="eliminarCuentaB.php?id=<?php echo $id?>">Eliminar</a>
                            </td>
                        </tr>
                        <?php
			}
			?>
                    </tbody>
                </table>
                <div class="contenedor_paginador">
                    <div id="paginador" class=""></div>
                </div>
            </div>
        </div>
    </div>

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
    <script src="js\page_categorias.js"></script>
    <script src="js\validacion_num_let.js" type="text/javascript"></script>
    <script src="js/modal_cerrar_sesion.js"></script>

</body>

</html>