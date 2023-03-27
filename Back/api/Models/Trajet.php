<?php
class Trajet {
    public $id;
    public $idConducteur;
    public $idZoneDepart;
    public $lieuDepart;
    public $idZoneArrivee;
    public $lieuArrivee;
    public $dateDepart;

    public function arrayToObject($array)
    {
        $this->id = $array['ID_TRAJET'];
        $this->idConducteur = $array['ID_CONDUCTEUR'];
        $this->idZoneDepart = $array['ID_ZONE_DEPART'];
        $this->lieuDepart = $array['LIEU_DEPART'];
        $this->idZoneArrivee = $array['ID_ZONE_ARRIVEE'];
        $this->lieuArrivee = $array['LIEU_ARRIVEE'];
        $this->dateDepart = $array['DATE_DEPART'];
    }

    public function equivalence()
    {
        [
            "id" => "ID_TRAJET",
            "idConducteur" => "ID_CONDUCTEUR",
            "idZoneDepart" => "ID_ZONE_DEPART",
            "lieuDepart" => "LIEU_DEPART",
            "idZoneArrivee" => "ID_ZONE_ARRIVEE",
            "lieuArrivee" => "LIEU_ARRIVEE",
            "dateDepart" => "DATE_DEPART"
        ];
    }
}

?>