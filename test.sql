-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-05-05 12:20:44
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
-- 表的结构 `xy_user`
--

CREATE TABLE IF NOT EXISTS `xy_user` (
`id` int(10) unsigned NOT NULL COMMENT 'id',
  `user_name` varchar(40) NOT NULL COMMENT '用户名',
  `user_pwd` varchar(32) NOT NULL COMMENT '密码',
  `email` varchar(40) NOT NULL,
  `tel` varchar(20) NOT NULL COMMENT '电话',
  `reg_time` int(11) NOT NULL COMMENT '注册日期',
  `update_time` int(11) NOT NULL COMMENT '修改时间',
  `reg_ip` varchar(15) NOT NULL COMMENT '注册ip地址',
  `last_log_time` int(11) NOT NULL COMMENT '最后登录日期'
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `xy_user`
--

INSERT INTO `xy_user` (`id`, `user_name`, `user_pwd`, `email`, `tel`, `reg_time`, `update_time`, `reg_ip`, `last_log_time`) VALUES
(28, 'gordongzp', '11790dce4678bd6798226bbd753d18a5', '', '18112512811', 1462443125, 0, '0.0.0.0', 1462443125);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `xy_user`
--
ALTER TABLE `xy_user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `user_name` (`user_name`), ADD UNIQUE KEY `tel` (`tel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `xy_user`
--
ALTER TABLE `xy_user`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
