<?php 
   $id=$_GET['id'];
   include 'database2.php';
   $conexion=conexion();
   $query=eliminarC($conexion,$id);
   $query2=eliminarC2($conexion,$id);
   if ($query) {
      header('location: Categorias.php');
   }
   else{
      header('location: Categorias.php');
   }
 ?>