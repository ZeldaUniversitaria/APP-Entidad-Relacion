-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 05-10-2025 a las 00:08:59
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `empresa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `dni_cliente` int(11) DEFAULT NULL,
  `codigo_producto` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `dni_cliente`, `codigo_producto`, `fecha`, `cantidad`, `total`) VALUES
(1, 12345678, 1011, '2025-10-04', 5, 72.50),
(2, 12345678, 1015, '2025-10-04', 2, 64.00),
(3, 12345678, 1021, '2025-10-04', 5, 70.00),
(4, 12345678, 1011, '2025-10-04', 5, 72.50),
(5, 12345678, 1015, '2025-10-04', 2, 64.00),
(6, 12345678, 1021, '2025-10-04', 5, 70.00);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dni_cliente` (`dni_cliente`),
  ADD KEY `codigo_producto` (`codigo_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`dni_cliente`) REFERENCES `cliente` (`dni`),
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`codigo_producto`) REFERENCES `producto` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
