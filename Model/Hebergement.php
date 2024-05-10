<?php
class Hebergement
{
public $idHeberg;
public $nom;
    public $type;
    public $lieux;
    public $prix;
    public $offreId; // Added foreign key column

    public function __construct($nom = '', $type = '', $lieux = '', $prix = '', $userId = '', $offreId = '') // Updated constructor
    {
        $this->nom = $nom;
        $this->type = $type;
        $this->lieux = $lieux;
        $this->prix = $prix;
        $this->userId = $userId;
        $this->offreId = $offreId; // Set the value of offreId
    }

    public function getOffreId()
    {
        return $this->offreId;
    }

    public function setOffreId($offreId)
    {
        $this->offreId = $offreId;
    }

public function getIdHeberg()
{
return $this->idHeberg;
}

public function getNom()
{
return $this->nom;
}

public function setNom($nom)
{
$this->nom = $nom;
}

public function getType()
{
return $this->type;
}

public function setType($type)
{
$this->type = $type;
}

public function getLieux()
{
return $this->lieux;
}

public function setLieux($lieux)
{
$this->lieux = $lieux;
}

public function getPrix()
{
return $this->prix;
}

public function setPrix($prix)
{
$this->prix = $prix;
}

public function getUserId()
{
return $this->userId;
}

public function setUserId($userId)
{
$this->userId = $userId;
}
}