<?php 
   $id=$_GET['id'];
   include 'database2.php';
   $conexion=conexion();
   $query=eliminarU($conexion,$id);
   if ($query) {
      header('location: Usuarios.php');
   }
   else{
      header('location: Usuarios.php');
   }
 ?>