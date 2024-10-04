<nav class="menu">
    <section class="menu_contenedor">

        <div class="Logo" align="Center">
            <a href="Index.php">
                <img width="130" height="87" class="logo" src="Imagenes/Logo.png" alt="Logo">
            </a>
        </div>

        <ul class="menu_links">

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
                <a href="Contactanosh.php" class="menu_link">Contáctanos</a>
            </li>

            <li class="menu_item">
                <a href="Empleoh.php" class="menu_link">Enviar Currículo</a>
            </li>

            <li class="menu_item">
                <a href="Ayudah.php" class="menu_link">Ayuda</a>
            </li>

            <li class="menu_item">
                <a href="Editar_U.php?id=<?php echo $user['id']?>" class="menu_link"><img src="assets\person_circle.svg"
                        class="menu_img"></a>
            </li>

            <?php
                $conne = mysqli_connect("localhost","root","","bd"); 
                $user1=$user['id'];
                $sql25= "SELECT * FROM pedido_cp Where ID=$user1 and estado='En espera' ";
                $query25 = mysqli_query($conne, $sql25);
                $num_rows = $query25->num_rows;

            ?>

            <li class="menu_item">
                <a href="Reservas_U2.php?id=<?php echo $user['id']?>" class="menu_link"><img src="assets\bag-fill.svg"
                        class="menu_img">&nbsp;<?php 
                        if($num_rows == 0){

                        }
                        else{
                        echo $num_rows;
                        } ?>

                </a>
            </li>

            <li class="menu_item">
                <a href="#" class="menu_link log_out">Cerrar Sesión</a>
            </li>

        </ul>

        <div class="menu_hamburguer">
            <img src="assets/menu.svg" class="menu_img">
        </div>

    </section>

</nav>

<div class="modal_log_out">
    <div class="modal_container">
        <img src="svg\question-41.svg" class="modal_img_log_out">
        <h2 class="modal_title">¿Quieres Cerrar Sesión?</h2>
        <p class="modal_paragraph">Recuerda que puedes volver a iniciar sesión en cualquier momento. </p>
        <div class="container_btn_log_out">
            <a href="#" class="btn-modal btn-secondary_log_out">Cancelar</a>
            <a href="CerrarSesion.php" class="btn-modal btn-primary">Cerrar Sesión</a>
        </div>
    </div>
</div>

