-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017-07-22 14:16:52
-- 服务器版本： 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `source` varchar(100) DEFAULT NULL,
  `content` text NOT NULL,
  `introduction` varchar(500) NOT NULL,
  `keywords` varchar(200) NOT NULL,
  `author` varchar(100) NOT NULL DEFAULT '0',
  `recommend` int(11) NOT NULL DEFAULT '0',
  `rank` int(11) NOT NULL DEFAULT '0',
  `createTime` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `article`
--

INSERT INTO `article` (`id`, `title`, `source`, `content`, `introduction`, `keywords`, `author`, `recommend`, `rank`, `createTime`) VALUES
(23, '犯得上反对地方', NULL, '<p>规划分局健康和v</p>', '加快速度恢复的时刻', '好久不见收到收到', 'renwei ', 0, 0, '0000-00-00'),
(24, '持续性', NULL, '<p><em><strong>的反对反对的附带官方说法</strong></em></p>', '的三分到手', '打发打发', 'renwei', 0, 0, '0000-00-00'),
(25, '看见对方的空间', NULL, '<p>发到手机开放看电视剧犯得上看见发生了发</p>', '健康的方式能否看见', '肯定发生了能否', '的是看风景的', 0, 0, '0000-00-00'),
(26, '减肥的思考了解放螺丝扣', NULL, '<p>考试的方式jfk是否</p>', '快速打开附件是浪费', '你，是短发女生开房', 'dfjks ', 0, 0, '0000-00-00'),
(27, '收费的克利夫兰', NULL, '<p>螺丝钉解放了多少jfk罗斯福</p>', '的时间发牢骚看风景', '圣诞快乐附近的', 'young', 0, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- 表的结构 `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `text` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `text`) VALUES
(1, 'news01', 'slug1', 'this is news 01'),
(2, 'news02', 'slug2', 'this is news 02'),
(5, 'new03', 'slug3', 'this is news 03'),
(4, 'news04', 'slug4', 'this is news 04');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'renwei', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slug` (`slug`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- 使用表AUTO_INCREMENT `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
