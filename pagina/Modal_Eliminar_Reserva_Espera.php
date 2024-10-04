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

<?php 
  $id=$_GET['id'];
  $referencia=$_GET ['referencia'];
  include 'database2.php';
  $conexion=conexion();
  $sql1="SELECT * FROM pedido_cp Where Referencia='$referencia'";
  $query1 = mysqli_query($conexion, $sql1);
  $dato= mysqli_fetch_assoc($query1);
  $id2=$dato["ID"];
  $sql="SELECT * FROM users Where ID='$id2'";
  $query2=mysqli_query($conexion,$sql);
  $row2= mysqli_fetch_assoc($query2);
  if ($query2 -> num_rows >0){
    $usuario= $row2['usuario'];
  }
  else{
    $usuario="Usuario eliminado";
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Reserva</title>
    <link rel="shortcut icon" type="image/x-icon" href="Imagenes/Icono.png">
    <link rel="stylesheet" type="text/css" href="Estilos_Eliminar.css">
    <link rel="stylesheet" type="text/css" href="Estilos_Acceso_Denegado.css">
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

    <div class="datos_reserva">
        <h2>¿Está seguro de eliminar el siguiente pedido?</h2>
        <p>Nombre de Usuario: <b><?php echo $usuario; ?></b></p>
        <p>Referencia: <b><?php echo $referencia; ?></b></p>
        <p>Estado: <b><?php echo $dato['estado']; ?></b></p>
        <p>Total $: <b><?php echo $dato['total'] ?></b></p>
        <p>Total Bs: <b><?php echo $dato['total2']; ?></b></p>
        <p>Fecha: <b><?php echo $dato['Fecha_R']; ?></b></p>
        <p>Fecha Límite: <b><?php echo $dato['Fecha_RL']; ?></b></p>
        <div class="contenedor_botones">
            <a class="btn_cancelar" href="<?php echo $_SERVER['HTTP_REFERER'];?>">Cancelar</a>
            <a class="btn_confirmar"
                href="Administracion_de_reservas_E.php?id=<?php echo $id; ?>&referencia=<?php echo $id;?>">Confirmar</a>
        </div>
    </div>

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