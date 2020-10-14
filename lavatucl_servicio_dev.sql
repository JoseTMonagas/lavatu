-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 14, 2020 at 03:54 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lavatucl_servicio_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'PRENDA_SUPERIOR', NULL, '2020-09-30 17:03:33', '2020-09-30 17:03:33'),
(2, 'PRENDA_SUPERIOR', NULL, '2020-09-30 17:03:33', '2020-09-30 17:03:33'),
(3, 'ACCESORIOS', NULL, '2020-09-30 17:03:33', '2020-09-30 17:03:33'),
(4, 'ROPA_INTERIOR', NULL, '2020-09-30 17:03:33', '2020-09-30 17:03:33'),
(5, 'OTRAS', NULL, '2020-09-30 17:03:33', '2020-09-30 17:03:33');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_05_18_233121_create_reserva_horas_table', 1),
(5, '2020_06_01_183610_create_suscriptors_table', 1),
(6, '2020_07_16_164721_create_transaccions_table', 1),
(7, '2020_07_20_133044_create_orden_trabajos_table', 1),
(8, '2020_08_18_145226_create_categories_table', 1),
(9, '2020_08_18_145251_create_ropas_table', 1),
(10, '2020_09_27_201735_create_orden_trabajo_ropa_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orden_trabajos`
--

CREATE TABLE `orden_trabajos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `result` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`result`)),
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Nueva',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orden_trabajo_ropa`
--

CREATE TABLE `orden_trabajo_ropa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orden_trabajo_id` bigint(20) UNSIGNED NOT NULL,
  `ropa_id` bigint(20) UNSIGNED NOT NULL,
  `cantidad` int(10) UNSIGNED NOT NULL,
  `planchar` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reserva_horas`
--

CREATE TABLE `reserva_horas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hora` datetime NOT NULL,
  `carga` int(10) UNSIGNED NOT NULL,
  `tipo_carga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ropas`
--

CREATE TABLE `ropas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(10) UNSIGNED DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ropas`
--

INSERT INTO `ropas` (`id`, `category_id`, `name`, `price`, `img`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'BLUSA', NULL, 'img/ICONOS_ROPA/BLUSA.png', NULL, '2020-09-30 17:03:33', '2020-09-30 17:03:33'),
(2, 1, 'CAMISETA', NULL, 'img/ICONOS_ROPA/CAMISETA.png', NULL, '2020-09-30 17:03:33', '2020-09-30 17:03:33'),
(3, 1, 'CAMISA', NULL, 'img/ICONOS_ROPA/CAMISA.png', NULL, '2020-09-30 17:03:33', '2020-09-30 17:03:33'),
(4, 1, 'CASACA', NULL, 'img/ICONOS_ROPA/CASACA.png', NULL, '2020-09-30 17:03:33', '2020-09-30 17:03:33'),
(5, 1, 'CHALECO', NULL, 'img/ICONOS_ROPA/CHALECO.png', NULL, '2020-09-30 17:03:33', '2020-09-30 17:03:33'),
(6, 1, 'CORTAVIENTOS', NULL, 'img/ICONOS_ROPA/CORTAVIENTOS.png', NULL, '2020-09-30 17:03:33', '2020-09-30 17:03:33'),
(7, 1, 'KIMONO', NULL, 'img/ICONOS_ROPA/KIMONO.png', NULL, '2020-09-30 17:03:33', '2020-09-30 17:03:33'),
(8, 1, 'PARKA', NULL, 'img/ICONOS_ROPA/PARKA.png', NULL, '2020-09-30 17:03:33', '2020-09-30 17:03:33'),
(9, 1, 'PETO', NULL, 'img/ICONOS_ROPA/PETO.png', NULL, '2020-09-30 17:03:33', '2020-09-30 17:03:33'),
(10, 1, 'POLAR', NULL, 'img/ICONOS_ROPA/POLAR.png', NULL, '2020-09-30 17:03:33', '2020-09-30 17:03:33'),
(11, 1, 'POLERA', NULL, 'img/ICONOS_ROPA/POLERA.png', NULL, '2020-09-30 17:03:33', '2020-09-30 17:03:33'),
(12, 1, 'POLERÓN', NULL, 'img/ICONOS_ROPA/POLERÓN.png', NULL, '2020-09-30 17:03:33', '2020-09-30 17:03:33'),
(13, 1, 'VESTIDO', NULL, 'img/ICONOS_ROPA/VESTIDO.png', NULL, '2020-09-30 17:03:33', '2020-09-30 17:03:33'),
(14, 2, 'BERMUDAS', NULL, 'img/ICONOS_ROPA/BERMUDAS.png', NULL, '2020-09-30 17:03:33', '2020-09-30 17:03:33'),
(15, 2, 'BUZO_DEPORTIVO', NULL, 'img/ICONOS_ROPA/BUZO_DEPORTIVO.png', NULL, '2020-09-30 17:03:33', '2020-09-30 17:03:33'),
(16, 2, 'CALZAS', NULL, 'img/ICONOS_ROPA/CALZAS.png', NULL, '2020-09-30 17:03:33', '2020-09-30 17:03:33'),
(17, 2, 'FALDA', NULL, 'img/ICONOS_ROPA/FALDA.png', NULL, '2020-09-30 17:03:33', '2020-09-30 17:03:33'),
(18, 2, 'FALDÓN', NULL, 'img/ICONOS_ROPA/FALDÓN.png', NULL, '2020-09-30 17:03:33', '2020-09-30 17:03:33'),
(19, 2, 'JEANS', NULL, 'img/ICONOS_ROPA/JEANS.png', NULL, '2020-09-30 17:03:33', '2020-09-30 17:03:33'),
(20, 2, 'PANTALÓN', NULL, 'img/ICONOS_ROPA/PANTALÓN.png', NULL, '2020-09-30 17:03:33', '2020-09-30 17:03:33'),
(21, 3, 'BUFANDA', NULL, 'img/ICONOS_ROPA/BUFANDA.png', NULL, '2020-09-30 17:03:33', '2020-09-30 17:03:33'),
(22, 3, 'CUELLO', NULL, 'img/ICONOS_ROPA/CUELLO.png', NULL, '2020-09-30 17:03:33', '2020-09-30 17:03:33'),
(23, 3, 'DELANTAL', NULL, 'img/ICONOS_ROPA/DELANTAL.png', NULL, '2020-09-30 17:03:33', '2020-09-30 17:03:33'),
(24, 3, 'PAÑUELO_CUELLO', NULL, 'img/ICONOS_ROPA/PAÑUELO_CUELLO.png', NULL, '2020-09-30 17:03:33', '2020-09-30 17:03:33'),
(25, 3, 'PAREO', NULL, 'img/ICONOS_ROPA/PAREO.png', NULL, '2020-09-30 17:03:33', '2020-09-30 17:03:33'),
(26, 4, 'BATA', NULL, 'img/ICONOS_ROPA/BATA.png', NULL, '2020-09-30 17:03:33', '2020-09-30 17:03:33'),
(27, 4, 'BODY', NULL, 'img/ICONOS_ROPA/BODY.png', NULL, '2020-09-30 17:03:33', '2020-09-30 17:03:33'),
(28, 4, 'BOXER', NULL, 'img/ICONOS_ROPA/BOXER.png', NULL, '2020-09-30 17:03:33', '2020-09-30 17:03:33'),
(29, 4, 'CALCETINES', NULL, 'img/ICONOS_ROPA/CALCETINES.png', NULL, '2020-09-30 17:03:33', '2020-09-30 17:03:33'),
(30, 4, 'PIJAMA', NULL, 'img/ICONOS_ROPA/PIJAMA.png', NULL, '2020-09-30 17:03:33', '2020-09-30 17:03:33'),
(31, 4, 'PRENDAS_MENORES', NULL, 'img/ICONOS_ROPA/PRENDAS_MENORES.png', NULL, '2020-09-30 17:03:33', '2020-09-30 17:03:33'),
(32, 5, 'CORTINAS', NULL, 'img/ICONOS_ROPA/CORTINAS.png', NULL, '2020-09-30 17:03:33', '2020-09-30 17:03:33'),
(33, 5, 'FUNDA_ALMOHADA', NULL, 'img/ICONOS_ROPA/FUNDA_ALMOHADA.png', NULL, '2020-09-30 17:03:33', '2020-09-30 17:03:33'),
(34, 5, 'MANTA_POLAR', NULL, 'img/ICONOS_ROPA/MANTA_POLAR.png', NULL, '2020-09-30 17:03:33', '2020-09-30 17:03:33'),
(35, 5, 'MANTEL', NULL, 'img/ICONOS_ROPA/MANTEL.png', NULL, '2020-09-30 17:03:33', '2020-09-30 17:03:33'),
(36, 5, 'PAÑO_DE_COCINA', NULL, 'img/ICONOS_ROPA/PAÑO_DE_COCINA.png', NULL, '2020-09-30 17:03:33', '2020-09-30 17:03:33'),
(37, 5, 'SÁBANAS', NULL, 'img/ICONOS_ROPA/SÁBANAS.png', NULL, '2020-09-30 17:03:33', '2020-09-30 17:03:33'),
(38, 5, 'TOALLAS', NULL, 'img/ICONOS_ROPA/TOALLAS.png', NULL, '2020-09-30 17:03:33', '2020-09-30 17:03:33');

-- --------------------------------------------------------

--
-- Table structure for table `suscriptors`
--

CREATE TABLE `suscriptors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaccions`
--

CREATE TABLE `transaccions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sector` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orden_trabajos`
--
ALTER TABLE `orden_trabajos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orden_trabajos_user_id_foreign` (`user_id`);

--
-- Indexes for table `orden_trabajo_ropa`
--
ALTER TABLE `orden_trabajo_ropa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orden_trabajo_ropa_orden_trabajo_id_foreign` (`orden_trabajo_id`),
  ADD KEY `orden_trabajo_ropa_ropa_id_foreign` (`ropa_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `reserva_horas`
--
ALTER TABLE `reserva_horas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reserva_horas_user_id_foreign` (`user_id`);

--
-- Indexes for table `ropas`
--
ALTER TABLE `ropas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ropas_category_id_foreign` (`category_id`);

--
-- Indexes for table `suscriptors`
--
ALTER TABLE `suscriptors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaccions`
--
ALTER TABLE `transaccions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orden_trabajos`
--
ALTER TABLE `orden_trabajos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orden_trabajo_ropa`
--
ALTER TABLE `orden_trabajo_ropa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reserva_horas`
--
ALTER TABLE `reserva_horas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ropas`
--
ALTER TABLE `ropas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `suscriptors`
--
ALTER TABLE `suscriptors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaccions`
--
ALTER TABLE `transaccions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orden_trabajos`
--
ALTER TABLE `orden_trabajos`
  ADD CONSTRAINT `orden_trabajos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orden_trabajo_ropa`
--
ALTER TABLE `orden_trabajo_ropa`
  ADD CONSTRAINT `orden_trabajo_ropa_orden_trabajo_id_foreign` FOREIGN KEY (`orden_trabajo_id`) REFERENCES `orden_trabajos` (`id`),
  ADD CONSTRAINT `orden_trabajo_ropa_ropa_id_foreign` FOREIGN KEY (`ropa_id`) REFERENCES `ropas` (`id`);

--
-- Constraints for table `reserva_horas`
--
ALTER TABLE `reserva_horas`
  ADD CONSTRAINT `reserva_horas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `ropas`
--
ALTER TABLE `ropas`
  ADD CONSTRAINT `ropas_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
