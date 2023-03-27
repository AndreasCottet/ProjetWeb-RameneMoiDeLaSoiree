<?php
header('Content-Type: application/json');
include '../bdd/connectBDD.php';

foreach (glob("../Models/*.php") as $filename)
{
    include $filename;
}

function selectString($tableName, $where) {
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

function selectAll($tableName) {
    $query = "SELECT * FROM " . $tableName . ';';
    return $query;
}

function selectById($tableName, $ids) {
    $query = "SELECT * FROM " . $tableName . " WHERE ";
    $i = 0;
    foreach($ids as $id) {
        $i++;
        $query .= "ID_" . $tableName . " = ". $id;
        if($i < count($ids)) {
            $query .= " OR ";
        }
    }
    $query .= ';';
    return $query;
}

// // function select($tableName, $field, $where) {
// //     $query = "SELECT " . implode($field, ',') . " FROM " . $tableName . " WHERE " . implode($where, ' AND '); 
// // }
//echo explode(",", $_GET["id"]);
 
// if(isset($_GET["entity"])) {
//     if(isset($_GET["id"])) {
//         $query = selectById($_GET["entity"], explode(",", $_GET["id"]));
//     } else {
//         $query = selectAll($_GET["entity"]);
//     }

//     if($res = $connexion->query($query)) {
//         $resultats = [];
//         while ($resultat =  $res->fetch_assoc()) {
//             $resultats[] = $resultat;
//         }
//         echo json_encode($resultats, JSON_PRETTY_PRINT);
//     }
// }

if(isset($_GET["entity"])) {
    eval('$entity = new ' . ucfirst($_GET["entity"]) . '();');
    $where = [];
    foreach($_GET as $key => $value) {
        if($key != "entity") {
            if(property_exists($entity, $key)) {
                $test = explode(",", $value);
                $where[$key] = $test;
            }
        }
    }
    //echo json_encode($where, JSON_PRETTY_PRINT);
    $query =  selectString($_GET["entity"], $where);
    if($res = $connexion->query($query)) {
        $resultats = [];
        while ($resultat =  $res->fetch_assoc()) {
            $resultats[] = $resultat;
        }
        echo json_encode($resultats, JSON_PRETTY_PRINT);
    }
}
?>
