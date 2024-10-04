<?php 
   $id=$_GET['id'];
   include 'database2.php';
   $conexion=conexion();
   $datos=datos($conexion,$id);
   $nombre=$datos['nombre'];
   $titulo=$nombre.'.pdf';
   $tipo="application/pdf";
   $archivo=$datos['archivo'];


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de Currículos</title>
    <link rel="shortcut icon" type="image/x-icon" href="Imagenes/Icono.png">
    <link rel="stylesheet" type="text/css" href="Estilos/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="Estilos_Editar_Curriculos_10.css">
</head>

<body>

    <div class="container">

        <h1><?php echo $titulo; ?></h1>

        <div class="Regresar">
            <a href="Curriculum2.php">Regresar a la Página Anterior.</a>
        </div>

        <?php 
            $valor="<iframe class='w-100' height='700' src='../Empleo/$archivo' frameborder='0'></iframe>";
         echo $valor;
       ?>
    </div>

    <br>
    <br>

    </div>

    <script src="Estilos/bootstrap.bundle.min.js"></script>
</body>

</html>