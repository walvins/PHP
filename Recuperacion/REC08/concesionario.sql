-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-05-2019 a las 10:04:06
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
-- Base de datos: `concesionario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `email` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `pass` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `tlfn` int(9) NOT NULL,
  `localidad` varchar(20) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`email`, `pass`, `tlfn`, `localidad`) VALUES
('cliente1@gmail.com', '6894edd989e4cb42fe60930bf5372f1a', 615478952, 'Burgos'),
('cliente2@gmail.com', '020927f6809dcb20f24660adc80ff0e4', 784596325, 'Burgos'),
('cliente3@gmail.com', '47f26f03e7f9f67fe7a45a0b677ee99f', 784596582, 'Madrid'),
('cliente4@gmail.com', 'cliente4@gmail.com', 987548652, 'Madrid');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coches`
--

CREATE TABLE `coches` (
  `id` int(4) NOT NULL,
  `modelo` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `marca` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `precio` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `coches`
--

INSERT INTO `coches` (`id`, `modelo`, `marca`, `precio`) VALUES
(1111, 'Clio', 'Renault', 150),
(2222, 'Focus', 'Ford', 125),
(3333, 'Ibiza', 'Seat', 75),
(4444, 'Countryman', 'Mini', 125),
(5555, '330', 'Peugeot', 75);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `email_cliente` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `id_coche` int(4) NOT NULL,
  `entrega` date NOT NULL,
  `devolucion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `coches`
--
ALTER TABLE `coches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD KEY `email_cliente` (`email_cliente`),
  ADD KEY `id_coche` (`id_coche`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`email_cliente`) REFERENCES `clientes` (`email`),
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`id_coche`) REFERENCES `coches` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
