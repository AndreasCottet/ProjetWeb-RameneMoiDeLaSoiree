<?php
include('connectBDD.php');

$requete = "select * from ACTEUR";
/* Si l'execution est reussie... */
if($res = $connection->query($requete))
/* ... on récupère un tableau stockant le résultat */

$acteurs = [];
 while ($acteur =  $res->fetch_assoc()) {
   $acteurs[] = $acteur;
 }
 /*liberation de l'objet requete:*/
$res->free();
/*fermeture de la connexion avec la base*/
$connection->close();

header('Content-Type: application/json');
echo json_encode($acteurs, JSON_PRETTY_PRINT);
?>
