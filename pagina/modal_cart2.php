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
$output['data'] = '
    <div class="modal fade" id="modal_cart" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 style="color: #fff;">Mi Carrito</h5>
                </div>
                <div class="modal-body">
                    <div>
                        <div class="p-2">
';
	if(isset($_SESSION['carrito'])){
        $total=0;
        $total2=0;
            for($i=0;$i<=count($carrito_m)-1;$i ++){
                if(isset($carrito_m[$i])){
                    if($carrito_m[$i]!=NULL){
                        $output['data'] .= '
                        <div>
                            <div>
                                <h3 style="color: #fff;">
                                    '.$carrito_m[$i]['Nombre'].'
                                </h3>
                            </div>
                            <div style="color: #fff;">
                                <span>Cantidad:&nbsp;'. $carrito_m[$i]['Cantidad'].'</span>
                                <br>
                                <span>Precio en Dólares
                                    '.$carrito_m[$i]['Precio'] * $carrito_m[$i]['Cantidad'].' $</span>
                                <br>
                                <span>Precio en Bolívares
                                    '. $carrito_m[$i]['Precio_B'] * $carrito_m[$i]['Cantidad'].'
                                    Bs</span>
                            </div>
                        </div>
                        <br>
                        ';
                                            $total=$total + ($carrito_m[$i]['Precio'] * $carrito_m[$i]['Cantidad']);
                                            $total2=$total2 + ($carrito_m[$i]['Precio_B'] * $carrito_m[$i]['Cantidad']);
                                        }
                                    }
                                }
							}
                        $output['data'] .= '
                        <span style="text-align: left; color: #fff;">Total en Dólares</span>
                        <strong style="text-align: left; color: #fff;">
                        ';
    
							if(isset($_SESSION['carrito'])){
                                $total=0;
                                    for($i=0;$i<=count($carrito_m)-1;$i ++){
                                        if(isset($carrito_m[$i])){
                                            if($carrito_m[$i]!=NULL){ 
                                            $total=$total + ($carrito_m[$i]['Precio'] * $carrito_m[$i]['Cantidad']);
                                            }
                                        }
                                    }
                            }
                            if(!isset($total)){
                                $total = '0';
                            }
						$output['data'] .= $total.' $
                        </strong>
                        <span style="text-align: left; color: #fff;">Total en Bolívares</span>
                        <strong style="text-align: left; color: #fff;">
                        ';

							if(isset($_SESSION['carrito'])){
                                $total2=0;
                                    for($i=0;$i<=count($carrito_m)-1;$i ++){
                                        if(isset($carrito_m[$i])){
                                            if($carrito_m[$i]!=NULL){ 
                                            $total2=$total2 + ($carrito_m[$i]['Precio_B'] * $carrito_m[$i]['Cantidad']);
                                            }
                                        }
                                    }
                            }
                            if(!isset($total2)){
                                $total2 = '0';
                            }
						$output['data'] .=  $total2.' Bs
                        </strong>
                    </div>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <a type="button" class="btn btn-danger" href="vaciar_carrito.php">Vaciar Carrito</a>
                <a type="button" class="btn btn-primary" href="reserva.php">Continuar Pedido</a>
            </div>
        </div>
    </div>
</div>
';
echo json_encode($output, JSON_UNESCAPED_UNICODE);
?>