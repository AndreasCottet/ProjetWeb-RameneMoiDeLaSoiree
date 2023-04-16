<?php
include_once("ModelBase.php");

class Message extends ModelBase {
    const TABLE_NAME = "MESSAGE";

    public $id;
    public $idEtudiant;
    public $idTrajet;
    public $message;

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

    public function equivalence()
    {
        return [
            "id" => "ID_MESSAGE ",
            "idEtudiant" => "ID_ETUDIANT",
            "idTrajet" => "ID_TRAJET",
            "message" => "MESSAGE"
        ];
    }

    public function getTypeField()
    {
        return [
            "id" => "int",
            "idEtudiant" => "int",
            "idTrajet" => "int",
            "message" => "string"
        ];
    }

    public function fieldRequired() {
        return [
            "idTrajet",
            "idEtudiant",
            "message"
        ];
    }

    public function fieldRequiredDelete() {
        return [
            "idTrajet",
            "idEtudiant"
        ];
    }
}
