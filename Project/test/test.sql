-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS = @@UNIQUE_CHECKS, UNIQUE_CHECKS = 0;
SET @OLD_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS = 0;
SET @OLD_SQL_MODE = @@SQL_MODE, SQL_MODE = 'TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb`
  DEFAULT CHARACTER SET utf8;
USE `mydb`;

-- -----------------------------------------------------
-- Table `mydb`.`Category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Category` (
  `category_id`   INT         NOT NULL AUTO_INCREMENT,
  `category_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`category_id`)
)
  ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Movies`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Movies` (
  `movie_id`          INT           NOT NULL AUTO_INCREMENT,
  `movie_title`       VARCHAR(45)   NOT NULL,
  `movie_description` VARCHAR(1000) NULL,
  `category_id`       INT           NULL,
  `director_id`       INT           NULL,
  `release_date`      DATE          NULL,
  PRIMARY KEY (`movie_id`),
  CONSTRAINT `category_id`
  FOREIGN KEY (category_id)
  REFERENCES `mydb`.`Category` (category_id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
)
  ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Actors`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Actors` (
  `actor_id`   INT         NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(45) NOT NULL,
  `last_name`  VARCHAR(45) NOT NULL,
  PRIMARY KEY (`actor_id`)
)
  ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Movie_Actors`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Movie_Actors` (
  `movie_id` INT NOT NULL,
  `actor_id` INT NOT NULL,
  PRIMARY KEY (`movie_id`, `actor_id`),
  CONSTRAINT `actor_id`
  FOREIGN KEY ()
  REFERENCES `mydb`.`Actors` ()
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `movie_id`
  FOREIGN KEY ()
  REFERENCES `mydb`.`Movies` ()
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
)
  ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Directors`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Directors` (
  `director_id` INT         NOT NULL AUTO_INCREMENT,
  `first_name`  VARCHAR(45) NOT NULL,
  `last_name`   VARCHAR(45) NOT NULL,
  PRIMARY KEY (`director_id`)
)
  ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Movie_Directors`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Movie_Directors` (
  `director_id` INT NOT NULL,
  `movie_id`    INT NOT NULL,
  PRIMARY KEY (`director_id`, `movie_id`),
  CONSTRAINT `movie_id`
  FOREIGN KEY ()
  REFERENCES `mydb`.`Movies` ()
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `director_id`
  FOREIGN KEY ()
  REFERENCES `mydb`.`Directors` ()
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
)
  ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Reviews`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Reviews` (
  `review_id` INT          NOT NULL AUTO_INCREMENT,
  `movie_id`  INT          NOT NULL,
  `rating`    INT          NOT NULL,
  `review`    VARCHAR(500) NULL,
  PRIMARY KEY (`review_id`),
  CONSTRAINT `movie_id`
  FOREIGN KEY ()
  REFERENCES `mydb`.`Movies` ()
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
)
  ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Renter`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Renter` (
  `renter_id`  INT         NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(45) NOT NULL,
  `last_name`  VARCHAR(45) NOT NULL,
  `email`      VARCHAR(45) NOT NULL,
  `card_no`    INT(16)     NULL,
  PRIMARY KEY (`renter_id`)
)
  ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Movie_Renter`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Movie_Renter` (
  `renter_id`   INT     NOT NULL,
  `movie_id`    INT     NOT NULL,
  `rental_date` DATE    NOT NULL,
  `due_date`    DATE    NOT NULL,
  `returned`    TINYINT NULL,
  PRIMARY KEY (`renter_id`, `movie_id`),
  CONSTRAINT `movie_id`
  FOREIGN KEY ()
  REFERENCES `mydb`.`Movies` ()
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `renter_id`
  FOREIGN KEY ()
  REFERENCES `mydb`.`Renter` ()
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
)
  ENGINE = InnoDB;

