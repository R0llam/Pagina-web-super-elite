<?php
	session_start();
	error_reporting(0);
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
    <title>Iv-SuperElite</title>
    <link rel="shortcut icon" type="image/x-icon" href="Imagenes/Icono.png">
    <link rel="stylesheet" href="Estilo_Pagina_Principal.css">
    <link rel="stylesheet" href="Estilos_Index.css">
    <link rel="stylesheet" href="Estilos_Carrusel_10.css">
    <link rel="stylesheet" href="Estilos_modal_enviar_curriculo.css">
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

    <?php elseif (!empty($user)): ?>

    <?php
			include("barra_de_navegacion2.php");
			
		?>
    <br>
    <br>
    <br>
    <br>
    <br>

    <?php else: ?>
    <?php
			include("barra_de_navegacion3.php");
			
		?>
    <br>
    <br>
    <br>
    <br>
    <br>



    <?php endif; ?>

    <div class="Logo_PG">
        <img src="Imagenes/Logo.png" alt="Logo">
    </div>
    <header class="header_container">
        <div class="content-all">
            <div class="content-carrousel">
                <?php 
			include("database2.php");
			$conexion=conexion();
			$sql2="SELECT * FROM carrusel where Habilitado=0";
			$query2= mysqli_query($conexion,$sql2);
			while ($row2 = mysqli_fetch_assoc($query2)){
				$Imagen =$row2['Imagen_Carrusel'];
				$c=$row2['Categoria_P_ID'];
				if($c==0){
					$link='Ofertas.php';
				}
				else{
					$link='Productos2.php?IDC='.$row2['Categoria_P_ID'];
				}
			?>
                <figure>
                    <a href="<?php echo $link; ?>">
                        <?php $valor="<img src='../Carrusel/$Imagen' class='card-img'></img>";
					echo $valor; ?>
                    </a>
                </figure>
                <?php } ?>
            </div>
        </div>

        <div class="texts">
            <h1 class="title">¡Obtén los Mejores Productos!</h1>
            <p class="paragraph">Obtén la mejor variedad de productos de calidad precio de tus marcas favoritas</p>
            <a href="Productos.php" class="btn"> Ver Ahora</a>
        </div>
    </header>

    <?php
				include("Footer.php");
				?>

    </div>

    <script src="js/modal_cerrar_sesion.js"></script>
    <script src="js/modal.js"></script>
    <script src="js/app.js"></script>
    <?php include("Borrar.php");?>

</body>

</html>