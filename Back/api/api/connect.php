<?php
include '../bdd/connectBDD.php';

foreach (glob("../Models/*.php") as $filename)
{
    include $filename;
}


// Attention sensible aux attaques sql injection
$query = "SELECT * FROM ETUDIANT WHERE EMAIL = '$_POST[email]' AND PASSWORD = '$_POST[password]'";
$result = $connexion->query($query);

if($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $etudiant = new Etudiant();
    $etudiant->arrayToObject($row);
} else {
    echo json_encode("Erreur de connexion", JSON_PRETTY_PRINT);
}

// retenir l'email de la personne connectée pendant 1 an
setcookie(
    'id',
    $etudiant->id,
    [
        'expires' => time() + 365*24*3600,
        'secure' => true,
        'httponly' => true,
    ]
);
?>