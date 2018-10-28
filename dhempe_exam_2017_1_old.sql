/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : dhempe_exam_2016_2

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-11-06 17:43:53
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ba_reval_marks_sem_1`
-- ----------------------------
DROP TABLE IF EXISTS `ba_reval_marks_sem_1`;
CREATE TABLE `ba_reval_marks_sem_1` (
  `sub_id` varchar(30) NOT NULL,
  `pr_number` int(11) NOT NULL,
  `isa_abs` varchar(5) NOT NULL,
  `see_abs` varchar(5) NOT NULL,
  `pract_abs` varchar(5) NOT NULL,
  `internal` int(11) NOT NULL,
  `theory` int(11) NOT NULL,
  `practicle` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gen_symbol` varchar(11) NOT NULL,
  `activity_symbol` varchar(30) NOT NULL,
  `gen_the_symbol` varchar(11) NOT NULL,
  `gen_the_pract_sym` varchar(11) NOT NULL,
  `pass_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ba_reval_marks_sem_1
-- ----------------------------

-- ----------------------------
-- Table structure for `ba_reval_marks_sem_2`
-- ----------------------------
DROP TABLE IF EXISTS `ba_reval_marks_sem_2`;
CREATE TABLE `ba_reval_marks_sem_2` (
  `sub_id` varchar(30) NOT NULL,
  `pr_number` int(11) NOT NULL,
  `isa_abs` varchar(5) NOT NULL,
  `see_abs` varchar(5) NOT NULL,
  `pract_abs` varchar(5) NOT NULL,
  `internal` int(11) NOT NULL,
  `theory` int(11) NOT NULL,
  `practicle` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gen_symbol` varchar(11) NOT NULL,
  `activity_symbol` varchar(30) NOT NULL,
  `gen_the_symbol` varchar(11) NOT NULL,
  `gen_the_pract_sym` varchar(11) NOT NULL,
  `pass_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ba_reval_marks_sem_2
-- ----------------------------

-- ----------------------------
-- Table structure for `ba_reval_marks_sem_3`
-- ----------------------------
DROP TABLE IF EXISTS `ba_reval_marks_sem_3`;
CREATE TABLE `ba_reval_marks_sem_3` (
  `sub_id` varchar(30) NOT NULL,
  `pr_number` int(11) NOT NULL,
  `isa_abs` varchar(5) NOT NULL,
  `see_abs` varchar(5) NOT NULL,
  `pract_abs` varchar(5) NOT NULL,
  `internal` int(11) NOT NULL,
  `theory` int(11) NOT NULL,
  `practicle` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gen_symbol` varchar(11) NOT NULL,
  `activity_symbol` varchar(30) NOT NULL,
  `gen_the_symbol` varchar(11) NOT NULL,
  `gen_the_pract_sym` varchar(11) NOT NULL,
  `pass_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ba_reval_marks_sem_3
-- ----------------------------

-- ----------------------------
-- Table structure for `ba_reval_marks_sem_4`
-- ----------------------------
DROP TABLE IF EXISTS `ba_reval_marks_sem_4`;
CREATE TABLE `ba_reval_marks_sem_4` (
  `sub_id` varchar(30) NOT NULL,
  `pr_number` int(11) NOT NULL,
  `isa_abs` varchar(5) NOT NULL,
  `see_abs` varchar(5) NOT NULL,
  `pract_abs` varchar(5) NOT NULL,
  `internal` int(11) NOT NULL,
  `theory` int(11) NOT NULL,
  `practicle` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gen_symbol` varchar(11) NOT NULL,
  `activity_symbol` varchar(30) NOT NULL,
  `gen_the_symbol` varchar(11) NOT NULL,
  `gen_the_pract_sym` varchar(11) NOT NULL,
  `pass_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ba_reval_marks_sem_4
-- ----------------------------

-- ----------------------------
-- Table structure for `ba_student_detail_sem_1`
-- ----------------------------
DROP TABLE IF EXISTS `ba_student_detail_sem_1`;
CREATE TABLE `ba_student_detail_sem_1` (
  `pr_number` int(11) NOT NULL,
  `seat_number` int(40) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `sports_category` varchar(10) NOT NULL,
  `sports_rewards` varchar(40) NOT NULL,
  `gen_grace_alloc` int(11) NOT NULL,
  `entitlement_grace_alloc` int(11) NOT NULL,
  `sports_grace_alloc` int(11) NOT NULL,
  `gen_grace_remain` int(11) NOT NULL,
  `entitlement_grace_remain` int(11) NOT NULL,
  `sports_grace_remain` int(11) NOT NULL,
  `subj_1` varchar(20) NOT NULL,
  `subj_2` varchar(20) NOT NULL,
  `subj_3` varchar(20) NOT NULL,
  `subj_4` varchar(20) NOT NULL,
  `subj_5` varchar(20) NOT NULL,
  `subj_6` varchar(20) NOT NULL,
  `subj_7` varchar(20) NOT NULL,
  `subj_8` varchar(20) NOT NULL,
  `special_priority_tag` varchar(3) NOT NULL,
  `date` date NOT NULL,
  `block` tinyint(1) NOT NULL DEFAULT '0',
  `supplementary` tinyint(4) NOT NULL DEFAULT '1',
  `subj_details` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`pr_number`,`supplementary`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ba_student_detail_sem_1
-- ----------------------------
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717401', '17401', 'Badiger Anshwi Siddhu', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '6', '22', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"22\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717402', '17402', 'Chavariya Manaswini Rajesh', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '6', '19', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"19\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717403', '17403', 'Colaco Juvency Verrilsa ', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '6', '21', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"21\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717404', '17404', 'Dhopeshwarkar Anish Ajay', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '6', '24', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"24\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717406', '17406', 'KerkarSurabhi Vasudev', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '6', '23', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"23\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717407', '17407', 'Mule Purva Ganesh', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '6', '23', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"23\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717408', '17408', 'Naik Vandita Shailesh', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '6', '22', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"22\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717409', '17409', 'Singh Diksha Parvinder ', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '6', '19', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"19\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717410', '17410', 'Signapurkar Sarvesh Sadu', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '6', '16', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"16\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717411', '17411', 'Sudarsan Hridya ', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '6', '19', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"19\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717412', '17412', 'Surlakar Saloni Santosh ', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '6', '21', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"21\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717413', '17413', 'Themathuk Longleng', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '6', '24', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"24\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717414', '17414', 'Abdul Qader', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '6', '24', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"24\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717415', '17415', 'Hamid Akbar', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '6', '24', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"24\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717416', '17416', 'Rohin', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '6', '24', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"24\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717417', '17417', 'Haseebullah', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '6', '24', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"24\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717418', '17418', 'Abdul Hakim', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '6', '24', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"24\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717419', '17419', 'Abdul Rauf Shah', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '6', '24', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"24\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717421', '17421', 'Abobaker', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '6', '24', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"24\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717426', '17426', 'Fernandes Jason', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '5', '24', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"5\":\"DSC\",\"24\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717427', '17427', 'Kundaikar Tosheeta Manguesh', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '5', '20', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"5\":\"DSC\",\"20\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717428', '17428', 'Jambavalikar Atharv Pradip', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '5', '24', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"5\":\"DSC\",\"24\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717430', '17430', 'Narvekar Manisha Subhash', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '5', '16', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"5\":\"DSC\",\"16\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717431', '17431', 'Narvekar Sanam Jeetendra', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '5', '18', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"5\":\"DSC\",\"18\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717432', '17432', 'Nawar Minu Shaheen R', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '5', '20', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"5\":\"DSC\",\"20\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717433', '17433', 'Pandit Anjali Kumari', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '5', '16', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"5\":\"DSC\",\"16\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717434', '17434', 'Ranade Pratik Prakash', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '5', '16', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"5\":\"DSC\",\"16\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717435', '17435', 'Rehmanawar Simran Hanif', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '5', '18', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"5\":\"DSC\",\"18\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717436', '17436', 'Shet Gaonkar Prachita Prasad', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '5', '24', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"5\":\"DSC\",\"24\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717441', '17441', 'Balli Rima', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '8', '23', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"23\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717442', '17442', 'Chari Gaurav Kamlesh ', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '8', '24', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"24\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717443', '17443', 'Desai Varada Rajesh ', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '8', '16', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"16\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717444', '17444', 'Dhuri Prajyot Ravindra', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '8', '24', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"24\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717446', '17446', 'Kavlekar Sandesh Nanu', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '8', '21', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"21\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717447', '17447', 'Kulam Supriya Prabhakar', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '8', '21', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"21\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717448', '17448', 'Mandrekar Anisha Nilesh', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '8', '20', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"20\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717449', '17449', 'Malvankar Yogini Dharma', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '8', '16', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"16\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717451', '17451', 'Rathod Shashikala Malesh ', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '8', '23', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"23\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717452', '17452', 'Tandel Shradha Haresh', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '8', '18', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"18\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717453', '17453', 'Desai Karishma Mohan', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '8', '23', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"23\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717461', '17461', 'Arabekar Gayatri Divakar', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '4', '7', '23', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"23\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717462', '17462', 'Cardozo Rodney', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '4', '7', '24', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"24\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717463', '17463', 'Diukar Priti Narayan', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '4', '7', '23', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"23\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717464', '17464', 'D’Souza Dorries Ana', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '4', '7', '16', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"16\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717466', '17466', 'Navelkar Prajay Datta', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '4', '7', '20', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"20\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717467', '17467', 'Pednekar Komal Kishor', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '4', '7', '23', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"23\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717468', '17468', 'Patekar Suryakant', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '4', '7', '24', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"24\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717469', '17469', 'Kundaikar Ayesha Ganpat', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '4', '7', '19', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"19\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717481', '17481', 'Banavalikar Akash Damodar ', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '4', '9', '22', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"4\":\"DSC\",\"9\":\"DSC\",\"22\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717482', '17482', 'Fadte Siya Gajanan', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '4', '9', '19', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"4\":\"DSC\",\"9\":\"DSC\",\"19\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717483', '17483', 'Govekar Navita Kundan ', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '4', '9', '19', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"4\":\"DSC\",\"9\":\"DSC\",\"19\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717484', '17484', 'Kerekar Dimple Dnyaneshwar', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '4', '9', '19', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"4\":\"DSC\",\"9\":\"DSC\",\"19\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717485', '17485', 'Kumari Chandani', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '4', '9', '17', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"4\":\"DSC\",\"9\":\"DSC\",\"17\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717486', '17486', 'Mandaki Sanam', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '4', '9', '20', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"4\":\"DSC\",\"9\":\"DSC\",\"20\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717487', '17487', 'Mulla Ashia Shakir', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '4', '9', '19', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"4\":\"DSC\",\"9\":\"DSC\",\"19\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717488', '17488', 'Pujari Sujata Chandrasha ', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '4', '9', '20', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"4\":\"DSC\",\"9\":\"DSC\",\"20\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717489', '17489', 'Redkar Ashvitha Ranganath', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '4', '9', '16', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"4\":\"DSC\",\"9\":\"DSC\",\"16\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717490', '17490', 'Reddy Reshma Vijay ', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '4', '9', '20', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"4\":\"DSC\",\"9\":\"DSC\",\"20\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717491', '17491', 'Sawant Sanjana Dayanand ', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '4', '9', '22', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"4\":\"DSC\",\"9\":\"DSC\",\"22\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717492', '17492', 'Thakur Krupa Krishna', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '4', '9', '17', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"4\":\"DSC\",\"9\":\"DSC\",\"17\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717493', '17493', 'Gaonkar Chandan Chandrakant', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '4', '9', '22', '10', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"4\":\"DSC\",\"9\":\"DSC\",\"22\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717501', '17501', 'Almeida Claniffa Emmanuela', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '3', '7', '19', '11', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"7\":\"DSC\",\"19\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717502', '17502', 'Baretto Prisella', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '3', '7', '18', '14', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"7\":\"DSC\",\"18\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717503', '17503', 'Bhonsle Sanjog Maheshwar', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '3', '7', '18', '14', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"7\":\"DSC\",\"18\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717504', '17504', 'D’Souza Delia Maria Monica', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '3', '7', '18', '14', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"7\":\"DSC\",\"18\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717505', '17505', 'Faleiro Antonio Ronaldo', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '3', '7', '18', '14', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"7\":\"DSC\",\"18\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717506', '17506', 'Kudtarkar Sobita Shaba', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '3', '7', '19', '14', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"7\":\"DSC\",\"19\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717509', '17509', 'Pires Joel Agnelo', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '3', '7', '15', '11', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"7\":\"DSC\",\"15\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717510', '17510', 'Rivankar Vidhya Alias Shevanti Vinayak', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '3', '7', '22', '14', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"7\":\"DSC\",\"22\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717511', '17511', 'Thoralipaty Vidhi Venkataraman', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '3', '7', '18', '14', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"7\":\"DSC\",\"18\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717513', '17513', 'Ankita Nitish Kavlekar', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '3', '7', '23', '14', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"7\":\"DSC\",\"23\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717514', '17514', 'Praveen Kumar Gaunder', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '3', '7', '15', '14', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"7\":\"DSC\",\"15\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717521', '17521', 'Bidi Saherabanu Babusahab', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '3', '9', '15', '13', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"9\":\"DSC\",\"15\":\"GE\",\"13\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717522', '17522', 'Chodankar Kapila Alias Neha Suresh', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '3', '9', '19', '12', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"9\":\"DSC\",\"19\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717523', '17523', 'Gaonkar Jayditya Anand  ', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '3', '9', '18', '11', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"9\":\"DSC\",\"18\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717524', '17524', 'Gupta Dharam Raj Naval', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '3', '9', '18', '12', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"9\":\"DSC\",\"18\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717525', '17525', 'Naik Harshada Dilip', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '3', '9', '20', '12', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"9\":\"DSC\",\"20\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717526', '17526', 'Naik Sagar Gopinath ', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '3', '9', '20', '12', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"9\":\"DSC\",\"20\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717527', '17527', 'Naik Snehal Shamno ', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '3', '9', '22', '12', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"9\":\"DSC\",\"22\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717528', '17528', 'Narer Nandini Maruti', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '3', '9', '18', '12', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"9\":\"DSC\",\"18\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717529', '17529', 'Sawant Akash Ajit ', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '3', '9', '20', '12', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"9\":\"DSC\",\"20\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717530', '17530', 'Sawant Abhilesh Vasudev ', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '3', '9', '22', '13', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"9\":\"DSC\",\"22\":\"GE\",\"13\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717532', '17532', 'Rodrigues Emie', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '3', '9', '18', '11', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"9\":\"DSC\",\"18\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717541', '17541', 'Dhulapkar Shaina Purushottam', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '6', '21', '12', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"21\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717542', '17542', 'Gonsalves Aldridge Darren', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '6', '24', '11', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"24\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717543', '17543', 'Kankonkar Pravin Bhanudas ', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '6', '17', '14', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"17\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717544', '17544', 'Kamble Rajnandini Ashok', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '6', '23', '11', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"23\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717545', '17545', 'Lotlikar Sneha Ashish', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '6', '17', '12', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"17\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717546', '17546', 'Monteiro Joyella Ana', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '6', '21', '11', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"21\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717547', '17547', 'Mokhashi Taskin Banu', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '6', '17', '12', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"17\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717549', '17549', 'Naik Manjunath Nagraj ', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '6', '15', '12', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717550', '17550', 'Patil Yeshwant Ram', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '6', '17', '12', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"17\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717551', '17551', 'Pereira Jovi Ansly ', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '6', '15', '11', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"15\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717552', '17552', 'Sehrawat Ankit Arun Kumar', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '6', '15', '11', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"15\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717553', '17553', 'Sairaj  Satyawan Kinalker ', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '6', '24', '14', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"24\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717561', '17561', 'Bhangle Akshay Mohandas', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '8', '17', '13', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"8\":\"DSC\",\"17\":\"GE\",\"13\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717562', '17562', 'Bhonsle Aparna Manguesh', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '8', '17', '12', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"8\":\"DSC\",\"17\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717564', '17564', 'Ghadi Sonali Dilip', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '8', '23', '13', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"8\":\"DSC\",\"23\":\"GE\",\"13\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717565', '17565', 'Halankar Gayatri Jaiprakash', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '8', '17', '13', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"8\":\"DSC\",\"17\":\"GE\",\"13\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717566', '17566', 'Halankar Leenali Mahadev', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '8', '23', '13', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"8\":\"DSC\",\"23\":\"GE\",\"13\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717567', '17567', 'Kunkalkar Priyanka Vinayak ', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '8', '15', '13', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"8\":\"DSC\",\"15\":\"GE\",\"13\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717568', '17568', 'Kunkalekar Sushmita Ganesh', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '8', '17', '13', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"8\":\"DSC\",\"17\":\"GE\",\"13\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717569', '17569', 'Redkar Devika Dhanyavan', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '8', '20', '12', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"8\":\"DSC\",\"20\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717570', '17570', 'Sawant Saharsha Sandeep', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '8', '17', '13', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"8\":\"DSC\",\"17\":\"GE\",\"13\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717571', '17571', 'Taypi Mahadevi Basappa ', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '8', '17', '13', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"8\":\"DSC\",\"17\":\"GE\",\"13\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717572', '17572', 'Rupal Rajan Sawant', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '8', '21', '13', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"8\":\"DSC\",\"21\":\"GE\",\"13\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717581', '17581', 'Antao Andria Ruby', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '5', '15', '11', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"5\":\"DSC\",\"15\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717582', '17582', 'Chari Shraddha Subhash', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '5', '15', '14', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"5\":\"DSC\",\"15\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717584', '17584', 'Fernandes Aaron Francis', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '5', '21', '11', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"5\":\"DSC\",\"21\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717585', '17585', 'Fernandes Senova Perpetual', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '5', '21', '11', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"5\":\"DSC\",\"21\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717586', '17586', 'Govekar Natasha Kundan ', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '5', '15', '11', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"5\":\"DSC\",\"15\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717587', '17587', 'Mishra Pornima Rajeshkumar', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '5', '23', '12', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"5\":\"DSC\",\"23\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717588', '17588', 'Ribeiro Murushca Meher Elsa', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '5', '17', '11', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"5\":\"DSC\",\"17\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717589', '17589', 'Rodrigues Renny Latika', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '5', '21', '11', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"5\":\"DSC\",\"21\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717591', '17591', 'Sawant Shriya Vishwanath', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '5', '23', '12', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"5\":\"DSC\",\"23\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717593', '17593', 'V M Athulya', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '5', '24', '11', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"5\":\"DSC\",\"24\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717602', '17602', 'Coutinho Tefla', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '6', '16', '14', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"16\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717603', '17603', 'D’Cruz Vanessa Angie Eliza ', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '6', '21', '14', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"21\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717605', '17605', 'Gokarn Nivedita Jitendra', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '6', '16', '11', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"16\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717607', '17607', 'Paswan Manisha Kumari Krishna ', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '6', '19', '11', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"19\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717608', '17608', 'Parwar Vignesha Kashinath ', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '6', '22', '13', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"22\":\"GE\",\"13\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717609', '17609', 'Shaikh Aasfa Abdul Wahab', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '6', '16', '14', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"16\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717610', '17610', 'Shaikh Gulubsha Mehabubsab', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '6', '18', '12', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"18\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717611', '17611', 'Shaikh Reehan Kausar', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '6', '23', '12', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"23\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717618', '17618', 'Kandolkar Abhishek Babli', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '8', '24', '13', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"24\":\"GE\",\"13\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717619', '17619', 'Kautankar Ganga Krishnanath', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '8', '16', '13', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"16\":\"GE\",\"13\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717620', '17620', 'Kalapurkar Vidhya Govind', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '8', '20', '13', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"20\":\"GE\",\"13\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717621', '17621', 'Khandeparkar Mahadev Pundalik', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '8', '16', '12', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"16\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717622', '17622', 'Madgi Pooja Mahadev', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '8', '20', '12', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"20\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717623', '17623', 'Mandrekar Shubham Sadanand', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '3', '8', '16', '12', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"16\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717631', '17631', 'Volvoikar Deven Devanand', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '4', '7', '24', '14', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"24\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717632', '17632', 'Arleshwar Pallavi Bhasawraj', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '4', '7', '16', '12', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"16\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717633', '17633', 'Kundaikar Aniket Anant', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '1', '4', '7', '23', '14', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"23\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717636', '17636', 'Cardozo Alicia Maria', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '3', '7', '23', '14', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"7\":\"DSC\",\"23\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717637', '17637', 'Cardozo Juliana Violant', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '3', '7', '19', '14', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"7\":\"DSC\",\"19\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717639', '17639', 'Gaonkar Mamata Kamlakant', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '3', '7', '18', '14', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"7\":\"DSC\",\"18\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717640', '17640', 'Gaude Rajesh Yeshwant', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '3', '7', '20', '14', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"7\":\"DSC\",\"20\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717641', '17641', 'Halarneker Ketan Gurudas', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '3', '7', '20', '14', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"7\":\"DSC\",\"20\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717642', '17642', 'Hosmani Sainath  Maruti', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '3', '7', '18', '14', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"7\":\"DSC\",\"18\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717643', '17643', 'Jambhale Siddhant Dattatray', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '3', '7', '22', '11', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"7\":\"DSC\",\"22\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717644', '17644', 'Kankonkar Prachi Devendra', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '3', '7', '22', '13', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"7\":\"DSC\",\"22\":\"GE\",\"13\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717645', '17645', 'Naik Kavita Krishna', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '3', '7', '20', '14', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"7\":\"DSC\",\"20\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717657', '17657', 'Khan Afrin', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '3', '9', '18', '12', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"9\":\"DSC\",\"18\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717658', '17658', 'Goundi Shaikh Afridi Abbasali', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '3', '9', '21', '12', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"9\":\"DSC\",\"21\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717660', '17660', 'Shaikh Rahiza', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '3', '9', '18', '12', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"9\":\"DSC\",\"18\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717661', '17661', 'Virnodkar Sandila Sagun', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '3', '9', '22', '13', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"9\":\"DSC\",\"22\":\"GE\",\"13\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717664', '17664', 'Raul Tanvi Amarnath', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '3', '9', '18', '12', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"9\":\"DSC\",\"18\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717667', '17667', 'Davangiri Khushnuda Abdul Rahman', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '6', '23', '12', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"23\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717668', '17668', 'Fernandes Gail Jesusa', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '6', '15', '11', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"15\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717669', '17669', 'Gad Ashutosh Arjun', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '6', '22', '13', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"22\":\"GE\",\"13\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717670', '17670', 'Hosamani Manjunath Ningappa', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '6', '22', '13', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"22\":\"GE\",\"13\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717671', '17671', 'Kamble Shubham Shivaji', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '6', '22', '13', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"22\":\"GE\",\"13\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717672', '17672', 'Mulgaonkar Umesh Damodar', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '6', '21', '14', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"21\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717673', '17673', 'Naik Pratiksha Pandurang', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '6', '22', '13', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"22\":\"GE\",\"13\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717674', '17674', 'Sahil Laxman Fadte', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '6', '22', '13', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"22\":\"GE\",\"13\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717676', '17676', 'Shaikh Ruksaar Vahid', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '6', '15', '11', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"15\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717677', '17677', 'Kumar Amit', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '6', '23', '12', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"23\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717678', '17678', 'Chhhoi Hyonghwan ', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '6', '15', '11', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"15\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717681', '17681', 'Ashly Praveen', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '5', '17', '11', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"5\":\"DSC\",\"17\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717682', '17682', 'Butaney Jazia Shania Sandeep', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '5', '24', '11', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"5\":\"DSC\",\"24\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717683', '17683', 'Goswami Nikita V', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '5', '23', '12', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"5\":\"DSC\",\"23\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717684', '17684', 'De Araujo Lindsey Lourdes', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '5', '20', '11', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"5\":\"DSC\",\"20\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717685', '17685', 'Kamu Neha Maruti', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '5', '23', '12', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"5\":\"DSC\",\"23\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717687', '17687', 'Multani Diksha Ghansham ', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '5', '20', '12', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"5\":\"DSC\",\"20\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717688', '17688', 'Naik Sahil Umesh', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '5', '21', '14', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"5\":\"DSC\",\"21\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717689', '17689', 'Neeraj Sureshkumar', 'M', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '5', '21', '12', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"5\":\"DSC\",\"21\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717690', '17690', 'Seniz Angela Rego', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '5', '23', '11', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"5\":\"DSC\",\"23\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717691', '17691', 'Kamath Niharika Kiran', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '5', '15', '11', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"5\":\"DSC\",\"15\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717692', '17692', 'Shetye Akshaya Ranjeet', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '5', '22', '14', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"5\":\"DSC\",\"22\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717693', '17693', 'Sharma Khushboo Vinod', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '5', '23', '12', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"5\":\"DSC\",\"23\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `ba_student_detail_sem_1` VALUES ('201717694', '17694', 'Saxena Sahili Shailendra', 'F', '', '', '13', '0', '0', '13', '0', '0', '25', '2', '4', '5', '23', '12', '', '', '', '0000-00-00', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"5\":\"DSC\",\"23\":\"GE\",\"12\":\"AECC\"}');

-- ----------------------------
-- Table structure for `ba_student_detail_sem_2`
-- ----------------------------
DROP TABLE IF EXISTS `ba_student_detail_sem_2`;
CREATE TABLE `ba_student_detail_sem_2` (
  `subj_details` varchar(100) DEFAULT NULL,
  `pr_number` int(11) NOT NULL,
  `seat_number` int(40) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `sports_category` varchar(10) NOT NULL,
  `sports_rewards` varchar(40) NOT NULL,
  `gen_grace_alloc` int(11) NOT NULL,
  `entitlement_grace_alloc` int(11) NOT NULL,
  `sports_grace_alloc` int(11) NOT NULL,
  `gen_grace_remain` int(11) NOT NULL,
  `entitlement_grace_remain` int(11) NOT NULL,
  `sports_grace_remain` int(11) NOT NULL,
  `subj_1` varchar(20) NOT NULL,
  `subj_2` varchar(20) NOT NULL,
  `subj_3` varchar(20) NOT NULL,
  `subj_4` varchar(20) NOT NULL,
  `subj_5` varchar(20) NOT NULL,
  `subj_6` varchar(20) NOT NULL,
  `subj_7` varchar(20) NOT NULL,
  `subj_8` varchar(20) NOT NULL,
  `special_priority_tag` varchar(3) NOT NULL,
  `date` date NOT NULL,
  `block` tinyint(1) NOT NULL DEFAULT '0',
  `supplementary` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pr_number`,`supplementary`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ba_student_detail_sem_2
-- ----------------------------

-- ----------------------------
-- Table structure for `ba_student_detail_sem_3`
-- ----------------------------
DROP TABLE IF EXISTS `ba_student_detail_sem_3`;
CREATE TABLE `ba_student_detail_sem_3` (
  `subj_details` varchar(100) DEFAULT NULL,
  `pr_number` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `sports_category` varchar(10) NOT NULL,
  `sports_rewards` varchar(40) NOT NULL,
  `gen_grace_alloc` int(11) NOT NULL,
  `entitlement_grace_alloc` int(11) NOT NULL,
  `sports_grace_alloc` int(11) NOT NULL,
  `gen_grace_remain` int(11) NOT NULL,
  `entitlement_grace_remain` int(11) NOT NULL,
  `sports_grace_remain` int(11) NOT NULL,
  `subj_1` varchar(20) NOT NULL,
  `subj_2` varchar(20) NOT NULL,
  `subj_3` varchar(20) NOT NULL,
  `subj_4` varchar(20) NOT NULL,
  `subj_5` varchar(20) NOT NULL,
  `subj_6` varchar(20) NOT NULL,
  `subj_7` varchar(11) NOT NULL,
  `subj_8` varchar(11) NOT NULL,
  `date` date NOT NULL,
  `seat_number` int(40) NOT NULL,
  `special_priority_tag` varchar(3) NOT NULL,
  `block` tinyint(1) NOT NULL DEFAULT '0',
  `supplementary` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`pr_number`,`supplementary`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ba_student_detail_sem_3
-- ----------------------------

-- ----------------------------
-- Table structure for `ba_student_detail_sem_4`
-- ----------------------------
DROP TABLE IF EXISTS `ba_student_detail_sem_4`;
CREATE TABLE `ba_student_detail_sem_4` (
  `subj_details` varchar(100) DEFAULT NULL,
  `pr_number` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `sports_category` varchar(10) NOT NULL,
  `sports_rewards` varchar(40) NOT NULL,
  `gen_grace_alloc` int(11) NOT NULL,
  `entitlement_grace_alloc` int(11) NOT NULL DEFAULT '0',
  `sports_grace_alloc` int(11) NOT NULL DEFAULT '0',
  `gen_grace_remain` int(11) NOT NULL DEFAULT '0',
  `entitlement_grace_remain` int(11) NOT NULL DEFAULT '0',
  `sports_grace_remain` int(11) NOT NULL DEFAULT '0',
  `subj_1` varchar(20) NOT NULL,
  `subj_2` varchar(20) NOT NULL,
  `subj_3` varchar(20) NOT NULL,
  `subj_4` varchar(20) NOT NULL,
  `subj_5` varchar(20) NOT NULL,
  `subj_6` varchar(20) NOT NULL,
  `subj_7` varchar(11) NOT NULL,
  `subj_8` varchar(11) NOT NULL DEFAULT '',
  `date` varchar(11) NOT NULL DEFAULT '',
  `seat_number` int(40) NOT NULL,
  `special_priority_tag` varchar(3) NOT NULL DEFAULT '',
  `block` tinyint(1) NOT NULL DEFAULT '0',
  `supplementary` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pr_number`,`supplementary`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ba_student_detail_sem_4
-- ----------------------------

-- ----------------------------
-- Table structure for `ba_student_marks_sem_1`
-- ----------------------------
DROP TABLE IF EXISTS `ba_student_marks_sem_1`;
CREATE TABLE `ba_student_marks_sem_1` (
  `sub_id` varchar(30) NOT NULL,
  `pr_number` int(11) NOT NULL,
  `isa_abs` varchar(5) NOT NULL,
  `see_abs` varchar(5) NOT NULL,
  `pract_abs` varchar(5) NOT NULL,
  `internal` int(11) NOT NULL,
  `theory` int(11) NOT NULL,
  `practicle` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gen_symbol` varchar(11) NOT NULL,
  `activity_symbol` varchar(30) NOT NULL,
  `gen_the_symbol` varchar(11) NOT NULL,
  `gen_the_pract_sym` varchar(11) NOT NULL,
  `pass_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ba_student_marks_sem_1
-- ----------------------------

-- ----------------------------
-- Table structure for `ba_student_marks_sem_2`
-- ----------------------------
DROP TABLE IF EXISTS `ba_student_marks_sem_2`;
CREATE TABLE `ba_student_marks_sem_2` (
  `sub_id` varchar(30) NOT NULL,
  `pr_number` int(11) NOT NULL,
  `isa_abs` varchar(5) NOT NULL,
  `see_abs` varchar(5) NOT NULL,
  `pract_abs` varchar(5) NOT NULL,
  `internal` int(11) NOT NULL,
  `theory` int(11) NOT NULL,
  `practicle` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gen_symbol` varchar(11) NOT NULL,
  `activity_symbol` varchar(30) NOT NULL,
  `gen_the_symbol` varchar(11) NOT NULL,
  `gen_the_pract_sym` varchar(11) NOT NULL,
  `pass_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ba_student_marks_sem_2
-- ----------------------------

-- ----------------------------
-- Table structure for `ba_student_marks_sem_3`
-- ----------------------------
DROP TABLE IF EXISTS `ba_student_marks_sem_3`;
CREATE TABLE `ba_student_marks_sem_3` (
  `sub_id` varchar(30) NOT NULL,
  `pr_number` int(11) NOT NULL,
  `isa_abs` varchar(5) NOT NULL,
  `see_abs` varchar(5) NOT NULL,
  `pract_abs` varchar(5) NOT NULL,
  `internal` int(11) NOT NULL,
  `theory` int(11) NOT NULL,
  `practicle` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gen_symbol` varchar(11) NOT NULL,
  `activity_symbol` varchar(30) NOT NULL,
  `gen_the_symbol` varchar(11) NOT NULL,
  `gen_the_pract_sym` varchar(11) NOT NULL,
  `pass_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ba_student_marks_sem_3
-- ----------------------------

-- ----------------------------
-- Table structure for `ba_student_marks_sem_4`
-- ----------------------------
DROP TABLE IF EXISTS `ba_student_marks_sem_4`;
CREATE TABLE `ba_student_marks_sem_4` (
  `sub_id` varchar(30) NOT NULL,
  `pr_number` int(11) NOT NULL,
  `isa_abs` varchar(5) NOT NULL,
  `see_abs` varchar(5) NOT NULL,
  `pract_abs` varchar(5) NOT NULL,
  `internal` int(11) NOT NULL,
  `theory` int(11) NOT NULL,
  `practicle` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gen_symbol` varchar(11) NOT NULL,
  `activity_symbol` varchar(30) NOT NULL,
  `gen_the_symbol` varchar(11) NOT NULL,
  `gen_the_pract_sym` varchar(11) NOT NULL,
  `pass_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ba_student_marks_sem_4
-- ----------------------------

-- ----------------------------
-- Table structure for `ba_sub_sem_1`
-- ----------------------------
DROP TABLE IF EXISTS `ba_sub_sem_1`;
CREATE TABLE `ba_sub_sem_1` (
  `sub_id` varchar(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `sub_name` varchar(30) NOT NULL,
  `sub_name_display` varchar(50) NOT NULL,
  `internal_marks` int(11) NOT NULL,
  `semester_marks` int(11) NOT NULL,
  `practical_marks` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `minimum_theory` int(11) NOT NULL,
  `min_practical` int(11) NOT NULL,
  `max_agg_marks` int(11) NOT NULL DEFAULT '750',
  `paper_type` varchar(30) NOT NULL,
  `subject_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ba_sub_sem_1
-- ----------------------------
INSERT INTO `ba_sub_sem_1` VALUES ('1', '1', 'DSC Economics', 'DSC Economics', '20', '80', '-1', '100', '40', '0', '650', '1', 'DSC');
INSERT INTO `ba_sub_sem_1` VALUES ('2', '1', 'DSC English', 'DSC English', '20', '80', '-1', '100', '40', '0', '650', '1', 'DSC');
INSERT INTO `ba_sub_sem_1` VALUES ('3', '1', 'DSC History', 'DSC History', '20', '80', '-1', '100', '40', '0', '650', '1', 'DSC');
INSERT INTO `ba_sub_sem_1` VALUES ('4', '1', 'DSC Philosophy', 'DSC Philosophy', '20', '80', '-1', '100', '40', '0', '650', '1', 'DSC');
INSERT INTO `ba_sub_sem_1` VALUES ('5', '1', 'DSC Psychology', 'DSC Psychology', '15', '60', '25', '100', '40', '10', '650', '1', 'DSC');
INSERT INTO `ba_sub_sem_1` VALUES ('6', '1', 'DSC Political Science', 'DSC Political Science', '20', '80', '-1', '100', '40', '0', '650', '1', 'DSC');
INSERT INTO `ba_sub_sem_1` VALUES ('7', '1', 'DSC Konkani', 'DSC Konkani', '20', '80', '-1', '100', '40', '0', '650', '1', 'DSC');
INSERT INTO `ba_sub_sem_1` VALUES ('8', '1', 'DSC Marathi', 'DSC Marathi', '20', '80', '-1', '100', '40', '0', '650', '1', 'DSC');
INSERT INTO `ba_sub_sem_1` VALUES ('9', '1', 'DSC Hindi', 'DSC Hindi', '20', '80', '-1', '100', '40', '0', '650', '1', 'DSC');
INSERT INTO `ba_sub_sem_1` VALUES ('10', '1', 'AECC Env. Edu.', 'AECC Env. Edu.', '20', '80', '-1', '100', '40', '0', '650', '2', 'AECC');
INSERT INTO `ba_sub_sem_1` VALUES ('11', '1', 'AECC English', 'AECC English', '20', '80', '-1', '100', '40', '0', '650', '2', 'AECC');
INSERT INTO `ba_sub_sem_1` VALUES ('12', '1', 'AECC Hindi', 'AECC Hindi', '20', '80', '-1', '100', '40', '0', '650', '2', 'AECC');
INSERT INTO `ba_sub_sem_1` VALUES ('13', '1', 'AECC Marathi', 'AECC Marathi', '15', '60', '25', '100', '40', '10', '650', '2', 'AECC');
INSERT INTO `ba_sub_sem_1` VALUES ('14', '1', 'AECC Konkani', 'AECC Konkani', '20', '80', '-1', '100', '40', '0', '650', '2', 'AECC');
INSERT INTO `ba_sub_sem_1` VALUES ('15', '1', 'GE Economics', 'GE Economics', '20', '80', '-1', '100', '40', '0', '650', '3', 'GE');
INSERT INTO `ba_sub_sem_1` VALUES ('16', '1', 'GE English', 'GE English', '20', '80', '-1', '100', '40', '0', '650', '3', 'GE');
INSERT INTO `ba_sub_sem_1` VALUES ('17', '1', 'GE History', 'GE History', '20', '80', '-1', '100', '40', '0', '650', '3', 'GE');
INSERT INTO `ba_sub_sem_1` VALUES ('18', '1', 'GE Philosophy', 'GE Philosophy', '20', '80', '-1', '100', '40', '0', '650', '3', 'GE');
INSERT INTO `ba_sub_sem_1` VALUES ('19', '1', 'GE Psychology', 'GE Psychology', '20', '80', '-1', '100', '40', '0', '650', '3', 'GE');
INSERT INTO `ba_sub_sem_1` VALUES ('20', '1', 'GE Political Science', 'GE Political Science', '20', '80', '-1', '100', '40', '0', '650', '3', 'GE');
INSERT INTO `ba_sub_sem_1` VALUES ('21', '1', 'GE Konkani', 'GE Konkani', '20', '80', '-1', '100', '40', '0', '650', '3', 'GE');
INSERT INTO `ba_sub_sem_1` VALUES ('22', '1', 'GE Marathi', 'GE Marathi', '20', '80', '-1', '100', '40', '0', '650', '3', 'GE');
INSERT INTO `ba_sub_sem_1` VALUES ('23', '1', 'GE Hindi', 'GE Hindi', '20', '80', '-1', '100', '40', '0', '650', '3', 'GE');
INSERT INTO `ba_sub_sem_1` VALUES ('24', '1', 'GE Computer Science', 'GE Computer Science', '15', '60', '25', '100', '40', '10', '650', '3', 'GE');
INSERT INTO `ba_sub_sem_1` VALUES ('25', '1', 'CC English', 'CC English', '30', '120', '-1', '150', '40', '0', '650', '4', 'CC');

-- ----------------------------
-- Table structure for `ba_sub_sem_2`
-- ----------------------------
DROP TABLE IF EXISTS `ba_sub_sem_2`;
CREATE TABLE `ba_sub_sem_2` (
  `subject_type` varchar(30) NOT NULL,
  `semester` int(11) NOT NULL,
  `sub_name` varchar(30) NOT NULL,
  `sub_name_display` varchar(50) NOT NULL,
  `internal_marks` int(11) NOT NULL,
  `semester_marks` int(11) NOT NULL,
  `practical_marks` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `minimum_theory` int(11) NOT NULL,
  `min_practical` int(11) NOT NULL,
  `max_agg_marks` int(11) NOT NULL DEFAULT '750',
  `paper_type` varchar(30) NOT NULL,
  `sub_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ba_sub_sem_2
-- ----------------------------

-- ----------------------------
-- Table structure for `ba_sub_sem_3`
-- ----------------------------
DROP TABLE IF EXISTS `ba_sub_sem_3`;
CREATE TABLE `ba_sub_sem_3` (
  `sub_id` varchar(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `sub_name` varchar(50) NOT NULL,
  `sub_name_display` varchar(100) NOT NULL,
  `internal_marks` int(11) NOT NULL,
  `semester_marks` int(11) NOT NULL,
  `practical_marks` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `minimum_theory` int(11) NOT NULL,
  `min_practical` int(11) NOT NULL,
  `max_agg_marks` int(11) NOT NULL DEFAULT '700',
  `paper_type` varchar(30) NOT NULL,
  `subject_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ba_sub_sem_3
-- ----------------------------

-- ----------------------------
-- Table structure for `ba_sub_sem_4`
-- ----------------------------
DROP TABLE IF EXISTS `ba_sub_sem_4`;
CREATE TABLE `ba_sub_sem_4` (
  `sub_id` varchar(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `sub_name` varchar(50) NOT NULL,
  `sub_name_display` varchar(100) NOT NULL,
  `internal_marks` int(11) NOT NULL,
  `semester_marks` int(11) NOT NULL,
  `practical_marks` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `minimum_theory` int(11) NOT NULL,
  `min_practical` int(11) NOT NULL,
  `max_agg_marks` int(11) NOT NULL DEFAULT '700',
  `paper_type` varchar(30) NOT NULL,
  `subject_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ba_sub_sem_4
-- ----------------------------

-- ----------------------------
-- Table structure for `ba_supple_marks_sem_1`
-- ----------------------------
DROP TABLE IF EXISTS `ba_supple_marks_sem_1`;
CREATE TABLE `ba_supple_marks_sem_1` (
  `sub_id` varchar(30) NOT NULL,
  `pr_number` int(11) NOT NULL,
  `supple_seat_number` int(11) NOT NULL DEFAULT '0',
  `no_of_attempts` int(11) NOT NULL DEFAULT '0',
  `isa_abs` varchar(5) NOT NULL,
  `see_abs` varchar(5) NOT NULL,
  `pract_abs` varchar(5) NOT NULL,
  `internal` int(11) NOT NULL,
  `theory` int(11) NOT NULL,
  `practicle` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gen_symbol` varchar(11) NOT NULL,
  `activity_symbol` varchar(30) NOT NULL,
  `gen_the_symbol` varchar(11) NOT NULL,
  `gen_the_pract_sym` varchar(11) NOT NULL,
  `gen_grace_remain` int(11) NOT NULL DEFAULT '0',
  `nss_grace_remain` int(11) NOT NULL DEFAULT '0',
  `sports_grace_remain` int(11) NOT NULL DEFAULT '0',
  `pass_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ba_supple_marks_sem_1
-- ----------------------------

-- ----------------------------
-- Table structure for `ba_supple_marks_sem_2`
-- ----------------------------
DROP TABLE IF EXISTS `ba_supple_marks_sem_2`;
CREATE TABLE `ba_supple_marks_sem_2` (
  `sub_id` varchar(30) NOT NULL,
  `pr_number` int(11) NOT NULL,
  `supple_seat_number` int(11) NOT NULL DEFAULT '0',
  `no_of_attempts` int(11) NOT NULL DEFAULT '0',
  `isa_abs` varchar(5) NOT NULL,
  `see_abs` varchar(5) NOT NULL,
  `pract_abs` varchar(5) NOT NULL,
  `internal` int(11) NOT NULL,
  `theory` int(11) NOT NULL,
  `practicle` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gen_symbol` varchar(11) NOT NULL,
  `activity_symbol` varchar(30) NOT NULL,
  `gen_the_symbol` varchar(11) NOT NULL,
  `gen_the_pract_sym` varchar(11) NOT NULL,
  `gen_grace_remain` int(11) NOT NULL DEFAULT '0',
  `nss_grace_remain` int(11) NOT NULL DEFAULT '0',
  `sports_grace_remain` int(11) NOT NULL DEFAULT '0',
  `pass_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ba_supple_marks_sem_2
-- ----------------------------

-- ----------------------------
-- Table structure for `ba_supple_marks_sem_3`
-- ----------------------------
DROP TABLE IF EXISTS `ba_supple_marks_sem_3`;
CREATE TABLE `ba_supple_marks_sem_3` (
  `sub_id` varchar(30) NOT NULL,
  `pr_number` int(11) NOT NULL,
  `supple_seat_number` int(11) NOT NULL DEFAULT '0',
  `no_of_attempts` int(11) NOT NULL DEFAULT '0',
  `isa_abs` varchar(5) NOT NULL,
  `see_abs` varchar(5) NOT NULL,
  `pract_abs` varchar(5) NOT NULL,
  `internal` int(11) NOT NULL,
  `theory` int(11) NOT NULL,
  `practicle` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gen_symbol` varchar(11) NOT NULL,
  `activity_symbol` varchar(30) NOT NULL,
  `gen_the_symbol` varchar(11) NOT NULL,
  `gen_the_pract_sym` varchar(11) NOT NULL,
  `gen_grace_remain` int(11) NOT NULL DEFAULT '0',
  `nss_grace_remain` int(11) NOT NULL DEFAULT '0',
  `sports_grace_remain` int(11) NOT NULL DEFAULT '0',
  `pass_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ba_supple_marks_sem_3
-- ----------------------------

-- ----------------------------
-- Table structure for `ba_supple_marks_sem_4`
-- ----------------------------
DROP TABLE IF EXISTS `ba_supple_marks_sem_4`;
CREATE TABLE `ba_supple_marks_sem_4` (
  `sub_id` varchar(30) NOT NULL,
  `pr_number` int(11) NOT NULL,
  `supple_seat_number` int(11) NOT NULL DEFAULT '0',
  `no_of_attempts` int(11) NOT NULL DEFAULT '0',
  `isa_abs` varchar(5) NOT NULL,
  `see_abs` varchar(5) NOT NULL,
  `pract_abs` varchar(5) NOT NULL,
  `internal` int(11) NOT NULL,
  `theory` int(11) NOT NULL,
  `practicle` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gen_symbol` varchar(11) NOT NULL,
  `activity_symbol` varchar(30) NOT NULL,
  `gen_the_symbol` varchar(11) NOT NULL,
  `gen_the_pract_sym` varchar(11) NOT NULL,
  `gen_grace_remain` int(11) NOT NULL DEFAULT '0',
  `nss_grace_remain` int(11) NOT NULL DEFAULT '0',
  `sports_grace_remain` int(11) NOT NULL DEFAULT '0',
  `pass_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ba_supple_marks_sem_4
-- ----------------------------

-- ----------------------------
-- Table structure for `bcom_reval_marks_sem_1`
-- ----------------------------
DROP TABLE IF EXISTS `bcom_reval_marks_sem_1`;
CREATE TABLE `bcom_reval_marks_sem_1` (
  `sub_id` varchar(30) NOT NULL,
  `pr_number` int(11) NOT NULL,
  `isa_abs` varchar(5) NOT NULL,
  `see_abs` varchar(5) NOT NULL,
  `pract_abs` varchar(5) NOT NULL,
  `internal` int(11) NOT NULL,
  `theory` int(11) NOT NULL,
  `practicle` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gen_symbol` varchar(11) NOT NULL,
  `activity_symbol` varchar(30) NOT NULL,
  `gen_the_symbol` varchar(11) NOT NULL,
  `gen_the_pract_sym` varchar(11) NOT NULL,
  `pass_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bcom_reval_marks_sem_1
-- ----------------------------

-- ----------------------------
-- Table structure for `bcom_reval_marks_sem_2`
-- ----------------------------
DROP TABLE IF EXISTS `bcom_reval_marks_sem_2`;
CREATE TABLE `bcom_reval_marks_sem_2` (
  `sub_id` varchar(30) NOT NULL,
  `pr_number` int(11) NOT NULL,
  `isa_abs` varchar(5) NOT NULL,
  `see_abs` varchar(5) NOT NULL,
  `pract_abs` varchar(5) NOT NULL,
  `internal` int(11) NOT NULL,
  `theory` int(11) NOT NULL,
  `practicle` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gen_symbol` varchar(11) NOT NULL,
  `activity_symbol` varchar(30) NOT NULL,
  `gen_the_symbol` varchar(11) NOT NULL,
  `gen_the_pract_sym` varchar(11) NOT NULL,
  `pass_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bcom_reval_marks_sem_2
-- ----------------------------

-- ----------------------------
-- Table structure for `bcom_reval_marks_sem_3`
-- ----------------------------
DROP TABLE IF EXISTS `bcom_reval_marks_sem_3`;
CREATE TABLE `bcom_reval_marks_sem_3` (
  `sub_id` varchar(30) NOT NULL,
  `pr_number` int(11) NOT NULL,
  `isa_abs` varchar(5) NOT NULL,
  `see_abs` varchar(5) NOT NULL,
  `pract_abs` varchar(5) NOT NULL,
  `internal` int(11) NOT NULL,
  `theory` int(11) NOT NULL,
  `practicle` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gen_symbol` varchar(11) NOT NULL,
  `activity_symbol` varchar(30) NOT NULL,
  `gen_the_symbol` varchar(11) NOT NULL,
  `gen_the_pract_sym` varchar(11) NOT NULL,
  `pass_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bcom_reval_marks_sem_3
-- ----------------------------

-- ----------------------------
-- Table structure for `bcom_reval_marks_sem_4`
-- ----------------------------
DROP TABLE IF EXISTS `bcom_reval_marks_sem_4`;
CREATE TABLE `bcom_reval_marks_sem_4` (
  `sub_id` varchar(30) NOT NULL,
  `pr_number` int(11) NOT NULL,
  `isa_abs` varchar(5) NOT NULL,
  `see_abs` varchar(5) NOT NULL,
  `pract_abs` varchar(5) NOT NULL,
  `internal` int(11) NOT NULL,
  `theory` int(11) NOT NULL,
  `practicle` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gen_symbol` varchar(11) NOT NULL,
  `activity_symbol` varchar(30) NOT NULL,
  `gen_the_symbol` varchar(11) NOT NULL,
  `gen_the_pract_sym` varchar(11) NOT NULL,
  `pass_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bcom_reval_marks_sem_4
-- ----------------------------

-- ----------------------------
-- Table structure for `bcom_student_detail_sem_1`
-- ----------------------------
DROP TABLE IF EXISTS `bcom_student_detail_sem_1`;
CREATE TABLE `bcom_student_detail_sem_1` (
  `subj_details` varchar(100) DEFAULT NULL,
  `pr_number` int(11) NOT NULL,
  `seat_number` int(20) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sports_category` varchar(10) NOT NULL,
  `sports_rewards` varchar(40) NOT NULL,
  `gen_grace_alloc` int(11) NOT NULL,
  `entitlement_grace_alloc` int(11) NOT NULL,
  `sports_grace_alloc` int(11) NOT NULL,
  `gen_grace_remain` int(11) NOT NULL,
  `entitlement_grace_remain` int(11) NOT NULL,
  `sports_grace_remain` int(11) NOT NULL,
  `subj_1` varchar(20) NOT NULL,
  `subj_2` varchar(20) NOT NULL,
  `subj_3` varchar(20) NOT NULL,
  `subj_4` varchar(20) NOT NULL,
  `subj_5` varchar(20) NOT NULL,
  `subj_6` varchar(20) NOT NULL,
  `subj_7` varchar(11) NOT NULL,
  `subj_8` varchar(11) NOT NULL,
  `date` date NOT NULL,
  `special_priority_tag` varchar(3) NOT NULL,
  `supplementary` int(11) DEFAULT '0',
  `block` int(11) DEFAULT '0',
  PRIMARY KEY (`pr_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bcom_student_detail_sem_1
-- ----------------------------

-- ----------------------------
-- Table structure for `bcom_student_detail_sem_2`
-- ----------------------------
DROP TABLE IF EXISTS `bcom_student_detail_sem_2`;
CREATE TABLE `bcom_student_detail_sem_2` (
  `subj_details` varchar(100) DEFAULT NULL,
  `pr_number` int(11) NOT NULL,
  `seat_number` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `sports_category` varchar(10) NOT NULL,
  `sports_rewards` varchar(40) NOT NULL,
  `gen_grace_alloc` int(11) NOT NULL,
  `entitlement_grace_alloc` int(11) NOT NULL,
  `sports_grace_alloc` int(11) NOT NULL,
  `gen_grace_remain` int(11) NOT NULL,
  `entitlement_grace_remain` int(11) NOT NULL,
  `sports_grace_remain` int(11) NOT NULL,
  `subj_1` varchar(20) NOT NULL,
  `subj_2` varchar(20) NOT NULL,
  `subj_3` varchar(20) NOT NULL,
  `subj_4` varchar(20) NOT NULL,
  `subj_5` varchar(20) NOT NULL,
  `subj_6` varchar(20) NOT NULL,
  `subj_7` varchar(11) NOT NULL,
  `subj_8` varchar(11) NOT NULL,
  `date` date NOT NULL,
  `special_priority_tag` varchar(3) NOT NULL,
  `supplementary` int(11) DEFAULT '0',
  `block` int(11) DEFAULT '0',
  PRIMARY KEY (`pr_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bcom_student_detail_sem_2
-- ----------------------------

-- ----------------------------
-- Table structure for `bcom_student_detail_sem_3`
-- ----------------------------
DROP TABLE IF EXISTS `bcom_student_detail_sem_3`;
CREATE TABLE `bcom_student_detail_sem_3` (
  `subj_details` varchar(100) DEFAULT NULL,
  `pr_number` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `sports_category` varchar(10) NOT NULL,
  `sports_rewards` varchar(40) NOT NULL,
  `gen_grace_alloc` int(11) NOT NULL,
  `entitlement_grace_alloc` int(11) NOT NULL,
  `sports_grace_alloc` int(11) NOT NULL,
  `gen_grace_remain` int(11) NOT NULL,
  `entitlement_grace_remain` int(11) NOT NULL,
  `sports_grace_remain` int(11) NOT NULL,
  `subj_1` varchar(20) NOT NULL,
  `subj_2` varchar(20) NOT NULL,
  `subj_3` varchar(20) NOT NULL,
  `subj_4` varchar(20) NOT NULL,
  `subj_5` varchar(20) NOT NULL,
  `subj_6` varchar(20) NOT NULL,
  `subj_7` varchar(11) NOT NULL,
  `subj_8` varchar(11) NOT NULL,
  `date` date NOT NULL,
  `seat_number` int(20) NOT NULL,
  `special_priority_tag` varchar(3) NOT NULL,
  `supplementary` int(11) DEFAULT '0',
  `block` int(11) DEFAULT '0',
  PRIMARY KEY (`pr_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bcom_student_detail_sem_3
-- ----------------------------

-- ----------------------------
-- Table structure for `bcom_student_detail_sem_4`
-- ----------------------------
DROP TABLE IF EXISTS `bcom_student_detail_sem_4`;
CREATE TABLE `bcom_student_detail_sem_4` (
  `pr_number` int(11) NOT NULL,
  `seat_number` int(10) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `sports_category` varchar(20) NOT NULL,
  `sports_rewards` varchar(40) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gen_grace_alloc` int(11) NOT NULL,
  `entitlement_grace_alloc` int(11) NOT NULL,
  `sports_grace_alloc` int(11) NOT NULL,
  `gen_grace_remain` int(11) NOT NULL,
  `entitlement_grace_remain` int(11) NOT NULL,
  `sports_grace_remain` int(11) NOT NULL,
  `subj_1` varchar(20) NOT NULL,
  `subj_2` varchar(20) NOT NULL,
  `subj_3` varchar(20) NOT NULL,
  `subj_4` varchar(20) NOT NULL,
  `subj_5` varchar(20) NOT NULL,
  `subj_6` varchar(20) NOT NULL,
  `subj_7` varchar(11) NOT NULL,
  `subj_8` varchar(11) NOT NULL,
  `date` date NOT NULL,
  `special_priority_tag` varchar(3) NOT NULL,
  `supplementary` int(11) DEFAULT '0',
  `block` int(11) DEFAULT '0',
  `subj_details` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`pr_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bcom_student_detail_sem_4
-- ----------------------------

-- ----------------------------
-- Table structure for `bcom_student_marks_sem_1`
-- ----------------------------
DROP TABLE IF EXISTS `bcom_student_marks_sem_1`;
CREATE TABLE `bcom_student_marks_sem_1` (
  `sub_id` varchar(30) NOT NULL,
  `pr_number` int(11) NOT NULL,
  `isa_abs` varchar(5) NOT NULL,
  `see_abs` varchar(5) NOT NULL,
  `pract_abs` varchar(5) NOT NULL,
  `internal` int(11) NOT NULL,
  `theory` int(11) NOT NULL,
  `practicle` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gen_symbol` varchar(11) NOT NULL,
  `activity_symbol` varchar(30) NOT NULL,
  `gen_the_symbol` varchar(11) NOT NULL,
  `gen_the_pract_sym` varchar(11) NOT NULL,
  `pass_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bcom_student_marks_sem_1
-- ----------------------------

-- ----------------------------
-- Table structure for `bcom_student_marks_sem_2`
-- ----------------------------
DROP TABLE IF EXISTS `bcom_student_marks_sem_2`;
CREATE TABLE `bcom_student_marks_sem_2` (
  `sub_id` varchar(30) NOT NULL,
  `pr_number` int(11) NOT NULL,
  `isa_abs` varchar(5) NOT NULL,
  `see_abs` varchar(5) NOT NULL,
  `pract_abs` varchar(5) NOT NULL,
  `internal` int(11) NOT NULL,
  `theory` int(11) NOT NULL,
  `practicle` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gen_symbol` varchar(11) NOT NULL,
  `activity_symbol` varchar(30) NOT NULL,
  `gen_the_symbol` varchar(11) NOT NULL,
  `gen_the_pract_sym` varchar(11) NOT NULL,
  `pass_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bcom_student_marks_sem_2
-- ----------------------------

-- ----------------------------
-- Table structure for `bcom_student_marks_sem_3`
-- ----------------------------
DROP TABLE IF EXISTS `bcom_student_marks_sem_3`;
CREATE TABLE `bcom_student_marks_sem_3` (
  `sub_id` varchar(30) NOT NULL,
  `pr_number` int(11) NOT NULL,
  `isa_abs` varchar(5) NOT NULL,
  `see_abs` varchar(5) NOT NULL,
  `pract_abs` varchar(5) NOT NULL,
  `internal` int(11) NOT NULL,
  `theory` int(11) NOT NULL,
  `practicle` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gen_symbol` varchar(11) NOT NULL,
  `activity_symbol` varchar(30) NOT NULL,
  `gen_the_symbol` varchar(11) NOT NULL,
  `gen_the_pract_sym` varchar(11) NOT NULL,
  `pass_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bcom_student_marks_sem_3
-- ----------------------------

-- ----------------------------
-- Table structure for `bcom_student_marks_sem_4`
-- ----------------------------
DROP TABLE IF EXISTS `bcom_student_marks_sem_4`;
CREATE TABLE `bcom_student_marks_sem_4` (
  `sub_id` varchar(30) NOT NULL,
  `pr_number` int(11) NOT NULL,
  `isa_abs` varchar(5) NOT NULL,
  `see_abs` varchar(5) NOT NULL,
  `pract_abs` varchar(5) NOT NULL,
  `internal` int(11) NOT NULL,
  `theory` int(11) NOT NULL,
  `practicle` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gen_symbol` varchar(11) NOT NULL,
  `activity_symbol` varchar(30) NOT NULL,
  `gen_the_symbol` varchar(11) NOT NULL,
  `gen_the_pract_sym` varchar(11) NOT NULL,
  `pass_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bcom_student_marks_sem_4
-- ----------------------------

-- ----------------------------
-- Table structure for `bcom_sub_sem_1`
-- ----------------------------
DROP TABLE IF EXISTS `bcom_sub_sem_1`;
CREATE TABLE `bcom_sub_sem_1` (
  `sub_id` varchar(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `sub_name` varchar(50) NOT NULL,
  `sub_name_display` varchar(100) NOT NULL,
  `internal_marks` int(11) NOT NULL,
  `semester_marks` int(11) NOT NULL,
  `practical_marks` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `minimum_theory` int(11) NOT NULL,
  `min_practical` int(11) NOT NULL,
  `max_agg_marks` int(11) NOT NULL DEFAULT '750',
  `paper_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bcom_sub_sem_1
-- ----------------------------
INSERT INTO `bcom_sub_sem_1` VALUES ('1A', '1', 'English', 'English', '20', '80', '-1', '100', '40', '0', '750', '1');
INSERT INTO `bcom_sub_sem_1` VALUES ('2A', '1', 'Principles of Management - I', 'Principles of Management - I', '20', '80', '-1', '100', '40', '0', '750', '2');
INSERT INTO `bcom_sub_sem_1` VALUES ('3A', '1', 'Managerial Economics', 'Managerial Economics', '20', '80', '-1', '100', '40', '0', '750', '3');
INSERT INTO `bcom_sub_sem_1` VALUES ('4A', '1', 'Mathematical Techniques', 'Mathematical Techniques', '20', '80', '-1', '100', '40', '0', '750', '4');
INSERT INTO `bcom_sub_sem_1` VALUES ('5A', '1', 'Financial Accounting', 'Financial Accounting', '20', '80', '-1', '100', '40', '0', '750', '5');
INSERT INTO `bcom_sub_sem_1` VALUES ('6A', '1', 'Information Technology', 'Information Technology', '20', '80', '-1', '100', '40', '0', '750', '6');
INSERT INTO `bcom_sub_sem_1` VALUES ('7A1', '1', 'Accounting I', 'Accounting I', '20', '80', '-1', '100', '40', '0', '750', '7');
INSERT INTO `bcom_sub_sem_1` VALUES ('7A2', '1', 'Marketing - I', 'Marketing - I', '20', '80', '-1', '100', '40', '0', '750', '7');
INSERT INTO `bcom_sub_sem_1` VALUES ('7A3', '1', 'Practical Banking -I', 'Practical Banking -I', '20', '80', '-1', '100', '40', '0', '750', '7');
INSERT INTO `bcom_sub_sem_1` VALUES ('7A4', '1', 'Cost Accounting -I', 'Cost Accounting -I', '20', '80', '-1', '100', '40', '0', '750', '7');
INSERT INTO `bcom_sub_sem_1` VALUES ('7A5', '1', 'Principles & Practice of Insurance', 'Principles & Practice of Insurance', '20', '80', '-1', '100', '40', '0', '750', '7');
INSERT INTO `bcom_sub_sem_1` VALUES ('8A', '1', 'Environmental Studies', 'Environmental Studies', '10', '40', '-1', '50', '20', '0', '750', '8');

-- ----------------------------
-- Table structure for `bcom_sub_sem_2`
-- ----------------------------
DROP TABLE IF EXISTS `bcom_sub_sem_2`;
CREATE TABLE `bcom_sub_sem_2` (
  `sub_id` varchar(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `sub_name` varchar(50) NOT NULL,
  `sub_name_display` varchar(100) NOT NULL,
  `internal_marks` int(11) NOT NULL,
  `semester_marks` int(11) NOT NULL,
  `practical_marks` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `minimum_theory` int(11) NOT NULL,
  `min_practical` int(11) NOT NULL,
  `max_agg_marks` int(11) NOT NULL DEFAULT '750',
  `paper_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bcom_sub_sem_2
-- ----------------------------
INSERT INTO `bcom_sub_sem_2` VALUES ('1A', '2', 'English', 'English', '20', '80', '-1', '100', '40', '0', '750', '1');
INSERT INTO `bcom_sub_sem_2` VALUES ('2A', '2', 'Principles of Management - II', 'Principles of Management - II', '20', '80', '-1', '100', '40', '0', '750', '2');
INSERT INTO `bcom_sub_sem_2` VALUES ('3A', '2', 'Managerial Economics', 'Managerial Economics', '20', '80', '-1', '100', '40', '0', '750', '3');
INSERT INTO `bcom_sub_sem_2` VALUES ('4A', '2', 'Mathematical Techniques', 'Mathematical Techniques', '20', '80', '-1', '100', '40', '0', '750', '4');
INSERT INTO `bcom_sub_sem_2` VALUES ('5A', '2', 'Financial Accounting - II', 'Financial Accounting - II', '20', '80', '-1', '100', '40', '0', '750', '5');
INSERT INTO `bcom_sub_sem_2` VALUES ('6A', '2', 'Information Technology', 'Information Technology', '20', '80', '-1', '100', '40', '0', '750', '6');
INSERT INTO `bcom_sub_sem_2` VALUES ('7A1', '2', 'Accounting - II', 'Accounting - II', '20', '80', '-1', '100', '40', '0', '750', '7');
INSERT INTO `bcom_sub_sem_2` VALUES ('7A2', '2', 'Marketing - II', 'Marketing - II', '20', '80', '-1', '100', '40', '0', '750', '7');
INSERT INTO `bcom_sub_sem_2` VALUES ('7A3', '2', 'Practical Banking - II', 'Practical Banking - II', '20', '80', '-1', '100', '40', '0', '750', '7');
INSERT INTO `bcom_sub_sem_2` VALUES ('7A4', '2', 'Cost Accounting - II', 'Cost Accounting - II', '20', '80', '-1', '100', '40', '0', '750', '7');
INSERT INTO `bcom_sub_sem_2` VALUES ('7A5', '2', 'Principles & Practice of Insurance', 'Principles & Practice of Insurance', '20', '80', '-1', '100', '40', '0', '750', '7');
INSERT INTO `bcom_sub_sem_2` VALUES ('8A', '2', 'Environmental Studies', 'Environmental Studies', '10', '40', '-1', '50', '20', '0', '750', '8');

-- ----------------------------
-- Table structure for `bcom_sub_sem_3`
-- ----------------------------
DROP TABLE IF EXISTS `bcom_sub_sem_3`;
CREATE TABLE `bcom_sub_sem_3` (
  `sub_id` varchar(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `sub_name` varchar(50) NOT NULL,
  `sub_name_display` varchar(100) NOT NULL,
  `internal_marks` int(11) NOT NULL,
  `semester_marks` int(11) NOT NULL,
  `practical_marks` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `minimum_theory` int(11) NOT NULL,
  `min_practical` int(11) NOT NULL,
  `max_agg_marks` int(11) NOT NULL DEFAULT '750',
  `paper_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bcom_sub_sem_3
-- ----------------------------
INSERT INTO `bcom_sub_sem_3` VALUES ('1A', '3', 'Business Communication', 'Business Communication', '20', '80', '-1', '100', '40', '0', '700', '1');
INSERT INTO `bcom_sub_sem_3` VALUES ('2A', '3', 'Business Finance', 'Business Finance', '20', '80', '-1', '100', '40', '0', '700', '2');
INSERT INTO `bcom_sub_sem_3` VALUES ('3A', '3', 'Indian Finance System', 'Indian Finance System', '20', '80', '-1', '100', '40', '0', '700', '3');
INSERT INTO `bcom_sub_sem_3` VALUES ('4A', '3', 'Business Laws', 'Business Laws', '20', '80', '-1', '100', '40', '0', '700', '4');
INSERT INTO `bcom_sub_sem_3` VALUES ('5A', '3', 'Financial Accounting - III', 'Financial Accounting - III', '20', '80', '-1', '100', '40', '0', '700', '5');
INSERT INTO `bcom_sub_sem_3` VALUES ('6A', '3', 'Statistical Techniques', 'Statistical Techniques', '20', '80', '-1', '100', '40', '0', '700', '6');
INSERT INTO `bcom_sub_sem_3` VALUES ('7A1', '3', 'Accounting III', 'Accounting III', '20', '80', '-1', '100', '40', '0', '700', '7');
INSERT INTO `bcom_sub_sem_3` VALUES ('7A2', '3', 'Rural Marketing', 'Rural Marketing', '20', '80', '-1', '100', '40', '0', '700', '7');
INSERT INTO `bcom_sub_sem_3` VALUES ('7A3', '3', 'Distribution & Retail management', 'Distribution & Retail management', '20', '80', '-1', '100', '40', '0', '700', '7');
INSERT INTO `bcom_sub_sem_3` VALUES ('7A4', '3', 'Advertising', 'Advertising', '20', '80', '-1', '100', '40', '0', '700', '7');
INSERT INTO `bcom_sub_sem_3` VALUES ('7A5', '3', 'Computer Application for Business', 'Computer Application for Business', '10', '40', '50', '100', '20', '20', '700', '7');
INSERT INTO `bcom_sub_sem_3` VALUES ('7A6', '3', 'Capital Markets & Financial Services', 'Capital Markets & Financial Services', '20', '80', '-1', '100', '40', '0', '700', '7');

-- ----------------------------
-- Table structure for `bcom_sub_sem_4`
-- ----------------------------
DROP TABLE IF EXISTS `bcom_sub_sem_4`;
CREATE TABLE `bcom_sub_sem_4` (
  `sub_id` varchar(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `sub_name` varchar(50) NOT NULL,
  `sub_name_display` varchar(100) NOT NULL,
  `internal_marks` int(11) NOT NULL,
  `semester_marks` int(11) NOT NULL,
  `practical_marks` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `minimum_theory` int(11) NOT NULL,
  `min_practical` int(11) NOT NULL,
  `max_agg_marks` int(11) NOT NULL DEFAULT '750',
  `paper_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bcom_sub_sem_4
-- ----------------------------
INSERT INTO `bcom_sub_sem_4` VALUES ('1A', '4', 'Business Communication', 'Business Communication', '20', '80', '-1', '100', '40', '0', '700', '1');
INSERT INTO `bcom_sub_sem_4` VALUES ('2A', '4', 'Business Finance', 'Business Finance', '20', '80', '-1', '100', '40', '0', '700', '2');
INSERT INTO `bcom_sub_sem_4` VALUES ('3A', '4', 'Indian Fiscal System', 'Indian Fiscal System', '20', '80', '-1', '100', '40', '0', '700', '3');
INSERT INTO `bcom_sub_sem_4` VALUES ('4A', '4', 'Business Laws', 'Business Laws', '20', '80', '-1', '100', '40', '0', '700', '4');
INSERT INTO `bcom_sub_sem_4` VALUES ('5A', '4', 'Financial Accounting - IV', 'Financial Accounting - IV', '20', '80', '-1', '100', '40', '0', '700', '5');
INSERT INTO `bcom_sub_sem_4` VALUES ('6A', '4', 'Statistical Techniques', 'Statistical Techniques', '20', '80', '-1', '100', '40', '0', '700', '6');
INSERT INTO `bcom_sub_sem_4` VALUES ('7A1', '4', 'E-Accounting', 'E-Accounting', '20', '80', '-1', '100', '40', '0', '700', '7');
INSERT INTO `bcom_sub_sem_4` VALUES ('7A2', '4', 'Rural Marketing', 'Rural Marketing', '20', '80', '-1', '100', '40', '0', '700', '7');
INSERT INTO `bcom_sub_sem_4` VALUES ('7A3', '4', 'Retail Management', 'Retail Management', '20', '80', '-1', '100', '40', '0', '700', '7');
INSERT INTO `bcom_sub_sem_4` VALUES ('7A4', '4', 'Advertising', 'Advertising', '20', '80', '-1', '100', '40', '0', '700', '7');
INSERT INTO `bcom_sub_sem_4` VALUES ('7A5', '4', 'Computer Application for Business', 'Computer Application for Business', '10', '40', '50', '100', '20', '20', '700', '7');
INSERT INTO `bcom_sub_sem_4` VALUES ('7A6', '4', 'Capital Markets & Financial Services', 'Capital Markets & Financial Services', '20', '80', '-1', '100', '40', '0', '700', '7');

-- ----------------------------
-- Table structure for `bcom_supple_marks_sem_1`
-- ----------------------------
DROP TABLE IF EXISTS `bcom_supple_marks_sem_1`;
CREATE TABLE `bcom_supple_marks_sem_1` (
  `sub_id` varchar(30) NOT NULL,
  `pr_number` int(11) NOT NULL,
  `isa_abs` varchar(5) NOT NULL,
  `see_abs` varchar(5) NOT NULL,
  `pract_abs` varchar(5) NOT NULL,
  `internal` int(11) NOT NULL,
  `theory` int(11) NOT NULL,
  `practicle` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gen_symbol` varchar(11) NOT NULL,
  `activity_symbol` varchar(30) NOT NULL,
  `gen_the_symbol` varchar(11) NOT NULL,
  `gen_the_pract_sym` varchar(11) NOT NULL,
  `pass_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bcom_supple_marks_sem_1
-- ----------------------------

-- ----------------------------
-- Table structure for `bcom_supple_marks_sem_2`
-- ----------------------------
DROP TABLE IF EXISTS `bcom_supple_marks_sem_2`;
CREATE TABLE `bcom_supple_marks_sem_2` (
  `sub_id` varchar(30) NOT NULL,
  `pr_number` int(11) NOT NULL,
  `isa_abs` varchar(5) NOT NULL,
  `see_abs` varchar(5) NOT NULL,
  `pract_abs` varchar(5) NOT NULL,
  `internal` int(11) NOT NULL,
  `theory` int(11) NOT NULL,
  `practicle` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gen_symbol` varchar(11) NOT NULL,
  `activity_symbol` varchar(30) NOT NULL,
  `gen_the_symbol` varchar(11) NOT NULL,
  `gen_the_pract_sym` varchar(11) NOT NULL,
  `pass_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bcom_supple_marks_sem_2
-- ----------------------------

-- ----------------------------
-- Table structure for `bcom_supple_marks_sem_3`
-- ----------------------------
DROP TABLE IF EXISTS `bcom_supple_marks_sem_3`;
CREATE TABLE `bcom_supple_marks_sem_3` (
  `sub_id` varchar(30) NOT NULL,
  `pr_number` int(11) NOT NULL,
  `isa_abs` varchar(5) NOT NULL,
  `see_abs` varchar(5) NOT NULL,
  `pract_abs` varchar(5) NOT NULL,
  `internal` int(11) NOT NULL,
  `theory` int(11) NOT NULL,
  `practicle` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gen_symbol` varchar(11) NOT NULL,
  `activity_symbol` varchar(30) NOT NULL,
  `gen_the_symbol` varchar(11) NOT NULL,
  `gen_the_pract_sym` varchar(11) NOT NULL,
  `pass_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bcom_supple_marks_sem_3
-- ----------------------------

-- ----------------------------
-- Table structure for `bcom_supple_marks_sem_4`
-- ----------------------------
DROP TABLE IF EXISTS `bcom_supple_marks_sem_4`;
CREATE TABLE `bcom_supple_marks_sem_4` (
  `sub_id` varchar(30) NOT NULL,
  `pr_number` int(11) NOT NULL,
  `isa_abs` varchar(5) NOT NULL,
  `see_abs` varchar(5) NOT NULL,
  `pract_abs` varchar(5) NOT NULL,
  `internal` int(11) NOT NULL,
  `theory` int(11) NOT NULL,
  `practicle` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gen_symbol` varchar(11) NOT NULL,
  `activity_symbol` varchar(30) NOT NULL,
  `gen_the_symbol` varchar(11) NOT NULL,
  `gen_the_pract_sym` varchar(11) NOT NULL,
  `pass_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bcom_supple_marks_sem_4
-- ----------------------------

-- ----------------------------
-- Table structure for `bsc_cmp_sci_reval_marks_sem_1`
-- ----------------------------
DROP TABLE IF EXISTS `bsc_cmp_sci_reval_marks_sem_1`;
CREATE TABLE `bsc_cmp_sci_reval_marks_sem_1` (
  `sub_id` varchar(30) NOT NULL,
  `pr_number` int(11) NOT NULL,
  `isa_abs` varchar(5) NOT NULL,
  `see_abs` varchar(5) NOT NULL,
  `pract_abs` varchar(5) NOT NULL,
  `internal` int(11) NOT NULL,
  `theory` int(11) NOT NULL,
  `practicle` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gen_symbol` varchar(11) NOT NULL,
  `activity_symbol` varchar(30) NOT NULL,
  `gen_the_symbol` varchar(11) NOT NULL,
  `gen_the_pract_sym` varchar(11) NOT NULL,
  `pass_status` varchar(11) NOT NULL,
  `pract_total` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bsc_cmp_sci_reval_marks_sem_1
-- ----------------------------

-- ----------------------------
-- Table structure for `bsc_cmp_sci_reval_marks_sem_2`
-- ----------------------------
DROP TABLE IF EXISTS `bsc_cmp_sci_reval_marks_sem_2`;
CREATE TABLE `bsc_cmp_sci_reval_marks_sem_2` (
  `sub_id` varchar(30) NOT NULL,
  `pr_number` int(11) NOT NULL,
  `isa_abs` varchar(5) NOT NULL,
  `see_abs` varchar(5) NOT NULL,
  `pract_abs` varchar(5) NOT NULL,
  `internal` int(11) NOT NULL,
  `theory` int(11) NOT NULL,
  `practicle` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gen_symbol` varchar(11) NOT NULL,
  `activity_symbol` varchar(30) NOT NULL,
  `gen_the_symbol` varchar(11) NOT NULL,
  `gen_the_pract_sym` varchar(11) NOT NULL,
  `pass_status` varchar(11) NOT NULL,
  `pract_total` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bsc_cmp_sci_reval_marks_sem_2
-- ----------------------------

-- ----------------------------
-- Table structure for `bsc_cmp_sci_reval_marks_sem_3`
-- ----------------------------
DROP TABLE IF EXISTS `bsc_cmp_sci_reval_marks_sem_3`;
CREATE TABLE `bsc_cmp_sci_reval_marks_sem_3` (
  `sub_id` varchar(30) NOT NULL,
  `pr_number` int(11) NOT NULL,
  `isa_abs` varchar(5) NOT NULL,
  `see_abs` varchar(5) NOT NULL,
  `pract_abs` varchar(5) NOT NULL,
  `internal` int(11) NOT NULL,
  `theory` int(11) NOT NULL,
  `practicle` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gen_symbol` varchar(11) NOT NULL,
  `activity_symbol` varchar(30) NOT NULL,
  `gen_the_symbol` varchar(11) NOT NULL,
  `gen_the_pract_sym` varchar(11) NOT NULL,
  `pass_status` varchar(11) NOT NULL,
  `pract_total` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bsc_cmp_sci_reval_marks_sem_3
-- ----------------------------

-- ----------------------------
-- Table structure for `bsc_cmp_sci_reval_marks_sem_4`
-- ----------------------------
DROP TABLE IF EXISTS `bsc_cmp_sci_reval_marks_sem_4`;
CREATE TABLE `bsc_cmp_sci_reval_marks_sem_4` (
  `sub_id` varchar(30) NOT NULL,
  `pr_number` int(11) NOT NULL,
  `isa_abs` varchar(5) NOT NULL,
  `see_abs` varchar(5) NOT NULL,
  `pract_abs` varchar(5) NOT NULL,
  `internal` int(11) NOT NULL,
  `theory` int(11) NOT NULL,
  `practicle` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gen_symbol` varchar(11) NOT NULL,
  `activity_symbol` varchar(30) NOT NULL,
  `gen_the_symbol` varchar(11) NOT NULL,
  `gen_the_pract_sym` varchar(11) NOT NULL,
  `pass_status` varchar(11) NOT NULL,
  `pract_total` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bsc_cmp_sci_reval_marks_sem_4
-- ----------------------------

-- ----------------------------
-- Table structure for `bsc_cmp_sci_student_detail_sem_1`
-- ----------------------------
DROP TABLE IF EXISTS `bsc_cmp_sci_student_detail_sem_1`;
CREATE TABLE `bsc_cmp_sci_student_detail_sem_1` (
  `pr_number` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `sports_category` varchar(20) NOT NULL,
  `sports_rewards` varchar(40) NOT NULL,
  `gen_grace_alloc` int(11) NOT NULL,
  `entitlement_grace_alloc` int(11) NOT NULL,
  `sports_grace_alloc` int(11) NOT NULL,
  `gen_grace_remain` int(11) NOT NULL,
  `entitlement_grace_remain` int(11) NOT NULL,
  `sports_grace_remain` int(11) NOT NULL,
  `subj_1` varchar(20) NOT NULL,
  `subj_2` varchar(20) NOT NULL,
  `subj_3` varchar(20) NOT NULL,
  `subj_4` varchar(20) NOT NULL,
  `subj_5` varchar(20) NOT NULL,
  `subj_6` varchar(20) NOT NULL,
  `subj_7` varchar(20) NOT NULL,
  `subj_8` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `seat_number` int(10) NOT NULL,
  `special_priority_tag` varchar(3) NOT NULL,
  `block` tinyint(1) NOT NULL DEFAULT '0',
  `supplementary` tinyint(4) NOT NULL DEFAULT '1',
  `subj_details` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`pr_number`,`supplementary`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bsc_cmp_sci_student_detail_sem_1
-- ----------------------------

-- ----------------------------
-- Table structure for `bsc_cmp_sci_student_detail_sem_2`
-- ----------------------------
DROP TABLE IF EXISTS `bsc_cmp_sci_student_detail_sem_2`;
CREATE TABLE `bsc_cmp_sci_student_detail_sem_2` (
  `subj_details` varchar(100) DEFAULT NULL,
  `pr_number` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `seat_number` int(40) NOT NULL,
  `sports_category` varchar(40) NOT NULL,
  `sports_rewards` varchar(40) NOT NULL,
  `gen_grace_alloc` int(11) NOT NULL,
  `entitlement_grace_alloc` int(11) NOT NULL,
  `sports_grace_alloc` int(11) NOT NULL,
  `gen_grace_remain` int(11) NOT NULL,
  `entitlement_grace_remain` int(11) NOT NULL,
  `sports_grace_remain` int(11) NOT NULL,
  `subj_1` varchar(20) NOT NULL,
  `subj_2` varchar(20) NOT NULL,
  `subj_3` varchar(20) NOT NULL,
  `subj_4` varchar(20) NOT NULL,
  `subj_5` varchar(20) NOT NULL,
  `subj_6` varchar(20) NOT NULL,
  `subj_7` varchar(20) NOT NULL,
  `subj_8` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `special_priority_tag` varchar(3) NOT NULL,
  `block` tinyint(1) NOT NULL DEFAULT '0',
  `supplementary` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pr_number`,`supplementary`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bsc_cmp_sci_student_detail_sem_2
-- ----------------------------

-- ----------------------------
-- Table structure for `bsc_cmp_sci_student_detail_sem_3`
-- ----------------------------
DROP TABLE IF EXISTS `bsc_cmp_sci_student_detail_sem_3`;
CREATE TABLE `bsc_cmp_sci_student_detail_sem_3` (
  `subj_details` varchar(100) DEFAULT NULL,
  `pr_number` int(11) NOT NULL,
  `seat_number` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `sports_category` varchar(20) NOT NULL,
  `sports_rewards` varchar(40) NOT NULL,
  `gen_grace_alloc` int(11) NOT NULL,
  `entitlement_grace_alloc` int(11) NOT NULL,
  `sports_grace_alloc` int(11) NOT NULL,
  `gen_grace_remain` int(11) NOT NULL,
  `entitlement_grace_remain` int(11) NOT NULL,
  `sports_grace_remain` int(11) NOT NULL,
  `subj_1` varchar(20) NOT NULL,
  `subj_2` varchar(20) NOT NULL,
  `subj_3` varchar(20) NOT NULL,
  `subj_4` varchar(20) NOT NULL,
  `subj_5` varchar(20) NOT NULL,
  `subj_6` varchar(20) NOT NULL,
  `subj_7` varchar(20) NOT NULL,
  `subj_8` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `special_priority_tag` varchar(3) NOT NULL,
  `block` tinyint(1) NOT NULL DEFAULT '0',
  `supplementary` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`pr_number`,`supplementary`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bsc_cmp_sci_student_detail_sem_3
-- ----------------------------

-- ----------------------------
-- Table structure for `bsc_cmp_sci_student_detail_sem_4`
-- ----------------------------
DROP TABLE IF EXISTS `bsc_cmp_sci_student_detail_sem_4`;
CREATE TABLE `bsc_cmp_sci_student_detail_sem_4` (
  `subj_details` varchar(100) DEFAULT NULL,
  `pr_number` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `seat_number` int(10) NOT NULL,
  `sports_category` varchar(20) NOT NULL,
  `sports_rewards` varchar(40) NOT NULL DEFAULT '',
  `gen_grace_alloc` int(11) NOT NULL DEFAULT '0',
  `entitlement_grace_alloc` int(11) NOT NULL DEFAULT '0',
  `sports_grace_alloc` int(11) NOT NULL DEFAULT '0',
  `gen_grace_remain` int(11) NOT NULL DEFAULT '0',
  `entitlement_grace_remain` int(11) NOT NULL DEFAULT '0',
  `sports_grace_remain` int(11) NOT NULL DEFAULT '0',
  `subj_1` varchar(20) NOT NULL,
  `subj_2` varchar(20) NOT NULL,
  `subj_3` varchar(20) NOT NULL,
  `subj_4` varchar(20) NOT NULL,
  `subj_5` varchar(20) NOT NULL,
  `subj_6` varchar(20) NOT NULL,
  `subj_7` varchar(20) NOT NULL,
  `subj_8` varchar(20) NOT NULL DEFAULT '',
  `date` varchar(20) NOT NULL DEFAULT '',
  `special_priority_tag` varchar(3) NOT NULL DEFAULT '',
  `block` tinyint(1) NOT NULL DEFAULT '0',
  `supplementary` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pr_number`,`supplementary`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bsc_cmp_sci_student_detail_sem_4
-- ----------------------------

-- ----------------------------
-- Table structure for `bsc_cmp_sci_student_marks_sem_1`
-- ----------------------------
DROP TABLE IF EXISTS `bsc_cmp_sci_student_marks_sem_1`;
CREATE TABLE `bsc_cmp_sci_student_marks_sem_1` (
  `sub_id` varchar(30) NOT NULL,
  `pr_number` int(11) NOT NULL,
  `isa_abs` varchar(5) NOT NULL,
  `see_abs` varchar(5) NOT NULL,
  `pract_abs` varchar(5) NOT NULL,
  `internal` int(11) NOT NULL,
  `theory` int(11) NOT NULL,
  `practicle` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gen_symbol` varchar(11) NOT NULL,
  `activity_symbol` varchar(30) NOT NULL,
  `gen_the_symbol` varchar(11) NOT NULL,
  `gen_the_pract_sym` varchar(11) NOT NULL,
  `pass_status` varchar(11) NOT NULL,
  `pract_total` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bsc_cmp_sci_student_marks_sem_1
-- ----------------------------

-- ----------------------------
-- Table structure for `bsc_cmp_sci_student_marks_sem_2`
-- ----------------------------
DROP TABLE IF EXISTS `bsc_cmp_sci_student_marks_sem_2`;
CREATE TABLE `bsc_cmp_sci_student_marks_sem_2` (
  `sub_id` varchar(30) NOT NULL,
  `pr_number` int(11) NOT NULL,
  `isa_abs` varchar(5) NOT NULL,
  `see_abs` varchar(5) NOT NULL,
  `pract_abs` varchar(5) NOT NULL,
  `internal` int(11) NOT NULL,
  `theory` int(11) NOT NULL,
  `practicle` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gen_symbol` varchar(11) NOT NULL,
  `activity_symbol` varchar(30) NOT NULL,
  `gen_the_symbol` varchar(11) NOT NULL,
  `gen_the_pract_sym` varchar(11) NOT NULL,
  `pass_status` varchar(11) NOT NULL,
  `pract_total` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bsc_cmp_sci_student_marks_sem_2
-- ----------------------------

-- ----------------------------
-- Table structure for `bsc_cmp_sci_student_marks_sem_3`
-- ----------------------------
DROP TABLE IF EXISTS `bsc_cmp_sci_student_marks_sem_3`;
CREATE TABLE `bsc_cmp_sci_student_marks_sem_3` (
  `sub_id` varchar(30) NOT NULL,
  `pr_number` int(11) NOT NULL,
  `isa_abs` varchar(5) NOT NULL,
  `see_abs` varchar(5) NOT NULL,
  `pract_abs` varchar(5) NOT NULL,
  `internal` int(11) NOT NULL,
  `theory` int(11) NOT NULL,
  `practicle` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gen_symbol` varchar(11) NOT NULL,
  `activity_symbol` varchar(30) NOT NULL,
  `gen_the_symbol` varchar(11) NOT NULL,
  `gen_the_pract_sym` varchar(11) NOT NULL,
  `pass_status` varchar(11) NOT NULL,
  `pract_total` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bsc_cmp_sci_student_marks_sem_3
-- ----------------------------

-- ----------------------------
-- Table structure for `bsc_cmp_sci_student_marks_sem_4`
-- ----------------------------
DROP TABLE IF EXISTS `bsc_cmp_sci_student_marks_sem_4`;
CREATE TABLE `bsc_cmp_sci_student_marks_sem_4` (
  `sub_id` varchar(30) NOT NULL,
  `pr_number` int(11) NOT NULL,
  `isa_abs` varchar(5) NOT NULL,
  `see_abs` varchar(5) NOT NULL,
  `pract_abs` varchar(5) NOT NULL,
  `internal` int(11) NOT NULL,
  `theory` int(11) NOT NULL,
  `practicle` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gen_symbol` varchar(11) NOT NULL,
  `activity_symbol` varchar(30) NOT NULL,
  `gen_the_symbol` varchar(11) NOT NULL,
  `gen_the_pract_sym` varchar(11) NOT NULL,
  `pass_status` varchar(11) NOT NULL,
  `pract_total` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bsc_cmp_sci_student_marks_sem_4
-- ----------------------------

-- ----------------------------
-- Table structure for `bsc_cmp_sci_sub_sem_1`
-- ----------------------------
DROP TABLE IF EXISTS `bsc_cmp_sci_sub_sem_1`;
CREATE TABLE `bsc_cmp_sci_sub_sem_1` (
  `sub_id` varchar(50) NOT NULL,
  `semester` int(11) NOT NULL,
  `sub_name` varchar(50) NOT NULL,
  `sub_name_display` varchar(100) NOT NULL,
  `internal_marks` int(11) NOT NULL,
  `semester_marks` int(11) NOT NULL,
  `practical_marks` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `minimum_theory` int(11) NOT NULL,
  `min_practical` int(11) NOT NULL,
  `max_agg_marks` int(11) NOT NULL,
  `paper_type` varchar(50) NOT NULL,
  `subject_type` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bsc_cmp_sci_sub_sem_1
-- ----------------------------
INSERT INTO `bsc_cmp_sci_sub_sem_1` VALUES ('1A1', '1', 'Physics (Paper 1)', 'Physics (Paper 1)', '15', '60', '-1', '75', '30', '0', '750', '1', null);
INSERT INTO `bsc_cmp_sci_sub_sem_1` VALUES ('1A2', '1', 'Mathematics (Paper 1)', 'Mathematics (Paper 1)', '20', '80', '-1', '100', '40', '0', '750', '1', null);
INSERT INTO `bsc_cmp_sci_sub_sem_1` VALUES ('1A3', '1', 'Computer Science (Paper 1)', 'Computer Science (Paper 1)', '15', '60', '-1', '75', '30', '0', '750', '1', null);
INSERT INTO `bsc_cmp_sci_sub_sem_1` VALUES ('2A1', '1', 'Physics (Paper 2)', 'Physics (Paper 2)', '15', '60', '50', '75', '30', '20', '750', '2', null);
INSERT INTO `bsc_cmp_sci_sub_sem_1` VALUES ('2A2', '1', 'Mathematics (Paper 2)', 'Mathematics (Paper 2)', '20', '80', '-1', '100', '40', '0', '750', '2', null);
INSERT INTO `bsc_cmp_sci_sub_sem_1` VALUES ('2A3', '1', 'Computer Science (Paper 2)', 'Computer Science (Paper 2)', '15', '60', '50', '75', '30', '20', '750', '2', null);
INSERT INTO `bsc_cmp_sci_sub_sem_1` VALUES ('3A', '1', 'Foundation Course', 'Foundation Course', '20', '80', '-1', '100', '40', '0', '750', '7', null);
INSERT INTO `bsc_cmp_sci_sub_sem_1` VALUES ('4A', '1', 'Environmental Education', 'Environmental Education', '10', '40', '-1', '50', '20', '0', '750', '8', null);

-- ----------------------------
-- Table structure for `bsc_cmp_sci_sub_sem_2`
-- ----------------------------
DROP TABLE IF EXISTS `bsc_cmp_sci_sub_sem_2`;
CREATE TABLE `bsc_cmp_sci_sub_sem_2` (
  `sub_id` varchar(50) NOT NULL,
  `semester` int(11) NOT NULL,
  `sub_name` varchar(50) NOT NULL,
  `sub_name_display` varchar(100) NOT NULL,
  `internal_marks` int(11) NOT NULL,
  `semester_marks` int(11) NOT NULL,
  `practical_marks` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `minimum_theory` int(11) NOT NULL,
  `min_practical` int(11) NOT NULL,
  `max_agg_marks` int(11) NOT NULL,
  `paper_type` varchar(50) NOT NULL,
  `subject_type` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bsc_cmp_sci_sub_sem_2
-- ----------------------------
INSERT INTO `bsc_cmp_sci_sub_sem_2` VALUES ('1A1', '2', 'Physics (Paper 1)', 'Physics (Paper 1)', '15', '60', '-1', '75', '30', '0', '750', '1', null);
INSERT INTO `bsc_cmp_sci_sub_sem_2` VALUES ('1A2', '2', 'Mathematics (Paper 1)', 'Mathematics (Paper 1)', '20', '80', '-1', '100', '40', '0', '750', '1', null);
INSERT INTO `bsc_cmp_sci_sub_sem_2` VALUES ('1A3', '2', 'Computer Science (Paper 1)', 'Computer Science (Paper 1)', '15', '60', '-1', '75', '30', '0', '750', '1', null);
INSERT INTO `bsc_cmp_sci_sub_sem_2` VALUES ('2A1', '2', 'Physics (Paper 2)', 'Physics (Paper 2)', '15', '60', '50', '75', '30', '20', '750', '2', null);
INSERT INTO `bsc_cmp_sci_sub_sem_2` VALUES ('2A2', '2', 'Mathematics (Paper 2)', 'Mathematics (Paper 2)', '20', '80', '-1', '100', '40', '0', '750', '2', null);
INSERT INTO `bsc_cmp_sci_sub_sem_2` VALUES ('2A3', '2', 'Computer Science (Paper 2)', 'Computer Science (Paper 2)', '15', '60', '50', '75', '30', '20', '750', '2', null);
INSERT INTO `bsc_cmp_sci_sub_sem_2` VALUES ('3A', '2', 'Foundation Course', 'Foundation Course', '20', '80', '-1', '100', '40', '0', '750', '7', null);
INSERT INTO `bsc_cmp_sci_sub_sem_2` VALUES ('4A', '2', 'Environmental Education', 'Environmental Education', '10', '40', '-1', '50', '20', '0', '750', '8', null);

-- ----------------------------
-- Table structure for `bsc_cmp_sci_sub_sem_3`
-- ----------------------------
DROP TABLE IF EXISTS `bsc_cmp_sci_sub_sem_3`;
CREATE TABLE `bsc_cmp_sci_sub_sem_3` (
  `sub_id` varchar(50) NOT NULL,
  `semester` int(11) NOT NULL,
  `sub_name` varchar(50) NOT NULL,
  `sub_name_display` varchar(100) NOT NULL,
  `internal_marks` int(11) NOT NULL,
  `semester_marks` int(11) NOT NULL,
  `practical_marks` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `minimum_theory` int(11) NOT NULL,
  `min_practical` int(11) NOT NULL,
  `max_agg_marks` int(11) NOT NULL DEFAULT '700',
  `paper_type` varchar(50) NOT NULL,
  `subject_type` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bsc_cmp_sci_sub_sem_3
-- ----------------------------
INSERT INTO `bsc_cmp_sci_sub_sem_3` VALUES ('1A1', '3', 'Physics (Paper 1)', 'Physics (Paper 1)', '15', '60', '-1', '75', '30', '0', '700', '1', null);
INSERT INTO `bsc_cmp_sci_sub_sem_3` VALUES ('1A2', '3', 'Mathematics (Paper 1)', 'Mathematics (Paper 1)', '15', '60', '-1', '75', '30', '0', '700', '1', null);
INSERT INTO `bsc_cmp_sci_sub_sem_3` VALUES ('1A3', '3', 'Computer Science (Paper 1)', 'Computer Science (Paper 1)', '15', '60', '-1', '75', '30', '0', '700', '1', null);
INSERT INTO `bsc_cmp_sci_sub_sem_3` VALUES ('2A1', '3', 'Physics (Paper 2)', 'Physics (Paper 2)', '15', '60', '50', '75', '30', '20', '700', '2', null);
INSERT INTO `bsc_cmp_sci_sub_sem_3` VALUES ('2A2', '3', 'Mathematics (Paper 2)', 'Mathematics (Paper 2)', '20', '80', '25', '100', '40', '10', '700', '2', null);
INSERT INTO `bsc_cmp_sci_sub_sem_3` VALUES ('2A3', '3', 'Computer Science (Paper 2)', 'Computer Science (Paper 2)', '15', '60', '50', '75', '30', '20', '700', '2', null);
INSERT INTO `bsc_cmp_sci_sub_sem_3` VALUES ('3A', '3', 'e-Commerce', 'e-Commerce', '20', '80', '-1', '100', '40', '0', '700', '7', null);

-- ----------------------------
-- Table structure for `bsc_cmp_sci_sub_sem_4`
-- ----------------------------
DROP TABLE IF EXISTS `bsc_cmp_sci_sub_sem_4`;
CREATE TABLE `bsc_cmp_sci_sub_sem_4` (
  `sub_id` varchar(50) NOT NULL,
  `semester` int(11) NOT NULL,
  `sub_name` varchar(50) NOT NULL,
  `sub_name_display` varchar(100) NOT NULL,
  `internal_marks` int(11) NOT NULL,
  `semester_marks` int(11) NOT NULL,
  `practical_marks` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `minimum_theory` int(11) NOT NULL,
  `min_practical` int(11) NOT NULL,
  `max_agg_marks` int(11) NOT NULL DEFAULT '700',
  `paper_type` varchar(50) NOT NULL,
  `subject_type` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bsc_cmp_sci_sub_sem_4
-- ----------------------------
INSERT INTO `bsc_cmp_sci_sub_sem_4` VALUES ('1A1', '4', 'Physics (Paper 1)', 'Physics (Paper 1)', '15', '60', '-1', '75', '30', '0', '700', '1', null);
INSERT INTO `bsc_cmp_sci_sub_sem_4` VALUES ('1A2', '4', 'Mathematics (Paper 1)', 'Mathematics (Paper 1)', '15', '60', '25', '75', '30', '10', '700', '1', null);
INSERT INTO `bsc_cmp_sci_sub_sem_4` VALUES ('1A3', '4', 'Computer Science (Paper 1)', 'Computer Science (Paper 1)', '15', '60', '-1', '75', '30', '0', '700', '1', null);
INSERT INTO `bsc_cmp_sci_sub_sem_4` VALUES ('2A1', '4', 'Physics (Paper 2)', 'Physics (Paper 2)', '15', '60', '50', '75', '30', '20', '700', '2', null);
INSERT INTO `bsc_cmp_sci_sub_sem_4` VALUES ('2A2', '4', 'Mathematics (Paper 2)', 'Mathematics (Paper 2)', '20', '80', '-1', '100', '40', '0', '700', '2', null);
INSERT INTO `bsc_cmp_sci_sub_sem_4` VALUES ('2A3', '4', 'Computer Science (Paper 2)', 'Computer Science (Paper 2)', '15', '60', '50', '75', '30', '20', '700', '2', null);
INSERT INTO `bsc_cmp_sci_sub_sem_4` VALUES ('3A', '4', 'e-Commerce', 'e-Commerce', '20', '80', '-1', '100', '40', '0', '700', '7', null);

-- ----------------------------
-- Table structure for `bsc_cmp_sci_supple_marks_sem_1`
-- ----------------------------
DROP TABLE IF EXISTS `bsc_cmp_sci_supple_marks_sem_1`;
CREATE TABLE `bsc_cmp_sci_supple_marks_sem_1` (
  `sub_id` varchar(30) NOT NULL,
  `pr_number` int(11) NOT NULL,
  `supple_seat_number` int(11) NOT NULL DEFAULT '0',
  `no_of_attempts` int(11) NOT NULL DEFAULT '0',
  `isa_abs` varchar(5) NOT NULL,
  `see_abs` varchar(5) NOT NULL,
  `pract_abs` varchar(5) NOT NULL,
  `internal` int(11) NOT NULL,
  `theory` int(11) NOT NULL,
  `practicle` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gen_symbol` varchar(11) NOT NULL,
  `activity_symbol` varchar(30) NOT NULL,
  `gen_the_symbol` varchar(11) NOT NULL,
  `gen_the_pract_sym` varchar(11) NOT NULL,
  `gen_grace_remain` int(11) NOT NULL DEFAULT '0',
  `nss_grace_remain` int(11) NOT NULL DEFAULT '0',
  `sports_grace_remain` int(11) NOT NULL DEFAULT '0',
  `pass_status` varchar(11) NOT NULL,
  `pract_total` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bsc_cmp_sci_supple_marks_sem_1
-- ----------------------------

-- ----------------------------
-- Table structure for `bsc_cmp_sci_supple_marks_sem_2`
-- ----------------------------
DROP TABLE IF EXISTS `bsc_cmp_sci_supple_marks_sem_2`;
CREATE TABLE `bsc_cmp_sci_supple_marks_sem_2` (
  `sub_id` varchar(30) NOT NULL,
  `pr_number` int(11) NOT NULL,
  `supple_seat_number` int(11) NOT NULL DEFAULT '0',
  `no_of_attempts` int(11) NOT NULL DEFAULT '0',
  `isa_abs` varchar(5) NOT NULL,
  `see_abs` varchar(5) NOT NULL,
  `pract_abs` varchar(5) NOT NULL,
  `internal` int(11) NOT NULL,
  `theory` int(11) NOT NULL,
  `practicle` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gen_symbol` varchar(11) NOT NULL,
  `activity_symbol` varchar(30) NOT NULL,
  `gen_the_symbol` varchar(11) NOT NULL,
  `gen_the_pract_sym` varchar(11) NOT NULL,
  `gen_grace_remain` int(11) NOT NULL DEFAULT '0',
  `nss_grace_remain` int(11) NOT NULL DEFAULT '0',
  `sports_grace_remain` int(11) NOT NULL DEFAULT '0',
  `pass_status` varchar(11) NOT NULL,
  `pract_total` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bsc_cmp_sci_supple_marks_sem_2
-- ----------------------------

-- ----------------------------
-- Table structure for `bsc_cmp_sci_supple_marks_sem_3`
-- ----------------------------
DROP TABLE IF EXISTS `bsc_cmp_sci_supple_marks_sem_3`;
CREATE TABLE `bsc_cmp_sci_supple_marks_sem_3` (
  `sub_id` varchar(30) NOT NULL,
  `pr_number` int(11) NOT NULL,
  `supple_seat_number` int(11) NOT NULL DEFAULT '0',
  `no_of_attempts` int(11) NOT NULL DEFAULT '0',
  `isa_abs` varchar(5) NOT NULL,
  `see_abs` varchar(5) NOT NULL,
  `pract_abs` varchar(5) NOT NULL,
  `internal` int(11) NOT NULL,
  `theory` int(11) NOT NULL,
  `practicle` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gen_symbol` varchar(11) NOT NULL,
  `activity_symbol` varchar(30) NOT NULL,
  `gen_the_symbol` varchar(11) NOT NULL,
  `gen_the_pract_sym` varchar(11) NOT NULL,
  `gen_grace_remain` int(11) NOT NULL DEFAULT '0',
  `nss_grace_remain` int(11) NOT NULL DEFAULT '0',
  `sports_grace_remain` int(11) NOT NULL DEFAULT '0',
  `pass_status` varchar(11) NOT NULL,
  `pract_total` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bsc_cmp_sci_supple_marks_sem_3
-- ----------------------------

-- ----------------------------
-- Table structure for `bsc_cmp_sci_supple_marks_sem_4`
-- ----------------------------
DROP TABLE IF EXISTS `bsc_cmp_sci_supple_marks_sem_4`;
CREATE TABLE `bsc_cmp_sci_supple_marks_sem_4` (
  `sub_id` varchar(30) NOT NULL,
  `pr_number` int(11) NOT NULL,
  `supple_seat_number` int(11) NOT NULL DEFAULT '0',
  `no_of_attempts` int(11) NOT NULL DEFAULT '0',
  `isa_abs` varchar(5) NOT NULL,
  `see_abs` varchar(5) NOT NULL,
  `pract_abs` varchar(5) NOT NULL,
  `internal` int(11) NOT NULL,
  `theory` int(11) NOT NULL,
  `practicle` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gen_symbol` varchar(11) NOT NULL,
  `activity_symbol` varchar(30) NOT NULL,
  `gen_the_symbol` varchar(11) NOT NULL,
  `gen_the_pract_sym` varchar(11) NOT NULL,
  `gen_grace_remain` int(11) NOT NULL DEFAULT '0',
  `nss_grace_remain` int(11) NOT NULL DEFAULT '0',
  `sports_grace_remain` int(11) NOT NULL DEFAULT '0',
  `pass_status` varchar(11) NOT NULL,
  `pract_total` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bsc_cmp_sci_supple_marks_sem_4
-- ----------------------------

-- ----------------------------
-- Table structure for `bsc_reval_marks_sem_1`
-- ----------------------------
DROP TABLE IF EXISTS `bsc_reval_marks_sem_1`;
CREATE TABLE `bsc_reval_marks_sem_1` (
  `sub_id` varchar(30) NOT NULL,
  `pr_number` int(11) NOT NULL,
  `isa_abs` varchar(5) NOT NULL,
  `see_abs` varchar(5) NOT NULL,
  `pract_abs` varchar(5) NOT NULL,
  `internal` int(11) NOT NULL,
  `theory` int(11) NOT NULL,
  `practicle` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gen_symbol` varchar(11) NOT NULL,
  `activity_symbol` varchar(30) NOT NULL,
  `gen_the_symbol` varchar(11) NOT NULL,
  `gen_the_pract_sym` varchar(11) NOT NULL,
  `pass_status` varchar(11) NOT NULL,
  `pract_total` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bsc_reval_marks_sem_1
-- ----------------------------

-- ----------------------------
-- Table structure for `bsc_reval_marks_sem_2`
-- ----------------------------
DROP TABLE IF EXISTS `bsc_reval_marks_sem_2`;
CREATE TABLE `bsc_reval_marks_sem_2` (
  `sub_id` varchar(30) NOT NULL,
  `pr_number` int(11) NOT NULL,
  `isa_abs` varchar(5) NOT NULL,
  `see_abs` varchar(5) NOT NULL,
  `pract_abs` varchar(5) NOT NULL,
  `internal` int(11) NOT NULL,
  `theory` int(11) NOT NULL,
  `practicle` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gen_symbol` varchar(11) NOT NULL,
  `activity_symbol` varchar(30) NOT NULL,
  `gen_the_symbol` varchar(11) NOT NULL,
  `gen_the_pract_sym` varchar(11) NOT NULL,
  `pass_status` varchar(11) NOT NULL,
  `pract_total` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bsc_reval_marks_sem_2
-- ----------------------------

-- ----------------------------
-- Table structure for `bsc_reval_marks_sem_3`
-- ----------------------------
DROP TABLE IF EXISTS `bsc_reval_marks_sem_3`;
CREATE TABLE `bsc_reval_marks_sem_3` (
  `sub_id` varchar(30) NOT NULL,
  `pr_number` int(11) NOT NULL,
  `isa_abs` varchar(5) NOT NULL,
  `see_abs` varchar(5) NOT NULL,
  `pract_abs` varchar(5) NOT NULL,
  `internal` int(11) NOT NULL,
  `theory` int(11) NOT NULL,
  `practicle` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gen_symbol` varchar(11) NOT NULL,
  `activity_symbol` varchar(30) NOT NULL,
  `gen_the_symbol` varchar(11) NOT NULL,
  `gen_the_pract_sym` varchar(11) NOT NULL,
  `pass_status` varchar(11) NOT NULL,
  `pract_total` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bsc_reval_marks_sem_3
-- ----------------------------

-- ----------------------------
-- Table structure for `bsc_reval_marks_sem_4`
-- ----------------------------
DROP TABLE IF EXISTS `bsc_reval_marks_sem_4`;
CREATE TABLE `bsc_reval_marks_sem_4` (
  `sub_id` varchar(30) NOT NULL,
  `pr_number` int(11) NOT NULL,
  `isa_abs` varchar(5) NOT NULL,
  `see_abs` varchar(5) NOT NULL,
  `pract_abs` varchar(5) NOT NULL,
  `internal` int(11) NOT NULL,
  `theory` int(11) NOT NULL,
  `practicle` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gen_symbol` varchar(11) NOT NULL,
  `activity_symbol` varchar(30) NOT NULL,
  `gen_the_symbol` varchar(11) NOT NULL,
  `gen_the_pract_sym` varchar(11) NOT NULL,
  `pass_status` varchar(11) NOT NULL,
  `pract_total` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bsc_reval_marks_sem_4
-- ----------------------------

-- ----------------------------
-- Table structure for `bsc_student_detail_sem_1`
-- ----------------------------
DROP TABLE IF EXISTS `bsc_student_detail_sem_1`;
CREATE TABLE `bsc_student_detail_sem_1` (
  `pr_number` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `seat_number` int(20) NOT NULL,
  `sports_category` varchar(40) NOT NULL,
  `sports_rewards` varchar(40) NOT NULL,
  `gen_grace_alloc` int(11) NOT NULL,
  `entitlement_grace_alloc` int(11) NOT NULL,
  `sports_grace_alloc` int(11) NOT NULL,
  `gen_grace_remain` int(11) NOT NULL,
  `entitlement_grace_remain` int(11) NOT NULL,
  `sports_grace_remain` int(11) NOT NULL,
  `subj_1` varchar(20) NOT NULL,
  `subj_2` varchar(20) NOT NULL,
  `subj_3` varchar(20) NOT NULL,
  `subj_4` varchar(20) NOT NULL,
  `subj_5` varchar(20) NOT NULL,
  `subj_6` varchar(20) NOT NULL,
  `subj_7` varchar(20) NOT NULL,
  `subj_8` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `special_priority_tag` varchar(3) NOT NULL,
  `block` tinyint(1) NOT NULL DEFAULT '0',
  `supplementary` tinyint(4) NOT NULL DEFAULT '1',
  `subj_details` varchar(100) NOT NULL,
  PRIMARY KEY (`pr_number`,`supplementary`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bsc_student_detail_sem_1
-- ----------------------------
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717001', 'Arobekar Sajana Satish', 'F', '17001', '', '', '13', '0', '0', '13', '0', '0', '2', '5', '1', '16', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"16\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717002', 'Azavedo Shannia Sharlen', 'F', '17002', '', '', '13', '0', '0', '13', '0', '0', '2', '5', '1', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717003', 'Bind Anitadevi Ramchandra ', 'F', '17003', '', '', '13', '0', '0', '13', '0', '0', '2', '5', '1', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717004', 'Chari Shivani Shivram', 'F', '17004', '', '', '13', '0', '0', '13', '0', '0', '2', '5', '1', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717005', 'Chipkar Shivani Dasharath', 'F', '17005', '', '', '13', '0', '0', '13', '0', '0', '2', '5', '1', '13', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"13\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717006', 'Chodankar Akash Sanjeev', 'M', '17006', '', '', '13', '0', '0', '13', '0', '0', '2', '5', '1', '13', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"13\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717009', 'Desai Prajval Chandrax', 'M', '17009', '', '', '13', '0', '0', '13', '0', '0', '2', '5', '1', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717011', 'Dessai Arya Liladhar', 'F', '17011', '', '', '13', '0', '0', '13', '0', '0', '2', '5', '1', '13', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"13\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717012', 'Dias Sapeco Jolyan', 'M', '17012', '', '', '13', '0', '0', '13', '0', '0', '2', '5', '1', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717015', 'Fatarpekar Sharvari M', 'F', '17015', '', '', '13', '0', '0', '13', '0', '0', '2', '5', '1', '13', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"13\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717017', 'Fernandes Andrisha Benifa', 'F', '17017', '', '', '13', '0', '0', '13', '0', '0', '2', '5', '1', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717018', 'Furtado Vineeta Meleeza', 'F', '17018', '', '', '13', '0', '0', '13', '0', '0', '2', '5', '1', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717019', 'Gauns Ankita Mahadev', 'F', '17019', '', '', '13', '0', '0', '13', '0', '0', '2', '5', '1', '16', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"16\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717022', 'Junjwadkar Yogita Prakash', 'F', '17022', '', '', '13', '0', '0', '13', '0', '0', '2', '5', '1', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717023', 'Kouthanker Trusha Prakash', 'F', '17023', '', '', '13', '0', '0', '13', '0', '0', '2', '5', '1', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717024', 'Kunkulkar Anamika Anu', 'F', '17024', '', '', '13', '0', '0', '13', '0', '0', '2', '5', '1', '16', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"16\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717025', 'Kunkalkar Swapnesh Narayan', 'M', '17025', '', '', '13', '0', '0', '13', '0', '0', '2', '5', '1', '16', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"16\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717026', 'Lotlikar Ashweta Anand', 'F', '17026', '', '', '13', '0', '0', '13', '0', '0', '2', '5', '1', '16', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"16\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717027', 'Lotlikar Reema Pandurang', 'F', '17027', '', '', '13', '0', '0', '13', '0', '0', '2', '5', '1', '16', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"16\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717028', 'Mangueshkar Nikisha Keshav', 'F', '17028', '', '', '13', '0', '0', '13', '0', '0', '2', '5', '1', '16', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"16\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717029', 'Mayenkar Saloni Prakash', 'F', '17029', '', '', '13', '0', '0', '13', '0', '0', '2', '5', '1', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717030', 'Naik Akshata Pandurang', 'F', '17030', '', '', '13', '0', '0', '13', '0', '0', '2', '5', '1', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717032', 'Naik Vrushabh Umakant', 'M', '17032', '', '', '13', '0', '0', '13', '0', '0', '2', '5', '1', '16', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"16\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717035', 'Patil Samanta Suresh', 'F', '17035', '', '', '13', '0', '0', '13', '0', '0', '2', '5', '1', '16', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"16\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717036', 'Pawar Ankita Ankush', 'F', '17036', '', '', '13', '0', '0', '13', '0', '0', '2', '5', '1', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717038', 'Raikar Neha Yogesh', 'F', '17038', '', '', '13', '0', '0', '13', '0', '0', '2', '1', '5', '16', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"5\":\"DSC\",\"16\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717039', 'Salkar Abhishek Arun', 'M', '17039', '', '', '13', '0', '0', '13', '0', '0', '2', '5', '1', '16', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"16\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717040', 'Sawant Samidha Dinesh', 'F', '17040', '', '', '13', '0', '0', '13', '0', '0', '2', '5', '1', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717041', 'Sequeira Pearl Fronia', 'F', '17041', '', '', '13', '0', '0', '13', '0', '0', '2', '5', '1', '16', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"16\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717044', 'Shirodkar Suraj Rajaram', 'M', '17044', '', '', '13', '0', '0', '13', '0', '0', '2', '5', '1', '13', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"13\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717046', 'Talkar Bindiya Khema', 'F', '17046', '', '', '13', '0', '0', '13', '0', '0', '2', '5', '1', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717047', 'Utkari Tabitha Paul', 'F', '17047', '', '', '13', '0', '0', '13', '0', '0', '2', '5', '1', '13', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"13\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717048', 'Vaz Flinta Maria Sharmila', 'F', '17048', '', '', '13', '0', '0', '13', '0', '0', '2', '5', '1', '16', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"16\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717050', 'Pednekar Sanjana Rajendra', 'F', '17050', '', '', '13', '0', '0', '13', '0', '0', '2', '5', '1', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717051', 'Kulkarni Amogha Vishwanath', 'F', '17051', '', '', '13', '0', '0', '13', '0', '0', '2', '5', '1', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717053', 'Vishwakarma Ankita Ashok', 'F', '17053', '', '', '13', '0', '0', '13', '0', '0', '2', '5', '1', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717056', 'Kamat Ghanekar Shwetang Dattatray', 'M', '17056', '', '', '13', '0', '0', '13', '0', '0', '2', '5', '1', '13', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"13\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717057', 'Vernekar  Ashwini  Prashant ', 'F', '17057', '', '', '13', '0', '0', '13', '0', '0', '2', '5', '1', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717058', 'Raikar Ajinkya Ajitkumar', 'M', '17058', '', '', '13', '0', '0', '13', '0', '0', '2', '5', '1', '13', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"13\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717059', 'Suthar Anju Laxman', 'F', '17059', '', '', '13', '0', '0', '13', '0', '0', '2', '5', '1', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717060', 'Naik Bhushana Sakharam', 'F', '17060', '', '', '13', '0', '0', '13', '0', '0', '2', '5', '1', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717061', 'Sinai Priolkar Mahima Sandeep', 'F', '17061', '', '', '13', '0', '0', '13', '0', '0', '2', '5', '1', '13', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"13\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717063', 'Mahale Tanisha Rajendra', 'F', '17063', '', '', '13', '0', '0', '13', '0', '0', '2', '5', '1', '13', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"13\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717064', 'Dabholkar Mahima Yeshwant', 'F', '17064', '', '', '13', '0', '0', '13', '0', '0', '2', '5', '1', '13', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"13\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717082', 'Baith Narayan Sitaram', 'M', '17082', '', '', '13', '0', '0', '13', '0', '0', '2', '1', '3', '13', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"13\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717083', 'Bhobe Varada Vassudev', 'F', '17083', '', '', '13', '0', '0', '13', '0', '0', '2', '1', '3', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717089', 'Gawas Kirti S', 'F', '17089', '', '', '13', '0', '0', '13', '0', '0', '2', '1', '3', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717094', 'Mulla Reshma Muktiar', 'F', '17094', '', '', '13', '0', '0', '13', '0', '0', '2', '1', '3', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717095', 'Mulla Simran', 'F', '17095', '', '', '13', '0', '0', '13', '0', '0', '2', '1', '3', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717097', 'Naik Rakshanda Manoj', 'F', '17097', '', '', '13', '0', '0', '13', '0', '0', '2', '1', '3', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717098', 'Naik Shrutika Subhash', 'F', '17098', '', '', '13', '0', '0', '13', '0', '0', '2', '1', '3', '13', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"13\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717100', 'Pandit Kiran Kumari', 'F', '17100', '', '', '13', '0', '0', '13', '0', '0', '2', '1', '3', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717101', 'Passi Neha', 'F', '17101', '', '', '13', '0', '0', '13', '0', '0', '2', '1', '3', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717102', 'Redkar Prachi Rajendra', 'F', '17102', '', '', '13', '0', '0', '13', '0', '0', '2', '1', '3', '13', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"13\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717103', 'Redkar Purva Rajendra', 'F', '17103', '', '', '13', '0', '0', '13', '0', '0', '2', '1', '3', '13', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"13\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717108', 'Sanjeel Sandeep Dhuri', 'M', '17108', '', '', '13', '0', '0', '13', '0', '0', '2', '1', '3', '13', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"13\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717117', 'Volvoikar Shivjay Ulhas', 'M', '17117', '', '', '13', '0', '0', '13', '0', '0', '2', '1', '3', '13', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"13\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717119', 'Vaz Milagrina Albertina', 'F', '17119', '', '', '13', '0', '0', '13', '0', '0', '2', '1', '3', '13', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"13\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717120', 'Pandit Chaitaly Anand', 'F', '17120', '', '', '13', '0', '0', '13', '0', '0', '2', '1', '3', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717122', 'Thakur Neha Krishna', 'F', '17122', '', '', '13', '0', '0', '13', '0', '0', '2', '1', '3', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717123', 'Lamani Mahesh Sitaram', 'M', '17123', '', '', '13', '0', '0', '13', '0', '0', '2', '1', '3', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717125', 'Prasad Shilpa Komal', 'F', '17125', '', '', '13', '0', '0', '13', '0', '0', '2', '1', '3', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717127', 'Honavarkar Raj Devindra', 'M', '17127', '', '', '13', '0', '0', '13', '0', '0', '2', '1', '3', '13', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"13\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717128', 'Azam Ali Rifate Azam Mohd', 'M', '17128', '', '', '13', '0', '0', '13', '0', '0', '2', '1', '3', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717129', 'Doddamani Faiza Anjum Ibrahim', 'M', '17129', '', '', '13', '0', '0', '13', '0', '0', '2', '1', '3', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717130', 'Khan Mohamed Akhil', 'M', '17130', '', '', '13', '0', '0', '13', '0', '0', '2', '1', '3', '13', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"13\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717131', 'Amonkar Anjusha Vasudev', 'F', '17131', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '4', '14', '8', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"14\":\"GE\",\"8\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717132', 'Chari Kavita Tukaram', 'F', '17132', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '4', '15', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"15\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717133', 'Chinu Tanwar', 'M', '17133', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '4', '14', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"14\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717134', 'Chunchu Tanusha Subhayya', 'F', '17134', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '4', '15', '10', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"15\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717135', 'Desai Prajakta Ashok', 'F', '17135', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '4', '15', '9', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"15\":\"GE\",\"9\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717137', 'Fernandes Ciano King', 'M', '17137', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '4', '15', '8', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"15\":\"GE\",\"8\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717138', 'Gaonkar  Shubham Ganesh', 'M', '17138', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '4', '16', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"16\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717141', 'Gourav Chand', 'M', '17141', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '4', '14', '10', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"14\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717142', 'Gurav  Pooja  Pundalik', 'F', '17142', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '4', '14', '9', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"14\":\"GE\",\"9\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717144', 'Jamadar Mohmmedzuber', 'M', '17144', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '4', '14', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"14\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717149', 'Masurkar Tanmayee  Sunil', 'M', '17149', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '4', '15', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"15\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717150', 'Misar Anant Sanjay', 'M', '17150', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '4', '16', '9', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"16\":\"GE\",\"9\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717151', 'Naik  Parvatkar Ambika Upendra', 'F', '17151', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '4', '14', '8', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"14\":\"GE\",\"8\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717152', 'Naik Smitha Shivdas', 'F', '17152', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '4', '15', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"15\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717154', 'Naik Shradha Yeshwant', 'F', '17154', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '4', '15', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"15\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717157', 'Naik  Varsha Tarachandra', 'F', '17157', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '4', '15', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"15\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717159', 'Palyekar  Sanjana  Devanand', 'F', '17159', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '4', '14', '9', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"14\":\"GE\",\"9\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717164', 'Rane Sneha Nandan', 'F', '17164', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '4', '14', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"14\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717165', 'Sonkamble  Akash  Dilip', 'M', '17165', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '4', '15', '9', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"15\":\"GE\",\"9\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717169', 'Gawas Satyam Devidas', 'M', '17169', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '4', '15', '9', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"15\":\"GE\",\"9\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717171', 'Mardolkar Siya Dinanath', 'F', '17171', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '4', '14', '10', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"14\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717173', 'Palkar Srishti Gurudas', 'F', '17173', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '4', '14', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"14\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717174', 'Sachin Chaudhary', 'M', '17174', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '4', '15', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"15\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717175', 'Kotten Reshma Jatheendran', 'F', '17175', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '4', '14', '8', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"14\":\"GE\",\"8\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717177', 'Apoorba Singh', 'F', '17177', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '4', '15', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"15\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717179', 'Mishra Chandra Prakash', 'M', '17179', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '4', '15', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"15\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717180', 'Sagali Azai Prabhudas', 'M', '17180', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '4', '15', '10', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"15\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717184', 'Chawan Swapna Mahesh', 'F', '17184', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '3', '14', '10', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"3\":\"DSC\",\"14\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717191', 'Naik Harshad Madan', 'M', '17191', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '3', '14', '9', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"3\":\"DSC\",\"14\":\"GE\",\"9\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717192', 'Naik Karunesh Ghanasham', 'M', '17192', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '3', '14', '10', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"3\":\"DSC\",\"14\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717193', 'Pawar Harshada Dinesh', 'F', '17193', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '3', '14', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"3\":\"DSC\",\"14\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717194', 'Prabhu Siddharth Paul', 'M', '17194', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '3', '15', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"3\":\"DSC\",\"15\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717200', 'Feranandes Gladwin', 'M', '17200', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '3', '15', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"3\":\"DSC\",\"15\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717202', 'Desur Moulali', 'F', '17202', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '3', '14', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"3\":\"DSC\",\"14\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717206', 'Nirmalkar Siddhesh Ganpapti', 'M', '17206', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '3', '15', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"3\":\"DSC\",\"15\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717207', 'Sawant Vedant Tulshidas', 'M', '17207', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '3', '14', '8', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"3\":\"DSC\",\"14\":\"GE\",\"8\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717208', 'Shirodkar Kritika Sonu', 'F', '17208', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '3', '14', '10', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"3\":\"DSC\",\"14\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717209', 'Karmalkar Pooja Vaman', 'F', '17209', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '3', '14', '8', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"3\":\"DSC\",\"14\":\"GE\",\"8\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717221', 'Chauhan  Beena  Anand ', 'F', '17221', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '5', '14', '10', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"5\":\"DSC\",\"14\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717223', 'Colaco  Valery', 'F', '17223', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '5', '14', '8', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"5\":\"DSC\",\"14\":\"GE\",\"8\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717225', 'Fizardo Mark Agnelo', 'M', '17225', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '5', '15', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"5\":\"DSC\",\"15\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717229', 'Kalmekar Vaibhavi  Uday ', 'M', '17229', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '5', '14', '10', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"5\":\"DSC\",\"14\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717231', 'Khorjuvekar Shreya Gajanan', 'F', '17231', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '5', '14', '10', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"5\":\"DSC\",\"14\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717234', 'Mayenkar Prachi Premanand', 'F', '17234', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '5', '14', '9', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"5\":\"DSC\",\"14\":\"GE\",\"9\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717246', 'Azrekar Samrudhi B', 'F', '17246', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '5', '14', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"5\":\"DSC\",\"14\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717247', 'Naik Saishree Balchandra', 'F', '17247', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '5', '15', '9', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"5\":\"DSC\",\"15\":\"GE\",\"9\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717251', 'Mendes Vailanka Astrid', 'F', '17251', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '5', '16', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"5\":\"DSC\",\"16\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717255', 'Fonseca Aidan Shanahan', 'M', '17255', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '5', '15', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"5\":\"DSC\",\"15\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717256', 'Estrocio Reis', 'M', '17256', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '5', '16', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"5\":\"DSC\",\"16\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717262', 'Bandodker Narayan Shrinivas', 'M', '17262', '', '', '13', '0', '0', '13', '0', '0', '6', '4', '7', '14', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"14\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717263', 'Bhat Tanisha Rajkumar', 'F', '17263', '', '', '13', '0', '0', '13', '0', '0', '6', '4', '7', '14', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"14\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717264', 'Bisht Ganesh Singh', 'M', '17264', '', '', '13', '0', '0', '13', '0', '0', '6', '4', '7', '14', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"14\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717268', 'Ferro Shawn Valen', 'M', '17268', '', '', '13', '0', '0', '13', '0', '0', '6', '4', '7', '14', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"14\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717271', 'Lobo David Neil', 'M', '17271', '', '', '13', '0', '0', '13', '0', '0', '6', '4', '7', '14', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"14\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717274', 'Malik Smitha Satish', 'F', '17274', '', '', '13', '0', '0', '13', '0', '0', '6', '4', '7', '14', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"14\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717276', 'Sinai Pissurlenkar Vibhav Virendra', 'M', '17276', '', '', '13', '0', '0', '13', '0', '0', '6', '4', '7', '14', '8', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"14\":\"GE\",\"8\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717277', 'Shaikh Sunober Shahid', 'F', '17277', '', '', '13', '0', '0', '13', '0', '0', '6', '4', '7', '14', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"14\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717278', 'Shetye Nihal Kashinath', 'M', '17278', '', '', '13', '0', '0', '13', '0', '0', '6', '4', '7', '14', '9', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"14\":\"GE\",\"9\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717281', 'Ahmad Seyar ', 'M', '17281', '', '', '13', '0', '0', '13', '0', '0', '6', '4', '7', '14', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"14\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717282', 'Samiullah', 'M', '17282', '', '', '13', '0', '0', '13', '0', '0', '6', '4', '7', '14', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"14\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717283', 'Lotlikar Tejas Deepak', 'M', '17283', '', '', '13', '0', '0', '13', '0', '0', '6', '4', '7', '14', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"14\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717285', 'Patil Apurva Ashok', 'F', '17285', '', '', '13', '0', '0', '13', '0', '0', '6', '4', '7', '14', '9', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"14\":\"GE\",\"9\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717287', 'Naik Sweta Bajirao', 'F', '17287', '', '', '13', '0', '0', '13', '0', '0', '6', '4', '7', '14', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"14\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717288', 'Sequeira Felix Rahul Dionisio', 'M', '17288', '', '', '13', '0', '0', '13', '0', '0', '6', '4', '7', '14', '8', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"14\":\"GE\",\"8\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717289', 'Vaigankar Sonal Prashant', 'F', '17289', '', '', '13', '0', '0', '13', '0', '0', '6', '4', '7', '14', '8', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"14\":\"GE\",\"8\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717291', 'Fatima Hasnabadi', 'F', '17291', '', '', '13', '0', '0', '13', '0', '0', '6', '4', '7', '14', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"14\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717292', 'Koti Shrinidhi Shreepad', 'F', '17292', '', '', '13', '0', '0', '13', '0', '0', '6', '4', '7', '14', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"14\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717296', 'Vaz Sherwin Ryan', 'M', '17296', '', '', '13', '0', '0', '13', '0', '0', '2', '1', '3', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717297', 'Khearul Wara', 'M', '17297', '', '', '13', '0', '0', '13', '0', '0', '6', '2', '4', '15', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"15\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717320', 'Almeida Austin', 'M', '17320', '', '', '13', '0', '0', '13', '0', '0', '2', '1', '3', '13', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"13\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717321', 'Dias Melisa Julia Livia', 'F', '17321', '', '', '13', '0', '0', '13', '0', '0', '2', '1', '3', '13', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"13\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717323', 'Manasi Vilasrao Shinde ', 'F', '17323', '', '', '13', '0', '0', '13', '0', '0', '2', '1', '3', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `bsc_student_detail_sem_1` VALUES ('201717324', 'Patil Ankita Namdev', 'M', '17324', '', '', '13', '0', '0', '13', '0', '0', '2', '1', '3', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');

-- ----------------------------
-- Table structure for `bsc_student_detail_sem_2`
-- ----------------------------
DROP TABLE IF EXISTS `bsc_student_detail_sem_2`;
CREATE TABLE `bsc_student_detail_sem_2` (
  `subj_details` varchar(100) DEFAULT NULL,
  `pr_number` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `seat_number` int(20) NOT NULL,
  `sports_category` varchar(40) NOT NULL,
  `sports_rewards` varchar(40) NOT NULL,
  `gen_grace_alloc` int(11) NOT NULL,
  `entitlement_grace_alloc` int(11) NOT NULL,
  `sports_grace_alloc` int(11) NOT NULL,
  `gen_grace_remain` int(11) NOT NULL,
  `entitlement_grace_remain` int(11) NOT NULL,
  `sports_grace_remain` int(11) NOT NULL,
  `subj_1` varchar(20) NOT NULL,
  `subj_2` varchar(20) NOT NULL,
  `subj_3` varchar(20) NOT NULL,
  `subj_4` varchar(20) NOT NULL,
  `subj_5` varchar(20) NOT NULL,
  `subj_6` varchar(20) NOT NULL,
  `subj_7` varchar(20) NOT NULL,
  `subj_8` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `special_priority_tag` varchar(3) NOT NULL,
  `block` tinyint(1) NOT NULL DEFAULT '0',
  `supplementary` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pr_number`,`supplementary`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bsc_student_detail_sem_2
-- ----------------------------

-- ----------------------------
-- Table structure for `bsc_student_detail_sem_3`
-- ----------------------------
DROP TABLE IF EXISTS `bsc_student_detail_sem_3`;
CREATE TABLE `bsc_student_detail_sem_3` (
  `subj_details` varchar(100) DEFAULT NULL,
  `pr_number` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `sports_category` varchar(40) NOT NULL,
  `sports_rewards` varchar(40) NOT NULL,
  `gen_grace_alloc` int(11) NOT NULL,
  `entitlement_grace_alloc` int(11) NOT NULL,
  `sports_grace_alloc` int(11) NOT NULL,
  `gen_grace_remain` int(11) NOT NULL,
  `entitlement_grace_remain` int(11) NOT NULL,
  `sports_grace_remain` int(11) NOT NULL,
  `subj_1` varchar(20) NOT NULL,
  `subj_2` varchar(20) NOT NULL,
  `subj_3` varchar(20) NOT NULL,
  `subj_4` varchar(20) NOT NULL,
  `subj_5` varchar(20) NOT NULL,
  `subj_6` varchar(20) NOT NULL,
  `subj_7` varchar(20) NOT NULL,
  `subj_8` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `seat_number` int(20) NOT NULL,
  `special_priority_tag` varchar(3) NOT NULL,
  `block` tinyint(1) NOT NULL DEFAULT '0',
  `supplementary` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`pr_number`,`supplementary`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bsc_student_detail_sem_3
-- ----------------------------

-- ----------------------------
-- Table structure for `bsc_student_detail_sem_4`
-- ----------------------------
DROP TABLE IF EXISTS `bsc_student_detail_sem_4`;
CREATE TABLE `bsc_student_detail_sem_4` (
  `subj_details` varchar(100) DEFAULT NULL,
  `pr_number` int(11) NOT NULL,
  `seat_number` int(20) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `sports_category` varchar(40) NOT NULL,
  `sports_rewards` varchar(40) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gen_grace_alloc` int(11) NOT NULL DEFAULT '0',
  `entitlement_grace_alloc` int(11) NOT NULL DEFAULT '0',
  `sports_grace_alloc` int(11) NOT NULL DEFAULT '0',
  `gen_grace_remain` int(11) NOT NULL DEFAULT '0',
  `entitlement_grace_remain` int(11) NOT NULL DEFAULT '0',
  `sports_grace_remain` int(11) NOT NULL DEFAULT '0',
  `subj_1` varchar(20) NOT NULL,
  `subj_2` varchar(20) NOT NULL,
  `subj_3` varchar(20) NOT NULL,
  `subj_4` varchar(20) NOT NULL,
  `subj_5` varchar(20) NOT NULL,
  `subj_6` varchar(20) NOT NULL,
  `subj_7` varchar(20) NOT NULL,
  `subj_8` varchar(20) NOT NULL DEFAULT '',
  `date` varchar(20) NOT NULL DEFAULT '',
  `special_priority_tag` varchar(3) NOT NULL DEFAULT '',
  `block` tinyint(1) NOT NULL DEFAULT '0',
  `supplementary` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pr_number`,`supplementary`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bsc_student_detail_sem_4
-- ----------------------------

-- ----------------------------
-- Table structure for `bsc_student_marks_sem_1`
-- ----------------------------
DROP TABLE IF EXISTS `bsc_student_marks_sem_1`;
CREATE TABLE `bsc_student_marks_sem_1` (
  `sub_id` varchar(30) NOT NULL,
  `pr_number` int(11) NOT NULL,
  `isa_abs` varchar(5) NOT NULL,
  `see_abs` varchar(5) NOT NULL,
  `pract_abs` varchar(5) NOT NULL,
  `internal` int(11) NOT NULL,
  `theory` int(11) NOT NULL,
  `practicle` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gen_symbol` varchar(11) NOT NULL,
  `activity_symbol` varchar(30) NOT NULL,
  `gen_the_symbol` varchar(11) NOT NULL,
  `gen_the_pract_sym` varchar(11) NOT NULL,
  `pass_status` varchar(11) NOT NULL,
  `pract_total` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bsc_student_marks_sem_1
-- ----------------------------

-- ----------------------------
-- Table structure for `bsc_student_marks_sem_2`
-- ----------------------------
DROP TABLE IF EXISTS `bsc_student_marks_sem_2`;
CREATE TABLE `bsc_student_marks_sem_2` (
  `sub_id` varchar(30) NOT NULL,
  `pr_number` int(11) NOT NULL,
  `isa_abs` varchar(5) NOT NULL,
  `see_abs` varchar(5) NOT NULL,
  `pract_abs` varchar(5) NOT NULL,
  `internal` int(11) NOT NULL,
  `theory` int(11) NOT NULL,
  `practicle` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gen_symbol` varchar(11) NOT NULL,
  `activity_symbol` varchar(30) NOT NULL,
  `gen_the_symbol` varchar(11) NOT NULL,
  `gen_the_pract_sym` varchar(11) NOT NULL,
  `pass_status` varchar(11) NOT NULL,
  `pract_total` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bsc_student_marks_sem_2
-- ----------------------------

-- ----------------------------
-- Table structure for `bsc_student_marks_sem_3`
-- ----------------------------
DROP TABLE IF EXISTS `bsc_student_marks_sem_3`;
CREATE TABLE `bsc_student_marks_sem_3` (
  `sub_id` varchar(30) NOT NULL,
  `pr_number` int(11) NOT NULL,
  `isa_abs` varchar(5) NOT NULL,
  `see_abs` varchar(5) NOT NULL,
  `pract_abs` varchar(5) NOT NULL,
  `internal` int(11) NOT NULL,
  `theory` int(11) NOT NULL,
  `practicle` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gen_symbol` varchar(11) NOT NULL,
  `activity_symbol` varchar(30) NOT NULL,
  `gen_the_symbol` varchar(11) NOT NULL,
  `gen_the_pract_sym` varchar(11) NOT NULL,
  `pass_status` varchar(11) NOT NULL,
  `pract_total` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bsc_student_marks_sem_3
-- ----------------------------

-- ----------------------------
-- Table structure for `bsc_student_marks_sem_4`
-- ----------------------------
DROP TABLE IF EXISTS `bsc_student_marks_sem_4`;
CREATE TABLE `bsc_student_marks_sem_4` (
  `sub_id` varchar(30) NOT NULL,
  `pr_number` int(11) NOT NULL,
  `isa_abs` varchar(5) NOT NULL,
  `see_abs` varchar(5) NOT NULL,
  `pract_abs` varchar(5) NOT NULL,
  `internal` int(11) NOT NULL,
  `theory` int(11) NOT NULL,
  `practicle` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gen_symbol` varchar(11) NOT NULL,
  `activity_symbol` varchar(30) NOT NULL,
  `gen_the_symbol` varchar(11) NOT NULL,
  `gen_the_pract_sym` varchar(11) NOT NULL,
  `pass_status` varchar(11) NOT NULL,
  `pract_total` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bsc_student_marks_sem_4
-- ----------------------------

-- ----------------------------
-- Table structure for `bsc_sub_sem_1`
-- ----------------------------
DROP TABLE IF EXISTS `bsc_sub_sem_1`;
CREATE TABLE `bsc_sub_sem_1` (
  `sub_id` varchar(50) NOT NULL,
  `semester` int(11) NOT NULL,
  `sub_name` varchar(50) NOT NULL,
  `sub_name_display` varchar(100) NOT NULL,
  `internal_marks` int(11) NOT NULL,
  `semester_marks` int(11) NOT NULL,
  `practical_marks` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `minimum_theory` int(11) NOT NULL,
  `min_practical` int(11) NOT NULL,
  `max_agg_marks` int(11) NOT NULL,
  `paper_type` varchar(30) NOT NULL,
  `subject_type` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bsc_sub_sem_1
-- ----------------------------
INSERT INTO `bsc_sub_sem_1` VALUES ('1', '1', 'DSC Botany', 'DSC Botany', '20', '80', '50', '150', '40', '10', '650', '1', 'DSC');
INSERT INTO `bsc_sub_sem_1` VALUES ('2', '1', 'DSC Chemistry', 'DSC Chemistry', '20', '80', '50', '150', '40', '10', '650', '1', 'DSC');
INSERT INTO `bsc_sub_sem_1` VALUES ('3', '1', 'DSC Geology', 'DSC Geology', '20', '80', '50', '150', '40', '10', '650', '1', 'DSC');
INSERT INTO `bsc_sub_sem_1` VALUES ('4', '1', 'DSC Maths', 'DSC Maths', '20', '80', '50', '150', '40', '10', '650', '1', 'DSC');
INSERT INTO `bsc_sub_sem_1` VALUES ('5', '1', 'DSC Zoology', 'DSC Zoology', '20', '80', '50', '150', '40', '10', '650', '1', 'DSC');
INSERT INTO `bsc_sub_sem_1` VALUES ('6', '1', 'DSC Physics', 'DSC Physics', '20', '80', '50', '150', '40', '10', '650', '1', 'DSC');
INSERT INTO `bsc_sub_sem_1` VALUES ('7', '1', 'DSC Computer Science', 'DSC Computer Science', '20', '80', '50', '150', '40', '10', '650', '1', 'DSC');
INSERT INTO `bsc_sub_sem_1` VALUES ('8', '1', 'AECC Konkani', 'AECC Konkani', '20', '80', '-1', '100', '40', '0', '650', '2', 'AECC');
INSERT INTO `bsc_sub_sem_1` VALUES ('9', '1', 'AECC Marathi', 'AECC Marathi', '15', '60', '25', '100', '40', '10', '650', '2', 'AECC');
INSERT INTO `bsc_sub_sem_1` VALUES ('10', '1', 'AECC Hindi', 'AECC Hindi', '20', '80', '-1', '100', '40', '0', '650', '2', 'AECC');
INSERT INTO `bsc_sub_sem_1` VALUES ('11', '1', 'AECC English', 'AECC English', '20', '80', '-1', '100', '40', '0', '650', '2', 'AECC');
INSERT INTO `bsc_sub_sem_1` VALUES ('12', '1', 'AECC Env. Edu.', 'AECC Env. Edu.', '20', '80', '-1', '100', '40', '0', '650', '2', 'AECC');
INSERT INTO `bsc_sub_sem_1` VALUES ('13', '1', 'GE Physics', 'GE Physics', '15', '60', '25', '100', '40', '10', '650', '3', 'GE');
INSERT INTO `bsc_sub_sem_1` VALUES ('14', '1', 'GE Botany', 'GE Botany', '20', '80', '-1', '100', '40', '0', '650', '3', 'GE');
INSERT INTO `bsc_sub_sem_1` VALUES ('15', '1', 'GE Computer Science', 'GE Computer Science', '15', '60', '25', '100', '40', '10', '650', '3', 'GE');
INSERT INTO `bsc_sub_sem_1` VALUES ('16', '1', 'GE Geology', 'GE Geology', '15', '60', '25', '100', '40', '10', '650', '3', 'GE');
INSERT INTO `bsc_sub_sem_1` VALUES ('17', '1', 'GE Biotechnology', 'GE Biotechnology', '15', '60', '25', '100', '40', '10', '650', '3', 'GE');
INSERT INTO `bsc_sub_sem_1` VALUES ('18', '1', 'DSC Chemistry (Biotech)', 'DSC Chemistry (Biotech)', '20', '80', '50', '150', '40', '10', '650', '1', 'DSC');
INSERT INTO `bsc_sub_sem_1` VALUES ('19', '1', 'DSC Zoology (Biotech)', 'DSC Zoology (Biotech)', '20', '80', '50', '150', '40', '10', '650', '1', 'DSC');
INSERT INTO `bsc_sub_sem_1` VALUES ('20', '1', 'DSC Biotechnology', 'DSC Biotechnology', '20', '80', '50', '150', '40', '10', '650', '1', 'DSC');
INSERT INTO `bsc_sub_sem_1` VALUES ('21', '1', 'AECC - English (Biotech)', 'AECC - English (Biotech)', '20', '80', '-1', '100', '40', '0', '650', '2', 'AECC');

-- ----------------------------
-- Table structure for `bsc_sub_sem_2`
-- ----------------------------
DROP TABLE IF EXISTS `bsc_sub_sem_2`;
CREATE TABLE `bsc_sub_sem_2` (
  `sub_id` varchar(50) NOT NULL,
  `semester` int(11) NOT NULL,
  `sub_name` varchar(50) NOT NULL,
  `sub_name_display` varchar(100) NOT NULL,
  `internal_marks` int(11) NOT NULL,
  `semester_marks` int(11) NOT NULL,
  `practical_marks` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `minimum_theory` int(11) NOT NULL,
  `min_practical` int(11) NOT NULL,
  `max_agg_marks` int(11) NOT NULL,
  `paper_type` varchar(30) NOT NULL,
  `subject_type` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bsc_sub_sem_2
-- ----------------------------

-- ----------------------------
-- Table structure for `bsc_sub_sem_3`
-- ----------------------------
DROP TABLE IF EXISTS `bsc_sub_sem_3`;
CREATE TABLE `bsc_sub_sem_3` (
  `sub_id` varchar(50) NOT NULL,
  `semester` int(11) NOT NULL,
  `sub_name` varchar(50) NOT NULL,
  `sub_name_display` varchar(100) NOT NULL,
  `internal_marks` int(11) NOT NULL,
  `semester_marks` int(11) NOT NULL,
  `practical_marks` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `minimum_theory` int(11) NOT NULL,
  `min_practical` int(11) NOT NULL,
  `max_agg_marks` int(11) NOT NULL,
  `paper_type` varchar(30) NOT NULL,
  `subject_type` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bsc_sub_sem_3
-- ----------------------------

-- ----------------------------
-- Table structure for `bsc_sub_sem_4`
-- ----------------------------
DROP TABLE IF EXISTS `bsc_sub_sem_4`;
CREATE TABLE `bsc_sub_sem_4` (
  `sub_id` varchar(50) NOT NULL,
  `semester` int(11) NOT NULL,
  `sub_name` varchar(50) NOT NULL,
  `sub_name_display` varchar(100) NOT NULL,
  `internal_marks` int(11) NOT NULL,
  `semester_marks` int(11) NOT NULL,
  `practical_marks` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `minimum_theory` int(11) NOT NULL,
  `min_practical` int(11) NOT NULL,
  `max_agg_marks` int(11) NOT NULL,
  `paper_type` varchar(30) NOT NULL,
  `subject_type` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bsc_sub_sem_4
-- ----------------------------

-- ----------------------------
-- Table structure for `bsc_supple_marks_sem_1`
-- ----------------------------
DROP TABLE IF EXISTS `bsc_supple_marks_sem_1`;
CREATE TABLE `bsc_supple_marks_sem_1` (
  `sub_id` varchar(30) NOT NULL,
  `pr_number` int(11) NOT NULL,
  `supple_seat_number` int(11) NOT NULL DEFAULT '0',
  `no_of_attempts` int(11) NOT NULL DEFAULT '0',
  `isa_abs` varchar(5) NOT NULL,
  `see_abs` varchar(5) NOT NULL,
  `pract_abs` varchar(5) NOT NULL,
  `internal` int(11) NOT NULL,
  `theory` int(11) NOT NULL,
  `practicle` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gen_symbol` varchar(11) NOT NULL,
  `activity_symbol` varchar(30) NOT NULL,
  `gen_the_symbol` varchar(11) NOT NULL,
  `gen_the_pract_sym` varchar(11) NOT NULL,
  `gen_grace_remain` int(11) NOT NULL DEFAULT '0',
  `nss_grace_remain` int(11) NOT NULL DEFAULT '0',
  `sports_grace_remain` int(11) NOT NULL DEFAULT '0',
  `pass_status` varchar(11) NOT NULL,
  `pract_total` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bsc_supple_marks_sem_1
-- ----------------------------

-- ----------------------------
-- Table structure for `bsc_supple_marks_sem_2`
-- ----------------------------
DROP TABLE IF EXISTS `bsc_supple_marks_sem_2`;
CREATE TABLE `bsc_supple_marks_sem_2` (
  `sub_id` varchar(30) NOT NULL,
  `pr_number` int(11) NOT NULL,
  `supple_seat_number` int(11) NOT NULL DEFAULT '0',
  `no_of_attempts` int(11) NOT NULL DEFAULT '0',
  `isa_abs` varchar(5) NOT NULL,
  `see_abs` varchar(5) NOT NULL,
  `pract_abs` varchar(5) NOT NULL,
  `internal` int(11) NOT NULL,
  `theory` int(11) NOT NULL,
  `practicle` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gen_symbol` varchar(11) NOT NULL,
  `activity_symbol` varchar(30) NOT NULL,
  `gen_the_symbol` varchar(11) NOT NULL,
  `gen_the_pract_sym` varchar(11) NOT NULL,
  `gen_grace_remain` int(11) NOT NULL DEFAULT '0',
  `nss_grace_remain` int(11) NOT NULL DEFAULT '0',
  `sports_grace_remain` int(11) NOT NULL DEFAULT '0',
  `pass_status` varchar(11) NOT NULL,
  `pract_total` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bsc_supple_marks_sem_2
-- ----------------------------

-- ----------------------------
-- Table structure for `bsc_supple_marks_sem_3`
-- ----------------------------
DROP TABLE IF EXISTS `bsc_supple_marks_sem_3`;
CREATE TABLE `bsc_supple_marks_sem_3` (
  `sub_id` varchar(30) NOT NULL,
  `pr_number` int(11) NOT NULL,
  `supple_seat_number` int(11) NOT NULL DEFAULT '0',
  `no_of_attempts` int(11) NOT NULL DEFAULT '0',
  `isa_abs` varchar(5) NOT NULL,
  `see_abs` varchar(5) NOT NULL,
  `pract_abs` varchar(5) NOT NULL,
  `internal` int(11) NOT NULL,
  `theory` int(11) NOT NULL,
  `practicle` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gen_symbol` varchar(11) NOT NULL,
  `activity_symbol` varchar(30) NOT NULL,
  `gen_the_symbol` varchar(11) NOT NULL,
  `gen_the_pract_sym` varchar(11) NOT NULL,
  `gen_grace_remain` int(11) NOT NULL DEFAULT '0',
  `nss_grace_remain` int(11) NOT NULL DEFAULT '0',
  `sports_grace_remain` int(11) NOT NULL DEFAULT '0',
  `pass_status` varchar(11) NOT NULL,
  `pract_total` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bsc_supple_marks_sem_3
-- ----------------------------

-- ----------------------------
-- Table structure for `bsc_supple_marks_sem_4`
-- ----------------------------
DROP TABLE IF EXISTS `bsc_supple_marks_sem_4`;
CREATE TABLE `bsc_supple_marks_sem_4` (
  `sub_id` varchar(30) NOT NULL,
  `pr_number` int(11) NOT NULL,
  `supple_seat_number` int(11) NOT NULL DEFAULT '0',
  `no_of_attempts` int(11) NOT NULL DEFAULT '0',
  `gen_grace_remain` int(11) NOT NULL DEFAULT '0',
  `isa_abs` varchar(5) NOT NULL,
  `see_abs` varchar(5) NOT NULL,
  `pract_abs` varchar(5) NOT NULL,
  `internal` int(11) NOT NULL,
  `theory` int(11) NOT NULL,
  `practicle` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gen_symbol` varchar(11) NOT NULL,
  `activity_symbol` varchar(30) NOT NULL,
  `gen_the_symbol` varchar(11) NOT NULL,
  `gen_the_pract_sym` varchar(11) NOT NULL,
  `nss_grace_remain` int(11) NOT NULL DEFAULT '0',
  `sports_grace_remain` int(11) NOT NULL DEFAULT '0',
  `pass_status` varchar(11) NOT NULL,
  `pract_total` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bsc_supple_marks_sem_4
-- ----------------------------

-- ----------------------------
-- Table structure for `exam_marksheet_details`
-- ----------------------------
DROP TABLE IF EXISTS `exam_marksheet_details`;
CREATE TABLE `exam_marksheet_details` (
  `exam_held_in` varchar(100) DEFAULT NULL,
  `entered_by` varchar(50) DEFAULT NULL,
  `date_of_declaration` date DEFAULT NULL,
  `date_of_issue` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of exam_marksheet_details
-- ----------------------------
INSERT INTO `exam_marksheet_details` VALUES ('April 2014', 'SN', '2014-05-27', '2014-06-06');

-- ----------------------------
-- Table structure for `sports_marks`
-- ----------------------------
DROP TABLE IF EXISTS `sports_marks`;
CREATE TABLE `sports_marks` (
  `sport_id` int(20) NOT NULL AUTO_INCREMENT,
  `category` varchar(20) NOT NULL,
  `participation` int(20) NOT NULL,
  `winner` int(20) NOT NULL,
  `runners_up` int(20) NOT NULL,
  `semi_finalist` int(20) NOT NULL,
  PRIMARY KEY (`sport_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sports_marks
-- ----------------------------
INSERT INTO `sports_marks` VALUES ('1', 'A', '28', '52', '50', '48');
INSERT INTO `sports_marks` VALUES ('2', 'B', '26', '48', '46', '44');
INSERT INTO `sports_marks` VALUES ('3', 'C', '16', '36', '32', '30');
INSERT INTO `sports_marks` VALUES ('4', 'D1', '20', '36', '32', '30');
INSERT INTO `sports_marks` VALUES ('5', 'D2', '16', '28', '24', '22');
INSERT INTO `sports_marks` VALUES ('6', 'E', '10', '16', '14', '12');
INSERT INTO `sports_marks` VALUES ('7', 'A', '28', '52', '50', '48');
INSERT INTO `sports_marks` VALUES ('8', 'B', '26', '48', '46', '44');
INSERT INTO `sports_marks` VALUES ('9', 'C', '16', '36', '32', '30');
INSERT INTO `sports_marks` VALUES ('10', 'D1', '20', '36', '32', '30');
INSERT INTO `sports_marks` VALUES ('11', 'D2', '16', '28', '24', '22');
INSERT INTO `sports_marks` VALUES ('12', 'E', '10', '16', '14', '12');

-- ----------------------------
-- Table structure for `student_temp_ba`
-- ----------------------------
DROP TABLE IF EXISTS `student_temp_ba`;
CREATE TABLE `student_temp_ba` (
  `pr_number` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `seat_number` varchar(255) DEFAULT NULL,
  `sports_category` varchar(255) DEFAULT NULL,
  `sports_rewards` varchar(255) DEFAULT NULL,
  `gen_grace_alloc` varchar(255) DEFAULT NULL,
  `entitlement_grace_alloc` varchar(255) DEFAULT NULL,
  `sports_grace_alloc` varchar(255) DEFAULT NULL,
  `gen_grace_remain` varchar(255) DEFAULT NULL,
  `entitlement_grace_remain` varchar(255) DEFAULT NULL,
  `sports_grace_remain` varchar(255) DEFAULT NULL,
  `subj_1` varchar(255) DEFAULT NULL,
  `subj_2` varchar(255) DEFAULT NULL,
  `subj_3` varchar(255) DEFAULT NULL,
  `subj_4` varchar(255) DEFAULT NULL,
  `subj_5` varchar(255) DEFAULT NULL,
  `subj_6` varchar(255) DEFAULT NULL,
  `subj_7` varchar(255) DEFAULT NULL,
  `subj_8` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `special_priority_tag` varchar(255) DEFAULT NULL,
  `block` varchar(255) DEFAULT NULL,
  `supplementary` varchar(255) DEFAULT NULL,
  `subj_details` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of student_temp_ba
-- ----------------------------
INSERT INTO `student_temp_ba` VALUES ('201717401', 'Badiger Anshwi Siddhu', 'F', '17401', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '6', '22', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"22\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717402', 'Chavariya Manaswini Rajesh', 'F', '17402', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '6', '19', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"19\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717403', 'Colaco Juvency Verrilsa ', 'F', '17403', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '6', '21', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"21\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717404', 'Dhopeshwarkar Anish Ajay', 'M', '17404', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '6', '24', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"24\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717409', 'Singh Diksha Parvinder ', 'F', '17409', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '6', '19', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"19\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717410', 'Signapurkar Sarvesh Sadu', 'M', '17410', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '6', '16', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"16\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717411', 'Sudarsan Hridya ', 'F', '17411', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '6', '19', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"19\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717412', 'Surlakar Saloni Santosh ', 'F', '17412', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '6', '21', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"21\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717413', 'Themathuk Longleng', 'M', '17413', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '6', '24', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"24\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717414', 'Abdul Qader', 'M', '17414', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '6', '24', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"24\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717416', 'Rohin', 'M', '17416', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '6', '24', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"24\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717417', 'Haseebullah', 'M', '17417', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '6', '24', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"24\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717419', 'Abdul Rauf Shah', 'M', '17419', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '6', '24', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"24\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717426', 'Fernandes Jason', 'M', '17426', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '5', '24', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"5\":\"DSC\",\"24\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717428', 'Jambavalikar Atharv Pradip', 'M', '17428', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '5', '24', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"5\":\"DSC\",\"24\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717430', 'Narvekar Manisha Subhash', 'F', '17430', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '5', '16', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"5\":\"DSC\",\"16\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717431', 'Narvekar Sanam Jeetendra', 'F', '17431', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '5', '18', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"5\":\"DSC\",\"18\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717432', 'Nawar Minu Shaheen R', 'F', '17432', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '5', '20', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"5\":\"DSC\",\"20\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717433', 'Pandit Anjali Kumari', 'F', '17433', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '5', '16', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"5\":\"DSC\",\"16\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717434', 'Ranade Pratik Prakash', 'M', '17434', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '5', '16', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"5\":\"DSC\",\"16\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717435', 'Rehmanawar Simran Hanif', 'F', '17435', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '5', '18', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"5\":\"DSC\",\"18\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717436', 'Shet Gaonkar Prachita Prasad', 'F', '17436', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '5', '24', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"5\":\"DSC\",\"24\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717442', 'Chari Gaurav Kamlesh ', 'M', '17442', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '8', '24', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"24\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717443', 'Desai Varada Rajesh ', 'F', '17443', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '8', '16', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"16\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717444', 'Dhuri Prajyot Ravindra', 'M', '17444', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '8', '24', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"24\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717446', 'Kavlekar Sandesh Nanu', 'M', '17446', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '8', '21', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"21\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717447', 'Kulam Supriya Prabhakar', 'F', '17447', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '8', '21', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"21\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717448', 'Mandrekar Anisha Nilesh', 'F', '17448', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '8', '20', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"20\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717449', 'Malvankar Yogini Dharma', 'F', '17449', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '8', '16', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"16\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717451', 'Rathod Shashikala Malesh ', 'F', '17451', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '8', '23', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"23\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717452', 'Tandel Shradha Haresh', 'F', '17452', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '8', '18', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"18\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717453', 'Desai Karishma Mohan', 'F', '17453', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '8', '23', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"23\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717461', 'Arabekar Gayatri Divakar', 'F', '17461', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '4', '7', '23', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"23\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717463', 'Diukar Priti Narayan', 'F', '17463', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '4', '7', '23', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"23\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717464', 'D’Souza Dorries Ana', 'F', '17464', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '4', '7', '16', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"16\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717466', 'Navelkar Prajay Datta', 'M', '17466', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '4', '7', '20', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"20\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717467', 'Pednekar Komal Kishor', 'F', '17467', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '4', '7', '23', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"23\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717468', 'Patekar Suryakant', 'M', '17468', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '4', '7', '24', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"24\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717469', 'Kundaikar Ayesha Ganpat', 'F', '17469', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '4', '7', '19', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"19\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717481', 'Banavalikar Akash Damodar ', 'M', '17481', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '4', '9', '22', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"4\":\"DSC\",\"9\":\"DSC\",\"22\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717483', 'Govekar Navita Kundan ', 'F', '17483', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '4', '9', '19', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"4\":\"DSC\",\"9\":\"DSC\",\"19\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717484', 'Kerekar Dimple Dnyaneshwar', 'F', '17484', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '4', '9', '19', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"4\":\"DSC\",\"9\":\"DSC\",\"19\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717485', 'Kumari Chandani', 'F', '17485', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '4', '9', '17', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"4\":\"DSC\",\"9\":\"DSC\",\"17\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717486', 'Mandaki Sanam', 'F', '17486', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '4', '9', '20', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"4\":\"DSC\",\"9\":\"DSC\",\"20\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717487', 'Mulla Ashia Shakir', 'F', '17487', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '4', '9', '19', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"4\":\"DSC\",\"9\":\"DSC\",\"19\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717488', 'Pujari Sujata Chandrasha ', 'F', '17488', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '4', '9', '20', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"4\":\"DSC\",\"9\":\"DSC\",\"20\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717489', 'Redkar Ashvitha Ranganath', 'F', '17489', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '4', '9', '16', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"4\":\"DSC\",\"9\":\"DSC\",\"16\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717490', 'Reddy Reshma Vijay ', 'F', '17490', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '4', '9', '20', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"4\":\"DSC\",\"9\":\"DSC\",\"20\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717491', 'Sawant Sanjana Dayanand ', 'F', '17491', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '4', '9', '22', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"4\":\"DSC\",\"9\":\"DSC\",\"22\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717492', 'Thakur Krupa Krishna', 'F', '17492', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '4', '9', '17', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"4\":\"DSC\",\"9\":\"DSC\",\"17\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717493', 'Gaonkar Chandan Chandrakant', 'M', '17493', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '4', '9', '22', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"4\":\"DSC\",\"9\":\"DSC\",\"22\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717501', 'Almeida Claniffa Emmanuela', 'F', '17501', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '3', '7', '19', '11', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"7\":\"DSC\",\"19\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717502', 'Baretto Prisella', 'F', '17502', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '3', '7', '18', '14', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"7\":\"DSC\",\"18\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717503', 'Bhonsle Sanjog Maheshwar', 'M', '17503', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '3', '7', '18', '14', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"7\":\"DSC\",\"18\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717504', 'D’Souza Delia Maria Monica', 'F', '17504', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '3', '7', '18', '14', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"7\":\"DSC\",\"18\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717505', 'Faleiro Antonio Ronaldo', 'M', '17505', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '3', '7', '18', '14', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"7\":\"DSC\",\"18\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717506', 'Kudtarkar Sobita Shaba', 'F', '17506', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '3', '7', '19', '14', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"7\":\"DSC\",\"19\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717509', 'Pires Joel Agnelo', 'M', '17509', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '3', '7', '15', '11', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"7\":\"DSC\",\"15\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717510', 'Rivankar Vidhya Alias Shevanti Vinayak', 'F', '17510', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '3', '7', '22', '14', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"7\":\"DSC\",\"22\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717511', 'Thoralipaty Vidhi Venkataraman', 'F', '17511', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '3', '7', '18', '14', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"7\":\"DSC\",\"18\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717514', 'Praveen Kumar Gaunder', 'M', '17514', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '3', '7', '15', '14', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"7\":\"DSC\",\"15\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717521', 'Bidi Saherabanu Babusahab', 'F', '17521', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '3', '9', '15', '13', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"9\":\"DSC\",\"15\":\"GE\",\"13\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717522', 'Chodankar Kapila Alias Neha Suresh', 'F', '17522', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '3', '9', '19', '12', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"9\":\"DSC\",\"19\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717523', 'Gaonkar Jayditya Anand  ', 'M', '17523', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '3', '9', '18', '11', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"9\":\"DSC\",\"18\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717524', 'Gupta Dharam Raj Naval', 'M', '17524', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '3', '9', '18', '12', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"9\":\"DSC\",\"18\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717525', 'Naik Harshada Dilip', 'F', '17525', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '3', '9', '20', '12', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"9\":\"DSC\",\"20\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717526', 'Naik Sagar Gopinath ', 'M', '17526', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '3', '9', '20', '12', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"9\":\"DSC\",\"20\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717527', 'Naik Snehal Shamno ', 'F', '17527', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '3', '9', '22', '12', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"9\":\"DSC\",\"22\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717528', 'Narer Nandini Maruti', 'F', '17528', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '3', '9', '18', '12', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"9\":\"DSC\",\"18\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717529', 'Sawant Akash Ajit ', 'M', '17529', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '3', '9', '20', '12', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"9\":\"DSC\",\"20\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717530', 'Sawant Abhilesh Vasudev ', 'M', '17530', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '3', '9', '22', '13', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"9\":\"DSC\",\"22\":\"GE\",\"13\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717532', 'Rodrigues Emie', 'F', '17532', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '3', '9', '18', '11', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"9\":\"DSC\",\"18\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717541', 'Dhulapkar Shaina Purushottam', 'F', '17541', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '6', '21', '12', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"21\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717542', 'Gonsalves Aldridge Darren', 'M', '17542', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '6', '24', '11', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"24\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717543', 'Kankonkar Pravin Bhanudas ', 'M', '17543', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '6', '17', '14', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"17\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717544', 'Kamble Rajnandini Ashok', 'F', '17544', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '6', '23', '11', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"23\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717545', 'Lotlikar Sneha Ashish', 'F', '17545', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '6', '17', '12', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"17\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717546', 'Monteiro Joyella Ana', 'F', '17546', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '6', '21', '11', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"21\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717547', 'Mokhashi Taskin Banu', 'F', '17547', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '6', '17', '12', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"17\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717549', 'Naik Manjunath Nagraj ', 'M', '17549', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '6', '15', '12', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717550', 'Patil Yeshwant Ram', 'M', '17550', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '6', '17', '12', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"17\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717551', 'Pereira Jovi Ansly ', 'M', '17551', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '6', '15', '11', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"15\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717552', 'Sehrawat Ankit Arun Kumar', 'M', '17552', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '6', '15', '11', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"15\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717553', 'Sairaj  Satyawan Kinalker ', 'M', '17553', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '6', '24', '14', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"24\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717561', 'Bhangle Akshay Mohandas', 'M', '17561', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '8', '17', '13', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"8\":\"DSC\",\"17\":\"GE\",\"13\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717562', 'Bhonsle Aparna Manguesh', 'F', '17562', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '8', '17', '12', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"8\":\"DSC\",\"17\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717564', 'Ghadi Sonali Dilip', 'F', '17564', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '8', '23', '13', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"8\":\"DSC\",\"23\":\"GE\",\"13\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717565', 'Halankar Gayatri Jaiprakash', 'F', '17565', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '8', '17', '13', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"8\":\"DSC\",\"17\":\"GE\",\"13\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717566', 'Halankar Leenali Mahadev', 'F', '17566', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '8', '23', '13', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"8\":\"DSC\",\"23\":\"GE\",\"13\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717567', 'Kunkalkar Priyanka Vinayak ', 'F', '17567', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '8', '15', '13', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"8\":\"DSC\",\"15\":\"GE\",\"13\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717568', 'Kunkalekar Sushmita Ganesh', 'F', '17568', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '8', '17', '13', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"8\":\"DSC\",\"17\":\"GE\",\"13\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717569', 'Redkar Devika Dhanyavan', 'F', '17569', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '8', '20', '12', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"8\":\"DSC\",\"20\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717570', 'Sawant Saharsha Sandeep', 'F', '17570', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '8', '17', '13', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"8\":\"DSC\",\"17\":\"GE\",\"13\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717571', 'Taypi Mahadevi Basappa ', 'F', '17571', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '8', '17', '13', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"8\":\"DSC\",\"17\":\"GE\",\"13\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717572', 'Rupal Rajan Sawant', 'F', '17572', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '8', '21', '13', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"8\":\"DSC\",\"21\":\"GE\",\"13\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717581', 'Antao Andria Ruby', 'F', '17581', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '5', '15', '11', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"5\":\"DSC\",\"15\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717582', 'Chari Shraddha Subhash', 'F', '17582', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '5', '15', '14', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"5\":\"DSC\",\"15\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717584', 'Fernandes Aaron Francis', 'M', '17584', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '5', '21', '11', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"5\":\"DSC\",\"21\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717585', 'Fernandes Senova Perpetual', 'F', '17585', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '5', '21', '11', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"5\":\"DSC\",\"21\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717586', 'Govekar Natasha Kundan ', 'F', '17586', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '5', '15', '11', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"5\":\"DSC\",\"15\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717588', 'Ribeiro Murushca Meher Elsa', 'F', '17588', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '5', '17', '11', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"5\":\"DSC\",\"17\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717589', 'Rodrigues Renny Latika', 'F', '17589', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '5', '21', '11', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"5\":\"DSC\",\"21\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717591', 'Sawant Shriya Vishwanath', 'F', '17591', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '5', '23', '12', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"5\":\"DSC\",\"23\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717593', 'V M Athulya', 'F', '17593', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '5', '24', '11', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"5\":\"DSC\",\"24\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717602', 'Coutinho Tefla', 'F', '17602', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '6', '16', '14', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"16\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717603', 'D’Cruz Vanessa Angie Eliza ', 'F', '17603', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '6', '21', '14', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"21\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717605', 'Gokarn Nivedita Jitendra', 'F', '17605', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '6', '16', '11', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"16\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717607', 'Paswan Manisha Kumari Krishna ', 'F', '17607', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '6', '19', '11', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"19\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717608', 'Parwar Vignesha Kashinath ', 'F', '17608', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '6', '22', '13', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"22\":\"GE\",\"13\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717609', 'Shaikh Aasfa Abdul Wahab', 'F', '17609', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '6', '16', '14', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"16\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717610', 'Shaikh Gulubsha Mehabubsab', 'F', '17610', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '6', '18', '12', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"18\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717618', 'Kandolkar Abhishek Babli', 'M', '17618', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '8', '24', '13', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"24\":\"GE\",\"13\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717619', 'Kautankar Ganga Krishnanath', 'F', '17619', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '8', '16', '13', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"16\":\"GE\",\"13\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717621', 'Khandeparkar Mahadev Pundalik', 'M', '17621', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '8', '16', '12', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"16\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717622', 'Madgi Pooja Mahadev', 'F', '17622', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '8', '20', '12', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"20\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717623', 'Mandrekar Shubham Sadanand', 'M', '17623', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '8', '16', '12', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"16\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717631', 'Volvoikar Deven Devanand', 'M', '17631', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '4', '7', '24', '14', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"24\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717632', 'Arleshwar Pallavi Bhasawraj', 'F', '17632', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '4', '7', '16', '12', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"16\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717633', 'Kundaikar Aniket Anant', 'M', '17633', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '4', '7', '23', '14', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"23\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717636', 'Cardozo Alicia Maria', 'F', '17636', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '3', '7', '23', '14', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"7\":\"DSC\",\"23\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717637', 'Cardozo Juliana Violant', 'F', '17637', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '3', '7', '19', '14', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"7\":\"DSC\",\"19\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717639', 'Gaonkar Mamata Kamlakant', 'F', '17639', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '3', '7', '18', '14', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"7\":\"DSC\",\"18\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717640', 'Gaude Rajesh Yeshwant', 'M', '17640', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '3', '7', '20', '14', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"7\":\"DSC\",\"20\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717641', 'Halarneker Ketan Gurudas', 'M', '17641', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '3', '7', '20', '14', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"7\":\"DSC\",\"20\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717642', 'Hosmani Sainath  Maruti', 'M', '17642', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '3', '7', '18', '14', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"7\":\"DSC\",\"18\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717643', 'Jambhale Siddhant Dattatray', 'M', '17643', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '3', '7', '22', '11', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"7\":\"DSC\",\"22\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717644', 'Kankonkar Prachi Devendra', 'F', '17644', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '3', '7', '22', '13', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"7\":\"DSC\",\"22\":\"GE\",\"13\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717657', 'Khan Afrin', 'F', '17657', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '3', '9', '18', '12', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"9\":\"DSC\",\"18\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717658', 'Goundi Shaikh Afridi Abbasali', 'M', '17658', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '3', '9', '21', '12', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"9\":\"DSC\",\"21\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717660', 'Shaikh Rahiza', 'F', '17660', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '3', '9', '18', '12', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"9\":\"DSC\",\"18\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717661', 'Virnodkar Sandila Sagun', 'F', '17661', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '3', '9', '22', '13', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"9\":\"DSC\",\"22\":\"GE\",\"13\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717664', 'Raul Tanvi Amarnath', 'F', '17664', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '3', '9', '18', '12', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"9\":\"DSC\",\"18\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717667', 'Davangiri Khushnuda Abdul Rahman', 'F', '17667', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '6', '23', '12', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"23\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717668', 'Fernandes Gail Jesusa', 'M', '17668', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '6', '15', '11', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"15\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717670', 'Hosamani Manjunath Ningappa', 'M', '17670', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '6', '22', '13', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"22\":\"GE\",\"13\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717671', 'Kamble Shubham Shivaji', 'M', '17671', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '6', '22', '13', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"22\":\"GE\",\"13\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717672', 'Mulgaonkar Umesh Damodar', 'M', '17672', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '6', '21', '14', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"21\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717673', 'Naik Pratiksha Pandurang', 'F', '17673', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '6', '22', '13', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"22\":\"GE\",\"13\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717674', 'Sahil Laxman Fadte', 'M', '17674', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '6', '22', '13', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"22\":\"GE\",\"13\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717676', 'Shaikh Ruksaar Vahid', 'F', '17676', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '6', '15', '11', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"15\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717677', 'Kumar Amit', 'M', '17677', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '6', '23', '12', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"23\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717678', 'Chhhoi Hyonghwan ', 'M', '17678', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '6', '15', '11', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"15\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717681', 'Ashly Praveen', 'M', '17681', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '5', '17', '11', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"5\":\"DSC\",\"17\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717683', 'Goswami Nikita V', 'F', '17683', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '5', '23', '12', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"5\":\"DSC\",\"23\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717684', 'De Araujo Lindsey Lourdes', 'M', '17684', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '5', '20', '11', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"5\":\"DSC\",\"20\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717685', 'Kamu Neha Maruti', 'F', '17685', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '5', '23', '12', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"5\":\"DSC\",\"23\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717687', 'Multani Diksha Ghansham ', 'F', '17687', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '5', '20', '12', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"5\":\"DSC\",\"20\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717688', 'Naik Sahil Umesh', 'M', '17688', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '5', '21', '14', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"5\":\"DSC\",\"21\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717689', 'Neeraj Sureshkumar', 'M', '17689', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '5', '21', '12', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"5\":\"DSC\",\"21\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717691', 'Kamath Niharika Kiran', 'F', '17691', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '5', '15', '11', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"5\":\"DSC\",\"15\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717692', 'Shetye Akshaya Ranjeet', 'F', '17692', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '5', '22', '14', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"5\":\"DSC\",\"22\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717693', 'Sharma Khushboo Vinod', 'F', '17693', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '5', '23', '12', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"5\":\"DSC\",\"23\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717694', 'Saxena Sahili Shailendra', 'F', '17694', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '5', '23', '12', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"5\":\"DSC\",\"23\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717406', 'KerkarSurabhi Vasudev', 'F', '17406', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '6', '23', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"23\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717407', 'Mule Purva Ganesh', 'F', '17407', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '6', '23', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"23\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717408', 'Naik Vandita Shailesh', 'F', '17408', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '6', '22', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"22\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717415', 'Hamid Akbar', 'M', '17415', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '6', '24', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"24\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717418', 'Abdul Hakim', 'M', '17418', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '6', '24', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"24\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717421', 'Abobaker', 'M', '17421', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '6', '24', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"24\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717427', 'Kundaikar Tosheeta Manguesh', 'F', '17427', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '5', '20', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"5\":\"DSC\",\"20\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717441', 'Balli Rima', 'F', '17441', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '8', '23', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"23\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717462', 'Cardozo Rodney', 'M', '17462', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '4', '7', '24', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"24\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717482', 'Fadte Siya Gajanan', 'F', '17482', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '4', '9', '19', '10', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"4\":\"DSC\",\"9\":\"DSC\",\"19\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717513', 'Ankita Nitish Kavlekar', 'F', '17513', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '3', '7', '23', '14', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"7\":\"DSC\",\"23\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717587', 'Mishra Pornima Rajeshkumar', 'F', '17587', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '5', '23', '12', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"5\":\"DSC\",\"23\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717611', 'Shaikh Reehan Kausar', 'M', '17611', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '6', '23', '12', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"DSC\",\"23\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717620', 'Kalapurkar Vidhya Govind', 'F', '17620', '', '', '15', '0', '0', '15', '0', '0', '25', '1', '3', '8', '20', '13', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"20\":\"GE\",\"13\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717645', 'Naik Kavita Krishna', 'F', '17645', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '3', '7', '20', '14', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"3\":\"DSC\",\"7\":\"DSC\",\"20\":\"GE\",\"14\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717669', 'Gad Ashutosh Arjun', 'M', '17669', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '6', '22', '13', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"22\":\"GE\",\"13\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717682', 'Butaney Jazia Shania Sandeep', 'F', '17682', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '5', '24', '11', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"5\":\"DSC\",\"24\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba` VALUES ('201717690', 'Seniz Angela Rego', 'F', '17690', '', '', '15', '0', '0', '15', '0', '0', '25', '2', '4', '5', '23', '11', '', '', '0000-00-00', '', '0', '0', '{\"25\":\"CC\",\"2\":\"DSC\",\"4\":\"DSC\",\"5\":\"DSC\",\"23\":\"GE\",\"11\":\"AECC\"}');

-- ----------------------------
-- Table structure for `student_temp_ba_copy`
-- ----------------------------
DROP TABLE IF EXISTS `student_temp_ba_copy`;
CREATE TABLE `student_temp_ba_copy` (
  `pr_number` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `seat_number` varchar(255) DEFAULT NULL,
  `sports_category` varchar(255) DEFAULT NULL,
  `sports_rewards` varchar(255) DEFAULT NULL,
  `gen_grace_alloc` varchar(255) DEFAULT NULL,
  `entitlement_grace_alloc` varchar(255) DEFAULT NULL,
  `sports_grace_alloc` varchar(255) DEFAULT NULL,
  `gen_grace_remain` varchar(255) DEFAULT NULL,
  `entitlement_grace_remain` varchar(255) DEFAULT NULL,
  `sports_grace_remain` varchar(255) DEFAULT NULL,
  `subj_1` varchar(255) DEFAULT NULL,
  `subj_2` varchar(255) DEFAULT NULL,
  `subj_3` varchar(255) DEFAULT NULL,
  `subj_4` varchar(255) DEFAULT NULL,
  `subj_5` varchar(255) DEFAULT NULL,
  `subj_6` varchar(255) DEFAULT NULL,
  `subj_7` varchar(255) DEFAULT NULL,
  `subj_8` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `special_priority_tag` varchar(255) DEFAULT NULL,
  `block` varchar(255) DEFAULT NULL,
  `supplementary` varchar(255) DEFAULT NULL,
  `subj_details` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of student_temp_ba_copy
-- ----------------------------
INSERT INTO `student_temp_ba_copy` VALUES ('201717401', 'Badiger Anshwi Siddhu', 'F', '17401', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '9', '3', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"9\":\"DSC\",\"3\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717402', 'Chavariya Manaswini Rajesh', 'F', '17402', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '9', '5', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"9\":\"DSC\",\"5\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717403', 'Colaco Juvency Verrilsa ', 'F', '17403', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '9', '2', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"9\":\"DSC\",\"2\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717404', 'Dhopeshwarkar Anish Ajay', 'M', '17404', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '9', '12', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"9\":\"DSC\",\"12\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717409', 'Singh Diksha Parvinder ', 'F', '17409', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '9', '5', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"9\":\"DSC\",\"5\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717410', 'Signapurkar Sarvesh Sadu', 'M', '17410', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '9', '8', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"9\":\"DSC\",\"8\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717411', 'Sudarsan Hridya ', 'F', '17411', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '9', '5', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"9\":\"DSC\",\"5\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717412', 'Surlakar Saloni Santosh ', 'F', '17412', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '9', '2', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"9\":\"DSC\",\"2\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717413', 'Themathuk Longleng', 'M', '17413', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '9', '12', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"9\":\"DSC\",\"12\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717414', 'Abdul Qader', 'M', '17414', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '9', '12', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"9\":\"DSC\",\"12\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717416', 'Rohin', 'M', '17416', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '9', '12', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"9\":\"DSC\",\"12\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717417', 'Haseebullah', 'M', '17417', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '9', '12', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"9\":\"DSC\",\"12\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717419', 'Abdul Rauf Shah', 'M', '17419', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '9', '12', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"9\":\"DSC\",\"12\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717426', 'Fernandes Jason', 'M', '17426', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '5', '12', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"5\":\"DSC\",\"12\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717428', 'Jambavalikar Atharv Pradip', 'M', '17428', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '5', '12', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"5\":\"DSC\",\"12\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717430', 'Narvekar Manisha Subhash', 'F', '17430', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '5', '8', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"5\":\"DSC\",\"8\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717431', 'Narvekar Sanam Jeetendra', 'F', '17431', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '5', '7', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"5\":\"DSC\",\"7\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717432', 'Nawar Minu Shaheen R', 'F', '17432', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '5', '9', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"5\":\"DSC\",\"9\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717433', 'Pandit Anjali Kumari', 'F', '17433', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '5', '8', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"5\":\"DSC\",\"8\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717434', 'Ranade Pratik Prakash', 'M', '17434', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '5', '8', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"5\":\"DSC\",\"8\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717435', 'Rehmanawar Simran Hanif', 'F', '17435', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '5', '7', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"5\":\"DSC\",\"7\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717436', 'Shet Gaonkar Prachita Prasad', 'F', '17436', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '5', '12', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"5\":\"DSC\",\"12\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717442', 'Chari Gaurav Kamlesh ', 'M', '17442', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '3', '12', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"3\":\"DSC\",\"12\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717443', 'Desai Varada Rajesh ', 'F', '17443', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '3', '8', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"3\":\"DSC\",\"8\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717444', 'Dhuri Prajyot Ravindra', 'M', '17444', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '3', '12', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"3\":\"DSC\",\"12\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717446', 'Kavlekar Sandesh Nanu', 'M', '17446', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '3', '2', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"3\":\"DSC\",\"2\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717447', 'Kulam Supriya Prabhakar', 'F', '17447', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '3', '2', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"3\":\"DSC\",\"2\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717448', 'Mandrekar Anisha Nilesh', 'F', '17448', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '3', '9', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"3\":\"DSC\",\"9\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717449', 'Malvankar Yogini Dharma', 'F', '17449', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '3', '8', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"3\":\"DSC\",\"8\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717451', 'Rathod Shashikala Malesh ', 'F', '17451', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '3', '4', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"3\":\"DSC\",\"4\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717452', 'Tandel Shradha Haresh', 'F', '17452', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '3', '7', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"3\":\"DSC\",\"7\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717453', 'Desai Karishma Mohan', 'F', '17453', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '3', '4', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"3\":\"DSC\",\"4\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717461', 'Arabekar Gayatri Divakar', 'F', '17461', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '7', '2', '4', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"7\":\"DSC\",\"2\":\"DSC\",\"4\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717463', 'Diukar Priti Narayan', 'F', '17463', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '7', '2', '4', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"7\":\"DSC\",\"2\":\"DSC\",\"4\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717464', 'D’Souza Dorries Ana', 'F', '17464', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '7', '2', '8', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"7\":\"DSC\",\"2\":\"DSC\",\"8\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717466', 'Navelkar Prajay Datta', 'M', '17466', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '7', '2', '9', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"7\":\"DSC\",\"2\":\"DSC\",\"9\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717467', 'Pednekar Komal Kishor', 'F', '17467', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '7', '2', '4', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"7\":\"DSC\",\"2\":\"DSC\",\"4\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717468', 'Patekar Suryakant', 'M', '17468', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '7', '2', '12', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"7\":\"DSC\",\"2\":\"DSC\",\"12\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717469', 'Kundaikar Ayesha Ganpat', 'F', '17469', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '7', '2', '5', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"7\":\"DSC\",\"2\":\"DSC\",\"5\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717481', 'Banavalikar Akash Damodar ', 'M', '17481', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '7', '4', '3', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"7\":\"DSC\",\"4\":\"DSC\",\"3\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717483', 'Govekar Navita Kundan ', 'F', '17483', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '7', '4', '5', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"7\":\"DSC\",\"4\":\"DSC\",\"5\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717484', 'Kerekar Dimple Dnyaneshwar', 'F', '17484', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '7', '4', '5', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"7\":\"DSC\",\"4\":\"DSC\",\"5\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717485', 'Kumari Chandani', 'F', '17485', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '7', '4', '10', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"7\":\"DSC\",\"4\":\"DSC\",\"10\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717486', 'Mandaki Sanam', 'F', '17486', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '7', '4', '9', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"7\":\"DSC\",\"4\":\"DSC\",\"9\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717487', 'Mulla Ashia Shakir', 'F', '17487', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '7', '4', '5', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"7\":\"DSC\",\"4\":\"DSC\",\"5\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717488', 'Pujari Sujata Chandrasha ', 'F', '17488', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '7', '4', '9', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"7\":\"DSC\",\"4\":\"DSC\",\"9\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717489', 'Redkar Ashvitha Ranganath', 'F', '17489', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '7', '4', '8', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"7\":\"DSC\",\"4\":\"DSC\",\"8\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717490', 'Reddy Reshma Vijay ', 'F', '17490', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '7', '4', '9', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"7\":\"DSC\",\"4\":\"DSC\",\"9\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717491', 'Sawant Sanjana Dayanand ', 'F', '17491', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '7', '4', '3', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"7\":\"DSC\",\"4\":\"DSC\",\"3\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717492', 'Thakur Krupa Krishna', 'F', '17492', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '7', '4', '10', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"7\":\"DSC\",\"4\":\"DSC\",\"10\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717493', 'Gaonkar Chandan Chandrakant', 'M', '17493', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '7', '4', '3', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"7\":\"DSC\",\"4\":\"DSC\",\"3\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717501', 'Almeida Claniffa Emmanuela', 'F', '17501', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '10', '2', '5', '8', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"10\":\"DSC\",\"2\":\"DSC\",\"5\":\"GE,\"\"8\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717502', 'Baretto Prisella', 'F', '17502', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '10', '2', '7', '2', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"10\":\"DSC\",\"2\":\"DSC\",\"7\":\"GE,\"\"2\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717503', 'Bhonsle Sanjog Maheshwar', 'M', '17503', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '10', '2', '7', '2', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"10\":\"DSC\",\"2\":\"DSC\",\"7\":\"GE,\"\"2\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717504', 'D’Souza Delia Maria Monica', 'F', '17504', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '10', '2', '7', '2', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"10\":\"DSC\",\"2\":\"DSC\",\"7\":\"GE,\"\"2\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717505', 'Faleiro Antonio Ronaldo', 'M', '17505', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '10', '2', '7', '2', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"10\":\"DSC\",\"2\":\"DSC\",\"7\":\"GE,\"\"2\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717506', 'Kudtarkar Sobita Shaba', 'F', '17506', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '10', '2', '5', '2', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"10\":\"DSC\",\"2\":\"DSC\",\"5\":\"GE,\"\"2\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717509', 'Pires Joel Agnelo', 'M', '17509', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '10', '2', '6', '8', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"10\":\"DSC\",\"2\":\"DSC\",\"6\":\"GE,\"\"8\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717510', 'Rivankar Vidhya Alias Shevanti Vinayak', 'F', '17510', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '10', '2', '3', '2', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"10\":\"DSC\",\"2\":\"DSC\",\"3\":\"GE,\"\"2\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717511', 'Thoralipaty Vidhi Venkataraman', 'F', '17511', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '10', '2', '7', '2', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"10\":\"DSC\",\"2\":\"DSC\",\"7\":\"GE,\"\"2\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717514', 'Praveen Kumar Gaunder', 'M', '17514', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '10', '2', '6', '2', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"10\":\"DSC\",\"2\":\"DSC\",\"6\":\"GE,\"\"2\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717521', 'Bidi Saherabanu Babusahab', 'F', '17521', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '10', '4', '6', '3', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"10\":\"DSC\",\"4\":\"DSC\",\"6\":\"GE,\"\"3\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717522', 'Chodankar Kapila Alias Neha Suresh', 'F', '17522', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '10', '4', '5', '4', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"10\":\"DSC\",\"4\":\"DSC\",\"5\":\"GE,\"\"4\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717523', 'Gaonkar Jayditya Anand  ', 'M', '17523', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '10', '4', '7', '8', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"10\":\"DSC\",\"4\":\"DSC\",\"7\":\"GE,\"\"8\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717524', 'Gupta Dharam Raj Naval', 'M', '17524', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '10', '4', '7', '4', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"10\":\"DSC\",\"4\":\"DSC\",\"7\":\"GE,\"\"4\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717525', 'Naik Harshada Dilip', 'F', '17525', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '10', '4', '9', '4', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"10\":\"DSC\",\"4\":\"DSC\",\"9\":\"GE,\"\"4\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717526', 'Naik Sagar Gopinath ', 'M', '17526', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '10', '4', '9', '4', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"10\":\"DSC\",\"4\":\"DSC\",\"9\":\"GE,\"\"4\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717527', 'Naik Snehal Shamno ', 'F', '17527', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '10', '4', '3', '4', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"10\":\"DSC\",\"4\":\"DSC\",\"3\":\"GE,\"\"4\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717528', 'Narer Nandini Maruti', 'F', '17528', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '10', '4', '7', '4', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"10\":\"DSC\",\"4\":\"DSC\",\"7\":\"GE,\"\"4\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717529', 'Sawant Akash Ajit ', 'M', '17529', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '10', '4', '9', '4', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"10\":\"DSC\",\"4\":\"DSC\",\"9\":\"GE,\"\"4\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717530', 'Sawant Abhilesh Vasudev ', 'M', '17530', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '10', '4', '3', '3', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"10\":\"DSC\",\"4\":\"DSC\",\"3\":\"GE,\"\"3\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717532', 'Rodrigues Emie', 'F', '17532', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '10', '4', '7', '8', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"10\":\"DSC\",\"4\":\"DSC\",\"7\":\"GE,\"\"8\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717541', 'Dhulapkar Shaina Purushottam', 'F', '17541', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '9', '2', '4', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"9\":\"DSC\",\"2\":\"GE,\"\"4\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717542', 'Gonsalves Aldridge Darren', 'M', '17542', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '9', '12', '8', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"9\":\"DSC\",\"12\":\"GE,\"\"8\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717543', 'Kankonkar Pravin Bhanudas ', 'M', '17543', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '9', '10', '2', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"9\":\"DSC\",\"10\":\"GE,\"\"2\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717544', 'Kamble Rajnandini Ashok', 'F', '17544', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '9', '4', '8', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"9\":\"DSC\",\"4\":\"GE,\"\"8\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717545', 'Lotlikar Sneha Ashish', 'F', '17545', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '9', '10', '4', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"9\":\"DSC\",\"10\":\"GE,\"\"4\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717546', 'Monteiro Joyella Ana', 'F', '17546', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '9', '2', '8', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"9\":\"DSC\",\"2\":\"GE,\"\"8\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717547', 'Mokhashi Taskin Banu', 'F', '17547', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '9', '10', '4', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"9\":\"DSC\",\"10\":\"GE,\"\"4\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717549', 'Naik Manjunath Nagraj ', 'M', '17549', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '9', '6', '4', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"9\":\"DSC\",\"6\":\"GE,\"\"4\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717550', 'Patil Yeshwant Ram', 'M', '17550', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '9', '10', '4', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"9\":\"DSC\",\"10\":\"GE,\"\"4\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717551', 'Pereira Jovi Ansly ', 'M', '17551', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '9', '6', '8', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"9\":\"DSC\",\"6\":\"GE,\"\"8\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717552', 'Sehrawat Ankit Arun Kumar', 'M', '17552', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '9', '6', '8', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"9\":\"DSC\",\"6\":\"GE,\"\"8\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717553', 'Sairaj  Satyawan Kinalker ', 'M', '17553', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '9', '12', '2', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"9\":\"DSC\",\"12\":\"GE,\"\"2\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717561', 'Bhangle Akshay Mohandas', 'M', '17561', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '3', '10', '3', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"3\":\"DSC\",\"10\":\"GE,\"\"3\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717562', 'Bhonsle Aparna Manguesh', 'F', '17562', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '3', '10', '4', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"3\":\"DSC\",\"10\":\"GE,\"\"4\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717564', 'Ghadi Sonali Dilip', 'F', '17564', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '3', '4', '3', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"3\":\"DSC\",\"4\":\"GE,\"\"3\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717565', 'Halankar Gayatri Jaiprakash', 'F', '17565', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '3', '10', '3', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"3\":\"DSC\",\"10\":\"GE,\"\"3\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717566', 'Halankar Leenali Mahadev', 'F', '17566', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '3', '4', '3', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"3\":\"DSC\",\"4\":\"GE,\"\"3\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717567', 'Kunkalkar Priyanka Vinayak ', 'F', '17567', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '3', '6', '3', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"3\":\"DSC\",\"6\":\"GE,\"\"3\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717568', 'Kunkalekar Sushmita Ganesh', 'F', '17568', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '3', '10', '3', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"3\":\"DSC\",\"10\":\"GE,\"\"3\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717569', 'Redkar Devika Dhanyavan', 'F', '17569', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '3', '9', '4', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"3\":\"DSC\",\"9\":\"GE,\"\"4\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717570', 'Sawant Saharsha Sandeep', 'F', '17570', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '3', '10', '3', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"3\":\"DSC\",\"10\":\"GE,\"\"3\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717571', 'Taypi Mahadevi Basappa ', 'F', '17571', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '3', '10', '3', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"3\":\"DSC\",\"10\":\"GE,\"\"3\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717572', 'Rupal Rajan Sawant', 'F', '17572', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '3', '2', '3', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"3\":\"DSC\",\"2\":\"GE,\"\"3\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717581', 'Antao Andria Ruby', 'F', '17581', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '5', '6', '8', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"5\":\"DSC\",\"6\":\"GE,\"\"8\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717582', 'Chari Shraddha Subhash', 'F', '17582', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '5', '6', '2', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"5\":\"DSC\",\"6\":\"GE,\"\"2\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717584', 'Fernandes Aaron Francis', 'M', '17584', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '5', '2', '8', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"5\":\"DSC\",\"2\":\"GE,\"\"8\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717585', 'Fernandes Senova Perpetual', 'F', '17585', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '5', '2', '8', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"5\":\"DSC\",\"2\":\"GE,\"\"8\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717586', 'Govekar Natasha Kundan ', 'F', '17586', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '5', '6', '8', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"5\":\"DSC\",\"6\":\"GE,\"\"8\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717588', 'Ribeiro Murushca Meher Elsa', 'F', '17588', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '5', '10', '8', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"5\":\"DSC\",\"10\":\"GE,\"\"8\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717589', 'Rodrigues Renny Latika', 'F', '17589', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '5', '2', '8', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"5\":\"DSC\",\"2\":\"GE,\"\"8\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717591', 'Sawant Shriya Vishwanath', 'F', '17591', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '5', '4', '4', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"5\":\"DSC\",\"4\":\"GE,\"\"4\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717593', 'V M Athulya', 'F', '17593', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '5', '12', '8', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"5\":\"DSC\",\"12\":\"GE,\"\"8\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717602', 'Coutinho Tefla', 'F', '17602', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '9', '8', '2', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"9\":\"DSC\",\"8\":\"GE,\"\"2\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717603', 'D’Cruz Vanessa Angie Eliza ', 'F', '17603', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '9', '2', '2', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"9\":\"DSC\",\"2\":\"GE,\"\"2\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717605', 'Gokarn Nivedita Jitendra', 'F', '17605', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '9', '8', '8', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"9\":\"DSC\",\"8\":\"GE,\"\"8\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717607', 'Paswan Manisha Kumari Krishna ', 'F', '17607', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '9', '5', '8', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"9\":\"DSC\",\"5\":\"GE,\"\"8\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717608', 'Parwar Vignesha Kashinath ', 'F', '17608', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '9', '3', '3', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"9\":\"DSC\",\"3\":\"GE,\"\"3\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717609', 'Shaikh Aasfa Abdul Wahab', 'F', '17609', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '9', '8', '2', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"9\":\"DSC\",\"8\":\"GE,\"\"2\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717610', 'Shaikh Gulubsha Mehabubsab', 'F', '17610', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '9', '7', '4', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"9\":\"DSC\",\"7\":\"GE,\"\"4\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717618', 'Kandolkar Abhishek Babli', 'M', '17618', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '3', '12', '3', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"3\":\"DSC\",\"12\":\"GE,\"\"3\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717619', 'Kautankar Ganga Krishnanath', 'F', '17619', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '3', '8', '3', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"3\":\"DSC\",\"8\":\"GE,\"\"3\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717621', 'Khandeparkar Mahadev Pundalik', 'M', '17621', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '3', '8', '4', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"3\":\"DSC\",\"8\":\"GE,\"\"4\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717622', 'Madgi Pooja Mahadev', 'F', '17622', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '3', '9', '4', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"3\":\"DSC\",\"9\":\"GE,\"\"4\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717623', 'Mandrekar Shubham Sadanand', 'M', '17623', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '3', '8', '4', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"3\":\"DSC\",\"8\":\"GE,\"\"4\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717631', 'Volvoikar Deven Devanand', 'M', '17631', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '7', '2', '12', '2', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"7\":\"DSC\",\"2\":\"DSC\",\"12\":\"GE,\"\"2\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717632', 'Arleshwar Pallavi Bhasawraj', 'F', '17632', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '7', '2', '8', '4', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"7\":\"DSC\",\"2\":\"DSC\",\"8\":\"GE,\"\"4\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717633', 'Kundaikar Aniket Anant', 'M', '17633', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '7', '2', '4', '2', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"7\":\"DSC\",\"2\":\"DSC\",\"4\":\"GE,\"\"2\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717636', 'Cardozo Alicia Maria', 'F', '17636', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '10', '2', '4', '2', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"10\":\"DSC\",\"2\":\"DSC\",\"4\":\"GE,\"\"2\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717637', 'Cardozo Juliana Violant', 'F', '17637', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '10', '2', '5', '2', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"10\":\"DSC\",\"2\":\"DSC\",\"5\":\"GE,\"\"2\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717639', 'Gaonkar Mamata Kamlakant', 'F', '17639', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '10', '2', '7', '2', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"10\":\"DSC\",\"2\":\"DSC\",\"7\":\"GE,\"\"2\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717640', 'Gaude Rajesh Yeshwant', 'M', '17640', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '10', '2', '9', '2', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"10\":\"DSC\",\"2\":\"DSC\",\"9\":\"GE,\"\"2\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717641', 'Halarneker Ketan Gurudas', 'M', '17641', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '10', '2', '9', '2', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"10\":\"DSC\",\"2\":\"DSC\",\"9\":\"GE,\"\"2\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717642', 'Hosmani Sainath  Maruti', 'M', '17642', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '10', '2', '7', '2', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"10\":\"DSC\",\"2\":\"DSC\",\"7\":\"GE,\"\"2\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717643', 'Jambhale Siddhant Dattatray', 'M', '17643', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '10', '2', '3', '8', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"10\":\"DSC\",\"2\":\"DSC\",\"3\":\"GE,\"\"8\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717644', 'Kankonkar Prachi Devendra', 'F', '17644', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '10', '2', '3', '3', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"10\":\"DSC\",\"2\":\"DSC\",\"3\":\"GE,\"\"3\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717657', 'Khan Afrin', 'F', '17657', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '10', '4', '7', '4', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"10\":\"DSC\",\"4\":\"DSC\",\"7\":\"GE,\"\"4\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717658', 'Goundi Shaikh Afridi Abbasali', 'M', '17658', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '10', '4', '2', '4', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"10\":\"DSC\",\"4\":\"DSC\",\"2\":\"GE,\"\"4\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717660', 'Shaikh Rahiza', 'F', '17660', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '10', '4', '7', '4', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"10\":\"DSC\",\"4\":\"DSC\",\"7\":\"GE,\"\"4\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717661', 'Virnodkar Sandila Sagun', 'F', '17661', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '10', '4', '3', '3', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"10\":\"DSC\",\"4\":\"DSC\",\"3\":\"GE,\"\"3\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717664', 'Raul Tanvi Amarnath', 'F', '17664', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '10', '4', '7', '4', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"10\":\"DSC\",\"4\":\"DSC\",\"7\":\"GE,\"\"4\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717667', 'Davangiri Khushnuda Abdul Rahman', 'F', '17667', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '9', '4', '4', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"9\":\"DSC\",\"4\":\"GE,\"\"4\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717668', 'Fernandes Gail Jesusa', 'M', '17668', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '9', '6', '8', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"9\":\"DSC\",\"6\":\"GE,\"\"8\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717670', 'Hosamani Manjunath Ningappa', 'M', '17670', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '9', '3', '3', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"9\":\"DSC\",\"3\":\"GE,\"\"3\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717671', 'Kamble Shubham Shivaji', 'M', '17671', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '9', '3', '3', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"9\":\"DSC\",\"3\":\"GE,\"\"3\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717672', 'Mulgaonkar Umesh Damodar', 'M', '17672', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '9', '2', '2', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"9\":\"DSC\",\"2\":\"GE,\"\"2\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717673', 'Naik Pratiksha Pandurang', 'F', '17673', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '9', '3', '3', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"9\":\"DSC\",\"3\":\"GE,\"\"3\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717674', 'Sahil Laxman Fadte', 'M', '17674', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '9', '3', '3', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"9\":\"DSC\",\"3\":\"GE,\"\"3\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717676', 'Shaikh Ruksaar Vahid', 'F', '17676', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '9', '6', '8', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"9\":\"DSC\",\"6\":\"GE,\"\"8\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717677', 'Kumar Amit', 'M', '17677', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '9', '4', '4', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"9\":\"DSC\",\"4\":\"GE,\"\"4\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717678', 'Chhhoi Hyonghwan ', 'M', '17678', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '9', '6', '8', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"9\":\"DSC\",\"6\":\"GE,\"\"8\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717681', 'Ashly Praveen', 'M', '17681', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '5', '10', '8', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"5\":\"DSC\",\"10\":\"GE,\"\"8\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717683', 'Goswami Nikita V', 'F', '17683', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '5', '4', '4', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"5\":\"DSC\",\"4\":\"GE,\"\"4\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717684', 'De Araujo Lindsey Lourdes', 'M', '17684', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '5', '9', '8', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"5\":\"DSC\",\"9\":\"GE,\"\"8\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717685', 'Kamu Neha Maruti', 'F', '17685', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '5', '4', '4', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"5\":\"DSC\",\"4\":\"GE,\"\"4\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717687', 'Multani Diksha Ghansham ', 'F', '17687', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '5', '9', '4', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"5\":\"DSC\",\"9\":\"GE,\"\"4\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717688', 'Naik Sahil Umesh', 'M', '17688', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '5', '2', '2', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"5\":\"DSC\",\"2\":\"GE,\"\"2\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717689', 'Neeraj Sureshkumar', 'M', '17689', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '5', '2', '4', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"5\":\"DSC\",\"2\":\"GE,\"\"4\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717691', 'Kamath Niharika Kiran', 'F', '17691', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '5', '6', '8', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"5\":\"DSC\",\"6\":\"GE,\"\"8\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717692', 'Shetye Akshaya Ranjeet', 'F', '17692', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '5', '3', '2', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"5\":\"DSC\",\"3\":\"GE,\"\"2\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717693', 'Sharma Khushboo Vinod', 'F', '17693', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '5', '4', '4', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"5\":\"DSC\",\"4\":\"GE,\"\"4\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717694', 'Saxena Sahili Shailendra', 'F', '17694', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '5', '4', '4', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"5\":\"DSC\",\"4\":\"GE,\"\"4\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717406', 'KerkarSurabhi Vasudev', 'F', '17406', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '9', '4', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"9\":\"DSC\",\"4\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717407', 'Mule Purva Ganesh', 'F', '17407', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '9', '4', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"9\":\"DSC\",\"4\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717408', 'Naik Vandita Shailesh', 'F', '17408', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '9', '3', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"9\":\"DSC\",\"3\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717415', 'Hamid Akbar', 'M', '17415', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '9', '12', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"9\":\"DSC\",\"12\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717418', 'Abdul Hakim', 'M', '17418', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '9', '12', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"9\":\"DSC\",\"12\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717421', 'Abobaker', 'M', '17421', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '9', '12', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"9\":\"DSC\",\"12\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717427', 'Kundaikar Tosheeta Manguesh', 'F', '17427', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '5', '9', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"5\":\"DSC\",\"9\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717441', 'Balli Rima', 'F', '17441', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '3', '4', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"3\":\"DSC\",\"4\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717462', 'Cardozo Rodney', 'M', '17462', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '7', '2', '12', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"7\":\"DSC\",\"2\":\"DSC\",\"12\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717482', 'Fadte Siya Gajanan', 'F', '17482', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '7', '4', '5', '11', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"7\":\"DSC\",\"4\":\"DSC\",\"5\":\"GE,\"\"11\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717513', 'Ankita Nitish Kavlekar', 'F', '17513', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '10', '2', '4', '2', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"10\":\"DSC\",\"2\":\"DSC\",\"4\":\"GE,\"\"2\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717587', 'Mishra Pornima Rajeshkumar', 'F', '17587', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '5', '4', '4', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"5\":\"DSC\",\"4\":\"GE,\"\"4\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717611', 'Shaikh Reehan Kausar', 'M', '17611', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '9', '4', '4', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"9\":\"DSC\",\"4\":\"GE,\"\"4\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717620', 'Kalapurkar Vidhya Govind', 'F', '17620', '', '', '15', '0', '0', '15', '0', '0', '1', '6', '10', '3', '9', '3', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"6\":\"DSC\",\"10\":\"DSC\",\"3\":\"DSC\",\"9\":\"GE,\"\"3\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717645', 'Naik Kavita Krishna', 'F', '17645', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '10', '2', '9', '2', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"10\":\"DSC\",\"2\":\"DSC\",\"9\":\"GE,\"\"2\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717669', 'Gad Ashutosh Arjun', 'M', '17669', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '9', '3', '3', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"9\":\"DSC\",\"3\":\"GE,\"\"3\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717682', 'Butaney Jazia Shania Sandeep', 'F', '17682', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '5', '12', '8', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"5\":\"DSC\",\"12\":\"GE,\"\"8\":\"AECC\"}');
INSERT INTO `student_temp_ba_copy` VALUES ('201717690', 'Seniz Angela Rego', 'F', '17690', '', '', '15', '0', '0', '15', '0', '0', '1', '8', '7', '5', '4', '8', '', '', '0000-00-00', '', '0', '0', '{\"1\":\"CC\",\"8\":\"DSC\",\"7\":\"DSC\",\"5\":\"DSC\",\"4\":\"GE,\"\"8\":\"AECC\"}');

-- ----------------------------
-- Table structure for `student_temp_bsc`
-- ----------------------------
DROP TABLE IF EXISTS `student_temp_bsc`;
CREATE TABLE `student_temp_bsc` (
  `pr_number` varchar(255) DEFAULT NULL,
  `seat_number` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `sports_category` varchar(40) NOT NULL,
  `sports_rewards` varchar(40) NOT NULL,
  `gen_grace_alloc` varchar(255) DEFAULT NULL,
  `gen_grace_remain` varchar(255) DEFAULT NULL,
  `entitlement_grace_alloc` varchar(255) DEFAULT NULL,
  `entitlement_grace_remain` varchar(255) DEFAULT NULL,
  `sports_grace_alloc` varchar(255) DEFAULT NULL,
  `sports_grace_remain` varchar(255) DEFAULT NULL,
  `subj_1` varchar(255) DEFAULT NULL,
  `subj_2` varchar(255) DEFAULT NULL,
  `subj_3` varchar(255) DEFAULT NULL,
  `subj_4` varchar(255) DEFAULT NULL,
  `subj_5` varchar(255) DEFAULT NULL,
  `subj_6` varchar(255) DEFAULT NULL,
  `subj_7` varchar(255) DEFAULT NULL,
  `subj_8` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `special_priority_tag` varchar(255) DEFAULT NULL,
  `block` varchar(255) DEFAULT NULL,
  `supplementary` varchar(255) DEFAULT NULL,
  `subj_details` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of student_temp_bsc
-- ----------------------------
INSERT INTO `student_temp_bsc` VALUES ('201717001', '17001', 'Arobekar Sajana Satish', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '5', '1', '16', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"16\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717002', '17002', 'Azavedo Shannia Sharlen', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '5', '1', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717003', '17003', 'Bind Anitadevi Ramchandra ', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '5', '1', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717004', '17004', 'Chari Shivani Shivram', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '5', '1', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717005', '17005', 'Chipkar Shivani Dasharath', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '5', '1', '13', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"13\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717006', '17006', 'Chodankar Akash Sanjeev', 'M', '', '', '13', '13', '0', '0', '0', '0', '2', '5', '1', '13', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"13\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717009', '17009', 'Desai Prajval Chandrax', 'M', '', '', '13', '13', '0', '0', '0', '0', '2', '5', '1', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717011', '17011', 'Dessai Arya Liladhar', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '5', '1', '13', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"13\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717012', '17012', 'Dias Sapeco Jolyan', 'M', '', '', '13', '13', '0', '0', '0', '0', '2', '5', '1', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717015', '17015', 'Fatarpekar Sharvari M', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '5', '1', '13', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"13\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717017', '17017', 'Fernandes Andrisha Benifa', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '5', '1', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717018', '17018', 'Furtado Vineeta Meleeza', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '5', '1', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717019', '17019', 'Gauns Ankita Mahadev', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '5', '1', '16', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"16\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717022', '17022', 'Junjwadkar Yogita Prakash', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '5', '1', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717023', '17023', 'Kouthanker Trusha Prakash', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '5', '1', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717024', '17024', 'Kunkulkar Anamika Anu', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '5', '1', '16', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"16\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717025', '17025', 'Kunkalkar Swapnesh Narayan', 'M', '', '', '13', '13', '0', '0', '0', '0', '2', '5', '1', '16', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"16\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717026', '17026', 'Lotlikar Ashweta Anand', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '5', '1', '16', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"16\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717027', '17027', 'Lotlikar Reema Pandurang', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '5', '1', '16', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"16\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717028', '17028', 'Mangueshkar Nikisha Keshav', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '5', '1', '16', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"16\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717029', '17029', 'Mayenkar Saloni Prakash', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '5', '1', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717030', '17030', 'Naik Akshata Pandurang', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '5', '1', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717032', '17032', 'Naik Vrushabh Umakant', 'M', '', '', '13', '13', '0', '0', '0', '0', '2', '5', '1', '16', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"16\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717035', '17035', 'Patil Samanta Suresh', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '5', '1', '16', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"16\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717036', '17036', 'Pawar Ankita Ankush', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '5', '1', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717039', '17039', 'Salkar Abhishek Arun', 'M', '', '', '13', '13', '0', '0', '0', '0', '2', '5', '1', '16', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"16\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717040', '17040', 'Sawant Samidha Dinesh', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '5', '1', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717041', '17041', 'Sequeira Pearl Fronia', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '5', '1', '16', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"16\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717044', '17044', 'Shirodkar Suraj Rajaram', 'M', '', '', '13', '13', '0', '0', '0', '0', '2', '5', '1', '13', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"13\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717046', '17046', 'Talkar Bindiya Khema', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '5', '1', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717047', '17047', 'Utkari Tabitha Paul', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '5', '1', '13', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"13\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717048', '17048', 'Vaz Flinta Maria Sharmila', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '5', '1', '16', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"16\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717050', '17050', 'Pednekar Sanjana Rajendra', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '5', '1', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717051', '17051', 'Kulkarni Amogha Vishwanath', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '5', '1', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717053', '17053', 'Vishwakarma Ankita Ashok', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '5', '1', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717056', '17056', 'Kamat Ghanekar Shwetang Dattatray', 'M', '', '', '13', '13', '0', '0', '0', '0', '2', '5', '1', '13', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"13\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717057', '17057', 'Vernekar  Ashwini  Prashant ', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '5', '1', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717058', '17058', 'Raikar Ajinkya Ajitkumar', 'M', '', '', '13', '13', '0', '0', '0', '0', '2', '5', '1', '13', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"13\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717059', '17059', 'Suthar Anju Laxman', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '5', '1', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717060', '17060', 'Naik Bhushana Sakharam', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '5', '1', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717061', '17061', 'Sinai Priolkar Mahima Sandeep', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '5', '1', '13', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"13\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717063', '17063', 'Mahale Tanisha Rajendra', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '5', '1', '13', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"13\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717064', '17064', 'Dabholkar Mahima Yeshwant', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '5', '1', '13', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"5\":\"DSC\",\"1\":\"DSC\",\"13\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717082', '17082', 'Baith Narayan Sitaram', 'M', '', '', '13', '13', '0', '0', '0', '0', '2', '1', '3', '13', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"13\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717083', '17083', 'Bhobe Varada Vassudev', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '1', '3', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717089', '17089', 'Gawas Kirti S', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '1', '3', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717094', '17094', 'Mulla Reshma Muktiar', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '1', '3', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717095', '17095', 'Mulla Simran', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '1', '3', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717097', '17097', 'Naik Rakshanda Manoj', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '1', '3', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717098', '17098', 'Naik Shrutika Subhash', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '1', '3', '13', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"13\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717100', '17100', 'Pandit Kiran Kumari', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '1', '3', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717101', '17101', 'Passi Neha', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '1', '3', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717102', '17102', 'Redkar Prachi Rajendra', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '1', '3', '13', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"13\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717103', '17103', 'Redkar Purva Rajendra', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '1', '3', '13', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"13\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717108', '17108', 'Sanjeel Sandeep Dhuri', 'M', '', '', '13', '13', '0', '0', '0', '0', '2', '1', '3', '13', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"13\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717117', '17117', 'Volvoikar Shivjay Ulhas', 'M', '', '', '13', '13', '0', '0', '0', '0', '2', '1', '3', '13', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"13\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717119', '17119', 'Vaz Milagrina Albertina', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '1', '3', '13', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"13\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717120', '17120', 'Pandit Chaitaly Anand', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '1', '3', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717122', '17122', 'Thakur Neha Krishna', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '1', '3', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717123', '17123', 'Lamani Mahesh Sitaram', 'M', '', '', '13', '13', '0', '0', '0', '0', '2', '1', '3', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717125', '17125', 'Prasad Shilpa Komal', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '1', '3', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717127', '17127', 'Honavarkar Raj Devindra', 'M', '', '', '13', '13', '0', '0', '0', '0', '2', '1', '3', '13', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"13\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717128', '17128', 'Azam Ali Rifate Azam Mohd', 'M', '', '', '13', '13', '0', '0', '0', '0', '2', '1', '3', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717129', '17129', 'Doddamani Faiza Anjum Ibrahim', 'M', '', '', '13', '13', '0', '0', '0', '0', '2', '1', '3', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717130', '17130', 'Khan Mohamed Akhil', 'M', '', '', '13', '13', '0', '0', '0', '0', '2', '1', '3', '13', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"13\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717131', '17131', 'Amonkar Anjusha Vasudev', 'F', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '4', '14', '8', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"14\":\"GE\",\"8\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717132', '17132', 'Chari Kavita Tukaram', 'F', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '4', '15', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"15\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717133', '17133', 'Chinu Tanwar', 'M', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '4', '14', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"14\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717134', '17134', 'Chunchu Tanusha Subhayya', 'F', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '4', '15', '10', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"15\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717135', '17135', 'Desai Prajakta Ashok', 'F', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '4', '15', '9', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"15\":\"GE\",\"9\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717137', '17137', 'Fernandes Ciano King', 'M', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '4', '15', '8', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"15\":\"GE\",\"8\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717138', '17138', 'Gaonkar  Shubham Ganesh', 'M', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '4', '16', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"16\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717141', '17141', 'Gourav Chand', 'M', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '4', '14', '10', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"14\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717142', '17142', 'Gurav  Pooja  Pundalik', 'F', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '4', '14', '9', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"14\":\"GE\",\"9\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717144', '17144', 'Jamadar Mohmmedzuber', 'M', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '4', '14', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"14\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717149', '17149', 'Masurkar Tanmayee  Sunil', 'M', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '4', '15', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"15\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717150', '17150', 'Misar Anant Sanjay', 'M', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '4', '16', '9', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"16\":\"GE\",\"9\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717151', '17151', 'Naik  Parvatkar Ambika Upendra', 'F', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '4', '14', '8', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"14\":\"GE\",\"8\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717152', '17152', 'Naik Smitha Shivdas', 'F', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '4', '15', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"15\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717157', '17157', 'Naik  Varsha Tarachandra', 'F', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '4', '15', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"15\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717159', '17159', 'Palyekar  Sanjana  Devanand', 'F', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '4', '14', '9', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"14\":\"GE\",\"9\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717164', '17164', 'Rane Sneha Nandan', 'F', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '4', '14', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"14\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717165', '17165', 'Sonkamble  Akash  Dilip', 'M', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '4', '15', '9', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"15\":\"GE\",\"9\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717169', '17169', 'Gawas Satyam Devidas', 'M', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '4', '15', '9', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"15\":\"GE\",\"9\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717171', '17171', 'Mardolkar Siya Dinanath', 'F', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '4', '14', '10', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"14\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717173', '17173', 'Palkar Srishti Gurudas', 'F', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '4', '14', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"14\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717175', '17175', 'Kotten Reshma Jatheendran', 'F', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '4', '14', '8', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"14\":\"GE\",\"8\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717177', '17177', 'Apoorba Singh', 'F', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '4', '15', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"15\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717180', '17180', 'Sagali Azai Prabhudas', 'M', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '4', '15', '10', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"15\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717184', '17184', 'Chawan Swapna Mahesh', 'F', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '3', '14', '10', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"3\":\"DSC\",\"14\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717191', '17191', 'Naik Harshad Madan', 'M', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '3', '14', '9', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"3\":\"DSC\",\"14\":\"GE\",\"9\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717192', '17192', 'Naik Karunesh Ghanasham', 'M', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '3', '14', '10', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"3\":\"DSC\",\"14\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717193', '17193', 'Pawar Harshada Dinesh', 'F', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '3', '14', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"3\":\"DSC\",\"14\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717194', '17194', 'Prabhu Siddharth Paul', 'M', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '3', '15', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"3\":\"DSC\",\"15\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717200', '17200', 'Feranandes Gladwin', 'M', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '3', '15', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"3\":\"DSC\",\"15\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717202', '17202', 'Desur Moulali', 'F', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '3', '14', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"3\":\"DSC\",\"14\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717206', '17206', 'Nirmalkar Siddhesh Ganpapti', 'M', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '3', '15', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"3\":\"DSC\",\"15\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717207', '17207', 'Sawant Vedant Tulshidas', 'M', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '3', '14', '8', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"3\":\"DSC\",\"14\":\"GE\",\"8\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717209', '17209', 'Karmalkar Pooja Vaman', 'F', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '3', '14', '8', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"3\":\"DSC\",\"14\":\"GE\",\"8\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717221', '17221', 'Chauhan  Beena  Anand ', 'F', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '5', '14', '10', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"5\":\"DSC\",\"14\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717223', '17223', 'Colaco  Valery', 'F', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '5', '14', '8', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"5\":\"DSC\",\"14\":\"GE\",\"8\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717225', '17225', 'Fizardo Mark Agnelo', 'M', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '5', '15', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"5\":\"DSC\",\"15\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717229', '17229', 'Kalmekar Vaibhavi  Uday ', 'M', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '5', '14', '10', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"5\":\"DSC\",\"14\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717231', '17231', 'Khorjuvekar Shreya Gajanan', 'F', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '5', '14', '10', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"5\":\"DSC\",\"14\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717234', '17234', 'Mayenkar Prachi Premanand', 'F', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '5', '14', '9', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"5\":\"DSC\",\"14\":\"GE\",\"9\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717246', '17246', 'Azrekar Samrudhi B', 'F', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '5', '14', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"5\":\"DSC\",\"14\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717247', '17247', 'Naik Saishree Balchandra', 'F', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '5', '15', '9', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"5\":\"DSC\",\"15\":\"GE\",\"9\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717251', '17251', 'Mendes Vailanka Astrid', 'F', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '5', '16', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"5\":\"DSC\",\"16\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717255', '17255', 'Fonseca Aidan Shanahan', 'M', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '5', '15', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"5\":\"DSC\",\"15\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717256', '17256', 'Estrocio Reis', 'M', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '5', '16', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"5\":\"DSC\",\"16\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717262', '17262', 'Bandodker Narayan Shrinivas', 'M', '', '', '13', '13', '0', '0', '0', '0', '6', '4', '7', '14', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"14\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717263', '17263', 'Bhat Tanisha Rajkumar', 'F', '', '', '13', '13', '0', '0', '0', '0', '6', '4', '7', '14', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"14\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717264', '17264', 'Bisht Ganesh Singh', 'M', '', '', '13', '13', '0', '0', '0', '0', '6', '4', '7', '14', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"14\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717268', '17268', 'Ferro Shawn Valen', 'M', '', '', '13', '13', '0', '0', '0', '0', '6', '4', '7', '14', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"14\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717271', '17271', 'Lobo David Neil', 'M', '', '', '13', '13', '0', '0', '0', '0', '6', '4', '7', '14', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"14\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717274', '17274', 'Malik Smitha Satish', 'F', '', '', '13', '13', '0', '0', '0', '0', '6', '4', '7', '14', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"14\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717276', '17276', 'Sinai Pissurlenkar Vibhav Virendra', 'M', '', '', '13', '13', '0', '0', '0', '0', '6', '4', '7', '14', '8', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"14\":\"GE\",\"8\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717277', '17277', 'Shaikh Sunober Shahid', 'F', '', '', '13', '13', '0', '0', '0', '0', '6', '4', '7', '14', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"14\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717278', '17278', 'Shetye Nihal Kashinath', 'M', '', '', '13', '13', '0', '0', '0', '0', '6', '4', '7', '14', '9', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"14\":\"GE\",\"9\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717281', '17281', 'Ahmad Seyar ', 'M', '', '', '13', '13', '0', '0', '0', '0', '6', '4', '7', '14', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"14\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717282', '17282', 'Samiullah', 'M', '', '', '13', '13', '0', '0', '0', '0', '6', '4', '7', '14', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"14\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717283', '17283', 'Lotlikar Tejas Deepak', 'M', '', '', '13', '13', '0', '0', '0', '0', '6', '4', '7', '14', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"14\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717285', '17285', 'Patil Apurva Ashok', 'F', '', '', '13', '13', '0', '0', '0', '0', '6', '4', '7', '14', '9', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"14\":\"GE\",\"9\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717287', '17287', 'Naik Sweta Bajirao', 'F', '', '', '13', '13', '0', '0', '0', '0', '6', '4', '7', '14', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"14\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717288', '17288', 'Sequeira Felix Rahul Dionisio', 'M', '', '', '13', '13', '0', '0', '0', '0', '6', '4', '7', '14', '8', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"14\":\"GE\",\"8\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717289', '17289', 'Vaigankar Sonal Prashant', 'F', '', '', '13', '13', '0', '0', '0', '0', '6', '4', '7', '14', '8', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"14\":\"GE\",\"8\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717291', '17291', 'Fatima Hasnabadi', 'F', '', '', '13', '13', '0', '0', '0', '0', '6', '4', '7', '14', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"14\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717292', '17292', 'Koti Shrinidhi Shreepad', 'F', '', '', '13', '13', '0', '0', '0', '0', '6', '4', '7', '14', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"4\":\"DSC\",\"7\":\"DSC\",\"14\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717296', '17296', 'Vaz Sherwin Ryan', 'M', '', '', '13', '13', '0', '0', '0', '0', '2', '1', '3', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717320', '17320', 'Almeida Austin', 'M', '', '', '13', '13', '0', '0', '0', '0', '2', '1', '3', '13', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"13\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717321', '17321', 'Dias Melisa Julia Livia', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '1', '3', '13', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"13\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717038', '17038', 'Raikar Neha Yogesh', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '1', '5', '16', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"5\":\"DSC\",\"16\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717154', '17154', 'Naik Shradha Yeshwant', 'F', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '4', '15', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"15\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717174', '17174', 'Sachin Chaudhary', 'M', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '4', '15', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"15\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717179', '17179', 'Mishra Chandra Prakash', 'M', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '4', '15', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"15\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717208', '17208', 'Shirodkar Kritika Sonu', 'F', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '3', '14', '10', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"3\":\"DSC\",\"14\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717297', '17297', 'Khearul Wara', 'M', '', '', '13', '13', '0', '0', '0', '0', '6', '2', '4', '15', '11', '', '', '', '0000-00-00', '', '0', '0', '{\"6\":\"DSC\",\"2\":\"DSC\",\"4\":\"DSC\",\"15\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717323', '17323', 'Manasi Vilasrao Shinde ', 'F', '', '', '13', '13', '0', '0', '0', '0', '2', '1', '3', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc` VALUES ('201717324', '17324', 'Patil Ankita Namdev', 'M', '', '', '13', '13', '0', '0', '0', '0', '2', '1', '3', '15', '12', '', '', '', '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"15\":\"GE\",\"12\":\"AECC\"}');

-- ----------------------------
-- Table structure for `student_temp_bsc_copy`
-- ----------------------------
DROP TABLE IF EXISTS `student_temp_bsc_copy`;
CREATE TABLE `student_temp_bsc_copy` (
  `pr_number` varchar(255) DEFAULT NULL,
  `seat_number` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `sports_category` varchar(40) NOT NULL,
  `sports_rewards` varchar(40) NOT NULL,
  `gen_grace_alloc` varchar(255) DEFAULT NULL,
  `gen_grace_remain` varchar(255) DEFAULT NULL,
  `entitlement_grace_alloc` varchar(255) DEFAULT NULL,
  `entitlement_grace_remain` varchar(255) DEFAULT NULL,
  `sports_grace_alloc` varchar(255) DEFAULT NULL,
  `sports_grace_remain` varchar(255) DEFAULT NULL,
  `subj_1` varchar(255) DEFAULT NULL,
  `subj_2` varchar(255) DEFAULT NULL,
  `subj_3` varchar(255) DEFAULT NULL,
  `subj_4` varchar(255) DEFAULT NULL,
  `subj_5` varchar(255) DEFAULT NULL,
  `subj_6` varchar(255) DEFAULT NULL,
  `subj_7` varchar(255) DEFAULT NULL,
  `subj_8` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `special_priority_tag` varchar(255) DEFAULT NULL,
  `block` varchar(255) DEFAULT NULL,
  `supplementary` varchar(255) DEFAULT NULL,
  `subj_details` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of student_temp_bsc_copy
-- ----------------------------
INSERT INTO `student_temp_bsc_copy` VALUES ('201717001', '17001', 'Arobekar Sajana Satish', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '4', '6', '5', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"5\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717002', '17002', 'Azavedo Shannia Sharlen', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '4', '6', '8', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"8\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717003', '17003', 'Bind Anitadevi Ramchandra ', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '4', '6', '8', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"8\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717004', '17004', 'Chari Shivani Shivram', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '4', '6', '8', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"8\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717005', '17005', 'Chipkar Shivani Dasharath', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '4', '6', '2', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"2\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717006', '17006', 'Chodankar Akash Sanjeev', 'M', '', '', '15', '15', '0', '0', '0', '0', '1', '4', '6', '2', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"2\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717009', '17009', 'Desai Prajval Chandrax', 'M', '', '', '15', '15', '0', '0', '0', '0', '1', '4', '6', '8', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"8\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717011', '17011', 'Dessai Arya Liladhar', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '4', '6', '2', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"2\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717012', '17012', 'Dias Sapeco Jolyan', 'M', '', '', '15', '15', '0', '0', '0', '0', '1', '4', '6', '8', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"8\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717015', '17015', 'Fatarpekar Sharvari M', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '4', '6', '2', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"2\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717017', '17017', 'Fernandes Andrisha Benifa', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '4', '6', '8', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"8\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717018', '17018', 'Furtado Vineeta Meleeza', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '4', '6', '8', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"8\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717019', '17019', 'Gauns Ankita Mahadev', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '4', '6', '5', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"5\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717022', '17022', 'Junjwadkar Yogita Prakash', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '4', '6', '8', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"8\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717023', '17023', 'Kouthanker Trusha Prakash', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '4', '6', '8', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"8\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717024', '17024', 'Kunkulkar Anamika Anu', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '4', '6', '5', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"5\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717025', '17025', 'Kunkalkar Swapnesh Narayan', 'M', '', '', '15', '15', '0', '0', '0', '0', '1', '4', '6', '5', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"5\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717026', '17026', 'Lotlikar Ashweta Anand', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '4', '6', '5', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"5\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717027', '17027', 'Lotlikar Reema Pandurang', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '4', '6', '5', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"5\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717028', '17028', 'Mangueshkar Nikisha Keshav', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '4', '6', '5', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"5\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717029', '17029', 'Mayenkar Saloni Prakash', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '4', '6', '8', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"8\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717030', '17030', 'Naik Akshata Pandurang', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '4', '6', '8', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"8\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717032', '17032', 'Naik Vrushabh Umakant', 'M', '', '', '15', '15', '0', '0', '0', '0', '1', '4', '6', '5', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"5\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717035', '17035', 'Patil Samanta Suresh', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '4', '6', '5', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"5\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717036', '17036', 'Pawar Ankita Ankush', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '4', '6', '8', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"8\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717039', '17039', 'Salkar Abhishek Arun', 'M', '', '', '15', '15', '0', '0', '0', '0', '1', '4', '6', '5', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"5\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717040', '17040', 'Sawant Samidha Dinesh', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '4', '6', '8', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"8\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717041', '17041', 'Sequeira Pearl Fronia', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '4', '6', '5', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"5\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717044', '17044', 'Shirodkar Suraj Rajaram', 'M', '', '', '15', '15', '0', '0', '0', '0', '1', '4', '6', '2', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"2\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717046', '17046', 'Talkar Bindiya Khema', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '4', '6', '8', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"8\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717047', '17047', 'Utkari Tabitha Paul', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '4', '6', '2', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"2\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717048', '17048', 'Vaz Flinta Maria Sharmila', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '4', '6', '5', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"5\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717050', '17050', 'Pednekar Sanjana Rajendra', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '4', '6', '8', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"8\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717051', '17051', 'Kulkarni Amogha Vishwanath', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '4', '6', '8', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"8\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717053', '17053', 'Vishwakarma Ankita Ashok', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '4', '6', '8', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"8\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717056', '17056', 'Kamat Ghanekar Shwetang Dattatray', 'M', '', '', '15', '15', '0', '0', '0', '0', '1', '4', '6', '2', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"2\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717057', '17057', 'Vernekar  Ashwini  Prashant ', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '4', '6', '8', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"8\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717058', '17058', 'Raikar Ajinkya Ajitkumar', 'M', '', '', '15', '15', '0', '0', '0', '0', '1', '4', '6', '2', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"2\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717059', '17059', 'Suthar Anju Laxman', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '4', '6', '8', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"8\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717060', '17060', 'Naik Bhushana Sakharam', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '4', '6', '8', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"8\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717061', '17061', 'Sinai Priolkar Mahima Sandeep', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '4', '6', '2', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"2\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717063', '17063', 'Mahale Tanisha Rajendra', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '4', '6', '2', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"2\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717064', '17064', 'Dabholkar Mahima Yeshwant', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '4', '6', '2', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"DSC\",\"2\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717082', '17082', 'Baith Narayan Sitaram', 'M', '', '', '15', '15', '0', '0', '0', '0', '1', '6', '5', '2', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"6\":\"DSC\",\"5\":\"DSC\",\"2\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717083', '17083', 'Bhobe Varada Vassudev', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '6', '5', '8', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"6\":\"DSC\",\"5\":\"DSC\",\"8\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717089', '17089', 'Gawas Kirti S', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '6', '5', '8', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"6\":\"DSC\",\"5\":\"DSC\",\"8\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717094', '17094', 'Mulla Reshma Muktiar', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '6', '5', '8', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"6\":\"DSC\",\"5\":\"DSC\",\"8\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717095', '17095', 'Mulla Simran', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '6', '5', '8', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"6\":\"DSC\",\"5\":\"DSC\",\"8\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717097', '17097', 'Naik Rakshanda Manoj', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '6', '5', '8', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"6\":\"DSC\",\"5\":\"DSC\",\"8\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717098', '17098', 'Naik Shrutika Subhash', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '6', '5', '2', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"6\":\"DSC\",\"5\":\"DSC\",\"2\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717100', '17100', 'Pandit Kiran Kumari', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '6', '5', '8', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"6\":\"DSC\",\"5\":\"DSC\",\"8\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717101', '17101', 'Passi Neha', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '6', '5', '8', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"6\":\"DSC\",\"5\":\"DSC\",\"8\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717102', '17102', 'Redkar Prachi Rajendra', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '6', '5', '2', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"6\":\"DSC\",\"5\":\"DSC\",\"2\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717103', '17103', 'Redkar Purva Rajendra', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '6', '5', '2', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"6\":\"DSC\",\"5\":\"DSC\",\"2\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717108', '17108', 'Sanjeel Sandeep Dhuri', 'M', '', '', '15', '15', '0', '0', '0', '0', '1', '6', '5', '2', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"6\":\"DSC\",\"5\":\"DSC\",\"2\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717117', '17117', 'Volvoikar Shivjay Ulhas', 'M', '', '', '15', '15', '0', '0', '0', '0', '1', '6', '5', '2', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"6\":\"DSC\",\"5\":\"DSC\",\"2\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717119', '17119', 'Vaz Milagrina Albertina', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '6', '5', '2', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"6\":\"DSC\",\"5\":\"DSC\",\"2\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717120', '17120', 'Pandit Chaitaly Anand', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '6', '5', '8', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"6\":\"DSC\",\"5\":\"DSC\",\"8\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717122', '17122', 'Thakur Neha Krishna', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '6', '5', '8', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"6\":\"DSC\",\"5\":\"DSC\",\"8\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717123', '17123', 'Lamani Mahesh Sitaram', 'M', '', '', '15', '15', '0', '0', '0', '0', '1', '6', '5', '8', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"6\":\"DSC\",\"5\":\"DSC\",\"8\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717125', '17125', 'Prasad Shilpa Komal', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '6', '5', '8', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"6\":\"DSC\",\"5\":\"DSC\",\"8\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717127', '17127', 'Honavarkar Raj Devindra', 'M', '', '', '15', '15', '0', '0', '0', '0', '1', '6', '5', '2', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"6\":\"DSC\",\"5\":\"DSC\",\"2\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717128', '17128', 'Azam Ali Rifate Azam Mohd', 'M', '', '', '15', '15', '0', '0', '0', '0', '1', '6', '5', '8', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"6\":\"DSC\",\"5\":\"DSC\",\"8\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717129', '17129', 'Doddamani Faiza Anjum Ibrahim', 'M', '', '', '15', '15', '0', '0', '0', '0', '1', '6', '5', '8', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"6\":\"DSC\",\"5\":\"DSC\",\"8\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717130', '17130', 'Khan Mohamed Akhil', 'M', '', '', '15', '15', '0', '0', '0', '0', '1', '6', '5', '2', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"6\":\"DSC\",\"5\":\"DSC\",\"2\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717131', '17131', 'Amonkar Anjusha Vasudev', 'F', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '3', '6', '9', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"GE\",\"9\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717132', '17132', 'Chari Kavita Tukaram', 'F', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '3', '8', '12', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717133', '17133', 'Chinu Tanwar', 'M', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '3', '6', '12', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717134', '17134', 'Chunchu Tanusha Subhayya', 'F', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '3', '8', '11', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717135', '17135', 'Desai Prajakta Ashok', 'F', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '3', '8', '10', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717137', '17137', 'Fernandes Ciano King', 'M', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '3', '8', '9', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"GE\",\"9\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717138', '17138', 'Gaonkar  Shubham Ganesh', 'M', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '3', '5', '12', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"5\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717141', '17141', 'Gourav Chand', 'M', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '3', '6', '11', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717142', '17142', 'Gurav  Pooja  Pundalik', 'F', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '3', '6', '10', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717144', '17144', 'Jamadar Mohmmedzuber', 'M', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '3', '6', '12', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717149', '17149', 'Masurkar Tanmayee  Sunil', 'M', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '3', '8', '12', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717150', '17150', 'Misar Anant Sanjay', 'M', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '3', '5', '10', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"5\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717151', '17151', 'Naik  Parvatkar Ambika Upendra', 'F', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '3', '6', '9', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"GE\",\"9\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717152', '17152', 'Naik Smitha Shivdas', 'F', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '3', '8', '12', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717157', '17157', 'Naik  Varsha Tarachandra', 'F', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '3', '8', '12', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717159', '17159', 'Palyekar  Sanjana  Devanand', 'F', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '3', '6', '10', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717164', '17164', 'Rane Sneha Nandan', 'F', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '3', '6', '12', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717165', '17165', 'Sonkamble  Akash  Dilip', 'M', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '3', '8', '10', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717169', '17169', 'Gawas Satyam Devidas', 'M', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '3', '8', '10', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717171', '17171', 'Mardolkar Siya Dinanath', 'F', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '3', '6', '11', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717173', '17173', 'Palkar Srishti Gurudas', 'F', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '3', '6', '12', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717175', '17175', 'Kotten Reshma Jatheendran', 'F', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '3', '6', '9', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"6\":\"GE\",\"9\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717177', '17177', 'Apoorba Singh', 'F', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '3', '8', '12', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717180', '17180', 'Sagali Azai Prabhudas', 'M', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '3', '8', '11', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717184', '17184', 'Chawan Swapna Mahesh', 'F', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '5', '6', '11', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"5\":\"DSC\",\"6\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717191', '17191', 'Naik Harshad Madan', 'M', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '5', '6', '10', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"5\":\"DSC\",\"6\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717192', '17192', 'Naik Karunesh Ghanasham', 'M', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '5', '6', '11', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"5\":\"DSC\",\"6\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717193', '17193', 'Pawar Harshada Dinesh', 'F', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '5', '6', '12', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"5\":\"DSC\",\"6\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717194', '17194', 'Prabhu Siddharth Paul', 'M', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '5', '8', '12', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"5\":\"DSC\",\"8\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717200', '17200', 'Feranandes Gladwin', 'M', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '5', '8', '12', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"5\":\"DSC\",\"8\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717202', '17202', 'Desur Moulali', 'F', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '5', '6', '12', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"5\":\"DSC\",\"6\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717206', '17206', 'Nirmalkar Siddhesh Ganpapti', 'M', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '5', '8', '12', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"5\":\"DSC\",\"8\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717207', '17207', 'Sawant Vedant Tulshidas', 'M', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '5', '6', '9', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"5\":\"DSC\",\"6\":\"GE\",\"9\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717209', '17209', 'Karmalkar Pooja Vaman', 'F', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '5', '6', '6', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"5\":\"DSC\",\"6\":\"GE\",\"6\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717221', '17221', 'Chauhan  Beena  Anand ', 'F', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '4', '6', '11', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717223', '17223', 'Colaco  Valery', 'F', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '4', '6', '9', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"GE\",\"9\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717225', '17225', 'Fizardo Mark Agnelo', 'M', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '4', '8', '12', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"4\":\"DSC\",\"8\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717229', '17229', 'Kalmekar Vaibhavi  Uday ', 'M', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '4', '6', '11', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717231', '17231', 'Khorjuvekar Shreya Gajanan', 'F', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '4', '6', '11', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717234', '17234', 'Mayenkar Prachi Premanand', 'F', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '4', '6', '10', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717246', '17246', 'Azrekar Samrudhi B', 'F', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '4', '6', '12', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"4\":\"DSC\",\"6\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717247', '17247', 'Naik Saishree Balchandra', 'F', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '4', '8', '10', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"4\":\"DSC\",\"8\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717251', '17251', 'Mendes Vailanka Astrid', 'F', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '4', '5', '12', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"4\":\"DSC\",\"5\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717255', '17255', 'Fonseca Aidan Shanahan', 'M', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '4', '8', '12', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"4\":\"DSC\",\"8\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717256', '17256', 'Estrocio Reis', 'M', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '4', '5', '12', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"4\":\"DSC\",\"5\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717262', '17262', 'Bandodker Narayan Shrinivas', 'M', '', '', '15', '15', '0', '0', '0', '0', '2', '3', '8', '6', '12', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"6\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717263', '17263', 'Bhat Tanisha Rajkumar', 'F', '', '', '15', '15', '0', '0', '0', '0', '2', '3', '8', '6', '12', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"6\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717264', '17264', 'Bisht Ganesh Singh', 'M', '', '', '15', '15', '0', '0', '0', '0', '2', '3', '8', '6', '12', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"6\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717268', '17268', 'Ferro Shawn Valen', 'M', '', '', '15', '15', '0', '0', '0', '0', '2', '3', '8', '6', '12', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"6\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717271', '17271', 'Lobo David Neil', 'M', '', '', '15', '15', '0', '0', '0', '0', '2', '3', '8', '6', '12', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"6\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717274', '17274', 'Malik Smitha Satish', 'F', '', '', '15', '15', '0', '0', '0', '0', '2', '3', '8', '6', '12', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"6\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717276', '17276', 'Sinai Pissurlenkar Vibhav Virendra', 'M', '', '', '15', '15', '0', '0', '0', '0', '2', '3', '8', '6', '9', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"6\":\"GE\",\"9\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717277', '17277', 'Shaikh Sunober Shahid', 'F', '', '', '15', '15', '0', '0', '0', '0', '2', '3', '8', '6', '12', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"6\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717278', '17278', 'Shetye Nihal Kashinath', 'M', '', '', '15', '15', '0', '0', '0', '0', '2', '3', '8', '6', '10', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"6\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717281', '17281', 'Ahmad Seyar ', 'M', '', '', '15', '15', '0', '0', '0', '0', '2', '3', '8', '6', '12', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"6\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717282', '17282', 'Samiullah', 'M', '', '', '15', '15', '0', '0', '0', '0', '2', '3', '8', '6', '12', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"6\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717283', '17283', 'Lotlikar Tejas Deepak', 'M', '', '', '15', '15', '0', '0', '0', '0', '2', '3', '8', '6', '12', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"6\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717285', '17285', 'Patil Apurva Ashok', 'F', '', '', '15', '15', '0', '0', '0', '0', '2', '3', '8', '6', '10', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"6\":\"GE\",\"10\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717287', '17287', 'Naik Sweta Bajirao', 'F', '', '', '15', '15', '0', '0', '0', '0', '2', '3', '8', '6', '12', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"6\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717288', '17288', 'Sequeira Felix Rahul Dionisio', 'M', '', '', '15', '15', '0', '0', '0', '0', '2', '3', '8', '6', '9', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"6\":\"GE\",\"9\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717289', '17289', 'Vaigankar Sonal Prashant', 'F', '', '', '15', '15', '0', '0', '0', '0', '2', '3', '8', '6', '9', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"6\":\"GE\",\"9\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717291', '17291', 'Fatima Hasnabadi', 'F', '', '', '15', '15', '0', '0', '0', '0', '2', '3', '8', '6', '12', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"6\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717292', '17292', 'Koti Shrinidhi Shreepad', 'F', '', '', '15', '15', '0', '0', '0', '0', '2', '3', '8', '6', '12', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"3\":\"DSC\",\"8\":\"DSC\",\"6\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717296', '17296', 'Vaz Sherwin Ryan', 'M', '', '', '15', '15', '0', '0', '0', '0', '1', '6', '5', '8', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"6\":\"DSC\",\"5\":\"DSC\",\"8\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717320', '17320', 'Almeida Austin', 'M', '', '', '15', '15', '0', '0', '0', '0', '1', '6', '5', '2', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"6\":\"DSC\",\"5\":\"DSC\",\"2\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717321', '17321', 'Dias Melisa Julia Livia', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '6', '5', '2', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"6\":\"DSC\",\"5\":\"DSC\",\"2\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717038', '17038', 'Raikar Neha Yogesh', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '6', '4', '5', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"6\":\"DSC\",\"4\":\"DSC\",\"5\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717154', '17154', 'Naik Shradha Yeshwant', 'F', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '3', '8', '12', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717174', '17174', 'Sachin Chaudhary', 'M', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '3', '8', '12', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717179', '17179', 'Mishra Chandra Prakash', 'M', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '3', '8', '12', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717208', '17208', 'Shirodkar Kritika Sonu', 'F', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '5', '6', '11', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"5\":\"DSC\",\"6\":\"GE\",\"11\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717297', '17297', 'Khearul Wara', 'M', '', '', '15', '15', '0', '0', '0', '0', '2', '1', '3', '8', '12', null, null, null, '0000-00-00', '', '0', '0', '{\"2\":\"DSC\",\"1\":\"DSC\",\"3\":\"DSC\",\"8\":\"GE\",\"12\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717323', '17323', 'Manasi Vilasrao Shinde ', 'F', '', '', '15', '15', '0', '0', '0', '0', '1', '6', '5', '8', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"6\":\"DSC\",\"5\":\"DSC\",\"8\":\"GE\",\"7\":\"AECC\"}');
INSERT INTO `student_temp_bsc_copy` VALUES ('201717324', '17324', 'Patil Ankita Namdev', 'M', '', '', '15', '15', '0', '0', '0', '0', '1', '6', '5', '8', '7', null, null, null, '0000-00-00', '', '0', '0', '{\"1\":\"DSC\",\"6\":\"DSC\",\"5\":\"DSC\",\"8\":\"GE\",\"7\":\"AECC\"}');

-- ----------------------------
-- Table structure for `subject_type_limit`
-- ----------------------------
DROP TABLE IF EXISTS `subject_type_limit`;
CREATE TABLE `subject_type_limit` (
  `semester` varchar(20) NOT NULL,
  `stream` varchar(10) NOT NULL,
  `subject_type` varchar(20) NOT NULL,
  `number` int(10) NOT NULL,
  `sort_order` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of subject_type_limit
-- ----------------------------
INSERT INTO `subject_type_limit` VALUES ('sem_2', 'bsc_sub_', 'DSC', '3', '0');
INSERT INTO `subject_type_limit` VALUES ('sem_2', 'bsc_sub_', 'GE', '1', '0');
INSERT INTO `subject_type_limit` VALUES ('sem_1', 'bsc_sub_', 'DSC', '3', '1');
INSERT INTO `subject_type_limit` VALUES ('sem_1', 'bsc_sub_', 'GE', '1', '2');
INSERT INTO `subject_type_limit` VALUES ('sem_1', 'ba_sub_', 'DSC', '3', '2');
INSERT INTO `subject_type_limit` VALUES ('sem_2', 'ba_sub_', 'DSC', '3', '0');
INSERT INTO `subject_type_limit` VALUES ('sem_1', 'ba_sub_', 'GE', '1', '3');
INSERT INTO `subject_type_limit` VALUES ('sem_2', 'ba_sub_', 'GE', '1', '0');
INSERT INTO `subject_type_limit` VALUES ('sem_2', 'bsc_sub_', 'AECC', '1', '0');
INSERT INTO `subject_type_limit` VALUES ('sem_1', 'bsc_sub_', 'AECC', '1', '3');
INSERT INTO `subject_type_limit` VALUES ('sem_1', 'ba_sub_', 'AECC', '1', '4');
INSERT INTO `subject_type_limit` VALUES ('sem_2', 'ba_sub_', 'AECC', '1', '0');
INSERT INTO `subject_type_limit` VALUES ('sem_2', 'ba_sub_', 'CC', '1', '0');
INSERT INTO `subject_type_limit` VALUES ('sem_1', 'ba_sub_', 'CC', '1', '1');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('2', 'param', '9076c5525c5389b6a60d6e157087e8e2');
INSERT INTO `users` VALUES ('3', 'admin', '0192023a7bbd73250516f069df18b500');
INSERT INTO `users` VALUES ('4', 'dhempe_exam', 'd213640d0e7647af90ef001ebe0c600d ');
