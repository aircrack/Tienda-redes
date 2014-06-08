 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `nueva` ;
CREATE SCHEMA IF NOT EXISTS `nueva` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `nueva` ;

-- -----------------------------------------------------
-- Table `nueva`.`usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nueva`.`usuarios` ;

CREATE TABLE IF NOT EXISTS `nueva`.`usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `contrasena` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nueva`.`venta`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nueva`.`venta` ;

CREATE TABLE IF NOT EXISTS `nueva`.`venta` (
  `id` INT NOT NULL,
  `total` INT NOT NULL,
  `usuarios_id` INT NOT NULL,
  PRIMARY KEY (`id`, `usuarios_id`),
  INDEX `fk_venta_usuarios_idx` (`usuarios_id` ASC),
  CONSTRAINT `fk_venta_usuarios`
    FOREIGN KEY (`usuarios_id`)
    REFERENCES `nueva`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nueva`.`productos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nueva`.`productos` ;

CREATE TABLE IF NOT EXISTS `nueva`.`productos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(45) NOT NULL,
  `categoria` VARCHAR(45) NOT NULL,
  `precio` INT NOT NULL,
  `imagen` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nueva`.`renglon`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nueva`.`renglon` ;

CREATE TABLE IF NOT EXISTS `nueva`.`renglon` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `cantidad` TINYINT NOT NULL,
  `subtotal` INT NOT NULL,
  `venta_id` INT NOT NULL,
  `productos_id` INT NOT NULL,
  PRIMARY KEY (`id`, `venta_id`, `productos_id`),
  INDEX `fk_renglon_venta1_idx` (`venta_id` ASC),
  INDEX `fk_renglon_productos1_idx` (`productos_id` ASC),
  CONSTRAINT `fk_renglon_venta1`
    FOREIGN KEY (`venta_id`)
    REFERENCES `nueva`.`venta` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_renglon_productos1`
    FOREIGN KEY (`productos_id`)
    REFERENCES `nueva`.`productos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
