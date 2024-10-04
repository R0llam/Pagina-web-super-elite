<?php  session_start();
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
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carrito</title>
    <link rel="shortcut icon" type="image/x-icon" href="Imagenes/Icono.png">
    <link rel="stylesheet" href="Estilos_pedidos.css">
    <link rel="stylesheet" href="Estilos_Carrito_Compras_2.css">
    <link rel="stylesheet" href="Modal_carrito.css">
    <?php include("link.php");?>
</head>

<body style="background-color: #26292e;">

    <?php if (!empty($user) and $user['id'] == '1'): ?>
    <?php
			include("barra_de_navegacion_carrito.php");
		?>
    <br>
    <br>
    <br>

    <div id="modal_cart2"></div>

    <?php elseif (!empty($user)): ?>
    <?php
			include("barra_de_navegacion_carrito2.php");

		?>
    <br>
    <br>
    <br>

    <div id="modal_cart2"></div>

    <?php else: ?>

    <?php
			include("barra_de_navegacion3.php")
		?>

    <?php endif; ?>

    <div class="contenedor_volver">
        <div class="volver">
            <a href="<?php echo $_SERVER['HTTP_REFERER'];?>">
                <img src="svg/arrow-left.svg" alt="">
            </a>
        </div>
    </div>

    <br>
    <br>

    <div class="container">
        <p style="font-weight: bold; color: #fff; font-size: 30px; text-align: center;">Mi Pedido</p>
        <br>
        <br>
        <div class="table-responsive">
            <table style="color: #fff;" class="table" id="tblDatos">
                <thead>
                    <tr>
                        <th style="color: #fff; text-align: center;">#</th>
                        <th style="color: #fff; text-align: center;">Imagen</th>
                        <th style="color: #fff; text-align: center;">Cantidad</th>
                        <th style="color: #fff; text-align: center;">Artículo</th>
                        <th style="color: #fff; text-align: center;">Precio</th>
                        <th style="color: #fff; text-align: center;">Total</th>
                        <th style="color: #fff; text-align: center;">Borrar</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                include("database2.php");
                $conexion=conexion();
                if(isset($_SESSION['carrito'])){
                    $total=0;
                    $total2=0;
                    for($i=0;$i<=count($carrito_m)-1;$i ++){
                        if(isset($carrito_m[$i])){
                            if($carrito_m[$i]!=NULL){
                                ?>
                    <?php if ($carrito_m[$i]['Imagen'] != 'portes'){ ?>

                    <tr>
                        <th scope="row" style="vertical-align: middle;"><?php echo $i; ?></th>
                        <td>
                            <div style="display: flex; justify-content: center;">
                                <?php 
                                                if($carrito_m[$i]['Tipo'] == 1){
                                                    $id2= $carrito_m[$i]['ID'];
                                                    $query8= listar_productos2($conexion,$id2);
                                                    $row8= mysqli_fetch_assoc($query8);
                                                    $Nombre2 = $row8 ['NombreP'];
                                                    $archivo2=$row8['archivoBLOB'];
                                                    $valor="<img width='130' height='130' src='../Productos/$archivo2'></img>";
                                                    echo $valor;
                                                }
                                                else{
                                                    $id2= $carrito_m[$i]['ID'];
                                                    $query8= listar_Ofertas2($conexion,$id2);
                                                    $row8= mysqli_fetch_assoc($query8);
                                                    $Nombre2 = $row8['Nombre_Oferta'];
                                                    $archivo2=$row8['Imagen_de_Oferta'];
                                                    $valor="<img width='130' height='130' src='../Ofertas/$archivo2'></img>";
                                                    echo $valor;
                                                }
                                                ?>
                            </div>
                        </td>
                        <td style="vertical-align: middle;">
                            <?php 
                                if($carrito_m[$i]['Tipo'] == 1){
                                    $id2= $carrito_m[$i]['ID'];
                                    $query20= listar_productos2($conexion,$id2);
                                    $row20= mysqli_fetch_assoc($query20);
                                    $cantidadmax= $row20['Cantidad'];
                                    $cantidadinv= $row20['Cantidad'];
                                    if($cantidadmax != 0){
                                        $cantidadmax= 10;
                                    }
                                    else{
                                        $cantidadmax= $row20['Cantidad'];
                                    }  
                                }
                                else{
                                    $id2= $carrito_m[$i]['ID'];
                                    $query20= listar_Ofertas2($conexion,$id2);
                                    $row20= mysqli_fetch_assoc($query20);
                                    $cantidadmax= $row20['Cantidad_O'];
                                    $cantidadinv= $row20['Cantidad_O'];
                                    if($cantidadmax != 0){
                                        $cantidadmax= 10;
                                    }
                                    else{
                                        $cantidadmax= $row20['Cantidad_O'];
                                    }  
                                }
                            ?>
                            <form id="form2" name="form1" method="get" action="carrito.php">

                                <input name="id2" type="hidden" id="id2" value="<?php print $i;   ?>"
                                    class="align-middle" />
                                <center>
                                    <label>Stock del Producto: <?php print $cantidadinv; ?>&nbsp;
                                        &nbsp;</label>
                                    
                                    <br>

                                    <input name="Cantidad" type="number" id="Cantidad" style="width:90px; height: 31px; margin-top:7px;"
                                        class="align-middle text-center"
                                        value="<?php print $carrito_m[$i]['Cantidad'];   ?>" required="obligatorio"
                                        required onkeypress="return Enter(this, event, 'SI', 'NUM')" size="1"
                                        maxlength="4" max="<?php print $cantidadmax; ?>" min="1" />

                                    <input style="height:30px; width:45px; margin-top:7px; margin-right:10px;" type="image" name="imageField3"
                                        src="assets/repeat.svg" value="" class="btn btn-sm btn-primary btn-rounded" />
                                </center>

                            </form>
                        </td>

                        <td style="vertical-align: middle; text-align: center;"><?php echo $carrito_m[$i]['Nombre'] ?>
                        </td>
                        <td style="vertical-align: middle; text-align: center;">
                            <?php echo $carrito_m[$i]['Precio'] ?>$&nbsp;/
                            <?php echo $carrito_m[$i]['Precio_B'] ?>&nbsp;Bs</td>
                        <td style="vertical-align: middle; text-align: center;">
                            <?php echo $carrito_m[$i]['Precio'] * $carrito_m[$i]['Cantidad']; ?>$&nbsp;/
                            <?php echo $carrito_m[$i]['Precio_B'] * $carrito_m[$i]['Cantidad']; ?>&nbsp;Bs</td>
                        <td style="vertical-align: middle; text-align: center;">
                            <form id="form3" name="form2" method="get" action="carrito.php">
                                <input name="id3" type="hidden" id="id3" value="<?php print $i;   ?>" />
                                <button type="image" name="imageField3" class="btn btn-danger" style="border:0px;"
                                    data-toggle="tooltip" data-placement="top" title="Remove item">Borrar
                                </button>
                            </form>
                        </td>

                        <?php } ?>
                        <?php
        $total=$total + ($carrito_m[$i]['Precio'] * $carrito_m[$i]['Cantidad']);
        $total2=$total + ($carrito_m[$i]['Precio_B'] * $carrito_m[$i]['Cantidad']);
        }
        }
        }
        }
    ?>
                    </tr>
        </div>
        </tbody>
        </table>

        <br>

        <div id="paginador" class=""></div>

        <br>
        <br>

        <li class="list-group-item d-flex justify-content-between">
            <span style="text-align: left; color: #fff;"><strong>Total en Dólares:</strong></span>
            <strong style="text-align: left; color: #fff;"><?php
                if(isset($_SESSION['carrito'])){
                $total=0;
                for($i=0;$i<=count($carrito_m)-1;$i ++){
                    if(isset($carrito_m[$i])){
                        if($carrito_m[$i]!=NULL){ 
                        $total=$total + ($carrito_m[$i]['Precio'] * $carrito_m[$i]['Cantidad']);
                        }
                    }
                }
                }
                if(!isset($total)){
                    $total = '0';
                }
                else{
                    $total = $total;
                }
                echo number_format($total, 2, ',', '.');  ?> $</strong>
            <span style="text-align: left; color: #fff;"><strong>Total en Bolívares:</strong></span>
            <strong style="text-align: left; color: #fff;"><?php
                if(isset($_SESSION['carrito'])){
                $total2=0;
                for($i=0;$i<=count($carrito_m)-1;$i ++){
                    if(isset($carrito_m[$i])){
                        if($carrito_m[$i]!=NULL){ 
                        $total2=$total2 + ($carrito_m[$i]['Precio_B'] * $carrito_m[$i]['Cantidad']);
                        }
                    }
                }
                }
                if(!isset($total2)){
                    $total2 = '0';
                }
                else{
                    $total2 = $total2;
                }
                echo number_format($total2, 2, ',', '.');  ?> Bs</strong>
        </li>
    </div>
    <br>
    <a type="button" class="btn btn-danger my-4" href="index.php" style="margin-left:5px;">Cancelar Pedido</a>
    <a type="button" class="btn btn-success my-4" href="reserva2.php" style="margin-left:5px;">Continuar Como Reserva</a>
    <a type="button" class="btn btn-primary my-4" href="compra.php" style="margin-left:5px;">Continuar Como Compra</a>
    <br>
    <br>
    <br>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>

    <?php
	include("Footer.php");
	?>

    <script src="js/modal_cerrar_sesion.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="js\page.js"></script>
    <script src="js\validacion_num_let.js" type="text/javascript"></script>

</body>

</html>