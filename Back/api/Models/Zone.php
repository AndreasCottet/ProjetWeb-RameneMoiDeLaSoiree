<?php
class Zone {
    public $id;
    public $nom;

    public function arrayToObject($array)
    {
        $this->id = $array['ID_ZONE'];
        $this->nom = $array['NOM'];
    }

    public function equivalence()
    {
        [
            "id" => "ID_ZONE",
            "nom" => "NOM"    
        ];
    }
}

?>