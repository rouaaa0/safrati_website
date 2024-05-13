<?php
class Pays
{
    private ?string $nomPays = null;
    private ?int $prix = null;

    public function __construct(?string $nomPays, ?int $prix)
    {
        $this->nomPays = $nomPays;
        $this->prix = $prix;
    }

    public function getNomPays(): ?string
    {
        return $this->nomPays;
    }

    public function setNomPays(?string $nomPays): self
    {
        $this->nomPays = $nomPays;
        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(?int $prix): self
    {
        $this->prix = $prix;
        return $this;
    }
}
?>
