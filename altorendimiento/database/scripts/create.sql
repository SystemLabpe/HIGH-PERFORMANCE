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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(255) NOT NULL,
  `last_name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `remember_token` VARCHAR(100) NULL DEFAULT NULL,
  `club_id` INT(11) NOT NULL,
  `role_id` INT(11) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `clubs_users_idx` (`club_id` ASC),
  INDEX `roles_users_idx` (`role_id` ASC),
  CONSTRAINT `clubs_users_fk`
    FOREIGN KEY (`club_id`)
    REFERENCES `highperformancedb`.`clubs` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `roles_users_fk`
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
  `email` VARCHAR(255) NOT NULL,
  `token` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  KEY `email_key` (`email`),
  KEY `token_key` (`token`)
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
  `date_init` DATE NOT NULL,
  `date_end` DATE NOT NULL,
  `club_id` INT(11) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `clubs_seasons_idx` (`club_id` ASC),
  CONSTRAINT `clubs_seasons_fk`
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
  `height` DOUBLE NOT NULL,
  `weight` DOUBLE NOT NULL,
  `birth_date` DATE NOT NULL,
  `club_id` INT(10) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `clubs_players_idx` (`club_id` ASC),
  CONSTRAINT `clubs_players_fk`
    FOREIGN KEY (`club_id`)
    REFERENCES `highperformancedb`.`clubs` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `highperformancedb`.`tournaments`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `highperformancedb`.`tournaments` ;

CREATE TABLE IF NOT EXISTS `highperformancedb`.`tournaments` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(200) NOT NULL,
  `date_init` DATE NOT NULL,
  `date_end` DATE NOT NULL,
  `season_id` INT(11) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `seasons_tournaments_idx` (`season_id` ASC),
  CONSTRAINT `seasons_tournaments_fk`
    FOREIGN KEY (`season_id`)
    REFERENCES `highperformancedb`.`seasons` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `highperformancedb`.`tournament_player`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `highperformancedb`.`tournament_player` ;

CREATE TABLE IF NOT EXISTS `highperformancedb`.`tournament_player` (
  `tournament_id` INT(11) NOT NULL,
  `player_id` INT(11) NOT NULL,
  `player_id` INT(11) NOT NULL,
  `player_number` CHAR(2) NOT NULL,
  PRIMARY KEY (`tournament_id`, `player_id`),
  INDEX `tour_tour_play_idx` (`tournament_id` ASC),
  INDEX `play_tour_play_idx` (`player_id` ASC),
  CONSTRAINT `tour_tour_play_fk`
    FOREIGN KEY (`tournament_id`)
    REFERENCES `highperformancedb`.`tournaments` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `play_tour_play_fk`
    FOREIGN KEY (`player_id`)
    REFERENCES `highperformancedb`.`players` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;



COMMIT;

