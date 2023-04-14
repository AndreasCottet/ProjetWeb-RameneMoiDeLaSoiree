<?php

function updateQuery($tableName, $values, $id) {
    $query = "update $tableName ";
    foreach($values as $key => $value) {
        $query .= "SET $key = $value ";
    }
    $query .= "WHERE ID_ETUDAINT = $id";
    return $query;
}

