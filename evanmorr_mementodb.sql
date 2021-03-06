-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2018 at 06:30 PM
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
  `Group_Password` varchar(255) NOT NULL,
  `Group_Size` int(11) NOT NULL,
  `Event_Name` varchar(100) DEFAULT NULL,
  `DateTime_Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Group_ImgLoc` varchar(100) DEFAULT 'img/mygroups/suit.jpeg'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_group`
--

INSERT INTO `tbl_group` (`ID`, `Group_Name`, `Group_Description`, `Group_Password`, `Group_Size`, `Event_Name`, `DateTime_Created`, `Group_ImgLoc`) VALUES
(1, 'grouptest', 'this is a description', 'password', 6, NULL, '2018-05-06 22:19:42', 'img/mygroups/suit.jpeg'),
(2, 'grouptest2', 'this is a description', 'password', 6, NULL, '2018-05-06 22:19:42', 'img/mygroups/suit.jpeg'),
(3, 'Moms Birthday', 'Moms Birthday', '123123123', 4, NULL, '2018-05-06 22:19:42', 'img/mygroups/suit.jpeg'),
(4, 'newsitenewtestgrp', 'this is a new test group', 'password8', 1, NULL, '2018-05-06 22:31:15', 'img/mygroups/suit.jpeg'),
(5, 'Hash Test', 'this is a hash test', '$1$LbxvqK4I$YI5hW.GWJrYfXbM.xGtNt/', 12, NULL, '2018-05-07 02:29:04', 'img/mygroups/suit.jpeg'),
(7, 'newtest', 'password1', '$1$nQiNAAwa$yfdpozFACwRRCjQlEc9PE.', 3, '3', '2018-05-09 02:06:03', 'img/mygroups/KitsBeach.jpg'),
(8, 'newtest2', 'password1 test', '$1$UX9Qs57j$Idd6PpBzxJ.v0wje7Ed.U/', 3, '2', '2018-05-09 02:07:04', 'img/mygroups/suit.jpeg'),
(9, 'SamsGroup', 'Sams Group is the best', '$1$TAon48Nv$PXbKHL6Fol6ztN.jR2it41', 8, NULL, '2018-05-09 03:29:00', 'img/mygroups/suit.jpeg'),
(12, 'Newtest2Group', 'Grp description password1', '$1$KxSibW.y$WSGZy/CgSxyduEYqDTTfl1', 2, NULL, '2018-05-10 00:03:52', 'img/mygroups/suit.jpeg'),
(11, 'Balloon', 'this group is all about balloons', '$1$J/Y.Sg3C$u8lturd9xYYpqrrBKmUD9.', 24, NULL, '2018-05-09 21:14:07', 'img/mygroups/suit.jpeg'),
(13, 'Justin50th', 'Justin is getting old', '$1$TgOWT3Bi$SckxV8MP6nwa246hWb31t0', 1, NULL, '2018-05-10 01:03:27', 'img/mygroups/suit.jpeg'),
(14, 'ArronLANParty', 'Arron is throwing a LAN party', '$1$GXoatIxi$fLZDgFfbyAd76WVnA.WDQ0', 3, NULL, '2018-05-10 01:05:06', 'img/mygroups/suit.jpeg'),
(15, 'newgroup1', 'password1', '$1$BoL557Vy$jujjJLtaoER2aQiJv1Ssa/', 1, '9', '2018-05-15 18:36:11', 'img/mygroups/suit.jpeg'),
(16, 'password1', 'password1', '$1$3v2JJybg$YfNt9WFhE23huKqkTW5wO.', 3, NULL, '2018-05-17 02:58:20', 'img/mygroups/suit.jpeg'),
(17, 'abcpassword1', 'whatever', '$2y$10$qbTyq8QC03kWQzKU04l.Ue2JA6YH2R9o4b0r7tnzC9m', 3, NULL, '2018-05-17 03:22:06', 'img/mygroups/suit.jpeg'),
(18, 'Newertest', 'testmay15', '$2y$10$c87PqOkdBILATMLmETCCuOjga1bjvnfPgM0l4HtUi43', 1, NULL, '2018-05-17 21:44:33', 'img/mygroups/suit.jpeg'),
(19, 'newtestabcd', 'new group 310 may15', '$2y$10$w4/yVIsjdEEx6yf0vwIPE.TxuY3uiOgtY7cacr/yFvy', 2, NULL, '2018-05-17 22:10:29', 'img/mygroups/suit.jpeg'),
(20, 'newgroupabc', '312 may 15', '$2y$10$qAytbPfy9G7EsJVfQnzhuuuNASiV7hzdnDSuthF1MY2', 2, NULL, '2018-05-17 22:12:20', 'img/mygroups/suit.jpeg'),
(21, 'password11', 'password11', '$2y$10$OEDbztx.Vb/wvZDcYB4ZOexVcR1zUcLpwUSdoj2mSQ8', 2, NULL, '2018-05-17 22:20:04', 'img/mygroups/suit.jpeg'),
(22, 'new12345', 'password1', '$2y$10$4/gX7I4aQ7J/H66hRCsYluCjNit9J36L26b0l.cd5o3P/bF9nOA3i', 4, NULL, '2018-05-17 23:34:28', 'img/mygroups/suit.jpeg'),
(23, 'password1group', 'password1', '$2y$10$lQnXAy5kjC3juQCBuSU7I.aJ/sHCyfRpPIHhTmR6Cu.ioCUw1QJsa', 1, '13', '2018-05-18 01:29:34', 'img/mygroups/suit.jpeg'),
(24, 'newgrouppassword 1', 'password1 group', '$2y$10$Mzg7/0bcbnIYhlmzv00AvuVCrdxFqTRyfEeM11Ye69EyNMfLtRpn.', 1, NULL, '2018-05-18 03:37:05', 'img/mygroups/suit.jpeg'),
(25, 'newgrouppassword1', 'password1 group', '$2y$10$VhmBqDlAZ7pHMZn/bOymCecAoSWt9Frgx496/IpmfBZ9iTyOq2zzC', 1, NULL, '2018-05-18 03:37:09', 'img/mygroups/suit.jpeg'),
(26, 'newgrouptest2', 'password1', '$2y$10$MaDPd83iuQbkgT9niQn2POdTOf/gHtmSjxq2k3JPgvHRAWafVno76', 2, NULL, '2018-05-18 03:39:05', 'img/mygroups/suit.jpeg'),
(27, 'solo birthday', 'birthday by myself', '$2y$10$A3.cu3n1bZORGtrQqczUPuu5VDMucK5T2FTddV1kpjz8uOS4cojEq', 1, NULL, '2018-05-18 15:21:19', 'img/mygroups/suit.jpeg'),
(28, 'solobirthday', 'birthday by myself', '$2y$10$ysMXM/CI7i8hQsmKUgWmZOug30G1ywqREAchyO5MxyHYkSbYToM0e', 1, '8', '2018-05-18 15:21:26', 'img/mygroups/suit.jpeg'),
(29, 'groupwhatever', 'whatever group ', '$2y$10$tTv6qH9cq9T.WHogQjrZIuLOU6haNHhf.Xh1JT5DvJ13XSOnMrg0K', 1, NULL, '2018-05-18 17:16:03', 'img/mygroups/suit.jpeg'),
(30, 'groupwhatever2', 'new test', '$2y$10$qHb5PPn.xI77FYNgMi8HyuyfTdPeif/Q0dEjKYO2BdtnHrZM/dS6a', 1, NULL, '2018-05-18 17:20:15', 'img/mygroups/suit.jpeg'),
(31, 'whatever3', 'whatever3', '$2y$10$JYwJwgQLO.etmAsjc7CRq.976WEf27SQDJnYDVQoplI7pJUe7Puh.', 1, NULL, '2018-05-18 17:28:27', 'img/mygroups/suit.jpeg'),
(32, 'whatever5', 'whatever5', '$2y$10$tHVpsruDqMN0eNS89rF0bOZtP6BR.FGnayhYopfgyIbyvuSuls65S', 1, NULL, '2018-05-18 17:32:43', 'img/mygroups/suit.jpeg'),
(33, 'whatever6', 'whatever6', '$2y$10$NdGMPxaLZTL.6L8AwvnOLensQLlYccvpaPmJHwYBe.0aT/lGVgurW', 1, NULL, '2018-05-18 17:33:11', 'img/mygroups/suit.jpeg'),
(34, 'whatever4', 'what4', '$2y$10$Z4OGBJh/wzSd6iy79PG2Ye0Lvg4xIaNg9p6GJnnDOUUPVmzLKYhMa', 1, '3', '2018-05-18 17:34:40', 'img/mygroups/suit.jpeg'),
(35, 'newtestgroup', 'test new event', '$2y$10$INI4dqSX/EGZ1VZbSrtns.xDgHjnQG7Bun51iO3IDAvslljoeRsxe', 1, '3', '2018-05-18 17:53:26', 'img/mygroups/suit.jpeg'),
(36, 'newtest1234', 'test j', '$2y$10$RN7OziuEIj4GsVjdm7lbp.8qiFPjPsQ8GCgZ6CaL0OU8LBY7za50q', 1, '3', '2018-05-18 17:55:49', 'img/mygroups/suit.jpeg'),
(37, 'newertestabcd', 'test1234', '$2y$10$lnOKEjJVEbSeWPd8uZxVWurT98uz6INgrU1EXBPQx5S8PZL2fV0iy', 1, '2', '2018-05-18 17:56:36', 'img/mygroups/suit.jpeg'),
(38, 'newgroupabc123', 'test', '$2y$10$b4tfAehxmpTJYjVdROYPuOknKqGnA74au7WBye08Lkf1GfhhoSg.2', 2, NULL, '2018-05-21 00:33:06', 'img/mygroups/suit.jpeg'),
(39, 'newgroup123abc', 'password1', '$2y$10$2sXdCaXE1oln3J6B0SwZYe.FOSTZBP.Lvh94pAJYJxOAOB2uWwu/O', 2, NULL, '2018-05-21 00:39:15', 'img/mygroups/suit.jpeg'),
(40, 'asdf', 'asdf', '$2y$10$JjbvUgOPzuRgKRl/pfi95uuKm/pNs7S3tXf78q2VXed0W5b7yle.y', 4, NULL, '2018-05-21 02:04:10', 'img/mygroups/suit.jpeg'),
(41, 'asdf1234', 'asdf', '$2y$10$2sPlOcjCAbU4rczhcQgyWux0fGMDlnQeffvguRI43iBgGZXb3hwiu', 2, NULL, '2018-05-21 02:04:31', 'img/mygroups/suit.jpeg'),
(42, 'New Group', 'descr is password1', '$2y$10$Q8p0DdDC024W.k/f3jN2Ses7n5AYaMEK/LfcdLQqqaswhIjNUPvge', 1, NULL, '2018-05-22 19:14:28', 'img/mygroups/suit.jpeg'),
(43, 'this is a group test', 'whatevers descr', '$2y$10$cmow5FSoYgnUI7s1psG9J.Rz9mh0mFgwZcQAdnqPO9oh1nOHuFY5S', 1, NULL, '2018-05-22 20:12:13', 'img/mygroups/suit.jpeg'),
(44, 'new test group', 'group test of ID output', '$2y$10$tAzEkp1Nt7ifo7vYKsvNbu2qbhCPPHmtAvWKeVVEg7izmQ6089Kr.', 1, NULL, '2018-05-22 22:45:53', 'img/mygroups/suit.jpeg'),
(45, 'new test group', 'group test of ID output', '$2y$10$6rlm4Q.6q7vB8pD0k6J0N.ggfTD/oSz.8ukpAOtPHG7qXUwm21mn.', 1, NULL, '2018-05-22 22:46:00', 'img/mygroups/suit.jpeg'),
(46, 'new testgroup', 'group test of ID output', '$2y$10$7n9KQ2uAQb7TtZYnjMUMkeYZN7MGMqIjw2NxxlIIC05CkOhxzp3r.', 1, NULL, '2018-05-22 22:46:38', 'img/mygroups/suit.jpeg'),
(47, 'new test', 'new id output', '$2y$10$2w7IjwT/yOJS/grQNubKMOflcb49fxKqDa20Bq9uby.vGY/Qu/Y32', 1, NULL, '2018-05-22 22:49:18', 'img/mygroups/suit.jpeg'),
(48, 'new group', 'new create group test', '$2y$10$kaVFzMmQgKoFpRGCz8g/juZDsIuhlagYG5er3EdUsJwvVexKht4Ky', 1, NULL, '2018-05-22 23:16:14', 'img/mygroups/suit.jpeg'),
(49, 'newtest', 'test', '$2y$10$BnkrbebCrkrfXHvDoU9EY.b.x6JHit4Z8HfB8INpFZ.NKraF6bopq', 1, NULL, '2018-05-22 23:18:13', 'img/mygroups/suit.jpeg'),
(50, 'new test', 'new test', '$2y$10$o0FigRFJsEGjK.0E/jlO8u0iqnDiVyhLdrfjLFa0//yH7zzcGhT3m', 1, NULL, '2018-05-22 23:19:49', 'img/mygroups/suit.jpeg'),
(51, 'newtest', 'test', '$2y$10$3NOVUKOYDGUYZ0SXjwzj0Ou5VNWH7.6sxioDlnnY/WEw0OkDdCKnu', 1, NULL, '2018-05-22 23:26:37', 'img/mygroups/suit.jpeg'),
(52, 'newtest', 'newtest', '$2y$10$Q.9X2s.RoiXeuJPrwLb5B./uoltYfxqcZrgkQCajK7.k0YboDKySO', 1, NULL, '2018-05-22 23:30:26', 'img/mygroups/suit.jpeg'),
(53, 'newtest', 'newtest', '$2y$10$m5UGqWQ7IAwogdbylaX0zuXvYY365BCGmMLeWp7JN1uf3MFx7GFJ6', 1, NULL, '2018-05-22 23:31:22', 'img/mygroups/suit.jpeg'),
(54, 'new test', 'new test', '$2y$10$b2NP0hFMy9H3G6Pqg6lJZu7m6Ycjs53CYi3qdzcC1mP44eA1kym7m', 1, NULL, '2018-05-22 23:31:37', 'img/mygroups/suit.jpeg'),
(55, 'new test group', 'new auto return group ID test', '$2y$10$leaR9kVRx3QY.mupx6TUiOH0JwIzIfPl/jXGfH.lcWotjxYHlkqG2', 1, NULL, '2018-05-22 23:32:37', 'img/mygroups/suit.jpeg'),
(56, 'new test group', 'new test', '$2y$10$HRLZKFS8DuFHoBbbaXDt2epK5Jb.8xtB4ql0fqH5uoiAHbnCRVl0y', 1, NULL, '2018-05-22 23:34:22', 'img/mygroups/suit.jpeg'),
(57, 'new group test pic', 'testing pic upload', '$2y$10$WUXjS42z8jVA7GOYko8Tk.Vd9F1Cr9J922XmcAD6FymKOvA6cxAmy', 1, NULL, '2018-05-22 23:37:54', 'img/mygroups/suit.jpeg'),
(58, 'new test', 'join group test', '$2y$10$baOos/PJUom1XCCDYdiWK.JOu2RDxlbB81dqj9NphdGEjfb3nKp2W', 2, NULL, '2018-05-22 23:57:46', 'img/mygroups/suit.jpeg'),
(59, 'new test group', 'test join group', '$2y$10$vqfKf3A.eXkQ5MXrodPWxOg9IIZMYUdEOBgmCjU/nMAA00esMJ4u6', 2, NULL, '2018-05-22 23:58:30', 'img/mygroups/suit.jpeg'),
(60, 'new test group', 'test join group', '$2y$10$cWMNEVwSwbKJbQfjybXwquQJMnM4ZplXJ/g0jTG2MdiiJGYXQwh2a', 2, NULL, '2018-05-23 00:00:03', 'img/mygroups/suit.jpeg'),
(61, 'new test group', 'password1 join group test', '$2y$10$Y9gWxpy.cx1sx/hWfQ77p.YmAj2lacgMDz31D1pmsCCBKm8qd0EpG', 2, NULL, '2018-05-23 00:32:17', 'img/mygroups/suit.jpeg'),
(63, 'join pic test', 'test join upload pic', '$2y$10$LUn5Nb87.Lic8JTdYcu2xOHIz2pre3nLqAN7xFxlpOex25HLlG/nu', 2, NULL, '2018-05-23 02:52:46', 'img/mygroups/suit.jpeg'),
(64, 'newtestpic', 'pic test', '$2y$10$ounBm3YIzPgjyViAILe1TeT1toadV2P2713xhrrwlp9KuFMjG.2Sq', 2, NULL, '2018-05-23 02:58:12', 'img/mygroups/grouppicturetest4.jpg'),
(65, 'newer pic test', 'descr newer pic test', '$2y$10$5Z2LKClbrX798M2XP9AIP.CVQFYl4D3ML637ATMXzQaDpVP2TPAAm', 2, NULL, '2018-05-23 03:24:22', 'img/mygroups/grouppicturetest5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_registration`
--

CREATE TABLE `tbl_registration` (
  `ID` int(11) NOT NULL,
  `User_Name` varchar(30) NOT NULL,
  `Group_Name` varchar(30) NOT NULL,
  `Registration_Budget` double DEFAULT NULL,
  `DateTime_Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Group_ID` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_registration`
--

INSERT INTO `tbl_registration` (`ID`, `User_Name`, `Group_Name`, `Registration_Budget`, `DateTime_Created`, `Group_ID`) VALUES
(1, 'newtest', 'newtest', 1, '2018-05-09 02:06:03', 7),
(2, 'newtest', 'newtest2', 25, '2018-05-09 02:07:04', 8),
(3, 'newtest', 'SamsGroup', NULL, '2018-05-09 03:29:00', 9),
(6, 'newtest2', 'Newtest2Group', 22, '2018-05-10 00:03:52', 12),
(5, 'newtest', 'Balloon', 75, '2018-05-09 21:14:07', 11),
(7, 'newtest', 'Newtest2Group', 22, '2018-05-10 00:06:30', 12),
(8, 'newtest3', 'Justin50th', 25, '2018-05-10 01:03:27', 13),
(9, 'newtest3', 'ArronLANParty', 1.5, '2018-05-10 01:05:06', 14),
(15, 'newtest3', 'newtest', 25.5, '2018-05-10 01:13:32', 52),
(11, 'newtest3', 'newtest2', 25, '2018-05-10 01:06:52', 8),
(12, 'newtest3', 'Newtest2Group', NULL, '2018-05-10 01:08:21', 12),
(16, 'newtest2', 'newtest2', 0, '2018-05-11 02:00:40', 8),
(17, 'newtest', 'newgroup1', 7.5, '2018-05-15 18:36:11', 15),
(18, 'newtest2', 'password1', 54.25, '2018-05-17 02:58:20', 16),
(19, 'newtest', 'password1', NULL, '2018-05-17 03:05:58', 16),
(20, 'newtest', 'abcpassword1', 3, '2018-05-17 03:22:06', 17),
(22, 'newtest', 'Newertest', 25, '2018-05-17 21:44:33', 18),
(21, 'newtest2', 'newtest', 54.5, '2018-05-17 17:07:06', 49),
(23, 'newtest', 'newtestabcd', NULL, '2018-05-17 22:10:29', 19),
(24, 'newtest2', 'newgroupabc', NULL, '2018-05-17 22:12:20', 20),
(25, 'newtest', 'password11', NULL, '2018-05-17 22:20:04', 21),
(26, 'newtest', 'new12345', 25, '2018-05-17 23:34:28', 22),
(27, 'newtest', 'password1group', 23, '2018-05-18 01:29:34', 23),
(28, 'newtest', 'newgrouppassword 1', NULL, '2018-05-18 03:37:05', 24),
(29, 'newtest', 'newgrouppassword1', 33, '2018-05-18 03:37:09', 25),
(30, 'newtest', 'newgrouptest2', NULL, '2018-05-18 03:39:05', 26),
(31, 'newtest2', 'newgrouptest2', NULL, '2018-05-18 03:39:51', 26),
(32, 'newtest', 'solo birthday', NULL, '2018-05-18 15:21:19', 27),
(33, 'newtest', 'solobirthday', 88, '2018-05-18 15:21:26', 28),
(34, 'newtest', 'groupwhatever', 45, '2018-05-18 17:16:03', 29),
(35, 'newtest', 'groupwhatever2', 25, '2018-05-18 17:20:15', 30),
(36, 'newtest', 'whatever3', NULL, '2018-05-18 17:28:27', 31),
(37, 'newtest', 'whatever5', NULL, '2018-05-18 17:32:43', 32),
(38, 'newtest', 'whatever6', 35, '2018-05-18 17:33:11', 33),
(39, 'newtest', 'whatever4', 45, '2018-05-18 17:34:40', 34),
(40, 'newtest', 'newtestgroup', 65, '2018-05-18 17:53:26', 35),
(41, 'newtest', 'newtest1234', 55, '2018-05-18 17:55:49', 36),
(42, 'newtest', 'newertestabcd', 75, '2018-05-18 17:56:36', 37),
(43, 'newtest', 'newgroupabc123', NULL, '2018-05-21 00:33:06', 38),
(44, 'newtest', 'newgroup123abc', NULL, '2018-05-21 00:39:15', 38),
(45, 'newtest2', 'newgroup123abc', NULL, '2018-05-21 00:39:33', 38),
(46, 'newtest3', 'asdf', NULL, '2018-05-21 02:04:10', 40),
(47, 'newtest3', 'asdf1234', 65, '2018-05-21 02:04:31', 41),
(48, 'newtest', 'asdf1234', 5, '2018-05-21 02:04:46', 41),
(49, 'newtest', 'New Group', 75, '2018-05-22 19:14:28', 42),
(50, 'newtest', 'this is a group test', 75, '2018-05-22 20:12:13', 43),
(51, 'newtest', 'new test group', NULL, '2018-05-22 22:45:53', 61),
(52, 'newtest', 'new test group', NULL, '2018-05-22 22:46:00', 44),
(53, 'newtest', 'new testgroup', NULL, '2018-05-22 22:46:38', 46),
(54, 'newtest', 'new test', NULL, '2018-05-22 22:49:18', 50),
(55, 'newtest', 'newtest', NULL, '2018-05-22 23:18:13', 51),
(56, 'newtest', 'new test', NULL, '2018-05-22 23:19:49', 58),
(57, 'newtest', 'newtest', NULL, '2018-05-22 23:26:37', 53),
(60, 'newtest', 'new test', NULL, '2018-05-22 23:31:37', 54),
(61, 'newtest', 'new test group', NULL, '2018-05-22 23:32:37', 59),
(62, 'newtest', 'new test group', NULL, '2018-05-22 23:34:22', 60),
(63, 'newtest', 'new group test pic', NULL, '2018-05-22 23:37:54', 57),
(65, 'newtest2', 'new test group', NULL, '2018-05-23 00:28:04', 60),
(68, 'newtest2', 'join pic test', NULL, '2018-05-23 02:52:46', 63),
(69, 'newtest2', 'newtestpic', NULL, '2018-05-23 02:58:12', 64),
(70, 'newtest3', 'newtestpic', NULL, '2018-05-23 03:17:52', 64),
(71, 'newtest3', 'newer pic test', 5, '2018-05-23 03:24:22', 65),
(72, 'newtest2', 'newer pic test', 25, '2018-05-23 03:27:31', 65);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `ID` int(11) NOT NULL,
  `User_Name` varchar(20) NOT NULL,
  `User_Password` varchar(255) NOT NULL,
  `User_Email` varchar(35) NOT NULL,
  `User_SignUpTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`ID`, `User_Name`, `User_Password`, `User_Email`, `User_SignUpTime`) VALUES
(15, 'newtest', '$1$2yTLCJVs$J.Q6UcLDOZyfWWBgGWhG2.', 'email@email.com', '2018-05-07 15:09:59'),
(35, 'testaccount', '$1$mOeEdA.f$zsdR9rGJrI1MECOQn1ARo0', 'email@email.com', '2018-05-16 18:26:05'),
(34, 'asdfasdf', '$1$uP0u4O66$g0D2f.Cn4lGiTCBoqy/um.', 'email@email.com', '2018-05-16 18:10:08'),
(29, 'newaccount123', '$1$VNUD6HpQ$sAX.FKsJKi/2ue97a72av/', 'email@email.com', '2018-05-16 17:04:36'),
(31, 'newaccount1234', '$1$LT9CsuNQ$n7kuHOqoW3WsCjSTGWDGe.', 'email@email.com', '2018-05-16 17:30:29'),
(32, 'newtest12345', '$1$IcnOfJ3k$VR1QfANouCS.9I5eebRsP0', 'email@email.com', '2018-05-16 17:32:00'),
(33, 'newtest123456', '$1$6vy5q2G1$DM73M6JqFd.lbjs0S39yF/', 'email@email.com', '2018-05-16 17:42:09'),
(12, 'asdfasdf1234', '$1$lo6SHtNb$jBIMkIqBml5P1vFgTZUTi.', 'asdfasdf@a.ca', '2018-05-06 19:16:02'),
(13, 'hashtest', '$1$9jnEV5IW$j.5RlJdneTLc1AUP7zbG50', 'hashtest1@test.com', '2018-05-06 19:21:07'),
(14, 'newhashaccount', '$1$lT8jY523$XtpYiqlSqSZFQurKKPlU8/', 'email@email.com', '2018-05-07 12:01:44'),
(16, 'newtest2', '$1$4Mo5YwHD$dQgsNhzkhVep8NgFNtwFb/', 'email@email.com', '2018-05-08 10:11:14'),
(17, 'newtest123', '$1$mSjEghcd$b9E1kIkVtOLhZ.5xEmJ111', 'email@email.com', '2018-05-09 14:59:07'),
(18, 'newtest1234', '$1$GK/1GzhN$EGmagjFhRJYyFZEZGMRwL1', 'email@email.com', '2018-05-09 14:59:43'),
(28, 'newtest3', '$1$nprdWsLj$xefBD/fTWfqzJ4jNS3io7.', 'email@email.com', '2018-05-09 17:56:32'),
(36, 'newtestwtf', '$2y$10$T9yEjFzAZIB88nerCKoAZO/V3an/A7r298Cz9p0WZ8yQhaC3jxWf2', 'email@email.com', '2018-05-16 19:22:47'),
(37, 'abcd1234', '$2y$10$fV8gHlnQdgkqpHM4s1fp6OFNeHk0yS32seSittO1dn30LseW1ZDR2', 'email@email.com', '2018-05-16 19:27:03'),
(38, 'newtestabc', '$2y$10$CKAub7CEB4jO9hbuUqqLlOAaf3gJ/Yg0SACRGBe9rq9jcjtwDJsb.', 'email@email.com', '2018-05-17 15:14:15'),
(39, 'newtest1245', '$2y$10$K/yV9Biq3bD.tmOAVNaSZeKXcXR2KfjhDpkMQQynm3wXT4nx7JJpC', 'email@email.com', '2018-05-20 15:10:16');

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tbl_registration`
--
ALTER TABLE `tbl_registration`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
