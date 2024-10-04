<?php 
   $id=$_GET['id'];
   $id2=$_GET['id2'];
   include 'database2.php';
   $conexion=conexion();
   if(isset($_GET['Cantidad'])){
      $cantidad=$_GET['Cantidad'];
      $sql="UPDATE oferta_producto SET Cantidad_PO='$cantidad' WHERE ID_PO='$id2'";
      $query = mysqli_query($conexion, $sql);
   }
   else{
      $sql="DELETE from oferta_producto WHERE ID_PO='$id2'";
      $query = mysqli_query($conexion, $sql);
   }
   if ($query) {
      header("location: EditarO.php?id=$id");
   }
   else{
      header("location: EditarO.php?id=$id");
   }
 ?>