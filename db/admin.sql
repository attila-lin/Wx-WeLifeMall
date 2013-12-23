SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- 数据库: `PHPLibrary`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
    `aid` int(3) NOT NULL AUTO_INCREMENT,
    `aname` char(15) NOT NULL,
    `apwd` varchar(20) NOT NULL,
    PRIMARY KEY (`aid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8  ;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`aid`, `aname`, `apwd`) VALUES
(1, 'whatever', 'lyu66559033');
