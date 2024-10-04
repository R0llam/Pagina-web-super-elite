<?php
session_start();
$Precio8=0;
include("database2.php");
$conexion=conexion();
$output['data'] = '';
if(isset($_SESSION["OfertaP"])){
    $Oferta_P=$_SESSION['OfertaP'];
    for($i=0;$i<=count($Oferta_P)-1;$i ++){
        if(isset($Oferta_P[$i])){
            if(($Oferta_P)[$i]!=NULL){
                $output['data'] .= '
                        <tr>
                            <th scope="row">'.$i.'</th>
                            <td>
                                <div>
                ';
                $id2= $Oferta_P[$i]['ID'];
                $query8= listar_productos2($conexion,$id2);
                $row8= mysqli_fetch_assoc($query8);
                $Nombre2 = $row8 ['NombreP'];
                $archivo2=$row8['archivoBLOB'];
                $Precio7=$row8['Precio'] * $Oferta_P[$i]['Cantidad_OP'];
                $Precio8= $Precio8+$Precio7;
                $valor="<img class='w-50' height='130' src='../Productos/$archivo2' class='card-img'></img>";
                $output['data'] .= $valor.'
                                </div>
                            </td>
                            <td>'.$Nombre2.'</td>
                            <td>
                                '.$Oferta_P[$i]['Cantidad_OP'].'
                                <form id="form2" name="form2" method="get" action="Productos-Ofertas.php"></form>
                            </td>
                            <td>
                                    <input name="id3" type="hidden" id="id3'.$i.'" value="'.$i.'" />
                                    <button class="btn btn-danger" 
                                    onclick="
                                        borrar_carrito(
                                            $(`#id3'.$i.'`).val(),
                                        );
                                    ">Borrar</button>
                                </form>
                            </td>
                        </tr>

                ';
                }
            }
        }
    }                           
    else{
        $output['data'] .='
            <tr class="text-center">
                <td colspan="16">No se han Añadido Productos</td>
            </tr>
        ';
    }
                            
echo json_encode($output, JSON_UNESCAPED_UNICODE);
?>