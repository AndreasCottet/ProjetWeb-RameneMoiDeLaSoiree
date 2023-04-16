<?php
include_once("ModelBase.php");

class Lieu extends ModelBase {
    const TABLE_NAME = "LIEU";

    public $id;
    public $nom;
    public $adresse;
    public $idZone;

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
            "id" => "ID_LIEU",
            "nom" => "NOM",
            "idZone" => "ID_ZONE",
            "adresse" => "ADRESSE"
        ];
    }

    public function fieldRequired() 
    {
        return [
            "nom",
            "idZone",
            "adresse"
        ];   
    }

    public function getTypeField()
    {
        return [
            "id" => "int",
            "nom" => "string",
            "idZone" => "int",
            "adresse" => "string"
        ];
    }

    public function fieldRequiredDelete() {
        return [
            "id"
        ];
    }
    
}

?>