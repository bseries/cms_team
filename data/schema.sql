CREATE TABLE `team_members` (
	  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	  `owner_id` int(11) unsigned NOT NULL,
	  `order` int(11) unsigned DEFAULT NULL,
	  `position` varchar(200) DEFAULT NULL,
	  `name` varchar(250) DEFAULT NULL,
	  `vita` text,
	  `cover_media_id` int(11) unsigned DEFAULT NULL,
	  `phone` varchar(50) DEFAULT NULL,
	  `email` varchar(50) DEFAULT NULL,
	  `fax` varchar(50) DEFAULT NULL,
	  `is_published` tinyint(1) DEFAULT NULL,
	  `urls` varchar(250) DEFAULT NULL,
	  `created` datetime NOT NULL,
	  `modified` datetime NOT NULL,
	  PRIMARY KEY (`id`)
);

