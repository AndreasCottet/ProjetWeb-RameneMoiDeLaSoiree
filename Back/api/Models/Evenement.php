<?php
class Evenement {
    public $id;
    public $nom;

    public function arrayToObject($array)
    {
        $this->id = $array['ID_EVENEMENT'];
        $this->nom = $array['NOM'];
    }

    public function equivalence()
    {
        [
            "id" => "ID_EVENEMENT",
            "nom" => "NOM"    
        ];
    }
}

?>