<?php

include_once('common.php');
include_once('../orm/select.php');
include_once('../orm/common.php');

$where = [];
$tabEquivalence = $entity->equivalence();
foreach($_GET as $key => $value) {
    if($key != "entity") {
        if(property_exists($entity, $key)) {
            $test = explode(",", $value);
            $where[$tabEquivalence[$key]] = $test;
        }
    }
}
$query = selectQuery($entity::TABLE_NAME, $where);
$results = executeWithResults(get_class($entity),$query, $db);
echo json_encode($results, JSON_PRETTY_PRINT);

