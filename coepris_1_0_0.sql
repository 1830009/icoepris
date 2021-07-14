-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-07-2021 a las 01:55:33
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `coepris`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activos`
--

CREATE TABLE `activos` (
  `id_activos` int(11) NOT NULL,
  `n_serie` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `cantidad` double NOT NULL,
  `unidad` varchar(50) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivo`
--

CREATE TABLE `archivo` (
  `id_archivo` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `observacion` varchar(300) DEFAULT NULL,
  `aclaracion` int(11) NOT NULL DEFAULT 0,
  `checklist` int(11) DEFAULT 0,
  `coordinacion` varchar(50) NOT NULL DEFAULT 'TODAS',
  `categoria` varchar(50) NOT NULL DEFAULT 'DOCUMENTO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `archivo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `checklist`
--

CREATE TABLE `checklist` (
  `id_check` int(11) NOT NULL,
  `boleta` varchar(35) NOT NULL,
  `cotejo` varchar(35) NOT NULL,
  `sistema` varchar(35) NOT NULL,
  `archivado` varchar(35) NOT NULL,
  `disco` varchar(35) NOT NULL,
  `folio` varchar(35) NOT NULL,
  `relacionado` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `checklist`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donacion`
--

CREATE TABLE `donacion` (
  `id_donacion` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `cantidad` double NOT NULL,
  `tabla` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `donacion`
--

INSERT INTO `donacion` (`id_donacion`, `codigo`, `cantidad`, `tabla`) VALUES
(1, '5', 3, 'papeleria'),
(2, '1', 9, 'papeleria'),
(7, '2', 1, 'papeleria'),
(8, '3', 1, 'papeleria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido_pat` varchar(50) NOT NULL,
  `apellido_mat` varchar(50) NOT NULL,
  `rfc` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `nombre`, `apellido_pat`, `apellido_mat`, `rfc`, `email`, `telefono`) VALUES
(1, 'root', 'root', 'root', 'rooot', 'root@root.com', '1111111111'),
(5, 'Miguel', 'Puente', 'Carrizal', 'RFC', 'miguelpuente@hotmail.com', '8312039283');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fecha_entrada`
--

CREATE TABLE `fecha_entrada` (
  `id_entrada` int(11) NOT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cantidad` int(11) NOT NULL,
  `tabla` varchar(50) NOT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `id_empleado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fecha_salida`
--

CREATE TABLE `fecha_salida` (
  `id_salida` int(11) NOT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cantidad` int(11) NOT NULL,
  `tabla` varchar(50) NOT NULL,
  `empleado` varchar(100) NOT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `id_empleado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `fecha_salida`
--

INSERT INTO `fecha_salida` (`id_salida`, `fecha_hora`, `cantidad`, `tabla`, `empleado`, `id_producto`, `id_empleado`) VALUES
(9, '2021-07-14 23:44:32', 1, 'limpieza', '', 3, 5),
(10, '2021-07-14 23:45:57', 1, 'limpieza', '', 3, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formato`
--

CREATE TABLE `formato` (
  `id_formato` int(11) NOT NULL,
  `logo_header` varchar(200) NOT NULL,
  `logo_footer` varchar(200) NOT NULL,
  `color` varchar(20) NOT NULL,
  `autorizo` varchar(200) NOT NULL,
  `vobo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `formato`
--

INSERT INTO `formato` (`id_formato`, `logo_header`, `logo_footer`, `color`, `autorizo`, `vobo`) VALUES
(0, 'img/logo-coepris.png', 'img/coepris.png', '0,100,167', 'Lic. Miguel Puente', 'Lic. Ernesto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `in_estado`
--

CREATE TABLE `in_estado` (
  `id_entrada` int(11) NOT NULL,
  `folio` varchar(20) NOT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad_solicitada` int(11) NOT NULL,
  `cant_surtida` int(11) NOT NULL,
  `cant_recibida` int(11) NOT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  `observacion` varchar(255) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `in_federal`
--

CREATE TABLE `in_federal` (
  `id_entrada` int(11) NOT NULL,
  `folio` varchar(20) NOT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad_solicitada` int(11) NOT NULL,
  `cant_surtida` int(11) NOT NULL,
  `cant_recibida` int(11) NOT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  `observacion` varchar(255) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `in_limpieza`
--

CREATE TABLE `in_limpieza` (
  `id_entrada` int(11) NOT NULL,
  `folio` varchar(20) NOT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad_solicitada` int(11) NOT NULL,
  `cant_surtida` int(11) NOT NULL,
  `cant_recibida` int(11) NOT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  `observacion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `in_limpieza`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `in_papeleria`
--

CREATE TABLE `in_papeleria` (
  `id_entrada` int(11) NOT NULL,
  `folio` varchar(20) NOT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad_solicitada` int(11) NOT NULL,
  `cant_surtida` int(11) NOT NULL,
  `cant_recibida` int(11) NOT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  `observacion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `in_papeleria`
--

INSERT INTO `in_papeleria` (`id_entrada`, `folio`, `id_producto`, `cantidad_solicitada`, `cant_surtida`, `cant_recibida`, `id_empleado`, `observacion`) VALUES
(39, '43132', 61, 4, 4, 4, 5, ''),
(40, '43132', 62, 6, 6, 6, 5, ''),
(41, '43132', 63, 5, 5, 5, 5, ''),
(42, '43132', 64, 5, 5, 5, 5, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `limpieza`
--

CREATE TABLE `limpieza` (
  `id_limpieza` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `cantidad` double NOT NULL,
  `unidad` varchar(50) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `limpieza`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `id_empleado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id_login`, `usuario`, `pass`, `tipo`, `id_empleado`) VALUES
(1, 'root-coepris_vic', '$2y$10$YtZLc5GQRU09Uu9eKzzC0.IeIZ7BL6CiEHW3kNZIMCkbM1BmXEJ9a', 'root', 1),
(6, 'miguel_admin', '$2y$10$9XqX4x1zHy2s5gDJ4g3u5e2GBzSrDu7BNvHc/sZ5mFxxwkG9pFi1i', 'admin', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `papeleria`
--

CREATE TABLE `papeleria` (
  `id_papeleria` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `cantidad` double NOT NULL,
  `unidad` varchar(50) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `papeleria`
--

INSERT INTO `papeleria` (`id_papeleria`, `codigo`, `nombre`, `cantidad`, `unidad`, `marca`, `color`) VALUES
(6, '100005765', 'PAPEL BOND T/CARTA DE 500H.', 0, 'PAQ', '', ''),
(7, '100005771', 'PAPEL BOND T/OFICIO DE 500H.', 0, 'PAQ', '', ''),
(8, '100004657', 'LAPIZ ADHESIVO 42GRS.', 0, 'PZA', ' ', ''),
(9, '100001986', 'SUJETA DOCUMENTOS 32MM C/12 PZAS', 0, 'CJ', '', ''),
(11, '100001986_1', 'SUJETA DOCUMENTOS 50MM C/12 PZAS', 0, 'PZA', ' ', ''),
(12, '100005862', 'TIJERAS DE ACERO INOXIDABLE 17.8CM', 0, 'PZA', '', ''),
(13, 'SN-1', 'MEMORIA 16 GB DRIVER UV220', 0, 'PZA', '', ''),
(14, '100000127', 'LAPICERO', 0, 'PZA', '', ''),
(15, '100002688', 'CORRECTOR DE CINTA DE 8 X 42MM', 0, 'PZA', '', ''),
(16, '100005680', 'GOMA DE MIGAJON M-20 C/20 PZA', 0, 'CJ', '', ''),
(17, '100005640', 'ENGRAPADORA TIRA COMPLETA', 0, 'PZA', '', ''),
(18, '100005766', 'PAPEL BOND T/CARTA ', 0, 'PZA', '', ''),
(19, '100000016', 'COJIN PARA CELLO ', 0, 'PZA', '', ''),
(20, '100005670', 'FOLDER T/CARTA CON 100 PZA', 0, 'PAQ', '', ''),
(23, '100005809', 'REGISTRADORES T/C', 0, 'PZA', '', 'VERDE'),
(24, '100005807', 'PUNTILLAS 5MM 10TUBOS 12C/U', 0, 'CJ', '', ''),
(25, '100005823', 'SACAPUNTAS MANUAL', 0, 'PZA', '', ''),
(26, '100004858', 'NOTAS ADHERIBLESCON 400HJS 78 X 76MM', 0, 'PAQ', ' ', ''),
(27, '100005693', 'LAPIZ DE MADERA N2 CON 72P MAS 6 CHARPIN', 0, 'CJ', '', ''),
(28, '100005679', 'GOMA DE MIGAJON M-20', 0, 'PZA', '', ''),
(29, '100000136', 'PAPEL OPALINA PAQ 100HJAS', 0, 'PAQ', '', ''),
(30, '100000121', 'TINTA PARA SELLO', 0, 'PZA', '', ''),
(31, '100005617', 'CUADERNO MEDIDA CARTA DE 100HJS', 0, 'PZA', '', ''),
(32, '100000143', 'CINTA CANELA DE 48 X 50MTS', 0, 'PZA', '', ''),
(33, '100005543', 'CERA CUENTA FACIL 14GRS', 0, 'PZA', '', ''),
(34, '100005551', 'CHAROLA FR 3 NIVELES TAMAÑO OFICIO', 0, 'PZA', '', ''),
(35, '100005692', 'LAPIZ DE MADERA PAQ 12PZAS', 0, 'PAQ', '', ''),
(36, '100005498', 'BANDERITAS AUTOADHERIBLES 3M 683-5CF', 0, 'PAQ', '', ''),
(37, '10000051', 'MARCADORES FINO PERMANENTE C/N', 0, 'PZA', '', ''),
(38, '100005513', 'CAJA PARA ARCHIVO CARTON TAMAÑO O.', 0, 'PZA', '', ''),
(39, '100000111', 'PAPEL KRAFT DE 125CM ANCHO 90GRS.', 0, 'PZA', '', ''),
(40, 'SN_10', 'ESTRASA (ROLLO)', 0, 'PZA', '', ''),
(41, '100005685', 'LAPIZ DE MADERA BICOLOR ', 0, 'PZA', '', 'BICOLOR'),
(43, '100000075', 'CALCULADORA DE 12 DIGITOS', 0, 'PZA', '', ''),
(44, '100005525', 'CARTAPACIO TAMAÑO CARTA A/D DE 3\"', 0, 'PZA', '', ''),
(45, '100005524', 'CARTAPACIO TAMAÑO CARTA A/D DE 2\"', 0, 'PZA', '', ''),
(47, '100005527', 'CARTAPACIO TAMAÑO CARTA A/D DE 5\"', 0, 'PZA', '', ''),
(48, '100005561', 'CINTA ADHESIVA T/24ML X 65 TRANSPARENTE', 0, 'PZA', '', ''),
(49, '100008134', 'CINTA MASKING 2\" 48MM X 50MTS', 0, 'PZA', '', ''),
(50, '100000020', 'DESGRAPADORA', 0, 'PZA', '', ''),
(51, '100000022', 'GRAPA', 0, 'CJ', '', ''),
(52, '100005698', 'LIGA AGUILA N18 C/100GMS', 0, 'CJ', '', ''),
(53, '100011076', 'MARCADOR P/PINTADOR C/4', 0, 'PAQ', '', ''),
(54, '100005707', 'MARCA TEXTOS GRUESO', 0, 'PZA', '', 'AMARILLO'),
(55, '100005707_1', 'MARCA TEXTOS GRUESO', 0, 'PZA', '', 'VERDE'),
(56, '100005504', 'BOLIGRAFO P/FINO DIAMANTE ', 0, 'CJ', '', 'AZUL'),
(57, '100005504_1', 'BOLIGRAFO P/FINO DIAMANTE ', 0, 'CJ', '', 'NEGRO'),
(58, '100010599', 'PLUMA PUNTO MEDIANO ', 0, 'PZA', '', 'AZUL'),
(59, '100004659', 'SEPARADOR 2 DIVISIONES ', 0, 'PAQ', '', ''),
(60, '100000038', 'TABLA REGISTRADORA C/CLIP SUJETADOR ', 0, 'PZA', '', ''),
(61, '100017058', 'TONER HP 202A CF500A ', 0, 'PZA', 'HP', 'NEGRO'),
(62, '100017059', 'TONER HP 202A CF501A', 0, 'PZA', 'HP', 'CYAN'),
(63, '100017060', 'TONER HP 202A CF502A ', 0, 'PZA', 'HP', 'AMARILLO'),
(64, '100017061', 'TONER HP 202A CF503A ', 0, 'PZA', 'HP', 'MAGENTA ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto_federal`
--

CREATE TABLE `proyecto_federal` (
  `id_federal` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `cantidad` double NOT NULL,
  `unidad` varchar(50) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proyecto_federal`
--

INSERT INTO `proyecto_federal` (`id_federal`, `codigo`, `nombre`, `cantidad`, `unidad`, `marca`, `color`) VALUES
(1, '100018754', 'PASTILLA DPD PCLORO', 0, 'PZA', '', ''),
(2, 'D999,999,9472.00', 'FRASCO BOCA ANCHA 1000 ML', 0, 'PZA', '', ''),
(3, '100006278', 'HIELERA DE UNICEL DE 19.7 LTS', 0, 'PZA', '', ''),
(4, '100000302', 'GEL ANTIBACTERIAL 60 ML', 0, 'PZA', '', ''),
(5, 'D999,999,8927.00', 'COMPARADORES COLORIMETRICO', 0, 'PZA', '', ''),
(6, 'D999,999,8929.00', 'FRASCO COLOIDAL DE 30 ML', 0, 'PZA', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recurso_estado`
--

CREATE TABLE `recurso_estado` (
  `id_estado` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `cantidad` double NOT NULL,
  `unidad` varchar(50) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `recurso_estado`
--

INSERT INTO `recurso_estado` (`id_estado`, `codigo`, `nombre`, `cantidad`, `unidad`, `marca`, `color`) VALUES
(1, 'M999.999.9469.00', 'VACUNA ANTIMARILICA', 0, 'DOSIS', ' ', ' '),
(2, 'SN-1', 'VACUNA CONTRA LA FIEBRE AMARILLA', 1, 'PAQ', ' ', ' '),
(3, 'D999.999.8850.00', 'CALDO SOYA TRIPTICASEINA 450GR', 0, 'PZA', '', ''),
(4, 'D999.999.8869.00', 'CALDO EC DE 500GR', 0, 'PZA', '', ''),
(5, 'D999.999.8894.00', 'CALDO RAPPAPORT VASILIADIS 500GR', 0, 'PZA', '', ''),
(6, '100014936', 'ESTANDAR DE CONDUCTIVIDAD', 0, 'PAQ', '', ''),
(8, 'D999.999.8938.00', 'PLASMA DE CONEJO FRESCO', 0, 'PZA', '', ''),
(9, 'D999.999.8882.00', 'CAJA PETRI DES S/DIVISION 100 X 15MM ', 0, 'CJ', '', ''),
(10, 'D999.999.9472.00', 'FRASCO BOCA ANCHA 1LT', 0, 'PZA', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vale_entrada`
--

CREATE TABLE `vale_entrada` (
  `folio` varchar(20) NOT NULL,
  `fecha` date NOT NULL,
  `tabla` varchar(50) NOT NULL,
  `cargo` varchar(255) NOT NULL,
  `partida` varchar(255) NOT NULL,
  `programa` varchar(255) NOT NULL,
  `pedido` varchar(30) NOT NULL,
  `proveedor` varchar(255) NOT NULL,
  `fondo` varchar(255) NOT NULL,
  `factura` varchar(20) NOT NULL,
  `entrada` varchar(40) NOT NULL,
  `solicitado` varchar(255) NOT NULL,
  `director` varchar(255) NOT NULL,
  `autorizado` varchar(255) NOT NULL,
  `tipo` varchar(50) NOT NULL DEFAULT 'vale',
  `estado` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vale_entrada`
--

INSERT INTO `vale_entrada` (`folio`, `fecha`, `tabla`, `cargo`, `partida`, `programa`, `pedido`, `proveedor`, `fondo`, `factura`, `entrada`, `solicitado`, `director`, `autorizado`, `tipo`, `estado`) VALUES

('43132', '2020-06-23', 'papeleria', 'OFICINA CENTRAL ', 'ROBERTO DE LA FUENTE RETA ', 'COEPRIS', 'ROBERTO DE LA FUENTE RETA ', 'ROBERTO DE LA FUENTE RETA ', 'FASSA 2020', '465612', '107/2020', 'CP. GERARDO OSORNIO IMPERIAL', 'LIC. LAURA RAFAELA CABRERA LOZANO ', 'DR. OSCAR VILLA GARZA', 'vale', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activos`
--
ALTER TABLE `activos`
  ADD PRIMARY KEY (`id_activos`),
  ADD UNIQUE KEY `n_serie` (`n_serie`);

--
-- Indices de la tabla `archivo`
--
ALTER TABLE `archivo`
  ADD PRIMARY KEY (`id_archivo`,`aclaracion`),
  ADD KEY `checklist` (`checklist`);

--
-- Indices de la tabla `checklist`
--
ALTER TABLE `checklist`
  ADD PRIMARY KEY (`id_check`);

--
-- Indices de la tabla `donacion`
--
ALTER TABLE `donacion`
  ADD PRIMARY KEY (`id_donacion`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_empleado`),
  ADD UNIQUE KEY `rfc` (`rfc`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `fecha_entrada`
--
ALTER TABLE `fecha_entrada`
  ADD PRIMARY KEY (`id_entrada`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- Indices de la tabla `fecha_salida`
--
ALTER TABLE `fecha_salida`
  ADD PRIMARY KEY (`id_salida`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- Indices de la tabla `in_estado`
--
ALTER TABLE `in_estado`
  ADD PRIMARY KEY (`id_entrada`),
  ADD KEY `id_empleado` (`id_empleado`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `in_federal`
--
ALTER TABLE `in_federal`
  ADD PRIMARY KEY (`id_entrada`),
  ADD KEY `id_empleado` (`id_empleado`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `in_limpieza`
--
ALTER TABLE `in_limpieza`
  ADD PRIMARY KEY (`id_entrada`),
  ADD KEY `id_empleado` (`id_empleado`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `in_papeleria`
--
ALTER TABLE `in_papeleria`
  ADD PRIMARY KEY (`id_entrada`),
  ADD KEY `id_empleado` (`id_empleado`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `limpieza`
--
ALTER TABLE `limpieza`
  ADD PRIMARY KEY (`id_limpieza`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- Indices de la tabla `papeleria`
--
ALTER TABLE `papeleria`
  ADD PRIMARY KEY (`id_papeleria`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indices de la tabla `proyecto_federal`
--
ALTER TABLE `proyecto_federal`
  ADD PRIMARY KEY (`id_federal`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indices de la tabla `recurso_estado`
--
ALTER TABLE `recurso_estado`
  ADD PRIMARY KEY (`id_estado`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indices de la tabla `vale_entrada`
--
ALTER TABLE `vale_entrada`
  ADD PRIMARY KEY (`folio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `activos`
--
ALTER TABLE `activos`
  MODIFY `id_activos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `archivo`
--
ALTER TABLE `archivo`
  MODIFY `id_archivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `checklist`
--
ALTER TABLE `checklist`
  MODIFY `id_check` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `donacion`
--
ALTER TABLE `donacion`
  MODIFY `id_donacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `fecha_entrada`
--
ALTER TABLE `fecha_entrada`
  MODIFY `id_entrada` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fecha_salida`
--
ALTER TABLE `fecha_salida`
  MODIFY `id_salida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `in_estado`
--
ALTER TABLE `in_estado`
  MODIFY `id_entrada` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `in_federal`
--
ALTER TABLE `in_federal`
  MODIFY `id_entrada` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `in_limpieza`
--
ALTER TABLE `in_limpieza`
  MODIFY `id_entrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `in_papeleria`
--
ALTER TABLE `in_papeleria`
  MODIFY `id_entrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `limpieza`
--
ALTER TABLE `limpieza`
  MODIFY `id_limpieza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `papeleria`
--
ALTER TABLE `papeleria`
  MODIFY `id_papeleria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `proyecto_federal`
--
ALTER TABLE `proyecto_federal`
  MODIFY `id_federal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `recurso_estado`
--
ALTER TABLE `recurso_estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `archivo`
--
ALTER TABLE `archivo`
  ADD CONSTRAINT `archivo_ibfk_1` FOREIGN KEY (`checklist`) REFERENCES `checklist` (`id_check`);

--
-- Filtros para la tabla `fecha_entrada`
--
ALTER TABLE `fecha_entrada`
  ADD CONSTRAINT `fecha_entrada_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`);

--
-- Filtros para la tabla `fecha_salida`
--
ALTER TABLE `fecha_salida`
  ADD CONSTRAINT `fecha_salida_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`);

--
-- Filtros para la tabla `in_estado`
--
ALTER TABLE `in_estado`
  ADD CONSTRAINT `in_estado_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`),
  ADD CONSTRAINT `in_estado_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `recurso_estado` (`id_estado`);

--
-- Filtros para la tabla `in_federal`
--
ALTER TABLE `in_federal`
  ADD CONSTRAINT `in_federal_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`),
  ADD CONSTRAINT `in_federal_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `proyecto_federal` (`id_federal`);

--
-- Filtros para la tabla `in_limpieza`
--
ALTER TABLE `in_limpieza`
  ADD CONSTRAINT `in_limpieza_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`),
  ADD CONSTRAINT `in_limpieza_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `limpieza` (`id_limpieza`);

--
-- Filtros para la tabla `in_papeleria`
--
ALTER TABLE `in_papeleria`
  ADD CONSTRAINT `in_papeleria_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`),
  ADD CONSTRAINT `in_papeleria_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `papeleria` (`id_papeleria`);

--
-- Filtros para la tabla `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
