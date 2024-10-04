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
include("database2.php");
$id = $user['id'];
$conexion= conexion();
$mensaje= 1;
$query=listar_U($conexion,$id);
$datos= mysqli_fetch_assoc($query);
$r=$datos ['Reservas_Actuales'];
if($r <= 3){
    $str = "1234567890";
    $password = "";
    for($i=0;$i<7;$i++) {
        $password .= substr($str,rand(0,10),1);
    }
    $ref = $password;
    if(isset($_SESSION['carrito'])){
        $carrito_m=$_SESSION['carrito'];
        
    if(isset($_SESSION['carrito'])){
        $total1=0;
        $total2=0;
        for($i=0;$i<=count($carrito_m)-1;$i ++){
            if(isset($carrito_m[$i])){
                if($carrito_m[$i]!=NULL){
                    $id= $carrito_m[$i]['ID'];
                    $Cantidad = $carrito_m[$i]['Cantidad'];
                    $Nombre = $carrito_m[$i]['Nombre'];
                    $Precio = $carrito_m[$i]['Precio'];
                    $Precio_B = $carrito_m[$i]['Precio_B'];
                    $total_precio = $Precio * $Cantidad;
                    $total_precio_BS= $Precio_B * $Cantidad;
                    $tipo=$carrito_m[$i]['Tipo'];
                    if($tipo == 1){
                        $query = "INSERT INTO producto_cp (Referencia,ID_P,Cantidad_Pedido,Precio_P,Precio_B,total_precio,total_precio_BS) VALUES ('$ref', '$id', '$Cantidad', '$Precio','$Precio_B', '$total_precio', '$total_precio_BS')";
                        $result = mysqli_query($conexion,$query);
                        $sql="SELECT * FROM productos Where ID_P='$id'";
                        $query1= mysqli_query($conexion,$sql);
                        $row= mysqli_fetch_assoc($query1);
                        $Cantidad_R=$row['Cantidad_R'] + 1;
                        $Cantidad_R2=$row['Cantidad'] - $Cantidad;
                        $sql2="UPDATE productos SET Cantidad_R='$Cantidad_R', Cantidad='$Cantidad_R2' WHERE ID_P='$id'";
                        $query2= mysqli_query($conexion, $sql2);
                    }
                    else{
                        $query = "INSERT INTO oferta_cp (Referencia,ID_Oferta,Cantidad_Pedido_O,Precio_O,Precio_O_B,Total_precio_o,Total_precio_bs_o) VALUES ('$ref','$id', '$Cantidad', '$Precio','$Precio_B', '$total_precio', '$total_precio_BS')";
                        $result = mysqli_query($conexion,$query);
                        $sql="SELECT * FROM oferta Where ID_Oferta='$id'";
                        $query1= mysqli_query($conexion, $sql);
                        $row= mysqli_fetch_assoc($query1);
                        $Cantidad_R= $row ['CantidadO_R'] + 1;
                        $Cantidad_R2= $row ['Cantidad_O'] - $Cantidad;
                        $sql2="UPDATE oferta SET CantidadO_R='$Cantidad_R',Cantidad_O='$Cantidad_R2' WHERE ID_Oferta='$id'";
                        $query2= mysqli_query($conexion, $sql2);
                        $sql3="SELECT * FROM oferta_producto Where ID_Oferta='$id'";
                        $query3= mysqli_query($conexion, $sql3);
                        while ($row3= mysqli_fetch_assoc($query3)) {
                            $id3=$row3['ID_P'];
                            $Cantidad3=$row3['Cantidad_PO'];
                            $sql4="SELECT * FROM productos Where ID_P='$id3'";
                            $query4= mysqli_query($conexion,$sql4);
                            $row4= mysqli_fetch_assoc($query4);
                            if($Cantidad3>= 1){
                            $Cantidad_R3=$row4['Cantidad_R'] + $Cantidad3 * $Cantidad;
                            $Cantidad_R4=$row4['Cantidad'] - $Cantidad3 * $Cantidad;
                            }
                            else{
                                $Cantidad3=1;
                                $Cantidad_R3=$row4['Cantidad_R'] + $Cantidad3 * $Cantidad;
                                $Cantidad_R4=$row4['Cantidad'] - $Cantidad3 * $Cantidad;
                            }
                            $sql5="UPDATE productos SET Cantidad_R='$Cantidad_R3', Cantidad='$Cantidad_R4' WHERE ID_P='$id3'";
                            $query5= mysqli_query($conexion, $sql5);
                        }
                    }          
                }
            }
        }
    }
    if(isset($_SESSION['carrito'])){
        $total=0;
        $total2=0;
        for($i=0;$i<=count($carrito_m)-1;$i ++){
            if(isset($carrito_m[$i])){
                if($carrito_m[$i]!=NULL){ 
                $total=$total + ($carrito_m[$i]['Precio'] * $carrito_m[$i]['Cantidad']);
                $total2=$total2 + ($carrito_m[$i]['Precio_B'] * $carrito_m[$i]['Cantidad']);
                }
            }
        }
    }
    if(!isset($total)){
        $total= '0';
        $total2= '0';
    }
    else{
        $total= $total;
        $total2= $total2;
    }
 
    $ref_user = $user['id'];
    $estado = 'En espera';
    $total_pedido = $total;
    $total_pedido2 = $total2;
    $duracion= 2;
    $fecha=date('Y-m-d');
    $fecha2=date('Y-m-d', strtotime($fecha.'+' .$duracion.'days'));
    $tipo=1;
    $sucursal= $_POST['sucursal'];
    $query = "INSERT INTO pedido_cp (Referencia,ID,estado,total,total2,Fecha_R,Fecha_RL,Tipo_pedido_ID,ID_Sucursal) VALUES ('$ref', '$ref_user', '$estado', '$total_pedido', '$total_pedido2', '$fecha','$fecha2','$tipo','$sucursal')";
    $result = mysqli_query($conexion,$query);
    unset( $_SESSION["carrito"] );
    $sql2= "SELECT * FROM notificaciones Where ID_No=2";
    $query2 = mysqli_query($conexion, $sql2);
    $datos= mysqli_fetch_assoc($query2);
    $Cantidad1= $datos['Cantidad_No'];
    $suma= $Cantidad1 + 1;
    $sql3="UPDATE notificaciones SET Cantidad_No='$suma' Where ID_No=2";
    $query3 = mysqli_query($conexion, $sql3);
    $r2=$r + 1;
    $sql4="UPDATE users SET Reservas_Actuales='$r2' Where ID='$ref_user'";
    $query4 = mysqli_query($conexion, $sql4);
}
else{
    $mensaje=3;
}
}
else{
    $mensaje=2;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilos_modal_reserva_pedidos.css">
    <link rel="shortcut icon" type="image/x-icon" href="Imagenes/Icono.png">
    <title>Reserva</title>
</head>

<body>

    <div class="modal">
        <div class="modal_container">
            <?php if ($mensaje == 1){ ?>
            <img src="svg\order_confirmed_isometric.svg" class="modal_img">
            <h2 class="modal_title_1">Reserva Exitosa</h2>
            <h2 class="modal_title_2">Referencia:&nbsp;<b>(<?= $ref ?>)</b></h2>
            <p class="modal_paragraph">Su reserva se ha realizado de manera exitosa, por favor guarda la referencia y
                pasa por nuestro local para retirar tus productos, recuerda que solo cuentas con 2 días para retirar tu
                reserva.</p>
            <div class="container_btn">
                <a href="Index.php" class="btn-modal btn-secondary">Cerrar</a>
            </div>
            <?php } elseif ($mensaje == 3){ ?>
            <img src="svg\neutral_face.svg" class="modal_img">
            <h2 class="modal_title_1">Error al Reservar</h2>
            <p class="modal_paragraph">No has reservado ningún producto.</p>
            <div class="container_btn">
                <a href="Index.php" class="btn-modal btn-secondary">Cerrar</a>
            </div>
            <?php }else{; ?>
            <img src="svg\neutral_face.svg" class="modal_img">
            <h2 class="modal_title_1">Error al Reservar</h2>
            <p class="modal_paragraph">Usted ha excedido el número de reservas permitidas, por favor espere a que sus
                reservas sean completadas para poder volver a reservar.</p>
            <div class="container_btn">
                <a href="Index.php" class="btn-modal btn-secondary">Cerrar</a>
            </div>
            <?php }?>
        </div>
    </div>

</body>

</html>