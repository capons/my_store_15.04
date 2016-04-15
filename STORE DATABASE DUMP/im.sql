-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2016 at 02:23 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `im`
--

-- --------------------------------------------------------

--
-- Table structure for table `authorization`
--

CREATE TABLE `authorization` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `tell` int(255) NOT NULL,
  `city` text NOT NULL,
  `address` varchar(255) NOT NULL,
  `delivery_address` varchar(255) NOT NULL,
  `payment_method` text NOT NULL,
  `role` tinyint(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authorization`
--

INSERT INTO `authorization` (`id`, `name`, `pass`, `email`, `tell`, `city`, `address`, `delivery_address`, `payment_method`, `role`) VALUES
(76, 'sdfsdfsdf', 'dssdfdsf', 'adssf@sdfsd.com', 34324234, '', '', '', '', 1),
(77, 'dfsfsdfdsf', 'dsfsdfsdfdsf', 'sdfdsfd@dsfd.com', 342342343, '', '', '', '', 1),
(78, 'sdfsfsdf', 'sdfdsfdsf', '23123123@assd.com', 2147483647, '', '', '', '', 1),
(79, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(82, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(84, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(86, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(87, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(88, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(89, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(90, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(91, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(92, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(93, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(94, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(95, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(96, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(97, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(98, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(99, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(100, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(101, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(102, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(103, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(104, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(105, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(106, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(107, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(108, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(109, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(110, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(111, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(112, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(113, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(114, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(115, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(116, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(117, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(118, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(119, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(120, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(121, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(122, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(123, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(124, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(125, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(126, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(127, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(128, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(129, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(130, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(131, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(132, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(133, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(134, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(135, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(136, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(137, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(138, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(139, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(140, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(141, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(142, 'sdfdsf', 'sfsdfsdf', 'sfdsfsdfdf', 234234324, '', '', '', '', 1),
(143, 'bogdan', 'b0baee9d279d34fa1dfd71aadb908c3f', 'bogdan@rambler.ru', 11111, '', '', '', '', 4),
(144, 'fdsdfsd', 'sdfsdfsdf', 'dsadsad@dfsdf.com', 2147483647, '', '', '', '', 1),
(145, '&lt;?php echo ''ok''; ?&gt;', '4234324', '42324@.com', 2147483647, '', '', '', '', 1),
(146, 'fsdfsdfsdf', 'sdfdsfdsfsdfsdfdsf', 'adfsdf@sdf.com', 324234234, '', '', '', '', 1),
(147, 'dsdfsdf', 'sdfsdf', 'asdsd@sdf.com', 3243243, '', '', '', '', 1),
(158, 'sdsdfdf', NULL, 'bog@ram.ru', 2147483647, 'sddsf', 'sdfdsf', 'sdfsdfdsfsdfsdf', 'pay_cash', NULL),
(159, 'Dvini', NULL, 'bog@ram.ru', 2147483647, 'dsfdsf', 'sdfdsf', 'sdfdsfsdfdsf', 'pay_cash', NULL),
(160, 'Богдан', NULL, 'bog@ram.ru', 2147483647, 'Запорожье', 'sdfdsfsdf', 'Отделение №1: ул. Брянская, 8', 'pay_cash', NULL),
(161, 'Богдан Двинин', NULL, 'bog434324@ram.ru', 2147483647, 'Запорожье', 'sdfdsfsdf', 'Отделение №2: ул. Карпенко-Карого, 58', 'pay_cash', NULL),
(162, 'Богдан', NULL, 'bog@ram.ru', 2147483647, 'Запорожье', 'sdfdsfsdf', 'Отделение №1: ул. Брянская, 8', 'pay_cash', NULL),
(163, 'Богдан', NULL, 'bog@ram.ru', 2147483647, 'Запорожье', 'sdfdsfsdf', 'Отделение №1: ул. Брянская, 8', 'pay_cash', NULL),
(164, 'Богдан', NULL, 'bog@ram.ru', 2147483647, 'Запорожье', 'sdfdsfsdf', 'Отделение №1: ул. Брянская, 8', 'pay_cash', NULL),
(165, 'Богдан', NULL, 'bog@ram.ru', 2147483647, 'sdfsdfdsf', 'sdfdsfsdf', 'Мой адрес', 'pay_cash', NULL),
(166, 'Богдан', NULL, 'bog@ram.ru', 2147483647, 'fdggdfgf', 'sdfdsfsdf', 'sddsfdsf', 'pay_cash', NULL),
(167, 'Богдан', NULL, 'bog@ram.ru', 2147483647, 'Запорожье', 'sdfdsfsdf', 'Отделение №1: ул. Брянская, 8', 'pay_cash', NULL),
(168, 'Богдан', NULL, 'bog@ram.ru', 2147483647, 'Запорожье', 'sdfdsfsdf', 'itself', 'pay_cash', NULL),
(169, 'Богдан', NULL, 'bog@ram.ru', 2147483647, 'Запорожье', 'sdfdsfsdf', 'itself', 'pay_cash', NULL),
(170, 'Богдан', NULL, 'bog@ram.ru', 2147483647, 'Запорожье', 'sdfdsfsdf', 'Отделение №1: ул. Брянская, 8', 'pay_cash', NULL),
(171, 'Богдан', NULL, 'bog@ram.ru', 2147483647, 'Запорожье', 'sdfdsfsdf', 'Отделение №1: ул. Брянская, 8', 'pay_cash', NULL),
(172, 'Богдан', NULL, 'bog@ram.ru', 2147483647, 'Запорожье', 'sdfdsfsdf', 'itself', 'pay_cash', NULL),
(173, '34234324324234324', NULL, 'bog@ram.ru', 2147483647, 'Запорожье', 'sdfdsfsdf', 'Отделение №1: ул. Брянская, 8', 'pay_cash', NULL),
(174, 'Богдан', NULL, 'bog@ram.ru', 2147483647, 'Запорожье', 'sdfdsfsdf', 'Отделение №1: ул. Брянская, 8', 'pay_cash', NULL),
(175, 'Богдан', NULL, 'bog@ram.ru', 2147483647, 'Запорожье', 'sdfdsfsdf', 'Отделение №1: ул. Брянская, 8', 'pay_cash', NULL),
(176, 'Богдан', NULL, 'bog@ram.ru', 2147483647, 'Запорожье', 'sdfdsfsdf', 'Отделение №1: ул. Брянская, 8', 'pay_cash', NULL),
(177, 'Богдан', NULL, 'bog@ram.ru', 2147483647, 'Запорожье', 'sdfdsfsdf', 'Отделение №1: ул. Брянская, 8', 'pay_cash', NULL),
(178, 'Богдан', NULL, 'bog@ram.ru', 2147483647, 'Запорожье', 'sdfdsfsdf', 'Отделение №1: ул. Брянская, 8', 'pay_cash', NULL),
(179, 'Богдан', NULL, 'bog@ram.ru', 2147483647, 'Запорожье', 'sdfdsfsdf', 'Отделение №2: ул. Карпенко-Карого, 58', 'pay_cash', NULL),
(180, 'Богдан', NULL, 'bog@ram.ru', 2147483647, 'Запорожье', 'sdfdsfsdf', 'Отделение №1: ул. Брянская, 8', 'pay_cash', NULL),
(181, 'Богдан', NULL, 'bog@ram.ru', 2147483647, 'Запорожье', 'sdfdsfsdf', 'Отделение №2: ул. Карпенко-Карого, 58', 'pay_cash', NULL),
(182, 'Богдан', NULL, 'bog@ram.ru', 2147483647, 'Запорожье', 'sdfdsfsdf', 'Отделение №2: ул. Карпенко-Карого, 58', 'pay_cash', NULL),
(183, 'Богдан', NULL, 'bog@ram.ru', 2147483647, 'Запорожье', 'sdfdsfsdf', 'Отделение №1: ул. Брянская, 8', 'pay_cash', NULL),
(184, 'Богдан', NULL, 'bog@ram.ru', 2147483647, 'Киев', 'sdfdsfsdf', 'Отделение №24 (до 30 кг на одно место): ул. Белорусская, 21 (м. Лукьяновская)', 'pay_cash', NULL),
(185, 'Богдан', NULL, 'bog@ram.ru', 2147483647, 'sfsdfdsfdsfsdf', 'sdfdsfsdf', 'sdfsdfsdfdsf', 'pay_cash', NULL),
(186, 'Богдан', NULL, 'bog@ram.ru', 2147483647, 'Бердянск', 'sdfdsfsdf', 'Отделение № 5 (до 30 кг), ул. Дюмина, 44', 'pay_cash', NULL),
(187, 'Богдан', NULL, 'bog@ram.ru', 2147483647, 'Мелитополь', 'sdfdsfsdf', 'Отделение №4: ул. Дзержинского, 114/1', 'pay_cash', NULL),
(188, 'Богдан', NULL, 'bog@ram.ru', 2147483647, 'Запорожье', 'sdfdsfsdf', 'Отделение №1: ул. Брянская, 8', 'pay_cash', NULL),
(189, 'Богдан', NULL, 'bog@ram.ru', 2147483647, 'Запорожье', 'sdfdsfsdf', 'Отделение №4 (до 30 кг на одно место): ул. Якова Новицкого, 4', 'pay_cash', NULL),
(190, 'Богдан', NULL, 'bog@ram.ru', 2147483647, 'Запорожье', 'sdfdsfsdf', 'Отделение №2: ул. Карпенко-Карого, 58', 'pay_cash', NULL),
(191, 'Богдан', NULL, 'bog@ram.ru', 2147483647, 'Запорожье', 'sdfdsfsdf', 'Отделение №4 (до 30 кг на одно место): ул. Якова Новицкого, 4', 'pay_cash', NULL),
(192, 'Богдан', NULL, 'bog@ram.ru', 2147483647, 'Запорожье', 'sdfdsfsdf', 'itself', 'pay_cash', NULL),
(193, 'Богдан', NULL, 'bog@ram.ru', 2147483647, 'Запорожье', 'sdfdsfsdf', 'itself', 'pay_cash', NULL),
(194, 'Богдан', NULL, 'bog@ram.ru', 2147483647, 'Запорожье', 'sdfdsfsdf', 'Отделение №2: ул. Карпенко-Карого, 58', 'pay_cash', NULL),
(195, 'Богдан', NULL, 'bog@ram.ru', 2147483647, 'Запорожье', 'sdfdsfsdf', 'itself', 'PayPal', NULL),
(196, 'Богдан', NULL, 'bog@ram.ru', 2147483647, 'Запорожье', 'sdfdsfsdf', 'itself', 'pay_cash', NULL),
(197, 'dfdsfsdfsdf', NULL, 'bog@ram.ru', 2147483647, 'Запорожье', 'sdfdsfsdf', 'itself', 'PayPal', NULL),
(198, 'sddsfdffdsfsdf', NULL, 'bog@ram.ru', 2147483647, 'Запорожье', 'sdfdsfsdf', 'itself', 'PayPal', NULL),
(199, 'аываываыва', NULL, 'bog@ram.ru', 2147483647, 'Запорожье', 'sdfdsfsdf', 'Отделение №7: ул. Космическая, 119', 'PayPal', NULL),
(200, '111111', NULL, 'bog@ram.ru', 2147483647, 'Запорожье', 'sdfdsfsdf', 'itself', 'PayPal', NULL),
(201, '1121212', NULL, 'bog@ram.ru', 2147483647, 'Запорожье', 'sdfdsfsdf', 'Отделение №2: ул. Карпенко-Карого, 58', 'pay_cash', NULL),
(202, 'dffdg df dgdf dfg', NULL, 'bog@ram.ru', 2147483647, 'Запорожье', 'sdfdsfsdf', 'Отделение №4 (до 30 кг на одно место): ул. Якова Новицкого, 4', 'pay_cash', NULL),
(203, 'Богдан435345435345', NULL, 'bog@ram.ru', 2147483647, 'Запорожье', 'sdfdsfsdf', 'Отделение №2: ул. Карпенко-Карого, 58', 'pay_cash', NULL),
(204, 'Богдан234234324', NULL, 'bog@ram.ru', 2147483647, 'Запорожье', 'sdfdsfsdf', 'Отделение №5 (до 30 кг на одно место): просп. Ленина, 91', 'pay_cash', NULL),
(205, 'fffff', NULL, 'bog@ram.ru', 2147483647, 'Запорожье', 'sdfdsfsdf', 'Отделение №7: ул. Космическая, 119', 'pay_cash', NULL),
(206, 'ggggg', NULL, 'bog@ram.ru', 2147483647, 'Запорожье', 'sdfdsfsdf', 'Отделение №8 (до 30 кг на одне місце): просп. Ленина, 43', 'pay_cash', NULL),
(207, 'sdfsdfdsfsdf', NULL, 'bog@ram.ru', 2147483647, 'Запорожье', 'sdfdsfsdf', 'Отделение №7: ул. Космическая, 119', 'pay_cash', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` int(255) DEFAULT '0',
  `description` varchar(255) DEFAULT NULL,
  `code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `description`, `code`) VALUES
(62, 'РАСПРОДАЖА', 0, 'Распродажа', 'rasprodazha'),
(63, 'Коляски детские универсальные', 0, 'Коляски детские', 'kolyaski_detskie_yniversalnie'),
(64, 'Аксессуары для детских колясок', 0, 'Аксессуары  для детских колясок', 'aksesyari_dlya_detskih_kolyasok'),
(65, 'Коляски детские прогулочные,трости', 0, 'Коляски детские прогулочные', 'kolyaski_detskie_prodylochnie_trosti'),
(66, 'Стульчики детские для кормления', 0, 'Стульчики детские для кормления', 'stylchiki_detskie_dlya_kormlenia'),
(67, 'Автокресла детские', 0, 'Автокресла детские', 'avtokresla_detskie'),
(68, 'Манежи детские', 0, 'Манежи детские', 'manegi_detskie'),
(69, 'Велосипеди детские', 0, 'Велосипеди детские', 'velosipedi_detskie'),
(70, 'Кроватки детские', 0, 'Кроватки детские', 'krovatki_detskie'),
(71, 'Матрасы детские', 0, 'Матрасы детские', 'matrasi_detskie'),
(72, 'Постельные комплексы в детскую кроватку', 0, 'Постельные комплексы в детскую кроватку', 'postelnie_kompleksi_v_detskyy_krovatky'),
(73, 'Кенгуру детские,рюкзаки,сумки-переноски,меховые конверты', 0, 'Кенгуру детские,рюкзаки,сумки-переноски,меховые конверты', 'kengyry_detskie_rykzaki_symki'),
(74, 'Мебель детская: парты, мольберты, доски для рисования', 0, 'Мебель детская: парты, мольберты, доски для рисования', 'mebel_detskaya_parti_molberti'),
(75, 'Пеленальные комоды,столики,доски', 0, 'Пеленальные комоды,столики,доски', 'pelenalnie_komodi'),
(76, 'Шезлонги ,качели ,качалки', 0, 'Шезлонги ,качели ,качалки', 'shezlongi_kocheli_kachalki'),
(77, 'Молокоотсосы и аксессуары для грудного вскармивания', 0, 'Молокоотсосы и аксессуары для грудного вскармивания', 'aksesyari_dlya_grydnogo_vskarmlivania'),
(78, 'Подростковые и двухъярусные кровати', 0, 'Подростковые и двухъярусные кровати', 'podrostkovie_i_dvyhyarysnie krovati'),
(79, 'Транспорт детский (толокары, каталки, электромобили)', 0, 'Транспорт детский (толокары, каталки, электромобили)', 'detskiy_transport');

-- --------------------------------------------------------

--
-- Table structure for table `im_news`
--

CREATE TABLE `im_news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `edite_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `im_news`
--

INSERT INTO `im_news` (`id`, `title`, `description`, `keywords`, `date`, `edite_date`) VALUES
(2, 'ddsfdsfdsfs', 'dsfdsfsdfsdfsdf', 'dsfsdfsdfsdfds', '2003-03-16', '2003-03-16'),
(3, 'dsfsdfsdf', 'ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', 'sfsdf,sdfdsfsdf,sdfdsfsdf', '2016-03-03', NULL),
(4, 'dsfsdfsdf', 'ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', 'sfsdf,sdfdsfsdf,sdfdsfsdf', '2016-03-03', NULL),
(5, 'dsfsdfsdf', 'ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', 'sfsdf,sdfdsfsdf,sdfdsfsdf', '2016-03-03', NULL),
(6, 'dsfsdfsdf', 'ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', 'sfsdf,sdfdsfsdf,sdfdsfsdf', '2016-03-03', NULL),
(7, 'dsfsdfsdf', 'ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', 'sfsdf,sdfdsfsdf,sdfdsfsdf', '2016-03-03', NULL),
(8, 'dsfsdfsdf', 'ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', 'sfsdf,sdfdsfsdf,sdfdsfsdf', '2016-03-03', NULL),
(9, 'dsfsdfsdf', 'ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', 'sfsdf,sdfdsfsdf,sdfdsfsdf', '2016-03-03', NULL),
(10, 'dsfsdfsdf', 'ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', 'sfsdf,sdfdsfsdf,sdfdsfsdf', '2016-03-03', NULL),
(11, 'dsfsdfsdf', 'ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', 'sfsdf,sdfdsfsdf,sdfdsfsdf', '2016-03-03', NULL),
(12, 'dsfsdfsdf', 'ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', 'sfsdf,sdfdsfsdf,sdfdsfsdf', '2016-03-03', NULL),
(13, 'dsfsdfsdf', 'ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', 'sfsdf,sdfdsfsdf,sdfdsfsdf', '2016-03-03', NULL),
(14, 'dsfsdfsdf', 'ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', 'sfsdf,sdfdsfsdf,sdfdsfsdf', '2016-03-03', NULL),
(15, 'dsfsdfsdf', 'ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', 'sfsdf,sdfdsfsdf,sdfdsfsdf', '2016-03-03', NULL),
(16, 'dsfsdfsdf', 'ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', 'sfsdf,sdfdsfsdf,sdfdsfsdf', '2016-03-03', NULL),
(17, 'dsfsdfsdf', 'ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', 'sfsdf,sdfdsfsdf,sdfdsfsdf', '2016-03-03', NULL),
(18, 'dsfsdfsdf', 'ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', 'sfsdf,sdfdsfsdf,sdfdsfsdf', '2016-03-03', NULL),
(19, 'dsfsdfsdf', 'ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', 'sfsdf,sdfdsfsdf,sdfdsfsdf', '2016-03-03', NULL),
(20, 'dsfsdfsdf', 'ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', 'sfsdf,sdfdsfsdf,sdfdsfsdf', '2016-03-03', NULL),
(21, 'dsfsdfsdf', 'ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', 'sfsdf,sdfdsfsdf,sdfdsfsdf', '2016-03-03', NULL),
(22, 'dsfsdfsdf', 'ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', 'sfsdf,sdfdsfsdf,sdfdsfsdf', '2016-03-03', NULL),
(23, 'dsfsdfsdf', 'ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', 'sfsdf,sdfdsfsdf,sdfdsfsdf', '2016-03-03', NULL),
(24, 'dsfsdfsdf', 'ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', 'sfsdf,sdfdsfsdf,sdfdsfsdf', '2016-03-03', NULL),
(25, 'dsfsdfsdf', 'ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', 'sfsdf,sdfdsfsdf,sdfdsfsdf', '2016-03-03', NULL),
(27, 'dsfsdfsdf', 'ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', 'sfsdf,sdfdsfsdf,sdfdsfsdf', '2016-03-03', NULL),
(28, 'dsfsdfsdf', 'ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', 'sfsdf,sdfdsfsdf,sdfdsfsdf', '2016-03-03', NULL),
(29, 'etretrt', 'new description', 'ddd', '2003-03-16', NULL),
(31, 'fgdfgfdgfdgdfgdfgfdg', '1', '111111', '2003-03-16', '2016-03-03'),
(33, 'ddddd', 'ddddd', 'ddddd', '2003-03-16', NULL),
(37, 'dgfdfgd', 'fdgfdgdfgd', '11111', '2016-03-03', '2016-03-03'),
(38, '1111111', '111111', '3333333333', '2016-03-03', '2016-03-03'),
(39, 'rrrr', 'rrrr', 'rrrrrr,rrrr,rrrrrr', '2016-03-03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(255) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `order_status` varchar(50) NOT NULL DEFAULT 'Not paid',
  `comment` varchar(255) DEFAULT NULL,
  `user_agent` varchar(255) NOT NULL,
  `id_authorization` int(11) NOT NULL,
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modify` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer`, `order_status`, `comment`, `user_agent`, `id_authorization`, `date_add`, `date_modify`) VALUES
(8, 'sdsdfdf', 'Not paid', 'sdfdf', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 158, '2016-04-12 13:03:56', NULL),
(9, 'Dvini', 'Not paid', 'dfsdfdsf', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 159, '2016-04-12 13:08:12', NULL),
(10, 'Богдан', 'Not paid', 'sdfsfd', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 160, '2016-04-13 09:02:35', NULL),
(11, 'Богдан Двинин', 'Not paid', 'ыаывавыа', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 161, '2016-04-13 09:11:46', NULL),
(12, 'Богдан', 'Not paid', '2344234', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 162, '2016-04-13 10:02:48', NULL),
(13, 'Богдан', 'Not paid', 'fgfdg', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 163, '2016-04-13 10:25:16', NULL),
(14, 'Богдан', 'Not paid', '435435', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 164, '2016-04-13 10:29:59', NULL),
(15, 'Богдан', 'Not paid', 'sdfsdf', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 165, '2016-04-13 10:34:23', NULL),
(16, 'Богдан', 'Not paid', 'fdgfdgdfgg', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 166, '2016-04-13 10:38:34', NULL),
(17, 'Богдан', 'Not paid', 'sdfsdf', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 167, '2016-04-13 10:58:56', NULL),
(18, 'Богдан', 'Not paid', 'sdfdsfdsfdsf', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 168, '2016-04-13 11:11:13', NULL),
(19, 'Богдан', 'Not paid', 'dfgfdgfgfgfg', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 169, '2016-04-13 11:17:00', NULL),
(20, 'Богдан', 'Not paid', '43534534435', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 170, '2016-04-13 11:27:46', NULL),
(21, 'Богдан', 'Not paid', 'wererewwr', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 171, '2016-04-13 11:31:01', NULL),
(22, 'Богдан', 'Not paid', 'sdfsfsdfsdf', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 172, '2016-04-13 11:37:05', NULL),
(23, '34234324324234324', 'Not paid', 'fsdfsddsf', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 173, '2016-04-13 12:48:09', NULL),
(24, 'Богдан', 'Not paid', 'fsdfsdsdf', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 174, '2016-04-13 13:22:41', NULL),
(25, 'Богдан', 'Not paid', 'dsfdfdsf', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 175, '2016-04-13 13:25:45', NULL),
(26, 'Богдан', 'Not paid', 'ffdg', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 176, '2016-04-13 13:35:08', NULL),
(27, 'Богдан', 'Not paid', 'sfsdfdsf', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 177, '2016-04-13 13:37:23', NULL),
(28, 'Богдан', 'Not paid', 'sdfsdfsdf', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 178, '2016-04-13 13:38:25', NULL),
(29, 'Богдан', 'Not paid', 'sddfdf', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 179, '2016-04-13 13:39:57', NULL),
(30, 'Богдан', 'Not paid', 'fdgdfg', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 180, '2016-04-13 13:43:20', NULL),
(31, 'Богдан', 'Not paid', 'sdfsdfdsfd', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 181, '2016-04-13 13:45:18', NULL),
(32, 'Богдан', 'Not paid', 'sdfdsfsd', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 182, '2016-04-13 13:47:45', NULL),
(33, 'Богдан', 'Not paid', '234234', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 183, '2016-04-13 13:49:30', NULL),
(34, 'Богдан', 'Not paid', 'авыавыавыа', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 184, '2016-04-14 07:50:20', NULL),
(35, 'Богдан', 'Not paid', 'cxxvxcv', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 185, '2016-04-14 07:54:38', NULL),
(36, 'Богдан', 'Not paid', 'авыаваыва', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 186, '2016-04-14 07:57:07', NULL),
(37, 'Богдан', 'Not paid', 'кцукуцк', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 187, '2016-04-14 08:28:40', NULL),
(38, 'Богдан', 'Not paid', '23dsfdsfsdf', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 188, '2016-04-14 08:33:22', NULL),
(39, 'Богдан', 'Not paid', 'sdfsdfsdfdf', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 189, '2016-04-14 08:33:54', NULL),
(40, 'Богдан', 'Not paid', '54353454535', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 190, '2016-04-14 08:37:09', NULL),
(41, 'Богдан', 'Not paid', 'sdfdsfsdfsdf', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 191, '2016-04-14 08:38:25', NULL),
(42, 'Богдан', 'Not paid', 'dfsdfsdfsdf', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 192, '2016-04-14 08:39:00', NULL),
(43, 'Богдан', 'Not paid', '', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 193, '2016-04-14 08:44:25', NULL),
(44, 'Богдан', 'Not paid', 'dfdgg', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 194, '2016-04-14 11:12:01', NULL),
(45, 'Богдан', 'Not paid', '', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 195, '2016-04-14 13:06:54', NULL),
(46, 'Богдан', 'Not paid', 'fdfdsdf', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 196, '2016-04-14 13:49:11', NULL),
(49, 'аываываыва', 'payment is confirmed', 'ываываывава', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 199, '2016-04-15 09:14:55', NULL),
(50, '111111', 'payment is confirmed', 'fsdfsdfdsfd', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 200, '2016-04-15 09:28:55', NULL),
(51, '1121212', 'Not paid', 'sdfsdfsdf', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 201, '2016-04-15 10:42:52', NULL),
(52, 'dffdg df dgdf dfg', 'Not paid', 'gdfgdfgdfgfg', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 202, '2016-04-15 11:06:04', NULL),
(53, 'Богдан435345435345', 'Not paid', 'ggdfgdfg', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 203, '2016-04-15 11:08:07', NULL),
(54, 'Богдан234234324', 'Not paid', 'dsfsdfsdf', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 204, '2016-04-15 11:09:10', NULL),
(55, 'fffff', 'Not paid', 'dssdfdsf', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 205, '2016-04-15 12:00:51', NULL),
(56, 'ggggg', 'Not paid', 'dfsfsdfsdf', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 206, '2016-04-15 12:03:31', NULL),
(57, 'sdfsdfdsfsdf', 'Not paid', 'sddsfdf', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 207, '2016-04-15 12:04:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `order_product_id` int(255) NOT NULL,
  `id_orders` int(255) NOT NULL,
  `id_goods` int(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`order_product_id`, `id_orders`, `id_goods`, `quantity`) VALUES
(8, 8, 86, 10),
(9, 9, 102, 4),
(10, 9, 78, 3),
(11, 10, 83, 3),
(12, 11, 95, 1),
(13, 11, 86, 1),
(14, 11, 88, 1),
(15, 11, 108, 1),
(16, 11, 104, 1),
(17, 12, 98, 2),
(18, 13, 87, 2),
(19, 14, 96, 1),
(20, 15, 89, 3),
(21, 16, 83, 4),
(22, 17, 78, 1),
(23, 18, 87, 1),
(24, 19, 98, 1),
(25, 20, 97, 1),
(26, 21, 97, 1),
(27, 22, 76, 1),
(28, 23, 81, 1),
(29, 24, 97, 1),
(30, 25, 89, 1),
(31, 26, 96, 1),
(32, 27, 90, 9),
(33, 28, 98, 1),
(34, 29, 82, 1),
(35, 30, 85, 1),
(36, 31, 77, 1),
(37, 32, 97, 1),
(38, 33, 108, 1),
(39, 34, 100, 5),
(40, 35, 109, 1),
(41, 36, 76, 2),
(42, 37, 98, 1),
(43, 37, 93, 1),
(44, 37, 103, 1),
(45, 37, 91, 1),
(46, 37, 99, 1),
(47, 38, 98, 1),
(48, 38, 93, 1),
(49, 38, 103, 1),
(50, 38, 91, 1),
(51, 38, 99, 1),
(52, 39, 99, 1),
(53, 40, 99, 1),
(54, 41, 108, 5),
(55, 42, 85, 1),
(56, 43, 100, 30),
(57, 44, 79, 3),
(58, 45, 77, 1),
(59, 46, 83, 1),
(60, 49, 107, 1),
(61, 50, 98, 1),
(62, 51, 91, 2),
(63, 52, 85, 1),
(64, 53, 100, 1),
(65, 54, 104, 1),
(66, 55, 97, 1),
(67, 56, 79, 1),
(68, 57, 86, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `id_stock_product` int(255) NOT NULL,
  `image_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `id_stock_product`, `image_name`) VALUES
(83, 76, 'ab326fd51d12a34e4651b9a4355ff7e8.jpg'),
(84, 77, '8af5678e255c73a50594663fdd07840f.jpg'),
(85, 78, '79f40ef280ee4a51a189fd34104d6bec.jpg'),
(86, 79, '98bab60140034fb5fcaa7dfb6355f1a1.jpg'),
(87, 80, '4aeb369bdac4ae974c6b0bb78f17299b.jpg'),
(88, 81, '8a7ac713148cda4bf06887fcbadca612.jpg'),
(89, 82, 'fd2268c35f9e1c8c25242fbce1a0bf99.jpg'),
(90, 83, '37c10400d6982df732cee8bb0fcd1d89.jpg'),
(91, 84, 'e1c35fc393a18cf74c412103b63273ef.jpg'),
(92, 85, '1e6526c209ebb8d57d332aa3e7e74fe5.jpg'),
(93, 86, 'eb9e7c536de5e666a11805f7c1e42268.jpg'),
(94, 87, 'c1da6b45fc0398b1027943710ef6202e.jpg'),
(95, 88, '5a70e4302ee7df661f23f3a694b728ce.jpg'),
(96, 89, '11bdf25960ee5359a9dbeddf1bb2a4b5.jpg'),
(97, 90, '8e64d19f78c56b25c500e4cac6edf254.jpg'),
(98, 91, '7266a66293cdb65c316d981d74e7375c.jpg'),
(99, 92, '72ba8f453333a3b94c99f2a75891c2de.jpg'),
(100, 93, '737878af2ce007029bf2b2b259a1d083.jpg'),
(101, 94, '35041220b304230826a4498ddf01f735.jpg'),
(102, 95, 'cb522b15bf183568e6341e6dc8cb6c2f.jpg'),
(103, 96, 'a883437c1f443b4364bedc497708be6f.jpg'),
(104, 97, '1c6d06cc9bda166ea8b5b593f233c997.jpg'),
(105, 98, 'eea8189f624239abece064534c316058.jpg'),
(106, 99, 'fbae4e66f74f766182aae33ee69bc297.jpg'),
(107, 100, '3bb6ed2a6c9d47cb353daa49c2c37e00.jpg'),
(108, 101, '0303517eacfcce35158095a332350db6.jpg'),
(109, 102, '7a465ec52626edf43465a55fa6d3151b.jpg'),
(110, 103, '6f3f3665fe7417e027da4f31b0181614.jpg'),
(111, 104, 'd132cf7fe240ab79113db2902d91a8e5.jpg'),
(112, 105, 'ea69d171f2740a20659f110b0a6f9d67.jpg'),
(113, 106, 'd3879853bc41b71f2fcbf4c143d4ee6c.jpg'),
(114, 107, '9b2d40379a46f5bb7ee32802d4a246d2.jpg'),
(115, 108, '7005a7bf589cf29572c9ea6ba2c71bd2.jpg'),
(116, 109, '4e58b65e1b42559861a5cf76b2d17620.jpg'),
(117, 110, '9b4d29e37e76bfb3dee8dd2add6736c1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `model` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `category_id` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `price` double NOT NULL,
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modify` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `name`, `model`, `description`, `category_id`, `quantity`, `price`, `date_add`, `date_modify`) VALUES
(74, 'Trek 8500', '3234trr', 'dfgfd fdgfdgd dfgfdgd', 69, 5, 2300.77, '2016-03-24 07:15:52', NULL),
(75, 'sddsfdsf', 'dfsdfsdf', 'sdfsdsdf', 94, 3, 255, '2016-03-24 10:11:29', NULL),
(76, 'Коляска детская Quadro', '23123', 'Коляска для детей', 63, 0, 1200.6, '2016-03-25 11:57:55', NULL),
(77, 'Колеса для коляски', '32432432', 'Электро колеса для колясок', 64, 18, 800.6, '2016-03-25 12:00:15', NULL),
(78, 'Коляска прогулочна', '3424324', 'Коляска детская прогулочная', 65, 5, 5600, '2016-03-25 12:01:27', NULL),
(79, 'Стульчик для кормления', '324324324', 'Стульчик для кормления', 66, 1, 290, '2016-03-25 12:02:47', NULL),
(80, 'Автокресло', '34234324', 'Автокресло для детей', 67, 2, 2500, '2016-03-25 12:04:39', NULL),
(81, 'Манеж жесткий', '324234', 'Манеж для детей', 68, 0, 6700, '2016-03-25 12:06:12', '2016-03-25 13:11:53'),
(82, 'Велосипед Trek', '34234', 'Детский велосипед', 69, 4, 2300, '2016-03-25 12:07:52', NULL),
(83, 'Детская кроватка Quadro', '32324234', 'Детская кроватка - двухспальная', 70, 4, 7800, '2016-03-25 12:09:09', NULL),
(84, 'Детский матрас Dormeo', '324324', 'Детский мягкий матрас', 71, 6, 1300, '2016-03-25 12:10:24', NULL),
(85, 'Спальный комплект', '234324', 'Детский спальный комплект', 72, 0, 5690.66, '2016-03-25 12:11:39', NULL),
(86, 'Детский рюкзак Bird', '3423432', 'Детский рюкзак 5 литров', 73, 68, 590, '2016-03-25 12:13:35', NULL),
(87, 'Мебель детская', '2343243', 'Мебель детская фулл пак', 74, 0, 8900, '2016-03-25 12:15:01', NULL),
(88, 'Пеленальный комод Qudro', '33234', 'Детский пеленальный комод', 75, 5, 3566, '2016-03-25 12:15:58', NULL),
(89, 'Шезлонг детский', '2324234', 'Детский шезлог', 76, 1, 6700, '2016-03-25 12:17:08', NULL),
(90, 'Молокоотсосы', '234234', 'Молокоотсосы для мам', 77, 41, 130, '2016-03-25 12:18:14', NULL),
(91, 'Двухярусная кровать Quadro', '543535', 'Двухярусная кровать - дуб', 78, 1, 12900, '2016-03-25 12:19:28', NULL),
(92, 'Электро мобиль', '343243', 'Электромобиль детский', 79, 4, 12300, '2016-03-25 12:20:40', NULL),
(93, 'Новая коляска', '324234r', 'Коляска 2 колеса', 63, 3, 1200.55, '2016-03-28 06:41:01', NULL),
(94, 'Новая коляска 2', '23423324', '2323423432', 63, 5, 189.8, '2016-03-28 06:42:04', NULL),
(95, 'Коляка 5', '234234', '234234', 63, 1, 648.99, '2016-03-28 06:42:48', NULL),
(96, 'ноавап', '342343', '234234', 63, 2, 32432.99, '2016-03-28 06:43:24', NULL),
(97, 'Коляска 7', '2df', '32424', 63, 0, 43543, '2016-03-28 06:46:06', NULL),
(98, 'sdf324', '3ff', '234', 63, 0, 1299.99, '2016-03-28 06:46:59', NULL),
(99, 'Коляска 9', '234sdf', '34234', 63, 40, 4556, '2016-03-28 06:47:43', NULL),
(100, 'rwerewr', 'werwerew', 'werewr', 63, 8, 234, '2016-03-28 06:48:20', NULL),
(101, 'sdfds', 'dsfsdf', 'sdfsdf', 63, 234, 3244, '2016-03-28 06:48:39', NULL),
(102, 'sdfsdf', 'sfsdf', 'sdfsdf', 63, 0, 23455, '2016-03-28 06:49:03', NULL),
(103, 'sdfdsf', 'sdfdsf', 'sfsdf', 63, 30, 3244, '2016-03-28 06:49:25', NULL),
(104, 'werwer', 'werwer', 'werwer', 63, 232, 2345, '2016-03-28 06:49:52', NULL),
(105, 'sdfdsf', 'sdfdsf', 'sdfsdf', 63, 2, 234, '2016-03-28 06:50:14', NULL),
(106, 'werewr', 'ewrwer', 'wwer', 63, 33, 33445, '2016-03-28 06:53:57', NULL),
(107, 'wer', 'werewr', 'erwer', 63, 232, 2345, '2016-03-28 06:54:14', NULL),
(108, 'werewr', 'weewr', 'wrer', 63, 27, 2345, '2016-03-28 06:54:31', NULL),
(109, 'dsfds', 'sdfdsf', 'sdfsdf', 63, 22, 234.55, '2016-03-28 06:55:39', NULL),
(110, 'rwerewr', 'ewrwer', 'erwer', 63, 33, 234.5, '2016-03-28 06:55:54', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authorization`
--
ALTER TABLE `authorization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `im_news`
--
ALTER TABLE `im_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `id_authorization` (`id_authorization`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`order_product_id`),
  ADD KEY `id_orders` (`id_orders`),
  ADD KEY `id_goods` (`id_goods`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_stock_product` (`id_stock_product`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authorization`
--
ALTER TABLE `authorization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `im_news`
--
ALTER TABLE `im_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `order_product_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
