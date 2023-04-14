<?php
include_once("../orm/common.php");
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
            $userId = 
            setcookie(
                'userId',
                $result["ID_ETUDIANT"],
                ['expires' => time() + 365*24*3600,'path' => '/',]
            );
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