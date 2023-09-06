-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2021 at 10:15 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `attend_class`
--

CREATE TABLE `attend_class` (
  `attend_class_id` int(11) NOT NULL,
  `attend_class_date` text DEFAULT NULL,
  `attend_class_num` int(11) NOT NULL,
  `attend_class_schedule` int(11) DEFAULT NULL,
  `attend_class_ci` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attend_class`
--

INSERT INTO `attend_class` (`attend_class_id`, `attend_class_date`, `attend_class_num`, `attend_class_schedule`, `attend_class_ci`) VALUES
(108, 'จันทร์', 2, 127, '2564-03-15'),
(109, 'จันทร์', 0, 128, '2564-03-14'),
(110, 'จันทร์', 0, 129, '2564-03-14'),
(111, 'จันทร์', 0, 130, '2564-03-14'),
(112, 'จันทร์', 0, 131, '2564-03-14');

-- --------------------------------------------------------

--
-- Table structure for table `attend_history`
--

CREATE TABLE `attend_history` (
  `id` int(11) NOT NULL,
  `attend_history_num` int(11) DEFAULT NULL,
  `attend_history_date` date NOT NULL,
  `attend_history_class` int(11) DEFAULT NULL,
  `attend_history_student` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attend_history`
--

INSERT INTO `attend_history` (`id`, `attend_history_num`, `attend_history_date`, `attend_history_class`, `attend_history_student`) VALUES
(169, 2, '2564-03-15', 127, 21),
(170, 4, '2564-03-15', 127, 21);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_id` varchar(11) NOT NULL,
  `branch_name` varchar(100) NOT NULL,
  `branch_address` text NOT NULL,
  `branch_county` varchar(100) NOT NULL,
  `branch_map` text NOT NULL,
  `branch_photo` text DEFAULT NULL,
  `branch_show` varchar(10) NOT NULL,
  `branch_onwer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `branch_name`, `branch_address`, `branch_county`, `branch_map`, `branch_photo`, `branch_show`, `branch_onwer`) VALUES
('s01', 'หนองมน2', '369/88', 'ขอนแก่น', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62226.53498835604!2d100.85538590594611!3d12.897531871468235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3102960597457587%3A0x37191e723a1a258!2sHilton%20Pattaya!5e0!3m2!1sen!2sth!4v1612686861043!5m2!1sen!2sth\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>', '../upload/1.jpg', 'n', 0),
('s010', 'หนองมน2', '369/88', 'กาฬสินธุ์', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62226.53498835604!2d100.85538590594611!3d12.897531871468235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31029601c9698ae7%3A0xf6c92c743a482269!2sPattaya%20Blue%20Sky!5e0!3m2!1sen!2sth!4v1612688158758!5m2!1sen!2sth\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>', '../upload/1.jpg', 's', 0),
('s03', 'ศรีราชา2', 'dsg', 'ฉะเชิงเทรา', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62226.53498835604!2d100.85538590594611!3d12.897531871468235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31029601c9698ae7%3A0xf6c92c743a482269!2sPattaya%20Blue%20Sky!5e0!3m2!1sen!2sth!4v1612688158758!5m2!1sen!2sth\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>', '../upload/2.png', 's', 0),
('s04', 'ssss', 'ssss', 'กระบี่', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62226.53498835604!2d100.85538590594611!3d12.897531871468235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31029601c9698ae7%3A0xf6c92c743a482269!2sPattaya%20Blue%20Sky!5e0!3m2!1sen!2sth!4v1612688158758!5m2!1sen!2sth\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>', '../upload/1.jpg', 's', 52),
('s040', 'หนองมน2ss', '30/33', 'กาฬสินธุ์', '', '../upload/2.png', 's', 0),
('wrregrewsg', 'wrsgwr', 'grsgsag', 'กำแพงเพชร', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d62226.53498126044!2d100.8553859!3d12.8975319!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3102960597457587%3A0x37191e723a1a258!2sHilton%20Pattaya!5e0!3m2!1sen!2sth!4v1612688139967!5m2!1sen!2sth\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>', '../upload/2.png', 's', 67);

-- --------------------------------------------------------

--
-- Table structure for table `class_schedule`
--

CREATE TABLE `class_schedule` (
  `class_schedule_id` int(11) NOT NULL,
  `class_schedule_branch` varchar(11) DEFAULT NULL,
  `class_schedule_subject` varchar(11) DEFAULT NULL,
  `class_schedule_student` int(11) DEFAULT NULL,
  `class_schedule_status` varchar(100) NOT NULL,
  `class_schedule_teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class_schedule`
--

INSERT INTO `class_schedule` (`class_schedule_id`, `class_schedule_branch`, `class_schedule_subject`, `class_schedule_student`, `class_schedule_status`, `class_schedule_teacher`) VALUES
(127, 's04', 'sub01', 21, 'ชำระแล้ว', 54),
(128, 's04', 'sub01', 24, 'ชำระแล้ว', 54),
(129, 's04', 'sub01', 36, 'ชำระแล้ว', 54),
(130, 's04', 'sub02', 21, 'ชำระแล้ว', 55),
(131, 's04', 'sub02', 24, 'ชำระแล้ว', 55);

-- --------------------------------------------------------

--
-- Table structure for table `detail_subject`
--

CREATE TABLE `detail_subject` (
  `id` int(11) NOT NULL,
  `chapter_num` int(11) DEFAULT NULL,
  `chapter` text DEFAULT NULL,
  `subject_id` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detail_subject`
--

INSERT INTO `detail_subject` (`id`, `chapter_num`, `chapter`, `subject_id`) VALUES
(4067, 1, 'ปรับพื้นฐาน', 'sub01'),
(4068, 2, 'basic', 'sub01'),
(4069, 3, 'บทที่3', 'sub01'),
(4070, 4, 'บทที่4', 'sub01'),
(4071, 5, 'บทที่5', 'sub01'),
(4072, 6, 'บทที่6', 'sub01'),
(4073, 7, 'บทที่7', 'sub01'),
(4074, 8, 'บทที่8', 'sub01'),
(4075, 9, 'บทที่9', 'sub01'),
(4076, 10, 'บทที่10', 'sub01'),
(4077, 11, 'บทที่11', 'sub01'),
(4078, 12, 'บทที่12', 'sub01'),
(4079, 13, 'บทที่13', 'sub01'),
(4080, 14, 'บทที่14', 'sub01'),
(4081, 15, 'บทที่15', 'sub01'),
(4082, 16, 'บทที่16', 'sub01'),
(4083, 17, 'บทที่17', 'sub01'),
(4084, 18, 'บทที่18', 'sub01'),
(4166, 1, 'NO.1', 'sub02'),
(4167, 2, 'NO.2', 'sub02'),
(4168, 3, '', 'sub02'),
(4169, 4, '', 'sub02'),
(4170, 5, '', 'sub02'),
(4171, 6, '', 'sub02'),
(4172, 7, '', 'sub02'),
(4173, 8, '', 'sub02'),
(4174, 9, '', 'sub02'),
(4175, 10, '', 'sub02'),
(4201, 11, '', 'sub02'),
(4202, 12, '', 'sub02'),
(4203, 13, '', 'sub02'),
(4204, 14, '', 'sub02'),
(4205, 15, '', 'sub02'),
(4206, 16, '', 'sub02'),
(4207, 17, '', 'sub02'),
(4208, 18, '', 'sub02'),
(4209, 19, '', 'sub02'),
(4210, 20, '', 'sub02');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `member_user` varchar(100) NOT NULL,
  `member_password` varchar(100) DEFAULT NULL,
  `member_photo` text DEFAULT NULL,
  `member_fullname` varchar(100) NOT NULL,
  `member_nickname` varchar(100) NOT NULL,
  `member_id_card_code` varchar(100) NOT NULL,
  `member_tel` varchar(20) DEFAULT NULL,
  `member_email` varchar(200) DEFAULT NULL,
  `member_facebook` varchar(100) DEFAULT NULL,
  `member_line` varchar(100) DEFAULT NULL,
  `member_stdate` date NOT NULL,
  `member_branch` varchar(11) DEFAULT NULL,
  `member_county` varchar(100) NOT NULL,
  `member_birth` date NOT NULL,
  `member_rank` varchar(100) NOT NULL,
  `member_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `member_user`, `member_password`, `member_photo`, `member_fullname`, `member_nickname`, `member_id_card_code`, `member_tel`, `member_email`, `member_facebook`, `member_line`, `member_stdate`, `member_branch`, `member_county`, `member_birth`, `member_rank`, `member_status`) VALUES
(51, 'admin', '202cb962ac59075b964b07152d234b70', '../upload/2.png', 'admin kidcode', '', '1200100664373111', '0642844777za333', 'ppplaygame1@gmail.com', 'peejaza333', 'ppza333', '0000-00-00', NULL, 'จันทบุรี', '1996-10-01', 'a', 'อยู่ในระบบ'),
(52, 'subadmin', '202cb962ac59075b964b07152d234b70', '../upload/2.png', 'ราย รวย', 'นุ้ย', '1309700703840', '0641234759', 'poject@hotmail.com', 'raideidee', 'raide', '2564-03-10', NULL, 'ชลบุรี', '2006-05-16', 's', 'อยู่ในระบบ'),
(55, 'subadmin3', '202cb962ac59075b964b07152d234b70', '../upload/หมาป่า.gif', 'พีรกานต์ เทพหัสชัย', 'พีพี', '1200100664373', '0642844777', 'peerakarn_ho@hotmail.co.th', 'Pee ja', 'GB-PP', '2564-03-10', NULL, 'ชลบุรี', '2539-10-01', 's', 'อยู่ในระบบ'),
(67, 'sagsa', '5b942f32d2f09843377aa0ba0141d360', '../upload/', 'sadgsd gsdags', 'gfsadgs', 'dagsdagsdag', '0642844777', 'ppplaygame122@gmail.com', '', '', '2564-03-11', NULL, 'ตาก', '7207-02-04', 's', 'ไม่อยู่ในระบบ'),
(68, 'gewfrhg', 'db8b8523859497bbcfcc0b8acfa60315', '../upload/', 'พีกานต์ gsag', 'sadgsd', '4815451515', 'sfgvsfag', 'papatsara@siam2design.com1414', '', '', '2564-11-03', 's04', 'กาญจนบุรี', '0000-00-00', 't', 'อยู่ในระบบ'),
(70, 'subadmin123', '202cb962ac59075b964b07152d234b70', '../upload/no_image.png', 'peerakarn thephasschai', 'pp', '32001006643738', '06428447775555', 'peerakarn_ho@hotmail.co.th5555', 'jhjy', 'pp', '2564-03-13', NULL, 'ชลบุรี', '2539-10-01', 's', 'อยู่ในระบบ'),
(72, 'tech123', '202cb962ac59075b964b07152d234b70', '../upload/no_image.png', 'pp ppppxxx', 'pppxxx', '121984865161', '5616116', 'ppplaygame1@gmail.com1115115', '61616', '6516165', '0000-00-00', 's010', 'กาฬสินธุ์', '0000-00-00', 't', 'ไม่อยู่ในระบบ'),
(73, 'tech1745', '202cb962ac59075b964b07152d234b70', '../upload/no_image.png', 'pp ppppzx', 'pppzx', 'pppfsdgsmdgkvm', '511515s', 'ppplaygame1@gmail.com1451515gfsdg', '11515f1svs', '56151515', '0000-00-00', 's04', 'กาฬสินธุ์', '2539-10-01', 't', 'อยู่ในระบบ'),
(74, 'tech123', '202cb962ac59075b964b07152d234b70', '../upload/no_image.png', 'pp ppppxxx', 'pppxxx', '121984865161', '5616116', 'ppplaygame1@gmail.com1115115', '61616', '6516165', '0000-00-00', 's03', 'กาฬสินธุ์', '0000-00-00', 't', 'ไม่อยู่ในระบบ'),
(75, 'tech123', '202cb962ac59075b964b07152d234b70', '../upload/no_image.png', 'pp ppppxxx', 'pppxxx', '121984865161', '5616116', 'ppplaygame1@gmail.com1115115', '61616', '6516165', '0000-00-00', 's040', 'กาฬสินธุ์', '0000-00-00', 't', 'ไม่อยู่ในระบบ'),
(76, 'tech123', '202cb962ac59075b964b07152d234b70', '../upload/no_image.png', 'pp ppppxxx', 'pppxxx', '121984865161', '5616116', 'ppplaygame1@gmail.com1115115', '61616', '6516165', '0000-00-00', 'wrregrewsg', 'กาฬสินธุ์', '0000-00-00', 't', 'ไม่อยู่ในระบบ');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` varchar(11) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_receive_money` int(11) NOT NULL,
  `payment_net_total` varchar(100) NOT NULL,
  `payment_student` int(11) NOT NULL,
  `payment_attachment` text DEFAULT NULL,
  `payment_detail_branch` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payment_detail`
--

CREATE TABLE `payment_detail` (
  `payment_detail_id` int(11) NOT NULL,
  `payment_detail_amount` varchar(100) NOT NULL,
  `payment_detail_subject` varchar(11) DEFAULT NULL,
  `payment_id` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `portfolio_id` int(11) NOT NULL,
  `portfolio_files` text NOT NULL,
  `portfolio_date` date NOT NULL,
  `portfolio_chapter` int(11) DEFAULT NULL,
  `portfolio_comment` text NOT NULL,
  `portfolio_class` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`portfolio_id`, `portfolio_files`, `portfolio_date`, `portfolio_chapter`, `portfolio_comment`, `portfolio_class`) VALUES
(0, '../portfolio/IMG_9759.jpg', '2564-03-15', 2, '', 127),
(0, '../portfolio/TIM_7212.jpg', '2564-03-15', 4, '', 127);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `student_user` varchar(100) NOT NULL,
  `student_password` text NOT NULL,
  `student_photo` text DEFAULT NULL,
  `student_fullname` varchar(100) NOT NULL,
  `student_nic` varchar(100) NOT NULL,
  `student_birth` date NOT NULL,
  `student_branch` varchar(11) NOT NULL,
  `student_parents` varchar(255) NOT NULL,
  `student_status` varchar(100) NOT NULL,
  `student_line` varchar(100) DEFAULT NULL,
  `student_facebook` varchar(100) DEFAULT NULL,
  `student_tel` varchar(20) DEFAULT NULL,
  `student_email` varchar(100) DEFAULT NULL,
  `credit_by` int(11) DEFAULT NULL,
  `credit_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_user`, `student_password`, `student_photo`, `student_fullname`, `student_nic`, `student_birth`, `student_branch`, `student_parents`, `student_status`, `student_line`, `student_facebook`, `student_tel`, `student_email`, `credit_by`, `credit_date`) VALUES
(21, '0123456789@hotmail.com', '781e5e245d69b566979b86e28d23f2c7', '../upload/1.gif', 'ดวง ดีย์', 'รักซ์', '2009-06-15', 's04', 'สมิง ดีย์', 'เรียนอยู่', 'smik', 'smik', '0123456789', '0123456789@hotmail.com', 52, '2564-03-10'),
(24, 'kawin@gmail.com', 'e95d00ffcd2dc1de9c9da2ae48b933f1', '../upload/118154473_4922930291057769_8253821716722652943_o.jpg', 'สวิช หน่อย', 'แดน', '2004-10-19', 's04', 'กวิน หน่อย', 'เรียนอยู่', 'kawin', 'kawin', '0987456321', 'kawin@gmail.com', 52, '2564-03-10'),
(25, 'saman@hotmail.com', '6fe035d0253583bbe3aa7e1f44738e8d', '../upload/draw2.jpg', 'อาหรี สมาน', 'เรือ', '1999-10-12', 'wrregrewsg', 'อาเหรา สมาน', 'เรียนอยู่', 'สมาน', 'สมาน สมาน', '0645987321', 'saman@hotmail.com', 68, '2564-03-10'),
(30, 'ppplaygame12@gmail.com', 'ea7e74270eb755b05c816e62c0f637a7', '../upload/1.png', 'มานี มาแล้ว', 'นะแจ้', '2539-10-01', 'wrregrewsg', 'วันเพ็ญ เดือนสิบสอง', 'เรียนอยู่', 'van', 'pen', '0816878296', 'ppplaygame12@gmail.com', 67, '2564-03-11'),
(36, 'peerakarn_ho@hotmail.co.th1717', '34fe22479e68a97e46a789303bd8377a', '../upload/2.png', 'พีรกานต์ เทพหัสชัย', 'พีพี', '2539-10-01', 's04', 'วันเพ็ญ เดือนสิบสอง', 'เรียนอยู่', 'oopp', 'pen', '06428447771717', 'peerakarn_ho@hotmail.co.th1717', 51, '2564-03-14');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` varchar(11) NOT NULL,
  `subject_name` text NOT NULL,
  `subject_detail` text NOT NULL,
  `subject_amount` int(11) NOT NULL,
  `subject_full_amount` int(11) NOT NULL,
  `subject_number` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_name`, `subject_detail`, `subject_amount`, `subject_full_amount`, `subject_number`) VALUES
('sub01', 'voxel', 'ดี', 1500, 9300, '18'),
('sub02', 'gravit', 'vbvb', 1500, 9300, '20');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_schedule`
--

CREATE TABLE `teacher_schedule` (
  `teacher_schedule_id` int(11) NOT NULL,
  `teacher_schedule_subject` varchar(11) DEFAULT NULL,
  `teacher_schedule_name` int(11) DEFAULT NULL,
  `teacher_schedule_branch` varchar(11) NOT NULL,
  `teacher_schedule_date` text DEFAULT NULL,
  `teacher_schedule_starttime` text DEFAULT NULL,
  `teacher_schedule_endtime` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher_schedule`
--

INSERT INTO `teacher_schedule` (`teacher_schedule_id`, `teacher_schedule_subject`, `teacher_schedule_name`, `teacher_schedule_branch`, `teacher_schedule_date`, `teacher_schedule_starttime`, `teacher_schedule_endtime`) VALUES
(54, 'sub01', 52, 's04', 'จันทร์', '10:00:00', '10:30:00'),
(55, 'sub02', 73, 's04', 'จันทร์', '09:30:00', '11:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `tech`
--

CREATE TABLE `tech` (
  `id` int(11) NOT NULL,
  `tech` int(11) DEFAULT NULL,
  `major` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tech`
--

INSERT INTO `tech` (`id`, `tech`, `major`) VALUES
(50, 52, 's04'),
(55, 67, 'wrregrewsg'),
(56, 72, 's010'),
(57, 73, 's010');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attend_class`
--
ALTER TABLE `attend_class`
  ADD PRIMARY KEY (`attend_class_id`),
  ADD KEY `attend_class_schedule` (`attend_class_schedule`);

--
-- Indexes for table `attend_history`
--
ALTER TABLE `attend_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attend_history_class` (`attend_history_class`),
  ADD KEY `attend_history_student` (`attend_history_student`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `class_schedule`
--
ALTER TABLE `class_schedule`
  ADD PRIMARY KEY (`class_schedule_id`),
  ADD KEY `class_schedule_branch` (`class_schedule_branch`),
  ADD KEY `class_schedule_subject` (`class_schedule_subject`),
  ADD KEY `class_schedule_student` (`class_schedule_student`),
  ADD KEY `class_schedule_teacher` (`class_schedule_teacher`);

--
-- Indexes for table `detail_subject`
--
ALTER TABLE `detail_subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `member_branch` (`member_branch`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `payment_student` (`payment_student`),
  ADD KEY `payment_detail_branch` (`payment_detail_branch`),
  ADD KEY `payment_receive_money` (`payment_receive_money`);

--
-- Indexes for table `payment_detail`
--
ALTER TABLE `payment_detail`
  ADD PRIMARY KEY (`payment_detail_id`),
  ADD KEY `payment_detail_subject` (`payment_detail_subject`),
  ADD KEY `payment_id` (`payment_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `student_branch` (`student_branch`),
  ADD KEY `credit_by` (`credit_by`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `teacher_schedule`
--
ALTER TABLE `teacher_schedule`
  ADD PRIMARY KEY (`teacher_schedule_id`),
  ADD KEY `teacher_schedule_subject` (`teacher_schedule_subject`),
  ADD KEY `teacher_schedule_name` (`teacher_schedule_name`),
  ADD KEY `teacher_schedule_branch` (`teacher_schedule_branch`);

--
-- Indexes for table `tech`
--
ALTER TABLE `tech`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tech` (`tech`),
  ADD KEY `major` (`major`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attend_class`
--
ALTER TABLE `attend_class`
  MODIFY `attend_class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `attend_history`
--
ALTER TABLE `attend_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `class_schedule`
--
ALTER TABLE `class_schedule`
  MODIFY `class_schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `detail_subject`
--
ALTER TABLE `detail_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4221;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `payment_detail`
--
ALTER TABLE `payment_detail`
  MODIFY `payment_detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `teacher_schedule`
--
ALTER TABLE `teacher_schedule`
  MODIFY `teacher_schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tech`
--
ALTER TABLE `tech`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attend_class`
--
ALTER TABLE `attend_class`
  ADD CONSTRAINT `attend_class_ibfk_1` FOREIGN KEY (`attend_class_schedule`) REFERENCES `class_schedule` (`class_schedule_id`);

--
-- Constraints for table `attend_history`
--
ALTER TABLE `attend_history`
  ADD CONSTRAINT `attend_history_ibfk_1` FOREIGN KEY (`attend_history_class`) REFERENCES `class_schedule` (`class_schedule_id`),
  ADD CONSTRAINT `attend_history_ibfk_2` FOREIGN KEY (`attend_history_student`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `class_schedule`
--
ALTER TABLE `class_schedule`
  ADD CONSTRAINT `class_schedule_ibfk_1` FOREIGN KEY (`class_schedule_branch`) REFERENCES `branch` (`branch_id`),
  ADD CONSTRAINT `class_schedule_ibfk_2` FOREIGN KEY (`class_schedule_subject`) REFERENCES `subject` (`subject_id`),
  ADD CONSTRAINT `class_schedule_ibfk_3` FOREIGN KEY (`class_schedule_student`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `class_schedule_ibfk_4` FOREIGN KEY (`class_schedule_teacher`) REFERENCES `teacher_schedule` (`teacher_schedule_id`);

--
-- Constraints for table `detail_subject`
--
ALTER TABLE `detail_subject`
  ADD CONSTRAINT `detail_subject_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`);

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`member_branch`) REFERENCES `branch` (`branch_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`payment_student`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`payment_detail_branch`) REFERENCES `branch` (`branch_id`),
  ADD CONSTRAINT `payment_ibfk_3` FOREIGN KEY (`payment_receive_money`) REFERENCES `member` (`member_id`);

--
-- Constraints for table `payment_detail`
--
ALTER TABLE `payment_detail`
  ADD CONSTRAINT `payment_detail_ibfk_1` FOREIGN KEY (`payment_detail_subject`) REFERENCES `subject` (`subject_id`),
  ADD CONSTRAINT `payment_detail_ibfk_2` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`payment_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`student_branch`) REFERENCES `branch` (`branch_id`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`credit_by`) REFERENCES `member` (`member_id`);

--
-- Constraints for table `teacher_schedule`
--
ALTER TABLE `teacher_schedule`
  ADD CONSTRAINT `teacher_schedule_ibfk_1` FOREIGN KEY (`teacher_schedule_subject`) REFERENCES `subject` (`subject_id`),
  ADD CONSTRAINT `teacher_schedule_ibfk_2` FOREIGN KEY (`teacher_schedule_name`) REFERENCES `member` (`member_id`),
  ADD CONSTRAINT `teacher_schedule_ibfk_3` FOREIGN KEY (`teacher_schedule_branch`) REFERENCES `branch` (`branch_id`);

--
-- Constraints for table `tech`
--
ALTER TABLE `tech`
  ADD CONSTRAINT `tech_ibfk_1` FOREIGN KEY (`tech`) REFERENCES `member` (`member_id`),
  ADD CONSTRAINT `tech_ibfk_2` FOREIGN KEY (`major`) REFERENCES `branch` (`branch_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
