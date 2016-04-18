CREATE TABLE `team_members` (
	  `id` int(11) NOT NULL,
	  `owner_id` int(11) DEFAULT NULL,
	  `position` varchar(200) DEFAULT NULL,
	  `name` varchar(250) DEFAULT NULL,
	  `vita` text,
	  `portrait` int(11) DEFAULT NULL,
	  `phone` varchar(50) DEFAULT NULL,
	  `email` varchar(50) DEFAULT NULL,
	  `fax` varchar(50) DEFAULT NULL,
	  `is_published` tinyint(1) DEFAULT NULL,
	  `created` datetime DEFAULT NULL,
	  `modified` datetime DEFAULT NULL,
	  PRIMARY KEY (`id`)
);
