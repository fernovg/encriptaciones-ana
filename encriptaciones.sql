-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-12-2022 a las 21:39:59
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `encriptaciones`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aes_pago`
--

CREATE TABLE `aes_pago` (
  `id` int(11) NOT NULL,
  `NombreTitular` varchar(50) DEFAULT NULL,
  `NumTarjeta` longtext DEFAULT NULL,
  `Mes` longtext DEFAULT NULL,
  `Ano` longtext DEFAULT NULL,
  `CVV` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aes_pago`
--

INSERT INTO `aes_pago` (`id`, `NombreTitular`, `NumTarjeta`, `Mes`, `Ano`, `CVV`) VALUES
(26, 'propio', 'TnpldkFVS05XbGNnZFFxemEvdTExQT09', 'ak1IZWNtUGdnNXF3ek1QZ2htay9sZz09', 'RjRhT3c1M2NJa05xVitrR015Y3ZxZz09', 'bmhOOUNhcU53andxYXVrQnFGQm43QT09'),
(30, 'nuevoform', 'WHE3elRYOEp6cXBtNWR2elJzK2Z2Zz09', 'dVZpUmdXWGRkMnJ5K1hRTC9jMGVTUT09', 'dVZpUmdXWGRkMnJ5K1hRTC9jMGVTUT09', 'dVZpUmdXWGRkMnJ5K1hRTC9jMGVTUT09'),
(31, 'nuevoformact', 'bGl6dFh5Tk1XenB2OGRDbDZrUVVXdz09', 'ak1IZWNtUGdnNXF3ek1QZ2htay9sZz09', 'RFdIU3Z3WmtJRld5aUd6UmpueHZpQT09', 'L01EekxGUVJoUW5RemlTZm8rN0N3QT09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomina`
--

CREATE TABLE `nomina` (
  `id` int(6) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `course` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rsa_tar`
--

CREATE TABLE `rsa_tar` (
  `id` int(11) NOT NULL,
  `NombreTitular` varchar(50) DEFAULT NULL,
  `NumTarjeta` longtext DEFAULT NULL,
  `Mes` longtext DEFAULT NULL,
  `Ano` longtext DEFAULT NULL,
  `CVV` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rsa_tar`
--

INSERT INTO `rsa_tar` (`id`, `NombreTitular`, `NumTarjeta`, `Mes`, `Ano`, `CVV`) VALUES
(1, 'fer', 'a2NZRnhFTjBKYlAydElUMXJmSVZwZz09OjqHh6jp6tOqKXWrfM+VgPhz', 'V0dsVi9yRHNLV255UStaRDZ1M01Edz09OjqHh6jp6tOqKXWrfM+VgPhz', 'cXhDMmNtdGIrZ0N2UHNtYU16VHZCZz09OjqHh6jp6tOqKXWrfM+VgPhz', 'YlNOd2RKbTFyODlZYzU0WnJxbTZoZz09OjqHh6jp6tOqKXWrfM+VgPhz'),
(2, 'rsa', 'YjhpSkFJU09MTzU2QkIrTkdIR25uQT09Ojq64DsbFcnuMw3HvA2KbAIh', 'NTUzdG1URzU2VlBSK2RDYk41T2ZyQT09Ojq64DsbFcnuMw3HvA2KbAIh', 'UEhZRGNLTkQ3SVdyQ2hPRnc4RHR3QT09Ojq64DsbFcnuMw3HvA2KbAIh', 'Vzk5WlRuRU83MmdYSWZzRjRuNVBLdz09Ojq64DsbFcnuMw3HvA2KbAIh');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aes_pago`
--
ALTER TABLE `aes_pago`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rsa_tar`
--
ALTER TABLE `rsa_tar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aes_pago`
--
ALTER TABLE `aes_pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `rsa_tar`
--
ALTER TABLE `rsa_tar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
