-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017-11-10 12:42:22
-- 服务器版本： 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gdg`
--

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `timeline` int(11) NOT NULL,
  `ucode` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `imageid` int(11) NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `article_class`
--

CREATE TABLE `article_class` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `type` text COLLATE utf8_unicode_ci NOT NULL,
  `src` text COLLATE utf8_unicode_ci NOT NULL,
  `timeline` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `sys_profession`
--

CREATE TABLE `sys_profession` (
  `id` int(11) NOT NULL COMMENT '系统标识符',
  `name` text COLLATE utf8_unicode_ci NOT NULL COMMENT '专业名称',
  `college` int(11) NOT NULL COMMENT '二级学院'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `sys_profession`
--

INSERT INTO `sys_profession` (`id`, `name`, `college`) VALUES
(1, '通信与信息工程学院', 0),
(2, '网络与安全', 1);

-- --------------------------------------------------------

--
-- 表的结构 `teams_info`
--

CREATE TABLE `teams_info` (
  `id` int(11) NOT NULL,
  `tname` text COLLATE utf8_unicode_ci NOT NULL COMMENT '队伍名',
  `tcreator` int(11) NOT NULL COMMENT '创建者',
  `timeline` int(11) NOT NULL COMMENT '创建时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `teams_user`
--

CREATE TABLE `teams_user` (
  `tid` int(11) NOT NULL COMMENT '团队id',
  `uid` int(11) NOT NULL COMMENT '用户id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `tips`
--

CREATE TABLE `tips` (
  `id` int(11) NOT NULL,
  `tips` text COLLATE utf8_unicode_ci NOT NULL,
  `timeline` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL COMMENT '系统标识符',
  `account_code` int(11) NOT NULL COMMENT '6位数账号',
  `password` text COLLATE utf8_unicode_ci NOT NULL COMMENT '密码',
  `email` text COLLATE utf8_unicode_ci NOT NULL COMMENT '邮箱',
  `admin` int(11) NOT NULL COMMENT '管理员等级',
  `level` int(11) NOT NULL COMMENT '用户等级（预留）',
  `realname` text COLLATE utf8_unicode_ci NOT NULL COMMENT '姓名',
  `sex` int(11) NOT NULL COMMENT '性别',
  `study_code` int(11) NOT NULL COMMENT '学号',
  `profession` int(11) NOT NULL COMMENT '专业',
  `timeline` int(11) NOT NULL COMMENT '注册时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `user_punchin_month`
--

CREATE TABLE `user_punchin_month` (
  `ucode` int(11) NOT NULL,
  `date` int(11) NOT NULL COMMENT '1-31',
  `ispunch` int(11) NOT NULL COMMENT '0,1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `user_punchin_times`
--

CREATE TABLE `user_punchin_times` (
  `ucode` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `times` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_profession`
--
ALTER TABLE `sys_profession`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams_info`
--
ALTER TABLE `teams_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tips`
--
ALTER TABLE `tips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_code` (`account_code`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `sys_profession`
--
ALTER TABLE `sys_profession`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '系统标识符', AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `teams_info`
--
ALTER TABLE `teams_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `tips`
--
ALTER TABLE `tips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '系统标识符';COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
