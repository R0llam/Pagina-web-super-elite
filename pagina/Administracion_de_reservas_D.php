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
    <title>Detalles</title>
    <link rel="shortcut icon" type="image/x-icon" href="Imagenes/Icono.png">
    <link rel="stylesheet" type="text/css" href="Estilos_Detalles_Reservas.css">
    <link rel="stylesheet" type="text/css" href="Estilos_Acceso_Denegado.css">
    <?php include("link.php");?>
</head>

<body>

    <?php if (!empty($user) and $user['id'] == '1'): ?>

    <?php
		include("barra_de_navegacion1.php");
		?>

    <br>
    <br>
    <br>
    <br>
    <br>

    <h1>Detalles</h1>

    <div class="Regresar">
        <a href="Index.php">Regresar a la Página Principal.</a>
    </div>

    <?php 				
		include("database2.php");
		$conexion=conexion();
		$id=$_GET['id'];
		$query=listar_reservas2($conexion,$id);
		$row = mysqli_fetch_assoc($query);
		$referencia=$row ['Referencia'];
		$referencia_C=$row['ID'];
		$total=$row['total'];
		$total2=$row['total2'];
		$query3=listar_pedido($conexion,$referencia);
		$query4=listar_pedido2($conexion,$referencia);
		$query2=listar_U($conexion,$referencia_C);
		?>

    <br>

    <div class="container">

        <div class="boton_reporte">
            <a class='btn_report btn-danger' href="Reporte_detalles_de_reserva.php?id=<?php echo $referencia?>"
                target="Reporte_detalles_de_reserva.php?id=<?php echo $referencia?>">
                <p class="title_reporte">Reporte</p><img src="assets\filetype-pdf.svg" alt="" class="icon_1">
            </a>
        </div>

        <br>
        <div class="table-responsive">
            <table class="table table-secondary table-bordered">
                <thead class="table-dark">

                    <tr>
                        <th colspan="3" style="font-size: 20px;">Datos del Usuario</th>
                    </tr>

                </thead>

                <thead class="table-primary">

                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                    </tr>

                </thead>
                <tbody>
                    <?php 
						while ($row2 = mysqli_fetch_assoc($query2)) {
							$Nombre = $row2 ['Nombre'];
							$Apellido=$row2['Apellido'];
							$Correo=$row2['Correo_Electronico'];
							?>
                    <tr>
                        <td><?php echo $Nombre; ?></td>
                        <td><?php echo $Apellido; ?></td>
                        <td><?php echo $Correo; ?></td>
                    </tr>
                    <?php
						}
						?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="container_all_table">

        <div class="container_table_productos">

            <div class="table-responsive">
                <table class="table table-secondary table-bordered" id="tblDatos_1">
                    <thead class="table-dark">

                        <tr>
                            <th colspan="7" style="font-size: 20px;">Productos Reservados</th>
                        </tr>

                    </thead>

                    <thead class="table-primary">

                        <tr>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Precio $</th>
                            <th>Precio Bs</th>
                            <th>Precio Total $</th>
                            <th>Precio Total Bs</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php 
				if($query3 -> num_rows >0){
				while ($row3 = mysqli_fetch_assoc($query3)) {
					$id=$row3['ID_P'];
					$query8= listar_productos2($conexion,$id);
					$row8= mysqli_fetch_assoc($query8);
					if(!empty($row8['NombreP'])){
						$Nombre2 = $row8 ['NombreP'];					}
					else{
						$Nombre2= 'Producto elimidado';
						$archivo2= 'Producto eliminado';
					}
					$Cantidad=$row3['Cantidad_Pedido'];
					$Precio=$row3['Precio_P'];
					$Precio_B=$row3['Precio_B'];
					$total_precio=$row3['total_precio'];
					$total_precio_BS=$row3['total_precio_BS'];
					?>

                        <tr>
                            <td><?php echo $Nombre2; ?></td>
                            <td><?php echo $Cantidad; ?></td>
                            <td><?php echo $Precio; ?>$</td>
                            <td><?php echo $Precio_B; ?>Bs</td>
                            <td><?php echo $total_precio; ?>$</td>
                            <td><?php echo $total_precio_BS; ?>Bs</td>
                        </tr>
                        <?php
				}
			}
			else{
				?>
                        <tr class="text-center">
                            <td colspan="16">No se Reservaron Productos</td>
                        </tr>
                        <?php
			}
			?>
                    </tbody>
                </table>
                <div class="contenedor_paginador">
                    <div id="paginador_1" class=""></div>
                </div>
            </div>
        </div>

        <div class="container_table_ofertas">

            <div class="table-responsive">
                <table class="table table-secondary table-bordered" id="tblDatos_2">
                    <thead class="table-dark">

                        <tr>
                            <th colspan="7" style="font-size: 20px;">Ofertas Reservadas</th>
                        </tr>

                    </thead>

                    <thead class="table-primary">

                        <tr>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Precio $</th>
                            <th>Precio Bs</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php 
						if($query4 -> num_rows >0){
						while ($row4 = mysqli_fetch_assoc($query4)) {
							$id=$row4 ['ID_Oferta'];
							$query7=listar_Ofertas2($conexion,$id);
							$row7= mysqli_fetch_assoc($query7);
							if(!empty($row7['Nombre_Oferta'])){
								$Nombre = $row7 ['Nombre_Oferta'];
							}
							else{
								$Nombre= 'Oferta elimidada';
								$archivo= 'Oferta eliminada';
							}
							$Cantidad=$row4['Cantidad_Pedido_O'];
							$total_precio=$row4['Total_precio_o'];
							$total_precio_BS=$row4['Total_precio_bs_o'];
							?>

                        <tr>
                            <td><?php echo $Nombre; ?></td>
                            <td><?php echo $Cantidad; ?></td>
                            <td><?php echo $total_precio; ?>$</td>
                            <td><?php echo $total_precio_BS; ?>Bs</td>
                        </tr>
                        <?php
				}
			}
			else{
				?>
                        <tr class="text-center">
                            <td colspan="16">No se Reservaron Ofertas</td>
                        </tr>
                        <?php
			}
			?>
                    </tbody>
                </table>
                <div class="contenedor_paginador">
                    <div id="paginador_2" class=""></div>
                </div>
            </div>
        </div>
    </div>

    <div class="total_pagar">
        <h2 class="Titulo_2">Total en Dólares:&nbsp;
            <?php echo $total; ?>&nbsp;$
        </h2>
        <h2 class="Titulo_3">Total en Bolívares:&nbsp;
            <?php echo $total2; ?>&nbsp;Bs
        </h2>
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

    <script src="js/app.js"></script>
    <script src="js\page_detalles_productos.js"></script>
    <script src="js\page_detalles_ofertas.js"></script>
</body>

</html>