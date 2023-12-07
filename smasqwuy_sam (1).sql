-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2023 at 12:52 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smasqwuy_sam`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_providers`
--

CREATE TABLE `api_providers` (
  `id` int(10) UNSIGNED NOT NULL,
  `ids` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'standard',
  `balance` decimal(15,5) DEFAULT NULL,
  `currency_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `api_providers`
--

INSERT INTO `api_providers` (`id`, `ids`, `uid`, `name`, `url`, `key`, `type`, `balance`, `currency_code`, `description`, `status`, `changed`, `created`) VALUES
(1, '6c08835fc25dd0add2f1f6be7c828578', 78, 'HQ Smartpanel', 'https://hqsmartpanel.com/api/v1', 'JIyPCexcfKPOjsSGlcjHYV4n5yRsVgCE', 'standard', NULL, NULL, 'HQ SmartPanel - Services - The Best SMM Panel - Social Media Services for Resellers\r\n', 1, '2019-04-10 10:41:29', '2019-04-10 10:41:29'),
(2, '628831215f23345213df1f6be7c8243', 1, 'momopanel.com', 'https://momopanel.com/api/v2', '8de900149a5c680a892fdef8f1cc3ce2', 'standard', NULL, NULL, 'Momopanel - Cheapest Services for All Reseller\r\n\r\n', 1, '2019-04-10 10:41:29', '2019-04-09 11:36:34'),
(3, '628831215f23345213df1f6be7c828432fd', 1, 'Vina SMM', 'https://vinasmm.com/api/v2', '9d4b547e634dba2330ae3b6c148918fa', 'standard', NULL, NULL, 'Vina SMM', 1, '2019-04-10 10:41:29', '2019-04-09 11:36:34');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `ids` text DEFAULT NULL,
  `sncate_id` int(11) DEFAULT NULL,
  `lang_code` varchar(10) DEFAULT 'en',
  `parent_id` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `url_slug` varchar(255) DEFAULT NULL,
  `name` text DEFAULT NULL,
  `required_field` varchar(255) DEFAULT NULL,
  `page_title` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `faqs` longtext DEFAULT NULL,
  `features` text DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT 1,
  `created` datetime DEFAULT NULL,
  `changed` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `ids`, `sncate_id`, `lang_code`, `parent_id`, `uid`, `url_slug`, `name`, `required_field`, `page_title`, `meta_keywords`, `meta_description`, `content`, `faqs`, `features`, `sort`, `status`, `created`, `changed`) VALUES
(13, '7df74771c40cd072a26427b4e9e0d4e8', 1, 'en', NULL, 1, 'buy-instagram-followers', 'Instagram Followers', 'Instagram Username', 'SmartStore - Buy Instagram Followers', 'Buy Instagram Followers', 'SmartStore - Buy Instagram Followers', '<div> <h2>What is Lorem Ipsum?</h2> <p><strong>Lorem Ipsum</strong><span>&nbsp;</span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p> </div> <div> <h2>Why do we use it?</h2> <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p> </div> <p></p> <div> <h2>Where does it come from?</h2> <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p> <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p> </div> <div> <h2>Where can I get some?</h2> <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p> </div>', NULL, '[{\"icon\":\"star\",\"content\":\"<strong>High Quality<\\/strong>\"},{\"icon\":\"unlock\",\"content\":\"<strong>No Password<\\/strong> Needed\"},{\"icon\":\"thumbs-up\",\"content\":\"Drop <strong>Protection<\\/strong>\"},{\"icon\":\"shield\",\"content\":\"<strong>Safe<\\/strong> and <strong>Easy<\\/strong>\"},{\"icon\":\"message-circle\",\"content\":\"<strong>Instant Delivery<\\/strong> Guaranteed\"},{\"icon\":\"check\",\"content\":\"Secure Payments\"}]', 1, 1, '2019-09-03 10:43:54', '2019-10-09 21:53:57'),
(14, '61740531d5bd2c42776c4360075ec788', 1, 'en', NULL, 1, 'buy-instagram-likes', 'Instagram Likes', 'Post URL', 'SmartStore - Buy Instagram Likes', 'Buy Instagram Likes', 'SmartStore - Buy Instagram Likes', '<div>\r\n<h2>What is Lorem Ipsum?</h2>\r\n<p><strong>Lorem Ipsum</strong><span>&nbsp;</span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>\r\n<div>\r\n<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n</div>\r\n<p></p>\r\n<div>\r\n<h2>Where does it come from?</h2>\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n</div>\r\n<div>\r\n<h2>Where can I get some?</h2>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n</div>', NULL, '[{\"icon\":\"star\",\"content\":\"<strong>High Quality<\\/strong>\"},{\"icon\":\"unlock\",\"content\":\"<strong>No Password<\\/strong> Needed\"},{\"icon\":\"thumbs-up\",\"content\":\"Drop <strong>Protection<\\/strong>\"},{\"icon\":\"shield\",\"content\":\"<strong>Safe<\\/strong> and <strong>Easy<\\/strong>\"},{\"icon\":\"message-circle\",\"content\":\"<strong>Instant Delivery<\\/strong> Guaranteed\"},{\"icon\":\"check\",\"content\":\"Secure Payments\"}]', 2, 1, '2019-09-03 10:45:28', '2019-10-09 21:53:05'),
(15, 'ad5f11099f2252d7c159c1f0904395e5', 2, 'en', NULL, 1, 'buy-facebook-likes', 'Facebook Likes', 'Facebook Post URL *', 'SmartStore - Buy Facebook Likes', 'Buy Facebook Likes', 'SmartStore - Buy Facebook Likes', '<div>\r\n<h2>What is Lorem Ipsum?</h2>\r\n<p><strong>Lorem Ipsum</strong><span>&nbsp;</span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>\r\n<div>\r\n<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n</div>\r\n<p></p>\r\n<div>\r\n<h2>Where does it come from?</h2>\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n</div>\r\n<div>\r\n<h2>Where can I get some?</h2>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n</div>', NULL, '[{\"icon\":\"star\",\"content\":\"<strong>High Quality<\\/strong>\"},{\"icon\":\"unlock\",\"content\":\"<strong>No Password<\\/strong> Needed\"},{\"icon\":\"thumbs-up\",\"content\":\"Drop <strong>Protection<\\/strong>\"},{\"icon\":\"shield\",\"content\":\"<strong>Safe<\\/strong> and <strong>Easy<\\/strong>\"},{\"icon\":\"message-circle\",\"content\":\"<strong>Instant Delivery<\\/strong> Guaranteed\"},{\"icon\":\"check\",\"content\":\"Secure Payments\"}]', 1, 1, '2019-09-19 23:29:20', '2019-10-09 21:53:43'),
(16, '30a45805857e6459481cdc9314e55606', 1, 'en', NULL, 1, 'buy-instagram-views', 'Instagram Views', 'Post URL', 'SmartStore - Buy Instagram Views', 'Instagram Likes, Instagram views, Buy Instagram Views', 'SmartStore - Buy Instagram Views', '<div>\r\n<h2>What is Lorem Ipsum?</h2>\r\n<p><strong>Lorem Ipsum</strong><span>&nbsp;</span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>\r\n<div>\r\n<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n</div>\r\n<p></p>\r\n<div>\r\n<h2>Where does it come from?</h2>\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n</div>\r\n<div>\r\n<h2>Where can I get some?</h2>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n</div>', NULL, '[{\"icon\":\"star\",\"content\":\"<strong>High Quality<\\/strong>\"},{\"icon\":\"unlock\",\"content\":\"<strong>No Password<\\/strong> Needed\"},{\"icon\":\"thumbs-up\",\"content\":\"Drop <strong>Protection<\\/strong>\"},{\"icon\":\"shield\",\"content\":\"<strong>Safe<\\/strong> and <strong>Easy<\\/strong>\"},{\"icon\":\"message-circle\",\"content\":\"<strong>Instant Delivery<\\/strong> Guaranteed\"},{\"icon\":\"check\",\"content\":\"Secure Payments\"}]', 3, 1, '2019-10-09 14:59:27', '2019-10-09 14:59:27'),
(17, 'f9afd0e35acd2e4c0095a0fbca9c09db', 4, 'en', NULL, 1, 'buy-youtube-views', 'Youtube Views', 'Video URL', 'SmartStore - Buy Youtube Views', 'Buy Youtube Views, Buy Youtube Video Likes', 'SmartStore - Buy Youtube Views', '<div>\r\n<h2>What is Lorem Ipsum?</h2>\r\n<p><strong>Lorem Ipsum</strong><span>&nbsp;</span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>\r\n<div>\r\n<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n</div>\r\n<p></p>\r\n<div>\r\n<h2>Where does it come from?</h2>\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n</div>\r\n<div>\r\n<h2>Where can I get some?</h2>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n</div>', NULL, '[{\"icon\":\"star\",\"content\":\"<strong>High Quality<\\/strong>\"},{\"icon\":\"unlock\",\"content\":\"<strong>No Password<\\/strong> Needed\"},{\"icon\":\"thumbs-up\",\"content\":\"Drop <strong>Protection<\\/strong>\"},{\"icon\":\"shield\",\"content\":\"<strong>Safe<\\/strong> and <strong>Easy<\\/strong>\"},{\"icon\":\"message-circle\",\"content\":\"<strong>Instant Delivery<\\/strong> Guaranteed\"},{\"icon\":\"check\",\"content\":\"Secure Payments\"}]', 1, 1, '2019-10-09 15:03:21', '2019-10-09 15:03:21'),
(18, 'b7399140ff2abb82ebb93e7a88171e1b', 4, 'en', NULL, 1, 'buy-youtube-video-likes', 'Youtube Video Likes', 'Video URL', 'SmartStore - Buy Youtube Video Likes', 'Buy Youtube Video Likes', 'SmartStore - Buy Youtube Video Likes', '<div>\r\n<h2>What is Lorem Ipsum?</h2>\r\n<p><strong>Lorem Ipsum</strong><span>&nbsp;</span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>\r\n<div>\r\n<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n</div>\r\n<p></p>\r\n<div>\r\n<h2>Where does it come from?</h2>\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n</div>\r\n<div>\r\n<h2>Where can I get some?</h2>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n</div>', NULL, '[{\"icon\":\"star\",\"content\":\"<strong>High Quality<\\/strong>\"},{\"icon\":\"unlock\",\"content\":\"<strong>No Password<\\/strong> Needed\"},{\"icon\":\"thumbs-up\",\"content\":\"Drop <strong>Protection<\\/strong>\"},{\"icon\":\"shield\",\"content\":\"<strong>Safe<\\/strong> and <strong>Easy<\\/strong>\"},{\"icon\":\"message-circle\",\"content\":\"<strong>Instant Delivery<\\/strong> Guaranteed\"},{\"icon\":\"check\",\"content\":\"Secure Payments\"}]', 2, 1, '2019-10-09 15:04:16', '2019-10-09 15:04:16'),
(19, '4082691e54de09baa870f45f8339a087', 4, 'en', NULL, 1, 'buy-youtube-subscribers', 'Youtube Subscribers', 'Chanel URL', 'SmartStore - Buy Youtube Video Subscribers', 'Buy Youtube Video Subscribers', 'SmartStore - Buy Youtube Video Subscribers', '<div>\r\n<h2>What is Lorem Ipsum?</h2>\r\n<p><strong>Lorem Ipsum</strong><span>&nbsp;</span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>\r\n<div>\r\n<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n</div>\r\n<p></p>\r\n<div>\r\n<h2>Where does it come from?</h2>\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n</div>\r\n<div>\r\n<h2>Where can I get some?</h2>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n</div>', NULL, '[{\"icon\":\"star\",\"content\":\"<strong>High Quality<\\/strong>\"},{\"icon\":\"unlock\",\"content\":\"<strong>No Password<\\/strong> Needed\"},{\"icon\":\"thumbs-up\",\"content\":\"Drop <strong>Protection<\\/strong>\"},{\"icon\":\"shield\",\"content\":\"<strong>Safe<\\/strong> and <strong>Easy<\\/strong>\"},{\"icon\":\"message-circle\",\"content\":\"<strong>Instant Delivery<\\/strong> Guaranteed\"},{\"icon\":\"check\",\"content\":\"Secure Payments\"}]', 3, 1, '2019-10-09 15:06:20', '2019-10-09 15:06:20'),
(20, '3044a63996be5cc2719322685a2e8ae5', 3, 'en', NULL, 1, 'buy-twitter-likes', 'Twitter Likes', 'Tweet URL', 'SmartStore - Buy Twitter Likes', 'Buy Twitter Likes', 'SmartStore - Buy Twitter Likes', '<div>\r\n<h2>What is Lorem Ipsum?</h2>\r\n<p><strong>Lorem Ipsum</strong><span>&nbsp;</span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>\r\n<div>\r\n<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n</div>\r\n<p></p>\r\n<div>\r\n<h2>Where does it come from?</h2>\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n</div>\r\n<div>\r\n<h2>Where can I get some?</h2>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n</div>', NULL, '[{\"icon\":\"star\",\"content\":\"<strong>High Quality<\\/strong>\"},{\"icon\":\"unlock\",\"content\":\"<strong>No Password<\\/strong> Needed\"},{\"icon\":\"thumbs-up\",\"content\":\"Drop <strong>Protection<\\/strong>\"},{\"icon\":\"shield\",\"content\":\"<strong>Safe<\\/strong> and <strong>Easy<\\/strong>\"},{\"icon\":\"message-circle\",\"content\":\"<strong>Instant Delivery<\\/strong> Guaranteed\"},{\"icon\":\"check\",\"content\":\"Secure Payments\"}]', 2, 1, '2019-10-09 15:08:38', '2019-10-09 15:12:08'),
(21, 'aa158f0b5b223d87c5b84ab2df5955fd', 3, 'en', NULL, 1, 'buy-twitter-followers', 'Twitter Followers', 'Account URL', 'SmartStore - Buy Twitter Followers', 'Buy Twitter Followers', 'SmartStore - Buy Twitter Followers', '<div>\r\n<h2>What is Lorem Ipsum?</h2>\r\n<p><strong>Lorem Ipsum</strong><span>&nbsp;</span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>\r\n<div>\r\n<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n</div>\r\n<p></p>\r\n<div>\r\n<h2>Where does it come from?</h2>\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n</div>\r\n<div>\r\n<h2>Where can I get some?</h2>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n</div>', NULL, '[{\"icon\":\"star\",\"content\":\"<strong>High Quality<\\/strong>\"},{\"icon\":\"unlock\",\"content\":\"<strong>No Password<\\/strong> Needed\"},{\"icon\":\"thumbs-up\",\"content\":\"Drop <strong>Protection<\\/strong>\"},{\"icon\":\"shield\",\"content\":\"<strong>Safe<\\/strong> and <strong>Easy<\\/strong>\"},{\"icon\":\"message-circle\",\"content\":\"<strong>Instant Delivery<\\/strong> Guaranteed\"},{\"icon\":\"check\",\"content\":\"Secure Payments\"}]', 1, 1, '2019-10-09 15:11:50', '2019-10-09 15:11:50'),
(22, 'ef23f3b77a85ac50e308b856706b9d2d', 3, 'en', NULL, 1, 'buy-twitter-reweets', 'Twitter Reweets', 'Tweet URL', 'SmartStore - Buy Twitter Reweets', 'Buy Twitter Reweets', 'SmartStore - Buy Twitter Reweets', '<div>\r\n<h2>What is Lorem Ipsum?</h2>\r\n<p><strong>Lorem Ipsum</strong><span>&nbsp;</span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>\r\n<div>\r\n<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n</div>\r\n<p></p>\r\n<div>\r\n<h2>Where does it come from?</h2>\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n</div>\r\n<div>\r\n<h2>Where can I get some?</h2>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n</div>', NULL, '[{\"icon\":\"star\",\"content\":\"<strong>High Quality<\\/strong>\"},{\"icon\":\"unlock\",\"content\":\"<strong>No Password<\\/strong> Needed\"},{\"icon\":\"thumbs-up\",\"content\":\"Drop <strong>Protection<\\/strong>\"},{\"icon\":\"shield\",\"content\":\"<strong>Safe<\\/strong> and <strong>Easy<\\/strong>\"},{\"icon\":\"message-circle\",\"content\":\"<strong>Instant Delivery<\\/strong> Guaranteed\"},{\"icon\":\"check\",\"content\":\"Secure Payments\"}]', 3, 1, '2019-10-09 15:15:58', '2019-10-09 15:15:58');

-- --------------------------------------------------------

--
-- Table structure for table `general_blogs`
--

CREATE TABLE `general_blogs` (
  `id` int(11) NOT NULL,
  `ids` text DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `url_slug` varchar(255) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT 1,
  `created` datetime DEFAULT NULL,
  `changed` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `general_blogs`
--

INSERT INTO `general_blogs` (`id`, `ids`, `uid`, `title`, `category`, `url_slug`, `image`, `content`, `meta_keywords`, `meta_description`, `sort`, `status`, `created`, `changed`) VALUES
(1, '2d525b99959c950c6ece1f049dfc058b', 1, 'How it Work', 'Instagram', 'how-it-work', 'https://dummyimage.com/900x500/febf00/aaa', '&lt;h1&gt;Lorem Ipsum&lt;/h1&gt;\r\n&lt;hr&gt;\r\n&lt;div id=&quot;Content&quot;&gt;\r\n&lt;div id=&quot;bannerL&quot;&gt;\r\n&lt;div id=&quot;div-gpt-ad-1474537762122-2&quot; data-google-query-id=&quot;CNzkjqXtjuUCFVSKaAod7KkH7Q&quot;&gt;\r\n&lt;div id=&quot;google_ads_iframe_/15188745/Lipsum-Unit3_0__container__&quot;&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;boxed&quot;&gt;\r\n&lt;div id=&quot;lipsum&quot;&gt;\r\n&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec imperdiet volutpat justo, nec cursus risus vulputate ut. In facilisis eu felis in elementum. Aenean aliquam nisl vel enim vulputate, ut accumsan magna eleifend. Donec ac erat lobortis, elementum eros vel, pellentesque purus. Pellentesque egestas tortor sit amet tortor condimentum, non dictum magna varius. Donec ut elit molestie, rhoncus massa malesuada, mollis lectus. Donec scelerisque libero sit amet velit mattis iaculis. Donec pulvinar mi ante, ac commodo sem luctus vel. Fusce facilisis mauris eu accumsan dignissim. Etiam in libero vitae ipsum placerat sodales eget vitae orci. Ut ultricies id nibh at euismod. Pellentesque non luctus tortor, sit amet venenatis nisl. Quisque augue mauris, egestas tempor vehicula nec, pulvinar ut enim. Nulla facilisis ex id purus malesuada maximus. In vitae tincidunt lacus. Praesent eu rutrum dolor.&lt;/p&gt;\r\n&lt;p&gt;Phasellus in urna vel arcu gravida consectetur aliquet in ligula. Aliquam et dictum erat. In imperdiet laoreet aliquet. Cras mollis risus congue ex dignissim scelerisque. Nam varius arcu ac pharetra mattis. Ut venenatis pharetra semper. Duis diam risus, bibendum sed vestibulum eget, iaculis sed massa. Vestibulum hendrerit in mauris non finibus. Maecenas risus quam, accumsan sollicitudin felis vel, pretium dignissim mi.&lt;/p&gt;\r\n&lt;p&gt;Nulla facilisi. Phasellus vitae justo vel nulla varius ultrices. Sed maximus felis id pulvinar egestas. Morbi interdum facilisis dolor eleifend lobortis. Ut dignissim enim id arcu faucibus maximus. Proin id feugiat leo. Sed nec dolor vitae diam lacinia vestibulum in porta nibh. In hac habitasse platea dictumst. Aliquam posuere feugiat nisl, id vestibulum dui hendrerit a. Proin eget condimentum ipsum. Duis hendrerit ultricies leo in pulvinar. Donec luctus, nunc egestas sagittis pretium, justo diam condimentum ipsum, id tempor magna nisl condimentum libero. Vestibulum in sagittis quam, ac dictum dolor.&lt;/p&gt;\r\n&lt;p&gt;Morbi viverra risus at condimentum venenatis. Cras id massa tincidunt nibh posuere convallis. Duis ante urna, mattis sed venenatis a, vestibulum vehicula nibh. Maecenas sit amet turpis mauris. Sed tristique nulla et odio venenatis, nec tincidunt risus pulvinar. Proin risus velit, lobortis eget nulla id, dignissim tristique tortor. Morbi id elit in massa facilisis fermentum. Integer egestas neque eu felis pulvinar, sed pretium metus dapibus. Quisque consectetur orci scelerisque, lacinia quam at, iaculis magna. In sed posuere sem, eu lobortis erat. Etiam quis maximus felis. Vivamus fringilla nisl velit, vitae bibendum arcu dignissim sed. Vestibulum ut metus nunc. Curabitur convallis magna diam, sit amet molestie arcu blandit sit amet.&lt;/p&gt;\r\n&lt;p&gt;Sed ullamcorper diam in lorem dignissim, eget ornare velit condimentum. Aliquam volutpat volutpat ligula ut lacinia. In eu hendrerit dolor, sit amet dictum sem. Vivamus est urna, bibendum vitae nisi vitae, tincidunt fringilla dui. Aenean sed enim nisi. Suspendisse potenti. Phasellus elit massa, tincidunt in pulvinar sit amet, luctus sed risus. Fusce faucibus tortor a accumsan laoreet. Nulla ac velit vitae neque sollicitudin cursus eget a nunc. Sed volutpat ipsum eu metus porta bibendum. Etiam rhoncus arcu sit amet nisi cursus, sed molestie lectus dapibus. Curabitur eleifend porttitor libero nec iaculis. Phasellus malesuada turpis quis magna congue vehicula. Nunc volutpat pretium odio a ullamcorper. Praesent elementum augue at tellus bibendum consectetur.&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;', '', '', 1, 0, '2019-09-23 17:01:38', '2019-10-09 21:44:45'),
(2, 'fc52d9a378a549e5b0313c4ea134a3f4', 1, 'How to Change Instagram Username Easily? – [Proven Way – 2019]', 'Instagram', 'how-to-change-instagram-username-easily-proven-way-2019', 'https://dummyimage.com/900x500/febf00/aaa', '&lt;h1&gt;Lorem Ipsum&lt;/h1&gt;\r\n&lt;hr&gt;\r\n&lt;div id=&quot;Content&quot;&gt;\r\n&lt;div id=&quot;bannerL&quot;&gt;\r\n&lt;div id=&quot;div-gpt-ad-1474537762122-2&quot; data-google-query-id=&quot;CNzkjqXtjuUCFVSKaAod7KkH7Q&quot;&gt;\r\n&lt;div id=&quot;google_ads_iframe_/15188745/Lipsum-Unit3_0__container__&quot;&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;boxed&quot;&gt;\r\n&lt;div id=&quot;lipsum&quot;&gt;\r\n&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec imperdiet volutpat justo, nec cursus risus vulputate ut. In facilisis eu felis in elementum. Aenean aliquam nisl vel enim vulputate, ut accumsan magna eleifend. Donec ac erat lobortis, elementum eros vel, pellentesque purus. Pellentesque egestas tortor sit amet tortor condimentum, non dictum magna varius. Donec ut elit molestie, rhoncus massa malesuada, mollis lectus. Donec scelerisque libero sit amet velit mattis iaculis. Donec pulvinar mi ante, ac commodo sem luctus vel. Fusce facilisis mauris eu accumsan dignissim. Etiam in libero vitae ipsum placerat sodales eget vitae orci. Ut ultricies id nibh at euismod. Pellentesque non luctus tortor, sit amet venenatis nisl. Quisque augue mauris, egestas tempor vehicula nec, pulvinar ut enim. Nulla facilisis ex id purus malesuada maximus. In vitae tincidunt lacus. Praesent eu rutrum dolor.&lt;/p&gt;\r\n&lt;p&gt;Phasellus in urna vel arcu gravida consectetur aliquet in ligula. Aliquam et dictum erat. In imperdiet laoreet aliquet. Cras mollis risus congue ex dignissim scelerisque. Nam varius arcu ac pharetra mattis. Ut venenatis pharetra semper. Duis diam risus, bibendum sed vestibulum eget, iaculis sed massa. Vestibulum hendrerit in mauris non finibus. Maecenas risus quam, accumsan sollicitudin felis vel, pretium dignissim mi.&lt;/p&gt;\r\n&lt;p&gt;Nulla facilisi. Phasellus vitae justo vel nulla varius ultrices. Sed maximus felis id pulvinar egestas. Morbi interdum facilisis dolor eleifend lobortis. Ut dignissim enim id arcu faucibus maximus. Proin id feugiat leo. Sed nec dolor vitae diam lacinia vestibulum in porta nibh. In hac habitasse platea dictumst. Aliquam posuere feugiat nisl, id vestibulum dui hendrerit a. Proin eget condimentum ipsum. Duis hendrerit ultricies leo in pulvinar. Donec luctus, nunc egestas sagittis pretium, justo diam condimentum ipsum, id tempor magna nisl condimentum libero. Vestibulum in sagittis quam, ac dictum dolor.&lt;/p&gt;\r\n&lt;p&gt;Morbi viverra risus at condimentum venenatis. Cras id massa tincidunt nibh posuere convallis. Duis ante urna, mattis sed venenatis a, vestibulum vehicula nibh. Maecenas sit amet turpis mauris. Sed tristique nulla et odio venenatis, nec tincidunt risus pulvinar. Proin risus velit, lobortis eget nulla id, dignissim tristique tortor. Morbi id elit in massa facilisis fermentum. Integer egestas neque eu felis pulvinar, sed pretium metus dapibus. Quisque consectetur orci scelerisque, lacinia quam at, iaculis magna. In sed posuere sem, eu lobortis erat. Etiam quis maximus felis. Vivamus fringilla nisl velit, vitae bibendum arcu dignissim sed. Vestibulum ut metus nunc. Curabitur convallis magna diam, sit amet molestie arcu blandit sit amet.&lt;/p&gt;\r\n&lt;p&gt;Sed ullamcorper diam in lorem dignissim, eget ornare velit condimentum. Aliquam volutpat volutpat ligula ut lacinia. In eu hendrerit dolor, sit amet dictum sem. Vivamus est urna, bibendum vitae nisi vitae, tincidunt fringilla dui. Aenean sed enim nisi. Suspendisse potenti. Phasellus elit massa, tincidunt in pulvinar sit amet, luctus sed risus. Fusce faucibus tortor a accumsan laoreet. Nulla ac velit vitae neque sollicitudin cursus eget a nunc. Sed volutpat ipsum eu metus porta bibendum. Etiam rhoncus arcu sit amet nisi cursus, sed molestie lectus dapibus. Curabitur eleifend porttitor libero nec iaculis. Phasellus malesuada turpis quis magna congue vehicula. Nunc volutpat pretium odio a ullamcorper. Praesent elementum augue at tellus bibendum consectetur.&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;', '', '', 1, 1, '2019-09-24 22:53:13', '2019-10-09 16:23:50'),
(3, '39d88e553eb5d54e200c54daafffcfd4', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Facebook', 'lorem-ipsum-dolor-sit-amet', 'https://dummyimage.com/900x500/febf00/aaa', '&lt;h1&gt;Lorem Ipsum&lt;/h1&gt;\r\n&lt;hr&gt;\r\n&lt;div id=&quot;Content&quot;&gt;\r\n&lt;div id=&quot;bannerL&quot;&gt;\r\n&lt;div id=&quot;div-gpt-ad-1474537762122-2&quot; data-google-query-id=&quot;CNzkjqXtjuUCFVSKaAod7KkH7Q&quot;&gt;\r\n&lt;div id=&quot;google_ads_iframe_/15188745/Lipsum-Unit3_0__container__&quot;&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;boxed&quot;&gt;\r\n&lt;div id=&quot;lipsum&quot;&gt;\r\n&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec imperdiet volutpat justo, nec cursus risus vulputate ut. In facilisis eu felis in elementum. Aenean aliquam nisl vel enim vulputate, ut accumsan magna eleifend. Donec ac erat lobortis, elementum eros vel, pellentesque purus. Pellentesque egestas tortor sit amet tortor condimentum, non dictum magna varius. Donec ut elit molestie, rhoncus massa malesuada, mollis lectus. Donec scelerisque libero sit amet velit mattis iaculis. Donec pulvinar mi ante, ac commodo sem luctus vel. Fusce facilisis mauris eu accumsan dignissim. Etiam in libero vitae ipsum placerat sodales eget vitae orci. Ut ultricies id nibh at euismod. Pellentesque non luctus tortor, sit amet venenatis nisl. Quisque augue mauris, egestas tempor vehicula nec, pulvinar ut enim. Nulla facilisis ex id purus malesuada maximus. In vitae tincidunt lacus. Praesent eu rutrum dolor.&lt;/p&gt;\r\n&lt;p&gt;Phasellus in urna vel arcu gravida consectetur aliquet in ligula. Aliquam et dictum erat. In imperdiet laoreet aliquet. Cras mollis risus congue ex dignissim scelerisque. Nam varius arcu ac pharetra mattis. Ut venenatis pharetra semper. Duis diam risus, bibendum sed vestibulum eget, iaculis sed massa. Vestibulum hendrerit in mauris non finibus. Maecenas risus quam, accumsan sollicitudin felis vel, pretium dignissim mi.&lt;/p&gt;\r\n&lt;p&gt;Nulla facilisi. Phasellus vitae justo vel nulla varius ultrices. Sed maximus felis id pulvinar egestas. Morbi interdum facilisis dolor eleifend lobortis. Ut dignissim enim id arcu faucibus maximus. Proin id feugiat leo. Sed nec dolor vitae diam lacinia vestibulum in porta nibh. In hac habitasse platea dictumst. Aliquam posuere feugiat nisl, id vestibulum dui hendrerit a. Proin eget condimentum ipsum. Duis hendrerit ultricies leo in pulvinar. Donec luctus, nunc egestas sagittis pretium, justo diam condimentum ipsum, id tempor magna nisl condimentum libero. Vestibulum in sagittis quam, ac dictum dolor.&lt;/p&gt;\r\n&lt;p&gt;Morbi viverra risus at condimentum venenatis. Cras id massa tincidunt nibh posuere convallis. Duis ante urna, mattis sed venenatis a, vestibulum vehicula nibh. Maecenas sit amet turpis mauris. Sed tristique nulla et odio venenatis, nec tincidunt risus pulvinar. Proin risus velit, lobortis eget nulla id, dignissim tristique tortor. Morbi id elit in massa facilisis fermentum. Integer egestas neque eu felis pulvinar, sed pretium metus dapibus. Quisque consectetur orci scelerisque, lacinia quam at, iaculis magna. In sed posuere sem, eu lobortis erat. Etiam quis maximus felis. Vivamus fringilla nisl velit, vitae bibendum arcu dignissim sed. Vestibulum ut metus nunc. Curabitur convallis magna diam, sit amet molestie arcu blandit sit amet.&lt;/p&gt;\r\n&lt;p&gt;Sed ullamcorper diam in lorem dignissim, eget ornare velit condimentum. Aliquam volutpat volutpat ligula ut lacinia. In eu hendrerit dolor, sit amet dictum sem. Vivamus est urna, bibendum vitae nisi vitae, tincidunt fringilla dui. Aenean sed enim nisi. Suspendisse potenti. Phasellus elit massa, tincidunt in pulvinar sit amet, luctus sed risus. Fusce faucibus tortor a accumsan laoreet. Nulla ac velit vitae neque sollicitudin cursus eget a nunc. Sed volutpat ipsum eu metus porta bibendum. Etiam rhoncus arcu sit amet nisi cursus, sed molestie lectus dapibus. Curabitur eleifend porttitor libero nec iaculis. Phasellus malesuada turpis quis magna congue vehicula. Nunc volutpat pretium odio a ullamcorper. Praesent elementum augue at tellus bibendum consectetur.&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;', '', '', 3, 1, '2019-09-25 09:28:03', '2019-10-09 16:26:29');

-- --------------------------------------------------------

--
-- Table structure for table `general_faqs`
--

CREATE TABLE `general_faqs` (
  `id` int(11) NOT NULL,
  `ids` text DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `question` text DEFAULT NULL,
  `answer` longtext DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT 1,
  `created` datetime DEFAULT NULL,
  `changed` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `general_faqs`
--

INSERT INTO `general_faqs` (`id`, `ids`, `uid`, `question`, `answer`, `sort`, `status`, `created`, `changed`) VALUES
(41, 'b0a775b699e0b43c8802ad2f6e1555e4', 1, 'Where can I get some?', '<p><span>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</span></p>', 4, 1, '2019-10-09 21:51:00', '2019-10-09 21:51:00'),
(30, '40e0e7949a20e7f58ace52310faa46b9', 1, 'What is Lorem Ipsum?', '<p xss=\"removed\"><strong>Lorem Ipsum</strong><span> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', 1, 1, '2019-02-27 21:38:11', '2019-10-09 21:48:21'),
(40, '167dc0c37ff4d514a84b19f662923f46', 1, 'Why do we use it?', '<p><span>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span></p>', 3, 1, '2019-10-09 21:50:42', '2019-10-09 21:50:42'),
(36, 'f4221772b48b2c5f8a4d969bb1fd4e04', 1, 'Where does it come from?', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 2, 1, '2019-04-03 11:34:06', '2019-10-09 21:49:49');

-- --------------------------------------------------------

--
-- Table structure for table `general_file_manager`
--

CREATE TABLE `general_file_manager` (
  `id` int(11) NOT NULL,
  `ids` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `file_name` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `file_type` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `file_ext` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `file_size` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `is_image` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `image_width` int(11) DEFAULT NULL,
  `image_height` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `general_file_manager`
--

INSERT INTO `general_file_manager` (`id`, `ids`, `uid`, `file_name`, `file_type`, `file_ext`, `file_size`, `is_image`, `image_width`, `image_height`, `created`) VALUES
(311, 'e8ce25cb3978983783ec0a8be91aae2e', 1, '6024aeb600444ba916c52511e38e3455.jpg', 'image/jpeg', 'jpg', '7.25', '1', 168, 300, '2019-03-15 15:26:33'),
(312, '53bc56e7d558cd50d3bbe74c8f301e83', 1, 'f1709c7dc8925afef5b6b8029f40fe75.jpg', 'image/jpeg', 'jpg', '23.13', '1', 346, 210, '2019-03-15 15:30:09'),
(313, '2d7f2bdac4425a5b99a2be95ec73dbbe', 1, 'cdddee067402f1c1455137a549a93ffd.jpg', 'image/jpeg', 'jpg', '1201.83', '1', 1080, 1079, '2019-03-15 15:34:44'),
(314, '1b4603be46f4fc6803ac9e05287b644e', 1, '61a7303a6b8166e193f9bfb9112897a1.jpg', 'image/jpeg', 'jpg', '23.13', '1', 346, 210, '2019-03-15 15:41:18'),
(315, '741377d704c05060c85d2cccb41e6899', 1, '0ffb557c9b745579d3433b4d83e1087c.jpg', 'image/jpeg', 'jpg', '1201.83', '1', 1080, 1079, '2019-03-15 22:43:10'),
(316, 'ee91526efbd827653b43371a87007502', 1, '198e8718950045fdc3844e6541073905.png', 'image/png', 'png', '4.33', '1', 80, 80, '2019-07-24 15:31:20'),
(317, '5b85924c15b753a307c5e660b23ff9e5', 1, '96eb30560b45dbefd93f140186890851.jpg', 'image/jpeg', 'jpg', '374.91', '1', 2000, 1332, '2019-09-23 15:02:41'),
(318, '85530beccffe26f5cf1d41f14a49bb8e', 1, 'ban-ve_cuulong.jpg', 'image/jpeg', 'jpg', '8335.53', '1', 10000, 6500, '2019-09-23 16:18:46'),
(319, '17c715ddfee5d54c016112b965e4ecd7', 1, 'ban-ve_cuulong1.jpg', 'image/jpeg', 'jpg', '8335.53', '1', 10000, 6500, '2019-09-23 16:33:00'),
(320, 'de50f502ac6f10982c31ab4ecf246b8a', 1, 'smartpanel_rating01.png', 'image/png', 'png', '136.69', '1', 1541, 932, '2019-09-24 21:56:55'),
(321, 'cb09868c9a5e8ab2b7bfe3f3ccbe0205', 1, 'red_car.jpg', 'image/jpeg', 'jpg', '134.2', '1', 960, 960, '2019-09-24 22:26:19'),
(322, 'f04aeaec9919d8f5a9894a67066e9c12', 1, 'how-to-change-instagram-username-famoid.png', 'image/png', 'png', '332.78', '1', 3200, 1700, '2019-09-24 22:51:38'),
(323, 'cc23d2dce83a8e91adf99041f7ed1cc7', 1, 'how-to-figure-out-what-your-instagram-followers-want-with-instagram-stickers.png', 'image/png', 'png', '524.96', '1', 900, 500, '2019-09-25 09:27:48'),
(324, '1fb01deb9ca51f077460078c90749774', 1, 'how-to-figure-out-what-your-instagram-followers-want-with-instagram-stickers1.png', 'image/png', 'png', '524.96', '1', 900, 500, '2019-09-26 11:34:04');

-- --------------------------------------------------------

--
-- Table structure for table `general_lang`
--

CREATE TABLE `general_lang` (
  `id` int(11) NOT NULL,
  `ids` varchar(100) DEFAULT NULL,
  `lang_code` varchar(10) DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `general_lang_list`
--

CREATE TABLE `general_lang_list` (
  `id` int(11) NOT NULL,
  `ids` varchar(225) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `country_code` varchar(225) DEFAULT NULL,
  `is_default` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `general_lang_list`
--

INSERT INTO `general_lang_list` (`id`, `ids`, `code`, `country_code`, `is_default`, `status`, `created`) VALUES
(1, '5af5d9ee036f37aa61989e2cae283a9a', 'en', 'GB', 1, 1, '2023-06-27 05:04:37');

-- --------------------------------------------------------

--
-- Table structure for table `general_news`
--

CREATE TABLE `general_news` (
  `id` int(10) UNSIGNED NOT NULL,
  `ids` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(1) DEFAULT 1,
  `created` datetime DEFAULT NULL,
  `expiry` datetime DEFAULT NULL,
  `changed` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_news`
--

INSERT INTO `general_news` (`id`, `ids`, `uid`, `type`, `description`, `status`, `created`, `expiry`, `changed`) VALUES
(1, 'baa8647f07b63d73e7aee766a2eed606', 2, 'new_services', '&lt;p&gt;test&lt;/p&gt;', 1, '2019-07-23 00:00:00', '2019-08-13 00:00:00', '2019-08-07 16:25:58');

-- --------------------------------------------------------

--
-- Table structure for table `general_options`
--

CREATE TABLE `general_options` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `value` longtext DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `general_options`
--

INSERT INTO `general_options` (`id`, `name`, `value`) VALUES
(1, 'enable_https', '0'),
(2, 'enable_disable_homepage', '0'),
(3, 'website_desc', 'SmartStore is the best option to get all social media services in website. Easy build Social Media Marketing Store with a unique design and business process automation'),
(4, 'website_keywords', 'SmartStore, smm reseller panel, smmpanel, panelsmm, create smm store, business smm, socialmedia, instagram reseller panel, create smm store, resell smm services, smm store, start smm business, cheap smm business, buy instagram followers, instagram likes, facebook followers, facebook likes, twitter likes, youtube views, soundclound'),
(5, 'website_title', 'SmartStore - Social Media Marketing Store Script'),
(6, 'website_favicon', 'http://smashlikes.com/assets/images/favicon.png'),
(7, 'embed_head_javascript', ''),
(8, 'website_logo_white', 'http://smashlikes.com/assets/images/logo-white.png'),
(9, 'website_logo', 'http://smashlikes.com/assets/images/logo.png'),
(10, 'notification_popup_content', ''),
(11, 'contact_tel', '+12345678'),
(12, 'contact_email', 'do-not-reply@smartpanel.com'),
(13, 'contact_work_hour', 'Mon - Sat 09 am - 10 pm'),
(14, 'social_facebook_link', ''),
(15, 'social_twitter_link', ''),
(16, 'social_instagram_link', ''),
(17, 'social_pinterest_link', ''),
(18, 'social_tumblr_link', ''),
(19, 'social_youtube_link', ''),
(20, 'copy_right_content', 'Copyright &copy; 2021 - SmartStore'),
(21, 'embed_javascript', ''),
(22, 'enable_notification_popup', '0'),
(23, 'currency_decimal', '2'),
(24, 'currency_decimal_separator', 'dot'),
(25, 'currency_thousand_separator', 'comma'),
(26, 'currency_symbol', '$'),
(27, 'enable_goolge_recapcha', ''),
(28, 'default_limit_per_page', '10'),
(29, 'enable_goolge_recapcha_contact_us', '');

-- --------------------------------------------------------

--
-- Table structure for table `general_packages`
--

CREATE TABLE `general_packages` (
  `id` int(11) NOT NULL,
  `ids` text DEFAULT NULL,
  `type` int(1) DEFAULT 1 COMMENT '1-TRIAL|2-CHARGE',
  `name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price_monthly` float DEFAULT NULL,
  `price_annually` float DEFAULT NULL,
  `number_accounts` int(11) DEFAULT 0,
  `is_default` int(1) DEFAULT 0,
  `trial_day` int(11) DEFAULT NULL,
  `permission` longtext DEFAULT NULL,
  `sort` int(11) DEFAULT 1,
  `status` int(1) DEFAULT 1,
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `general_purchase`
--

CREATE TABLE `general_purchase` (
  `id` int(11) NOT NULL,
  `ids` text DEFAULT NULL,
  `pid` text DEFAULT NULL,
  `purchase_code` text DEFAULT NULL,
  `version` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `general_purchase`
--

INSERT INTO `general_purchase` (`id`, `ids`, `pid`, `purchase_code`, `version`) VALUES
(1, 'c856ed53e776068a2a6f2573c90b6d5c', '24815787', 'd0370701-7609-4494-8848-0089834847a9', '1.1');

-- --------------------------------------------------------

--
-- Table structure for table `general_sessions`
--

CREATE TABLE `general_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `general_transaction_logs`
--

CREATE TABLE `general_transaction_logs` (
  `id` int(11) NOT NULL,
  `ids` text DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `type` text DEFAULT NULL,
  `transaction_id` text DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `transaction_fee` float DEFAULT NULL,
  `data` text DEFAULT NULL,
  `status` int(1) DEFAULT 1,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `general_users`
--

CREATE TABLE `general_users` (
  `id` int(11) NOT NULL,
  `ids` text DEFAULT NULL,
  `role` enum('admin','user','supporter') DEFAULT 'user',
  `login_type` text DEFAULT NULL,
  `first_name` text DEFAULT NULL,
  `last_name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `total_orders` int(11) DEFAULT NULL,
  `total_spent` decimal(15,5) DEFAULT 0.00000,
  `timezone` text DEFAULT NULL,
  `settings` longtext DEFAULT NULL,
  `custom_rate` int(11) NOT NULL DEFAULT 0,
  `api_key` varchar(191) DEFAULT NULL,
  `activation_key` text DEFAULT NULL,
  `reset_key` text DEFAULT NULL,
  `history_ip` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(1) DEFAULT 1,
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `general_users`
--

INSERT INTO `general_users` (`id`, `ids`, `role`, `login_type`, `first_name`, `last_name`, `email`, `password`, `total_orders`, `total_spent`, `timezone`, `settings`, `custom_rate`, `api_key`, `activation_key`, `reset_key`, `history_ip`, `description`, `status`, `changed`, `created`) VALUES
(77, '1a0dd8864a66a9a945cbb0s6s2d01a156d', 'admin', NULL, 'sam', 'miles', 'support@smashlikes.com', '$2a$08$FK4bILch92HccTdZmioml.IW8yjSpH0Jh0.2AhsjSQTVk9CBEFmcO', NULL, NULL, 'Pacific/Midway', NULL, 0, '', 'NHJc8mb72apX4nJt1riDB5UdsKGcwMaEYu', 'NHJc8mb72apX4nJt1riDB5UKGcwMaEYu', '::1', NULL, 1, '2019-09-28 17:00:50', '2019-02-18 10:52:42');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `ids` text CHARACTER SET utf8 DEFAULT NULL,
  `uid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('direct','api') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'direct',
  `cate_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'default',
  `api_provider_id` int(11) DEFAULT NULL,
  `api_service_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_order_id` int(11) DEFAULT 0,
  `status` enum('active','completed','processing','inprogress','pending','partial','canceled','refunded','awaiting','error') COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `charge` decimal(15,4) DEFAULT NULL,
  `formal_charge` decimal(15,4) DEFAULT NULL,
  `profit` decimal(15,4) DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_counter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `remains` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `name` varchar(225) NOT NULL,
  `sort` int(11) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '1 -> ON, 0 -> OFF',
  `params` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `type`, `name`, `sort`, `status`, `params`) VALUES
(12, 'free', 'Free', 1, 1, ''),
(13, 'paypal', 'Paypal Checkout', 3, 0, '{\"type\":\"paypal\",\"name\":\"Paypal Checkout\",\"sort\":\"3\",\"status\":\"1\",\"option\":{\"environment\":\"sandbox\",\"client_id\":\"ASfSHguEXZXCJhwnYpQx7DmqtJ4QYSqPZTks9hHj7PbTaBzx9yue2mLYq1A6reX6ETAE_U0n1hS77i6u\",\"secret_key\":\"EE-b_tJmIUr7jmUEbD5GbPZtlPyjVl8-oICUDf4yxNuJd5ffuc8U7c-Qm3GTEB5zU-b59J8EiSE2lva-\",\"pm_details\":\"Purchase a digital Service package\"}}'),
(14, 'stripe', 'Stripe Checkout', 5, 0, '{\"type\":\"stripe\",\"name\":\"Stripe Checkout\",\"sort\":\"5\",\"status\":\"0\",\"option\":{\"environment\":\"sandbox\",\"public_key\":\"pk_test_g340I50wcHWiWlEz8sMsEh7P\",\"secret_key\":\"sk_test_assAHyRZMeuQB5CIJhrfTdcV\",\"pm_details\":\"Purchase a digital Service package\"}}');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `ids` text DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `cate_id` int(11) DEFAULT NULL,
  `name` text DEFAULT NULL,
  `quantity` varchar(191) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `price` decimal(15,4) DEFAULT NULL,
  `original_price` decimal(15,4) DEFAULT NULL,
  `min` int(50) DEFAULT NULL,
  `max` int(50) DEFAULT NULL,
  `add_type` enum('manual','api') DEFAULT 'manual',
  `is_free` int(1) DEFAULT NULL,
  `type` varchar(100) DEFAULT 'default',
  `api_service_id` varchar(200) DEFAULT NULL,
  `api_provider_id` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT 1,
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `ids`, `uid`, `cate_id`, `name`, `quantity`, `desc`, `price`, `original_price`, `min`, `max`, `add_type`, `is_free`, `type`, `api_service_id`, `api_provider_id`, `status`, `changed`, `created`) VALUES
(12, '2f95f084afca50a50d7e7896fcdd23bf', 1, 14, 'Instagram Likes', '250', '', '2.5900', '0.0000', 0, 0, 'manual', NULL, 'default', '', 0, 1, '2019-10-09 21:30:36', '2019-09-03 16:33:57'),
(11, 'f5e7bbdac0871ae4bff51d44c8f21f51', 1, 14, 'Instagram Likes', '100', '', '1.9900', '0.0000', 0, 0, 'manual', NULL, 'default', '', 0, 1, '2019-10-10 10:59:37', '2019-09-03 16:33:44'),
(10, '36b7993e0be5fc8580a098963cd22d7c', 1, 13, 'Instagram Followers', '1000', '', '14.5900', '0.0000', 0, 0, 'manual', NULL, 'default', '', 0, 1, '2019-10-09 21:29:59', '2019-09-03 16:27:04'),
(9, '3a682501621f4ebd2e9a2c343da26950', 1, 13, 'Instagram Followers', '500', '', '7.7900', '0.0000', 0, 0, 'manual', NULL, 'default', '', 0, 1, '2019-10-09 21:29:22', '2019-09-03 16:26:53'),
(7, 'cab48d54a020b520198b627f5716dfd5', 1, 13, 'Instagram Followers', '100', '', '1.7900', '0.0000', 0, 0, 'manual', NULL, 'default', '', 0, 1, '2019-10-09 22:04:51', '2019-09-03 16:01:11'),
(6, '07cdcce3c6ee30be7bb54d5410834a10', 1, 13, 'Instagram Followers', '250', '', '4.5000', '0.0000', 0, 0, 'manual', NULL, 'default', '', 0, 1, '2019-10-09 21:30:18', '2019-09-03 11:00:31'),
(13, '43a06a9050f606d8e9372fbc2993ce5e', 1, 14, 'Instagram Likes', '500', '', '5.5900', '0.0000', 0, 0, 'manual', NULL, 'default', '', 0, 1, '2019-10-10 10:59:52', '2019-09-03 16:34:12'),
(14, 'f47155423f00e33e8fc963f0dad3a9c2', 1, 14, 'Instagram Likes', '1000', '', '10.5900', '0.0000', 0, 0, 'manual', NULL, 'default', '', 0, 1, '2019-10-10 11:00:04', '2019-09-03 16:34:24'),
(15, '44baac2036aecb8a6451942b896b4d67', 1, 13, 'Instagram Followers', '2000', '', '20.9900', '0.0000', 0, 0, 'manual', NULL, 'default', '', 0, 1, '2019-10-10 10:59:25', '2019-09-04 20:38:46'),
(16, '18e6cbdaff28bc5d28c7d9dbd0d73c9f', 1, 13, 'Instagram Followers', '1500', '', '18.9900', '0.0000', 0, 0, 'manual', NULL, 'default', '', 0, 1, '2019-10-10 10:59:11', '2019-09-04 20:39:19'),
(17, '0c464eef3f4cea21d38b040cd2ea32b2', 1, 15, 'Facebook Likes', '250', '', '12.9900', '0.0000', 0, 0, 'manual', NULL, 'default', '', 0, 1, '2019-10-10 11:00:14', '2019-09-20 11:25:59'),
(18, 'f47a61591ec6d25ec72cd31f5450a58e', 1, 14, 'Instagram Likes', '2500', '', '24.9900', '0.0000', 0, 0, 'manual', NULL, 'default', '', 0, 1, '2019-10-09 15:20:49', '2019-10-09 15:20:49'),
(19, '264781a47a0c0565b9ce2658a8997312', 1, 15, 'Facebook Likes', '500', '', '24.9900', '0.0000', 0, 0, 'manual', NULL, 'default', '', 0, 1, '2019-10-09 15:24:04', '2019-10-09 15:24:04'),
(20, '9d11382c0b7614623479c002eaa543c1', 1, 15, 'Facebook Likes', '1000', '', '39.9900', '0.0000', 0, 0, 'manual', NULL, 'default', '', 0, 1, '2019-10-09 15:26:52', '2019-10-09 15:25:21'),
(21, 'df36431c392d75eafaddfc4197f820b9', 1, 15, 'Facebook Likes', '2000', '', '74.9900', '0.0000', 0, 0, 'manual', NULL, 'default', '', 0, 1, '2019-10-09 15:26:15', '2019-10-09 15:26:15'),
(22, '7f575b80665a140bfd0aea8bca4f507d', 1, 15, 'Facebook Likes', '3000', '', '81.5900', '0.0000', 0, 0, 'manual', NULL, 'default', '', 0, 1, '2019-10-09 15:27:27', '2019-10-09 15:27:27'),
(23, '17d0fd32518a1a7a2f4ce2cdf6fbd34b', 1, 17, 'Youtube Views', '2500', '', '14.5900', '0.0000', 0, 0, 'manual', NULL, 'default', '', 0, 1, '2019-10-09 15:28:45', '2019-10-09 15:28:45'),
(24, 'c8e59dc5fcc411c814659d2afe7a4d00', 1, 17, 'Youtube Views', '5000', '', '28.5900', '0.0000', 0, 0, 'manual', NULL, 'default', '', 0, 1, '2019-10-09 15:29:18', '2019-10-09 15:29:18'),
(25, '1d7d1e08d722fd77b94d467ffcb9146d', 1, 17, 'Youtube Views', '10000', '', '54.5900', '0.0000', 0, 0, 'manual', NULL, 'default', '', 0, 1, '2019-10-09 15:29:55', '2019-10-09 15:29:55'),
(26, '70e1ca0c6ccf93fd93f6ce29305102ea', 1, 17, 'Youtube Views', '20000', '', '89.5900', '0.0000', 0, 0, 'manual', NULL, 'default', '', 0, 1, '2019-10-09 15:30:39', '2019-10-09 15:30:39'),
(27, '459c79c444345c1338c9bbe14e76e02a', 1, 17, 'Youtube Views', '50000', '', '175.5900', '0.0000', 0, 0, 'manual', NULL, 'default', '', 0, 1, '2019-10-09 15:33:50', '2019-10-09 15:33:50'),
(28, '950c616a25d31fedd8d348eb214078a8', 1, 18, 'Youtube Video Likes', '150', '', '19.9900', '0.0000', 0, 0, 'manual', NULL, 'default', '', 0, 1, '2019-10-09 15:35:15', '2019-10-09 15:35:15'),
(29, '449861a796fc72d274a5091ace590417', 1, 18, 'Youtube Video Likes', '250', '', '34.9900', '0.0000', 0, 0, 'manual', NULL, 'default', '', 0, 1, '2019-10-09 15:35:52', '2019-10-09 15:35:52'),
(30, 'ba32223bad1d86501332b8a589bad136', 1, 18, 'Youtube Video Likes', '500', '', '54.9900', '0.0000', 0, 0, 'manual', NULL, 'default', '', 0, 1, '2019-10-09 15:36:52', '2019-10-09 15:36:52'),
(31, 'b0e8061c36f9318c007c98df7fa09969', 1, 18, 'Youtube Video Likes', '750', '', '69.9900', '0.0000', 0, 0, 'manual', NULL, 'default', '', 0, 1, '2019-10-09 15:37:35', '2019-10-09 15:37:35'),
(32, '2c63211c8cc54bbc379c7c60af4c9953', 1, 18, 'Youtube Video Likes', '1000', '', '79.9900', '0.0000', 0, 0, 'manual', NULL, 'default', '', 0, 1, '2019-10-09 15:38:08', '2019-10-09 15:38:08'),
(33, '8be726c79eabfeb4e8f5ca2618b19d1a', 1, 19, 'Youtube Subscribers', '50', '', '4.9900', '0.0000', 0, 0, 'manual', NULL, 'default', '', 0, 1, '2019-10-09 15:41:31', '2019-10-09 15:41:31'),
(34, 'e5301e44a3dd2cf0b10169523c7da41e', 1, 19, 'Youtube Subscribers', '100', '', '9.9900', '0.0000', 0, 0, 'manual', NULL, 'default', '', 0, 1, '2019-10-09 15:43:58', '2019-10-09 15:42:10'),
(35, 'a7d11ed6317320616ada04309c0da837', 1, 19, 'Youtube Subscribers', '200', '', '18.9900', '0.0000', 0, 0, 'manual', NULL, 'default', '', 0, 1, '2019-10-09 15:42:39', '2019-10-09 15:42:39'),
(36, '593225fac7cd4980cd31203351efa355', 1, 19, 'Youtube Subscribers', '500', '', '44.9900', '0.0000', 0, 0, 'manual', NULL, 'default', '', 0, 1, '2019-10-09 15:44:31', '2019-10-09 15:43:13'),
(37, '203004e7831242b215ae38ce6217a6b4', 1, 19, 'Youtube Subscribers', '1000', '', '84.9900', '0.0000', 0, 0, 'manual', NULL, 'default', '', 0, 1, '2019-10-09 15:45:09', '2019-10-09 15:45:09'),
(38, 'c52aa23b12854e63ac4332339170f290', 1, 21, 'Twitter Followers', '250', '', '9.9900', '0.0000', 0, 0, 'manual', NULL, 'default', '', 0, 1, '2019-10-09 16:04:31', '2019-10-09 16:04:31'),
(39, '46f0fc7ffed66b79d8af9711978708ff', 1, 21, 'Twitter Followers', '500', '', '16.9900', '0.0000', 0, 0, 'manual', NULL, 'default', '', 0, 1, '2019-10-09 16:05:10', '2019-10-09 16:05:10'),
(40, '7ec3bf2bbbcde27d0bfaca7f67c39291', 1, 21, 'Twitter Followers', '1000', '', '29.9900', '0.0000', 0, 0, 'manual', NULL, 'default', '', 0, 1, '2019-10-09 16:05:44', '2019-10-09 16:05:44'),
(41, '3d195a377d1a81a7c2e7caf72dbb2e58', 1, 21, 'Twitter Followers', '2000', '', '54.5900', '0.0000', 0, 0, 'manual', NULL, 'default', '', 0, 1, '2019-10-09 16:06:19', '2019-10-09 16:06:19'),
(42, 'd824119be5943de8c27da66ea47411da', 1, 20, 'Twitter Likes', '100', '', '4.9900', '0.0000', 0, 0, 'manual', NULL, 'default', '', 0, 1, '2019-10-09 16:06:59', '2019-10-09 16:06:59'),
(43, '7dba0a8dbcd11ac9e9b07c0d359ff1fb', 1, 20, 'Twitter Likes', '500', '', '19.9900', '0.0000', 0, 0, 'manual', NULL, 'default', '', 0, 1, '2019-10-09 16:07:34', '2019-10-09 16:07:34'),
(44, '6873a32d8f7494d37524dd2eff2403aa', 1, 20, 'Twitter Likes', '1000', '', '34.9900', '0.0000', 0, 0, 'manual', NULL, 'default', '', 0, 1, '2019-10-09 16:08:01', '2019-10-09 16:08:01'),
(45, '884118c222748b4f24fcbe813c27d97c', 1, 20, 'Twitter Likes', '2500', '', '79.9900', '0.0000', 0, 0, 'manual', NULL, 'default', '', 0, 1, '2019-10-09 16:08:54', '2019-10-09 16:08:54'),
(46, '3a8176a85ac472fd2724615226723699', 1, 22, 'Twitter Reweets', '100', '', '3.9900', '0.0000', 0, 0, 'manual', NULL, 'default', '', 0, 1, '2019-10-09 16:10:51', '2019-10-09 16:10:51'),
(47, '36ea7354acc803f223e95c8e039fdc31', 1, 22, 'Twitter Reweets', '500', '', '19.9900', '0.0000', 0, 0, 'manual', NULL, 'default', '', 0, 1, '2019-10-09 16:11:38', '2019-10-09 16:11:21'),
(48, '30efc700406ae82d78f6e1c585b39cb5', 1, 22, 'Twitter Reweets', '1000', '', '34.9900', '0.0000', 0, 0, 'manual', NULL, 'default', '', 0, 1, '2019-10-09 16:12:13', '2019-10-09 16:12:13'),
(49, '55911dd3321537a6110d8f5b1045cccf', 1, 22, 'Twitter Reweets', '2500', '', '79.9900', '0.0000', 0, 0, 'manual', NULL, 'default', '', 0, 1, '2019-10-09 16:12:38', '2019-10-09 16:12:38');

-- --------------------------------------------------------

--
-- Table structure for table `social_network_categories`
--

CREATE TABLE `social_network_categories` (
  `id` int(11) NOT NULL,
  `ids` text DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `name` text DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT 1,
  `created` datetime DEFAULT NULL,
  `changed` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `social_network_categories`
--

INSERT INTO `social_network_categories` (`id`, `ids`, `uid`, `name`, `desc`, `image`, `sort`, `status`, `created`, `changed`) VALUES
(1, 'b60ce11ae1f4a0e20825f9e263c78752', 1, 'Instagram', '', NULL, 1, 1, '2019-08-20 23:21:20', '2019-08-20 23:21:20'),
(2, 'b79277f40c2f7aa9c4abb1c43b954570', 1, 'Facebook', '', NULL, 2, 1, '2019-08-20 23:21:35', '2019-10-08 16:20:57'),
(3, '730968b5c3acc5096fa6ae9f528c3615', 1, 'Twitter', '', NULL, 3, 1, '2019-08-20 23:21:52', '2019-10-09 16:03:42'),
(4, '5d37b09d403e606d144318df7363d61b', 1, 'Youtube', '', NULL, 4, 1, '2019-08-20 23:22:12', '2019-08-20 23:22:12'),
(5, 'f05e0fd6e09cf61b3c62adf15a44b928', 1, 'SoundCloud', '', NULL, 5, 1, '2019-08-20 23:34:27', '2019-08-20 23:34:27');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `ids` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('new','pending','closed','answered') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `read` int(11) NOT NULL DEFAULT 1,
  `created` datetime DEFAULT NULL,
  `changed` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_providers`
--
ALTER TABLE `api_providers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_user_id_foreign` (`uid`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_blogs`
--
ALTER TABLE `general_blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_faqs`
--
ALTER TABLE `general_faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_file_manager`
--
ALTER TABLE `general_file_manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_lang`
--
ALTER TABLE `general_lang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_lang_list`
--
ALTER TABLE `general_lang_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_news`
--
ALTER TABLE `general_news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_user_id_foreign` (`uid`);

--
-- Indexes for table `general_options`
--
ALTER TABLE `general_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_packages`
--
ALTER TABLE `general_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_purchase`
--
ALTER TABLE `general_purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_sessions`
--
ALTER TABLE `general_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `general_transaction_logs`
--
ALTER TABLE `general_transaction_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_users`
--
ALTER TABLE `general_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_network_categories`
--
ALTER TABLE `social_network_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_user_id_foreign` (`from`(191));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api_providers`
--
ALTER TABLE `api_providers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `general_blogs`
--
ALTER TABLE `general_blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `general_faqs`
--
ALTER TABLE `general_faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `general_file_manager`
--
ALTER TABLE `general_file_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=325;

--
-- AUTO_INCREMENT for table `general_lang`
--
ALTER TABLE `general_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_lang_list`
--
ALTER TABLE `general_lang_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `general_news`
--
ALTER TABLE `general_news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `general_options`
--
ALTER TABLE `general_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `general_packages`
--
ALTER TABLE `general_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `general_purchase`
--
ALTER TABLE `general_purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `general_transaction_logs`
--
ALTER TABLE `general_transaction_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_users`
--
ALTER TABLE `general_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54327;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `social_network_categories`
--
ALTER TABLE `social_network_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
