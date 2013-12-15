SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- 数据库: `PHPLibrary`
--

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
    `uno` int(8) NOT NULL AUTO_INCREMENT,
    `uopenid` char(40) NOT NULL,
    `uphone` varchar(11) NOT NULL,
    `uaddress`  char(80) NOT NULL,
    PRIMARY KEY (`uno`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

