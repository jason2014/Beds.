DROP DATABASE IF EXISTS `bd_system`;
CREATE DATABASE `bd_system`;
USE `bd_system`;

DROP TABLE IF EXISTS `colleges`;
CREATE TABLE `colleges` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`status` tinyint NOT NULL DEFAULT '0',
`name` varchar(50) NOT NULL DEFAULT '',
`all_count` int(11) NOT NULL DEFAULT '0',
`male_count` int(11) NOT NULL DEFAULT '0',
`female_count` int(11) NOT NULL DEFAULT '0',
`created` datetime DEFAULT '0000-00-00 00:00:00',
`updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY (`id`),
UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `classes`;
CREATE TABLE `classes` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`college_id` int(11) NOT NULL DEFAULT '0',
`status` tinyint NOT NULL DEFAULT '0',
`name` varchar(50) NOT NULL DEFAULT '',
`all_count` int(11) NOT NULL DEFAULT '0',
`male_count` int(11) NOT NULL DEFAULT '0',
`female_count` int(11) NOT NULL DEFAULT '0',
`created` datetime DEFAULT '0000-00-00 00:00:00',
`updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY (`id`),
UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`status` tinyint NOT NULL DEFAULT '0',
`type` tinyint NOT NULL DEFAULT '0', /* 1 - male, 2 for female*/
`username` varchar(50) NOT NULL DEFAULT '',
`password` varchar(50) NOT NULL DEFAULT '',
`name` varchar(50) NOT NULL DEFAULT '',
`is_system_admin` tinyint NOT NULL DEFAULT '0',
`is_college_admin` tinyint NOT NULL DEFAULT '0',
`college_id` int(11) NOT NULL DEFAULT '0', /* this refer to colleges table*/
`class_id` int(11) NOT NULL DEFAULT '0', /* this refer to classes table*/
`bed_id` int(11) NOT NULL DEFAULT '0', /* used by students*/
`created` datetime DEFAULT '0000-00-00 00:00:00',
`updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY (`id`),
UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `builds`;
CREATE TABLE `builds` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`status` tinyint NOT NULL DEFAULT '0',
`name` varchar(50) NOT NULL DEFAULT '',
`type` tinyint NOT NULL DEFAULT '0', /*1 for male, 2 for female, 3 both*/
`locate` varchar(20) NOT NULL DEFAULT '',
`mark` varchar(50) NOT NULL DEFAULT '', 
`created` datetime DEFAULT '0000-00-00 00:00:00',
`updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY (`id`),
UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE `rooms` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`build_id` int(11) NOT NULL DEFAULT '0', /* this refer to builds table*/
`college_id` int(11) NOT NULL DEFAULT '0', /* this is writen by system_admin, used by college admin */
`class_id` int(11) NOT NULL DEFAULT '0', /* this is writen by college_admin, used by college student */
`bad_count` tinyint NOT NULL DEFAULT '0',
`mark` varchar(10) NOT NULL DEFAULT '', /* 209, 301*/
`created` datetime DEFAULT '0000-00-00 00:00:00',
`updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY (`id`),
UNIQUE KEY `build_room` (`build_id`, `mark`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `beds`;
CREATE TABLE `beds` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`room_id` int(11) NOT NULL DEFAULT '0', /* this refer to rooms table */
`status` tinyint NOT NULL DEFAULT '0', /* 0 for still in processing, 1 for on-sale, 2 for saled */
`type` tinyint NOT NULL DEFAULT '0', /* 500 -- 3, 800 -- 2, 1200 -- 1 */
`mark` varchar(5) NOT NULL DEFAULT '', /* 1, 2, 3, 4.. */
`created` datetime DEFAULT '0000-00-00 00:00:00',
`updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY (`id`),
UNIQUE KEY `room_bed` (`room_id`, `mark`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
