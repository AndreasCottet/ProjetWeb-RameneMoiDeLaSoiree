<?php
include_once("connectBDD.php");

$creation = "create table EVENEMENT (
    ID_EVENEMENT int primary key not null auto_increment,
    NOM varchar(255) not null
); ";

$creation .="
create table ZONE (
    ID_ZONE int primary key not null auto_increment,
    NOM varchar(255) not null
); ";

$creation .="
create table ETUDIANT (
    ID_ETUDIANT int primary key not null auto_increment,
    NOM varchar(50) not null,
    PRENOM varchar(50) not null,
    EMAIL varchar(50) not null,
    PASSWORD varchar(255) not null,
    TELEPHONE varchar(15) not null
); ";

$creation .= "
create table LIEU (
    ID_LIEU int primary key not null auto_increment,
    NOM varchar(50) not null,
    ID_ZONE int not null,
    ADRESSE varchar(255) not null,
    foreign key (ID_ZONE) references ZONE(ID_ZONE)
); ";


$creation .="
create table TRAJET (
    ID_TRAJET int primary key not null auto_increment,
    ID_CONDUCTEUR int not null,
    ID_LIEU_DEPART int not null,
    ID_LIEU_ARRIVEE int not null,
    DATE_DEPART datetime not null,
    NBR_PASSAGERS int not null,
    ID_EVENEMENT int,
    FOREIGN KEY (ID_CONDUCTEUR) REFERENCES ETUDIANT(ID_ETUDIANT),
    FOREIGN KEY (ID_LIEU_DEPART) REFERENCES LIEU(ID_LIEU),
    FOREIGN KEY (ID_LIEU_ARRIVEE) REFERENCES LIEU(ID_LIEU)
); ";


$creation  .="
create table MESSAGE (
    ID_MESSAGE int primary key not null auto_increment,
    ID_ETUDIANT int not null,
    ID_TRAJET int not null,
    MESSAGE varchar(400) not null,
    foreign key (ID_ETUDIANT) references ETUDIANT(ID_ETUDIANT),
    foreign key (ID_TRAJET) references TRAJET(ID_TRAJET)
); ";

$creation  .="
create table COMMENTAIRE_TRAJET (
    ID_COMMENTAIRE_TRAJET int primary key not null auto_increment,
    ID_ETUDIANT int not null,
    ID_TRAJET int not null,
    ID_ETUDIANT_VISEE int,
    COMMENTAIRE varchar(400) not null,
    foreign key (ID_ETUDIANT) references ETUDIANT(ID_ETUDIANT),
    foreign key (ID_ETUDIANT_VISEE) references ETUDIANT(ID_ETUDIANT),
    foreign key (ID_TRAJET) references TRAJET(ID_TRAJET)
); ";

$creation .="
create table EVALUATION_TRAJET (
    ID_EVALUATION_TRAJET int primary key not null auto_increment,
    ID_COMMENTAIRE_TRAJET int not null,
    NOTE int not null,
    foreign key (ID_COMMENTAIRE_TRAJET) references COMMENTAIRE_TRAJET(ID_COMMENTAIRE_TRAJET)
); ";

$creation .="
create table INSCRIPTION_TRAJET (
    ID_INSCRIPTION_TRAJET int primary key not null auto_increment,
    ID_TRAJET int not null,
    ID_ETUDIANT int not null,
    STATUT varchar(50) not null,
    FOREIGN KEY (ID_TRAJET) REFERENCES TRAJET(ID_TRAJET),
    FOREIGN KEY (ID_ETUDIANT) REFERENCES ETUDIANT(ID_ETUDIANT)
); ";

echo $creation;

$connexion->multi_query($creation);


?>

<!-- DROP TABLE inscription_trajet;
DROP TABLE commentaire_trajet;
DROP TABLE evaluation_trajet;
DROP TABLE trajet;
DROP TABLE etudiant; -->