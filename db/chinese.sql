SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


--
-- 数据库: `PHPLibrary`
--

-- --------------------------------------------------------

--
-- 表的结构 `chinese`
-- "id", "name", "price", "pic", "content", "recommond"

DROP TABLE IF EXISTS `chinese`;
CREATE TABLE IF NOT EXISTS `chinese` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `pic`  char(20) NOT NULL,
  `content` char(200) NOT NULL,
  `recommond` int(1) NOT NULL, 
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

INSERT INTO `chinese` VALUES
(1, '青菜豆腐汤', 8.0, '1.jpg', '青菜豆腐汤很好次的', 0);