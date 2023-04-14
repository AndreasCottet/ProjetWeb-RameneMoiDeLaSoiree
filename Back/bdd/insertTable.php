<?php
include_once('connectBDD.php');

$creation ="insert into EVENEMENT (NOM) VALUES('Soirée étudiante');";

$creation .="insert into ZONE (NOM) VALUES('Campus');";

// $creation .="
// create table COMMENTAIRE_TRAJET (
//     ID_COMMENTAIRE_TRAJET number(5) primary key auto_increment,
//     ID_ETUDIANT number(3) not null,
//     ID_TRAJET number(3) not null,
//     MESSAGE varchar(400) not null,
//     foreign key (ID_ETUDIANT) references ETUDIANT(ID_ETUDIANT),
//     foreign key (ID_TRAJET) references TRAJET(ID_TRAJET)
// );"

// $creation .="
// create table EVALUATION_TRAJET (
//     ID_EVALUATION_TRAJET number(5) primary key auto_increment,
//     ID_ETUDIANT number(3) not null,
//     ID_TRAJET number(3) not null,
//     MESSAGE varchar(400) not null,
//     NOTE decimal(2,1) not null,
//     foreign key (ID_ETUDIANT) references ETUDIANT(ID_ETUDIANT),
//     foreign key (ID_TRAJET) references TRAJET(ID_TRAJET)
// );"

$creation .="insert into ETUDIANT (NOM, PRENOM, EMAIL, PASSWORD, TELEPHONE) VALUES ('COTTET', 'Andréas', 'andrecot2502@gmail.com', 'andreas', 0600000000);";

$creation .="insert into ETUDIANT (NOM, PRENOM, EMAIL, PASSWORD, TELEPHONE, SEXE) VALUES ('DOCOUTO', 'Lilian', 'liliandocouto63@gmail.com', 'lilian', 0600000000);";

// $creation .="
// create table TRAJET (
//     ID_TRAJET number(3) primary key auto_increment,
//     ID_CONDUCTEUR number(3) not null,
//     ID_ZONE_DEPART number(3) not null,
//     LIEU_DEPART varchar2(50) not null,
//     ID_ZONE_ARRIVEE number(3) not null,
//     LIEU_ARRIVEE varchar2(50) not null,
//     DATE_DEPART date not null,
//     FOREIGN KEY (ID_CONDUCTEUR) REFERENCES ETUDIANT(ID_ETUDIANT),
//     FOREIGN KEY (ID_ZONE_DEPART) REFERENCES ZONE(ID_ZONE),
//     FOREIGN KEY (ID_ZONE_ARRIVEE) REFERENCES ZONE(ID_ZONE)
// );"

// $creation="
// create table INSCRIPTION_TRAJET (
//     ID_TRAJET number(3) primary key auto_increment,
//     ID_CONDUCTEUR number(3) not null,
//     ID_ZONE_DEPART number(3) not null,
//     LIEU_DEPART varchar2(50) not null,
//     ID_ZONE_ARRIVEE number(3) not null,
//     LIEU_ARRIVEE varchar2(50) not null,
//     DATE_DEPART date not null,
//     FOREIGN KEY (ID_CONDUCTEUR) REFERENCES ETUDIANT(ID_ETUDIANT),
//     FOREIGN KEY (ID_ZONE_DEPART) REFERENCES ZONE(ID_ZONE),
//     FOREIGN KEY (ID_ZONE_ARRIVEE) REFERENCES ZONE(ID_ZONE)
// );"

echo $creation;
$connexion->multi_query($creation);
?>