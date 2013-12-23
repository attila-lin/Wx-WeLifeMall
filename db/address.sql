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
    `ano` int(8) NOT NULL AUTO_INCREMENT,
    `uid` char(8) NOT NULL,
    `address`  char(80) NOT NULL,
    PRIMARY KEY (`ano`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

