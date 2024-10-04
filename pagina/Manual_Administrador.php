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
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible"content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Manual</title>
	<link rel="shortcut icon" type="image/x-icon" href="Imagenes/Icono.png">
	<link rel="stylesheet" href="Estilos_Manual_12.css">
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

	<a name="Inicio"></a>
	<h1 class="titulo">Manual del Administrador</h1>
	<div class="imagen_principal_administrador">
		<img src="Imagenes/Manual/Imagen14.png">
	</div>
	
	<div class="indice_administrador">
		<h2 class="titulo_indice">Índice:</h2>
		<ul class="indice_lista">
			<li><a class="indice_vinculos" href="#Administracion">Administración</a></li>
			<li><a class="indice_vinculos" href="#Administracion_de_Productos">Administración de Productos/Ofertas</a></li>
			<li><a class="indice_vinculos" href="#Administracion_de_Categorias">Administracion de Categorias</a></li>
			<li><a class="indice_vinculos" href="#Administracion_de_Curriculos">Administración de Currículos</a></li>
			<li><a class="indice_vinculos" href="#Administracion_de_Contactanos">Administración de Contáctanos</a></li>
			<li><a class="indice_vinculos" href="#Actualizacion_de_Precio">Actualización de Precio</a></li>
			<li><a class="indice_vinculos" href="#Historial_del_Dolar">Historial del Dólar</a></li>
			<li><a class="indice_vinculos" href="#Administracion_de_Usuarios">Administración de Usuarios</a></li>
			<li><a class="indice_vinculos" href="#Administracion_del_Carrusel">Administración del Carrusel</a></li>
			<li><a class="indice_vinculos" href="#Reservas_en_Espera">Reservas en Espera</a></li>
			<li><a class="indice_vinculos" href="#Reservas_en_Completadas">Reservas Completadas</a></li>
			<li><a class="indice_vinculos" href="#Productos_mas_Reservados">Productos más Reservados</a></li>
			<li><a class="indice_vinculos" href="#Ofertas_mas_Reservados">Ofertas más Reservados</a></li>
			<li><a class="indice_vinculos" href="#Respaldar_Base_de_Datos">Respaldar Base de Datos</a></li>			
		</ul>
	</div>

	<a name="Administracion"></a>
	<div class="Administracion">	
		<h1 class="Sup_Titulo">Administración</h1>
		
		<div class="imagen_secudaria">
			<img class="imagen_administracion" src="Imagenes/Manual/a1.png">
		</div>

		<p>Para poder acceder a las distintas opciones del administrador primero se tiene que iniciar sesión con el usuario y contraseña de administrador, al hacerlo se desbloquearan las siguientes opciones:</p>
	</div>

	<a name="Administracion_de_Productos"></a>
	<div class="Administracion">
		<h1 class="Sup_Titulo">Administración de Productos/Ofertas</h1>

		<div class="imagen_secudaria">
			<img class="imagen_administracion_productos" src="Imagenes/Manual/a2.png">
		</div>

		<p>Aquí el administrador tendrá cuatro opciones, Registrar y Editar/Eliminar Productos y Registrar y Editar/Eliminar Ofertas.</p>

		<div class="imagen_secudaria">
			<img class="imagen_administracion_productos_2" src="Imagenes/Manual/a3.PNG">
		</div>

		<p>En Registrar podrá ingresar productos y ofertas a la página, para ello tendrá que ingresar los datos que se le solicitan: ID, Nombre, Categoría, Precio y una imagen cuyo formato tiene que ser JPG, los productos ingresados aparecerán en el apartado de productos en sus respectivas categorías.</p>
		
		<div class="imagen_secudaria">
			<img class="imagen_administracion_productos_3" src="Imagenes/Manual/a4.PNG">
		</div>

		<p>En Editar/Eliminar Podrá tanto editar como eliminar los productos y ofertas previamente registrados</p>
		
		<div class="imagen_secudaria">
			<img class="imagen_administracion_productos_4" src="Imagenes/Manual/a5.PNG">
		</div>
	</div>

	<a name="Administracion_de_Categorias"></a>
	<div class="Administracion">
		<h1 class="Sup_Titulo">Administración de Categorías</h1>
		
		<div class="imagen_secudaria">
			<img class="imagen_administracion_curriculos" src="Imagenes/Manual/a6.png">
		</div>

		<p>En este módulo el administrador podrá ver, añadir y eliminar las distintas categorías registradas en la pagina.</p>

		<div class="imagen_secudaria">
			<img class="imagen_administracion_curriculos_2" src="Imagenes/Manual/a7.PNG">
		</div>

	</div>

	<a name="Administracion_de_Curriculos"></a>
	<div class="Administracion">
		<h1 class="Sup_Titulo">Administración de Currículos</h1>
		
		<div class="imagen_secudaria">
			<img class="imagen_administracion_curriculos" src="Imagenes/Manual/a8.png">
		</div>

		<p>En este apartado el administrador podrá ver y eliminar los distintos currículos enviados por los usuarios.</p>

		<div class="imagen_secudaria">
			<img class="imagen_administracion_curriculos_2" src="Imagenes/Manual/a9.PNG">
		</div>

	</div>

	<a name="Administracion_de_Contactanos"></a>
	<div class="Administracion">
		<h1 class="Sup_Titulo">Administración de Contáctanos</h1>
		
		<div class="imagen_secudaria">
			<img class="imagen_administracion_contactanos" src="Imagenes/Manual/a10.png">
		</div>

		<p>Esta opción permite al administrador ver y eliminar todos los mensajes enviados por los usuarios.</p>

		<div class="imagen_secudaria">
			<img class="imagen_actualizacion_precio" src="Imagenes/Manual/a11.png">
		</div>

	</div>

	<a name="Actualizacion_de_Precio"></a>
	<div class="Administracion">
		<h1 class="Sup_Titulo">Actualización de Precio</h1>

		<div class="imagen_secudaria">
			<img class="imagen_actualizacion_precio" src="Imagenes/Manual/a12.png">
		</div>

		<p>En este apartado el administrador podrá cambiar el precio del dólar, así mismos al momento de actualizarlo, el precio en bolívares de todos los productos se actualizará automáticamente.</p>
		
		<div class="imagen_secudaria">
			<img class="imagen_actualizacion_precio_2" src="Imagenes/Manual/a13.PNG">
		</div>

	</div>

	<a name="Historial del Dolar"></a>
	<div class="Administracion">
		<h1 class="Sup_Titulo">Historial del Dólar</h1>

		<div class="imagen_secudaria">
			<img class="imagen_actualizacion_precio" src="Imagenes/Manual/a14.png">
		</div>

		<p>En este modulo el administrador podrá ver y realizar un reporte del historial de los precios del dólar.</p>
		
		<div class="imagen_secudaria">
			<img class="imagen_actualizacion_precio_2" src="Imagenes/Manual/a15.PNG">
		</div>

	</div>

	<a name="Administracion_de_Usuarios"></a>
	<div class="Administracion">
		<h1 class="Sup_Titulo">Administración de Usuarios</h1>

		<div class="imagen_secudaria">
			<img class="imagen_actualizacion_precio" src="Imagenes/Manual/a16.png">
		</div>

		<p>En este módulo el administrador podrá ver y eliminar los usuarios registrados en la página.</p>
		
		<div class="imagen_secudaria">
			<img class="imagen_actualizacion_precio_2" src="Imagenes/Manual/a17.PNG">
		</div>

	</div>

	<a name="Administracion_del_Carrusel"></a>
	<div class="Administracion">
		<h1 class="Sup_Titulo">Administración del Carrusel</h1>

		<div class="imagen_secudaria">
			<img class="imagen_actualizacion_precio" src="Imagenes/Manual/a18.png">
		</div>

		<p>En esta zona el administrador podrá ver y actualizar las imágenes del carrusel que se encuentran en el carrusel de la página.</p>
		
		<div class="imagen_secudaria">
			<img class="imagen_actualizacion_precio_2" src="Imagenes/Manual/a19.PNG">
		</div>

	</div>

	<a name="Reservas_en_Espera"></a>
	<div class="Administracion">
		<h1 class="Sup_Titulo">Reservas en Espera</h1>

		<div class="imagen_secudaria">
			<img class="imagen_actualizacion_precio" src="Imagenes/Manual/a20.png">
		</div>

		<p>En esta modulo el administrador tendrá acceso a eliminar y ver los detalles de una reserva que esten en espera, así como la opción de completar una reserva una vez sea retirada.</p>
		
		<div class="imagen_secudaria">
			<img class="imagen_actualizacion_precio_2" src="Imagenes/Manual/a21.PNG">
		</div>

	</div>

	<a name="Reservas_Completadas"></a>
	<div class="Administracion">
		<h1 class="Sup_Titulo">Reservas Completadas</h1>

		<div class="imagen_secudaria">
			<img class="imagen_actualizacion_precio" src="Imagenes/Manual/a22.png">
		</div>

		<p>En esta modulo el administrador tendrá acceso a ver los detalles de las reservas que esten Completadas, así como la opción de realizar un reporte de una reserva.</p>
		
		<div class="imagen_secudaria">
			<img class="imagen_actualizacion_precio_2" src="Imagenes/Manual/a23.PNG">
		</div>

	</div>

	<a name="Productos_mas_Reservados"></a>
	<div class="Administracion">
		<h1 class="Sup_Titulo">Productos más Reservados</h1>

		<div class="imagen_secudaria">
			<img class="imagen_actualizacion_precio" src="Imagenes/Manual/a24.png">
		</div>

		<p>En esta modulo el administrador puede visualizar los productos más reservados de la página.</p>
		
		<div class="imagen_secudaria">
			<img class="imagen_actualizacion_precio_2" src="Imagenes/Manual/a25.PNG">
		</div>

	</div>

	<a name="Ofertas_mas_Reservados"></a>
	<div class="Administracion">
		<h1 class="Sup_Titulo">Ofertas más Reservados</h1>

		<div class="imagen_secudaria">
			<img class="imagen_actualizacion_precio" src="Imagenes/Manual/a26.png">
		</div>

		<p>En esta modulo el administrador puede visualizar las Ofertas más reservados de la página.</p>
		
		<div class="imagen_secudaria">
			<img class="imagen_actualizacion_precio_2" src="Imagenes/Manual/a27.PNG">
		</div>

	</div>

	<a name="Respaldar_Base_de_Datos"></a>
	<div class="Administracion">
		<h1 class="Sup_Titulo">Respaldar Base de Datos</h1>

		<div class="imagen_secudaria">
			<img class="imagen_actualizacion_precio" src="Imagenes/Manual/a28.png">
		</div>

		<p>En este apartado el administrador tendrá acceso a restaurar y respaldar la base de datos.</p>
		
		<div class="imagen_secudaria">
			<img class="imagen_actualizacion_precio_2" src="Imagenes/Manual/a29.PNG">
		</div>

	</div>

	<br>

	<div class="inicio">
		<a href="#Inicio">Volver al Principio de la Página</a>
	</div>

	<div class="Regresar">
		<a href="Ayuda.php">Regresar a la Página Anterior.</a>
	</div>

	<br>
	<br>

	<?php
	include("Footer.php");
	?>

	<script src="js/app.js"></script>
</body>
</html>