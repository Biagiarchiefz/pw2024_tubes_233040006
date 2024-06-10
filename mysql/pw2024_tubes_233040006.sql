-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 09, 2024 at 08:49 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pw2024_tubes_233040006`
--

-- --------------------------------------------------------

--
-- Table structure for table `music`
--

CREATE TABLE `music` (
  `music_id` int NOT NULL,
  `judul_lagu` varchar(255) NOT NULL,
  `artis` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `album_img` varchar(255) NOT NULL,
  `file_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `music`
--

INSERT INTO `music` (`music_id`, `judul_lagu`, `artis`, `genre`, `album_img`, `file_link`) VALUES
(1, 'bertaut', 'nadin ', 'pop', 'nadin.jpg', 'kehapus'),
(4, 'sempurnaa', 'coldplay', 'pop', '1.jpeg', 'hilang'),
(35, 'semoga', 'tulus banget', 'pop', 'biru2.jpg', 'hilang'),
(36, 'aku', 'dual ipa', 'pop', '66606a4935082.jpeg', 'sasasadadfdv'),
(73, 'cincin', 'baskara hindia', 'pop', '6665bc044d349.jpeg', 'kehapus'),
(74, 'beranjak dewasa', 'nadin amizah', 'pop', '6665bd4c38b1c.jpg', 'sasasas'),
(75, 'secukupnya', 'baskara hindia', 'pop', '6665bdac2be70.jpeg', 'sasasas'),
(76, 'upin dan ipin', 'tok dalang', 'pop', '6665bf0f6d2e1.jpg', 'adadsds'),
(77, 'aduhai', 'raza arap', 'rock', '6665bf8e8f5bc.jpg', 'qwert'),
(78, 'cantik', 'banners', 'pop', '6665bfdd5b273.jpeg', 'asdfg'),
(79, 'idgaf', 'dua lipa', 'rock', '6665c01e58390.jpeg', 'qwertyu'),
(80, 'nyaman', 'andmesh', 'pop', '6665c054b448b.jpg', 'aasdfczx'),
(81, 'we are young', 'harris.j', 'pop', '6665c07b2f279.jpg', 'hilang'),
(82, 'my hero', 'harris.j', 'pop', '6665c13976956.jpg', 'hilang'),
(83, 'saat bahagia', 'ungu, andien', 'adventur', '6665c16ac268b.jpg', 'ascxcxc'),
(84, 'superhero', 'coldplay', 'rock', '6665c1c0082bb.jpg', 'qwqwes'),
(85, 'take me home', 'jons sena', 'romantis', '6665c1e6896e7.jpg', 'asaxzx'),
(86, 'galang rambu anarki', 'iwan fals', 'pop', '6665c2107c23e.jpeg', 'ddsdss'),
(87, 'i don care ', 'en sheeran', 'pop', '6665c2a93eb3d.jpg', 'qwqwqwqes'),
(88, 'dancing in my room', 'justin bieber', 'pop', '6665c90acccdb.jpeg', 'ddsd');

-- --------------------------------------------------------

--
-- Table structure for table `podcast`
--

CREATE TABLE `podcast` (
  `id_podcast` int NOT NULL,
  `judul_podcast` varchar(255) NOT NULL,
  `artis` varchar(100) NOT NULL,
  `album` varchar(255) NOT NULL,
  `file_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `podcast`
--

INSERT INTO `podcast` (`id_podcast`, `judul_podcast`, `artis`, `album`, `file_link`) VALUES
(1, 'pagi hari', 'jonatan', 'pod1.png', 'hilang'),
(2, 'siang hari', 'reza arap', 'pod2.png', 'sql'),
(6, 'malam', 'ijat dan kawan', '6662a5de87e25.jpg', 'dsdsd'),
(8, 'bago', 'atok dan angkel mutu', 'gojo.jpeg', 'asasa'),
(18, 'opet', 'raju', '66641a9e53f72.jpg', 'scscsc'),
(19, 'ngobrol santai', 'dedy bapak esan', 'biru2.jpg', 'cscsc'),
(21, 'vindes', 'visent dan desta', '6665c7b2eb8bc.jpg', 'asaddss'),
(22, 'santai bareng saitama', 'saitama', '6665c9a1817d4.jpeg', 'xsxs'),
(23, 'ngbrol bareng bg gojo', 'gojo satoru', '6665cb1444662.jpeg', 'sasa'),
(24, 'berbiru', 'angry bird biru', '6665cc21d3eac.jpg', 'asaxzx'),
(25, 'merah merona', 'burung biru', '6665cc548b3c4.jpg', 'aazxzc'),
(26, 'si hitam ireng', 'ireng', '6665cc86849e7.jpg', 'zxzxz'),
(27, 'babi ijo', 'cabe ijo', '6665cca903d5c.jpg', 'saxzxz');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int NOT NULL,
  `nama_role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nama_role`) VALUES
(0, 'user'),
(1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_role` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `gambar`, `username`, `email`, `password`, `id_role`) VALUES
(8, 'default.png', 'admin', 'admin@gmail.com', '$2y$10$I1LD2tMXcmry8hb6bwLdc.de4yGm/dENoUxI0tIy4nAX.1gphvOsS', 1),
(29, 'default.png', 'biagi', 'biagi@gmail.com', '$2y$10$hkhTVP8zMRNg0MD7uOMb/ejGdG95xSNknksOK1e9q9U1PgtT0l6rO', 0),
(30, 'default.png', 'kalid', 'alid@gmailcom', '$2y$10$s5g1OhX8dRzFKcAWPa5d6ex3uk2pjusWcfCPzdxOdvr5eG1cijeb2', 0),
(31, 'default.png', 'loli', 'loli@gmail.com', '$2y$10$C0CbqvjIPtajSZG/gD7.F.rBzMSzR/rEMariSs0EuDEfBmqKUSkk.', 0),
(32, 'default.png', 'fajar', 'ajar@gmail.co', '$2y$10$wF4XcMwYRKepYgPdv.VwpO9PxaVG9WeVH.5MpYrUmJY2U.2vYFwcm', 0),
(33, 'default.png', 'rudi', 'udi@gmail.com', '$2y$10$KIKXoCKLeLv/z40dQkgpiOJx/SywF1DO2i8YeNmOXMj238ok2lfWC', 0),
(34, 'default.png', 'teman', 't@gmail.com', '$2y$10$wjbAu6xMdHOR/iKdHQCyOeA7h01U3gXFgl5DoyT7Wl.gIynTorT/K', 0),
(35, 'default.png', 'mudi', 'm@gmail.com', '$2y$10$4k/Wtt4yDxT8PhimJIMRn.4g0B9YPDULjCbK65ve1BaT8Q2tV0VVy', 0),
(36, 'default.png', 'biagi2', 'b2@gm', '$2y$10$k6z5ohgRg455z1Bw/BBnluXTXnLkS6Aug/LCob8JJfXFYhUpQBi8a', 0),
(37, 'default.png', 'biagi10', 'b10@gmail.com', '$2y$10$Ii2d3.LY07CT8qAnW/0VBOxKbcjqWydq.L/Fo.KSw6Tb0Kq1P4Gnm', 0),
(38, 'default.png', 'riki', 'rik@gmail.com', '$2y$10$RZ.2ItSm3GzMQjjQQ67eFOj4iNYA7GKz8vdVUd4PnEg30vboweWCO', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`music_id`);

--
-- Indexes for table `podcast`
--
ALTER TABLE `podcast`
  ADD PRIMARY KEY (`id_podcast`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `music`
--
ALTER TABLE `music`
  MODIFY `music_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `podcast`
--
ALTER TABLE `podcast`
  MODIFY `id_podcast` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
