SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


--
-- 数据库: `PHPLibrary`
--

-- --------------------------------------------------------

--
-- 表的结构 `hot`
--

DROP TABLE IF EXISTS `hot`;
CREATE TABLE IF NOT EXISTS `hot` (
  `cno` int(8) NOT NULL,
  `type` int(1) NOT NULL, 
  PRIMARY KEY (`cno`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;
