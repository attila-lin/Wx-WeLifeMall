SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- 数据库: `PHPLibrary`
--

-- --------------------------------------------------------

--
-- 表的结构 `manager`
--

DROP TABLE IF EXISTS `manager`;
CREATE TABLE `manager` (
    `mno` int(8) NOT NULL AUTO_INCREMENT,
    `mid` char(15) NOT NULL,
    `mpassword` varchar(20) NOT NULL,
    `mname`  char(20) NOT NULL,
    `mphone`  char(11) NOT NULL,
    PRIMARY KEY (`mno`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8  AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `manager`
--

INSERT INTO `manager` (`mno`, `mid`, `mpassword`, `mname`, `mphone`) VALUES
(1, 'zhang3', '123456', '张三', 18888888888),
(2, 'li4', '123456', '李四', 18888888888),
(3, 'wang5', '123456', '王五', 18888888888);
