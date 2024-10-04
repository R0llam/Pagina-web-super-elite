<nav class="menu">
    <section class="menu_contenedor">

        <div class="Logo" align="Center">
            <a href="../Index.php">
                <img width="130" height="87" class="logo" src="Imagenes/Logo.png" alt="Logo">
            </a>
        </div>

        <ul class="menu_links">

            <li class="menu_item">
                <a href="../Productos.php" class="menu_link">Productos</a>
            </li>

            <li class="menu_item">
                <a href="../Ofertas.php" class="menu_link">Ofertas</a>
            </li>

            <li class="menu_item">
                <a href="../Conocenos.php" class="menu_link">Conócenos</a>
            </li>

            <li class="menu_item">
                <a href="../Contactanosh.php" class="menu_link">Contáctanos</a>
            </li>

            <li class="menu_item">
                <a href="../Empleoh.php" class="menu_link">Enviar Currículo</a>
            </li>

            <li class="menu_item menu_item--show">
                <a href="#" class="menu_link">Administración<img src="assets/arrow.svg" class="menu_arrow"></a>

                <ul class="menu_nesting">
                    <li class="menu_inside">
                        <a href="../Comprovacion_Productos.php"
                            class="menu_link menu_link--inside">Productos/Ofertas</a>
                    </li>
                    <li class="menu_inside">
                        <a href="../Categorias.php" class="menu_link menu_link--inside">Categorias</a>
                    </li>
                    <li class="menu_inside">
                        <a href="../Comprovacion_Curriculum.php" class="menu_link menu_link--inside">Currículos</a>
                    </li>
                    <li class="menu_inside">
                        <a href="../Comprovacion_Contactanos.php" class="menu_link menu_link--inside">Contáctanos</a>
                    </li>

                    <li class="menu_inside">
                        <a href="../Comprovacion_Precio.php" class="menu_link menu_link--inside">Actualización de
                            Precio</a>
                    </li>
                    <li class="menu_inside">
                        <a href="../Historial_Dolar.php" class="menu_link menu_link--inside">Historial del Dólar</a>
                    </li>
                    <li class="menu_inside">
                        <a href="../Usuarios.php" class="menu_link menu_link--inside">Usuarios</a>
                    </li>
                    <li class="menu_inside">
                        <a href="../Historial_de_inicio_de_sesion.php" class="menu_link menu_link--inside">Historial de
                            Inicio de Sesión de Usuarios</a>
                    </li>
                    <li class="menu_inside">
                        <a href="../Carrusel.php" class="menu_link menu_link--inside">Carrusel</a>
                    </li>
                    <li class="menu_inside">
                        <a href="../Administracion_de_reservas.php" class="menu_link menu_link--inside">Reservas en
                            Espera</a>
                    </li>
                    <li class="menu_inside">
                        <a href="../Administracion_de_reservas_C2.php" class="menu_link menu_link--inside">Reservas
                            Completadas</a>
                    </li>
                    <li class="menu_inside">
                        <a href="../ProductosR.php" class="menu_link menu_link--inside">Productos más Reservados</a>
                    </li>
                    <li class="menu_inside">
                        <a href="../OfertasR.php" class="menu_link menu_link--inside">Ofertas más Reservadas</a>
                    </li>
                    <li class="menu_inside">
                        <a href="Respaldo.php" class="menu_link menu_link--inside">Respaldar Base de Datos</a>
                    </li>
                </ul>

            </li>

            <li class="menu_item">
                <a href="../Ayuda.php" class="menu_link">Ayuda</a>
            </li>

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

            <li class="menu_item menu_item--show">
                <a href="#" class="menu_link"><img src="assets\bell_fill.svg" class="menu_img"> &nbsp;<?php
                                        if($totalcantidad == 0){

                                        }
                                        else{
                                        echo $totalcantidad;
                                        } ?></a>

                <ul class="menu_nesting_noti">
                    <li class="menu_inside">
                        <a style="color: #fff;" class="menu_link menu_link--inside"
                            href="../Comprovacion_Contactanos.php">
                            Tienes:
                            <?php 
								echo $Cantidad20;
							?>
                            Mensajes de Contáctanos Nuevos
                        </a>
                    </li>
                    <li class="menu_inside">
                        <a style="color: #fff;" class="menu_link menu_link--inside"
                            href="../Administracion_de_reservas.php">
                            Tienes:
                            <?php 
								echo $Cantidad21;
							?>
                            Reservas Nuevas
                        </a>

                    </li>
                    <li class="menu_inside">
                        <a style="color: #fff;" class="menu_link menu_link--inside" href="../Curriculum2.php">
                            Tienes:
                            <?php 
								echo $Cantidad22;
							?>
                            Currículos Nuevos
                        </a>

                    </li>
                </ul>

            </li>

            <li class="menu_item">
                <a href="../Editar_U.php?id=<?php echo $user['id']?>" class="menu_link"><img
                        src="assets\person_circle.svg" class="menu_img"></a>
            </li>

            <?php
                $conne = mysqli_connect("localhost","root","","bd"); 
                $user1=$user['id'];
                $sql25= "SELECT * FROM pedido_cp Where ID=$user1 and estado='En espera' ";
                $query25 = mysqli_query($conne, $sql25);
                $num_rows = $query25->num_rows;

            ?>

            <li class="menu_item">
                <a href="../Reservas_U.php?id=<?php echo $user['id']?>" class="menu_link"><img src="assets\bag-fill.svg"
                        class="menu_img">&nbsp;<?php 
                        if($num_rows == 0){

                        }
                        else{
                        echo $num_rows;
                        } ?>

                </a>
            </li>

            <li class="menu_item">
                <a href="../CerrarSesion.php" class="menu_link">Cerrar Sesión</a>
            </li>

        </ul>

        <div class="menu_hamburguer">
            <img src="assets/menu.svg" class="menu_img">
        </div>

    </section>

</nav>