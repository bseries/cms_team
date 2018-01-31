-- Create syntax for TABLE 'team_members'
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create syntax for TABLE 'vacant_team_positions'
CREATE TABLE `vacant_team_positions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) unsigned NOT NULL,
  `order` int(11) unsigned DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL,
  `department` varchar(250) DEFAULT NULL,
  `locations` varchar(250) DEFAULT NULL,
  `teaser` text,
  `body` text,
  `is_published` tinyint(1) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
