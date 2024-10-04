-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-09-2024 a las 16:56:12
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrusel`
--

CREATE TABLE `carrusel` (
  `ID_Carrusel` int(200) NOT NULL,
  `Imagen_Carrusel` longtext NOT NULL,
  `Habilitado` int(11) NOT NULL,
  `Categoria_P_ID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrusel`
--

INSERT INTO `carrusel` (`ID_Carrusel`, `Imagen_Carrusel`, `Habilitado`, `Categoria_P_ID`) VALUES
(1, '75916022.jpg', 0, 0),
(2, '7590011105106.jpg', 0, 17),
(3, '7590011890910.png', 0, 17),
(4, '7590006002588.jpg', 0, 19),
(5, '719503008023.jpg', 0, 18),
(6, '75919191.jpg', 0, 18),
(7, '75971403.jpg', 0, 18),
(8, '75923815.jpg', 0, 19),
(9, '7591082000208.jpg', 0, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_p`
--

CREATE TABLE `categoria_p` (
  `Categoria_P_ID` int(50) NOT NULL,
  `Categoria` varchar(200) NOT NULL,
  `Imagen_P` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria_p`
--

INSERT INTO `categoria_p` (`Categoria_P_ID`, `Categoria`, `Imagen_P`) VALUES
(23, 'ConfiterÃ­a', 'Confiteria-3.jpeg'),
(24, 'Limpieza', 'Limpieza-1.jpg'),
(25, 'BisuterÃ­a', 'bisuteria-2.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactanos`
--

CREATE TABLE `contactanos` (
  `IDC` int(11) NOT NULL,
  `Telefono` varchar(200) NOT NULL,
  `Asunto` varchar(200) NOT NULL,
  `Mensaje` varchar(200) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta_bancaria`
--

CREATE TABLE `cuenta_bancaria` (
  `ID_Cuenta_Bancaria` int(11) NOT NULL,
  `Nombre_CB` varchar(200) NOT NULL,
  `Descripcion_CB` varchar(200) NOT NULL,
  `Imagen_CB` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cuenta_bancaria`
--

INSERT INTO `cuenta_bancaria` (`ID_Cuenta_Bancaria`, `Nombre_CB`, `Descripcion_CB`, `Imagen_CB`) VALUES
(6, 'Venezuela', 'Numero=042413123', '75900441.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleo`
--

CREATE TABLE `empleo` (
  `IDE` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `fecha` date NOT NULL,
  `archivo` longtext NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleo`
--

INSERT INTO `empleo` (`IDE`, `nombre`, `fecha`, `archivo`, `ID`) VALUES
(14, 'prueba', '2024-05-08', 'Curriculo.pdf', 1),
(15, 'prueba', '2024-05-11', 'Curriculo.pdf', 1),
(16, 'prueba', '2024-05-14', 'Curriculo.pdf', 1),
(18, 'prueba', '2024-05-14', 'Curriculo.pdf', 1),
(19, 'prueba', '2024-05-14', 'Curriculo.pdf', 1),
(20, 'curriculo2', '2024-05-22', 'Curriculo.pdf', 1),
(21, 'prueba1', '2024-05-27', 'Curriculo.pdf', 1),
(22, 'curriculum ismael', '2024-06-07', 'preguntas al usuario.pdf', 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_de_inicio_de_s`
--

CREATE TABLE `historial_de_inicio_de_s` (
  `ID_S` int(11) NOT NULL,
  `Fecha_de_inicio_de_s` date NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historial_de_inicio_de_s`
--

INSERT INTO `historial_de_inicio_de_s` (`ID_S`, `Fecha_de_inicio_de_s`, `ID`) VALUES
(1, '2024-05-22', 1),
(2, '2024-05-22', 1),
(3, '2024-05-27', 1),
(4, '2024-05-27', 1),
(5, '2024-05-28', 1),
(6, '2024-05-28', 27),
(7, '2024-05-28', 1),
(8, '2024-05-28', 1),
(9, '2024-05-31', 1),
(10, '2024-05-31', 1),
(11, '2024-05-31', 1),
(12, '2024-06-02', 1),
(13, '2024-06-03', 1),
(14, '2024-06-03', 1),
(15, '2024-06-03', 1),
(16, '2024-06-07', 1),
(17, '2024-06-07', 1),
(18, '2024-06-07', 1),
(19, '2024-06-07', 24),
(20, '2024-06-07', 1),
(21, '2024-06-07', 1),
(22, '2024-06-07', 1),
(23, '2024-06-07', 30),
(24, '2024-06-07', 30),
(25, '2024-06-07', 1),
(26, '2024-06-07', 30),
(27, '2024-06-07', 1),
(28, '2024-06-07', 30),
(29, '2024-06-07', 1),
(30, '2024-06-08', 1),
(31, '2024-06-08', 1),
(32, '2024-06-08', 1),
(33, '2024-06-10', 1),
(34, '2024-06-10', 31),
(35, '2024-06-10', 31),
(36, '2024-06-10', 1),
(37, '2024-08-20', 24),
(38, '2024-08-20', 1),
(39, '2024-08-20', 24),
(40, '2024-08-20', 24),
(41, '2024-08-20', 1),
(42, '2024-08-20', 24),
(43, '2024-08-20', 24),
(44, '2024-08-20', 24),
(45, '2024-08-20', 24),
(46, '2024-08-21', 24),
(47, '2024-08-21', 24),
(48, '2024-08-21', 24),
(49, '2024-08-21', 24),
(50, '2024-08-21', 24),
(51, '2024-08-21', 24),
(52, '2024-08-21', 24),
(53, '2024-08-21', 24),
(54, '2024-08-21', 24),
(55, '2024-08-21', 1),
(56, '2024-08-21', 1),
(57, '2024-08-21', 24),
(58, '2024-08-21', 24),
(59, '2024-08-21', 24),
(60, '2024-08-22', 24),
(61, '2024-08-22', 24),
(62, '2024-08-22', 24),
(63, '2024-08-22', 24),
(64, '2024-08-22', 24),
(65, '2024-08-22', 24),
(66, '2024-08-22', 1),
(67, '2024-08-22', 24),
(68, '2024-08-22', 24),
(69, '2024-08-22', 24),
(70, '2024-08-26', 24),
(71, '2024-08-26', 24),
(72, '2024-08-26', 24),
(73, '2024-08-26', 24),
(74, '2024-08-26', 24),
(75, '2024-08-26', 24),
(76, '2024-08-26', 24),
(77, '2024-08-26', 24),
(78, '2024-08-26', 24),
(79, '2024-08-26', 24),
(80, '2024-08-26', 24),
(81, '2024-08-26', 24),
(82, '2024-08-26', 1),
(83, '2024-08-26', 24),
(84, '2024-08-26', 24),
(85, '2024-08-26', 24),
(86, '2024-08-26', 24),
(87, '2024-08-26', 24),
(88, '2024-08-28', 24),
(89, '2024-08-28', 24),
(90, '2024-08-28', 1),
(91, '2024-08-28', 1),
(92, '2024-08-28', 1),
(93, '2024-08-28', 1),
(94, '2024-08-28', 1),
(95, '2024-08-28', 24),
(96, '2024-08-28', 24),
(97, '2024-08-28', 1),
(98, '2024-08-28', 24),
(99, '2024-08-28', 1),
(100, '2024-08-28', 1),
(101, '2024-08-28', 24),
(102, '2024-08-28', 1),
(103, '2024-08-28', 24),
(104, '2024-08-28', 1),
(105, '2024-08-28', 1),
(106, '2024-08-28', 1),
(107, '2024-08-28', 1),
(108, '2024-08-28', 24),
(109, '2024-08-28', 1),
(110, '2024-08-28', 1),
(111, '2024-08-28', 1),
(112, '2024-08-28', 24),
(113, '2024-08-28', 1),
(114, '2024-08-28', 1),
(115, '2024-08-28', 24),
(116, '2024-08-28', 1),
(117, '2024-08-28', 1),
(118, '2024-08-30', 1),
(119, '2024-08-30', 26),
(120, '2024-08-30', 1),
(121, '2024-08-30', 1),
(122, '2024-08-30', 1),
(123, '2024-08-30', 26),
(124, '2024-08-30', 1),
(125, '2024-08-31', 1),
(126, '2024-09-01', 1),
(127, '2024-09-01', 1),
(128, '2024-09-01', 1),
(129, '2024-09-01', 1),
(130, '2024-09-02', 1),
(131, '2024-09-02', 1),
(132, '2024-09-05', 1),
(133, '2024-09-05', 1),
(134, '2024-09-05', 1),
(135, '2024-09-14', 1),
(136, '2024-09-14', 26),
(137, '2024-09-16', 1),
(138, '2024-09-16', 26),
(139, '2024-09-16', 1),
(140, '2024-09-30', 1),
(141, '2024-09-30', 1),
(142, '2024-09-30', 1),
(143, '2024-09-30', 26),
(144, '2024-09-30', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `ID_Marca` int(11) NOT NULL,
  `Nombre_M` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`ID_Marca`, `Nombre_M`) VALUES
(1, 'Otra'),
(3, 'Polar'),
(4, 'Nesstle');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `ID_No` int(11) NOT NULL,
  `Nombre_No` varchar(200) NOT NULL,
  `Cantidad_No` int(200) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`ID_No`, `Nombre_No`, `Cantidad_No`, `ID`) VALUES
(1, 'Contáctanos', 0, 1),
(2, 'Reservas', 0, 1),
(3, 'Curriculos', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta`
--

CREATE TABLE `oferta` (
  `ID_Oferta` varchar(200) NOT NULL,
  `Nombre_Oferta` varchar(200) NOT NULL,
  `Imagen_de_Oferta` longtext NOT NULL,
  `Precio_Oferta` varchar(200) NOT NULL,
  `CantidadO_R` varchar(200) NOT NULL,
  `Cantidad_O` varchar(200) NOT NULL,
  `Descripcion_O` varchar(200) NOT NULL,
  `Fecha_Inicio_O` date NOT NULL,
  `Fecha_Fin_O` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `oferta`
--

INSERT INTO `oferta` (`ID_Oferta`, `Nombre_Oferta`, `Imagen_de_Oferta`, `Precio_Oferta`, `CantidadO_R`, `Cantidad_O`, `Descripcion_O`, `Fecha_Inicio_O`, `Fecha_Fin_O`) VALUES
('102021', 'Combo1', '75916022.jpg', '3.5', '0', '50', 'Oferta mixta', '2024-09-30', '2025-01-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta_cp`
--

CREATE TABLE `oferta_cp` (
  `ID_OP` int(11) NOT NULL,
  `Cantidad_Pedido_O` varchar(200) NOT NULL,
  `Precio_O` varchar(200) NOT NULL,
  `Precio_O_B` varchar(200) NOT NULL,
  `Total_precio_o` varchar(200) NOT NULL,
  `Total_precio_bs_o` varchar(200) NOT NULL,
  `ID_Oferta` varchar(200) NOT NULL,
  `Referencia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta_producto`
--

CREATE TABLE `oferta_producto` (
  `ID_PO` int(11) NOT NULL,
  `Cantidad_PO` varchar(200) NOT NULL,
  `ID_P` varchar(200) NOT NULL,
  `ID_Oferta` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `oferta_producto`
--

INSERT INTO `oferta_producto` (`ID_PO`, `Cantidad_PO`, `ID_P`, `ID_Oferta`) VALUES
(48, '3', '12312312', 'o1'),
(53, '1', '723B1', '102021'),
(54, '2', 'G212', '102021');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_cp`
--

CREATE TABLE `pedido_cp` (
  `Referencia` varchar(50) NOT NULL,
  `estado` varchar(200) NOT NULL,
  `total` varchar(200) NOT NULL,
  `total2` varchar(200) NOT NULL,
  `Fecha_R` date NOT NULL,
  `Fecha_RL` date NOT NULL,
  `Comprobante_cp` varchar(200) DEFAULT NULL,
  `ID` int(11) NOT NULL,
  `Tipo_pedido_ID` int(1) NOT NULL,
  `ID_Sucursal` int(11) DEFAULT NULL,
  `ID_Cuenta_Bancaria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedido_cp`
--

INSERT INTO `pedido_cp` (`Referencia`, `estado`, `total`, `total2`, `Fecha_R`, `Fecha_RL`, `Comprobante_cp`, `ID`, `Tipo_pedido_ID`, `ID_Sucursal`, `ID_Cuenta_Bancaria`) VALUES
('566152', 'Completada', '4', '150', '2024-09-30', '2000-01-01', '', 1, 2, 1, 6),
('6064838', 'En espera', '5.5', '206.25', '2024-09-30', '2024-10-02', NULL, 1, 1, 0, NULL),
('862286', 'Completada', '4', '150', '2024-09-14', '2000-01-01', '023212', 1, 2, 1, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precio_b`
--

CREATE TABLE `precio_b` (
  `ID_PB` int(50) NOT NULL,
  `Precio_B` varchar(200) NOT NULL,
  `Fecha_de_modificacion` date NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Volcado de datos para la tabla `precio_b`
--

INSERT INTO `precio_b` (`ID_PB`, `Precio_B`, `Fecha_de_modificacion`, `ID`) VALUES
(1, '30', '2024-05-06', 1),
(2, '31', '2024-05-06', 1),
(3, '31', '2024-05-06', 1),
(4, '33', '2024-05-06', 1),
(5, '36', '2024-05-06', 1),
(6, '37', '2024-05-11', 1),
(7, '37.21', '2024-06-03', 1),
(8, '37.5', '2024-06-07', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `ID_P` varchar(200) NOT NULL,
  `NombreP` varchar(200) NOT NULL,
  `Precio` varchar(200) NOT NULL,
  `archivoBLOB` longtext NOT NULL,
  `Cantidad_R` varchar(200) NOT NULL,
  `Cantidad` varchar(200) NOT NULL,
  `Fecha_de_vencimiento_P` date DEFAULT NULL,
  `Descripcion_P` varchar(200) NOT NULL,
  `ID_Marca` int(11) NOT NULL,
  `Categoria_P_ID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ID_P`, `NombreP`, `Precio`, `archivoBLOB`, `Cantidad_R`, `Cantidad`, `Fecha_de_vencimiento_P`, `Descripcion_P`, `ID_Marca`, `Categoria_P_ID`) VALUES
('723B1', 'Compota', '1', '75916022.jpg', '2', '98', '2024-10-12', 'Compota pequeÃ±a de manzana', 1, 23),
('G212', 'Gelatina', '1.5', '7590006950018.jpg', '2', '95', '2025-01-24', 'Gelatina Golden de cereza', 1, 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_cp`
--

CREATE TABLE `producto_cp` (
  `ID_PP` int(11) NOT NULL,
  `Cantidad_Pedido` varchar(200) NOT NULL,
  `Precio_P` varchar(200) NOT NULL,
  `Precio_B` varchar(200) NOT NULL,
  `total_precio` varchar(200) NOT NULL,
  `total_precio_BS` varchar(200) NOT NULL,
  `ID_P` varchar(200) NOT NULL,
  `Referencia` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto_cp`
--

INSERT INTO `producto_cp` (`ID_PP`, `Cantidad_Pedido`, `Precio_P`, `Precio_B`, `total_precio`, `total_precio_BS`, `ID_P`, `Referencia`) VALUES
(3, '1', '3', '112.5', '3', '112.5', '129900AD', '862286'),
(4, '1', '1', '37.5', '1', '37.5', 'p1', '862286'),
(14, '3', '1.5', '56.25', '4.5', '168.75', 'G212', '6064838'),
(15, '1', '1', '37.5', '1', '37.5', '723B1', '6064838'),
(16, '2', '1.5', '56.25', '3', '112.5', 'G212', '566152'),
(17, '1', '1', '37.5', '1', '37.5', '723B1', '566152');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `ID_Sucursal` int(11) NOT NULL,
  `Nombre_Sucursal` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`ID_Sucursal`, `Nombre_Sucursal`) VALUES
(1, 'Super elite'),
(3, 'Hiper elite'),
(4, 'Mona lisa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pedido`
--

CREATE TABLE `tipo_pedido` (
  `Tipo_pedido_ID` int(1) NOT NULL,
  `Tipo_pedido` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_pedido`
--

INSERT INTO `tipo_pedido` (`Tipo_pedido_ID`, `Tipo_pedido`) VALUES
(1, 'Reserva'),
(2, 'Compra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `Tipo_ID` int(1) NOT NULL,
  `Tipo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`Tipo_ID`, `Tipo`) VALUES
(1, 'Usuario'),
(2, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(200) NOT NULL,
  `Apellido` varchar(200) NOT NULL,
  `Correo_Electronico` varchar(200) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contrasena` varchar(200) NOT NULL,
  `Reservas_Actuales` int(2) NOT NULL,
  `Tipo_ID` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`ID`, `Nombre`, `Apellido`, `Correo_Electronico`, `usuario`, `contrasena`, `Reservas_Actuales`, `Tipo_ID`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'admin', 'admin', 1, 1),
(23, 'isak', 'Rollam', 'elrm@gmail.com', 'isk', '123', 0, 1),
(24, 'YG', 'YG', 'YG@gmail.com', 'YG', '1234', 0, 1),
(26, 'Brallam', 'Brallam', 'elrosariobrallam@gmail.com', 'brallam', '1234', 0, 1),
(27, 'juan', 'milano', 'juandiego@gmail.com', 'milano', '1234', 0, 1),
(28, 'Jose', 'Jose', 'adas', 'Jose', 'Jose', 0, 1),
(29, 'asdb', 'asd', 'jabsd', 'Jose1', '1234', 0, 1),
(30, 'ismael', 'martínez', 'ismael@gmail.com', 'ismael', '1sm4el', 0, 1),
(31, 'Neko', 'Agro', 'neko@gmail.com', 'neko', '12345678', 0, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrusel`
--
ALTER TABLE `carrusel`
  ADD PRIMARY KEY (`ID_Carrusel`),
  ADD KEY `Categoria_P_ID` (`Categoria_P_ID`),
  ADD KEY `Categoria_P_ID_2` (`Categoria_P_ID`);

--
-- Indices de la tabla `categoria_p`
--
ALTER TABLE `categoria_p`
  ADD PRIMARY KEY (`Categoria_P_ID`);

--
-- Indices de la tabla `contactanos`
--
ALTER TABLE `contactanos`
  ADD PRIMARY KEY (`IDC`),
  ADD KEY `ID` (`ID`);

--
-- Indices de la tabla `cuenta_bancaria`
--
ALTER TABLE `cuenta_bancaria`
  ADD PRIMARY KEY (`ID_Cuenta_Bancaria`);

--
-- Indices de la tabla `empleo`
--
ALTER TABLE `empleo`
  ADD PRIMARY KEY (`IDE`),
  ADD KEY `ID` (`ID`);

--
-- Indices de la tabla `historial_de_inicio_de_s`
--
ALTER TABLE `historial_de_inicio_de_s`
  ADD PRIMARY KEY (`ID_S`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`ID_Marca`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`ID_No`),
  ADD KEY `ID` (`ID`);

--
-- Indices de la tabla `oferta`
--
ALTER TABLE `oferta`
  ADD PRIMARY KEY (`ID_Oferta`);

--
-- Indices de la tabla `oferta_cp`
--
ALTER TABLE `oferta_cp`
  ADD PRIMARY KEY (`ID_OP`),
  ADD KEY `ID_OP` (`ID_OP`);

--
-- Indices de la tabla `oferta_producto`
--
ALTER TABLE `oferta_producto`
  ADD PRIMARY KEY (`ID_PO`),
  ADD KEY `ID_Oferta` (`ID_Oferta`,`ID_P`);

--
-- Indices de la tabla `pedido_cp`
--
ALTER TABLE `pedido_cp`
  ADD PRIMARY KEY (`Referencia`),
  ADD KEY `ID` (`ID`),
  ADD KEY `Referencia` (`Referencia`),
  ADD KEY `Referencia_2` (`Referencia`),
  ADD KEY `Tipo_pedido_ID` (`Tipo_pedido_ID`);

--
-- Indices de la tabla `precio_b`
--
ALTER TABLE `precio_b`
  ADD PRIMARY KEY (`ID_PB`),
  ADD KEY `ID` (`ID`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ID_P`),
  ADD KEY `Categoria_P_ID` (`Categoria_P_ID`);

--
-- Indices de la tabla `producto_cp`
--
ALTER TABLE `producto_cp`
  ADD PRIMARY KEY (`ID_PP`),
  ADD KEY `Referencia` (`Referencia`),
  ADD KEY `ID_P` (`ID_P`,`Precio_B`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`ID_Sucursal`);

--
-- Indices de la tabla `tipo_pedido`
--
ALTER TABLE `tipo_pedido`
  ADD PRIMARY KEY (`Tipo_pedido_ID`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`Tipo_ID`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `Correo_Electronico` (`Correo_Electronico`),
  ADD KEY `Tipo_ID` (`Tipo_ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria_p`
--
ALTER TABLE `categoria_p`
  MODIFY `Categoria_P_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `contactanos`
--
ALTER TABLE `contactanos`
  MODIFY `IDC` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cuenta_bancaria`
--
ALTER TABLE `cuenta_bancaria`
  MODIFY `ID_Cuenta_Bancaria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `empleo`
--
ALTER TABLE `empleo`
  MODIFY `IDE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `historial_de_inicio_de_s`
--
ALTER TABLE `historial_de_inicio_de_s`
  MODIFY `ID_S` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `ID_Marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `oferta_cp`
--
ALTER TABLE `oferta_cp`
  MODIFY `ID_OP` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `oferta_producto`
--
ALTER TABLE `oferta_producto`
  MODIFY `ID_PO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `precio_b`
--
ALTER TABLE `precio_b`
  MODIFY `ID_PB` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `producto_cp`
--
ALTER TABLE `producto_cp`
  MODIFY `ID_PP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `ID_Sucursal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contactanos`
--
ALTER TABLE `contactanos`
  ADD CONSTRAINT `contactanos_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `users` (`ID`);

--
-- Filtros para la tabla `empleo`
--
ALTER TABLE `empleo`
  ADD CONSTRAINT `empleo_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `users` (`ID`);

--
-- Filtros para la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `notificaciones_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `users` (`ID`);

--
-- Filtros para la tabla `precio_b`
--
ALTER TABLE `precio_b`
  ADD CONSTRAINT `precio_b_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `users` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
