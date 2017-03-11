-- 主机: localhost
-- 生成日期: 2017-03-11 18:32:15
-- 服务器版本: 5.5.54-0ubuntu0.14.04.1
-- PHP 版本: 5.5.9-1ubuntu4.20
--
-- 数据库: `runjus`
--

-- --------------------------------------------------------

--
-- 表的结构 `runipfs`
--

CREATE TABLE IF NOT EXISTS `runipfs` (
  `theID` int(11) NOT NULL AUTO_INCREMENT,
  `times` varchar(16) NOT NULL,
  `url0` varchar(1024) NOT NULL,
  `url1` varchar(1024) NOT NULL,
  `url2` varchar(1024) NOT NULL,
  `url3` varchar(1024) NOT NULL,
  `hadbc` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`theID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `runipfs`
--

INSERT INTO `runipfs` (`theID`, `times`, `url0`, `url1`, `url2`, `url3`, `hadbc`) VALUES
(1, '1489132345', 'http://www.ddaayy.com/darknet/okpic/1489132297.jpg', 'http://ipfs.io/ipfs/QmWoe69ADDTM1XhYVV38dCDkfMUqT7c2jMeadHMTzrUZzE', 'http://ipfs.io/ipfs/QmWE9wXYPxsK2qg1pockdNF8SiKzRUG9fkqQ1v6fi6dKKi', 'http://ipfs.io/ipfs/QmWE9wXYPxsK2qg1pockdNF8SiKzRUG9fkqQ1v6fi6dKKi', 'OK');

-- --------------------------------------------------------

--
-- 表的结构 `runjus`
--

CREATE TABLE IF NOT EXISTS `runjus` (
  `theID` int(11) NOT NULL AUTO_INCREMENT,
  `times` varchar(16) NOT NULL,
  `benyuanrenwei` varchar(2048) NOT NULL,
  `panjueruxia` varchar(8192) NOT NULL,
  `hadbc` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`theID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `runjus`
--

INSERT INTO `runjus` (`theID`, `times`, `benyuanrenwei`, `panjueruxia`, `hadbc`) VALUES
(1, '1489132302', '本院认为，被告人张某以非法占有为目的，多次秘密窃取他人财物，价值共计人民币37147元，数额较大，其行为已构成盗窃罪。公诉机关指控的罪名成立。被告人张某到案后如实供述自己的罪行，可从轻处罚。结合本案被告人张某有犯罪前科，以及多次盗窃中有入户盗窃的情节，确定从轻处罚的幅度。根据本案被告人犯罪的事实、性质、情节和对于社会危害程度，', '0<br>0	-4.67166	依照《中华人民共和国刑法》第二百六十四条、第五十二条、第五十三条之规定，判决如下：被告人王某某犯盗窃罪，判处拘役四个月，并处罚金人民币一千元。<e><br>1	-4.79971	依照《中华人民共和国刑法》第二百六十四条、第五十二条、第五十三条之规定，判决如下：被告人李某某犯盗窃罪，判处有期徒刑六个月，并处罚金人民币一千元。<e><br>2	-5.14809	依照《中华人民共和国刑法》第二百六十四条、第五十二条、第五十三条之规定，判决如下：被告人张某某犯盗窃罪，判处拘役三个月，罚金人民币一千元。<e><br><br>', 'OK'),
(2, '1489133444', '本院认为，被告人周某某为他人吸食毒品提供场所，其行为已构成容留他人吸毒罪。公诉机关指控罪名成立。被告人周某某归案后能够如实供述自己的犯罪事实，可予以从轻处罚。', '0<br>0	-6.82992	依照《中华人民共和国刑法》第三百零三条第二款、第五十二条、第五十三条之规定，判决如下：被告人王某某犯容留他人吸毒罪，判处拘役五个月，并处罚金人民币一千元。<e><br>1	-7.21487	依照《中华人民共和国刑法》第三百零三条第二款、第五十二条、第五十三条之规定，判决如下：被告人张某某犯容留他人吸毒罪，判处拘役五个月，并处罚金人民币一千元。<e><br>2	-8.51328	依照《中华人民共和国刑法》第三百零三条第二款、第五十二条、第五十二条、第五十三条之规定，判决如下：被告人王某某犯容留他人吸毒罪，判处有期徒刑六个月，并处罚金人民币一万元。<e><br><br>', 'OK');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
