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
    <title>Registrar Productos</title>
    <link rel="shortcut icon" type="image/x-icon" href="Imagenes/Icono.png">
    <link rel="stylesheet" type="text/css" href="Estilos_Acceso_Denegado.css">
    <link rel="stylesheet" type="text/css" href="Estilos_Registro_Producto_2.css">
    <?php include("link_admin.php");?>
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

    <section class="Registro">

        <h1>Registro de Productos</h1>

        <form name="Administracion_de_productos" action="Administracion_de_productos.php" method="post"
            enctype="multipart/form-data">

            <label for="ID">Código:<input class="controles" type="text" name="ID" id="ID" required
                    onkeypress="return Enter(this, event, 'NO', 'LET-NUM')" required="obligatorio" maxlength="50"
                    placeholder="Escribe un código para el producto" /></label>

            <label for="NombreP">Nombre:<input class="controles" type="text" name="NombreP" id="NombreP" required
                    onkeypress="return Enter(this, event, 'NO', 'LET-NUM')" required="obligatorio" maxlength="50"
                    placeholder="Escribe el nombre del producto" /></label>

            <p class="Titulo_Categoria">Categoría:</p>

            <select name="Categoria_P">
                <?php 
			include("database2.php");
			$conexion=conexion();
			$query=listar_Categorias($conexion);
			while ($row = mysqli_fetch_assoc($query)) {
						$id = $row ['Categoria_P_ID'];
						$Nombre = $row ['Categoria'];	
			?>

                <option id="<?php echo $Nombre; ?>" value="<?php echo $id; ?>">
                    <?php echo $Nombre; ?>
                </option>

                <?php
			}
			?>
            </select>
            <br>
            <p class="Titulo_Categoria">Marca:</p>

            <select name="ID_Marca">
                <?php 
            $query=listar_Marcas($conexion);
            while ($row = mysqli_fetch_assoc($query)) {
                        $id = $row ['ID_Marca'];
                        $Nombre = $row ['Nombre_M'];	
            ?>

                <option id="<?php echo $Nombre; ?>" value="<?php echo $id; ?>">
                    <?php echo $Nombre; ?>
                </option>

                <?php
            }
            ?>
            </select>
            <br>

            <label for="Descripcion">Descripción:</Label><textarea class="controles" type="text" Name="Descripcion"
                rows="5" cols="15" id="Descripcion" required="obligatorio" maxlength="200"
                placeholder="Escribe la descripción del producto" /></textarea>

            <label for="precio">Precio:<input class="controles" type="text" name="Precio" id="precio"
                    required="obligatorio" maxlength="50" required onkeypress="return Enter(this, event, 'SI', 'NUM2')"
                    placeholder="Escribe el precio del producto" value="0" min="0" /></label>

            <p id="content"></p>

            <label for="Cantidad">Cantidad:<input class="controles" type="text" name="Cantidad" id="Cantidad"
                    required="obligatorio" maxlength="50" required onkeypress="return Enter(this, event, 'SI', 'NUM')"
                    placeholder="Escribe la cantidad del producto" /></label>

            <?php $fechaminima=date('Y-M-D');
            
            ?>
            <label for="Fecha_de_vencimiento">Fecha de Vencimiento <input class="controles" type="date"
                    name="Fecha_de_vencimiento" id="Fecha_de_vencimiento" min="<?php echo $fechaminima;?>" /></label>

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

    <script src="precio.js"></script>
    <script src="js\app_admin.js"></script>
    <script src="js\validacion_num_let.js" type="text/javascript"></script>
    <script src="js/modal_cerrar_sesion.js"></script>

</body>

</html>