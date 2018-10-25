ALTER TABLE `db_clinica`.`persona` 
CHANGE COLUMN `IdResponsable` `NombresResponsable` VARCHAR(100) NULL DEFAULT NULL COMMENT 'Es el identificador del responsable (en caso de que sea menor de edad)' AFTER `Categoria`,
ADD COLUMN `ApellidosResponsable` VARCHAR(100) NULL AFTER `NombresResponsable`,
ADD COLUMN `Parentesco` VARCHAR(45) NULL AFTER `ApellidosResponsable`,
ADD COLUMN `DuiResponsable` VARCHAR(45) NULL AFTER `Parentesco`;


