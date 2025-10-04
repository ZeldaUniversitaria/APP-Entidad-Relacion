-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 05-10-2025 a las 00:09:05
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
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `nif` int(11) NOT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `direccion` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`nif`, `nombre`, `direccion`) VALUES
(1, 'Distribuidora La Central', 'Av. Juárez #234, Col. Centro'),
(2, 'La Dulzura S.A.', 'Calle Miel #120, Col. Reforma'),
(3, 'Molinos del Norte', 'Blvd. Tecnológico #450, Col. Industrial'),
(4, 'Granos y Cereales del Valle', 'Av. Panamericana #2330, Col. Campestre'),
(5, 'Granos Selectos Juárez', 'Calle 5 de Febrero #145, Col. San Lorenzo'),
(6, 'La Salinera', 'Calle Mar de Cortés #12, Col. Progreso'),
(7, 'Lácteos del Río', 'Av. De los Lagos #305, Col. Los Pinos'),
(8, 'Cafés de México', 'Calle Aroma #89, Col. Aromas'),
(9, 'Cerealera del Norte', 'Blvd. Zaragoza #554, Col. Del Valle'),
(10, 'Galletera Juárez', 'Av. Adolfo López Mateos #780, Col. Juárez Centro'),
(11, 'La Italiana', 'Av. Benito Juárez #1230, Col. Bellavista'),
(12, 'Salsas y Condimentos S.A.', 'Calle Tomate #400, Col. Mercado'),
(13, 'Mar Azul', 'Blvd. Bahía #112, Col. Portuaria'),
(14, 'Productos de Limpieza Rivera', 'Calle Pino Suárez #87, Col. Hidalgo'),
(15, 'Higiénicos del Norte', 'Av. De las Torres #990, Col. Obrera'),
(16, 'Bebidas del Desierto', 'Blvd. Independencia #230, Col. Las Torres'),
(17, 'Bimbo', 'Av. Paseo de la Victoria 9935');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`nif`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
