-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2021 at 02:24 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dimsfood`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dimas Addriansyah', 'dimas@gmail.com', NULL, '$2y$10$fADE9CCXmkHKgeufNhI6i.YKtdHuqF84fweDu5h5Fz.f0huiabiga', NULL, '2021-03-06 08:27:37', '2021-03-06 08:27:37'),
(2, 'Admin', 'admin@gmail.com', NULL, '$2y$10$VpBEuHzX4nQKqHjyLS6ou.Uj.W.edGyW6H.g4NpI6P/lI0/Nj5uW.', NULL, '2021-03-06 08:27:37', '2021-03-06 08:27:37');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `finance`
--

CREATE TABLE `finance` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `income` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(4, '2021_03_06_145655_create_admins_table', 1),
(5, '2021_03_06_145808_create_products_table', 1),
(6, '2021_03_06_150657_create_transaction_table', 1),
(7, '2021_03_06_150913_create_transaction_details_table', 1),
(8, '2021_03_06_151222_create_finance_table', 1),
(9, '2021_03_06_151247_create_payment_table', 1);

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
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `proof_payment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_limit` datetime DEFAULT NULL,
  `status` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `users_id`, `transaction_id`, `name`, `proof_payment`, `pay_limit`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 3, 'Triana Dyah Pangestuti', '1622040373_bukti-pembayaran-STAIM0002.jpg', NULL, '3', '2021-05-26 14:46:13', '2021-05-27 05:02:04'),
(2, 3, 4, 'Triana Dyah Pangestuti', '1622090880_bukti-pembayaran-STAIM0002.jpg', NULL, '3', '2021-05-27 04:48:01', '2021-05-27 05:04:01'),
(3, 3, 5, 'Triana Dyah Pangestuti', '1622091941_bukti-pembayaran-STAIM0002.jpg', NULL, '3', '2021-05-27 05:05:41', '2021-05-27 05:07:16'),
(4, 3, 6, 'Triana Dyah Pangestuti', '1622098604_bukti-pembayaran-STAIM0002.jpg', NULL, '2', '2021-05-27 06:56:44', '2021-05-27 06:58:19'),
(5, 9, 7, 'Mizza', '1622099065_bukti-pembayaran-STAIM0002.jpg', NULL, '2', '2021-05-27 07:04:25', '2021-05-27 07:11:41'),
(6, 3, 8, 'Triana Dyah Pangestuti', '1622100224_bukti-pembayaran-STAIM0002.jpg', NULL, '1', '2021-05-27 07:23:44', '2021-05-27 07:23:44');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `stock`, `price`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Milshake Strawberry', 'Drink', 3, 15000, 'Milshake Strawberry', '1619067788_126-1267528_strawberry-milkshake-strawberry-milkshake-png-transparent-png.png', '2021-04-22 05:03:08', '2021-06-03 12:10:23'),
(2, 'Milshake Chocholate', 'Drink', 10, 17000, 'Milshake Chocholate', '1619067844_vegan-chocolate-milkshake-square-8.jpg', '2021-04-22 05:04:04', '2021-06-03 12:10:23'),
(3, 'Fried Noodle', 'Food', 10, 18000, 'Fried Noodle', '1619070609_mie-goreng-korea.jpg', '2021-04-22 05:50:09', '2021-05-27 07:23:35'),
(4, 'Chicken Steak', 'Food', 58, 35000, 'Chicken Steak', '1619070735_11338079427920624025.jpg', '2021-04-22 05:52:15', '2021-06-03 12:10:23');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `total_price` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `method_payment` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_limit` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `users_id`, `total_price`, `status`, `method_payment`, `pay_limit`, `created_at`, `updated_at`) VALUES
(1, 3, 54000, 4, 'COD', NULL, '2021-05-26 14:44:41', '2021-05-27 05:04:29'),
(2, 3, 17000, 4, 'COD', NULL, '2021-05-26 14:45:37', '2021-05-27 05:04:48'),
(3, 3, 30000, 4, 'Transfer', '2021-05-27 21:46:04', '2021-05-26 14:45:58', '2021-05-27 06:47:57'),
(4, 3, 30000, 5, 'Transfer', '2021-05-28 11:47:45', '2021-05-27 04:47:38', '2021-05-27 05:04:01'),
(5, 3, 18000, 5, 'Transfer', '2021-05-28 12:05:19', '2021-05-27 05:05:14', '2021-05-27 05:07:17'),
(6, 3, 36000, 3, 'Transfer', '2021-05-28 13:56:25', '2021-05-27 06:56:20', '2021-05-27 06:58:20'),
(7, 9, 18000, 3, 'Transfer', '2021-05-28 14:04:18', '2021-05-27 07:03:57', '2021-05-27 07:11:41'),
(8, 3, 18000, 2, 'Transfer', '2021-05-28 14:23:35', '2021-05-27 07:23:31', '2021-05-27 07:23:44'),
(13, 9, 119000, 3, 'COD', NULL, '2021-06-03 11:56:39', '2021-06-03 12:10:23'),
(16, 9, 521000, 0, NULL, NULL, '2021-06-03 12:16:08', '2021-06-03 12:17:30');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `products_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction_details`
--

INSERT INTO `transaction_details` (`id`, `transaction_id`, `products_id`, `qty`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 3, 54000, '2021-05-26 14:44:42', '2021-05-26 14:44:42'),
(2, 2, 2, 1, 17000, '2021-05-26 14:45:37', '2021-05-26 14:45:37'),
(3, 3, 1, 2, 30000, '2021-05-26 14:45:58', '2021-05-26 14:45:58'),
(4, 4, 1, 2, 30000, '2021-05-27 04:47:38', '2021-05-27 04:47:38'),
(5, 5, 3, 1, 18000, '2021-05-27 05:05:14', '2021-05-27 05:05:14'),
(6, 6, 3, 2, 36000, '2021-05-27 06:56:20', '2021-05-27 06:56:20'),
(15, 13, 1, 1, 15000, '2021-06-03 12:01:19', '2021-06-03 12:02:36'),
(16, 13, 4, 2, 70000, '2021-06-03 12:01:32', '2021-06-03 12:10:08'),
(17, 13, 2, 2, 34000, '2021-06-03 12:01:45', '2021-06-03 12:04:27'),
(21, 16, 4, 11, 385000, '2021-06-03 12:16:08', '2021-06-03 12:16:35'),
(22, 16, 2, 8, 136000, '2021-06-03 12:17:05', '2021-06-03 12:17:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `address`, `phone_number`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'User', 'user@gmail.com', NULL, '$2y$10$Gdszjy745bqUIEK6.9L8Ye6Jacq0VjOjok8bMFnE98M2gxqH5uiHC', 'Indramayu', '089514321234', NULL, '2021-03-06 08:27:38', '2021-03-06 08:27:38'),
(2, 'Arif Muthohari', 'arif@gmail.com', NULL, '$2y$10$svGwhAiVM6tniGHBT0rEYeAMY2/3jO.gDjmgjQooopbEpj3ttci4O', 'Indramayu', '089514321234', NULL, '2021-03-06 08:27:38', '2021-03-06 08:27:38'),
(3, 'Triana Dyah Pangestuti', 'triana@gmail.com', NULL, '$2y$10$3bWbdIRdoU2ldvwt2MkxUOmK/f4ztGnegofT8ZUqHRmbeu5Yng6wW', 'Indramayu', '089514321234', NULL, '2021-03-06 08:27:38', '2021-03-06 08:27:38'),
(6, 'Pembeli Baru', 'Pembelibaru@gmail.com', NULL, '$2y$10$TPY8.FaJOWxYU8On237BMujpJxWhjNnkY90jW5ip8U436pct3VnGe', 'Indramayu', '089514391333', NULL, '2021-05-02 08:19:33', '2021-05-02 08:19:33'),
(7, 'Gwendolyn Mckinney', 'Zuranuna@mailinator.com', NULL, '$2y$10$6/0kQOj8hvhtDyFPVal.zee/tC3NAZrPZvGDZaaod0jWFxuOaAhkW', 'Vero Nostrum Nam Lab', '089213123121', NULL, '2021-05-04 06:36:59', '2021-05-04 06:36:59'),
(8, 'Dacey Schwartz', 'Gogy@mailinator.com', NULL, '$2y$10$o6uNVfwCbSuJE/30tD0LaeGYQvC7tpaRtgRjyLPRQTcAT6t56VyqG', 'Blanditiis Voluptatu', '0891231231231', NULL, '2021-05-04 06:38:38', '2021-05-04 06:38:38'),
(9, 'Mizza', 'Mizza@gmail.com', NULL, '$2y$10$.VQNt1F2hhf4lR5wLy.uK..3jZT1opizrEYbOI6sayfDpUr/.DyU6', 'Indramayu', '0895143913222', NULL, '2021-05-24 02:32:16', '2021-05-24 02:32:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `finance`
--
ALTER TABLE `finance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `finance_transaction_id_foreign` (`transaction_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_users_id_foreign` (`users_id`),
  ADD KEY `payment_transaction_id_foreign` (`transaction_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_users_id_foreign` (`users_id`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_details_transaction_id_foreign` (`transaction_id`),
  ADD KEY `transaction_details_products_id_foreign` (`products_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `finance`
--
ALTER TABLE `finance`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `finance`
--
ALTER TABLE `finance`
  ADD CONSTRAINT `finance_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`id`),
  ADD CONSTRAINT `payment_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD CONSTRAINT `transaction_details_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `transaction_details_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
