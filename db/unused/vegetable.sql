SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


--
-- 数据库: `PHPLibrary`
--

-- --------------------------------------------------------

--
-- 表的结构 `vegetable`
--

DROP TABLE IF EXISTS `vegetable`;
CREATE TABLE IF NOT EXISTS `vegetable` (
  `cno` int(8) NOT NULL,
  `type` int(1) NOT NULL, 
  PRIMARY KEY (`cno`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;
