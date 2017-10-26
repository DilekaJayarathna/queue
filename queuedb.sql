-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema queuedb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema queuedb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `queuedb` DEFAULT CHARACTER SET utf8 ;
USE `queuedb` ;

-- -----------------------------------------------------
-- Table `queuedb`.`role`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `queuedb`.`role` ;

CREATE TABLE IF NOT EXISTS `queuedb`.`role` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `description` TEXT(100) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `queuedb`.`employee`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `queuedb`.`employee` ;

CREATE TABLE IF NOT EXISTS `queuedb`.`employee` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(50) NOT NULL,
  `middle_name` VARCHAR(100) NULL,
  `last_name` VARCHAR(50) NOT NULL,
  `nic` VARCHAR(10) NOT NULL,
  `dob` DATETIME NOT NULL,
  `gender` TINYINT NOT NULL,
  `telephone` VARCHAR(10) NOT NULL,
  `address` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `profile_picture` TEXT(1000) NOT NULL,
  `role_id` INT NOT NULL,
  `verified` TINYINT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_employee_role`
    FOREIGN KEY (`role_id`)
    REFERENCES `queuedb`.`role` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_employee_role_idx` ON `queuedb`.`employee` (`role_id` ASC);


-- -----------------------------------------------------
-- Table `queuedb`.`patient`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `queuedb`.`patient` ;

CREATE TABLE IF NOT EXISTS `queuedb`.`patient` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(50) NOT NULL,
  `middle_name` VARCHAR(100) NULL,
  `last_name` VARCHAR(50) NOT NULL,
  `nic` VARCHAR(10) NOT NULL,
  `dob` DATETIME NOT NULL,
  `gender` TINYINT NOT NULL,
  `telephone` VARCHAR(10) NOT NULL,
  `address` VARCHAR(100) NULL,
  `email` VARCHAR(100) NULL,
  `profile_picture` TEXT(1000) NULL,
  `verified` TINYINT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
