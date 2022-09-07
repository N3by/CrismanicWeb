-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-09-2022 a las 00:56:31
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
-- Base de datos: `sitio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obras`
--

CREATE TABLE `obras` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `imagen` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `obras`
--

INSERT INTO `obras` (`id`, `nombre`, `imagen`) VALUES
(1, 'Pandilla', '1662536780_ab18f89c-7945-438a-a1ab-55c96ce9b143.webp');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `user_identidad` varchar(255) NOT NULL,
  `user_identidad_kind` varchar(255) NOT NULL,
  `user_nombre1` varchar(255) NOT NULL,
  `user_nombre2` varchar(255) NOT NULL,
  `user_apellido1` varchar(255) NOT NULL,
  `user_apellido2` varchar(255) NOT NULL,
  `user_mail` varchar(255) NOT NULL,
  `user_cel` varchar(255) NOT NULL,
  `user_dirr` varchar(255) NOT NULL,
  `user_pais` varchar(255) NOT NULL,
  `user_city` varchar(255) NOT NULL,
  `user_rank` varchar(255) NOT NULL,
  `user_plazo` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_pass_very` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `user_identidad`, `user_identidad_kind`, `user_nombre1`, `user_nombre2`, `user_apellido1`, `user_apellido2`, `user_mail`, `user_cel`, `user_dirr`, `user_pais`, `user_city`, `user_rank`, `user_plazo`, `user_pass`, `user_pass_very`) VALUES
(1, 'Pedro', 'casa', 'Colombia', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, '10000', 'CC', 'Mateo', 'Cristian', 'Alvarez', 'Posada', 'yaalsims@gmail.com', '3506085869', 'casa', 'Colombia', 'Bogota', 'Maestro', 'mateo', 'mateo', 'mateo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `obras`
--
ALTER TABLE `obras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `obras`
--
ALTER TABLE `obras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
