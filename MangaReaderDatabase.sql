-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 02, 2017 at 09:44 AM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MangaReaderDatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `MainTable`
--

CREATE TABLE `MainTable` (
  `ID` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `Name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Release` year(4) NOT NULL,
  `Genre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Status` tinyint(4) NOT NULL,
  `NumberOfChapter` int(11) NOT NULL,
  `Summary` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Author` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `CoverImage` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `MainTable`
--

INSERT INTO `MainTable` (`ID`, `Name`, `Release`, `Genre`, `Status`, `NumberOfChapter`, `Summary`, `Author`, `CoverImage`) VALUES
('0001', 'Doraemon', 1997, 'Adventure ; Comedy ; Fantasy ; Sci fi ; Slice of life', 1, 821, 'Doraemon, a cat shaped robot which came from the 22nd century in the future, goes back in time in order to help Nobita, a below average lazy kid, to make his life less miserable and improve his descendent\'s life. With many of Doreamon\'s gadgets from the future, Nobita\'s life will never be as the same. It\'s the start of many interesting adventures after between the group of friends: Nobita Nobi, Doraemon, Shizuka Minamoto, Suneo Honekawa, and Takeshi "Giant" Goda.', 'Fujiko F. Fujio', 'https://c1.staticflickr.com/5/4507/37637945706_967e56c90a_o.jpg'),
('0002', 'High School DxD', 2017, 'Action ; Ecchi ; Harem ; Romance ; School life', 0, 33, 'Hyoudou Issei is an ordinary yet lecherous highschool student who is killed by his girlfriend, Amano Yuuma, during their first date. Yuma is revealed to be a fallen angel named Reinare who was sent on a mission to eliminate divine weapons. Issei is later reincarnated as a devil by his senpai Rias Gremory; who in return will serve under Rias in fighting against the fallen angels.Then Soon he was turned out to be user of the one of the 13 longinus possessor of a red dragon emperor residing in him as Boosted Gear', 'Ishibumi Ichiei ; Mishima Hiroji', 'https://c1.staticflickr.com/5/4457/37706639851_e157b89c4b_o.png');

-- --------------------------------------------------------

--
-- Table structure for table `Manga0001`
--

CREATE TABLE `Manga0001` (
  `ImageLink` varchar(10000) COLLATE utf8_unicode_ci NOT NULL,
  `cName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cID` varchar(4) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Manga0001`
--

INSERT INTO `Manga0001` (`ImageLink`, `cName`, `cID`) VALUES
('http://i4.mangapanda.com/doraemon/1/doraemon-721528.jpg#http://i10.mangapanda.com/doraemon/1/doraemon-721529.jpg#http://i2.mangapanda.com/doraemon/1/doraemon-721530.jpg#http://i10.mangapanda.com/doraemon/1/doraemon-721531.jpg#http://i4.mangapanda.com/doraemon/1/doraemon-721532.jpg#http://i8.mangapanda.com/doraemon/1/doraemon-721533.jpg#http://i6.mangapanda.com/doraemon/1/doraemon-721534.jpg#http://i6.mangapanda.com/doraemon/1/doraemon-721535.jpg#http://i4.mangapanda.com/doraemon/1/doraemon-721536.jpg#http://i2.mangapanda.com/doraemon/1/doraemon-721537.jpg#http://i6.mangapanda.com/doraemon/1/doraemon-721538.jpg#http://i8.mangapanda.com/doraemon/1/doraemon-721539.jpg#http://i8.mangapanda.com/doraemon/1/doraemon-721540.jpg#http://i10.mangapanda.com/doraemon/1/doraemon-721541.jpg#http://i6.mangapanda.com/doraemon/1/doraemon-721542.jpg#http://i4.mangapanda.com/doraemon/1/doraemon-721543.jpg#http://i6.mangapanda.com/doraemon/1/doraemon-721544.jpg#http://i2.mangapanda.com/doraemon/1/doraemon-721545.jpg#http://i8.mangapanda.com/doraemon/1/doraemon-721546.jpg#http://i6.mangapanda.com/doraemon/1/doraemon-721547.jpg', 'All The Way From A Future World', '1');

-- --------------------------------------------------------

--
-- Table structure for table `Manga0002`
--

CREATE TABLE `Manga0002` (
  `ImageLink` varchar(10000) COLLATE utf8_unicode_ci NOT NULL,
  `Date` date NOT NULL,
  `cName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Manga0002`
--

INSERT INTO `Manga0002` (`ImageLink`, `Date`, `cName`, `cID`) VALUES
('http://2.bp.blogspot.com/-GEMUkZPaaDU/Tt4UcpleUNI/AAAAAAAAEoE/ZMUMux4UiA4/s0/000.jpg#http://2.bp.blogspot.com/-f-p151nBk0Q/Tt4Uc2ErOtI/AAAAAAAAEoM/SOghCke4dDM/s0/001.jpg#http://2.bp.blogspot.com/-31_-lTq4PaU/Tt4Udc_rM7I/AAAAAAAAEoU/_HC6lJPuSSk/s0/002.jpg#http://2.bp.blogspot.com/-RS_8NxWo808/Tt4Ud9KC-FI/AAAAAAAAEoc/Bx5tblnM1ag/s0/003.jpg#http://2.bp.blogspot.com/-pyhf_TA2Jss/Tt4UePSXx6I/AAAAAAAAEok/FR6Vehn3Fjw/s0/004.jpg#http://2.bp.blogspot.com/-voXCnXxlUSI/Tt4UeSHKjQI/AAAAAAAAEos/frFvfZ7yHkE/s0/005.png#http://2.bp.blogspot.com/-O_XCuYxuY6o/Tt4UfEqeO2I/AAAAAAAAEo0/MQyaY-m3SSo/s0/006.png#http://2.bp.blogspot.com/-pd7VvfbnxDY/Tt4UftEC6dI/AAAAAAAAEo8/gAhd97Bs-d0/s0/007.jpg#http://2.bp.blogspot.com/-LFPJp6jH8JU/Tt4UgB9SrAI/AAAAAAAAEpE/Q7ztnCwt3jI/s0/008.jpg#http://2.bp.blogspot.com/-8Mwu9CUA8k0/Tt4UgsH9l3I/AAAAAAAAEpM/0NR7oHbtFZ0/s0/009.png#http://2.bp.blogspot.com/-wkBlOOQoVi8/Tt4UhJ0-ZMI/AAAAAAAAEpU/0UzP5sz7Uk0/s0/010.png#http://2.bp.blogspot.com/-4JMM0WYEf3U/Tt4UhlWq38I/AAAAAAAAEpc/p1Qti_4a7x0/s0/011.png#http://2.bp.blogspot.com/-2TQpAf0yTOI/Tt4UiG9OcEI/AAAAAAAAEpk/wnV6zce8bOU/s0/012.png#http://2.bp.blogspot.com/-WwdxLTxcJqg/Tt4UimKh8YI/AAAAAAAAEps/b8aup49Qllc/s0/013.png#http://2.bp.blogspot.com/-RYLISBiudDY/Tt4UjK0ljSI/AAAAAAAAEp0/n4t2xxw8NnM/s0/014.png#http://2.bp.blogspot.com/-ZNdajcINhQc/Tt4Uj9vHdyI/AAAAAAAAEp8/l-Nsigui2fw/s0/015.png#http://2.bp.blogspot.com/-R-ilgnfw2Xs/Tt4UkdpXJUI/AAAAAAAAEqE/OCXVl0fZY4g/s0/016.png#http://2.bp.blogspot.com/-QLVxFqxegyc/Tt4Uk5MkBEI/AAAAAAAAEqM/Zi4MUQil82o/s0/017.png#http://2.bp.blogspot.com/-_UwZDJph1D0/Tt4UlQhNWrI/AAAAAAAAEqU/00LkCiURAnE/s0/018.png#http://2.bp.blogspot.com/-V2E6ib0QgPA/Tt4Ul4lFITI/AAAAAAAAEqc/fin_7t2VsnQ/s0/019.png#http://2.bp.blogspot.com/-S4sKmTx1m5M/Tt4UmdR-3hI/AAAAAAAAEqk/EeHdioRrzRw/s0/020.png#http://2.bp.blogspot.com/-S7AD1p2I5bA/Tt4UnKZLddI/AAAAAAAAEqs/fDjHuhAI70E/s0/021.png#http://2.bp.blogspot.com/-HXzZbfoTO6Y/Tt4Unqb5kRI/AAAAAAAAEq0/wVDYF2C1yXA/s0/022.png#http://2.bp.blogspot.com/-1pBTOaVpask/Tt4UoC7lDII/AAAAAAAAEq8/imjc4_ysQsI/s0/023.png#http://2.bp.blogspot.com/-Xejas-WDMDM/Tt4Uot7VbXI/AAAAAAAAErE/BLNYXQhLpv0/s0/024.png#http://2.bp.blogspot.com/-7uXwy_tVAUQ/Tt4UpJywL5I/AAAAAAAAErQ/bG7n71KGgEA/s0/025.png#http://2.bp.blogspot.com/-Yiud78PvrKY/Tt4UpzZZkhI/AAAAAAAAErc/cGt2DSEPzkA/s0/026.png#http://2.bp.blogspot.com/-JeqKp2CfFYA/Tt4UqXhRMnI/AAAAAAAAEro/tXoAbL31Ep0/s0/027.png#http://2.bp.blogspot.com/-umgpHwRW3R4/Tt4UrE9ZAXI/AAAAAAAAEr4/g00W3o2XvKg/s0/028.png#http://2.bp.blogspot.com/-uADcY9wFJ60/Tt4UsL8YKSI/AAAAAAAAEsU/dbkpYTihswE/s0/029.png#http://2.bp.blogspot.com/-n-1lqjf_FMI/Tt4UtmA0VxI/AAAAAAAAEsc/ZtcOFKyZW24/s0/030.png#http://2.bp.blogspot.com/-77kq-ImnH4s/Tt4UuXeJnYI/AAAAAAAAEso/k-YGcRa_W40/s0/031.png#http://2.bp.blogspot.com/-DoxTvnOe40o/Tt4Uu-JzcHI/AAAAAAAAEsw/xrbZUndU_38/s0/032.png#http://2.bp.blogspot.com/-lifIEV7o1Lc/Tt4UwcURD7I/AAAAAAAAEs8/WHyOSQg3H2o/s0/033.png#http://2.bp.blogspot.com/-SPR4RJEf25I/Tt4Uw2J7gEI/AAAAAAAAEtE/H25e1Yof7XQ/s0/034.png#http://2.bp.blogspot.com/-nEuRy2SbmtY/Tt4UxWCEMwI/AAAAAAAAEtM/YdY2GDc7e-8/s0/035.png#http://2.bp.blogspot.com/-9Mxqcdi5gFg/Tt4UyJ7WuTI/AAAAAAAAEtU/2EGCPZagtNw/s0/036.png#http://2.bp.blogspot.com/-r06MJ3-ZwLM/Tt4UysSdXXI/AAAAAAAAEtc/07i6Gyp66ns/s0/037.png#http://2.bp.blogspot.com/-kUy5Ohnk_uA/Tt4UzCK183I/AAAAAAAAEtk/YJKUhZCZI-E/s0/038.png#http://2.bp.blogspot.com/-w8A6vviQkXU/Tt4UzujNmqI/AAAAAAAAEts/TCOtlqXesXQ/s0/039.png#http://2.bp.blogspot.com/-lDUu9AQXD-4/Tt4U0CJWa5I/AAAAAAAAEt0/CwHlXgXkLh0/s0/040.png#http://2.bp.blogspot.com/-nakk_CI72ZU/Tt4U0kNEPRI/AAAAAAAAEt8/ztLYZFAgGvg/s0/041.png#http://2.bp.blogspot.com/-IC05MCc9NzM/Tt4U1GdseZI/AAAAAAAAEuE/ywy8X0dBaMQ/s0/042.png#http://2.bp.blogspot.com/-wczvdQbTCr4/Tt4U19P1auI/AAAAAAAAEuQ/LA5hJa6ybqE/s0/043.png#http://2.bp.blogspot.com/-rD8pwOpCP00/Tt4U2WsXLWI/AAAAAAAAEuY/WsId31PUg0I/s0/044.jpg#http://2.bp.blogspot.com/-ibwnqsjXq5I/Tt4U2_eT0NI/AAAAAAAAEuk/O3UmEK2sL7M/s0/045.png#http://2.bp.blogspot.com/-1z-J7mVykPk/Tt4U3VryIoI/AAAAAAAAEus/5sk5MXRgynI/s0/046.png#http://2.bp.blogspot.com/-HbqeRoPSX5o/Tt4U3gPqe_I/AAAAAAAAEu0/TmVW2B2Hvek/s0/047.jpg', '2017-10-15', 'Give Up on Being Human', 1),
('http://2.bp.blogspot.com/-W47_MLUkECI/Tt4VDIDakII/AAAAAAAAExg/wXnr7n87gAs/s0/000.png#http://2.bp.blogspot.com/-R5E_VuaBmLM/Tt4VD0ih3YI/AAAAAAAAExo/sy-MBKADR3U/s0/001.jpg#http://2.bp.blogspot.com/-LT_n-1mWefk/Tt4VEJmiX7I/AAAAAAAAEx0/xzLwWR2EtrE/s0/002.png#http://2.bp.blogspot.com/-JCPz55i5rTQ/Tt4VE0OM7zI/AAAAAAAAEyA/t02Usu6bRvM/s0/003.png#http://2.bp.blogspot.com/-k1yG6KIHd5E/Tt4VFuweCUI/AAAAAAAAEyI/FylmBlbIlHg/s0/004.png#http://2.bp.blogspot.com/-imJi4-U0pM4/Tt4VGTruOPI/AAAAAAAAEys/9QmVIb_cU9Q/s0/005.png#http://2.bp.blogspot.com/-lBeL8mqFsUA/Tt4VIsvL74I/AAAAAAAAEy8/oiiXqyEw6RQ/s0/006.png#http://2.bp.blogspot.com/-r-qLD9VW5rQ/Tt4VJfPUsPI/AAAAAAAAEzI/WV2_wz7Ppk0/s0/007.png#http://2.bp.blogspot.com/-wu6q2hHKMkU/Tt4VKYEnMkI/AAAAAAAAEzU/8XNGTzzjzJc/s0/008.png#http://2.bp.blogspot.com/-zypLRt7ZY4A/Tt4VLcW4nMI/AAAAAAAAEzs/ONy_qMKP9dw/s0/009.png#http://2.bp.blogspot.com/-7CQUilry9bU/Tt4VNNn_hNI/AAAAAAAAE0A/4WoEsB2tO2E/s0/010.png#http://2.bp.blogspot.com/-DSFkZ_E_s8k/Tt4VObjqDbI/AAAAAAAAE0M/P2awybOHH0E/s0/011.png#http://2.bp.blogspot.com/-MugI7w-qylg/Tt4VPBD_rmI/AAAAAAAAE0c/x6XUC6Z4f0A/s0/012.png#http://2.bp.blogspot.com/-gQJu63igzro/Tt4VP8dLRoI/AAAAAAAAE0o/e7AIyJb-J58/s0/013.png#http://2.bp.blogspot.com/-CGHRVwPhISI/Tt4VQjon9LI/AAAAAAAAE00/nipxncDABUQ/s0/014.png#http://2.bp.blogspot.com/-L7OI3fGf3VA/Tt4VRZmHwRI/AAAAAAAAE1A/FrOSJOjEUhQ/s0/015.png#http://2.bp.blogspot.com/-vyVf-9EfgvA/Tt4VR5U0uGI/AAAAAAAAE1I/__5qHkexmCY/s0/016.png#http://2.bp.blogspot.com/-uKNiPZQfh2E/Tt4VSbKaNqI/AAAAAAAAE1Q/mk_ezoncVBs/s0/017.png#http://2.bp.blogspot.com/-sPPtmRGUCJw/Tt4VTLVKgwI/AAAAAAAAE1Y/pyo-bTb050k/s0/018.png#http://2.bp.blogspot.com/-koMBv7KDrKs/Tt4VTkOtgqI/AAAAAAAAE1g/nr-9vxP50ls/s0/019.png#http://2.bp.blogspot.com/-bBNQHBYY3jw/Tt4VUDRe26I/AAAAAAAAE1o/KsNp8Vdg9-g/s0/020.png#http://2.bp.blogspot.com/--2rUPbiTnWU/Tt4VU7h5U7I/AAAAAAAAE1w/tXrgY1ZfITA/s0/021.png#http://2.bp.blogspot.com/-EN9Df3hzRvA/Tt4VVUuAduI/AAAAAAAAE14/V92UMP_LARk/s0/022.png#http://2.bp.blogspot.com/-FypIzbH4jAs/Tt4VWjcSKGI/AAAAAAAAE2E/VFQkGnJDxGo/s0/023.png#http://2.bp.blogspot.com/-4xpcwCIK3iI/Tt4VXkXZN6I/AAAAAAAAE2M/qumJMR6GPP8/s0/024.png#http://2.bp.blogspot.com/-yIiSrft4HSk/Tt4VYH2ZGiI/AAAAAAAAE2U/WKmZLKGYhWM/s0/025.png#http://2.bp.blogspot.com/-0Abb-eyzxEc/Tt4VY28Y8LI/AAAAAAAAE2c/UFH-SIQx7vY/s0/026.png#http://2.bp.blogspot.com/-ZkFa8VMVE1g/Tt4VZXVD-5I/AAAAAAAAE2k/6zadGoKLj3Y/s0/027.png#http://2.bp.blogspot.com/-kYz9nqiWgWk/Tt4VZxhIXpI/AAAAAAAAE2s/__z6UzIdCBM/s0/028.png#http://2.bp.blogspot.com/-p9axSbOxI3E/Tt4VaRtoE1I/AAAAAAAAE28/pQjGRYgiq5g/s0/029.png#http://2.bp.blogspot.com/-KMwBueP5LKc/Tt4VbCWlZCI/AAAAAAAAE3E/8glPWRTrADQ/s0/030.png#http://2.bp.blogspot.com/-EuC9a0N9FmI/Tt4Vb4_18NI/AAAAAAAAE3M/4CBRPiM3yUs/s0/031.png#http://2.bp.blogspot.com/-wAwd40BKWfI/Tt4VciNb0uI/AAAAAAAAE3U/gpvXP56oOlg/s0/032.png#http://2.bp.blogspot.com/-6OmQMXrt28s/Tt4Vdf6Gm_I/AAAAAAAAE3c/ji8sKKl9Ld8/s0/033.png#http://2.bp.blogspot.com/--eTTD0d_lfo/Tt4VeGxT8vI/AAAAAAAAE3k/xBh0e3bd0yQ/s0/034.png#http://2.bp.blogspot.com/-XWksSOV2wlk/Tt4VevCMoPI/AAAAAAAAE3s/3INTcHPOnRY/s0/035.png#http://2.bp.blogspot.com/-DFsGelW486w/Tt4VfHYEWJI/AAAAAAAAE30/LPhTzal6L2Q/s0/036.png#http://2.bp.blogspot.com/-sB5XxeLpjEI/Tt4Vfl0IcvI/AAAAAAAAE38/EHMo02haYtg/s0/037.png#http://2.bp.blogspot.com/-WHI-1MkE4IQ/Tt4VgbF2S9I/AAAAAAAAE4E/kGUJYWUg-OQ/s0/038.png#http://2.bp.blogspot.com/-VH5mjZL__UM/Tt4Vg_A214I/AAAAAAAAE4M/P4zjPPIRZTQ/s0/039.png', '2017-10-15', 'Life as a Devil Begins', 2),
('http://2.bp.blogspot.com/-EquddktT2Nc/Udt5l9H_EUI/AAAAAAAAP48/qL38k3qxh_I/s0/001.png#http://2.bp.blogspot.com/-8rU66soB_Ps/Udt5nS_XqfI/AAAAAAAAP5E/wNkx-CzycZ8/s0/002.jpg#http://2.bp.blogspot.com/-soXjbpku7Rc/Udt5p1dVgeI/AAAAAAAAP5M/Wx8IVb-GZaM/s0/003.png#http://2.bp.blogspot.com/-PmiSQLcrk3M/Udt5saWMOgI/AAAAAAAAP5U/jUgI2kZ7nGM/s0/004.png#http://2.bp.blogspot.com/-xm6ds4me9qc/Udt5vc_VNWI/AAAAAAAAP5c/GkJ-vds_tY4/s0/005.png#http://2.bp.blogspot.com/-aHBJB8eBpqE/Udt5x7B3ndI/AAAAAAAAP5k/j5bhPB487V0/s0/006.png#http://2.bp.blogspot.com/-WR4axP8rrYo/Udt50XiZ8GI/AAAAAAAAP5s/YzNiv3kINrY/s0/007.png#http://2.bp.blogspot.com/-RLmI1uub24c/Udt53vAmkxI/AAAAAAAAP50/jCBm_feR4tI/s0/008.png#http://2.bp.blogspot.com/-SInoDfEz7hw/Udt55rFeHxI/AAAAAAAAP58/TCpnbdLIrwg/s0/009.png#http://2.bp.blogspot.com/-_sJ2riAcp2A/Udt57-xc2PI/AAAAAAAAP6E/hudyNUFMvuI/s0/010.png#http://2.bp.blogspot.com/-qHZznkTZ45w/Udt59jHomDI/AAAAAAAAP6M/O4jJ4en_U-U/s0/011.png#http://2.bp.blogspot.com/-Qyv9bnd9jQY/Udt6AIEyzVI/AAAAAAAAP6U/qCaoJqtBIBM/s0/012.png#http://2.bp.blogspot.com/-QUp1ts6DIiw/Udt6B_PSs_I/AAAAAAAAP6c/lp7aHU3WyUg/s0/013.png#http://2.bp.blogspot.com/-NHLPhnvwasY/Udt6FReUiqI/AAAAAAAAP6k/0GieS-QsSEA/s0/014.png#http://2.bp.blogspot.com/-YP_Xm2Zy2FU/Udt6IsSuP2I/AAAAAAAAP6s/a0hCKfQlhDQ/s0/015.png#http://2.bp.blogspot.com/-J-YluA7I0mI/Udt6LhIqHfI/AAAAAAAAP64/HhQfYfY4jEs/s0/016.png#http://2.bp.blogspot.com/-dpen-WCDlkk/Udt6QzYDaLI/AAAAAAAAP7Y/R_dNPdUi-ww/s0/017.png#http://2.bp.blogspot.com/-bmPFydzDrBc/Udt6WueUtHI/AAAAAAAAP7o/KbELH4aFkrM/s0/018.png#http://2.bp.blogspot.com/-SH6un7nRXrA/Udt6Zf7OT5I/AAAAAAAAP74/LALCALCXw38/s0/019.png#http://2.bp.blogspot.com/-TMqNvUk1hvk/Udt6dMqUw4I/AAAAAAAAP8Q/963G1YRP41c/s0/020.png#http://2.bp.blogspot.com/-6GeVQcBLmxw/Udt6hLkHV3I/AAAAAAAAP8g/4VGf9RpZDAY/s0/021.png#http://2.bp.blogspot.com/-XSJg1TuXfVU/Udt6ksIRbkI/AAAAAAAAP84/jTaGPV7rYXM/s0/022.png#http://2.bp.blogspot.com/-3BiON0S_FoU/Udt6pwX9hOI/AAAAAAAAP9I/CjQvO_bBq84/s0/023.png#http://2.bp.blogspot.com/-rbJI_6ZKlKY/Udt6uaxm9ZI/AAAAAAAAP9g/jSc9g-xBpFY/s0/024.png#http://2.bp.blogspot.com/-ZKLKRfD_Xog/Udt6xg0lQ3I/AAAAAAAAP94/lMkrNTW44FU/s0/025.png#http://2.bp.blogspot.com/-QIQReyjQ0OY/Udt62sGlAYI/AAAAAAAAP-I/u1ya-MIZabE/s0/026.png#http://2.bp.blogspot.com/-yXxT6gZsx-8/Udt66vwGEvI/AAAAAAAAP-g/mnW5qrH3wmo/s0/027.png#http://2.bp.blogspot.com/-7Qw0ot8njgU/Udt6_RhK1GI/AAAAAAAAP-w/IJbBtB8pIGc/s0/028.png#http://2.bp.blogspot.com/-0L1M5LcDrAQ/Udt7D8nqMEI/AAAAAAAAP_E/HarDCjIdDo0/s0/029.png#http://2.bp.blogspot.com/-fdzlReojhr0/Udt7IzbXECI/AAAAAAAAP_g/05z_fh_GPSc/s0/030.png#http://2.bp.blogspot.com/-bGMYYaiFiKs/Udt7Nfaqm9I/AAAAAAAAP_4/iX9C976Jv04/s0/031.png#http://2.bp.blogspot.com/-gX0sH1GJqhs/Udt7SFEuLOI/AAAAAAAAQAM/EMEb2_Q16DE/s0/032.png#http://2.bp.blogspot.com/-4ZG5QjLQwBI/Udt7WnnrNRI/AAAAAAAAQAk/iVMoV4sr0QA/s0/033.png#http://2.bp.blogspot.com/-VKZNdfcIyIc/Udt7c2ghiLI/AAAAAAAAQBA/PS_bHdWE6so/s0/034.png#http://2.bp.blogspot.com/-ppx27QQolkg/Udt7iHxbLjI/AAAAAAAAQBY/uzTpe7m6bzE/s0/035.png#http://2.bp.blogspot.com/-K1sOvUBfiTk/Udt7mrl7vCI/AAAAAAAAQBw/m1v0q90XZEA/s0/036.png#http://2.bp.blogspot.com/-pIjfkKUTEOY/Udt7qkjtc8I/AAAAAAAAQCE/1Q-N26PxWks/s0/037.png#http://2.bp.blogspot.com/--jC0hGVCj1g/Udt7sI6YU7I/AAAAAAAAQCQ/tliSvWjlV4g/s0/038.png', '2017-10-15', 'Battle Begins', 3),
('http://2.bp.blogspot.com/-B3PBkG67geY/TwEO8fTX30I/AAAAAAAAEVs/cQEp1nqy-8Y/s0/000.jpg#http://2.bp.blogspot.com/-KIGFoUUNWzw/TwEO-F1sDBI/AAAAAAAAEV8/ZPkp9NXKzyg/s0/001.png#http://2.bp.blogspot.com/-tCGZCwcbPxw/TwEO_4Qzm5I/AAAAAAAAEWI/XBsdQNAJ8Q0/s0/002.png#http://2.bp.blogspot.com/-6adyQOcYGWQ/TwEPBVBgopI/AAAAAAAAEWY/J-Usf8AkwzE/s0/003.png#http://2.bp.blogspot.com/-GrfNZ0-vFYc/TwEPDA5uhFI/AAAAAAAAEWg/gV1SteWz4Fo/s0/004.png#http://2.bp.blogspot.com/-fHSx-hLjIAQ/TwEPEsvnHeI/AAAAAAAAEWw/3b6M8kKeAcM/s0/005.png#http://2.bp.blogspot.com/-NK6KK5bF-B0/TwEPGQ0SbNI/AAAAAAAAEW8/0nHVAKBf8Cw/s0/006.png#http://2.bp.blogspot.com/-OKnrTLNzm2w/TwEPICCCR8I/AAAAAAAAEXI/KOR2_Wmb6ik/s0/007.png#http://2.bp.blogspot.com/-2qwOIn6gz7U/TwEPKLT6LwI/AAAAAAAAEXY/auF_Zq6hGPQ/s0/008.png#http://2.bp.blogspot.com/-Lh61NKe1DCA/TwEPL1MNKtI/AAAAAAAAEXk/CiT7e3BTq_s/s0/009.png#http://2.bp.blogspot.com/-HphDuxIA0mQ/TwEPNu5ugYI/AAAAAAAAEX0/w29yNPvSdGU/s0/010.png#http://2.bp.blogspot.com/-6W-uunvV7C4/TwEPPh_IULI/AAAAAAAAEYE/muk0PlwSZTE/s0/011.png#http://2.bp.blogspot.com/-55cWb2dlA0E/TwEPR02jfQI/AAAAAAAAEYQ/o6p6Nzm3eZI/s0/012.png#http://2.bp.blogspot.com/-0Tfyrms9sgs/TwEPTV9RdNI/AAAAAAAAEYg/tjgHj4k9tfU/s0/013.png#http://2.bp.blogspot.com/-ctzoOGEl43c/TwEPVFvu7tI/AAAAAAAAEYs/0RieDIp-w8A/s0/014.png#http://2.bp.blogspot.com/-PfcznTwHTxU/TwEPWoVh5yI/AAAAAAAAEY4/SCrxQ-Mu0to/s0/015.png#http://2.bp.blogspot.com/-ZUwOfRtdvDg/TwEPYvVomwI/AAAAAAAAEZI/9T_-zYx9BSs/s0/016.png#http://2.bp.blogspot.com/-s717XuyDRPA/TwEPaaddrCI/AAAAAAAAEZY/wYCsejCB2A0/s0/017.png#http://2.bp.blogspot.com/-s3DYndwukC8/TwEPcT1zS_I/AAAAAAAAEZo/jIxueEtGiDY/s0/018.png#http://2.bp.blogspot.com/-IEtMt0VWqDk/TwEPeGEbD_I/AAAAAAAAEZ4/FNmhXBssZS4/s0/019.png#http://2.bp.blogspot.com/--d4etsiJq_g/TwEPflhas9I/AAAAAAAAEaE/M_ped0qhrR4/s0/020.png#http://2.bp.blogspot.com/-6pjkQyfXzuc/TwEPhhdNRWI/AAAAAAAAEaQ/sLsAnMKB6W0/s0/021.png#http://2.bp.blogspot.com/-3ES9sWMv3HM/TwEPjfpPfgI/AAAAAAAAEac/k9bDxiKZpK8/s0/022.png#http://2.bp.blogspot.com/-2KvvaWVsONw/TwEPlKPDkdI/AAAAAAAAEas/ZiDpHbCZfFk/s0/023.png#http://2.bp.blogspot.com/-dHBiRvoxSA0/TwEPmrDIXtI/AAAAAAAAEa4/mZyPwz9cJ5U/s0/024.png#http://2.bp.blogspot.com/-H94ynTsryQM/TwEPoa5-qyI/AAAAAAAAEbI/RNegwKb4kQo/s0/025.png#http://2.bp.blogspot.com/-94aRV_Rx2LY/TwEPp5FI0gI/AAAAAAAAEbU/VtOPvW3JInQ/s0/026.png#http://2.bp.blogspot.com/-pTL02nhp7qE/TwEPrkQeDFI/AAAAAAAAEbk/mCW52p4KuAA/s0/027.png#http://2.bp.blogspot.com/-hTJ0EiDRdAM/TwEPtQAAk9I/AAAAAAAAEbw/P_JGTwuUjh4/s0/028.png#http://2.bp.blogspot.com/-4VbwUejufbI/TwEPvBo9TWI/AAAAAAAAEb8/mkht8dONfnY/s0/029.png#http://2.bp.blogspot.com/-Na6Lyg6hrCo/TwEPxD0fZrI/AAAAAAAAEcM/dYFH01xoE5E/s0/030.png#http://2.bp.blogspot.com/-VopG4i5qc2g/TwEPy50JauI/AAAAAAAAEcY/qNZDyRliQIk/s0/031.png#http://2.bp.blogspot.com/-0u30KyzsOQY/TwEP0ktjYWI/AAAAAAAAEck/YfENYQ54Feg/s0/032.png#http://2.bp.blogspot.com/-eunxzZ2qpZQ/TwEP2Fui8dI/AAAAAAAAEc0/UhRnPZD0csg/s0/033.png#http://2.bp.blogspot.com/-s3a9LsgFcOM/TwEP3lPHg0I/AAAAAAAAEdA/tWX8uuHLD6U/s0/034.png#http://2.bp.blogspot.com/-5RHGJ1ReWgo/TwEP5aiE9zI/AAAAAAAAEdU/5sCeYXknSuU/s0/035.png#http://2.bp.blogspot.com/-ejCjH6kcq_A/TwEP7dMLsQI/AAAAAAAAEdk/IdnsVv2VZWg/s0/036.png#http://2.bp.blogspot.com/-Sz3y0bPsWr8/TwEP9EVZNJI/AAAAAAAAEd0/ilsSQGnT7mA/s0/037.png#http://2.bp.blogspot.com/-bGUnNl61U5Y/TwEP-xWrQXI/AAAAAAAAEeE/PHAvENEpVTs/s0/038.png#http://2.bp.blogspot.com/-Yd8H0qZDm7Y/TwEP_wr1qcI/AAAAAAAAEeM/pyLRnlflK_4/s0/039.png#http://2.bp.blogspot.com/-urbevTJK-Cg/TwEQAwIKgKI/AAAAAAAAEeY/3L_iiMDz-go/s0/040.png', '2017-10-16', 'Something to Protect: Found', 4),
('http://2.bp.blogspot.com/--Gw5MFwyTXc/UreitCmdzVI/AAAAAAAAFIM/K-y47vROmPk/s0/001.jpg#http://2.bp.blogspot.com/-xOU_xQZhy7E/UreiubsN9DI/AAAAAAAAFIU/L3zFyAtoEeY/s0/002.jpg#http://2.bp.blogspot.com/-IiWdC70UhV0/Ureivdudl_I/AAAAAAAAFIc/LVEYc4WfaVg/s0/003.jpg#http://2.bp.blogspot.com/-c2dZDuZkUtU/UreiwxK6jcI/AAAAAAAAFIk/RouxGW2-_mc/s0/004.jpg#http://2.bp.blogspot.com/-r2KzkolgdnQ/UreixxOO64I/AAAAAAAAFIs/ShwkJry6dpQ/s0/005.png#http://2.bp.blogspot.com/-y6Zk_IrR7S0/UreizK3ZBxI/AAAAAAAAFI0/ar3UwsCA-Hg/s0/006.png#http://2.bp.blogspot.com/-7lLNaaY9rDg/Urej_VpRyGI/AAAAAAAAFJM/TD1FwcooiJ8/s0/007.png#http://2.bp.blogspot.com/-OqT9Vo8BxUM/UrekApSru2I/AAAAAAAAFJU/eZ8y3i1Qjrw/s0/008.jpg#http://2.bp.blogspot.com/-YLUXE5UeBjM/UrekBht5g6I/AAAAAAAAFJc/vhxXl2zE9Kg/s0/009.png#http://2.bp.blogspot.com/-dxJwJ3ZL7Hc/UrekDMYMSFI/AAAAAAAAFJk/TJLMpXn-6xo/s0/010.png#http://2.bp.blogspot.com/-cwFmsnaz9nA/UrekEiyhF5I/AAAAAAAAFJs/Yjv-ox2-mgI/s0/011.png#http://2.bp.blogspot.com/-DvOy0xnoJB8/UrekGAg3LNI/AAAAAAAAFJ0/cXVXtzPqalk/s0/012.png#http://2.bp.blogspot.com/-LS74yptM-Ek/UrekHoIq7sI/AAAAAAAAFJ8/YNcR65o9ECY/s0/013.png#http://2.bp.blogspot.com/-gf4Z2yuHmNw/UrekJLRwh8I/AAAAAAAAFKE/eO6e_DYLvC8/s0/014.png#http://2.bp.blogspot.com/-Pf4ATR0srFs/UrekLbI29OI/AAAAAAAAFKM/B8mAPYu-HdI/s0/015.png#http://2.bp.blogspot.com/-Xiy6PeP1Cys/UrekNDjHm-I/AAAAAAAAFKU/vssdrR6Khv4/s0/016.png#http://2.bp.blogspot.com/-EbUekS96sjU/UrekOlAwg-I/AAAAAAAAFKc/QmgYsmy7kY0/s0/017.png#http://2.bp.blogspot.com/-vdxE0KiuJzA/UrekQLCLezI/AAAAAAAAFKk/zU-LaOq-4XY/s0/018.png#http://2.bp.blogspot.com/-ge1MAW4eU-8/UrekSLUqsnI/AAAAAAAAFKs/j-8fQerAFbU/s0/019.png#http://2.bp.blogspot.com/-Suz4uGlxFQM/UrekTZTbvGI/AAAAAAAAFK0/upwS54MjOUs/s0/020.png#http://2.bp.blogspot.com/-O2jyfmuLxA4/UrekU1cfKsI/AAAAAAAAFK8/atXNRQYXMFI/s0/021.png#http://2.bp.blogspot.com/-vmnHQ2jQYmo/UrekWne6OmI/AAAAAAAAFLE/ZAtOeTvCvnQ/s0/022.png#http://2.bp.blogspot.com/-_8zCD9Fk-tM/UrekYZN7E_I/AAAAAAAAFLM/5rsI_LD7F1o/s0/023.png#http://2.bp.blogspot.com/-SDsBIXzARGQ/UrekaayReUI/AAAAAAAAFLU/f-PONuGkfMg/s0/024.png#http://2.bp.blogspot.com/-rT2TtFe8AB8/UrekcOvt8dI/AAAAAAAAFLc/HLGLT5rDKY8/s0/025.png#http://2.bp.blogspot.com/-ZwC6u3LDemM/UrekdBK380I/AAAAAAAAFLk/G43Tqtwm5Wo/s0/026.png#http://2.bp.blogspot.com/-KW7PkC5f3Ww/UrekeTY-BVI/AAAAAAAAFLs/EJHso3aryVM/s0/027.png#http://2.bp.blogspot.com/-wWeHaGdJ0qk/UrekfrgxwrI/AAAAAAAAFL0/AlVJ96gP-BU/s0/028.png#http://2.bp.blogspot.com/-XP1PBQGQv8E/UrekhIr-onI/AAAAAAAAFL8/S7sIfjzVBto/s0/029.png#http://2.bp.blogspot.com/-N4g9D14az4g/UrekjWVsTDI/AAAAAAAAFME/-SLNouVaPJA/s0/030.jpg#http://2.bp.blogspot.com/-ieTvZGoFoVc/UrekkzW6LEI/AAAAAAAAFMM/mbs2u23qcuc/s0/031.jpg#http://2.bp.blogspot.com/-R9Va2OoQCRo/UrekmJ4sTlI/AAAAAAAAFMU/pUkCJ1bnTUA/s0/032.png#http://2.bp.blogspot.com/-9CkCpOj_E80/Ureknfk4sTI/AAAAAAAAFMc/2iNUchsioh8/s0/033.png', '2017-10-16', 'A Friend, Made', 5),
('http://2.bp.blogspot.com/-NuM1RaQKhJM/UrehbU2iPWI/AAAAAAAAFEU/qsP4vQj-fec/s0/001.jpg#http://2.bp.blogspot.com/-goYEVagdIus/Urehdl92T3I/AAAAAAAAFEc/Kq4XspQlzpw/s0/002.png#http://2.bp.blogspot.com/-BBb2M_Rwz8E/UrehgCUZ1PI/AAAAAAAAFEk/tznlJOFB3tM/s0/003.png#http://2.bp.blogspot.com/-2a8JnI_tyMM/Urehh8L3LhI/AAAAAAAAFEs/G-ZkYndlK0s/s0/004.png#http://2.bp.blogspot.com/-Be63tsu0gkw/UrehlJhV_zI/AAAAAAAAFE0/36MpcSzm54M/s0/005.png#http://2.bp.blogspot.com/-vcY0vcTklEM/UrehnALKp0I/AAAAAAAAFE8/KqYU0VaaLj4/s0/006.png#http://2.bp.blogspot.com/-DljYXrtYUDI/Ureho0OXIlI/AAAAAAAAFFE/Lb2nydcWKxk/s0/007.png#http://2.bp.blogspot.com/-1LsdbSggsrk/Urehqtr5Y1I/AAAAAAAAFFM/VIjGmxemP9c/s0/008.png#http://2.bp.blogspot.com/-YJOxw1ax6lk/Urehs9wMf-I/AAAAAAAAFFU/yFWX3Py9BaU/s0/009.png#http://2.bp.blogspot.com/-Nqb9J34q0sE/Urehult0ZLI/AAAAAAAAFFc/ksI4xgm21nE/s0/010.png#http://2.bp.blogspot.com/-2aXRxxynr9Y/UrehwVT-28I/AAAAAAAAFFk/AyqmcxsIIsw/s0/011.png#http://2.bp.blogspot.com/-tXnbhVCyvuA/UrehyrysCWI/AAAAAAAAFFs/QM0dZ1H89Uo/s0/012.png#http://2.bp.blogspot.com/-sIBVd0hrpf0/Ureh0MDYijI/AAAAAAAAFF0/AE8cUdnPtHE/s0/013.png#http://2.bp.blogspot.com/-HQXfqvJZ_lo/Ureh1RxRd7I/AAAAAAAAFF8/zzP6Qi5Y4cU/s0/014.png#http://2.bp.blogspot.com/-V4FoonrpOVw/Ureh3QTkQJI/AAAAAAAAFGE/4Ve7qEZ6Q7E/s0/015.png#http://2.bp.blogspot.com/-tKMacJqmjh8/Ureh5ZqGl0I/AAAAAAAAFGM/Ol5A5DIzAus/s0/016.png#http://2.bp.blogspot.com/-CCPX4HVRh7w/Ureh7hZhGoI/AAAAAAAAFGU/wGyLdbjVT1c/s0/017.png#http://2.bp.blogspot.com/-xv0zOpWSi-Y/Ureh9a2h8_I/AAAAAAAAFGc/e19Lm-PXrks/s0/018.png#http://2.bp.blogspot.com/-7YK04fMkBAI/Ureh-vBY1rI/AAAAAAAAFGk/zahG3HR5plw/s0/019.png#http://2.bp.blogspot.com/-8_oTUuDS75Y/UreiAgJLnMI/AAAAAAAAFGs/ETsyFsumhnI/s0/020.png#http://2.bp.blogspot.com/-3-h1p7Pu_44/UreiCeZ0ozI/AAAAAAAAFG0/mWNk-UFherw/s0/021.png#http://2.bp.blogspot.com/-istDFJh0Ook/UreiEE-5UTI/AAAAAAAAFG8/Nc9uH5anbpw/s0/022.png#http://2.bp.blogspot.com/-XO-qud_ROxo/UreiFcInDBI/AAAAAAAAFHE/QicN-6DVjNA/s0/023.png#http://2.bp.blogspot.com/-bm0QwufIRWY/UreiHMUEhJI/AAAAAAAAFHM/ZkYGjmlcKkA/s0/024.png#http://2.bp.blogspot.com/-sagr6H2Yfdk/UreiJHcI1hI/AAAAAAAAFHU/btMNONP5lAg/s0/025.png#http://2.bp.blogspot.com/-Hb6DqhptdvU/UreiKOUYg7I/AAAAAAAAFHc/PNNoI7aNOg8/s0/026.png#http://2.bp.blogspot.com/-vwVyldg2qIY/UreiK41aWEI/AAAAAAAAFHk/AN_PeY6ov0Q/s0/027.png', '2017-10-16', 'Friend, I Will Protect', 6);

-- --------------------------------------------------------

--
-- Table structure for table `Manga0003`
--

CREATE TABLE `Manga0003` (
  `ImageLink` varchar(10000) COLLATE utf8_unicode_ci NOT NULL,
  `cName` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cID` varchar(4) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `MainTable`
--
ALTER TABLE `MainTable`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Manga0001`
--
ALTER TABLE `Manga0001`
  ADD PRIMARY KEY (`cID`);

--
-- Indexes for table `Manga0002`
--
ALTER TABLE `Manga0002`
  ADD PRIMARY KEY (`cID`);

--
-- Indexes for table `Manga0003`
--
ALTER TABLE `Manga0003`
  ADD PRIMARY KEY (`cID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
