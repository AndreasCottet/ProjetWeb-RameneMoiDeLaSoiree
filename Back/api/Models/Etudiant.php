<?php
class Etudiant {
    public $id;
    public $nom;
    public $prenom;
    public $email;
    public $password;
    public $telephone;
    public $sexe;

    public function objectToArray()
    {
        $equivalenceTab = $this->equivalence();
        $array = [];
        foreach($this as $key => $value)
        {
            if(empty($value))
                continue;
            $array[$equivalenceTab[$key]] = $value;
        }
        return $array;
    }

    public function arrayToObject($array)
    {       
        $this->id = $array['ID_ETUDIANT'];
        $this->nom = $array['NOM'];
        $this->prenom = $array['PRENOM'];
        $this->email = $array['EMAIL'];	
        $this->password = $array['PASSWORD'];
        $this->telephone = $array['TELEPHONE'];
        $this->sexe = $array['SEXE'];
    }

    public function equivalence()
    {
        return [
            "id" => "ID_ETUDIANT",
            "nom" => "NOM",
            "prenom" => "PRENOM",
            "email" => "EMAIL",
            "password" => "PASSWORD",
            "telephone" => "TELEPHONE",
            "sexe" => "SEXE"
        ];
    }

    public function fieldRequired() 
    {
        return [
            "nom",
            "prenom",
            "mail",
            "mdp",
            "telephone",
            "sexe"
        ];
    }

    public function getFieldMissing()
    {
        $fieldMissing = [];
        foreach($this as $key => $value) {
            if(in_array($key, $this->fieldRequired())) {
                if(empty($value)) {
                    $fieldMissing[] = $key;
                }
            }
        }
        return $fieldMissing;
    }
}

?>