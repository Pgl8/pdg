-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-12-2017 a las 18:35:51
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pdg`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `policies`
--

CREATE TABLE `policies` (
  `idPolicy` int(10) UNSIGNED NOT NULL,
  `code` varchar(50) NOT NULL,
  `plan_reference` varchar(191) NOT NULL,
  `first_name` varchar(191) NOT NULL,
  `last_name` varchar(191) NOT NULL,
  `investment_house` varchar(191) NOT NULL,
  `last_operation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `policies`
--

INSERT INTO `policies` (`idPolicy`, `code`, `plan_reference`, `first_name`, `last_name`, `investment_house`, `last_operation`) VALUES
(1, '12345678', 'The Calpe RBS No. 247', 'Martin Terence', 'Withrod', 'Old Mutual International', '2017-12-05'),
(2, '124578', 'The house life ltd', 'Brandon', 'James', 'International World Trade', '2017-12-06'),
(3, '1245781', 'The house life ltd1', 'James', 'Smith', 'International World Trade', '2017-12-06'),
(4, '12345679', 'The Calpe RBS No. 246', 'Martin Terence', 'Withrod', 'Old Mutual International', '2017-12-05'),
(5, '12345680', 'The Calpe RBS No. 249', 'Martin Terence', 'Withrod', 'Old Mutual International', '2017-12-05'),
(7, '12457812', 'The house Insure ltd', 'James', 'Smith', 'International World Trade', '2017-12-06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `idUser` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `last_connected` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `role` enum('admin','staff') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`idUser`, `username`, `email`, `password`, `firstname`, `lastname`, `last_connected`, `status`, `role`) VALUES
(1, 'admin', 'admin@test.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Admin', 'Test', '2017-12-06', 'active', 'admin'),
(2, 'staff', 'staff@test.com', '6ccb4b7c39a6e77f76ecfa935a855c6c46ad5611', 'Staff', 'Test', '2017-12-06', 'active', 'staff'),
(3, 'staff2', 'staff2@test.com', 'd2fa969f361a79b9ddee0bdc70580618b4cfe8d0', 'Staff2', 'Test', '2017-12-06', 'active', 'staff'),
(4, 'staff3', 'staff3@test.com', 'b88a21bbc9eb8286341c7197ff3c842b43ddf69a', 'Staff3', 'Test', '2017-12-06', 'deleted', 'staff'),
(5, 'test', 'test@test.com', '5b3d488e081602d988aee5621f11376752e3896e', 'Test', 'IFA', '0000-00-00', 'sent', 'staff');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_codes`
--

CREATE TABLE `users_codes` (
  `idCode` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_policies`
--

CREATE TABLE `users_policies` (
  `idUser` int(11) NOT NULL,
  `idPolicy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users_policies`
--

INSERT INTO `users_policies` (`idUser`, `idPolicy`) VALUES
(3, 1),
(2, 2),
(11, 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `policies`
--
ALTER TABLE `policies`
  ADD PRIMARY KEY (`idPolicy`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `users_codes`
--
ALTER TABLE `users_codes`
  ADD PRIMARY KEY (`idCode`),
  ADD KEY `idUser` (`email`);

--
-- Indices de la tabla `users_policies`
--
ALTER TABLE `users_policies`
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idPolicy` (`idPolicy`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `policies`
--
ALTER TABLE `policies`
  MODIFY `idPolicy` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `users_codes`
--
ALTER TABLE `users_codes`
  MODIFY `idCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
