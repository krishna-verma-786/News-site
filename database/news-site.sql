-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jan 06, 2023 at 02:59 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news-site`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `post` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `post`) VALUES
(30, 'sports', 2),
(31, 'crypto', 4),
(34, 'politics', 1),
(33, 'Entertainment', 2),
(35, 'LifeStyle', 2);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `post_date` varchar(50) NOT NULL,
  `author` int(11) NOT NULL,
  `post_img` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES
(37, 'testing', 'lfkjelwf', '31', '09 Sep, 2022', 38, 'pic.jpg'),
(40, 'dog found', 'Missing Dog Help Find out what to do if your dog goes missing and the best ways to get help. How Microchips Work Learn more about microchips and how they can help prevent heartbreak. Lost And Found Dogs How to Catch a Lost or Stray Dog by Petfinder Running after a loose dog or cat is not the best way to catch an escaped pet!', '33', '09 Sep, 2022', 39, 'nick-fewings-QkOH3IaQzaw-unsplash.jpg'),
(42, 'BTC', 'The live Bitcoin price today is $18,999.08 USD with a 24-hour trading volume of $24,191,692,449 USD. We update our BTC to USD price in real-time. Bitcoin is down 0.78% in the last 24 hours. The current CoinMarketCap ranking is #1, with a live market cap of $364,021,262,101 USD. It has a circulating supply of 19,159,937 BTC coins and a max. supply of 21,000,000 BTC coins.', '31', '20 Sep, 2022', 38, 'BTC.jpg'),
(43, 'ETH price increased', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In molestiae expedita cum? Debitis, officia fugiat quibusdam voluptatem unde eius neque iste nihil suscipit in inventore eligendi ducimus! Accusamus optio, voluptate iure omnis quidem necessitatibus laboriosam nobis impedit ad eligendi iusto hic dolorum ipsa sint, quibusdam harum ipsum soluta itaque enim recusandae neque cumque ab fuga. Sint suscipit dolorem ex. Unde ut maxime alias non ex facere doloremque autem odio ducimus quae, perspiciatis est? Tenetur asperiores aperiam iure eaque vel? Eius sint repudiandae nisi velit, dolorum placeat accusamus ullam natus corporis optio vel. Doloribus possimus assumenda ullam nesciunt ab aliquid illo vero similique? Quis nisi necessitatibus veritatis soluta eligendi quibusdam, dolores pariatur libero at? Eveniet eum nisi ratione dolorum debitis fuga, hic blanditiis voluptatum quis laboriosam modi vel, aliquam quam veniam a enim? Voluptatibus quaerat optio nemo iusto doloribus quisquam amet, reprehenderit repudiandae doloremque natus atque, vitae dolorem. Facilis nisi modi laborum, qui ipsum asperiores sit.x', '31', '21 Sep, 2022', 38, 'ETH.jpg'),
(44, 'SHIB INU ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In molestiae expedita cum? Debitis, officia fugiat quibusdam voluptatem unde eius neque iste nihil suscipit in inventore eligendi ducimus! Accusamus optio, voluptate iure omnis quidem necessitatibus laboriosam nobis impedit ad eligendi iusto hic dolorum ipsa sint, quibusdam harum ipsum soluta itaque enim recusandae neque cumque ab fuga. Sint suscipit dolorem ex. Unde ut maxime alias non ex facere doloremque autem odio ducimus quae, perspiciatis est? Tenetur asperiores aperiam iure eaque vel? Eius sint repudiandae nisi velit, dolorum placeat accusamus ullam natus corporis optio vel. Doloribus possimus assumenda ullam nesciunt ab aliquid illo vero similique? Quis nisi necessitatibus veritatis soluta eligendi quibusdam, dolores pariatur libero at? Eveniet eum nisi ratione dolorum debitis fuga, hic blanditiis voluptatum quis laboriosam modi vel, aliquam quam veniam a enim? Voluptatibus quaerat optio nemo iusto doloribus quisquam amet, reprehenderit repudiandae doloremque natus atque, vitae dolorem. Facilis nisi modi laborum, qui ipsum asperiores sit.x', '31', '21 Sep, 2022', 38, 'Elon_Musk_2015.jpg'),
(45, 'DHoni would play IPL or NOT?', 'Mahendra Singh Dhoni (/m??he?ndr? ?s?? dhæ?n?/ (listen); born 7 July 1981) is an Indian former professional cricketer who was captain of the Indian national cricket team in limited-overs formats from 2007 to 2017 and in Test cricket from 2008 to 2014. He is a right handed wicket-keeper batsman.[3] He led the team to three ICC trophies including the 2007 ICC World Twenty20, 2011 ICC Cricket World Cup and 2013 ICC Champions Trophy. Under his captaincy, India won the ACC Asia Cup two times, in 2010 and 2016. India also won ICC Test Championship Mace two times in 2010, 2011 and ICC ODI Shield for one time in 2013 under his leadership. He is considered as one of the greatest Captains and Wicket Keeper-Batsmen of all time.[4] Throughout his 15 year long international career, Dhoni has won several awards and accolades.[5]\r\n\r\nIn Indian domestic cricket he played for Bihar and Jharkhand Cricket team. He is the captain of Chennai Super Kings (CSK) in the Indian Premier League. He captained the side to championships in the 2010, 2011, 2018 and 2021 editions of IPL league. Also under his captaincy Chennai Super Kings (CSK) Won Champions League T20 two times, in 2010 and 2014.', '30', '25 Sep, 2022', 39, 'dHONI.jpg'),
(46, 'New Zealand v Australia: international football friendly – live', 'Wonder what Arnold will take from those two matches. From two entirely different line-ups, he must decide which 26 players he takes to Qatar 2022.\r\n\r\nCaptain Mat Leckie is speaking with Network 10.\r\n\r\n“Overall the playing group is a very inexperienced team in terms of caps,” he says. “But you see how much energy these young boys have, and we need them to perform at this level because they’re the type of players that are going to be the future for us.\r\n\r\n“I’m sure he [Arnold] has got a lot of thinking to do over the next couple of months. I think this camp’s been great. A lot of new boys. And they’ve been very professional and showed that they want to be here.”', '30', '25 Sep, 2022', 39, 'football.jpg'),
(47, 'Missing Child', 'Number of missing children in the USA and Canada – According to the FBI Missing Children Reports, there are currently 87,438 active cases in the USA, as of December of 2019. The missing children are juveniles under the age of 18, which account for 30,618 (35%) of cases. In Canada, there is an estimate of 45,288 missing children every year.', '33', '25 Sep, 2022', 39, 'missing child.jpg'),
(48, 'A Letter from Jodhpur (Rajasthan) | ‘Even if he steps down, he will decide what changes’: On Gehlot’', '\r\nAmong some Congress workers in Jodhpur, there seems to be a consensus, or perhaps wishful thinking, that while it is confirmed that Ashok Gehlot will contest the Congress presidential elections and even go on to win it, he may still have a few cards up his sleeve --—and retain the Chief Minister post. At best, he will ensure that it is handed over to a \"like-minded\" person, which means someone other than his former deputy Sachin Pilot.', '34', '25 Sep, 2022', 40, 'polictics.jpg'),
(49, 'High Court rules Johnny Depp is a wife-beater over claims he hit Amber Heard 14 times during their t', 'lorem impusm', '35', '25 Sep, 2022', 40, 'entertainment.png'),
(50, '5 Spooky Roads In India, Not For The Faint-Hearted', 'itting the road to drive a long distance and exploring new places is exhilarating. Taking the car out with windows rolled down and enjoying the beautiful landscape en route gives you the chance to know a place better. While many roads are known for their curves and the scenic beauty it offers, other roads are infamous for their eeriness and spooky stories that travellers claimed to have experienced. However, if you are adventurous, here’s a list of some of the roads that are (in)famous for their haunting stories-', '35', '25 Sep, 2022', 40, 'post-format.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `website_name` varchar(50) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `footerDesc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`website_name`, `logo`, `footerDesc`) VALUES
('Rajveer.V', 'news.jpg', '© Copyright 2019 News | Powered by <a href=\"https://www.yahoobaba.com\">Rajveer Verma</a>');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `role`) VALUES
(40, 'Zorawar', 'Singh', 'ZorawarSingh', 'e9128fe9a54555d2d9434ecb4386f3f03a5e2914', 0),
(38, 'krishna', 'verma', 'kriss7999', 'e9128fe9a54555d2d9434ecb4386f3f03a5e2914', 1),
(39, 'karan', 'verma', 'karan7999', '0525cc8797addc4b02005c68e300587f8b90f8c5', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
