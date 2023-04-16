<?php
include_once("ModelBase.php");
include_once("../orm/select.php");

class Etudiant extends ModelBase {
    const TABLE_NAME = "ETUDIANT";

    public $id;
    public $nom;
    public $prenom;
    public $email;
    public $password;
    public $telephone;

    // A modifier pour le mettre dans model base
    public function arrayToObject($array)
    {
        $this->id = $array['ID_ETUDIANT'] ;
        $this->nom = $array['NOM'];
        $this->prenom =  $array['PRENOM'];
        $this->email =  $array['EMAIL'];	
        $this->password =  $array['PASSWORD'];
        $this->telephone =  $array['TELEPHONE'];
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
        ];
    }

    public function getTypeField()
    {
        return [
            "id" => "int",
            "nom" => "string",
            "prenom" => "string",
            "email" => "string",
            "password" => "string",
            "telephone" => "string",
        ];
    }


    public function beforeInsert($db)
    {
        $query = "SELECT * FROM ETUDIANT WHERE EMAIL = '$this->email'";
        try {
            $queryStatement = $db->prepare($query);
            $queryStatement->execute();
            $results = $queryStatement->fetchAll();
        } catch (PDOException $e) {
            http_response_code(406);
            $error["error"] = "Erreur des paramètres de la reqûete " . $e->getMessage();
            echo json_encode($error, JSON_PRETTY_PRINT);
            die();
        }
        if($results) {
            http_response_code(406);
            $error["error"] = "L'email est déjà utilisé";
            echo json_encode($error, JSON_PRETTY_PRINT);
            die();
        }
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
    }

    public function afterInsert($db) {
        $query = selectQuery($this::TABLE_NAME, ["EMAIL" => ["'$this->email'"]]);
        $etudiant = select(get_class($this), $query, $db)[0];
        echo json_encode($etudiant->id, JSON_PRETTY_PRINT);
    }

    public function fieldRequiredDelete() {
        return [
            "id",
        ];
    }
}

?>