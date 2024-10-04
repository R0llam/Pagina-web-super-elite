<?php 
   $id=$_GET['id'];
   include 'database2.php';
   $conexion=conexion();
   $query=eliminarCuentaB($conexion,$id);
   if ($query) {
      header('location: Bancos.php');
   }
   else{
      header('location: Bancos.php');
   }
 ?>