<?php
session_start();
require 'database.php';
include("database2.php");
$conexion=conexion();

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
    <title>Registrar Ofertas</title>
    <link rel="shortcut icon" type="image/x-icon" href="Imagenes/Icono.png">
    <link rel="stylesheet" type="text/css" href="Estilos_Acceso_Denegado.css">
    <link rel="stylesheet" href="Estilos_Registro_Ofertas_2.css">
    <link rel="stylesheet" href="Estilos_Buscador_registro_ofertas.css">
    <?php include("link_admin.php");?>
    <script src="js\code_jsquery.js"></script>
</head>

<body>

    <?php if (!empty($user) and $user['id'] == '1'): ?>

    <?php
    include("barra_de_navegacion_admin.php");
    ?>

    <div class="contenedor_volver">
        <div class="volver">
            <a href="Pagina_Principal_Administracion_Productosh.php">
                <img src="svg/arrow-left.svg" alt="">
            </a>
        </div>
    </div>


    <br>
    <br>
    <br>
    <br>
    <br>

    <h1>Registro de Oferta</h1>

    <div class="Container_all">

        <section class="Registro">

            <h1>Datos de la Ofertas</h1>

            <form id="1" name="1" action="Administracion_de_ofertas.php" method="post" enctype="multipart/form-data">

                <label for="ID">Código:<input class="controles" type="text" name="ID" id="ID" required
                        onkeypress="return Enter(this, event, 'NO', 'LET-NUM')" required="obligatorio" maxlength="50"
                        placeholder="Escribe un código para la oferta" /></label>

                <label for="NombreP">Nombre:<input class="controles" type="text" name="NombreP" id="NombreP" required
                        onkeypress="return Enter(this, event, 'NO', 'LET-NUM')" required="obligatorio" maxlength="50"
                        placeholder="Escribe el nombre de la oferta" /></label>

                <label for="Precio">Precio:<input class="controles" type="text" name="Precio" id="precio"
                        required="obligatorio" maxlength="50" required
                        onkeypress="return Enter(this, event, 'SI', 'NUM2')"
                        placeholder="Escribe el precio de la oferta" value="0" min="0" /></label>

                <p id="content"></p>

                <label for="Cantidad">Cantidad:<input class="controles" type="text" name="Cantidad" id="Cantidad"
                        required="obligatorio" maxlength="50" required
                        onkeypress="return Enter(this, event, 'SI', 'NUM')"
                        placeholder="Escribe la cantidad de ofertas" /></label>

                <label for="Descripcion">Descripción:</Label><textarea class="controles" type="text" Name="Descripcion"
                    rows="5" cols="15" id="Descripcion" required="obligatorio" maxlength="200"
                    placeholder="Escribe la descripción de la oferta" /></textarea>

                <label for="Duracion">Duración:<input class="controles" type="text" name="Duracion" id="Duracion"
                        required="obligatorio" maxlength="50" required
                        onkeypress="return Enter(this, event, 'SI', 'NUM')"
                        placeholder="Escribe la cantidad de días de la oferta" /></label>

                <h2>Imagen</h2>

                <p class="texto_imagen">La imagen Seleccionada tiene que ser de tipo JPG.</p>

                <div id="file">
                    <p id="texto">Seleccionar Imagen</p>
                    <input type="file" name="Imagen" id="imagen" required="obligatorio" />
                </div>

                <div class="contenedor">
                    <input class="Boton1" type="submit" value="Guardar" />
                    <input class="Boton2" type="reset" value="Restablecer" />
                </div>

            </form>

        </section>

        <div class="contenedor_tabla_PR">
            <h1> Añadir Productos</h1>
            <div class="container-fluid">
                <form action="" method="GET" class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Buscar Producto" name="busqueda" />
                    <button class="btn1 btn-warning" type="submit" name="enviar"><b>Buscar</b></button>
                </form>
            </div>
            <?php
            $where="";
            if(isset($_GET['enviar'])){
                $busqueda = $_GET['busqueda'];
                if (isset($_GET['busqueda'])){
                    $where="WHERE ID_P LIKE'%".$busqueda."%' OR NombreP  LIKE'%".$busqueda."%'";
                }
            }
            ?>
            <br>
            <div class="container_table_1">
                <table class="table table-secondary table-bordered table_id" id="tblDatos_1">
                    <thead class="table-dark">
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Cantidad a añadir</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php 
                            $sql1=$SQL="SELECT * FROM productos $where";
                            $query=mysqli_query($conexion,$sql1);
                            if($query -> num_rows >0){
                                while ($row = mysqli_fetch_assoc($query)) {
                                    $id = $row ['ID_P'];
                                    $Nombre = $row ['NombreP'];
                                    $archivo=$row['archivoBLOB'];
                                    ?>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $Nombre; ?></td>
                            <td>

                                <input class="Controles_P" name="Cantidad_OP" type="number" required
                                    onkeypress="return Enter(this, event, 'SI', 'NUM')"
                                    id="Cantidad_OP<?php echo $id; ?>" min="1" required="obligatorio" value="1" />

                                <input class="Controles_P" name="id" type="hidden" id="id<?php echo $id; ?>"
                                    value="<?php echo $id; ?>" />

                            </td>
                            <td>
                                <?php 
                                        $valor="<img class='card-img' height='100' src='../Productos/$archivo' class='card-img'></img>";
                                        echo $valor; ?>
                            </td>
                            <td>
                                <button class="btn btn-primary" onclick="
                                        eviar_carrito(
                                            $('#id<?php echo $id; ?>').val(),
                                            $('#Cantidad_OP<?php echo $id; ?>').val(),
                                        );
                                    ">
                                    Anadir
                                </button>
                            </td>
                        </tr>
                        <?php
                                }
                            }
                            else{
                                ?>
                        <tr class="text-center">
                            <td colspan="16">No Existen Registros</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="contenedor_paginador">
                    <div id="paginador_1" class=""></div>
                </div>
            </div>
            <h1>Productos Añadidos</h1>
            <br>
            <div class="container_table_2">
                <div>
                    <table class="table table-secondary table-bordered table_id" id="tblDatos_2">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Imagen</th>
                                <th>Nombre</th>
                                <th>Cantidad</th>
                                <th>Borrar</th>
                            </tr>
                        </thead>
                        <tbody id="contenido_tabla">

                        </tbody>
                    </table>
                    <div class="contenedor_datos_tabla_final">
                        <div class="contenedor_paginador">
                            <div id="paginador_2" class=""></div>
                        </div>
                        <div class="Precio_total" id="contenido_precio_oferta">
                        </div>
                    </div>
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
    <script src="Enviar_Oferta.js"></script>
    <script src="Tabla_Registrar_Oferta.js"></script>
    <script src="precio.js"></script>
    <script src="js\app_admin.js"></script>
    <script src="js\page_añadir_productos_RF.js"></script>
    <script src="js\page_productos_añadidos_RF.js"></script>
    <script src="js\validacion_num_let.js" type="text/javascript"></script>
    <script src="js/modal_cerrar_sesion.js"></script>

</body>

</html>