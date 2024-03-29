<?php
include_once("ModelBase.php");

class EvaluationTrajet extends ModelBase {
    const TABLE_NAME = "EVALUATION_TRAJET";

    public $id;
    public $idComment;
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
        $this->idComment = $array['ID_COMMENTAIRE_TRAJET'];
        $this->note = $array['NOTE'];
    }

    public function equivalence()
    {
        return [
            "id" => "ID_EVALUATION_TRAJET",
            "idComment" => "ID_COMMENTAIRE_TRAJET",
            "note" => "NOTE"            
        ];
    }

    public function fieldRequired()
    {
        return [
            "idComment",
            "note"
        ];
    }

    public function getTypeField()
    {
        return [
            "id" => "int",
            "idComment" => "int",
            "note" => "int"
        ];
    }

    public function fieldRequiredDelete() {
        return [
            "id"
        ];
    }
}

?>