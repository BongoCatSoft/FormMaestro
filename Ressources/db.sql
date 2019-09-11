use formmaestro;

CREATE TABLE users (
   id INT AUTO_INCREMENT PRIMARY KEY,
   email VARCHAR(255) NOT NULL,
   password VARCHAR(255) NOT NULL,
   name VARCHAR(255) NOT NULL,
   last_name VARCHAR(255) NOT NULL,
   created DATETIME,
   modified DATETIME
);

Create table employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    name VARCHAR(30) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    user_id INT NOT NULL, /* id du gestionnaire */
    position_id int NOT NULL,
    location_id int not null,
    created DATETIME,
    modified DATETIME
);

Create table formations (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name varchar(255) NOT NULL,
  frequence int not null, /* la fréquence à la quelle la formation doit être faite en mois. 0 veux dire à l'embauche */
  priority varchar(3) NOT NULL, /* la priorité fait référence a la légende dans le fichier excel d'exemple... */
  type varchar(30)  NOT NULL , /* fait référence au type de formation (internet, interne, externe ...)*/
  category varchar(60) NOT NULL , /*la categorie de la formation ex santé et séécurité */
  description varchar(255),
  created DATETIME,
  modified DATETIME
);

create table positions (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name varchar(60) NOT NULL,
  formation_ids blob not null ,
  created DATETIME,
  modified DATETIME
);

create table  locations (
  id INT AUTO_INCREMENT PRIMARY KEY,
  address varchar(255) not null,
  province varchar(35) not null,
  postal_code varchar(7) not null
);

create table preuves (
    id INT AUTO_INCREMENT PRIMARY KEY ,
    nom_original varchar(255) NOT NULL,
    date_fait date,
)

create table formations_emloyee (
  id INT AUTO_INCREMENT PRIMARY KEY ,
  empployee_id INT NOT NULL,
  formation_id INT NOT NULL,
  date_executee date,
  preuve_id INT
);
