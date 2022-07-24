-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 22, 2021 at 07:33 AM
-- Server version: 10.3.25-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hamrosch_liveDatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ratings` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `bloggable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bloggable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_count` int(11) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discussions`
--

CREATE TABLE `discussions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visibility_status` tinyint(1) NOT NULL DEFAULT 1,
  `comment_status` tinyint(1) NOT NULL DEFAULT 1,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `approved_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discussions`
--

INSERT INTO `discussions` (`id`, `user_id`, `parent_id`, `title`, `description`, `visibility_status`, `comment_status`, `is_verified`, `approved_by_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Nam qui quo aut dolorem laborum. Deleniti dolores ex at fuga ipsa.', 'Optio velit quibusdam at non non repellendus deleniti. A sed reprehenderit et rerum facere. Ut et ea est sint nihil totam non. Sed tenetur inventore in odit reprehenderit dolore aut. Eius veritatis cum est nemo dolor eos. Quibusdam explicabo sit officia sed. Eligendi quia quo nihil qui similique autem voluptates. Quod quis aut ratione consequatur aut mollitia.', 1, 1, 1, 1, NULL, '2021-04-20 17:50:55', '2021-04-20 17:50:55'),
(2, 1, NULL, 'Et qui voluptatum voluptatibus doloremque at. Qui veniam quae esse. Hic magni maxime sed inventore.', 'Rem eum doloremque quia qui. Voluptatem tenetur quam reiciendis temporibus rerum sint voluptas. Autem accusantium tempore id. Voluptates dolorem qui aliquam enim ad et. Quia tempora accusamus quasi recusandae ad debitis ut. Molestiae ipsum odio vero. Quasi consequuntur at ad ullam reiciendis non.', 1, 1, 1, 1, NULL, '2021-04-20 17:50:55', '2021-04-20 17:50:55'),
(3, 1, NULL, 'Est nihil dolorum dolor est. Ut at temporibus quia et aut quas.', 'Doloribus et veniam quia molestiae et in. Reiciendis in natus sit aspernatur voluptate. Quae aut odit totam eaque saepe vel id. Possimus est asperiores laudantium neque reiciendis harum. Ea quis nulla facere distinctio beatae accusamus excepturi. Deserunt sequi ex ut. Blanditiis quasi quis at odio magnam ut omnis. Ea modi eius quia dolores.', 1, 1, 1, 1, NULL, '2021-04-20 17:50:55', '2021-04-20 17:50:55'),
(4, 1, NULL, 'Dolor eligendi est ut totam. Ab enim repellendus cupiditate est nobis quaerat eum in.', 'Veritatis est ratione ducimus quas esse quis iusto. Numquam numquam et et repudiandae a est. Earum ut et aut et blanditiis perspiciatis omnis. Odio dignissimos in fugiat veritatis voluptatum. Rem aut aut accusantium numquam dolores. Et nostrum adipisci tenetur nesciunt. Impedit maxime est dolorem ut. Blanditiis suscipit eveniet voluptatem sunt aut perferendis praesentium soluta.', 1, 1, 1, 1, NULL, '2021-04-20 17:50:55', '2021-04-20 17:50:55'),
(5, 1, NULL, 'Eum unde optio labore fugiat numquam. Tempora sunt nostrum officiis quaerat magni.', 'Sed est tenetur soluta est. Illum repellat qui id eveniet autem molestiae. Ex aliquid exercitationem nemo repudiandae magnam vel. Blanditiis autem nobis et porro enim illo.', 1, 1, 1, 1, NULL, '2021-04-20 17:50:55', '2021-04-20 17:50:55'),
(6, 1, NULL, 'Omnis consectetur dolores aut. Nesciunt voluptas ut doloremque est asperiores eligendi.', 'Ad debitis ea quis nisi. Veritatis autem error reprehenderit dolore consequuntur magni voluptatibus. Earum veritatis labore quis dolor eaque reiciendis. Debitis expedita ullam corrupti ut eos sed omnis. Qui vel est et pariatur sunt non. Aspernatur iste eos placeat libero.', 1, 1, 1, 1, NULL, '2021-04-20 17:50:55', '2021-04-20 17:50:55');

-- --------------------------------------------------------

--
-- Table structure for table `discussion_likes`
--

CREATE TABLE `discussion_likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `discussion_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discussion_ratings`
--

CREATE TABLE `discussion_ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `discussion_id` bigint(20) UNSIGNED NOT NULL,
  `ratings` double(8,2) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discussion_subjects`
--

CREATE TABLE `discussion_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `discussion_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `province_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `province_id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Bhojpur', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(2, 1, 'Dhankuta', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(3, 1, 'Illam', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(4, 1, 'Jhapa', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(5, 1, 'Khotang', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(6, 1, 'Morang', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(7, 1, 'Okhaldhunga', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(8, 1, 'Panchthar', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(9, 1, 'Sankhuwasabha', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(10, 1, 'Solukhumbu', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(11, 1, 'Sunsari', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(12, 1, 'Taplejung', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(13, 1, 'Tehrathum', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(14, 1, 'Udaypur', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(15, 2, 'Bara', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(16, 2, 'Dhanusha', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(17, 2, 'Mahottari', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(18, 2, 'Parsa', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(19, 2, 'Rautahat', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(20, 2, 'Saptari', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(21, 2, 'Sarlahi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(22, 2, 'Siraha', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(23, 3, 'Sindhuli', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(24, 3, 'Ramechhap', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(25, 3, 'Dolakha', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(26, 3, 'Bhaktapur', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(27, 3, 'Dhading', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(28, 3, 'Kathmandu', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(29, 3, 'Kavrepalanchowk', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(30, 3, 'Lalitpur', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(31, 3, 'Nuwakot', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(32, 3, 'Rasuwa', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(33, 3, 'Sindhupalchowk', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(34, 3, 'Chitwan', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(35, 3, 'Makwanpur', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(36, 4, 'Baglung', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(37, 4, 'Gorkha', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(38, 4, 'Kaski', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(39, 4, 'Lamjung', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(40, 4, 'Manang', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(41, 4, 'Mustang', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(42, 4, 'Myagdi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(43, 4, 'Nawalpur', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(44, 4, 'Parbat', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(45, 4, 'Syangja', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(46, 4, 'Tanahun', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(47, 5, 'Arghakhanchi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(48, 5, 'Banke', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(49, 5, 'Bardiya', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(50, 5, 'Dang', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(51, 5, 'Eastern Rukum', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(52, 5, 'Gulmi', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(53, 5, 'Kapilvastu', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(54, 5, 'Parasi', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(55, 5, 'Palpa', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(56, 5, 'Pyuthan', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(57, 5, 'Rolpa', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(58, 5, 'Rupandehi', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(59, 6, 'Western Rukum', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(60, 6, 'Salyan', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(61, 6, 'Dolpa', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(62, 6, 'Humla', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(63, 6, 'Jumla', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(64, 6, 'Kalikot', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(65, 6, 'Muga', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(66, 6, 'Surkhet', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(67, 6, 'Dailekh', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(68, 6, 'Jajarkot', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(69, 7, 'Achham', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(70, 7, 'Baitadi', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(71, 7, 'Bajhang', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(72, 7, 'Bajura', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(73, 7, 'Dadeldhura', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(74, 7, 'Darchula', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(75, 7, 'Doti', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(76, 7, 'Kailali', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `education_materials`
--

CREATE TABLE `education_materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `materialable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `materialable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_count` int(11) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `title`, `slug`, `subject`, `email_from`, `content`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'School Registered', 'school_added', 'Registered Successfully', 'hello@example.com', '<p>Dear [PRINCIPAL_NAME]</p><p><br><strong> Congratulations! </strong> </p><p>Your school <strong> [SCHOOL_NAME] </strong> has been successfully registered in Hamro School platform.</p><p> Please use [EMAIL] as an email or [USERNAME] as a username and [PASSWORD] as a password to login into your profile.</p><br><p>Thank you</p> <br> <p>Hamro School Team</p><br>', NULL, '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(2, 'User Registered', 'user_registered', 'Registered Successfully', 'hello@example.com', '<p>Dear [USER_NAME]</p><p><br><strong> Congratulations! </strong> </p><p>Your account has been successfully registered in Hamro School platform.</p><p> Please use [EMAIL] as an email or [USERNAME] as a username and [PASSWORD] as a password to login into your profile.</p><br><p>Thank you</p> <br> <p>Hamro School Team</p><br>', NULL, '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(3, 'Self School Registered', 'self_school_registered', 'Registered Successfully', 'hello@example.com', '<p>Dear [USER_NAME]</p><p><br><strong> Congratulations! </strong> </p><p>Your school <strong> [SCHOOL_NAME] </strong> has been successfully registered in Hamro School platform and is in the process of verification.</p><p>We will let you know once we verify you.</p><br><p>Thank you</p> <br> <p>Hamro School Team</p><br>', NULL, '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(4, 'Self Registered', 'self_registered', 'Registered Successfully', 'hello@example.com', '<p>Dear [USER_NAME]</p><p><br><strong> Congratulations! </strong> </p><p>Your account has been successfully registered in Hamro School platform and is in the process of verification.</p><p>We will let you know once we verify you.</p><br><p>Thank you</p> <br> <p>Hamro School Team</p><br>', NULL, '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(5, 'Account Verified', 'account_verified', 'Account Verified', 'hello@example.com', '<p>Dear [USER_NAME]</p><p><br><strong> Congratulations! </strong> </p><p>Your account has been successfully verified.</p><br><p>Thank you</p> <br> <p>Hamro School Team</p><br>', NULL, '2021-04-20 17:50:53', '2021-04-20 17:50:53');

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
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grade_teacher`
--

CREATE TABLE `grade_teacher` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grade_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guardians`
--

CREATE TABLE `guardians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guardian_school`
--

CREATE TABLE `guardian_school` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `guardian_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guests`
--

CREATE TABLE `guests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `group_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` enum('admin','employee','business') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `order` int(11) NOT NULL,
  `related_routes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `parent_id`, `group_id`, `type`, `title`, `class`, `icon`, `route`, `url`, `is_active`, `order`, `related_routes`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'admin', 'Dashboard', 'nav-item', 'fa fa-envelope', 'admin.dashboard', NULL, 1, 1, 'admin.dashboard', '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(2, NULL, 1, 'admin', 'Email Template', 'nav-item', 'fa fa-envelope', 'admin.email-template.index', NULL, 1, 2, 'admin.email-template.index,admin.email-template.create,admin.email-template.edit,admin.email-template.destroy', '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(3, NULL, 1, 'admin', 'Academics', 'nav-item', 'fa fa-envelope', 'admin.academics.grade.index', NULL, 1, 3, 'admin.academics.grade.index,admin.academics.grade.create,admin.academics.grade.edit,admin.academics.subject.index,admin.academics.subject.create,admin.academics.subject.edit', '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(4, 3, 1, 'admin', 'Grade', 'nav-item', 'fa fa-envelope', 'admin.academics.grade.index', NULL, 1, 1, 'admin.academics.grade.index,admin.academics.grade.create,admin.academics.grade.edit', '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(5, 3, 1, 'admin', 'Subject', 'nav-item', 'fa fa-envelope', 'admin.academics.subject.index', NULL, 1, 2, 'admin.academics.subject.index,admin.academics.subject.create,admin.academics.subject.edit', '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(6, NULL, 1, 'admin', 'Locations', 'nav-item', 'fa fa-envelope', 'admin.province.index', NULL, 1, 4, 'admin.province.index,admin.province.create,admin.province.edit,admin.district.index,admin.district.create,admin.district.edit,admin.municipality.index,admin.municipality.create,admin.municipality.edit', '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(7, 6, 1, 'admin', 'Province', 'nav-item', 'fa fa-envelope', 'admin.province.index', NULL, 1, 1, 'admin.province.index,admin.province.create,admin.province.edit', '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(8, 6, 1, 'admin', 'District', 'nav-item', 'fa fa-envelope', 'admin.district.index', NULL, 1, 2, NULL, '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(9, 6, 1, 'admin', 'Municipality', 'nav-item', 'fa fa-envelope', 'admin.municipality.index', NULL, 1, 3, NULL, '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(10, NULL, 1, 'admin', 'Users', 'nav-item', 'fa fa-envelope', 'admin.user.school', NULL, 1, 5, 'admin.user.school.index,admin.user.school.create,admin.user.school.edit,admin.user.school.show,admin.user.teacher.index,admin.user.teacher.create,admin.user.teacher.edit,admin.user.teacher.show,admin.user.student.index,admin.user.student.create,admin.user.student.edit,admin.user.student.show,admin.user.moderator.index,admin.user.moderator.create,admin.user.moderator.edit,admin.user.moderator.show', '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(11, 10, 1, 'admin', 'School', 'nav-item', 'fa fa-envelope', 'admin.user.school.index', NULL, 1, 1, 'admin.user.school.create,admin.user.school.edit,admin.user.school.show', '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(12, 10, 1, 'admin', 'Teacher', 'nav-item', 'fa fa-envelope', 'admin.user.teacher.index', NULL, 1, 1, 'admin.user.teacher.create,admin.user.teacher.edit,admin.user.teacher.show', '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(13, 10, 1, 'admin', 'Student', 'nav-item', 'fa fa-envelope', 'admin.user.student.index', NULL, 1, 1, 'admin.user.student.create,admin.user.student.edit,admin.user.student.show', '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(14, 10, 1, 'admin', 'Moderator', 'nav-item', 'fa fa-envelope', 'admin.user.moderator.index', NULL, 1, 1, 'admin.user.moderator.create,admin.user.moderator.edit,admin.user.moderator.show', '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(15, NULL, 1, 'admin', 'Settings', 'nav-item', 'fa fa-cogs', 'admin.setting.index', NULL, 1, 4, 'admin.setting.index,admin.setting.edit', '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(16, NULL, 2, 'admin', 'Dashboard', 'nav-item', 'fa fa-envelope', 'school.dashboard', NULL, 1, 1, 'school.dashboard', '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(17, NULL, 2, 'admin', 'Users', 'nav-item', 'fa fa-envelope', 'school.teacher.index', NULL, 1, 2, 'school.school,school.principal,school.teacher,school.student.index,school.student.create,school.student.edit,school.student.show', '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(18, 17, 2, 'admin', 'Teacher', 'nav-item', 'fa fa-envelope', 'school.teacher.index', NULL, 1, 1, NULL, '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(19, 17, 2, 'admin', 'Student', 'nav-item', 'fa fa-envelope', 'school.student.index', NULL, 1, 2, 'school.student.create,school.student.edit,school.student.show', '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(20, NULL, 2, 'admin', 'School Description', 'nav-item', 'fa fa-newspaper', 'school.description.index', NULL, 1, 3, 'school.description.index,school.description.create,school.description.edit,school.description.destroy,school.description.show', '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(21, NULL, 2, 'admin', 'Principal Message', 'nav-item', 'fa fa-newspaper', 'school.principal_message.index', NULL, 1, 4, 'school.principal_message.index,school.principal_message.create,school.principal_message.edit,school.principal_message.destroy,school.principal_message.show', '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(22, NULL, 2, 'admin', 'Blogs', 'nav-item', 'fa fa-newspaper', 'school.blog.index', NULL, 1, 5, 'school.blog.index,school.blog.create,school.blog.edit,school.blog.destroy,school.blog.show', '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(23, NULL, 2, 'admin', 'Notices', 'nav-item', 'fa fa-newspaper', 'school.notice.index', NULL, 1, 6, 'school.notice.index,school.notice.create,school.notice.edit,school.notice.show,school.notice.destroy', '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(24, NULL, 2, 'admin', 'Education Materials', 'nav-item', 'fa fa-envelope', 'school.education_material.index', NULL, 1, 7, 'school.education_material.index,school.education_material.create,school.education_material.edit,school.education_material.show,school.education_material.destroy', '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(25, NULL, 5, 'admin', 'Dashboard', 'nav-item', 'fa fa-envelope', 'student.dashboard', NULL, 1, 1, 'student.dashboard', '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(26, NULL, 5, 'admin', 'Blogs', 'nav-item', 'fa fa-newspaper', 'student.blog.index', NULL, 1, 2, 'student.blog.index,student.blog.show', '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(27, NULL, 5, 'admin', 'Notices', 'nav-item', 'fa fa-newspaper', 'student.notice.index', NULL, 1, 3, 'student.notice.index,student.notice.show', '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(28, NULL, 5, 'admin', 'Education Materials', 'nav-item', 'fa fa-envelope', 'student.education-material.index', NULL, 1, 4, 'student.education-material.index,student.education-material.show', '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(29, NULL, 5, 'admin', 'Discussions', 'nav-item', 'fa fa-envelope', 'student.discussion.index', NULL, 1, 4, 'student.discussion.index,student.my-post.index,student.my-post.create,student.my-post.edit', '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(30, NULL, 4, 'admin', 'Dashboard', 'nav-item', 'fa fa-envelope', 'teacher.dashboard', NULL, 1, 1, 'teacher.dashboard', '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(31, NULL, 4, 'admin', 'Blogs', 'nav-item', 'fa fa-newspaper', 'teacher.blog.index', NULL, 1, 2, 'teacher.blog.index,teacher.blog.show', '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(32, NULL, 4, 'admin', 'Notices', 'nav-item', 'fa fa-newspaper', 'teacher.notice.index', NULL, 1, 3, 'teacher.notice.index,teacher.notice.show', '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(33, NULL, 4, 'admin', 'Education Materials', 'nav-item', 'fa fa-envelope', 'teacher.education_material.index', NULL, 1, 4, 'teacher.education_material.index,teacher.education_material.create,teacher.education_material.edit,teacher.education_material.show,teacher.education_material.destroy', '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(34, NULL, 4, 'admin', 'Discussions', 'nav-item', 'fa fa-envelope', 'teacher.discussion.index', NULL, 1, 4, 'teacher.discussion.index,teacher.my-post.index,teacher.my-post.create,teacher.my-post.edit', '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(35, NULL, 6, 'admin', 'Discussion', 'nav-item', 'fa fa-envelope', 'moderator.discussion.pending', NULL, 1, 2, 'moderator.discussion.approved', '2021-04-20 17:50:53', '2021-04-20 17:50:53');

-- --------------------------------------------------------

--
-- Table structure for table `menu_groups`
--

CREATE TABLE `menu_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_groups`
--

INSERT INTO `menu_groups` (`id`, `title`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 1, '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(2, 'School', 2, '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(3, 'Principal', 3, '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(4, 'Teacher', 4, '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(5, 'Student', 5, '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(6, 'Moderator', 6, '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(7, 'FrontMenu', 7, '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(8, 'FrontMobileMenu', 8, '2021-04-20 17:50:53', '2021-04-20 17:50:53');

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
(4, '2020_10_06_162041_create_roles_table', 1),
(5, '2020_10_06_162125_create_email_templates_table', 1),
(6, '2020_10_13_034607_create_menu_groups_table', 1),
(7, '2020_10_13_034633_create_menus_table', 1),
(8, '2020_10_15_031624_create_questions_table', 1),
(9, '2020_10_15_031734_create_answers_table', 1),
(10, '2020_10_15_032448_create_schools_table', 1),
(11, '2020_10_15_032525_create_teachers_table', 1),
(12, '2020_10_15_032626_create_grades_table', 1),
(13, '2020_10_15_032630_create_subjects_table', 1),
(14, '2020_10_15_032830_create_students_table', 1),
(15, '2020_10_15_032931_create_education_materials_table', 1),
(16, '2020_10_15_033031_create_provinces_table', 1),
(17, '2020_10_15_033032_create_districts_table', 1),
(18, '2020_10_15_033033_create_municipalities_table', 1),
(19, '2020_10_15_054917_create_school_teacher_table', 1),
(20, '2020_10_15_063635_create_grade_teacher_table', 1),
(21, '2020_11_06_043813_create_principals_table', 1),
(22, '2020_12_01_103138_create_notices_table', 1),
(23, '2020_12_02_163108_create_sections_table', 1),
(24, '2020_12_06_060230_create_settings_table', 1),
(25, '2020_12_06_115609_create_parent_school_table', 1),
(26, '2020_12_06_131820_create_guardians_table', 1),
(27, '2020_12_06_131932_create_guardian_school_table', 1),
(28, '2020_12_07_090718_create_blogs_table', 1),
(29, '2020_12_30_024319_create_jobs_table', 1),
(30, '2021_01_06_145639_create_subject_teacher_table', 1),
(31, '2021_01_10_110701_create_discussions_table', 1),
(32, '2021_01_10_112043_create_discussion_likes_table', 1),
(33, '2021_01_10_112057_create_discussion_ratings_table', 1),
(34, '2021_01_10_120700_create_discussion_subjects_table', 1),
(35, '2021_01_29_063704_create_moderators_table', 1),
(36, '2021_01_29_064259_create_moderator_subject_table', 1),
(37, '2021_02_18_031303_create_guests_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `moderators`
--

CREATE TABLE `moderators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `moderator_subject`
--

CREATE TABLE `moderator_subject` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `moderator_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `municipalities`
--

CREATE TABLE `municipalities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `municipalities`
--

INSERT INTO `municipalities` (`id`, `district_id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Bhojpur', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(2, 1, 'Shadanand', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(3, 1, 'Hatuwagadhi', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(4, 1, 'Ramprasad Rai', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(5, 1, 'Aamchok', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(6, 1, 'Tymke maiyunm', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(7, 1, 'Arun Gaupalika', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(8, 1, 'Pauwadungma', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(9, 1, 'Salpasilichho', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(10, 2, 'Dhankuta', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(11, 2, 'Pakhribas', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(12, 2, 'Mahalaxmi', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(13, 2, 'Sangurigadhi', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(14, 2, 'Chaubise', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(15, 2, 'Khalsa chhintang Sahidbhumi', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(16, 2, 'Chhathar jorpati', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(17, 3, 'Illam', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(18, 3, 'Deumai', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(19, 3, 'Mai municipality', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(20, 3, 'Suryodaya', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(21, 3, 'Phakphotum', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(22, 3, 'Maijogmai', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(23, 3, 'Chulachuli', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(24, 3, 'Rong', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(25, 3, 'Mangsebung', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(26, 3, 'Sandak', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(27, 4, 'Mechinagar', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(28, 4, 'Bhadrapur', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(29, 4, 'Birtamod', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(30, 4, 'Arjundhara', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(31, 4, 'Kankai', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(32, 4, 'Shivasatakshi', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(33, 4, 'Gauradaha', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(34, 4, 'Damak', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(35, 4, 'Buddhashanti', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(36, 4, 'Haldibari', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(37, 4, 'Kachankawal', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(38, 4, 'Barhadashi', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(39, 4, 'Jhapa', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(40, 4, 'Gauriganj', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(41, 4, 'Kamal', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(42, 5, 'Diktel Rupakot Majhuwagadhi', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(43, 5, 'Halesi Tuwachung', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(44, 5, 'Khotehang', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(45, 5, 'Diprung', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(46, 5, 'Aiselukharka', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(47, 5, 'Jantedhunga', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(48, 5, 'Kepilasgadhi', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(49, 5, 'Barahpokhari', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(50, 5, 'Ruwabesi', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(51, 5, 'Sakela', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(52, 6, 'Biratnagar', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(53, 6, 'Sundarharaicha', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(54, 6, 'Belbari', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(55, 6, 'Pathari Sanischare', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(56, 6, 'Urlabari', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(57, 6, 'Rangeli', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(58, 6, 'Letang Bhogateni', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(59, 6, 'Ratuwamai', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(60, 6, 'Sunawarshi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(61, 6, 'Kerabari', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(62, 6, 'Miklajung', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(63, 6, 'Kanepokhari', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(64, 6, 'Budhiganga', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(65, 6, 'Gramthan', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(66, 6, 'Katahari', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(67, 6, 'Dhanpalthan', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(68, 6, 'Jahada', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(69, 7, 'Siddhicharan', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(70, 8, 'Phidim', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(71, 8, 'Kummayak', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(72, 8, 'Miklajung', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(73, 8, 'Phalelung', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(74, 8, 'Phalgunanda', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(75, 8, 'Tumbewa', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(76, 8, 'Yangawarak', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(77, 8, 'Hilihang', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(78, 9, 'Bhotkhola', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(79, 9, 'Chichila', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(80, 9, 'Makalu', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(81, 9, 'Sabhapokhari', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(82, 9, 'Silichong', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(83, 9, 'Chainpur', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(84, 9, 'Dharmadevi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(85, 9, 'Khandbari', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(86, 9, 'Madi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(87, 9, 'Panchakhapan', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(88, 10, 'Solududhkunda', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(89, 10, 'Dudhakaushika', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(90, 10, 'Necha Salyan', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(91, 10, 'Dudhkoshi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(92, 10, 'Maha Kulung', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(93, 10, 'Sotang', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(94, 10, 'LIkhu pike', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(95, 10, 'Khumbu Pasanglhamu', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(96, 11, 'Itahari', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(97, 11, 'Dharan', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(98, 11, 'Inaruwa', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(99, 11, 'Duhabi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(100, 11, 'Ramdhuni', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(101, 11, 'Barachhetra', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(102, 11, 'Koshi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(103, 11, 'Gadhi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(104, 11, 'Birju', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(105, 11, 'Bhokraha Narashingh', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(106, 11, 'Harinagara', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(107, 11, 'Dewanganj', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(108, 12, 'Aathrai Triveni', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(109, 12, 'Sidingwa', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(110, 12, 'Sirijangha', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(111, 12, 'Mikkwakhola', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(112, 12, 'Meringden', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(113, 12, 'Maiwakhola', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(114, 12, 'Pathibhara Yangwarak', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(115, 12, 'Fatthanglung', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(116, 12, 'Phungling', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(117, 13, 'Aathrai', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(118, 13, 'Chhathar', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(119, 13, 'Phedap', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(120, 13, 'Menchayayem', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(121, 13, 'Myanglung', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(122, 13, 'Lagigurans', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(123, 14, 'Triyuga', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(124, 14, 'Katari', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(125, 14, 'Chaudandigadhi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(126, 14, 'Belaka', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(127, 14, 'Udayapurgadhi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(128, 14, 'Rautamai', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(129, 14, 'Tapli', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(130, 14, 'Limchungbung', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(131, 15, 'Kalaiya', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(132, 15, 'Jeetpur Simara', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(133, 15, 'Kolhabari', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(134, 15, 'Nijgadh', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(135, 15, 'Mahagadhimai', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(136, 15, 'Simraungadh', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(137, 15, 'Pacharauta', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(138, 15, 'Pheta', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(139, 15, 'Bishrampur', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(140, 15, 'Prasauni', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(141, 15, 'Adarsh Kotwal', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(142, 15, 'Karaiyamai', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(143, 15, 'Devtal', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(144, 15, 'Parwani', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(145, 15, 'Baragadhi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(146, 15, 'Suwarna', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(147, 16, 'Janakpur', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(148, 16, 'Chhireshwarnath', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(149, 16, 'Ganeshman Charanath', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(150, 16, 'Dhanusadham', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(151, 16, 'Nagarain', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(152, 16, 'Bideha', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(153, 16, 'Mithila', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(154, 16, 'Sahidnagar', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(155, 16, 'Sabaila', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(156, 16, 'Kamala', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(157, 16, 'Mithila Bihari', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(158, 16, 'Hansapur', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(159, 16, 'Janaknandani', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(160, 16, 'Baleshwar', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(161, 16, 'Mukhiyapatti Musharniya', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(162, 16, 'Lakshminya', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(163, 16, 'Aurahi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(164, 16, 'Dhanauji', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(165, 17, 'Aurahi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(166, 17, 'Balawa', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(167, 17, 'Bardibas', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(168, 17, 'Bhangaha', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(169, 17, 'Gaushala', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(170, 17, 'Jaleshwor', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(171, 17, 'Loharpatti', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(172, 17, 'Manarashiswa', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(173, 17, 'Matihani', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(174, 17, 'Ramgopalpur', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(175, 17, 'Ekdara', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(176, 17, 'Mahottari', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(177, 17, 'Pipara', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(178, 17, 'Samsi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(179, 17, 'Sonama', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(180, 18, 'Birjung', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(181, 18, 'Bahudarmi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(182, 18, 'Parsagadhi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(183, 18, 'Pokhariya', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(184, 18, 'Bindabasni', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(185, 18, 'Dhobini', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(186, 18, 'Chhipaharmai', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(187, 18, 'Jagarnathpur', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(188, 18, 'Jirabhawani', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(189, 18, 'Kalikamai', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(190, 18, 'Pakaha Mainpur', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(191, 18, 'Paterwa Sugauli', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(192, 18, 'Thori', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(193, 18, 'Sakhuwa Parsauni', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(194, 19, 'Baudhimai', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(195, 19, 'Brindaban', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(196, 19, 'Chandrapur', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(197, 19, 'Dewahi Gahani', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(198, 19, 'Gadhimai', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(199, 19, 'Garuda', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(200, 19, 'Gaur', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(201, 19, 'Gujara', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(202, 19, 'Ishanath', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(203, 19, 'Katahariya', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(204, 19, 'Madhav Narayan', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(205, 19, 'Maulapur', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(206, 19, 'Paroha', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(207, 19, 'Phatuwa Bijayapur', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(208, 19, 'Rajdevi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(209, 19, 'Rajpur', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(210, 19, 'Durga Bhagwati', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(211, 19, 'Yamunamai', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(212, 20, 'Bodebarsain', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(213, 20, 'Dakneshwori', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(214, 20, 'Hanumannagar Kankalini', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(215, 20, 'Kanchanrup', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(216, 20, 'Khadak', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(217, 20, 'Sambhunath', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(218, 20, 'Saptakoshi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(219, 20, 'Surunga', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(220, 20, 'Rajbiraj', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(221, 20, 'Agnisaira Krishnasavaran', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(222, 20, 'Balan Bihul', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(223, 20, 'Rajgadh', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(224, 20, 'Bishnupur', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(225, 20, 'Chhinnamasta', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(226, 20, 'Mahadeva', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(227, 20, 'Rupani', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(228, 20, 'Tilathi Koiladi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(229, 20, 'Tirhut', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(230, 21, 'Bagmati', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(231, 21, 'Balara', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(232, 21, 'Barahathwa', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(233, 21, 'Godaita', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(234, 21, 'Harion', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(235, 21, 'Haripur', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(236, 21, 'Haripurwa', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(237, 21, 'Ishworpur', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(238, 21, 'Kabilasi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(239, 21, 'Lalbandi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(240, 21, 'Malangwa', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(241, 21, 'Basbariya', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(242, 21, 'Bishnu', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(243, 21, 'Brahampuri', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(244, 21, 'Chakraghatta', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(245, 21, 'Chandranagar', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(246, 21, 'Dhankaul', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(247, 21, 'Kaudena', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(248, 21, 'Parsa', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(249, 21, 'Ramnagar', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(250, 22, 'Bodebarsain', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(251, 22, 'Dakneshwori', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(252, 22, 'Hanumannagar Kankalini', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(253, 22, 'Kanchanrup', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(254, 22, 'Khadak', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(255, 22, 'Sambhunath', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(256, 22, 'Saptakoshi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(257, 22, 'Surunga', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(258, 22, 'Rajbiraj', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(259, 22, 'Agnisaira Krishnasavaran', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(260, 22, 'Balan Bihul', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(261, 22, 'Rajgadh', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(262, 22, 'Bishnupur', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(263, 22, 'Chhinnamasta', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(264, 22, 'Mahadeva', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(265, 22, 'Rupani', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(266, 22, 'Tilathi Koiladi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(267, 22, 'Tirhut', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(268, 23, 'Kamalamai', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(269, 23, 'Dudhauli', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(270, 23, 'Sunkoshi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(271, 23, 'Hariharpur Gadhi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(272, 23, 'Tinpatan', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(273, 23, 'Marin', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(274, 23, 'Golanjor', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(275, 23, 'Phikkal', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(276, 23, 'Ghyanglekh', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(277, 24, 'Manthali', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(278, 24, 'Ramechhap', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(279, 24, 'Umakunda', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(280, 24, 'Khandadevi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(281, 24, 'Doramba', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(282, 24, 'Gokulganga', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(283, 24, 'Likhutamakoshi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(284, 24, 'Sunapati', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(285, 25, 'Bhimeswor', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(286, 25, 'Jiri', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(287, 25, 'Kalinchowk', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(288, 25, 'Melung', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(289, 25, 'Bigu', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(290, 25, 'Gaurishankar', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(291, 25, 'Baileshwor', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(292, 25, 'Sailung', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(293, 25, 'Tamakoshi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(294, 26, 'Bhaktapur', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(295, 26, 'Changunarayan', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(296, 26, 'Madhyapur Thimi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(297, 26, 'Suryabinayak', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(298, 27, 'Dhunibeshi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(299, 27, 'Nilkantha', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(300, 27, 'Khaniyabas', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(301, 27, 'Gajur', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(302, 27, 'Galchhi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(303, 27, 'Gangajamukhi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(304, 27, 'Jwalamukhi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(305, 27, 'Thakre', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(306, 27, 'Netrawati Dabjong', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(307, 27, 'Benighat Rorang', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(308, 27, 'Rubi Valley', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(309, 27, 'Siddhalek', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(310, 27, 'Tripurasundari', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(311, 28, 'Kathmandu', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(312, 28, 'Budanilkantha', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(313, 28, 'Chandragiri', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(314, 28, 'Dakshinkali', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(315, 28, 'Gokarneshwor', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(316, 28, 'Kageshwari Manohara', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(317, 28, 'Kirtipur', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(318, 28, 'Nagarjun', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(319, 28, 'Shankharapur', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(320, 28, 'Tarakeshwor', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(321, 28, 'Tokha', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(322, 29, 'Dhulikhel', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(323, 29, 'Banepa', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(324, 29, 'Panauti', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(325, 29, 'Panchkhel', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(326, 29, 'Namobudhha', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(327, 29, 'Mandandeupur', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(328, 29, 'Khani khola', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(329, 29, 'Chauri Deurali', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(330, 29, 'Temal', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(331, 29, 'Bethanchok', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(332, 29, 'Bhumlu', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(333, 29, 'Mahabharat', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(334, 29, 'Roshi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(335, 30, 'Lalitpur', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(336, 30, 'Mahalaxmi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(337, 30, 'Godawari', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(338, 30, 'Bagmati', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(339, 30, 'Mahankal', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(340, 30, 'Konjyoson', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(341, 31, 'Bidur', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(342, 31, 'Belkotgadhi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(343, 31, 'Kakani', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(344, 31, 'Panchakanya', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(345, 31, 'Likhu', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(346, 31, 'Dupcheshowr', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(347, 31, 'Shivapuri', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(348, 31, 'Tadi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(349, 31, 'Suryagadhi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(350, 31, 'Tarkeshor', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(351, 31, 'Kispang', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(352, 31, 'Myagang', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(353, 32, 'Uttargaya', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(354, 32, 'Kalika', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(355, 32, 'Gosaikunda', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(356, 32, 'Naukunda', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(357, 32, 'Aamachhodingmo', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(358, 33, 'Chautara Sangachokgadi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(359, 33, 'Bahrabise', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(360, 33, 'Melamchi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(361, 33, 'Balephi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(362, 33, 'Sunkoshi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(363, 33, 'Indrawati', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(364, 33, 'Jugal', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(365, 33, 'Panchapokhari Thangpal', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(366, 33, 'Bhotekoshi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(367, 33, 'Lisankhu Pakhar', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(368, 33, 'Helambu', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(369, 33, 'Tripurasundari', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(370, 34, 'Bharatpur', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(371, 34, 'Kalika', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(372, 34, 'Khairahani', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(373, 34, 'Madi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(374, 34, 'Ratnanagar', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(375, 34, 'Rapti', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(376, 34, 'Ichchhakamana', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(377, 35, 'Hetauada', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(378, 35, 'Thaha', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(379, 35, 'Bhimphedi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(380, 35, 'Makawanpurgadhi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(381, 35, 'Manahari', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(382, 35, 'Raksirang', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(383, 35, 'Bakaiya', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(384, 35, 'Bagmati', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(385, 35, 'Kailash', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(386, 35, 'Indrasarowar', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(387, 36, 'Dhorpatan', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(388, 36, 'Galkot', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(389, 36, 'Jaimuni', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(390, 36, 'Bareng', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(391, 36, 'Khatte khola', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(392, 36, 'Taman khola', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(393, 36, 'Tara khola', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(394, 36, 'Nisikhola', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(395, 36, 'Badigad', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(396, 37, 'Gorkha', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(397, 37, 'Phaluntar', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(398, 37, 'Sulikot', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(399, 37, 'Siranchowk', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(400, 37, 'Ajirkot', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(401, 37, 'Tsum Nubri', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(402, 37, 'Dharche', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(403, 37, 'Bhimsen Thapa', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(404, 37, 'Sahid lakhan', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(405, 37, 'Aarughat', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(406, 37, 'Gandaki', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(407, 38, 'Pokhara', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(408, 38, 'Annapurna', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(409, 38, 'Machhapuchhre', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(410, 38, 'Madi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(411, 38, 'Rupa', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(412, 39, 'Besisahar', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(413, 39, 'Madhya Nepal', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(414, 39, 'Rainas', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(415, 39, 'Sundarbazar', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(416, 39, 'Dudhpokhari', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(417, 39, 'Kwhlosothar', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(418, 39, 'Marsyandi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(419, 39, 'Dorde', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(420, 40, 'Chame', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(421, 40, 'Nason', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(422, 40, 'Narpa Bhumi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(423, 40, 'Manang Ngisyang', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(424, 41, 'Gharpajhong', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(425, 41, 'Thasang', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(426, 41, 'Barhagaun', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(427, 41, 'Muktichhetra', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(428, 41, 'Lomanthang', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(429, 41, 'Dalome', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(430, 42, 'Beni', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(431, 42, 'Annapurna', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(432, 42, 'Dhaulagiri', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(433, 42, 'Mangala', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(434, 42, 'Malika', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(435, 42, 'Raghuganga', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(436, 43, 'Kawasoti', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(437, 43, 'Gaindakot', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(438, 43, 'Devachuli', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(439, 43, 'Madhyabindu', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(440, 43, 'Baudikali', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(441, 43, 'Bulingtar', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(442, 43, 'Binaya Triveni', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(443, 43, 'Hupsekot', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(444, 44, 'Kushma', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(445, 44, 'Phalewas', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(446, 44, 'Jaljala', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(447, 44, 'Paiyun', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(448, 44, 'Mahashila', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(449, 44, 'Modi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(450, 44, 'Bihadi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(451, 45, 'Galyang', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(452, 45, 'Chapakot', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(453, 45, 'Putalibazar', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(454, 45, 'Bheerkot', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(455, 45, 'Waling', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(456, 45, 'Arjun Chaupari', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(457, 45, 'Aandhi Khola', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(458, 45, 'Kaligandaki', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(459, 45, 'Phedikhola', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(460, 45, 'Harinas', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(461, 45, 'Biruwa', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(462, 46, 'Bhanu', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(463, 46, 'Bhimad', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(464, 46, 'Byas', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(465, 46, 'Shuklagandaki', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(466, 46, 'Anbu Khaireni', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(467, 46, 'Devghat', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(468, 46, 'Bandipur', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(469, 46, 'Rishing', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(470, 46, 'Ghiring', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(471, 46, 'Myagde', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(472, 47, 'Sandhikharka', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(473, 47, 'Sitganga', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(474, 47, 'Bhumikasthan', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(475, 47, 'Chhatradev', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(476, 47, 'Panini', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(477, 47, 'Malarani', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(478, 48, 'Nepaljung', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(479, 48, 'Kohalpur', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(480, 48, 'Rapti Sonari', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(481, 48, 'Narainapur', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(482, 48, 'Duduwa', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(483, 48, 'Janaki', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(484, 48, 'Khajura', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(485, 48, 'Baijanath', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(486, 49, 'Gulariya', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(487, 49, 'Rajapur', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(488, 49, 'Madhuwan', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(489, 49, 'Thakurbaba', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(490, 49, 'Basgadhi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(491, 49, 'Barbardiya', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(492, 49, 'Badhaiyalal', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(493, 49, 'Geruwa', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(494, 50, 'Gharahi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(495, 50, 'Tulsipur', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(496, 50, 'Lamahi', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(497, 50, 'Gadhawa', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(498, 50, 'Rajpur', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(499, 50, 'Shantinagar', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(500, 50, 'Rapti', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(501, 50, 'Banglachuli', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(502, 50, 'Dangisharan', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(503, 50, 'Babai', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(504, 51, 'Bhume', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(505, 51, 'Putha Uttarganga', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(506, 51, 'Sisne', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(507, 52, 'Musikot', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(508, 52, 'Resunga', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(509, 52, 'Ishma', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(510, 52, 'Kaligandaki', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(511, 52, 'Gulmi Darbar', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(512, 52, 'Satyawati', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(513, 52, 'Chandrakot', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(514, 52, 'Chhatrakot', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(515, 52, 'Dhurkot', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(516, 52, 'Madane', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(517, 52, 'Malika', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(518, 53, 'Kapilvastu', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(519, 53, 'Banganga', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(520, 53, 'Buddhabhumi', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(521, 53, 'Shivaraj', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(522, 53, 'Krishnanagar', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(523, 53, 'Maharajgunj', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(524, 53, 'Mayadevi', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(525, 53, 'Yashodhara', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(526, 53, 'Suddhodhan', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(527, 53, 'Bijaynagar', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(528, 54, 'Bardaghat', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(529, 54, 'Ramgram', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(530, 54, 'Sunawal', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(531, 54, 'Susta', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(532, 54, 'Palhinanda', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(533, 54, 'Pratappur', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(534, 54, 'Sarawal', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(535, 55, 'Tansen', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(536, 55, 'Rampur', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(537, 55, 'Rainadevi Chhahara', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(538, 55, 'Ripdikot', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(539, 55, 'Bagnaskali', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(540, 55, 'Rambha', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(541, 55, 'Purbakhola', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(542, 55, 'Nisdi', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(543, 55, 'Mathagadi', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(544, 55, 'Tinahu', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(545, 56, 'Pyuthan', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(546, 56, 'Swargadwari', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(547, 56, 'Gaumukhi', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(548, 56, 'Mandwi', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(549, 56, 'Sarumarani', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(550, 56, 'Mallarani', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(551, 56, 'Naubahini', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(552, 56, 'Jhimruk', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(553, 56, 'Airawati', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(554, 57, 'Rolpa', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(555, 57, 'Runtigadi', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(556, 57, 'Triveni', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(557, 57, 'Sunil Smiriti', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(558, 57, 'Lungri', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(559, 57, 'Sunchhahari', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(560, 57, 'Thawang', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(561, 57, 'Madi', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(562, 57, 'Ganga Devi', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(563, 57, 'Pariwartan', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(564, 58, 'Butwal', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(565, 58, 'Devdaha', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(566, 58, 'Lumbini Sanskritik', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(567, 58, 'Sainamaina', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(568, 58, 'Siddharthanagar', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(569, 58, 'Tilottama', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(570, 58, 'Gaidahawa', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(571, 58, 'Kanchan', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(572, 58, 'Kotahimai', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(573, 58, 'Marchawari', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(574, 58, 'Mayadevi', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(575, 58, 'Omshanti', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(576, 58, 'Rohini', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(577, 58, 'Sammarimai', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(578, 58, 'Siyari', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(579, 58, 'Suddodhan', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(580, 59, 'Musikot', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(581, 59, 'Chaurjahari', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(582, 59, 'Aathbiskot', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(583, 59, 'Banphikot', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(584, 59, 'Tribeni', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(585, 59, 'Sani Bheri', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(586, 60, 'Shaarda', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(587, 60, 'Bagchaur', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(588, 60, 'Bangaad Kupinde', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(589, 60, 'Kalimati', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(590, 60, 'Tribeni', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(591, 60, 'Kapurkot', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(592, 60, 'Chatreshwari', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(593, 60, 'Kumakh', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(594, 60, 'Siddha Kumakh', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(595, 60, 'Darma', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(596, 61, 'Thuli Bheri', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(597, 61, 'Tripurasundari', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(598, 61, 'Dolpa Buddha', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(599, 61, 'Shey Phuksundo', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(600, 61, 'Jagadulla', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(601, 61, 'Mudkechula', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(602, 61, 'Chatreshwari', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(603, 61, 'Kaike', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(604, 61, 'Chharke Tangsong', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(605, 62, 'Simkot', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(606, 62, 'Numkha', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(607, 62, 'Kharpunath', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(608, 62, 'Sarkegad', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(609, 62, 'Chankheli', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(610, 62, 'Adanchuli', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(611, 62, 'Tajkot', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(612, 63, 'Chandannath', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(613, 63, 'Kankasundari', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(614, 63, 'Sinja', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(615, 63, 'Hima', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(616, 63, 'Tila', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(617, 63, 'Guthichaur', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(618, 63, 'Tatopani', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(619, 63, 'Patarasi', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(620, 64, 'Khandachakra', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(621, 64, 'Raskot', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(622, 64, 'Tilagufa', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(623, 64, 'PachaliJharana', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(624, 64, 'Sanni Tribeni', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(625, 64, 'Narharinath', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(626, 64, 'Shubha Kalika', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(627, 64, 'Mahawai', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(628, 64, 'Palata', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(629, 65, 'Chhayanath Rara', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(630, 65, 'Mugum Karmarong', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(631, 65, 'Soru', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(632, 65, 'Khatyad', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(633, 66, 'Birendranagar', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(634, 66, 'Bheriganga', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(635, 66, 'Gurbhakot', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(636, 66, 'Panchapuri', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(637, 66, 'Lekhbesi', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(638, 66, 'Chaukune', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(639, 66, 'Barahatal', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(640, 66, 'Chingad', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(641, 66, 'Simta', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(642, 67, 'Narayan', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(643, 67, 'Dullu', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(644, 67, 'Aathbis', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(645, 67, 'Chamunda BIndrasaini', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(646, 67, 'Thantikandh', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(647, 67, 'Bhairabi', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(648, 67, 'Mahabu', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(649, 67, 'Naumule', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(650, 67, 'Dungeshwar', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(651, 67, 'Gurans', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(652, 67, 'Bhagawatimai', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(653, 68, 'Bheri', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(654, 68, 'Chhedagad', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(655, 68, 'Nalgad', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(656, 68, 'Junichande', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(657, 68, 'Kushe', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(658, 68, 'Barekot', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(659, 68, 'Shivalaya', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(660, 69, 'Mangalsen', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(661, 69, 'Kamalbazar', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(662, 69, 'Sanfebagar', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(663, 69, 'Panchadewal Binayak', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(664, 69, 'Ramaroshan', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(665, 69, 'Chaurpati', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(666, 69, 'Turmakhand', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(667, 69, 'Mellekh', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(668, 69, 'Dhakari', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(669, 69, 'Bannigadi Jayaqad', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(670, 70, 'Dasharathchand', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(671, 70, 'Patan', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(672, 70, 'Melauli', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(673, 70, 'Purchaudi', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(674, 70, 'Surma', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL);
INSERT INTO `municipalities` (`id`, `district_id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(675, 70, 'Sigas', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(676, 70, 'Shivanath', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(677, 70, 'Panacheshwor', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(678, 70, 'Dogdakedar', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(679, 70, 'Dilasaini', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(680, 71, 'Jaya Prithivi', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(681, 71, 'Bungal', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(682, 71, 'Talkot', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(683, 71, 'Masta', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(684, 71, 'Khaptadchhanna', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(685, 71, 'Thalara', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(686, 71, 'Bitthadchir', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(687, 71, 'Surma', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(688, 71, 'Chhabis', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(689, 71, 'Durgathali', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(690, 71, 'Kedarsyu', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(691, 71, 'Saipal', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(692, 72, 'Badimalika', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(693, 72, 'Triveni', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(694, 72, 'Budhiganga', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(695, 72, 'BUdhinanda', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(696, 72, 'Gaumul', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(697, 72, 'Jagnnath', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(698, 72, 'Swamikartik khapar', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(699, 72, 'Chhededaha', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(700, 72, 'Himali', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(701, 73, 'Amargadhi', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(702, 73, 'Parshuram', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(703, 73, 'Aalitaal', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(704, 73, 'Bhageshwar', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(705, 73, 'Navadurga', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(706, 73, 'Ajaymeru', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(707, 73, 'Ganyapadhuta', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(708, 74, 'Mahakali', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(709, 74, 'Shailyasikhar', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(710, 74, 'Malikarjun', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(711, 74, 'Apihimal', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(712, 74, 'Duhun', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(713, 74, 'Naugad', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(714, 74, 'Marma', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(715, 74, 'Lekam', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(716, 74, 'Vyans', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(717, 75, 'Dipayal Silgadhi', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(718, 75, 'Shikhar', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(719, 75, 'Purbichauki', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(720, 75, 'Badikedar', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(721, 75, 'Jorayal', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(722, 75, 'Sayal', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(723, 75, 'Aadarsha', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(724, 75, 'Bogatan', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(725, 75, 'Dr. K. I. Singh', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(726, 76, 'Dhangadhi', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(727, 76, 'Lamki chuha', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(728, 76, 'Tikapur', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(729, 76, 'Ghodaghodi', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(730, 76, 'Bhajani', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(731, 76, 'Godawari', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(732, 76, 'Gaurigoriya', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(733, 76, 'Janaki', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(734, 76, 'Bardaguriya', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(735, 76, 'Mohanyal', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(736, 76, 'Kailari', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(737, 76, 'Joshipur', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(738, 76, 'Chure', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_count` int(11) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parent_school`
--

CREATE TABLE `parent_school` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
-- Table structure for table `principals`
--

CREATE TABLE `principals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Province 1', '2021-04-20 17:50:53', '2021-04-20 17:50:53', NULL),
(2, 'Province 2', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(3, 'Province 3', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(4, 'Province 4', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(5, 'Province 5', '2021-04-20 17:50:54', '2021-04-20 17:50:54', NULL),
(6, 'Province 6', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL),
(7, 'Province 7', '2021-04-20 17:50:55', '2021-04-20 17:50:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(2, 'school', 'School', '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(3, 'principal', 'Principal', '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(4, 'teacher', 'Teacher', '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(5, 'student', 'Student', '2021-04-20 17:50:53', '2021-04-20 17:50:53'),
(6, 'parent', 'Parent', '2021-04-20 17:50:53', '2021-04-20 17:50:53');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province_id` bigint(20) UNSIGNED DEFAULT NULL,
  `district_id` bigint(20) UNSIGNED DEFAULT NULL,
  `municipality_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ward_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `principal_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `principal_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `principal_message` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school_teacher`
--

CREATE TABLE `school_teacher` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grade_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_plus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `user_id`, `name`, `email`, `address`, `phone`, `fb`, `insta`, `google_plus`, `twitter`, `logo`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hamro School', 'hamro.school@gmail.com', 'Biratnagar-1, Pokhariya', '9862078434', NULL, NULL, NULL, NULL, NULL, '2021-04-20 17:50:53', '2021-04-20 17:50:53');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `grade_id` bigint(20) UNSIGNED DEFAULT NULL,
  `parent_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grade_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subject_teacher`
--

CREATE TABLE `subject_teacher` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `first_name`, `last_name`, `address`, `phone`, `profile`, `email`, `username`, `email_verified_at`, `password`, `is_verified`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'LastName', 'Biratnagar', '9862078434', NULL, 'admin@admin.com', NULL, NULL, '$2y$10$Q7Z5yUwu3/DYbzdWGu.m5eEPWCbb2AoA8mmXXl/sOQj.RfoDOaxDe', 0, NULL, NULL, '2021-04-20 17:50:53', '2021-04-20 17:50:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answers_user_id_foreign` (`user_id`),
  ADD KEY `answers_question_id_foreign` (`question_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_bloggable_type_bloggable_id_index` (`bloggable_type`,`bloggable_id`),
  ADD KEY `blogs_user_id_foreign` (`user_id`);

--
-- Indexes for table `discussions`
--
ALTER TABLE `discussions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `discussions_user_id_foreign` (`user_id`),
  ADD KEY `discussions_approved_by_id_foreign` (`approved_by_id`);

--
-- Indexes for table `discussion_likes`
--
ALTER TABLE `discussion_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `discussion_likes_user_id_foreign` (`user_id`),
  ADD KEY `discussion_likes_discussion_id_foreign` (`discussion_id`);

--
-- Indexes for table `discussion_ratings`
--
ALTER TABLE `discussion_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `discussion_ratings_user_id_foreign` (`user_id`),
  ADD KEY `discussion_ratings_discussion_id_foreign` (`discussion_id`);

--
-- Indexes for table `discussion_subjects`
--
ALTER TABLE `discussion_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `discussion_subjects_discussion_id_foreign` (`discussion_id`),
  ADD KEY `discussion_subjects_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_province_id_foreign` (`province_id`);

--
-- Indexes for table `education_materials`
--
ALTER TABLE `education_materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `education_materials_materialable_type_materialable_id_index` (`materialable_type`,`materialable_id`),
  ADD KEY `education_materials_user_id_foreign` (`user_id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade_teacher`
--
ALTER TABLE `grade_teacher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grade_teacher_grade_id_foreign` (`grade_id`),
  ADD KEY `grade_teacher_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `guardians`
--
ALTER TABLE `guardians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guardians_user_id_foreign` (`user_id`);

--
-- Indexes for table `guardian_school`
--
ALTER TABLE `guardian_school`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guardian_school_school_id_foreign` (`school_id`),
  ADD KEY `guardian_school_guardian_id_foreign` (`guardian_id`);

--
-- Indexes for table `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_group_id_foreign` (`group_id`);

--
-- Indexes for table `menu_groups`
--
ALTER TABLE `menu_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moderators`
--
ALTER TABLE `moderators`
  ADD PRIMARY KEY (`id`),
  ADD KEY `moderators_user_id_foreign` (`user_id`);

--
-- Indexes for table `moderator_subject`
--
ALTER TABLE `moderator_subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `moderator_subject_subject_id_foreign` (`subject_id`),
  ADD KEY `moderator_subject_moderator_id_foreign` (`moderator_id`);

--
-- Indexes for table `municipalities`
--
ALTER TABLE `municipalities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `municipalities_district_id_foreign` (`district_id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notices_school_id_foreign` (`school_id`);

--
-- Indexes for table `parent_school`
--
ALTER TABLE `parent_school`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `principals`
--
ALTER TABLE `principals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `principals_user_id_foreign` (`user_id`),
  ADD KEY `principals_school_id_foreign` (`school_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schools_user_id_foreign` (`user_id`);

--
-- Indexes for table `school_teacher`
--
ALTER TABLE `school_teacher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_teacher_school_id_foreign` (`school_id`),
  ADD KEY `school_teacher_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sections_grade_id_foreign` (`grade_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `settings_user_id_foreign` (`user_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_user_id_foreign` (`user_id`),
  ADD KEY `students_school_id_foreign` (`school_id`),
  ADD KEY `students_grade_id_foreign` (`grade_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subjects_grade_id_foreign` (`grade_id`);

--
-- Indexes for table `subject_teacher`
--
ALTER TABLE `subject_teacher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_teacher_subject_id_foreign` (`subject_id`),
  ADD KEY `subject_teacher_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teachers_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `discussions`
--
ALTER TABLE `discussions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `discussion_likes`
--
ALTER TABLE `discussion_likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `discussion_ratings`
--
ALTER TABLE `discussion_ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `discussion_subjects`
--
ALTER TABLE `discussion_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `education_materials`
--
ALTER TABLE `education_materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grade_teacher`
--
ALTER TABLE `grade_teacher`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guardians`
--
ALTER TABLE `guardians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guardian_school`
--
ALTER TABLE `guardian_school`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guests`
--
ALTER TABLE `guests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `menu_groups`
--
ALTER TABLE `menu_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `moderators`
--
ALTER TABLE `moderators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `moderator_subject`
--
ALTER TABLE `moderator_subject`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `municipalities`
--
ALTER TABLE `municipalities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=739;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parent_school`
--
ALTER TABLE `parent_school`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `principals`
--
ALTER TABLE `principals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school_teacher`
--
ALTER TABLE `school_teacher`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject_teacher`
--
ALTER TABLE `subject_teacher`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `answers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `discussions`
--
ALTER TABLE `discussions`
  ADD CONSTRAINT `discussions_approved_by_id_foreign` FOREIGN KEY (`approved_by_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `discussions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `discussion_likes`
--
ALTER TABLE `discussion_likes`
  ADD CONSTRAINT `discussion_likes_discussion_id_foreign` FOREIGN KEY (`discussion_id`) REFERENCES `discussions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `discussion_likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `discussion_ratings`
--
ALTER TABLE `discussion_ratings`
  ADD CONSTRAINT `discussion_ratings_discussion_id_foreign` FOREIGN KEY (`discussion_id`) REFERENCES `discussions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `discussion_ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `discussion_subjects`
--
ALTER TABLE `discussion_subjects`
  ADD CONSTRAINT `discussion_subjects_discussion_id_foreign` FOREIGN KEY (`discussion_id`) REFERENCES `discussions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `discussion_subjects_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `education_materials`
--
ALTER TABLE `education_materials`
  ADD CONSTRAINT `education_materials_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `grade_teacher`
--
ALTER TABLE `grade_teacher`
  ADD CONSTRAINT `grade_teacher_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `grade_teacher_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `guardians`
--
ALTER TABLE `guardians`
  ADD CONSTRAINT `guardians_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `guardian_school`
--
ALTER TABLE `guardian_school`
  ADD CONSTRAINT `guardian_school_guardian_id_foreign` FOREIGN KEY (`guardian_id`) REFERENCES `guardians` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `guardian_school_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `menu_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `moderators`
--
ALTER TABLE `moderators`
  ADD CONSTRAINT `moderators_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `moderator_subject`
--
ALTER TABLE `moderator_subject`
  ADD CONSTRAINT `moderator_subject_moderator_id_foreign` FOREIGN KEY (`moderator_id`) REFERENCES `moderators` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `moderator_subject_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `municipalities`
--
ALTER TABLE `municipalities`
  ADD CONSTRAINT `municipalities_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notices`
--
ALTER TABLE `notices`
  ADD CONSTRAINT `notices_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `principals`
--
ALTER TABLE `principals`
  ADD CONSTRAINT `principals_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `principals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `schools`
--
ALTER TABLE `schools`
  ADD CONSTRAINT `schools_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `school_teacher`
--
ALTER TABLE `school_teacher`
  ADD CONSTRAINT `school_teacher_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `school_teacher_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `settings`
--
ALTER TABLE `settings`
  ADD CONSTRAINT `settings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subject_teacher`
--
ALTER TABLE `subject_teacher`
  ADD CONSTRAINT `subject_teacher_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_teacher_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
