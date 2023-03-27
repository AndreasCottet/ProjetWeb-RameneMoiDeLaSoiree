<?php
include '../bdd/connectBDD.php';

foreach (glob("../Models/*.php") as $filename)
{
    include $filename;
}

function updateQuery($tableName, $values, $id) {
    $query = "update $tableName ";
    foreach($values as $key => $value) {
        $query .= "SET $key = $value ";
    }
    $query .= "WHERE ID_ETUDAINT = $id";
    return $query;
}


if(isset($_POST["entity"])) {
    eval('$entity = new ' . ucfirst($_POST["entity"]) . '();');
    foreach($_POST as $key => $value) {
        if($key != "entity") {
            if(property_exists($entity, $key)){
                $entity->$key = "'$value'";
            }
        }
    }
    $query = insertQuery($_POST['entity'], $entity->objectToArray(), $entity->id);
    echo $query;
    //$connexion->query($query);
}
?>