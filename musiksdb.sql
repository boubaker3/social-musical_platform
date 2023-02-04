-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2023 at 05:29 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `musiksdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint(20) NOT NULL,
  `userid` bigint(20) NOT NULL,
  `favorites` text NOT NULL,
  `recent` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) NOT NULL,
  `type` varchar(10) NOT NULL,
  `contentid` bigint(20) NOT NULL,
  `likes` text NOT NULL,
  `following` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `type`, `contentid`, `likes`, `following`) VALUES
(1, 'profile', 267169889039789, '[]', '[{\"userid\":\"5684063333813932\",\"date\":\"02:04\"},{\"userid\":\"37626170692683127\",\"date\":\"02:04\"}]'),
(2, 'profile', 5684063333813932, '[{\"userid\":\"267169889039789\",\"date\":\"02:04\"}]', '[]'),
(3, 'profile', 37626170692683127, '[{\"userid\":\"267169889039789\",\"date\":\"02:04\"}]', '[]');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) NOT NULL,
  `idReceiver` bigint(20) NOT NULL,
  `notifications` text NOT NULL,
  `type` varchar(10) NOT NULL,
  `seen` tinyint(4) NOT NULL DEFAULT 0,
  `notificationPost` bigint(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `idReceiver`, `notifications`, `type`, `seen`, `notificationPost`, `date`) VALUES
(1, 5684063333813932, '267169889039789', 'profile', 0, 0, '2023-02-04 17:05:30');

-- --------------------------------------------------------

--
-- Table structure for table `postlikes`
--

CREATE TABLE `postlikes` (
  `id` bigint(20) NOT NULL,
  `likedPost` bigint(20) NOT NULL,
  `likes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(19) NOT NULL,
  `postId` bigint(19) NOT NULL,
  `title` varchar(100) NOT NULL,
  `album` varchar(100) NOT NULL,
  `artist` varchar(100) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `cover` varchar(1000) NOT NULL,
  `song` varchar(1000) NOT NULL,
  `description` text NOT NULL,
  `likes` int(11) NOT NULL,
  `comments` varchar(500) NOT NULL,
  `userid` bigint(20) NOT NULL,
  `postDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(19) NOT NULL,
  `userid` bigint(19) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `url_adress` varchar(100) NOT NULL,
  `photo_profile` varchar(1000) NOT NULL,
  `followers` bigint(20) NOT NULL,
  `following` bigint(20) NOT NULL,
  `postsNumber` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userid`, `email`, `username`, `password`, `date`, `url_adress`, `photo_profile`, `followers`, `following`, `postsNumber`) VALUES
(70, 2241699405650, 'smoozi.ch@gmail.com', 'Benjamin10', 'ach.2003', '2023-02-03 19:44:12', 'boubaker03 .user', 'uploads/coolman.jpg', 27, 61, 4),
(71, 326938649853, 'boubakerachkhbar1@gmail.com', 'boubaker', 'ach.2003', '2022-05-28 15:40:30', 'boubaker.user', 'uploads/3aa432f1badf44b95cdd228bcb38643a.jpg', 9, 1, 0),
(72, 8645251460, 'jack@gmail.com', 'jack22', 'jack10', '2022-05-28 15:34:38', 'jack10.user', 'uploads/08c0409a326163f85b8e89cbf276ae4b.jpg', 3, 12, 3),
(73, 16069340652056, 'amanda@gmail.com', 'amanda', 'amanda', '2022-06-04 13:52:11', 'amanda.user', 'uploads/45d4916ce0d8499d400fee3ede24bd33.jpg', 2, 0, 2),
(74, 5833922370541946, 'jason@gmail.com', 'jason', 'jason', '2022-06-04 13:53:26', 'jason.user', 'uploads/524b5e39ff6beefe80ab0a94b482074b.jpg', 5, 0, 1),
(75, 9493181697061974, 'oldman@gmail.com', 'oldman', 'oldman', '2022-06-04 13:39:33', 'oldman.user', 'uploads/833c466ae45c012521ae4555d7bbc40e.jpg', 9, 361, 5),
(76, 219645599, 'fred@gmail.com', 'fred', 'fred', '2022-06-04 13:49:47', 'fred.user', 'uploads/940aea125e43553742b8239bc606f18f.jpg', 8, 0, 1),
(77, 22072, 'micheal@gmail.com', 'micheal', 'micheal', '2022-05-28 15:43:04', 'micheal.user', 'uploads/524b5e39ff6beefe80ab0a94b482074b.jpg', 5, 0, 0),
(78, 2129384982299, 'brad@gmail.com', 'brad', 'brad', '2022-06-26 14:27:21', 'brad@gmail.com.user', 'uploads/2158f17bec3a9ebdf1c9c4a3bc3f6edb.jpg', 6, 10, 1),
(79, 66424718991112, 'burger@gmail.com', 'burger', 'burger', '2023-02-04 14:47:05', 'burger.user', 'uploads/08c0409a326163f85b8e89cbf276ae4b.jpg', 9, 0, 0),
(80, 414080738625, 'mike@gmail.com', 'mike', 'mike', '2022-06-04 13:54:06', 'mike.user', 'uploads/833c466ae45c012521ae4555d7bbc40e.jpg', 7, 0, 0),
(82, 6250390, 'james@gmail.com', 'james', 'james', '2022-06-04 13:54:06', 'james.user', 'uploads/08c0409a326163f85b8e89cbf276ae4b.jpg', 11, 1, 0),
(83, 715683649126257, 'fernando@gmail.com', 'fernando', 'fernando', '2022-06-04 13:54:02', 'fernando.user', 'uploads/08c0409a326163f85b8e89cbf276ae4b.jpg', 22, 0, 0),
(84, 3884414139324227, 'micheal@gmail.com', 'micheal', 'micheal', '2022-06-04 15:13:59', 'jessica.user', 'uploads/3aa432f1badf44b95cdd228bcb38643a.jpg', 58, 4, 0),
(85, 18864, 'louis@gmail.com', 'louis', 'louis', '2023-02-03 20:12:00', 'louis.user', 'uploads/3aa432f1badf44b95cdd228bcb38643a.jpg', 124, 45, 0),
(86, 2068, 'thor@gmail.com', 'thor', 'thor', '2022-06-04 15:13:56', 'thor.user', 'uploads/0cb6b60e859da9dfa68a82d4df19c6bc.jpg', 216, 24, 0),
(89, 37626170692683127, 'boubaker@gmail.com', 'boubaker22', 'boubaker22', '2023-02-04 16:05:49', 'boubaker22.user', 'uploads/coolman.jpg', 3, 3, 1),
(94, 5684063333813932, 'boubaker@gmail.com', 'boubaker', '$2y$10$.k21Z5Ng0TNd4VmmLw37O.NLQIYVBE9V5uA5ypHjhfenlj0pZh5Pm', '2023-02-04 16:05:30', 'boubaker.user', 'null', 1, 0, 0),
(95, 267169889039789, 'ben@gmail.com', 'ben', '$2y$10$pSFzNBXJPF49dOwOgSCrM.gdkKcOrbaGIiojwUmA8CJfH0rA/M41.', '2023-02-04 16:05:49', 'ben.user', 'uploads/833c466ae45c012521ae4555d7bbc40e.jpg', 0, 4, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`),
  ADD KEY `contentid` (`contentid`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postlikes`
--
ALTER TABLE `postlikes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `title` (`title`),
  ADD KEY `album` (`album`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `url_adress` (`url_adress`),
  ADD KEY `date` (`date`),
  ADD KEY `username` (`username`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `postlikes`
--
ALTER TABLE `postlikes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(19) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
