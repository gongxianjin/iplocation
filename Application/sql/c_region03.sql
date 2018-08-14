DROP TABLE IF EXISTS `c_region03`;
CREATE TABLE `c_region03` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) NOT NULL,
  `region_code` varchar(255) NOT NULL, 
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ip` (`ip_address`) USING BTREE,
  KEY `code` (`region_code`) USING BTREE, 
  KEY `latitude` (`latitude`) USING BTREE,
  KEY `longitude` (`longitude`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=9720903 DEFAULT CHARSET=utf8;