<nav class="menu">
    <section class="menu_contenedor">

        <div class="Logo" align="Center">
            <a href="Administrador.php">
                <img width="130" height="87" class="logo" src="Imagenes/Logo.png" alt="Logo">
            </a>
        </div>

        <ul class="menu_links">

            <li class="menu_item menu_item--show">
                <a href="#" class="menu_link">Pedidos<img src="assets/arrow.svg" class="menu_arrow"></a>

                <ul class="menu_nesting">
                    <li class="menu_inside">
                        <a href="Administracion_de_reservas.php" class="menu_link menu_link--inside">En Espera</a>
                    </li>
                    <li class="menu_inside">
                        <a href="Administracion_de_reservas_C2.php" class="menu_link menu_link--inside">Completados</a>
                    </li>
                    <li class="menu_inside">
                        <a href="ProductosR.php" class="menu_link menu_link--inside">Productos más Reservados</a>
                    </li>
                    <li class="menu_inside">
                        <a href="OfertasR.php" class="menu_link menu_link--inside">Ofertas más Reservadas</a>
                    </li>
                </ul>

            </li>

            <li class="menu_item menu_item--show">
                <a href="#" class="menu_link">Registrar<img src="assets/arrow.svg" class="menu_arrow"></a>

                <ul class="menu_nesting">
                    <li class="menu_inside">
                        <a href="Comprovacion_Productos.php" class="menu_link menu_link--inside">Productos/Ofertas</a>
                    </li>
                    <li class="menu_inside">
                        <a href="Categorias.php" class="menu_link menu_link--inside">Categorias</a>
                    </li>
                    <li class="menu_inside">
                        <a href="Marca.php" class="menu_link menu_link--inside">Marcas</a>
                    </li>
                    <li class="menu_inside">
                        <a href="Bancos.php" class="menu_link menu_link--inside">Cuentas bancarias</a>
                    </li>
                    <li class="menu_inside">
                        <a href="Sucursal.php" class="menu_link menu_link--inside">Sucursales</a>
                    </li>
                </ul>
            </li>

            <li class="menu_item menu_item--show">
                <a href="#" class="menu_link">Consultar<img src="assets/arrow.svg" class="menu_arrow"></a>

                <ul class="menu_nesting">
                    <li class="menu_inside">
                        <a href="Comprovacion_Curriculum.php" class="menu_link menu_link--inside">Currículos</a>
                    </li>
                    <li class="menu_inside">
                        <a href="Comprovacion_Contactanos.php" class="menu_link menu_link--inside">Contáctanos</a>
                    </li>
                    <li class="menu_inside">
                        <a href="Historial_Dolar.php" class="menu_link menu_link--inside">Historial del Dólar</a>
                    </li>
                    <li class="menu_inside">
                        <a href="Usuarios.php" class="menu_link menu_link--inside">Clientes</a>
                    </li>
                    <li class="menu_inside">
                        <a href="Historial_de_inicio_de_sesion.php" class="menu_link menu_link--inside">Inicio de Sesión
                            de Usuarios</a>
                    </li>
                </ul>

            </li>

            <li class="menu_item menu_item--show">
                <a href="#" class="menu_link">Actualizar<img src="assets/arrow.svg" class="menu_arrow"></a>

                <ul class="menu_nesting">
                    <li class="menu_inside">
                        <a href="Comprovacion_Precio.php" class="menu_link menu_link--inside">Precio</a>
                    </li>
                    <li class="menu_inside">
                        <a href="Carrusel.php" class="menu_link menu_link--inside">Carrusel</a>
                    </li>
                </ul>

            </li>

            <li class="menu_item menu_item--show">
                <a href="#" class="menu_link">Mantenimiento<img src="assets/arrow.svg" class="menu_arrow"></a>

                <ul class="menu_nesting">
                    <li class="menu_inside">
                        <a href="Respaldo\Respaldo.php" class="menu_link menu_link--inside">Respaldar y Restaurar la
                            Base de Datos</a>
                    </li>
                </ul>

            </li>

            <li class="menu_item">
                <a href="#" class="menu_link log_out">Cerrar Sesión</a>
            </li>

            <li class="menu_item">
                <a href="index.php" class="menu_link">Salir</a>
            </li>

        </ul>

        <?php 
				$records2 = $conn->prepare('SELECT * FROM notificaciones Where ID_No=1');
				$records2->execute();
				$resultados2 = $records2->fetch(PDO::FETCH_ASSOC);
				$datos20 = $resultados2;
				$Cantidad20= $datos20['Cantidad_No'];
                $records3 = $conn->prepare('SELECT * FROM notificaciones Where ID_No=2');
                $records3->execute();
                $resultados3 = $records3->fetch(PDO::FETCH_ASSOC);
                $datos21 = $resultados3;
                $Cantidad21= $datos21['Cantidad_No'];
                $records4 = $conn->prepare('SELECT * FROM notificaciones Where ID_No=3');
                $records4->execute();
                $resultados4 = $records4->fetch(PDO::FETCH_ASSOC);
                $datos22 = $resultados4;
                $Cantidad22= $datos22['Cantidad_No'];
                $totalcantidad= $Cantidad21 + $Cantidad20 + $Cantidad22;
				
			?>

        <div class="menu_contenedor_2">

            <li class="menu_item_2">
                <a href="#" class="menu_link_2"><img src="assets\bell_fill.svg" class="menu_img"> &nbsp;<?php
                                        if($totalcantidad == 0){

                                        }
                                        else{
                                        echo $totalcantidad;
                                        } ?></a>

                <ul class="menu_nesting_noti_2">
                    <li class="menu_inside_2">
                        <a style="color: #fff;" class="menu_link_2 menu_link--inside_2"
                            href="Comprovacion_Contactanos.php">
                            Tienes:
                            <?php 
								echo $Cantidad20;
							?>
                            Mensajes de Contáctanos Nuevos
                        </a>
                    </li>
                    <li class="menu_inside_2">
                        <a style="color: #fff;" class="menu_link_2 menu_link--inside_2"
                            href="Administracion_de_reservas.php">
                            Tienes:
                            <?php 
								echo $Cantidad21;
							?>
                            Reservas Nuevas
                        </a>

                    </li>
                    <li class="menu_inside_2">
                        <a style="color: #fff;" class="menu_link_2 menu_link--inside_2" href="Curriculum2.php">
                            Tienes:
                            <?php 
								echo $Cantidad22;
							?>
                            Currículos Nuevos
                        </a>

                    </li>
                </ul>

            </li>

            <li class="menu_item_2">
                <a href="Editar_U.php?id=<?php echo $user['id']?>" class="menu_link_2"><img
                        src="assets\person_circle.svg" class="menu_img"></a>
            </li>

            <div class="menu_hamburguer">
                <img src="assets/menu.svg" class="menu_img">
            </div>

        </div>

    </section>

</nav>
<script src="js\validacion_num_let.js" type="text/javascript"></script>

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