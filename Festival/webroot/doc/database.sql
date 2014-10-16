SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `festival` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ;
USE `festival` ;

-- -----------------------------------------------------
-- Table `festival`.`bands`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `festival`.`bands` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(30) NOT NULL,
  `style` VARCHAR(30) NOT NULL,
  `payment` FLOAT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `festival`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `festival`.`users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(30) NOT NULL,
  `password` VARCHAR(30) NOT NULL,
  `fname` VARCHAR(30) NOT NULL,
  `lname` VARCHAR(30) NOT NULL,
  `rg` INT(11) NOT NULL,
  `cpf` INT(11) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `festival`.`clients`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `festival`.`clients` (
  `id` INT(11) NOT NULL,
  `user_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `user_id`),
  INDEX `clients_ibfk_1_idx` (`user_id` ASC),
  UNIQUE INDEX `user_id_UNIQUE` (`user_id` ASC),
  CONSTRAINT `clients_ibfk_1`
    FOREIGN KEY (`user_id`)
    REFERENCES `festival`.`users` (`id`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `festival`.`events`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `festival`.`events` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `city` VARCHAR(40) NOT NULL,
  `location` VARCHAR(40) NOT NULL,
  `address` VARCHAR(60) NOT NULL,
  `price` FLOAT NOT NULL,
  `capacity` INT(11) NOT NULL,
  `event_date` DATE NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `festival`.`stages`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `festival`.`stages` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `event_id` INT(11) NOT NULL,
  `ambient` VARCHAR(20) NOT NULL,
  `stage_date` DATE NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `id` (`id` ASC),
  INDEX `event_id` (`event_id` ASC),
  CONSTRAINT `stages_ibfk_1`
    FOREIGN KEY (`event_id`)
    REFERENCES `festival`.`events` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `festival`.`concerts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `festival`.`concerts` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `stage_id` INT(11) NOT NULL,
  `band_id` INT(11) NOT NULL,
  `schedule` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `stage_id` (`stage_id` ASC),
  INDEX `band_id` (`band_id` ASC),
  CONSTRAINT `concerts_ibfk_1`
    FOREIGN KEY (`stage_id`)
    REFERENCES `festival`.`stages` (`id`),
  CONSTRAINT `concerts_ibfk_2`
    FOREIGN KEY (`band_id`)
    REFERENCES `festival`.`bands` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `festival`.`employees`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `festival`.`employees` (
  `id` INT(11) NOT NULL,
  `job` VARCHAR(30) NOT NULL,
  `payment` FLOAT NOT NULL,
  `user_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `user_id`),
  UNIQUE INDEX `user_id_UNIQUE` (`user_id` ASC),
  CONSTRAINT `employees_ibfk_1`
    FOREIGN KEY (`user_id`)
    REFERENCES `festival`.`users` (`id`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `festival`.`tickets`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `festival`.`tickets` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `client_id` INT(11) NOT NULL,
  `event_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_ticket_client` (`client_id` ASC),
  INDEX `fk_ticket_event` (`event_id` ASC),
  CONSTRAINT `fk_ticket_event`
    FOREIGN KEY (`event_id`)
    REFERENCES `festival`.`events` (`id`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `fk_tickets_clients1`
    FOREIGN KEY (`client_id`)
    REFERENCES `festival`.`clients` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
