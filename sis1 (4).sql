-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-12-2023 a las 03:38:56
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sis1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(256) DEFAULT NULL,
  `condicion` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `nombre`, `descripcion`, `condicion`) VALUES
(3, 'Muebles escritorio', 'muebles para computadoras', 1),
(4, 'Mueble de cocina', 'Muebles de lujo', 1),
(5, 'Muble de cuarto', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cod_autorizacion`
--

CREATE TABLE `cod_autorizacion` (
  `id_codigo` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `codigo` varchar(100) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cod_autorizacion`
--

INSERT INTO `cod_autorizacion` (`id_codigo`, `nombre`, `codigo`, `fecha_inicio`, `fecha_fin`) VALUES
(1, '', '45919345788\nBTYYTUER806F67103F08FFGF1AD9', '2023-12-14', '2025-12-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `idcompra` int(11) NOT NULL,
  `idproveedor` int(11) NOT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `tipo_comprobante` varchar(20) NOT NULL,
  `serie_comprobante` varchar(7) DEFAULT NULL,
  `num_comprobante` varchar(10) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `impuesto` decimal(4,2) NOT NULL,
  `total_compra` decimal(11,2) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`idcompra`, `idproveedor`, `idusuario`, `tipo_comprobante`, `serie_comprobante`, `num_comprobante`, `fecha_hora`, `impuesto`, `total_compra`, `estado`) VALUES
(4, 4, 1, 'Factura', '0007', '00007', '2023-07-11 00:00:00', '13.00', '62.15', 'Aceptado'),
(5, 4, 1, 'Factura', '001', '000008', '2023-12-01 00:00:00', '13.00', '2.26', 'Aceptado'),
(6, 4, 1, 'Factura', '11114', '001455', '2023-12-15 00:00:00', '13.00', '4226.20', 'Aceptado'),
(7, 4, 1, 'Factura', '0001', '0002', '2023-12-17 00:00:00', '0.00', '218.00', 'Aceptado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comp_pago`
--

CREATE TABLE `comp_pago` (
  `id_comp_pago` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `serie_comprobante` varchar(3) NOT NULL,
  `num_comprobante` varchar(7) NOT NULL,
  `condicion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comp_pago`
--

INSERT INTO `comp_pago` (`id_comp_pago`, `nombre`, `serie_comprobante`, `num_comprobante`, `condicion`) VALUES
(3, 'Factura', '034', '9999998', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_negocio`
--

CREATE TABLE `datos_negocio` (
  `id_negocio` int(11) NOT NULL,
  `nombre` varchar(80) CHARACTER SET utf8 NOT NULL,
  `ndocumento` varchar(20) NOT NULL,
  `documento` int(11) NOT NULL,
  `direccion` varchar(100) CHARACTER SET utf8 NOT NULL,
  `telefono` int(20) NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `logo` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `pais` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `ciudad` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `nombre_impuesto` varchar(10) NOT NULL,
  `monto_impuesto` float(4,2) NOT NULL,
  `moneda` varchar(10) NOT NULL,
  `simbolo` varchar(10) NOT NULL,
  `condicion` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `datos_negocio`
--

INSERT INTO `datos_negocio` (`id_negocio`, `nombre`, `ndocumento`, `documento`, `direccion`, `telefono`, `email`, `logo`, `pais`, `ciudad`, `nombre_impuesto`, `monto_impuesto`, `moneda`, `simbolo`, `condicion`) VALUES
(2, 'CARPINTERIA J&amp;J', 'NIT', 2332112, 'calle nueva', 3717027, 'carpinteria@gmail.com', '1702156291.png', 'Bolivia', 'LA PAZ', 'IVA', 13.00, 'BOLIVIANOS', 'BS/.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `iddetalle_compra` int(11) NOT NULL,
  `idcompra` int(11) NOT NULL,
  `idmaterial` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_compra` decimal(11,2) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_compra`
--

INSERT INTO `detalle_compra` (`iddetalle_compra`, `idcompra`, `idmaterial`, `cantidad`, `precio_compra`, `estado`) VALUES
(4, 4, 4, 45, '1.00', 1),
(5, 4, 6, 10, '1.00', 1),
(6, 5, 4, 1, '1.00', 1),
(7, 5, 3, 1, '1.00', 1),
(8, 6, 3, 110, '34.00', 1),
(9, 7, 4, 2, '100.00', 1),
(10, 7, 3, 3, '6.00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `iddetalle_venta` int(11) NOT NULL,
  `idventa` int(11) NOT NULL,
  `idmueble` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_venta` decimal(11,2) NOT NULL,
  `descuento` decimal(11,2) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`iddetalle_venta`, `idventa`, `idmueble`, `cantidad`, `precio_venta`, `descuento`, `estado`) VALUES
(10, 11, 31, 13, '154.00', '0.00', 1),
(11, 12, 33, 2, '10.00', '0.00', 0),
(12, 12, 33, 1, '10.00', '0.00', 0),
(13, 13, 33, 2, '10.00', '0.00', 1),
(14, 13, 33, 1, '10.00', '0.00', 1),
(15, 14, 31, 3, '154.00', '0.00', 1),
(16, 15, 31, 2, '154.00', '0.00', 1),
(17, 16, 31, 5, '154.00', '20.00', 1),
(18, 17, 31, 1, '154.00', '10.00', 1),
(19, 18, 33, 2, '10.00', '0.00', 1),
(20, 18, 43, 1, '1450.00', '0.00', 1),
(21, 19, 43, 1, '1450.00', '0.00', 1),
(22, 20, 31, 1, '154.00', '0.00', 1),
(23, 21, 42, 3, '1700.00', '0.00', 1),
(24, 22, 33, 4, '10.00', '0.00', 1),
(25, 23, 33, 1, '10.00', '0.00', 1),
(26, 23, 42, 2, '1700.00', '0.00', 1),
(27, 24, 31, 1, '154.00', '0.00', 0),
(28, 25, 42, 2, '1700.00', '0.00', 1),
(29, 25, 44, 1, '1000.00', '0.00', 1);

--
-- Disparadores `detalle_venta`
--
DELIMITER $$
CREATE TRIGGER `StockVentas` AFTER INSERT ON `detalle_venta` FOR EACH ROW BEGIN
UPDATE mueble SET stock = stock - NEW.cantidad
WHERE mueble.idmueble = NEW.idmueble;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `VentaAnulada` AFTER UPDATE ON `detalle_venta` FOR EACH ROW BEGIN
UPDATE mueble SET stock=stock + NEW.cantidad
WHERE mueble.idmueble = NEW.idmueble;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE `material` (
  `idmaterial` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `material`
--

INSERT INTO `material` (`idmaterial`, `nombre`, `descripcion`, `estado`) VALUES
(3, 'Serrucho', 'pequeño', 1),
(4, 'Destornillador', 'punta estrella', 1),
(5, 'metal', 'Utilizado para estructuras de muebles, como patas de sillas y mesas. Puede ser resistente y moderno.', 1),
(6, 'Vidrio', 'Utilizado en mesas o gabinetes para dar un aspecto moderno y limpio. Puede ser templado para mayor r', 1),
(7, 'Acrílico', 'Un plástico transparente o translúcido que se utiliza para crear muebles modernos y elegantes, como ', 1),
(8, 'Bisagras', 'Elementos metálicos utilizados para unir y fortalecer las conexiones en los muebles, como bisagras, ', 1),
(9, 'Barniz de epoxi', 'Resina transparente que se aplica sobre superficies de madera para proporcionar un acabado duradero ', 1),
(10, 'Haya', 'Madera de grano fino y color claro, utilizada para fabricar muebles, especialmente sillas y mesas.', 1),
(11, 'Madera maciza', 'La madera maciza, como el roble, el pino y la haya, es un material clásico y duradero utilizado en u', 1),
(12, 'Tela', 'Telas como el algodón, lino y poliéster son populares para tapicería de sofás, sillas y cojines.', 1),
(13, 'Bambú', 'Es una opción sostenible para muebles de exterior y accesorios de decoración, conocido por su resist', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mueble`
--

CREATE TABLE `mueble` (
  `idmueble` int(11) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `codigo` varchar(50) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `descripcion` varchar(256) DEFAULT NULL,
  `precio_venta` decimal(11,2) NOT NULL,
  `imagen` varchar(50) DEFAULT NULL,
  `condicion` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mueble`
--

INSERT INTO `mueble` (`idmueble`, `idcategoria`, `codigo`, `nombre`, `stock`, `descripcion`, `precio_venta`, `imagen`, `condicion`) VALUES
(31, 3, '0003', 'Mueble de oficina', 2, 'Mueble de madera de arce', '154.00', '1702256029.jpg', 1),
(33, 3, '0007', 'Mesa de despacho', 0, 'Mueble de madera roble', '10.00', '1702301710.jpg', 1),
(42, 4, '0007', 'Muebles de cocina tipo isla', 0, 'Mueble echo con material de roble', '1700.00', '1702607712.jpg', 1),
(43, 4, '00014', 'Muebles de cocina tipo barra', 1, 'mueble grande', '1450.00', '1702607842.jpg', 1),
(44, 4, '00015', 'Muebles de cocina tipo alacena', 0, 'ninguno', '1000.00', '1702608115.jpg', 1),
(45, 4, '00016', 'Muebles de cocina rústicos', 2, 'uso de madera con lineas', '3000.00', '1702608375.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `idpermiso` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`idpermiso`, `nombre`) VALUES
(1, 'Escritorio'),
(2, 'Almacen'),
(3, 'Compras'),
(4, 'Ventas'),
(5, 'Acceso'),
(6, 'Consulta Compras'),
(7, 'Consulta Ventas'),
(8, 'Configuracion'),
(9, 'Materiales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idpersona` int(11) NOT NULL,
  `tipo_persona` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tipo_documento` varchar(20) DEFAULT NULL,
  `num_documento` varchar(20) DEFAULT NULL,
  `direccion` varchar(70) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idpersona`, `tipo_persona`, `nombre`, `tipo_documento`, `num_documento`, `direccion`, `telefono`, `email`) VALUES
(3, 'Cliente', 'juan', 'CEDULA', '145', 'peri', '76592009', 'demo@demo.com'),
(4, 'Proveedor', 'ROBERTO', 'RUC', '1478', 'qw', '748', 'demo@demo.com'),
(6, 'Cliente', 'juna', 'CEDULA', '00', '14', '11', 'demo@demo.com'),
(7, 'Cliente', 'jose perez', 'CEDULA', '1374587', 'plaza eguino', '748545', 'jose@gmail.com'),
(8, 'Cliente', 'Jairo Paton', 'CEDULA', '1478', 'Zona norte villa de la cruz', '54687', 'jairo@gmail.com'),
(9, 'Cliente', 'Milton Quispe', 'CEDULA', '9898598', 'El alto 16 de julio', '78584668', 'mil@gmail.com'),
(10, 'Cliente', 'luis', 'CEDULA', '4785469', 'villa fatima', '748519', 'luis@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tipo_documento` varchar(20) NOT NULL,
  `num_documento` varchar(20) NOT NULL,
  `direccion` varchar(70) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `cargo` varchar(20) DEFAULT NULL,
  `login` varchar(20) NOT NULL,
  `clave` varchar(64) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `condicion` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `tipo_documento`, `num_documento`, `direccion`, `telefono`, `email`, `cargo`, `login`, `clave`, `imagen`, `condicion`) VALUES
(1, 'jairo', 'CEDULA', '72154871', 'Calle', '547821', 'admin@gmail.com', 'Administrador', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '1702071810.jpg', 1),
(3, 'Juan', 'CEDULA', '13734453', 'Calle murillo', '76592009', 'juan@gmail.com', 'Administrador', 'juan', 'ed08c290d7e22f7bb324b15cbadce35b0b348564fd2d5f95752388d86d71bcca', '1701890564.jpg', 1),
(4, 'luis', 'CEDULA', '123', 'la', '123', 'demo@demo.com', 'Administrador', 'luis', 'c5ff177a86e82441f93e3772da700d5f6838157fa1bfdc0bb689d7f7e55e7aba', '', 1),
(5, 'pepe', 'CEDULA', '1234', 'peri', '3717027', 'demo@demo.com', 'EMPLEADO', 'empleado', '0baff97ff722b0be472c1ff5a1edabf7cefb089d0575794975c3007989327efa', '1702299305.png', 1),
(6, 'susan', 'DNI', '14587', '10456', '145', 'demo@demo.com', 'empleado', 'su', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '1702694296.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_permiso`
--

CREATE TABLE `usuario_permiso` (
  `idusuario_permiso` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idpermiso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario_permiso`
--

INSERT INTO `usuario_permiso` (`idusuario_permiso`, `idusuario`, `idpermiso`) VALUES
(17, 3, 1),
(18, 3, 2),
(19, 3, 3),
(20, 3, 4),
(21, 3, 5),
(22, 3, 6),
(23, 3, 7),
(24, 3, 8),
(25, 1, 1),
(26, 1, 2),
(27, 1, 3),
(28, 1, 4),
(29, 1, 5),
(30, 1, 6),
(31, 1, 7),
(32, 1, 8),
(33, 4, 8),
(46, 6, 4),
(47, 5, 1),
(48, 5, 3),
(49, 5, 4),
(50, 5, 6),
(51, 5, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `idventa` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `tipo_comprobante` varchar(20) NOT NULL,
  `serie_comprobante` varchar(7) DEFAULT NULL,
  `num_comprobante` varchar(10) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `impuesto` decimal(4,2) DEFAULT NULL,
  `total_venta` decimal(11,2) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`idventa`, `idcliente`, `idusuario`, `tipo_comprobante`, `serie_comprobante`, `num_comprobante`, `fecha_hora`, `impuesto`, `total_venta`, `estado`) VALUES
(11, 3, 1, 'Factura', '034', '9999999', '2023-12-11 00:00:00', '13.00', '2262.26', 'Aceptado'),
(12, 3, 1, 'Factura', '035', '0000001', '2023-11-11 00:00:00', '0.00', '30.00', 'Anulado'),
(13, 3, 1, 'Factura', '035', '0000002', '2023-11-11 00:00:00', '0.00', '30.00', 'Aceptado'),
(14, 6, 1, 'Ticket', '011', '0000001', '2023-12-11 00:00:00', '0.00', '462.00', 'Aceptado'),
(15, 3, 1, 'Factura', '035', '0000003', '2023-12-11 00:00:00', '0.00', '348.04', 'Aceptado'),
(16, 3, 1, 'Factura', '035', '0000004', '2023-12-13 00:00:00', '0.00', '750.00', 'Aceptado'),
(17, 3, 1, 'Factura', '035', '0000005', '2023-12-14 00:00:00', '13.00', '162.72', 'Aceptado'),
(18, 8, 1, 'Factura', '035', '0000006', '2023-07-06 00:00:00', '13.00', '1661.10', 'Aceptado'),
(19, 9, 1, 'Factura', '035', '0000007', '2023-10-17 00:00:00', '0.00', '1638.50', 'Aceptado'),
(20, 9, 1, 'Factura', '035', '0000008', '2023-11-14 00:00:00', '0.00', '174.02', 'Aceptado'),
(21, 9, 1, 'Factura', '035', '0000009', '2023-11-17 00:00:00', '0.00', '5763.00', 'Aceptado'),
(22, 9, 1, 'Factura', '035', '0000010', '2023-12-14 00:00:00', '0.00', '45.20', 'Aceptado'),
(23, 8, 1, 'Factura', '035', '0000011', '2023-12-15 00:00:00', '0.00', '3410.00', 'Aceptado'),
(24, 9, 1, 'Factura', '035', '0000012', '2023-12-18 00:00:00', '0.00', '174.02', 'Anulado'),
(25, 8, 5, 'Factura', '035', '0000013', '2023-12-19 00:00:00', '13.00', '4972.00', 'Aceptado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`);

--
-- Indices de la tabla `cod_autorizacion`
--
ALTER TABLE `cod_autorizacion`
  ADD PRIMARY KEY (`id_codigo`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`idcompra`),
  ADD KEY `fk_ingreso_persona_idx` (`idproveedor`),
  ADD KEY `fk_ingreso_usuario_idx` (`idusuario`);

--
-- Indices de la tabla `comp_pago`
--
ALTER TABLE `comp_pago`
  ADD PRIMARY KEY (`id_comp_pago`);

--
-- Indices de la tabla `datos_negocio`
--
ALTER TABLE `datos_negocio`
  ADD PRIMARY KEY (`id_negocio`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`iddetalle_compra`),
  ADD KEY `fk_detalle_ingreso_idx` (`idcompra`),
  ADD KEY `fk_detalle_articulo_idx` (`idmaterial`),
  ADD KEY `idcompra` (`idcompra`),
  ADD KEY `idmaterial` (`idmaterial`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`iddetalle_venta`),
  ADD KEY `fk_detalle_venta_venta_idx` (`idventa`),
  ADD KEY `fk_detalle_venta_articulo_idx` (`idmueble`);

--
-- Indices de la tabla `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`idmaterial`);

--
-- Indices de la tabla `mueble`
--
ALTER TABLE `mueble`
  ADD PRIMARY KEY (`idmueble`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`),
  ADD KEY `fk_articulo_categoria_idx` (`idcategoria`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`idpermiso`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `login_UNIQUE` (`login`);

--
-- Indices de la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  ADD PRIMARY KEY (`idusuario_permiso`),
  ADD KEY `fk_u_permiso_usuario_idx` (`idusuario`),
  ADD KEY `fk_usuario_permiso_idx` (`idpermiso`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idventa`),
  ADD KEY `fk_venta_persona_idx` (`idcliente`),
  ADD KEY `fk_venta_usuario_idx` (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cod_autorizacion`
--
ALTER TABLE `cod_autorizacion`
  MODIFY `id_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `idcompra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `comp_pago`
--
ALTER TABLE `comp_pago`
  MODIFY `id_comp_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `datos_negocio`
--
ALTER TABLE `datos_negocio`
  MODIFY `id_negocio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `iddetalle_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `iddetalle_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `material`
--
ALTER TABLE `material`
  MODIFY `idmaterial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `mueble`
--
ALTER TABLE `mueble`
  MODIFY `idmueble` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `idpermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  MODIFY `idusuario_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `idventa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `fk_ingreso_persona` FOREIGN KEY (`idproveedor`) REFERENCES `persona` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ingreso_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD CONSTRAINT `detalle_compra_ibfk_1` FOREIGN KEY (`idmaterial`) REFERENCES `material` (`idmaterial`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detalle_ingreso` FOREIGN KEY (`idcompra`) REFERENCES `compra` (`idcompra`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `fk_detalle_venta_articulo` FOREIGN KEY (`idmueble`) REFERENCES `mueble` (`idmueble`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalle_venta_venta` FOREIGN KEY (`idventa`) REFERENCES `venta` (`idventa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mueble`
--
ALTER TABLE `mueble`
  ADD CONSTRAINT `mueble_ibfk_1` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  ADD CONSTRAINT `fk_u_permiso_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_permiso` FOREIGN KEY (`idpermiso`) REFERENCES `permiso` (`idpermiso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `fk_venta_persona` FOREIGN KEY (`idcliente`) REFERENCES `persona` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_venta_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
