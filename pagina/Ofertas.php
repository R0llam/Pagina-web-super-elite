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
    <title>Ofertas</title>
    <script src="Estilos/bootstrap.bundle.min.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="Imagenes/Icono.png">
    <link rel="stylesheet" type="text/css" href="Estilos_Buscador_Ofertas.css">
    <link rel="stylesheet" href="Estilos_ofertas_2.css">
    <link rel="stylesheet" href="Estilos_Carrito_Compras_2.css">
    <link rel="stylesheet" href="Modal_carrito.css">
    <link rel="stylesheet" href="Estilos_modal_detalles_ofertas.css">
    <link rel="stylesheet" href="Estilos_paginado.css">
    <?php include("link.php");?>
    <script src="js\code_jsquery.js"></script>
</head>

<body>

    <?php if (!empty($user) and $user['id'] == '1'): ?>
    <?php
			include("barra_de_navegacion_carrito.php");
		?>
    <br>
    <br>
    <br>

    <div id="modal_cart2"></div>

    <?php elseif (!empty($user)): ?>
    <?php
			include("barra_de_navegacion_carrito2.php");

		?>
    <br>
    <br>
    <br>

    <div id="modal_cart2"></div>

    <?php else: ?>

    <?php
			include("barra_de_navegacion3.php")
		?>

    <?php endif; ?>

    <div class="contenedor_volver">
        <div class="volver">
            <a href="Index.php">
                <img src="svg/arrow-left.svg" alt="">
            </a>
        </div>
    </div>

    <header class="Encabezados">
        <section class="texto_header">
            <h1>Ofertas</h1>
            <h2>¡Tenemos las mejores ofertas para ti!</h2>
        </section>

        <div class="Ola" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none"
                style="height: 100%; width: 100%;">
                <path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 530.76,83.39 L500.00,150.00 L0.00,150.00 Z"
                    style="stroke: none; fill: #26292e;"></path>
            </svg>
        </div>

    </header>

    <div class="container-fluid">
        <form action="" method="GET" class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Buscar Oferta" name="busqueda" required
                onkeypress="return Enter(this, event, 'NO', 'LET-NUM')">
            <button class="btn1 btn-warning" type="submit" name="enviar"><b>Buscar</b></button>
        </form>
    </div>

    <br>

    <div class="container">
        <?php 
			include("database2.php");
			$conexion=conexion();
            if (isset($_GET['busqueda'])){
				$busqueda = $_GET['busqueda'];
				$where="WHERE Nombre_Oferta  LIKE'%".$busqueda."%'";
			}
		    else{
			$where='';
			$busqueda = '';
		    }
                $sql3=$SQL="SELECT * FROM oferta $where";
				$query=mysqli_query($conexion,$sql3);
				$totalr=$query->num_rows;
				$limite= 5;
				$pages = ceil($totalr/$limite);
				if(isset($_GET['page'])){
					$page = $_GET['page'];
				}
				else{
					$page = 1;
				}
				$star=($page - 1) * $limite;
				$pagination = "LIMIT $star, $limite";
				$sql3= $sql3 . $pagination;
				$query= mysqli_query($conexion,$sql3);
				$concatParant= ($busqueda != "") ? "& busqueda=".$busqueda : "";
				while ($row = mysqli_fetch_assoc($query)) {
					$id2 = $row ['ID_Oferta'];
					$Nombre = $row ['Nombre_Oferta'];
					$Precio = $row ['Precio_Oferta'];
					$tipo=$row['Nombre_Oferta'];
					$archivo=$row['Imagen_de_Oferta'];
					$cantidad=$row['Cantidad_O'];
					$Precio_B=listar_precio_B($conexion,$Precio);
					if($cantidad > 0){		
			?>
        <div class="card">
        <a href="Ofertas.php?modal=1&ido=<?php echo $id2?>">
            <figure><?php 
				$valor="<img src='../Ofertas/$archivo' class='card-img'></img>";
				echo $valor;
				?>
                <div class="details_card">
                    <img src="assets\clipboard.svg" class="svg_icon_details">
                    <span class="text_details_card">Detalles</span>
                </div>
            </figure>
        </a>

            <p class="text-title-1"><?php echo $Nombre; ?></p>
            <div class="card-footer">
                <p class="text-title-2"><?php echo $Precio; ?>$</p>
                <p class="text-title-2"><?php echo $Precio_B; ?>Bs</p>
                <?php if (!empty($user)){ ?>
                <button class="card-button" onclick="
                                    eviar_carrito(
                                        $('#id<?php echo $id2; ?>').val(),
                                        $('#Nombre<?php echo $id2; ?>').val(),
                                        $('#Precio<?php echo $id2; ?>').val(),
                                        $('#Precio_B<?php echo $id2; ?>').val(),
                                        $('#Cantidad<?php echo $id2; ?>').val(),
                                        $('#Imagen<?php echo $id2; ?>').val(),
                                        $('#tipo<?php echo $id2; ?>').val()
                                    );
                                ">
                    <input name="id" type="hidden" id="id<?php echo $id2; ?>" value="<?php echo $id2; ?>" />

                    <input name="Nombre" type="hidden" id="Nombre<?php echo $id2; ?>" value="<?php echo $Nombre; ?>" />

                    <input name="Precio" type="hidden" id="Precio<?php echo $id2; ?>" value="<?php echo $Precio; ?>" />

                    <input name="Precio_B" type="hidden" id="Precio_B<?php echo $id2; ?>"
                        value="<?php echo $Precio_B; ?>" class="pl2" />

                    <input name="Cantidad" type="hidden" id="Cantidad<?php echo $id2; ?>" value="1" class="pl2" />

                    <input name="Imagen" type="hidden" id="Imagen<?php echo $id2; ?>" value="Imagen" class="pl2" />

                    <input name="tipo" type="hidden" id="tipo<?php echo $id2; ?>" value="2" class="pl2" />

                    <svg class="svg-icon" viewBox="0 0 20 20" id="boton">
                        <path
                            d="M17.72,5.011H8.026c-0.271,0-0.49,0.219-0.49,0.489c0,0.271,0.219,0.489,0.49,0.489h8.962l-1.979,4.773H6.763L4.935,5.343C4.926,5.316,4.897,5.309,4.884,5.286c-0.011-0.024,0-0.051-0.017-0.074C4.833,5.166,4.025,4.081,2.33,3.908C2.068,3.883,1.822,4.075,1.795,4.344C1.767,4.612,1.962,4.853,2.231,4.88c1.143,0.118,1.703,0.738,1.808,0.866l1.91,5.661c0.066,0.199,0.252,0.333,0.463,0.333h8.924c0.116,0,0.22-0.053,0.308-0.128c0.027-0.023,0.042-0.048,0.063-0.076c0.026-0.034,0.063-0.058,0.08-0.099l2.384-5.75c0.062-0.151,0.046-0.323-0.045-0.458C18.036,5.092,17.883,5.011,17.72,5.011z">
                        </path>
                        <path
                            d="M8.251,12.386c-1.023,0-1.856,0.834-1.856,1.856s0.833,1.853,1.856,1.853c1.021,0,1.853-0.83,1.853-1.853S9.273,12.386,8.251,12.386z M8.251,15.116c-0.484,0-0.877-0.393-0.877-0.874c0-0.484,0.394-0.878,0.877-0.878c0.482,0,0.875,0.394,0.875,0.878C9.126,14.724,8.733,15.116,8.251,15.116z">
                        </path>
                        <path
                            d="M13.972,12.386c-1.022,0-1.855,0.834-1.855,1.856s0.833,1.853,1.855,1.853s1.854-0.83,1.854-1.853S14.994,12.386,13.972,12.386z M13.972,15.116c-0.484,0-0.878-0.393-0.878-0.874c0-0.484,0.394-0.878,0.878-0.878c0.482,0,0.875,0.394,0.875,0.878C14.847,14.724,14.454,15.116,13.972,15.116z">
                        </path>
                    </svg>
                </button>
                <!-- <div class="detalles">
                    <a href="Ofertas.php?modal=1&ido=<?php echo $id?>"><img src="assets\clipboard.svg"
                            class="svg-icon-2"></a>
                </div> -->

                <?php } else{ ?>
                <div class="card-button">

                    <a href="#" class="button_validation">
                        <svg class="svg-icon" viewBox="0 0 20 20">
                            <path
                                d="M17.72,5.011H8.026c-0.271,0-0.49,0.219-0.49,0.489c0,0.271,0.219,0.489,0.49,0.489h8.962l-1.979,4.773H6.763L4.935,5.343C4.926,5.316,4.897,5.309,4.884,5.286c-0.011-0.024,0-0.051-0.017-0.074C4.833,5.166,4.025,4.081,2.33,3.908C2.068,3.883,1.822,4.075,1.795,4.344C1.767,4.612,1.962,4.853,2.231,4.88c1.143,0.118,1.703,0.738,1.808,0.866l1.91,5.661c0.066,0.199,0.252,0.333,0.463,0.333h8.924c0.116,0,0.22-0.053,0.308-0.128c0.027-0.023,0.042-0.048,0.063-0.076c0.026-0.034,0.063-0.058,0.08-0.099l2.384-5.75c0.062-0.151,0.046-0.323-0.045-0.458C18.036,5.092,17.883,5.011,17.72,5.011z">
                            </path>
                            <path
                                d="M8.251,12.386c-1.023,0-1.856,0.834-1.856,1.856s0.833,1.853,1.856,1.853c1.021,0,1.853-0.83,1.853-1.853S9.273,12.386,8.251,12.386z M8.251,15.116c-0.484,0-0.877-0.393-0.877-0.874c0-0.484,0.394-0.878,0.877-0.878c0.482,0,0.875,0.394,0.875,0.878C9.126,14.724,8.733,15.116,8.251,15.116z">
                            </path>
                            <path
                                d="M13.972,12.386c-1.022,0-1.855,0.834-1.855,1.856s0.833,1.853,1.855,1.853s1.854-0.83,1.854-1.853S14.994,12.386,13.972,12.386z M13.972,15.116c-0.484,0-0.878-0.393-0.878-0.874c0-0.484,0.394-0.878,0.878-0.878c0.482,0,0.875,0.394,0.875,0.878C14.847,14.724,14.454,15.116,13.972,15.116z">
                            </path>
                        </svg>
                    </a>
                </div>
                <!-- <div class="detalles">
                    <a href="Ofertas.php?modal=1&ido=<?php echo $id?>" class=""><img src="assets\clipboard.svg"
                            class="svg-icon-2"></a>
                </div> -->
                <?php } ?>
            </div>
        </div>
        <?php
		}
	}
    ?>
    </div>
    <div>
        <center>
            <ul class="paginado">
                <?php 
		for($i=1; $i <= $pages; $i++){
		?>
                <li>
                    <a href="Ofertas.php?page=<?php echo $i.$concatParant;?>"><?php echo $i;?></a>
                </li>
                <?php
		}
		?>
            </ul>
        </center>
    </div>
    <br>
    <br>
    <br>
    <br>
    <?php if(!empty($_GET['modal'])){
		$modal=$_GET['modal'];
		$ido=$_GET['ido'];
		if($modal=='1'){
		$sql5="SELECT * FROM oferta where 	ID_Oferta='$ido'";
		$query5=mysqli_query($conexion,$sql5);
		$row5= mysqli_fetch_assoc($query5);
		$Nombre= $row5 ['Nombre_Oferta'];
		$Precio= $row5 ['Precio_Oferta'];
		$tipo=$row5['Nombre_Oferta'];
		$archivo=$row5['Imagen_de_Oferta'];
		$Descripcion=$row5['Descripcion_O'];
		$fecha=$row5['Fecha_Fin_O'];
		$Precio_B5=listar_precio_B($conexion,$Precio);
	?>
    <div class="modal_detalles">
        <div class="modal_container_detalles">

            <div class="nombre_oferta">
                <h2><?php echo $Nombre?></h2>
            </div>

            <div class="descripcion_oferta">
                <h2><?php echo $Descripcion?></h2>
            </div>

            <div>
                <?php 
				$valor="<img src='../Ofertas/$archivo' class='img_oferta'></img>";
				echo $valor;
				?>
            </div>

            <div class="titulo_tabla">
                <h2>Productos Incluidos:</h2>
            </div>

            <div class="container_table">
                <table class="table table-secondary table-bordered table_id" id="tblDatos">
                    <thead class="table-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
				$sql6="SELECT * FROM oferta_producto where ID_Oferta='$ido'";
				$query6=mysqli_query($conexion,$sql6);
				while($row6= mysqli_fetch_assoc($query6)){
					$IDP=$row6['ID_P'];
					$cantidad=$row6['Cantidad_PO'];
					$sql7="SELECT * FROM productos where ID_P='$IDP'";
					$query7=mysqli_query($conexion,$sql7);
					$row7= mysqli_fetch_assoc($query7);
					$Nombre2=$row7['NombreP'];
				?>
                        <td><?php echo $Nombre2; ?></td>
                        <td><?php echo $cantidad; ?></td>
                        </tr>
                        <?php
				}
				?>

                    </tbody>
                </table>
            </div>

            <div class="fecha_finalizacion">
                <h2>Fecha de Finalización:&nbsp;<?php echo $fecha?></h2>
            </div>

            <div class="container_total_pagar">

                <h2 class="Titulo_2">Total en Dólares:&nbsp;
                    <?php echo $Precio?>&nbsp;$
                </h2>

                <h2 class="Titulo_3">Total en Bolívares:&nbsp;
                    <?php echo $Precio_B5?>&nbsp;Bs
                </h2>

            </div>

            <div class="container_btn_detalles">
                <a href="Ofertas.php" class="btn_modal_detalles btn_secondary_detalles">Cerrar</a>
                <?php if (!empty($user)){ ?>
                <a href="carrito2.php?id=<?php echo $ido?>&Nombre=<?php echo $Nombre?>&Precio=<?php echo $Precio?>&Precio_B=<?php echo $Precio_B?>&Cantidad=1&Imagen=Imagen&tipo=2"
                    class="btn_modal_detalles btn_success_detalles">Reservar</a>
                <?php } else{ ?>
                <a href="#" class="btn_modal_detalles btn_success_detalles button_validation_details">Reservar</a>
                <?php }  ?>

            </div>
        </div>
    </div>
    <?php
		}
	} ?>

    <!-- Modales de validación  -->

    <div class="modal_details">
        <div class="modal_container">
            <?php if (!empty($user)):  ?>
            <?php header('location: Empleoh.php'); ?>
            <?php else: ?>
            <img src="svg/Autenticacion.svg" class="modal_img">
            <h2 class="modal_title">¡Inicia Sesión! </h2>
            <p class="modal_paragraph">Tienes que haber iniciado sesión para acceder a esta opción</p>
            <div class="container_btn">
                <a href="Ofertas.php" class="btn-modal btn-secondary_details">Cerrar</a>
                <a href="IniciarSesionh.php" class="btn-modal btn-primary">Iniciar Sesión</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="modal_validation">
        <div class="modal_container">
            <?php if (!empty($user)):  ?>
            <?php header('location: Empleoh.php'); ?>
            <?php else: ?>
            <img src="svg/Autenticacion.svg" class="modal_img">
            <h2 class="modal_title">¡Inicia Sesión! </h2>
            <p class="modal_paragraph">Tienes que haber iniciado sesión para acceder a esta opción</p>
            <div class="container_btn">
                <a href="Ofertas.php" class="btn-modal btn-secondary_validation">Cerrar</a>
                <a href="IniciarSesionh.php" class="btn-modal btn-primary">Iniciar Sesión</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="modal_validation_details">
        <div class="modal_container">
            <?php if (!empty($user)):  ?>
            <?php header('location: Empleoh.php'); ?>
            <?php else: ?>
            <img src="svg/Autenticacion.svg" class="modal_img">
            <h2 class="modal_title">¡Inicia Sesión! </h2>
            <p class="modal_paragraph">Tienes que haber iniciado sesión para acceder a esta opción</p>
            <div class="container_btn">
                <a href="Ofertas.php" class="btn-modal btn-secondary_validation_details">Cerrar</a>
                <a href="IniciarSesionh.php" class="btn-modal btn-primary">Iniciar Sesión</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php
	include("Footer.php");
	?>
    <script src="Enviar.js"></script>
    <script src="js/modal_cerrar_sesion.js"></script>
    <script src="js/modal.js"></script>
    <script src="js\modal_oferta.js"></script>
    <script src="js/app.js"></script>
    <script src="js\validacion_num_let.js" type="text/javascript"></script>
</body>

</html>