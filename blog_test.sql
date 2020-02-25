-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-02-2020 a las 20:49:48
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `blog_test`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Accion'),
(2, 'RPG'),
(3, 'Shooter'),
(4, 'MMORPG'),
(20, 'Indie'),
(21, 'Terror');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

CREATE TABLE `entradas` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `entradas`
--

INSERT INTO `entradas` (`id`, `usuario_id`, `categoria_id`, `titulo`, `descripcion`, `fecha`) VALUES
(1, 2, 2, 'Lord Of Shadows', 'Castlevania: Lords of Shadow es el título de un videojuego de la saga Castlevania para PS3, Xbox360 y Microsoft Windows. Fue lanzado mediante descarga digital en Steam el 27 de agosto de 2013', '2020-02-18'),
(2, 4, 3, 'Overwatch', 'Overwatch es un videojuego de disparos en primera persona multijugador, desarrollado por Blizzard Entertainment. Fue lanzado al público el 24 de mayo del 2016, para las plataformas PlayStation 4, Xbox One, Microsoft Windows y Nintendo Switch', '2020-02-17'),
(3, 3, 1, 'Diablo III', 'Diablo III es un videojuego de rol de acción, desarrollado por Blizzard Entertainment. Ésta es la continuación de Diablo II y la tercera parte de la serie que fue creada por la compañía estadounidense Blizzard. Su temática es de fantasía oscura y terrorífica', '2020-02-05'),
(11, 2, 21, 'Lord Of Shadows 2', 'Castlevania: Lords of Shadow 2 es un videojuego de acción-aventura de la saga Castlevania y es la secuela de Castlevania: Lords of Shadow - Mirror of Fate. Fue desarrollado nuevamente por MercurySteam y distribuido por Konami, saliendo a la venta en febrero de 2014. Este videojuego es la conclusión a la saga Lords of Shadow y es el último videojuego de Castlevania desarrollado por MercurySteam.1​', '2020-02-22'),
(12, 2, 20, 'Saint Seiya Awakening', 'Saint Seiya Awakening: Knights of the Zodiac', '2020-02-22'),
(13, 2, 1, 'Diablo II', 'Diablo II es un videojuego de rol de acción. Fue lanzado para Windows y Mac OS en el año 2000 por Blizzard Entertainment, y fue desarrollado por Blizzard North. Es la secuela directa del exitoso juego de PC de 1996, Diablo. Diablo II fue uno de los juegos más populares del año 2000.​ ', '2020-02-25'),
(15, 2, 20, 'Final Fantasy', 'Final Fantasy es una franquicia de medios creada por Hironobu Sakaguchi y desarrollada por Square Enix. La franquicia se centra en una serie fantástica y ciencia fantástica de videojuegos RPG.', '2020-02-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `password`, `fecha`) VALUES
(1, 'leonardo', 'jimenes', 'newbone3@gmail.com', '1234', '2020-02-01'),
(2, 'monica', 'jimenez', 'Monica@gmail.com', '$2y$04$KyTEFdF4TJ9AJUqyNMmlUeKcIM5tGmvI9JwBk1m/4o2HQaqq3GK0a', '2020-02-08'),
(3, 'ulises', 'libois', 'Ulises@libois.com', '$2y$04$z/7zMkNfFeI3aUdM6hSSauy/qi1gBpdIyCXvYk7POkjboSwyfgzea', '2020-02-08'),
(4, 'giuliana', 'grupillo', 'giuliana@grupillo.com', '$2y$04$nfbjiabAPXEZPLH69UCAjO9pzALg7u0OlPuP0J/AzOzw950eut33.', '2020-02-08'),
(5, 'fran', 'cisco', 'Fran@filipi.com', '$2y$04$adXBJymmhBHcWz73kJtQKOtpvaKDImwPXY3zNAx9EZDXcfQ373V7.', '2020-02-08'),
(6, 'hola', 'hola', 'hola@hola.com', '$2y$04$raQZowZreg.uoFBlBCwlie8yMMfpXP9W1805m.b47RX3cLcHBhzVC', '2020-02-18'),
(8, 'holllaaaa', 'holllaaaa', 'Holllaaa@gmail.com', '$2y$04$7ZAYpaS1iJsKt6xQ4Ks6sOJPme0GSK/W6gpJo2NdrVhUS3n2/7K5S', '2020-02-24');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_entradas_usuarios` (`usuario_id`),
  ADD KEY `fk_entradas_categorias` (`categoria_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`) USING HASH;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `entradas`
--
ALTER TABLE `entradas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD CONSTRAINT `fk_entradas_categorias` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `fk_entradas_usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
