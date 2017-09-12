-- -----------------------------------------------------
-- Schema highperformancedb
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `highperformancedb` ;

-- -----------------------------------------------------
-- Schema highperformancedb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `highperformancedb` DEFAULT CHARACTER SET utf8 ;
USE `highperformancedb` ;

-- -----------------------------------------------------
-- Table `highperformancedb`.`roles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `highperformancedb`.`roles` ;

CREATE TABLE IF NOT EXISTS `highperformancedb`.`roles` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(200) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `highperformancedb`.`clubs`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `highperformancedb`.`clubs` ;

CREATE TABLE IF NOT EXISTS `highperformancedb`.`clubs` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(200) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `highperformancedb`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `highperformancedb`.`users` ;

CREATE TABLE `highperformancedb`.`users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `club_id` int(10) NOT NULL,
  `role_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  INDEX `clubs_users_idx` (`club_id` ASC),
  INDEX `roles_users_idx` (`role_id` ASC),
  CONSTRAINT `fk_clubs_users`
    FOREIGN KEY (`club_id`)
    REFERENCES `highperformancedb`.`clubs` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_roles_users`
    FOREIGN KEY (`role_id`)
    REFERENCES `highperformancedb`.`roles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) 
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `highperformancedb`.`password_resets`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `highperformancedb`.`password_resets` ;

CREATE TABLE `highperformancedb`.`password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) 
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `highperformancedb`.`seasons`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `highperformancedb`.`seasons` ;

CREATE TABLE IF NOT EXISTS `highperformancedb`.`seasons` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(200) NOT NULL,
  `date_init` date NOT NULL,
  `date_end` date NOT NULL,
  `club_id` int(10) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `clubs_seasons_idx` (`club_id` ASC),
  CONSTRAINT `fk_clubs_seasons`
    FOREIGN KEY (`club_id`)
    REFERENCES `highperformancedb`.`clubs` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `highperformancedb`.`players`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `highperformancedb`.`players` ;

CREATE TABLE IF NOT EXISTS `highperformancedb`.`players` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(200) NOT NULL,
  `height` double NOT NULL,
  `weight` double NOT NULL,
  `birth_date` date NOT NULL,
  `club_id` int(10) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `clubs_players_idx` (`club_id` ASC),
  CONSTRAINT `fk_clubs_players`
    FOREIGN KEY (`club_id`)
    REFERENCES `highperformancedb`.`clubs` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;



COMMIT;

