<?php 
session_start();
$Precio8=0;
include("database2.php");
$conexion=conexion();
if(isset($_SESSION["OfertaP"])){
    $Oferta_P=$_SESSION['OfertaP'];
    for($i=0;$i<=count($Oferta_P)-1;$i ++){
        if(isset($Oferta_P[$i])){
            if(($Oferta_P)[$i]!=NULL){
                $id2= $Oferta_P[$i]['ID'];
                $query8= listar_productos2($conexion,$id2);
                $row8= mysqli_fetch_assoc($query8);
                $Precio7=$row8['Precio'] * $Oferta_P[$i]['Cantidad_OP'];
                $Precio8= $Precio8+$Precio7;
                }
            }
        }
    }                           
    else{

    }
    $output['data'] ='
        <p class="text_precio">Precio Total&nbsp;=&nbsp;'.$Precio8.'$</p>
    ';
                            
echo json_encode($output, JSON_UNESCAPED_UNICODE);
?>