<?php
include_once("ModelBase.php");
include_once("../orm/delete.php");
include_once("../orm/select.php");

class Trajet extends ModelBase {
    const TABLE_NAME = "TRAJET";

    public $id;
    public $idConducteur;
    public $idLieuDepart;
    public $idLieuArrivee;
    public $dateDepart;
    public $nbrPassagers;
    public $idEvenement;

    public function objectToArray()
    {
        $equivalenceTab = $this->equivalence();
        $typeField = $this->getTypeField();
        $array = [];
        foreach($this as $key => $value)
        {
            if(empty($value))
                continue;
            $array[$equivalenceTab[$key]] = $value;
            if($typeField[$key] == "string")
                $array[$equivalenceTab[$key]] = "'".$value."'";
        }
        return $array;
    }

    public function arrayToObject($array)
    {
        $equivalenceTab = $this->equivalence();
        $typeField = $this->getTypeField();
        foreach($array as $key => $value)
        {
            $field = array_search($key, $equivalenceTab);
            $this->$field = $value;
        }
    }

    public function equivalence()
    {
        return [
            "id" => "ID_TRAJET",
            "idConducteur" => "ID_CONDUCTEUR",
            "idLieuDepart" => "ID_LIEU_DEPART",
            "idLieuArrivee" => "ID_LIEU_ARRIVEE",
            "dateDepart" => "DATE_DEPART",
            "nbrPassagers" => "NBR_PASSAGERS",
            "idEvenement" => "ID_EVENEMENT"
        ];
    }

    public function fieldRequired() 
    {
        return [
            "idConducteur",
            "idLieuDepart",
            "idLieuArrivee",
            "dateDepart",
            "nbrPassagers",
            "idEvenement"
        ];
    }

    public function getTypeField()
    {
        return [
            "id" => "int",
            "idConducteur" => "int",
            "idLieuDepart" => "int",
            "idLieuArrivee" => "int",
            "dateDepart" => "string",
            "nbrPassagers" => "int",
            "idEvenement" => "int"
        ];
    }

    public function fieldRequiredDelete() {
        return [
            "id"
        ];
    }

    public function beforeDelete($db)
    {
        $deleteQuery = deleteQuery("MESSAGE", ["ID_TRAJET" => $this->id]);
        echo $deleteQuery;
        delete($deleteQuery, $db);

        $deleteQuery = deleteQuery("INSCRIPTION_TRAJET", ["ID_TRAJET" => $this->id]);
        echo $deleteQuery;
        delete($deleteQuery, $db);

        // $query = selectQuery("INSCRIPTION_TRAJET", ["ID_TRAJET" => [$this->id]]);
        // $results = select("INSCRIPTION_TRAJET", $query, $db);
        // var_dump($results);
    }
    
}

?>