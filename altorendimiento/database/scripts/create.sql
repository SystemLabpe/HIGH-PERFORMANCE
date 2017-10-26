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
    ON UPDATE NO ACTION
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `highperformancedb`.`rival_teams`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `highperformancedb`.`rival_teams` ;

CREATE TABLE IF NOT EXISTS `highperformancedb`.`rival_teams` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(200) NOT NULL,
  `picture` VARCHAR(200) NULL DEFAULT NULL,
  `club_id` INT(11) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `club_rivtea_idx` (`club_id` ASC),
  CONSTRAINT `club_rivtea_fk`
    FOREIGN KEY (`club_id`)
    REFERENCES `highperformancedb`.`clubs` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `highperformancedb`.`stadiums`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `highperformancedb`.`stadiums` ;

CREATE TABLE IF NOT EXISTS `highperformancedb`.`stadiums` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(200) NOT NULL,
  `club_id` INT(11) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `club_stadium_idx` (`club_id` ASC),
  CONSTRAINT `club_stadium_fk`
    FOREIGN KEY (`club_id`)
    REFERENCES `highperformancedb`.`clubs` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `highperformancedb`.`matchs`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `highperformancedb`.`matchs` ;

CREATE TABLE IF NOT EXISTS `highperformancedb`.`matchs` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `tournament_id` INT(11) NOT NULL,
  `rival_team_id` INT(11) NOT NULL,
  `match_date` DATE NULL DEFAULT NULL,
  `is_local` CHAR(1) NOT NULL,
  `local_score` VARCHAR(200) NOT NULL,
  `visitor_score` VARCHAR(200) NOT NULL,
  `stadium_id` INT(11) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`,`tournament_id`, `rival_team_id`),
  INDEX `tour_match_idx` (`tournament_id` ASC),
  INDEX `rivtea_match_idx` (`rival_team_id` ASC),
  INDEX `stadium_match_idx` (`stadium_id` ASC),
  CONSTRAINT `tour_match_fk`
    FOREIGN KEY (`tournament_id`)
    REFERENCES `highperformancedb`.`tournaments` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `rivtea_match_fk`
    FOREIGN KEY (`rival_team_id`)
    REFERENCES `highperformancedb`.`rival_teams` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `stadium_match_fk`
    FOREIGN KEY (`stadium_id`)
    REFERENCES `highperformancedb`.`stadiums` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `highperformancedb`.`player_match`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `highperformancedb`.`player_match` ;

CREATE TABLE IF NOT EXISTS `highperformancedb`.`player_match` (
  `player_id` INT(11) NOT NULL,
  `match_id` INT(11) NOT NULL,
  `match_tournament_id` INT(11) NOT NULL,
  `match_rival_team_id` INT(11) NOT NULL,
  
  `good_pass` INT(11) NULL,
  `bad_pass` INT(11) NULL,
  `short_pass` INT(11) NULL,
  `medium_pass` INT(11) NULL,
  `long_pass` INT(11) NULL,
  `internal_edge` INT(11) NULL,
  `external_edge` INT(11) NULL,
  `instep` INT(11) NULL,
  `taco` INT(11) NULL,
  `tigh` INT(11) NULL,
  `chest` INT(11) NULL,
  `head` INT(11) NULL,
  
  `d_short_distance` INT(11) NULL,
  `d_medium_distance` INT(11) NULL,
  `d_long_distance` INT(11) NULL,
  `i_full_speed` INT(11) NULL,
  `i_semi_full_speed` INT(11) NULL,
  `i_half_speed` INT(11) NULL,
  `i_walk` INT(11) NULL,
  `e_run` INT(11) NULL,
  `e_jump` INT(11) NULL,
  `e_walk` INT(11) NULL,
  `e_stand` INT(11) NULL,

  PRIMARY KEY (`player_id`,`match_id`,`match_tournament_id`, `match_rival_team_id`),
  INDEX `player_playmatc_idx` (`player_id` ASC),
  INDEX `match_playmatc_idx` (`match_id` ASC),
  INDEX `matchtour_playmatc_idx` (`match_tournament_id` ASC),
  INDEX `matchrivt_playmatc_idx` (`match_rival_team_id` ASC),
  CONSTRAINT `player_playmatc_fk`
    FOREIGN KEY (`player_id`)
    REFERENCES `highperformancedb`.`players` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `match_playmatc_fk`
    FOREIGN KEY (`match_id`)
    REFERENCES `highperformancedb`.`matchs` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `matchtour_playmatc_fk`
    FOREIGN KEY (`match_tournament_id`)
    REFERENCES `highperformancedb`.`matchs` (`tournament_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `matchrivt_playmatc_fk`
    FOREIGN KEY (`match_rival_team_id`)
    REFERENCES `highperformancedb`.`matchs` (`rival_team_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `highperformancedb`.`tacticals`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `highperformancedb`.`tacticals` ;

CREATE TABLE IF NOT EXISTS `highperformancedb`.`tacticals` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(200) NOT NULL,
  `desc` TEXT NULL DEFAULT NULL,
  `tactical_type` TINYINT(1) NOT NULL DEFAULT 0 COMMENT '1:SYSTEM 2:FIXED',
  `club_id` INT(11) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `club_tact_idx` (`club_id` ASC),
  CONSTRAINT `club_tact_fk`
    FOREIGN KEY (`club_id`)
    REFERENCES `highperformancedb`.`clubs` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `highperformancedb`.`player_match`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `highperformancedb`.`tactical_match` ;

CREATE TABLE IF NOT EXISTS `highperformancedb`.`tactical_match` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `tactical_id` INT(11) NOT NULL,
  `match_id` INT(11) NOT NULL,
  `match_tournament_id` INT(11) NOT NULL,
  `match_rival_team_id` INT(11) NOT NULL,
  `is_own` TINYINT(1) NOT NULL DEFAULT 0 COMMENT '0:NO 1:YES',
  `ended_in_goal` TINYINT(1) NOT NULL DEFAULT 0 COMMENT '0:NO 2:YES',

  PRIMARY KEY (`id`,`tactical_id`,`match_id`,`match_tournament_id`, `match_rival_team_id`),
  INDEX `tactical_tactmatc_idx` (`tactical_id` ASC),
  INDEX `match_tactmatc_idx` (`match_id` ASC),
  INDEX `matchtour_tactmatc_idx` (`match_tournament_id` ASC),
  INDEX `matchrivt_tactmatc_idx` (`match_rival_team_id` ASC),
  CONSTRAINT `tactical_tactmatc_fk`
    FOREIGN KEY (`tactical_id`)
    REFERENCES `highperformancedb`.`tacticals` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `match_tactmatc_fk`
    FOREIGN KEY (`match_id`)
    REFERENCES `highperformancedb`.`matchs` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `matchtour_tactmatc_fk`
    FOREIGN KEY (`match_tournament_id`)
    REFERENCES `highperformancedb`.`matchs` (`tournament_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `matchrivt_tactmatc_fk`
    FOREIGN KEY (`match_rival_team_id`)
    REFERENCES `highperformancedb`.`matchs` (`rival_team_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


COMMIT;

