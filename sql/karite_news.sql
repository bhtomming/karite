-- MySQL dump 10.13  Distrib 5.5.53, for Win32 (AMD64)
--
-- Host: localhost    Database: karite
-- ------------------------------------------------------
-- Server version	5.5.53

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章Id',
  `title` varchar(200) NOT NULL COMMENT '文章标题',
  `ttimg` varchar(200) NOT NULL COMMENT '标题图片地址',
  `summary` varchar(200) NOT NULL COMMENT '内容简介',
  `content` text NOT NULL COMMENT '内容详情',
  `author` varchar(50) NOT NULL COMMENT '文章作者',
  `keywords` varchar(100) NOT NULL COMMENT '关键词',
  `description` varchar(200) NOT NULL COMMENT '描述',
  `createtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '发布时间',
  `mdtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '修改时间',
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`title`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE `profile` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章Id',
  `title` varchar(200) NOT NULL COMMENT '文章标题',
  `ttimg` varchar(200) NOT NULL COMMENT '标题图片地址',
  `summary` varchar(200) NOT NULL COMMENT '内容简介',
  `content` text NOT NULL COMMENT '内容详情',
  `author` varchar(50) NOT NULL COMMENT '文章作者',
  `keywords` varchar(100) NOT NULL COMMENT '关键词',
  `description` varchar(200) NOT NULL COMMENT '描述',
  `createtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '发布时间',
  `mdtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '修改时间',
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`title`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE `depart` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章Id',
  `title` varchar(200) NOT NULL COMMENT '文章标题',
  `ttimg` varchar(200) NOT NULL COMMENT '标题图片地址',
  `summary` varchar(200) NOT NULL COMMENT '内容简介',
  `content` text NOT NULL COMMENT '内容详情',
  `author` varchar(50) NOT NULL COMMENT '文章作者',
  `keywords` varchar(100) NOT NULL COMMENT '关键词',
  `description` varchar(200) NOT NULL COMMENT '描述',
  `createtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '发布时间',
  `mdtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '修改时间',
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`title`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE `dot` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章Id',
  `title` varchar(200) NOT NULL COMMENT '文章标题',
  `ttimg` varchar(200) NOT NULL COMMENT '标题图片地址',
  `summary` varchar(200) NOT NULL COMMENT '内容简介',
  `content` text NOT NULL COMMENT '内容详情',
  `author` varchar(50) NOT NULL COMMENT '文章作者',
  `keywords` varchar(100) NOT NULL COMMENT '关键词',
  `description` varchar(200) NOT NULL COMMENT '描述',
  `createtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '发布时间',
  `mdtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '修改时间',
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`title`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE `history` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章Id',
  `title` varchar(200) NOT NULL COMMENT '文章标题',
  `ttimg` varchar(200) NOT NULL COMMENT '标题图片地址',
  `summary` varchar(200) NOT NULL COMMENT '内容简介',
  `content` text NOT NULL COMMENT '内容详情',
  `author` varchar(50) NOT NULL COMMENT '文章作者',
  `keywords` varchar(100) NOT NULL COMMENT '关键词',
  `description` varchar(200) NOT NULL COMMENT '描述',
  `createtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '发布时间',
  `mdtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '修改时间',
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`title`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE `video` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章Id',
  `title` varchar(200) NOT NULL COMMENT '文章标题',
  `ttimg` varchar(200) NOT NULL COMMENT '标题图片地址',
  `summary` varchar(200) NOT NULL COMMENT '内容简介',
  `content` text NOT NULL COMMENT '内容详情',
  `author` varchar(50) NOT NULL COMMENT '文章作者',
  `keywords` varchar(100) NOT NULL COMMENT '关键词',
  `description` varchar(200) NOT NULL COMMENT '描述',
  `createtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '发布时间',
  `mdtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '修改时间',
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`title`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE `brand` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章Id',
  `title` varchar(200) NOT NULL COMMENT '品牌名称',
  `ttimg` varchar(200) NOT NULL COMMENT '品牌图片地址',
  `special` varchar(100) NOT NULL COMMENT '专题地址',
  `description` varchar(200) NOT NULL COMMENT '品牌描述',
  `website` varchar(200) NOT NULL COMMENT '官网地址',
  `createtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '发布时间',
  `mdtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '修改时间',
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`title`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE `activity` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章Id',
  `title` varchar(200) NOT NULL COMMENT '文章标题',
  `ttimg` varchar(200) NOT NULL COMMENT '标题图片地址',
  `summary` varchar(200) NOT NULL COMMENT '内容简介',
  `content` text NOT NULL COMMENT '内容详情',
  `author` varchar(50) NOT NULL COMMENT '文章作者',
  `keywords` varchar(100) NOT NULL COMMENT '关键词',
  `description` varchar(200) NOT NULL COMMENT '描述',
  `createtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '发布时间',
  `mdtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '修改时间',
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`title`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE `shows` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章Id',
  `title` varchar(200) NOT NULL COMMENT '品牌名称',
  `ttimg` varchar(200) NOT NULL COMMENT '品牌图片地址',
  `description` varchar(200) NOT NULL COMMENT '品牌描述',
  `createtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '发布时间',
  `mdtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '修改时间',
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`title`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `sucase` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章Id',
  `title` varchar(200) NOT NULL COMMENT '文章标题',
  `ttimg` varchar(200) NOT NULL COMMENT '标题图片地址',
  `summary` varchar(200) NOT NULL COMMENT '内容简介',
  `content` text NOT NULL COMMENT '内容详情',
  `author` varchar(50) NOT NULL COMMENT '文章作者',
  `keywords` varchar(100) NOT NULL COMMENT '关键词',
  `description` varchar(200) NOT NULL COMMENT '描述',
  `createtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '发布时间',
  `mdtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '修改时间',
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`title`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE `hzcenter` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章Id',
  `title` varchar(200) NOT NULL COMMENT '文章标题',
  `ttimg` varchar(200) NOT NULL COMMENT '标题图片地址',
  `summary` varchar(200) NOT NULL COMMENT '内容简介',
  `content` text NOT NULL COMMENT '内容详情',
  `author` varchar(50) NOT NULL COMMENT '文章作者',
  `keywords` varchar(100) NOT NULL COMMENT '关键词',
  `description` varchar(200) NOT NULL COMMENT '描述',
  `createtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '发布时间',
  `mdtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '修改时间',
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`title`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE `notice` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章Id',
  `title` varchar(200) NOT NULL COMMENT '文章标题',
  `ttimg` varchar(200) NOT NULL COMMENT '标题图片地址',
  `summary` varchar(200) NOT NULL COMMENT '内容简介',
  `content` text NOT NULL COMMENT '内容详情',
  `author` varchar(50) NOT NULL COMMENT '文章作者',
  `keywords` varchar(100) NOT NULL COMMENT '关键词',
  `description` varchar(200) NOT NULL COMMENT '描述',
  `createtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '发布时间',
  `mdtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '修改时间',
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`title`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE `contact` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章Id',
  `title` varchar(200) NOT NULL COMMENT '文章标题',
  `ttimg` varchar(200) NOT NULL COMMENT '标题图片地址',
  `summary` varchar(200) NOT NULL COMMENT '内容简介',
  `content` text NOT NULL COMMENT '内容详情',
  `author` varchar(50) NOT NULL COMMENT '文章作者',
  `keywords` varchar(100) NOT NULL COMMENT '关键词',
  `description` varchar(200) NOT NULL COMMENT '描述',
  `createtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '发布时间',
  `mdtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '修改时间',
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`title`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE `words` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT COMMENT '留言Id',
  `name` varchar(20) NOT NULL COMMENT '留言人姓名',
  `phone` varchar(20) NOT NULL COMMENT '联系电话',
  `email` varchar(20) NOT NULL COMMENT '电子邮箱',
  `address` varchar(100) NOT NULL COMMENT '联系地址',
  `content` text NOT NULL COMMENT '内容详情',
  `createtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '发布时间',
  `mdtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '修改时间',
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE `recruit` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章Id',
  `title` varchar(200) NOT NULL COMMENT '文章标题',
  `ttimg` varchar(200) NOT NULL COMMENT '标题图片地址',
  `summary` varchar(200) NOT NULL COMMENT '内容简介',
  `content` text NOT NULL COMMENT '内容详情',
  `author` varchar(50) NOT NULL COMMENT '文章作者',
  `keywords` varchar(100) NOT NULL COMMENT '关键词',
  `description` varchar(200) NOT NULL COMMENT '描述',
  `createtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '发布时间',
  `mdtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '修改时间',
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`title`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-31 10:50:33
