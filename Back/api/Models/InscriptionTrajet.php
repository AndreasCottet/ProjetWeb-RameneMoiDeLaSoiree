<?php
class InscriptionTrajet {
    public $id;
    public $idTrajet;
    public $idEtudiant;


    public function arrayToObject($array)
    {
        $this->id = $array['ID_INSCRIPTION_TRAJET'];
        $this->idTrajet = $array['ID_TRAJET'];
        $this->idEtudiant = $array['ID_ETUDIANT'];
    }

    public function equivalence()
    {
        [
            "id" => "ID_INSCRIPTION_TRAJET",
            "idTrajet" => "ID_TRAJET",
            "idEtudiant" => "ID_ETUDIANT"
        ];
    }
}

?>