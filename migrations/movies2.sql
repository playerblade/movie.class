-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema movies
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema movies
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `movies` DEFAULT CHARACTER SET utf8 ;
USE `movies` ;

-- -----------------------------------------------------
-- Table `movies`.`category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `movies`.`category` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 13
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `movies`.`country`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `movies`.`country` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `country_name` VARCHAR(50) NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `movies`.`user`
(
  id INT(11) PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(30) NULL DEFAULT NULL ,
  login VARCHAR(30) NULL DEFAULT NULL ,
  password VARCHAR(70) NULL DEFAULT NULL ,
  allow TINYINT(1) NULL DEFAULT NULL ,
  deleted_at TIMESTAMP NULL DEFAULT NULL,
  UNIQUE INDEX `login_deleted_at` (`login`,`deleted_at`)
);

INSERT INTO user(name,login,password,allow)
VALUES ('admin','admin','d033e22ae348aeb5660fc2140aec35850c4da997',1);


INSERT INTO user(name,login,password,allow)
VALUES ('raul','raul','8b52b6b714585648fd300da0dbc0fa0678553280',1);

-- -----------------------------------------------------
-- Table `movies`.`forum`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `movies`.`forum` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NULL DEFAULT NULL,
  `message` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `movies`.`movie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `movies`.`movie` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NULL DEFAULT NULL,
  `duration` TIME NULL DEFAULT NULL,
  `description` TEXT NULL DEFAULT NULL,
  `age` INT(11) NULL DEFAULT NULL,
  `year` YEAR(4) NULL DEFAULT NULL,
  `image` VARCHAR(50) NULL DEFAULT NULL,
  `trailer` VARCHAR(50) NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `movies`.`movie_category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `movies`.`movie_category` (
  `movie_id` INT(11) NULL DEFAULT NULL,
  `category_id` INT(11) NULL DEFAULT NULL,
  UNIQUE INDEX `movie_id_category_id` (`movie_id` ASC, `category_id` ASC),
  INDEX `FK_category` (`category_id` ASC),
  INDEX `movie_id` (`movie_id` ASC),
  CONSTRAINT `FK_category`
    FOREIGN KEY (`category_id`)
    REFERENCES `movies`.`category` (`id`),
  CONSTRAINT `FK_movie`
    FOREIGN KEY (`movie_id`)
    REFERENCES `movies`.`movie` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `movies`.`person`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `movies`.`person` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NULL DEFAULT NULL,
  `lastname` VARCHAR(50) NULL DEFAULT NULL,
  `age` INT(11) NULL DEFAULT NULL,
  `gender` VARCHAR(50) NULL DEFAULT NULL,
  `country` VARCHAR(50) NULL DEFAULT NULL,
  `description` TEXT NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  `country_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `country_id`),
  INDEX `fk_person_country1_idx` (`country_id` ASC),
  CONSTRAINT `fk_person_country1`
    FOREIGN KEY (`country_id`)
    REFERENCES `movies`.`country` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `movies`.`testCamelCase`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `movies`.`testCamelCase` (
  `CamelCaseColumn` INT(11) NULL DEFAULT NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
