<?php
class Vols
{
    private ?int $idVol = null;
    private ?string $compagne = null;
    private ?string $depart = null;
    private ?string $destination = null;
    private ?string $dateDepart = null;

    public function __construct(?int $id, ?string $comp, ?string $dep, ?string $dest, ?string $date)
    {
        $this->idVol = $id;
        $this->compagne = $comp;
        $this->depart = $dep;
        $this->destination = $dest;
        $this->dateDepart = $date;
    }

    public function getIdVol()
    {
        return $this->idVol;
    }

    public function getCompagne()
    {
        return $this->compagne;
    }

    public function setCompagne($compagne)
    {
        $this->compagne = $compagne;
        return $this;
    }

    public function getDepart()
    {
        return $this->depart;
    }

    public function setDepart($depart)
    {
        $this->depart = $depart;
        return $this;
    }

    public function getDestination()
    {
        return $this->destination;
    }

    public function setDestination($destination)
    {
        $this->destination = $destination;
        return $this;
    }

    public function getDateDepart()
    {
        return $this->dateDepart;
    }

    public function setDateDepart($dateDepart)
    {
        $this->dateDepart = $dateDepart;
        return $this;
    }
}