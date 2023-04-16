<?php

include_once('common.php');

// AJOUTER LES SPECIFIC VALUES
function deleteQuery($tableName, $where)
{
    $query = "DELETE FROM $tableName";
    $query .= " WHERE ";
    $j = 1;
    foreach($where as $key => $value) {
        $query .= $key . " = " . $value;
        if($j < count($where)) {
            $query .= " AND ";
            $j++;
        }
    }
    $query .= ';';
    return $query;
}

function delete($query, $db) 
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

