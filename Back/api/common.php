<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once('../bdd/connectBDD.php');


foreach (glob("../Models/*.php") as $filename)
{
    include_once($filename);
}

if(isset($_GET["entity"])) {
    try {
        eval('$entity = new ' . ucfirst($_GET["entity"]) . '();');
    } catch(Throwable $e) {
        http_response_code(406);
        $error = [
            "error" => "Entite inconnue"
        ];
        echo json_encode($error);
        die();
    }

} else {
    http_response_code(406);
    $error = [
        "error" => "Veuillez spécifier l'entité"
    ];
    echo json_encode($error);
}  