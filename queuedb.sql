-- MySQL Workbench Synchronization
-- Generated: 2017-10-26 13:30
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: Oshan Mudannayake

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `queuedb` DEFAULT CHARACTER SET utf8 ;

CREATE TABLE IF NOT EXISTS `queuedb`.`employee` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(50) NOT NULL,
  `middle_name` VARCHAR(100) NULL DEFAULT NULL,
  `last_name` VARCHAR(50) NOT NULL,
  `nic` VARCHAR(10) NOT NULL,
  `dob` DATETIME NOT NULL,
  `gender` TINYINT(4) NOT NULL,
  `telephone` VARCHAR(10) NOT NULL,
  `address` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `profile_picture` TEXT(1000) NOT NULL,
  `role_id` INT(11) NOT NULL,
  `verified` TINYINT(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  INDEX `fk_employee_role_idx` (`role_id` ASC),
  CONSTRAINT `fk_employee_role`
    FOREIGN KEY (`role_id`)
    REFERENCES `queuedb`.`role` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `queuedb`.`patient` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(50) NOT NULL,
  `middle_name` VARCHAR(100) NULL DEFAULT NULL,
  `last_name` VARCHAR(50) NOT NULL,
  `nic` VARCHAR(10) NOT NULL,
  `dob` DATETIME NOT NULL,
  `gender` TINYINT(4) NOT NULL,
  `telephone` VARCHAR(10) NOT NULL,
  `address` VARCHAR(100) NULL DEFAULT NULL,
  `email` VARCHAR(100) NULL DEFAULT NULL,
  `profile_picture` TEXT(1000) NULL DEFAULT NULL,
  `verified` TINYINT(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `queuedb`.`role` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `description` TEXT(100) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `queuedb`.`employee_login` (
  `employee_id` INT(11) NOT NULL,
  `username` VARCHAR(100) NOT NULL,
  `password` VARCHAR(500) NOT NULL,
  UNIQUE INDEX `username_UNIQUE` (`username` ASC),
  PRIMARY KEY (`employee_id`),
  CONSTRAINT `fk_employee_login_employee1`
    FOREIGN KEY (`employee_id`)
    REFERENCES `queuedb`.`employee` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `queuedb`.`patient_login` (
  `patient_id` INT(11) NOT NULL,
  `username` VARCHAR(100) NOT NULL,
  `password` VARCHAR(500) NOT NULL,
  PRIMARY KEY (`patient_id`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC),
  CONSTRAINT `fk_patient_login_patient1`
    FOREIGN KEY (`patient_id`)
    REFERENCES `queuedb`.`patient` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
