<?php
class Blog
{
    private ?int $idBlog = null;
    private ?string $titre = null;
    private ?string $contenu = null;
    private ?string $date_publication = null;
    private ?string $auteur = null;
    private $rating;
    private $likes;
    private $dislikes;

    public function __construct(?int $id, ?string $titre, ?string $contenu, ?string $date, ?string $auteur,)
    {
        $this->idBlog = $id;
        $this->titre = $titre;
        $this->contenu = $contenu;
        $this->date_publication = $date;
        $this->auteur = $auteur;
        //$this->rating = $rating;

    }

    public function getlikes() {
        return $this->likes;
    }

    public function setlikes($likes) {
        $this->likes = $likes;
    }

    public function getdislikes() {
        return $this->dislikes;
    }

    public function setdislikes($dislikes) {
        $this->dislikes = $dislikes;
    }

    public function getIdBlog(): ?int
    {
        return $this->idBlog;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function getrating() {
        return $this->rating;
    }

    public function setrating($rating) {
        $this->rating = $rating;
    }
    public function setTitre(?string $titre): void
    {
        $this->titre = $titre;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(?string $contenu): void
    {
        $this->contenu = $contenu;
    }

    public function getDatePublication(): ?string
    {
        return $this->date_publication;
    }

    public function setDatePublication(?string $date): void
    {
        $this->date_publication = $date;
    }

    public function getAuteur(): ?string
    {
        return $this->auteur;
    }

    public function setAuteur(?string $auteur): void
    {
        $this->auteur = $auteur;
    }
}
