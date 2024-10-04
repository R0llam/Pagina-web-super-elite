<?php 
   $id=$_GET['id'];
   include 'database2.php';
   $conexion=conexion();
   $query=eliminar($conexion,$id);
   if ($query) {
      header('location: Curriculum2.php');
   }
   else{
      header('location: Curriculum2.php');
   }
 ?>