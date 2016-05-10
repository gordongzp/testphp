-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-05-10 12:52:04
-- 服务器版本： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- 表的结构 `xy_admin`
--

CREATE TABLE IF NOT EXISTS `xy_admin` (
`id` int(10) unsigned NOT NULL COMMENT 'id',
  `user_name` varchar(40) NOT NULL COMMENT '管理员用户名',
  `user_pwd` varchar(32) NOT NULL COMMENT '管理员密码'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `xy_admin`
--

INSERT INTO `xy_admin` (`id`, `user_name`, `user_pwd`) VALUES
(1, 'admin', '66981caf101c63150d2ceaf5e5862ec0');

-- --------------------------------------------------------

--
-- 表的结构 `xy_cate`
--

CREATE TABLE IF NOT EXISTS `xy_cate` (
`cat_id` int(10) unsigned NOT NULL COMMENT 'id',
  `pid` int(10) unsigned NOT NULL COMMENT 'father_id',
  `name` varchar(40) NOT NULL COMMENT '类别名称'
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `xy_cate`
--

INSERT INTO `xy_cate` (`cat_id`, `pid`, `name`) VALUES
(103, 0, '干洗'),
(104, 0, '水洗'),
(105, 0, '皮衣'),
(106, 0, '织补'),
(107, 0, '单烫'),
(108, 103, '西装类'),
(109, 103, '大衣类'),
(110, 108, '短西裤');

-- --------------------------------------------------------

--
-- 表的结构 `xy_user`
--

CREATE TABLE IF NOT EXISTS `xy_user` (
`id` int(10) unsigned NOT NULL COMMENT 'id',
  `user_name` varchar(40) NOT NULL COMMENT '用户名',
  `user_pwd` varchar(32) NOT NULL COMMENT '密码',
  `tel` varchar(20) NOT NULL COMMENT '电话',
  `email` varchar(40) NOT NULL,
  `true_name` varchar(20) NOT NULL COMMENT '真实姓名',
  `person_id` varchar(20) NOT NULL COMMENT '身份证号码',
  `person_identity_stage` int(1) NOT NULL COMMENT '实名认证状态',
  `is_seller` int(1) unsigned NOT NULL COMMENT '是否为卖家，1代表是',
  `reg_time` int(11) NOT NULL COMMENT '注册日期',
  `update_time` int(11) NOT NULL COMMENT '修改时间',
  `last_log_time` int(11) NOT NULL COMMENT '最后登录日期',
  `reg_ip` varchar(15) NOT NULL COMMENT '注册ip地址',
  `last_log_ip` varchar(15) NOT NULL COMMENT '最后登录ip'
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `xy_user`
--

INSERT INTO `xy_user` (`id`, `user_name`, `user_pwd`, `tel`, `email`, `true_name`, `person_id`, `person_identity_stage`, `is_seller`, `reg_time`, `update_time`, `last_log_time`, `reg_ip`, `last_log_ip`) VALUES
(38, 'gordon', '512aa81a91ed8f232c9fc8d848e3d016', '18112512811', 'gordonwiles@126.com', '郭子鹏', '3204123', 1, 0, 1462786547, 1462877318, 1462876388, '0.0.0.0', '0.0.0.0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `xy_admin`
--
ALTER TABLE `xy_admin`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`), ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `xy_cate`
--
ALTER TABLE `xy_cate`
 ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `xy_user`
--
ALTER TABLE `xy_user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `user_name` (`user_name`), ADD UNIQUE KEY `tel` (`tel`), ADD UNIQUE KEY `person_id` (`person_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `xy_admin`
--
ALTER TABLE `xy_admin`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `xy_cate`
--
ALTER TABLE `xy_cate`
MODIFY `cat_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT for table `xy_user`
--
ALTER TABLE `xy_user`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',AUTO_INCREMENT=39;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
