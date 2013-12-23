SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


--
-- 数据库: `PHPLibrary`
--

-- --------------------------------------------------------

--
-- 表的结构 `western`
-- "id", "name", "price", "pic", "content", "recommond"

DROP TABLE IF EXISTS `western`;
CREATE TABLE IF NOT EXISTS `western` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `pic`  char(20) NOT NULL,
  `content` char(200) NOT NULL,
  `recommond` int(1) NOT NULL, 
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;
