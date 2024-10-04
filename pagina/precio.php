<?php
        $conn = mysqli_connect("localhost","root","","bd");

        if ($conn->connect_error) {
            echo 'Error de conexion ' . $conn->connect_error;
            exit;
        }

        $campo = isset($_POST['precio']) ? $conn->real_escape_string($_POST['precio']) : null;

        // Filtrado

        $where = "WHERE ID_PB= ']' ";

        if ($campo != null) {
            $where = "";
        }


        // Consulta

        $sql="SELECT * FROM precio_b ORDER BY ID_PB DESC LIMIT 1";
        $query = mysqli_query($conn, $sql);
        $resultados = mysqli_fetch_assoc($query);
        $numero_resultados=$query->num_rows;

        if ($numero_resultados > 0) {
                $Precio=$resultados['Precio_B'] * $campo;
                $output['data'] = "<label for='Precio_B'>Precio en Bolívares: <input class='controles' type='text' disabled placeholder='Escribe el Precio' value='$Precio'/></label>";
        }
        else {
            $output['data'] = "<label for='Precio_B'>Precio en Bolívares: <input class='controles' type='text' disabled placeholder='Escribe el Precio' value='0'/></label>";
        }
        

        echo json_encode($output, JSON_UNESCAPED_UNICODE);

    ?>