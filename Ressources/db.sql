use formmaestro;

CREATE TABLE users (
   id INT AUTO_INCREMENT PRIMARY KEY,
   email VARCHAR(255) NOT NULL,
   password VARCHAR(255) NOT NULL,
   name VARCHAR(255) NOT NULL,
   last_name VARCHAR(255) NOT NULL,
   employee_id INT, /* profil de l'employée gestionnaire relié a ce profil administratif*/
   created DATETIME,
   modified DATETIME
);


/*Create table formations (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name varchar(255) NOT NULL,
  frequence int not null, /* la fréquence à la quelle la formation doit être faite en mois. 0 veux dire à l'embauche */
 /* priority varchar(3) NOT NULL, /* la priorité fait référence a la légende dans le fichier excel d'exemple... */
  /*type varchar(30)  NOT NULL , /* fait référence au type de formation (internet, interne, externe ...)*/
 /* category varchar(60) NOT NULL , /*la categorie de la formation ex santé et séécurité */
 /* description varchar(255),
  created DATETIME,
  modified DATETIME
);*/

CREATE TABLE formations (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `frequence` varchar(255) NOT NULL,
  `debut_rappel` varchar(255) NOT NULL,
  `modalite` varchar(255) NOT NULL,
  `duree` int(10) NOT NULL,
  `remarque` varchar(255) DEFAULT NULL
);

create table positions (
  id INT AUTO_INCREMENT PRIMARY KEY,
  titre varchar(60) NOT NULL,
  created DATETIME,
  modified DATETIME
);

create table  locations (
  id INT AUTO_INCREMENT PRIMARY KEY,
  address varchar(255) not null,
  province varchar(35) not null,
  postal_code varchar(7) not null
);

create table formations_emloyee (
  id INT AUTO_INCREMENT PRIMARY KEY ,
  empployee_id INT NOT NULL,
  formation_id INT NOT NULL,
  date_executee date,
  preuve_id INT
);

create table formations_position (
    id INT AUTO_INCREMENT PRIMARY KEY ,
    poste_id INT NOT NULL,
    formation_id INT NOT NULL,
    status_formation varchar(20),
    preuve_id INT
);

create table preuves (
    id INT AUTO_INCREMENT PRIMARY KEY,
    original_file_name varchar(255) not null ,
    upload_date DATETIME
);

Create table langues (
   id INT AUTO_INCREMENT PRIMARY KEY,
   langue varchar(20)
);

Create table employees (
   id INT AUTO_INCREMENT PRIMARY KEY,
   employee_number varchar(10),
   civilite_id int not null,
   name VARCHAR(30) NOT NULL,
   last_name VARCHAR(30) NOT NULL,
   language_id int NOT NULL,
   cellphone int(10),
   employee_id INT , /* id du gestionnaire */
   email VARCHAR(255) NOT NULL,
   position_id int NOT NULL,
   location_id int not null,
   extra_infos blob,
   formation_plan_last_sent DATETIME, /*date du dernier envoi du plan de formation. Si vide plan jamais envoyé*/
   active bool, /*is employee active ??*/
   created DATETIME,
   modified DATETIME
);

create table civilites
(
    id int auto_increment
        primary key,
    civilite varchar(25) not null
);

CREATE DATABASE `formmaestro` /*!40100 DEFAULT CHARACTER SET utf8 */



