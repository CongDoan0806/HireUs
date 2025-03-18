CREATE DATABASE IF NOT EXISTS HireUs_db;
USE HireUs_db;
drop database HireUs_db;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `role` enum('recruiter','applicant') NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
);

CREATE TABLE `industries` (
  `industry_id` int(11) NOT NULL AUTO_INCREMENT,
  `industry_name` varchar(50) NOT NULL,
  PRIMARY KEY (`industry_id`),
  UNIQUE KEY `industry_name` (`industry_name`)
);

CREATE TABLE `job_types` (
  `job_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_type_name` enum('fulltime','parttime','remote','internship','contract') NOT NULL DEFAULT 'fulltime',
  PRIMARY KEY (`job_type_id`)
);

CREATE TABLE `levels` (
  `level_id` int(11) NOT NULL AUTO_INCREMENT,
  `level_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`level_id`)
);

CREATE TABLE `companies` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(100) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `company_website` varchar(255) DEFAULT NULL,
  `company_address` varchar(255) DEFAULT NULL,
  `employee_count` int(11) DEFAULT NULL,
  `comp_benefit` text NOT NULL,
  `industry_id` int(11) DEFAULT NULL,
  `founded_date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`company_id`),
  KEY `user_id` (`user_id`),
  KEY `industry_id` (`industry_id`),
  CONSTRAINT `companies_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  CONSTRAINT `companies_ibfk_2` FOREIGN KEY (`industry_id`) REFERENCES `industries` (`industry_id`) ON DELETE CASCADE
);

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `job_type_id` int(11) NOT NULL,
  `status` enum('open','close') NOT NULL,
  `level_id` int(11) NOT NULL,
  `job_description` text NOT NULL,
  `responsibilities` text NOT NULL,
  `requirements` text NOT NULL,
  `location` varchar(100) DEFAULT NULL,
  `job_benefit` text NOT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `posted_date` datetime DEFAULT current_timestamp(),
  `deadline` date NOT NULL,
  `required_candidates` int(11) NOT NULL DEFAULT 1,
  `total_applied` int(11) NOT NULL DEFAULT 0,
  `industry_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`job_id`),
  KEY `user_id` (`user_id`),
  KEY `level_id` (`level_id`),
  KEY `job_type_id` (`job_type_id`),
  CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  CONSTRAINT `jobs_ibfk_3` FOREIGN KEY (`level_id`) REFERENCES `levels` (`level_id`) ON DELETE CASCADE,
  CONSTRAINT `jobs_ibfk_4` FOREIGN KEY (`job_type_id`) REFERENCES `job_types` (`job_type_id`) ON DELETE CASCADE,
  CONSTRAINT `jobs_ibfk_5` FOREIGN KEY (`industry_id`) REFERENCES `industries` (`industry_id`) ON DELETE CASCADE,
  CONSTRAINT `chk_required_candidates` CHECK (`required_candidates` >= 0),
  CONSTRAINT `chk_total_applied` CHECK (`total_applied` >= 0)
);

CREATE TABLE `applications` (
  `application_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `apply_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('pending','accepted','rejected') DEFAULT 'pending',
  `cv` varchar(100) NOT NULL,
  PRIMARY KEY (`application_id`)
);

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `comment_content` text NOT NULL,
  PRIMARY KEY (`comment_id`)
);
