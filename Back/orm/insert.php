<?php

include_once('common.php');

// AJOUTER LES SPECIFIC VALUES
function insertQuery($tableName, $values)
{
    $query = "insert into $tableName (";
    $query .= implode(", ", array_keys($values));
    $query .= ") values (";
    $query .= implode(", ", array_values($values));
    $query .= ');';
    return $query;
}

function insert($query, $db) 
{
    try {
        executeWithoutResult($query, $db);
    } catch (PDOException $e) {
        http_response_code(406);
        $error["error"] = "Erreur des paramètres de la reqûete";
        echo json_encode($error, JSON_PRETTY_PRINT);
        die();
    }
}

