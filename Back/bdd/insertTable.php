<?php
include_once('connectBDD.php');

$creation ="insert into EVENEMENT (NOM) VALUES('Soirée BDE Graine'); ";
$creation .="insert into EVENEMENT (NOM) VALUES('Soirée Oenologue'); ";
$creation .="insert into EVENEMENT (NOM) VALUES('Soirée Halloween'); ";
$creation .="insert into EVENEMENT (NOM) VALUES('Repas de Noël'); ";
$creation .="insert into EVENEMENT (NOM) VALUES('Barbecue BAE'); ";
$creation .="insert into EVENEMENT (NOM) VALUES('Soirée BAR'); ";
$creation .="insert into EVENEMENT (NOM) VALUES('Repas SAMOUR EIRB'); ";

$creation .="insert into ZONE (NOM) VALUES('Campus Pessac');";
$creation .="insert into ZONE (NOM) VALUES('Centre Ville');";
$creation .="insert into ZONE (NOM) VALUES('Campus Talence');";
$creation .="insert into ZONE (NOM) VALUES('Campus Bordeaux');";
$creation .="insert into ZONE (NOM) VALUES('La Victoire');";
$creation .="insert into ZONE (NOM) VALUES('La Bastide');";
$creation .="insert into ZONE (NOM) VALUES('Bassin à Flôts');";
$creation .="insert into ZONE (NOM) VALUES('Les Chartrons');";

$creation .="insert into LIEU (NOM, ID_ZONE, ADRESSE) VALUES ('Le Grizzly', 4, '1 rue de la Victoire');";
$creation .="insert into LIEU (NOM, ID_ZONE, ADRESSE) VALUES ('Le Central Perk', 4, '5 rue de la Victoire');";
$creation .="insert into LIEU (NOM, ID_ZONE, ADRESSE) VALUES ('Le Théatro', 7, '3 rue des Chartrons');";
$creation .="insert into LIEU (NOM, ID_ZONE, ADRESSE) VALUES ('Le Joya', 6, '12 rue du bassin à flôts');";

$creation .="insert into ETUDIANT (NOM, PRENOM, EMAIL, PASSWORD, TELEPHONE) VALUES ('COTTET', 'Andréas', 'andreas.cottet@enseirb-matmeca.fr', 'test', '+0601020304');";
$creation .="insert into ETUDIANT (NOM, PRENOM, EMAIL, PASSWORD, TELEPHONE) VALUES ('DOCOUTO', 'Lilian', 'lilian.docouto@enseirb-matmeca.fr', 'test', '+0601020304');";

$creation .="insert into TRAJET (ID_CONDUCTEUR, ID_LIEU_DEPART, ID_LIEU_ARRIVEE, DATE_DEPART, NBR_PASSAGERS) VALUES (1, 2, 2, '2023-12-12 20:20', 2);";
$creation .="insert into TRAJET (ID_CONDUCTEUR, ID_LIEU_DEPART, ID_LIEU_ARRIVEE, DATE_DEPART, NBR_PASSAGERS) VALUES (2, 3, 3, '2023-12-12 20:20', 1);";
$creation .="insert into TRAJET (ID_CONDUCTEUR, ID_LIEU_DEPART, ID_LIEU_ARRIVEE, DATE_DEPART, NBR_PASSAGERS, ID_EVENEMENT) VALUES (1, 2, 3, '2023-12-12 20:20', 4, 1);";
$creation .="insert into TRAJET (ID_CONDUCTEUR, ID_LIEU_DEPART, ID_LIEU_ARRIVEE, DATE_DEPART, NBR_PASSAGERS, ID_EVENEMENT) VALUES (1, 2, 1, '2023-12-12 20:20', 3, 2);";
$creation .="insert into TRAJET (ID_CONDUCTEUR, ID_LIEU_DEPART, ID_LIEU_ARRIVEE, DATE_DEPART, NBR_PASSAGERS, ID_EVENEMENT) VALUES (2, 1, 3, '2023-12-12 20:20', 2, 3);";
$creation .="insert into TRAJET (ID_CONDUCTEUR, ID_LIEU_DEPART, ID_LIEU_ARRIVEE, DATE_DEPART, NBR_PASSAGERS, ID_EVENEMENT) VALUES (2, 3, 2, '2023-12-12 20:20', 1, 4);";


$creation .="insert into MESSAGE (ID_ETUDIANT, ID_TRAJET, MESSAGE) VALUES (2, 1, 'Salut, je suis intéressé par ton trajet, passez-vous par la place de la bourse ?');";
$creation .="insert into MESSAGE (ID_ETUDIANT, ID_TRAJET, MESSAGE) VALUES (1, 1, 'Oui, je passe par la place de la bourse');";
$creation .="insert into MESSAGE (ID_ETUDIANT, ID_TRAJET, MESSAGE) VALUES (2, 1, 'Ok, est ce que vous pourriez me déposer là bas');";
$creation .="insert into MESSAGE (ID_ETUDIANT, ID_TRAJET, MESSAGE) VALUES (1, 1, 'Oui, pas de problème');";

$creation .="insert into COMMENTAIRE_TRAJET (ID_ETUDIANT, ID_TRAJET, COMMENTAIRE) VALUES (2, 1, 'Très bon trajet, je recommande');";
$creation .="insert into COMMENTAIRE_TRAJET (ID_ETUDIANT, ID_TRAJET, COMMENTAIRE) VALUES (1, 1, 'Super trajet convive conviviale, je recommande');";
$creation .="insert into COMMENTAIRE_TRAJET (ID_ETUDIANT, ID_TRAJET, COMMENTAIRE, ID_ETUDIANT_VISEE) VALUES (2, 1, 'Pilote super sympa je recommande', 1);";

$creation .="insert into INSCRIPTION_TRAJET (ID_ETUDIANT, ID_TRAJET) VALUES (2, 1);";

$queryStatement = $db->prepare($creation);
$queryStatement->execute();