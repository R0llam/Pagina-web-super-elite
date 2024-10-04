<?php 
   $id=$_GET['id'];
   include 'database2.php';
   $conexion=conexion();
   $query=eliminarM($conexion,$id);
   $query2=eliminarM2($conexion,$id);
   if ($query) {
      header('location: Marca.php');
   }
   else{
      header('location: Marca.php');
   }
 ?>