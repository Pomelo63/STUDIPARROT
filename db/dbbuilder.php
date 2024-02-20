<?php
if (getenv('JAWSDB_URL') !== false) {
  $dbparts = parse_url(getenv('JAWSDB_URL'));
  $hostname = $dbparts['host'];
  $username = $dbparts['user'];
  $password = $dbparts['pass'];
  $database = ltrim($dbparts['path'], '/');
} else {
  $hostname = 'localhost';
  $database = 'vparrot';
  $username = 'root';
  $password = '';
}
$adminPwd = 'Vparrot+'; // Admin Password
$adminHashedPwd = password_hash($adminPwd, PASSWORD_BCRYPT, array('cost' => 10));

try {
  $dbco = new PDO("mysql:host=$hostname", $username, $password);
  $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "drop DATABASE if exists $dbname;
    CREATE DATABASE $dbname";
  $dbco->exec($sql);

  $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
  $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "
                /*Créer un profil user avec moins de droit*/

                CREATE USER if not exists 'basicuser'@'localhost' IDENTIFIED BY 'password';
                GRANT SELECT ON * . * TO 'basicuser'@'localhost';
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
                ) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;
                
                /* Création de la table contenant les commentaires */
                create table T_COMMENTS (
                  COMMENTS_ID integer primary key auto_increment,
                  COMMENTS_DATE datetime not null,
                  COMMENTS_AUTEUR varchar(100) not null,
                  COMMENTS_CONTENU varchar(500) not null,
                  COMMENTS_NOTE int not null,
                  COMMENTS_STATUS varchar(100) not null
                ) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

                /* Création de la table contenant les prestations */
                create table T_PRESTATIONS (
                  PRESTA_ID integer primary key auto_increment,
                  PRESTA_TYPE varchar(100) not null,
                  PRESTA_NAME varchar(200) not null
                ) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

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
                ) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

                /* Création de la table contenant les informations du garage*/
                create table T_INFORMATIONS (
                  INFO_STREET varchar(200) not null,
                  INFO_CP integer not null,
                  INFO_CITY varchar(100) not null,
                  INFO_EMAIL varchar(200) not null,
                  INFO_PHONE varchar(100) not null,
                  INFO_HOUR varchar(300) not null,
                  INFO_NAME varchar(100) not null
                ) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;
                
                /* Insertion des billets */
                insert into T_MEMBERS(MEMBER_NAME, MEMBER_SURNAME, MEMBER_PASSWORD,MEMBER_EMAIL,MEMBER_FUNCTION,MEMBER_PROFIL) values
                ('Parrot', 'Vincent', '$adminHashedPwd' , 'vparrot@parrot.com', 'admin', 'admin');
                insert into T_MEMBERS(MEMBER_NAME, MEMBER_SURNAME, MEMBER_PASSWORD,MEMBER_EMAIL,MEMBER_FUNCTION,MEMBER_PROFIL) values
                ('Parrot', 'Nadine', 'drop' , 'nparrot@parrot.com', 'admin', 'admin');
                insert into T_MEMBERS(MEMBER_NAME, MEMBER_SURNAME, MEMBER_PASSWORD,MEMBER_EMAIL,MEMBER_FUNCTION,MEMBER_PROFIL) values
                ('Alain', 'George', 'cuculoté' , 'galain@parrot.com', 'admin', 'employé');
                insert into T_PRESTATIONS(PRESTA_TYPE, PRESTA_NAME) values
                ('Mécanique', 'Diagnostique électrique');
                insert into T_PRESTATIONS(PRESTA_TYPE, PRESTA_NAME) values
                ('Entretien', 'Montage pneumatique');
                insert into T_PRESTATIONS(PRESTA_TYPE, PRESTA_NAME) values
                ('Carrosserie', 'Peinture sur mesure');
                insert into T_COMMENTS(COMMENTS_DATE,COMMENTS_AUTEUR,COMMENTS_CONTENU,COMMENTS_NOTE, COMMENTS_STATUS) values
                (Now(),'Kevin','Cool ce garage', 4,'actif');
                insert into T_COMMENTS(COMMENTS_DATE,COMMENTS_AUTEUR,COMMENTS_CONTENU,COMMENTS_NOTE, COMMENTS_STATUS) values
                (Now(),'toto','que des ploucs', 2, 'pending');
                insert into T_COMMENTS(COMMENTS_DATE,COMMENTS_AUTEUR,COMMENTS_CONTENU,COMMENTS_NOTE, COMMENTS_STATUS) values
                (Now(),'monique','très gentil', 3, 'actif');
                insert into T_INFORMATIONS(INFO_STREET,INFO_CP,INFO_CITY,INFO_EMAIL, INFO_PHONE,INFO_HOUR,INFO_NAME) values
                ('3 Rue Pierre Poisson',31000,'TOULOUSE', 'accueil@vparrot.com', '04.72.31.202.20', 'Du lundi au vendredi de 8h45 à 12h et de 14h à 18h. Et le samedi de 8h45 à 12h.','VPARROT');
                insert into T_CARSFORSALE(CARSFORSALE_DATE,CARSFORSALE_REF,CARSFORSALE_MAINIMAGE,CARSFORSALE_IMAGE,CARSFORSALE_TITLE,CARSFORSALE_PRICE,CARSFORSALE_YEAR,CARSFORSALE_ENERGY,CARSFORSALE_KILOMETER,CARSFORSALE_COLOR,CARSFORSALE_GEARSHIFT,CARSFORSALE_GSTATE,CARSFORSALE_INFORMATIONS) values
                (Now(), 'YZREF', 'main.jpeg', 'main.jpeg;juke.jpeg', 'Nissan Juke 2L', '7650', '2015', 'diesel', '120050', 'rouge', 'automatique', 'très bon état', 'radar de recul;attache remorque');
                insert into T_CARSFORSALE(CARSFORSALE_DATE,CARSFORSALE_REF,CARSFORSALE_MAINIMAGE,CARSFORSALE_IMAGE,CARSFORSALE_TITLE,CARSFORSALE_PRICE,CARSFORSALE_YEAR,CARSFORSALE_ENERGY,CARSFORSALE_KILOMETER,CARSFORSALE_COLOR,CARSFORSALE_GEARSHIFT,CARSFORSALE_GSTATE,CARSFORSALE_INFORMATIONS) values
                (Now(), 'YZREF3', 'main.jpeg', 'main.jpeg;juke.jpeg', 'Nissan Juke 2L5', '12650', '2018', 'diesel', '72000', 'rouge', 'automatique', 'très bon état', 'radar de recul;attache remorque');
                insert into T_CARSFORSALE(CARSFORSALE_DATE,CARSFORSALE_REF,CARSFORSALE_MAINIMAGE,CARSFORSALE_IMAGE,CARSFORSALE_TITLE,CARSFORSALE_PRICE,CARSFORSALE_YEAR,CARSFORSALE_ENERGY,CARSFORSALE_KILOMETER,CARSFORSALE_COLOR,CARSFORSALE_GEARSHIFT,CARSFORSALE_GSTATE,CARSFORSALE_INFORMATIONS) values
                (Now(), 'YZREF4', 'main.jpeg', 'main.jpeg;juke.jpeg', 'Nissan Juke 2L', '7650', '2015', 'diesel', '120050', 'rouge', 'automatique', 'très bon état', 'radar de recul;attache remorque');
                insert into T_CARSFORSALE(CARSFORSALE_DATE,CARSFORSALE_REF,CARSFORSALE_MAINIMAGE,CARSFORSALE_IMAGE,CARSFORSALE_TITLE,CARSFORSALE_PRICE,CARSFORSALE_YEAR,CARSFORSALE_ENERGY,CARSFORSALE_KILOMETER,CARSFORSALE_COLOR,CARSFORSALE_GEARSHIFT,CARSFORSALE_GSTATE,CARSFORSALE_INFORMATIONS) values
                (Now(), 'YZREF5', 'main.jpeg', 'main.jpeg;juke.jpeg', 'Nissan Juke 2L5', '12650', '2018', 'diesel', '72000', 'rouge', 'automatique', 'très bon état', 'radar de recul;attache remorque');
                ";


  $dbco->exec($sql);
  echo 'La base de donnée et les différents tables sont créées !';
} catch (PDOException $e) {
  echo "Erreur : " . $e->getMessage();
}
?>
</body>

</html>