-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 05-10-2025 a las 00:09:02
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
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `existencias` int(11) DEFAULT 0,
  `nif_proveedor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`codigo`, `nombre`, `precio`, `existencias`, `nif_proveedor`) VALUES
(1001, 'Aceite vegetal 1L', 42.50, 30, 1),
(1002, 'Azúcar refinada 1kg', 35.00, 50, 2),
(1003, 'Harina de trigo 1kg', 28.00, 40, 3),
(1004, 'Arroz blanco 1kg', 30.00, 60, 4),
(1005, 'Frijol pinto 1kg', 38.00, 45, 5),
(1006, 'Sal yodada 1kg', 18.00, 75, 6),
(1007, 'Leche entera 1L', 26.50, 70, 7),
(1008, 'Café soluble 200g', 95.00, 25, 8),
(1009, 'Avena 400g', 32.00, 30, 9),
(1010, 'Galletas María 170g', 22.00, 55, 10),
(1011, 'Pasta para sopa 200g', 14.50, 60, 11),
(1012, 'Mayonesa 390g', 48.00, 40, 12),
(1013, 'Catsup 390g', 36.00, 42, 12),
(1014, 'Atún en agua 140g', 29.00, 38, 13),
(1015, 'Sardinas en tomate 155g', 32.00, 28, 13),
(1016, 'Jabón de lavandería 400g', 20.00, 60, 14),
(1017, 'Cloro 1L', 25.00, 55, 14),
(1018, 'Papel higiénico (4 rollos)', 39.00, 90, 15),
(1019, 'Servilletas 100pzs', 27.00, 85, 15),
(1020, 'Refresco cola 600ml', 19.00, 120, 16),
(1021, 'Agua purificada 1L', 14.00, 90, 16),
(1022, 'Jugo de naranja 1L', 28.00, 60, 16),
(1023, 'Chocolate en polvo 400g', 65.00, 25, 8),
(1024, 'Galletas saladas 150g', 25.00, 70, 10),
(1025, 'Crema para café 250ml', 34.00, 40, 7),
(1026, 'Detergente en polvo 1kg', 42.00, 65, 14),
(1027, 'Suavizante de ropa 850ml', 49.00, 45, 14),
(1028, 'Papel aluminio 7m', 28.00, 75, 15),
(1029, 'Bolsa de basura 30L (10pzs)', 31.00, 90, 15),
(1030, 'Pan blanco 680g', 42.00, 30, 10),
(1200, 'Nito', 15.00, 30, 17),
(1300, 'Donitas', 18.00, 40, 17);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `nif_proveedor` (`nif_proveedor`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`nif_proveedor`) REFERENCES `proveedor` (`nif`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
