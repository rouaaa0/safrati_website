<?php

class Date
{
    private ?string $date = null;

    public function __construct(?string $date)
    {
        $this->date = $date;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(?string $date): self
    {
        $this->date = $date;
        return $this;
    }
}

?>
