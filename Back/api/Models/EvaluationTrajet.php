<?php
class EvaluationTrajet {
    public $id;
    public $idEtudiant;
    public $idTrajet;
    public $message;
    public $note;

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
        [
            "id" => "ID_EVALUATION_TRAJET",
            "idEtudiant" => "ID_ETUDIANT",
            "idTrajet" => "ID_TRAJET",
            "message" => "MESSAGE",
            "note" => "NOTE"            
        ];
    }
}

?>