<?php
    $fecha=date('Y-m-d');
    if ($fecha == '2000-1-1'){
    }
    else{
        $query=Borrar($conexion,$fecha);
        $query2=Borrar2($conexion,$fecha);
        if($query2 -> num_rows >0){
            while ($datos = mysqli_fetch_assoc($query2)) {
                $id=$datos['Referencia'];
                $referencia=$datos['Referencia'];
                $query3=eliminarR($conexion,$id);
                $query4=eliminarR2($conexion,$referencia);
                $query5=eliminarR3($conexion,$referencia);
            }
        }
    }
?>