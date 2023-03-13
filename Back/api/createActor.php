<?php
include('connectBDD.php');

$query = $creation="create table ACTEUR (
NOM varchar(20) not null,
PRENOM varchar(10) not null,
primary key (NOM)
);

insert into ACTEUR (NOM, PRENOM) values
('Roth', 'Tim'),
('Keitel', 'Harvey');
";  

/* Execution d'une requete multiple */
$connection->multi_query($creation);
?>