<?php
include_once("ModelBase.php");

class Evenement extends ModelBase {
    const TABLE_NAME = "EVENEMENT";

    public $id;
    public $nom;

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
        $this->id = $array['ID_EVENEMENT'];
        $this->nom = $array['NOM'];
    }

    public function equivalence()
    {
        return [
            "id" => "ID_EVENEMENT",
            "nom" => "NOM"    
        ];
    }

    public function fieldRequired()
    {
        return [
            "nom"
        ];
    }

    public function getTypeField()
    {
        return [
            "id" => "int",
            "nom" => "string"
        ];
    }
}

?>