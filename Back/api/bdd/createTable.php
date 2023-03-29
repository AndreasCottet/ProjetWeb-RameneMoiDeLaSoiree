<?php
include "connectBDD.php";

$creation = "create table EVENEMENT (
    ID_EVENEMENT int primary key not null auto_increment,
    NOM varchar(20) not null
); ";

$creation .="
create table ZONE (
    ID_ZONE int primary key not null auto_increment,
    NOM varchar(20) not null
); ";

$creation .="
create table ETUDIANT (
    ID_ETUDIANT int primary key not null auto_increment,
    NOM varchar(50) not null,
    PRENOM varchar(50) not null,
    EMAIL varchar(50) not null,
    PASSWORD varchar(50) not null,
    TELEPHONE varchar(15) not null,
    SEXE varchar(1) not null
); ";


$creation .="
create table TRAJET (
    ID_TRAJET int primary key not null auto_increment,
    ID_CONDUCTEUR int not null,
    ID_ZONE_DEPART int not null,
    LIEU_DEPART varchar(50) not null,
    ID_ZONE_ARRIVEE int not null,
    LIEU_ARRIVEE varchar(50) not null,
    DATE_DEPART date not null,
    FOREIGN KEY (ID_CONDUCTEUR) REFERENCES ETUDIANT(ID_ETUDIANT),
    FOREIGN KEY (ID_ZONE_DEPART) REFERENCES ZONE(ID_ZONE),
    FOREIGN KEY (ID_ZONE_ARRIVEE) REFERENCES ZONE(ID_ZONE)
); ";


$creation  .="
create table COMMENTAIRE_TRAJET (
    ID_COMMENTAIRE_TRAJET int primary key not null auto_increment,
    ID_ETUDIANT int not null,
    ID_TRAJET int not null,
    MESSAGE varchar(400) not null,
    foreign key (ID_ETUDIANT) references ETUDIANT(ID_ETUDIANT),
    foreign key (ID_TRAJET) references TRAJET(ID_TRAJET)
); ";


$creation .="
create table EVALUATION_TRAJET (
    ID_EVALUATION_TRAJET int primary key not null auto_increment,
    ID_ETUDIANT int not null,
    ID_TRAJET int not null,
    MESSAGE varchar(400) not null,
    NOTE int not null,
    foreign key (ID_ETUDIANT) references ETUDIANT(ID_ETUDIANT),
    foreign key (ID_TRAJET) references TRAJET(ID_TRAJET)
); .";

$creation .="
create table INSCRIPTION_TRAJET (
    ID_INSCRIPTION_TRAJET int primary key not null auto_increment,
    ID_TRAJET int not null,
    ID_ETUDIANT int not null,
    FOREIGN KEY (ID_TRAJET) REFERENCES TRAJET(ID_TRAJET),
    FOREIGN KEY (ID_ETUDIANT) REFERENCES ETUDIANT(ID_ETUDIANT)
); ";

$connexion->multi_query($creation);


?>

<!-- DROP TABLE inscription_trajet;
DROP TABLE commentaire_trajet;
DROP TABLE evaluation_trajet;
DROP TABLE trajet;
DROP TABLE etudiant; -->