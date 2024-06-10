-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-06-2024 a las 00:01:04
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
-- Base de datos: `libreriaexpress`
--
CREATE DATABASE IF NOT EXISTS `libreriaexpress` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `libreriaexpress`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE IF NOT EXISTS `autores` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nombreAutor` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombreAutor` (`nombreAutor`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`id`, `nombreAutor`) VALUES
(8, 'Agatha Christie'),
(3, 'Gail Brenner'),
(7, 'Gumesindo Padilla Sahagun'),
(1, 'Manuel Angel Torres Remon'),
(6, 'Pablo Augusto Sznajdleder'),
(4, 'Poul Jim Paredes Bruno'),
(5, 'Schopenhauer'),
(2, 'Stephen Hawking');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorial`
--

CREATE TABLE IF NOT EXISTS `editorial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombreEditorial` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombreEditorial` (`nombreEditorial`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `editorial`
--

INSERT INTO `editorial` (`id`, `nombreEditorial`) VALUES
(1, 'Alfaomega'),
(3, 'Dummies'),
(2, 'Macro'),
(5, 'Mc Graw Hill'),
(6, 'Molino'),
(4, 'Penguin random house grupo editorial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE IF NOT EXISTS `genero` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombregenero` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombregenero` (`nombregenero`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id`, `nombregenero`) VALUES
(4, 'Cientifico'),
(3, 'Derecho'),
(2, 'Idiomas'),
(5, 'Novela Policiaca'),
(1, 'Programacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE IF NOT EXISTS `libros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipoPublicacion` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `imagen` varchar(1000) NOT NULL,
  `editorial` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `paginas` varchar(6) NOT NULL,
  `genero` varchar(250) NOT NULL,
  `anio` varchar(6) NOT NULL,
  `detalles` varchar(2000) NOT NULL,
  `reseniaPersonal` varchar(2000) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `genero` (`genero`),
  KEY `tipoPublicacion` (`tipoPublicacion`) USING BTREE,
  KEY `editorial` (`editorial`) USING BTREE,
  KEY `autor` (`autor`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id`, `tipoPublicacion`, `nombre`, `imagen`, `editorial`, `autor`, `isbn`, `paginas`, `genero`, `anio`, `detalles`, `reseniaPersonal`) VALUES
(4, 'Libro', 'Desarrollo de Apliacaciones con Java', '1717920364_978607622547.jpeg', 'Macro', 'Manuel Angel Torres Remon', '978607622547', '320', 'Programacion', '2017', 'El presente libro titulo desarrollo de aplicaciones con java tiene como objeto dar a conocer las funciones dadas por este lenguaje de programación tanto a principiantes como a expertos en la materia ya que los temas se desarrollan progresivamente para iniciarse en la programación y se incorporan herramientas importantes para el desarrollo de aplicaciones. Esta dirigido principalmente a desarrolladores estudiantes de programación junior ingeniería de sistemas.', 'es un libro muy padre, pero medio confuso.'),
(8, 'Libro', 'Java a Fondo', '1717923486_Java a fondo.jpeg', 'Alfaomega', 'Pablo Augusto Sznajdleder', '9789871609116', '525', 'Programacion', '2010', 'Java a Fondo propone un curso de lenguaje y desarrollo de aplicaciones Java basado en un enfoque totalmente práctico, sin vueltas ni rodeos. El libro comienza desde un nivel \"cero\" y avanza hasta llegar a temas complejos como introspección de clases y objetos, acceso a bases de datos (JDBC), multiprogramación, networking y objetos distribuidos (RMI), entre otros. La obra explica cómo diseñar y desarrollar aplicaciones Java respetando los estándares y lineamientos propuestos por los expertos de l', ''),
(9, 'Libro', 'Derecho Romano', '1717923708_978970106527.jpeg', 'Mc Graw Hill', 'Gumesindo Padilla Sahagun', '9789701065273', '397', 'Derecho', '2008', 'El presente texto enseña a pensar jurídicamente en la importancia y trascendencia del derecho romano como disciplina jurídica en la familia y como protectora del incapaz.\r\n4ta Edicion.', ''),
(10, 'Libro', 'Desarrollo de Aplicaciones con Java 8 Orientado a Objetos', '1717924050_Desarrollo de Aplicaciones Java 8.gif', 'Macro', 'Manuel Angel Torres Remon', '9786123045524', '382', 'Programacion', '2018', 'Programas\r\nDesarrollo De Aplicaciones Con Java 8\r\nTorres Remon, Manuel A.    \r\nAñadir comentario\r\nCompartir:\r\nEsta obra es una excelente herramienta académica de consulta para los interesados en programación en Java. Se brindan, de esta manera, las nociones más básicas hasta las más avanzadas y los análisis detallados del desarrollo de las aplicaciones sobre problemas reales y prácticos. Se abordan los fundamentos de la programación en Java y los elementos que componen una aplicación en este len', ''),
(11, 'Libro', 'Fraces en Ingles', '1717924538_fraces en ingles.jpg', 'Dummies', 'Gail Brenner', '9786070707520', '204', 'Idiomas', '2011', '¿Necesitas hablar en inglés en tu trabajo? ¿Debes comunicarte en inglés con amigos, maestros u otras personas? ¡No te preocupes más! Esta guía te dará las bases necesarias para que puedas entablar conversaciones interesantes y fluidas desde el primer día independientemente de tu nivel de inglés...\r\n\r\nComencemos con lo básico - cómo pronunciar el inglés.\r\nDesde las palabras hasta los números - entender las reglas gramaticales y los verbos.\r\nPodrás conocer gente - comunicarte con ellos, hacerles p', ''),
(12, 'Libro', 'Asesinato en la calle Hickory', '1717925000_asesinato en la calle hickory.jpg', 'Molino', 'Agatha Christie', '8427202334', '254', 'Novela Policiaca', '1984', 'La eficientísima secretaria de Hércules Poirot, Miss Lemon, llega excesivamente atrasada y comete algún error. El motivo de su nerviosismo tiene relación con un problema que atañe a su hermana, señora igualmente eficiente que lleva una pensión para estudiantes extranjeros situada en la calle Hickory. Hacía algunos meses que ocurrían hechos extraños y desagradables que la Sra. Hubbard no conseguía administrar adecuadamente: robos y actos de vandalismo inexplicables.\r\n\r\nPoirot decide ayudar a la S', 'La eficientísima secretaria de Hércules Poirot, Miss Lemon, llega excesivamente atrasada y comete algún error. El motivo de su nerviosismo tiene relación con un problema que atañe a su hermana, señora igualmente eficiente que lleva una pensión para estudiantes extranjeros situada en la calle Hickory. Hacía algunos meses que ocurrían hechos extraños y desagradables que la Sra. Hubbard no conseguía administrar adecuadamente: robos y actos de vandalismo inexplicables.\r\n\r\nPoirot decide ayudar a la Sra. Hubbard, pero se siente inmediatamente confuso, en medio de tantas situaciones aparentemente independientes unas de otras. El problema se agrava cuando ocurre un asesinato.\r\n\r\nOPINION\r\n\r\nCada vez que un libro nuevo de Agatha Christie cae en mis manos me muero de ganas de poder leerlo porque sé que conmigo es acierto seguro y es que me encanta todo de las obras de Agatha Christie.\r\n\r\nEn este caso nos encontramos ante un caso que comienza siendo muy extraño. Unos robos, algunos atentados contr'),
(13, 'Libro', 'El misterio de Sans-Souci', '1717925357_El misterio de sans souci.jpg', 'Molino', 'Agatha Christie', '9788427202818', '237', 'Novela Policiaca', '1985', 'Tommy y Tuppence se aburren cuando un viejo conocido del servicio secreto les propone instalarse en un hotelito de la costa de Inglaterra para investigar entre su clientela, formada por militares retirados, viejas chismosas y parejas de enamorados.', ''),
(14, 'Libro', 'La Venganza de Nofret', '1717925440_la venganza de nofret.jpg', 'Molino', 'Agatha Christie', '8427201516', '239', 'Novela Policiaca', '1984', 'Año 2.000 a. de C., Egipto, lugar en el que la muerte da sentido a la vida. A los pies de un acantilado se encuentra el cuerpo destrozado y retorcido de Nofret, la concubina del sacerdote de Tebas, Imhotep. Joven, hermosa y de lengua viperina, la mayoría estaría de acuerdo en que ha sido el destino: ¡merecía morir como una víbora! Desde ese instante una maldición parece cernirse sobre los miembros de la familia de Imhotep, víctima de una serie de asesinatos. Pero Renisenb, la única hija de Imhot', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipopublicacion`
--

CREATE TABLE IF NOT EXISTS `tipopublicacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombreTipo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombreTipo` (`nombreTipo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipopublicacion`
--

INSERT INTO `tipopublicacion` (`id`, `nombreTipo`) VALUES
(3, 'Comic'),
(1, 'Libro'),
(2, 'Revista');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_5` FOREIGN KEY (`genero`) REFERENCES `genero` (`nombregenero`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `libros_ibfk_6` FOREIGN KEY (`editorial`) REFERENCES `editorial` (`nombreEditorial`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `libros_ibfk_7` FOREIGN KEY (`tipoPublicacion`) REFERENCES `tipopublicacion` (`nombreTipo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `libros_ibfk_8` FOREIGN KEY (`autor`) REFERENCES `autores` (`nombreAutor`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
