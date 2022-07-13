-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema forma
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema forma
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `forma` DEFAULT CHARACTER SET utf8 ;
USE `forma` ;

-- -----------------------------------------------------
-- Table `forma`.`tabuleiro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `forma`.`tabuleiro` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `lado` DOUBLE NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `forma`.`circulo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `forma`.`circulo` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `raio` DOUBLE NULL DEFAULT NULL,
  `cor` VARCHAR(45) NULL DEFAULT NULL,
  `tabuleiro_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_circulo_tabuleiro`
    FOREIGN KEY (`tabuleiro_id`)
    REFERENCES `forma`.`tabuleiro` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `forma`.`quadrado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `forma`.`quadrado` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `lado` DOUBLE NULL DEFAULT NULL,
  `cor` VARCHAR(45) NULL DEFAULT NULL,
  `tabuleiro_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_quadrado_tabuleiro`
    FOREIGN KEY (`tabuleiro_id`)
    REFERENCES `forma`.`tabuleiro` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `forma`.`retangulo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `forma`.`retangulo` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `altura` DOUBLE NULL DEFAULT NULL,
  `base` DOUBLE NULL DEFAULT NULL,
  `cor` VARCHAR(45) NULL DEFAULT NULL,
  `tabuleiro_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_ratangulo_tabuleiro`
    FOREIGN KEY (`tabuleiro_id`)
    REFERENCES `forma`.`tabuleiro` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `forma`.`triangulo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `forma`.`triangulo` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `lado1` DOUBLE NULL DEFAULT NULL,
  `lado2` DOUBLE NULL DEFAULT NULL,
  `lado3` DOUBLE NULL DEFAULT NULL,
  `cor` VARCHAR(45) NULL DEFAULT NULL,
  `tabuleiro_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_triangulo_tabuleiro`
    FOREIGN KEY (`tabuleiro_id`)
    REFERENCES `forma`.`tabuleiro` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `forma`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `forma`.`usuario` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(250) NULL DEFAULT NULL,
  `login` VARCHAR(45) NULL DEFAULT NULL,
  `senha` VARCHAR(250) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `forma`.`cubo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `forma`.`cubo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `cor` VARCHAR(45) NULL,
  `quadrado_id` INT(11) NOT NULL,
  `tabuleiro_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_cubo_quadrado1`
    FOREIGN KEY (`quadrado_id`)
    REFERENCES `forma`.`quadrado` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_cubo_tabuleiro1`
    FOREIGN KEY (`tabuleiro_id`)
    REFERENCES `forma`.`tabuleiro` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
