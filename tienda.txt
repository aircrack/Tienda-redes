--BD


SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `tienda-php` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `tienda-php` ;

-- -----------------------------------------------------
-- Table `tienda-php`.`usuarios`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tienda-php`.`usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(50) NOT NULL ,
  `contrasena` VARCHAR(50) NULL ,
  `email` VARCHAR(50) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tienda-php`.`produtos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tienda-php`.`produtos` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `descripcion` VARCHAR(100) NULL ,
  `categoria` VARCHAR(100) NULL ,
  `precio` VARCHAR(50) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tienda-php`.`renglon`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tienda-php`.`renglon` (
  `id` INT NOT NULL ,
  `cantidad` DOUBLE NOT NULL ,
  `subtotal` DOUBLE NULL ,
  `usuarios_id` INT NOT NULL ,
  `produtos_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_ventas_usuarios` (`usuarios_id` ASC) ,
  INDEX `fk_ventas_produtos1` (`produtos_id` ASC) ,
  CONSTRAINT `fk_ventas_usuarios`
    FOREIGN KEY (`usuarios_id` )
    REFERENCES `tienda-php`.`usuarios` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ventas_produtos1`
    FOREIGN KEY (`produtos_id` )
    REFERENCES `tienda-php`.`produtos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tienda-php`.`venta`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tienda-php`.`venta` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `total` DOUBLE NOT NULL ,
  `usuarios_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_venta_usuarios1` (`usuarios_id` ASC) ,
  CONSTRAINT `fk_venta_usuarios1`
    FOREIGN KEY (`usuarios_id` )
    REFERENCES `tienda-php`.`usuarios` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
