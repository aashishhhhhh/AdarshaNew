-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 10, 2022 at 05:55 AM
-- Server version: 5.7.36
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_adarsha`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

DROP TABLE IF EXISTS `feedbacks`;
CREATE TABLE IF NOT EXISTS `feedbacks` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `name`, `email`, `comments`, `created_at`, `updated_at`) VALUES
(1, 'asdasd', 'admin@admin.com', 'asdasd', '2022-04-01 04:35:35', '2022-04-01 04:35:35'),
(2, 'Ashish', 'ashish.pandey2073@gmail.com', 'asdasd', '2022-04-01 04:38:01', '2022-04-01 04:38:01'),
(3, 'Ashish', 'admin@admin.com', 'asdasd', '2022-04-01 04:38:47', '2022-04-01 04:38:47'),
(4, 'Ashish', 'rippin.beverly@grady.com', 'asdasd', '2022-04-01 04:40:16', '2022-04-01 04:40:16'),
(5, 'Ashish', 'ashish.pandey1999@gmail.com', 'asdad', '2022-04-01 04:42:24', '2022-04-01 04:42:24'),
(6, 'Ashish Pandey', 'anishlm200@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque accumsan non ipsum a dictum. Vivamus non efficitur ipsum, in semper ante. Morbi a pharetra libero. Proin porttitor ac libero nec vulputate. Sed faucibus lectus in orci dictum rhoncus. Suspendisse id orci quis elit blandit consequat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.\r\n\r\nDonec sed nisl at metus facilisis ultrices elementum at lacus. Quisque ac posuere est. Etiam sed enim enim. Duis porttitor tempus egestas. Quisque iaculis dapibus sapien ut iaculis. Integer consequat sem eget augue cursus, tincidunt tincidunt mi lobortis. Maecenas pretium neque massa, quis cursus libero finibus vitae. Curabitur eros justo, vehicula vel tortor sit amet, vestibulum tempus lacus. Phasellus imperdiet erat ut mattis imperdiet.', '2022-04-03 23:38:20', '2022-04-03 23:38:20'),
(7, 'Ashish Pandey', 'anishlm200@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque accumsan non ipsum a dictum. Vivamus non efficitur ipsum, in semper ante. Morbi a pharetra libero. Proin porttitor ac libero nec vulputate. Sed faucibus lectus in orci dictum rhoncus. Suspendisse id orci quis elit blandit consequat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.\r\n\r\nDonec sed nisl at metus facilisis ultrices elementum at lacus. Quisque ac posuere est. Etiam sed enim enim. Duis porttitor tempus egestas. Quisque iaculis dapibus sapien ut iaculis. Integer consequat sem eget augue cursus, tincidunt tincidunt mi lobortis. Maecenas pretium neque massa, quis cursus libero finibus vitae. Curabitur eros justo, vehicula vel tortor sit amet, vestibulum tempus lacus. Phasellus imperdiet erat ut mattis imperdiet.', '2022-04-03 23:40:02', '2022-04-03 23:40:02'),
(8, 'Ashish Pandey', 'anishlm200@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque accumsan non ipsum a dictum. Vivamus non efficitur ipsum, in semper ante. Morbi a pharetra libero. Proin porttitor ac libero nec vulputate. Sed faucibus lectus in orci dictum rhoncus. Suspendisse id orci quis elit blandit consequat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.\r\n\r\nDonec sed nisl at metus facilisis ultrices elementum at lacus. Quisque ac posuere est. Etiam sed enim enim. Duis porttitor tempus egestas. Quisque iaculis dapibus sapien ut iaculis. Integer consequat sem eget augue cursus, tincidunt tincidunt mi lobortis. Maecenas pretium neque massa, quis cursus libero finibus vitae. Curabitur eros justo, vehicula vel tortor sit amet, vestibulum tempus lacus. Phasellus imperdiet erat ut mattis imperdiet.', '2022-04-03 23:43:11', '2022-04-03 23:43:11'),
(9, 'Ashish Pandey', 'anishlm200@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque accumsan non ipsum a dictum. Vivamus non efficitur ipsum, in semper ante. Morbi a pharetra libero. Proin porttitor ac libero nec vulputate. Sed faucibus lectus in orci dictum rhoncus. Suspendisse id orci quis elit blandit consequat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.\r\n\r\nDonec sed nisl at metus facilisis ultrices elementum at lacus. Quisque ac posuere est. Etiam sed enim enim. Duis porttitor tempus egestas. Quisque iaculis dapibus sapien ut iaculis. Integer consequat sem eget augue cursus, tincidunt tincidunt mi lobortis. Maecenas pretium neque massa, quis cursus libero finibus vitae. Curabitur eros justo, vehicula vel tortor sit amet, vestibulum tempus lacus. Phasellus imperdiet erat ut mattis imperdiet.', '2022-04-03 23:44:07', '2022-04-03 23:44:07'),
(10, 'Ashish Pandey', 'anishlm200@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque accumsan non ipsum a dictum. Vivamus non efficitur ipsum, in semper ante. Morbi a pharetra libero. Proin porttitor ac libero nec vulputate. Sed faucibus lectus in orci dictum rhoncus. Suspendisse id orci quis elit blandit consequat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.\r\n\r\nDonec sed nisl at metus facilisis ultrices elementum at lacus. Quisque ac posuere est. Etiam sed enim enim. Duis porttitor tempus egestas. Quisque iaculis dapibus sapien ut iaculis. Integer consequat sem eget augue cursus, tincidunt tincidunt mi lobortis. Maecenas pretium neque massa, quis cursus libero finibus vitae. Curabitur eros justo, vehicula vel tortor sit amet, vestibulum tempus lacus. Phasellus imperdiet erat ut mattis imperdiet.', '2022-04-03 23:45:15', '2022-04-03 23:45:15'),
(11, 'Ashish Pandey', 'anishlm200@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque accumsan non ipsum a dictum. Vivamus non efficitur ipsum, in semper ante. Morbi a pharetra libero. Proin porttitor ac libero nec vulputate. Sed faucibus lectus in orci dictum rhoncus. Suspendisse id orci quis elit blandit consequat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.\r\n\r\nDonec sed nisl at metus facilisis ultrices elementum at lacus. Quisque ac posuere est. Etiam sed enim enim. Duis porttitor tempus egestas. Quisque iaculis dapibus sapien ut iaculis. Integer consequat sem eget augue cursus, tincidunt tincidunt mi lobortis. Maecenas pretium neque massa, quis cursus libero finibus vitae. Curabitur eros justo, vehicula vel tortor sit amet, vestibulum tempus lacus. Phasellus imperdiet erat ut mattis imperdiet.', '2022-04-03 23:46:55', '2022-04-03 23:46:55'),
(12, 'Ashish Pandey', 'anishlm200@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque accumsan non ipsum a dictum. Vivamus non efficitur ipsum, in semper ante. Morbi a pharetra libero. Proin porttitor ac libero nec vulputate. Sed faucibus lectus in orci dictum rhoncus. Suspendisse id orci quis elit blandit consequat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.\r\n\r\nDonec sed nisl at metus facilisis ultrices elementum at lacus. Quisque ac posuere est. Etiam sed enim enim. Duis porttitor tempus egestas. Quisque iaculis dapibus sapien ut iaculis. Integer consequat sem eget augue cursus, tincidunt tincidunt mi lobortis. Maecenas pretium neque massa, quis cursus libero finibus vitae. Curabitur eros justo, vehicula vel tortor sit amet, vestibulum tempus lacus. Phasellus imperdiet erat ut mattis imperdiet.', '2022-04-03 23:47:54', '2022-04-03 23:47:54'),
(13, 'Ashish Pandey', 'anishlm200@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque accumsan non ipsum a dictum. Vivamus non efficitur ipsum, in semper ante. Morbi a pharetra libero. Proin porttitor ac libero nec vulputate. Sed faucibus lectus in orci dictum rhoncus. Suspendisse id orci quis elit blandit consequat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.\r\n\r\nDonec sed nisl at metus facilisis ultrices elementum at lacus. Quisque ac posuere est. Etiam sed enim enim. Duis porttitor tempus egestas. Quisque iaculis dapibus sapien ut iaculis. Integer consequat sem eget augue cursus, tincidunt tincidunt mi lobortis. Maecenas pretium neque massa, quis cursus libero finibus vitae. Curabitur eros justo, vehicula vel tortor sit amet, vestibulum tempus lacus. Phasellus imperdiet erat ut mattis imperdiet.', '2022-04-03 23:48:19', '2022-04-03 23:48:19'),
(14, 'Ashish Pandey', 'anishlm200@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque accumsan non ipsum a dictum. Vivamus non efficitur ipsum, in semper ante. Morbi a pharetra libero. Proin porttitor ac libero nec vulputate. Sed faucibus lectus in orci dictum rhoncus. Suspendisse id orci quis elit blandit consequat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.\r\n\r\nDonec sed nisl at metus facilisis ultrices elementum at lacus. Quisque ac posuere est. Etiam sed enim enim. Duis porttitor tempus egestas. Quisque iaculis dapibus sapien ut iaculis. Integer consequat sem eget augue cursus, tincidunt tincidunt mi lobortis. Maecenas pretium neque massa, quis cursus libero finibus vitae. Curabitur eros justo, vehicula vel tortor sit amet, vestibulum tempus lacus. Phasellus imperdiet erat ut mattis imperdiet.', '2022-04-03 23:49:56', '2022-04-03 23:49:56'),
(15, 'Ashish Pandey', 'anishlm200@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque accumsan non ipsum a dictum. Vivamus non efficitur ipsum, in semper ante. Morbi a pharetra libero. Proin porttitor ac libero nec vulputate. Sed faucibus lectus in orci dictum rhoncus. Suspendisse id orci quis elit blandit consequat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.\r\n\r\nDonec sed nisl at metus facilisis ultrices elementum at lacus. Quisque ac posuere est. Etiam sed enim enim. Duis porttitor tempus egestas. Quisque iaculis dapibus sapien ut iaculis. Integer consequat sem eget augue cursus, tincidunt tincidunt mi lobortis. Maecenas pretium neque massa, quis cursus libero finibus vitae. Curabitur eros justo, vehicula vel tortor sit amet, vestibulum tempus lacus. Phasellus imperdiet erat ut mattis imperdiet.', '2022-04-03 23:50:14', '2022-04-03 23:50:14'),
(16, 'Blake Travis', 'fyra@mailinator.com', 'Omnis quo voluptatem', '2022-04-03 23:57:43', '2022-04-03 23:57:43'),
(17, 'Blake Travis', 'fyra@mailinator.com', 'Omnis quo voluptatem', '2022-04-03 23:58:13', '2022-04-03 23:58:13'),
(18, 'Blake Travis', 'fyra@mailinator.com', 'Omnis quo voluptatem', '2022-04-03 23:59:13', '2022-04-03 23:59:13'),
(19, 'Blake Travis', 'fyra@mailinator.com', 'Omnis quo voluptatem', '2022-04-03 23:59:33', '2022-04-03 23:59:33'),
(20, 'Blake Travis', 'fyra@mailinator.com', 'Omnis quo voluptatem', '2022-04-04 00:00:11', '2022-04-04 00:00:11'),
(21, 'Blake Travis', 'fyra@mailinator.com', 'Omnis quo voluptatem', '2022-04-04 00:00:22', '2022-04-04 00:00:22'),
(22, 'Blake Travis', 'fyra@mailinator.com', 'Omnis quo voluptatem', '2022-04-04 00:00:33', '2022-04-04 00:00:33'),
(23, 'Macey Mooney', 'cuwulil@mailinator.com', 'Minim ut voluptatem', '2022-04-04 00:03:53', '2022-04-04 00:03:53'),
(24, 'Macey Mooney', 'cuwulil@mailinator.com', 'Minim ut voluptatem', '2022-04-04 00:05:49', '2022-04-04 00:05:49'),
(25, 'Macey Mooney', 'cuwulil@mailinator.com', 'Minim ut voluptatem', '2022-04-04 00:09:36', '2022-04-04 00:09:36'),
(26, 'Galvin Conrad', 'gufemezo@mailinator.com', 'Donec sed nisl at metus facilisis ultrices elementum at lacus. Quisque ac posuere est. Etiam sed enim enim. Duis porttitor tempus egestas. Quisque iaculis dapibus sapien ut iaculis. Integer consequat sem eget augue cursus, tincidunt tincidunt mi lobortis. Maecenas pretium neque massa, quis cursus libero finibus vitae. Curabitur eros justo, vehicula vel tortor sit amet, vestibulum tempus lacus. Phasellus imperdiet erat ut mattis imperdiet.', '2022-04-04 00:11:38', '2022-04-04 00:11:38'),
(27, 'Byron Dunlap', 'malapotum@mailinator.com', 'Quia sint id ea aut', '2022-04-04 00:16:37', '2022-04-04 00:16:37'),
(28, 'Hiram Collins', 'zocamu@mailinator.com', 'Ex fugiat in aut per', '2022-04-04 00:17:45', '2022-04-04 00:17:45'),
(29, 'Mara Morales', 'fycijot@mailinator.com', 'Reprehenderit explic', '2022-04-04 00:18:19', '2022-04-04 00:18:19'),
(30, 'Grant Garcia', 'nicypenu@mailinator.com', 'Maiores ipsa sit u', '2022-04-04 00:18:48', '2022-04-04 00:18:48'),
(31, 'Ashishss test', 'ashish.pandey2073@gmail.com', 'testttt', '2022-04-06 01:00:33', '2022-04-06 01:00:33');

-- --------------------------------------------------------

--
-- Table structure for table `meta_pages`
--

DROP TABLE IF EXISTS `meta_pages`;
CREATE TABLE IF NOT EXISTS `meta_pages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `meta_pages_page_id_foreign` (`page_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_24_045904_create_sliders_table', 1),
(7, '2022_03_24_071606_create_messages_table', 2),
(8, '2022_03_24_102805_create_about_us_table', 3),
(10, '2022_03_24_145124_create_contact_us_table', 4),
(11, '2022_03_24_160624_create_faculties_table', 5),
(15, '2022_03_25_055101_create_courses_table', 6),
(18, '2022_03_25_093721_add_content_to_courses_table', 7),
(23, '2022_03_25_143841_create_pages_table', 11),
(20, '2022_03_25_144340_create_page_types_table', 8),
(24, '2022_03_26_071454_add_page_id_to_pages_table', 11),
(27, '2022_03_27_143113_create_pictures_table', 12),
(28, '2022_03_27_150853_create_meta_pages_table', 13),
(29, '2022_03_28_091840_add_show_on_home_to_pages_table', 14),
(30, '2022_03_28_092346_add_show_on_home_page_to_pages_table', 15),
(31, '2022_04_01_100921_create_feedbacks_table', 16),
(32, '2022_04_03_070240_create_visitors_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `page_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `page_id` int(11) DEFAULT NULL,
  `show_on_home` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pages_page_type_id_foreign` (`page_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `slug`, `title`, `content`, `page_type_id`, `created_at`, `updated_at`, `page_id`, `show_on_home`) VALUES
(1, 'slider', 'SLIDER', '{\"title\":\"<p>Slider test<\\/p>\"}', 11, '2022-03-30 08:02:37', '2022-04-02 22:50:41', NULL, 1),
(22, 'bishnu-lamichane', 'Bishnu Lamichane', '{\"name\":\"Bishnu Lamichane\",\"Designation\":\"Principal\"}', NULL, '2022-03-31 00:17:27', '2022-04-03 00:39:20', 3, 1),
(15, 'exam', 'EXAM', NULL, 5, '2022-03-30 12:48:36', '2022-03-30 12:48:36', NULL, 1),
(47, 'another-test-notice', 'Another Test Notice', '{\"0\":{\"title\":\"Another Test Notice\",\"date\":\"2078-12-02\",\"notice\":\"<p>Notice<\\/p>\",\"file\":{}},\"RealFile\":\"opm_1642146466-8ls1h3vQDD (1)-X1hzBs96B2.pdf\"}', NULL, '2022-04-01 01:05:48', '2022-04-01 01:05:48', 15, 1),
(18, 'another-general', 'Another General', '{\"0\":{\"title\":\"Another General\",\"date\":\"2078-12-02\",\"notice\":\"<p>notice<\\/p>\",\"file\":{}},\"RealFile\":\"iron-man-full-hd-wallpaper-13_1643865362-wp3dsOa6pz.jpg\"}', NULL, '2022-03-30 12:54:43', '2022-03-30 12:54:43', 9, 1),
(50, 'atharasha-vathayalya-varatanagara-eka-canara', 'अ।दर्श विद्यालय विराटनगर एक चिनारी', '[{\"title\":\"\\u0905\\u0964\\u0926\\u0930\\u094d\\u0936 \\u0935\\u093f\\u0926\\u094d\\u092f\\u093e\\u0932\\u092f \\u0935\\u093f\\u0930\\u093e\\u091f\\u0928\\u0917\\u0930 \\u090f\\u0915 \\u091a\\u093f\\u0928\\u093e\\u0930\\u0940\",\"album_id\":\"50\",\"link\":\"https:\\/\\/www.youtube.com\\/watch?v=wOzXnDFUr_M&t=1s\",\"description\":\"<h1>\\u0905\\u0964\\u0926\\u0930\\u094d\\u0936 \\u0935\\u093f\\u0926\\u094d\\u092f\\u093e\\u0932\\u092f \\u0935\\u093f\\u0930\\u093e\\u091f\\u0928\\u0917\\u0930 \\u090f\\u0915 \\u091a\\u093f\\u0928\\u093e\\u0930\\u0940<\\/h1>\"},\"<iframe src=\\\"\\/\\/www.youtube.com\\/embed\\/wOzXnDFUr_M\\\" allowfullscreen><\\/iframe>\"]', NULL, '2022-04-01 05:12:24', '2022-04-02 10:35:41', 42, 1),
(23, 'organizational-structure', 'ORGANIZATIONAL STRUCTURE', '{\"title\":\"ORGANIZATIONAL STRUCTURE\",\"content\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi semper gravida magna, eget finibus tortor efficitur nec. In auctor nec mi at porta. Donec ut eros in lacus vestibulum suscipit. Donec justo mi, interdum aliquet vulputate quis, ornare quis orci. Etiam a tincidunt enim. Donec in orci ut ipsum molestie fringilla. Phasellus cursus molestie maximus.<\\/p>\\r\\n\\r\\n<p>Curabitur vitae nisl et metus elementum tristique. Mauris iaculis cursus urna, a vulputate velit viverra id. Vivamus gravida ex id sem condimentum, et vulputate sem iaculis. Aenean et quam cursus, pharetra erat at, semper libero. Nam finibus mauris eget arcu dapibus, quis venenatis turpis imperdiet. Nulla porttitor nulla nec semper ultricies. In at laoreet sem. Phasellus convallis elit in nisi dictum interdum. Fusce eleifend lacus ac sollicitudin maximus.<\\/p>\"}', 2, '2022-03-31 00:40:24', '2022-03-31 00:40:24', NULL, 1),
(3, 'school-management-team', 'SCHOOL MANAGEMENT TEAM', '{\"title\":\"SCHOOL MANAGEMENT TEAM\",\"content\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi semper gravida magna, eget finibus tortor efficitur nec. In auctor nec mi at porta. Donec ut eros in lacus vestibulum suscipit. Donec justo mi, interdum aliquet vulputate quis, ornare quis orci. Etiam a tincidunt enim. Donec in orci ut ipsum molestie fringilla. Phasellus cursus molestie maximus.<\\/p>\\r\\n\\r\\n<p>Curabitur vitae nisl et metus elementum tristique. Mauris iaculis cursus urna, a vulputate velit viverra id. Vivamus gravida ex id sem condimentum, et vulputate sem iaculis. Aenean et quam cursus, pharetra erat at, semper libero. Nam finibus mauris eget arcu dapibus, quis venenatis turpis imperdiet. Nulla porttitor nulla nec semper ultricies. In at laoreet sem. Phasellus convallis elit in nisi dictum interdum. Fusce eleifend lacus ac sollicitudin maximus.<\\/p>\"}', 2, '2022-03-30 08:06:51', '2022-03-30 08:06:51', NULL, 1),
(4, 'instituional-overviewhistory', 'INSTITUIONAL OVERVIEW(HISTORY)', '{\"_method\":\"PUT\",\"title\":\"INSTITUIONAL OVERVIEW(HISTORY)\",\"content\":\"<h2>Institutional Overview<\\/h2>\\r\\n\\r\\n<p>Adarsha Higher Secondary School was established by Krishna Prasad Koirala in the year 1986 B.S. It was the first school for general public in the period of Ranas. Most of the famous personalities in the eastern region have studied in this school. The great figures in Nepalese politics Bishweshwar Prasad Koirala, Matrika Prasad Koirala are concerned to this school directly or indirectly. Even the Ex. Prime Minister of the interim government Girija Prasad Koirala was admitted in this school in 1990 B.S. for his school education. Thousands of students have passed S.L.C. from this school. The school was seized by the Rana Prime Minister Juddha Shamser in 1995 and was known as &ldquo;Juddha English High School&rdquo;. Later in the year 2007 B.S. democracy was introduced and the school&rsquo;s name was changed as &ldquo;Adarsha School&rdquo;. It was the only school in the eastern region. So it was the base of education for all kinds of people in the region. In the year 2030 B.S. the school was formed as Multipurpose Secondary School but later it has been conducted as general school as per the norms of the government.<\\/p>\\r\\n\\r\\n<p>This school is the first and the best educational institution which has been giving light of life to the community in this area. It has already produced and still producing varieties of manpower such as expert industrialist expert politicians, administrators, literatures and so on who are the most important people for the development of a country. After its establishment it has got expert leaders and founders so that its physical and educational status is getting better and stronger day by day. As a result it has serving thousands of students for quality education every year.<\\/p>\\r\\n\\r\\n<p>Biratnagar-9, Morang, Nepal<\\/p>\\r\\n\\r\\n<p>Phone No: +977-21-522647, 021-525293<\\/p>\\r\\n\\r\\n<p>E-mail : info@adarshaschool.edu.np<\\/p>\"}', 2, '2022-03-30 08:07:26', '2022-03-30 09:10:32', NULL, 1),
(6, 'technical', 'TECHNICAL', NULL, 4, '2022-03-30 08:09:18', '2022-04-02 11:12:05', NULL, 1),
(7, 'non-technical', 'NON-TECHNICAL', NULL, 4, '2022-03-30 08:09:26', '2022-03-30 08:09:26', NULL, 1),
(8, 'd-com', 'D-COM', '{\"content\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi semper gravida magna, eget finibus tortor efficitur nec. In auctor nec mi at porta. Donec ut eros in lacus vestibulum suscipit. Donec justo mi, interdum aliquet vulputate quis, ornare quis orci. Etiam a tincidunt enim. Donec in orci ut ipsum molestie fringilla. Phasellus cursus molestie maximus.<\\/p>\\r\\n\\r\\n<p>Curabitur vitae nisl et metus elementum tristique. Mauris iaculis cursus urna, a vulputate velit viverra id. Vivamus gravida ex id sem condimentum, et vulputate sem iaculis. Aenean et quam cursus, pharetra erat at, semper libero. Nam finibus mauris eget arcu dapibus, quis venenatis turpis imperdiet. Nulla porttitor nulla nec semper ultricies. In at laoreet sem. Phasellus convallis elit in nisi dictum interdum. Fusce eleifend lacus ac sollicitudin maximus.<\\/p>\"}', NULL, '2022-03-30 08:09:53', '2022-03-30 08:09:53', 6, 1),
(9, 'general', 'GENERAL', NULL, 5, '2022-03-30 08:10:16', '2022-03-30 08:10:16', NULL, 1),
(21, 'lmabna-parathasha-vakalpaka-umamathavaralii-aavathanaka-lga-sacana', 'लुम्बिनी प्रदेश: वैकल्पिक उम्मेदवारलाई आवेदनको लागि सूचना', '{\"0\":{\"title\":\"\\u0932\\u0941\\u092e\\u094d\\u092c\\u093f\\u0928\\u0940 \\u092a\\u094d\\u0930\\u0926\\u0947\\u0936: \\u0935\\u0948\\u0915\\u0932\\u094d\\u092a\\u093f\\u0915 \\u0909\\u092e\\u094d\\u092e\\u0947\\u0926\\u0935\\u093e\\u0930\\u0932\\u093e\\u0908 \\u0906\\u0935\\u0947\\u0926\\u0928\\u0915\\u094b \\u0932\\u093e\\u0917\\u093f \\u0938\\u0942\\u091a\\u0928\\u093e\",\"date\":\"2078-12-03\",\"notice\":\"<p>&nbsp;&nbsp; &nbsp;\\u0932\\u0941\\u092e\\u094d\\u092c\\u093f\\u0928\\u0940 \\u092a\\u094d\\u0930\\u0926\\u0947\\u0936: \\u0935\\u0948\\u0915\\u0932\\u094d\\u092a\\u093f\\u0915 \\u0909\\u092e\\u094d\\u092e\\u0947\\u0926\\u0935\\u093e\\u0930\\u0932\\u093e\\u0908 \\u0906\\u0935\\u0947\\u0926\\u0928\\u0915\\u094b \\u0932\\u093e\\u0917\\u093f \\u0938\\u0942\\u091a\\u0928\\u093e<\\/p>\",\"file\":{}},\"RealFile\":\"opm_1642146466-8ls1h3vQDD.pdf\"}', NULL, '2022-03-30 13:13:38', '2022-03-30 13:13:38', 9, 1),
(36, 'result', 'Result', '{\"0\":{\"title\":\"Result\",\"description\":\"<p>Result<\\/p>\",\"file\":{}},\"RealFile\":\"opm_1642146466-GbMxfsitF7.pdf\"}', 6, '2022-03-31 02:32:19', '2022-03-31 02:32:19', NULL, 1),
(37, 'test', 'Test', '{\"0\":{\"title\":\"Test\",\"file\":{}},\"RealFile\":\"principal-xYK0P4v3EI.jpg\"}', 7, '2022-03-31 02:59:23', '2022-03-31 02:59:23', NULL, 1),
(51, 'adarsha-it-orientation-program2073-student-review-reactions', 'Adarsha IT Orientation Program(2073) - Student Review & Reactions', '[{\"title\":\"Adarsha IT Orientation Program(2073) - Student Review & Reactions\",\"album_id\":\"51\",\"link\":\"https:\\/\\/www.youtube.com\\/watch?v=dze8HQ-rhIE\",\"description\":\"<h1>Adarsha IT Orientation Program(2073) - Student Review &amp; Reactions<\\/h1>\"},\"<iframe src=\\\"\\/\\/www.youtube.com\\/embed\\/dze8HQ-rhIE\\\" allowfullscreen><\\/iframe>\"]', NULL, '2022-04-02 09:47:45', '2022-04-02 10:34:49', 42, 1),
(40, 'download-file', 'Download File', '{\"0\":{\"title\":\"Download File\",\"file\":{}},\"RealFile\":\"Laravel_ Up & Running_ A Framework for Building Modern PHP Apps-BnQhxgjDuy-5kee8plpCV.pdf\"}', 7, '2022-03-31 03:28:28', '2022-03-31 03:28:28', NULL, 1),
(41, 'photo-gallery', 'PHOTO GALLERY', NULL, 8, '2022-03-30 08:13:08', '2022-03-30 08:13:08', NULL, 1),
(42, 'video-gallery', 'VIDEO GALLERY', NULL, 8, '2022-03-30 08:13:08', '2022-03-30 08:13:08', NULL, 1),
(12, 'downloads-test', 'Downloads Test', '{\"0\":{\"title\":\"Downloads Test\",\"file\":{}},\"RealFile\":\"Laravel_ Up & Running_ A Framework for Building Modern PHP Apps-zcyclUEFeX.pdf\"}', 7, '2022-03-30 08:12:13', '2022-03-30 08:12:13', NULL, 1),
(43, 'album', 'Album', '{\"_method\":\"PUT\",\"title\":\"Album\",\"album_id\":\"43\",\"description\":\"<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis cumque earum omnis? Consectetur, asperiores ducimus.<\\/p>\",\"photo\":[{}]}', NULL, '2022-03-31 05:02:11', '2022-03-31 10:02:05', 41, 1),
(24, 'our-mission', 'OUR MISSION', '{\"title\":\"OUR MISSION\",\"content\":\"<p>orem ipsum dolor sit amet, consectetur adipiscing elit. Morbi semper gravida magna, eget finibus tortor efficitur nec. In auctor nec mi at porta. Donec ut eros in lacus vestibulum suscipit. Donec justo mi, interdum aliquet vulputate quis, ornare quis orci. Etiam a tincidunt enim. Donec in orci ut ipsum molestie fringilla. Phasellus cursus molestie maximus.<\\/p>\\r\\n\\r\\n<p>Curabitur vitae nisl et metus elementum tristique. Mauris iaculis cursus urna, a vulputate velit viverra id. Vivamus gravida ex id sem condimentum, et vulputate sem iaculis. Aenean et quam cursus, pharetra erat at, semper libero. Nam finibus mauris eget arcu dapibus, quis venenatis turpis imperdiet. Nulla porttitor nulla nec semper ultricies. In at laoreet sem. Phasellus convallis elit in nisi dictum interdum. Fusce eleifend lacus ac sollicitudin maximus.<\\/p>\"}', 2, '2022-03-31 00:41:47', '2022-03-31 00:41:47', NULL, 1),
(25, 'staff-directories', 'STAFF DIRECTORIES', '{\"title\":\"STAFF DIRECTORIES\",\"content\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi semper gravida magna, eget finibus tortor efficitur nec. In auctor nec mi at porta. Donec ut eros in lacus vestibulum suscipit. Donec justo mi, interdum aliquet vulputate quis, ornare quis orci. Etiam a tincidunt enim. Donec in orci ut ipsum molestie fringilla. Phasellus cursus molestie maximus.<\\/p>\\r\\n\\r\\n<p>Curabitur vitae nisl et metus elementum tristique. Mauris iaculis cursus urna, a vulputate velit viverra id. Vivamus gravida ex id sem condimentum, et vulputate sem iaculis. Aenean et quam cursus, pharetra erat at, semper libero. Nam finibus mauris eget arcu dapibus, quis venenatis turpis imperdiet. Nulla porttitor nulla nec semper ultricies. In at laoreet sem. Phasellus convallis elit in nisi dictum interdum. Fusce eleifend lacus ac sollicitudin maximus.<\\/p>\"}', 2, '2022-03-31 00:43:28', '2022-03-31 00:43:28', NULL, 1),
(26, 'd-civil', 'D-CIVIL', '{\"content\":\"<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis cumque earum omnis? Consectetur, asperiores ducimus.<\\/p>\\r\\n\\r\\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis cumque earum omnis? Consectetur, asperiores ducimus.<\\/p>\\r\\n\\r\\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis cumque earum omnis? Consectetur, asperiores ducimus.<\\/p>\\r\\n\\r\\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis cumque earum omnis? Consectetur, asperiores ducimus.<\\/p>\"}', NULL, '2022-03-31 01:24:23', '2022-03-31 01:24:23', 6, 1),
(27, 'pre-diploma', 'PRE-DIPLOMA', '{\"content\":\"<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis cumque earum omnis? Consectetur, asperiores ducimus.<\\/p>\"}', NULL, '2022-03-31 01:33:02', '2022-03-31 01:33:02', 6, 1),
(28, 'apprentiship-24-months', 'APPRENTISHIP 24 MONTHS', '{\"content\":\"<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis cumque earum omnis? Consectetur, asperiores ducimus.Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis cumque earum omnis? Consectetur, asperiores ducimus.Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis cumque earum omnis? Consectetur, asperiores ducimus.Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis cumque earum omnis? Consectetur, asperiores ducimus.Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis cumque earum omnis? Consectetur, asperiores ducimus.Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis cumque earum omnis? Consectetur, asperiores ducimus.Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis cumque earum omnis? Consectetur, asperiores ducimus.<\\/p>\"}', NULL, '2022-03-31 01:37:15', '2022-03-31 01:37:15', 6, 1),
(30, 'short-term-training', 'SHORT TERM TRAINING', '{\"content\":\"<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis cumque earum omnis? Consectetur, asperiores ducimus.Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis cumque earum omnis? Consectetur, asperiores ducimus.Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis cumque earum omnis? Consectetur, asperiores ducimus.Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis cumque earum omnis? Consectetur, asperiores ducimus.Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis cumque earum omnis? Consectetur, asperiores ducimus.Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis cumque earum omnis? Consectetur, asperiores ducimus.Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis cumque earum omnis? Consectetur, asperiores ducimus.<\\/p>\"}', NULL, '2022-03-31 01:38:45', '2022-03-31 01:38:45', 6, 1),
(31, 'school', 'SCHOOL', '{\"content\":\"<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis cumque earum omnis? Consectetur, asperiores ducimus.Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis cumque earum omnis? Consectetur, asperiores ducimus.Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis cumque earum omnis? Consectetur, asperiores ducimus.Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis cumque earum omnis? Consectetur, asperiores ducimus.Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis cumque earum omnis? Consectetur, asperiores ducimus.Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis cumque earum omnis? Consectetur, asperiores ducimus.Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis cumque earum omnis? Consectetur, asperiores ducimus.<\\/p>\"}', NULL, '2022-03-31 01:40:32', '2022-03-31 01:40:32', 7, 1),
(32, '102-science', '10+2 SCIENCE', '{\"content\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi semper gravida magna, eget finibus tortor efficitur nec. In auctor nec mi at porta. Donec ut eros in lacus vestibulum suscipit. Donec justo mi, interdum aliquet vulputate quis, ornare quis orci. Etiam a tincidunt enim. Donec in orci ut ipsum molestie fringilla. Phasellus cursus molestie maximus.<\\/p>\\r\\n\\r\\n<p>Curabitur vitae nisl et metus elementum tristique. Mauris iaculis cursus urna, a vulputate velit viverra id. Vivamus gravida ex id sem condimentum, et vulputate sem iaculis. Aenean et quam cursus, pharetra erat at, semper libero. Nam finibus mauris eget arcu dapibus, quis venenatis turpis imperdiet. Nulla porttitor nulla nec semper ultricies. In at laoreet sem. Phasellus convallis elit in nisi dictum interdum. Fusce eleifend lacus ac sollicitudin maximus.<\\/p>\"}', NULL, '2022-03-31 01:43:51', '2022-03-31 01:43:51', 7, 1),
(33, '102-management', '10+2 MANAGEMENT', '{\"content\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi semper gravida magna, eget finibus tortor efficitur nec. In auctor nec mi at porta. Donec ut eros in lacus vestibulum suscipit. Donec justo mi, interdum aliquet vulputate quis, ornare quis orci. Etiam a tincidunt enim. Donec in orci ut ipsum molestie fringilla. Phasellus cursus molestie maximus.<\\/p>\\r\\n\\r\\n<p>Curabitur vitae nisl et metus elementum tristique. Mauris iaculis cursus urna, a vulputate velit viverra id. Vivamus gravida ex id sem condimentum, et vulputate sem iaculis. Aenean et quam cursus, pharetra erat at, semper libero. Nam finibus mauris eget arcu dapibus, quis venenatis turpis imperdiet. Nulla porttitor nulla nec semper ultricies. In at laoreet sem. Phasellus convallis elit in nisi dictum interdum. Fusce eleifend lacus ac sollicitudin maximus.<\\/p>\"}', NULL, '2022-03-31 01:46:29', '2022-03-31 01:46:29', 7, 1),
(34, '102-education', '10+2 EDUCATION', '{\"content\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi semper gravida magna, eget finibus tortor efficitur nec. In auctor nec mi at porta. Donec ut eros in lacus vestibulum suscipit. Donec justo mi, interdum aliquet vulputate quis, ornare quis orci. Etiam a tincidunt enim. Donec in orci ut ipsum molestie fringilla. Phasellus cursus molestie maximus.<\\/p>\\r\\n\\r\\n<p>Curabitur vitae nisl et metus elementum tristique. Mauris iaculis cursus urna, a vulputate velit viverra id. Vivamus gravida ex id sem condimentum, et vulputate sem iaculis. Aenean et quam cursus, pharetra erat at, semper libero. Nam finibus mauris eget arcu dapibus, quis venenatis turpis imperdiet. Nulla porttitor nulla nec semper ultricies. In at laoreet sem. Phasellus convallis elit in nisi dictum interdum. Fusce eleifend lacus ac sollicitudin maximus.<\\/p>\"}', NULL, '2022-03-31 01:47:27', '2022-03-31 01:47:27', 7, 1),
(35, 'exam-notice', 'Exam Notice', '{\"0\":{\"title\":\"Exam Notice\",\"date\":\"2078-12-24\",\"notice\":\"<p>Exam Notice<\\/p>\",\"file\":{}},\"RealFile\":\"opm_1642146466-8ls1h3vQDD-SXjhJkwHFD.pdf\"}', NULL, '2022-03-31 02:31:00', '2022-03-31 02:31:00', 15, 1),
(46, 'principles-message', 'Principle\'s Message', '{\"_method\":\"PUT\",\"name\":\"Bishnu Parajuli\",\"message\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam consectetur erat id lacus sollicitudin sagittis. In fringilla sapien mi, eget tempus augue fringilla non. In hac habitasse platea dictumst. Phasellus convallis lorem arcu, at volutpat sem porta at. Sed rhoncus, arcu quis pharetra iaculis, nisl nisi blandit dolor, id aliquet arcu orci vel lorem. Nulla eget sapien id odio dictum tristique sit amet ut quam. Sed mollis lacus scelerisque sapien lobortis sollicitudin. Fusce in tortor augue. In ornare vulputate dolor non dictum. Suspendisse vitae dolor tempor, efficitur enim a, tincidunt massa. Morbi sit amet hendrerit quam. Nunc suscipit rutrum turpis, vitae accumsan lectus egestas vel.<\\/p>\\r\\n\\r\\n<p>Proin aliquet interdum pulvinar. Sed turpis nunc, malesuada eget condimentum ac, luctus ut erat. Curabitur sed justo id nisi suscipit consectetur. Nam sodales nibh lectus, a accumsan nunc porta sit amet. Nulla et consectetur orci, eget sodales lorem. Cras vel nulla dignissim, auctor risus semper, pellentesque sapien. Proin id dignissim elit. Aliquam nec sagittis eros. Pellentesque tincidunt pellentesque rhoncus. Sed a malesuada leo. Vestibulum massa erat, vulputate vitae elit at, porttitor malesuada mauris. Maecenas suscipit, nulla vulputate dapibus dignissim, nunc orci aliquet lacus, id pharetra purus nunc eget libero. In consequat est elit, et viverra nisi pellentesque quis. Integer faucibus malesuada velit quis dapibus.<\\/p>\\r\\n\\r\\n<p>Nunc tempus gravida molestie. Vivamus eros lorem, fermentum id molestie id, laoreet ut odio. Donec quis dictum arcu. Pellentesque sit amet ipsum imperdiet, dictum orci nec, viverra purus. Praesent sagittis dolor nec tellus convallis lobortis. Nullam tortor eros, elementum sed lacus ac, lobortis fringilla leo. Donec commodo massa nisi, et finibus nibh tincidunt at. Nulla ut lacus dictum, varius nulla eu, tristique erat. Vivamus auctor iaculis justo vitae faucibus.<\\/p>\\r\\n\\r\\n<p>&nbsp;<\\/p>\",\"photo\":{}}', 12, '2022-03-31 23:59:10', '2022-04-02 10:43:31', NULL, 1),
(52, 'aadarsh-school-biratnagar-07', 'Aadarsh school Biratnagar 07', '[{\"title\":\"Aadarsh school Biratnagar 07\",\"album_id\":\"42\",\"link\":\"https:\\/\\/www.youtube.com\\/watch?v=lZ3p8qYvZws\",\"description\":\"<h1>Aadarsh school Biratnagar 07<\\/h1>\"},\"<iframe src=\\\"\\/\\/www.youtube.com\\/embed\\/lZ3p8qYvZws\\\" allowfullscreen><\\/iframe>\"]', NULL, '2022-04-02 10:41:39', '2022-04-02 10:41:39', 42, 1);

-- --------------------------------------------------------

--
-- Table structure for table `page_types`
--

DROP TABLE IF EXISTS `page_types`;
CREATE TABLE IF NOT EXISTS `page_types` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `show_on_homepage` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_types`
--

INSERT INTO `page_types` (`id`, `title`, `slug`, `created_at`, `updated_at`, `show_on_homepage`) VALUES
(1, 'HOME', '/', '2022-03-30 07:53:50', '2022-04-03 00:43:24', 1),
(2, 'ABOUT US', 'about-us', '2022-03-30 07:55:03', '2022-04-03 00:43:48', 1),
(3, 'CONTACT US', 'contact-us', '2022-03-30 07:55:24', '2022-04-01 04:03:00', 1),
(4, 'FACULTIES', 'faculties', '2022-03-30 07:55:49', '2022-03-30 07:55:49', 1),
(5, 'NOTICE BOARD', 'notice-board', '2022-03-30 07:56:16', '2022-03-30 07:56:16', 1),
(6, 'RESULT', 'result', '2022-03-30 07:56:36', '2022-03-30 07:56:36', 1),
(7, 'DOWNLOADS', 'downloads', '2022-03-30 07:56:48', '2022-03-30 07:56:48', 1),
(8, 'GALLERY', 'gallery', '2022-03-30 07:57:34', '2022-03-30 07:57:34', 1),
(9, 'ALUMNI', 'alumni', '2022-03-30 07:57:51', '2022-04-02 23:44:10', 0),
(11, 'Slider', 'slider', '2022-03-30 08:02:22', '2022-03-30 08:02:22', NULL),
(12, 'Message', 'message', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

DROP TABLE IF EXISTS `pictures`;
CREATE TABLE IF NOT EXISTS `pictures` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageable_id` bigint(20) UNSIGNED NOT NULL,
  `imageable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_banner` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`id`, `url`, `imageable_id`, `imageable_type`, `is_banner`, `created_at`, `updated_at`) VALUES
(33, 'principal-dkaGszxZAt.jpg', 1, 'App\\Models\\page', 0, '2022-04-02 22:50:41', '2022-04-02 22:50:41'),
(34, 'student3-X3yG2O3QDy.jpg', 1, 'App\\Models\\page', 0, '2022-04-02 22:50:41', '2022-04-02 22:50:41'),
(32, 'student3-xoVCofdlVT.jpg', 46, 'App\\Models\\page', 0, '2022-04-02 10:43:31', '2022-04-02 10:43:31'),
(36, 'student1-fnhDaLyKyJ.jpg', 1, 'App\\Models\\page', 0, '2022-04-02 22:50:41', '2022-04-02 22:50:41'),
(6, 'student3-Qc6AsziwdX.jpg', 13, 'App\\Models\\page', 0, '2022-03-30 08:13:08', '2022-03-30 08:13:08'),
(7, 'student2-EbU0Deu8LO.jpg', 13, 'App\\Models\\page', 0, '2022-03-30 08:13:08', '2022-03-30 08:13:08'),
(8, 'student1-ro9xY1HPTU.jpg', 13, 'App\\Models\\page', 0, '2022-03-30 08:13:08', '2022-03-30 08:13:08'),
(9, 'bike3-0w3hbqaLpE.jpg', 13, 'App\\Models\\page', 0, '2022-03-30 08:13:08', '2022-03-30 08:13:08'),
(10, 'bike2-SIOLoVcNtQ.jpg', 13, 'App\\Models\\page', 0, '2022-03-30 08:13:08', '2022-03-30 08:13:08'),
(11, 'bike1-KngX9VICAP.jpg', 13, 'App\\Models\\page', 0, '2022-03-30 08:13:08', '2022-03-30 08:13:08'),
(12, 'blueberry_ice_cream-MDvmQezaHP.jpg', 13, 'App\\Models\\page', 0, '2022-03-30 08:13:08', '2022-03-30 08:13:08'),
(13, 'blueberry_cupcakes-IICGuycOYJ.jpg', 13, 'App\\Models\\page', 0, '2022-03-30 08:13:08', '2022-03-30 08:13:08'),
(35, 'student2-yzs8dejzSA.jpg', 1, 'App\\Models\\page', 0, '2022-04-02 22:50:41', '2022-04-02 22:50:41'),
(20, 'bike3-RZY6HikkdD.jpg', 43, 'App\\Models\\page', 0, '2022-03-31 05:02:11', '2022-03-31 05:02:11'),
(22, 'tiramisu-t7tBKXiCNF.jpg', 44, 'App\\Models\\page', 0, '2022-03-31 10:29:14', '2022-03-31 10:29:14'),
(24, 'lemon_cake-jHTL4RCFKX.jpg', 44, 'App\\Models\\page', 0, '2022-03-31 10:29:14', '2022-03-31 10:29:14'),
(25, 'fudge_brownies-ObaJPRpwy4.jpg', 44, 'App\\Models\\page', 0, '2022-03-31 10:29:14', '2022-03-31 10:29:14'),
(26, 'espresso_crinkles-BVgboAwsCZ.jpg', 44, 'App\\Models\\page', 0, '2022-03-31 10:29:14', '2022-03-31 10:29:14'),
(27, 'cobbler-cmAeTzSSHp.jpg', 44, 'App\\Models\\page', 0, '2022-03-31 10:29:14', '2022-03-31 10:29:14'),
(28, 'chocolate_mint_bar-NynrgKzePw.jpg', 44, 'App\\Models\\page', 0, '2022-03-31 10:29:14', '2022-03-31 10:29:14'),
(29, 'chocolate_cherry_cookies-chAGVSynZz.jpg', 44, 'App\\Models\\page', 0, '2022-03-31 10:29:14', '2022-03-31 10:29:14'),
(30, 'cheesecake-rHYn52RPIp.jpg', 44, 'App\\Models\\page', 0, '2022-03-31 10:29:14', '2022-03-31 10:29:14'),
(40, 'principal-xYK0P4v3EI-aX6qu3zlKb.jpg', 22, 'App\\Models\\page', 0, '2022-04-03 00:39:20', '2022-04-03 00:39:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$I64ETe5awtHNNort7u8dYukfYHZA8CBwuvl/q/PXU6xZ.7DkOQkgS', NULL, '2022-03-23 23:53:21', '2022-03-23 23:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

DROP TABLE IF EXISTS `visitors`;
CREATE TABLE IF NOT EXISTS `visitors` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `ip`, `created_at`, `updated_at`) VALUES
(1, '192.168.1.76', '2022-04-03 01:23:14', '2022-04-03 01:23:14'),
(2, '192.168.1.100', '2022-04-03 01:24:02', '2022-04-03 01:24:02'),
(3, '127.0.0.1', '2022-04-03 22:53:08', '2022-04-03 22:53:08');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
