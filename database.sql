-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017-11-24 07:50:10
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
CREATE DATABASE IF NOT EXISTS `gdg` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `gdg`;

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
(8, '上电游戏开发社的网站开始试运行啦！', 1510670504, 100001, 1, 0, '<p>\r\n	在王贺青与陈吉禹两位程序猿加班加点地努力下，游戏开发社的网站上线试运行了。\r\n</p>\r\n<p>\r\n	由于时间比较紧，难免有各种BUG。希望各位在遇见BUG时，请及时告知我们。\r\n</p>\r\n<p>\r\n	包括但不限于：\r\n</p>\r\n<p>\r\n	<ul>\r\n		<li>\r\n			功能上的漏洞（如按钮点不了，链接失效等）\r\n		</li>\r\n		<li>\r\n			安全上的漏洞（如SQL注入，XSS等）\r\n		</li>\r\n	</ul>\r\n	<p>\r\n		技术负责人王贺青的QQ：2653591247\r\n	</p>\r\n</p>', 0),
(9, '社团网站的高科技', 1511017336, 100001, 1, 0, '&nbsp; &nbsp; 游戏开发社社团网站的开发工作已经进入收尾阶段，各项工作正在紧张有序地进行。游戏开发社社团网站的后端代表了开发者王贺青所拥有的最高水平。那么它运用了哪些尖端技术呢？让我们一起先睹为快吧！\r\n<h2>\r\n	链式存储\r\n</h2>\r\n&nbsp; &nbsp; 在开发社团网站时，需要将学校的二级学院与专业信息存储在数据库中。这是一个非线性结构的数据。王贺青将数据结构的相关理论运用于存储这些信息的实践中，将所有二级学院与专业信息存储于一个数据表中，并增加一个存储二级学院id的字段，有效降低了增加、删除、修改、查询的实现难度。<br />\r\n<h2>\r\n	小青易测模板引擎v2.0\r\n</h2>\r\n&nbsp; &nbsp; 社团网站采用了王贺青自主研发的“小青易测模板引擎v2.0”。该模板引擎的之前版本被用于已经弃坑的etest 1.0 alpha(<a href=\"http://etest.xyz/?v=new\" target=\"_blank\">http://etest.xyz/?v=new</a>)。和之前版本相比，“小青易测模板引擎v2.0”最大的亮点就是支持点语法书写数组变量。例如，模板中的“{$user.id}”会被小青易测模板引擎v2.0编译为“&lt;?php echo $user[\"id\"] ?&gt;”。该特性有效地降低了模板开发的工作量。<br />\r\n<h2>\r\n	flex布局\r\n</h2>\r\n&nbsp; &nbsp; 社团网站的管理界面全面采用flex布局方式。与传统的float布局相比，flex布局更加高效。<br />\r\n<h2>\r\n	left join\r\n</h2>\r\n<p>\r\n	&nbsp; &nbsp; 社团网站的模型层运用了大量的left join查询，有效降低了查询次数与请求次数，对网站效率的提升起到了极大的帮助。\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n&nbsp; &nbsp; 社团网站还运用了许多尖端技术。不多说了，让我们一起期待它的上线吧！<img src=\"http://127.0.0.4/editor/plugins/emoticons/images/13.gif\" border=\"0\" alt=\"\" />', 0);

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
(3, '电子技术与工程学院', 0),
(4, '机械与能源工程学院', 0),
(5, '经济与管理学院', 0),
(6, '中德工程学院', 0),
(7, '设计与艺术学院', 0),
(8, '外语学院', 0),
(9, '通信技术', 1),
(10, '移动通信技术', 1),
(11, '建筑智能化工程技术(楼宇智能化方向)', 1),
(12, '移动互联应用技术', 1),
(13, '计算机应用技术', 1),
(14, '计算机网络技术', 1),
(15, '软件技术', 1),
(16, '信息安全与管理(高本贯通)', 1),
(17, '信息安全与管理', 1),
(18, '物联网工程技术', 1);

-- --------------------------------------------------------

--
-- 表的结构 `teams_info`
--

CREATE TABLE `teams_info` (
  `id` int(11) NOT NULL,
  `tname` text COLLATE utf8_unicode_ci NOT NULL COMMENT '队伍名',
  `tcreator` int(11) NOT NULL COMMENT '创建者',
  `timeline` int(11) NOT NULL COMMENT '创建时间',
  `text` text COLLATE utf8_unicode_ci NOT NULL COMMENT '简介',
  `allowjoin` int(11) NOT NULL COMMENT '允许加入否？0不允许1允许任何人2需要申请'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `teams_info`
--

INSERT INTO `teams_info` (`id`, `tname`, `tcreator`, `timeline`, `text`, `allowjoin`) VALUES
(5, '贝塔狗', 888888, 1511356975, '挑战AlphaGO！', 0),
(6, '森之宁胡笨蛋9', 201032, 1511504475, '一群混吃等死的笨蛋', 0),
(7, '打爆李永辉狗头', 100001, 1511504673, '专门打爆李永辉狗头的游戏开发队伍', 0);

-- --------------------------------------------------------

--
-- 表的结构 `teams_user`
--

CREATE TABLE `teams_user` (
  `tid` int(11) NOT NULL COMMENT '团队id',
  `uid` int(11) NOT NULL COMMENT '用户id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `teams_user`
--

INSERT INTO `teams_user` (`tid`, `uid`) VALUES
(5, 888888),
(6, 201032),
(7, 100001);

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
(1, 100001, '$2y$10$Xg/spEUIJl3/.6lqMoWxSui94e.GC5dg1UmAlCMc3bQqoTp/u0aIK', '', 1, 0, '', 0, 0, 0, 1511505924),
(2, 888888, '$2y$10$JSTYi4IQufp0jvGoh.j8quCAzC4NOhTkkoyRAnhBA4agLjk9enPEq', '2653591247@qq.com', 2, 0, '王贺青', 1, 2016131321, 15, 1510836992),
(3, 201032, '$2y$10$jtl/Q7gi2wqg7KSRdhdfnO1fVDmCn4c76zdk/HNg7ulCokTXT74IS', '', 0, 0, '李永辉', 0, 2016138215, 0, 1511504133);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '系统标识符', AUTO_INCREMENT=19;
--
-- 使用表AUTO_INCREMENT `teams_info`
--
ALTER TABLE `teams_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用表AUTO_INCREMENT `tips`
--
ALTER TABLE `tips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '系统标识符', AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
