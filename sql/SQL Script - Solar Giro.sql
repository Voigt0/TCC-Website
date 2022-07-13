-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema solargiro
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema solargiro
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `solargiro` DEFAULT CHARACTER SET utf8 ;
USE `solargiro` ;

-- -----------------------------------------------------
-- Table `solargiro`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `solargiro`.`Usuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `nascimento` DATE NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `telefone` VARCHAR(45) NOT NULL,
  `login` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idusuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `solargiro`.`Dispositivo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `solargiro`.`Dispositivo` (
  `iddispositivo` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `localizacao` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(45) NOT NULL,
  `usuario_idusuario` INT NOT NULL,
  PRIMARY KEY (`iddispositivo`),
  CONSTRAINT `fk_dispositivo_usuario1`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `solargiro`.`usuario` (`idusuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `solargiro`.`Motor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `solargiro`.`Motor` (
  `idmotor` INT NOT NULL AUTO_INCREMENT,
  `estado` VARCHAR(45) NOT NULL,
  `posicaoXY` VARCHAR(45) NOT NULL,
  `posicaoZ` VARCHAR(45) NOT NULL,
  `tempoAuto` VARCHAR(45) NOT NULL,
  `duracaoAuto` VARCHAR(45) NOT NULL,
  `modo` VARCHAR(45) NOT NULL,
  `dispositivo_iddispositivo` INT NOT NULL,
  PRIMARY KEY (`idmotor`),
  CONSTRAINT `fk_motor_dispositivo1`
    FOREIGN KEY (`dispositivo_iddispositivo`)
    REFERENCES `solargiro`.`dispositivo` (`iddispositivo`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `solargiro`.`Bateria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `solargiro`.`Bateria` (
  `idbateria` INT NOT NULL AUTO_INCREMENT,
  `carga` VARCHAR(45) NOT NULL,
  `estado` VARCHAR(45) NOT NULL,
  `temperatura` VARCHAR(45) NOT NULL,
  `informacoes` VARCHAR(45) NOT NULL,
  `dispositivo_iddispositivo` INT NOT NULL,
  PRIMARY KEY (`idbateria`),
  CONSTRAINT `fk_bateria_dispositivo1`
    FOREIGN KEY (`dispositivo_iddispositivo`)
    REFERENCES `solargiro`.`dispositivo` (`iddispositivo`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
