<nav class="menu">
		<section class="menu_contenedor">

			<div class="Logo" align="Center">
				<a href="Index.php">
					<img width="130" height="87" class="logo" src="Imagenes/Logo.png" alt="Logo">
				</a>
			</div>

			<ul class="menu_links">

			<li class="menu_item">
				<a href="IniciarSesionh.php" class="menu_link">Iniciar Sesión</a>
			</li>

			<li class="menu_item">
				<a href="Productos.php" class="menu_link">Productos</a>
			</li>

			<li class="menu_item">
				<a href="Ofertas.php" class="menu_link">Ofertas</a>
			</li>

			<li class="menu_item">
				<a href="Conocenos.php" class="menu_link">Conócenos</a>
			</li>

			<li class="menu_item">
				<a href="#" class="menu_link contact_us">Contáctanos</a>
			</li>
			
			<li class="menu_item">
				<a href="#" class="menu_link employment">Enviar Currículo</a>
			</li>

			<li class="menu_item">
				<a href="Ayudah.php" class="menu_link">Ayuda</a>
			</li>

		</ul>

		<div class="menu_hamburguer">
			<img src="assets/menu.svg" class="menu_img">
		</div>

		</section>

	</nav>

	<div class="modal_employment">
        <div class="modal_container">
            <?php if (!empty($user)):  ?>
            <?php header('location: Empleoh.php'); ?>
            <?php else: ?>
            <img src="svg/Autenticacion.svg" class="modal_img">
            <h2 class="modal_title">¡Inicia Sesión! </h2>
            <p class="modal_paragraph">Tienes que haber iniciado sesión para acceder a esta opción</p>
            <div class="container_btn">
                <a href="Index.php" class="btn-modal btn-secondary_employment">Cerrar</a>
                <a href="IniciarSesionh.php" class="btn-modal btn-primary">Iniciar Sesión</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

	<div class="modal_contact_us">
        <div class="modal_container">
            <?php if (!empty($user)):  ?>
            <?php header('location: Contactanosh.php'); ?>
            <?php else: ?>
            <img src="svg/Autenticacion.svg" class="modal_img">
            <h2 class="modal_title">¡Inicia Sesión! </h2>
            <p class="modal_paragraph">Tienes que haber iniciado sesión para acceder a esta opción</p>
            <div class="container_btn">
                <a href="Index.php" class="btn-modal btn-secondary_contact_us">Cerrar</a>
                <a href="IniciarSesionh.php" class="btn-modal btn-primary">Iniciar Sesión</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
