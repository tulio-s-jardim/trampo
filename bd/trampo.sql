-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema trampo
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema trampo
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `trampo`;
CREATE SCHEMA IF NOT EXISTS `trampo` DEFAULT CHARACTER SET utf8 ;
USE `trampo` ;

-- -----------------------------------------------------
-- Table `trampo`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `trampo`.`categoria` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `trampo`.`conta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `trampo`.`conta` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `sobrenome` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(255) NOT NULL,
  `celular` VARCHAR(11) NOT NULL,
  `cep` VARCHAR(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `trampo`.`publicacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `trampo`.`publicacao` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `conta_id` INT(10) UNSIGNED NOT NULL,
  `categoria_id` INT(10) UNSIGNED NOT NULL,
  `titulo` VARCHAR(45) NOT NULL,
  `descricao` TEXT NOT NULL,
  `status` TINYINT(3) UNSIGNED NOT NULL DEFAULT 0,
  `nota` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_publicacao_categoria1_idx` (`categoria_id` ASC),
  INDEX `fk_publicacao_conta1_idx` (`conta_id` ASC),
  CONSTRAINT `fk_publicacao_categoria1`
    FOREIGN KEY (`categoria_id`)
    REFERENCES `trampo`.`categoria` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_publicacao_conta1`
    FOREIGN KEY (`conta_id`)
    REFERENCES `trampo`.`conta` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `trampo`.`respostas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `trampo`.`respostas` (
  `conta_id` INT(10) UNSIGNED NOT NULL,
  `publicacao_id` INT(10) UNSIGNED NOT NULL,
  `visualizado` TINYINT NOT NULL DEFAULT 0,
  `nota` INT(10) NULL,
  PRIMARY KEY (`conta_id`, `publicacao_id`),
  INDEX `fk_conta_has_publicacao1_publicacao1_idx` (`publicacao_id` ASC),
  INDEX `fk_conta_has_publicacao1_conta1_idx` (`conta_id` ASC),
  CONSTRAINT `fk_conta_has_publicacao1_conta1`
    FOREIGN KEY (`conta_id`)
    REFERENCES `trampo`.`conta` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_conta_has_publicacao1_publicacao1`
    FOREIGN KEY (`publicacao_id`)
    REFERENCES `trampo`.`publicacao` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
