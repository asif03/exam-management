-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2022 at 10:45 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bcps_erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `bcps_golden_jubilee_guests`
--

CREATE TABLE `bcps_golden_jubilee_guests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mem_fellow_radio` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fellow_id` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `profession` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `candidate_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institute` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mailing_addr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_spouse_chk` tinyint(1) NOT NULL DEFAULT 0,
  `spouse_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_mobile` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_mode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_branch` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_fee` decimal(15,2) NOT NULL DEFAULT 0.00,
  `verified` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `money_receipt` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `money_rec_file` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_up_file` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bcps_golden_jubilee_guests`
--

INSERT INTO `bcps_golden_jubilee_guests` (`id`, `mem_fellow_radio`, `fellow_id`, `subject_id`, `profession`, `gender`, `candidate_name`, `institute`, `department`, `mailing_addr`, `mobile`, `email`, `is_spouse_chk`, `spouse_name`, `spouse_mobile`, `payment_mode`, `bank_name`, `bank_branch`, `reg_fee`, `verified`, `money_receipt`, `money_rec_file`, `img_up_file`, `created_at`, `updated_at`) VALUES
(1, 'fcps', '123', 2, 'asstprof', 'male', 'il', 'ilijl', 'jkljl', 'jkljkl', 'jkljkl', 'jklj', 1, 'jkklh', '8098', '1', 'Agrani Bank', 'kjkh', '4000.00', 'N', 'jhj', NULL, NULL, '2022-02-27 23:16:22', '2022-02-27 23:16:22'),
(2, 'fcps', '123', 1, 'consult', 'male', 'jkj', 'klk', 'kl;k', 'k;lk', 'k;lk', ';lk;lk', 1, NULL, NULL, '1', 'Agrani Bank', 'klhilh', '4000.00', 'N', 'ljhj', 'uploads/1646030961_flower.jpg', 'uploads/1646030961_flower - Copy.jpg', NULL, NULL),
(3, 'fcps', '123', 5, 'asstprof', 'male', 'sadas', 'das', 'asda', 'dasd', 'dasd', 'asdas', 1, 'dasd', '453534', '1', 'Agrani Bank', 'dasda', '4000.00', 'N', 'dasd', 'uploads/1646031549_flower - Copy.jpg', 'uploads/1646031549_flower.jpg', NULL, NULL),
(4, 'mcps', '5765', 2, 'consult', 'male', 'jhjkhj', 'jjhjkh', 'hjkhbjkh', 'jhjkhjk', '090988667668', 'ghghg', 1, '7786', '9867896', '1', 'Agrani Bank', '767868', '4000.00', 'N', '678687678', 'uploads/1646038224_flower.jpg', 'uploads/1646038224_flower - Copy.jpg', NULL, NULL),
(5, 'mcps', '123', 2, 'associateprof', 'male', 'fasfas', 'fasfa', 'fasf', 'fasasf', 'afsf', 'fasf', 1, 'fasf', '42342342', '1', 'Agrani Bank', 'adasd', '4000.00', 'N', 'dasda', 'uploads/1646038371_flower.jpg', 'uploads/1646038371_flower - Copy.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `degrees`
--

CREATE TABLE `degrees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `degree_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_exam_names`
--

CREATE TABLE `exam_exam_names` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_info_updates`
--

CREATE TABLE `exam_info_updates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_year` year(4) NOT NULL,
  `exam_session` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roll_no` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bmdc_reg_no` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `candidate_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `training_institute_id` bigint(20) UNSIGNED NOT NULL,
  `other_training_institute_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trainer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_institute_id` bigint(20) UNSIGNED NOT NULL,
  `other_course_institute_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_year` year(4) NOT NULL,
  `course_director` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_posting` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institute_head` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_info_update_ospe_ioe_xls`
--

CREATE TABLE `exam_info_update_ospe_ioe_xls` (
  `exam_year` year(4) NOT NULL,
  `exam_session` enum('JAN','JUL') COLLATE utf8mb4_unicode_ci NOT NULL,
  `roll_no` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `candidate_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sp_code` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch_insert_no` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_results`
--

CREATE TABLE `exam_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_year` year(4) NOT NULL,
  `exam_session` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roll` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `exam_name_id` bigint(20) UNSIGNED DEFAULT NULL,
  `batch_no` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_12_11_075127_create_training_institutes_table', 1),
(6, '2021_12_11_075646_create_degrees_table', 1),
(7, '2021_12_11_075726_create_subjects_table', 1),
(8, '2021_12_12_061945_create_exam_info_updates_table', 1),
(9, '2021_12_13_062244_create_modules_table', 1),
(10, '2022_01_04_111951_create_exam_exam_names_table', 1),
(11, '2022_01_04_112721_create_exam_results_table', 1),
(12, '2022_01_24_045714_create_exam_info_update_ospe_ioe_xls_table', 1),
(13, '2022_02_26_093114_create_bcps_golden_jubilee_guests_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dashboard` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `module_name`, `display_name`, `description`, `controller_name`, `dashboard`, `icon_path`, `active`, `created_at`, `updated_at`) VALUES
(1, 'EXAM', 'Examination Department', 'Examination Department', 'ExamDashboardController', 'exam-dashboard', 'icon_exam.png', 1, NULL, NULL),
(2, 'RTM', 'RTM Department', 'RTM Department', 'RtmDashboardController', 'rtm-dashboard', 'icon_rtm.png', 1, NULL, NULL),
(4, 'IT', 'IT Department', 'IT Department', 'ItDashboardController', 'it-dashboard', 'icon_it.png', 1, NULL, NULL),
(8, 'ADMIN', 'Administration Department', 'Administration Department', 'AdminDashboardController', 'admin-dashboard', 'icon_admin.png', 1, NULL, NULL);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `degree_id` bigint(20) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `sp_code` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_name`, `desc`, `degree_id`, `active`, `sp_code`, `created_at`, `updated_at`) VALUES
(1, 'Anaesthesiology', NULL, NULL, 1, '11', NULL, NULL),
(2, 'Biochemistry', NULL, NULL, 1, '12', NULL, NULL),
(3, 'Cardiology', NULL, NULL, 1, '13', NULL, NULL),
(4, 'Cardiovascular Surgery', NULL, NULL, 1, '14', NULL, NULL),
(5, 'Conservative Dentistry & Endodontics', NULL, NULL, 1, '15', NULL, NULL),
(6, 'Dermatology & Venereology', NULL, NULL, 1, '16', NULL, NULL),
(7, 'Endocrinology & Metabolism', NULL, NULL, 1, '17', NULL, NULL),
(8, 'Family Medicine', NULL, NULL, 1, '18', NULL, NULL),
(9, 'Feto-Maternal Medicine', NULL, NULL, 1, '55', NULL, NULL),
(10, 'Gastroenterology', NULL, NULL, 1, '19', NULL, NULL),
(11, 'Gynaecological Oncology', NULL, NULL, 1, '56', NULL, NULL),
(12, 'Haematology', NULL, NULL, 1, '20', NULL, NULL),
(13, 'Histopathology', NULL, NULL, 1, '22', NULL, NULL),
(14, 'Infectious Disease & Tropical Medicine', NULL, NULL, 1, '23', NULL, NULL),
(15, 'Medicine', NULL, NULL, 1, '24', NULL, NULL),
(16, 'Microbiology', NULL, NULL, 1, '25', NULL, NULL),
(17, 'Neonatology', NULL, NULL, 1, '26', NULL, NULL),
(18, 'Nephrology', NULL, NULL, 1, '27', NULL, NULL),
(19, 'Neurology', NULL, NULL, 1, '28', NULL, NULL),
(20, 'Neuro-surgery', NULL, NULL, 1, '29', NULL, NULL),
(21, 'Obstetrics & Gynaecology', NULL, NULL, 1, '30', NULL, NULL),
(22, 'Ophthalmology', NULL, NULL, 1, '31', NULL, NULL),
(23, 'Oral and Maxillofacial Surgery', NULL, NULL, 1, '32', NULL, NULL),
(24, 'Orthodontics & Dentofacial Orthopaedics', NULL, NULL, 1, '33', NULL, NULL),
(25, 'Orthopaedic Surgery', NULL, NULL, 1, '34', NULL, NULL),
(26, 'Otolaryngology-Head and Neck Surgery', NULL, NULL, 1, '35', NULL, NULL),
(27, 'Paediatric Cardiology', NULL, NULL, 1, '58', NULL, NULL),
(28, 'Paediatric Gastroenterology & Nutrition', NULL, NULL, 1, '52', NULL, NULL),
(29, 'Paediatric Haematology & Oncology', NULL, NULL, 1, '36', NULL, NULL),
(30, 'Paediatric Nephrology', NULL, NULL, 1, '37', NULL, NULL),
(31, 'Paediatric Neurology & Development', NULL, NULL, 1, '54', NULL, NULL),
(32, 'Paediatric Pulmonology', NULL, NULL, 1, '53', NULL, NULL),
(33, 'Paediatric Surgery', NULL, NULL, 1, '38', NULL, NULL),
(34, 'Paediatrics', NULL, NULL, 1, '39', NULL, NULL),
(35, 'Physical Medicine & Rehabilitation', NULL, NULL, 1, '40', NULL, NULL),
(36, 'Plastic and Reconstructive Surgery', NULL, NULL, 1, '41', NULL, NULL),
(37, 'Hepatology', NULL, NULL, 1, '21', NULL, NULL),
(38, 'Prosthodontics', NULL, NULL, 1, '42', NULL, NULL),
(39, 'Psychiatry', NULL, NULL, 1, '43', NULL, NULL),
(40, 'Pulmonology', NULL, NULL, 1, '44', NULL, NULL),
(41, 'Radiology & Imaging', NULL, NULL, 1, '45', NULL, NULL),
(42, 'Radiotherapy', NULL, NULL, 1, '46', NULL, NULL),
(43, 'Reproductive Endocrinology & Infertility', NULL, NULL, 1, '57', NULL, NULL),
(44, 'Rheumatology', NULL, NULL, 1, '47', NULL, NULL),
(45, 'Surgery', NULL, NULL, 1, '48', NULL, NULL),
(46, 'Thoracic Surgery', NULL, NULL, 1, '49', NULL, NULL),
(47, 'Transfusion Medicine', NULL, NULL, 1, '51', NULL, NULL),
(48, 'Urology', NULL, NULL, 1, '50', NULL, NULL),
(49, 'Paediatric Surgery', NULL, NULL, 1, NULL, NULL, NULL),
(50, 'Hepatobiliary Surgery', NULL, NULL, 1, '60', NULL, NULL),
(51, 'Colorectal Surgery', NULL, NULL, 1, '61', NULL, NULL),
(52, 'Surgical Oncology', NULL, NULL, 1, '62', NULL, NULL),
(53, 'Paediatric Ophthalmology', NULL, NULL, 1, '64', NULL, NULL),
(54, 'Vitreo Retina', NULL, NULL, 1, '65', NULL, NULL),
(55, 'Paediatric Critical Care Medicine', NULL, NULL, 1, '69', NULL, NULL),
(56, 'Casualty & Emergency Surgery', NULL, NULL, 1, '63', NULL, NULL),
(57, 'Medical Oncology', NULL, NULL, 1, '66', NULL, NULL),
(58, 'Palliative Medicine', NULL, NULL, 1, '67', NULL, NULL),
(59, 'Paediatric Endocrinology and Metabolism', NULL, NULL, 1, '68', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `training_institutes`
--

CREATE TABLE `training_institutes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `institute_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
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
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `role` bigint(20) DEFAULT NULL,
  `module` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `active`, `role`, `module`, `created_at`, `updated_at`) VALUES
(1, 'Md. Asif Iqbal', 'it@bcps.edu.bd', NULL, '$2y$10$snSChEiPGID8SUT.wmcOJO96Rh0ts6lQh8Ce4fH77wlEq8/6eliQu', NULL, 1, 1, 7, '2022-02-19 22:21:44', '2022-02-19 22:21:44'),
(2, 'admin@bcps.edu.bd', 'admin@bcps.edu.bd', NULL, '$2y$10$VApmCm5sV8./sVXFy8wsEehCnI4HQnZH9OHLMqxDDJwGOErHtkCue', NULL, 1, 1, 8, '2022-02-26 01:21:54', '2022-02-26 01:21:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bcps_golden_jubilee_guests`
--
ALTER TABLE `bcps_golden_jubilee_guests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bcps_golden_jubilee_guests_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `degrees`
--
ALTER TABLE `degrees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_exam_names`
--
ALTER TABLE `exam_exam_names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_info_updates`
--
ALTER TABLE `exam_info_updates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_info_updates_subject_id_foreign` (`subject_id`),
  ADD KEY `exam_info_updates_training_institute_id_foreign` (`training_institute_id`),
  ADD KEY `exam_info_updates_course_institute_id_foreign` (`course_institute_id`);

--
-- Indexes for table `exam_info_update_ospe_ioe_xls`
--
ALTER TABLE `exam_info_update_ospe_ioe_xls`
  ADD PRIMARY KEY (`exam_year`,`exam_session`,`roll_no`,`sp_code`);

--
-- Indexes for table `exam_results`
--
ALTER TABLE `exam_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_results_subject_id_foreign` (`subject_id`),
  ADD KEY `exam_results_exam_name_id_foreign` (`exam_name_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subjects_degree_id_foreign` (`degree_id`);

--
-- Indexes for table `training_institutes`
--
ALTER TABLE `training_institutes`
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
-- AUTO_INCREMENT for table `bcps_golden_jubilee_guests`
--
ALTER TABLE `bcps_golden_jubilee_guests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `degrees`
--
ALTER TABLE `degrees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_exam_names`
--
ALTER TABLE `exam_exam_names`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_info_updates`
--
ALTER TABLE `exam_info_updates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_results`
--
ALTER TABLE `exam_results`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `training_institutes`
--
ALTER TABLE `training_institutes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bcps_golden_jubilee_guests`
--
ALTER TABLE `bcps_golden_jubilee_guests`
  ADD CONSTRAINT `bcps_golden_jubilee_guests_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exam_info_updates`
--
ALTER TABLE `exam_info_updates`
  ADD CONSTRAINT `exam_info_updates_course_institute_id_foreign` FOREIGN KEY (`course_institute_id`) REFERENCES `training_institutes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exam_info_updates_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exam_info_updates_training_institute_id_foreign` FOREIGN KEY (`training_institute_id`) REFERENCES `training_institutes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exam_results`
--
ALTER TABLE `exam_results`
  ADD CONSTRAINT `exam_results_exam_name_id_foreign` FOREIGN KEY (`exam_name_id`) REFERENCES `exam_exam_names` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exam_results_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_degree_id_foreign` FOREIGN KEY (`degree_id`) REFERENCES `degrees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
