-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2018 at 09:19 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evanmorr_mementodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_event`
--

CREATE TABLE `tbl_event` (
  `ID` int(11) NOT NULL,
  `Event_Name` varchar(100) NOT NULL,
  `Event_Description` varchar(700) NOT NULL,
  `Event_MinUser` int(11) NOT NULL,
  `Event_MaxUser` int(11) NOT NULL,
  `Event_PricePP` double NOT NULL COMMENT 'Price per person',
  `Event_ImgLocation` varchar(50) NOT NULL,
  `Event_URL` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_event`
--

INSERT INTO `tbl_event` (`ID`, `Event_Name`, `Event_Description`, `Event_MinUser`, `Event_MaxUser`, `Event_PricePP`, `Event_ImgLocation`, `Event_URL`) VALUES
(1, 'Drive to Victoria!', 'Spend the day in our province\'s capital and visit the parliament building while frolicking in the picturesque waterfront views.', 4, 5, 30, 'img/eventimgs/1ferry.jpg', 'https://www.leg.bc.ca/learn-about-us/visiting-the-legislature'),
(2, 'Stargazing at Cypress Bowl', 'Requires a car! Drive up to cypress bowl with your friends on a clear night, and enjoy the view!!!', 1, 99, 3, 'img/eventimgs/6stargaze.jpg', 'http://rasc-vancouver.com/observing/observing-sites/cypress-mountain/'),
(3, 'Bike Rental at Spokes', 'Rent a bike for 2 hours and bike around Vancouver\'s Sea Wall or around the Science World area!', 1, 99, 20, 'img/eventimgs/2bikerental.jpg', 'http://www.spokesbicyclerentals.com/rates'),
(4, 'Dinner at Forage Restaurant', 'Enjoy a 3 course meal with a wine tasting from Forage, a restaurant which features only locally sourced, fresh, sustainable ingredients! Alcohol not included in price.', 2, 8, 110, 'img/eventimgs/3foragemeal.jpg', 'http://www.foragevancouver.com/assets/events/forage-family-dinner-flatsheet.pdf'),
(5, 'Dinner at Gotham\'s Steak House', 'Dine at the prestigious Gotham\'s Steak House, known to locals as the best place in Vancouver for their sustainable sourced, premium beef.', 2, 8, 150, 'img/eventimgs/4gothammeal.jpg', 'http://www.gothamsteakhouse.com/'),
(6, 'Zipline Adventure in Whistler - Mammoth Package', 'Take a trip to Whistler and enjoy Ziptrek\'s 10 line Mammoth course, guaranteed to have you grinning from ear to ear!', 2, 4, 260, 'img/eventimgs/5zipline.jpg', 'https://whistler.ziptrek.com/tours/mammoth/'),
(7, 'Visit Science World', 'Explore fun and quirky facts, solve puzzles with your friends and family, and learn about issues in Metro Vancouver! Fun for the whole family! Price includes one ticket to the Omnimax theatre.', 1, 99, 35, 'img/eventimgs/7scienceworld.jpg', 'https://www.scienceworld.ca/hoursrates'),
(8, 'Try Dragon Boating', 'Join one of the many intro to dragon boating courses offered by False Creek community centre. Race through False Creek, enjoying scenes of the mountains, the city, and local attractions such as Granville Island and Science World.', 1, 20, 30, 'img/eventimgs/8dragonboat.jpg', 'http://dragonzone.ca/paddle/'),
(9, 'Cat Cafe!!!', 'A great date place, or a hangout with friends! Come check out this cat cafe in the International Village mall, and enjoy some cappuccinos and cats while you\'re there!', 2, 6, 20, 'img/eventimgs/9catcafe.jpg', 'http://www.catfe.ca/'),
(10, 'Vancouver Aquarium', 'Get up to something fishy at the Vancouver Aquarium. Get lost in the doe eyed sea otters as they frolic and play. Imitate the penguins as they waddle around. Learn about the ecological issues facing our aquatic friends!', 1, 99, 45, 'img/eventimgs/10aquarium.jpg', 'http://www.vanaqua.org/visit/tickets'),
(11, 'Full Day Guided Kayaking Tour', 'Venture for the day to visit some of Vancouver\'s surrounding scenic paddling highlights. All locations are hand-picked by Ecomarine for their scenery and beginner friendliness. We supply the kayaks, safety gear and driving directions. All you have to do is bring lunch! The daytrip locations are subject to change and are weather dependent.', 2, 50, 140, 'img/eventimgs/11kayakdaytrips.jpg', 'https://www.ecomarine.com/tours/daytrip/'),
(12, 'Zipline Adventure in Whistler - Bear & Sasquatch Package', 'uests will be met by their tour guides and fitted with their harnesses and helmets before taking a complimentary shuttle from Whistler Village to our base on Blackcomb Mountain. Guests will zipline between the two mountains directly over the river. \r\n\r\n', 2, 30, 210, 'img/eventimgs/12bearpackage.jpg', 'https://whistler.ziptrek.com/tours/bear/'),
(13, 'Picnic at the Park', 'Grab a blanket, frisbee/football/cards, grab some snacks from the fridge/grocery store and head down to the beach or one of Vancouver\'s many parks for a picnic! ', 1, 99, 10, 'img/eventimgs/13beachpicnic.jpg', ''),
(14, 'Get the best fried chicken in Metro Vancouver and Picnic across the Street!', 'Constantly nominated best fried chicken place, they are the epitome of family business success. Not only are they the best fried chicken joint in town, they also only use non-hormone fed chicken. ', 1, 6, 15, '	\r\nimg/eventimgs/14lachicken.jpg', 'https://foodgressing.com/la-chicken-richmond-fried-chicken/'),
(15, 'Settler\'s of Catan', 'Play one of the best family board games on the market. Ages 16 and up.', 3, 4, 20, '	\r\nimg/eventimgs/15settlers.jpg', 'https://www.catan.com/'),
(16, 'Spend a night at the Sparking Hills resort in Kelowna', 'Eat farm to table foods, relax in comfort at one of the finest hotels in Canada, and enjoy amazing spa treatments while absorbing picturesque Canadian landscapes.', 1, 99, 550, '	\r\nimg/eventimgs/16crystalhills.jpg', 'https://www.sparklinghill.com/'),
(17, 'Snowshoe at Mt Seymour', 'Enjoy the crunch of some of the finest powders Canad has to offer as you enjoy panoramic views of Metro Vancouver. Don\'t forget to take selfies! Price includes showshoe rentals.', 1, 99, 20, '	\r\nimg/eventimgs/17snowshoe.jpg', 'http://mtseymour.ca/snowshoe-rates'),
(18, 'Enjoy a big group event for practically nothing; play Werewolf!', 'Werewolf is an interactive card game where you get to practice your skills of deception and acting! A party game for devious people...', 7, 14, 2, '	\r\nimg/eventimgs/18werewolf.jpg', 'https://www.playwerewolf.co/products/werewolf-deck'),
(19, 'Nothing beats home cooking!', 'Spend the night in and try making a new dish! Our recommendations include: Chinese dumplings, perogies, hummus, raviolli, sushi, spring rolls and Jamaican patties!', 2, 6, 15, '	\r\nimg/eventimgs/19cooking.jpg', 'http://www.foodnetwork.ca/everyday-cooking/recipes/'),
(20, 'Board games and drinks at Storm Crow', 'Find a new board game or play one of the classics with friends over drinks!', 2, 15, 15, 'img/eventimgs/20StormCrow.jpg', 'https://www.stormcrowtavern.com/');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_group`
--

CREATE TABLE `tbl_group` (
  `ID` int(11) NOT NULL,
  `Group_Name` varchar(100) NOT NULL,
  `Group_Description` varchar(50) NOT NULL,
  `Group_Password` varchar(50) NOT NULL,
  `Group_Size` int(11) NOT NULL,
  `Event_Name` varchar(100) DEFAULT NULL,
  `DateTime_Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_group`
--

INSERT INTO `tbl_group` (`ID`, `Group_Name`, `Group_Description`, `Group_Password`, `Group_Size`, `Event_Name`, `DateTime_Created`) VALUES
(1, 'grouptest', 'this is a description', 'password', 6, NULL, '2018-05-06 22:19:42'),
(2, 'grouptest2', 'this is a description', 'password', 6, NULL, '2018-05-06 22:19:42'),
(3, 'Moms Birthday', 'Moms Birthday', '123123123', 4, NULL, '2018-05-06 22:19:42'),
(4, 'newsitenewtestgrp', 'this is a new test group', 'password8', 1, NULL, '2018-05-06 22:31:15'),
(5, 'Hash Test', 'this is a hash test', '$1$LbxvqK4I$YI5hW.GWJrYfXbM.xGtNt/', 12, NULL, '2018-05-07 02:29:04'),
(7, 'newtest', 'password1', '$1$nQiNAAwa$yfdpozFACwRRCjQlEc9PE.', 3, NULL, '2018-05-09 02:06:03'),
(8, 'newtest2', 'password1 test', '$1$UX9Qs57j$Idd6PpBzxJ.v0wje7Ed.U/', 3, NULL, '2018-05-09 02:07:04'),
(9, 'SamsGroup', 'Sams Group is the best', '$1$TAon48Nv$PXbKHL6Fol6ztN.jR2it41', 8, NULL, '2018-05-09 03:29:00'),
(12, 'Newtest2Group', 'Grp description password1', '$1$KxSibW.y$WSGZy/CgSxyduEYqDTTfl1', 2, NULL, '2018-05-10 00:03:52'),
(11, 'Balloon', 'this group is all about balloons', '$1$J/Y.Sg3C$u8lturd9xYYpqrrBKmUD9.', 24, NULL, '2018-05-09 21:14:07'),
(13, 'Justin50th', 'Justin is getting old', '$1$TgOWT3Bi$SckxV8MP6nwa246hWb31t0', 1, NULL, '2018-05-10 01:03:27'),
(14, 'ArronLANParty', 'Arron is throwing a LAN party', '$1$GXoatIxi$fLZDgFfbyAd76WVnA.WDQ0', 3, NULL, '2018-05-10 01:05:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_registration`
--

CREATE TABLE `tbl_registration` (
  `ID` int(11) NOT NULL,
  `User_Name` varchar(30) NOT NULL,
  `Group_Name` varchar(30) NOT NULL,
  `Registration_Budget` double DEFAULT NULL,
  `DateTime_Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_registration`
--

INSERT INTO `tbl_registration` (`ID`, `User_Name`, `Group_Name`, `Registration_Budget`, `DateTime_Created`) VALUES
(1, 'newtest', 'newtest', NULL, '2018-05-09 02:06:03'),
(2, 'newtest', 'newtest2', NULL, '2018-05-09 02:07:04'),
(3, 'newtest', 'SamsGroup', NULL, '2018-05-09 03:29:00'),
(6, 'newtest2', 'Newtest2Group', NULL, '2018-05-10 00:03:52'),
(5, 'newtest', 'Balloon', NULL, '2018-05-09 21:14:07'),
(7, 'newtest', 'Newtest2Group', NULL, '2018-05-10 00:06:30'),
(8, 'newtest3', 'Justin50th', NULL, '2018-05-10 01:03:27'),
(9, 'newtest3', 'ArronLANParty', NULL, '2018-05-10 01:05:06'),
(15, 'newtest3', 'newtest', NULL, '2018-05-10 01:13:32'),
(11, 'newtest3', 'newtest2', NULL, '2018-05-10 01:06:52'),
(12, 'newtest3', 'Newtest2Group', NULL, '2018-05-10 01:08:21'),
(16, 'newtest2', 'newtest2', NULL, '2018-05-11 02:00:40');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `ID` int(11) NOT NULL,
  `User_Name` varchar(20) NOT NULL,
  `User_Password` varchar(100) NOT NULL,
  `User_Email` varchar(35) NOT NULL,
  `User_SignUpTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`ID`, `User_Name`, `User_Password`, `User_Email`, `User_SignUpTime`) VALUES
(15, 'newtest', '$1$2yTLCJVs$J.Q6UcLDOZyfWWBgGWhG2.', 'email@email.com', '2018-05-07 15:09:59'),
(12, 'asdfasdf1234', '$1$lo6SHtNb$jBIMkIqBml5P1vFgTZUTi.', 'asdfasdf@a.ca', '2018-05-06 19:16:02'),
(13, 'hashtest', '$1$9jnEV5IW$j.5RlJdneTLc1AUP7zbG50', 'hashtest1@test.com', '2018-05-06 19:21:07'),
(14, 'newhashaccount', '$1$lT8jY523$XtpYiqlSqSZFQurKKPlU8/', 'email@email.com', '2018-05-07 12:01:44'),
(16, 'newtest2', '$1$4Mo5YwHD$dQgsNhzkhVep8NgFNtwFb/', 'email@email.com', '2018-05-08 10:11:14'),
(17, 'newtest123', '$1$mSjEghcd$b9E1kIkVtOLhZ.5xEmJ111', 'email@email.com', '2018-05-09 14:59:07'),
(18, 'newtest1234', '$1$GK/1GzhN$EGmagjFhRJYyFZEZGMRwL1', 'email@email.com', '2018-05-09 14:59:43'),
(28, 'newtest3', '$1$nprdWsLj$xefBD/fTWfqzJ4jNS3io7.', 'email@email.com', '2018-05-09 17:56:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_event`
--
ALTER TABLE `tbl_event`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_group`
--
ALTER TABLE `tbl_group`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_registration`
--
ALTER TABLE `tbl_registration`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_event`
--
ALTER TABLE `tbl_event`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_group`
--
ALTER TABLE `tbl_group`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_registration`
--
ALTER TABLE `tbl_registration`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
