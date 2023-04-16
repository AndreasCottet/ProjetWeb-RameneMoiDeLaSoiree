<?php
include_once("../orm/common.php");
header('Access-Control-Allow-Origin: *');
include_once("../bdd/connectBDD.php");

// Attention sensible aux attaques sql injection
$query = "SELECT * FROM ETUDIANT WHERE EMAIL = '".$_GET["email"]."'";
$queryStatement = $db->prepare($query);
$queryStatement->execute();
$results = $queryStatement->fetchAll(PDO::FETCH_ASSOC);

$notFind = true;
if(count($results)) {   
    foreach($results as $result) {
        if(password_verify($_GET["password"], $result["PASSWORD"])) {
            echo json_encode($result['ID_ETUDIANT'], JSON_PRETTY_PRINT);
            return;
        }
    }
} if($notFind) {
    http_response_code(500);
    $error = [
        "error" => "Il semblerait que votre email ou votre mot de passe soit incorrect."
    ];
    echo json_encode($error, JSON_PRETTY_PRINT);
}

?>