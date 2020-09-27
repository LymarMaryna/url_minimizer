CREATE TABLE `url_data` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `url` varchar (255) NOT NULL DEFAULT '',
  `hash` varchar (100) NOT NULL DEFAULT '',
  `count_views` int(11) DEFAULT 0,
  `end_date` timestamp NULL,
  `last_modify` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `url` (`url`),
  KEY `hash` (`hash`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;