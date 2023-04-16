<?php

function updateQuery($tableName, $values, $id) {
    $query = "update $tableName ";
    foreach($values as $key => $value) {
        $query .= "SET $key = $value ";
    }
    $query .= "WHERE = $id";
    return $query;
}

