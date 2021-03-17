-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2021 at 06:47 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clearance`
--

-- --------------------------------------------------------

--
-- Table structure for table `campus_list`
--

CREATE TABLE `campus_list` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campus_list`
--

INSERT INTO `campus_list` (`id`, `name`) VALUES
(1, 'Mlqu Makati'),
(2, 'Mlqu Manila');

-- --------------------------------------------------------

--
-- Table structure for table `clearance`
--

CREATE TABLE `clearance` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `clearance_sheet` int(11) NOT NULL,
  `clearance_batch` int(11) NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clearance_batch`
--

CREATE TABLE `clearance_batch` (
  `id` int(11) NOT NULL,
  `campus` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `startedBy` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clearance_batch`
--

INSERT INTO `clearance_batch` (`id`, `campus`, `startDate`, `endDate`, `startedBy`, `status`) VALUES
(1, 2, '2021-03-01', '2021-03-08', 1, 'Closed'),
(2, 2, '2021-03-15', '2021-03-22', 1, 'Open');

-- --------------------------------------------------------

--
-- Table structure for table `clearance_requirements`
--

CREATE TABLE `clearance_requirements` (
  `id` int(11) NOT NULL,
  `department` int(11) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clearance_requirements`
--

INSERT INTO `clearance_requirements` (`id`, `department`, `year`) VALUES
(2, 4, 2),
(3, 1, 3),
(4, 5, 4),
(5, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `clearance_sheet`
--

CREATE TABLE `clearance_sheet` (
  `id` int(11) NOT NULL,
  `student_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `campus` int(11) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clearance_sheet`
--

INSERT INTO `clearance_sheet` (`id`, `student_id`, `section`, `year`, `campus`, `batch`) VALUES
(7, 'EG-20190023', 'qwe', 1, 1, 2),
(8, 'EG-20190472', 'test', 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `clearance_sheet_details`
--

CREATE TABLE `clearance_sheet_details` (
  `id` int(11) NOT NULL,
  `sheet_no` int(11) NOT NULL,
  `department` int(11) NOT NULL,
  `signed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `attachment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clearance_sheet_details`
--

INSERT INTO `clearance_sheet_details` (`id`, `sheet_no`, `department`, `signed_by`, `attachment`, `status`, `remarks`) VALUES
(16, 7, 2, 2, 'no attachment', 'Revoked', 'Please see librarian.'),
(17, 8, 2, 2, 'no attachment', 'Revoked', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `department_list`
--

CREATE TABLE `department_list` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department_list`
--

INSERT INTO `department_list` (`id`, `name`) VALUES
(1, 'IT'),
(2, 'Library'),
(3, 'Guidance'),
(4, 'Discipline Office'),
(5, 'APO'),
(6, 'Registrar'),
(7, 'Administrator'),
(8, 'Staff'),
(9, 'Department test');

-- --------------------------------------------------------

--
-- Table structure for table `excel_templates`
--

CREATE TABLE `excel_templates` (
  `id` int(11) NOT NULL,
  `templateName` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `excel_templates`
--

INSERT INTO `excel_templates` (`id`, `templateName`, `filename`) VALUES
(42, 'Import student data', 'studentRegistration.xlsx');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

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
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `name`) VALUES
(7, 1, 'Staff'),
(8, 2, 'Librarian'),
(9, 3, 'Administrator'),
(10, 4, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `student_account`
--

CREATE TABLE `student_account` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `stud_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_account`
--

INSERT INTO `student_account` (`id`, `userid`, `stud_id`) VALUES
(2, 4, 'EG-20190023');

-- --------------------------------------------------------

--
-- Table structure for table `student_list`
--

CREATE TABLE `student_list` (
  `student_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_list`
--

INSERT INTO `student_list` (`student_id`, `firstname`, `middlename`, `lastname`, `year`) VALUES
('EG-20190023', 'Jarvan', 'E.', 'Corpuz', 1),
('EG-20190472', 'Elissa', 'O.', 'Lopez', 1),
('FM-2020001', 'Ben', 'T.', 'Tennyson', 2),
('id-1', 'rikimaru', 'e', 'martinez', 1),
('id-2', 'invoker', 'w', 'kael', 2),
('id-3', 'menthol', 'e', 'marlboro', 1),
('IT-2020002', 'Dianne', 'C.', 'Nepomuceno', 2),
('IT-2020003', 'Lloyd', 'D', 'Languido', 2),
('IT-2020004', 'Jay', 'D', 'Lupin', 4);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Staff', 'staff@clearance.org', NULL, '$2y$10$6.TOSVwZ9masH3RgGKjceOEdGOeScGkr6adg9UKxMlbaEsUIscT4m', NULL, '2021-02-28 07:50:11', '2021-02-28 07:50:11'),
(2, 'Librarian', 'Librarian@clearance.org', NULL, '$2y$10$JOmW4PwrFwv4JKI/ebQLGeizMycqhGRgY846pKub0P2gi8QL9ZiXS', 'KLqKQVHyw6gNbe2zpKVMOkqUDEYaTo02IMIbXhOUgrKyp1gLcuOughgJDtsi', '2021-03-01 10:12:45', '2021-03-01 10:12:45'),
(3, 'Administrator', 'admin@clearance.org', NULL, '$2y$10$RGPmGzCU8GRh9TzAGjhPr.atkxvvGcJ0pAXL7yNsSTu5D.A3wGKNm', NULL, '2021-03-02 03:36:21', '2021-03-02 03:36:21'),
(4, 'Student', 'student@mlqu.ph', NULL, '$2y$10$2UtGljfS6wpZK7xJZiX4POuWr1orz3lXcszOHBWsDbPnItZl4iC6y', NULL, '2021-03-11 18:42:01', '2021-03-11 18:42:01');

-- --------------------------------------------------------

--
-- Table structure for table `year_lvl`
--

CREATE TABLE `year_lvl` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `year_lvl`
--

INSERT INTO `year_lvl` (`id`, `name`) VALUES
(1, 'Freshman'),
(2, 'Sophomore'),
(3, 'Junior'),
(4, 'Senior');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campus_list`
--
ALTER TABLE `campus_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clearance`
--
ALTER TABLE `clearance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clearance_batch` (`clearance_batch`),
  ADD KEY `clearance_sheet` (`clearance_sheet`);

--
-- Indexes for table `clearance_batch`
--
ALTER TABLE `clearance_batch`
  ADD PRIMARY KEY (`id`),
  ADD KEY `startedBy` (`startedBy`),
  ADD KEY `campus` (`campus`);

--
-- Indexes for table `clearance_requirements`
--
ALTER TABLE `clearance_requirements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department` (`department`),
  ADD KEY `year` (`year`);

--
-- Indexes for table `clearance_sheet`
--
ALTER TABLE `clearance_sheet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `campus` (`campus`),
  ADD KEY `batch` (`batch`),
  ADD KEY `year` (`year`);

--
-- Indexes for table `clearance_sheet_details`
--
ALTER TABLE `clearance_sheet_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sheet_no` (`sheet_no`),
  ADD KEY `signed_by` (`signed_by`),
  ADD KEY `department` (`department`);

--
-- Indexes for table `department_list`
--
ALTER TABLE `department_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `excel_templates`
--
ALTER TABLE `excel_templates`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `student_account`
--
ALTER TABLE `student_account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_account_stud_id_foreign` (`stud_id`),
  ADD KEY `student_account_userid_foreign` (`userid`);

--
-- Indexes for table `student_list`
--
ALTER TABLE `student_list`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `year` (`year`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `year_lvl`
--
ALTER TABLE `year_lvl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campus_list`
--
ALTER TABLE `campus_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clearance`
--
ALTER TABLE `clearance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clearance_batch`
--
ALTER TABLE `clearance_batch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clearance_requirements`
--
ALTER TABLE `clearance_requirements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `clearance_sheet`
--
ALTER TABLE `clearance_sheet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `clearance_sheet_details`
--
ALTER TABLE `clearance_sheet_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `department_list`
--
ALTER TABLE `department_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `excel_templates`
--
ALTER TABLE `excel_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student_account`
--
ALTER TABLE `student_account`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `year_lvl`
--
ALTER TABLE `year_lvl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clearance`
--
ALTER TABLE `clearance`
  ADD CONSTRAINT `clearance_ibfk_1` FOREIGN KEY (`clearance_batch`) REFERENCES `clearance_batch` (`id`),
  ADD CONSTRAINT `clearance_ibfk_2` FOREIGN KEY (`clearance_sheet`) REFERENCES `clearance_sheet` (`id`);

--
-- Constraints for table `clearance_batch`
--
ALTER TABLE `clearance_batch`
  ADD CONSTRAINT `clearance_batch_ibfk_1` FOREIGN KEY (`startedBy`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `clearance_batch_ibfk_2` FOREIGN KEY (`campus`) REFERENCES `campus_list` (`id`);

--
-- Constraints for table `clearance_requirements`
--
ALTER TABLE `clearance_requirements`
  ADD CONSTRAINT `clearance_requirements_ibfk_1` FOREIGN KEY (`department`) REFERENCES `department_list` (`id`),
  ADD CONSTRAINT `clearance_requirements_ibfk_2` FOREIGN KEY (`year`) REFERENCES `year_lvl` (`id`);

--
-- Constraints for table `clearance_sheet`
--
ALTER TABLE `clearance_sheet`
  ADD CONSTRAINT `clearance_sheet_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student_list` (`student_id`),
  ADD CONSTRAINT `clearance_sheet_ibfk_2` FOREIGN KEY (`campus`) REFERENCES `campus_list` (`id`),
  ADD CONSTRAINT `clearance_sheet_ibfk_3` FOREIGN KEY (`batch`) REFERENCES `clearance_batch` (`id`),
  ADD CONSTRAINT `clearance_sheet_ibfk_4` FOREIGN KEY (`year`) REFERENCES `year_lvl` (`id`);

--
-- Constraints for table `clearance_sheet_details`
--
ALTER TABLE `clearance_sheet_details`
  ADD CONSTRAINT `clearance_sheet_details_ibfk_1` FOREIGN KEY (`sheet_no`) REFERENCES `clearance_sheet` (`id`),
  ADD CONSTRAINT `clearance_sheet_details_ibfk_2` FOREIGN KEY (`signed_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `clearance_sheet_details_ibfk_3` FOREIGN KEY (`department`) REFERENCES `department_list` (`id`);

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `student_account`
--
ALTER TABLE `student_account`
  ADD CONSTRAINT `student_account_ibfk_1` FOREIGN KEY (`stud_id`) REFERENCES `student_list` (`student_id`),
  ADD CONSTRAINT `student_account_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);

--
-- Constraints for table `student_list`
--
ALTER TABLE `student_list`
  ADD CONSTRAINT `student_list_ibfk_1` FOREIGN KEY (`year`) REFERENCES `year_lvl` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
