-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 06, 2018 at 07:54 PM
-- Server version: 5.7.22
-- PHP Version: 5.6.30

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
-- Table structure for table `tbl_Event`
--

CREATE TABLE `tbl_Event` (
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
-- Dumping data for table `tbl_Event`
--

INSERT INTO `tbl_Event` (`ID`, `Event_Name`, `Event_Description`, `Event_MinUser`, `Event_MaxUser`, `Event_PricePP`, `Event_ImgLocation`, `Event_URL`) VALUES
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
(11, 'Full Day Guided Kayaking Tour', 'Venture for the day to visit some of Vancouver’s surrounding scenic paddling highlights. All locations are hand-picked by Ecomarine for their scenery and beginner friendliness. We supply the kayaks, safety gear and driving directions. All you have to do is bring lunch! The daytrip locations are subject to change and are weather dependent.', 2, 50, 140, 'img/eventimgs/11kayakdaytrips.jpg', 'https://www.ecomarine.com/tours/daytrip/'),
(12, 'Zipline Adventure in Whistler - Bear & Sasquatch Package', 'uests will be met by their tour guides and fitted with their harnesses and helmets before taking a complimentary shuttle from Whistler Village to our base on Blackcomb Mountain. Guests will zipline between the two mountains directly over the river. \r\n\r\n', 2, 30, 210, 'img/eventimgs/12bearpackage.jpg', 'https://whistler.ziptrek.com/tours/bear/'),
(13, 'Picnic at the Park', 'Grab a blanket, frisbee/football/cards, grab some snacks from the fridge/grocery store and head down to the beach or one of Vancouver\'s many parks for a picnic! ', 1, 99, 10, 'img/eventimgs/13beachpicnic.jpeg', ''),
(14, 'Get the best fried chicken in Metro Vancouver and Picnic across the Street!', 'Constantly nominated best fried chicken place, they are the epitome of family business success. Not only are they the best fried chicken joint in town, they also only use non-hormone fed chicken. ', 1, 6, 15, '	\r\nimg/eventimgs/14lachicken.jpg', 'https://foodgressing.com/la-chicken-richmond-fried-chicken/'),
(15, 'Settler\'s of Catan', 'Play one of the best family board games on the market. Ages 16 and up.', 3, 4, 20, '	\r\nimg/eventimgs/15settlers.jpg', 'https://www.catan.com/'),
(16, 'Spend a night at the Sparking Hills resort in Kelowna', 'Eat farm to table foods, relax in comfort at one of the finest hotels in Canada, and enjoy amazing spa treatments while absorbing picturesque Canadian landscapes.', 1, 99, 550, '	\r\nimg/eventimgs/16crystalhills.jpg', 'https://www.sparklinghill.com/'),
(17, 'Snowshoe at Mt Seymour', 'Enjoy the crunch of some of the finest powders Canad has to offer as you enjoy panoramic views of Metro Vancouver. Don\'t forget to take selfies! Price includes showshoe rentals.', 1, 99, 20, '	\r\nimg/eventimgs/17snowshoe.jpg', 'http://mtseymour.ca/snowshoe-rates'),
(18, 'Enjoy a big group event for practically nothing; play Werewolf!', 'Werewolf is an interactive card game where you get to practice your skills of deception and acting! A party game for devious people...', 7, 14, 2, '	\r\nimg/eventimgs/18werewolf.jpg', 'https://www.playwerewolf.co/products/werewolf-deck'),
(19, 'Nothing beats home cooking!', 'Spend the night in and try making a new dish! Our recommendations include: Chinese dumplings, perogies, hummus, raviolli, sushi, spring rolls and Jamaican patties!', 2, 6, 15, '	\r\nimg/eventimgs/19cooking.jpg', 'http://www.foodnetwork.ca/everyday-cooking/recipes/'),
(20, 'Board games and drinks at Storm Crow', 'Find a new board game or play one of the classics with friends over drinks!', 2, 15, 15, 'img/eventimgs/20StormCrow', 'https://www.stormcrowtavern.com/');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_Group`
--

CREATE TABLE `tbl_Group` (
  `ID` int(11) NOT NULL,
  `Group_Name` varchar(100) NOT NULL,
  `Group_Description` varchar(50) NOT NULL,
  `Group_Password` varchar(50) NOT NULL,
  `Group_Size` int(11) NOT NULL,
  `Event_Name` varchar(100) DEFAULT NULL,
  `DateTime_Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_Group`
--

INSERT INTO `tbl_Group` (`ID`, `Group_Name`, `Group_Description`, `Group_Password`, `Group_Size`, `Event_Name`, `DateTime_Created`) VALUES
(1, 'grouptest', 'this is a description', 'password', 6, NULL, '2018-05-06 22:19:42'),
(2, 'grouptest2', 'this is a description', 'password', 6, NULL, '2018-05-06 22:19:42'),
(3, 'Mom\'s Birthday', 'Mom\'s Birthday', '123123123', 4, NULL, '2018-05-06 22:19:42'),
(4, 'newsitenewtestgrp', 'this is a new test group', 'password8', 1, NULL, '2018-05-06 22:31:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_Registration`
--

CREATE TABLE `tbl_Registration` (
  `ID` int(11) NOT NULL,
  `User_Name` varchar(30) NOT NULL,
  `Group_Name` varchar(30) NOT NULL,
  `Registration_Budget` double NOT NULL,
  `DateTime_Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_User`
--

CREATE TABLE `tbl_User` (
  `ID` int(11) NOT NULL,
  `User_Name` varchar(20) NOT NULL,
  `User_Password` varchar(20) NOT NULL,
  `User_Email` varchar(35) NOT NULL,
  `User_SignUpTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_User`
--

INSERT INTO `tbl_User` (`ID`, `User_Name`, `User_Password`, `User_Email`, `User_SignUpTime`) VALUES
(1, 'newtest', 'password', 'email@email.com', '2018-05-03 21:20:02'),
(2, 'Justin', 'passcode', 'abc@abc.abc', '2018-05-03 21:30:49'),
(3, 'testaccount', 'password', 'email@email.com', '2018-05-03 22:09:38'),
(4, 'newtest1', 'password', 'what@ever.com', '2018-05-03 23:01:49'),
(5, 'newertest', 'password', 'email@email.com', '2018-05-04 01:24:38'),
(6, 'heyjustin', 'itssulei', 'suleimon.kh@gmail.com', '2018-05-04 14:21:16'),
(7, 'Platypus', '123123123', 'dfasdfsadfsadf@sfsdfds.com', '2018-05-04 14:24:43'),
(8, 'delmas91', 'Benji123', 'sebastiandelmas15@gmail.com', '2018-05-04 14:25:01'),
(9, 'Micheal', '12345abcde', 'mjozdoba@gmail.com', '2018-05-04 14:28:46'),
(10, 'asdfasdf', 'asdfasdf', 'asdf@asdf.com', '2018-05-04 14:33:21'),
(11, 'newtestnewsite', 'ffs8pass', 'email@email.com', '2018-05-06 18:30:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_Event`
--
ALTER TABLE `tbl_Event`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_Group`
--
ALTER TABLE `tbl_Group`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_Registration`
--
ALTER TABLE `tbl_Registration`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_User`
--
ALTER TABLE `tbl_User`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_Event`
--
ALTER TABLE `tbl_Event`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_Group`
--
ALTER TABLE `tbl_Group`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_Registration`
--
ALTER TABLE `tbl_Registration`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_User`
--
ALTER TABLE `tbl_User`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
