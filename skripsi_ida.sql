-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2022 at 03:03 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi_ida`
--

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(100) DEFAULT NULL,
  `bobot_nilai` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `bobot_nilai`) VALUES
(1, 'Pekerjaan', 15),
(2, 'Penghasilan', 30),
(3, 'Tanggungan', 15),
(4, 'Kondisi Rumah', 15),
(5, 'Status Rumah', 25);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(30) NOT NULL,
  `id_keluarga` int(30) DEFAULT NULL,
  `id_kriteria` int(30) DEFAULT NULL,
  `id_sub_kriteria` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_keluarga`, `id_kriteria`, `id_sub_kriteria`) VALUES
(11, 5206101203760002, 1, 1),
(12, 5206101203760002, 2, 5),
(13, 5206101203760002, 3, 9),
(14, 5206101203760002, 4, 11),
(15, 5206101203760002, 5, 13),
(16, 5206103005680001, 1, 1),
(17, 5206103005680001, 2, 5),
(18, 5206103005680001, 3, 8),
(19, 5206103005680001, 4, 12),
(20, 5206103005680001, 5, 15),
(21, 5206103112651041, 1, 2),
(22, 5206103112651041, 2, 6),
(23, 5206103112651041, 3, 9),
(24, 5206103112651041, 4, 11),
(25, 5206103112651041, 5, 15),
(26, 5206107112581016, 1, 2),
(27, 5206107112581016, 2, 6),
(28, 5206107112581016, 3, 9),
(29, 5206107112581016, 4, 11),
(30, 5206107112581016, 5, 13),
(31, 5206107112791010, 1, 2),
(32, 5206107112791010, 2, 4),
(33, 5206107112791010, 3, 7),
(34, 5206107112791010, 4, 11),
(35, 5206107112791010, 5, 15),
(36, 5206101305690000, 1, 2),
(37, 5206101305690000, 2, 5),
(38, 5206101305690000, 3, 7),
(39, 5206101305690000, 4, 12),
(40, 5206101305690000, 5, 14),
(41, 5206101506810000, 1, 1),
(42, 5206101506810000, 2, 6),
(43, 5206101506810000, 3, 9),
(44, 5206101506810000, 4, 10),
(45, 5206101506810000, 5, 15),
(46, 5206100307050000, 1, 2),
(47, 5206100307050000, 2, 5),
(48, 5206100307050000, 3, 8),
(49, 5206100307050000, 4, 11),
(50, 5206100307050000, 5, 13),
(51, 5206100707700002, 1, 2),
(52, 5206100707700002, 2, 6),
(53, 5206100707700002, 3, 8),
(54, 5206100707700002, 4, 11),
(55, 5206100707700002, 5, 14),
(56, 5206022106190003, 1, 2),
(57, 5206022106190003, 2, 5),
(58, 5206022106190003, 3, 8),
(59, 5206022106190003, 4, 12),
(60, 5206022106190003, 5, 13),
(61, 5206100101090009, 1, 1),
(62, 5206100101090009, 2, 5),
(63, 5206100101090009, 3, 9),
(64, 5206100101090009, 4, 12),
(65, 5206100101090009, 5, 15),
(66, 5206100101200002, 1, 2),
(67, 5206100101200002, 2, 5),
(68, 5206100101200002, 3, 9),
(69, 5206100101200002, 4, 10),
(70, 5206100101200002, 5, 15),
(71, 5206100107881087, 1, 2),
(72, 5206100107881087, 2, 6),
(73, 5206100107881087, 3, 9),
(74, 5206100107881087, 4, 11),
(75, 5206100107881087, 5, 15),
(76, 5206100703841002, 1, 2),
(77, 5206100703841002, 2, 6),
(78, 5206100703841002, 3, 9),
(79, 5206100703841002, 4, 11),
(80, 5206100703841002, 5, 14),
(81, 5206101007881002, 1, 2),
(82, 5206101007881002, 2, 6),
(83, 5206101007881002, 3, 8),
(84, 5206101007881002, 4, 11),
(85, 5206101007881002, 5, 14),
(86, 5206101012150001, 1, 1),
(87, 5206101012150001, 2, 5),
(88, 5206101012150001, 3, 8),
(89, 5206101012150001, 4, 12),
(90, 5206101012150001, 5, 15),
(91, 5206101212450001, 1, 1),
(92, 5206101212450001, 2, 4),
(93, 5206101212450001, 3, 8),
(94, 5206101212450001, 4, 10),
(95, 5206101212450001, 5, 15),
(96, 5206101501150002, 1, 2),
(97, 5206101501150002, 2, 4),
(98, 5206101501150002, 3, 8),
(99, 5206101501150002, 4, 10),
(100, 5206101501150002, 5, 15),
(101, 5206102205140002, 1, 2),
(102, 5206102205140002, 2, 4),
(103, 5206102205140002, 3, 8),
(104, 5206102205140002, 4, 11),
(105, 5206102205140002, 5, 14),
(106, 2171060208631001, 1, 2),
(107, 2171060208631001, 2, 5),
(108, 2171060208631001, 3, 9),
(109, 2171060208631001, 4, 11),
(110, 2171060208631001, 5, 14),
(111, 5205070106950000, 1, 2),
(112, 5205070106950000, 2, 5),
(113, 5205070106950000, 3, 9),
(114, 5205070106950000, 4, 12),
(115, 5205070106950000, 5, 13),
(116, 5206030506981003, 1, 1),
(117, 5206030506981003, 2, 6),
(118, 5206030506981003, 3, 7),
(119, 5206030506981003, 4, 10),
(120, 5206030506981003, 5, 15),
(121, 5206115603760002, 1, 2),
(122, 5206115603760002, 2, 6),
(123, 5206115603760002, 3, 7),
(124, 5206115603760002, 4, 12),
(125, 5206115603760002, 5, 15),
(126, 5206102895680001, 1, 1),
(127, 5206102895680001, 2, 5),
(128, 5206102895680001, 3, 9),
(129, 5206102895680001, 4, 12),
(130, 5206102895680001, 5, 14),
(131, 5206103119651041, 1, 2),
(132, 5206103119651041, 2, 4),
(133, 5206103119651041, 3, 8),
(134, 5206103119651041, 4, 10),
(135, 5206103119651041, 5, 14),
(136, 5206125612581016, 1, 2),
(137, 5206125612581016, 2, 4),
(138, 5206125612581016, 3, 8),
(139, 5206125612581016, 4, 11),
(140, 5206125612581016, 5, 14),
(141, 5206107564391010, 1, 2),
(142, 5206107564391010, 2, 5),
(143, 5206107564391010, 3, 9),
(144, 5206107564391010, 4, 12),
(145, 5206107564391010, 5, 14),
(146, 5206198305690000, 1, 2),
(147, 5206198305690000, 2, 5),
(148, 5206198305690000, 3, 9),
(149, 5206198305690000, 4, 10),
(150, 5206198305690000, 5, 13),
(151, 5206101573410000, 1, 2),
(152, 5206101573410000, 2, 6),
(153, 5206101573410000, 3, 9),
(154, 5206101573410000, 4, 12),
(155, 5206101573410000, 5, 13),
(156, 5206100307046700, 1, 1),
(157, 5206100307046700, 2, 6),
(158, 5206100307046700, 3, 7),
(159, 5206100307046700, 4, 12),
(160, 5206100307046700, 5, 14),
(161, 5206100707733502, 1, 1),
(162, 5206100707733502, 2, 6),
(163, 5206100707733502, 3, 8),
(164, 5206100707733502, 4, 12),
(165, 5206100707733502, 5, 13),
(166, 5206022106186503, 1, 1),
(167, 5206022106186503, 2, 4),
(168, 5206022106186503, 3, 7),
(169, 5206022106186503, 4, 11),
(170, 5206022106186503, 5, 15),
(171, 5206100106380009, 1, 1),
(172, 5206100106380009, 2, 4),
(173, 5206100106380009, 3, 9),
(174, 5206100106380009, 4, 12),
(175, 5206100106380009, 5, 13),
(176, 5206100105360002, 1, 2),
(177, 5206100105360002, 2, 4),
(178, 5206100105360002, 3, 9),
(179, 5206100105360002, 4, 11),
(180, 5206100105360002, 5, 13),
(181, 5206100890881087, 1, 2),
(182, 5206100890881087, 2, 4),
(183, 5206100890881087, 3, 9),
(184, 5206100890881087, 4, 10),
(185, 5206100890881087, 5, 14),
(186, 5206100703000002, 1, 2),
(187, 5206100703000002, 2, 4),
(188, 5206100703000002, 3, 7),
(189, 5206100703000002, 4, 10),
(190, 5206100703000002, 5, 13),
(191, 5206101267881002, 1, 2),
(192, 5206101267881002, 2, 5),
(193, 5206101267881002, 3, 7),
(194, 5206101267881002, 4, 11),
(195, 5206101267881002, 5, 13),
(196, 5206108932150001, 1, 2),
(197, 5206108932150001, 2, 5),
(198, 5206108932150001, 3, 8),
(199, 5206108932150001, 4, 10),
(200, 5206108932150001, 5, 15),
(201, 5206109812450001, 1, 1),
(202, 5206109812450001, 2, 4),
(203, 5206109812450001, 3, 8),
(204, 5206109812450001, 4, 12),
(205, 5206109812450001, 5, 15),
(206, 5206102451150002, 1, 1),
(207, 5206102451150002, 2, 4),
(208, 5206102451150002, 3, 7),
(209, 5206102451150002, 4, 10),
(210, 5206102451150002, 5, 13),
(211, 5206102203560002, 1, 1),
(212, 5206102203560002, 2, 5),
(213, 5206102203560002, 3, 7),
(214, 5206102203560002, 4, 12),
(215, 5206102203560002, 5, 15),
(216, 2171060200031001, 1, 1),
(217, 2171060200031001, 2, 5),
(218, 2171060200031001, 3, 9),
(219, 2171060200031001, 4, 10),
(220, 2171060200031001, 5, 13),
(221, 5205070101150000, 1, 2),
(222, 5205070101150000, 2, 6),
(223, 5205070101150000, 3, 7),
(224, 5205070101150000, 4, 11),
(225, 5205070101150000, 5, 12),
(226, 5206030506541003, 1, 2),
(227, 5206030506541003, 2, 6),
(228, 5206030506541003, 3, 7),
(229, 5206030506541003, 4, 10),
(230, 5206030506541003, 5, 14),
(231, 5205051813250001, 1, 2),
(232, 5205051813250001, 2, 6),
(233, 5205051813250001, 3, 8),
(234, 5205051813250001, 4, 10),
(235, 5205051813250001, 5, 13),
(236, 5206100104160761, 1, 2),
(237, 5206100104160761, 2, 4),
(238, 5206100104160761, 3, 7),
(239, 5206100104160761, 4, 10),
(240, 5206100104160761, 5, 14),
(241, 5206103112622441, 1, 2),
(242, 5206103112622441, 2, 4),
(243, 5206103112622441, 3, 7),
(244, 5206103112622441, 4, 12),
(245, 5206103112622441, 5, 13),
(246, 5206100104190620, 1, 2),
(247, 5206100104190620, 2, 4),
(248, 5206100104190620, 3, 8),
(249, 5206100104190620, 4, 12),
(250, 5206100104190620, 5, 14),
(251, 5206107112726900, 1, 1),
(252, 5206107112726900, 2, 6),
(253, 5206107112726900, 3, 9),
(254, 5206107112726900, 4, 11),
(255, 5206107112726900, 5, 14),
(256, 5206101305690109, 1, 1),
(257, 5206101305690109, 2, 6),
(258, 5206101305690109, 3, 7),
(259, 5206101305690109, 4, 11),
(260, 5206101305690109, 5, 13),
(261, 5206101506816780, 1, 2),
(262, 5206101506816780, 2, 5),
(263, 5206101506816780, 3, 7),
(264, 5206101506816780, 4, 10),
(265, 5206101506816780, 5, 15),
(266, 5206100307045600, 1, 2),
(267, 5206100307045600, 2, 5),
(268, 5206100307045600, 3, 7),
(269, 5206100307045600, 4, 12),
(270, 5206100307045600, 5, 13),
(271, 5206256707700002, 1, 2),
(272, 5206256707700002, 2, 6),
(273, 5206256707700002, 3, 8),
(274, 5206256707700002, 4, 10),
(275, 5206256707700002, 5, 14),
(276, 5206782306190003, 1, 2),
(277, 5206782306190003, 2, 6),
(278, 5206782306190003, 3, 7),
(279, 5206782306190003, 4, 10),
(280, 5206782306190003, 5, 13),
(281, 5206853101090009, 1, 2),
(282, 5206853101090009, 2, 4),
(283, 5206853101090009, 3, 8),
(284, 5206853101090009, 4, 12),
(285, 5206853101090009, 5, 13),
(286, 5206103451200002, 1, 1),
(287, 5206103451200002, 2, 4),
(288, 5206103451200002, 3, 9),
(289, 5206103451200002, 4, 10),
(290, 5206103451200002, 5, 14),
(291, 5206100367881087, 1, 2),
(292, 5206100367881087, 2, 5),
(293, 5206100367881087, 3, 7),
(294, 5206100367881087, 4, 11),
(295, 5206100367881087, 5, 13),
(296, 5206100373841002, 1, 2),
(297, 5206100373841002, 2, 6),
(298, 5206100373841002, 3, 9),
(299, 5206100373841002, 4, 10),
(300, 5206100373841002, 5, 13),
(301, 5206101098781002, 1, 2),
(302, 5206101098781002, 2, 4),
(303, 5206101098781002, 3, 7),
(304, 5206101098781002, 4, 10),
(305, 5206101098781002, 5, 14),
(306, 5206101012150019, 1, 2),
(307, 5206101012150019, 2, 5),
(308, 5206101012150019, 3, 9),
(309, 5206101012150019, 4, 11),
(310, 5206101012150019, 5, 13),
(311, 5206101212450190, 1, 3),
(312, 5206101212450190, 2, 4),
(313, 5206101212450190, 3, 7),
(314, 5206101212450190, 4, 10),
(315, 5206101212450190, 5, 13),
(316, 5206101501150120, 1, 3),
(317, 5206101501150120, 2, 5),
(318, 5206101501150120, 3, 8),
(319, 5206101501150120, 4, 11),
(320, 5206101501150120, 5, 14),
(321, 5206102205140563, 1, 3),
(322, 5206102205140563, 2, 6),
(323, 5206102205140563, 3, 9),
(324, 5206102205140563, 4, 12),
(325, 5206102205140563, 5, 15),
(326, 2171060275631001, 1, 1),
(327, 2171060275631001, 2, 4),
(328, 2171060275631001, 3, 7),
(329, 2171060275631001, 4, 10),
(330, 2171060275631001, 5, 13),
(331, 5205079366950000, 1, 2),
(332, 5205079366950000, 2, 5),
(333, 5205079366950000, 3, 8),
(334, 5205079366950000, 4, 11),
(335, 5205079366950000, 5, 14),
(336, 5206031126981003, 1, 2),
(337, 5206031126981003, 2, 4),
(338, 5206031126981003, 3, 9),
(339, 5206031126981003, 4, 11),
(340, 5206031126981003, 5, 15),
(341, 5206101502789002, 1, 3),
(342, 5206101502789002, 2, 4),
(343, 5206101502789002, 3, 8),
(344, 5206101502789002, 4, 11),
(345, 5206101502789002, 5, 14),
(346, 5206102205140273, 1, 1),
(347, 5206102205140273, 2, 5),
(348, 5206102205140273, 3, 7),
(349, 5206102205140273, 4, 10),
(350, 5206102205140273, 5, 13),
(351, 2171060208668001, 1, 2),
(352, 2171060208668001, 2, 6),
(353, 2171060208668001, 3, 7),
(354, 2171060208668001, 4, 12),
(355, 2171060208668001, 5, 14),
(356, 5205070106950109, 1, 2),
(357, 5205070106950109, 2, 4),
(358, 5205070106950109, 3, 8),
(359, 5205070106950109, 4, 12),
(360, 5205070106950109, 5, 15),
(361, 5206030506981248, 1, 1),
(362, 5206030506981248, 2, 6),
(363, 5206030506981248, 3, 9),
(364, 5206030506981248, 4, 11),
(365, 5206030506981248, 5, 14),
(366, 5206136903760002, 1, 3),
(367, 5206136903760002, 2, 5),
(368, 5206136903760002, 3, 9),
(369, 5206136903760002, 4, 12),
(370, 5206136903760002, 5, 13),
(371, 5206103052080001, 1, 3),
(372, 5206103052080001, 2, 6),
(373, 5206103052080001, 3, 8),
(374, 5206103052080001, 4, 11),
(375, 5206103052080001, 5, 14),
(376, 5206103233651041, 1, 1),
(377, 5206103233651041, 2, 4),
(378, 5206103233651041, 3, 7),
(379, 5206103233651041, 4, 10),
(380, 5206103233651041, 5, 15),
(381, 5206107112584806, 1, 1),
(382, 5206107112584806, 2, 4),
(383, 5206107112584806, 3, 8),
(384, 5206107112584806, 4, 12),
(385, 5206107112584806, 5, 13),
(386, 5206107112792290, 1, 3),
(387, 5206107112792290, 2, 6),
(388, 5206107112792290, 3, 7),
(389, 5206107112792290, 4, 10),
(390, 5206107112792290, 5, 14),
(391, 5206101305690456, 1, 2),
(392, 5206101305690456, 2, 5),
(393, 5206101305690456, 3, 9),
(394, 5206101305690456, 4, 12),
(395, 5206101305690456, 5, 15),
(396, 5206101506810028, 1, 1),
(397, 5206101506810028, 2, 4),
(398, 5206101506810028, 3, 8),
(399, 5206101506810028, 4, 11),
(400, 5206101506810028, 5, 14),
(401, 5206100307050085, 1, 1),
(402, 5206100307050085, 2, 5),
(403, 5206100307050085, 3, 7),
(404, 5206100307050085, 4, 10),
(405, 5206100307050085, 5, 13),
(406, 5206100708250002, 1, 3),
(407, 5206100708250002, 2, 4),
(408, 5206100708250002, 3, 8),
(409, 5206100708250002, 4, 10),
(410, 5206100708250002, 5, 15),
(411, 5206022106198903, 1, 1),
(412, 5206022106198903, 2, 5),
(413, 5206022106198903, 3, 9),
(414, 5206022106198903, 4, 12),
(415, 5206022106198903, 5, 13),
(416, 5206100101092879, 1, 2),
(417, 5206100101092879, 2, 4),
(418, 5206100101092879, 3, 7),
(419, 5206100101092879, 4, 11),
(420, 5206100101092879, 5, 14),
(421, 5206100107250002, 1, 1),
(422, 5206100107250002, 2, 4),
(423, 5206100107250002, 3, 9),
(424, 5206100107250002, 4, 12),
(425, 5206100107250002, 5, 15),
(426, 5206100107635087, 1, 2),
(427, 5206100107635087, 2, 5),
(428, 5206100107635087, 3, 8),
(429, 5206100107635087, 4, 10),
(430, 5206100107635087, 5, 14),
(431, 5206100703841082, 1, 3),
(432, 5206100703841082, 2, 6),
(433, 5206100703841082, 3, 7),
(434, 5206100703841082, 4, 11),
(435, 5206100703841082, 5, 13),
(436, 5206101007881172, 1, 3),
(437, 5206101007881172, 2, 6),
(438, 5206101007881172, 3, 7),
(439, 5206101007881172, 4, 10),
(440, 5206101007881172, 5, 14),
(441, 5206101012150093, 1, 2),
(442, 5206101012150093, 2, 5),
(443, 5206101012150093, 3, 9),
(444, 5206101012150093, 4, 12),
(445, 5206101012150093, 5, 14),
(446, 5206101218650001, 1, 1),
(447, 5206101218650001, 2, 4),
(448, 5206101218650001, 3, 8),
(449, 5206101218650001, 4, 11),
(450, 5206101218650001, 5, 15),
(451, 5206101501150276, 1, 2),
(452, 5206101501150276, 2, 6),
(453, 5206101501150276, 3, 8),
(454, 5206101501150276, 4, 10),
(455, 5206101501150276, 5, 14),
(456, 5206102205937002, 1, 1),
(457, 5206102205937002, 2, 4),
(458, 5206102205937002, 3, 7),
(459, 5206102205937002, 4, 12),
(460, 5206102205937002, 5, 13),
(461, 2171060236713100, 1, 3),
(462, 2171060236713100, 2, 5),
(463, 2171060236713100, 3, 9),
(464, 2171060236713100, 4, 11),
(465, 2171060236713100, 5, 15),
(466, 5205070106917200, 1, 1),
(467, 5205070106917200, 2, 5),
(468, 5205070106917200, 3, 9),
(469, 5205070106917200, 4, 10),
(470, 5205070106917200, 5, 14),
(471, 5206030502511003, 1, 2),
(472, 5206030502511003, 2, 4),
(473, 5206030502511003, 3, 8),
(474, 5206030502511003, 4, 11),
(475, 5206030502511003, 5, 13),
(476, 5205051926850001, 1, 3),
(477, 5205051926850001, 2, 6),
(478, 5205051926850001, 3, 7),
(479, 5205051926850001, 4, 12),
(480, 5205051926850001, 5, 15),
(481, 5206100104160098, 1, 3),
(482, 5206100104160098, 2, 4),
(483, 5206100104160098, 3, 7),
(484, 5206100104160098, 4, 11),
(485, 5206100104160098, 5, 14),
(486, 5206103112651125, 1, 2),
(487, 5206103112651125, 2, 5),
(488, 5206103112651125, 3, 9),
(489, 5206103112651125, 4, 10),
(490, 5206103112651125, 5, 13),
(491, 5206100104837001, 1, 1),
(492, 5206100104837001, 2, 4),
(493, 5206100104837001, 3, 8),
(494, 5206100104837001, 4, 2),
(495, 5206100104837001, 5, 13),
(496, 5206107198391010, 1, 3),
(497, 5206107198391010, 2, 6),
(498, 5206107198391010, 3, 9),
(499, 5206107198391010, 4, 11),
(500, 5206107198391010, 5, 15),
(501, 5206101305690009, 1, 2),
(502, 5206101305690009, 2, 5),
(503, 5206101305690009, 3, 7),
(504, 5206101305690009, 4, 10),
(505, 5206101305690009, 5, 14),
(506, 5206101506811720, 1, 1),
(507, 5206101506811720, 2, 4),
(508, 5206101506811720, 3, 8),
(509, 5206101506811720, 4, 12),
(510, 5206101506811720, 5, 13); 

-- --------------------------------------------------------

--
-- Table structure for table `keluarga`
--

CREATE TABLE `keluarga` (
  `id_keluarga` int(40) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tgl_lahir`  date DEFAULT NULL,
  `jekel` enum('P','L') DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `nilai_saw` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Dumping data for table `keluarga`
--


INSERT INTO `keluarga` (`id_keluarga`,`nama`,`tempat_lahir`,`tgl_lahir`,`jekel`,`alamat`,`agama`,`nilai_saw`) VALUES
(5206101203760002,'Abidin','Tolowata','1951-03-21','L','Dusun Tereluba, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.868),
(5206103005680001,'Husain','Tolowata','1968-07-24','L','Dusun Tengge II, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.923),
(5206103112651041,'Ardin','Tolowata','1956-02-14','L','Dusun Tengge II, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.956),
(5206107112581016,'Bandi','Tolowata','1945-01-19','L','Dusun Tengge, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.900),
(5206107112791010,'Arma','Tolowata','1932-03-23','L','Dusun Tolowata, Kel/Desa Tolowata, Kecematan ambalawi','Protestan',0.895),
(5206101305690000,'Suparto','Tolowata','1955-10-12','L','Dusun Tolowata, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.932),
(5206101506810000,'Junaidin','Tolowata','1951-01-25','L','Dusun Tengge I, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.911),
(5206100307050000,'Fajrin','Tolowata','1943-07-29','L','Dusun  Benteng, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.846),
(5206100707700002,'Ariflin','Tolowata','1969-12-23','L','Dusun Mada ntonggu, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.894),
(5206022106190003,'Ferdiansah','Tolowata','1957-05-29','L','Dusun Tere Luba, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.879),
(5206100101090009,'Rizki Juliansah','Tolowata','1969-01-21','L','Dusun  Benteng, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.957),
(5206100101200002,'Muhammad Rayhan','Tolowata','1941-11-01','L','Dusun Tere Luba, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.901),
(5206100107881087,'Zulkifli','Tolowata','1970-09-09','L','Dusun Dana Bura, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.956),
(5206100703841002,'Aiwan','Tolowata','1972-03-31','L','Dusun  Benteng, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.928),
(5206101007881002,'Farid Hardiansyah','Tolowata','1950-07-13','L','Dusun Dana Bura, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.894),
(5206101012150001,'Izzul Islam','Tolowata','1967-01-11','L','Dusun Tengge I, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.923),
(5206101212450001,'Ismail','Tolowata','1959-03-05','L','Dusun Tengge I, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.825),
(5206101501150002,'M. Alhatim','Tolowata','1952-09-21','L','Dusun Tengge I, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.836),
(5206102205140002,'Dimas Putra','Tolowata','1957-12-12','L','Dusun Tengge II, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.842),
(2171060208631001,'Junaidin M.Hasan','Tolowata','1969-04-04','L','Dusun Doridungga, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.907),
(5205070106950000,'Muhammad Fajrin Asrullah','Tolowata','1969-01-13','L','Dusun Doridungga, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.912),
(5206030506981003,'Ahmad','Tolowata','1964-12-25','L','Dusun Tere Luba, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.903),
(5206115603760002,'Irfan','Tolowata','1951-07-21','L','Dusun Tereluba, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.981),
(5206102895680001,'Abdul Latif','Tolowata','1967-07-24','L','Dusun Tengge II, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.929),
(5206103119651041,'M. Fachri','Tolowata','1966-03-14','L','Dusun Tengge II, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.808),
(5206125612581016,'M Putra Bima','Tolowata','1945-10-19','L','Dusun Tengge, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.842),
(5206107564391010,'M. Doni','Tolowata','1942-07-23','L','Dusun Tolowata, Kel/Desa Tolowata, Kecematan ambalawi','Protestan',0.940),
(5206198305690000,'Hendra','Tolowata','1964-10-12','L','Dusun Tolowata, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.846),
(5206101573410000,'Aditia','Tolowata','1951-12-25','L','Dusun Tengge I, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.933),
(5206100307046700,'A. Rajak','Tolowata','1943-07-10','L','Dusun  Benteng, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.942),
(5206100707733502,'Hanafi','Tolowata','1969-12-13','L','Dusun Mada ntonggu, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.889),
(5206022106186503,'Muhammad','Tolowata','1947-05-29','L','Dusun Tere Luba, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.883),
(5206100106380009,'A. Latif','Tolowata','1969-01-11','L','Dusun  Benteng, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.870),
(5206100105360002,'Rifaid','Tolowata','1945-11-01','L','Dusun Tere Luba, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.881),
(5206100890881087,'Wahyudin','Tolowata','1970-09-29','L','Dusun Dana Bura, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.870),
(5206100703000002,'Adwan','Tolowata','1972-09-31','L','Dusun  Benteng, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.806),
(5206101267881002,'Maulana','Tolowata','1950-07-23','L','Dusun Dana Bura, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.871),
(5206108932150001,'Edyson','Tolowata','1957-10-11','L','Dusun Tengge I, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.868),
(5206109812450001,'Agus Saifudin','Tolowata','1946-02-05','L','Dusun Tengge I, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.892),
(5206102451150002,'Muhammad Ali','Tolowata','1952-12-21','L','Dusun Tengge I, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.795),
(5206102203560002,'Muh. Rizal','Tolowata','1950-12-28','L','Dusun Tengge II, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.948),
(2171060200031001,'Karnadi','Tolowata','1964-12-04','L','Dusun Doridungga, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.835),
(5205070101150000,'Jumardani','Tolowata','1966-01-23','L','Dusun Doridungga, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.892),
(5206030506541003,'Arsyad','Tolowata','1965-11-05','L','Dusun Tere Luba, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.886),
(5205051813250001,'Rahmat Al Fathir','Tolowata','1968-06-18','L','Dusun Tolowata, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.833),
(5206100104160761,'Ahdin','Tolowata','1960-06-05','L','Dusun Tengge II, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.833),
(5206103112622441,'Abhi Aldiansyah','Tolowata','1941-10-30','L','Dusun Tengge II, Kel/Desa Dorompori, Kecematan ambalawi','Islam',0.872),
(5206100104190620,'Roni Candra','Tolowata','1945-01-29','L','Dusun Tengge, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.875),
(5206107112726900,'Gunawan','Tolowata','1952-03-23','L','Dusun Tolowata, Kel/Desa Tolowata, Kecematan ambalawi','Protestan',0.917),
(5206101305690109,'Rahmad Dani','Tolowata','1958-09-12','L','Dusun Tolowata, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.881),
(5206101506816780,'Sukrin','Tolowata','1951-10-25','L','Dusun Tengge I, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.893),
(5206100307045600,'M. Alvin','Tolowata','1943-10-29','L','Dusun  Benteng, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.904),
(5206256707700002,'Guntur','Tolowata','1969-03-23','L','Dusun Mada ntonggu, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.861),
(5206782306190003,'Sutarman','Tolowata','1957-05-19','L','Dusun Tere Luba, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.886),
(5206853101090009,'Etdin Setiawan','Tolowata','1969-11-21','L','Dusun  Benteng, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.847),
(5206103451200002,'Buhari Muslim','Tolowata','1941-01-01','L','Dusun Tere Luba, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.831),
(5206100367881087,'Fuadin','Tolowata','1970-10-09','L','Dusun Dana Bura, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.871),
(5206100373841002,'M. Azam Alfatih','Tolowata','1972-03-11','L','Dusun  Benteng, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.856),
(5206101098781002,'Muhammad','Tolowata','1950-12-13','L','Dusun Dana Bura, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.833),
(5206101012150019,'Sudirman','Tolowata','1967-11-11','L','Dusun Tengge I, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.879),
(5206101212450190,'Muhammad Ikhsan','Tolowata','1940-05-05','L','Dusun Tengge I, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.817),
(5206101501150120,'Ajis','Tolowata','1952-09-12','L','Dusun Tengge I, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.885),
(5206102205140563,'Hamdin','Tolowata','1955-11-12','L','Dusun Tengge II, Kel/Desa Tolowata, Kecematan ambalawi','Islam',1.000),
(2171060275631001,'Jainul Akbar','Tolowata','1965-06-04','L','Dusun Doridungga, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.795),
(5205079366950000,'Fahmi','Tolowata','1964-08-13','L','Dusun Doridungga, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.873),
(5206031126981003,'Nurdin','Tolowata','1970-06-05','L','Dusun Tere Luba, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.903),
(5206101502789002,'Ariflin','Tolowata','1952-10-21','L','Dusun Tengge I, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.853),
(5206102205140273,'Jufrin','Tolowata','1951-02-12','L','Dusun Tengge II, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.826),
(2171060208668001,'Ferimansyah','Tolowata','1969-12-04','L','Dusun Doridungga, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.953),
(5205070106950109,'Sailan','Tolowata','1963-11-13','L','Dusun Doridungga, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.903),
(5206030506981248,'Muhammad Azlan','Tolowata','1955-12-05','L','Dusun Tere Luba, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.917),
(5206136903760002,'Subhan','Tolowata','1951-03-11','L','Dusun Tereluba, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.923),
(5206103052080001,'Hairil Anam','Tolowata','1958-07-24','L','Dusun Tengge II, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.906),
(5206103233651041,'Dikal Ferdiansyah','Tolowata','1956-02-24','L','Dusun Tengge II, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.850),
(5206107112584806,'Safilah','Tolowata','1975-05-29','L','Dusun Tengge, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.836),
(5206107112792290,'Arya Mahardika','Tolowata','1942-03-23','L','Dusun Tolowata, Kel/Desa Tolowata, Kecematan ambalawi','Protestan',0.897),
(5206101305690456,'Arasid Habibi','Tolowata','1956-12-12','L','Dusun Tolowata, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.968),
(5206101506810028,'Ajril Haikal','Tolowata','1951-01-01','L','Dusun Tengge I, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.831),
(5206100307050085,'M. Attazah Firdaus','Tolowata','1953-07-29','L','Dusun  Benteng, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.826),
(5206100708250002,'Khaerul Ashar','Tolowata','1970-12-23','L','Dusun Mada ntonggu, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.847),
(5206022106198903,'Anas Srijika','Tolowata','1957-10-29','L','Dusun Tere Luba, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.901),
(5206100101092879,'Andi Rahman','Tolowata','1959-01-21','L','Dusun  Benteng, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.867),
(5206100107250002,'M.Rafa Azka','Tolowata','1952-11-01','L','Dusun Tere Luba, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.925),
(5206100107635087,'Junaidin','Tolowata','1961-09-09','L','Dusun Dana Bura, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.840),
(5206100703841082,'Sahrul Tubian','Tolowata','1971-03-31','L','Dusun  Benteng, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.903),
(5206101007881172,'Suharmin','Tolowata','1955-07-13','L','Dusun Dana Bura, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.897),
(5206101012150093,'Jakariah','Tolowata','1957-10-11','L','Dusun Tengge I, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.940),
(5206101218650001,'Ridoa','Tolowata','1949-03-05','L','Dusun Tengge I, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.858),
(5206101501150276,'M. Adrian','Tolowata','1955-09-21','L','Dusun Tengge I, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.861),
(5206102205937002,'Aldin','Tolowata','1950-12-12','L','Dusun Tengge II, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.861),
(2171060236713100,'Izzul Hatis','Tolowata','1966-04-04','L','Dusun Doridungga, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.946),
(5205070106917200,'Budiansyah','Tolowata','1964-01-13','L','Dusun Doridungga, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.862),
(5206030502511003,'Bambang','Tolowata','1965-06-05','L','Dusun Tere Luba, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.814),
(5205051926850001,'Jihad','Tolowata','1968-06-18','L','Dusun Tolowata, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.992),
(5206100104160098,'Temi Fildin','Tolowata','1960-06-05','L','Dusun Tengge II, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.878),
(5206103112651125,'Kusman','Tolowata','1941-10-30','L','Dusun Tengge II, Kel/Desa Dorompori, Kecematan ambalawi','Islam',0.846),
(5206100104837001,'Muhamad Rizki','Tolowata','1955-12-19','L','Dusun Tengge, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.836),
(5206107198391010,'Aryanto','Tolowata','1952-03-23','L','Dusun Tolowata, Kel/Desa Tolowata, Kecematan ambalawi','Protestan',0.967),
(5206101305690009,'Ihyadin','Tolowata','1954-10-12','L','Dusun Tolowata, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.865),
(5206101506811720,'Andre Setiawan','Tolowata','1972-01-25','L','Dusun Tengge I, Kel/Desa Tolowata, Kecematan ambalawi','Islam',0.836);




-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id_sub_kriteria` int(11) NOT NULL,
  `id_kriteria` int(11) DEFAULT NULL,
  `nama_sub` varchar(300) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id_sub_kriteria`, `id_kriteria`, `nama_sub`, `nilai`, `keterangan`) VALUES
(1, 1, 'PNS', 70, 'Cukup'),
(2, 1, 'Petani', 80, 'Baik'),
(3, 1, 'Buruh', 90, 'Sangat Baik'),
(4, 2, '> Rp. 4 Juta /bulan', 70, 'Cukup'),
(5, 2, '600 Ribu S/d 3 Juta', 85, 'Baik'),
(6, 2, '< 500 Ribu /bulan', 95, 'Sangat Baik'),
(7, 3, '< 4 Orang', 85, 'Baik'),
(8, 3, '> 6 Orang', 70, 'Cukup'),
(9, 3, '2 - 6 Orang', 90, 'Sangat Baik'),
(10, 4, 'Keramik, Dinding Diplester, Plafon, Atap Genteng Atau Seng, Dapur, Wc, Sumber Listrik, Air Bersih.', 70, 'Cukup'),
(11, 4, 'Lantai Diplester, Dinding Batu Bata Tanpa Diplester, Tanpa Plafon, Atap Rumah Dari Seng, Dapur, Wc, Sumber Listrik, Air Bersih', 80, 'Baik'),
(12, 4, 'Lantai Rumah Dari Tanah, Kayu Atau Bambu, Dinding Dari Kayu Atau Bambu, Atap Dari Seng Yang Kualitas Nya Kurang Baik, Tanpa Plafon, Tidak Terdapat Wc Pribadi Atau Menggunakan Wc Umum, Menumpang Sumber Listrik, Sumber Air Bersih Terbatas', 90, 'Sangat Baik'),
(13, 5, 'Milik Pribadi', 70, 'Cukup'),
(14, 5, 'Numpang Tinggal', 80, 'Baik'),
(15, 5, 'Kontrak Pertahun', 90, 'Sangat Baik');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` enum('pengelola','bendahara','lurah') DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `role`) VALUES
(1,'admin','21232f297a57a5a743894a0e4a801fc3','pengelola'),
(2,'lurah','04960f28e4129aac5bdc9da32056560d','lurah'),
(3,'bendahara','c9ccd7f3c1145515a9d3f7415d5bcbea','bendahara');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indexes for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD PRIMARY KEY (`id_keluarga`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=467;

--
-- AUTO_INCREMENT for table `keluarga`
--
ALTER TABLE `keluarga`
  MODIFY `id_keluarga` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19978;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
