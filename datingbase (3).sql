-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: sql3.freemysqlhosting.net
-- Generation Time: Jun 18, 2020 at 10:37 PM
-- Server version: 5.5.54-0ubuntu0.12.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sql3346244`
--

-- --------------------------------------------------------

--
-- Table structure for table `agestatus`
--

CREATE TABLE `agestatus` (
  `age` int(11) NOT NULL,
  `isAdult` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agestatus`
--

INSERT INTO `agestatus` (`age`, `isAdult`) VALUES
(0, 'N'),
(1, 'N'),
(2, 'N'),
(3, 'N'),
(4, 'N'),
(5, 'N'),
(6, 'N'),
(7, 'N'),
(8, 'N'),
(9, 'N'),
(10, 'N'),
(11, 'N'),
(12, 'N'),
(13, 'N'),
(14, 'N'),
(15, 'N'),
(16, 'N'),
(17, 'N'),
(18, 'Y'),
(19, 'Y'),
(20, 'Y'),
(21, 'Y'),
(22, 'Y'),
(23, 'Y'),
(24, 'Y'),
(25, 'Y'),
(26, 'Y'),
(27, 'Y'),
(28, 'Y'),
(29, 'Y'),
(30, 'Y'),
(31, 'Y'),
(32, 'Y'),
(33, 'Y'),
(34, 'Y'),
(35, 'Y'),
(36, 'Y'),
(37, 'Y'),
(38, 'Y'),
(39, 'Y'),
(40, 'Y'),
(41, 'Y'),
(42, 'Y'),
(43, 'Y'),
(44, 'Y'),
(45, 'Y'),
(46, 'Y'),
(47, 'Y'),
(48, 'Y'),
(49, 'Y'),
(50, 'Y'),
(51, 'Y'),
(52, 'Y'),
(53, 'Y'),
(54, 'Y'),
(55, 'Y'),
(56, 'Y'),
(57, 'Y'),
(58, 'Y'),
(59, 'Y'),
(60, 'Y'),
(61, 'Y'),
(62, 'Y'),
(63, 'Y'),
(64, 'Y'),
(65, 'Y'),
(66, 'Y'),
(67, 'Y'),
(68, 'Y'),
(69, 'Y'),
(70, 'Y'),
(71, 'Y'),
(72, 'Y'),
(73, 'Y'),
(74, 'Y'),
(75, 'Y'),
(76, 'Y'),
(77, 'Y'),
(78, 'Y'),
(79, 'Y'),
(80, 'Y'),
(81, 'Y'),
(82, 'Y'),
(83, 'Y'),
(84, 'Y'),
(85, 'Y'),
(86, 'Y'),
(87, 'Y'),
(88, 'Y'),
(89, 'Y'),
(90, 'Y'),
(91, 'Y'),
(92, 'Y'),
(93, 'Y'),
(94, 'Y'),
(95, 'Y'),
(96, 'Y'),
(97, 'Y'),
(98, 'Y'),
(99, 'Y'),
(100, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE `blocks` (
  `bID` int(11) NOT NULL,
  `blocker` varchar(40) DEFAULT NULL,
  `blockee` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`bID`, `blocker`, `blockee`) VALUES
(3, 'mn@gmail.com', 'damien@company.com.net'),
(4, 'damien@company.com.net', 'bbbbra@hotmail.com'),
(5, 'bbbbra@hotmail.com', 'bbbb@hotmail.com'),
(6, 'asakusa@gmail.com', 'mazkanata@resistance.com'),
(7, 'asakusa@gmail.com', 'matt@gmail.com'),
(8, 'asakusa@gmail.com', 'senatoramidala@republic.com'),
(9, 'bbbb@hotmail.com', 'princess@rebellion.com'),
(10, 'ohboy@gmail.com', 'sidious@empire.com'),
(11, 'ohboy@gmail.com', 'cpsc304@ubc.ca');

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `cID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `conversations`
--

INSERT INTO `conversations` (`cID`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11);

-- --------------------------------------------------------

--
-- Table structure for table `creditcards`
--

CREATE TABLE `creditcards` (
  `PAN` char(16) NOT NULL,
  `cardholder` varchar(30) NOT NULL,
  `expirationDate` date NOT NULL,
  `company` varchar(30) NOT NULL,
  `userEmail` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `creditcards`
--

INSERT INTO `creditcards` (`PAN`, `cardholder`, `expirationDate`, `company`, `userEmail`) VALUES
('0000111100001111', 'Sidious', '2099-05-31', 'CHASE', 'sidious@empire.com'),
('1234123412341234', 'Maul', '2099-12-31', 'AMERICAN EXPRESS', 'madmattcrazy@gmail.com'),
('1234567887654321', 'Maul', '2089-05-31', 'CHASE', 'matt@gmail.com'),
('1334962890103486', 'Tad Strange', '2021-07-01', 'VISA', 'mn@gmail.com'),
('1472583696358247', 'Mum Trades', '2023-01-31', 'VISA', 'jackofalltrades@gmail.com'),
('4924103824132313', 'Ieyasu Tokugawa', '2023-06-01', 'VISA', 'tokugawa@ieyasu.jp'),
('7777444411112222', 'Poe', '2055-02-28', 'CAPITAL ONE', 'poedameron@resistance.com'),
('7788996655441122', 'Jyn Erso', '2030-10-31', 'MASTERCARD', 'jynerso@galaxy.com'),
('7893849528375894', 'Bob Builder’s Mom', '2200-09-01', 'MASTERCARD', 'bbbb@hotmail.com'),
('7894561236985214', 'Tano', '2056-07-31', 'AMERICAN EXPRESS', 'ahsokatano@republic.com'),
('7898456512324565', 'Mando', '2045-11-30', 'AMERICAN EXPRESS', 'din@mandalorian.com'),
('9999888877776666', 'Lady Sif', '2099-11-30', 'VISA', 'sif@asgard.com');

-- --------------------------------------------------------

--
-- Table structure for table `hasusermessages`
--

CREATE TABLE `hasusermessages` (
  `timeSent` datetime NOT NULL,
  `text` varchar(300) NOT NULL,
  `userEmail` varchar(40) DEFAULT NULL,
  `cID` int(11) NOT NULL,
  `meID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasusermessages`
--

INSERT INTO `hasusermessages` (`timeSent`, `text`, `userEmail`, `cID`, `meID`) VALUES
('2020-05-31 00:13:00', 'This is not a scam.', 'bbbbra@hotmail.com', 1, 1),
('2020-06-01 23:02:10', 'The world is ending and you still can’t get along', NULL, 2, 1),
('2020-06-11 23:03:10', 'Just say you’re beautiful', NULL, 2, 2),
('2020-06-22 23:03:19', 'I’m beautiful', 'bbbb@hotmail.com', 2, 3),
('2020-06-09 23:35:25', 'this is just great', NULL, 2, 4),
('2020-06-16 19:05:47', 'is it creative', 'bbbb@hotmail.com', 2, 92),
('2020-06-16 19:20:31', 'god help us all', 'bbbb@hotmail.com', 2, 94),
('2020-06-16 19:21:17', 'god help the outcasts, hungry from birth', 'bbbb@hotmail.com', 2, 95),
('2020-06-16 19:21:57', 'show them the mercy they dont find on earth', 'bbbb@hotmail.com', 2, 97),
('2020-06-16 19:22:12', '\"', 'bbbb@hotmail.com', 2, 98),
('2020-06-16 19:22:26', ':][()-=?', 'bbbb@hotmail.com', 2, 99),
('2020-06-16 19:22:45', '||~`!@#$56&%^&*(&&', 'bbbb@hotmail.com', 2, 100),
('2020-06-16 19:24:08', 'don\'t', 'bbbb@hotmail.com', 2, 101),
('2020-06-16 19:26:08', '\'', 'bbbb@hotmail.com', 2, 102),
('2020-03-10 22:23:00', 'Hello World', 'bbbbra@hotmail.com', 5, 1),
('2020-03-10 22:24:05', 'Wuts up mom', 'bbbb@hotmail.com', 5, 2),
('0000-00-00 00:00:00', 'insertinsert', 'bbbb@hotmail.com', 5, 14),
('2020-06-09 15:20:10', 'everything is just great... just great', 'bbbb@hotmail.com', 5, 19),
('2020-06-09 15:22:05', 'im so dissapointed in you', 'bbbb@hotmail.com', 5, 20),
('2020-06-09 15:24:24', 'mom stop it please', 'bbbb@hotmail.com', 5, 21),
('2020-06-09 15:28:34', 'mom stop it please', 'bbbb@hotmail.com', 5, 22),
('2020-06-09 15:43:01', 'please stop', 'bbbb@hotmail.com', 5, 23),
('2020-06-09 22:33:46', 'help me', 'bbbb@hotmail.com', 5, 24),
('2020-06-09 22:53:04', 'tell your children', 'bbbb@hotmail.com', 5, 27),
('2020-06-09 22:55:10', 'tell your children', 'bbbb@hotmail.com', 5, 28),
('2020-06-09 22:55:20', 'jj', 'bbbb@hotmail.com', 5, 29),
('2020-06-09 23:15:13', 'k', 'bbbb@hotmail.com', 5, 41),
('2020-06-09 23:15:18', 'k', 'bbbb@hotmail.com', 5, 42),
('2020-06-10 01:58:08', 'hello its me', 'bbbbra@hotmail.com', 5, 49),
('2020-06-10 02:11:48', 'wassup', 'bbbbra@hotmail.com', 5, 50),
('2020-06-10 02:12:05', 'This is yutong', 'bbbbra@hotmail.com', 5, 51),
('2020-06-10 02:12:31', 'Why does the Email not matter', 'bbbbra@hotmail.com', 5, 52),
('2020-06-10 02:12:34', 'Why does the Email not matter', 'bbbbra@hotmail.com', 5, 53),
('2020-06-10 02:12:52', 'Why does the Email not matter', 'bbbbra@hotmail.com', 5, 54),
('2020-06-10 02:12:55', 'Why does the Email not matter', 'bbbbra@hotmail.com', 5, 55),
('2020-06-10 02:13:10', 'And why did this send 4 times just by me refreshing it LOL', 'bbbbra@hotmail.com', 5, 56),
('2020-06-10 02:13:14', 'And why did this send 4 times just by me refreshing it LOL', 'bbbbra@hotmail.com', 5, 57),
('2020-06-10 02:15:29', 'And why did this send 4 times just by me refreshing it LOL', 'bbbbra@hotmail.com', 5, 58),
('2020-06-10 02:25:43', 'And why did this send 4 times just by me refreshing it LOL', 'bbbbra@hotmail.com', 5, 59),
('2020-06-10 04:46:39', 'hi', 'bbbbra@hotmail.com', 5, 60),
('2020-06-10 04:49:08', 'da', 'bbbbra@hotmail.com', 5, 61),
('2020-06-10 05:37:54', 'da', 'bbbbra@hotmail.com', 5, 62),
('2020-06-12 18:10:29', 'this is bob', 'bbbb@hotmail.com', 5, 66),
('2020-06-12 18:11:41', 'this is bob', 'bbbb@hotmail.com', 5, 67),
('2020-06-12 18:14:21', 'this is bob', 'bbbb@hotmail.com', 5, 68),
('2020-06-12 18:15:34', 'this is bob', 'bbbb@hotmail.com', 5, 69),
('2020-06-12 18:15:42', 'stop', 'bbbb@hotmail.com', 5, 70),
('2020-06-12 18:16:52', 'hmmm', 'bbbb@hotmail.com', 5, 71),
('2020-06-12 18:23:25', 'sending this and hopefully itll stop when it refreshes', 'bbbbra@hotmail.com', 5, 72),
('2020-06-12 18:26:17', 'paint away', 'bbbbra@hotmail.com', 5, 73),
('2020-06-12 18:26:25', 'add close conn', 'bbbbra@hotmail.com', 5, 74),
('2020-06-12 18:26:37', 'seems alright', 'bbbbra@hotmail.com', 5, 75),
('2020-06-12 18:26:38', 'seems alright', 'bbbbra@hotmail.com', 5, 76),
('2020-06-13 22:02:54', 'dasd', 'bbbbra@hotmail.com', 5, 77),
('2020-06-13 22:02:57', 'dasd', 'bbbbra@hotmail.com', 5, 78),
('2020-06-13 22:03:11', 'doesnt stop', 'bbbbra@hotmail.com', 5, 79),
('2020-06-13 22:03:15', 'doesnt stop', 'bbbbra@hotmail.com', 5, 80),
('2020-06-13 22:03:19', 'doesnt stop', 'bbbbra@hotmail.com', 5, 81),
('2020-06-13 23:31:32', 'hmmmm', 'bbbbra@hotmail.com', 5, 82),
('2020-06-13 23:32:43', 'refresh', 'bbbbra@hotmail.com', 5, 83),
('2020-06-13 23:33:10', 'stops for me', 'bbbbra@hotmail.com', 5, 84),
('2020-06-14 01:03:29', 'test', 'bbbb@hotmail.com', 5, 85),
('2020-06-14 04:56:32', 'double test', 'bbbb@hotmail.com', 5, 86),
('2020-06-14 05:09:34', 'dasd', 'bbbb@hotmail.com', 5, 87),
('2020-06-16 16:09:03', 'ok i think this', 'bbbb@hotmail.com', 5, 89),
('2020-06-16 17:24:02', 'its message time', 'bbbb@hotmail.com', 5, 90),
('2020-06-16 19:09:16', 'lets see it hotpants', 'bbbb@hotmail.com', 5, 93),
('2020-06-17 17:48:04', 'hi there :)', 'bbbb@hotmail.com', 6, 1),
('2020-06-17 03:18:25', 'Hey hows it going ', 'ahsokatano@republic.com', 8, 8),
('2020-06-17 03:20:27', 'Are you really a ninja', 'ahsokatano@republic.com', 8, 9),
('2020-06-17 04:58:54', 'Respond??', 'asakusa@gmail.com', 8, 10),
('2020-06-17 04:58:56', 'Respond??', 'asakusa@gmail.com', 8, 11),
('2020-06-17 04:59:06', 'Please', 'asakusa@gmail.com', 8, 12),
('2020-06-17 04:59:16', 'Ha', 'asakusa@gmail.com', 8, 13),
('2020-06-17 04:59:37', 'Ok I\'m really a ninja', 'asakusa@gmail.com', 8, 14),
('2020-06-17 03:39:03', 'HELLO', 'damien@company.com.net', 10, 1),
('2020-06-17 03:39:10', 'I AM HERE TO STEAL YOUR BONES', 'damien@company.com.net', 10, 2),
('2020-06-17 15:19:47', 'OHNO IM DATING A DOGGO', 'ohboy@gmail.com', 10, 3),
('2020-06-17 15:20:13', 'having a conversation with yourself after working on something for 8 hours is always nice', 'ohboy@gmail.com', 10, 4),
('2020-06-18 22:27:08', 'a message', 'ohboy@gmail.com', 10, 5),
('2020-06-17 16:38:14', 'Where\'s the child', 'poedameron@resistance.com', 11, 1),
('2020-06-17 16:39:05', 'go fly your puny plane and stop bothering me', 'din@mandalorian.com', 11, 2);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `locID` int(11) NOT NULL,
  `province` char(2) NOT NULL,
  `city` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`locID`, `province`, `city`) VALUES
(0, 'BC', 'Vancouver'),
(1, 'BC', 'Kelowna'),
(2, 'AB', 'Calgary'),
(3, 'NS', 'Halifax'),
(4, 'SK', 'Regina'),
(5, 'ON', 'Hamilton'),
(6, 'MB', 'Winnipeg'),
(7, 'QC', 'Quebec'),
(8, 'ON', 'Ottawa'),
(9, 'BC', 'Burnaby'),
(10, 'ON', 'Toronto'),
(11, 'AB', 'Edmonton'),
(12, 'QC', 'Montreal'),
(13, 'SK', 'Saskatoon'),
(14, 'BC', 'Surrey'),
(15, 'BC', 'Victoria'),
(16, 'ON', 'Oshawa'),
(17, 'NB', 'Saint John'),
(18, 'PE', 'Charlottetown'),
(19, 'NT', 'Yellowknife'),
(20, 'AB', 'Lethbridge'),
(21, 'YT', 'Whitehorse'),
(22, 'NB', 'Moncton'),
(23, 'ON', 'Windsor'),
(24, 'NU', 'Iqaluit');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `pID` int(11) NOT NULL,
  `dateTime` datetime NOT NULL,
  `postID` int(11) DEFAULT NULL,
  `userEmail` varchar(40) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`pID`, `dateTime`, `postID`, `userEmail`, `link`) VALUES
(2, '2019-03-10 02:55:05', NULL, 'bbbbra@hotmail.com', 'https://c8.alamy.com/comp/M2AFH6/profile-icon-flat-design-square-internet-banner-M2AFH6.jpg'),
(3, '2019-03-10 02:55:05', -5, 'damien@company.com.net', 'https://www.clipartkey.com/mpngs/m/320-3203558_cartoon-happy-person-face.png'),
(4, '2019-03-10 02:55:05', -5, 'damien@company.com.net', 'https://i.ibb.co/bBbhLcs/how-to-stop-iron.png'),
(5, '2019-03-10 02:55:05', NULL, 'mn@gmail.com', 'https://st3.depositphotos.com/7107694/14275/v/1600/depositphotos_142759647-stock-illustration-woman-profile-rounded-square-button.jpg'),
(6, '2019-02-10 02:55:05', NULL, 'damien@company.com.net', 'https://previews.123rf.com/images/jemastock/jemastock1905/jemastock190507913/122681407-young-man-smiling-abstract-cartoon-profile-over-square-frame-background-vector-illustration-graphic-.jpg'),
(9, '2019-03-10 02:56:05', -2, 'bbbbra@hotmail.com', 'https://i.imgur.com/lUxNX6B.png'),
(14, '2019-03-10 02:55:05', NULL, 'bbbb@hotmail.com', 'https://previews.123rf.com/images/jemastock/jemastock1905/jemastock190507681/122681211-young-man-smiling-abstract-cartoon-profile-over-square-frame-background-vector-illustration-graphic-.jpg'),
(37, '2020-06-14 05:41:05', -15, 'bbbb@hotmail.com', 'https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png'),
(38, '2020-06-14 05:41:05', -15, 'bbbb@hotmail.com', 'https://yutongli291.github.io/images/200px-Alstroemeria_Records_icon.png'),
(57, '2020-06-14 06:37:52', NULL, 'pastaaglioolio@gmail.com', 'https://previews.123rf.com/images/alexwhite/alexwhite1704/alexwhite170401620/75892783-profile-black-color-web-modern-brillant-design-square-internet-icon-on-white-background-.jpg'),
(59, '2020-06-15 12:09:10', NULL, 'ohboy@gmail.com', 'https://st3.depositphotos.com/7107694/13966/v/1600/depositphotos_139666438-stock-illustration-head-profile-rounded-square-button.jpg'),
(84, '2020-06-15 05:27:42', NULL, 'madmattcrazy@gmail.com', 'https://image.shutterstock.com/image-vector/profile-square-rounded-600w-754449553.jpg'),
(85, '2020-06-16 09:14:36', NULL, 'rainbowzom2@gmail.com', 'https://grid.gograph.com/woman-smiling-cartoon-profile-vector-stock_gg117109880.jpg'),
(87, '2020-06-16 01:48:24', NULL, 'matt@gmail.com', 'https://i0.wp.com/thefwoosh.com/wp-content/uploads/2015/05/Square-Enix-Play-Arts-Kai-Variant-Star-Wars-Darth-Maul-4.jpg'),
(88, '2020-06-16 20:49:24', -28, 'matt@gmail.com', 'https://b1.pngbarn.com/png/128/731/star-wars-darth-maul-png-clip-art.png'),
(89, '2020-06-16 20:49:51', -29, 'matt@gmail.com', 'https://www.vhv.rs/dpng/d/173-1738573_transparent-darth-sidious-png-emperor-palpatine-png-download.png'),
(90, '2020-06-16 02:00:47', NULL, 'jackofalltrades@gmail.com', 'https://c8.alamy.com/comp/PB4K33/set-young-mens-profile-cartoon-in-colorful-square-frames-vector-illustration-graphic-design-PB4K33.jpg'),
(91, '2020-06-16 21:02:32', -30, 'jackofalltrades@gmail.com', 'https://w7.pngwing.com/pngs/614/160/png-transparent-adjustable-spanner-spanners-tool-screwdriver-miscellaneous-technic-wrench.png'),
(92, '2020-06-16 02:44:37', NULL, 'princess@rebellion.com', 'https://pyxis.nymag.com/v1/imgs/6c8/e37/93e7a6237b7956e2bc8a4b206107c69b33-27-princess-leia-hair.2x.rsquare.w536.jpg'),
(93, '2020-06-16 02:49:25', NULL, 'ahsokatano@republic.com', 'https://media.comicbook.com/2017/05/rosario-dawson-ahsoka-may-the-4th-994644-1280x0.jpg'),
(94, '2020-06-16 03:00:55', NULL, 'senatoramidala@republic.com', 'https://upload.wikimedia.org/wikipedia/en/thumb/e/ee/Amidala.png/220px-Amidala.png'),
(95, '2020-06-16 04:01:34', NULL, 'jynerso@galaxy.com', 'https://a1cf74336522e87f135f-2f21ace9a6cf0052456644b80fa06d4f.ssl.cf2.rackcdn.com/images/characters_opt/rogue-one-felicity.jpg'),
(96, '2020-06-16 04:04:15', NULL, 'mazkanata@resistance.com', 'https://vignette.wikia.nocookie.net/starwars/images/e/e6/Maz_Kanata_HS.png/revision/latest/scale-to-width-down/500?cb=20171111230137'),
(97, '2020-06-16 04:06:49', NULL, 'poedameron@resistance.com', 'https://ucarecdn.com/2cd7c508-e0d8-40bb-a381-e749cc1fc322/-/crop/340x340/43,0/-/preview/-/progressive/yes/-/format/auto/-/scale_crop/900x900/'),
(98, '2020-06-16 04:23:14', NULL, 'finn@resistance.com', 'https://vignette.wikia.nocookie.net/starwars/images/9/92/Finn_Advanced_Graphics_TROS.png/revision/latest/top-crop/width/360/height/360?cb=20191007104455'),
(99, '2020-06-16 04:29:31', NULL, 'sidious@empire.com', 'https://cdn.vox-cdn.com/thumbor/_-gAOr8q3J-eZkudCnonGey-DB4=/1400x1400/filters:format(jpeg)/cdn.vox-cdn.com/uploads/chorus_asset/file/19542877/star_wars6_movie_screencaps.com_13433.jpg'),
(100, '2020-06-16 04:34:42', NULL, 'valkyrie@asgard.com', 'https://i.insider.com/5cddb42b93a15203f34b2b07?width=1100&format=jpeg&auto=webp'),
(101, '2020-06-16 04:37:35', NULL, 'sif@asgard.com', 'https://i.pinimg.com/originals/1b/33/0c/1b330cda3975ee2157ff4ca9ff8397be.jpg'),
(102, '2020-06-16 05:55:55', NULL, 'sam0620@gmail.com', 'https://images-na.ssl-images-amazon.com/images/I/31TJRmPcMwL._AC_.jpg'),
(103, '2020-06-17 01:00:23', -31, 'sam0620@gmail.com', 'https://thumbor.forbes.com/thumbor/960x0/https%3A%2F%2Fblogs-images.forbes.com%2Ferikkain%2Ffiles%2F2015%2F11%2Fsad-mabel-1200x673.jpg'),
(104, '2020-06-17 01:03:43', -32, 'sam0620@gmail.com', 'https://www.syfy.com/sites/syfy/files/styles/1200x680_hero/public/2017/12/gravity-falls-louisck_0.png'),
(105, '2020-06-17 01:23:26', -33, 'sam0620@gmail.com', 'https://pngimg.com/uploads/pigeon/pigeon_PNG54605.png'),
(106, '2020-06-17 01:28:20', -34, 'bbbb@hotmail.com', 'https://pngimg.com/uploads/pigeon/pigeon_PNG54608.png'),
(107, '2020-06-17 01:34:04', -35, 'bbbb@hotmail.com', 'https://pngimg.com/uploads/pigeon/pigeon_PNG54608.png'),
(108, '2020-06-17 01:44:44', -38, 'bbbb@hotmail.com', 'https://www.nationalgeographic.com/content/dam/animals/thumbs/rights-exempt/mammals/g/giraffe_thumb.JPG'),
(109, '2020-06-17 01:46:21', -39, 'bbbb@hotmail.com', 'https://www.nationalgeographic.com/content/dam/yourshot/2013/05/1534087.jpg'),
(110, '2020-06-17 01:53:27', -45, 'bbbb@hotmail.com', 'https://cdn.mos.cms.futurecdn.net/mEuBJTDhXuTfSKdLefzSKg-320-80.jpg'),
(111, '2020-06-17 01:54:54', -46, 'bbbb@hotmail.com', 'https://i.dlpng.com/static/png/1463155--animals-png-rk-editing-png-cb-edits-png-animal-png-400_256_preview.png'),
(112, '2020-06-17 01:54:54', -46, 'bbbb@hotmail.com', ' https://img.favpng.com/12/21/23/eurasian-beaver-north-american-beaver-rodent-computer-file-png-favpng-A8wiTKUerw4MF4kgB5fCYMsvn.jpg'),
(113, '2020-06-16 07:18:33', NULL, 'asakusa@gmail.com', 'https://i.pinimg.com/originals/73/8f/4e/738f4e326b9407674eeb57e096699778.jpg'),
(114, '2020-06-17 03:48:23', -47, 'asakusa@gmail.com', 'https://3.bp.blogspot.com/-CcKPZ_trGfE/VPcMROcZC7I/AAAAAAAAAS0/x8kcWvmgfQ0/s1600/13471701762081456105.jpg'),
(115, '2020-06-17 03:48:59', -48, 'asakusa@gmail.com', 'https://i.pinimg.com/originals/73/8f/4e/738f4e326b9407674eeb57e096699778.jpg'),
(116, '2020-06-17 03:49:00', -48, 'asakusa@gmail.com', 'https://www.kageninjagear.com/wp-content/uploads/2017/05/Ninja-Uniforms.jpg'),
(117, '2020-06-16 10:01:39', NULL, 'eyes@eyeball.ta', 'https://discordemoji.com/assets/emoji/blurryeyes.png'),
(118, '2020-06-16 10:05:15', NULL, 'tokugawa@ieyasu.jp', 'https://www.history.com/.image/c_fill%2Ccs_srgb%2Cfl_progressive%2Ch_400%2Cq_auto:good%2Cw_620/MTU3ODc5MDgwMjU4Nzc0MzQ1/tokugawa-ieyasu.jpg'),
(119, '2020-06-16 10:14:49', NULL, 'cpsc304@ubc.ca', 'https://miro.medium.com/max/4800/1*nYBhehbAb3qqVskf8enovg.png'),
(120, '2020-06-17 15:22:44', -49, 'ohboy@gmail.com', 'https://i.ytimg.com/vi/azl8YypBVfY/hqdefault.jpg'),
(121, '2020-06-17 15:22:44', -49, 'ohboy@gmail.com', ' https://i.ytimg.com/vi/r-5_-svPiWU/hqdefault.jpg'),
(122, '2020-06-17 15:22:44', -49, 'ohboy@gmail.com', ' https://images.genius.com/c2addc2827a67aa5cc3f7ed8c46154dd.600x600x1.jpg'),
(123, '2020-06-17 09:30:22', NULL, 'din@mandalorian.com', 'https://pyxis.nymag.com/v1/imgs/0d1/16b/2f119060d9e2edebee3ab175a38147b8ac-12-the-mandalorian.rsquare.w700.jpg'),
(124, '2020-06-17 16:40:50', -50, 'din@mandalorian.com', 'https://www.vhv.rs/dpng/d/408-4088574_star-wars-cute-baby-yoda-png-file-cute.png'),
(130, '2020-06-18 22:13:30', -51, 'ohboy@gmail.com', 'https://static01.nyt.com/images/2019/11/05/science/28TB-SUNSET1/merlin_163473282_fe17fc6b-78b6-4cdd-b301-6f63e6ebdd7a-superJumbo.jpg'),
(131, '2020-06-18 22:13:30', -51, 'ohboy@gmail.com', ' https://www.w3schools.com/w3css/img_lights.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pictureposts`
--

CREATE TABLE `pictureposts` (
  `postID` int(11) NOT NULL,
  `location` int(11) DEFAULT NULL,
  `userEmail` varchar(40) DEFAULT NULL,
  `dateTime` datetime NOT NULL,
  `picMood` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pictureposts`
--

INSERT INTO `pictureposts` (`postID`, `location`, `userEmail`, `dateTime`, `picMood`) VALUES
(-51, 8, 'ohboy@gmail.com', '2020-06-18 22:13:29', 'imdead'),
(-50, 18, 'din@mandalorian.com', '2020-06-17 16:40:50', 'Love'),
(-49, 4, 'ohboy@gmail.com', '2020-06-17 15:22:44', 'man i love these son'),
(-48, 2, 'asakusa@gmail.com', '2020-06-17 03:48:59', 'Cool'),
(-47, 9, 'asakusa@gmail.com', '2020-06-17 03:48:23', 'Cool'),
(-46, 14, 'bbbb@hotmail.com', '2020-06-17 01:54:54', 'imdead'),
(-45, 13, 'bbbb@hotmail.com', '2020-06-17 01:53:27', 'Tired'),
(-39, 20, 'bbbb@hotmail.com', '2020-06-17 01:46:20', 'imdead'),
(-38, 24, 'bbbb@hotmail.com', '2020-06-17 01:44:44', 'OOOO'),
(-35, 20, 'bbbb@hotmail.com', '2020-06-17 01:34:03', 'AHHHH'),
(-34, 3, 'bbbb@hotmail.com', '2020-06-17 01:28:19', 'Derpy'),
(-33, 18, 'sam0620@gmail.com', '2020-06-17 01:23:26', 'Lonely'),
(-32, 2, 'sam0620@gmail.com', '2020-06-17 01:03:42', 'Questionable'),
(-31, 9, 'sam0620@gmail.com', '2020-06-17 01:00:22', 'Sad'),
(-30, 3, 'jackofalltrades@gmail.com', '2020-06-16 21:02:31', 'Happy'),
(-29, 16, 'matt@gmail.com', '2020-06-16 20:49:50', 'Happy'),
(-28, 16, 'matt@gmail.com', '2020-06-16 20:49:24', 'Angry'),
(-15, 5, 'bbbb@hotmail.com', '2020-06-14 05:41:05', 'Lonely'),
(-5, 4, 'damien@company.com.net', '2020-06-05 12:35:00', 'happy'),
(-2, 1, 'bbbbra@hotmail.com', '2019-03-10 02:56:05', 'imdead');

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('sql3346244', '[{\"db\":\"sql3346244\",\"table\":\"pictureposts\"},{\"db\":\"sql3346244\",\"table\":\"location\"},{\"db\":\"sql3346244\",\"table\":\"relationships\"},{\"db\":\"sql3346244\",\"table\":\"users\"},{\"db\":\"sql3346244\",\"table\":\"photos\"},{\"db\":\"sql3346244\",\"table\":\"creditcards\"},{\"db\":\"sql3346244\",\"table\":\"textposts\"},{\"db\":\"sql3346244\",\"table\":\"usermatchescontains\"},{\"db\":\"sql3346244\",\"table\":\"reactstextposts\"},{\"db\":\"sql3346244\",\"table\":\"reactspicposts\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float UNSIGNED NOT NULL DEFAULT '0',
  `y` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('sql3346244', 'sql3346244', 'creditcards', '{\"sorted_col\":\"`userEmail`  DESC\"}', '2020-06-17 16:47:11'),
('sql3346244', 'sql3346244', 'hasusermessages', '{\"sorted_col\":\"`hasusermessages`.`timeSent` DESC\"}', '2020-06-17 17:47:20'),
('sql3346244', 'sql3346244', 'location', '{\"sorted_col\":\"`location`.`province` ASC\"}', '2020-06-18 22:05:22'),
('sql3346244', 'sql3346244', 'photos', '{\"sorted_col\":\"`photos`.`pID`  DESC\"}', '2020-06-18 22:01:19'),
('sql3346244', 'sql3346244', 'pictureposts', '{\"sorted_col\":\"`pictureposts`.`userEmail` ASC\"}', '2020-06-18 22:25:18'),
('sql3346244', 'sql3346244', 'reactspicposts', '{\"sorted_col\":\"`userEmail` ASC\"}', '2020-06-17 16:51:22'),
('sql3346244', 'sql3346244', 'reactstextposts', '{\"sorted_col\":\"`reactstextposts`.`userEmail` ASC\"}', '2020-06-17 18:14:27'),
('sql3346244', 'sql3346244', 'swipes', '{\"sorted_col\":\"`swipes`.`sID`  DESC\"}', '2020-06-18 22:21:14'),
('sql3346244', 'sql3346244', 'textposts', '{\"sorted_col\":\"`textposts`.`userEmail` ASC\"}', '2020-06-17 18:08:55'),
('sql3346244', 'sql3346244', 'users', '{\"sorted_col\":\"`email` ASC\"}', '2020-06-18 21:11:03');

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('sql3346244', '2020-06-10 02:59:39', '{\"collation_connection\":\"utf8mb4_unicode_ci\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

-- --------------------------------------------------------

--
-- Table structure for table `reactiontext`
--

CREATE TABLE `reactiontext` (
  `type` varchar(10) NOT NULL,
  `reactionText` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reactiontext`
--

INSERT INTO `reactiontext` (`type`, `reactionText`) VALUES
('angry', ' is angry about this'),
('happy', ' is happy about this'),
('like', ' likes this'),
('love', ' loves this'),
('sad', ' cries from this');

-- --------------------------------------------------------

--
-- Table structure for table `reactspicposts`
--

CREATE TABLE `reactspicposts` (
  `postID` int(11) NOT NULL,
  `userEmail` varchar(40) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reactspicposts`
--

INSERT INTO `reactspicposts` (`postID`, `userEmail`, `type`) VALUES
(-48, 'asakusa@gmail.com', 'angry'),
(-32, 'sam0620@gmail.com', 'angry'),
(-15, 'bbbb@hotmail.com', 'angry'),
(-2, 'bbbb@hotmail.com', 'angry'),
(-30, 'jackofalltrades@gmail.com', 'happy'),
(-47, 'asakusa@gmail.com', 'like'),
(-28, 'matt@gmail.com', 'like'),
(-29, 'matt@gmail.com', 'love'),
(-5, 'bbbbra@hotmail.com', 'love'),
(-5, 'mn@gmail.com', 'love'),
(-5, 'ohboy@gmail.com', 'love'),
(-31, 'sam0620@gmail.com', 'sad'),
(-15, 'bbbbra@hotmail.com', 'sad');

-- --------------------------------------------------------

--
-- Table structure for table `reactstextposts`
--

CREATE TABLE `reactstextposts` (
  `postID` int(11) NOT NULL,
  `userEmail` varchar(40) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reactstextposts`
--

INSERT INTO `reactstextposts` (`postID`, `userEmail`, `type`) VALUES
(5, 'damien@company.com.net', 'angry'),
(11, 'bbbb@hotmail.com', 'angry'),
(37, 'asakusa@gmail.com', 'angry'),
(3, 'bbbb@hotmail.com', 'happy'),
(32, 'matt@gmail.com', 'happy'),
(34, 'jackofalltrades@gmail.com', 'happy'),
(41, 'din@mandalorian.com', 'happy'),
(20, 'bbbb@hotmail.com', 'like'),
(3, 'bbbbra@hotmail.com', 'love'),
(21, 'bbbb@hotmail.com', 'love'),
(38, 'asakusa@gmail.com', 'love'),
(42, 'ohboy@gmail.com', 'love');

-- --------------------------------------------------------

--
-- Table structure for table `relationships`
--

CREATE TABLE `relationships` (
  `rID` int(11) NOT NULL,
  `description` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `relationships`
--

INSERT INTO `relationships` (`rID`, `description`) VALUES
(5, 'Asexual'),
(4, 'Casual'),
(2, 'Monogamous'),
(3, 'Platonic'),
(1, 'Polyamorous');

-- --------------------------------------------------------

--
-- Table structure for table `swipes`
--

CREATE TABLE `swipes` (
  `sID` int(11) NOT NULL,
  `swiper` varchar(40) DEFAULT NULL,
  `swipee` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `swipes`
--

INSERT INTO `swipes` (`sID`, `swiper`, `swipee`) VALUES
(10, NULL, NULL),
(23, NULL, NULL),
(12, NULL, 'bbbb@hotmail.com'),
(8, NULL, 'bbbbra@hotmail.com'),
(9, NULL, 'bbbbra@hotmail.com'),
(7, NULL, 'mn@gmail.com'),
(11, NULL, 'mn@gmail.com'),
(13, NULL, 'pastaaglioolio@gmail.com'),
(42, 'ahsokatano@republic.com', 'asakusa@gmail.com'),
(48, 'ahsokatano@republic.com', 'bbbb@hotmail.com'),
(47, 'ahsokatano@republic.com', 'bbbbra@hotmail.com'),
(41, 'ahsokatano@republic.com', 'mn@gmail.com'),
(40, 'ahsokatano@republic.com', 'poedameron@resistance.com'),
(39, 'ahsokatano@republic.com', 'princess@rebellion.com'),
(43, 'ahsokatano@republic.com', 'sam0620@gmail.com'),
(49, 'ahsokatano@republic.com', 'sif@asgard.com'),
(34, 'asakusa@gmail.com', 'ahsokatano@republic.com'),
(57, 'asakusa@gmail.com', 'bbbb@hotmail.com'),
(60, 'asakusa@gmail.com', 'bbbbra@hotmail.com'),
(68, 'asakusa@gmail.com', 'cpsc304@ubc.ca'),
(67, 'asakusa@gmail.com', 'damien@company.com.net'),
(61, 'asakusa@gmail.com', 'eyes@eyeball.ta'),
(33, 'asakusa@gmail.com', 'finn@resistance.com'),
(64, 'asakusa@gmail.com', 'jackofalltrades@gmail.com'),
(62, 'asakusa@gmail.com', 'jynerso@galaxy.com'),
(56, 'asakusa@gmail.com', 'madmattcrazy@gmail.com'),
(38, 'asakusa@gmail.com', 'mn@gmail.com'),
(32, 'asakusa@gmail.com', 'ohboy@gmail.com'),
(59, 'asakusa@gmail.com', 'pastaaglioolio@gmail.com'),
(63, 'asakusa@gmail.com', 'poedameron@resistance.com'),
(36, 'asakusa@gmail.com', 'princess@rebellion.com'),
(35, 'asakusa@gmail.com', 'rainbowzom2@gmail.com'),
(58, 'asakusa@gmail.com', 'sam0620@gmail.com'),
(65, 'asakusa@gmail.com', 'sidious@empire.com'),
(66, 'asakusa@gmail.com', 'sif@asgard.com'),
(69, 'asakusa@gmail.com', 'tokugawa@ieyasu.jp'),
(37, 'asakusa@gmail.com', 'valkyrie@asgard.com'),
(2, 'bbbb@hotmail.com', NULL),
(19, 'bbbb@hotmail.com', 'damien@company.com.net'),
(20, 'bbbb@hotmail.com', 'madmattcrazy@gmail.com'),
(6, 'bbbb@hotmail.com', 'mn@gmail.com'),
(1, 'bbbbra@hotmail.com', NULL),
(22, 'bbbbra@hotmail.com', 'madmattcrazy@gmail.com'),
(5, 'bbbbra@hotmail.com', 'mn@gmail.com'),
(55, 'cpsc304@ubc.ca', 'senatoramidala@republic.com'),
(4, 'damien@company.com.net', 'bbbbra@hotmail.com'),
(52, 'damien@company.com.net', 'ohboy@gmail.com'),
(73, 'din@mandalorian.com', 'asakusa@gmail.com'),
(74, 'din@mandalorian.com', 'cpsc304@ubc.ca'),
(80, 'din@mandalorian.com', 'damien@company.com.net'),
(76, 'din@mandalorian.com', 'finn@resistance.com'),
(81, 'din@mandalorian.com', 'madmattcrazy@gmail.com'),
(79, 'din@mandalorian.com', 'matt@gmail.com'),
(75, 'din@mandalorian.com', 'ohboy@gmail.com'),
(72, 'din@mandalorian.com', 'pastaaglioolio@gmail.com'),
(83, 'din@mandalorian.com', 'poedameron@resistance.com'),
(82, 'din@mandalorian.com', 'sam0620@gmail.com'),
(77, 'din@mandalorian.com', 'sidious@empire.com'),
(78, 'din@mandalorian.com', 'tokugawa@ieyasu.jp'),
(28, 'jackofalltrades@gmail.com', 'bbbbra@hotmail.com'),
(27, 'jackofalltrades@gmail.com', 'mn@gmail.com'),
(29, 'jackofalltrades@gmail.com', 'rainbowzom2@gmail.com'),
(21, 'madmattcrazy@gmail.com', NULL),
(18, 'madmattcrazy@gmail.com', 'bbbb@hotmail.com'),
(17, 'madmattcrazy@gmail.com', 'bbbbra@hotmail.com'),
(16, 'madmattcrazy@gmail.com', 'mn@gmail.com'),
(15, 'madmattcrazy@gmail.com', 'ohboy@gmail.com'),
(14, 'madmattcrazy@gmail.com', 'pastaaglioolio@gmail.com'),
(26, 'matt@gmail.com', 'bbbbra@hotmail.com'),
(24, 'matt@gmail.com', 'mn@gmail.com'),
(25, 'matt@gmail.com', 'rainbowzom2@gmail.com'),
(3, 'mn@gmail.com', NULL),
(71, 'ohboy@gmail.com', 'bbbb@hotmail.com'),
(51, 'ohboy@gmail.com', 'damien@company.com.net'),
(44, 'ohboy@gmail.com', 'jackofalltrades@gmail.com'),
(46, 'ohboy@gmail.com', 'madmattcrazy@gmail.com'),
(86, 'ohboy@gmail.com', 'matt@gmail.com'),
(45, 'ohboy@gmail.com', 'sif@asgard.com'),
(50, 'ohboy@gmail.com', 'valkyrie@asgard.com'),
(84, 'poedameron@resistance.com', 'damien@company.com.net'),
(85, 'poedameron@resistance.com', 'din@mandalorian.com'),
(70, 'rainbowzom2@gmail.com', 'princess@rebellion.com'),
(31, 'sam0620@gmail.com', 'damien@company.com.net'),
(30, 'sam0620@gmail.com', 'finn@resistance.com'),
(54, 'tokugawa@ieyasu.jp', 'bbbbra@hotmail.com'),
(53, 'tokugawa@ieyasu.jp', 'ohboy@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `textposts`
--

CREATE TABLE `textposts` (
  `postID` int(11) NOT NULL,
  `location` int(11) DEFAULT NULL,
  `userEmail` varchar(40) DEFAULT NULL,
  `dateTime` datetime NOT NULL,
  `textMood` varchar(20) DEFAULT NULL,
  `content` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `textposts`
--

INSERT INTO `textposts` (`postID`, `location`, `userEmail`, `dateTime`, `textMood`, `content`) VALUES
(3, 1, 'bbbbra@hotmail.com', '2018-04-11 04:23:00', 'Blessed', 'Just got 100 on the cpsc 304 midterm!!!!! '),
(5, 4, 'damien@company.com.net', '2028-09-05 12:35:00', 'Happy', 'Just landed a sweet contract with CAKS!'),
(10, 6, 'bbbb@hotmail.com', '2020-06-10 06:05:47', 'Lonely', 'Anyone down to go get dinner together tonight? Im lonely :(((((('),
(11, 7, 'bbbb@hotmail.com', '2020-06-10 06:08:47', 'Joyeux', 'J\'aime le pain, j\'adore les baguettes.'),
(13, 8, 'bbbb@hotmail.com', '2020-06-10 06:13:48', 'Nice', 'Going for a walk'),
(19, 0, 'bbbb@hotmail.com', '2020-06-14 20:17:13', 'Happy', 'At stanley park! '),
(20, 8, 'bbbb@hotmail.com', '2020-06-14 20:17:37', 'Joyous', 'Loving the ottawa sun'),
(21, 18, 'bbbb@hotmail.com', '2020-06-14 20:18:20', 'Nice', 'Charlottetown is real nice'),
(32, 16, 'matt@gmail.com', '2020-06-16 20:47:44', 'Angry', 'May the force be with me'),
(34, 3, 'jackofalltrades@gmail.com', '2020-06-16 21:01:45', 'Happy', 'Call me @ 778588569855 to fix anything!'),
(35, 19, 'matt@gmail.com', '2020-06-16 21:06:36', 'Joyous', 'I killed Qui-Gon Jinn'),
(37, 2, 'asakusa@gmail.com', '2020-06-17 02:16:18', 'Cool', 'Hey'),
(38, 9, 'asakusa@gmail.com', '2020-06-17 03:50:54', 'Cool', 'wassup'),
(39, 18, 'damien@company.com.net', '2020-06-17 03:58:54', 'shleepy', 'shleepy'),
(40, 8, 'sam0620@gmail.com', '2020-06-17 14:53:48', 'Happy', 'Doing a postypost'),
(41, 8, 'din@mandalorian.com', '2020-06-17 16:31:31', 'Neutral', 'This is the way.'),
(42, 24, 'ohboy@gmail.com', '2020-06-18 22:11:32', 'Happy?', 'Its a demo');

-- --------------------------------------------------------

--
-- Table structure for table `usermatchescontains`
--

CREATE TABLE `usermatchescontains` (
  `date` date NOT NULL,
  `firstUser` varchar(40) DEFAULT NULL,
  `secondUser` varchar(40) DEFAULT NULL,
  `cID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usermatchescontains`
--

INSERT INTO `usermatchescontains` (`date`, `firstUser`, `secondUser`, `cID`) VALUES
('2020-05-31', 'bbbbra@hotmail.com', NULL, 1),
('2020-06-01', 'bbbb@hotmail.com', NULL, 2),
('2020-06-12', NULL, NULL, 3),
('2020-04-15', 'bbbbra@hotmail.com', 'mn@gmail.com', 4),
('2020-03-10', 'bbbbra@hotmail.com', 'bbbb@hotmail.com', 5),
('2020-06-16', 'madmattcrazy@gmail.com', 'bbbb@hotmail.com', 6),
('2020-06-16', 'madmattcrazy@gmail.com', 'bbbbra@hotmail.com', 7),
('2020-06-17', 'asakusa@gmail.com', 'ahsokatano@republic.com', 8),
('2020-06-17', 'madmattcrazy@gmail.com', 'ohboy@gmail.com', 9),
('2020-06-17', 'ohboy@gmail.com', 'damien@company.com.net', 10),
('2020-06-17', 'din@mandalorian.com', 'poedameron@resistance.com', 11);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(40) NOT NULL DEFAULT 'deleted_user',
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `nickName` varchar(30) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `age` int(11) NOT NULL,
  `location` int(11) NOT NULL,
  `password` varchar(30) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `prefersGender` varchar(20) NOT NULL,
  `relationship` int(11) DEFAULT NULL,
  `profile_pic` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `firstName`, `lastName`, `nickName`, `description`, `age`, `location`, `password`, `gender`, `prefersGender`, `relationship`, `profile_pic`) VALUES
('ahsokatano@republic.com', 'Ahsoka', 'Tano', 'Rosario Dawson', 'I am gonna be famous when season 2 of The Mandalorian drops.', 42, 13, 'tanoahsoka', 'F', 'M', 3, 93),
('asakusa@gmail.com', 'Asakusa', 'Ushiro', 'Asahi', 'ç§ã¯å¿è€…ã§ã™', 20, 0, 'asakusa', 'M', 'F', 1, 113),
('bbbb@hotmail.com', 'Bob', 'Builder', 'The', 'Tiny blue gremlin.', 17, 3, '12345', 'M', 'F', 2, 14),
('bbbbra@hotmail.com', 'Bobra', 'Murph', 'Bobby', 'I am a fun-loving gal who is a happy dog-dad to my pup Tito. My friends would probably describe me as goofy but somehow I always end up being the responsible one. I do a lot on the weekend. If you dont mind the dog or a little bit of a goof we could be a pretty good pair. ', 18, 4, '123456', 'F', 'M', 2, 2),
('cpsc304@ubc.ca', 'CPSC', '304', 'Introduction to Relational Dat', 'Overview of database systems, ER models, logical database design and normalization, formal relational query languages, SQL and other commercial languages,data warehouses, special topics.', 20, 0, 'cpsc304', 'M', 'F', 4, 119),
('damien@company.com.net', 'Damien', 'Deacon', 'DeeDee', 'Coal company spokesperson.', 36, 1, 'xJ^rHF4ZdNS^Qa`e', 'M', 'F', 3, 6),
('din@mandalorian.com', 'Din', 'Djarin', 'Mando', 'You can\'t see my face.', 45, 8, 'mando', 'M', 'M', 2, 123),
('eyes@eyeball.ta', 'Ivan', 'Melonball', 'sauteed-onion', 'My eyes are rolling in the deep.', 55, 16, 'dancedancedance', 'F', 'M', 1, 117),
('finn@resistance.com', 'Finn', '2187', 'Finn', 'I was a stormtrooper, please don\'t judge.', 30, 22, 'FN-2187', 'M', 'M', 4, 98),
('jackofalltrades@gmail.com', 'Jack', 'Trades', 'Jackie', 'Sup', 21, 3, 'tradeofjacks', 'M', 'F', 4, 90),
('jynerso@galaxy.com', 'Jyn', 'Erso', 'Stardust', 'About to sacrifice myself to retrieve the Death Star plans!', 23, 20, 'missmydad', 'F', 'M', 1, 95),
('madmattcrazy@gmail.com', 'Esa', 'Ahani', 'Matt', 'Fear me', 27, 0, '2k2k2k2m', 'M', 'F', 1, 84),
('matt@gmail.com', 'Maul', 'Darth', 'Maul', 'Matt stole my profile pic, so I stole his email.', 90, 16, '000000', 'M', 'F', 4, 87),
('mazkanata@resistance.com', 'Maz', 'Kanata', 'Pirate Queen', 'What is this nonsense Han told me to sign up for??', 88, 6, 'forceisgood', 'F', 'M', 2, 96),
('mn@gmail.com', 'Marcie', 'Newman', 'MNewman', 'Likes long walks through haunted houses.', 99, 2, 'somekindapasswordidk', 'F', 'F', 2, 5),
('ohboy@gmail.com', 'Oh', 'Boy', 'Help', 'uh another test', 22, 13, 'AAA', 'M', 'M', 5, 59),
('pastaaglioolio@gmail.com', 'Pasta ', 'Aglio e Olio', 'Aglio', 'I loveeee aglio olio', 24, 9, 'pastaisgood', 'M', 'F', 1, 57),
('poedameron@resistance.com', 'Poe', 'Dameron', 'Poe', 'I dare ya to race me.', 42, 1, 'bestpilot', 'M', 'M', 3, 97),
('princess@rebellion.com', 'Leia', 'Organa', 'Princess', 'I stopped the Empire, suck it.', 68, 18, 'deathstarsux', 'F', 'M', 1, 92),
('rainbowzom2@gmail.com', 'Raine', 'Lee', 'Hot Jim', 'I love queries', 34, 14, 'password', 'F', 'F', 1, 85),
('sam0620@gmail.com', 'Samantha', 'Hsu', '...', 'Sorry ladies, but I\'m single!', 19, 0, 'help', 'M', 'F', 3, 102),
('senatoramidala@republic.com', 'Padme', 'Amidala', 'Senator', 'Anakin turned because of me.', 18, 24, 'iluvanakin', 'F', 'M', 4, 94),
('sidious@empire.com', 'Palpatine', 'Sheev', 'Darth Sidious', 'Disney will not let me die.', 100, 10, 'empirerules', 'M', 'M', 1, 99),
('sif@asgard.com', 'Sif', 'Asgardian', 'Lady Sif', 'I got written out of Marvel movies.', 100, 17, 'warriorsthree', 'F', 'F', 4, 101),
('tokugawa@ieyasu.jp', 'Ieyasu', 'Tokugawa', 'Ieyasu', 'è²´æ§˜ã¯ã‚‚ã†ã—ã‚“ã§ã„ã‚‹ã€‚', 32, 0, 'bushido', 'M', 'F', 1, 118),
('valkyrie@asgard.com', 'Brunnhilde', 'Asgardian', 'Valkyrie', 'I have a flying horse.', 100, 12, 'alcohol', 'F', 'F', 3, 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agestatus`
--
ALTER TABLE `agestatus`
  ADD PRIMARY KEY (`age`);

--
-- Indexes for table `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`bID`),
  ADD KEY `blocker` (`blocker`),
  ADD KEY `blockee` (`blockee`);

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`cID`);

--
-- Indexes for table `creditcards`
--
ALTER TABLE `creditcards`
  ADD PRIMARY KEY (`PAN`),
  ADD KEY `FK_CreditCardEmail` (`userEmail`);

--
-- Indexes for table `hasusermessages`
--
ALTER TABLE `hasusermessages`
  ADD PRIMARY KEY (`cID`,`meID`),
  ADD KEY `FK_HUM` (`userEmail`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`locID`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`pID`),
  ADD KEY `FK_Photos` (`postID`),
  ADD KEY `FK_Photos1` (`userEmail`);

--
-- Indexes for table `pictureposts`
--
ALTER TABLE `pictureposts`
  ADD PRIMARY KEY (`postID`),
  ADD KEY `FK_PP` (`location`),
  ADD KEY `FK_PP2` (`userEmail`);

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- Indexes for table `reactiontext`
--
ALTER TABLE `reactiontext`
  ADD PRIMARY KEY (`type`);

--
-- Indexes for table `reactspicposts`
--
ALTER TABLE `reactspicposts`
  ADD PRIMARY KEY (`postID`,`userEmail`),
  ADD KEY `FK_RPP1` (`type`),
  ADD KEY `FK_RPP2` (`userEmail`);

--
-- Indexes for table `reactstextposts`
--
ALTER TABLE `reactstextposts`
  ADD PRIMARY KEY (`postID`,`userEmail`),
  ADD KEY `FK_RTP1` (`type`),
  ADD KEY `FK_RTP2` (`userEmail`);

--
-- Indexes for table `relationships`
--
ALTER TABLE `relationships`
  ADD PRIMARY KEY (`rID`),
  ADD UNIQUE KEY `UC_Relationships` (`description`);

--
-- Indexes for table `swipes`
--
ALTER TABLE `swipes`
  ADD PRIMARY KEY (`sID`),
  ADD UNIQUE KEY `UC_Swipes` (`swiper`,`swipee`),
  ADD KEY `swiper` (`swiper`),
  ADD KEY `swipee` (`swipee`);

--
-- Indexes for table `textposts`
--
ALTER TABLE `textposts`
  ADD PRIMARY KEY (`postID`),
  ADD KEY `FK_TP` (`location`),
  ADD KEY `FK_TP2` (`userEmail`);

--
-- Indexes for table `usermatchescontains`
--
ALTER TABLE `usermatchescontains`
  ADD PRIMARY KEY (`cID`),
  ADD UNIQUE KEY `UC_singleMatch` (`firstUser`,`secondUser`),
  ADD KEY `firstUser` (`firstUser`),
  ADD KEY `secondUser` (`secondUser`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`),
  ADD KEY `FK_location` (`location`),
  ADD KEY `FK_age` (`age`),
  ADD KEY `FK_relationship` (`relationship`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `pID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `blocks`
--
ALTER TABLE `blocks`
  ADD CONSTRAINT `blocks_ibfk_1` FOREIGN KEY (`blocker`) REFERENCES `users` (`email`) ON DELETE SET NULL,
  ADD CONSTRAINT `blocks_ibfk_2` FOREIGN KEY (`blockee`) REFERENCES `users` (`email`) ON DELETE SET NULL;

--
-- Constraints for table `creditcards`
--
ALTER TABLE `creditcards`
  ADD CONSTRAINT `FK_CreditCardEmail` FOREIGN KEY (`userEmail`) REFERENCES `users` (`email`) ON DELETE CASCADE;

--
-- Constraints for table `hasusermessages`
--
ALTER TABLE `hasusermessages`
  ADD CONSTRAINT `FK_HAM` FOREIGN KEY (`cID`) REFERENCES `conversations` (`cID`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_HUM` FOREIGN KEY (`userEmail`) REFERENCES `users` (`email`) ON DELETE SET NULL;

--
-- Constraints for table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `FK_Photos1` FOREIGN KEY (`postID`) REFERENCES `pictureposts` (`postID`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_Photos2` FOREIGN KEY (`userEmail`) REFERENCES `users` (`email`) ON DELETE CASCADE;

--
-- Constraints for table `pictureposts`
--
ALTER TABLE `pictureposts`
  ADD CONSTRAINT `FK_PP` FOREIGN KEY (`location`) REFERENCES `location` (`locID`),
  ADD CONSTRAINT `FK_PP2` FOREIGN KEY (`userEmail`) REFERENCES `users` (`email`) ON DELETE CASCADE;

--
-- Constraints for table `reactspicposts`
--
ALTER TABLE `reactspicposts`
  ADD CONSTRAINT `FK_RPP` FOREIGN KEY (`postID`) REFERENCES `pictureposts` (`postID`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_RPP1` FOREIGN KEY (`type`) REFERENCES `reactiontext` (`type`),
  ADD CONSTRAINT `FK_RPP3` FOREIGN KEY (`userEmail`) REFERENCES `users` (`email`) ON DELETE CASCADE;

--
-- Constraints for table `reactstextposts`
--
ALTER TABLE `reactstextposts`
  ADD CONSTRAINT `FK_RTP` FOREIGN KEY (`postID`) REFERENCES `textposts` (`postID`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_RTP1` FOREIGN KEY (`type`) REFERENCES `reactiontext` (`type`),
  ADD CONSTRAINT `FK_RTP3` FOREIGN KEY (`userEmail`) REFERENCES `users` (`email`) ON DELETE CASCADE;

--
-- Constraints for table `swipes`
--
ALTER TABLE `swipes`
  ADD CONSTRAINT `swipes_ibfk_1` FOREIGN KEY (`swiper`) REFERENCES `users` (`email`) ON DELETE SET NULL,
  ADD CONSTRAINT `swipes_ibfk_2` FOREIGN KEY (`swipee`) REFERENCES `users` (`email`) ON DELETE SET NULL;

--
-- Constraints for table `textposts`
--
ALTER TABLE `textposts`
  ADD CONSTRAINT `FK_TP` FOREIGN KEY (`location`) REFERENCES `location` (`locID`),
  ADD CONSTRAINT `FK_TP2` FOREIGN KEY (`userEmail`) REFERENCES `users` (`email`) ON DELETE CASCADE;

--
-- Constraints for table `usermatchescontains`
--
ALTER TABLE `usermatchescontains`
  ADD CONSTRAINT `FK_UMC` FOREIGN KEY (`cID`) REFERENCES `conversations` (`cID`),
  ADD CONSTRAINT `usermatchescontains_ibfk_1` FOREIGN KEY (`firstUser`) REFERENCES `users` (`email`) ON DELETE SET NULL,
  ADD CONSTRAINT `usermatchescontains_ibfk_2` FOREIGN KEY (`secondUser`) REFERENCES `users` (`email`) ON DELETE SET NULL;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_age` FOREIGN KEY (`age`) REFERENCES `agestatus` (`age`),
  ADD CONSTRAINT `FK_location` FOREIGN KEY (`location`) REFERENCES `location` (`locID`),
  ADD CONSTRAINT `FK_relationship` FOREIGN KEY (`relationship`) REFERENCES `relationships` (`rID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
