-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2021 at 03:27 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `article`
--

-- --------------------------------------------------------

--
-- Table structure for table `age_group`
--

CREATE TABLE `age_group` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `age_group`
--

INSERT INTO `age_group` (`id`, `group_from`, `group_to`, `description`, `created_at`, `updated_at`) VALUES
(1, '8', '10', '8-10 Years', '2021-06-16 08:11:38', '2021-06-16 08:11:38'),
(2, '10', '12', '10-12 Years', '2021-06-16 08:11:38', '2021-06-16 08:11:38'),
(3, '12', '14', '12-14 Years', '2021-06-16 08:11:38', '2021-06-16 08:11:38'),
(4, '14', '16', '14-16 Years', '2021-06-16 08:11:38', '2021-06-16 08:11:38'),
(5, '16', '18', '16-18 Years', '2021-06-16 08:11:38', '2021-06-16 08:11:38'),
(6, '18', '20', '18-20 Years', '2021-06-16 08:11:38', '2021-06-16 08:11:38'),
(7, '20', '100', '20-100 Years', '2021-06-16 08:11:38', '2021-06-16 08:11:38');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `plan_id` int(10) UNSIGNED DEFAULT NULL,
  `views` bigint(20) UNSIGNED DEFAULT 0,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'ACTIVE',
  `visibility` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'PUBLISHED',
  `title` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_image` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `article_reports`
--

CREATE TABLE `article_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `article_id` bigint(20) UNSIGNED DEFAULT NULL,
  `report_message` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `competetions`
--

CREATE TABLE `competetions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Name',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'INITIALIZING',
  `starting_date` date DEFAULT NULL,
  `ending_date` date DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guide_lines` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ended_at` date DEFAULT NULL,
  `result_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `result_visibility` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `result_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `result_announcing_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `competetions`
--

INSERT INTO `competetions` (`id`, `name`, `status`, `starting_date`, `ending_date`, `description`, `guide_lines`, `ended_at`, `result_status`, `result_visibility`, `result_description`, `result_announcing_date`, `created_at`, `updated_at`) VALUES
(1, 'Competetion1', 'INITIALIZING', '2021-06-22', '2021-08-07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-16 08:11:49', '2021-06-16 08:11:49'),
(2, 'Competetion2', 'INITIALIZING', '2021-06-11', '2021-07-04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-16 08:11:49', '2021-06-16 08:11:49'),
(3, 'Competetion3', 'INITIALIZING', '2021-06-21', '2021-09-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-16 08:11:49', '2021-06-16 08:11:49'),
(4, 'Competetion1', 'STARTED', '2021-06-16', '2021-09-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-16 08:11:49', '2021-06-16 08:11:49'),
(5, 'Competetion2', 'STARTED', '2021-06-16', '2021-10-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-16 08:11:49', '2021-06-16 08:11:49'),
(6, 'Competetion3', 'STARTED', '2021-06-16', '2021-07-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-16 08:11:49', '2021-06-16 08:11:49'),
(7, 'Competetion1', 'PAUSED', '2021-05-16', '2021-10-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-16 08:11:49', '2021-06-16 08:11:49'),
(8, 'Competetion2', 'PAUSED', '2021-05-11', '2021-08-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-16 08:11:49', '2021-06-16 08:11:49'),
(9, 'Competetion3', 'PAUSED', '2021-05-09', '2021-10-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-16 08:11:49', '2021-06-16 08:11:49'),
(10, 'Competetion1', 'ENDED', '2021-05-08', '2021-07-06', NULL, NULL, '2021-09-11', NULL, NULL, NULL, NULL, '2021-06-16 08:11:49', '2021-06-16 08:11:49'),
(11, 'Competetion2', 'ENDED', '2021-05-18', '2021-07-05', NULL, NULL, '2021-09-19', NULL, NULL, NULL, NULL, '2021-06-16 08:11:49', '2021-06-16 08:11:49'),
(12, 'Competetion3', 'ENDED', '2021-05-21', '2021-06-27', NULL, NULL, '2021-08-21', NULL, NULL, NULL, NULL, '2021-06-16 08:11:49', '2021-06-16 08:11:49');

-- --------------------------------------------------------

--
-- Table structure for table `competetion_data`
--

CREATE TABLE `competetion_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `competetions_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subscription_id` int(10) UNSIGNED DEFAULT NULL,
  `article_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `competetion_results`
--

CREATE TABLE `competetion_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `competetions_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `announcement_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `competetion_settings`
--

CREATE TABLE `competetion_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `competetions_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reading_quantity` int(10) UNSIGNED DEFAULT 10,
  `submit_quantity` int(10) UNSIGNED DEFAULT 10,
  `rating_quantity` int(10) UNSIGNED DEFAULT 5,
  `can_submit_after_initializing` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'true',
  `can_submit_after_started` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'true',
  `can_submit_after_paused` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'true',
  `can_update_after_joined` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'true',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `competetion_settings`
--

INSERT INTO `competetion_settings` (`id`, `competetions_id`, `reading_quantity`, `submit_quantity`, `rating_quantity`, `can_submit_after_initializing`, `can_submit_after_started`, `can_submit_after_paused`, `can_update_after_joined`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 9, 7, 'true', 'true', 'true', 'true', '2021-06-16 08:12:00', '2021-06-16 08:12:00'),
(2, 2, 5, 9, 10, 'true', 'true', 'true', 'true', '2021-06-16 08:12:00', '2021-06-16 08:12:00'),
(3, 3, 5, 5, 5, 'true', 'true', 'true', 'true', '2021-06-16 08:12:00', '2021-06-16 08:12:00'),
(4, 4, 9, 8, 6, 'true', 'true', 'true', 'true', '2021-06-16 08:12:00', '2021-06-16 08:12:00'),
(5, 5, 8, 9, 5, 'true', 'true', 'true', 'true', '2021-06-16 08:12:00', '2021-06-16 08:12:00'),
(6, 6, 5, 9, 7, 'true', 'true', 'true', 'true', '2021-06-16 08:12:00', '2021-06-16 08:12:00'),
(7, 7, 10, 8, 6, 'true', 'true', 'true', 'true', '2021-06-16 08:12:00', '2021-06-16 08:12:00'),
(8, 8, 9, 8, 8, 'true', 'true', 'true', 'true', '2021-06-16 08:12:00', '2021-06-16 08:12:00'),
(9, 9, 9, 7, 10, 'true', 'true', 'true', 'true', '2021-06-16 08:12:00', '2021-06-16 08:12:00'),
(10, 10, 10, 10, 7, 'true', 'true', 'true', 'true', '2021-06-16 08:12:00', '2021-06-16 08:12:00'),
(11, 11, 9, 6, 5, 'true', 'true', 'true', 'true', '2021-06-16 08:12:00', '2021-06-16 08:12:00'),
(12, 12, 5, 7, 10, 'true', 'true', 'true', 'true', '2021-06-16 08:12:00', '2021-06-16 08:12:00');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `native` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `continent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capital` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `languages` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000001_create_age_group_table', 1),
(2, '2014_10_12_000003_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2020_01_01_0000020_create_plans_table', 1),
(6, '2020_01_01_000008_create_plan_countries_table', 1),
(7, '2020_01_01_000014_create_plan_subscriptions_table', 1),
(8, '2020_01_01_000028_create_plan_features_table', 1),
(9, '2021_02_10_120207_create_articles_table', 1),
(10, '2021_02_17_142034_create_website_settings_table', 1),
(11, '2021_02_27_040209_create_article_reports_table', 1),
(12, '2021_03_08_055752_create_paypal_credentials_table', 1),
(13, '2021_03_16_082237_create_competetions_table', 1),
(14, '2021_03_19_044140_create_student_viewed_articles_table', 1),
(15, '2021_03_19_044146_create_competetion_data_table', 1),
(16, '2021_03_28_115407_create_student_read_articles_table', 1),
(17, '2021_03_28_115409_create_reviews_table', 1),
(18, '2021_04_10_180832_create_results_table', 1),
(19, '2021_04_10_181845_create_participant_competetion_status_table', 1),
(20, '2021_04_10_191144_create_particpant_claim_prize_table', 1),
(21, '2021_04_30_190736_create_student_paypal_accounts_table', 1),
(22, '2021_05_15_102547_create_countries_table', 1),
(23, '2021_05_19_081650_create_competetion_results_table', 1),
(24, '2021_05_29_104710_create_competetion_settings_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `participant_competetion_status`
--

CREATE TABLE `participant_competetion_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `competetions_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `particpant_claim_prize`
--

CREATE TABLE `particpant_claim_prize` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `competetions_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `article_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
-- Table structure for table `paypal_credentials`
--

CREATE TABLE `paypal_credentials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `PAYPAL_MODE` text COLLATE utf8mb4_unicode_ci DEFAULT 'sandbox',
  `PAYPAL_CLIENT_ID` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PAYPAL_SECRET_ID` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PAYPAL_ACCOUNT_ID` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paypal_credentials`
--

INSERT INTO `paypal_credentials` (`id`, `PAYPAL_MODE`, `PAYPAL_CLIENT_ID`, `PAYPAL_SECRET_ID`, `PAYPAL_ACCOUNT_ID`, `created_at`, `updated_at`) VALUES
(1, 'sandbox', 'AVQw3_9w0X0gsf5hqL6TKS2H2uIF4bSXXs0fYLvZtNNOnY4XQN5qvtT_RFVJEtkaHyTXTUI-u-Vzyjlt', 'EHOqktIt7Sq-R8PXVwMddwIH6K3rbQogz-dKHCfAyCOSTQT0JYs13utE76xEqCZ0qEVfCERg1IaK_RIf', 'sb-0ftsv5212827@business.example.com', '2021-06-16 08:11:49', '2021-06-16 08:11:49');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `price_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signup_fee` decimal(8,2) NOT NULL DEFAULT 0.00,
  `trial_period` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `trial_interval` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'day',
  `invoice_period` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `invoice_interval` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'month',
  `grace_period` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `grace_interval` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'day',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `description`, `price`, `price_id`, `signup_fee`, `trial_period`, `trial_interval`, `invoice_period`, `invoice_interval`, `grace_period`, `grace_interval`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Free Plan', 'This is a Free Plan', '0.00', '88a7078729e08405794de1ecb71b6bcddb956d2e', '0.00', 10, 'day', 1, 'month', 30, 'day', '2021-06-16 08:11:44', '2021-06-16 08:11:44', NULL),
(2, 'Gold Plan', 'This is a Gold Plan', '9.99', '216f2b50b3a86848eecab42b68af79dcfe504156', '1.00', 10, 'day', 1, 'month', 30, 'day', '2021-06-16 08:11:44', '2021-06-16 08:11:44', NULL),
(3, 'Silver Plan', 'This is a Silver Plan', '9.99', '95c8a5ec813624bb9dce24c1ea6e51389fc5d089', '1.00', 10, 'day', 1, 'month', 30, 'day', '2021-06-16 08:11:44', '2021-06-16 08:11:44', NULL),
(4, 'Platinum Plan', 'This is a Platinum Plan', '9.99', 'b5ff98b56c86d32427eeda2afdb3c5f5566b0900', '1.00', 10, 'day', 1, 'month', 30, 'day', '2021-06-16 08:11:44', '2021-06-16 08:11:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `plan_countries`
--

CREATE TABLE `plan_countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `plan_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plan_features`
--

CREATE TABLE `plan_features` (
  `id` int(10) UNSIGNED NOT NULL,
  `plan_id` int(10) UNSIGNED DEFAULT NULL,
  `competetion_quantity` int(10) UNSIGNED DEFAULT 2,
  `writing_quantity` int(10) UNSIGNED DEFAULT 2,
  `reading_quantity` int(10) UNSIGNED DEFAULT 10,
  `submit_quantity` int(10) UNSIGNED DEFAULT 10,
  `rating_quantity` int(10) UNSIGNED DEFAULT 5,
  `can_update_after_joined` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'true',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plan_features`
--

INSERT INTO `plan_features` (`id`, `plan_id`, `competetion_quantity`, `writing_quantity`, `reading_quantity`, `submit_quantity`, `rating_quantity`, `can_update_after_joined`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 4, 2, 8, 18, 3, 'false', '2021-06-16 08:11:46', '2021-06-16 08:11:46', NULL),
(2, 2, 11, 3, 4, 8, 6, 'false', '2021-06-16 08:11:46', '2021-06-16 08:11:46', NULL),
(3, 3, 6, 8, 2, 12, 10, 'false', '2021-06-16 08:11:46', '2021-06-16 08:11:46', NULL),
(4, 4, 5, 3, 3, 17, 7, 'false', '2021-06-16 08:11:46', '2021-06-16 08:11:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `plan_subscriptions`
--

CREATE TABLE `plan_subscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `plan_id` int(10) UNSIGNED DEFAULT NULL,
  `Order_ID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Order_Status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Payer_Given_Name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Payer_Sur_Name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Payer_Email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Payer_ID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` datetime DEFAULT NULL,
  `trial_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_starts_at` datetime DEFAULT NULL,
  `plan_ends_at` datetime DEFAULT NULL,
  `plan_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_signup_fee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_total_charge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Paid_At` date DEFAULT NULL,
  `plan_canceled_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `competetions_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `article_id` bigint(20) UNSIGNED DEFAULT NULL,
  `age_group_id` bigint(20) UNSIGNED DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prize` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `claim_prize` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `competetions_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `customer_service_rating` int(11) DEFAULT NULL,
  `quality_rating` int(11) DEFAULT NULL,
  `friendly_rating` int(11) DEFAULT NULL,
  `pricing_rating` int(11) DEFAULT NULL,
  `recommend` enum('Yes','No') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` enum('Sales','Service','Parts') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `reviewrateable_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reviewrateable_id` bigint(20) UNSIGNED DEFAULT NULL,
  `author_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_paypal_accounts`
--

CREATE TABLE `student_paypal_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `account_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_read_articles`
--

CREATE TABLE `student_read_articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `competetions_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `article_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_viewed_articles`
--

CREATE TABLE `student_viewed_articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `article_id` bigint(20) UNSIGNED DEFAULT NULL,
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
  `user_image` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age_group_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parents_consent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_name` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favourite_educator_name` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favourite_educator_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favourite_educator_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favourite_educator_address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favourite_institute_name` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favourite_institute_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favourite_institute_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favourite_institute_address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(10) UNSIGNED NOT NULL DEFAULT 3,
  `type` enum('Admin','Writer','Reader') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Reader',
  `sign_up_ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_image`, `email`, `age_group_id`, `date_of_birth`, `phone`, `place_of_birth`, `country`, `address`, `mother_name`, `father_name`, `parents_consent`, `school_name`, `school_phone`, `school_email`, `school_address`, `course`, `favourite_educator_name`, `favourite_educator_phone`, `favourite_educator_email`, `favourite_educator_address`, `favourite_institute_name`, `favourite_institute_phone`, `favourite_institute_email`, `favourite_institute_address`, `role`, `role_id`, `type`, `sign_up_ip_address`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', NULL, 'admin@admin.com', NULL, NULL, '+00000000000', NULL, 'USA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', 1, 'Admin', NULL, NULL, '$2y$10$2ILbIkt6ozmyi2lqF4CsCuBMTov4WL66vihOCcNQx2XaiZJLwAiKK', NULL, '2021-06-16 08:11:39', '2021-06-16 08:11:39', NULL),
(2, 'Student1', NULL, 'student1@email.com', 7, '1986-03-27', '+111111111111', 'South Africa', 'South Africa', 'Some Address', 'Parents Name', 'Parents Name', 'yes', 'Some Data', 'Some Data', 'student1@email.com', 'Some Address', 'Computer Science', 'Some Data', 'Some Data', 'student1@email.com', 'Some Address', 'Some Data', 'Some Data', 'student1@email.com', 'Some Address', 'Student', 2, 'Writer', '105.241.224.238', NULL, '$2y$10$LfD/HW82GwIWvm7rxP4ZA.cW2rZ6WR707ImQKwLQOG3wASg9KoN1S', NULL, '2021-06-16 08:11:39', '2021-06-16 08:11:39', NULL),
(3, 'Student2', NULL, 'student2@email.com', 3, '1983-09-16', '+111111111112', 'South Africa', 'South Africa', 'Some Address', 'Parents Name', 'Parents Name', 'yes', 'Some Data', 'Some Data', 'student2@email.com', 'Some Address', 'Computer Science', 'Some Data', 'Some Data', 'student2@email.com', 'Some Address', 'Some Data', 'Some Data', 'student2@email.com', 'Some Address', 'Student', 2, 'Writer', '167.212.4.74', NULL, '$2y$10$8m4T0BF9CMb1gvjI1ZttRekMx1/hsKxtOIy8HVZ7VrWWnHU6POJly', NULL, '2021-06-16 08:11:39', '2021-06-16 08:11:39', NULL),
(4, 'Student3', NULL, 'student3@email.com', 3, '1999-04-01', '+111111111113', 'South Africa', 'South Africa', 'Some Address', 'Parents Name', 'Parents Name', 'yes', 'Some Data', 'Some Data', 'student3@email.com', 'Some Address', 'Computer Science', 'Some Data', 'Some Data', 'student3@email.com', 'Some Address', 'Some Data', 'Some Data', 'student3@email.com', 'Some Address', 'Student', 2, 'Writer', '172.31.240.63', NULL, '$2y$10$coFHOQLKIAyHsBxMKzGeS.C9q7yj2RdG4LLnkGuJdVsOwQVDtJ9I6', NULL, '2021-06-16 08:11:39', '2021-06-16 08:11:39', NULL),
(5, 'Student4', NULL, 'student4@email.com', 1, '1994-03-17', '+111111111114', 'South Africa', 'South Africa', 'Some Address', 'Parents Name', 'Parents Name', 'yes', 'Some Data', 'Some Data', 'student4@email.com', 'Some Address', 'Computer Science', 'Some Data', 'Some Data', 'student4@email.com', 'Some Address', 'Some Data', 'Some Data', 'student4@email.com', 'Some Address', 'Student', 2, 'Writer', '145.216.113.211', NULL, '$2y$10$HvWNdycx2ekowYMYGMxOcuQanBGPuQt8GTGOvgKfSLO3XWbclRUee', NULL, '2021-06-16 08:11:39', '2021-06-16 08:11:39', NULL),
(6, 'Student5', NULL, 'student5@email.com', 5, '1981-11-09', '+111111111115', 'South Africa', 'South Africa', 'Some Address', 'Parents Name', 'Parents Name', 'yes', 'Some Data', 'Some Data', 'student5@email.com', 'Some Address', 'Computer Science', 'Some Data', 'Some Data', 'student5@email.com', 'Some Address', 'Some Data', 'Some Data', 'student5@email.com', 'Some Address', 'Student', 2, 'Writer', '66.157.101.241', NULL, '$2y$10$R2HprW6wYpqF.1VfgINNbOzyPRuvUe94NoRRcWZoslXmhybvo.sZS', NULL, '2021-06-16 08:11:40', '2021-06-16 08:11:40', NULL),
(7, 'Student6', NULL, 'student6@email.com', 5, '2002-05-03', '+111111111116', 'South Africa', 'South Africa', 'Some Address', 'Parents Name', 'Parents Name', 'yes', 'Some Data', 'Some Data', 'student6@email.com', 'Some Address', 'Computer Science', 'Some Data', 'Some Data', 'student6@email.com', 'Some Address', 'Some Data', 'Some Data', 'student6@email.com', 'Some Address', 'Student', 2, 'Writer', '187.66.15.177', NULL, '$2y$10$ut4Jgaw8ZMTriLN.Emu.ne1gKpWuDXpEN884K/Z8YsJ8lY428nu2y', NULL, '2021-06-16 08:11:40', '2021-06-16 08:11:40', NULL),
(8, 'Student7', NULL, 'student7@email.com', 7, '2000-03-14', '+111111111117', 'South Africa', 'South Africa', 'Some Address', 'Parents Name', 'Parents Name', 'yes', 'Some Data', 'Some Data', 'student7@email.com', 'Some Address', 'Computer Science', 'Some Data', 'Some Data', 'student7@email.com', 'Some Address', 'Some Data', 'Some Data', 'student7@email.com', 'Some Address', 'Student', 2, 'Writer', '102.62.97.45', NULL, '$2y$10$bRo.ruYL3VuAVeAD1wiEIOv5dfqcnFwgi1zJb9LQZmMfMg/PGuiUy', NULL, '2021-06-16 08:11:40', '2021-06-16 08:11:40', NULL),
(9, 'Student8', NULL, 'student8@email.com', 4, '2000-06-04', '+111111111118', 'South Africa', 'South Africa', 'Some Address', 'Parents Name', 'Parents Name', 'yes', 'Some Data', 'Some Data', 'student8@email.com', 'Some Address', 'Computer Science', 'Some Data', 'Some Data', 'student8@email.com', 'Some Address', 'Some Data', 'Some Data', 'student8@email.com', 'Some Address', 'Student', 2, 'Writer', '219.225.123.225', NULL, '$2y$10$gyVuGG2qWFVSR8siOG/3TeXXrmz8QNWNk1yRnhoTXiP8hZE7yWwmm', NULL, '2021-06-16 08:11:40', '2021-06-16 08:11:40', NULL),
(10, 'Student9', NULL, 'student9@email.com', 1, '2002-09-06', '+111111111119', 'South Africa', 'South Africa', 'Some Address', 'Parents Name', 'Parents Name', 'yes', 'Some Data', 'Some Data', 'student9@email.com', 'Some Address', 'Computer Science', 'Some Data', 'Some Data', 'student9@email.com', 'Some Address', 'Some Data', 'Some Data', 'student9@email.com', 'Some Address', 'Student', 2, 'Writer', '183.240.3.5', NULL, '$2y$10$PbiPRjHYzMheVK8JM8ahR.h4vl5//4my8ocX5aMx83v5rsgtY29RC', NULL, '2021-06-16 08:11:40', '2021-06-16 08:11:40', NULL),
(11, 'Student10', NULL, 'student10@email.com', 1, '1983-11-22', '+1111111111110', 'South Africa', 'South Africa', 'Some Address', 'Parents Name', 'Parents Name', 'yes', 'Some Data', 'Some Data', 'student10@email.com', 'Some Address', 'Computer Science', 'Some Data', 'Some Data', 'student10@email.com', 'Some Address', 'Some Data', 'Some Data', 'student10@email.com', 'Some Address', 'Student', 2, 'Writer', '48.219.225.74', NULL, '$2y$10$KPi.t9Iz/IDsTTRoAq685OjURrFzEXdeLNTRu7y01LmUOgegyki3m', NULL, '2021-06-16 08:11:40', '2021-06-16 08:11:40', NULL),
(12, 'Student11', NULL, 'student11@email.com', 2, '2001-12-26', '+1111111111111', 'South Africa', 'South Africa', 'Some Address', 'Parents Name', 'Parents Name', 'yes', 'Some Data', 'Some Data', 'student11@email.com', 'Some Address', 'Computer Science', 'Some Data', 'Some Data', 'student11@email.com', 'Some Address', 'Some Data', 'Some Data', 'student11@email.com', 'Some Address', 'Student', 2, 'Writer', '144.243.107.90', NULL, '$2y$10$WKYvgAfR4.PPvjIHcSXwMuTr7DKUKn3zhYwMHIyF15CZ1/cyRwGpW', NULL, '2021-06-16 08:11:40', '2021-06-16 08:11:40', NULL),
(13, 'Student12', NULL, 'student12@email.com', 1, '1981-05-28', '+1111111111112', 'South Africa', 'South Africa', 'Some Address', 'Parents Name', 'Parents Name', 'yes', 'Some Data', 'Some Data', 'student12@email.com', 'Some Address', 'Computer Science', 'Some Data', 'Some Data', 'student12@email.com', 'Some Address', 'Some Data', 'Some Data', 'student12@email.com', 'Some Address', 'Student', 2, 'Writer', '83.154.179.45', NULL, '$2y$10$NRUX.Ko6TTkJWKJrSLqJb.c5pLZgPjHwgyN9zpJFo4wmXNFtuP6qe', NULL, '2021-06-16 08:11:40', '2021-06-16 08:11:40', NULL),
(14, 'Student13', NULL, 'student13@email.com', 1, '1982-01-10', '+1111111111113', 'South Africa', 'South Africa', 'Some Address', 'Parents Name', 'Parents Name', 'yes', 'Some Data', 'Some Data', 'student13@email.com', 'Some Address', 'Computer Science', 'Some Data', 'Some Data', 'student13@email.com', 'Some Address', 'Some Data', 'Some Data', 'student13@email.com', 'Some Address', 'Student', 2, 'Writer', '81.91.166.108', NULL, '$2y$10$nJX2M.dCNFjf7fuWxNkH1OG8QIv.a86cTfCJNYFRwA1DMKnkjoyM6', NULL, '2021-06-16 08:11:40', '2021-06-16 08:11:40', NULL),
(15, 'Student14', NULL, 'student14@email.com', 2, '1980-06-14', '+1111111111114', 'South Africa', 'South Africa', 'Some Address', 'Parents Name', 'Parents Name', 'yes', 'Some Data', 'Some Data', 'student14@email.com', 'Some Address', 'Computer Science', 'Some Data', 'Some Data', 'student14@email.com', 'Some Address', 'Some Data', 'Some Data', 'student14@email.com', 'Some Address', 'Student', 2, 'Writer', '182.241.164.144', NULL, '$2y$10$3hi357/zkVonXvblB9uYK.H7QCXKYq1G/.mhBetXAT3cRLE/G6VIG', NULL, '2021-06-16 08:11:41', '2021-06-16 08:11:41', NULL),
(16, 'Student15', NULL, 'student15@email.com', 6, '1987-04-27', '+1111111111115', 'South Africa', 'South Africa', 'Some Address', 'Parents Name', 'Parents Name', 'yes', 'Some Data', 'Some Data', 'student15@email.com', 'Some Address', 'Computer Science', 'Some Data', 'Some Data', 'student15@email.com', 'Some Address', 'Some Data', 'Some Data', 'student15@email.com', 'Some Address', 'Student', 2, 'Writer', '116.177.204.208', NULL, '$2y$10$lCzuQ846N4E3RxR8vF7thOPEp1cq/qJu3/BACBljdBNXPj9kcW1Kq', NULL, '2021-06-16 08:11:41', '2021-06-16 08:11:41', NULL),
(17, 'Student16', NULL, 'student16@email.com', 6, '2005-04-21', '+1111111111116', 'South Africa', 'South Africa', 'Some Address', 'Parents Name', 'Parents Name', 'yes', 'Some Data', 'Some Data', 'student16@email.com', 'Some Address', 'Computer Science', 'Some Data', 'Some Data', 'student16@email.com', 'Some Address', 'Some Data', 'Some Data', 'student16@email.com', 'Some Address', 'Student', 2, 'Writer', '111.22.156.106', NULL, '$2y$10$uDAKFLxHy1VN/9z01G20/eBvqATwPfOLEaqUd1bnKZsOeiiPE949C', NULL, '2021-06-16 08:11:41', '2021-06-16 08:11:41', NULL),
(18, 'Student17', NULL, 'student17@email.com', 1, '1985-08-05', '+1111111111117', 'South Africa', 'South Africa', 'Some Address', 'Parents Name', 'Parents Name', 'yes', 'Some Data', 'Some Data', 'student17@email.com', 'Some Address', 'Computer Science', 'Some Data', 'Some Data', 'student17@email.com', 'Some Address', 'Some Data', 'Some Data', 'student17@email.com', 'Some Address', 'Student', 2, 'Writer', '31.122.249.233', NULL, '$2y$10$PKvOOu5z9qgQWxtnmPdGWeA7nMI9lAvRhrsFt8yo7n2vq9yhut22G', NULL, '2021-06-16 08:11:41', '2021-06-16 08:11:41', NULL),
(19, 'Student18', NULL, 'student18@email.com', 2, '1998-04-08', '+1111111111118', 'South Africa', 'South Africa', 'Some Address', 'Parents Name', 'Parents Name', 'yes', 'Some Data', 'Some Data', 'student18@email.com', 'Some Address', 'Computer Science', 'Some Data', 'Some Data', 'student18@email.com', 'Some Address', 'Some Data', 'Some Data', 'student18@email.com', 'Some Address', 'Student', 2, 'Writer', '152.129.41.199', NULL, '$2y$10$VHpwPkVweI/BcuAfxEeml.SzQlCWDURjlYa7G7IOktUpK2Os5CyFe', NULL, '2021-06-16 08:11:41', '2021-06-16 08:11:41', NULL),
(20, 'Student19', NULL, 'student19@email.com', 7, '1990-06-01', '+1111111111119', 'South Africa', 'South Africa', 'Some Address', 'Parents Name', 'Parents Name', 'yes', 'Some Data', 'Some Data', 'student19@email.com', 'Some Address', 'Computer Science', 'Some Data', 'Some Data', 'student19@email.com', 'Some Address', 'Some Data', 'Some Data', 'student19@email.com', 'Some Address', 'Student', 2, 'Writer', '120.167.26.53', NULL, '$2y$10$H9nj/oxteCWNSBqQldtYn.fCPreQ2BVh1tG1Em.Btl8SBYPiUIT/C', NULL, '2021-06-16 08:11:41', '2021-06-16 08:11:41', NULL),
(21, 'Student20', NULL, 'student20@email.com', 5, '1980-10-26', '+1111111111120', 'South Africa', 'South Africa', 'Some Address', 'Parents Name', 'Parents Name', 'yes', 'Some Data', 'Some Data', 'student20@email.com', 'Some Address', 'Computer Science', 'Some Data', 'Some Data', 'student20@email.com', 'Some Address', 'Some Data', 'Some Data', 'student20@email.com', 'Some Address', 'Student', 2, 'Writer', '131.80.249.107', NULL, '$2y$10$Zvn3r1HE5mNG1JQWBbaG3uia6wOkcw2W9AG1fmKh.PMn.5MvJTFza', NULL, '2021-06-16 08:11:41', '2021-06-16 08:11:41', NULL),
(22, 'Teacher1', NULL, 'Teacher1@email.com', NULL, NULL, '+333333333331', NULL, 'Australia', 'Australia', NULL, NULL, NULL, 'Some Data', NULL, NULL, 'Some Address', 'Computer Science', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Teacher', 3, 'Reader', NULL, NULL, '$2y$10$AF97S71N0WIcFG2AWz6BceNAexprjSikz7eYYyjVryd5V6ycsLgiy', NULL, '2021-06-16 08:11:41', '2021-06-16 08:11:41', NULL),
(23, 'Teacher2', NULL, 'Teacher2@email.com', NULL, NULL, '+333333333332', NULL, 'Australia', 'Australia', NULL, NULL, NULL, 'Some Data', NULL, NULL, 'Some Address', 'Computer Science', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Teacher', 3, 'Reader', NULL, NULL, '$2y$10$q7InL1K.zdlM2XtbMFrNguALXRwGM.Z.freUL0CyBzEw6D8bNerNW', NULL, '2021-06-16 08:11:41', '2021-06-16 08:11:41', NULL),
(24, 'Teacher3', NULL, 'Teacher3@email.com', NULL, NULL, '+333333333333', NULL, 'Australia', 'Australia', NULL, NULL, NULL, 'Some Data', NULL, NULL, 'Some Address', 'Computer Science', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Teacher', 3, 'Reader', NULL, NULL, '$2y$10$Hhc5Hkw8nsaNheA.feUwEed74SUSdUBCPRY8dZrNbET46EUJMZo1y', NULL, '2021-06-16 08:11:42', '2021-06-16 08:11:42', NULL),
(25, 'Teacher4', NULL, 'Teacher4@email.com', NULL, NULL, '+333333333334', NULL, 'Australia', 'Australia', NULL, NULL, NULL, 'Some Data', NULL, NULL, 'Some Address', 'Computer Science', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Teacher', 3, 'Reader', NULL, NULL, '$2y$10$ujnpbHwom0aea2e.Q46G2.X.wkJQSJ6b5hz9ug65/qNq/eDOjTiKK', NULL, '2021-06-16 08:11:42', '2021-06-16 08:11:42', NULL),
(26, 'Teacher5', NULL, 'Teacher5@email.com', NULL, NULL, '+333333333335', NULL, 'Australia', 'Australia', NULL, NULL, NULL, 'Some Data', NULL, NULL, 'Some Address', 'Computer Science', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Teacher', 3, 'Reader', NULL, NULL, '$2y$10$4BbHjzH4mOl5PVoJ3UZ0eOld3xhWaiMn.Jyttsd2UP4mPZLSN4ZIS', NULL, '2021-06-16 08:11:42', '2021-06-16 08:11:42', NULL),
(27, 'Teacher6', NULL, 'Teacher6@email.com', NULL, NULL, '+333333333336', NULL, 'Australia', 'Australia', NULL, NULL, NULL, 'Some Data', NULL, NULL, 'Some Address', 'Computer Science', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Teacher', 3, 'Reader', NULL, NULL, '$2y$10$1CougE0c0uS1L99VsZYp4.QmQXWkzFEHlYR2iXzgjODqwUAtxWlRC', NULL, '2021-06-16 08:11:42', '2021-06-16 08:11:42', NULL),
(28, 'Teacher7', NULL, 'Teacher7@email.com', NULL, NULL, '+333333333337', NULL, 'Australia', 'Australia', NULL, NULL, NULL, 'Some Data', NULL, NULL, 'Some Address', 'Computer Science', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Teacher', 3, 'Reader', NULL, NULL, '$2y$10$b.5rmP7QDh8ESvs.TnLCTeIWW6hQZLSQ3R4grQWrUvzkXAKaNnKA2', NULL, '2021-06-16 08:11:42', '2021-06-16 08:11:42', NULL),
(29, 'Teacher8', NULL, 'Teacher8@email.com', NULL, NULL, '+333333333338', NULL, 'Australia', 'Australia', NULL, NULL, NULL, 'Some Data', NULL, NULL, 'Some Address', 'Computer Science', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Teacher', 3, 'Reader', NULL, NULL, '$2y$10$uL.lvYz0HXplXs80oNKY/.Y2/P1.TgwyPULVODvCjiwDJ15aFXLIa', NULL, '2021-06-16 08:11:42', '2021-06-16 08:11:42', NULL),
(30, 'Teacher9', NULL, 'Teacher9@email.com', NULL, NULL, '+333333333339', NULL, 'Australia', 'Australia', NULL, NULL, NULL, 'Some Data', NULL, NULL, 'Some Address', 'Computer Science', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Teacher', 3, 'Reader', NULL, NULL, '$2y$10$xS5Akp6/nkCV7EdmM4BOLeMyz0xuTOTGz.e..hqdU8.YDc9E0WAqq', NULL, '2021-06-16 08:11:42', '2021-06-16 08:11:42', NULL),
(31, 'Teacher10', NULL, 'Teacher10@email.com', NULL, NULL, '+3333333333310', NULL, 'Australia', 'Australia', NULL, NULL, NULL, 'Some Data', NULL, NULL, 'Some Address', 'Computer Science', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Teacher', 3, 'Reader', NULL, NULL, '$2y$10$tpUbEX/w.H1t0yBW184nZOpF7MRCBcZ3qap8RJckfHX7rIo1Jr9O6', NULL, '2021-06-16 08:11:43', '2021-06-16 08:11:43', NULL),
(32, 'Teacher11', NULL, 'Teacher11@email.com', NULL, NULL, '+3333333333311', NULL, 'Australia', 'Australia', NULL, NULL, NULL, 'Some Data', NULL, NULL, 'Some Address', 'Computer Science', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Teacher', 3, 'Reader', NULL, NULL, '$2y$10$i6AVbOmfGE8OgaD34FgqgOqvAWARQx1gQq.yxQmujr7hSxC1sMuKC', NULL, '2021-06-16 08:11:43', '2021-06-16 08:11:43', NULL),
(33, 'Teacher12', NULL, 'Teacher12@email.com', NULL, NULL, '+3333333333312', NULL, 'Australia', 'Australia', NULL, NULL, NULL, 'Some Data', NULL, NULL, 'Some Address', 'Computer Science', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Teacher', 3, 'Reader', NULL, NULL, '$2y$10$oIpZiD6eIafllSgsUzNh7uEdPoXUVH9K2iu/E2bUprn1RRPID0Yc.', NULL, '2021-06-16 08:11:43', '2021-06-16 08:11:43', NULL),
(34, 'Teacher13', NULL, 'Teacher13@email.com', NULL, NULL, '+3333333333313', NULL, 'Australia', 'Australia', NULL, NULL, NULL, 'Some Data', NULL, NULL, 'Some Address', 'Computer Science', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Teacher', 3, 'Reader', NULL, NULL, '$2y$10$4nObPmTbcyookGz6J5KA7uF88yKxwSVF63R4LHeB1ENcaH9d5.dDy', NULL, '2021-06-16 08:11:43', '2021-06-16 08:11:43', NULL),
(35, 'Teacher14', NULL, 'Teacher14@email.com', NULL, NULL, '+3333333333314', NULL, 'Australia', 'Australia', NULL, NULL, NULL, 'Some Data', NULL, NULL, 'Some Address', 'Computer Science', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Teacher', 3, 'Reader', NULL, NULL, '$2y$10$ZlAJKiccZsPkrr4x4qim/eY3R7gFW05AmVg1zOLRtD29Gs94SAn.e', NULL, '2021-06-16 08:11:43', '2021-06-16 08:11:43', NULL),
(36, 'Teacher15', NULL, 'Teacher15@email.com', NULL, NULL, '+3333333333315', NULL, 'Australia', 'Australia', NULL, NULL, NULL, 'Some Data', NULL, NULL, 'Some Address', 'Computer Science', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Teacher', 3, 'Reader', NULL, NULL, '$2y$10$nVo2b7fYmXcVCML1FX4nCeVgblF0bYbisKJv9ud34tpRFqPHdXHjW', NULL, '2021-06-16 08:11:43', '2021-06-16 08:11:43', NULL),
(37, 'Teacher16', NULL, 'Teacher16@email.com', NULL, NULL, '+3333333333316', NULL, 'Australia', 'Australia', NULL, NULL, NULL, 'Some Data', NULL, NULL, 'Some Address', 'Computer Science', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Teacher', 3, 'Reader', NULL, NULL, '$2y$10$sVJalMmMesx5XzueUrF74uACztkChQDisn9PdtZcP4p0nTBVOD5qS', NULL, '2021-06-16 08:11:43', '2021-06-16 08:11:43', NULL),
(38, 'Teacher17', NULL, 'Teacher17@email.com', NULL, NULL, '+3333333333317', NULL, 'Australia', 'Australia', NULL, NULL, NULL, 'Some Data', NULL, NULL, 'Some Address', 'Computer Science', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Teacher', 3, 'Reader', NULL, NULL, '$2y$10$UOJ9KzeQunz8GBh3ySzAAeM83mVBHI0VeXkVKBujq939lzjuDGY5u', NULL, '2021-06-16 08:11:43', '2021-06-16 08:11:43', NULL),
(39, 'Teacher18', NULL, 'Teacher18@email.com', NULL, NULL, '+3333333333318', NULL, 'Australia', 'Australia', NULL, NULL, NULL, 'Some Data', NULL, NULL, 'Some Address', 'Computer Science', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Teacher', 3, 'Reader', NULL, NULL, '$2y$10$QBOH1gh.U3GVtOS/ZAu6rOgHAjiiHf7B7cU7Sdcj2e2olxiVTxabm', NULL, '2021-06-16 08:11:44', '2021-06-16 08:11:44', NULL),
(40, 'Teacher19', NULL, 'Teacher19@email.com', NULL, NULL, '+3333333333319', NULL, 'Australia', 'Australia', NULL, NULL, NULL, 'Some Data', NULL, NULL, 'Some Address', 'Computer Science', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Teacher', 3, 'Reader', NULL, NULL, '$2y$10$w.cikf0n/3cZqs4YwdZqeurpoqp/B1YkFkrd381kxx8WHaBn26F9S', NULL, '2021-06-16 08:11:44', '2021-06-16 08:11:44', NULL),
(41, 'Teacher20', NULL, 'Teacher20@email.com', NULL, NULL, '+3333333333320', NULL, 'Australia', 'Australia', NULL, NULL, NULL, 'Some Data', NULL, NULL, 'Some Address', 'Computer Science', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Teacher', 3, 'Reader', NULL, NULL, '$2y$10$ne0L9Z1imCOGAJF7CfVf/epiUsYAqAot6Dl5gx64f8GPKzJqUOHNq', NULL, '2021-06-16 08:11:44', '2021-06-16 08:11:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `website_settings`
--

CREATE TABLE `website_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `website_settings`
--

INSERT INTO `website_settings` (`id`, `text_logo`, `logo`, `address`, `email_1`, `phone_1`, `email_2`, `phone_2`, `email_3`, `phone_3`, `created_at`, `updated_at`) VALUES
(1, 'CashTalesChampion', '1614402883.c4ca4238a0b923820dcc509a6f75849b.png', 'Buttonwood, California.Rosemead, CA 91770', 'admin@cashtaleschampion.com', '+00187867675', 'admin@cashtaleschampion.com', '+00187867675', 'admin@cashtaleschampion.com', '+00187867675', '2021-06-16 08:11:48', '2021-06-16 08:11:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `age_group`
--
ALTER TABLE `age_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `articles_title_unique` (`title`) USING HASH,
  ADD UNIQUE KEY `articles_content_unique` (`content`) USING HASH,
  ADD KEY `articles_user_id_foreign` (`user_id`),
  ADD KEY `articles_plan_id_foreign` (`plan_id`);

--
-- Indexes for table `article_reports`
--
ALTER TABLE `article_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_reports_user_id_foreign` (`user_id`),
  ADD KEY `article_reports_article_id_foreign` (`article_id`);

--
-- Indexes for table `competetions`
--
ALTER TABLE `competetions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `competetion_data`
--
ALTER TABLE `competetion_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `competetion_data_competetions_id_foreign` (`competetions_id`),
  ADD KEY `competetion_data_user_id_foreign` (`user_id`),
  ADD KEY `competetion_data_subscription_id_foreign` (`subscription_id`),
  ADD KEY `competetion_data_article_id_foreign` (`article_id`);

--
-- Indexes for table `competetion_results`
--
ALTER TABLE `competetion_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `competetion_results_competetions_id_foreign` (`competetions_id`);

--
-- Indexes for table `competetion_settings`
--
ALTER TABLE `competetion_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `competetion_settings_competetions_id_foreign` (`competetions_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
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
-- Indexes for table `participant_competetion_status`
--
ALTER TABLE `participant_competetion_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `participant_competetion_status_competetions_id_foreign` (`competetions_id`),
  ADD KEY `participant_competetion_status_user_id_foreign` (`user_id`);

--
-- Indexes for table `particpant_claim_prize`
--
ALTER TABLE `particpant_claim_prize`
  ADD PRIMARY KEY (`id`),
  ADD KEY `particpant_claim_prize_competetions_id_foreign` (`competetions_id`),
  ADD KEY `particpant_claim_prize_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `paypal_credentials`
--
ALTER TABLE `paypal_credentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan_countries`
--
ALTER TABLE `plan_countries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plan_countries_plan_id_foreign` (`plan_id`);

--
-- Indexes for table `plan_features`
--
ALTER TABLE `plan_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plan_features_plan_id_foreign` (`plan_id`);

--
-- Indexes for table `plan_subscriptions`
--
ALTER TABLE `plan_subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plan_subscriptions_user_id_foreign` (`user_id`),
  ADD KEY `plan_subscriptions_plan_id_foreign` (`plan_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `results_competetions_id_foreign` (`competetions_id`),
  ADD KEY `results_user_id_foreign` (`user_id`),
  ADD KEY `results_article_id_foreign` (`article_id`),
  ADD KEY `results_age_group_id_foreign` (`age_group_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_competetions_id_foreign` (`competetions_id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_reviewrateable_type_reviewrateable_id_index` (`reviewrateable_type`,`reviewrateable_id`),
  ADD KEY `reviews_author_type_author_id_index` (`author_type`,`author_id`);

--
-- Indexes for table `student_paypal_accounts`
--
ALTER TABLE `student_paypal_accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_paypal_accounts_email_unique` (`email`),
  ADD KEY `student_paypal_accounts_user_id_foreign` (`user_id`);

--
-- Indexes for table `student_read_articles`
--
ALTER TABLE `student_read_articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_read_articles_competetions_id_foreign` (`competetions_id`),
  ADD KEY `student_read_articles_user_id_foreign` (`user_id`),
  ADD KEY `student_read_articles_article_id_foreign` (`article_id`);

--
-- Indexes for table `student_viewed_articles`
--
ALTER TABLE `student_viewed_articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_viewed_articles_user_id_foreign` (`user_id`),
  ADD KEY `student_viewed_articles_article_id_foreign` (`article_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD KEY `users_age_group_id_foreign` (`age_group_id`);

--
-- Indexes for table `website_settings`
--
ALTER TABLE `website_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `age_group`
--
ALTER TABLE `age_group`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `article_reports`
--
ALTER TABLE `article_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `competetions`
--
ALTER TABLE `competetions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `competetion_data`
--
ALTER TABLE `competetion_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `competetion_results`
--
ALTER TABLE `competetion_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `competetion_settings`
--
ALTER TABLE `competetion_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `participant_competetion_status`
--
ALTER TABLE `participant_competetion_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `particpant_claim_prize`
--
ALTER TABLE `particpant_claim_prize`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paypal_credentials`
--
ALTER TABLE `paypal_credentials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `plan_countries`
--
ALTER TABLE `plan_countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plan_features`
--
ALTER TABLE `plan_features`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `plan_subscriptions`
--
ALTER TABLE `plan_subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_paypal_accounts`
--
ALTER TABLE `student_paypal_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_read_articles`
--
ALTER TABLE `student_read_articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_viewed_articles`
--
ALTER TABLE `student_viewed_articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `website_settings`
--
ALTER TABLE `website_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`),
  ADD CONSTRAINT `articles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `article_reports`
--
ALTER TABLE `article_reports`
  ADD CONSTRAINT `article_reports_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `article_reports_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `competetion_data`
--
ALTER TABLE `competetion_data`
  ADD CONSTRAINT `competetion_data_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `competetion_data_competetions_id_foreign` FOREIGN KEY (`competetions_id`) REFERENCES `competetions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `competetion_data_subscription_id_foreign` FOREIGN KEY (`subscription_id`) REFERENCES `plans` (`id`),
  ADD CONSTRAINT `competetion_data_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `competetion_results`
--
ALTER TABLE `competetion_results`
  ADD CONSTRAINT `competetion_results_competetions_id_foreign` FOREIGN KEY (`competetions_id`) REFERENCES `competetions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `competetion_settings`
--
ALTER TABLE `competetion_settings`
  ADD CONSTRAINT `competetion_settings_competetions_id_foreign` FOREIGN KEY (`competetions_id`) REFERENCES `competetions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `participant_competetion_status`
--
ALTER TABLE `participant_competetion_status`
  ADD CONSTRAINT `participant_competetion_status_competetions_id_foreign` FOREIGN KEY (`competetions_id`) REFERENCES `competetions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `participant_competetion_status_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `particpant_claim_prize`
--
ALTER TABLE `particpant_claim_prize`
  ADD CONSTRAINT `particpant_claim_prize_competetions_id_foreign` FOREIGN KEY (`competetions_id`) REFERENCES `competetions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `particpant_claim_prize_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plan_countries`
--
ALTER TABLE `plan_countries`
  ADD CONSTRAINT `plan_countries_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plan_features`
--
ALTER TABLE `plan_features`
  ADD CONSTRAINT `plan_features_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plan_subscriptions`
--
ALTER TABLE `plan_subscriptions`
  ADD CONSTRAINT `plan_subscriptions_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `plan_subscriptions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_age_group_id_foreign` FOREIGN KEY (`age_group_id`) REFERENCES `age_group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `results_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `results_competetions_id_foreign` FOREIGN KEY (`competetions_id`) REFERENCES `competetions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `results_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_competetions_id_foreign` FOREIGN KEY (`competetions_id`) REFERENCES `competetions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_paypal_accounts`
--
ALTER TABLE `student_paypal_accounts`
  ADD CONSTRAINT `student_paypal_accounts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_read_articles`
--
ALTER TABLE `student_read_articles`
  ADD CONSTRAINT `student_read_articles_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_read_articles_competetions_id_foreign` FOREIGN KEY (`competetions_id`) REFERENCES `competetions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_read_articles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_viewed_articles`
--
ALTER TABLE `student_viewed_articles`
  ADD CONSTRAINT `student_viewed_articles_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_viewed_articles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_age_group_id_foreign` FOREIGN KEY (`age_group_id`) REFERENCES `age_group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
