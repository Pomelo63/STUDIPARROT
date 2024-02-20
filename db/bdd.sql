DROP DATABASE IF EXISTS $ dbname;

CREATE DATABASE $ dbname;

/*Créer un profil user avec moins de droit*/
CREATE USER if not exists 'basicuser' @'localhost' IDENTIFIED BY 'password';

GRANT
SELECT
  ON *.* TO 'basicuser' @'localhost';

/* Suppression des tables si elles existent */
drop table if exists T_MEMBERS;

drop table if exists T_COMMENTS;

drop table if exists T_PRESTATIONS;

drop table if exists T_CARSFORSALE;

drop table if exists T_INFORMATIONS;

/* Création de la table contenant les membres */
create table T_MEMBERS (
  MEMBER_ID integer primary key auto_increment,
  MEMBER_NAME varchar(100) not null,
  MEMBER_SURNAME varchar(100) not null,
  MEMBER_PASSWORD char(100) not null,
  MEMBER_EMAIL varchar(200) not null unique,
  MEMBER_FUNCTION varchar(100) not null,
  MEMBER_PROFIL varchar(100) not null
) ENGINE = INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

/* Création de la table contenant les commentaires */
create table T_COMMENTS (
  COMMENTS_ID integer primary key auto_increment,
  COMMENTS_DATE datetime not null,
  COMMENTS_AUTEUR varchar(100) not null,
  COMMENTS_CONTENU varchar(500) not null,
  COMMENTS_NOTE int not null,
  COMMENTS_STATUS varchar(100) not null
) ENGINE = INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

/* Création de la table contenant les prestations */
create table T_PRESTATIONS (
  PRESTA_ID integer primary key auto_increment,
  PRESTA_TYPE varchar(100) not null,
  PRESTA_NAME varchar(200) not null
) ENGINE = INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

/* Création de la table contenant les commentaires */
create table T_CARSFORSALE (
  CARSFORSALE_ID integer primary key auto_increment,
  CARSFORSALE_DATE datetime not null,
  CARSFORSALE_REF varchar(100) not null unique,
  CARSFORSALE_MAINIMAGE varchar(255) not null,
  CARSFORSALE_IMAGE varchar(1000) not null,
  CARSFORSALE_TITLE varchar(300) not null,
  CARSFORSALE_PRICE int not null,
  CARSFORSALE_YEAR int not null,
  CARSFORSALE_ENERGY varchar(100) not null,
  CARSFORSALE_KILOMETER int not null,
  CARSFORSALE_COLOR varchar(100) not null,
  CARSFORSALE_GEARSHIFT varchar(100) not null,
  CARSFORSALE_GSTATE varchar(100) not null,
  CARSFORSALE_INFORMATIONS varchar(500) not null
) ENGINE = INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

/* Création de la table contenant les informations du garage*/
create table T_INFORMATIONS (
  INFO_STREET varchar(200) not null,
  INFO_CP integer not null,
  INFO_CITY varchar(100) not null,
  INFO_EMAIL varchar(200) not null,
  INFO_PHONE varchar(100) not null,
  INFO_HOUR varchar(300) not null,
  INFO_NAME varchar(100) not null
) ENGINE = INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;