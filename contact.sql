SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `bd_contactes` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `bd_contactes`;

/* CREACIÓ DE LA TAULA USUARI*/
	CREATE TABLE IF NOT EXISTS `tbl_Usuari` (
	  `usu_id` int(11) NOT NULL,
	  `usu_email` varchar(80) NULL,
	  `usu_contra` varchar(30) NULL,
	  `usu_validat` boolean default false
	)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*ASSIGNACIÓ DE CLAU PRIMARIA*/
			ALTER TABLE `tbl_Usuari`
			ADD CONSTRAINT PRIMARY KEY (usu_id);
/* Modificació a autoincremental */
			ALTER TABLE `tbl_Usuari`
			MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT;	
			
/* CREACIÓ DE LA TAULA UBICACIO*/
	CREATE TABLE IF NOT EXISTS `tbl_Ubicacio` (
	  `ubi_id` int(11) NOT NULL,
	  `ubi_latitut` varchar(10) NULL,
	  `ubi_longitut` varchar(10) NULL
	)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*ASSIGNACIÓ DE CLAU PRIMARIA*/
			ALTER TABLE `tbl_Ubicacio`
			ADD CONSTRAINT PRIMARY KEY (ubi_id);
/* Modificació a autoincremental */
			ALTER TABLE `tbl_Ubicacio`
			MODIFY `ubi_id` int(11) NOT NULL AUTO_INCREMENT;	
/* Modificació de la taula ubicacio*/
			ALTER TABLE `tbl_Ubicacio`
			ADD usu_id int(11) NULL;
			
/* CREACIÓ DE LA TAULA CONTACTES*/
	CREATE TABLE IF NOT EXISTS `tbl_Contactes` (
	  `con_id` int(11) NOT NULL,
	  `con_email` varchar(80) NULL,
	  `con_nom` varchar(30) NULL,
	  `con_cognom` varchar(50) NULL,
	  `con_adreça_casa` varchar(90) NULL,
	  `con_adreça_alternativa` varchar(90) NULL,
	  `con_telefon` int (9) NULL,
	  `con_latitut_principal` varchar(30) NULL,
	  `con_longitut_principal` varchar(30) NULL,
	  `con_latitut_alternativa` varchar(30) NULL,
	  `con_longitut_alternativa` varchar(30) NULL
	)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*ASSIGNACIÓ DE CLAU PRIMARIA*/
			ALTER TABLE `tbl_Contactes`
			ADD CONSTRAINT PRIMARY KEY (con_id);
/* Modificació a autoincremental */
			ALTER TABLE `tbl_Contactes`
			MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT;	
/* Modificació de la taula contactes*/
			ALTER TABLE `tbl_Contactes`
			ADD usu_id int(11) NULL;
	
/* RELACIONS BASE DE DADES CONTACTE */	
	/* FK tbl_Contactes PK tbl_usuari */;
		ALTER TABLE `tbl_Contactes`
		ADD CONSTRAINT FOREIGN KEY (usu_id)
		REFERENCES `tbl_Usuari` (usu_id);

	/* FK tbl_Ubicacio PK tbl_usuari */;
		ALTER TABLE `tbl_Ubicacio`
		ADD CONSTRAINT FOREIGN KEY (usu_id)
		REFERENCES `tbl_Usuari` (usu_id);
