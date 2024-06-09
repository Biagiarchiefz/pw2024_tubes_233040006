-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 09, 2024 at 10:24 AM
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
(4, 'sempurna', 'coldplay', 'pop', '1.jpeg', 'hilang'),
(5, 'upin dan ipin', 'atok rajo dalang', 'rock', '2.jpeg', 'asasasa'),
(28, 'upin dan ipinn', 'riki ahmad', 'pop', '665e7e7b0c4ea.jpg', 'hilang'),
(34, 'evaluasi', 'hindia', 'pop', '666069f452bcb.jpeg', 'hilang'),
(35, 'semoga', 'tulus', 'pop', '66606a25521e1.jpeg', 'hisasas'),
(36, 'aku', 'dual ipa', 'pop', '66606a4935082.jpeg', 'sasasadadfdv'),
(37, 'semoga', 'adii', 'pop', '666148e47263f.jpg', 'aadsdsdfdfcvcv'),
(38, 'dan', 'asads', 'pop', '666149db4c50c.jpeg', 'asaddcjdncjdnfvfv'),
(39, 'dwjdwdw', 'sdsds', 'sdscdwk', '666149f9672e6.jpeg', 'sdsdsd'),
(40, 'wdwd', 'wdwds', 'scscs', '66614a0fe8dcc.jpg', 'cxcxc'),
(56, 'asep', 'sadada', 'adadad', '6662acf9a9e30.jpg', 'adadad'),
(57, 'wddw', 'dwdwdwd', 'wdwdwd', '6662ad0ab9650.jpg', 'wdwdw'),
(58, 'dwdwd', 'wdwddw', 'dwdwdwd', '6662ad18b8059.jpg', 'wdwdwdwd'),
(59, 'wdwdwd', 'wdwdwd', 'wdwdwdfdfd', '6662ad883f5fb.jpg', 'fdfdf'),
(60, 'wdwdwd', 'dsdsd', 'cscsc', '6662ad97176e4.jpg', 'cscscc'),
(61, 'Biagi', 'wdwdsx', 'cvbvbb', '6662add37be4c.jpg', 'cbcbb'),
(62, 'bertai', 'nadin', 'pop', '6663274b7e595.jpg', 'aadad'),
(63, 'dsdsd', 'scscsc', 'scscsc', '66644c2122253.jpg', 'czczc'),
(64, 'erywyw', 'xxcxc', 'xcxc', '666539c629f3a.jpg', 'cxcxc'),
(65, 'oadadj', 'dfdvdvdvcx', 'vcvc', '666539e408046.jpg', 'xcxvxv'),
(66, 'wdwdwd', 'axada', 'aadad', '66653a3363b50.jpg', 'axa'),
(67, 'dwdwd', 'wsxcz', 'zczcz', '66653a4793a50.jpg', 'zzczdw');

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
(6, 'dsds', 'dsdsds', '6662a5de87e25.jpg', 'dsdsd'),
(7, 'podbaru', 'kemal', '6662a60c7abac.jpg', 'hilang'),
(8, 'asasas', 'asasas', '6662a6d95e52f.jpg', 'asasa'),
(9, 'pod2', 'aasas', '6662aea0d039d.jpg', 'asasa'),
(12, 'pod', 'qqdqd', '66632379c761d.jpg', 'qsqsq'),
(13, 'dwdwd', 'aaasasa', '6663238955c40.jpg', 'xaxax'),
(14, 'pod11', 'ada', '66641a44d3818.jpg', 'adada'),
(15, 'dadad', 'adada', '66641a53e392a.jpg', 'dadada'),
(16, 'dwdwd', 'qdwdwd', '66641a6398c82.jpg', 'wdwdw'),
(17, 'asas', 'sasasa', '66641a744151a.jpg', 'asas'),
(18, 'scsc', 'scscscsc', '66641a9e53f72.jpg', 'scscsc'),
(19, 'cscsc', 'scscscs', '66641aad60fd3.jpg', 'cscsc');

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
(36, 'default.png', 'biagi2', 'b2@gm', '$2y$10$k6z5ohgRg455z1Bw/BBnluXTXnLkS6Aug/LCob8JJfXFYhUpQBi8a', 0);

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
  MODIFY `music_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `podcast`
--
ALTER TABLE `podcast`
  MODIFY `id_podcast` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

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
