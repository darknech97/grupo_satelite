-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2021 at 10:00 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registro`
--
CREATE DATABASE IF NOT EXISTS `registro` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `registro`;

-- --------------------------------------------------------

--
-- Table structure for table `alm_alumno`
--

CREATE TABLE `alm_alumno` (
  `alm_id` int(11) NOT NULL,
  `alm_codigo` varchar(100) NOT NULL,
  `alm_nombre` varchar(300) NOT NULL,
  `alm_edad` int(11) DEFAULT NULL,
  `alm_sexo` varchar(100) DEFAULT NULL,
  `alm_id_grd` int(11) DEFAULT NULL,
  `alm_observacion` varchar(300) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alm_alumno`
--

INSERT INTO `alm_alumno` (`alm_id`, `alm_codigo`, `alm_nombre`, `alm_edad`, `alm_sexo`, `alm_id_grd`, `alm_observacion`, `updated_at`, `created_at`) VALUES
(1, '0001', 'German Caceres', 25, 'Masculino', 2, 'Ninguna', '2021-07-23 07:51:38', '2021-07-23 07:51:38');

-- --------------------------------------------------------

--
-- Table structure for table `grd_grado`
--

CREATE TABLE `grd_grado` (
  `grd_id` int(11) NOT NULL,
  `grd_nombre` varchar(100) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grd_grado`
--

INSERT INTO `grd_grado` (`grd_id`, `grd_nombre`, `updated_at`, `created_at`) VALUES
(2, 'Grado 1', '2021-07-23 06:40:44', '2021-07-23 06:40:44');

-- --------------------------------------------------------

--
-- Table structure for table `mat_materia`
--

CREATE TABLE `mat_materia` (
  `mat_id` int(11) NOT NULL,
  `mat_nombre` varchar(100) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mat_materia`
--

INSERT INTO `mat_materia` (`mat_id`, `mat_nombre`, `updated_at`, `created_at`) VALUES
(2, 'Ciencias Naturales', '2021-07-23 07:42:49', '2021-07-23 07:42:49');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mxg_materiasxgrado`
--

CREATE TABLE `mxg_materiasxgrado` (
  `mxg_id` int(11) NOT NULL,
  `mxg_id_grd` int(11) NOT NULL,
  `mxg_id_mat` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alm_alumno`
--
ALTER TABLE `alm_alumno`
  ADD PRIMARY KEY (`alm_id`),
  ADD KEY `alm_id_grd` (`alm_id_grd`);

--
-- Indexes for table `grd_grado`
--
ALTER TABLE `grd_grado`
  ADD PRIMARY KEY (`grd_id`);

--
-- Indexes for table `mat_materia`
--
ALTER TABLE `mat_materia`
  ADD PRIMARY KEY (`mat_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mxg_materiasxgrado`
--
ALTER TABLE `mxg_materiasxgrado`
  ADD PRIMARY KEY (`mxg_id`),
  ADD KEY `mxg_id_grd` (`mxg_id_grd`),
  ADD KEY `mxg_id_mat` (`mxg_id_mat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alm_alumno`
--
ALTER TABLE `alm_alumno`
  MODIFY `alm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `grd_grado`
--
ALTER TABLE `grd_grado`
  MODIFY `grd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mat_materia`
--
ALTER TABLE `mat_materia`
  MODIFY `mat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mxg_materiasxgrado`
--
ALTER TABLE `mxg_materiasxgrado`
  MODIFY `mxg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alm_alumno`
--
ALTER TABLE `alm_alumno`
  ADD CONSTRAINT `alm_alumno_ibfk_1` FOREIGN KEY (`alm_id_grd`) REFERENCES `grd_grado` (`grd_id`);

--
-- Constraints for table `mxg_materiasxgrado`
--
ALTER TABLE `mxg_materiasxgrado`
  ADD CONSTRAINT `mxg_materiasxgrado_ibfk_1` FOREIGN KEY (`mxg_id_grd`) REFERENCES `grd_grado` (`grd_id`),
  ADD CONSTRAINT `mxg_materiasxgrado_ibfk_2` FOREIGN KEY (`mxg_id_mat`) REFERENCES `mat_materia` (`mat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
