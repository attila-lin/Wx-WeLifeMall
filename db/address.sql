SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- 数据库: `PHPLibrary`
--

-- --------------------------------------------------------

--
-- 表的结构 `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE `address` (
    `ano` int(6) NOT NULL AUTO_INCREMENT,
    `uid` int(6) NOT NULL,
    `address`  char(80) NOT NULL,
    PRIMARY KEY (`ano`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


INSERT INTO `address` VALUES
(1, 1, '西湖区教育局');
