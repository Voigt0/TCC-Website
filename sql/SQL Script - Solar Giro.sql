-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema solargiro
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `solargiro` ;

-- -----------------------------------------------------
-- Schema solargiro
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `solargiro` DEFAULT CHARACTER SET utf8 ;
USE `solargiro` ;

-- -----------------------------------------------------
-- Table `solargiro`.`Usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `solargiro`.`Usuario` ;

CREATE TABLE IF NOT EXISTS `solargiro`.`Usuario` (
  `usuaId` INT NOT NULL AUTO_INCREMENT,
  `usuaNome` VARCHAR(45) NOT NULL,
  `usuaNascimento` DATE NOT NULL,
  `usuaEmail` VARCHAR(45) NOT NULL,
  `usuaTelefone` VARCHAR(45) NOT NULL,
  `usuaLogin` VARCHAR(45) NOT NULL,
  `usuaSenha` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`usuaId`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `solargiro`.`Dispositivo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `solargiro`.`Dispositivo` ;

CREATE TABLE IF NOT EXISTS `solargiro`.`Dispositivo` (
  `dispId` INT NOT NULL AUTO_INCREMENT,
  `dispNome` VARCHAR(45) NOT NULL,
  `dispLocalizacao` VARCHAR(45) NOT NULL,
  `dispDescricao` VARCHAR(45) NOT NULL,
  `dispositivo_usuaId` INT NOT NULL,
  PRIMARY KEY (`dispId`),
  CONSTRAINT `fk_dispositivo_usuario1`
    FOREIGN KEY (`dispositivo_usuaId`)
    REFERENCES `solargiro`.`Usuario` (`usuaId`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `solargiro`.`Motor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `solargiro`.`Motor` ;

CREATE TABLE IF NOT EXISTS `solargiro`.`Motor` (
  `motoId` INT NOT NULL AUTO_INCREMENT,
  `motoEstado` BOOLEAN NOT NULL,
  `motoDescricao` VARCHAR(45) NOT NULL,
  `motoPosicaoXY` VARCHAR(45) NOT NULL,
  `motoPosicaoZ` VARCHAR(45) NOT NULL,
  `motor_dispId` INT NOT NULL,
  PRIMARY KEY (`motoId`),
  CONSTRAINT `fk_motor_dispositivo1`
    FOREIGN KEY (`motor_dispId`)
    REFERENCES `solargiro`.`Dispositivo` (`dispId`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `solargiro`.`Bateria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `solargiro`.`Bateria` ;

CREATE TABLE IF NOT EXISTS `solargiro`.`Bateria` (
  `bateId` INT NOT NULL AUTO_INCREMENT,
  `bateEstado` BOOLEAN NOT NULL,
  `bateDescricao` VARCHAR(45) NOT NULL,
  `bateCarga` INT NOT NULL,
  `bateTemperatura` DECIMAL(6,2) NOT NULL,
  `bateria_dispId` INT NOT NULL,
  PRIMARY KEY (`bateId`),
  CONSTRAINT `fk_bateria_dispositivo1`
    FOREIGN KEY (`bateria_dispId`)
    REFERENCES `solargiro`.`Dispositivo` (`dispId`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


-- -----------------------------------------------------
-- Insert de informações
-- -----------------------------------------------------

INSERT INTO `solargiro`.`Usuario` (`usuaNome`, `usuaNascimento`, `usuaEmail`, `usuaTelefone`, `usuaLogin`, `usuaSenha`) VALUES ('Rodrigo Voigt Filho', '2005-06-28', 'voigtrodrigo0@gmail.com', '47 991435452', 'voigt0', 'teste');
INSERT INTO `solargiro`.`Usuario` (`usuaNome`, `usuaNascimento`, `usuaEmail`, `usuaTelefone`, `usuaLogin`, `usuaSenha`) VALUES ('Larissa Schmitz', '2005-01-27', 'larissaschmitz@gmail.com', '47 995425224', 'issa27', '432424');
INSERT INTO `solargiro`.`Usuario` (`usuaNome`, `usuaNascimento`, `usuaEmail`, `usuaTelefone`, `usuaLogin`, `usuaSenha`) VALUES ('Pedro de Paula Ujj', '2005-03-04', 'pequenoujj@gmail.com', '47 920014785', 'ujjGamer', 'vailanternaverde');

INSERT INTO `solargiro`.`Dispositivo` (`dispNome`, `dispLocalizacao`, `dispDescricao`, `dispositivo_usuaId`) VALUES ('placa-01', '-27.1856645,-49.622495', 'Placa em Rio do Sul', '2');
INSERT INTO `solargiro`.`Dispositivo` (`dispNome`, `dispLocalizacao`, `dispDescricao`, `dispositivo_usuaId`) VALUES ('placa-45', '-24.777403, -50.254407', 'Placa em Carambeí', '1');
INSERT INTO `solargiro`.`Dispositivo` (`dispNome`, `dispLocalizacao`, `dispDescricao`, `dispositivo_usuaId`) VALUES ('placa-03', '-5.174109, -41.784541', 'Placa em Piauí', '3');

INSERT INTO `solargiro`.`Motor` (`motoEstado`, `motoPosicaoXY`, `motoPosicaoZ`, `motor_dispId`) VALUES ('1', '180', '30', '1');
INSERT INTO `solargiro`.`Motor` (`motoEstado`, `motoPosicaoXY`, `motoPosicaoZ`, `motor_dispId`) VALUES ('0', '60', '60', '3');
INSERT INTO `solargiro`.`Motor` (`motoEstado`, `motoPosicaoXY`, `motoPosicaoZ`, `motor_dispId`) VALUES ('1', '90', '45', '2');
