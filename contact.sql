SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `bd_contactes` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `bd_contactes`;

/* CREACIÓ DE LA TAULA USUARI*/
	CREATE TABLE IF NOT EXISTS `tbl_Usuari` (
	  `usu_id` int(11) NOT NULL,
	  `usu_email` varchar(80) NULL,
	  `usu_contra` varchar(30) NULL,
	  `usu_validat` boolean default false,
	  `usu_latitut` varchar(25) NULL,
	  `usu_longitut` varchar(25) NULL
	)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*ASSIGNACIÓ DE CLAU PRIMARIA*/
			ALTER TABLE `tbl_Usuari`
			ADD CONSTRAINT PRIMARY KEY (usu_id);
/* Modificació a autoincremental */
			ALTER TABLE `tbl_Usuari`
			MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT;
/*INSERCIO DE DADES A LA TAULA USUARI */
INSERT INTO `tbl_Usuari` (`usu_email`,`usu_contra`)VALUES 
('enric@fje.edu','43c7ccde32edd2953c918c3e0c60578b'),
('david@fje.edu','1c63129ae9db9c60c3e8aa94d3e00495'),
('roger@fje.edu','d74682ee47c3fffd5dcd749f840fcdd4');

/* DADES 
enric@fje.edu - 12qw34er
david@fje.edu - 1qaz2wsx
roger@fje.edu - qwerqwer			
			
/* CREACIÓ DE LA TAULA CONTACTES*/
	CREATE TABLE IF NOT EXISTS `tbl_Contactes` (
	  `con_id` int(11) NOT NULL,
	  `con_email` varchar(80) NULL,
	  `con_nom` varchar(30) NULL,
	  `con_cognom` varchar(50) NULL,
	  `con_adreça_casa` varchar(90) NULL,
	  `con_adreça_alternativa` varchar(90) NULL,
	  `con_telefon` int (9) NULL,
	  `con_latitut_principal` varchar(25) NULL,
	  `con_longitut_principal` varchar(25) NULL,
	  `con_latitut_alternativa` varchar(25) NULL,
	  `con_longitut_alternativa` varchar(25) NULL
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
