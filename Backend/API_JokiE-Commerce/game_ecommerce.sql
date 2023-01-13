-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 13, 2023 at 07:16 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `game_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `jenis_akun` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `email`, `pass`, `jenis_akun`) VALUES
(1, 'razirizzardi@gmail.com', '1qazxsw23edc', 'user'),
(2, 'razi@gmail.com', '1qazxsw23edcvbnm', 'user'),
(29, 'naufal@gmail.com', 'akunopalganteng', 'admin'),
(31, 'jojon@gmail.com', 'qwaszxcvdfer', 'user'),
(33, 'sumanto@gmail.com', '123456789', 'admin'),
(35, 'naufal2@gmail.com', '123456789', 'user'),
(37, 'jajang@gmail.com', '123456789', 'admin'),
(39, 'kokom@gmail.com', '123456789', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `email_akun` varchar(100) NOT NULL,
  `id_game` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_game`
--

CREATE TABLE `order_game` (
  `id` int(11) NOT NULL,
  `email_akun` varchar(50) NOT NULL,
  `id_game` int(11) NOT NULL,
  `nama_game` varchar(300) NOT NULL,
  `harga_game` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_game`
--

INSERT INTO `order_game` (`id`, `email_akun`, `id_game`, `nama_game`, `harga_game`) VALUES
(2, 'razirizzardi@gmail.com', 5, 'Raft', 200000),
(3, 'naufal2@gmail.com', 6, 'eFootball 2023', 400000);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `developer` varchar(100) NOT NULL,
  `terjual` int(11) NOT NULL,
  `file_foto` text NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `judul`, `harga`, `developer`, `terjual`, `file_foto`, `deskripsi`) VALUES
(1, 'GTA V', 300000, 'Rockstar', 293, 'https://wallpapercave.com/wp/wp5334250.jpg', 'Grand Theft Auto V for PC offers players the option to explore the award-winning world of Los Santos and Blaine County in resolutions of up to 4k and beyond, \r\nas well as the chance to experience the game running at 60 frames per second. t as a natural lead-in to additional content. \r\nThis content is a little bit longer.'),
(2, 'Valorant', 0, 'Riot', 1000, 'https://wallpapercave.com/uwp/uwp2188307.jpeg', 'VALORANT DEFY THE LIMITS FOR FREE IN VALORANT FIGHT AROUND THE WORLD Blend your style and experience on a global, \r\ncompetitive stage. Attack and defend your side using sharp gunplay and tactical abilities. And, with one life per-round, \r\nyou\'ll have to think faster than your opponent if you want to survive. CREATIVITY IS YOUR GREATEST WEAPON More than guns and bullets, you’ll choose an Agent armed with adaptive, swift, \r\nand lethal abilities that create opportunities to let your gunplay shine. Each map is purpose-built for team strategies, spectacular plays, and clutch moments. \r\nMake the plays others will imitate for years to come.\r\n'),
(3, 'Minecraft', 230000, 'Mojang', 59, 'https://wallpapercave.com/uwp/uwp1844247.jpeg', 'Explore randomly generated worlds and build amazing things from the simplest of homes to the grandest of castles. Play in creative mode with unlimited resources or mine deep into the world in survival mode, \r\ncrafting weapons and armor to fend off the dangerous mobs. \r\nScale craggy mountains, unearth elaborate caves, and mine large ore veins. Discover lush cave and dripstone cave biomes. \r\nLight up your world with candles to show what a savvy spelunker and master mountaineer you are!\r\n'),
(4, 'Dead By Daylight', 130000, 'Behavior Interactive', 100, 'https://images.wallpapersden.com/image/download/dead-by-daylight-hd-gaming-2022_bWhua26UmZqaraWkpJRnbW1lrWZqbGs.jpg', 'Dead by Daylight is a multiplayer (4vs1) horror game where one player takes on the role of the savage Killer, \r\nand the other four players play as Survivors, trying to escape the Killer and avoid being caught, tortured and killed.\r\n'),
(5, 'Raft', 200000, 'Redbeet Interactive', 389, 'https://images5.alphacoders.com/108/1085563.jpg', 'Raft throws you and your friends into an epic adventure out on the big open sea, with the objective to stay alive, \r\ngather resources and build yourself a floating home worthy of survival.\r\n'),
(6, 'eFootball 2023', 400000, 'Konami', 590, 'https://wallpapercave.com/wp/wp11424863.jpg', 'At the heart of eFootball™ is \"eFootball™ World\". Play as some of the soccer powerhouses with \"Authentic Team\", or sign and develop your favorite players to build your one and only \"Dream Team\". \r\nGo up against rivals from around the world and take part in a variety of events.\r\n'),
(7, 'NBA 2023', 100000, 'Visual Concepts', 344, 'https://images.wallpapersden.com/image/wxl-hd-nba-2k23-gaming-poster_86199.jpg', 'Rise to the occasion and realize your full potential in NBA 2K23. Prove yourself against the best players in the world and showcase your talent in MyCAREER. Pair today’s All-Stars with timeless legends in MyTEAM. \r\nBuild a dynasty of your own in MyGM or take the NBA in a new direction with MyLEAGUE. Take on NBA or WNBA teams in PLAY NOW and experience true-to-life gameplay. How will you Answer the Call?\r\n'),
(8, 'Counter-Strike: Global Offensive', 150000, 'Valve', 211, 'https://wallpapercave.com/dwp1x/wp4689102.jpg', 'Counter-Strike: Global Offensive (CS: GO) expands upon the team-based action gameplay that it pioneered when it was launched 19 years ago. \r\n\"Counter-Strike took the gaming industry by surprise when the unlikely MOD became the most played online PC action game in the world almost immediately after its release in August 1999,\" said Doug Lombardi at Valve. \r\n\"For the past 12 years, it has continued to be one of the most-played games in the world, headline competitive gaming tournaments and selling over 25 million units worldwide across the franchise. \r\nCS: GO promises to expand on CS\' award-winning gameplay and deliver it to gamers on the PC as well as the next gen consoles and the Mac.\"\r\n'),
(9, 'Phasmophobia', 199000, 'Kinetic Games', 200, 'https://wallpapercave.com/wp/wp7775348.jpg', 'Phasmophobia is a 4 player online co-op psychological horror where you and your team members of paranormal investigators will enter haunted locations filled with paranormal activity and gather as much evidence of the paranormal as you can. \r\nYou will use your ghost hunting equipment to search for and record evidence of whatever ghost is haunting the location to sell onto a ghost removal team.\r\n'),
(10, 'Tekken 7', 150000, 'Bandai Namco', 100, 'https://wallpapercave.com/wp/wp2568148.jpg', 'Discover the epic conclusion of the Mishima clan and unravel the reasons behind each step of their ceaseless fight. Powered by Unreal Engine 4, TEKKEN 7 features stunning story-driven cinematic battles and intense duels that can be enjoyed with friends and rivals alike through innovative fight mechanics.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_game`
--
ALTER TABLE `order_game`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `order_game`
--
ALTER TABLE `order_game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
