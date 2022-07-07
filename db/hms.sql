-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2022 at 02:47 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ashokas`
--

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `amenities_id` int(11) NOT NULL,
  `amenities_name` varchar(255) NOT NULL,
  `amenities_price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`amenities_id`, `amenities_name`, `amenities_price`) VALUES
(1, 'Laundry', 300);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL,
  `client_title` varchar(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `client_email` varchar(50) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `occupation` text NOT NULL,
  `address` text NOT NULL,
  `kin_name` varchar(50) NOT NULL,
  `kin_mobile` varchar(11) NOT NULL,
  `join_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `client_title`, `first_name`, `middle_name`, `last_name`, `client_email`, `mobile`, `occupation`, `address`, `kin_name`, `kin_mobile`, `join_date`) VALUES
(1, 'Mr', 'Abiola', '', 'Sonola', '', '07034476887', '', 'Lagos', '', '', '03-02-2022'),
(2, 'Mrs', 'Mariam', '', 'Nasir', '', '08099000086', '', 'Lagos', '', '', '03-02-2022'),
(3, 'Mr', 'OLAKUNLE', '', 'OSENI', 'Olakunle.oseni@yahoo.com', '09022794416', '', 'bodija', '', '', '04-02-2022'),
(4, 'Ms', 'Faith', '', 'OYEPEJU', '', '09034636655', '', 'LAGOS', '', '', '04-02-2022'),
(5, 'Mr', 'BARUWA', '', 'LATEEF', '', '07061388000', 'ENGR', 'LAGOS', '', '', '04-02-2022'),
(6, 'Mr', 'Akinyele', '', 'Akinyuga', '', '07081514322', '', '13 Ajayi street,Mende, Lagos', '', '', '04-02-2022'),
(7, 'Dr', 'Timi', '', 'Olubiyi', '', '08099992555', '', 'Lagos', '', '', '04-02-2022'),
(8, 'Mr', 'Sina', '', 'Makanjuola', '', '08031250830', '', 'Onireke', '', '', '05-02-2022'),
(9, 'Mr', 'Ziad', 'Ansari', 'Mohammad', '', '09153485884', 'TRADER', 'LAGOS', '', '', '07-02-2022'),
(10, 'Mr', 'Babatunde', '', 'Shittu', '', '08033252925', '', 'lagos', '', '', '09-02-2022'),
(11, 'Mr', 'David', '', 'Amoka', '', '08033086827', '', 'Lagos', '', '', '09-02-2022'),
(12, 'Mrs', 'Faith', '', 'Oyepeju', '', '08065725714', '', 'Lagos', '', '', '09-02-2022'),
(13, 'Mr', 'ADE', '', 'ADE', 'felixade07@gmail.com', '08062153870', '', '18, Senari V.I Lagos', '', '', '10-02-2022'),
(14, 'Mr', 'Ayodele', '', 'Agbedewo', '', '08036798100', '', 'Lagos', '', '', '10-02-2022'),
(15, 'Mr', 'Timothy', '', 'Wesey', 'brackwas12@', '08027010879', '', 'No 3, yemi faronbi new bodija.', '', '', '11-02-2022'),
(16, 'Mr', 'Tolu', '', 'Akintunde', 'toluakintunde@gmail.com', '08033131173', '', 'Ibadan', '', '', '11-02-2022'),
(17, 'Mr', 'Lawrence', '', 'Sonibare', '', '08023642095', '', '23 Okunola', '', '', '11-02-2022'),
(18, 'Mr', 'Korede', '', 'Ajike', '', '08065580405', '', 'Lagos', '', '', '11-02-2022'),
(19, 'Mr', 'IME', '', 'JIMMY', '', '07031300295', '', 'LAGOS', '', '', '11-02-2022'),
(20, 'Mr', 'UGO', '', 'NWOLO', '', '08082404106', '', 'LAGOS', '', '', '11-02-2022'),
(21, 'Mr', 'ORITSUWA', '', 'KPOGHO', '', '08033061951', '', '3, AFRICA LANE, LEKKI,PHASE 1, LAGOS', '', '08034671999', '11-02-2022'),
(22, 'Mr', 'BUKOLA', '', 'ADELAJA', '', '08034917780', '', 'IBADAN', '', '', '11-02-2022'),
(23, 'Mr', 'Adetokunbo', '', 'Babatude', '', '08027158344', '', '1 femi martin str. Siba', '', '', '11-02-2022'),
(24, 'Mrs', 'Shade', '', 'Adegbenro', '', '08033146535', '', 'Ibadan', '', '', '11-02-2022'),
(25, 'Mr', 'wale', 'abiola', 'cso', '', '08037212991', 'government worker', 'lagos', '', '', '12-02-2022'),
(26, 'Mr', 'Abiodun', 'Taiwo', 'Olukayode', '', '08073666616', 'TRADER', 'isu ishaga agege', '', '', '12-02-2022'),
(27, 'Mr', 'michael', 'ukrakpor', 'michael', '', '09082896000', 'ENGR', '140 association avenue,lagos', '', '', '12-02-2022'),
(28, 'Mr', 'james', '', 'daniel', '', '08036648712', 'TRADER', 'bodija', '', '', '12-02-2022'),
(29, 'Mr', 'Attah', '', 'Ogbole', '', '08033059894', '', 'Bodija', '', '', '13-02-2022'),
(30, 'Mr', 'James', '', 'Dania', '', '08036648712', '', 'Bodija', '', '', '13-02-2022'),
(31, 'Dr', 'Simpa', '', 'Dania', '', '08036648712', 'government worker', 'lagos', '', '', '15-02-2022'),
(32, 'Mrs', 'ADEOLA', 'YETUNDE', 'OMIKUNLE', '', '08034019927', '', 'IKEJA LAGOS', '', '', '18-02-2022'),
(33, 'Mr', 'NAGODE', '', 'IBRAHIM', '', '07031258552', 'POLICE', 'LAGOS', '', '', '18-02-2022'),
(34, 'Mrs', 'ADEBOLA', 'OLUWATOSIN', 'WILLIAMS', '', '08022905605', '', 'ONIRU LAGOS', '', '', '18-02-2022'),
(35, 'Mr', 'Tosin', '', 'Odunfa', '', '08020741742', 'TRADER', 'lagos', '', '', '18-02-2022'),
(36, 'Mrs', 'GBEMI', '', 'SOYEMI', '', '08057777770', '', 'LAGOS', '', '', '19-02-2022'),
(37, 'Mr', 'SAMMY', '', 'SOSA', '', '08020757033', '', 'LAGOS', '', '', '19-02-2022'),
(38, 'Mr', 'SAMMY', '', 'SOSA', '', '08020757033', '', 'LAGOS', '', '', '19-02-2022'),
(39, 'Ms', 'ORAH', 'EFE', 'ALUEDE', '', '09126521396', '', 'IBIKUNLE AVENUE BODIJA IBADAN', '', '', '21-02-2022');

-- --------------------------------------------------------

--
-- Table structure for table `close_account`
--

CREATE TABLE `close_account` (
  `close_id` int(11) NOT NULL,
  `staff_id` varchar(20) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `close_account`
--

INSERT INTO `close_account` (`close_id`, `staff_id`, `amount`, `date`) VALUES
(1, '12', '1219500', '12-02-2022'),
(2, '12', '807000', '12-02-2022'),
(3, '12', '807000', '12-02-2022'),
(4, '12', '807000', '12-02-2022'),
(5, '12', '807000', '12-02-2022'),
(6, '12', '807000', '12-02-2022'),
(7, '12', '807000', '12-02-2022'),
(8, '12', '807000', '12-02-2022'),
(9, '12', '807000', '12-02-2022'),
(10, '12', '807000', '12-02-2022'),
(11, '12', '807000', '12-02-2022'),
(12, '12', '807000', '12-02-2022');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `site_title` varchar(50) NOT NULL,
  `hotel_name` varchar(50) NOT NULL,
  `tagline` text NOT NULL,
  `company_email` varchar(50) NOT NULL,
  `company_phone` varchar(50) NOT NULL,
  `company_mobile` varchar(50) NOT NULL,
  `company_website` varchar(50) NOT NULL,
  `company_address` text NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `account_name` varchar(50) NOT NULL,
  `account_number` varchar(50) NOT NULL,
  `show_on_invoice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `site_title`, `hotel_name`, `tagline`, `company_email`, `company_phone`, `company_mobile`, `company_website`, `company_address`, `bank_name`, `account_name`, `account_number`, `show_on_invoice`) VALUES
(1, 'The Ashokas Hotel', 'The Ashokas Hotel', 'Home away from home', 'ashokaslimited@gmail.com', '07025033000', '', 'www.theashokas.com', '27, Dejo Oyelese Street, Old-Bodija, Ibadan, Oyo State, Nigeria', 'Test Name', 'Test Account', '0123456789', 0);

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_id` int(11) NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `food_price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `food_name`, `food_price`) VALUES
(1, 'Jollof Rice Served With Chicken/Fish/Beef/Assorted', 4000),
(2, 'Yam Pottage served with stewed yam, vegetable ang grilled titus fish in peppered sauce', 3500),
(3, 'boiled yam   and egg or fish sauce with tea and coffec', 0),
(4, 'Fresh bread or toast bread with choice of eggs omelette/sunnyside up/egg sauce /scrambled with tea or coffee', 0),
(5, 'moin-moin and ogi/custard/oats', 0),
(6, 'toast or fresh bread served with choice of eggs with tea or coffee', 2500),
(7, 'club sandwish with chicken and bacon with coffee or tea', 2500),
(8, 'omelette sandwish with tea or coffee', 2500),
(9, 'veggies,sausage,or omelette served with tea or coffee', 2500),
(10, 'fruit juice, choice of eggs/ boiled eggs/ screambled eggs or omelette, sausages, mushrooms, bacon and baked beans, toast or fresh bread, tea or coffee', 4000),
(11, 'boiled or fried yam served with egg sauce/ fish sauce/ garden egg sauce with tea or coffee', 3000),
(12, 'boiled plantain served with vegetable with tea or coffee', 3000),
(13, 'boiled or fried potatoes served with stewed eggs/ fish sauce.', 3000),
(14, 'fried plantain with omelette with tea or coffee', 3000),
(15, 'moin-moin/ akara served with pap/ custard/oats', 3000),
(16, 'Chinese fried/white rice served with oyster sauce', 4500),
(17, 'fruit salad(diced pineapple, watermelon, pawpaw and grapes served with yogurt', 2000),
(18, 'water', 300),
(19, 'White Rice & Stew Served With Beef/Chicken/Assorted/Fish With Plantain', 4000),
(20, 'room service', 500),
(21, 'bokoto', 1500),
(22, 'goatmeat', 1500),
(23, 'croaker fish', 1500),
(24, 'goatmeat pepper soup', 3000),
(25, 'fish pepper soup(croaker/cat fish)', 2500),
(26, 'Cowleg pepper soup', 2000),
(27, 'Assorted pepper soup', 2000),
(28, 'sprite', 400),
(29, 'coke', 400),
(30, 'fanta', 400),
(31, 'Juice 1 ltr', 1500),
(32, 'Amstel malt', 500),
(33, 'guiness stout', 700),
(34, 'trophy', 700),
(35, 'Amala served with gbegiri/ewedu/okro fish stew,ponmo and assorted/beef/goatmeat/chicken', 3500),
(36, 'egusi ijebu/ekiti with stock fish/dried fish and ponmo with choice of protein served with choice of swallow', 3500),
(37, 'efo riro with stock/dried fish,ponmo served with choice of protein and choice of swallow', 3500),
(38, 'grountnut soup with dried fish, ponmo,stockfish with choice of protein and choice of swallow', 3500),
(39, 'Edika-Ikong served with choice of protein and choice of swallow', 4500),
(40, 'ofensala white soup/o.h.a soup choice of protein served with choice of swallow', 4500),
(41, 'mixed okro soup(ila alasepo)served with choice or protein with choice of swallow', 4500),
(42, 'Fisherman okra served with snail,shrimps,titus,catfish served with choice of swallow', 6000),
(43, 'ofada/ayamasha sauce served with assorted meat,boiled egg,and plantain served with ofada or local rice with choice of protein', 3500),
(44, 'Beef(classic steak,grilled juicy matured steak)served with choice of rice/potatoes/pasta and mixed vegetables', 4000),
(45, 'Pork(pork chop grilled to perfection served with choice of rice/pork/pasta and mixed vegetables', 4000),
(46, 'chicken in curry sauce with boiled egg and potato served with coconut rice(chicken breast chunks)', 4000),
(47, 'Grilled honey lemon or barbecue glazed chicken served with nigeria jollof or fried rice and veggies(saute veggies and coleslaw)', 4000),
(48, 'shredded beef or chicken in sweet and sour sauce served with steamed white rice and veggies', 3500),
(49, 'chinese fried rice served in oyster sauce (include shrimps,bell pepper,egg,chicken or beef chunks)', 4500),
(50, 'grilled fish/chicken/beef served with oriental/jambalaya rice with veggie.(bell pepper,sausage)', 4000),
(51, 'buttered parsley potatoes served with t/bone steak and gravy', 3500),
(52, 'potatoe wedge served with breaded chicken and dip(mayonnaise or ketchup,sweet chilli sauce)', 3500),
(53, 'extra protein(fish/chicken/beef/assorted)', 1500),
(54, 'laundry ironing (gown)', 300),
(55, 'take-away pack big', 500),
(56, 'Lyoness potatoes served with breaded fish and coleslaw', 3500),
(57, 'Gizdodo with veggies and sauce served with rice ', 3500),
(58, 'Grilled or fried chicken served with french fries and coleslaw', 3500),
(59, 'CHICKEN ESCALOP(Breaded chicken breast shallow fried and served with tartar sauce served with choice of rice/potatoes/pasta', 3500),
(60, 'BIG MAMA SELINA (large sized croacker fish grilled to perfection served with either french fries/plantain and coleslaw', 5000),
(61, 'FRIED FISH AND CHIPS(fried fish cuts served with chips and coleslaw', 3500),
(62, 'Spaghetti bolognese', 3500),
(63, 'Spaghetti with chicken and bell pepper', 3500),
(64, 'Noodles', 1500),
(65, 'Noodles special', 3000),
(66, 'White rice,Jolllof rice or Fried rice served with choice of protein with plantain', 4000),
(67, 'Basmati white or jollof rice served with stewed chicken and coleslaw', 4500),
(68, 'White rice and efo riro served with choice of protein and plantain', 4500),
(69, 'Dodo and egg', 3000),
(70, 'Coconut Rice', 3500),
(71, 'Ofada Rice( peppered stewed assorted meat and diced plantain)', 4500),
(72, 'Yam Pottage', 3500),
(73, 'Jollof or frie rice', 2000),
(74, 'white/basmati rice', 1500),
(75, 'plantain extra', 500),
(76, 'akara extra', 1000),
(77, 'yam extra', 1000),
(78, 'ogi extra', 500),
(79, 'bread extra', 500),
(80, 'eggs extra', 700),
(81, 'bacon extra', 750),
(82, 'chips extra', 1000),
(83, 'baked beans extra', 500),
(84, 'sausage extra', 750),
(85, 'meat/chicken/fish extra', 1500),
(86, 'four cousin wine', 6000),
(87, 'carlo rossi (smooth)', 7000),
(88, 'carlo rossi (sweet)', 7000),
(89, 'malta guiness', 500),
(90, 'juice 50cl', 350),
(91, 'juice 31.5cl', 500),
(92, 'chapman', 1500),
(93, 'orijin zero', 500),
(94, 'maltina', 500),
(95, 'monster', 1000),
(96, 'power horse', 1000),
(97, 'smirnoff', 700),
(98, 'red bull', 800),
(99, 'shirt washing', 300),
(100, 'shirt ironing', 300),
(101, 'trouser washing', 300),
(102, 'trouser ironing', 300),
(103, 'french jacket washing', 600),
(104, 'french jacket ironing', 400),
(105, 'safari suit washing', 600),
(106, 'safari suit ironing', 300),
(107, 'short washing', 300),
(108, 'short ironing', 300),
(109, 'complete african dress washing', 1000),
(110, 'complete african dress ironing', 700),
(111, 'buba and sokoto washing', 600),
(112, 'buba and sokoto ironing', 300),
(113, 'agbada only washing', 450),
(114, 'agbada only ironing', 300),
(115, 'pyjamas washing', 350),
(116, 'pyjamas ironing', 300),
(117, 'ladies blouse washing', 300),
(118, 'ladies blouse ironing ', 300),
(119, 'iro and buba washing', 500),
(120, 'iro and buba ironing', 300),
(121, 'laundry washing (gown)', 400),
(122, 'kaftan washing', 600),
(123, 'kaftan ironing', 400),
(124, 'evening dress washing', 600),
(125, 'evening dress ironing', 450),
(126, 'towel washing', 300),
(127, 'towel ironing', 300),
(128, 'skirt and blouse washing (kids)', 250),
(129, 'skirt and blouse ironing (kids)', 250),
(130, 'shirt and trouser washing (kids)', 250),
(131, 'shirt and trouser ironing (kids)', 250),
(132, 'bubu and sokoto  washing (Kids)', 300),
(133, 'buba and sokoto ironing (Kids)', 250),
(134, 'pyjamas washing (kids)', 200),
(135, 'pyjamas ironing (Kids)', 250),
(136, 'grilled chiken', 1500),
(137, 'peppered snail', 3500),
(138, 'chicken nugget', 1500),
(139, 'chicken and chips with coleslaw', 3500),
(140, 'hennekein', 700),
(141, 'SALAD(A crunchy cabbage and tomato based salad mixed with tuna, chicken shreds and cucumber)', 2500),
(142, 'efo riro extra', 500);

-- --------------------------------------------------------

--
-- Table structure for table `hidden_transaction`
--

CREATE TABLE `hidden_transaction` (
  `transaction_id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `lodge_no` varchar(50) NOT NULL,
  `bill_no` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `paid_with` varchar(50) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `close_id` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hidden_transaction`
--

INSERT INTO `hidden_transaction` (`transaction_id`, `date`, `title`, `guest_id`, `lodge_no`, `bill_no`, `amount`, `paid_with`, `staff_id`, `close_id`) VALUES
(4, '04-02-2022', 'Check-In', 3, '57262922', '', '30000', 'Bank Transfer', 12, '1'),
(5, '04-02-2022', 'Reservation', 4, '50968717', '', '80000', 'Bank Transfer', 12, '1'),
(6, '03-02-2022', 'Check-In', 5, '66339046', '', '22500', 'Bank Transfer', 12, '1'),
(7, '04-02-2022', 'Food Order', 0, '', '32109079', '4500', 'Bank Transfer', 12, '1'),
(8, '04-02-2022', 'Food Order', 0, '', '85082874', '300', 'Cash', 12, '1'),
(9, '04-02-2022', 'Check-In', 6, '55054640', '', '30000', 'Bank Transfer', 11, ''),
(10, '04-02-2022', 'Check-In', 7, '34140166', '', '20000', 'Card Swipe', 10, ''),
(11, '04-02-2022', 'Food Order', 7, '34140166', '97880075', '600', 'Post To Room', 10, ''),
(12, '05-02-2022', 'Check-In', 8, '86475830', '', '35000', 'Bank Transfer', 10, ''),
(13, '05-02-2022', 'Food Order', 6, '55054640', '49596613', '4000', 'Post To Room', 10, ''),
(14, '05-02-2022', 'Food Order', 6, '55054640', '34373061', '500', 'Cash', 10, ''),
(15, '05-02-2022', 'Food Order', 8, '86475830', '60017989', '1200', 'Cash', 12, '1'),
(16, '05-02-2022', 'Food Order', 8, '86475830', '34161621', '500', 'Cash', 12, '1'),
(21, '03-02-2022', 'Check-In Modify', 2, '77116930', '', '50000', 'Card Swipe', 12, '1'),
(25, '05-02-2022', 'Food-Order', 2, '40685944', '80679245', '12000', 'Post To Room', 12, '1'),
(26, '05-02-2022', 'Food-Order', 2, '40685944', '99055833', '23000', 'Post To Room', 12, '1'),
(36, '05-02-2022', 'Food Order', 2, '77116930', '47986847', '900', 'Post To Room', 12, '1'),
(37, '05-02-2022', 'Food Order', 2, '77116930', '51036328', '3300', 'Post To Room', 12, '1'),
(38, '05-02-2022', 'Food Order', 2, '77116930', '56295636', '3300', 'Post To Room', 12, '1'),
(39, '05-02-2022', 'Food Order', 3, '57262922', '33470057', '1100', 'Post To Room', 12, '1'),
(40, '05-02-2022', 'Food Order', 0, '', '91101173', '4300', 'Card Swipe', 12, '1'),
(42, '03-02-2022', 'Check-In Modify', 2, '40685944', '', '70000', 'Card Swipe', 1, ''),
(43, '03-02-2022', 'Check-In Modify', 1, '63244798', '', '50000', 'Card Swipe', 1, ''),
(45, '09-02-2022', 'Food Order', 9, '48084495', '20611951', '1500', 'Post To Room', 10, ''),
(46, '09-02-2022', 'Food Order', 9, '48084495', '51126598', '4000', 'Post To Room', 10, ''),
(47, '09-02-2022', 'Food Order', 9, '48084495', '31420826', '500', 'Post To Room', 10, ''),
(48, '09-02-2022', 'Food Order', 9, '48084495', '18840054', '6000', 'Post To Room', 10, ''),
(49, '09-02-2022', 'Food Order', 9, '48084495', '23160255', '500', 'Post To Room', 10, ''),
(50, '09-02-2022', 'Check-In', 10, '88043517', '', '35000', 'Bank Transfer', 10, ''),
(52, '09-02-2022', 'Check-In', 12, '43856618', '', '80000', 'Bank Transfer', 10, ''),
(53, '09-02-2022', 'Food Order', 12, '43856618', '67543228', '4500', 'Post To Room', 10, ''),
(54, '09-02-2022', 'Food Order', 12, '43856618', '62144303', '500', 'Post To Room', 10, ''),
(55, '10-02-2022', 'Food Order', 12, '43856618', '84484954', '0', 'Post To Room', 10, ''),
(56, '10-02-2022', 'Food Order', 10, '88043517', '81076373', '0', 'Post To Room', 11, ''),
(57, '10-02-2022', 'Food Order', 11, '92639671', '12095151', '0', 'Post To Room', 11, ''),
(58, '10-02-2022', 'Food Order', 9, '48084495', '51927518', '0', 'Post To Room', 11, ''),
(59, '10-02-2022', 'Check-In', 13, '43376463', '', '20000', 'Card Swipe', 11, ''),
(61, '10-02-2022', 'Food Order', 12, '43856618', '79794931', '500', 'Post To Room', 10, ''),
(62, '10-02-2022', 'Food Order', 12, '43856618', '84178837', '3500', 'Post To Room', 10, ''),
(63, '10-02-2022', 'Food Order', 12, '43856618', '69410568', '300', 'Post To Room', 10, ''),
(64, '10-02-2022', 'Food Order', 14, '81702489', '68742957', '500', 'Post To Room', 10, ''),
(65, '10-02-2022', 'Food Order', 14, '81702489', '81296633', '1000', 'Post To Room', 10, ''),
(66, '10-02-2022', 'Food Order', 14, '81702489', '98816728', '700', 'Post To Room', 10, ''),
(67, '10-02-2022', 'Food Order', 14, '81702489', '26146886', '500', 'Post To Room', 10, ''),
(68, '10-02-2022', 'Check-In Modify', 14, '81702489', '', '36000', 'Bank Transfer', 10, ''),
(72, '11-02-2022', 'Check-In', 15, '56994335', '', '30000', 'Card Swipe', 9, ''),
(73, '11-02-2022', 'Check-In', 20, '88600207', '', '50000', 'Card Swipe', 11, ''),
(74, '11-02-2022', 'Check-In', 19, '89422083', '', '60000', 'Card Swipe', 11, ''),
(75, '11-02-2022', 'Check-In', 18, '16353124', '', '70000', 'Card Swipe', 11, ''),
(76, '11-02-2022', 'Check-In', 21, '34590694', '', '40000', 'Card Swipe', 11, ''),
(77, '11-02-2022', 'Check-In', 24, '66952807', '', '40000', 'Card Swipe', 11, ''),
(78, '11-02-2022', 'Check-In', 23, '83119636', '', '27000', 'Card Swipe', 11, ''),
(79, '11-02-2022', 'Check-In', 22, '68798012', '', '31500', 'Card Swipe', 11, ''),
(80, '12-02-2022', 'Food Order', 18, '16353124', '68307314', '4800', 'Post To Room', 11, ''),
(81, '12-02-2022', 'Food Order', 21, '34590694', '72993957', '8100', 'Post To Room', 11, ''),
(82, '12-02-2022', 'Food Order', 17, '82903232', '24056730', '0', 'Post To Room', 12, '1'),
(83, '12-02-2022', 'Food Order', 16, '78174514', '15300778', '0', 'Post To Room', 12, '1'),
(84, '12-02-2022', 'Food Order', 22, '68798012', '67870712', '0', 'Post To Room', 12, '1'),
(85, '12-02-2022', 'Food Order', 20, '88600207', '50428983', '0', 'Post To Room', 12, '1'),
(86, '12-02-2022', 'Food Order', 18, '16353124', '32995652', '0', 'Post To Room', 12, '1'),
(87, '12-02-2022', 'Food Order', 24, '66952807', '57942485', '0', 'Post To Room', 12, '1'),
(88, '12-02-2022', 'Food Order', 23, '83119636', '29906072', '0', 'Post To Room', 12, '1'),
(89, '12-02-2022', 'Food Order', 9, '48084495', '26342456', '0', 'Post To Room', 12, '1'),
(96, '09-02-2022', 'Check-In Modify', 11, '92639671', '', '60000', 'Bank Transfer', 12, '1'),
(98, '07-02-2022', 'Check-In Modify', 9, '48084495', '', '115000', 'Card Swipe', 12, '1'),
(99, '12-02-2022', 'Food Order', 21, '34590694', '83747797', '600', 'Post To Room', 12, '1'),
(100, '12-02-2022', 'Food Order', 18, '16353124', '85518612', '19000', 'Post To Room', 12, ''),
(101, '12-02-2022', 'Check-In', 25, '91255309', '', '20000', 'Bank Transfer', 12, ''),
(102, '11-02-2022', 'Check-In Modify', 17, '82903232', '', '20000', 'Card Swipe', 12, ''),
(103, '11-02-2022', 'Check-In Modify', 16, '78174514', '', '20000', 'Card Swipe', 12, ''),
(104, '12-02-2022', 'Check-In', 26, '74731024', '', '25000', 'Card Swipe', 12, ''),
(105, '12-02-2022', 'Check-In', 19, '79811269', '', '27000', 'Card Swipe', 12, ''),
(106, '12-02-2022', 'Food Order', 19, '89422083', '22227471', '6000', 'Post To Room', 12, ''),
(107, '12-02-2022', 'Food Order', 18, '16353124', '58566350', '5350', 'Post To Room', 12, ''),
(108, '12-02-2022', 'Check-In', 27, '87483398', '', '35000', 'Card Swipe', 12, ''),
(109, '12-02-2022', 'Check-In', 28, '73599372', '', '30000', 'Bank Transfer', 12, ''),
(110, '12-02-2022', 'Food Order', 17, '82903232', '23482093', '1000', 'Card Swipe', 12, ''),
(111, '13-02-2022', 'Food Order', 18, '16353124', '39660975', '2100', 'Post To Room', 12, ''),
(112, '13-02-2022', 'Food Order', 20, '88600207', '59092202', '300', 'Post To Room', 12, ''),
(113, '13-02-2022', 'Food Order', 27, '87483398', '17752890', '1400', 'Bank Transfer', 11, ''),
(114, '13-02-2022', 'Food Order', 25, '91255309', '27453893', '0', 'Post To Room', 11, ''),
(115, '13-02-2022', 'Food Order', 28, '73599372', '27027477', '0', 'Post To Room', 11, ''),
(116, '14-02-2022', 'Check-In', 29, '81213502', '', '25000', 'Bank Transfer', 10, ''),
(117, '14-02-2022', 'Check-In', 30, '94748720', '', '20000', 'Bank Transfer', 10, ''),
(118, '14-02-2022', 'Check-In', 9, '19907813', '', '20000', 'Bank Transfer', 12, ''),
(119, '14-02-2022', 'Food Order', 9, '19907813', '38706537', '300', 'Post To Room', 10, ''),
(121, '15-02-2022', 'Check-In', 31, '98255294', '', '30000', 'Bank Transfer', 12, ''),
(122, '15-02-2022', 'Food Order', 9, '58554290', '78762517', '2400', 'Post To Room', 12, ''),
(123, '16-02-2022', 'Food Order', 31, '98255294', '98903261', '13100', 'Post To Room', 12, ''),
(124, '16-02-2022', 'Check-In', 10, '42655426', '', '45000', 'Bank Transfer', 10, ''),
(126, '16-02-2022', 'Food Order', 9, '58554290', '50080806', '2700', 'Post To Room', 12, ''),
(128, '17-02-2022', 'Food Order', 9, '58554290', '43564630', '5100', 'Post To Room', 12, ''),
(129, '15-02-2022', 'Check-In Modify', 9, '58554290', '', '60000', 'Card Swipe', 10, ''),
(130, '18-02-2022', 'Check-In', 34, '15716641', '', '72000', 'Bank Transfer', 10, ''),
(131, '18-02-2022', 'Check-In', 33, '42829686', '', '36000', 'Bank Transfer', 10, ''),
(132, '18-02-2022', 'Check-In', 32, '23549115', '', '63000', 'Bank Transfer', 10, ''),
(133, '18-02-2022', 'Check-In', 32, '46324264', '', '63000', 'Bank Transfer', 10, ''),
(134, '18-02-2022', 'Food Order', 32, '23549115', '18729556', '800', 'Post To Room', 10, ''),
(135, '18-02-2022', 'Food Order', 32, '23549115', '54436160', '300', 'Post To Room', 10, ''),
(136, '18-02-2022', 'Food Order', 34, '15716641', '18781998', '300', 'Post To Room', 10, ''),
(137, '18-02-2022', 'Food Order', 32, '46324264', '76548763', '300', 'Post To Room', 10, ''),
(138, '18-02-2022', 'Food Order', 33, '42829686', '43059940', '300', 'Post To Room', 10, ''),
(139, '18-02-2022', 'Food Order', 32, '46324264', '38223054', '300', 'Post To Room', 10, ''),
(140, '18-02-2022', 'Food Order', 32, '23549115', '46353960', '600', 'Post To Room', 10, ''),
(141, '18-02-2022', 'Food Order', 34, '15716641', '63556664', '300', 'Post To Room', 10, ''),
(142, '18-02-2022', 'Check-In', 9, '12241858', '', '20000', 'Card Swipe', 10, ''),
(143, '18-02-2022', 'Food Order', 33, '42829686', '57925934', '3500', 'Post To Room', 10, ''),
(144, '18-02-2022', 'Food Order', 33, '42829686', '36225974', '300', 'Post To Room', 10, ''),
(145, '16-02-2022', 'Check-In Modify', 11, '99505976', '', '23000', 'Bank Transfer', 10, ''),
(146, '18-02-2022', 'Check-In', 35, '23197169', '', '20000', 'Card Swipe', 12, ''),
(147, '19-02-2022', 'Food Order', 9, '12241858', '62881452', '3000', 'Post To Room', 12, ''),
(148, '19-02-2022', 'Food Order', 34, '15716641', '60625377', '300', 'Post To Room', 12, ''),
(149, '19-02-2022', 'Food Order', 34, '15716641', '26974288', '0', 'Post To Room', 10, ''),
(150, '19-02-2022', 'Food Order', 32, '23549115', '95133354', '0', 'Post To Room', 10, ''),
(151, '19-02-2022', 'Food Order', 32, '46324264', '92872896', '0', 'Post To Room', 10, ''),
(152, '19-02-2022', 'Food Order', 33, '42829686', '95614718', '0', 'Post To Room', 10, ''),
(153, '19-02-2022', 'Food Order', 9, '12241858', '81161295', '0', 'Post To Room', 10, ''),
(154, '19-02-2022', 'Food Order', 35, '23197169', '32293397', '0', 'Post To Room', 10, ''),
(155, '19-02-2022', 'Check-In', 28, '21825720', '', '27000', 'Card Swipe', 10, ''),
(156, '19-02-2022', 'Food Order', 28, '21825720', '34675877', '2500', 'Post To Room', 10, ''),
(157, '19-02-2022', 'Food Order', 28, '21825720', '16278680', '400', 'Post To Room', 10, ''),
(158, '19-02-2022', 'Food Order', 28, '21825720', '51596096', '300', 'Post To Room', 10, ''),
(159, '19-02-2022', 'Check-In', 38, '78001179', '', '27000', 'Cash', 10, ''),
(160, '19-02-2022', 'Check-In', 36, '89958684', '', '50000', 'Card Swipe', 10, ''),
(161, '19-02-2022', 'Food Order', 32, '23549115', '47517964', '900', 'Post To Room', 10, ''),
(162, '19-02-2022', 'Food Order', 28, '21825720', '21831466', '9700', 'Post To Room', 10, ''),
(163, '19-02-2022', 'Food Order', 32, '23549115', '91893922', '17200', 'Post To Room', 12, ''),
(164, '20-02-2022', 'Food Order', 28, '21825720', '26577496', '8700', 'Post To Room', 11, ''),
(165, '20-02-2022', 'Food Order', 38, '78001179', '44941084', '600', 'Post To Room', 11, ''),
(166, '20-02-2022', 'Food Order', 28, '21825720', '11141171', '500', 'Post To Room', 11, ''),
(167, '20-02-2022', 'Food Order', 38, '78001179', '42356190', '0', 'Post To Room', 11, ''),
(168, '20-02-2022', 'Food Order', 38, '78001179', '59701001', '0', 'Post To Room', 11, ''),
(169, '20-02-2022', 'Check-In', 36, '38992867', '', '25000', 'Bank Transfer', 11, ''),
(170, '21-02-2022', 'Food Order', 36, '38992867', '96656841', '0', 'Post To Room', 11, ''),
(171, '21-02-2022', 'Check-In', 39, '97316718', '', '45000', 'Bank Transfer', 10, ''),
(172, '21-02-2022', 'Check-In', 11, '69033589', '', '23000', 'Bank Transfer', 10, ''),
(173, '21-02-2022', 'Food Order', 39, '97316718', '90798438', '4800', 'Post To Room', 12, ''),
(174, '21-02-2022', 'Food Order', 11, '69033589', '70286217', '1200', 'Post To Room', 12, '');

-- --------------------------------------------------------

--
-- Table structure for table `lodge`
--

CREATE TABLE `lodge` (
  `lodge_id` int(11) NOT NULL,
  `lodge_no` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `room_type_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `check_in_date` varchar(50) NOT NULL,
  `check_out_date` varchar(50) NOT NULL,
  `adult_no` int(11) NOT NULL,
  `kid_no` int(50) NOT NULL,
  `vehicle_no` varchar(50) NOT NULL,
  `reason` text NOT NULL,
  `gross_amount` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `payment_option` varchar(50) NOT NULL,
  `check_in_by` int(11) NOT NULL,
  `check_out_by` int(11) NOT NULL,
  `checked_out` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lodge`
--

INSERT INTO `lodge` (`lodge_id`, `lodge_no`, `client_id`, `room_type_id`, `room_id`, `check_in_date`, `check_out_date`, `adult_no`, `kid_no`, `vehicle_no`, `reason`, `gross_amount`, `discount`, `total_amount`, `payment_option`, `check_in_by`, `check_out_by`, `checked_out`) VALUES
(4, 57262922, 3, 3, 7, '04-02-2022 04:02 PM', '05-02-2022', 0, 0, '', '', 30000, 0, 30000, 'Bank Transfer', 12, 12, 1),
(5, 66339046, 5, 3, 6, '03-02-2022 05:02 PM', '04-02-2022', 1, 0, '', '', 30000, 7500, 22500, 'Bank Transfer', 12, 12, 1),
(6, 55054640, 6, 3, 6, '04-02-2022 07:02 pm', '05-02-2022', 1, 0, '', 'rest', 30000, 0, 30000, 'Bank Transfer', 11, 10, 1),
(7, 34140166, 7, 1, 1, '04-02-2022 11:02 PM', '05-02-2022', 1, 0, '', 'rest', 20000, 0, 20000, 'Card Swipe', 10, 12, 1),
(8, 86475830, 8, 4, 9, '05-02-2022 07:02 AM', '06-02-2022', 2, 0, '', 'rest', 35000, 0, 35000, 'Bank Transfer', 10, 12, 1),
(11, 77116930, 2, 2, 5, '03-02-2022 10:02 PM', '05-02-2022', 1, 0, '', 'party', 50000, 0, 50000, 'Card Swipe', 12, 1, 1),
(25, 40685944, 2, 4, 10, '03-02-2022 10:02 PM', '05-02-2022', 2, 0, '', 'party', 70000, 0, 70000, 'Card Swipe', 1, 1, 1),
(26, 63244798, 1, 2, 4, '03-02-2022 10:02 PM', '05-02-2022', 0, 0, '', '', 50000, 0, 50000, 'Card Swipe', 1, 1, 1),
(28, 88043517, 10, 4, 10, '09-02-2022 06:02 PM', '10-02-2022', 1, 0, '', 'rest', 35000, 0, 35000, 'Bank Transfer', 10, 9, 1),
(30, 43856618, 12, 4, 9, '09-02-2022 08:02 PM', '11-02-2022', 1, 0, '', 'rest', 80000, 0, 80000, 'Bank Transfer', 10, 10, 1),
(31, 43376463, 13, 1, 3, '10-02-2022 06:02 PM', '11-02-2022', 2, 0, '', 'rest', 20000, 0, 20000, 'Card Swipe', 11, 9, 1),
(33, 81702489, 14, 5, 11, '10-02-2022 06:02 PM', '12-02-2022', 1, 0, '', 'rest', 40000, 4000, 36000, 'Bank Transfer', 10, 9, 1),
(37, 56994335, 15, 3, 7, '11-02-2022 01:02 PM', '12-02-2022', 1, 0, '', 'rest', 30000, 0, 30000, 'Card Swipe', 9, 12, 1),
(38, 88600207, 20, 3, 6, '11-02-2022 05:02 PM', '13-02-2022', 1, 0, '', 'rest', 60000, 10000, 50000, 'Card Swipe', 11, 12, 1),
(39, 89422083, 19, 4, 9, '11-02-2022 05:02 PM', '13-02-2022', 1, 0, '', '', 70000, 10000, 60000, 'Card Swipe', 11, 12, 1),
(40, 16353124, 18, 6, 12, '11-02-2022 05:02 PM', '13-02-2022', 1, 0, '', '', 90000, 20000, 70000, 'Card Swipe', 11, 12, 1),
(41, 34590694, 21, 5, 11, '11-02-2022 09:02 PM', '12-02-2022', 2, 0, '', 'party', 40000, 0, 40000, 'Card Swipe', 11, 12, 1),
(42, 66952807, 24, 7, 13, '11-02-2022 11:02 PM', '12-02-2022', 1, 0, '', 'party', 50000, 10000, 40000, 'Card Swipe', 11, 9, 1),
(43, 83119636, 23, 3, 8, '11-02-2022 11:02 PM', '12-02-2022', 1, 0, '', 'rest', 30000, 3000, 27000, 'Card Swipe', 11, 12, 1),
(44, 68798012, 22, 4, 10, '11-02-2022 11:02 PM', '12-02-2022', 1, 0, '', 'rest', 35000, 3500, 31500, 'Card Swipe', 11, 12, 1),
(51, 92639671, 11, 1, 1, '09-02-2022 07:02 PM', '12-02-2022', 1, 0, '', 'rest', 60000, 0, 60000, 'Bank Transfer', 12, 12, 1),
(53, 48084495, 9, 2, 5, '07-02-2022 09:02 AM', '12-02-2022', 1, 0, '', 'rest', 125000, 10000, 115000, 'Card Swipe', 12, 12, 1),
(54, 91255309, 25, 1, 1, '12-02-2022 06:02 PM', '13-02-2022', 1, 0, 'none', 'rest', 20000, 0, 20000, 'Bank Transfer', 12, 11, 1),
(55, 82903232, 17, 1, 2, '11-02-2022 01:02 PM', '13-02-2022', 1, 0, '', 'rest', 20000, 0, 20000, 'Card Swipe', 12, 12, 1),
(56, 78174514, 16, 1, 3, '11-02-2022 01:02 PM', '13-02-2022', 1, 0, '', 'rest', 20000, 0, 20000, 'Card Swipe', 12, 12, 1),
(57, 74731024, 26, 2, 5, '12-02-2022 07:02 PM', '13-02-2022', 1, 0, '', 'rest', 25000, 0, 25000, 'Card Swipe', 12, 12, 1),
(58, 79811269, 19, 3, 7, '12-02-2022 07:02 PM', '13-02-2022', 1, 0, '', 'rest', 30000, 3000, 27000, 'Card Swipe', 12, 12, 1),
(59, 87483398, 27, 5, 11, '12-02-2022 11:02 PM', '13-02-2022', 2, 0, '', 'rest', 40000, 5000, 35000, 'Card Swipe', 12, 11, 1),
(60, 73599372, 28, 3, 8, '12-02-2022 11:02 PM', '13-02-2022', 1, 0, '', 'rest', 30000, 0, 30000, 'Bank Transfer', 12, 11, 1),
(61, 81213502, 29, 2, 5, '14-02-2022 12:02 AM', '15-02-2022', 1, 0, '', 'rest', 25000, 0, 25000, 'Bank Transfer', 10, 12, 1),
(62, 94748720, 30, 1, 2, '14-02-2022 12:02 AM', '15-02-2022', 1, 0, '', 'rest', 20000, 0, 20000, 'Bank Transfer', 10, 12, 1),
(63, 19907813, 9, 1, 1, '14-02-2022 05:02 PM', '15-02-2022', 1, 0, '', 'work', 20000, 0, 20000, 'Bank Transfer', 12, 9, 1),
(65, 98255294, 31, 3, 7, '15-02-2022 08:02 PM', '16-02-2022', 1, 0, 'KSF225BG', 'rest', 30000, 0, 30000, 'Bank Transfer', 12, 12, 1),
(66, 42655426, 10, 6, 12, '16-02-2022 10:02 AM', '17-02-2022', 1, 0, '', 'work', 45000, 0, 45000, 'Bank Transfer', 10, 10, 1),
(69, 58554290, 9, 1, 1, '15-02-2022 05:02 PM', '18-02-2022', 0, 0, '', '', 60000, 0, 60000, 'Card Swipe', 10, 10, 1),
(70, 15716641, 34, 5, 11, '18-02-2022 01:02 PM', '20-02-2022', 1, 0, '', 'rest', 80000, 8000, 72000, 'Bank Transfer', 10, 12, 1),
(71, 42829686, 33, 1, 2, '18-02-2022 01:02 PM', '20-02-2022', 0, 0, '', '', 40000, 4000, 36000, 'Bank Transfer', 10, 11, 1),
(72, 23549115, 32, 4, 10, '18-02-2022 01:02 PM', '20-02-2022', 1, 0, '', 'rest7', 70000, 7000, 63000, 'Bank Transfer', 10, 11, 1),
(73, 46324264, 32, 4, 9, '18-02-2022 01:02 PM', '20-02-2022', 1, 0, '', 'rest', 70000, 7000, 63000, 'Bank Transfer', 10, 11, 1),
(74, 12241858, 9, 1, 1, '18-02-2022 04:02 PM', '19-02-2022', 1, 0, '', 'rest', 20000, 0, 20000, 'Card Swipe', 10, 10, 1),
(75, 99505976, 11, 2, 5, '16-02-2022 07:02 PM', '19-02-2022', 1, 0, 'RBC868SX', 'rest', 25000, 2000, 23000, 'Bank Transfer', 10, 12, 1),
(76, 23197169, 35, 1, 3, '18-02-2022 10:02 PM', '19-02-2022', 1, 0, 'none', 'rest', 20000, 0, 20000, 'Card Swipe', 12, 10, 1),
(77, 21825720, 28, 3, 7, '19-02-2022 02:02 PM', '20-02-2022', 1, 0, '', 'rest', 30000, 3000, 27000, 'Card Swipe', 10, 11, 1),
(78, 78001179, 38, 3, 8, '19-02-2022 05:02 PM', '20-02-2022', 1, 0, '', 'rest', 30000, 3000, 27000, 'Cash', 10, 11, 1),
(79, 89958684, 36, 6, 12, '19-02-2022 05:02 PM', '20-02-2022', 1, 0, '', 'rest', 50000, 0, 50000, 'Card Swipe', 10, 11, 1),
(80, 38992867, 36, 2, 5, '20-02-2022 10:02 PM', '21-02-2022', 2, 0, '', 'rest', 25000, 0, 25000, 'Bank Transfer', 11, 11, 1),
(81, 97316718, 39, 2, 5, '21-02-2022 05:02 PM', '23-02-2022', 1, 0, '', 'rest', 50000, 5000, 45000, 'Bank Transfer', 10, 0, 0),
(82, 69033589, 11, 2, 4, '21-02-2022 05:02 PM', '22-02-2022', 1, 0, '', '', 25000, 2000, 23000, 'Bank Transfer', 10, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `bill_no` varchar(20) NOT NULL,
  `category` varchar(50) NOT NULL,
  `client` varchar(50) NOT NULL,
  `date` varchar(20) NOT NULL,
  `amount` int(11) NOT NULL,
  `lodge_no` varchar(20) NOT NULL,
  `payment_option` varchar(20) NOT NULL,
  `sold_by` int(11) NOT NULL,
  `ptr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `bill_no`, `category`, `client`, `date`, `amount`, `lodge_no`, `payment_option`, `sold_by`, `ptr`) VALUES
(1, '32109079', 'Food', 'Walk-In', '04-02-2022', 4500, '', 'Bank Transfer', 12, 0),
(2, '85082874', 'Food', 'Walk-In', '04-02-2022', 300, '', 'Cash', 12, 0),
(3, '97880075', 'Food', '7', '04-02-2022', 600, '34140166', 'Post To Room', 10, 1),
(4, '49596613', 'Food', '6', '05-02-2022', 4000, '55054640', 'Post To Room', 10, 1),
(5, '34373061', 'Food', '6', '05-02-2022', 500, '55054640', 'Cash', 10, 0),
(6, '60017989', 'Food', '8', '05-02-2022', 1200, '86475830', 'Cash', 12, 0),
(7, '34161621', 'Food', '8', '05-02-2022', 500, '86475830', 'Cash', 12, 0),
(8, '80679245', 'Food', '2', '05-02-2022', 12000, '40685944', 'Post To Room', 12, 1),
(9, '99055833', 'Food', '2', '05-02-2022', 23000, '40685944', 'Post To Room', 12, 1),
(10, '47986847', 'Food', '2', '05-02-2022', 900, '77116930', 'Post To Room', 12, 1),
(11, '51036328', 'Food', '2', '05-02-2022', 3300, '77116930', 'Post To Room', 12, 1),
(12, '56295636', 'Food', '2', '05-02-2022', 3300, '77116930', 'Post To Room', 12, 1),
(13, '33470057', 'Food', '3', '05-02-2022', 1100, '57262922', 'Post To Room', 12, 1),
(14, '91101173', 'Food', 'Walk-In', '05-02-2022', 4300, '', 'Card Swipe', 12, 0),
(15, '20611951', 'Food', '9', '09-02-2022', 1500, '48084495', 'Post To Room', 10, 1),
(16, '51126598', 'Food', '9', '09-02-2022', 4000, '48084495', 'Post To Room', 10, 1),
(17, '31420826', 'Food', '9', '09-02-2022', 500, '48084495', 'Post To Room', 10, 1),
(18, '18840054', 'Food', '9', '09-02-2022', 6000, '48084495', 'Post To Room', 10, 1),
(19, '23160255', 'Food', '9', '09-02-2022', 500, '48084495', 'Post To Room', 10, 1),
(20, '67543228', 'Food', '12', '09-02-2022', 4500, '43856618', 'Post To Room', 10, 1),
(21, '62144303', 'Food', '12', '09-02-2022', 500, '43856618', 'Post To Room', 10, 1),
(22, '84484954', 'Food', '12', '10-02-2022', 0, '43856618', 'Post To Room', 10, 1),
(23, '81076373', 'Food', '10', '10-02-2022', 0, '88043517', 'Post To Room', 11, 1),
(24, '12095151', 'Food', '11', '10-02-2022', 0, '92639671', 'Post To Room', 11, 1),
(25, '51927518', 'Food', '9', '10-02-2022', 0, '48084495', 'Post To Room', 11, 1),
(26, '79794931', 'Food', '12', '10-02-2022', 500, '43856618', 'Post To Room', 10, 1),
(27, '84178837', 'Food', '12', '10-02-2022', 3500, '43856618', 'Post To Room', 10, 1),
(28, '69410568', 'Food', '12', '10-02-2022', 300, '43856618', 'Post To Room', 10, 1),
(29, '68742957', 'Food', '14', '10-02-2022', 500, '81702489', 'Post To Room', 10, 1),
(30, '81296633', 'Food', '14', '10-02-2022', 1000, '81702489', 'Post To Room', 10, 1),
(31, '98816728', 'Food', '14', '10-02-2022', 700, '81702489', 'Post To Room', 10, 1),
(32, '26146886', 'Food', '14', '10-02-2022', 500, '81702489', 'Post To Room', 10, 1),
(33, '68307314', 'Food', '18', '12-02-2022', 4800, '16353124', 'Post To Room', 11, 1),
(34, '72993957', 'Food', '21', '12-02-2022', 8100, '34590694', 'Post To Room', 11, 1),
(35, '24056730', 'Food', '17', '12-02-2022', 0, '82903232', 'Post To Room', 12, 1),
(36, '15300778', 'Food', '16', '12-02-2022', 0, '78174514', 'Post To Room', 12, 1),
(37, '67870712', 'Food', '22', '12-02-2022', 0, '68798012', 'Post To Room', 12, 1),
(38, '50428983', 'Food', '20', '12-02-2022', 0, '88600207', 'Post To Room', 12, 1),
(39, '32995652', 'Food', '18', '12-02-2022', 0, '16353124', 'Post To Room', 12, 1),
(40, '57942485', 'Food', '24', '12-02-2022', 0, '66952807', 'Post To Room', 12, 1),
(41, '29906072', 'Food', '23', '12-02-2022', 0, '83119636', 'Post To Room', 12, 1),
(42, '26342456', 'Food', '9', '12-02-2022', 0, '48084495', 'Post To Room', 12, 1),
(43, '83747797', 'Food', '21', '12-02-2022', 600, '34590694', 'Post To Room', 12, 1),
(44, '85518612', 'Food', '18', '12-02-2022', 19000, '16353124', 'Post To Room', 12, 1),
(45, '22227471', 'Food', '19', '12-02-2022', 6000, '89422083', 'Post To Room', 12, 1),
(46, '58566350', 'Food', '18', '12-02-2022', 5350, '16353124', 'Post To Room', 12, 1),
(47, '23482093', 'Food', '17', '12-02-2022', 1000, '82903232', 'Card Swipe', 12, 0),
(48, '39660975', 'Food', '18', '13-02-2022', 2100, '16353124', 'Post To Room', 12, 1),
(49, '59092202', 'Food', '20', '13-02-2022', 300, '88600207', 'Post To Room', 12, 1),
(50, '17752890', 'Food', '27', '13-02-2022', 1400, '87483398', 'Bank Transfer', 11, 0),
(51, '27453893', 'Food', '25', '13-02-2022', 0, '91255309', 'Post To Room', 11, 1),
(52, '27027477', 'Food', '28', '13-02-2022', 0, '73599372', 'Post To Room', 11, 1),
(53, '38706537', 'Food', '9', '14-02-2022', 300, '19907813', 'Post To Room', 10, 1),
(54, '78762517', 'Food', '9', '15-02-2022', 2400, '58554290', 'Post To Room', 12, 1),
(55, '98903261', 'Food', '31', '16-02-2022', 13100, '98255294', 'Post To Room', 12, 1),
(56, '50080806', 'Food', '9', '16-02-2022', 2700, '58554290', 'Post To Room', 12, 1),
(57, '43564630', 'Food', '9', '17-02-2022', 5100, '58554290', 'Post To Room', 12, 1),
(58, '18729556', 'Food', '32', '18-02-2022', 800, '23549115', 'Post To Room', 10, 1),
(59, '54436160', 'Food', '32', '18-02-2022', 300, '23549115', 'Post To Room', 10, 1),
(60, '18781998', 'Food', '34', '18-02-2022', 300, '15716641', 'Post To Room', 10, 1),
(61, '76548763', 'Food', '32', '18-02-2022', 300, '46324264', 'Post To Room', 10, 1),
(62, '43059940', 'Food', '33', '18-02-2022', 300, '42829686', 'Post To Room', 10, 1),
(63, '38223054', 'Food', '32', '18-02-2022', 300, '46324264', 'Post To Room', 10, 1),
(64, '46353960', 'Food', '32', '18-02-2022', 600, '23549115', 'Post To Room', 10, 1),
(65, '63556664', 'Food', '34', '18-02-2022', 300, '15716641', 'Post To Room', 10, 1),
(66, '57925934', 'Food', '33', '18-02-2022', 3500, '42829686', 'Post To Room', 10, 1),
(67, '36225974', 'Food', '33', '18-02-2022', 300, '42829686', 'Post To Room', 10, 1),
(68, '62881452', 'Food', '9', '19-02-2022', 3000, '12241858', 'Post To Room', 12, 1),
(69, '60625377', 'Food', '34', '19-02-2022', 300, '15716641', 'Post To Room', 12, 1),
(70, '26974288', 'Food', '34', '19-02-2022', 0, '15716641', 'Post To Room', 10, 1),
(71, '95133354', 'Food', '32', '19-02-2022', 0, '23549115', 'Post To Room', 10, 1),
(72, '92872896', 'Food', '32', '19-02-2022', 0, '46324264', 'Post To Room', 10, 1),
(73, '95614718', 'Food', '33', '19-02-2022', 0, '42829686', 'Post To Room', 10, 1),
(74, '81161295', 'Food', '9', '19-02-2022', 0, '12241858', 'Post To Room', 10, 1),
(75, '32293397', 'Food', '35', '19-02-2022', 0, '23197169', 'Post To Room', 10, 1),
(76, '34675877', 'Food', '28', '19-02-2022', 2500, '21825720', 'Post To Room', 10, 1),
(77, '16278680', 'Food', '28', '19-02-2022', 400, '21825720', 'Post To Room', 10, 1),
(78, '51596096', 'Food', '28', '19-02-2022', 300, '21825720', 'Post To Room', 10, 1),
(79, '47517964', 'Food', '32', '19-02-2022', 900, '23549115', 'Post To Room', 10, 1),
(80, '21831466', 'Food', '28', '19-02-2022', 9700, '21825720', 'Post To Room', 10, 1),
(81, '91893922', 'Food', '32', '19-02-2022', 17200, '23549115', 'Post To Room', 12, 1),
(82, '26577496', 'Food', '28', '20-02-2022', 8700, '21825720', 'Post To Room', 11, 1),
(83, '44941084', 'Food', '38', '20-02-2022', 600, '78001179', 'Post To Room', 11, 1),
(84, '11141171', 'Food', '28', '20-02-2022', 500, '21825720', 'Post To Room', 11, 1),
(85, '42356190', 'Food', '38', '20-02-2022', 0, '78001179', 'Post To Room', 11, 1),
(86, '59701001', 'Food', '38', '20-02-2022', 0, '78001179', 'Post To Room', 11, 1),
(87, '96656841', 'Food', '36', '21-02-2022', 0, '38992867', 'Post To Room', 11, 1),
(88, '90798438', 'Food', '39', '21-02-2022', 4800, '97316718', 'Post To Room', 12, 1),
(89, '70286217', 'Food', '11', '21-02-2022', 1200, '69033589', 'Post To Room', 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders_item`
--

CREATE TABLE `orders_item` (
  `orders_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `rate` int(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `amount` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_item`
--

INSERT INTO `orders_item` (`orders_item_id`, `order_id`, `item_id`, `rate`, `qty`, `amount`) VALUES
(1, 1, 16, 4500, 1, 4500),
(2, 2, 18, 300, 1, 300),
(3, 3, 18, 300, 2, 600),
(4, 4, 19, 4000, 1, 4000),
(5, 5, 20, 500, 1, 500),
(6, 6, 18, 300, 4, 1200),
(7, 7, 20, 500, 1, 500),
(8, 8, 19, 4000, 3, 12000),
(9, 9, 35, 3500, 2, 7000),
(10, 9, 37, 3500, 1, 3500),
(11, 9, 39, 4500, 1, 4500),
(12, 9, 11, 3000, 2, 6000),
(13, 9, 20, 500, 2, 1000),
(14, 9, 28, 400, 1, 400),
(15, 9, 18, 300, 2, 600),
(16, 10, 54, 300, 3, 900),
(17, 11, 53, 1500, 2, 3000),
(18, 11, 18, 300, 1, 300),
(19, 12, 53, 1500, 2, 3000),
(20, 12, 18, 300, 1, 300),
(21, 13, 18, 300, 2, 600),
(22, 13, 20, 500, 1, 500),
(23, 14, 37, 3500, 1, 3500),
(24, 14, 55, 500, 1, 500),
(25, 14, 18, 300, 1, 300),
(26, 15, 136, 1500, 1, 1500),
(27, 16, 44, 4000, 1, 4000),
(28, 17, 20, 500, 1, 500),
(29, 18, 86, 6000, 1, 6000),
(30, 19, 55, 500, 1, 500),
(31, 20, 39, 4500, 1, 4500),
(32, 21, 20, 500, 1, 500),
(33, 22, 4, 0, 1, 0),
(34, 23, 3, 0, 1, 0),
(35, 24, 3, 0, 1, 0),
(36, 25, 4, 0, 1, 0),
(37, 26, 94, 500, 1, 500),
(38, 27, 137, 3500, 1, 3500),
(39, 28, 18, 300, 1, 300),
(40, 29, 75, 500, 1, 500),
(41, 30, 77, 1000, 1, 1000),
(42, 31, 80, 700, 1, 700),
(43, 32, 20, 500, 1, 500),
(44, 33, 18, 300, 1, 300),
(45, 33, 20, 500, 1, 500),
(46, 33, 19, 4000, 1, 4000),
(47, 34, 19, 4000, 1, 4000),
(48, 34, 25, 2500, 1, 2500),
(49, 34, 18, 300, 2, 600),
(50, 34, 89, 500, 1, 500),
(51, 34, 20, 500, 1, 500),
(52, 35, 3, 0, 1, 0),
(53, 36, 3, 0, 1, 0),
(54, 37, 3, 0, 1, 0),
(55, 38, 4, 0, 1, 0),
(56, 39, 4, 0, 1, 0),
(57, 40, 3, 0, 2, 0),
(58, 41, 3, 0, 1, 0),
(59, 42, 4, 0, 1, 0),
(60, 43, 18, 300, 2, 600),
(61, 44, 14, 3000, 1, 3000),
(62, 44, 41, 4500, 1, 4500),
(63, 44, 18, 300, 3, 900),
(64, 44, 33, 700, 3, 2100),
(65, 44, 29, 400, 2, 800),
(66, 44, 34, 700, 1, 700),
(67, 44, 89, 500, 1, 500),
(68, 44, 85, 1500, 2, 3000),
(69, 44, 85, 1500, 2, 3000),
(70, 44, 20, 500, 1, 500),
(71, 45, 14, 3000, 1, 3000),
(72, 45, 14, 3000, 1, 3000),
(73, 46, 29, 400, 2, 800),
(74, 46, 77, 1000, 1, 1000),
(75, 46, 53, 1500, 1, 1500),
(76, 46, 84, 750, 1, 750),
(77, 46, 82, 1000, 1, 1000),
(78, 46, 18, 300, 1, 300),
(79, 47, 18, 300, 2, 600),
(80, 47, 28, 400, 1, 400),
(81, 48, 34, 700, 2, 1400),
(82, 48, 29, 400, 1, 400),
(83, 48, 18, 300, 1, 300),
(84, 49, 18, 300, 1, 300),
(85, 50, 3, 0, 1, 0),
(86, 50, 4, 0, 1, 0),
(87, 50, 80, 700, 2, 1400),
(88, 51, 3, 0, 1, 0),
(89, 52, 4, 0, 1, 0),
(90, 53, 18, 300, 1, 300),
(91, 54, 138, 1500, 1, 1500),
(92, 54, 29, 400, 1, 400),
(93, 54, 20, 500, 1, 500),
(94, 55, 16, 4500, 1, 4500),
(95, 55, 44, 4000, 1, 4000),
(96, 55, 139, 3500, 1, 3500),
(97, 55, 18, 300, 2, 600),
(98, 55, 20, 500, 1, 500),
(99, 56, 138, 1500, 1, 1500),
(100, 56, 140, 700, 1, 700),
(101, 56, 20, 500, 1, 500),
(102, 57, 19, 4000, 1, 4000),
(103, 57, 18, 300, 2, 600),
(104, 57, 20, 500, 1, 500),
(105, 57, 4, 0, 1, 0),
(106, 58, 29, 400, 2, 800),
(107, 59, 18, 300, 1, 300),
(108, 60, 18, 300, 1, 300),
(109, 61, 18, 300, 1, 300),
(110, 62, 18, 300, 1, 300),
(111, 63, 18, 300, 1, 300),
(112, 64, 18, 300, 2, 600),
(113, 65, 18, 300, 1, 300),
(114, 66, 36, 3500, 1, 3500),
(115, 67, 18, 300, 1, 300),
(116, 68, 138, 1500, 1, 1500),
(117, 68, 82, 1000, 1, 1000),
(118, 68, 20, 500, 1, 500),
(119, 69, 18, 300, 1, 300),
(120, 70, 4, 0, 1, 0),
(121, 71, 4, 0, 1, 0),
(122, 72, 4, 0, 1, 0),
(123, 73, 4, 0, 1, 0),
(124, 74, 4, 0, 1, 0),
(125, 75, 5, 0, 1, 0),
(126, 76, 141, 2500, 1, 2500),
(127, 77, 30, 400, 1, 400),
(128, 78, 18, 300, 1, 300),
(129, 79, 54, 300, 2, 600),
(130, 79, 102, 300, 1, 300),
(131, 80, 71, 4500, 1, 4500),
(132, 80, 68, 4500, 1, 4500),
(133, 80, 18, 300, 1, 300),
(134, 80, 30, 400, 1, 400),
(135, 81, 75, 500, 4, 2000),
(136, 81, 53, 1500, 3, 4500),
(137, 81, 53, 1500, 2, 3000),
(138, 81, 142, 500, 2, 1000),
(139, 81, 18, 300, 4, 1200),
(140, 81, 35, 3500, 1, 3500),
(141, 81, 64, 1500, 1, 1500),
(142, 81, 20, 500, 1, 500),
(143, 82, 71, 4500, 1, 4500),
(144, 82, 24, 3000, 1, 3000),
(145, 82, 18, 300, 1, 300),
(146, 82, 30, 400, 1, 400),
(147, 82, 20, 500, 1, 500),
(148, 83, 18, 300, 2, 600),
(149, 84, 3, 0, 1, 0),
(150, 84, 20, 500, 1, 500),
(151, 85, 3, 0, 1, 0),
(152, 86, 5, 0, 1, 0),
(153, 87, 4, 0, 1, 0),
(154, 88, 61, 3500, 1, 3500),
(155, 88, 91, 500, 1, 500),
(156, 88, 18, 300, 1, 300),
(157, 88, 20, 500, 1, 500),
(158, 89, 80, 700, 1, 700),
(159, 89, 20, 500, 1, 500);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `payment_date` varchar(20) NOT NULL,
  `payment_no` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `being` text NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_option` varchar(50) NOT NULL,
  `payment_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_date`, `payment_no`, `client_id`, `being`, `amount`, `payment_option`, `payment_by`) VALUES
(1, '09-03-2022', 50390371, 2, 'Being payment for 6 rooms reservation', 26000, 'Card Swipe', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL,
  `reservation_date` varchar(20) NOT NULL,
  `reservation_no` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `room_type_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `check_in_date` varchar(50) NOT NULL,
  `check_out_date` varchar(50) NOT NULL,
  `adult_no` int(11) NOT NULL,
  `kid_no` int(50) NOT NULL,
  `vehicle_no` varchar(50) NOT NULL,
  `reason` text NOT NULL,
  `gross_amount` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `deposit_amount` int(11) NOT NULL,
  `balance_amount` int(11) NOT NULL,
  `payment_option` varchar(50) NOT NULL,
  `check_in_by` int(11) NOT NULL,
  `check_out_by` int(11) NOT NULL,
  `checked_out` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `reservation_date`, `reservation_no`, `client_id`, `room_type_id`, `room_id`, `check_in_date`, `check_out_date`, `adult_no`, `kid_no`, `vehicle_no`, `reason`, `gross_amount`, `discount`, `total_amount`, `deposit_amount`, `balance_amount`, `payment_option`, `check_in_by`, `check_out_by`, `checked_out`) VALUES
(1, '04-02-2022', 50968717, 4, 5, 11, '09-02-2022 12:02 AM', '11-02-2022', 1, 0, '', 'rest', 80000, 0, 80000, 80000, 0, 'Bank Transfer', 12, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `permissions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `permissions`) VALUES
(1, 'SuperAdmin', 'a:60:{i:0;s:12:\"addAmenities\";i:1;s:13:\"editAmenities\";i:2;s:13:\"viewAmenities\";i:3;s:15:\"deleteAmenities\";i:4;s:17:\"addAmenitiesOrder\";i:5;s:18:\"editAmenitiesOrder\";i:6;s:18:\"viewAmenitiesOrder\";i:7;s:20:\"deleteAmenitiesOrder\";i:8;s:9:\"addClient\";i:9;s:10:\"editClient\";i:10;s:10:\"viewClient\";i:11;s:12:\"deleteClient\";i:12;s:7:\"addFood\";i:13;s:8:\"editFood\";i:14;s:8:\"viewFood\";i:15;s:10:\"deleteFood\";i:16;s:12:\"addFoodOrder\";i:17;s:13:\"editFoodOrder\";i:18;s:13:\"viewFoodOrder\";i:19;s:15:\"deleteFoodOrder\";i:20;s:8:\"addLodge\";i:21;s:9:\"editLodge\";i:22;s:9:\"viewLodge\";i:23;s:11:\"deleteLodge\";i:24;s:10:\"addPayment\";i:25;s:11:\"editPayment\";i:26;s:11:\"viewPayment\";i:27;s:13:\"deletePayment\";i:28;s:13:\"addPermission\";i:29;s:14:\"editPermission\";i:30;s:14:\"viewPermission\";i:31;s:16:\"deletePermission\";i:32;s:14:\"addReservation\";i:33;s:15:\"editReservation\";i:34;s:15:\"viewReservation\";i:35;s:17:\"deleteReservation\";i:36;s:7:\"addRoom\";i:37;s:8:\"editRoom\";i:38;s:8:\"viewRoom\";i:39;s:10:\"deleteRoom\";i:40;s:10:\"addSetting\";i:41;s:11:\"editSetting\";i:42;s:11:\"viewSetting\";i:43;s:13:\"deleteSetting\";i:44;s:8:\"addStock\";i:45;s:9:\"editStock\";i:46;s:9:\"viewStock\";i:47;s:11:\"deleteStock\";i:48;s:13:\"addStockOrder\";i:49;s:14:\"editStockOrder\";i:50;s:14:\"viewStockOrder\";i:51;s:16:\"deleteStockOrder\";i:52;s:14:\"addTransaction\";i:53;s:15:\"editTransaction\";i:54;s:15:\"viewTransaction\";i:55;s:17:\"deleteTransaction\";i:56;s:7:\"addUser\";i:57;s:8:\"editUser\";i:58;s:8:\"viewUser\";i:59;s:10:\"deleteUser\";}'),
(2, 'Manager', 'a:54:{i:0;s:12:\"addAmenities\";i:1;s:13:\"editAmenities\";i:2;s:13:\"viewAmenities\";i:3;s:15:\"deleteAmenities\";i:4;s:17:\"addAmenitiesOrder\";i:5;s:18:\"editAmenitiesOrder\";i:6;s:18:\"viewAmenitiesOrder\";i:7;s:20:\"deleteAmenitiesOrder\";i:8;s:9:\"addClient\";i:9;s:10:\"editClient\";i:10;s:10:\"viewClient\";i:11;s:12:\"deleteClient\";i:12;s:7:\"addFood\";i:13;s:8:\"editFood\";i:14;s:8:\"viewFood\";i:15;s:10:\"deleteFood\";i:16;s:12:\"addFoodOrder\";i:17;s:13:\"viewFoodOrder\";i:18;s:15:\"deleteFoodOrder\";i:19;s:8:\"addLodge\";i:20;s:9:\"editLodge\";i:21;s:9:\"viewLodge\";i:22;s:11:\"deleteLodge\";i:23;s:13:\"addPermission\";i:24;s:14:\"editPermission\";i:25;s:14:\"viewPermission\";i:26;s:16:\"deletePermission\";i:27;s:14:\"addReservation\";i:28;s:15:\"editReservation\";i:29;s:15:\"viewReservation\";i:30;s:17:\"deleteReservation\";i:31;s:7:\"addRoom\";i:32;s:8:\"editRoom\";i:33;s:8:\"viewRoom\";i:34;s:10:\"deleteRoom\";i:35;s:10:\"addSetting\";i:36;s:11:\"editSetting\";i:37;s:11:\"viewSetting\";i:38;s:13:\"deleteSetting\";i:39;s:8:\"addStock\";i:40;s:9:\"editStock\";i:41;s:9:\"viewStock\";i:42;s:11:\"deleteStock\";i:43;s:13:\"addStockOrder\";i:44;s:14:\"viewStockOrder\";i:45;s:16:\"deleteStockOrder\";i:46;s:14:\"addTransaction\";i:47;s:15:\"editTransaction\";i:48;s:15:\"viewTransaction\";i:49;s:17:\"deleteTransaction\";i:50;s:7:\"addUser\";i:51;s:8:\"editUser\";i:52;s:8:\"viewUser\";i:53;s:10:\"deleteUser\";}'),
(3, 'Receptionist', 'a:30:{i:0;s:12:\"addAmenities\";i:1;s:13:\"editAmenities\";i:2;s:13:\"viewAmenities\";i:3;s:17:\"addAmenitiesOrder\";i:4;s:18:\"viewAmenitiesOrder\";i:5;s:9:\"addClient\";i:6;s:10:\"editClient\";i:7;s:10:\"viewClient\";i:8;s:7:\"addFood\";i:9;s:8:\"editFood\";i:10;s:8:\"viewFood\";i:11;s:12:\"addFoodOrder\";i:12;s:13:\"viewFoodOrder\";i:13;s:8:\"addLodge\";i:14;s:9:\"editLodge\";i:15;s:9:\"viewLodge\";i:16;s:14:\"addReservation\";i:17;s:15:\"editReservation\";i:18;s:15:\"viewReservation\";i:19;s:7:\"addRoom\";i:20;s:8:\"editRoom\";i:21;s:8:\"viewRoom\";i:22;s:8:\"addStock\";i:23;s:9:\"editStock\";i:24;s:9:\"viewStock\";i:25;s:13:\"addStockOrder\";i:26;s:14:\"viewStockOrder\";i:27;s:14:\"addTransaction\";i:28;s:15:\"viewTransaction\";i:29;s:8:\"viewUser\";}');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `room_no` int(11) NOT NULL,
  `room_type_id` int(11) NOT NULL,
  `room_status` varchar(20) NOT NULL,
  `lodge_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_no`, `room_type_id`, `room_status`, `lodge_no`) VALUES
(1, 206, 1, 'Vacant', ''),
(2, 207, 1, 'Vacant', ''),
(3, 208, 1, 'Vacant', ''),
(4, 104, 2, 'Occupied', '69033589'),
(5, 203, 2, 'Occupied', '97316718'),
(6, 101, 3, 'Vacant', ''),
(7, 202, 3, 'Vacant', ''),
(8, 204, 3, 'Vacant', ''),
(9, 102, 4, 'Vacant', ''),
(10, 105, 4, 'Vacant', ''),
(11, 103, 5, 'Vacant', ''),
(12, 106, 6, 'Vacant', ''),
(13, 205, 7, 'Vacant', ''),
(14, 201, 8, 'Vacant', '');

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE `room_type` (
  `room_type_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `adult` int(11) NOT NULL,
  `kid` int(11) NOT NULL,
  `air_condition` int(11) NOT NULL,
  `free_wifi` int(11) NOT NULL,
  `breakfast` int(11) NOT NULL,
  `double_bed` int(11) NOT NULL,
  `newspaper` int(11) NOT NULL,
  `coffee_maker` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`room_type_id`, `title`, `price`, `adult`, `kid`, `air_condition`, `free_wifi`, `breakfast`, `double_bed`, `newspaper`, `coffee_maker`) VALUES
(1, 'Olive', 20000, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 'Cherry', 25000, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 'Tulip', 30000, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 'Daisy', 35000, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 'Hibiscus', 40000, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 'Fairview', 45000, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 'Butterfly', 50000, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 'Classic Gold', 55000, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `stock_name` varchar(50) NOT NULL,
  `cost_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `stock_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `stock_name`, `cost_price`, `selling_price`, `stock_qty`) VALUES
(1, 'Malta Guiness', 400, 500, 20),
(2, 'Juice 1 ltr', 1350, 1500, 19),
(3, 'toast or fresh bread served with choice of eggs wi', 0, 2500, 55),
(4, 'club sandwish with chicken and bacon with tea or c', 0, 2500, 55),
(5, 'omelette sandwish with or coffee', 0, 2500, 20),
(6, 'veggies,sausage or omelette served with tea or cof', 0, 2500, 20),
(7, 'fruit juice,choice of egg/boiled eggs/ scramble eg', 0, 4000, 20),
(8, 'chinese fried /whita rice served in oyster sauce', 0, 4500, 20),
(9, 'boiled or fried yam served with egg sauce/fish sau', 0, 3000, 20),
(10, 'boiled plantain served with vegetables with tea or', 0, 3000, 20),
(11, 'boiled or fried potatoes served with stewed egg/ f', 0, 3000, 20),
(12, 'fried plantain with omelette with tea or coffee', 0, 3000, 20),
(13, 'moin-moin/akara served with pap/custard/oats', 0, 3000, 20),
(14, 'fruit salad(diced pineapple,watermelon,pawpaw and ', 0, 2000, 20),
(15, 'smoothies(blended fruits with yogurt)', 0, 2000, 20),
(16, 'salad(a crunchy cabbage and tomato based salad mix', 0, 2500, 20),
(17, 'coleslaw(julienne of cabbage and carrot in mayonni', 0, 1000, 20),
(18, 'chicken nuggets', 0, 1500, 10),
(19, 'meat(peppered meat)', 0, 1500, 20),
(20, 'peppered gizzard', 0, 1500, 20),
(21, 'peppered snail', 0, 3500, 20),
(22, 'chicken wings or sweet spicy chicken wings', 0, 2000, 20),
(23, 'goat meat pepper soup', 0, 3000, 20),
(24, 'fish pepper soup (croacker/cat fish)', 0, 2500, 20),
(25, 'cow leg pepper soup', 0, 2000, 20),
(26, 'assorted pepper soup', 0, 2000, 20),
(27, 'water', 0, 300, 55),
(28, 'Amala served with gbegiri/ewedu/okro fish stew,pon', 0, 3500, 20),
(29, 'egusi ijebu/ekiti with stock fish/dried fish and p', 0, 3500, 20),
(30, 'efo riro with stock fish/dried fish,ponmo served w', 0, 3500, 20),
(31, 'groundnut soup with dried fish,ponmo,stock fish wi', 0, 3500, 20),
(32, 'Edika-ikong  served with choice of swallow', 0, 4500, 20),
(33, 'ofensala(whitesoup)/o.h.a,choie  of proteins and s', 0, 4500, 20),
(34, 'Mixed okra soup(ila alasepo) served with choice of', 0, 4500, 20),
(35, 'fisherman okra served with snail,shrimps,titus,cat', 0, 6000, 20),
(36, 'ofada/ayamashe sauce with assorted meat,boiled egg', 0, 3500, 20),
(37, 'room service', 0, 500, 55),
(38, 'extra protein(fish/chicken/meat', 0, 1500, 20),
(39, 'laundry ironing(gown)', 0, 300, 20),
(40, 'take-away pack big', 0, 500, 20),
(41, 'classic steak(grilled juicy matured steak)served w', 0, 4000, 20),
(42, 'pork chops(pork chops grilled to perfection)served', 0, 4000, 20),
(43, 'chicken in curry sauce with boiled egg and potatoe', 0, 4000, 20),
(44, 'grilled honey lemon or barbecue glazed chicken ser', 0, 4000, 20),
(45, 'shredded beef or chicken in sweet and sour sauce s', 0, 3500, 20),
(46, 'chinese fried rice served in oyster sauce (include', 0, 4500, 20),
(47, 'grilled fish/chicken/beef served with oriental/jam', 0, 4000, 20),
(48, 'buttered parsley potatoes served with T/Bone steak', 0, 3500, 20),
(49, 'potatoes wedges served with breaded chicken and di', 0, 3500, 20),
(50, 'lyoness potatoes served with breaded fish and cole', 0, 3500, 20),
(51, 'Gizdodo with veggies and sauce served with rice', 0, 3500, 20),
(52, 'Grilled or fried chicken and chips (served with fr', 0, 3500, 55),
(53, 'Chicken escalope (breaded chicken breast shallow f', 0, 3500, 20),
(54, 'Big mama selina   ', 0, 5000, 20),
(55, 'Fried fish and chips served with coleslaw', 0, 3500, 20),
(56, 'spaghetti bologness', 0, 3500, 20),
(57, 'spaghetti with chicken and bell pepper', 0, 3500, 20),
(58, 'noodles', 0, 1500, 55),
(59, 'noodles special', 0, 3000, 55),
(60, 'white,jollof or fried rice served with choice of p', 0, 4000, 55),
(61, 'basmati white or jollof rice served with stewed ch', 0, 4500, 20),
(62, 'white rice with efo riro', 0, 4500, 20),
(63, 'Dodo  and egg', 0, 3000, 20),
(64, 'coconut rice', 0, 3500, 20),
(65, 'ofada rice(with peppered stewed assorted meat and ', 0, 4500, 20),
(66, 'yam pottage', 0, 3500, 20),
(67, 'jollof or fried rice extra', 0, 2000, 20),
(68, 'white/ basmati rice extra', 0, 1500, 20),
(69, 'plantain   extra', 0, 500, 20),
(70, 'Akara extra', 0, 1000, 20),
(71, 'meat/ chicken/ fish extra', 0, 1500, 20),
(72, 'yam extra', 0, 1000, 20),
(73, 'ogi extra', 0, 500, 5),
(74, 'bread extra', 0, 500, 20),
(75, 'eggs extra', 0, 700, 20),
(76, 'bacon extra', 0, 750, 10),
(77, 'chips extra', 0, 1000, 20),
(78, 'baked beans extra', 0, 500, 10),
(79, 'sausage extra', 0, 750, 10),
(80, 'juice 50cl', 0, 350, 20),
(81, 'coke', 150, 400, 20),
(82, 'fanta', 150, 400, 20),
(83, 'sprite', 150, 400, 20),
(84, 'juice 31.5cl', 0, 500, 10),
(85, 'chapman', 0, 1500, 10),
(86, 'orijin zero', 0, 500, 10),
(87, 'trophy', 0, 700, 10),
(88, 'guiness stout', 0, 700, 10),
(89, 'maltina', 0, 500, 20),
(90, 'monster', 0, 1000, 10),
(91, 'power horse', 0, 1000, 10),
(92, 'smirnoff', 0, 700, 10),
(93, 'red bull', 0, 800, 10),
(94, 'amstel malta', 0, 500, 20),
(95, 'four cousin', 0, 6000, 5),
(96, 'carlo rossi (smooth)', 0, 7000, 5),
(97, 'carlo rossi (sweet)', 0, 7000, 5),
(98, 'shirt washing', 0, 300, 0),
(99, 'shirt ironing', 0, 300, 0),
(100, 'trouser washing', 0, 300, 0),
(101, 'trouser ironing', 0, 300, 0),
(102, 'french suit /jacket washing', 0, 600, 0),
(103, 'french suit/jacket ironing', 0, 400, 0),
(104, 'safari suit washing', 0, 600, 0),
(105, 'safari suit ironing', 0, 300, 0),
(106, 'short washing', 0, 300, 0),
(107, 'short ironing', 0, 300, 0),
(108, 'complete africa dress washing', 0, 1000, 0),
(109, 'complete africa dress ironing', 0, 700, 0),
(110, 'buba and sokoto washing', 0, 600, 0),
(111, 'buba and sokoto ironing', 0, 300, 0),
(112, 'agbada washing', 0, 450, 0),
(113, 'agbada ironing', 0, 300, 0),
(114, 'pyjamas washing', 0, 350, 0),
(115, 'pyjamas ironing', 0, 300, 0),
(116, 'ladies blouse washing', 0, 300, 0),
(117, 'ladies blouse ironing', 0, 300, 0),
(118, 'iro and buba washing', 0, 500, 0),
(119, 'iro and buba ironing', 0, 300, 0),
(120, 'laundry  washing (gown)', 0, 400, 0),
(121, 'kaftan washing', 0, 600, 0),
(122, 'kaftan ironing', 0, 400, 0),
(123, 'evening dress washing', 0, 600, 0),
(124, 'evening dress ironing', 0, 450, 0),
(125, 'towel washing', 0, 300, 0),
(126, 'towel ironing ', 0, 300, 0),
(127, 'skirt and blouse washing (kids)', 0, 250, 0),
(128, 'skirt and blouse ironing (kids)', 0, 250, 0),
(129, 'shirt and trouser kids washing', 0, 250, 0),
(130, 'shirt and trouser kids ironing ', 0, 250, 0),
(131, 'buba and sokoto kids washing', 0, 300, 0),
(132, 'buba and sokoto kids  ironing ', 0, 250, 0),
(133, 'pyjamas kids washing', 0, 200, 0),
(134, 'pyjamas kids ironing', 0, 200, 0),
(135, 'chicken and chip with coleslsw', 0, 3500, 25),
(136, 'hennkien', 0, 700, 25),
(137, 'efo riro extra', 0, 500, 10);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `ptr` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `bill_no` varchar(50) NOT NULL,
  `lodge_no` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `room_type_id` varchar(3) NOT NULL,
  `room_id` varchar(3) NOT NULL,
  `trans_cat` varchar(20) NOT NULL,
  `staff_id` varchar(11) NOT NULL,
  `close_id` varchar(11) NOT NULL,
  `submitted_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `guest_id`, `ptr`, `title`, `bill_no`, `lodge_no`, `amount`, `date`, `room_type_id`, `room_id`, `trans_cat`, `staff_id`, `close_id`, `submitted_date`) VALUES
(4, 3, 1, 'Check-In', '', '57262922', 30000, '04-02-2022', '3', '7', 'income', '12', '', ''),
(5, 5, 1, 'Check-In', '', '66339046', 30000, '03-02-2022', '3', '6', 'income', '12', '', ''),
(6, 0, 0, 'Food Order', '32109079', '', 4500, '04-02-2022', '', '', 'income', '12', '', ''),
(7, 0, 0, 'Food Order', '85082874', '', 300, '04-02-2022', '', '', 'income', '12', '', ''),
(8, 6, 1, 'Check-In', '', '55054640', 30000, '04-02-2022', '3', '6', 'income', '11', '', ''),
(9, 7, 1, 'Check-In', '', '34140166', 20000, '04-02-2022', '1', '1', 'income', '10', '', ''),
(10, 7, 1, 'Food Order', '', '34140166', 600, '04-02-2022', '', '', 'income', '10', '', ''),
(11, 8, 1, 'Check-In', '', '86475830', 35000, '05-02-2022', '4', '9', 'income', '10', '', ''),
(12, 6, 1, 'Food Order', '', '55054640', 4000, '05-02-2022', '', '', 'income', '10', '', ''),
(13, 6, 0, 'Food Order', '', '55054640', 500, '05-02-2022', '', '', 'income', '10', '', ''),
(14, 8, 0, 'Food Order', '', '86475830', 1200, '05-02-2022', '', '', 'income', '12', '', ''),
(15, 8, 0, 'Food Order', '', '86475830', 500, '05-02-2022', '', '', 'income', '12', '', ''),
(23, 2, 1, 'Check-In', '', '77116930', 25000, '03-02-2022', '2', '5', 'income', '12', '', ''),
(24, 2, 1, 'Check-In', '', '77116930', 25000, '04-02-2022', '2', '5', 'income', '12', '', ''),
(33, 2, 1, 'Food-Order', '80679245', '40685944', 12000, '05-02-2022', '4', '10', 'income', '12', '', ''),
(34, 2, 1, 'Food-Order', '99055833', '40685944', 23000, '05-02-2022', '4', '10', 'income', '12', '', ''),
(57, 2, 1, 'Food Order', '', '77116930', 900, '05-02-2022', '', '', 'income', '12', '', ''),
(58, 2, 1, 'Food Order', '', '77116930', 3300, '05-02-2022', '', '', 'income', '12', '', ''),
(59, 2, 1, 'Food Order', '', '77116930', 3300, '05-02-2022', '', '', 'income', '12', '', ''),
(60, 3, 1, 'Food Order', '', '57262922', 1100, '05-02-2022', '', '', 'income', '12', '', ''),
(61, 0, 0, 'Food Order', '91101173', '', 4300, '05-02-2022', '', '', 'income', '12', '', ''),
(64, 2, 1, 'Check-In', '', '40685944', 35000, '03-02-2022', '4', '10', 'income', '1', '', ''),
(65, 2, 1, 'Check-In', '', '40685944', 35000, '04-02-2022', '4', '10', 'income', '1', '', ''),
(66, 1, 1, 'Check-In', '', '63244798', 25000, '03-02-2022', '2', '4', 'income', '1', '', ''),
(67, 1, 1, 'Check-In', '', '63244798', 25000, '04-02-2022', '2', '4', 'income', '1', '', ''),
(69, 9, 1, 'Food Order', '', '48084495', 1500, '09-02-2022', '', '', 'income', '10', '', ''),
(70, 9, 1, 'Food Order', '', '48084495', 4000, '09-02-2022', '', '', 'income', '10', '', ''),
(71, 9, 1, 'Food Order', '', '48084495', 500, '09-02-2022', '', '', 'income', '10', '', ''),
(72, 9, 1, 'Food Order', '', '48084495', 6000, '09-02-2022', '', '', 'income', '10', '', ''),
(73, 9, 1, 'Food Order', '', '48084495', 500, '09-02-2022', '', '', 'income', '10', '', ''),
(74, 10, 1, 'Check-In', '', '88043517', 35000, '09-02-2022', '4', '10', 'income', '10', '', ''),
(76, 12, 1, 'Check-In', '', '43856618', 40000, '09-02-2022', '5', '11', 'income', '10', '', ''),
(77, 12, 1, 'Check-In', '', '43856618', 35000, '10-02-2022', '4', '9', 'income', '10', '', ''),
(78, 12, 1, 'Food Order', '', '43856618', 4500, '09-02-2022', '', '', 'income', '10', '', ''),
(79, 12, 1, 'Food Order', '', '43856618', 500, '09-02-2022', '', '', 'income', '10', '', ''),
(80, 12, 1, 'Food Order', '', '43856618', 0, '10-02-2022', '', '', 'income', '10', '', ''),
(81, 10, 1, 'Food Order', '', '88043517', 0, '10-02-2022', '', '', 'income', '11', '', ''),
(82, 11, 1, 'Food Order', '', '92639671', 0, '10-02-2022', '', '', 'income', '11', '', ''),
(83, 9, 1, 'Food Order', '', '48084495', 0, '10-02-2022', '', '', 'income', '11', '', ''),
(84, 13, 1, 'Check-In', '', '43376463', 20000, '10-02-2022', '1', '3', 'income', '11', '', ''),
(86, 12, 1, 'Food Order', '', '43856618', 500, '10-02-2022', '', '', 'income', '10', '', ''),
(87, 12, 1, 'Food Order', '', '43856618', 3500, '10-02-2022', '', '', 'income', '10', '', ''),
(88, 12, 1, 'Food Order', '', '43856618', 300, '10-02-2022', '', '', 'income', '10', '', ''),
(89, 14, 1, 'Food Order', '', '81702489', 500, '10-02-2022', '', '', 'income', '10', '', ''),
(90, 14, 1, 'Food Order', '', '81702489', 1000, '10-02-2022', '', '', 'income', '10', '', ''),
(91, 14, 1, 'Food Order', '', '81702489', 700, '10-02-2022', '', '', 'income', '10', '', ''),
(92, 14, 1, 'Food Order', '', '81702489', 500, '10-02-2022', '', '', 'income', '10', '', ''),
(93, 14, 1, 'Check-In', '', '81702489', 40000, '10-02-2022', '5', '11', 'income', '10', '', ''),
(94, 14, 1, 'Check-In', '', '81702489', 40000, '11-02-2022', '5', '11', 'income', '10', '', ''),
(99, 15, 1, 'Check-In', '', '56994335', 30000, '11-02-2022', '3', '7', 'income', '9', '', ''),
(100, 20, 1, 'Check-In', '', '88600207', 30000, '11-02-2022', '3', '6', 'income', '11', '', ''),
(101, 20, 1, 'Check-In', '', '88600207', 30000, '12-02-2022', '3', '6', 'income', '11', '', ''),
(102, 19, 1, 'Check-In', '', '89422083', 35000, '11-02-2022', '4', '9', 'income', '11', '', ''),
(103, 19, 1, 'Check-In', '', '89422083', 35000, '12-02-2022', '4', '9', 'income', '11', '', ''),
(104, 18, 1, 'Check-In', '', '16353124', 45000, '11-02-2022', '6', '12', 'income', '11', '', ''),
(105, 18, 1, 'Check-In', '', '16353124', 45000, '12-02-2022', '6', '12', 'income', '11', '', ''),
(106, 21, 1, 'Check-In', '', '34590694', 40000, '11-02-2022', '5', '11', 'income', '11', '', ''),
(107, 24, 1, 'Check-In', '', '66952807', 50000, '11-02-2022', '7', '13', 'income', '11', '', ''),
(108, 23, 1, 'Check-In', '', '83119636', 30000, '11-02-2022', '3', '8', 'income', '11', '', ''),
(109, 22, 1, 'Check-In', '', '68798012', 35000, '11-02-2022', '4', '10', 'income', '11', '', ''),
(110, 18, 1, 'Food Order', '', '16353124', 4800, '12-02-2022', '', '', 'income', '11', '', ''),
(111, 21, 1, 'Food Order', '', '34590694', 8100, '12-02-2022', '', '', 'income', '11', '', ''),
(112, 17, 1, 'Food Order', '', '82903232', 0, '12-02-2022', '', '', 'income', '12', '', ''),
(113, 16, 1, 'Food Order', '', '78174514', 0, '12-02-2022', '', '', 'income', '12', '', ''),
(114, 22, 1, 'Food Order', '', '68798012', 0, '12-02-2022', '', '', 'income', '12', '', ''),
(115, 20, 1, 'Food Order', '', '88600207', 0, '12-02-2022', '', '', 'income', '12', '', ''),
(116, 18, 1, 'Food Order', '', '16353124', 0, '12-02-2022', '', '', 'income', '12', '', ''),
(117, 24, 1, 'Food Order', '', '66952807', 0, '12-02-2022', '', '', 'income', '12', '', ''),
(118, 23, 1, 'Food Order', '', '83119636', 0, '12-02-2022', '', '', 'income', '12', '', ''),
(119, 9, 1, 'Food Order', '', '48084495', 0, '12-02-2022', '', '', 'income', '12', '', ''),
(154, 11, 1, 'Check-In', '', '92639671', 20000, '09-02-2022', '1', '1', 'income', '12', '', ''),
(155, 11, 1, 'Check-In', '', '92639671', 20000, '10-02-2022', '1', '1', 'income', '12', '', ''),
(156, 11, 1, 'Check-In', '', '92639671', 20000, '11-02-2022', '1', '1', 'income', '12', '', ''),
(163, 9, 1, 'Check-In', '', '48084495', 25000, '07-02-2022', '2', '5', 'income', '12', '', ''),
(164, 9, 1, 'Check-In', '', '48084495', 25000, '08-02-2022', '2', '5', 'income', '12', '', ''),
(165, 9, 1, 'Check-In', '', '48084495', 25000, '09-02-2022', '2', '5', 'income', '12', '', ''),
(166, 9, 1, 'Check-In', '', '48084495', 25000, '10-02-2022', '2', '5', 'income', '12', '', ''),
(167, 9, 1, 'Check-In', '', '48084495', 25000, '11-02-2022', '2', '5', 'income', '12', '', ''),
(168, 21, 1, 'Food Order', '', '34590694', 600, '12-02-2022', '', '', 'income', '12', '', ''),
(169, 18, 1, 'Food Order', '', '16353124', 19000, '12-02-2022', '', '', 'income', '12', '', ''),
(170, 25, 1, 'Check-In', '', '91255309', 20000, '12-02-2022', '1', '1', 'income', '12', '', ''),
(171, 17, 1, 'Check-In', '', '82903232', 20000, '11-02-2022', '1', '2', 'income', '12', '', ''),
(172, 17, 1, 'Check-In', '', '82903232', 20000, '12-02-2022', '1', '2', 'income', '12', '', ''),
(173, 16, 1, 'Check-In', '', '78174514', 20000, '11-02-2022', '1', '3', 'income', '12', '', ''),
(174, 16, 1, 'Check-In', '', '78174514', 20000, '12-02-2022', '1', '3', 'income', '12', '', ''),
(175, 26, 1, 'Check-In', '', '74731024', 25000, '12-02-2022', '2', '5', 'income', '12', '', ''),
(176, 19, 1, 'Check-In', '', '79811269', 30000, '12-02-2022', '3', '7', 'income', '12', '', ''),
(177, 19, 1, 'Food Order', '', '89422083', 6000, '12-02-2022', '', '', 'income', '12', '', ''),
(178, 18, 1, 'Food Order', '', '16353124', 5350, '12-02-2022', '', '', 'income', '12', '', ''),
(179, 27, 1, 'Check-In', '', '87483398', 40000, '12-02-2022', '5', '11', 'income', '12', '', ''),
(180, 28, 1, 'Check-In', '', '73599372', 30000, '12-02-2022', '3', '8', 'income', '12', '', ''),
(181, 17, 0, 'Food Order', '', '82903232', 1000, '12-02-2022', '', '', 'income', '12', '', ''),
(182, 18, 1, 'Food Order', '', '16353124', 2100, '13-02-2022', '', '', 'income', '12', '', ''),
(183, 20, 1, 'Food Order', '', '88600207', 300, '13-02-2022', '', '', 'income', '12', '', ''),
(184, 27, 0, 'Food Order', '', '87483398', 1400, '13-02-2022', '', '', 'income', '11', '', ''),
(185, 25, 1, 'Food Order', '', '91255309', 0, '13-02-2022', '', '', 'income', '11', '', ''),
(186, 28, 1, 'Food Order', '', '73599372', 0, '13-02-2022', '', '', 'income', '11', '', ''),
(187, 29, 1, 'Check-In', '', '81213502', 25000, '14-02-2022', '2', '5', 'income', '10', '', ''),
(188, 30, 1, 'Check-In', '', '94748720', 20000, '14-02-2022', '1', '2', 'income', '10', '', ''),
(189, 9, 1, 'Check-In', '', '19907813', 20000, '14-02-2022', '1', '1', 'income', '12', '', ''),
(190, 9, 1, 'Food Order', '', '19907813', 300, '14-02-2022', '', '', 'income', '10', '', ''),
(192, 31, 1, 'Check-In', '', '98255294', 30000, '15-02-2022', '3', '7', 'income', '12', '', ''),
(193, 9, 1, 'Food Order', '', '58554290', 2400, '15-02-2022', '', '', 'income', '12', '', ''),
(194, 31, 1, 'Food Order', '', '98255294', 13100, '16-02-2022', '', '', 'income', '12', '', ''),
(195, 10, 1, 'Check-In', '', '42655426', 45000, '16-02-2022', '6', '12', 'income', '10', '', ''),
(197, 9, 1, 'Food Order', '', '58554290', 2700, '16-02-2022', '', '', 'income', '12', '', ''),
(200, 9, 1, 'Food Order', '', '58554290', 5100, '17-02-2022', '', '', 'income', '12', '', ''),
(201, 9, 1, 'Check-In', '', '58554290', 20000, '15-02-2022', '1', '1', 'income', '10', '', ''),
(202, 9, 1, 'Check-In', '', '58554290', 20000, '16-02-2022', '1', '1', 'income', '10', '', ''),
(203, 9, 1, 'Check-In', '', '58554290', 20000, '17-02-2022', '1', '1', 'income', '10', '', ''),
(204, 34, 1, 'Check-In', '', '15716641', 40000, '18-02-2022', '5', '11', 'income', '10', '', ''),
(205, 34, 1, 'Check-In', '', '15716641', 40000, '19-02-2022', '5', '11', 'income', '10', '', ''),
(206, 33, 1, 'Check-In', '', '42829686', 20000, '18-02-2022', '1', '2', 'income', '10', '', ''),
(207, 33, 1, 'Check-In', '', '42829686', 20000, '19-02-2022', '1', '2', 'income', '10', '', ''),
(208, 32, 1, 'Check-In', '', '23549115', 35000, '18-02-2022', '4', '10', 'income', '10', '', ''),
(209, 32, 1, 'Check-In', '', '23549115', 35000, '19-02-2022', '4', '10', 'income', '10', '', ''),
(210, 32, 1, 'Check-In', '', '46324264', 35000, '18-02-2022', '4', '9', 'income', '10', '', ''),
(211, 32, 1, 'Check-In', '', '46324264', 35000, '19-02-2022', '4', '9', 'income', '10', '', ''),
(212, 32, 1, 'Food Order', '', '23549115', 800, '18-02-2022', '', '', 'income', '10', '', ''),
(213, 32, 1, 'Food Order', '', '23549115', 300, '18-02-2022', '', '', 'income', '10', '', ''),
(214, 34, 1, 'Food Order', '', '15716641', 300, '18-02-2022', '', '', 'income', '10', '', ''),
(215, 32, 1, 'Food Order', '', '46324264', 300, '18-02-2022', '', '', 'income', '10', '', ''),
(216, 33, 1, 'Food Order', '', '42829686', 300, '18-02-2022', '', '', 'income', '10', '', ''),
(217, 32, 1, 'Food Order', '', '46324264', 300, '18-02-2022', '', '', 'income', '10', '', ''),
(218, 32, 1, 'Food Order', '', '23549115', 600, '18-02-2022', '', '', 'income', '10', '', ''),
(219, 34, 1, 'Food Order', '', '15716641', 300, '18-02-2022', '', '', 'income', '10', '', ''),
(220, 9, 1, 'Check-In', '', '12241858', 20000, '18-02-2022', '1', '1', 'income', '10', '', ''),
(221, 33, 1, 'Food Order', '', '42829686', 3500, '18-02-2022', '', '', 'income', '10', '', ''),
(222, 33, 1, 'Food Order', '', '42829686', 300, '18-02-2022', '', '', 'income', '10', '', ''),
(223, 11, 1, 'Check-In', '', '99505976', 25000, '16-02-2022', '2', '5', 'income', '10', '', ''),
(224, 11, 1, 'Check-In', '', '99505976', 25000, '17-02-2022', '2', '5', 'income', '10', '', ''),
(225, 11, 1, 'Check-In', '', '99505976', 25000, '18-02-2022', '2', '5', 'income', '10', '', ''),
(226, 35, 1, 'Check-In', '', '23197169', 20000, '18-02-2022', '1', '3', 'income', '12', '', ''),
(227, 9, 1, 'Food Order', '', '12241858', 3000, '19-02-2022', '', '', 'income', '12', '', ''),
(228, 34, 1, 'Food Order', '', '15716641', 300, '19-02-2022', '', '', 'income', '12', '', ''),
(229, 34, 1, 'Food Order', '', '15716641', 0, '19-02-2022', '', '', 'income', '10', '', ''),
(230, 32, 1, 'Food Order', '', '23549115', 0, '19-02-2022', '', '', 'income', '10', '', ''),
(231, 32, 1, 'Food Order', '', '46324264', 0, '19-02-2022', '', '', 'income', '10', '', ''),
(232, 33, 1, 'Food Order', '', '42829686', 0, '19-02-2022', '', '', 'income', '10', '', ''),
(233, 9, 1, 'Food Order', '', '12241858', 0, '19-02-2022', '', '', 'income', '10', '', ''),
(234, 35, 1, 'Food Order', '', '23197169', 0, '19-02-2022', '', '', 'income', '10', '', ''),
(235, 28, 1, 'Check-In', '', '21825720', 30000, '19-02-2022', '3', '7', 'income', '10', '', ''),
(236, 28, 1, 'Food Order', '', '21825720', 2500, '19-02-2022', '', '', 'income', '10', '', ''),
(237, 28, 1, 'Food Order', '', '21825720', 400, '19-02-2022', '', '', 'income', '10', '', ''),
(238, 28, 1, 'Food Order', '', '21825720', 300, '19-02-2022', '', '', 'income', '10', '', ''),
(239, 38, 1, 'Check-In', '', '78001179', 30000, '19-02-2022', '3', '8', 'income', '10', '', ''),
(240, 36, 1, 'Check-In', '', '89958684', 45000, '19-02-2022', '6', '12', 'income', '10', '', ''),
(241, 32, 1, 'Food Order', '', '23549115', 900, '19-02-2022', '', '', 'income', '10', '', ''),
(242, 28, 1, 'Food Order', '', '21825720', 9700, '19-02-2022', '', '', 'income', '10', '', ''),
(243, 32, 1, 'Food Order', '', '23549115', 17200, '19-02-2022', '', '', 'income', '12', '', ''),
(244, 28, 1, 'Food Order', '', '21825720', 8700, '20-02-2022', '', '', 'income', '11', '', ''),
(245, 38, 1, 'Food Order', '', '78001179', 600, '20-02-2022', '', '', 'income', '11', '', ''),
(246, 28, 1, 'Food Order', '', '21825720', 500, '20-02-2022', '', '', 'income', '11', '', ''),
(247, 38, 1, 'Food Order', '', '78001179', 0, '20-02-2022', '', '', 'income', '11', '', ''),
(248, 38, 1, 'Food Order', '', '78001179', 0, '20-02-2022', '', '', 'income', '11', '', ''),
(249, 36, 1, 'Check-In', '', '38992867', 25000, '20-02-2022', '2', '5', 'income', '11', '', ''),
(250, 36, 1, 'Food Order', '', '38992867', 0, '21-02-2022', '', '', 'income', '11', '', ''),
(251, 39, 1, 'Check-In', '', '97316718', 25000, '21-02-2022', '2', '5', 'income', '10', '', ''),
(252, 39, 1, 'Check-In', '', '97316718', 25000, '22-02-2022', '2', '5', 'income', '10', '', ''),
(253, 11, 1, 'Check-In', '', '69033589', 25000, '21-02-2022', '2', '4', 'income', '10', '', ''),
(254, 39, 1, 'Food Order', '', '97316718', 4800, '21-02-2022', '', '', 'income', '12', '', ''),
(255, 11, 1, 'Food Order', '', '69033589', 1200, '21-02-2022', '', '', 'income', '12', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `state` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `user_role` int(11) NOT NULL,
  `user_status` int(1) NOT NULL,
  `join_date` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `middle_name`, `last_name`, `gender`, `email`, `password`, `mobile`, `state`, `address`, `user_role`, `user_status`, `join_date`) VALUES
(1, 'Rilwan', 'Adewale', 'Adelaja', 'male', 'RealCrown', 'youngadelaja2013', '08146482898', 'Ogun', '5, Oladipo Avenue, Erinlu, Ijebu-Ode', 1, 1, '13-01-2022'),
(9, 'Faith', '', 'Jacob', '', 'Faith', '123456', '', '', '', 2, 1, '02-02-2022'),
(10, 'Folakemi', '', 'Otegbade', '', 'Folakemi', 'folakemi', '', '', '', 3, 1, '03-02-2022'),
(11, 'Racheal', '', 'Ajayi', '', 'Racheal', 'racheal', '', '', '', 3, 1, '03-02-2022'),
(12, 'Esther', '', 'King', '', 'Esther', 'esther', '', '', '', 3, 1, '03-02-2022');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`amenities_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `close_account`
--
ALTER TABLE `close_account`
  ADD PRIMARY KEY (`close_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `hidden_transaction`
--
ALTER TABLE `hidden_transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `lodge`
--
ALTER TABLE `lodge`
  ADD PRIMARY KEY (`lodge_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `orders_item`
--
ALTER TABLE `orders_item`
  ADD PRIMARY KEY (`orders_item_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`room_type_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `amenities_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `close_account`
--
ALTER TABLE `close_account`
  MODIFY `close_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `hidden_transaction`
--
ALTER TABLE `hidden_transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `lodge`
--
ALTER TABLE `lodge`
  MODIFY `lodge_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `orders_item`
--
ALTER TABLE `orders_item`
  MODIFY `orders_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `room_type`
--
ALTER TABLE `room_type`
  MODIFY `room_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
