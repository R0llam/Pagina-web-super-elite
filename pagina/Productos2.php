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
    <title>Productos</title>
    <script src="Estilos/bootstrap.bundle.min.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="Imagenes/Icono.png">
    <link rel="stylesheet" type="text/css" href="Estilos_Buscador_Productos_Ofertas.css">
    <link rel="stylesheet" href="Estilos_Productos.css">
    <link rel="stylesheet" href="Estilos_Carrito_Compras_2.css">
    <link rel="stylesheet" href="Modal_carrito.css">
    <link rel="stylesheet" href="Estilos_modal_detalles_ofertas.css">
    <link rel="stylesheet" href="Estilos_paginado.css">
    <?php include("link.php");	?>
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
    <?php
			$ca="2";
		?>

    <?php elseif (!empty($user)): ?>

    <?php
			include("barra_de_navegacion_carrito2.php");
		?>
    <br>
    <br>
    <br>
    <div id="modal_cart2"></div>
    <?php
			$ca="2";
		?>

    <?php else: ?>

    <?php
			include("barra_de_navegacion3.php");
			$ca= 1 ;
		?>

    <?php endif; ?>

    <div class="contenedor_volver">
        <div class="volver">
            <a href="Productos.php">
                <img src="svg/arrow-left.svg" alt="">
            </a>
        </div>
    </div>

    <?php	
		include("database2.php");
		$conexion=conexion();
		$IDC=$_GET['IDC'];
		$query=listar_Categorias2($conexion,$IDC);
		$row = mysqli_fetch_assoc($query);
		$Nombre = $row ['Categoria'];
		?>
    <header class="Encabezados">
        <section class="texto_header">
            <h1><?php echo $Nombre; ?></h1>
            <h2>¡Lleva los mejores productos calidad precio!</h2>
        </section>

        <div class="Ola" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none"
                style="height: 100%; width: 100%;">
                <path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 530.76,83.39 L500.00,150.00 L0.00,150.00 Z"
                    style="stroke: none; fill: #26292e;"></path>
            </svg>
        </div>

    </header>

    <div id="respuesta">

    </div>

    <div class="container-fluid-buscador">
        <form action="Productos2.php" method="GET" class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Buscar Producto" id="busqueda" name="busqueda"
                required onkeypress="return Enter(this, event, 'NO', 'LET-NUM')">
            <input type="hidden" placeholder="Buscar Producto" id="IDC" name="IDC" value="<?php echo $IDC?>" />
            <button class="btn1 btn-warning" type="submit" name="enviar"><b>Buscar</b></button>
        </form>
    </div>

    <br>
    <br>

    <div class="container">

        <?php		
		if (isset($_GET['busqueda'])){
				$busqueda = $_GET['busqueda'];
				$where="WHERE NombreP  LIKE'%".$busqueda."%' AND Categoria_P_ID = ".$IDC." ";
			}
		else{
			$where="WHERE Categoria_P_ID = ".$IDC." ";
			$busqueda = '';
		}
				$sql3=$SQL="SELECT * FROM productos $where";
				$query=mysqli_query($conexion,$sql3);
				$totalr=$query->num_rows;
				$limite= 6;
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
				while ($row2 = mysqli_fetch_assoc($query)){
							$id2 = $row2 ['ID_P'];
							$Nombre2 = $row2 ['NombreP'];
							$Precio = $row2 ['Precio'];
							$archivo=$row2['archivoBLOB'];
							$cantidad=$row2['Cantidad'];
							$Precio_B=listar_precio_B($conexion,$Precio);
							if($cantidad > 0){
		?>
        <div class="card">

            <figure><?php 
				$valor="<img src='../Productos/$archivo' class='card-img'></img>";
                echo $valor;
                ?>
                <div class="details_card">
                    <img src="assets\clipboard.svg" class="svg_icon_details">
                    <span class="text_details_card">Detalles</span>
                </div>
            </figure>

            <p class="text-title-1"><?php echo $Nombre2; ?></p>
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

                    <input name="Nombre" type="hidden" id="Nombre<?php echo $id2; ?>" value="<?php echo $Nombre2; ?>" />

                    <input name="Precio" type="hidden" id="Precio<?php echo $id2; ?>" value="<?php echo $Precio; ?>" />

                    <input name="Precio_B" type="hidden" id="Precio_B<?php echo $id2; ?>"
                        value="<?php echo $Precio_B; ?>" class="pl2" />

                    <input name="Cantidad" type="hidden" id="Cantidad<?php echo $id2; ?>" value="1" class="pl2" />

                    <input name="Imagen" type="hidden" id="Imagen<?php echo $id2; ?>" value="Imagen" class="pl2" />

                    <input name="tipo" type="hidden" id="tipo<?php echo $id2; ?>" value="1" class="pl2" />

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
                    <a
                        href="Productos2.php?page=<?php echo $i.$concatParant;?>&IDC=<?php echo $IDC?>"><?php echo $i;?></a>
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

    <!-- Modales de validación  -->

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

    <?php
include("Footer.php");
?>
    <script src="Enviar.js"></script>
    <script src="js/modal_cerrar_sesion.js"></script>
    <script src="js/app.js"></script>
    <script src="js/modal.js"></script>
    <script src="js\validacion_num_let.js" type="text/javascript"></script>

</body>

</html>