-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-10-2023 a las 15:09:58
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_veterinaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_mascotas`
--

CREATE TABLE `tbl_mascotas` (
  `id_Masc` int(10) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Raza` varchar(50) NOT NULL,
  `Especie` enum('Canino','Felino','Ave','Reptil') NOT NULL,
  `Genero` enum('Macho','Hembra') NOT NULL,
  `id_Cli` int(10) NOT NULL,
  `FechaN` date NOT NULL,
  `id_HistorialM` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_mascotas`
--
ALTER TABLE `tbl_mascotas`
  ADD PRIMARY KEY (`id_Masc`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_mascotas`
--
ALTER TABLE `tbl_mascotas`
  MODIFY `id_Masc` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
