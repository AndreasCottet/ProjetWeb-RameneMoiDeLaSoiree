<?php
include_once("connectBDD.php");

$query = "DROP TABLE evaluation_trajet; DROP TABLE commentaire_trajet; DROP TABLE inscription_trajet;
DROP TABLE message; DROP TABLE trajet; DROP TABLE etudiant; DROP TABLE lieu; DROP TABLE zone; DROP TABLE evenement";

$queryStatement = $db->prepare($query);
$queryStatement->execute();
