<?php 
   $id=$_GET['id'];
   include 'database2.php';
   $conexion=conexion();
   $query=eliminar_C($conexion,$id);
   if ($query) {
      header('location: Administracion_contactanos.php');
   }
   else{
      header('location: Administracion_contactanos.php');
   }
 ?>