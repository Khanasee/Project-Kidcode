-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2021 at 07:55 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

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
(54, 'จันทร์', 2, 73, '2564-03-11'),
(55, 'จันทร์', 1, 74, '2564-03-11'),
(57, 'พุธ', 0, 76, '2564-03-11'),
(58, 'อังคาร', 0, 77, '2564-03-11'),
(61, 'เสาร์', 1, 80, '2564-03-11');

-- --------------------------------------------------------

--
-- Table structure for table `attend_history`
--

CREATE TABLE `attend_history` (
  `id` int(11) NOT NULL,
  `attend_history_num` int(11) DEFAULT NULL,
  `attend_history_date` date NOT NULL,
  `attend_history_class` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attend_history`
--

INSERT INTO `attend_history` (`id`, `attend_history_num`, `attend_history_date`, `attend_history_class`) VALUES
(122, 1, '2564-03-10', 73),
(123, 2, '2564-03-11', 73),
(124, 1, '2564-03-11', 74),
(125, 1, '2564-03-11', 80);

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
('no.1', 'ศรีราชา', '369/88 ซ.6', 'ชัยนาท', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31079.376123921098!2d100.90718812339317!3d13.167316894016638!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3102b7032edc4a3d%3A0x403d84ae1b4c640!2sSi%20Racha%2C%20Si%20Racha%20District%2C%20Chon%20Buri!5e0!3m2!1sen!2sth!4v1614450507270!5m2!1sen!2sth\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '../upload/2.png', 's', 52),
('no.2', 'หนองมน', '33', 'ชลบุรี', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15540.036130823473!2d100.90972155332565!3d13.16183010203117!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3102b719f4a692db%3A0x380865c07fa68840!2z4LmC4Lij4LiH4Lie4Lii4Liy4Lia4Liy4Lil4Liq4Lih4LmA4LiU4LmH4LiI4Lie4Lij4Liw4Lia4Lij4Lih4Lij4Liy4LiK4LmA4LiX4Lin4Li1IOC4kyDguKjguKPguLXguKPguLLguIrguLI!5e0!3m2!1sth!2sth!4v1615365150166!5m2!1sth!2sth\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '../upload/5.gif', 's', 55);

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
(73, 'no.1', '01', 21, 'ชำระแล้ว', 34),
(74, 'no.1', '01', 24, 'ชำระแล้ว', 34),
(76, 'no.1', '01', 25, 'ชำระแล้ว', 35),
(77, 'no.1', '01', 24, 'ชำระแล้ว', 32),
(80, 'no.1', '01', 25, 'ชำระแล้ว', 36);

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
(52, 'subadmin', '202cb962ac59075b964b07152d234b70', '../upload/2.png', 'มาดี ตัมกู๊ด', 'นุ้ย', '1309700703840', '0970134562', 'poject@hotmail.com', 'nui nui', 'nuimakill2', '2564-03-10', NULL, 'ชลบุรี', '2006-05-16', 's', 'อยู่ในระบบ'),
(53, 'tech', '202cb962ac59075b964b07152d234b70', '../upload/5.gif', 'ราย ได้', 'ดี', '1309700705402', '0641234759', 'raida@gmail.com', 'raideidee', 'raid', '2564-10-03', 'no.1', 'ชลบุรี', '2001-09-17', 't', 'อยู่ในระบบ'),
(54, 'tech2', '202cb962ac59075b964b07152d234b70', '../upload/Phone-PNG-Pic.png', 'ราเชน สวัสดีพ่อ', '', '130977046323', '0321654988', 'sawatdeepro@hotmail.com', 'sawatdeepro@hotmail.com', 'sawatdeepor', '2564-10-03', 'no.1', 'ชลบุรี', '2007-05-15', 't', 'อยู่ในระบบ'),
(55, 'subadmin3', '202cb962ac59075b964b07152d234b70', '../upload/หมาป่า.gif', 'พีรกานต์ เทพหัสชัย', 'พีพี', '1200100664373', '0642844777', 'peerakarn_ho@hotmail.co.th', 'Pee ja', 'GB-PP', '2564-03-10', NULL, 'ชลบุรี', '2539-10-01', 's', 'อยู่ในระบบ'),
(57, 'tech04', '202cb962ac59075b964b07152d234b70', '../upload/1.png', 'มานะ มานี้', '', '1200100664373555', '0816878296', 'papatsara@siam2design.com', 'peeja', 'van', '2564-11-03', 'no.1', 'กำแพงเพชร', '2534-10-01', 't', 'อยู่ในระบบ');

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
  `portfolio_student` int(11) DEFAULT NULL,
  `portfolio_comment` text NOT NULL,
  `portfolio_subject` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`portfolio_id`, `portfolio_files`, `portfolio_date`, `portfolio_student`, `portfolio_comment`, `portfolio_subject`) VALUES
(108, '../portfolio/1 (1).png', '2564-03-10', 21, '', '01'),
(109, '../portfolio/2.png', '2564-03-11', 21, '', '01'),
(110, '../portfolio/3.2.png', '2564-03-11', 24, 'สุดยอด', '01'),
(111, '../portfolio/kodu-game-logo.jpg', '2564-03-11', 25, 'ทำงานเสร็จเร็วมากครับ', '01');

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
(21, '0123456789@hotmail.com', '781e5e245d69b566979b86e28d23f2c7', '../upload/1.gif', 'ดวง ดีย์', 'รักซ์', '2009-06-15', 'no.1', 'สมิง ดีย์', 'เรียนอยู่', 'smik', 'smik', '0123456789', '0123456789@hotmail.com', 51, '2564-03-10'),
(24, 'kawin@gmail.com', 'e95d00ffcd2dc1de9c9da2ae48b933f1', '../upload/118154473_4922930291057769_8253821716722652943_o.jpg', 'สวิช หน่อย', 'แดน', '2004-10-19', 'no.1', 'กวิน หน่อย', 'เรียนอยู่', 'kawin', 'kawin', '0987456321', 'kawin@gmail.com', 51, '2564-03-10'),
(25, 'saman@hotmail.com', '6fe035d0253583bbe3aa7e1f44738e8d', '../upload/draw2.jpg', 'อาหรี สมาน', 'เรือ', '1999-10-12', 'no.1', 'อาเหรา สมาน', 'เรียนอยู่', 'สมาน', 'สมาน สมาน', '0645987321', 'saman@hotmail.com', 51, '2564-03-10'),
(30, 'ppplaygame12@gmail.com', 'ea7e74270eb755b05c816e62c0f637a7', '../upload/1.png', 'มานี มาแล้ว', 'นะแจ้', '2539-10-01', 'no.1', 'วันเพ็ญ เดือนสิบสอง', 'เรียนอยู่', 'van', 'pen', '0816878296', 'ppplaygame12@gmail.com', 52, '2564-03-11');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` varchar(11) NOT NULL,
  `subject_name` text NOT NULL,
  `subject_detail` text NOT NULL,
  `subject_amount` int(11) NOT NULL,
  `subject_number` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_name`, `subject_detail`, `subject_amount`, `subject_number`) VALUES
('01', 'design', 'ออกแบบ', 1900, '24');

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
(32, '01', 54, 'no.1', 'อังคาร', '09:30:00', '21:30:00'),
(34, '01', 52, 'no.1', 'จันทร์', '08:30:00', '09:00:00'),
(35, '01', 52, 'no.1', 'พุธ', '09:00:00', '10:00:00'),
(36, '01', 53, 'no.1', 'เสาร์', '09:00:00', '14:30:00');

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
(20, 54, 'no.1'),
(21, 52, 'no.1'),
(22, 53, 'no.1'),
(33, 55, 'no.2');

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
  ADD KEY `attend_history_class` (`attend_history_class`);

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
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`portfolio_id`),
  ADD KEY `portfolio_student` (`portfolio_student`),
  ADD KEY `portfolio_subject` (`portfolio_subject`);

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
  MODIFY `attend_class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `attend_history`
--
ALTER TABLE `attend_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `class_schedule`
--
ALTER TABLE `class_schedule`
  MODIFY `class_schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `payment_detail`
--
ALTER TABLE `payment_detail`
  MODIFY `payment_detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `portfolio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `teacher_schedule`
--
ALTER TABLE `teacher_schedule`
  MODIFY `teacher_schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tech`
--
ALTER TABLE `tech`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
  ADD CONSTRAINT `attend_history_ibfk_1` FOREIGN KEY (`attend_history_class`) REFERENCES `class_schedule` (`class_schedule_id`);

--
-- Constraints for table `class_schedule`
--
ALTER TABLE `class_schedule`
  ADD CONSTRAINT `class_schedule_ibfk_1` FOREIGN KEY (`class_schedule_branch`) REFERENCES `branch` (`branch_id`),
  ADD CONSTRAINT `class_schedule_ibfk_2` FOREIGN KEY (`class_schedule_subject`) REFERENCES `subject` (`subject_id`),
  ADD CONSTRAINT `class_schedule_ibfk_3` FOREIGN KEY (`class_schedule_student`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `class_schedule_ibfk_4` FOREIGN KEY (`class_schedule_teacher`) REFERENCES `teacher_schedule` (`teacher_schedule_id`);

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
-- Constraints for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD CONSTRAINT `portfolio_ibfk_1` FOREIGN KEY (`portfolio_student`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `portfolio_ibfk_2` FOREIGN KEY (`portfolio_subject`) REFERENCES `subject` (`subject_id`);

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
