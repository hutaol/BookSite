-- phpMyAdmin SQL Dump
-- version 3.3.7
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 11 月 28 日 14:32
-- 服务器版本: 5.1.69
-- PHP 版本: 5.2.17p1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `www_23`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70'),
(2, 'qaz123', '34f85ca80ec353d3052b8a2d3973a0c5');

-- --------------------------------------------------------

--
-- 表的结构 `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL COMMENT '分类名',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `class`
--

INSERT INTO `class` (`id`, `name`) VALUES
(3, '日立'),
(2, '小松'),
(4, '卡特'),
(5, '神钢'),
(6, '斗山'),
(7, '沃尔沃'),
(8, '现代'),
(9, '国产'),
(10, '其他');

-- --------------------------------------------------------

--
-- 表的结构 `guanyu`
--

CREATE TABLE IF NOT EXISTS `guanyu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `jian` varchar(500) NOT NULL COMMENT '简介',
  `cont` text NOT NULL COMMENT '内容',
  `img` varchar(30) NOT NULL COMMENT '图',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `guanyu`
--

INSERT INTO `guanyu` (`id`, `jian`, `cont`, `img`) VALUES
(1, '简介没错 这就是简介没错 这就是简介没错 这就是简介没错 这就是简介没错 这就是简介没错 这就是简介没错 这就是简介没错 这就是简介没错 这就是简介', '<p>没错 这就是简介没错 这就是简介没错 这就是简介没错 这就是简介没错 这就是简介没错 这就是简介没错 这就是简介没错 这就是简介没错 这就是简介没错 这就是简介没错 这就是简介没错 这就是简介没错 这就是简介没错 这就是简介没错 这</p>\n', '583420a14ac40.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `lian`
--

CREATE TABLE IF NOT EXISTS `lian` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `lianjie` varchar(20) NOT NULL COMMENT '链接名',
  `www` varchar(50) NOT NULL COMMENT '链接地址',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `lian`
--

INSERT INTO `lian` (`id`, `lianjie`, `www`) VALUES
(1, '二手购', 'www.baidu.com'),
(2, '二手购机', 'www.baidu.com'),
(3, '挖掘机配件', 'www.baidu.com');

-- --------------------------------------------------------

--
-- 表的结构 `lianxi`
--

CREATE TABLE IF NOT EXISTS `lianxi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `jingli` varchar(10) NOT NULL COMMENT '经理',
  `tel` varchar(30) NOT NULL COMMENT '电话',
  `add` varchar(30) NOT NULL COMMENT '地址',
  `qq` varchar(20) NOT NULL COMMENT '客服qq',
  `cheng` varchar(30) NOT NULL COMMENT '乘车',
  `cont` text NOT NULL COMMENT '内容',
  `title` varchar(30) NOT NULL,
  `qq1` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `lianxi`
--

INSERT INTO `lianxi` (`id`, `jingli`, `tel`, `add`, `qq`, `cheng`, `cont`, `title`, `qq1`) VALUES
(1, '王经理', '15850318055    18261655799', '苏州洋杰工程机械工业园', '1367817377', '高铁乘车到昆山南', '<p style="outline: none; margin-top: 0px; margin-bottom: 12px; padding: 0px; text-indent: 2em; line-height: 30px; font-size: 14px; color: rgb(51, 51, 51); font-family: verdana, arial, tahoma; white-space: normal; background-color: rgb(250, 250, 250);">苏州洋杰二手挖掘机直销网</p><p style="outline: none; margin-top: 0px; margin-bottom: 12px; padding: 0px; text-indent: 2em; line-height: 30px; font-size: 14px; color: rgb(51, 51, 51); font-family: verdana, arial, tahoma; white-space: normal; background-color: rgb(250, 250, 250);">服务热线：15850318055 &nbsp; 18261655799</p><p style="outline: none; margin-top: 0px; margin-bottom: 12px; padding: 0px; text-indent: 2em; line-height: 30px; font-size: 14px; color: rgb(51, 51, 51); font-family: verdana, arial, tahoma; white-space: normal; background-color: rgb(250, 250, 250);">全国直销网址：www.yangjiewjj.com</p><p style="outline: none; margin-top: 0px; margin-bottom: 12px; padding: 0px; text-indent: 2em; line-height: 30px; font-size: 14px; color: rgb(51, 51, 51); font-family: verdana, arial, tahoma; white-space: normal; background-color: rgb(250, 250, 250);">地址：<span style="color: rgb(51, 51, 51); font-family: verdana, arial, tahoma; font-size: 14px; line-height: 30px; text-indent: 28px; background-color: rgb(250, 250, 250);">苏州洋杰工程机械工业园</span></p><p style="outline: none; margin-top: 0px; margin-bottom: 12px; padding: 0px; text-indent: 2em; line-height: 30px; font-size: 14px; color: rgb(51, 51, 51); font-family: verdana, arial, tahoma; white-space: normal; background-color: rgb(250, 250, 250);">我们的优势：品质、价格、便捷、服务</p><p style="outline: none; margin-top: 0px; margin-bottom: 12px; padding: 0px; text-indent: 2em; line-height: 30px; font-size: 14px; color: rgb(51, 51, 51); font-family: verdana, arial, tahoma; white-space: normal; background-color: rgb(250, 250, 250);">我们的价值观：先做人后做事;服务只有起点,没有终点</p><p style="outline: none; margin-top: 0px; margin-bottom: 12px; padding: 0px; text-indent: 2em; line-height: 30px; font-size: 14px; color: rgb(51, 51, 51); font-family: verdana, arial, tahoma; white-space: normal; background-color: rgb(250, 250, 250);">我们的宗旨：客户的收益 就是我们的效益</p><p style="outline: none; margin-top: 0px; margin-bottom: 12px; padding: 0px; text-indent: 2em; line-height: 30px; font-size: 14px; color: rgb(51, 51, 51); font-family: verdana, arial, tahoma; white-space: normal; background-color: rgb(250, 250, 250);">1、售后一个月免费协商置换，一年免费维修(机器的四大主件)。详情见(售后服务)，或拨打电话咨询。</p><p style="outline: none; margin-top: 0px; margin-bottom: 12px; padding: 0px; text-indent: 2em; line-height: 30px; font-size: 14px; color: rgb(51, 51, 51); font-family: verdana, arial, tahoma; white-space: normal; background-color: rgb(250, 250, 250);">2、报销开支。免费专车专人接待。凡事来我处购机成功者，可凭借有关票据到本站财务报销来回所有车费(请保留火车票、飞机票等票据)，不成功报销一半。到达上昆山后，您可能对昆山路线不熟悉。提前拨打15950173303预约看机，本站可安排司机转车接送。可在我们食堂就餐。</p><p style="outline: none; margin-top: 0px; margin-bottom: 12px; padding: 0px; text-indent: 2em; line-height: 30px; font-size: 14px; color: rgb(51, 51, 51); font-family: verdana, arial, tahoma; white-space: normal; background-color: rgb(250, 250, 250);">3、免费看机试机。免费看机试机。可根据客户需要将挖机拖到工地免费干活3天(费用自理)</p><p style="outline: none; margin-top: 0px; margin-bottom: 12px; padding: 0px; text-indent: 2em; line-height: 30px; font-size: 14px; color: rgb(51, 51, 51); font-family: verdana, arial, tahoma; white-space: normal; background-color: rgb(250, 250, 250);">4、每月有不同的促销活动，送手机，演唱会门票等。详情请关注本站促销活动动态。</p><p style="outline: none; margin-top: 0px; margin-bottom: 12px; padding: 0px; text-indent: 2em; line-height: 30px; font-size: 14px; color: rgb(51, 51, 51); font-family: verdana, arial, tahoma; white-space: normal; background-color: rgb(250, 250, 250);">我们以“诚信精神”为企业的核心价值观，奉行“今天的质量是明天的市场，企业的信誉是无形的市场，用户的满意是永恒的市场”的理念，追求“至诚至信的完美服务，百分之百的用户满意”。通过产品的严格把关质量，优质的售后服务和重合同守信用的严谨作风赢得了广大用户的好评和赞誉，被全国同行和用户公认为在质量、价格、售后服务、规模等方面综合实力最强的二手挖掘机总代理。打造“二手挖掘机市场第一品牌”!由于市场规模的扩大，诚邀世界各地的客商，代理商，有偿中介真诚合作。</p><p style="outline: none; margin-top: 0px; margin-bottom: 12px; padding: 0px; text-indent: 2em; line-height: 30px; font-size: 14px; color: rgb(51, 51, 51); font-family: verdana, arial, tahoma; white-space: normal; background-color: rgb(250, 250, 250);">苏州洋杰二手挖掘机直销网以拥有自己的专业的物流配送.集港口装卸、仓储(保税)、包装、海运、铁路、城市客运为一体,可到达任何国家和地区.解决您的后顾之忧丰富的二手工程机械运输经验,不断的完善运作管理成本控制：为客户降低物流成本,实现双赢。</p><p><br/></p>', '苏州洋杰二手挖掘机直销网', '416290975');

-- --------------------------------------------------------

--
-- 表的结构 `liucheng`
--

CREATE TABLE IF NOT EXISTS `liucheng` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cont` text NOT NULL,
  `class` varchar(11) NOT NULL DEFAULT '购机流程',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `liucheng`
--

INSERT INTO `liucheng` (`id`, `cont`, `class`) VALUES
(1, '<p>而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去而无情人为其诶我去</p>', '购机流程');

-- --------------------------------------------------------

--
-- 表的结构 `lun`
--

CREATE TABLE IF NOT EXISTS `lun` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `img` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `lun`
--

INSERT INTO `lun` (`id`, `img`) VALUES
(8, '583924c384f18.jpg'),
(7, '583924b7bf00b.jpg'),
(6, '583923db48607.JPG');

-- --------------------------------------------------------

--
-- 表的结构 `peisong`
--

CREATE TABLE IF NOT EXISTS `peisong` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cont` text NOT NULL COMMENT '内容',
  `class` varchar(11) NOT NULL DEFAULT '物流配送',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `peisong`
--

INSERT INTO `peisong` (`id`, `cont`, `class`) VALUES
(1, '<p>诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去诶我去</p>', '物流配送');

-- --------------------------------------------------------

--
-- 表的结构 `shop`
--

CREATE TABLE IF NOT EXISTS `shop` (
  `id` int(50) unsigned NOT NULL AUTO_INCREMENT,
  `img` varchar(50) NOT NULL COMMENT '图片1',
  `img2` varchar(50) NOT NULL COMMENT '图片1',
  `img3` varchar(50) NOT NULL COMMENT '图片1',
  `img4` varchar(50) NOT NULL COMMENT '图片1',
  `img5` varchar(50) NOT NULL COMMENT '图片1',
  `img6` varchar(50) NOT NULL COMMENT '图片1',
  `img7` varchar(50) NOT NULL COMMENT '图片1',
  `img8` varchar(50) NOT NULL COMMENT '图片1',
  `img9` varchar(50) NOT NULL COMMENT '图片1',
  `name` varchar(50) NOT NULL COMMENT '产品名',
  `morey` varchar(10) NOT NULL COMMENT '产品价格',
  `class` varchar(50) NOT NULL COMMENT '分类',
  `add` varchar(50) NOT NULL COMMENT '产地',
  `tmorey` varchar(20) NOT NULL COMMENT '同产品价格',
  `weight` varchar(10) NOT NULL COMMENT '重量',
  `beiz` varchar(20) NOT NULL COMMENT '备注',
  `capacity` varchar(10) NOT NULL COMMENT '斗容',
  `gtime` varchar(15) NOT NULL COMMENT '工作时间',
  `cont` text NOT NULL COMMENT '详情',
  `tj` int(10) NOT NULL DEFAULT '1' COMMENT '推荐度',
  `kd` varchar(10) NOT NULL COMMENT '运输宽度',
  `moshi` varchar(10) NOT NULL COMMENT '模式',
  `chekuang` varchar(10) NOT NULL,
  `zuigaojia` varchar(10) NOT NULL,
  `zuidijia` varchar(10) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `jixin` varchar(10) NOT NULL,
  `jgqj` varchar(10) NOT NULL COMMENT '价格区间',
  `zzqj` varchar(10) NOT NULL COMMENT '自重区间',
  `drqj` varchar(10) NOT NULL COMMENT '斗容区间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=61 ;

--
-- 转存表中的数据 `shop`
--

INSERT INTO `shop` (`id`, `img`, `img2`, `img3`, `img4`, `img5`, `img6`, `img7`, `img8`, `img9`, `name`, `morey`, `class`, `add`, `tmorey`, `weight`, `beiz`, `capacity`, `gtime`, `cont`, `tj`, `kd`, `moshi`, `chekuang`, `zuigaojia`, `zuidijia`, `tel`, `jixin`, `jgqj`, `zzqj`, `drqj`) VALUES
(2, '583416d302d8b.jpg', '583416d3050b3.jpg', '583416d3073dc.jpg', '583416d308f34.jpg', '583416d30b25d.jpg', '583416d30d19d.jpg', '583416d30f0de.jpg', '583416d310c36.jpg', '583416d312f5f.jpg', '小松001', '63', '小松', '召唤师峡谷', '68-78', '2.5', '挖打打挖撒我啊我a', '1.5', '40', '<p>来自虚空的挖掘</p>', 2, '2.1', '履带式挖掘机', '八成', '67', '60', '15942351359', '中型', '60-64万', '0-4吨', '1.5-1.9'),
(3, '5833efdc42f5c.jpg', '5833efdc44e9c.jpg', '5833efdc469f5.jpg', '5833efdc48935.jpg', '5833efdc4a48e.jpg', '5833efdc4c3ce.jpg', '5833efdc4db3e.jpg', '5833efdc4fe67.jpg', '5833efdc519bf.jpg', '测试3', '30', '现代', '大', '1.5', '23', '萨达 ', '1.2', '12', '<p>大发发二娃feature范德萨</p>', 2, '1.3', '履带式挖掘机', '八成', '159', '1', '1251616156', '大型', '30-34万', '20-24吨', '1.0-1.4'),
(11, '583416d302d8b.jpg', '583416d3050b3.jpg', '583416d3073dc.jpg', '583416d308f34.jpg', '583416d30b25d.jpg', '583416d30d19d.jpg', '583416d30f0de.jpg', '583416d310c36.jpg', '583416d312f5f.jpg', '小松001', '63', '小松', '召唤师峡谷', '68-78', '2.5', '挖打打挖撒我啊我a', '1.5', '40', '<p>来自虚空的挖掘</p>', 2, '2.1', '履带式挖掘机', '八成', '67', '60', '15942351359', '中型', '60-64万', '0-4吨', '1.5-1.9'),
(10, '583416d302d8b.jpg', '583416d3050b3.jpg', '583416d3073dc.jpg', '583416d308f34.jpg', '583416d30b25d.jpg', '583416d30d19d.jpg', '583416d30f0de.jpg', '583416d310c36.jpg', '583416d312f5f.jpg', '小松001', '63', '小松', '召唤师峡谷', '68-78', '2.5', '挖打打挖撒我啊我a', '1.5', '40', '<p>来自虚空的挖掘</p>', 2, '2.1', '履带式挖掘机', '八成', '67', '60', '15942351359', '中型', '60-64万', '0-4吨', '1.5-1.9'),
(9, '583416d302d8b.jpg', '583416d3050b3.jpg', '583416d3073dc.jpg', '583416d308f34.jpg', '583416d30b25d.jpg', '583416d30d19d.jpg', '583416d30f0de.jpg', '583416d310c36.jpg', '583416d312f5f.jpg', '小松001', '63', '小松', '召唤师峡谷', '68-78', '2.5', '挖打打挖撒我啊我a', '1.5', '40', '<p>来自虚空的挖掘</p>', 2, '2.1', '履带式挖掘机', '八成', '67', '60', '15942351359', '中型', '60-64万', '0-4吨', '1.5-1.9'),
(8, '583416d302d8b.jpg', '583416d3050b3.jpg', '583416d3073dc.jpg', '583416d308f34.jpg', '583416d30b25d.jpg', '583416d30d19d.jpg', '583416d30f0de.jpg', '583416d310c36.jpg', '583416d312f5f.jpg', '小松001', '63', '小松', '召唤师峡谷', '68-78', '2.5', '挖打打挖撒我啊我a', '1.5', '40', '<p>来自虚空的挖掘</p>', 2, '2.1', '履带式挖掘机', '八成', '67', '60', '15942351359', '中型', '60-64万', '0-4吨', '1.5-1.9'),
(12, '5833efdc42f5c.jpg', '5833efdc44e9c.jpg', '5833efdc469f5.jpg', '5833efdc48935.jpg', '5833efdc4a48e.jpg', '5833efdc4c3ce.jpg', '5833efdc4db3e.jpg', '5833efdc4fe67.jpg', '5833efdc519bf.jpg', '测试3', '30', '现代', '大', '1.5', '23', '萨达 ', '1.2', '12', '<p>大发发二娃feature范德萨</p>', 2, '1.3', '履带式挖掘机', '八成', '159', '1', '1251616156', '大型', '30-34万', '20-24吨', '1.0-1.4'),
(13, '5833efdc42f5c.jpg', '5833efdc44e9c.jpg', '5833efdc469f5.jpg', '5833efdc48935.jpg', '5833efdc4a48e.jpg', '5833efdc4c3ce.jpg', '5833efdc4db3e.jpg', '5833efdc4fe67.jpg', '5833efdc519bf.jpg', '测试3', '30', '现代', '大', '1.5', '23', '萨达 ', '1.2', '12', '<p>大发发二娃feature范德萨</p>', 2, '1.3', '履带式挖掘机', '八成', '159', '1', '1251616156', '大型', '30-34万', '20-24吨', '1.0-1.4'),
(14, '5833efdc42f5c.jpg', '5833efdc44e9c.jpg', '5833efdc469f5.jpg', '5833efdc48935.jpg', '5833efdc4a48e.jpg', '5833efdc4c3ce.jpg', '5833efdc4db3e.jpg', '5833efdc4fe67.jpg', '5833efdc519bf.jpg', '测试3', '30', '现代', '大', '1.5', '23', '萨达 ', '1.2', '12', '<p>大发发二娃feature范德萨</p>', 2, '1.3', '履带式挖掘机', '八成', '159', '1', '1251616156', '大型', '30-34万', '20-24吨', '1.0-1.4'),
(15, '5833efdc42f5c.jpg', '5833efdc44e9c.jpg', '5833efdc469f5.jpg', '5833efdc48935.jpg', '5833efdc4a48e.jpg', '5833efdc4c3ce.jpg', '5833efdc4db3e.jpg', '5833efdc4fe67.jpg', '5833efdc519bf.jpg', '测试3', '30', '现代', '大', '1.5', '23', '萨达 ', '1.2', '12', '<p>大发发二娃feature范德萨</p>', 2, '1.3', '履带式挖掘机', '八成', '159', '1', '1251616156', '大型', '30-34万', '20-24吨', '1.0-1.4'),
(16, '5833efdc42f5c.jpg', '5833efdc44e9c.jpg', '5833efdc469f5.jpg', '5833efdc48935.jpg', '5833efdc4a48e.jpg', '5833efdc4c3ce.jpg', '5833efdc4db3e.jpg', '5833efdc4fe67.jpg', '5833efdc519bf.jpg', '测试3', '30', '现代', '大', '1.5', '23', '萨达 ', '1.2', '12', '<p>大发发二娃feature范德萨</p>', 2, '1.3', '履带式挖掘机', '八成', '159', '1', '1251616156', '大型', '30-34万', '20-24吨', '1.0-1.4'),
(17, '583419fb02a7a.jpg', '583419fb04da2.jpg', '583419fb068fb.jpg', '583419fb0883b.jpg', '583419fb0a394.jpg', '583419fb0c2d4.jpg', '583419fb0de2c.jpg', '583419fb0f985.jpg', '583419fb114dd.jpg', '日立121', '20', '日立', '折', '10', '30', '没有发片', '1.6', '9552', '<p>v打发的撒发发骚feature范德萨个人话题人物&nbsp;</p>', 2, '1.3', '履带式挖掘机', '九成', '159', '20', '1596423665', '中型', '20-24万', '30-34吨', '1.5-1.9'),
(18, '583419fb02a7a.jpg', '583419fb04da2.jpg', '583419fb068fb.jpg', '583419fb0883b.jpg', '583419fb0a394.jpg', '583419fb0c2d4.jpg', '583419fb0de2c.jpg', '583419fb0f985.jpg', '583419fb114dd.jpg', '日立121', '20', '日立', '折', '10', '30', '没有发片', '1.6', '9552', '<p>v打发的撒发发骚feature范德萨个人话题人物&nbsp;</p>', 2, '1.3', '履带式挖掘机', '九成', '159', '20', '1596423665', '中型', '20-24万', '30-34吨', '1.5-1.9'),
(19, '583419fb02a7a.jpg', '583419fb04da2.jpg', '583419fb068fb.jpg', '583419fb0883b.jpg', '583419fb0a394.jpg', '583419fb0c2d4.jpg', '583419fb0de2c.jpg', '583419fb0f985.jpg', '583419fb114dd.jpg', '日立121', '20', '日立', '折', '10', '30', '没有发片', '1.6', '9552', '<p>v打发的撒发发骚feature范德萨个人话题人物&nbsp;</p>', 2, '1.3', '履带式挖掘机', '九成', '159', '20', '1596423665', '中型', '20-24万', '30-34吨', '1.5-1.9'),
(20, '583419fb02a7a.jpg', '583419fb04da2.jpg', '583419fb068fb.jpg', '583419fb0883b.jpg', '583419fb0a394.jpg', '583419fb0c2d4.jpg', '583419fb0de2c.jpg', '583419fb0f985.jpg', '583419fb114dd.jpg', '日立121', '20', '日立', '折', '10', '30', '没有发片', '1.6', '9552', '<p>v打发的撒发发骚feature范德萨个人话题人物&nbsp;</p>', 2, '1.3', '履带式挖掘机', '九成', '159', '20', '1596423665', '中型', '20-24万', '30-34吨', '1.5-1.9'),
(21, '583419fb02a7a.jpg', '583419fb04da2.jpg', '583419fb068fb.jpg', '583419fb0883b.jpg', '583419fb0a394.jpg', '583419fb0c2d4.jpg', '583419fb0de2c.jpg', '583419fb0f985.jpg', '583419fb114dd.jpg', '日立121', '20', '日立', '折', '10', '30', '没有发片', '1.6', '9552', '<p>v打发的撒发发骚feature范德萨个人话题人物&nbsp;</p>', 2, '1.3', '履带式挖掘机', '九成', '159', '20', '1596423665', '中型', '20-24万', '30-34吨', '1.5-1.9'),
(22, '583419fb02a7a.jpg', '583419fb04da2.jpg', '583419fb068fb.jpg', '583419fb0883b.jpg', '583419fb0a394.jpg', '583419fb0c2d4.jpg', '583419fb0de2c.jpg', '583419fb0f985.jpg', '583419fb114dd.jpg', '日立121', '20', '日立', '折', '10', '30', '没有发片', '1.6', '9552', '<p>v打发的撒发发骚feature范德萨个人话题人物&nbsp;</p>', 2, '1.3', '履带式挖掘机', '九成', '159', '20', '1596423665', '中型', '20-24万', '30-34吨', '1.5-1.9'),
(23, '583419fb02a7a.jpg', '583419fb04da2.jpg', '583419fb068fb.jpg', '583419fb0883b.jpg', '583419fb0a394.jpg', '583419fb0c2d4.jpg', '583419fb0de2c.jpg', '583419fb0f985.jpg', '583419fb114dd.jpg', '日立121', '20', '日立', '折', '10', '30', '没有发片', '1.6', '9552', '<p>v打发的撒发发骚feature范德萨个人话题人物&nbsp;</p>', 2, '1.3', '履带式挖掘机', '九成', '159', '20', '1596423665', '中型', '20-24万', '30-34吨', '1.5-1.9'),
(24, '583419fb02a7a.jpg', '583419fb04da2.jpg', '583419fb068fb.jpg', '583419fb0883b.jpg', '583419fb0a394.jpg', '583419fb0c2d4.jpg', '583419fb0de2c.jpg', '583419fb0f985.jpg', '583419fb114dd.jpg', '日立121', '20', '日立', '折', '10', '30', '没有发片', '1.6', '9552', '<p>v打发的撒发发骚feature范德萨个人话题人物&nbsp;</p>', 2, '1.3', '履带式挖掘机', '九成', '159', '20', '1596423665', '中型', '20-24万', '30-34吨', '1.5-1.9'),
(25, '58341adff26cb.jpg', '58341ae0007b3.jpg', '58341ae00230c.jpg', '58341ae00424c.jpg', '58341ae00618d.jpg', '58341ae007ce5.jpg', '58341ae009c26.jpg', '58341ae00bb66.jpg', '58341ae00daa6.jpg', '卡特110', '60', '卡特', '手机爱卡', '160', '60', '没有发票', '2.6', '1231', '<p>特我听过任务特委屈特热情野人玩意去为全文提供热我会突然去个预热也认为</p>', 2, '3.6', '履带式挖掘机', '七成', '100', '10', '1596324849', '大型', '60-64万', '40吨以上', '2.5-2.9'),
(26, '58341adff26cb.jpg', '58341ae0007b3.jpg', '58341ae00230c.jpg', '58341ae00424c.jpg', '58341ae00618d.jpg', '58341ae007ce5.jpg', '58341ae009c26.jpg', '58341ae00bb66.jpg', '58341ae00daa6.jpg', '卡特110', '60', '卡特', '手机爱卡', '160', '60', '没有发票', '2.6', '1231', '<p>特我听过任务特委屈特热情野人玩意去为全文提供热我会突然去个预热也认为</p>', 2, '3.6', '履带式挖掘机', '七成', '100', '10', '1596324849', '大型', '60-64万', '40吨以上', '2.5-2.9'),
(27, '58341adff26cb.jpg', '58341ae0007b3.jpg', '58341ae00230c.jpg', '58341ae00424c.jpg', '58341ae00618d.jpg', '58341ae007ce5.jpg', '58341ae009c26.jpg', '58341ae00bb66.jpg', '58341ae00daa6.jpg', '卡特110', '60', '卡特', '手机爱卡', '160', '60', '没有发票', '2.6', '1231', '<p>特我听过任务特委屈特热情野人玩意去为全文提供热我会突然去个预热也认为</p>', 2, '3.6', '履带式挖掘机', '七成', '100', '10', '1596324849', '大型', '60-64万', '40吨以上', '2.5-2.9'),
(28, '58341adff26cb.jpg', '58341ae0007b3.jpg', '58341ae00230c.jpg', '58341ae00424c.jpg', '58341ae00618d.jpg', '58341ae007ce5.jpg', '58341ae009c26.jpg', '58341ae00bb66.jpg', '58341ae00daa6.jpg', '卡特110', '60', '卡特', '手机爱卡', '160', '60', '没有发票', '2.6', '1231', '<p>特我听过任务特委屈特热情野人玩意去为全文提供热我会突然去个预热也认为</p>', 2, '3.6', '履带式挖掘机', '七成', '100', '10', '1596324849', '大型', '60-64万', '40吨以上', '2.5-2.9'),
(29, '58341adff26cb.jpg', '58341ae0007b3.jpg', '58341ae00230c.jpg', '58341ae00424c.jpg', '58341ae00618d.jpg', '58341ae007ce5.jpg', '58341ae009c26.jpg', '58341ae00bb66.jpg', '58341ae00daa6.jpg', '卡特110', '60', '卡特', '手机爱卡', '160', '60', '没有发票', '2.6', '1231', '<p>特我听过任务特委屈特热情野人玩意去为全文提供热我会突然去个预热也认为</p>', 2, '3.6', '履带式挖掘机', '七成', '100', '10', '1596324849', '大型', '60-64万', '40吨以上', '2.5-2.9'),
(30, '58341bd16255b.jpg', '58341bd164883.jpg', '58341bd1667c4.jpg', '58341bd168704.jpg', '58341bd16a25d.jpg', '58341bd16c585.jpg', '58341bd16e4c6.jpg', '58341bd170406.jpg', '58341bd171f5e.jpg', '神钢160', '63', '神钢', '沈阳', '100', '78', '发票证件齐全', '1.6', '199', '<p>认为热热我野人 去二娃同人文</p>', 2, '3.1', '履带式挖掘机', '七成', '100', '30', '15963258745', '中型', '60-64万', '40吨以上', '1.5-1.9'),
(31, '58341bd16255b.jpg', '58341bd164883.jpg', '58341bd1667c4.jpg', '58341bd168704.jpg', '58341bd16a25d.jpg', '58341bd16c585.jpg', '58341bd16e4c6.jpg', '58341bd170406.jpg', '58341bd171f5e.jpg', '神钢160', '63', '神钢', '沈阳', '100', '78', '发票证件齐全', '1.6', '199', '<p>认为热热我野人 去二娃同人文</p>', 2, '3.1', '履带式挖掘机', '七成', '100', '30', '15963258745', '中型', '60-64万', '40吨以上', '1.5-1.9'),
(32, '58341bd16255b.jpg', '58341bd164883.jpg', '58341bd1667c4.jpg', '58341bd168704.jpg', '58341bd16a25d.jpg', '58341bd16c585.jpg', '58341bd16e4c6.jpg', '58341bd170406.jpg', '58341bd171f5e.jpg', '神钢160', '63', '神钢', '沈阳', '100', '78', '发票证件齐全', '1.6', '199', '<p>认为热热我野人 去二娃同人文</p>', 2, '3.1', '履带式挖掘机', '七成', '100', '30', '15963258745', '中型', '60-64万', '40吨以上', '1.5-1.9'),
(33, '58341bd16255b.jpg', '58341bd164883.jpg', '58341bd1667c4.jpg', '58341bd168704.jpg', '58341bd16a25d.jpg', '58341bd16c585.jpg', '58341bd16e4c6.jpg', '58341bd170406.jpg', '58341bd171f5e.jpg', '神钢160', '63', '神钢', '沈阳', '100', '78', '发票证件齐全', '1.6', '199', '<p>认为热热我野人 去二娃同人文</p>', 2, '3.1', '履带式挖掘机', '七成', '100', '30', '15963258745', '中型', '60-64万', '40吨以上', '1.5-1.9'),
(34, '58341bd16255b.jpg', '58341bd164883.jpg', '58341bd1667c4.jpg', '58341bd168704.jpg', '58341bd16a25d.jpg', '58341bd16c585.jpg', '58341bd16e4c6.jpg', '58341bd170406.jpg', '58341bd171f5e.jpg', '神钢160', '63', '神钢', '沈阳', '100', '78', '发票证件齐全', '1.6', '199', '<p>认为热热我野人 去二娃同人文</p>', 2, '3.1', '履带式挖掘机', '七成', '100', '30', '15963258745', '中型', '60-64万', '40吨以上', '1.5-1.9'),
(35, '58341ccfe41c1.jpg', '58341ccfe64ea.jpg', '58341ccfe842a.jpg', '58341ccfea36b.jpg', '58341ccfebec3.jpg', '58341ccfee1eb.jpg', '58341ccfefd44.jpg', '58341ccff1c84.jpg', '58341ccff37dd.jpg', '斗山135', '65', '斗山', '沈阳', '100', '60', '这是备注', '2.6', '1562', '<p>发二娃分个公司各&nbsp;</p>', 2, '5.6', '履带式挖掘机', '五成', '190', '10', '1596632541', '大型', '65-69万', '40吨以上', '2.5-2.9'),
(36, '58341ccfe41c1.jpg', '58341ccfe64ea.jpg', '58341ccfe842a.jpg', '58341ccfea36b.jpg', '58341ccfebec3.jpg', '58341ccfee1eb.jpg', '58341ccfefd44.jpg', '58341ccff1c84.jpg', '58341ccff37dd.jpg', '斗山135', '65', '斗山', '沈阳', '100', '60', '这是备注', '2.6', '1562', '<p>发二娃分个公司各&nbsp;</p>', 2, '5.6', '履带式挖掘机', '五成', '190', '10', '1596632541', '大型', '65-69万', '40吨以上', '2.5-2.9'),
(37, '58341ccfe41c1.jpg', '58341ccfe64ea.jpg', '58341ccfe842a.jpg', '58341ccfea36b.jpg', '58341ccfebec3.jpg', '58341ccfee1eb.jpg', '58341ccfefd44.jpg', '58341ccff1c84.jpg', '58341ccff37dd.jpg', '斗山135', '65', '斗山', '沈阳', '100', '60', '这是备注', '2.6', '1562', '<p>发二娃分个公司各&nbsp;</p>', 2, '5.6', '履带式挖掘机', '五成', '190', '10', '1596632541', '大型', '65-69万', '40吨以上', '2.5-2.9'),
(38, '58341ccfe41c1.jpg', '58341ccfe64ea.jpg', '58341ccfe842a.jpg', '58341ccfea36b.jpg', '58341ccfebec3.jpg', '58341ccfee1eb.jpg', '58341ccfefd44.jpg', '58341ccff1c84.jpg', '58341ccff37dd.jpg', '斗山135', '65', '斗山', '沈阳', '100', '60', '这是备注', '2.6', '1562', '<p>发二娃分个公司各&nbsp;</p>', 2, '5.6', '履带式挖掘机', '五成', '190', '10', '1596632541', '大型', '65-69万', '40吨以上', '2.5-2.9'),
(39, '58341ccfe41c1.jpg', '58341ccfe64ea.jpg', '58341ccfe842a.jpg', '58341ccfea36b.jpg', '58341ccfebec3.jpg', '58341ccfee1eb.jpg', '58341ccfefd44.jpg', '58341ccff1c84.jpg', '58341ccff37dd.jpg', '斗山135', '65', '斗山', '沈阳', '100', '60', '这是备注', '2.6', '1562', '<p>发二娃分个公司各&nbsp;</p>', 2, '5.6', '履带式挖掘机', '五成', '190', '10', '1596632541', '大型', '65-69万', '40吨以上', '2.5-2.9'),
(40, '58341ccfe41c1.jpg', '58341ccfe64ea.jpg', '58341ccfe842a.jpg', '58341ccfea36b.jpg', '58341ccfebec3.jpg', '58341ccfee1eb.jpg', '58341ccfefd44.jpg', '58341ccff1c84.jpg', '58341ccff37dd.jpg', '斗山135', '65', '斗山', '沈阳', '100', '60', '这是备注', '2.6', '1562', '<p>发二娃分个公司各&nbsp;</p>', 2, '5.6', '履带式挖掘机', '五成', '190', '10', '1596632541', '大型', '65-69万', '40吨以上', '2.5-2.9'),
(41, '58341dd5b9611.jpg', '58341dd5bb169.jpg', '58341dd5bd492.jpg', '58341dd5befea.jpg', '58341dd5c0f2a.jpg', '58341dd5c2e6b.jpg', '58341dd5c4dab.jpg', '58341dd5c6904.jpg', '58341dd5c8c2c.jpg', '沃尔沃110', '10', '沃尔沃', '沈阳', '1', '10', '没有被子', '1', '126', '<p>4天去发二娃份额我去他就木有ER&nbsp;</p>', 2, '1', '轮式挖掘机', '七成', '100', '0', '12356489745', '大型', '10-14万', '10-14吨', '1.0-1.4'),
(42, '58341dd5b9611.jpg', '58341dd5bb169.jpg', '58341dd5bd492.jpg', '58341dd5befea.jpg', '58341dd5c0f2a.jpg', '58341dd5c2e6b.jpg', '58341dd5c4dab.jpg', '58341dd5c6904.jpg', '58341dd5c8c2c.jpg', '沃尔沃110', '10', '沃尔沃', '沈阳', '1', '10', '没有被子', '1', '126', '<p>4天去发二娃份额我去他就木有ER&nbsp;</p>', 2, '1', '轮式挖掘机', '七成', '100', '0', '12356489745', '大型', '10-14万', '10-14吨', '1.0-1.4'),
(43, '58341dd5b9611.jpg', '58341dd5bb169.jpg', '58341dd5bd492.jpg', '58341dd5befea.jpg', '58341dd5c0f2a.jpg', '58341dd5c2e6b.jpg', '58341dd5c4dab.jpg', '58341dd5c6904.jpg', '58341dd5c8c2c.jpg', '沃尔沃110', '10', '沃尔沃', '沈阳', '1', '10', '没有被子', '1', '126', '<p>4天去发二娃份额我去他就木有ER&nbsp;</p>', 2, '1', '轮式挖掘机', '七成', '100', '0', '12356489745', '大型', '10-14万', '10-14吨', '1.0-1.4'),
(44, '58341dd5b9611.jpg', '58341dd5bb169.jpg', '58341dd5bd492.jpg', '58341dd5befea.jpg', '58341dd5c0f2a.jpg', '58341dd5c2e6b.jpg', '58341dd5c4dab.jpg', '58341dd5c6904.jpg', '58341dd5c8c2c.jpg', '沃尔沃110', '10', '沃尔沃', '沈阳', '1', '10', '没有被子', '1', '126', '<p>4天去发二娃份额我去他就木有ER&nbsp;</p>', 2, '1', '轮式挖掘机', '七成', '100', '0', '12356489745', '大型', '10-14万', '10-14吨', '1.0-1.4'),
(45, '58341dd5b9611.jpg', '58341dd5bb169.jpg', '58341dd5bd492.jpg', '58341dd5befea.jpg', '58341dd5c0f2a.jpg', '58341dd5c2e6b.jpg', '58341dd5c4dab.jpg', '58341dd5c6904.jpg', '58341dd5c8c2c.jpg', '沃尔沃110', '10', '沃尔沃', '沈阳', '1', '10', '没有被子', '1', '126', '<p>4天去发二娃份额我去他就木有ER&nbsp;</p>', 2, '1', '轮式挖掘机', '七成', '100', '0', '12356489745', '大型', '10-14万', '10-14吨', '1.0-1.4'),
(46, '58341dd5b9611.jpg', '58341dd5bb169.jpg', '58341dd5bd492.jpg', '58341dd5befea.jpg', '58341dd5c0f2a.jpg', '58341dd5c2e6b.jpg', '58341dd5c4dab.jpg', '58341dd5c6904.jpg', '58341dd5c8c2c.jpg', '沃尔沃110', '10', '沃尔沃', '沈阳', '1', '10', '没有被子', '1', '126', '<p>4天去发二娃份额我去他就木有ER&nbsp;</p>', 2, '1', '轮式挖掘机', '七成', '100', '0', '12356489745', '大型', '10-14万', '10-14吨', '1.0-1.4'),
(47, '58341dd5b9611.jpg', '58341dd5bb169.jpg', '58341dd5bd492.jpg', '58341dd5befea.jpg', '58341dd5c0f2a.jpg', '58341dd5c2e6b.jpg', '58341dd5c4dab.jpg', '58341dd5c6904.jpg', '58341dd5c8c2c.jpg', '沃尔沃110', '10', '沃尔沃', '沈阳', '1', '10', '没有被子', '1', '126', '<p>4天去发二娃份额我去他就木有ER&nbsp;</p>', 2, '1', '轮式挖掘机', '七成', '100', '0', '12356489745', '大型', '10-14万', '10-14吨', '1.0-1.4'),
(48, '58341dd5b9611.jpg', '58341dd5bb169.jpg', '58341dd5bd492.jpg', '58341dd5befea.jpg', '58341dd5c0f2a.jpg', '58341dd5c2e6b.jpg', '58341dd5c4dab.jpg', '58341dd5c6904.jpg', '58341dd5c8c2c.jpg', '沃尔沃110', '10', '沃尔沃', '沈阳', '1', '10', '没有被子', '1', '126', '<p>4天去发二娃份额我去他就木有ER&nbsp;</p>', 2, '1', '轮式挖掘机', '七成', '100', '0', '12356489745', '大型', '10-14万', '10-14吨', '1.0-1.4'),
(49, '58341e95782f7.jpg', '58341e957a620.jpg', '58341e957c178.jpg', '58341e957e4a1.jpg', '58341e95803e1.jpg', '58341e9582321.jpg', '58341e9583e7a.jpg', '58341e9585dba.jpg', '58341e9587913.jpg', '大众101', '63', '国产', '大', '1', '6', '没有', '1', '151', '<p>合同该日期合同认可好天气啊</p>', 2, '1', '轮式挖掘机', '六成', '100', '10', '15623658745', '大型', '60-64万', '5-9吨', '1.0-1.4'),
(50, '58341e95782f7.jpg', '58341e957a620.jpg', '58341e957c178.jpg', '58341e957e4a1.jpg', '58341e95803e1.jpg', '58341e9582321.jpg', '58341e9583e7a.jpg', '58341e9585dba.jpg', '58341e9587913.jpg', '大众101', '63', '国产', '大', '1', '6', '没有', '1', '151', '<p>合同该日期合同认可好天气啊</p>', 2, '1', '轮式挖掘机', '六成', '100', '10', '15623658745', '大型', '60-64万', '5-9吨', '1.0-1.4'),
(51, '58341e95782f7.jpg', '58341e957a620.jpg', '58341e957c178.jpg', '58341e957e4a1.jpg', '58341e95803e1.jpg', '58341e9582321.jpg', '58341e9583e7a.jpg', '58341e9585dba.jpg', '58341e9587913.jpg', '大众101', '63', '国产', '大', '1', '6', '没有', '1', '151', '<p>合同该日期合同认可好天气啊</p>', 1, '1', '轮式挖掘机', '六成', '100', '10', '15623658745', '大型', '60-64万', '5-9吨', '1.0-1.4'),
(52, '58341e95782f7.jpg', '58341e957a620.jpg', '58341e957c178.jpg', '58341e957e4a1.jpg', '58341e95803e1.jpg', '58341e9582321.jpg', '58341e9583e7a.jpg', '58341e9585dba.jpg', '58341e9587913.jpg', '大众101', '63', '国产', '大', '1', '6', '没有', '1', '151', '<p>合同该日期合同认可好天气啊</p>', 1, '1', '轮式挖掘机', '六成', '100', '10', '15623658745', '大型', '60-64万', '5-9吨', '1.0-1.4'),
(53, '58341e95782f7.jpg', '58341e957a620.jpg', '58341e957c178.jpg', '58341e957e4a1.jpg', '58341e95803e1.jpg', '58341e9582321.jpg', '58341e9583e7a.jpg', '58341e9585dba.jpg', '58341e9587913.jpg', '大众101', '63', '国产', '大', '1', '6', '没有', '1', '151', '<p>合同该日期合同认可好天气啊</p>', 2, '1', '轮式挖掘机', '六成', '100', '10', '15623658745', '大型', '60-64万', '5-9吨', '1.0-1.4'),
(54, '58341e95782f7.jpg', '58341e957a620.jpg', '58341e957c178.jpg', '58341e957e4a1.jpg', '58341e95803e1.jpg', '58341e9582321.jpg', '58341e9583e7a.jpg', '58341e9585dba.jpg', '58341e9587913.jpg', '大众101', '63', '国产', '大', '1', '6', '没有', '1', '151', '<p>合同该日期合同认可好天气啊</p>', 2, '1', '轮式挖掘机', '六成', '100', '10', '15623658745', '大型', '60-64万', '5-9吨', '1.0-1.4'),
(55, '58341e95782f7.jpg', '58341e957a620.jpg', '58341e957c178.jpg', '58341e957e4a1.jpg', '58341e95803e1.jpg', '58341e9582321.jpg', '58341e9583e7a.jpg', '58341e9585dba.jpg', '58341e9587913.jpg', '大众101', '63', '国产', '大', '1', '6', '没有', '1', '151', '<p>合同该日期合同认可好天气啊</p>', 2, '1', '轮式挖掘机', '六成', '100', '10', '15623658745', '大型', '60-64万', '5-9吨', '1.0-1.4'),
(56, '58341f8ef09cd.jpg', '58341f8ef2cf6.jpg', '58341f8f00dde.jpg', '58341f8f02937.jpg', '58341f8f0448f.jpg', '58341f8f063d0.jpg', '58341f8f08310.jpg', '58341f8f0a251.jpg', '58341f8f0bda9.jpg', '其他120', '10', '其他', '而阿尔', '1', ' 1', '各各各嘎', '1', '1024', '<p>份额我去特委屈天天热气人grew</p>', 2, '1', '履带式挖掘机', '七成', '100', '1', '15950173303', '大型', '10-14万', '0-4吨', '1.0-1.4'),
(57, '58341f8ef09cd.jpg', '58341f8ef2cf6.jpg', '58341f8f00dde.jpg', '58341f8f02937.jpg', '58341f8f0448f.jpg', '58341f8f063d0.jpg', '58341f8f08310.jpg', '58341f8f0a251.jpg', '58341f8f0bda9.jpg', '其他120', '10', '其他', '而阿尔', '1', ' 1', '各各各嘎', '1', '1024', '<p>份额我去特委屈天天热气人grew</p>', 2, '1', '履带式挖掘机', '七成', '100', '1', '15963254878', '大型', '10-14万', '0-4吨', '1.0-1.4'),
(58, '58341f8ef09cd.jpg', '58341f8ef2cf6.jpg', '58341f8f00dde.jpg', '58341f8f02937.jpg', '58341f8f0448f.jpg', '58341f8f063d0.jpg', '58341f8f08310.jpg', '58341f8f0a251.jpg', '58341f8f0bda9.jpg', '其他120', '10', '其他', '而阿尔', '1', ' 1', '各各各嘎', '1', '1024', '<p>份额我去特委屈天天热气人grew</p>', 2, '1', '履带式挖掘机', '七成', '100', '1', '15963254878', '大型', '10-14万', '0-4吨', '1.0-1.4'),
(59, '58341f8ef09cd.jpg', '58341f8ef2cf6.jpg', '58341f8f00dde.jpg', '58341f8f02937.jpg', '58341f8f0448f.jpg', '58341f8f063d0.jpg', '58341f8f08310.jpg', '58341f8f0a251.jpg', '58341f8f0bda9.jpg', '其他120', '10', '其他', '而阿尔', '1', ' 1', '各各各嘎', '1', '1024', '<p>份额我去特委屈天天热气人grew</p>', 2, '1', '履带式挖掘机', '七成', '100', '1', '15963254878', '大型', '10-14万', '0-4吨', '1.0-1.4'),
(60, '58341f8ef09cd.jpg', '58341f8ef2cf6.jpg', '58341f8f00dde.jpg', '58341f8f02937.jpg', '58341f8f0448f.jpg', '58341f8f063d0.jpg', '58341f8f08310.jpg', '58341f8f0a251.jpg', '58341f8f0bda9.jpg', '其他120', '10', '其他', '而阿尔', '1', ' 1', '各各各嘎', '1', '1024', '<p>份额我去特委屈天天热气人grew</p>', 2, '1', '履带式挖掘机', '七成', '100', '1', '15963254878', '大型', '10-14万', '0-4吨', '1.0-1.4');

-- --------------------------------------------------------

--
-- 表的结构 `wdang`
--

CREATE TABLE IF NOT EXISTS `wdang` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `class` varchar(30) NOT NULL COMMENT '分类',
  `cont` text NOT NULL COMMENT '内容',
  `title` varchar(30) NOT NULL COMMENT '标题',
  `time` varchar(20) NOT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `wdang`
--

INSERT INTO `wdang` (`id`, `class`, `cont`, `title`, `time`) VALUES
(2, '新闻动态', '<p>额外企鹅切为其诶我去的撒的撒份额我去份额我去诶我去</p>', '第一次试验', '1479716063'),
(3, '挖机资讯', '<p>其他人群发二娃份额我去 亲热完全诶我去 诶我去而且诶我去</p>', '这是资讯', '1479811070'),
(4, '技术支持', '<p>溶解我考虑去积分卡完了去回复你就很难考几分无奈我清空累计发电量哇哈发你看到了三们能否考虑的分类代码啊，。放对面武器路附近的三款翻看了瓦去</p>', '技术哎', '1479811106'),
(5, '新闻动态', '<p>额外企鹅切为其诶我去的撒的撒份额我去份额我去诶我去</p>', '第一次试验', '1479716063'),
(6, '挖机资讯', '<p>其他人群发二娃份额我去 亲热完全诶我去 诶我去而且诶我去</p>', '这是资讯', '1479811070'),
(7, '技术支持', '<p>溶解我考虑去积分卡完了去回复你就很难考几分无奈我清空累计发电量哇哈发你看到了三们能否考虑的分类代码啊，。放对面武器路附近的三款翻看了瓦去</p>', '技术哎', '1479811106'),
(8, '新闻动态', '<p>额外企鹅切为其诶我去的撒的撒份额我去份额我去诶我去</p>', '第一次试验', '1479716063'),
(9, '挖机资讯', '<p>其他人群发二娃份额我去 亲热完全诶我去 诶我去而且诶我去</p>', '这是资讯', '1479811070'),
(10, '技术支持', '<p>溶解我考虑去积分卡完了去回复你就很难考几分无奈我清空累计发电量哇哈发你看到了三们能否考虑的分类代码啊，。放对面武器路附近的三款翻看了瓦去</p>', '技术哎', '1479811106'),
(11, '新闻动态', '<p>额外企鹅切为其诶我去的撒的撒份额我去份额我去诶我去</p>', '第一次试验', '1479716063'),
(12, '挖机资讯', '<p>其他人群发二娃份额我去 亲热完全诶我去 诶我去而且诶我去</p>', '这是资讯', '1479811070'),
(13, '技术支持', '<p>溶解我考虑去积分卡完了去回复你就很难考几分无奈我清空累计发电量哇哈发你看到了三们能否考虑的分类代码啊，。放对面武器路附近的三款翻看了瓦去</p>', '技术哎', '1479811106');
