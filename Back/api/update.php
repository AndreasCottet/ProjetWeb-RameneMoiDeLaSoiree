<?php
    
include_once('common.php');
include_once('../orm/update.php');
include_once('../orm/common.php');

foreach($_POST as $key => $value) {
    if($key != "entity") {
        if(property_exists($entity, $key)){
            $entity->$key = "'$value'";
        }
    }
}
$query = updateQuery($_POST['entity'], $entity->objectToArray(), $entity->id);
executeWithoutResult($query, $db);
