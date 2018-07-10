ALTER TABLE `team_members` ADD `site` VARCHAR(50)  NULL  DEFAULT NULL  AFTER `owner_id`;
ALTER TABLE `vacant_team_positions` ADD `site` VARCHAR(50)  NULL  DEFAULT NULL  AFTER `owner_id`;
