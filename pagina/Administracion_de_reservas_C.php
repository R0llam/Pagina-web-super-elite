<?php 
  $id=$_GET['id'];
  include 'database2.php';
  $conexion=conexion();
  $sql1="SELECT * FROM pedido_cp Where Referencia='$id'";
	$query1 = mysqli_query($conexion, $sql1);
  $dato= mysqli_fetch_assoc($query1);
  $id2 = $dato['ID'];
  $query=listar_U($conexion,$id2);
  $datos= mysqli_fetch_assoc($query);
  $r=$datos ['Reservas_Actuales'];
  $r2=$r - 1;
  $sql4="UPDATE users SET Reservas_Actuales='$r2' Where ID='$id2'";
  $query4 = mysqli_query($conexion, $sql4);
  $query=EditarR($conexion,$id);

  if ($query) {
    header('location: Administracion_de_reservas.php');
  }
  else{
    header('location: Administracion_de_reservas.php');
  }
 ?>