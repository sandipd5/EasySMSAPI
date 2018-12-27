-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2018 at 12:14 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easy_service`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2018_10_26_092457_entrust_setup_tables', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(10, 'list-user', NULL, NULL, '2018-10-26 12:51:20', '2018-10-26 12:51:20'),
(11, 'logout-user', NULL, NULL, '2018-10-26 13:39:45', '2018-10-26 13:39:45'),
(12, 'assign-role', NULL, NULL, '2018-10-28 23:33:02', '2018-10-28 23:33:02'),
(13, 'create-role', NULL, NULL, '2018-10-28 23:33:53', '2018-10-28 23:33:53'),
(14, 'create-permissions', NULL, NULL, '2018-10-28 23:34:06', '2018-10-28 23:34:06'),
(15, 'attach-permissions', NULL, NULL, '2018-10-28 23:34:17', '2018-10-28 23:34:17');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(10, 8),
(10, 11),
(11, 12),
(12, 8),
(13, 8),
(14, 8),
(15, 8);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(8, 'admin', NULL, NULL, '2018-10-26 06:05:11', '2018-10-26 06:05:11'),
(11, 'Reseller', NULL, NULL, '2018-10-26 06:09:36', '2018-10-26 06:09:36'),
(12, 'Client', NULL, NULL, '2018-10-26 06:10:15', '2018-10-26 06:10:15');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(8, 11),
(8, 12),
(9, 8),
(9, 12),
(11, 8),
(12, 8),
(13, 11),
(14, 12),
(16, 8),
(16, 11);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'testman', 'test@admi21.com', NULL, '$2y$10$XEU8WxD6uwjbLb1TPl1nZuIfa0NsvgjAGmnDVN9UmtlaXjOllvW.O', NULL, '2018-10-25 23:30:43', '2018-10-25 23:30:43'),
(3, 'testman', 'test@admi121.com', NULL, 'password', NULL, '2018-10-26 00:02:35', '2018-10-26 00:02:35'),
(4, 'testman', 'test@admi1211.com', NULL, 'password', NULL, '2018-10-26 00:02:55', '2018-10-26 00:02:55'),
(5, 'testman', 'test@aadmi1211.com', NULL, '$2y$10$IEji8Nn5W6GSVpQuWM2QHu6Ien.hQgR/8lBEKEMd9PQJ2UE/iuhg2', NULL, '2018-10-26 00:20:36', '2018-10-26 00:20:36'),
(6, 'testman', 'test@aadmi5.com', NULL, '$2y$10$c2RJvq9orh0Jsk4rWBaE5e.cJEWRtDjscv5qV8mBlXJcPV8r8PkuG', NULL, '2018-10-26 01:01:00', '2018-10-26 01:01:00'),
(7, 'testman', 'test@aadmi6.com', NULL, '$2y$10$YFFn77g1.FjSFJSazZMYYO5TL1CiROlmhn9PeTttzUSbNZft/QCBq', NULL, '2018-10-26 01:05:43', '2018-10-26 01:05:43'),
(8, 'poudelsandip', 'sandippoudel90@gmail.com', NULL, '$2y$10$uNQnMIIbP0h5kj2d3vIOpuGbsSw5va8nDOYkGVdLXRWD/ZOiYRdwu', NULL, '2018-10-26 01:07:09', '2018-10-26 01:07:09'),
(9, 'poudelsandip', 'sandippoudel95@gmail.com', NULL, '$2y$10$WDf6NgKQvByAu4yVPFi5nOI8vSzgKX7ZXcZjviVb8QZDM9IEIXPWK', NULL, '2018-10-26 01:10:21', '2018-10-26 01:10:21'),
(10, 'poudelsandip', 'sandippoudel97@gmail.com', NULL, '$2y$10$9rBSZH6iYn9CeC9g8bQJROwknOmMnQfTcPjKhJ8ZZmbn.dUwKpQ/y', NULL, '2018-10-26 01:17:44', '2018-10-26 01:17:44'),
(11, 'poudelsandip', 'sandippoudel99@gail.com', NULL, '$2y$10$YfKy.ToqApdq7ZSsGjoWBOAgkDA.9rkxAa0KvN50B7r1fT6zm3.iu', NULL, '2018-10-26 01:34:37', '2018-10-26 01:34:37'),
(12, 'easy', 'easy@admin.com', NULL, '$2y$10$qwRZ3E5f7tlATUnB8DLJMuCbC7SbAEf7d0ss.uxf/EKl6aH/xC1se', NULL, '2018-10-26 12:42:01', '2018-10-26 12:42:01'),
(13, 'easy', 'easys@admin.com', NULL, '$2y$10$z1xPL8oQL0kimA7EFNK5D.dIm/w0JX2UuPBq.cRgVLEU0UTonje/S', NULL, '2018-10-26 13:15:21', '2018-10-26 13:15:21'),
(14, 'easy', 'easyse@admin.com', NULL, '$2y$10$oQuVwumpKjZuUCx5e80ZLuN5glQBG1aGwt9DZxlTpmrSHk8zLT1Sa', NULL, '2018-10-26 13:41:47', '2018-10-26 13:41:47'),
(15, 'srvice', 'easyser@admin.com', NULL, '$2y$10$sVQuBj3CJC3Tb2u0CCtAY.xRP4Scx4c2ps5IP4s9XHww8kREH1PuG', NULL, '2018-10-26 14:11:03', '2018-10-26 14:11:03'),
(16, 'demo', 'demo@admin.com', NULL, '$2y$10$FaJdDj1nn8ggSI3n8bQhjul/7ymVlvTX0WfozDUfXJsJIDZwBC33i', NULL, '2018-10-28 23:15:00', '2018-10-28 23:15:00'),
(17, 'demoa', 'demo1@admin.com', NULL, '$2y$10$/hdbtQxwPtR8Ji9qYIcsLOXRWjmgMJDWo43uEiisOYPYZA1U6sm9.', NULL, '2018-10-28 23:51:20', '2018-10-28 23:51:20');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
