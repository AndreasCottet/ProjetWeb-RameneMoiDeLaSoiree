<?php
    header('content-type:application/json');
    $envLocal = 1;

    $loginDBServeur = "root";
    $pwdDBServeur = null;


    if($envLocal) {
        $login = 'root';
        $pwd = null;
        $dbName = 'test';
    } else {
        $login = 'acottet001';
        $pwd = 'cottetandreasbdd';
        $dbName = $login;
    }

    try {
        $db = new PDO("mysql:host=localhost;dbname=$dbName;charset=utf8", $login, $pwd);
    } catch (Exception $e) {
        http_response_code(500);
        $error["error"] = $e->getMessage();
        echo json_encode($error, JSON_PRETTY_PRINT);
        die();
    }  
