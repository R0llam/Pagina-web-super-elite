<?php
   session_start();
   error_reporting(0);
   require 'database.php';
   include("database2.php");
   $conexion=conexion();
   
   if (isset($_SESSION['usuario_id'])) {
      $records = $conn->prepare('SELECT id, usuario, contrasena FROM users WHERE id = :id');
      $records->bindparam(':id', $_SESSION['usuario_id']);
      $records->execute();
      $resultados = $records->fetch(PDO::FETCH_ASSOC);

      $user = null;

      if(count($resultados) > 0 ){
         $user = $resultados;
      }
      else{
         header('location CerrarSesion.php');
      }
   }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de Carrusel</title>
    <link rel="shortcut icon" type="image/x-icon" href="Imagenes/Icono.png">
    <link rel="stylesheet" type="text/css" href="Estilos_Editar_Carrusel_2.css">
    <link rel="stylesheet" type="text/css" href="Estilos_Acceso_Denegado.css">
    <?php include("link_admin.php");?>
</head>

<body>

    <?php if (!empty($user) and $user['id'] == '1'): ?>

    <?php
    include("barra_de_navegacion_admin.php");
    ?>

    <div class="contenedor_volver">
        <div class="volver">
            <a href="Administrador.php">
                <img src="svg/arrow-left.svg" alt="">
            </a>
        </div>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>

    <h1>Editar Carrusel</h1>

    <br>

    <div class="table-responsive">
        <table class="table table-secondary table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Parte</th>
                    <th>Categoría</th>
                    <th>Imagen</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php 
            $idc=1;
            while ($idc <= 9) {
            ?>
                <tr>
                    <?php 
               $sql="SELECT * FROM carrusel Where ID_Carrusel=$idc";
               $query1 = mysqli_query($conexion, $sql);
               $row1= mysqli_fetch_assoc($query1);
               $Imagen1 = $row1['Imagen_Carrusel'];
               $Categoria = $row1['Categoria_P_ID'];
               ?>

                    <form name="Administracion_de_productos" action="Carrusel2.php?ID=<?php echo $idc;?>" method="post"
                        enctype="multipart/form-data">
                        <td><?php echo $idc;?></td>

                        <td class="lista">
                            <select name="Categoria_P">
                                <?php 
                            $sql2="SELECT * FROM categoria_p where Categoria_P_ID = $Categoria";
                            $query2 = mysqli_query($conexion, $sql2);
                            $row2 = mysqli_fetch_assoc($query2);
                            $id2 = $row2 ['Categoria_P_ID'];
                            $Nombre2 = $row2 ['Categoria'];
                            if($id2 == 0){
                            ?>
                                <option id="Ofertas" value="Ofertas.php">
                                    Oferta
                                </option>
                                <?php
                            $sql="SELECT * FROM categoria_p where Categoria_P_ID != $Categoria";
                            $query = mysqli_query($conexion, $sql);
                            while ($row = mysqli_fetch_assoc($query)) {
                                        $id = $row ['Categoria_P_ID'];
                                        $Nombre = $row ['Categoria'];
                            ?>
                                <option id="<?php echo $Nombre; ?>" value="<?php echo $id; ?>">
                                    <?php echo $Nombre; ?>
                                </option>

                                <?php
                                }
                             ?>

                                <?php

                            }else{
                            ?>
                                <option id="<?php echo $Nombre2; ?>" value="<?php echo $id2; ?>">
                                    <?php echo $Nombre2; ?>
                                </option>
                                <?php
                            $sql="SELECT * FROM categoria_p where Categoria_P_ID != $Categoria";
                            $query = mysqli_query($conexion, $sql);
                            while ($row = mysqli_fetch_assoc($query)) {
                                        $id = $row ['Categoria_P_ID'];
                                        $Nombre = $row ['Categoria'];
                            ?>
                                <option id="<?php echo $Nombre; ?>" value="<?php echo $id; ?>">
                                    <?php echo $Nombre; ?>
                                </option>

                                <?php
                                }
                             ?>
                                <option id="Ofertas" value="Ofertas.php">
                                    Oferta
                                </option>
                                <?php } ?>

                            </select>

                        </td>

                        <td><?php 
                  $valor="<img class='card-img' height='100' src='../Carrusel/$Imagen1' class='card-img'></img>";
                  echo $valor; ?></td>

                        <td>
                            <div class="btn btn-success" id="file">
                                <p id="texto">Seleccionar Imagen</p>
                                <input type="file" name="Imagen" id="imagen" required="obligatorio" />
                            </div>
                            <input class="btn btn-primary" type="submit" value="Actualizar" />
                        </td>
                    </form>
                </tr>
                <?php
            $idc=$idc+1;
            }
            ?>
            </tbody>
        </table>
    </div>

    <br>
    <br>
    <br>
    <br>

    <?php
	include("Footer.php");
	?>

    <?php elseif (!empty($user)): ?>
    <div class="modal">
        <div class="modal_container">
            <img src="svg\neutral_face.svg" class="modal_img">
            <h2 class="modal_title">Acceso Denegado</h2>
            <p class="modal_paragraph">Lo siento no tienes permitido el acceso.</p>
            <div class="container_btn">
                <a href="Index.php" class="btn-modal btn-secondary">Cerrar</a>
            </div>
            <?php else: ?>
            <img src="svg\neutral_face.svg" class="modal_img">
            <h2 class="modal_title">Acceso Denegado</h2>
            <p class="modal_paragraph">Lo siento no tienes permitido el acceso.</p>
            <div class="container_btn">
                <a href="Index.php" class="btn-modal btn-secondary">Cerrar</a>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <script src="js\app_admin.js"></script>
    <script src="js/modal_cerrar_sesion.js"></script>

</body>

</html>