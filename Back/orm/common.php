<?php

function executeWithoutResult($query, $db) 
{
    echo $query;
    $queryStatement = $db->prepare($query);
    try {
        $queryStatement->execute();
    } catch (PDOException $e) {
        http_response_code(406);
        $error["error"] = "Erreur des paramètres de la reqûete" . $query. $e->getMessage();
        echo json_encode($error, JSON_PRETTY_PRINT);
        die();
    }
}

function executeWithResults($entityName, $query, $db) 
{
    $queryStatement = $db->prepare($query);
    try {
        $queryStatement->execute();
        $results = $queryStatement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        http_response_code(406);
        $error["error"] = "Erreur des paramètres de la reqûete " . $e->getMessage();
        echo json_encode($error, JSON_PRETTY_PRINT);
        die();
    }
    $resultsFinal = [];
    foreach($results as $result)
    {
        eval('$object = new ' . $entityName . '();');
        $object->arrayToObject($result);
        $resultsFinal[] = $object;
    }
    return $resultsFinal;
}
