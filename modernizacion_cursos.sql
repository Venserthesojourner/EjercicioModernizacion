-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-06-2022 a las 07:19:52
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
-- Base de datos: `modernizacion_cursos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `legajo` int(11) NOT NULL,
  `nombre_curso` varchar(128) NOT NULL,
  `descripcion_curso` varchar(256) NOT NULL,
  `modalidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`legajo`, `nombre_curso`, `descripcion_curso`, `modalidad`) VALUES
(152637, 'Documental Periodístico para Redes', 'Comunicación y colaboración', 0),
(123232, 'Producción Familiar de Huerta', 'Haciendo en casa', 1),
(124442, 'Compostaje Urbano', 'Haciendo en casa', 1);
(256485, 'Introducción al Stop Motion', 'Programación y diseño', 1);
(324862, 'Fotografía básica de objetos y productos', 'Habilidades y herramientas para el trabajo', 0);
(125632, 'Creación de Videojuegos: Narrativas Interactivas', 'Programación y diseño', 0);
(951236, 'Introducción al Diseño', 'Programación y diseño', 1);
(125267, 'Cuchillería Artesanal', 'Oficios', 0);
(456232, 'Electrónica discreta', 'Fabricación', 1);
(158426, 'Corte y Confección', 'Oficios', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilio`
--

CREATE TABLE `domicilio` (
  `codigo_postal` int(8) NOT NULL,
  `ciudad` varchar(64) COLLATE utf8_bin NOT NULL,
  `departamento` varchar(64) COLLATE utf8_bin NOT NULL,
  `provincia` varchar(64) COLLATE utf8_bin NOT NULL,
  `pais` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `domicilio`
--

INSERT INTO `domicilio` (`codigo_postal`, `ciudad`, `departamento`, `provincia`, `pais`) VALUES
(8530, '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `esta_inscripto`
--

CREATE TABLE `esta_inscripto` (
  `documento` int(11) NOT NULL,
  `legajo_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `genero_id` int(11) NOT NULL,
  `nombre_genero` varchar(32) CHARACTER SET utf32 COLLATE utf32_bin NOT NULL,
  `tag_genero` char(1) COLLATE utf8_bin NOT NULL COMMENT 'El tag es una abreviación de nombre, ej: Para el genero "Hombre" el tag seria "H"'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`genero_id`, `nombre_genero`, `tag_genero`) VALUES
(0, 'MASCULINO', 'M'),
(1, 'FEMENINO', 'F'),
(2, 'OTRO', 'O');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modalidad`
--

CREATE TABLE `modalidad` (
  `id_modalidad` int(11) NOT NULL,
  `nombre_modalidad` varchar(32) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `modalidad`
--

INSERT INTO `modalidad` (`id_modalidad`, `nombre_modalidad`) VALUES
(0, 'INDIVIDUAL'),
(1, 'GRUPAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `documento` int(16) NOT NULL,
  `nombre_persona` varchar(64) NOT NULL,
  `apellido_persona` varchar(64) NOT NULL,
  `direccion` varchar(128) NOT NULL,
  `codigo_postal` int(11) NOT NULL,
  `genero` int(11) NOT NULL,
  `fecha_nacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`legajo`),
  ADD KEY `modalidad` (`modalidad`);

--
-- Indices de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  ADD PRIMARY KEY (`codigo_postal`);

--
-- Indices de la tabla `esta_inscripto`
--
ALTER TABLE `esta_inscripto`
  ADD PRIMARY KEY (`documento`,`legajo_curso`),
  ADD KEY `legajo_curso` (`legajo_curso`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`genero_id`);

--
-- Indices de la tabla `modalidad`
--
ALTER TABLE `modalidad`
  ADD PRIMARY KEY (`id_modalidad`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`documento`),
  ADD KEY `genero` (`genero`),
  ADD KEY `codigo_postal` (`codigo_postal`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `genero_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `modalidad`
--
ALTER TABLE `modalidad`
  MODIFY `id_modalidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `cursos_ibfk_1` FOREIGN KEY (`modalidad`) REFERENCES `modalidad` (`id_modalidad`);

--
-- Filtros para la tabla `esta_inscripto`
--
ALTER TABLE `esta_inscripto`
  ADD CONSTRAINT `esta_inscripto_ibfk_1` FOREIGN KEY (`documento`) REFERENCES `persona` (`documento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `esta_inscripto_ibfk_2` FOREIGN KEY (`legajo_curso`) REFERENCES `cursos` (`legajo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`genero`) REFERENCES `genero` (`genero_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `persona_ibfk_2` FOREIGN KEY (`codigo_postal`) REFERENCES `domicilio` (`codigo_postal`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
