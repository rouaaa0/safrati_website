<?php
class Hebergement
{
    private ?int $idHeberg = null;
    private ?string $nom = null;
    private ?string $type = null;
    private ?string $lieux = null;
    private ?float $prix = null;

    public function __construct(?int $id, ?string $nom, ?string $type, ?string $lieux, ?float $prix)
    {
        $this->idHeberg = $id;
        $this->nom = $nom;
        $this->type = $type;
        $this->lieux = $lieux;
        $this->prix = $prix;
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
        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    public function getLieux()
    {
        return $this->lieux;
    }

    public function setLieux($lieux)
    {
        $this->lieux = $lieux;
        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix($prix)
    {
        $this->prix = $prix;
        return $this;
    }
}