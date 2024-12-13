-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 13-12-2024 a las 07:47:43
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agenda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(16) NOT NULL,
  `apellido` varchar(32) NOT NULL,
  `telefono` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL DEFAULT '''img/foto_usuario_default.png''',
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id`, `nombre`, `apellido`, `telefono`, `foto`, `id_usuario`) VALUES
(1, 'pedro', 'nose', 11111, 'img/foto_usuario_default.png', 5),
(3, '123', '123', 123, 'img/123_foto.jpg', 5),
(10, 'sadf', 'asdf', 1234, 'img/sadf_foto.jpg', 5),
(13, 'simon', 'Lionello Mota', 1234, 'img/simon_foto.png', 5),
(15, '133', '133', 133, 'img/default_foto.png', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL,
  `texto` varchar(255) DEFAULT NULL,
  `id_contacto` int(11) DEFAULT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `texto`, `id_contacto`, `fecha`) VALUES
(2, 'prueba1', 1, '2024-12-13'),
(3, 'holaaaa', 1, '2024-12-13'),
(4, 'prueba2', 1, '2024-12-13'),
(5, 'prueba2', 1, '2024-12-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `password` varchar(38) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT '''img/default_avatar.png'''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `numero`, `password`, `avatar`) VALUES
(3, 123, '123', '\'img/default_avatar.png\''),
(4, 3, '33', 'avatar/ejemplo.png'),
(5, 1, '1', 'img/1_avatar.png'),
(6, 2, '2', 'img/2_avatar.png'),
(7, 4, '4', 'img/4_avatar.png'),
(8, 4, '4', 'img/4_avatar.png'),
(9, 5, '5', 'img/5_avatar.png'),
(10, 5, '5', 'img/5_avatar.png'),
(11, 1, '1', 'img/1_avatar.png'),
(12, 4, '4', 'img/4_avatar.png'),
(13, 11, '11', 'img/11_avatar.png'),
(14, 332, '332', 'img/332_avatar.png'),
(15, 66, '66', 'img/default_avatar.png'),
(16, 66, '66', 'img/default_avatar.png'),
(17, 66, '66', 'img/default_avatar.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_contacto` (`id_contacto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD CONSTRAINT `contactos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `mensajes_ibfk_1` FOREIGN KEY (`id_contacto`) REFERENCES `contactos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
