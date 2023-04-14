<?php
include_once("ModelBase.php");

class InscriptionTrajet extends ModelBase {
    const TABLE_NAME = "INSCRIPTION_TRAJET";

    public $id;
    public $idTrajet;
    public $idEtudiant;

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
        $this->id = $array['ID_INSCRIPTION_TRAJET'];
        $this->idTrajet = $array['ID_TRAJET'];
        $this->idEtudiant = $array['ID_ETUDIANT'];
    }

    public function equivalence()
    {
        return [
            "id" => "ID_INSCRIPTION_TRAJET",
            "idTrajet" => "ID_TRAJET",
            "idEtudiant" => "ID_ETUDIANT"
        ];
    }

    public function fieldRequired()
    {
        return [
            "idTrajet",
            "idEtudiant"
        ];
    }

    public function getTypeField()
    {
        return [
            "id" => "int",
            "idTrajet" => "int",
            "idEtudiant" => "int"
        ];
    }
}

?>