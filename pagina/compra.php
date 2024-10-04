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
    <link rel="stylesheet" href="Estilos_pedidos_datos.css">
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
            <a href="reserva.php">
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
                        <td style="vertical-align: middle; text-align: center;">
                            <?php print $carrito_m[$i]['Cantidad']; ?>
                        </td>

                        <td style="vertical-align: middle; text-align: center;"><?php echo $carrito_m[$i]['Nombre'] ?>
                        </td>
                        <td style="vertical-align: middle; text-align: center;">
                            <?php echo $carrito_m[$i]['Precio'] ?>$ / <?php echo $carrito_m[$i]['Precio_B'] ?>Bs
                        </td>
                        <td style="vertical-align: middle; text-align: center;">
                            <?php echo $carrito_m[$i]['Precio'] * $carrito_m[$i]['Cantidad']; ?>$ /
                            <?php echo $carrito_m[$i]['Precio_B'] * $carrito_m[$i]['Cantidad']; ?>Bs
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
                echo number_format($total, 2, ',', '.');  ?>&nbsp;$</strong>
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
                echo number_format($total2, 2, ',', '.');  ?>&nbsp;Bs</strong>
        </li>
    </div>
    </div>
    </div>
    </div>
    </div>


    <hr style="width: 89%; max-width: 1300px; margin: auto; margin-top: 50px;">
    
    <br>
    <?php
        $sql="SELECT * FROM cuenta_bancaria ";
        $query = mysqli_query($conexion, $sql);
        while ($row = mysqli_fetch_assoc($query)) {
                    $Nombre2 = $row ['Nombre_CB'];	
                    $Descripcion=$row ['Descripcion_CB'];
                    $archivo=$row ['Imagen_CB'];
    ?>


    <!-- <div class="card">
        <div>
            <?php 
                $valor="<img src='../Bancos/$archivo' class='card-img'></img>";
                echo $valor;
            ?>
        </div>
        <p class="text-title-1"><?php echo $Nombre2; ?></p>
        <div class="card-footer">
            <p class="text-title-2"><?php echo $Descripcion; ?></p>
        </div>
    </div> -->


    <?php
        }
    ?>
    <br>

    <?php
   $id=$user['id'];
   $query=listar_U($conexion,$id);
   $datos= mysqli_fetch_assoc($query);
   $Nombreu=$datos ['Nombre'];
   $Apellido=$datos['Apellido'];
   $Correo_Electronico=$datos['Correo_Electronico'];
    ?>
    <form class="row g-3 needs-validation" action="compra2.php" method="POST" novalidate>
    <div class="container p-5">
        <p style="font-weight: bold; color: #fff; font-size: 22px; text-align: center; margin-top: 20px;">Sucursal</p>
        <center>
            <p style="color: #fff; font-size: 17px; margin-top: 6px; margin-bottom: 12px;">Seleccione la sucursal donde
                retirar su pedido</p>
        </center>
        <center><select name="sucursal" class="contenedor_datos">
                <?php 
           $sql="SELECT * FROM sucursal ";
            $query = mysqli_query($conexion, $sql);
            while ($row = mysqli_fetch_assoc($query)) {
            $id = $row ['ID_Sucursal'];
            $Nombre = $row ['Nombre_Sucursal'];	
            ?>

                <option id="<?php echo $Nombre; ?>" value="<?php echo $id; ?>">
                    <?php echo $Nombre; ?>
                </option>

                <?php
            }   
            ?>
            </select>
        </center>

    </div>



    
    <br>

    <hr style="width: 89%; max-width: 1300px; margin: auto; margin-top: 50px;">


    <div class="container p-5">
        <p style="font-weight: bold; color: #fff; font-size: 22px; text-align: center; margin-top: 30px;">Método de Pago</p>
        <center>
            <p style="color: #fff; font-size: 17px; margin-top: 6px; margin-bottom: 12px;">Por favor, transfiera el pago
                del pedido manualmente a los siguientes datos y calcule el precio a tasa BCV:</p>
        </center>
        <center>
            <p style="color: #fff; font-size: 17px; margin-top: 6px; margin-bottom: 12px;">Teléfono: 04121576434</p>
        </center>
        <center>
            <p style="color: #fff; font-size: 17px; margin-top: 6px; margin-bottom: 12px;">Cédula: 30107858</p>
        </center>
        <center>
            <p style="color: #fff; font-size: 17px; margin-top: 6px; margin-bottom: 12px;">Banco: Venezuela (0102)</p>
        </center>

        <br>
        <br>

        <center>
            <p style="color: #fff; font-size: 17px; margin-top: 6px; margin-bottom: 12px;">Adjunte la referencia de su
                pago abajo, para poder procesar su pedido.</p>
        </center>

        <center>
            <div class="col-md-6">
                <div class="label" style="font-size: 17px; margin-top: 13px; margin-bottom: 12px;">Referencia:</div>
                <input type="text" class="contenedor_datos" id="validationCustom03" name="Referencia"
                    required="obligatorio" value="" />
            </div>
        </center>
        <p class="Titulo_Categoria">Banco:</p>

    <select name="Banco">
        <?php 
             $sql="SELECT * FROM cuenta_bancaria ";
            $query = mysqli_query($conexion, $sql);
            while ($row = mysqli_fetch_assoc($query)) {
                        $id = $row ['ID_Cuenta_Bancaria'];
                        $Nombre = $row ['Nombre_CB'];	
        ?>

                <option id="<?php echo $Nombre; ?>" value="<?php echo $id; ?>">
                    <?php echo $Nombre; ?>
                </option>

                <?php
            }
        ?>
            </select> 

    </div>

    <hr style="width: 89%; max-width: 1300px; margin: auto; margin-top: 20px;">


    <div class="container p-5">

            <p style="font-weight: bold; color: #fff; font-size: 22px; text-align: center;">Datos del Usuario</p>

            <div class="cotenedor_input">

                <input type="hidden" name="dato" value="insertar">

                <div class="col-md-6">
                    <div class="label">Nombre:</div>
                    <input type="hidden" class="form-control" id="validationCustom01" name="nombre"
                        required="obligatorio" value="<?php echo $Nombreu; ?>" />
                    <div class="contenedor_datos">
                        <?php echo $Nombreu; ?>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="label">Apellido:</div>
                    <input type="hidden" class="form-control" id="validationCustom02" name="apellidos"
                        required="obligatorio" value="<?php echo $Apellido; ?>" />
                    <div class="contenedor_datos">
                        <?php echo $Apellido; ?>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="label">Correo:</div>
                    <input type="hidden" class="form-control" id="validationCustom03" name="Correo"
                        required="obligatorio" value="<?php echo $Correo_Electronico; ?>" />
                    <div class="contenedor_datos">
                        <?php echo $Correo_Electronico; ?>
                    </div>
                </div>

                <br>

                <div class="boton_reservar">
                    <button style="margin-top: 40px;" class="btn_2 btn-success" type="submit">Reservar</button>
                </div>


            </div>

        </form>
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
</body>

</html>