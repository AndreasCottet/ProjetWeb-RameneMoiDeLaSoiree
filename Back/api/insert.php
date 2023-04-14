<?php
include_once('common.php');
include_once('../orm/insert.php');

$fieldRequired = $entity->fieldRequired();
foreach($_POST as $key => $value) {
    if($key != "entity" && $key != "id") {
        if(property_exists($entity, $key)){
            $entity->$key = $value;
        }
    }
}
if(method_exists($entity, "beforeInsert")) {
    $entity->beforeInsert($db);
}
if(count($entity->getFieldMissing()) == 0) {
    $query = insertQuery($entity::TABLE_NAME, $entity->objectToArray());
    $results = insert($query, $db);
}
if(method_exists($entity, "afterInsert")) {
    $entity->afterInsert($db);
}
else {
    echo json_encode($entity->getFieldMissing(), JSON_PRETTY_PRINT);
}     
