<?php
if(isset($_SESSION['OfertaP'])){
  $Ofetta_P=$_SESSION['OfertaP'];
}
if(isset($_SESSION['OfertaP'])){
  for($i=0;$i<=count($Oferta_P)-1;$i ++){
      if(isset($Oferta_P[$i])){
        if($Oferta_P[$i]!=NULL){ 
          if(!isset($carrito_m['Cantidad_OP'])){
            $Oferta_P['Cantidad_OP'] = '0';
          }
          else{
            $Oferta_P['Cantidad_OP'] = $Oferta_P['Cantidad_OP'];
          }
          $total_cantidad = $Oferta_P['Cantidad_OP'];
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
  $totalcantidad = '';
}
else{ 
  $totalcantidad = $totalcantidad;
}
?>

<div class="container_carrito">
  <nav class="nav_carrito">
    <a class="nav-link" data-bs-toggle="modal" data-bs-target="#modal_cart" style="color: white; cursor:pointer;"><img class="svg_carrito" src="assets/carrito.svg" style="color: #ffffff;">&nbsp;<?php echo $totalcantidad; ?></a>
  </nav>
</div>
