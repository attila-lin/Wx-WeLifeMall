SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- 数据库: `PHPLibrary`
--

-- --------------------------------------------------------

--
-- 表的结构 `order`
-- "oid", "uid", "chinese", "western", "fruit", "dessert", "time", "price", "ano", "pno", "status"

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
    `oid` int(8) NOT NULL AUTO_INCREMENT,
    `uid` int(6) NOT NULL,
    `chinese` char(40) NOT NULL,
    `western` char(40) NOT NULL,
    `fruit` char(40) NOT NULL,
    `dessert` char(40) NOT NULL,
    `time` DATETIME NOT NULL,
    `price` decimal(7,2) NOT NULL,
    `ano` int(6) NOT NULL,
    `pno` int(6) NOT NULL,
    `status` int(1) NOT NULL,
    PRIMARY KEY (`oid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

INSERT INTO `orders` VALUES
(1, 1, '1', '' , '' , '' , '2013-12-26 16:23:55', 8.0, 1, 1, 1);