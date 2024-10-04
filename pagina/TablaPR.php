<?php


        $conn = mysqli_connect("localhost","root","","bd");

        if ($conn->connect_error) {
            echo 'Error de conexion ' . $conn->connect_error;
            exit;
        }

        // Columnas a mostrar en la tabla

        $columns = ['ID_P', 'NombreP', 'Cantidad_R', 'archivoBLOB'];

        // Nombre de la tabla

        $table = "productos";

        // Clave principal de la tabla

        $id = 'ID_P';

        // Campo a buscar

        $campo = isset($_POST['campo']) ? $conn->real_escape_string($_POST['campo']) : null;

        // Filtrado

        $where = "WHERE Cantidad_R != 0";

        if ($campo != null) {
            $where = "WHERE Cantidad_R != 0 and (";

            $cont = count($columns);
            for ($i = 0; $i < $cont; $i++) {
                $where .= $columns[$i] . " LIKE '%" . $campo . "%' OR ";
            }
            $where = substr_replace($where, "", -3);
            $where .= " )";
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
                $archivo= $row['archivoBLOB'];
                $idp=$row['ID_P'];
                $output['data'] .= '<td>' . $row['ID_P'] . '</td>';
                $output['data'] .= '<td>' . $row['NombreP'] . '</td>';
                $output['data'] .= '<td>' . $row['Cantidad_R'] . '</td>';
                $output['data'] .= "<td><img class='card-img' height='100' src='../Productos/$archivo' class='card-img'></img></td>";
                $output['data'] .= '</tr>';
            }
        } else {
            $output['data'] .= '<tr>';
            $output['data'] .= '<td colspan="7">Sin resultados</td>';
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
    ?>
