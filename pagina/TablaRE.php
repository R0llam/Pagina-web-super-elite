<?php


        $conn = mysqli_connect("localhost","root","","bd");

        if ($conn->connect_error) {
            echo 'Error de conexion ' . $conn->connect_error;
            exit;
        }

        // Columnas a mostrar en la tabla

        $columns = ['Referencia', 'estado', 'total', 'total2', 'Fecha_R', 'Fecha_RL', 'ID', 'Tipo_pedido_ID', 'Comprobante_cp'];

        // Nombre de la tabla

        $table = "pedido_cp";

        // Clave principal de la tabla

        $id = 'Referencia';

        // Campo a buscar

        $campo = isset($_POST['campo']) ? $conn->real_escape_string($_POST['campo']) : null;

        // Filtrado

        $where = "";

        if ($campo != null) {
			$sql7="SELECT * FROM users WHERE usuario LIKE '%".$campo."%' ";
			$query7=mysqli_query($conn,$sql7);
			if ($query7 -> num_rows >0){
                $row8= mysqli_fetch_assoc($query7);
				$usuario8=$row8['ID'];

                $where = "WHERE estado='En espera' AND ID='$usuario8'";

			}
            
			else{
				
                $where = "WHERE estado='En espera' AND (";

                $cont = count($columns);
                for ($i = 0; $i < $cont; $i++) {
                    $where .= $columns[$i] . " LIKE '%" . $campo . "%' OR ";
                }
                $where = substr_replace($where, "", -3);
                $where .= " )";
                
			}

        }
        else{
            $where = "WHERE estado='En espera'";
        }

        // Limites

        $limit = isset($_POST['registros']) ? $conn->real_escape_string($_POST['registros']) : 5;
        $pagina = isset($_POST['pagina']) ? $conn->real_escape_string($_POST['pagina']) : 0;

        if (!$pagina) {
            $inicio = 0;
            $pagina = 1;
        } else {
            $inicio = ($pagina - 1) * $limit;
        }

        $sLimit = "LIMIT $inicio , $limit";

        // Ordenamiento

        $sOrder = "";
        if (isset($_POST['orderCol'])) {
            $orderCol = $_POST['orderCol'];
            $oderType = isset($_POST['orderType']) ? $_POST['orderType'] : 'asc';

            $sOrder = "ORDER BY " . $columns[intval($orderCol)] . ' ' . $oderType;
        }

        // Consulta

        $sql = "SELECT SQL_CALC_FOUND_ROWS " . implode(", ", $columns) . "
        FROM $table
        $where
        $sOrder
        $sLimit";
        $resultado = $conn->query($sql);
        $num_rows = $resultado->num_rows;

        // Consulta para total de registro filtrados

        $sqlFiltro = "SELECT FOUND_ROWS()";
        $resFiltro = $conn->query($sqlFiltro);
        $row_filtro = $resFiltro->fetch_array();
        $totalFiltro = $row_filtro[0];

        // Consulta para total de registro

        $sqlTotal = "SELECT count($id) FROM $table ";
        $resTotal = $conn->query($sqlTotal);
        $row_total = $resTotal->fetch_array();
        $totalRegistros = $row_total[0];

        // Mostrado resultados

        $output = [];
        $output['totalRegistros'] = $totalRegistros;
        $output['totalFiltro'] = $totalFiltro;
        $output['data'] = '';
        $output['paginacion'] = '';

        if ($num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $ID2= $row ['ID'];
                $ID3= $row ['Tipo_pedido_ID'];
                $idr= $row['Referencia'];
		        $sql="SELECT * FROM users Where ID='$ID2'";
                $query2=mysqli_query($conn,$sql);
                $row2= mysqli_fetch_assoc($query2);
                if ($query2 -> num_rows >0){
                    $output['data'] .= '<td>' . $row2['usuario'] . '</td>';
                }
                else{
                    $output['data'] .= '<td>Usuario eliminado</td>';
                }
                $output['data'] .= '<td>' . $row['Referencia'] . '</td>';
                $output['data'] .= '<td>' . $row['estado'] . '</td>';
                $sql="SELECT * FROM tipo_pedido Where Tipo_pedido_ID='$ID3'";
                $query2=mysqli_query($conn,$sql);
                $row2= mysqli_fetch_assoc($query2);
                if ($query2 -> num_rows >0){
                    $output['data'] .= '<td>' . $row2['Tipo_pedido'] . '</td>';
                }
                else{
                    $output['data'] .= '<td>Usuario eliminado</td>';
                }
                $output['data'] .= '<td>' . $row['Comprobante_cp'] . '</td>';
                $output['data'] .= '<td>' . $row['total'] . '</td>';
                $output['data'] .= '<td>' . $row['total2'] . '</td>';
                $output['data'] .= '<td>' . $row['Fecha_R'] . '</td>';
                $output['data'] .= '<td>' . $row['Fecha_RL'] . '</td>';
                $output['data'] .= '<td>
                        <a class="btn btn-primary" href="Detalles_Reserva_Espera.php?id='.$idr.'">Detalles</a>
                        <a class="btn btn-danger" href="Administracion_de_reservas_E.php?id='.$idr.'&referencia='.$idr.'">Eliminar</a>
                        <a class="btn btn-success" href="Administracion_de_reservas_C.php?id='.$idr.'">Completar</a>
                    </td>';
                $output['data'] .= '</tr>';
                
            }
        } else {
            $output['data'] .= '<tr>';
            $output['data'] .= '<td colspan="10">Sin resultados</td>';
            $output['data'] .= '</tr>';
            
        }
        

        // Paginación

        if ($totalRegistros > 0) {
            $totalPaginas = ceil($totalFiltro / $limit);

            $output['paginacion'] .= '<nav>';
            $output['paginacion'] .= '<ul class="pagination">';

            $numeroInicio = max(1, $pagina - 4);
            $numeroFin = min($totalPaginas, $numeroInicio + 9);

            for ($i = $numeroInicio; $i <= $numeroFin; $i++) {
                $output['paginacion'] .= '<li class="page-item' . ($pagina == $i ? ' active' : '') . '">';
                $output['paginacion'] .= '<a class="page-link" href="#" onclick="nextPage(' . $i . ')">' . $i . '</a>';
                $output['paginacion'] .= '</li>';
            }

            $output['paginacion'] .= '</ul>';
            $output['paginacion'] .= '</nav>';
        }

        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        // $output['data'] .= '<td>' . $row['total'] . '/ '.$row['total2'].'</td>';
    ?>
   
