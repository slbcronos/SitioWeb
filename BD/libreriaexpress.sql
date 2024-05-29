-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-05-2024 a las 11:35:36
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

CREATE TABLE `autores` (
  `id` int(255) NOT NULL,
  `nombreAutor` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`id`, `nombreAutor`) VALUES
(1, 'Manuel A. Torres Remon'),
(2, 'Stephen Hawking'),
(3, 'Gail Brenner'),
(4, 'Poul Jim Paredes Bruno'),
(5, 'Schopenhauer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombreCategoria` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombreCategoria`) VALUES
(1, 'Programacion'),
(2, 'Derecho'),
(3, 'Cientifica'),
(4, 'Novela'),
(5, 'Idiomas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorial`
--

CREATE TABLE `editorial` (
  `id` int(11) NOT NULL,
  `nombreEditorial` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `editorial`
--

INSERT INTO `editorial` (`id`, `nombreEditorial`) VALUES
(1, 'Alfaomega'),
(2, 'Macro'),
(3, 'Dummies'),
(4, 'Penguin random house grupo editorial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `imagen` varchar(1000) NOT NULL,
  `editorial` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `paginas` varchar(100) NOT NULL,
  `detalles` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id`, `nombre`, `imagen`, `editorial`, `autor`, `isbn`, `paginas`, `detalles`) VALUES
(3, 'Java a Fondo', '1714647010_Java a fondo.jpeg', 'Alfaomega', 'quien sabe', 'no se', '1000', 'estudio del lenguaje y desarrollo de aplicaciones'),
(10, 'Desarrollo de Aplicaciones con Java 8 Orientado a Objetos', '1714648201_Desarrollo de Aplicaciones Java 8.gif', '', '', '', '', ''),
(15, 'Fraces en Ingles', '1714644213_fraces en ingles.jpg', 'Dummies', 'Gail Brenner', '9786070707520', '204', ''),
(20, 'Seis tumbas en Munich', '1714819946_seis tumbas en munich.jpg', 'Penguin random house grupo editorial', 'Mario puzo', '', '174', 'Una historia criminal en torno a una venganza'),
(24, 'Filosofos Alemanes', '1715758028_filosofos alemanes.jpg', 'Breviarios', 'Friedich Sauer', 'N/A', '308', 'presentación, critica, y juicios sobre sus filosofías'),
(25, 'Agujeros Negros y Pequeños Universos', '1715759819_agujeros negros y pequeños universos.jpg', 'Critica', 'Stephen Hawking', '9786079377526', '217', ' Libro sobre apuntes de fisica del universo'),
(26, 'Desarrollo de Aplicaciones con Java', '1715766514_978607622547.jpeg', 'Alfaomega Macro', 'Manuel A. Torres Remon', '9786076225479', '446', 'Creacion de aplicaicones con java en jcreator,jdeveloper y netbeans '),
(27, 'Criptografia', '1715915818_Criptografia.jpg', 'alma', 'a', 'a', '1', 'zxcxzcxzcxzc'),
(28, 'Informatica para Pymes', '1716631063_978612304075.jpeg', 'Macro', 'Poul Jim Paredes Bruno', '9786123040758', '351', 'Aplicaciones para aumentar su productividad');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `editorial`
--
ALTER TABLE `editorial`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `editorial`
--
ALTER TABLE `editorial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
