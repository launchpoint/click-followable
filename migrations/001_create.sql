CREATE TABLE IF NOT EXISTS `followers` (
  `id` int(11) NOT NULL auto_increment,
  `follower_thread_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `user_id` (`user_id`,`created_at`),
  KEY `follower_thread_id` (`follower_thread_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;



CREATE TABLE IF NOT EXISTS `follower_threads` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  `object_type` varchar(50) NOT NULL,
  `object_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `name` (`name`,`object_type`,`object_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;
