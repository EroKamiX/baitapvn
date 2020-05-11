SET FOREIGN_KEY_CHECKS=0;
CREATE DATABASE IF NOT EXISTS news_mvc CHARACTER SET utf8 COLLATE utf8_general_ci;
using news_mvc;
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`title` varchar (100) COLLATE utf8_unicode_ci NOT NULL,
`pic_des` varchar (100) NOT NULL,
`description` varchar (100) NOT NULL ,
`created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP  ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY (`id`)
)