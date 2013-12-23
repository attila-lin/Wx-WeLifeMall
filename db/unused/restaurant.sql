SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


--
-- 数据库: `PHPLibrary`
--

-- --------------------------------------------------------

--
-- 表的结构 `restaurant`
--

DROP TABLE IF EXISTS `restaurant`;
CREATE TABLE IF NOT EXISTS `restaurant` (
  `cno` int(8) NOT NULL,
  `type` int(1) NOT NULL, 
  PRIMARY KEY (`cno`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;
