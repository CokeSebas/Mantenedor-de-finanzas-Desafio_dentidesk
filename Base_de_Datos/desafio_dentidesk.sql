-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-05-2022 a las 21:21:06
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `desafio_dentidesk`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE `movimientos` (
  `id_movimiento` int(10) NOT NULL,
  `ingreso` int(10) NOT NULL,
  `egreso` int(10) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `movimientos`
--

INSERT INTO `movimientos` (`id_movimiento`, `ingreso`, `egreso`, `fecha`) VALUES
(1, 10000, 5000, '2022-05-02'),
(2, 0, 1000, '2022-05-13'),
(6, 546, 0, '2022-05-07'),
(14, 9600, 0, '2022-05-01'),
(15, 0, 500, '2022-05-21'),
(16, 47800, 0, '2022-05-12'),
(19, 0, 43657, '2022-05-11'),
(21, 67777, 0, '2022-05-18'),
(22, 15000, 0, '2022-05-14'),
(23, 8500, 0, '2022-05-06'),
(24, 75000, 0, '2022-05-18'),
(25, 12000, 0, '2022-05-19'),
(26, 0, 785, '2022-05-12'),
(27, 56786, 0, '2022-05-20'),
(29, 0, 20455, '2022-05-21'),
(30, 0, 3546, '2022-05-11'),
(31, 0, 753, '2022-05-13'),
(32, 15000, 0, '2022-04-14'),
(33, 13000, 0, '2022-04-07'),
(34, 0, 2000, '2022-04-16'),
(35, 0, 9000, '2022-04-23'),
(36, 75000, 0, '2022-03-04'),
(37, 5000, 0, '2022-01-14'),
(38, 0, 10000, '2022-05-19'),
(39, 0, 75000, '2022-05-18');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD PRIMARY KEY (`id_movimiento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  MODIFY `id_movimiento` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
