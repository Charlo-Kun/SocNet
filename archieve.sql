-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2023 at 09:03 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `archieve`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `MiddleName` varchar(255) NOT NULL,
  `suffix` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(50) DEFAULT NULL,
  `civil_status` varchar(30) DEFAULT NULL,
  `nationality` varchar(30) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `birthdate` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `bio` varchar(30) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `FirstName`, `LastName`, `MiddleName`, `suffix`, `profile_picture`, `civil_status`, `nationality`, `email`, `address`, `birthdate`, `gender`, `bio`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Christine Ivy', 'Campos', 'Ranan', NULL, 'profile_pictures/IMG_1813.JPG', 'Married', 'Filipino', 'ivyranan@gmail.com', 'poblacion', '2002-02-19', '', 'biot', '$2y$10$5i9PRCNjHACN/MPWabFwdu2s91hoiC9Xk8gG2cGUw5q3CALFHHSji', NULL, '2023-06-13 06:11:30', '2023-06-24 09:23:14'),
(2, 'jesos', 'Campos', 'Arcillas', 'Jr', 'profile_pictures/2.jpg', 'aa', 'aa', 'ronniecampos62@yahoo.com', 'sakl', '2023-06-13', '', 'biotjesic', '$2y$10$plWeKtrdAs07NRcRAQzlK.xyszidGMW3v6KOlqvNFi4zBjN3OHlfy', NULL, '2023-06-13 06:40:40', '2023-06-25 07:21:29'),
(3, 'Christine Ivy', 'ranan', 'Apilado', NULL, NULL, '0', '0', 'rananivy@gmail.com', '', '', '', NULL, '$2y$10$oCCPKh6fizzVzuvwsz081u54TLyjbu2O2BcXEKWDsxmsnpMLoexrC', NULL, '2023-06-14 21:37:06', '2023-06-14 21:37:06'),
(4, 'Ronnie', 'Campos', 'Arcillas', 'Jr', 'profile_pictures/IMG_1813.JPG', '0', '0', 'ronniecamposjr60@gmail.com', '', '', '', NULL, '$2y$10$DA8y.F6igADVqyU.QpW.ju8DbIIQB17SmcNYPxSfwjy65Fxjd1KFS', NULL, '2023-06-14 23:18:23', '2023-06-17 06:52:42'),
(5, 'Ronnie', 'ranan', 'Arcillas', 'Jr', NULL, '0', '0', 'ggezaf@gmail.com', 'gg st.', '2023-05-31', 'male', NULL, '$2y$10$YE8sH8TVm0/HgIeyRTwJteAg5FoXTg1nAJucbPip2R6z42aw0GRAC', NULL, '2023-06-17 04:37:31', '2023-06-17 04:37:31'),
(6, 'Christine Ivy', 'Campos', 'Ranan', NULL, 'profile_pictures/6.jpg', '0', '0', 'ronniecampos69@yahoo.com', 'lsdf', '2023-06-01', 'female', NULL, '$2y$10$gjjbWNdTt2yFBQLHbuyT4ORRYv1TIPBW2Os1OrEkBUFbrRxiqLGbS', NULL, '2023-06-17 04:40:40', '2023-06-17 07:05:58'),
(7, 'Christine Ivy', 'Campos', 'Ranan', 'Jr', NULL, '0', '0', 'ronniecampasfsosjr60@gmail.com', 'dsfmk', '2023-05-31', 'female', NULL, '$2y$10$prd2M2zFv4yztAFzfmsuIesSOvSPYeKN2/AfHyG7sJ.fYrEZAn7OW', NULL, '2023-06-17 04:41:59', '2023-06-17 04:41:59'),
(8, 'Christine Ivy', 'Campos', 'Arcillas', NULL, 'profile_pictures/IMG_20230331_091456[1].png', NULL, NULL, 'ronniecampos61@yahoo.com', 'dadsa', '2023-06-08', 'female', NULL, '$2y$10$3TKzfyFM7H6dV9TgLxrKmODNMNSpVObnEaiU1sSxT42fX.eWzwJBi', NULL, '2023-06-17 06:43:59', '2023-06-17 06:44:16'),
(9, 'Edlen', 'Dela Cruz', 'Gacad', NULL, 'profile_pictures/9.jpg', NULL, NULL, 'edlen@gmail.com', 'poblacion', '2023-01-10', 'female', 'biotjesic', '$2y$10$eErDtwUcMmhzW4ii0ztbju5LGbiKqGVWdMbeOrrc941p8TqEdsqhK', NULL, '2023-06-20 22:42:50', '2023-06-25 21:38:24'),
(10, 'Ronnie', 'Campos', 'Arcillas', 'Jr.', 'profile_pictures/10.jpg', NULL, NULL, 'ronniecamposjr69@gmail.com', 'Poblacion, Alaminos City', '1999-10-26', 'male', NULL, '$2y$10$6civ3/Omi2EAixV6Q2UhzeSQkYP4bFGI36kiHhF1URLHzjp76BsOa', NULL, '2023-06-24 22:23:55', '2023-06-24 22:24:40'),
(11, 'Christine Ivy', 'Dela Cruz', 'Ranan', NULL, 'profile_pictures/11.jfif', 'Separated', 'abnoy', 'ronniecampos60@yahoo.com', 'poblacion', '2023-06-21', 'female', 'hihi', '$2y$10$4pQuJDzI5ck7vSuD/7x7VOHvIOrVA4Y7/9K6AXFkwLPUaTF3GB6sa', NULL, '2023-06-25 07:22:40', '2023-06-25 21:34:51'),
(12, 'Christine Ivy', 'Dela Cruz', 'Ranan', NULL, NULL, NULL, NULL, 'christine12@gmail.com', 'poblacion', '2023-06-14', 'female', NULL, '$2y$10$FdV8.sI3P4FcW5t/K4of4.w9QNQ7msdbm6TcMe3rYuZmFNUI52v9a', NULL, '2023-06-25 07:35:09', '2023-06-25 07:35:09'),
(13, 'Christine Ivy', 'Apilado', 'Ranan', NULL, NULL, NULL, NULL, 'ivyron@gmail.com', 'poblacion', '2023-06-12', 'female', NULL, '$2y$10$7cEM8JXm1hMKsemCNzkOuu1wtb8D1R82sbInuLMjtfvjh5bCC4wQO', NULL, '2023-06-25 07:37:17', '2023-06-25 07:37:17');

-- --------------------------------------------------------

--
-- Table structure for table `captions`
--

CREATE TABLE `captions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(255) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `friend_id` int(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `friendships`
--

CREATE TABLE `friendships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(30) DEFAULT NULL,
  `friend_id` int(30) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `friendships`
--

INSERT INTO `friendships` (`id`, `user_id`, `friend_id`, `status`, `created_at`, `updated_at`) VALUES
(57, 4, 1, 'accepted', '2023-06-25 22:49:26', '2023-06-25 22:49:46'),
(58, 1, 4, 'accepted', '2023-06-25 22:49:46', '2023-06-25 22:49:46'),
(60, 9, 11, 'accepted', '2023-06-26 01:43:17', '2023-06-26 01:43:17');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `post_id`, `account_id`, `created_at`, `updated_at`) VALUES
(3, 4, 8, '2023-06-17 06:44:47', '2023-06-17 06:44:47'),
(6, 29, 9, '2023-06-20 22:46:43', '2023-06-20 22:46:43'),
(53, 28, 2, '2023-06-24 03:00:20', '2023-06-24 03:00:20'),
(54, 35, 2, '2023-06-24 03:42:56', '2023-06-24 03:42:56'),
(55, 31, 2, '2023-06-24 03:43:15', '2023-06-24 03:43:15'),
(56, 30, 2, '2023-06-24 03:43:23', '2023-06-24 03:43:23'),
(57, 2, 2, '2023-06-24 03:46:13', '2023-06-24 03:46:13'),
(59, 32, 2, '2023-06-24 04:07:36', '2023-06-24 04:07:36'),
(60, 12, 2, '2023-06-24 04:08:14', '2023-06-24 04:08:14'),
(62, 4, 2, '2023-06-24 04:09:44', '2023-06-24 04:09:44'),
(67, 39, 2, '2023-06-24 06:18:55', '2023-06-24 06:18:55'),
(68, 38, 2, '2023-06-24 06:40:52', '2023-06-24 06:40:52'),
(69, 1, 2, '2023-06-24 08:40:02', '2023-06-24 08:40:02'),
(70, 14, 2, '2023-06-24 08:40:10', '2023-06-24 08:40:10'),
(74, 41, 4, '2023-06-25 07:52:12', '2023-06-25 07:52:12'),
(76, 41, 1, '2023-06-25 08:17:29', '2023-06-25 08:17:29'),
(77, 40, 1, '2023-06-25 08:20:56', '2023-06-25 08:20:56'),
(78, 44, 11, '2023-06-25 21:30:07', '2023-06-25 21:30:07'),
(79, 31, 11, '2023-06-25 21:35:32', '2023-06-25 21:35:32'),
(81, 45, 11, '2023-06-25 21:55:16', '2023-06-25 21:55:16'),
(83, 43, 11, '2023-06-25 21:59:54', '2023-06-25 21:59:54'),
(84, 42, 11, '2023-06-25 22:03:55', '2023-06-25 22:03:55'),
(86, 32, 1, '2023-06-26 00:38:51', '2023-06-26 00:38:51'),
(87, 47, 11, '2023-06-26 01:40:37', '2023-06-26 01:40:37'),
(88, 32, 11, '2023-06-26 01:46:35', '2023-06-26 01:46:35');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(117, '2014_10_12_000000_create_users_table', 1),
(118, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(119, '2019_08_19_000000_create_failed_jobs_table', 1),
(120, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(121, '2023_06_12_085409_create_accounts_table', 1),
(122, '2023_06_12_085419_create_messages_table', 1),
(123, '2023_06_12_085428_create_posts_table', 1),
(124, '2023_06_12_085441_create_captions_table', 1),
(125, '2023_06_12_085454_create_comments_table', 1),
(128, '2023_06_13_112544_create_post_likes_table', 2),
(129, '2023_06_15_070236_create_likes_table', 2),
(130, '2023_06_25_064506_create_friendships_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(255) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `friend_id` int(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_id` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `post_picture` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `account_id`, `content`, `post_picture`, `created_at`, `updated_at`) VALUES
(1, '1', 'hmm', NULL, '2023-06-13 06:11:37', '2023-06-13 06:11:37'),
(2, '1', 'ronnie', NULL, '2023-06-13 06:39:50', '2023-06-13 06:39:50'),
(4, '3', 'ronnie', NULL, '2023-06-14 21:37:24', '2023-06-14 21:37:24'),
(12, '1', 'dasdaa', 'post_pictures/.jfif', '2023-06-17 18:29:08', '2023-06-17 18:29:08'),
(14, '1', 'wadds', 'post_pictures/.JPG', '2023-06-17 18:31:22', '2023-06-17 18:31:22'),
(28, '2', 'post tayo ulit', 'post_pictures/28.png', '2023-06-18 00:12:43', '2023-06-18 00:12:43'),
(29, '2', 'gg', 'post_pictures/29.jpg', '2023-06-18 22:21:38', '2023-06-18 22:21:38'),
(30, '9', 'sheeessh', 'post_pictures/30.jpg', '2023-06-20 22:44:27', '2023-06-20 22:44:27'),
(31, '9', 'gg', NULL, '2023-06-20 22:46:06', '2023-06-20 22:46:06'),
(32, '9', 'aksdksadj', 'post_pictures/32.jpg', '2023-06-20 22:46:19', '2023-06-20 22:46:19'),
(35, '2', 'hgjh', 'post_pictures/35.PNG', '2023-06-22 02:28:00', '2023-06-22 02:28:00'),
(36, '2', 'ggez', 'post_pictures/36.png', '2023-06-24 04:25:19', '2023-06-24 04:25:20'),
(37, '2', 'dasdada', 'post_pictures/37.JPG', '2023-06-24 04:27:14', '2023-06-24 04:27:14'),
(38, '2', 'ssadada', NULL, '2023-06-24 04:28:14', '2023-06-24 04:28:14'),
(39, '2', 'dasdas', 'post_pictures/39.PNG', '2023-06-24 06:18:50', '2023-06-24 06:18:50'),
(40, '10', 'gg', 'post_pictures/40.avif', '2023-06-25 04:44:59', '2023-06-25 04:44:59'),
(41, '2', 'gg', 'post_pictures/41.jpg', '2023-06-25 06:22:14', '2023-06-25 06:22:14'),
(42, '1', 'try', NULL, '2023-06-25 08:15:27', '2023-06-25 08:15:27'),
(43, '10', 'ez', NULL, '2023-06-25 08:26:39', '2023-06-25 08:26:39'),
(44, '11', 'hi', NULL, '2023-06-25 21:29:47', '2023-06-25 21:29:47'),
(45, '11', 'huyu', 'post_pictures/45.avif', '2023-06-25 21:31:40', '2023-06-25 21:31:40'),
(47, '11', 'okay', NULL, '2023-06-25 21:59:16', '2023-06-25 21:59:16');

-- --------------------------------------------------------

--
-- Table structure for table `post_likes`
--

CREATE TABLE `post_likes` (
  `like_id` bigint(20) UNSIGNED NOT NULL,
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `accounts_email_unique` (`email`);

--
-- Indexes for table `captions`
--
ALTER TABLE `captions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friendships`
--
ALTER TABLE `friendships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_post_id_foreign` (`post_id`),
  ADD KEY `likes_account_id_foreign` (`account_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_likes`
--
ALTER TABLE `post_likes`
  ADD PRIMARY KEY (`like_id`),
  ADD KEY `post_likes_account_id_foreign` (`account_id`),
  ADD KEY `post_likes_post_id_foreign` (`post_id`);

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
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `captions`
--
ALTER TABLE `captions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friendships`
--
ALTER TABLE `friendships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `post_likes`
--
ALTER TABLE `post_likes`
  MODIFY `like_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_likes`
--
ALTER TABLE `post_likes`
  ADD CONSTRAINT `post_likes_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_likes_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
