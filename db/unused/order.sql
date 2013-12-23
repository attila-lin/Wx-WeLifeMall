SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- 数据库: `PHPLibrary`
--

-- --------------------------------------------------------

--
-- 表的结构 `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
    `ono` int(8) NOT NULL AUTO_INCREMENT,
    `cnos` char(40) NOT NULL,
    `ano` int(8) NOT NULL,
    `pno` int(8) NOT NULL,
    `price` int(5) NOT NULL,
    `done` int(1) NOT NULL,
    PRIMARY KEY (`ono`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;