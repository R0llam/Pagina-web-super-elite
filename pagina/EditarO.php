 <?php
   $id=$_GET['id'];
   include 'database2.php';
   $conexion=conexion();
   $query=listar_Ofertas2($conexion,$id);
   $datos= mysqli_fetch_assoc($query);
   $Nombre=$datos ['Nombre_Oferta'];
   $Precio=$datos['Precio_Oferta'];
   $archivo=$datos['Imagen_de_Oferta'];
   $descripcion=$datos['Descripcion_O'];
   $Cantidad=$datos['Cantidad_O'];

  ?>
 <?php
   session_start();
   
   require 'database.php';
   
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
     <title>Editar</title>
     <link rel="shortcut icon" type="image/x-icon" href="Imagenes/Icono.png">
     <link rel="stylesheet" type="text/css" href="Estilos_Acceso_Denegado.css">
     <link rel="stylesheet" href="Estilos_Registro_Ofertas_2.css">
     <?php include("link_admin.php");?>
 </head>

 <body>

     <?php if (!empty($user) and $user['id'] == '1'): ?>

     <?php
	include("barra_de_navegacion_admin.php");
	?>

     <div class="contenedor_volver">
         <div class="volver">
             <a href="Administracion_de_ofertas2.php">
                 <img src="svg/arrow-left.svg" alt="">
             </a>
         </div>
     </div>

     <br>
     <br>
     <br>
     <br>
     <br>

     <section class="Registro">

         <h1 align="center">Edición de Oferta</h1>

         <form name="Administracion_de_productos" action="EditarO2.php" method="post" enctype="multipart/form-data">

             <label for="ID">Código<input class="controles" type="text" name="ID" id="ID" required="obligatorio"
                     required onkeypress="return Enter(this, event, 'NO', 'LET-NUM')" maxlength="50"
                     placeholder="Escribe un ID para la oferta" value="<?php echo $id; ?>" /></label>

             <label for="NombreP">Nombre<input class="controles" type="text" name="NombreP" id="NombreP" required
                     onkeypress="return Enter(this, event, 'NO', 'LET-NUM')" required="obligatorio" maxlength="50"
                     placeholder="Escribe el nombre de la oferta" value="<?php echo $Nombre; ?>" /></label>

             <label for="Precio">Precio<input class="controles" type="text" name="Precio" id="Precio"
                     required="obligatorio" maxlength="50" required onkeypress="return Enter(this, event, 'SI', 'NUM2')"
                     placeholder="Escribe el precio de la oferta" value="<?php echo $Precio; ?>" /></label>

             <label for="Cantidad">Cantidad<input class="controles" type="text" name="Cantidad" id="Cantidad"
                     required="obligatorio" maxlength="50" required onkeypress="return Enter(this, event, 'SI', 'NUM')"
                     placeholder="Escribe la Cantidad de ofertas" value="<?php echo $Cantidad; ?>" /></label>

             <label for="descripcion">Descripción<input class="controles" type="text" name="descripcion"
                     id="descripcion" required="obligatorio" maxlength="50"
                     placeholder="Escribe la descripcion de ofertas" value="<?php echo $descripcion; ?>" /></label>

             <label for="Duracion">Duración Extra<input class="controles" type="text" name="Duracion" id="Duracion"
                     required="obligatorio" maxlength="50" required onkeypress="return Enter(this, event, 'SI', 'NUM3')"
                     placeholder="Escribe la duracion extra" value="0" /></label>

             <h2>Imagen</h2>

             <p class="texto_imagen">La imagen Seleccionada tiene que ser de tipo JPG.</p>

             <div id="file">
                 <p id="texto">Seleccionar Imagen</p>
                 <input type="file" name="Imagen" id="imagen" />
             </div>

             <div class="contenedor">
                 <input class="Boton1" type="submit" value="Actualizar" />
             </div>

         </form>

     </section>
     <h1>Productos Añadidos anteriormente</h1>
     <br>
     <div class="container_table_2">
         <table class="table table-secondary table-bordered table_id" id="tblDatos_2">
             <thead class="table-dark">
                 <tr>
                     <th>#</th>
                     <th>Imagen</th>
                     <th>Nombre</th>
                     <th>Cantidad</th>
                     <th>Borrar</th>
                 </tr>
             </thead>
             <tbody>
                 <?php 
                        $sql3="SELECT * FROM oferta_producto Where ID_Oferta='$id'";
                        $query3=mysqli_query($conexion,$sql3);
                        if(isset($query3)){
                            $numero=1;
                            while($row3 = mysqli_fetch_assoc($query3)){
                                $id3= $row3 ["ID_P"];
                                $id4= $row3 ["ID_PO"];
                                $cantidad3= $row3 ["Cantidad_PO"];
                                $sql4="SELECT * FROM productos Where ID_P='$id3'";
                                $query4=mysqli_query($conexion,$sql4);
                                $row4 = mysqli_fetch_assoc($query4);
                                if($query4 -> num_rows >0){
                                    $Producto= $row4["NombreP"];
                                    $archivo= $row4['archivoBLOB'];
                                }
                                else{
                                    $Producto="Producto eliminado";
                                    $archivo= "Producto eliminado";
                                }
                        ?>
                 <tr>
                     <td><?php echo $numero ?></td>
                     <td><img class="card-img" height="100" src="../Productos/<?php echo $archivo ?>"
                             class="card-img"></img></td>
                     <td><?php echo $Producto ?></td>
                     <td>
                         <form id="form1" name="form1" method="get" action="EditarO3.php">

                             <input name="Cantidad" type="number" id="Cantidad" style="width:90px; height: 33px;"
                                 class="align-middle text-center" value="<?php print $cantidad3;   ?>"
                                 required="obligatorio" required onkeypress="return Enter(this, event, 'SI', 'NUM')"
                                 size="1" maxlength="4" min="1" />

                             <input name="id2" type="hidden" id="id2" value="<?php print $id4; ?>" />

                             <input name="id" type="hidden" id="id" value="<?php print $id; ?>" />

                             <input style="height:30px; width:45px;" type="image" name="imageField3"
                                 src="assets/repeat.svg" value="" class="btn btn-sm btn-primary btn-rounded" />
                         </form>
                     </td>
                     <td>
                         <form id="form3" name="form3" method="get" action="EditarO3.php">

                             <input name="id2" type="hidden" id="id2" value="<?php print $id4; ?>" />

                             <input name="id" type="hidden" id="id" value="<?php print $id; ?>" />

                             <input class="Boton1" type="submit" value="Borrar" />

                         </form>
                     </td>
                 </tr>

                 <?php 
                                $numero= $numero + 1;
                            }
                        }
                        else{
                        ?>
                 <tr class="text-center">
                     <td colspan="16">No se han Añadido Productos</td>
                 </tr>
                 <?php } ?>
             </tbody>
         </table>
         <div class="contenedor_tabla_PR">
             <h1> Añadir Productos</h1>
             <div class="container-fluid">
                 <form action="" method="POST" class="d-flex">
                     <input class="form-control me-2" type="search" placeholder="Buscar Producto" name="busqueda"
                         required onkeypress="return Enter(this, event, 'NO', 'LET-NUM')" />
                     <button class="btn1 btn-warning" type="submit" name="enviar"><b>Buscar</b></button>
                 </form>
             </div>
             <?php
            $where="";
            if(isset($_GET['enviar'])){
                $busqueda = $_GET['busqueda'];
                if (isset($_GET['busqueda'])){
                    $where="WHERE ID_P LIKE'%".$busqueda."%' OR NombreP  LIKE'%".$busqueda."%'";
                }
            }
            ?>
             <br>
             <div class="container_table_1">
                 <table class="table table-secondary table-bordered table_id" id="tblDatos_1">
                     <thead class="table-dark">
                         <tr>
                             <th>Código</th>
                             <th>Nombre</th>
                             <th>Cantidad a añadir</th>
                             <th>Imagen</th>
                             <th>Acciones</th>
                         </tr>
                     </thead>
                     <tbody>
                         <tr>
                             <?php 
                            $sql1=$SQL="SELECT * FROM productos $where";
                            $query=mysqli_query($conexion,$sql1);
                            if($query -> num_rows >0){
                                while ($row = mysqli_fetch_assoc($query)) {
                                    $id = $row ['ID_P'];
                                    $Nombre = $row ['NombreP'];
                                    $archivo=$row['archivoBLOB'];
                                    ?>
                             <form id="5" name="5" action="Productos-Ofertas.php" method="post"
                                 enctype="multipart/form-data">
                                 <td><?php echo $id; ?></td>
                                 <td><?php echo $Nombre; ?></td>
                                 <td>
                                    <input class="Controles_P" name="id" type="hidden" value="<?php echo $id; ?>" />

                                     <input class="Controles_P" name="Cantidad_OP" type="number" required
                                         onkeypress="return Enter(this, event, 'SI', 'NUM')" id="Cantidad_OP" min="1"
                                         required="obligatorio" value="1" />
                                 </td>
                                 <td>
                                     <?php 
                                        $valor="<img class='card-img' height='100' src='../Productos/$archivo' class='card-img'></img>";
                                        echo $valor; ?>
                                 </td>
                                 <td>
                                     <input class="btn btn-primary" type="submit" value="Anadir" />
                                 </td>
                             </form>
                         </tr>
                         <?php
                                }
                            }
                            else{
                                ?>
                         <tr class="text-center">
                             <td colspan="16">No Existen Registros</td>
                         </tr>
                         <?php } ?>
                     </tbody>
                 </table>
                 <div class="contenedor_paginador">
                     <div id="paginador_1" class=""></div>
                 </div>
             </div>
             <h1>Productos Añadidos</h1>
             <br>
             <div class="container_table_2">
                 <table class="table table-secondary table-bordered table_id" id="tblDatos_2">
                     <thead class="table-dark">
                         <tr>
                             <th>#</th>
                             <th>Imagen</th>
                             <th>Nombre</th>
                             <th>Cantidad</th>
                             <th>Borrar</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php 
                        $Precio8=0;
                        if(isset($_SESSION["OfertaP"])){
                            $Oferta_P=$_SESSION['OfertaP'];
                            for($i=0;$i<=count($Oferta_P)-1;$i ++){
                                if(isset($Oferta_P[$i])){
                                    if(($Oferta_P)[$i]!=NULL){
                                        ?>
                         <tr>
                             <th scope="row"><?php echo $i; ?></th>
                             <td>
                                 <div>
                                     <?php
                                                    $id2= $Oferta_P[$i]['ID'];
                                                    $query8= listar_productos2($conexion,$id2);
                                                    $row8= mysqli_fetch_assoc($query8);
                                                    $Nombre2 = $row8 ['NombreP'];
                                                    $archivo2=$row8['archivoBLOB'];
                                                    $Precio7=$row8['Precio'] * $Oferta_P[$i]['Cantidad_OP'];
                                                    $Precio8= $Precio8+$Precio7;
                                                    $valor="<img class='w-50' height='130' src='../Productos/$archivo2' class='card-img'></img>";
                                                    echo $valor;
                                                    ?>
                                 </div>
                             </td>
                             <td><?php echo $Nombre2 ?></td>
                             <td>
                                 <?php print $Oferta_P[$i]['Cantidad_OP'];?>
                                 <form id="form2" name="form2" method="get" action="Productos-Ofertas.php"></form>
                             </td>
                             <td>
                                 <form id="form3" name="form3" method="POST" action="Productos-Ofertas.php">
                                     <input name="id3" type="hidden" id="id3" value="<?php print $i;?>" />
                                     <button class="btn btn-danger">Borrar</button>
                                 </form>
                             </td>
                         </tr>

                         <?php 
                                        }
                                    }
                                }
                            }
                            
                            else{
                                ?>
                         <tr class="text-center">
                             <td colspan="16">No se han Añadido Productos</td>
                         </tr>
                         <?php } ?>
                     </tbody>
                 </table>
                 <div class="contenedor_datos_tabla_final">
                     <div class="contenedor_paginador">
                         <div id="paginador_2" class=""></div>
                     </div>
                     <div class="Precio_total">
                         <p class="text_precio">Precio Total&nbsp;=&nbsp;<?php echo $Precio8 ?>$</p>
                     </div>
                 </div>
             </div>
         </div>

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
         <script src="js\validacion_num_let.js" type="text/javascript"></script>
         <script src="js/modal_cerrar_sesion.js"></script>
 </body>

 </html>