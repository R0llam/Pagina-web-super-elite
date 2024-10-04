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

	<div class="container">
	<a name="Inicio"></a>
	<h1 class="titulo">Manual de Usuario</h1>
	<div class="imagen_principal"><img src="Imagenes/Manual/Imagen13.png"></div>
		<div class="indice">
		<h2 class="titulo_indice">Índice:</h2>
		<ul class="indice_lista">
			<li><a class="indice_vinculos" href="#Introduccion">Introducción</a></li>
			<li><a class="indice_vinculos" href="#Vision_General_de_la_Pagina">Visión General de la Página</a></li>
			<li><a class="indice_vinculos" href="#Antes_de_Iniciar_Sesion">Antes de Iniciar Sesión</a></li>
			<li><a class="indice_vinculos" href="#Iniciar_Sesion">Iniciar Sesión</a></li>
			<li><a class="indice_vinculos" href="#Registrarse">Registrarse</a></li>
			<li><a class="indice_vinculos" href="#Recuperar">Recuperar</a></li>
			<li><a class="indice_vinculos" href="#Productos">Productos</a></li>
			<li><a class="indice_vinculos" href="#Ofertas">Ofertas</a></li>
			<li><a class="indice_vinculos" href="#Conocenos">Conócenos</a></li>
			<li><a class="indice_vinculos" href="#Contactanos">Contáctanos</a></li>
			<li><a class="indice_vinculos" href="#Despues_de_Iniciar_Sesion">Después de Iniciar Sesión </a></li>
			<li><a class="indice_vinculos" href="#Pedidos">Pedidos</a></li>
			<li><a class="indice_vinculos" href="#Enviar_Curriculo">Enviar Currículos</a></li>
			<li><a class="indice_vinculos" href="#Usuario">Usuario</a></li>
			<li><a class="indice_vinculos" href="#Cerrar_Sesion">Cerrar Sesión</a></li>
		</ul>
	</div>
	<a name="Introduccion"></a>
	<div class="Introduccion">
		<h1 class="Sup_Titulo_Introduccion">Introducción</h1>
		<p>Esta es una página web comercial que tiene como objetivo el mostrar los distintos productos encontrados en nuestro local así como sus precios, también fue desarrollada para permitirte solicitar empleo por medio de ella, a continuación se te explicara cómo hacerlo y como funciona cada apartado de nuestra página.</p>
	</div>

	<a name="Vision_General_de_la_Pagina"></a>
	<h1 class="titulo_2">Visión General de la Página</h1>

	<a name="Antes_de_Iniciar_Sesion"></a>
	<div class="Antes_de_Iniciar_Sesion">
		<h1 class="Sup_Titulo">Antes de Iniciar Sesión</h1>
		<div class="imagen_secudaria">
			<img class="imagen_Antes_de_Iniciar_Sesion" src="Imagenes\Manual\Introduccion.PNG">
		</div>
		<p>Antes de iniciar sesión solo podrás ver en la barra de navegación 7 vinculos:</p>
	</div>

	<a name="Iniciar_Sesion"></a>

	<div class="Antes_de_Iniciar_Sesion">
		<h1 class="Sup_Titulo">Iniciar Sesión</h1>
		<div class="imagen_secudaria">
			<img class="imagen_Iniciar_Sesion" src="Imagenes\Manual\Iniciar Sesion.PNG">
		</div>
		<p>Para poder acceder a las distintas opciones de la página, como por ejemplo solicitar empleo, necesitaras iniciar sesión, para lo cual primero tendrás que registrarte con un usuario y contraseña.</p>
		<div class="imagen_secudaria">
			<img class="imagen_Iniciar_Sesion_2" src="Imagenes\Manual\Iniciar Sesion2.PNG">
		</div>

	</div>
	<a name="Registrarse"></a>
	<div class="Antes_de_Iniciar_Sesion">
		<h1 class="Sup_Titulo">Registrarse</h1>
		<div class="imagen_secudaria">
			<img class="imagen_productos" src="Imagenes\Manual\r1.PNG">
		</div>
		<p>En este apartado podrás registrar tus datos para crear un usuario y contraseña que te servirán acceder a todos los módulos de la página.</p>
		<div class="imagen_secudaria">
			<img class="imagen_productos_2" src="Imagenes/Manual/r2.PNG">
		</div>
	</div>
		
	<a name="Recuperar"></a>
	<div class="Antes_de_Iniciar_Sesion">
		<h1 class="Sup_Titulo">Recuperar</h1>
		<div class="imagen_secudaria">
			<img class="imagen_productos" src="Imagenes\Manual\r3.PNG">
		</div>
		<p>En este módulo podrás recuperar tu usuario y contraseña en el caso de que los hayas olvidado.</p>
		<div class="imagen_secudaria">
			<img class="imagen_productos_2" src="Imagenes/Manual/r4.PNG">
		</div>
	</div>
		
	<a name="Productos"></a>
	<div class="Antes_de_Iniciar_Sesion">
		<h1 class="Sup_Titulo">Productos</h1>
		<div class="imagen_secudaria">
			<img class="imagen_productos" src="Imagenes\Manual\Productos.PNG">
		</div>
		<p>En esta zona encontraras todas las categorías de los productos de nuestro local donde podrás seleccionar la categoría de tu preferencia, para así ver los distintos productos que se encuentran en ella, así como también sus precios.</p>
		<div class="imagen_secudaria">
			<img class="imagen_productos_2" src="Imagenes/Manual/1.PNG">
		</div>
	</div>

	<a name="Ofertas"></a>
	<div class="Antes_de_Iniciar_Sesion">
		<h1 class="Sup_Titulo">Ofertas</h1>
		<div class="imagen_secudaria">
			<img class="imagen_productos" src="Imagenes\Manual\2.PNG">
		</div>
		<p>En esta zona encontraras todas las ofertas de nuestro local, así como también sus precios y detalles.</p>
		<div class="imagen_secudaria">
			<img class="imagen_productos_2" src="Imagenes/Manual/3.PNG">
		</div>
	</div>

	<a name="Conocenos"></a>
	<div class="Antes_de_Iniciar_Sesion">
		<h1 class="Sup_Titulo">Conócenos</h1>
		<div class="imagen_secudaria">
			<img class="imagen_conocenos" src="Imagenes/Manual/4.png">
		</div>
		<p>En este apartado podrá conocer un poco más sobre la historia de nuestro local, de igual forma conocerá nuestra visión y misión, y la localización del local en el municipio.</p>
		<div class="imagen_secudaria">
			<img class="imagen_conocenos_2" src="Imagenes/Manual/5.PNG">
		</div>

	</div>
	
	<a name="Contactanos"></a>
	<div class="Antes_de_Iniciar_Sesion">
		<h1 class="Sup_Titulo">Contáctanos</h1>
		<div class="imagen_secudaria">
			<img class="imagen_contactanos" src="Imagenes/Manual/6.png">
		</div>
		<p>Aquí podrás darnos tu opinión sobre la página, así como también poder reportar cualquier fallo que la misma pueda tener.</p>
		<div class="imagen_secudaria">
			<img class="imagen_contactanos_2" src="Imagenes/Manual/7.PNG">
		</div>
	</div>
		
	<a name="Despues_de_Iniciar_Sesion"></a>
	<div class="Despues_de_Iniciar_Sesion">
		<h1 class="Sup_Titulo">Después de Iniciar Sesión</h1>
		<div class="imagen_secudaria">
			<img class="Imagen_Despues_de_Iniciar_Sesion" src="Imagenes/Manual/8.PNG">
		</div>
		<p>Después de iniciar sesión tendrás acceso a 2 zonas más en la barra de navegación:</p>
	</div>

	<a name="Pedidos"></a>
	<div class="Despues_de_Iniciar_Sesion">
		<h1 class="Sup_Titulo">Pedidos</h1>
		<div class="imagen_secudaria">
			<img class="Imagen_Enviar_Curriculo" src="Imagenes/Manual/9.png">
		</div>
		<p>Al momento de iniciar sesión podrás realizar un pedido mediante los módulos de productos y ofertas presionando el botón que se muestra en la imagen </p>
		<div class="imagen_secudaria">
			<img class="Imagen_Enviar_Curriculo_2" src="Imagenes/Manual/10.PNG">
		</div>
		<p>Para continuar el pedido se debe de presionar el botón que se muestra en la imagen anterior y presionar el botón de continuar.</p>
	</div>

	<a name="Enviar_Curriculo"></a>
	<div class="Despues_de_Iniciar_Sesion">
		<h1 class="Sup_Titulo">Enviar Currículo</h1>
		<div class="imagen_secudaria">
			<img class="Imagen_Enviar_Curriculo" src="Imagenes/Manual/11.png">
		</div>
		<p>Aquí podrás solicitar empleo enviando tu currículo en formato PDF, para ello el nombre del archivo tiene que ser de la siguiente forma: (Nombre_Apellido.pdf).</p>
		<div class="imagen_secudaria">
			<img class="Imagen_Enviar_Curriculo_2" src="Imagenes/Manual/12.PNG">
		</div>
	</div>

	<a name="Usuario"></a>
	<div class="Despues_de_Iniciar_Sesion">
		<h1 class="Sup_Titulo">Usuario</h1>
		<div class="imagen_secudaria">
			<img class="Imagen_Enviar_Curriculo" src="Imagenes/Manual/13.png">
		</div>
		<p>En este apartado podrás editar los datos de tu usuario.</p>
		<div class="imagen_secudaria">
			<img class="Imagen_Enviar_Curriculo_2" src="Imagenes/Manual/14.PNG">
		</div>
	</div>

	<a name="Cerrar_Sesion"></a>
	<div class="Cerrar_Sesion">
		<h1 class="Sup_Titulo">Cerrar Sesión</h1>
		<div class="imagen_secudaria">
			<img class="imagen_Cerrar_Sesion" src="Imagenes/Manual/15.png">
		</div>
		<p>Al pulsar esta opción saldrás del sistema y por lo tanto tu sesión quedará cerrada hasta que vuelvas a acceder por medio de tu usuario y contraseña.</p>
	</div>

	<div class="inicio">
		<a href="#Inicio">Volver al Principio de la Página.</a>
	</div>
	<div class="Regresar">
		<a href="Ayuda.php">Regresar a la Página Anterior.</a>
	</div>
	</div>

	<br>
	<br>
	
	<?php
	include("Footer.php");
	?>

	<script src="js/app.js"></script>
</body>
</html>