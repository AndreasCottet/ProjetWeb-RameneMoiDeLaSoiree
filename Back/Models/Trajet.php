<?php
include_once("ModelBase.php");

class Trajet extends ModelBase {
    const TABLE_NAME = "TRAJET";

    public $id;
    public $idConducteur;
    public $idZoneDepart;
    public $lieuDepart;
    public $idZoneArrivee;
    public $lieuArrivee;
    public $dateDepart;
    public $dateArrivee;
    public $nbrPassagers;

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
            "idZoneDepart" => "ID_ZONE_DEPART",
            "lieuDepart" => "LIEU_DEPART",
            "idZoneArrivee" => "ID_ZONE_ARRIVEE",
            "lieuArrivee" => "LIEU_ARRIVEE",
            "dateDepart" => "DATE_DEPART",
            "dateArrivee" => "DATE_ARRIVEE",
            "nbrPassagers" => "NBR_PASSAGERS"
        ];
    }

    public function fieldRequired() 
    {
        return [
            "idConducteur",
            "idZoneDepart",
            "lieuDepart",
            "idZoneArrivee",
            "lieuArrivee",
            "dateDepart",
            "dateArrivee",
            "nbrPassagers"
        ];
    }

    public function getTypeField()
    {
        return [
            "id" => "int",
            "idConducteur" => "int",
            "idZoneDepart" => "int",
            "lieuDepart" => "string",
            "idZoneArrivee" => "int",
            "lieuArrivee" => "string",
            "dateDepart" => "string",
            "dateArrivee" => "string",
            "nbrPassagers" => "int"
        ];
    }
}

?>