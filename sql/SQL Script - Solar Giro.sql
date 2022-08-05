-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema Solargiro
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `Solargiro` ;

-- -----------------------------------------------------
-- Schema Solargiro
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Solargiro` DEFAULT CHARACTER SET utf8 ;
USE `Solargiro` ;

-- -----------------------------------------------------
-- Table `Solargiro`.`Usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Solargiro`.`Usuario` ;

CREATE TABLE IF NOT EXISTS `Solargiro`.`Usuario` (
  `usuaId` INT(11) NOT NULL AUTO_INCREMENT,
  `usuaNome` VARCHAR(45) NOT NULL,
  `usuaEmail` VARCHAR(45) NOT NULL,
  `usuaTelefone` VARCHAR(45) NOT NULL,
  `usuaSenha` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`usuaId`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `Solargiro`.`Dispositivo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Solargiro`.`Dispositivo` ;

CREATE TABLE IF NOT EXISTS `Solargiro`.`Dispositivo` (
  `dispId` INT(11) NOT NULL AUTO_INCREMENT,
  `dispNome` VARCHAR(45) NOT NULL,
  `dispLatitude` DECIMAL(9,7) NOT NULL,
  `dispLongitude` DECIMAL(10,7) NOT NULL,
  `dispDescricao` VARCHAR(45) NOT NULL,
  `dispositivo_usuaId` INT(11) NOT NULL,
  PRIMARY KEY (`dispId`),
  INDEX `fk_dispositivo_usuario1` (`dispositivo_usuaId` ASC) VISIBLE,
  CONSTRAINT `fk_dispositivo_usuario1`
    FOREIGN KEY (`dispositivo_usuaId`)
    REFERENCES `Solargiro`.`Usuario` (`usuaId`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `Solargiro`.`Bateria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Solargiro`.`Bateria` ;

CREATE TABLE IF NOT EXISTS `Solargiro`.`Bateria` (
  `bateId` INT(11) NOT NULL AUTO_INCREMENT,
  `bateEstado` TINYINT(1) NOT NULL,
  `bateDescricao` VARCHAR(45) NOT NULL,
  `bateCarga` INT(11) NOT NULL,
  `bateTemperatura` DECIMAL(6,2) NOT NULL,
  `bateria_dispId` INT(11) NOT NULL,
  PRIMARY KEY (`bateId`),
  INDEX `fk_bateria_dispositivo1` (`bateria_dispId` ASC) VISIBLE,
  CONSTRAINT `fk_bateria_dispositivo1`
    FOREIGN KEY (`bateria_dispId`)
    REFERENCES `Solargiro`.`Dispositivo` (`dispId`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `Solargiro`.`Motor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Solargiro`.`Motor` ;

CREATE TABLE IF NOT EXISTS `Solargiro`.`Motor` (
  `motoId` INT(11) NOT NULL AUTO_INCREMENT,
  `motoEstado` TINYINT(1) NOT NULL,
  `motoDescricao` VARCHAR(45) NOT NULL,
  `motoPosicaoXY` VARCHAR(45) NOT NULL,
  `motoPosicaoZ` VARCHAR(45) NOT NULL,
  `motor_dispId` INT(11) NOT NULL,
  PRIMARY KEY (`motoId`),
  INDEX `fk_motor_dispositivo1` (`motor_dispId` ASC) VISIBLE,
  CONSTRAINT `fk_motor_dispositivo1`
    FOREIGN KEY (`motor_dispId`)
    REFERENCES `Solargiro`.`Dispositivo` (`dispId`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
