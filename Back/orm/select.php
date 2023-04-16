<?php

include_once('common.php');

// AJOUTER LES SPECIFIC VALUES
function selectQuery($tableName, $where, $specificValues = null)
{
    $query = "SELECT * FROM " . $tableName;
    $j = 1;
    if(!empty($where)){
        $query .= " WHERE ";
    }
    foreach($where as $key => $value) {
        $i = 1;
        foreach($value as $v) {
            $query .= $key . " = " . $v;
            if($i < count($value)) {
                $query .= " OR ";
                $i++;
            }
        }
        if($j < count($where)) {
            $query .= " AND ";
            $j++;
        }
    }
    $query .= ';';
    return $query;
}

function select($entityName, $query, $db) 
{
    try {
        $results = executeWithResults($entityName, $query, $db);
    } catch (PDOException $e) {
        http_response_code(406);
        $error["error"] = "Erreur des paramètres de la reqûete ";
        echo json_encode($error, JSON_PRETTY_PRINT);
        die();
    }
    return $results;
}

