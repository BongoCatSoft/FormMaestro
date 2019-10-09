/*id , address "rue",ville, province, postal_code*/
insert into locations value (1,"4033 Lynden Road", "Niagara On the lake", "ON", "L0S1J0" );
insert into locations value (2,"218 King George Hwy", "Surrey", "BC", "V3W4E3" );
insert into locations value (3,"1046 Papineau Avenue", "Montreal", "QC", "H2K4J5" );
insert into locations value (4,"1317 7th Ave", "Calgary", "AB", "T2P0W4" );

/*id, titre, categorie , frequence ,debut_rappel ,modalite ,duree , remarque*/
insert into formations value (1,"Initiation à la santé et à la sécurité au travail","Santé et sécurité","A l'embauche","Jour 1","En ligne",1.5,"");
insert into formations value (2,"Formation SIMDUT","Santé et sécurité","Aux 2 ans","Jour 1","En ligne",2,"");
insert into formations value (3,"La sécurité au bureau","Santé et sécurité","Aux 2 ans","Mois 1","En ligne",3,"");
insert into formations value (4,"Glisser, trébucher, tomber","Santé et sécurité","Aux 3 ans","Mois 1","En ligne",2,"");
insert into formations value (5,"Les échelles - en tout sécurité","Santé et sécurité","Aux 2 ans","Mois 1","En ligne",2.5,"");
insert into formations value (6,"Violence en milieu de travail-Sensibilisation","Santé et sécurité","Au 1 an","Mois 1","En ligne",3,"");
insert into formations value (7,"Sensibilisation aux moisissures","Environnement","Aux 2 ans","Mois 3","En ligne",3,"");
insert into formations value (8,"Initiation en ligne – Partie 1","Ressources humaines","A l'embauche","Semaine 1","En ligne",4.5,"");
insert into formations value (9,"Initiation en ligne – Partie 2","Ressources humaines","A l'embauche","Semaine 1","En ligne",4.5,"");
insert into formations value (10,"Cours santé sécurité générale sur la chantiers de contruction (30h ASP)","Santé et sécurité","A l'embauche","Mois 3","Extrne",2,"");
insert into formations value (11,"Secouriste/premiers soins/RCR (2 jours)","Santé et sécurité","Aux 3 ans","Mois 3","Extrne",3,"");
insert into formations value (12,"Halocabures C.S.C","Environnement","Aux 5 ans","Année 1","Extrne",2,"");
insert into formations value (13,"Transport de matières dangereuses","Environnement","Aux 3 ans","Année 1","Extrne",3,"");
insert into formations value (14,"Manipulation de l'amiante","Environnement","Aux 3 ans","Année 1","Extrne",4.5,"");

INSERT INTO `frequences` (`id`, `title`) VALUES (NULL, 'A l\'embauche\r\n'), (NULL, 'Au 1 an\r\n'), (NULL, 'Aux 2 ans\r\n'), (NULL, 'Aux 3 ans\r\n'), (NULL, 'Aux 5 ans\r\n');
