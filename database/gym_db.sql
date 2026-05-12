-- Smart Gym Management System Database
-- Developed By Nashir Husain Pathan

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Database: `gym_db`
CREATE DATABASE IF NOT EXISTS `gym_db`;
USE `gym_db`;

-- Table structure for table `admins`
CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table `admins`
INSERT INTO `admins` (`username`, `password`, `full_name`) VALUES
('admin', 'admin123', 'Nashir Husain Pathan'); -- In a real app, use password_hash

-- Table structure for table `users` (For registration)
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table structure for table `membership_plans`
CREATE TABLE `membership_plans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plan_name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `features` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table `membership_plans`
INSERT INTO `membership_plans` (`plan_name`, `price`, `duration`, `features`) VALUES
('Basic Plan', 1500.00, '1 Month', 'Gym Access, Basic Workout Guidance, Locker Facility'),
('Standard Plan', 3000.00, '3 Months', 'Gym Access, Diet Guidance, Personal Trainer Support, Locker Facility'),
('Premium Plan', 6000.00, '6 Months', 'Unlimited Gym Access, Advanced Diet Plan, Personal Trainer, Cardio + Strength Training, Supplement Guidance, Locker Facility');

-- Table structure for table `trainers`
CREATE TABLE `trainers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `specialization` varchar(100) NOT NULL,
  `experience` varchar(50) NOT NULL,
  `image` varchar(255) DEFAULT 'default-trainer.jpg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table `trainers`
INSERT INTO `trainers` (`name`, `specialization`, `experience`, `image`) VALUES
('Rahul Sharma', 'Bodybuilding Coach', '5 Years', 'trainer1.jpg'),
('Ayesha Khan', 'Yoga & Wellness', '4 Years', 'trainer2.jpg'),
('Vikram Singh', 'Crossfit Specialist', '7 Years', 'trainer3.jpg');

-- Table structure for table `testimonials`
CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `feedback` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table `testimonials`
INSERT INTO `testimonials` (`name`, `feedback`) VALUES
('Rahul Sharma', 'This gym completely changed my fitness journey.'),
('Ayesha Khan', 'Affordable plans and excellent trainers.');

-- Table structure for table `gallery`
CREATE TABLE `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table structure for table `homepage_content`
CREATE TABLE `homepage_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section_name` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table `homepage_content`
INSERT INTO `homepage_content` (`section_name`, `title`, `subtitle`) VALUES
('Hero', 'Transform Your Body, Transform Your Life', 'Affordable Gym Membership Plans Starting at Just ₹1500');

-- Table structure for table `membership_inquiries`
CREATE TABLE `membership_inquiries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `weight` decimal(5,2) DEFAULT NULL,
  `height` decimal(5,2) DEFAULT NULL,
  `selected_plan` varchar(100) NOT NULL,
  `fitness_goal` varchar(100) NOT NULL,
  `preferred_timing` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `message` text DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

COMMIT;
