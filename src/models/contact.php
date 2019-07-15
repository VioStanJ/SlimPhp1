<?php

class Contact
{
    private $id;
    private $nom;
    private $prenom;
    private $datenais;
    private $phone;
    private $email;
    private $adress;
    private $bdd;

    
    function __construct(PDO $bdd){
        $this->bdd = $bdd;
    }
    

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDatenais()
    {
        return $this->datenais;
    }

    public function setDatenais($datenais)
    {
        $this->datenais = $datenais;

        return $this;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getAdress()
    {
        return $this->adress;
    }

    public function setAdress($adress)
    {
        $this->adress = $adress;

        return $this;
    }

    public function getContacts()
    {
        $cmd = "SELECT * FROM contacts";

        try {
            $rs = $this->bdd->query($cmd);
            $contacts = $rs->fetchAll(PDO::FETCH_OBJ);
            return json_encode($contacts);

        } catch (PDOException $e) {
            return json_encode($e->getMesage());
        }
    }

    public function Save()
    {
        $cmd = "INSERT INTO contacts VALUES (:id,:nm,:pr,:dt,:ph,:ml,:ad)";

        try {
            $rs = $this->bdd->prepare($cmd);

            $rs->bindValue(":id",self::getId());
            $rs->bindValue(":nm",self::getNom());
            $rs->bindValue(":pr",self::getPrenom());
            $rs->bindValue(":dt",self::getDatenais());
            $rs->bindValue(":ph",self::getPhone());
            $rs->bindValue(":ml",self::getEmail());
            $rs->bindValue(":ad",self::getAdress());

            $rs->execute();
        } catch (PDOException $e) {
            echo json_encode($e->getMesage());
        }
    }

    public function Delete()
    {
        $cmd = "DELETE FROM contacts WHERE id=:id";
        try {
            $rs = $this->bdd->prepare($cmd);

            $rs->bindValue(":id",self::getId());

            $rs->execute();
        } catch (PDOException $e) {
            echo json_encode($e->getMesage());
        }
    }

    public function Update()
    {
        $cmd = "UPDATE contacts SET nom = :nm, prenom = :pr, datenais = :dt, phone = :ph, email = :ml, adress = :ad WHERE contacts.id = :id";

        try {
            $rs = $this->bdd->prepare($cmd);

            $rs->bindValue(":id",self::getId());
            $rs->bindValue(":nm",self::getNom());
            $rs->bindValue(":pr",self::getPrenom());
            $rs->bindValue(":dt",self::getDatenais());
            $rs->bindValue(":ph",self::getPhone());
            $rs->bindValue(":ml",self::getEmail());
            $rs->bindValue(":ad",self::getAdress());

            $rs->execute();
        } catch (PDOException $e) {
            echo json_encode($e->getMesage());
        }
    }
}
