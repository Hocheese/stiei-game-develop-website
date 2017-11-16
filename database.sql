-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017-11-16 05:31:43
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
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `hidden` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `article`
--

INSERT INTO `article` (`id`, `title`, `timeline`, `ucode`, `cid`, `imageid`, `text`, `hidden`) VALUES
(1, '', 1510399644, 100001, 0, 0, '', 0),
(2, '', 1510399718, 100001, 0, 0, '', 0),
(3, '', 1510399780, 100001, 0, 0, '', 0),
(4, '', 1510399786, 100001, 0, 0, '', 0),
(5, '测试', 1510401045, 100001, 0, 3, '这是游戏开发社网站的第一篇有意义的文章~~~', 0),
(6, '试试高级编辑器', 1510417389, 100001, 0, 8, '<img src=\"/?ctrl=image&act=get&id=8\" alt=\"\" />', 0),
(7, 'JavaScript是世界上最好的语言', 1510549647, 100001, 2, 18, 'Java C# C++ PHP VB RUBY GO 都是垃圾', 0),
(8, '上电游戏开发社的网站开始试运行啦！', 1510670504, 100001, 1, 0, '<p>\r\n	在王贺青与陈吉禹两位程序猿加班加点地努力下，游戏开发社的网站上线试运行了。\r\n</p>\r\n<p>\r\n	由于时间比较紧，难免有各种BUG。希望各位在遇见BUG时，请及时告知我们。\r\n</p>\r\n<p>\r\n	包括但不限于：\r\n</p>\r\n<p>\r\n	<ul>\r\n		<li>\r\n			功能上的漏洞（如按钮点不了，链接失效等）\r\n		</li>\r\n		<li>\r\n			安全上的漏洞（如SQL注入，XSS等）\r\n		</li>\r\n	</ul>\r\n	<p>\r\n		技术负责人王贺青的QQ：2653591247\r\n	</p>\r\n</p>', 0);

-- --------------------------------------------------------

--
-- 表的结构 `article_class`
--

CREATE TABLE `article_class` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `article_class`
--

INSERT INTO `article_class` (`id`, `name`) VALUES
(1, '公告');

-- --------------------------------------------------------

--
-- 表的结构 `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `type` text COLLATE utf8_unicode_ci NOT NULL,
  `src` text COLLATE utf8_unicode_ci NOT NULL,
  `safe` int(11) NOT NULL COMMENT '水印位置',
  `timeline` int(11) NOT NULL,
  `hidden` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `image`
--

INSERT INTO `image` (`id`, `title`, `type`, `src`, `safe`, `timeline`, `hidden`) VALUES
(1, '无标题', 'png', 'source/images/1510315431.png', 5, 1510315431, 0),
(2, '无标题', 'png', 'source/images/1510330746.png', 6, 1510330746, 0),
(3, '无标题', 'png', 'source/images/1510376680.png', 5, 1510376680, 0),
(4, '无标题', 'jpg', 'source/images/1510388451.jpg', 5, 1510388451, 0),
(5, '无标题', 'png', 'source/images/1510401922.png', 5, 1510401922, 0),
(6, '无标题', 'jpg', 'source/images/1510417044.jpg', 5, 1510417044, 0),
(7, '无标题', 'jpg', 'source/images/1510417126.jpg', 5, 1510417126, 0),
(8, '无标题', 'jpg', 'source/images/1510417339.jpg', 5, 1510417339, 0),
(9, '无标题', 'jpg', 'source/images/1510632531.jpg', 5, 1510632531, 0),
(10, '无标题', 'jpg', 'source/images/1510632549.jpg', 5, 1510632549, 0),
(11, '无标题', 'jpg', 'source/images/1510632566.jpg', 5, 1510632566, 0),
(12, '无标题', 'jpg', 'source/images/1510632576.jpg', 5, 1510632576, 0);

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

--
-- 转存表中的数据 `teams_info`
--

INSERT INTO `teams_info` (`id`, `tname`, `tcreator`, `timeline`) VALUES
(1, '统治阶层', 100001, 0),
(2, '统治阶层的管理', 100001, 1510549146);

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

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `account_code`, `password`, `email`, `admin`, `level`, `realname`, `sex`, `study_code`, `profession`, `timeline`) VALUES
(1, 100001, '$2y$10$I/zsCuzPqpo6J6Mpyhjvwegl9HCzr3TUrmpvgN7wampZyucYRVGFO', '', 1, 0, '管理员', 0, 0, 0, 1510366845);

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
-- Indexes for table `article_class`
--
ALTER TABLE `article_class`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `article_class`
--
ALTER TABLE `article_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- 使用表AUTO_INCREMENT `sys_profession`
--
ALTER TABLE `sys_profession`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '系统标识符', AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `teams_info`
--
ALTER TABLE `teams_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `tips`
--
ALTER TABLE `tips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '系统标识符', AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
