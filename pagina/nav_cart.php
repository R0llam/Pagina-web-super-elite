<?php
session_start();
if(isset($_SESSION['carrito'])){
  $carrito_m=$_SESSION['carrito'];
}
if(isset($_SESSION['carrito'])){
  for($i=0;$i<=count($carrito_m)-1;$i ++){
      if(isset($carrito_m[$i])){
        if($carrito_m[$i]!=NULL){ 
          if(!isset($carrito_m['Cantidad'])){
            $carrito_m['Cantidad'] = '0';
          }
          else{
            $carrito_m['Cantidad'] = $carrito_m['Cantidad'];
          }
          $total_cantidad = $carrito_m['Cantidad'];
          $total_cantidad ++ ;
          if(!isset($totalcantidad)){
            $totalcantidad = '0';
          }
          else{
            $totalcantidad = $totalcantidad;
          }
          $totalcantidad += $total_cantidad;
        }
      }
    }
}
if(!isset($totalcantidad)){
  $totalcantidad = '0';
}
else{ 
  $totalcantidad = $totalcantidad;
}
$output['data'] = '<nav class="menu_item">
  <a class="menu_link" data-bs-toggle="modal" data-bs-target="#modal_cart" style="color: white; cursor:pointer;"><img class="svg_carrito" src="assets/carrito.svg" style="color: #ffffff;">&nbsp;'.$totalcantidad.'</a>
</nav>';
echo json_encode($output, JSON_UNESCAPED_UNICODE);
?>
