-- MySQL Script generated by MySQL Workbench
-- Wed May 10 16:32:00 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema proyecto
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema proyecto
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `proyecto` DEFAULT CHARACTER SET utf8 ;
USE `proyecto` ;

-- -----------------------------------------------------
-- Table `proyecto`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto`.`Usuario` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(20) NULL,
  `apellidos` VARCHAR(35) NULL,
  `correo` VARCHAR(35) NULL,
  `password` VARCHAR(30) NULL,
  `direccion` VARCHAR(50) NULL,
  `salt` VARCHAR(20) NULL,
  `cantTokens` INT NULL,
  `imagen` VARCHAR(80) NULL,
  `telefono` VARCHAR(15) NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE INDEX `correo_UNIQUE` (`correo` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto`.`Objeto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto`.`Objeto` (
  `idObjeto` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(20) NULL,
  `descripcion` VARCHAR(50) NULL,
  `imagen` VARCHAR(50) NULL,
  `calidad` VARCHAR(2) NULL,
  `precio` INT NULL,
  PRIMARY KEY (`idObjeto`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto`.`Caja`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto`.`Caja` (
  `idCaja` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(20) NULL,
  `descripcion` VARCHAR(500) NULL,
  `imagen` VARCHAR(50) NULL,
  `estado` VARCHAR(1) NULL,
  `categoria` VARCHAR(1) NULL,
  `precio` FLOAT NULL,
  PRIMARY KEY (`idCaja`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto`.`Compra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto`.`Compra` (
  `idCompra` INT NOT NULL AUTO_INCREMENT,
  `Usuario_idUsuario` INT NOT NULL,
  `fechaYHora` DATETIME NULL,
  `Cantidad` VARCHAR(45) NULL,
  `Caja_idCaja` INT NOT NULL,
  `Objeto_idObjeto` INT NOT NULL,
  PRIMARY KEY (`idCompra`, `Caja_idCaja`, `Objeto_idObjeto`),
  INDEX `fk_Compra_Usuario_idx` (`Usuario_idUsuario` ASC) ,
  INDEX `fk_Compra_Caja1_idx` (`Caja_idCaja` ASC) ,
  INDEX `fk_Compra_Objeto1_idx` (`Objeto_idObjeto` ASC) ,
  CONSTRAINT `fk_Compra_Usuario`
    FOREIGN KEY (`Usuario_idUsuario`)
    REFERENCES `proyecto`.`Usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Compra_Caja1`
    FOREIGN KEY (`Caja_idCaja`)
    REFERENCES `proyecto`.`Caja` (`idCaja`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Compra_Objeto1`
    FOREIGN KEY (`Objeto_idObjeto`)
    REFERENCES `proyecto`.`Objeto` (`idObjeto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto`.`Objeto_has_Caja`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto`.`Objeto_has_Caja` (
  `Objeto_idObjeto` INT NOT NULL,
  `Caja_idCaja` INT NOT NULL,
  PRIMARY KEY (`Objeto_idObjeto`, `Caja_idCaja`),
  INDEX `fk_Objeto_has_Caja_Caja1_idx` (`Caja_idCaja` ASC) ,
  INDEX `fk_Objeto_has_Caja_Objeto1_idx` (`Objeto_idObjeto` ASC) ,
  CONSTRAINT `fk_Objeto_has_Caja_Objeto1`
    FOREIGN KEY (`Objeto_idObjeto`)
    REFERENCES `proyecto`.`Objeto` (`idObjeto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Objeto_has_Caja_Caja1`
    FOREIGN KEY (`Caja_idCaja`)
    REFERENCES `proyecto`.`Caja` (`idCaja`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto`.`CompraDeToken`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto`.`CompraDeToken` (
  `idCompraToken` INT NOT NULL AUTO_INCREMENT,
  `precio` FLOAT NOT NULL,
  `Usuario_idUsuario` INT NOT NULL,
  PRIMARY KEY (`idCompraToken`, `Usuario_idUsuario`),
  INDEX `fk_CompraDeToken_Usuario1_idx` (`Usuario_idUsuario` ASC) ,
  CONSTRAINT `fk_CompraDeToken_Usuario1`
    FOREIGN KEY (`Usuario_idUsuario`)
    REFERENCES `proyecto`.`Usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto`.`PackToken`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto`.`PackToken` (
  `idPackToken` INT NOT NULL AUTO_INCREMENT,
  `cantidadToken` INT NULL,
  `precio` VARCHAR(45) NULL,
  `enOferta` CHAR NULL,
  `imagen` VARCHAR(80) NULL,
  `porcentajeOf` INT NULL,
  PRIMARY KEY (`idPackToken`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto`.`CompraDeToken_has_PackToken`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto`.`CompraDeToken_has_PackToken` (
  `CompraDeToken_idCompraToken` INT NOT NULL,
  `CompraDeToken_Usuario_idUsuario` INT NOT NULL,
  `PackToken_idPackToken` INT NOT NULL,
  PRIMARY KEY (`CompraDeToken_idCompraToken`, `CompraDeToken_Usuario_idUsuario`, `PackToken_idPackToken`),
  INDEX `fk_CompraDeToken_has_PackToken_PackToken1_idx` (`PackToken_idPackToken` ASC) ,
  INDEX `fk_CompraDeToken_has_PackToken_CompraDeToken1_idx` (`CompraDeToken_idCompraToken` ASC, `CompraDeToken_Usuario_idUsuario` ASC) ,
  CONSTRAINT `fk_CompraDeToken_has_PackToken_CompraDeToken1`
    FOREIGN KEY (`CompraDeToken_idCompraToken` , `CompraDeToken_Usuario_idUsuario`)
    REFERENCES `proyecto`.`CompraDeToken` (`idCompraToken` , `Usuario_idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_CompraDeToken_has_PackToken_PackToken1`
    FOREIGN KEY (`PackToken_idPackToken`)
    REFERENCES `proyecto`.`PackToken` (`idPackToken`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto`.`Inventario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto`.`Inventario` (
  `idInventario` INT NOT NULL AUTO_INCREMENT,
  `Usuario_idUsuario` INT NOT NULL,
  PRIMARY KEY (`idInventario`, `Usuario_idUsuario`),
  INDEX `fk_Inventario_Usuario1_idx` (`Usuario_idUsuario` ASC),
  CONSTRAINT `fk_Inventario_Usuario1`
    FOREIGN KEY (`Usuario_idUsuario`)
    REFERENCES `proyecto`.`Usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto`.`Inventario_has_Objeto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto`.`Inventario_has_Objeto` (
  `Inventario_idInventario` INT NOT NULL,
  `Inventario_Usuario_idUsuario` INT NOT NULL,
  `Objeto_idObjeto` INT NOT NULL,
  PRIMARY KEY (`Inventario_idInventario`, `Inventario_Usuario_idUsuario`, `Objeto_idObjeto`),
  INDEX `fk_Inventario_has_Objeto_Objeto1_idx` (`Objeto_idObjeto` ASC) ,
  INDEX `fk_Inventario_has_Objeto_Inventario1_idx` (`Inventario_idInventario` ASC, `Inventario_Usuario_idUsuario` ASC) ,
  CONSTRAINT `fk_Inventario_has_Objeto_Inventario1`
    FOREIGN KEY (`Inventario_idInventario` , `Inventario_Usuario_idUsuario`)
    REFERENCES `proyecto`.`Inventario` (`idInventario` , `Usuario_idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Inventario_has_Objeto_Objeto1`
    FOREIGN KEY (`Objeto_idObjeto`)
    REFERENCES `proyecto`.`Objeto` (`idObjeto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto`.`metodoPago`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto`.`metodoPago` (
  `token` INT NOT NULL,
  `Usuario_idUsuario` INT NOT NULL,
  PRIMARY KEY (`token`, `Usuario_idUsuario`),
  INDEX `fk_metodoPago_Usuario1_idx` (`Usuario_idUsuario` ASC),
  CONSTRAINT `fk_metodoPago_Usuario1`
    FOREIGN KEY (`Usuario_idUsuario`)
    REFERENCES `proyecto`.`Usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto`.`Enviados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto`.`Enviados` (
  `numEnviados` INT NOT NULL,
  `fecha_Envio` DATE NULL,
  `estadoEnvio` VARCHAR(45) GENERATED ALWAYS AS (CASE WHEN `fecha_Envio` IS NULL THEN 'PENDIENTE' ELSE 'ENVIADO' END) VIRTUAL,
  `Usuario_idUsuario` INT NOT NULL,
  PRIMARY KEY (`numEnviados`, `Usuario_idUsuario`),
  INDEX `fk_Enviados_Usuario1_idx` (`Usuario_idUsuario` ASC) ,
  CONSTRAINT `fk_Enviados_Usuario1`
    FOREIGN KEY (`Usuario_idUsuario`)
    REFERENCES `proyecto`.`Usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto`.`Enviados_has_Objeto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto`.`Enviados_has_Objeto` (
  `Enviados_idEnviados` INT NOT NULL,
  `Objeto_idObjeto` INT NOT NULL,
  PRIMARY KEY (`Enviados_idEnviados`, `Objeto_idObjeto`),
  INDEX `fk_Enviados_has_Objeto_Objeto1_idx` (`Objeto_idObjeto` ASC) ,
  INDEX `fk_Enviados_has_Objeto_Enviados1_idx` (`Enviados_idEnviados` ASC) ,
  CONSTRAINT `fk_Enviados_has_Objeto_Enviados1`
    FOREIGN KEY (`Enviados_idEnviados`)
    REFERENCES `proyecto`.`Enviados` (`numEnviados`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Enviados_has_Objeto_Objeto1`
    FOREIGN KEY (`Objeto_idObjeto`)
    REFERENCES `proyecto`.`Objeto` (`idObjeto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
