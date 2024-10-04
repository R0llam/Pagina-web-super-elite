<?php 
   $id=$_GET['id'];
   include 'database2.php';
   $conexion=conexion();
   $query=eliminarSucursal($conexion,$id);
   if ($query) {
      header('location: Sucursal.php');
   }
   else{
      header('location: Sucursal.php');
   }
 ?>