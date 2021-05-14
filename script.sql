DROP DATABASE IF EXISTS `quizz-app`;
CREATE DATABASE `quizz-app` CHARACTER SET UTF8;

USE `quizz-app`;

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_name` VARCHAR(150) NOT NULL,
  `email` VARCHAR(250),
  `password` VARCHAR(70),
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `UC_user_user_name` (`user_name`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `questions`;

CREATE TABLE `questions` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `question_category` VARCHAR(150) NOT NULL,
    `theme_id` INT(11) NOT NULL,
    `question_cat_id` INT(11) NOT NULL,
    `question_type` ENUM('V-F', 'QCM') NULL,
    `question` VARCHAR(255) NOT NULL,
    `option1` VARCHAR(150) NOT NULL,
    `option2` VARCHAR(150) NOT NULL,
    `option3` VARCHAR(150),
    `option4` VARCHAR(150),
    `answer` VARCHAR(255) NOT NULL,
    PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `themes`;

CREATE TABLE `themes` (
    `theme_id` INT(11) NOT NULL,
    `theme` VARCHAR(150) NOT NULL,
    `description` VARCHAR(255) NOT NULL,
    PRIMARY KEY(`theme_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `scores`;

CREATE TABLE `scores` (
    `id` INT(11) NOT NULL,
    `user_id` INT(11) NOT NULL,
    `scorevalue` INT(11) NOT NULL,
    PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `questions` 
ADD CONSTRAINT `FK_theme_id` FOREIGN KEY (`theme_id`) REFERENCES `themes` (`theme_id`);

ALTER TABLE `scores`
ADD CONSTRAINT `FK_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);