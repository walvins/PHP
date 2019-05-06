-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-05-2019 a las 12:23:02
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `restaurante`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carta`
--

CREATE TABLE `carta` (
  `id_producto` int(4) NOT NULL,
  `descripcion` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `tipo` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `precio` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `carta`
--

INSERT INTO `carta` (`id_producto`, `descripcion`, `tipo`, `precio`) VALUES
(1111, 'ensalada', 'plato1', 10),
(1112, 'Sopa castellana', 'plato1', 15),
(1113, 'Ensalada rusa', 'plato1', 10),
(1121, 'Bistec de cerdo', 'plato2', 25),
(1122, 'Chuleton de vaca ', 'plato2', 20),
(1123, 'Bacalao', 'plato2', 18),
(1131, 'vainilla con chispas de oro', 'postre', 50),
(1132, 'Flan de huevo', 'postre', 7),
(1133, 'Crema catalana', 'postre', 8),
(1141, 'Pepsi', 'bebida', 3),
(1142, 'Vino rivera', 'bebida', 8),
(1144, 'Carlitos (Agua con hielitos)', 'bebida', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `DNI` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  `Contraseña` varchar(32) COLLATE latin1_spanish_ci NOT NULL,
  `Nombre` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `Fecha` date NOT NULL,
  `Telefono` int(9) NOT NULL,
  `Localidad` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `Tipo` varchar(10) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`DNI`, `Contraseña`, `Nombre`, `Fecha`, `Telefono`, `Localidad`, `Tipo`) VALUES
('11111111Q', '21232f297a57a5a743894a0e4a801fc3', 'Root', '1997-11-14', 666666666, 'Burgos', 'admin'),
('22222222Q', 'c27b0306a2f9d60b0adc2f30c17c075d', 'cli2', '1997-10-22', 616487598, 'Burgos', 'cliente'),
('33333333Q', '09601be2b3c13d4f7a9ab38440408ca8', 'cli3', '1997-02-05', 654875482, 'Villatoro', 'cliente'),
('44444444Q', 'e2b7fa97ab7ea682d5b7879f4933f120', 'cli4', '1990-06-15', 658986532, 'Villatoro', 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id_reserva` varchar(5) COLLATE latin1_spanish_ci NOT NULL,
  `dni_cliente` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  `plato1` int(4) NOT NULL,
  `plato2` int(4) NOT NULL,
  `postre` int(4) NOT NULL,
  `bebida` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carta`
--
ALTER TABLE `carta`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`DNI`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD KEY `dni_cliente` (`dni_cliente`),
  ADD KEY `plato1` (`plato1`),
  ADD KEY `postre` (`postre`),
  ADD KEY `bebida` (`bebida`),
  ADD KEY `plato2` (`plato2`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`dni_cliente`) REFERENCES `clientes` (`DNI`),
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`plato1`) REFERENCES `carta` (`id_producto`),
  ADD CONSTRAINT `reservas_ibfk_3` FOREIGN KEY (`plato2`) REFERENCES `carta` (`id_producto`),
  ADD CONSTRAINT `reservas_ibfk_4` FOREIGN KEY (`postre`) REFERENCES `carta` (`id_producto`),
  ADD CONSTRAINT `reservas_ibfk_5` FOREIGN KEY (`bebida`) REFERENCES `carta` (`id_producto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
