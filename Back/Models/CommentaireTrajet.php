<?php
include_once("ModelBase.php");

class CommentaireTrajet extends ModelBase {
    const TABLE_NAME = "COMMENTAIRE_TRAJET";

    public $id;
    public $idEtudiant;
    public $idTrajet;
    public $idEtudiantVisee;
    public $commentaire;

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
            "id" => "ID_COMMENTAIRE_TRAJET",
            "idEtudiant" => "ID_ETUDIANT",
            "idTrajet" => "ID_TRAJET",
            "idEtudiantVisee" => "ID_ETUDIANT_VISEE",
            "commentaire" => "COMMENTAIRE"
        ];
    }

    public function getTypeField()
    {
        return [
            "id" => "int",
            "idEtudiant" => "int",
            "idTrajet" => "int",
            "idEtudiantVisee" => "int",
            "commentaire" => "string"
        ];
    }

    public function fieldRequired() {
        return [
            "idTrajet",
            "idEtudiant",
            "commentaire"
        ];
    }

    public function fieldRequiredDelete() {
        return [
            "idTrajet",
            "idEtudiant"
        ];
    }
}
