-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 01, 2022 at 01:00 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `futaprysch`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_broadsheet`
-- (See below for the actual view)
--
CREATE TABLE `view_broadsheet` (
`studentno` varchar(25)
,`fullname` varchar(311)
,`class` varchar(20)
,`engscore` varchar(23)
,`frcscore` varchar(23)
,`matscore` varchar(23)
,`anhscore` varchar(23)
,`yorscore` varchar(23)
,`chmscore` varchar(23)
,`physcore` varchar(23)
,`crkscore` varchar(23)
,`ccpscore` varchar(23)
,`agrscore` varchar(23)
,`bioscore` varchar(23)
,`fmtscore` varchar(23)
,`totalpasses` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_gradebook`
-- (See below for the actual view)
--
CREATE TABLE `view_gradebook` (
`studentid` int(11)
,`regno` varchar(25)
,`fullname` varchar(311)
,`studentclass` varchar(20)
,`studentsubject` varchar(55)
,`assessmenttype` varchar(12)
,`assessmentgrade` varchar(7)
,`schoolsession` bigint(12)
,`schoolterm` bigint(12)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_menu`
-- (See below for the actual view)
--
CREATE TABLE `view_menu` (
`menuid` int(12)
,`menuposition` int(12)
,`menutitle` varchar(200)
,`menudescription` text
,`menuroute` varchar(250)
,`menucategory` int(12)
,`category` varchar(100)
,`menurole` int(12)
,`created_at` timestamp
,`updated_at` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_position`
-- (See below for the actual view)
--
CREATE TABLE `view_position` (
`studentno` varchar(25)
,`fullname` varchar(311)
,`subjects` varchar(15)
,`cumavg2` double
,`position` bigint(22)
,`sessionname` varchar(45)
,`schoolsession` bigint(12)
,`schoolterm` bigint(12)
,`termname` varchar(25)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_scoresheet`
-- (See below for the actual view)
--
CREATE TABLE `view_scoresheet` (
`studentno` varchar(25)
,`subjects` varchar(15)
,`subjectname` varchar(55)
,`studentid` bigint(11)
,`fullname` varchar(311)
,`class` varchar(20)
,`ca11` decimal(5,2)
,`ca1` varchar(7)
,`ca2` varchar(7)
,`ca3` varchar(7)
,`exam` varchar(7)
,`termsummary` varchar(10)
,`lasttermcum` decimal(5,2)
,`cumavg` decimal(5,2)
,`cumavg2` double
,`classavg` decimal(5,2)
,`position` int(3)
,`remark` int(11)
,`signs` varchar(100)
,`schoolsession` bigint(12)
,`sessionname` varchar(45)
,`schoolterm` bigint(12)
,`termname` varchar(25)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_staffprofile`
-- (See below for the actual view)
--
CREATE TABLE `view_staffprofile` (
`staffid` int(11)
,`regno` varchar(20)
,`fullname` varchar(311)
,`dob` date
,`hometown` varchar(55)
,`lga` varchar(110)
,`stateoforigin` varchar(55)
,`permanentaddress` text
,`nin` varchar(20)
,`email` varchar(255)
,`phonenumber` varchar(55)
,`position` varchar(55)
,`gender` varchar(20)
,`ethnicity` varchar(55)
,`religion` varchar(55)
,`weight` varchar(20)
,`height` varchar(20)
,`disability` varchar(55)
,`bloodgroup` varchar(10)
,`genotype` varchar(10)
,`vision` varchar(55)
,`hearing` varchar(55)
,`speech` varchar(55)
,`generalvitality` varchar(255)
,`nationality` varchar(55)
,`nextofkin` varchar(55)
,`nextofkinrelationship` varchar(55)
,`nextofkinnin` varchar(25)
,`nextofkinoccupation` varchar(55)
,`nextofkinaddress` text
,`nextofkinphonenumber` varchar(25)
,`startedon` date
,`courseofstudy` varchar(55)
,`qualification` varchar(55)
,`dateofaward` date
,`lastupdate` datetime
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_studentprofile`
-- (See below for the actual view)
--
CREATE TABLE `view_studentprofile` (
`studentid` int(11)
,`regno` varchar(25)
,`fullname` varchar(311)
,`dob` date
,`class` varchar(20)
,`hometown` varchar(55)
,`lga` varchar(55)
,`stateoforigin` varchar(55)
,`nationality` varchar(55)
,`nin` varchar(55)
,`gender` varchar(10)
,`height` varchar(10)
,`weight` varchar(10)
,`fathername` varchar(255)
,`fatheroccupation` varchar(55)
,`mothername` varchar(255)
,`motheroccupation` varchar(55)
,`fatherpermaddress` text
,`fatherphonenumber` varchar(25)
,`motherpermaddress` text
,`motherphonenumber` varchar(25)
,`guardianname` varchar(255)
,`guardianoccupation` varchar(55)
,`guardianpermaddress` text
,`guardianphonenumber` varchar(25)
,`email` varchar(150)
,`familytype` varchar(20)
,`familysize` int(5)
,`positioninfamily` int(5)
,`noofbrothers` int(5)
,`noofsisters` int(5)
,`parentreligion` varchar(25)
,`disability` varchar(55)
,`bloodgroup` varchar(10)
,`genotype` varchar(10)
,`vision` varchar(20)
,`hearing` varchar(20)
,`speech` varchar(20)
,`generalvitality` varchar(55)
,`classgiven` varchar(25)
,`classgroup` varchar(5)
,`last_updated` datetime
,`schoolsession` bigint(12)
,`sessionname` varchar(45)
,`schoolterm` bigint(12)
,`termname` varchar(25)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_summary`
-- (See below for the actual view)
--
CREATE TABLE `view_summary` (
`STUDENTNO` varchar(25)
,`CA1` decimal(5,2)
,`CA2` decimal(5,2)
,`CA3` decimal(5,2)
,`EXAM` decimal(5,2)
,`SUMMARY` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_userlogin`
-- (See below for the actual view)
--
CREATE TABLE `view_userlogin` (
`username` varchar(25)
,`password` varchar(150)
,`email` varchar(255)
,`category` varchar(55)
);

-- --------------------------------------------------------

--
-- Structure for view `view_broadsheet`
--
DROP TABLE IF EXISTS `view_broadsheet`;

CREATE OR REPLACE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_broadsheet`  AS SELECT `vs`.`studentno` AS `studentno`, `vs`.`fullname` AS `fullname`, `vs`.`class` AS `class`, coalesce((select `v`.`cumavg2` from `view_scoresheet` `v` where ((`v`.`studentno` = `vs`.`studentno`) and (`v`.`subjects` = 'ENG'))),'') AS `engscore`, coalesce((select `v`.`cumavg2` from `view_scoresheet` `v` where ((`v`.`studentno` = `vs`.`studentno`) and (`v`.`subjects` = 'FRC'))),'') AS `frcscore`, coalesce((select `v`.`cumavg2` from `view_scoresheet` `v` where ((`v`.`studentno` = `vs`.`studentno`) and (`v`.`subjects` = 'MAT'))),'') AS `matscore`, coalesce((select `v`.`cumavg2` from `view_scoresheet` `v` where ((`v`.`studentno` = `vs`.`studentno`) and (`v`.`subjects` = 'ANH'))),'') AS `anhscore`, coalesce((select `v`.`cumavg2` from `view_scoresheet` `v` where ((`v`.`studentno` = `vs`.`studentno`) and (`v`.`subjects` = 'YOR'))),'') AS `yorscore`, coalesce((select `v`.`cumavg2` from `view_scoresheet` `v` where ((`v`.`studentno` = `vs`.`studentno`) and (`v`.`subjects` = 'CHM'))),'') AS `chmscore`, coalesce((select `v`.`cumavg2` from `view_scoresheet` `v` where ((`v`.`studentno` = `vs`.`studentno`) and (`v`.`subjects` = 'PHY'))),'') AS `physcore`, coalesce((select `v`.`cumavg2` from `view_scoresheet` `v` where ((`v`.`studentno` = `vs`.`studentno`) and (`v`.`subjects` = 'CRK'))),'') AS `crkscore`, coalesce((select `v`.`cumavg2` from `view_scoresheet` `v` where ((`v`.`studentno` = `vs`.`studentno`) and (`v`.`subjects` = 'CCP'))),'') AS `ccpscore`, coalesce((select `v`.`cumavg2` from `view_scoresheet` `v` where ((`v`.`studentno` = `vs`.`studentno`) and (`v`.`subjects` = 'AGR'))),'') AS `agrscore`, coalesce((select `v`.`cumavg2` from `view_scoresheet` `v` where ((`v`.`studentno` = `vs`.`studentno`) and (`v`.`subjects` = 'BIO'))),'') AS `bioscore`, coalesce((select `v`.`cumavg2` from `view_scoresheet` `v` where ((`v`.`studentno` = `vs`.`studentno`) and (`v`.`subjects` = 'FMT'))),'') AS `fmtscore`, (select count(0) from `view_scoresheet` `v` where ((`v`.`studentno` = `vs`.`studentno`) and (`v`.`cumavg2` > 40))) AS `totalpasses` FROM `view_scoresheet` AS `vs` WHERE ((`vs`.`schoolterm` = (select `ts`.`termid` from `term_setup` `ts` where (`ts`.`activeflag` = 1))) AND (`vs`.`schoolsession` = (select `sst`.`sessionid` from `session_setup` `sst` where (`sst`.`activeflag` = 1) order by `vs`.`subjects`,`vs`.`class`)))  ;

-- --------------------------------------------------------

--
-- Structure for view `view_gradebook`
--
DROP TABLE IF EXISTS `view_gradebook`;

CREATE OR REPLACE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_gradebook`  AS SELECT `sg`.`studentid` AS `studentid`, `sg`.`regno` AS `regno`, concat(`sg`.`surname`,' ',`sg`.`othernames`) AS `fullname`, (select `sp`.`class` from `student_profile` `sp` where (`sp`.`studentid` = `sg`.`studentid`)) AS `studentclass`, coalesce((select `grd`.`studentsubject` from `setup_gradebook` `grd` where (`grd`.`studentid` = `sg`.`studentid`)),'') AS `studentsubject`, coalesce((select `grd`.`assessmenttype` from `setup_gradebook` `grd` where (`grd`.`studentid` = `sg`.`studentid`)),'') AS `assessmenttype`, coalesce((select `grd`.`assessmentgrade` from `setup_gradebook` `grd` where (`grd`.`studentid` = `sg`.`studentid`)),'') AS `assessmentgrade`, (select `session_setup`.`sessionid` from `session_setup` where (`session_setup`.`activeflag` = 1)) AS `schoolsession`, (select `term_setup`.`termid` from `term_setup` where (`term_setup`.`activeflag` = 1)) AS `schoolterm` FROM `student_profile` AS `sg``sg`  ;

-- --------------------------------------------------------

--
-- Structure for view `view_menu`
--
DROP TABLE IF EXISTS `view_menu`;

CREATE OR REPLACE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_menu`  AS SELECT `m`.`menuid` AS `menuid`, `m`.`menuposition` AS `menuposition`, `m`.`menutitle` AS `menutitle`, `m`.`menudescription` AS `menudescription`, `m`.`menuroute` AS `menuroute`, `m`.`menucategory` AS `menucategory`, (select `c`.`category` from `categorytable` `c` where (`c`.`categoryid` = `m`.`menucategory`)) AS `category`, `m`.`menurole` AS `menurole`, `m`.`created_at` AS `created_at`, `m`.`updated_at` AS `updated_at` FROM `menu` AS `m``m`  ;

-- --------------------------------------------------------

--
-- Structure for view `view_position`
--
DROP TABLE IF EXISTS `view_position`;

CREATE OR REPLACE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_position`  AS SELECT `ss`.`studentno` AS `studentno`, `ss`.`fullname` AS `fullname`, `ss`.`subjects` AS `subjects`, `ss`.`cumavg2` AS `cumavg2`, ((select count(0) from `view_scoresheet` `sh` where ((`sh`.`cumavg2` > `ss`.`cumavg2`) and (`sh`.`schoolterm` = (select `ts`.`termid` from `term_setup` `ts` where (`ts`.`activeflag` = 1))) and (`sh`.`schoolsession` = (select `sst`.`sessionid` from `session_setup` `sst` where ((`sst`.`activeflag` = 1) and (`sh`.`class` = `ss`.`class`) and (`sh`.`subjects` = `ss`.`subjects`)) order by `sh`.`cumavg2`)))) + 1) AS `position`, `ss`.`sessionname` AS `sessionname`, `ss`.`schoolsession` AS `schoolsession`, `ss`.`schoolterm` AS `schoolterm`, `ss`.`termname` AS `termname` FROM `view_scoresheet` AS `ss` ORDER BY `ss`.`subjects` ASC, `ss`.`cumavg2` AS `DESCdesc` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `view_scoresheet`
--
DROP TABLE IF EXISTS `view_scoresheet`;

CREATE OR REPLACE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_scoresheet`  AS SELECT `ss`.`studentno` AS `studentno`, `ss`.`subject` AS `subjects`, (select `sub`.`subjectname` from `setup_subjects` `sub` where (`sub`.`subjectcode` = `ss`.`subject`)) AS `subjectname`, coalesce((select `sp`.`studentid` from `student_profile` `sp` where (`sp`.`regno` = `ss`.`studentno`)),NULL) AS `studentid`, coalesce((select concat(`sp`.`surname`,' ',`sp`.`othernames`) from `student_profile` `sp` where (`sp`.`regno` = `ss`.`studentno`)),'') AS `fullname`, (select `sp`.`class` from `student_profile` `sp` where (`sp`.`regno` = `ss`.`studentno`)) AS `class`, (select `sg`.`assessmentgrade` from `setup_gradebook` `sg` where ((`sg`.`assessmenttype` = 'ca1') and (`ss`.`subject` = `sg`.`studentsubject`) and (`sg`.`studentid` = `ss`.`studentno`) and (`sg`.`term` = (select `ts`.`termid` from `term_setup` `ts` where (`ts`.`activeflag` = 1))) and (`sg`.`ssession` = (select `sst`.`sessionid` from `session_setup` `sst` where (`sst`.`activeflag` = 1))))) AS `ca11`, coalesce((select `sg`.`assessmentgrade` from `setup_gradebook` `sg` where ((`sg`.`assessmenttype` = 'ca1') and (`ss`.`subject` = `sg`.`studentsubject`) and (`sg`.`studentid` = `ss`.`studentno`) and (`sg`.`term` = (select `ts`.`termid` from `term_setup` `ts` where (`ts`.`activeflag` = 1))) and (`sg`.`ssession` = (select `sst`.`sessionid` from `session_setup` `sst` where (`sst`.`activeflag` = 1))))),`ss`.`ca1`,'') AS `ca1`, coalesce((select `sg`.`assessmentgrade` from `setup_gradebook` `sg` where ((`sg`.`assessmenttype` = 'ca2') and (`ss`.`subject` = `sg`.`studentsubject`) and (`sg`.`studentid` = `ss`.`studentno`) and (`sg`.`term` = (select `ts`.`termid` from `term_setup` `ts` where (`ts`.`activeflag` = 1))) and (`sg`.`ssession` = (select `sst`.`sessionid` from `session_setup` `sst` where (`sst`.`activeflag` = 1))))),`ss`.`ca2`,'') AS `ca2`, coalesce((select `sg`.`assessmentgrade` from `setup_gradebook` `sg` where ((`sg`.`assessmenttype` = 'ca3') and (`ss`.`subject` = `sg`.`studentsubject`) and (`sg`.`studentid` = `ss`.`studentno`) and (`sg`.`term` = (select `ts`.`termid` from `term_setup` `ts` where (`ts`.`activeflag` = 1))) and (`sg`.`ssession` = (select `sst`.`sessionid` from `session_setup` `sst` where (`sst`.`activeflag` = 1))))),`ss`.`ca3`,'') AS `ca3`, coalesce((select `sg`.`assessmentgrade` from `setup_gradebook` `sg` where ((`sg`.`assessmenttype` = 'exam') and (`ss`.`subject` = `sg`.`studentsubject`) and (`sg`.`studentid` = `ss`.`studentno`) and (`sg`.`term` = (select `ts`.`termid` from `term_setup` `ts` where (`ts`.`activeflag` = 1))) and (`sg`.`ssession` = (select `sst`.`sessionid` from `session_setup` `sst` where (`sst`.`activeflag` = 1))))),`ss`.`exam`,'') AS `exam`, coalesce(nullif((((coalesce((select `sg`.`assessmentgrade` from `setup_gradebook` `sg` where ((`sg`.`assessmenttype` = 'ca1') and (`ss`.`subject` = `sg`.`studentsubject`) and (`sg`.`studentid` = `ss`.`studentno`) and (`sg`.`term` = (select `ts`.`termid` from `term_setup` `ts` where (`ts`.`activeflag` = 1))) and (`sg`.`ssession` = (select `sst`.`sessionid` from `session_setup` `sst` where (`sst`.`activeflag` = 1))))),`ss`.`ca1`,0) + coalesce((select `sg`.`assessmentgrade` from `setup_gradebook` `sg` where ((`sg`.`assessmenttype` = 'ca2') and (`ss`.`subject` = `sg`.`studentsubject`) and (`sg`.`studentid` = `ss`.`studentno`) and (`sg`.`term` = (select `ts`.`termid` from `term_setup` `ts` where (`ts`.`activeflag` = 1))) and (`sg`.`ssession` = (select `sst`.`sessionid` from `session_setup` `sst` where (`sst`.`activeflag` = 1))))),`ss`.`ca2`,0)) + coalesce((select `sg`.`assessmentgrade` from `setup_gradebook` `sg` where ((`sg`.`assessmenttype` = 'ca3') and (`ss`.`subject` = `sg`.`studentsubject`) and (`sg`.`studentid` = `ss`.`studentno`) and (`sg`.`term` = (select `ts`.`termid` from `term_setup` `ts` where (`ts`.`activeflag` = 1))) and (`sg`.`ssession` = (select `sst`.`sessionid` from `session_setup` `sst` where (`sst`.`activeflag` = 1))))),`ss`.`ca3`,0)) + coalesce((select `sg`.`assessmentgrade` from `setup_gradebook` `sg` where ((`sg`.`assessmenttype` = 'exam') and (`ss`.`subject` = `sg`.`studentsubject`) and (`sg`.`studentid` = `ss`.`studentno`) and (`sg`.`term` = (select `ts`.`termid` from `term_setup` `ts` where (`ts`.`activeflag` = 1))) and (`sg`.`ssession` = (select `sst`.`sessionid` from `session_setup` `sst` where (`sst`.`activeflag` = 1))))),`ss`.`exam`,0)),0),`ss`.`termsummary`,'NULL') AS `termsummary`, `ss`.`lasttermcum` AS `lasttermcum`, `ss`.`cumavg` AS `cumavg`, ((coalesce(nullif((((coalesce((select `sg`.`assessmentgrade` from `setup_gradebook` `sg` where ((`sg`.`assessmenttype` = 'ca1') and (`ss`.`subject` = `sg`.`studentsubject`) and (`sg`.`studentid` = `ss`.`studentno`) and (`sg`.`term` = (select `ts`.`termid` from `term_setup` `ts` where (`ts`.`activeflag` = 1))) and (`sg`.`ssession` = (select `sst`.`sessionid` from `session_setup` `sst` where (`sst`.`activeflag` = 1))))),`ss`.`ca1`,0) + coalesce((select `sg`.`assessmentgrade` from `setup_gradebook` `sg` where ((`sg`.`assessmenttype` = 'ca2') and (`ss`.`subject` = `sg`.`studentsubject`) and (`sg`.`studentid` = `ss`.`studentno`) and (`sg`.`term` = (select `ts`.`termid` from `term_setup` `ts` where (`ts`.`activeflag` = 1))) and (`sg`.`ssession` = (select `sst`.`sessionid` from `session_setup` `sst` where (`sst`.`activeflag` = 1))))),`ss`.`ca2`,0)) + coalesce((select `sg`.`assessmentgrade` from `setup_gradebook` `sg` where ((`sg`.`assessmenttype` = 'ca3') and (`ss`.`subject` = `sg`.`studentsubject`) and (`sg`.`studentid` = `ss`.`studentno`) and (`sg`.`term` = (select `ts`.`termid` from `term_setup` `ts` where (`ts`.`activeflag` = 1))) and (`sg`.`ssession` = (select `sst`.`sessionid` from `session_setup` `sst` where (`sst`.`activeflag` = 1))))),`ss`.`ca3`,0)) + coalesce((select `sg`.`assessmentgrade` from `setup_gradebook` `sg` where ((`sg`.`assessmenttype` = 'exam') and (`ss`.`subject` = `sg`.`studentsubject`) and (`sg`.`studentid` = `ss`.`studentno`) and (`sg`.`term` = (select `ts`.`termid` from `term_setup` `ts` where (`ts`.`activeflag` = 1))) and (`sg`.`ssession` = (select `sst`.`sessionid` from `session_setup` `sst` where (`sst`.`activeflag` = 1))))),`ss`.`exam`,0)),0),`ss`.`termsummary`,'') + `ss`.`lasttermcum`) / 2) AS `cumavg2`, `ss`.`classavg` AS `classavg`, `ss`.`position` AS `position`, `ss`.`remark` AS `remark`, `ss`.`sign` AS `signs`, (select `session_setup`.`sessionid` from `session_setup` where (`session_setup`.`activeflag` = 1)) AS `schoolsession`, (select `session_setup`.`session` from `session_setup` where (`session_setup`.`activeflag` = 1)) AS `sessionname`, (select `term_setup`.`termid` from `term_setup` where (`term_setup`.`activeflag` = 1)) AS `schoolterm`, (select `term_setup`.`term` from `term_setup` where (`term_setup`.`activeflag` = 1)) AS `termname` FROM `scoresheet` AS `ss` WHERE ((`ss`.`term` = (select `ts`.`termid` from `term_setup` `ts` where (`ts`.`activeflag` = 1))) AND (`ss`.`session` = (select `sst`.`sessionid` from `session_setup` `sst` where (`sst`.`activeflag` = 1))))  ;

-- --------------------------------------------------------

--
-- Structure for view `view_staffprofile`
--
DROP TABLE IF EXISTS `view_staffprofile`;

CREATE OR REPLACE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_staffprofile`  AS SELECT `spr`.`staffid` AS `staffid`, `spr`.`empno` AS `regno`, concat(`spr`.`surname`,' ',`spr`.`othernames`) AS `fullname`, `spr`.`dob` AS `dob`, `spr`.`hometown` AS `hometown`, `spr`.`lga` AS `lga`, `spr`.`stateoforigin` AS `stateoforigin`, `spr`.`permanentaddress` AS `permanentaddress`, `spr`.`nin` AS `nin`, `spr`.`email` AS `email`, `spr`.`phonenumber` AS `phonenumber`, `spr`.`position` AS `position`, `spr`.`gender` AS `gender`, `spr`.`ethnicity` AS `ethnicity`, `spr`.`religion` AS `religion`, `spr`.`weight` AS `weight`, `spr`.`height` AS `height`, `spr`.`disability` AS `disability`, `spr`.`bloodgroup` AS `bloodgroup`, `spr`.`genotype` AS `genotype`, `spr`.`vision` AS `vision`, `spr`.`hearing` AS `hearing`, `spr`.`speech` AS `speech`, `spr`.`generalvitality` AS `generalvitality`, `spr`.`nationality` AS `nationality`, `spr`.`nextofkin` AS `nextofkin`, `spr`.`nextofkinrelationship` AS `nextofkinrelationship`, `spr`.`nextofkinnin` AS `nextofkinnin`, `spr`.`nextofkinoccupation` AS `nextofkinoccupation`, `spr`.`nextofkinaddress` AS `nextofkinaddress`, `spr`.`nextofkinphonenumber` AS `nextofkinphonenumber`, `spr`.`startedon` AS `startedon`, `spr`.`courseofstudy` AS `courseofstudy`, `spr`.`qualification` AS `qualification`, `spr`.`dateofaward` AS `dateofaward`, `spr`.`lastupdate` AS `lastupdate` FROM `staff_profile` AS `spr``spr`  ;

-- --------------------------------------------------------

--
-- Structure for view `view_studentprofile`
--
DROP TABLE IF EXISTS `view_studentprofile`;

CREATE OR REPLACE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_studentprofile`  AS SELECT `sp`.`studentid` AS `studentid`, `sp`.`regno` AS `regno`, concat(`sp`.`surname`,' ',`sp`.`othernames`) AS `fullname`, `sp`.`dob` AS `dob`, `sp`.`class` AS `class`, `sp`.`hometown` AS `hometown`, `sp`.`lga` AS `lga`, `sp`.`stateoforigin` AS `stateoforigin`, `sp`.`nationality` AS `nationality`, `sp`.`nin` AS `nin`, `sp`.`gender` AS `gender`, `sp`.`height` AS `height`, `sp`.`weight` AS `weight`, `sp`.`fathername` AS `fathername`, `sp`.`fatheroccupation` AS `fatheroccupation`, `sp`.`mothername` AS `mothername`, `sp`.`motheroccupation` AS `motheroccupation`, `sp`.`fatherpermaddress` AS `fatherpermaddress`, `sp`.`fatherphonenumber` AS `fatherphonenumber`, `sp`.`motherpermaddress` AS `motherpermaddress`, `sp`.`motherphonenumber` AS `motherphonenumber`, `sp`.`guardianname` AS `guardianname`, `sp`.`guardianoccupation` AS `guardianoccupation`, `sp`.`guardianpermaddress` AS `guardianpermaddress`, `sp`.`guardianphonenumber` AS `guardianphonenumber`, `sp`.`email` AS `email`, `sp`.`familytype` AS `familytype`, `sp`.`familysize` AS `familysize`, `sp`.`positioninfamily` AS `positioninfamily`, `sp`.`noofbrothers` AS `noofbrothers`, `sp`.`noofsisters` AS `noofsisters`, `sp`.`parentreligion` AS `parentreligion`, `sp`.`disability` AS `disability`, `sp`.`bloodgroup` AS `bloodgroup`, `sp`.`genotype` AS `genotype`, `sp`.`vision` AS `vision`, `sp`.`hearing` AS `hearing`, `sp`.`speech` AS `speech`, `sp`.`generalvitality` AS `generalvitality`, `sp`.`classgiven` AS `classgiven`, `sp`.`classgroup` AS `classgroup`, `sp`.`last_updated` AS `last_updated`, (select `session_setup`.`sessionid` from `session_setup` where (`session_setup`.`activeflag` = 1)) AS `schoolsession`, (select `session_setup`.`session` from `session_setup` where (`session_setup`.`activeflag` = 1)) AS `sessionname`, (select `term_setup`.`termid` from `term_setup` where (`term_setup`.`activeflag` = 1)) AS `schoolterm`, (select `term_setup`.`term` from `term_setup` where (`term_setup`.`activeflag` = 1)) AS `termname` FROM `student_profile` AS `sp``sp`  ;

-- --------------------------------------------------------

--
-- Structure for view `view_summary`
--
DROP TABLE IF EXISTS `view_summary`;

CREATE OR REPLACE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_summary`  AS SELECT `ss`.`studentno` AS `STUDENTNO`, coalesce((select `sg`.`assessmentgrade` from `setup_gradebook` `sg` where ((`sg`.`assessmenttype` = 'ca1') and (`ss`.`subject` = `sg`.`studentsubject`) and (`sg`.`studentid` = `ss`.`studentno`) and (`sg`.`term` = (select `ts`.`termid` from `term_setup` `ts` where (`ts`.`activeflag` = 1))) and (`sg`.`ssession` = (select `sst`.`sessionid` from `session_setup` `sst` where (`sst`.`activeflag` = 1))))),`ss`.`ca1`,0) AS `CA1`, coalesce((select `sg`.`assessmentgrade` from `setup_gradebook` `sg` where ((`sg`.`assessmenttype` = 'ca2') and (`ss`.`subject` = `sg`.`studentsubject`) and (`sg`.`studentid` = `ss`.`studentno`) and (`sg`.`term` = (select `ts`.`termid` from `term_setup` `ts` where (`ts`.`activeflag` = 1))) and (`sg`.`ssession` = (select `sst`.`sessionid` from `session_setup` `sst` where (`sst`.`activeflag` = 1))))),`ss`.`ca2`,0) AS `CA2`, coalesce((select `sg`.`assessmentgrade` from `setup_gradebook` `sg` where ((`sg`.`assessmenttype` = 'ca3') and (`ss`.`subject` = `sg`.`studentsubject`) and (`sg`.`studentid` = `ss`.`studentno`) and (`sg`.`term` = (select `ts`.`termid` from `term_setup` `ts` where (`ts`.`activeflag` = 1))) and (`sg`.`ssession` = (select `sst`.`sessionid` from `session_setup` `sst` where (`sst`.`activeflag` = 1))))),`ss`.`ca3`,0) AS `CA3`, coalesce((select `sg`.`assessmentgrade` from `setup_gradebook` `sg` where ((`sg`.`assessmenttype` = 'exam') and (`ss`.`subject` = `sg`.`studentsubject`) and (`sg`.`studentid` = `ss`.`studentno`) and (`sg`.`term` = (select `ts`.`termid` from `term_setup` `ts` where (`ts`.`activeflag` = 1))) and (`sg`.`ssession` = (select `sst`.`sessionid` from `session_setup` `sst` where (`sst`.`activeflag` = 1))))),`ss`.`exam`,0) AS `EXAM`, coalesce(nullif((((coalesce((select `sg`.`assessmentgrade` from `setup_gradebook` `sg` where ((`sg`.`assessmenttype` = 'ca1') and (`ss`.`subject` = `sg`.`studentsubject`) and (`sg`.`studentid` = `ss`.`studentno`) and (`sg`.`term` = (select `ts`.`termid` from `term_setup` `ts` where (`ts`.`activeflag` = 1))) and (`sg`.`ssession` = (select `sst`.`sessionid` from `session_setup` `sst` where (`sst`.`activeflag` = 1))))),`ss`.`ca1`,0) + coalesce((select `sg`.`assessmentgrade` from `setup_gradebook` `sg` where ((`sg`.`assessmenttype` = 'ca2') and (`ss`.`subject` = `sg`.`studentsubject`) and (`sg`.`studentid` = `ss`.`studentno`) and (`sg`.`term` = (select `ts`.`termid` from `term_setup` `ts` where (`ts`.`activeflag` = 1))) and (`sg`.`ssession` = (select `sst`.`sessionid` from `session_setup` `sst` where (`sst`.`activeflag` = 1))))),`ss`.`ca2`,0)) + coalesce((select `sg`.`assessmentgrade` from `setup_gradebook` `sg` where ((`sg`.`assessmenttype` = 'ca3') and (`ss`.`subject` = `sg`.`studentsubject`) and (`sg`.`studentid` = `ss`.`studentno`) and (`sg`.`term` = (select `ts`.`termid` from `term_setup` `ts` where (`ts`.`activeflag` = 1))) and (`sg`.`ssession` = (select `sst`.`sessionid` from `session_setup` `sst` where (`sst`.`activeflag` = 1))))),`ss`.`ca3`,0)) + coalesce((select `sg`.`assessmentgrade` from `setup_gradebook` `sg` where ((`sg`.`assessmenttype` = 'exam') and (`ss`.`subject` = `sg`.`studentsubject`) and (`sg`.`studentid` = `ss`.`studentno`) and (`sg`.`term` = (select `ts`.`termid` from `term_setup` `ts` where (`ts`.`activeflag` = 1))) and (`sg`.`ssession` = (select `sst`.`sessionid` from `session_setup` `sst` where (`sst`.`activeflag` = 1))))),`ss`.`exam`,0)),0),`ss`.`termsummary`,'NULL') AS `SUMMARY` FROM `scoresheet` AS `ss``ss`  ;

-- --------------------------------------------------------

--
-- Structure for view `view_userlogin`
--
DROP TABLE IF EXISTS `view_userlogin`;

CREATE OR REPLACE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_userlogin`  AS SELECT trim(`sp`.`regno`) AS `username`, coalesce((select `pt`.`pwd` from `password_table` `pt` where (`pt`.`studentno` = `sp`.`regno`)),convert(md5(upper(trim(`sp`.`surname`))) using latin1)) AS `password`, trim(`sp`.`email`) AS `email`, 'student' AS `category` FROM `student_profile` AS `sp` union select trim(`ssp`.`empno`) AS `username`,coalesce((select `pt`.`pwd` from `password_table` `pt` where (`pt`.`studentno` = `ssp`.`empno`)),convert(md5(upper(trim(`ssp`.`surname`))) using latin1)) AS `password`,trim(`ssp`.`email`) AS `email`,trim(`ssp`.`position`) AS `category` from `staff_profile` `ssp`  ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
