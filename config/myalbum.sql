-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `myalbum`;
CREATE TABLE `myalbum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `furl` varchar(1000) DEFAULT NULL,
  `turl` varchar(1000) DEFAULT NULL,
  `dinfo` varchar(100) DEFAULT NULL,
  `mtime` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

TRUNCATE `myalbum`;

DROP TABLE IF EXISTS `myalbum_comments`;
CREATE TABLE `myalbum_comments` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `message` varchar(50) NOT NULL,
  `pushtime` datetime NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

TRUNCATE `myalbum_comments`;

DROP TABLE IF EXISTS `myalbum_users`;
CREATE TABLE `myalbum_users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `userpwd` varchar(50) NOT NULL,
  `usertoken` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

TRUNCATE `myalbum_users`;
INSERT INTO `myalbum_users` (`uid`, `username`, `userpwd`, `usertoken`, `email`) VALUES
(1,	'admin',	'e10adc3949ba59abbe56e057f20f883e',	'',	'test@dingstudio.cn');

-- 2017-05-25 13:37:36
