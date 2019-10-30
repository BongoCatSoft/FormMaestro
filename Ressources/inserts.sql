/*id , address "rue",ville, province, postal_code*/
INSERT INTO `civilitees` (`id`, `civilite`) VALUES
(1, 'Mr'),
(2, 'Mme');

INSERT INTO `languages` (`id`, `langue`) VALUES
(1, 'Français'),
(2, 'Anglais');

INSERT INTO `locations` (`id`, `address`, `province`, `postal_code`) VALUES
(1, "1040 rue de l'avenir, Laval", 'QC', 'I4K 3G4'),
(2, "475 Boulevard de l'Avenir, Laval", 'QC', 'H7N 5H9'),
(3,"4033 Lynden Road, Niagara On the lake", "ON", "L0S1J0" ),
(4,"218 King George Hwy, Surrey", "BC", "V3W4E3" ),
(5,"1046 Papineau Avenue, Montreal", "QC", "H2K4J5"),
(6,"1317 7th Ave, Calgary", "AB", "T2P0W4" );

INSERT INTO `positions` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Programmeur', '2019-10-01 22:52:17', '2019-10-01 22:52:17'),
(2, 'Testeur', '2019-10-01 22:52:21', '2019-10-01 22:52:21');

INSERT INTO `frequences` (`id`, `title`) VALUES
(NULL, "A l'embauche"),
(NULL, "Au 1 an"),
(NULL, "Aux 2 ans"),
(NULL, "Aux 3 ans"),
(NULL, "Aux 5 ans");

insert into modalities (id, title) VALUES
(1, 'En Ligne'),
(2, 'Externe');

insert into reminders (id, title) VALUES
(1, "Jour 1"),
(2, "Semaine 1"),
(3, "Mois 1"),
(4, "Mois 3"),
(5, "Années 1");

INSERT INTO `employees` (`id`, `employee_number`, `civilite_id`, `name`, `last_name`, `language_id`, `cellphone`, `user_id`, `email`, `position_id`, `location_id`, `extra_infos`, `formation_plan_last_sent`, `active`, `created`, `modified`) VALUES
(1, '4455', 1, 'Jean', 'Francois', 1, 50, NULL, 'JeanFrancois@bongocatsoft.ca', 1, 1, NULL, '2018-03-16 16:17:00', 0, '2019-10-01 22:58:08', '2019-10-02 19:10:11'),
(2, '85', 2, 'Michael', 'Dagenais', 1, NULL, NULL, 'MichaelDagenais@bongocatsoft.ca', 2, 1, NULL, '2014-11-22 21:21:00', 1, '2019-10-02 02:43:16', '2019-10-02 02:43:16');

INSERT INTO users (`id`, `email`, `password`, `name`, `last_name`, `employee_id`, `created`, `modified`, `role`) VALUES
(3, 'Yanick@bongocatsoft.ca', '$2y$10$sAARY0FMFAuXkt0d5nmzQ.UDM6SdiF0qV.t10LTeP3vY9UP34uYhK', 'Yanick', 'Valiquette', NULL, '2019-09-30 20:08:32', '2019-09-30 20:08:32', 0),
(4, 'David@bongocatsoft.ca', '$2y$10$ILw5ybHw1xe5jynnQFEzAOYtP7wjrcDEySX8KHAw2Iyd8uO7V1oU.', 'David', 'Ringuet', NULL, '2019-09-30 20:09:37', '2019-09-30 20:09:37', 0),
(5, 'Pascal@bongocatsoft.ca', '$2y$10$Di3hH8Is3P0tq1gKaEhu9OuNClhjFWoMPRsGilJJdIspQOs/E/fwe', 'Pascal', 'Raymond', NULL, '2019-09-30 20:13:00', '2019-09-30 20:13:00', 0),
(6, 'admin@bongocatsoft.ca', '$2y$10$7poq5YbcE7MV6GQ616gOPOai/vpi71N.L1btn/DI0FoTPDqlDsJym', 'admin', 'admin', NULL, '2019-10-01 01:44:05', '2019-10-01 01:57:11', 1);


/*id, titre, categorie , frequence ,debut_rappel ,modalite ,duree , remarque*/
insert into formations(id, titre, categorie, frequence_id, reminder_id, modality_id, duree, remarque) values
                    (1,"Initiation à la santé et à la sécurité au travail","Santé et sécurité",1,1,1,1.5,""),
                    (2,"Formation SIMDUT","Santé et sécurité",3,1,1,2,""),
                    (3,"La sécurité au bureau","Santé et sécurité",3,3,1,3,""),
                    (4,"Glisser, trébucher, tomber","Santé et sécurité",4,3,1,2,""),
                    (5,"Les échelles - en tout sécurité","Santé et sécurité",3,3,1,2.5,""),
                    (6,"Violence en milieu de travail-Sensibilisation","Santé et sécurité",2,3,1,3,""),
                    (7,"Sensibilisation aux moisissures","Environnement",3,4,1,3,""),
                    (8,"Initiation en ligne – Partie 1","Ressources humaines",1,2,1,4.5,""),
                    (9,"Initiation en ligne – Partie 2","Ressources humaines",1,2,1,4.5,""),
                    (10,"Cours santé sécurité générale sur la chantiers de contruction (30h ASP)","Santé et sécurité",1,4,2,2,""),
                    (11,"Secouriste/premiers soins/RCR (2 jours)","Santé et sécurité",4,4,2,3,""),
                    (12,"Halocabures C.S.C","Environnement",5,5,2,2,""),
                    (13,"Transport de matières dangereuses","Environnement",4,5,2,3,""),
                    (14,"Manipulation de l'amiante","Environnement",4,5,2,4.5,"");


INSERT INTO `formations_employee` (`id`, `employee_id`, `formation_id`, `date_executee`, `proof_id`) VALUES
(2, 1, 1, '2019-10-01', NULL);

INSERT INTO `formations_position` (`id`, `position_id`, `formation_id`, `status_formation`) VALUES
(1, 1, 4, 'R');
