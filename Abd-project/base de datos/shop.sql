-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-04-2019 a las 19:46:10
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `shop`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id_articulo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `director` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `año` int(5) NOT NULL,
  `tipo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `importe` int(50) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `imagen` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id_articulo`, `nombre`, `director`, `año`, `tipo`, `importe`, `cantidad`, `imagen`) VALUES
('10', 'Marvel: Los Vengadores', 'Joss Whedon', 2012, 'ficcion', 25, 30, './view/imagen/vengadores.jpg'),
('11', 'La Ciudad De Las Estrellas: La La Land', 'Damien Chazelle', 2016, 'Musical', 20, 30, './view/imagen/lala.jpg'),
('12', 'Monstruos, S.A.', 'Pete Docter', 2002, 'infantil', 15, 20, './view/imagen/sa.jpg'),
('7', 'The Transporter', ' Louis Leterrier', 2002, 'accion', 15, 20, './view/imagen/transporter.jpg'),
('8', 'High School Musical', 'Kenny Ortega', 2006, 'musical', 10, 15, './view/imagen/hsm.jpg'),
('9', 'Capitana Marvel', 'Anna Boden', 2019, 'ficcion', 30, 40, './view/imagen/capitana.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `admin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_correo`, `password`, `name`, `admin`) VALUES
('abeoxsaro@gmail.com', 'cacadevaca', 'pablo', 0),
('jen@gmail.com', 'jenni', 'jenni', 1),
('pepe12@gmail.com', '123456', 'pepe12', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_pedidos`
--

CREATE TABLE `usuario_pedidos` (
  `id_pedido` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `id_correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `id_articulo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `importe` int(50) NOT NULL,
  `cantidad` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario_pedidos`
--

INSERT INTO `usuario_pedidos` (`id_pedido`, `id_correo`, `id_articulo`, `importe`, `cantidad`) VALUES
('1', 'jen@gmail.com', '7', 15, 1),
('10', 'jen@gmail.com', '11', 20, 1),
('11', 'jen@gmail.com', '7', 15, 1),
('12', 'jen@gmail.com', '9', 30, 1),
('13', 'jen@gmail.com', '10', 25, 1),
('14', 'jen@gmail.com', '11', 20, 1),
('15', 'jen@gmail.com', '11', 20, 1),
('16', 'jen@gmail.com', '7', 15, 1),
('17', 'jen@gmail.com', '11', 20, 1),
('18', 'jen@gmail.com', '11', 20, 1),
('19', 'jen@gmail.com', '11', 20, 1),
('1p', 'jen@gmail.com', '7', 30, 2),
('20', 'jen@gmail.com', '11', 20, 1),
('21', 'jen@gmail.com', '11', 20, 1),
('22', 'jen@gmail.com', '11', 20, 1),
('23', 'jen@gmail.com', '11', 20, 1),
('24', 'jen@gmail.com', '11', 20, 1),
('25', 'jen@gmail.com', '12', 15, 1),
('26', 'jen@gmail.com', '12', 15, 1),
('27', 'jen@gmail.com', '12', 15, 1),
('28', 'jen@gmail.com', '12', 15, 1),
('29', 'jen@gmail.com', '12', 15, 1),
('2p', 'jen@gmail.com', '8', 30, 3),
('30', 'jen@gmail.com', '12', 15, 1),
('31', 'jen@gmail.com', '', 0, 1),
('32', 'jen@gmail.com', '7', 15, 1),
('5', 'jen@gmail.com', '7', 15, 1),
('6', 'jen@gmail.com', '7', 15, 1),
('7', 'jen@gmail.com', '8', 10, 1),
('8', 'jen@gmail.com', '7', 15, 1),
('9', 'jen@gmail.com', '10', 25, 1),
('p', 'jen@gmail.com', '7', 15, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id_articulo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_correo`);

--
-- Indices de la tabla `usuario_pedidos`
--
ALTER TABLE `usuario_pedidos`
  ADD PRIMARY KEY (`id_pedido`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
