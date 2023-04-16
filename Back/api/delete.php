<?php
include_once('common.php');

$where = [];
$tabEquivalence = $entity->equivalence();

foreach($_POST as $key => $value) {
    if($key != "entity") {
        if(property_exists($entity, $key)){
            $entity->$key = $value;
        }
    }
}
if(method_exists($entity, "beforeDelete")) {
    $entity->beforeDelete($db);
}
$query = deleteQuery($entity::TABLE_NAME, $entity->objectToArray());
$results = delete($query, $db);
  
