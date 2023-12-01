-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 29-11-2023 a las 18:45:48
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `joyeriasagitario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `idCategoria` int NOT NULL,
  `nombreCategoria` varchar(25) NOT NULL,
  `descripcionCategoria` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nombreCategoria`, `descripcionCategoria`) VALUES
(1, 'Aretes', 'Una glamorosa interpretación de la construcción orgánica, los aros Dextera capturan el atractivo de los detalles metálicos. Completa tu look con puños para las orejas cristalizados para un chic industrial sin esfuerzo.'),
(2, 'Pulseras', 'Apila los elegantes cristales pavé y los engastes biselados de la familia Dextera con pulseras de tenis Matrix que brillan con luz. Agrega un reloj de pulsera oversized para lograr una elegancia andrógina perfecta.'),
(3, 'Collares', 'Crea looks de alto impacto con collares de eslabones entrelazados en capas. Una poderosa combinación de cristales blancos elegantes y herrajes dorados, cada pieza de Dextera resalta la belleza en la fortaleza.'),
(4, 'Anillos', 'Encuentra tu nuevo complemento favorito para todos los días en nuestra cautivadora gama de anillos: de compromiso, bandas atemporales y piezas combinables que realzarán cualquier prenda, de día o de noche.'),
(5, 'Arracadas', 'Una glamorosa interpretación de la construcción orgánica, los aros Dextera capturan el atractivo de los detalles metálicos. Completa tu look con puños para las orejas cristalizados para un chic industrial sin esfuerzo.'),
(6, 'Relojes', 'Apila los elegantes cristales pavé y los engastes biselados de la familia Dextera con pulseras de tenis Matrix que brillan con luz. Agrega un reloj de pulsera oversized para lograr una elegancia andrógina perfecta.'),
(7, 'Collares', 'Crea looks de alto impacto con collares de eslabones entrelazados en capas. Una poderosa combinación de cristales blancos elegantes y herrajes dorados, cada pieza de Dextera resalta la belleza en la fortaleza.'),
(8, 'Anillos', 'Encuentra tu nuevo complemento favorito para todos los días en nuestra cautivadora gama de anillos: de compromiso, bandas atemporales y piezas combinables que realzarán cualquier prenda, de día o de noche.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

DROP TABLE IF EXISTS `contacto`;
CREATE TABLE IF NOT EXISTS `contacto` (
  `idContacto` int NOT NULL,
  `tipoContacto` varchar(15) NOT NULL,
  `fecha` date NOT NULL,
  `mensaje` varchar(100) NOT NULL,
  PRIMARY KEY (`idContacto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleorden`
--

DROP TABLE IF EXISTS `detalleorden`;
CREATE TABLE IF NOT EXISTS `detalleorden` (
  `idDetalleOrden` int NOT NULL AUTO_INCREMENT,
  `cantidadPedida` int NOT NULL,
  `valorUnitario` float NOT NULL,
  `idOrden` int NOT NULL,
  `idProducto` int NOT NULL,
  PRIMARY KEY (`idDetalleOrden`),
  KEY `idOrden_idx` (`idOrden`),
  KEY `idProducto_idx` (`idProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

DROP TABLE IF EXISTS `orden`;
CREATE TABLE IF NOT EXISTS `orden` (
  `idOrden` int NOT NULL AUTO_INCREMENT,
  `fechOrden` date NOT NULL,
  `fechaEntrega` date NOT NULL,
  `estatus` varchar(15) NOT NULL,
  `totalOrden` float NOT NULL,
  `idUsuario` int NOT NULL,
  `idSucursal` int NOT NULL,
  `idPago` int NOT NULL,
  PRIMARY KEY (`idOrden`),
  KEY `idUsuario_idx` (`idUsuario`),
  KEY `idSucursal_idx` (`idSucursal`),
  KEY `idPago_idx` (`idPago`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

DROP TABLE IF EXISTS `pago`;
CREATE TABLE IF NOT EXISTS `pago` (
  `idPago` int NOT NULL,
  `numeroFactura` int NOT NULL,
  `fechaPago` date NOT NULL,
  `totalPago` float NOT NULL,
  PRIMARY KEY (`idPago`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `idProducto` int NOT NULL,
  `nombreProducto` varchar(35) NOT NULL,
  `cantidadExistente` int NOT NULL,
  `descripcionProducto` varchar(55) NOT NULL,
  `precioCompra` float NOT NULL,
  `precioVenta` float NOT NULL,
  `imagen` blob NOT NULL,
  `idCategoria` int NOT NULL,
  PRIMARY KEY (`idProducto`),
  KEY `idCategoria_idx` (`idCategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

DROP TABLE IF EXISTS `sucursal`;
CREATE TABLE IF NOT EXISTS `sucursal` (
  `idSucursal` int NOT NULL,
  `nombreSucursal` varchar(45) NOT NULL,
  `ciudad` varchar(30) NOT NULL,
  `codigoPostal` int NOT NULL,
  `colonia` varchar(30) NOT NULL,
  `calle` varchar(30) NOT NULL,
  `numeroTelefonico` int NOT NULL,
  `correo` varchar(55) NOT NULL,
  PRIMARY KEY (`idSucursal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(35) NOT NULL,
  `sexo` char(1) NOT NULL,
  `email` varchar(55) NOT NULL,
  `contraseña` varchar(15) NOT NULL,
  `tipoUsuario` varchar(15) NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `apellidos`, `sexo`, `email`, `contraseña`, `tipoUsuario`) VALUES
(1, 'Santiago', 'Ramirez Torres', 'M', 'santiago10@gmail.com', '8c9089be2f18fb2', 'Cliente'),
(3, 'Orlando', 'Diaz Miron', 'M', 'orlandodiaz8712@gmail.com', 'cccd34d95dc5294', 'Cliente'),
(4, 'Alejandra', 'Abundez Terrón ', 'F', 'alejandraterron32@gmail.com', 'c25b5a63510f96f', 'Cliente');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalleorden`
--
ALTER TABLE `detalleorden`
  ADD CONSTRAINT `idOrden` FOREIGN KEY (`idOrden`) REFERENCES `orden` (`idOrden`),
  ADD CONSTRAINT `idProducto` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`);

--
-- Filtros para la tabla `orden`
--
ALTER TABLE `orden`
  ADD CONSTRAINT `idPago` FOREIGN KEY (`idPago`) REFERENCES `pago` (`idPago`),
  ADD CONSTRAINT `idSucursal` FOREIGN KEY (`idSucursal`) REFERENCES `sucursal` (`idSucursal`),
  ADD CONSTRAINT `idUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `idCategoria` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
