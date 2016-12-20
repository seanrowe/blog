
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- posts
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(500) NOT NULL,
    `active` TINYINT(1) DEFAULT 0 NOT NULL,
    `user_id` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `active` (`active`, `user_id`),
    INDEX `user_id` (`user_id`),
    CONSTRAINT `posts_ibfk_1`
        FOREIGN KEY (`id`)
        REFERENCES `posts_content` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `posts_ibfk_2`
        FOREIGN KEY (`user_id`)
        REFERENCES `users` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- posts_content
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `posts_content`;

CREATE TABLE `posts_content`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `posts_id` INTEGER NOT NULL,
    `text` LONGTEXT NOT NULL,
    `status` enum('draft','published','archived') DEFAULT 'draft' NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `posts_id` (`posts_id`, `status`),
    CONSTRAINT `posts_content_ibfk_1`
        FOREIGN KEY (`posts_id`)
        REFERENCES `posts` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- users
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `users_username_uindex` (`username`),
    CONSTRAINT `users_ibfk_1`
        FOREIGN KEY (`id`)
        REFERENCES `posts` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
