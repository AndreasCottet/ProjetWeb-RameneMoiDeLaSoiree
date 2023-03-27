<?php
class CommentaireTrajet {
    public $id;
    public $idEtudiant;
    public $idTrajet;

    public function arrayToObject($array)
    {
        $this->id = $array['ID_COMMENTAIRE_TRAJET'];
        $this->idEtudiant = $array['ID_ETUDIANT'];
        $this->idTrajet = $array['ID_TRAJET'];
    }

    public function equivalence()
    {
        [
            "id" => "ID_COMMENTAIRE_TRAJET",
            "idEtudiant" => "ID_ETUDIANT",
            "idTrajet" => "ID_TRAJET"
        ];
    }
}

?>
