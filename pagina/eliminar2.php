<?php 
   $id=$_GET['id'];
   include 'database2.php';
   $conexion=conexion();
   $query=eliminar2($conexion,$id);
   if ($query) {
      header('location: Administracion_de_productos2.php');
   }
   else{
      header('location: Administracion_de_productos2.php');
   }
 ?>