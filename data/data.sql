SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `FhcsFormTest` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;

CREATE TABLE IF NOT EXISTS `FhcsFormTest`.`product` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `FhcsFormTest`.`order` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `FhcsFormTest`.`freight` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `order_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `order_id`),
  INDEX `fk_freight_order1_idx` (`order_id` ASC),
  CONSTRAINT `fk_freight_order1`
    FOREIGN KEY (`order_id`)
    REFERENCES `FhcsFormTest`.`order` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `FhcsFormTest`.`freight_has_product` (
  `freight_id` INT(11) NOT NULL,
  `product_id` INT(11) NOT NULL,
  PRIMARY KEY (`freight_id`, `product_id`),
  INDEX `fk_freight_has_product_product1_idx` (`product_id` ASC),
  INDEX `fk_freight_has_product_freight1_idx` (`freight_id` ASC),
  CONSTRAINT `fk_freight_has_product_freight1`
    FOREIGN KEY (`freight_id`)
    REFERENCES `FhcsFormTest`.`freight` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_freight_has_product_product1`
    FOREIGN KEY (`product_id`)
    REFERENCES `FhcsFormTest`.`product` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
