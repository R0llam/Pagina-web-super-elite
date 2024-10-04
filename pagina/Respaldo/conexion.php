<?php
  $conectar=@mysqli_connect('localhost','root','','bd');

  if(!$conectar){
      echo"No Se Pudo Conectar con el Servidor";
  }
  else{
      $base=@mysqli_select_db($conectar,'bd');
      if(!$base){
          echo "no se encontro la base de datos";
      }
  }

?>