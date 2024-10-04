<?php 
   $id=$_GET['id'];
   include 'database2.php';
   $conexion=conexion();
   $query=eliminarO($conexion,$id);
   if ($query) {
      header('location: Administracion_de_ofertas2.php');
   }
   else{
      header('location: Administracion_de_ofertas2.php');
   }
 ?>