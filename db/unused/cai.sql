SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


--
-- 数据库: `PHPLibrary`
--

-- --------------------------------------------------------

--
-- 表的结构 `cai`
--

DROP TABLE IF EXISTS `cai`;
CREATE TABLE IF NOT EXISTS `cai` (
  `cno` int(8) NOT NULL AUTO_INCREMENT,
  `cname` varchar(20) NOT NULL,
  `cprice` decimal(7,2) NOT NULL,
  `cpic`  char(30) NOT NULL,
  `belifcontent` char(200) NOT NULL,
  `type` char(12) NOT NULL, 
  PRIMARY KEY (`cno`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `cai`
--

INSERT INTO `cai` (`cno`, `cname`, `cprice`, `cpic`, `belifcontent`, `type`) VALUES
(1, '菜', 10.0, '1', '', '素菜'),
(2, '菜', 10.0, '1', '', '素菜'),
(3, '菜', 10.0, '1', '', '素菜');
