-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2021 at 05:26 AM
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
  `attend_class_date` date DEFAULT NULL,
  `attend_class_num` int(11) NOT NULL,
  `attend_class_schedule` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attend_class`
--

INSERT INTO `attend_class` (`attend_class_id`, `attend_class_date`, `attend_class_num`, `attend_class_schedule`) VALUES
(7, NULL, 0, 30),
(8, NULL, 0, 31),
(9, NULL, 0, 32),
(10, NULL, 0, 33);

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
  `branch_photo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `branch_name`, `branch_address`, `branch_county`, `branch_map`, `branch_photo`) VALUES
('s01', 'ศรีราชา', '369/88', 'ชลบุรี', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d496706.7827578321!2d100.47809226749872!3d13.441904048129247!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e299b03caad709%3A0xd57871403c29d7e2!2sSIAM2DESIGN%20CO.%2CLTD.!5e0!3m2!1sen!2sth!4v1612592832374!5m2!1sen!2sth\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>', '../upload/ต้นไม้.png'),
('s02', 'ศรีราชา2333', '369/88', 'นครนายก', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d62226.53498126044!2d100.8553859!3d12.8975319!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3102960597457587%3A0x37191e723a1a258!2sHilton%20Pattaya!5e0!3m2!1sen!2sth!4v1612688139967!5m2!1sen!2sth\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>', '../upload/2.png'),
('s03', 'หนองมน', '10/28', '', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62226.53498835604!2d100.85538590594611!3d12.897531871468235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3102960597457587%3A0x37191e723a1a258!2sHilton%20Pattaya!5e0!3m2!1sen!2sth!4v1612686861043!5m2!1sen!2sth\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>', '../upload/3.3.png'),
('s04', 'พระราม5', '369/88', 'ชลบุรี', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d496706.7827578321!2d100.47809226749872!3d13.441904048129247!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e299b03caad709%3A0xd57871403c29d7e2!2sSIAM2DESIGN%20CO.%2CLTD.!5e0!3m2!1sen!2sth!4v1612592832374!5m2!1sen!2sth\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>', '../upload/2.png'),
('s05', 'หนองมน22222', '30/3332222', '', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d496706.7827578321!2d100.47809226749872!3d13.441904048129247!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e299b03caad709%3A0xd57871403c29d7e2!2sSIAM2DESIGN%20CO.%2CLTD.!5e0!3m2!1sen!2sth!4v1612592832374!5m2!1sen!2sth\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>', '../upload/บรรดาสัตว์.png'),
('s06', 'หนองมน25274', '30/3322', 'กาญจนบุรี', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62226.53498835604!2d100.85538590594611!3d12.897531871468235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3102960597457587%3A0x37191e723a1a258!2sHilton%20Pattaya!5e0!3m2!1sen!2sth!4v1612686861043!5m2!1sen!2sth\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>', '../upload/3.3.png'),
('s07', 'หนองมน2', '903/1 ซอยหมู่บ้านร่มสุข 34', 'กำแพงเพชร', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d496706.7827578321!2d100.47809226749872!3d13.441904048129247!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e299b03caad709%3A0xd57871403c29d7e2!2sSIAM2DESIGN%20CO.%2CLTD.!5e0!3m2!1sen!2sth!4v1612592832374!5m2!1sen!2sth\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>', '../upload/1.gif');

-- --------------------------------------------------------

--
-- Table structure for table `class_schedule`
--

CREATE TABLE `class_schedule` (
  `class_schedule_id` int(11) NOT NULL,
  `class_schedule_branch` varchar(11) DEFAULT NULL,
  `class_schedule_subject` varchar(11) DEFAULT NULL,
  `class_schedule_student` int(11) DEFAULT NULL,
  `class_schedule_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class_schedule`
--

INSERT INTO `class_schedule` (`class_schedule_id`, `class_schedule_branch`, `class_schedule_subject`, `class_schedule_student`, `class_schedule_status`) VALUES
(30, 's01', 'sub01', 12, 'ชำระแล้ว'),
(31, 's01', 'sub02', 12, 'ชำระแล้ว'),
(32, 's01', 'sub03', 12, 'ชำระแล้ว'),
(33, 's01', 'sub02', 13, 'ชำระแล้ว');

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

INSERT INTO `member` (`member_id`, `member_user`, `member_password`, `member_photo`, `member_fullname`, `member_id_card_code`, `member_tel`, `member_email`, `member_facebook`, `member_line`, `member_stdate`, `member_branch`, `member_county`, `member_birth`, `member_rank`, `member_status`) VALUES
(7, 'subadmin', '202cb962ac59075b964b07152d234b70', '../upload/1.gif', 'พีกานต์ เทพหัสชัย', '1200100664373', '0642844777', 'peerakarn_ho@hotmail.co.th', 'peeja', 'pp', '2564-12-02', NULL, '', '2539-10-01', 's', 'อยู่ในระบบ'),
(15, 'tech', '202cb962ac59075b964b07152d234b70', '../upload/หนูพูด.gif', 'peerakarn เทำหัสชัย', '3200100664373', '0642844777', 'ppplaygame1@gmail.com', '', '', '2564-12-02', 's03', '', '2541-05-15', 't', 'อยู่ในระบบ'),
(17, 'demo', '202cb962ac59075b964b07152d234b70', '../upload/มดขนอาหาร3.gif', 'time timetime', '3200100664282', '0642844777', 'ibarakisaga@gmail.com', '', '', '2564-12-02', NULL, '', '2539-10-01', 's', 'อยู่ในระบบ'),
(18, 'pp', '202cb962ac59075b964b07152d234b70', '../upload/มดขนอาหาร3.gif', 'vbvbccvcv timmy', '1200100664897', '0816878296', 'peerakarn_ho@hotmail.co.th', 'peeja', '', '2564-12-02', 's05', '', '2540-05-10', 't', 'อยู่ในระบบ'),
(19, 'subadmin02', '202cb962ac59075b964b07152d234b70', '../upload/1.gif', 'พีกานต์ เทำหัสชัย', '51234891564161515', '0816878296', 'peerakarn_ho@hotmail.co.th', 'peeja', 'pp', '0000-00-00', NULL, 'เชียงราย', '1996-10-01', 's', 'อยู่ในระบบ'),
(20, 'techsssz', '202cb962ac59075b964b07152d234b70', '../upload/2.png', 'sfdgvad fdb esfbs', '0156141246', '0816878296', 'peerakarn_ho@hotmail.co.th', '', '', '0000-00-00', 's05', 'ตาก', '1561-04-05', 't', 'อยู่ในระบบ'),
(21, 'ppppp', '202cb962ac59075b964b07152d234b70', '../upload/1.png', 'vbvbccvcv timmy', '32001006642821441212', '0816878296', 'papatsara@siam2design.com', '', '', '0000-00-00', NULL, 'นครนายก', '5155-03-01', 's', 'อยู่ในระบบ'),
(22, 'admin', '202cb962ac59075b964b07152d234b70', '../upload/หมาหยุด.png', 'พีกานต์ admin', '1200100664373111', '0642844777', 'peerakarn_ho@hotmail.co.th', 'peeja', 'pp', '0000-00-00', NULL, 'จันทบุรี', '1996-10-01', 'a', 'อยู่ในระบบ');

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
  `portfolio_student` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(12, 'peerakarn_ho@hotmail.co.th', '1b93f963b8fb9694acc732833d12d0d0', '../upload/3.1.png', 'พีรกานต์ เทพหัสชัย', 'พีพี', '4704-10-02', 's01', 'time tim', 'เรียนอยู่', 'pp', 'sdsadsavcxz', '0642844777', 'peerakarn_ho@hotmail.co.th', 22, '0000-00-00'),
(13, 'ppplaygame1@gmail.com', 'ea7e74270eb755b05c816e62c0f637a7', '../upload/1.png', 'พีรกานต์ timmy', 'พีพี', '6466-04-05', 's01', 'time lkkkk', 'เรียนอยู่', 'pp', 'sdsadsavcxz', '0816878296', 'ppplaygame1@gmail.com', 22, '2564-02-17');

-- --------------------------------------------------------

--
-- Table structure for table `subadmin`
--

CREATE TABLE `subadmin` (
  `id` int(11) NOT NULL,
  `member` int(11) DEFAULT NULL,
  `branch` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subadmin`
--

INSERT INTO `subadmin` (`id`, `member`, `branch`) VALUES
(11, 7, 's04'),
(15, 17, 's01'),
(16, 7, 's03'),
(17, 17, 's05'),
(18, 19, 's02'),
(19, 21, 's06'),
(20, 17, 's07');

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
('sub01', 'voxel121212', 'อิอิ', 1500, '24'),
('sub02', 'gravit2222', '2222', 15002222, '242222'),
('sub03', 'voxel2', 'vbvb', 1500, '24');

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
(7, 'sub01', 7, 's01', 'จันทร์', '08:30:00', '10:00:00');

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
  ADD KEY `class_schedule_student` (`class_schedule_student`);

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
  ADD KEY `portfolio_student` (`portfolio_student`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `student_branch` (`student_branch`),
  ADD KEY `credit_by` (`credit_by`);

--
-- Indexes for table `subadmin`
--
ALTER TABLE `subadmin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member` (`member`),
  ADD KEY `branch` (`branch`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attend_class`
--
ALTER TABLE `attend_class`
  MODIFY `attend_class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `class_schedule`
--
ALTER TABLE `class_schedule`
  MODIFY `class_schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `payment_detail`
--
ALTER TABLE `payment_detail`
  MODIFY `payment_detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `subadmin`
--
ALTER TABLE `subadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `teacher_schedule`
--
ALTER TABLE `teacher_schedule`
  MODIFY `teacher_schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attend_class`
--
ALTER TABLE `attend_class`
  ADD CONSTRAINT `attend_class_ibfk_1` FOREIGN KEY (`attend_class_schedule`) REFERENCES `class_schedule` (`class_schedule_id`);

--
-- Constraints for table `class_schedule`
--
ALTER TABLE `class_schedule`
  ADD CONSTRAINT `class_schedule_ibfk_1` FOREIGN KEY (`class_schedule_branch`) REFERENCES `branch` (`branch_id`),
  ADD CONSTRAINT `class_schedule_ibfk_2` FOREIGN KEY (`class_schedule_subject`) REFERENCES `subject` (`subject_id`),
  ADD CONSTRAINT `class_schedule_ibfk_3` FOREIGN KEY (`class_schedule_student`) REFERENCES `student` (`student_id`);

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
  ADD CONSTRAINT `portfolio_ibfk_1` FOREIGN KEY (`portfolio_student`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`student_branch`) REFERENCES `branch` (`branch_id`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`credit_by`) REFERENCES `member` (`member_id`);

--
-- Constraints for table `subadmin`
--
ALTER TABLE `subadmin`
  ADD CONSTRAINT `subadmin_ibfk_1` FOREIGN KEY (`member`) REFERENCES `member` (`member_id`),
  ADD CONSTRAINT `subadmin_ibfk_2` FOREIGN KEY (`branch`) REFERENCES `branch` (`branch_id`);

--
-- Constraints for table `teacher_schedule`
--
ALTER TABLE `teacher_schedule`
  ADD CONSTRAINT `teacher_schedule_ibfk_1` FOREIGN KEY (`teacher_schedule_subject`) REFERENCES `subject` (`subject_id`),
  ADD CONSTRAINT `teacher_schedule_ibfk_2` FOREIGN KEY (`teacher_schedule_name`) REFERENCES `member` (`member_id`),
  ADD CONSTRAINT `teacher_schedule_ibfk_3` FOREIGN KEY (`teacher_schedule_branch`) REFERENCES `branch` (`branch_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
