-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2023 at 07:43 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `recipient_id` int(11) NOT NULL,
  `recipient_type` enum('admin','user') NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_read` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(255) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_details` varchar(255) NOT NULL,
  `objective` varchar(255) NOT NULL,
  `scope` varchar(255) NOT NULL,
  `project_type` varchar(255) NOT NULL,
  `supervisor` int(255) NOT NULL,
  `member1` int(255) NOT NULL,
  `member2` int(255) NOT NULL,
  `member3` int(255) NOT NULL,
  `member4` int(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `project_name`, `project_details`, `objective`, `scope`, `project_type`, `supervisor`, `member1`, `member2`, `member3`, `member4`, `created_at`) VALUES
(10, 'Weather App', 'Recording weather data into database', 'to develop', 'Efficient manga.....', 'webApplication', 2, 29, 23, 26, 24, '2023-04-29 09:43:26'),
(12, 'Weather App', 'Recording weather data into database', 'to develop', 'akjsdfiajoi', 'ecommerce', 2, 27, 19, 24, 19, '2023-04-29 23:42:03'),
(13, 'Weather App', 'Recording weather data into database', 'to develop .....', 'akjsdfiajoi', 'ai', 3, 27, 25, 28, 24, '2023-04-29 23:43:02'),
(14, 'Weather App', 'Recording weather data into database', 'ajdfajioefa', 'akjsdfiajoi', 'webApplication', 2, 29, 24, 21, 28, '2023-04-29 23:59:01'),
(15, 'Project Management', 'jafaioa', 'ajefaj', 'jaijai', 'ecommerce', 1, 15, 18, 20, 19, '2023-04-30 00:36:35');

-- --------------------------------------------------------

--
-- Table structure for table `project_requests`
--

CREATE TABLE `project_requests` (
  `project_id` int(255) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_details` varchar(255) NOT NULL,
  `objective` varchar(255) NOT NULL,
  `project_type` varchar(255) NOT NULL,
  `member1` int(255) NOT NULL,
  `member2` int(255) NOT NULL,
  `member3` int(255) NOT NULL,
  `member4` int(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_requests`
--

INSERT INTO `project_requests` (`project_id`, `project_name`, `project_details`, `objective`, `project_type`, `member1`, `member2`, `member3`, `member4`, `status`) VALUES
(14, 'Weather App', 'jihi', 'to develop', 'webApplication', 29, 26, 25, 20, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `supervisors`
--

CREATE TABLE `supervisors` (
  `supervisor_id` int(11) NOT NULL,
  `supervisor_name` varchar(255) NOT NULL,
  `supervisor_email` varchar(255) NOT NULL,
  `supervisor_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supervisors`
--

INSERT INTO `supervisors` (`supervisor_id`, `supervisor_name`, `supervisor_email`, `supervisor_password`) VALUES
(1, 'Supervisor1', 'supervisor1@gmail.com', '$2y$10$.7c9195JMhswm080CosTe.XjaWLWy4Ga1SNtTb1eEtdqLshAgQ8Ay'),
(2, 'Supervisor2', 'supervisor2@gmail.com', '$2y$10$0qAXtIbwIA3BIbrphB5Tme6vnB7gob2bY18fqAsXWQgpRQp3KFRP6'),
(3, 'Supervisor3', 'supervisor3@gmail.com', '$2y$10$fwTEObb5yzDUP1450HS7X.0g1WeEn0xgktF7jw2lgtKDl9Lznp2K.'),
(4, 'Supervisor4', 'supervisor4@gmail.com', '$2y$10$wA6Jp.yDLQVwP6DbA1KCUOYiCWboGtEeAq/Bt1vkzWALEwCmPsaDm');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(255) NOT NULL,
  `project_id` int(255) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `task_description` text NOT NULL,
  `assigned_to` int(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` enum('done','in progress','stuck') NOT NULL DEFAULT 'in progress'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `project_id`, `task_name`, `task_description`, `assigned_to`, `start_date`, `end_date`, `status`) VALUES
(1, 15, 'Documentation', 'All the work of written document', 15, '2023-04-30', '2023-05-01', 'in progress');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `team_id` int(255) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `project_id` int(255) NOT NULL,
  `member1` int(255) NOT NULL,
  `member2` int(255) NOT NULL,
  `member3` int(255) NOT NULL,
  `member4` int(255) NOT NULL,
  `supervisor` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`team_id`, `team_name`, `project_id`, `member1`, `member2`, `member3`, `member4`, `supervisor`) VALUES
(3, 'Weather App', 14, 29, 24, 21, 28, 2),
(4, 'Project Management', 15, 15, 18, 20, 19, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `batch` year(4) NOT NULL,
  `joined_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `cpassword`, `faculty`, `batch`, `joined_at`) VALUES
(15, 'Sujan Tamang', 'sujan@gmail.com', '$2y$10$TOTNnGCp6wBDksT6ZjYp3.uIov/nBvN.EVa0wCHvO9DFF2CDhidiG', '$2y$10$08fgzIDVm.3oiPo4QQKtCuW9zM5C4RUvcdTO97tBJ.EpXAOh281we', 'Information Technology', 2076, '2023-04-29 04:19:50'),
(17, 'Pasang Temba Sherpa', 'pasang@gmail.com', '$2y$10$a7QM46tkz1JMLQ3vjcRgcOLTp9FOqdpgYlA6JA2ZxE23aodLrCoLO', '$2y$10$MVxpiB849RQevTIfyQf.9ubn0ptXXw8AdjMXQWrl2RFGed4IbxeRe', 'Information Technology', 2076, '2023-04-29 04:19:50'),
(18, 'Uttam Shrestha', 'uttam@gmail.com', '$2y$10$CwKNSxi6jgJ4Yf6hYpf6/eTQN68Otem39M9BbCuhuu0Q3PJ7QDo2W', '$2y$10$cxEb4KB67nm.VPc89b1pTOs6BiXX6NFsugaCRUIYyTRQO1s/PDSWe', 'Information Technology', 2076, '2023-04-29 04:19:50'),
(19, 'Palden Sherpa', 'palden@gmail.com', '$2y$10$ISQzDbVIGxUMEfwZWWoSm.FXoZradyisItg4.9nfHYnbfHfTgdjSm', '$2y$10$Gok16ctqbr5cyFmu0uk8gef/KFH1tuObCI..JC/nlPxW5imojoR2S', 'Information Technology', 2076, '2023-04-29 04:19:50'),
(20, 'Samir Shrestha', 'samir@gmail.com', '$2y$10$ABcg6iVI0n/.I031cM44C.yAb8xHF0yOh14VlHVU49n945fjTk68u', '$2y$10$SNJkg15ZC8vCGPqIDOXdruawk6/Gpf9WrsvbovlBpdb0zuff2f27.', 'Information Technology', 2076, '2023-04-29 04:19:50'),
(21, 'Saroj Tamang', 'saroj@gmail.com', '$2y$10$WP2mGEBn8OEwKq4AY5XyMuTyBODXBYqiAXHX8a8Dy8L9aAQ/3JKLO', '$2y$10$Sie8SoW9nI/9g2cGGMgeCuab1QzjttLCWfVWHVQK4ztES2RlQ/uXe', 'Information Technology', 2076, '2023-04-29 04:19:50'),
(22, 'Sabina Jirel', 'sabina@gmail.com', '$2y$10$FzewqyeooyqzwwDjooY3UOZbP7Dua2mDiljK8Zu5rHI6rU5.mzMpm', '$2y$10$PAVQ/5ysY2swNAbEsUZtWulEPpQVj3FBSoBsLoe37MRagtxlWao8y', 'Information Technology', 2076, '2023-04-29 04:19:50'),
(23, 'Lasangmu Sherpa', 'lasangmu@gmail.com', '$2y$10$5Y9c5Rzz.ysRkVeH1av2FO7hwBuK.4oINe6arzxVuk2FR7Oyqhtwy', '$2y$10$AYlamnApvCAk70X4VbL/QeCb6pVejnOi3quef1T2rw1NuroB8aJui', 'Information Technology', 2076, '2023-04-29 04:19:50'),
(24, 'Shahil Shyangbo', 'shahil@gmail.com', '$2y$10$yslZoWlZxs5gtt3VUB0pUer004KT0.LE15MYiseCDUITEVenV.nJS', '$2y$10$YGYAW44XTNE3wdYVAWaDbuU3rpV.buXZmJzTZdQkcl33JnKMKqh8O', 'Information Technology', 2076, '2023-04-29 04:19:50'),
(25, 'Raj Shrestha', 'raj@gmail.com', '$2y$10$uqn1Yuwxt2QRx.YC0MG3/.IBzluexSxdO63YSONh6xuOrQ46CumWe', '$2y$10$dXprbNnS4692LZRFdUbslevPunhj/d1ibo8jbwd9PKVuey7KrGmpy', 'Information Technology', 2076, '2023-04-29 04:19:50'),
(26, 'Ang Doma Sherpa', 'angdoma@gmail.com', '$2y$10$QsV9v7U99mtQpewCnX4jXefw4tWL8aVuCw.AQjWoY4yCmLELVqN/6', '$2y$10$oVxkGuUcy7hOLIRFHI8RcOSuUFClFQwE68aV1oWYjTKxNwEQBTNsq', 'Information Technology', 2076, '2023-04-29 04:19:50'),
(27, 'Jhinji lhamu Sherpa', 'jhinji@gmail.com', '$2y$10$2GVTJVU9VhQ7F4NRLb0fj.GTZ/2qb8KC.6b8joz39kyAzWhFKlGGe', '$2y$10$avkp/mozhfaFAFb6.UqauOS.yv6Jw/QXeKYSm1ezhML2HQd8qZTwa', 'Information Technology', 2076, '2023-04-29 04:19:50'),
(28, 'Dolma Lama', 'dolma@gmail.com', '$2y$10$DXJxFCWU/POYk4.7/kX1bOZr2TgkYPIhn.kze.tiaVLTvMn0c55GW', '$2y$10$cTzT.aTQq2LyYzHbqkIPp.us.C1GOCI5jbMiazYQ.hD9JOuNc357K', 'Information Technology', 2076, '2023-04-29 04:19:50'),
(29, 'Milan Rai', 'milan@gmail.com', '$2y$10$yaMyaxJtaUusxIQfbDBCkuGviLPvdMXS5KBt1zt4Xpeyn.nq6oN2G', '$2y$10$zTXar2Rl0jFcAyi8vDHhJ.7JZa3pKp3txFPvvoD95n2J/DIzIXye2', 'Information Technology', 2076, '2023-04-29 04:19:50'),
(31, 'Tenzing Sherpa', 'tenzing@gmail.com', '$2y$10$zXIMo4NifZXtn3y1rJNdRu4Z2b.AXZCXb1zW7lOKB7onPstP8/AMe', '$2y$10$4WWPT9RW/CeTNt0HLtCWleu0yjSJewo0YW9J/YytLhiWXQFXj5hli', 'Information Technology', 2076, '2023-04-29 04:21:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `member2` (`member2`),
  ADD KEY `member1` (`member1`),
  ADD KEY `member3` (`member3`),
  ADD KEY `member4` (`member4`),
  ADD KEY `supervisor` (`supervisor`);

--
-- Indexes for table `project_requests`
--
ALTER TABLE `project_requests`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `member1` (`member1`),
  ADD KEY `member2` (`member2`),
  ADD KEY `member3` (`member3`),
  ADD KEY `member4` (`member4`);

--
-- Indexes for table `supervisors`
--
ALTER TABLE `supervisors`
  ADD PRIMARY KEY (`supervisor_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `assigned_to` (`assigned_to`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`team_id`),
  ADD KEY `member1` (`member1`),
  ADD KEY `member2` (`member2`),
  ADD KEY `member3` (`member3`),
  ADD KEY `member4` (`member4`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `supervisor` (`supervisor`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `project_requests`
--
ALTER TABLE `project_requests`
  MODIFY `project_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `supervisors`
--
ALTER TABLE `supervisors`
  MODIFY `supervisor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `team_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`member2`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `projects_ibfk_2` FOREIGN KEY (`member1`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `projects_ibfk_3` FOREIGN KEY (`member3`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `projects_ibfk_4` FOREIGN KEY (`member4`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `projects_ibfk_5` FOREIGN KEY (`supervisor`) REFERENCES `supervisors` (`supervisor_id`);

--
-- Constraints for table `project_requests`
--
ALTER TABLE `project_requests`
  ADD CONSTRAINT `project_requests_ibfk_1` FOREIGN KEY (`member1`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `project_requests_ibfk_2` FOREIGN KEY (`member2`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `project_requests_ibfk_3` FOREIGN KEY (`member3`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `project_requests_ibfk_4` FOREIGN KEY (`member4`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`assigned_to`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`);

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_ibfk_1` FOREIGN KEY (`member1`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `teams_ibfk_2` FOREIGN KEY (`member2`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `teams_ibfk_3` FOREIGN KEY (`member3`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `teams_ibfk_4` FOREIGN KEY (`member4`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `teams_ibfk_5` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`),
  ADD CONSTRAINT `teams_ibfk_6` FOREIGN KEY (`supervisor`) REFERENCES `supervisors` (`supervisor_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
