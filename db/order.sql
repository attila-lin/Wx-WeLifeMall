SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- 数据库: `PHPLibrary`
--

-- --------------------------------------------------------

--
-- 表的结构 `order`
-- "oid", "uid", "fids", "time", "price", "ano", "pno", "status"

DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
    `oid` int(8) NOT NULL AUTO_INCREMENT,
    `uid` int(6) NOT NULL,
    `fids` char(60) NOT NULL,
    `time` date NOT NULL,
    `price` decimal(7,2) NOT NULL,
    `ano` int(6) NOT NULL,
    `pno` int(6) NOT NULL,
    `status` int(1) NOT NULL,
    PRIMARY KEY (`oid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;