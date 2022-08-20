-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema id19423084_solargiro
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema id19423084_solargiro
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `id19423084_solargiro` DEFAULT CHARACTER SET utf8 ;
USE `id19423084_solargiro` ;

-- -----------------------------------------------------
-- Table `id19423084_solargiro`.`Usuario`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `id19423084_solargiro`.`Usuario` (
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
-- Table `id19423084_solargiro`.`Dispositivo`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `id19423084_solargiro`.`Dispositivo` (
  `dispId` INT(11) NOT NULL AUTO_INCREMENT,
  `dispApiKey` VARCHAR(17) NOT NULL,
  `dispNome` VARCHAR(45) NOT NULL,
  `dispLatitude` DECIMAL(9,7) NOT NULL,
  `dispLongitude` DECIMAL(10,7) NOT NULL,
  `dispDescricao` VARCHAR(45) NOT NULL,
  `dispEstado` TINYINT(1) NOT NULL,
  `dispUltimaAlteracao` VARCHAR(45) NOT NULL,
  `dispositivo_usuaId` INT(11) NOT NULL,
  PRIMARY KEY (`dispId`),
  CONSTRAINT `fk_dispositivo_usuario1`
    FOREIGN KEY (`dispositivo_usuaId`)
    REFERENCES `id19423084_solargiro`.`usuario` (`usuaId`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `id19423084_solargiro`.`Bateria`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `id19423084_solargiro`.`Bateria` (
  `bateId` INT(11) NOT NULL AUTO_INCREMENT,
  `bateCarga` INT(11) NOT NULL,
  `bateTemperatura` DECIMAL(6,2) NOT NULL,
  `bateria_dispId` INT(11) NOT NULL,
  PRIMARY KEY (`bateId`),
  CONSTRAINT `fk_bateria_dispositivo1`
    FOREIGN KEY (`bateria_dispId`)
    REFERENCES `id19423084_solargiro`.`dispositivo` (`dispId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `id19423084_solargiro`.`Motor`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `id19423084_solargiro`.`Motor` (
  `motoId` INT(11) NOT NULL AUTO_INCREMENT,
  `motoPosicaoXY` VARCHAR(45) NOT NULL,
  `motoPosicaoZ` VARCHAR(45) NOT NULL,
  `motor_dispId` INT(11) NOT NULL,
  PRIMARY KEY (`motoId`),
  CONSTRAINT `fk_motor_dispositivo1`
    FOREIGN KEY (`motor_dispId`)
    REFERENCES `id19423084_solargiro`.`dispositivo` (`dispId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
