<?php
include_once("ModelBase.php");

class EvaluationTrajet extends ModelBase {
    const TABLE_NAME = "EVALUATION_TRAJET";

    public $id;
    public $idEtudiant;
    public $idTrajet;
    public $message;
    public $note;

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
        $this->id = $array['ID_EVALUATION_TRAJET'];
        $this->idEtudiant = $array['ID_ETUDIANT'];
        $this->idTrajet = $array['ID_TRAJET'];
        $this->message = $array['MESSAGE'];
        $this->note = $array['NOTE'];
    }

    public function equivalence()
    {
        return [
            "id" => "ID_EVALUATION_TRAJET",
            "idEtudiant" => "ID_ETUDIANT",
            "idTrajet" => "ID_TRAJET",
            "message" => "MESSAGE",
            "note" => "NOTE"            
        ];
    }

    public function fieldRequired()
    {
        return [
            "idTrajet",
            "idEtudiant",
            "message",
            "note"
        ];
    }

    public function getTypeField()
    {
        return [
            "id" => "int",
            "idEtudiant" => "int",
            "idTrajet" => "int",
            "message" => "string",
            "note" => "int"
        ];
    }
}

?>