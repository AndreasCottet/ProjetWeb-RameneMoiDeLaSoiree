<?php
//header('Content-Type: application/json');
include '../bdd/connectBDD.php';

foreach (glob("../Models/*.php") as $filename)
{
    include $filename;
}

function insertQuery($tableName, $values) {
    $query = "insert into $tableName (";
    $query .= implode(", ", array_keys($values));
    $query .= ") values (";
    $query .= implode(", ", array_values($values));
    $query .= ');';
    return $query;
}


if(isset($_POST["entity"])) {
    eval('$entity = new ' . ucfirst($_POST["entity"]) . '();');
    $fieldRequired = $entity->fieldRequired();
    foreach($_POST as $key => $value) {
        if($key != "entity") {
            if(property_exists($entity, $key)){
                $entity->$key = "'$value'";
            }
        }
    }
    if(count($entity->getFieldMissing()) > 0) {
        echo json_encode($entity->getFieldMissing(), JSON_PRETTY_PRINT);
    } else {
        $query = insertQuery($_POST['entity'], $entity->objectToArray());
        echo $query;
        $connexion->query($query);
    }
}
?>
