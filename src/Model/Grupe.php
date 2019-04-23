<?php

namespace KCS\Model;

class Grupe
{
    /** @var string */
    private $id;

    /** @var string */
    private $pavadinimas;

    /** @var string */
    private $adresas;

    /** @var integer */
    private $studKiekis;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Grupe
     */
    public function setId(string $id): Grupe
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getPavadinimas(): string
    {
        return $this->pavadinimas;
    }

    /**
     * @param string $pavadinimas
     * @return Grupe
     */
    public function setPavadinimas(string $pavadinimas): Grupe
    {
        $this->pavadinimas = $pavadinimas;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getAdresas(): ?string
    {
        return $this->adresas;
    }

    /**
     * @param string $adresas
     * @return Grupe
     */
    public function setAdresas(string $adresas): Grupe
    {
        $this->adresas = $adresas;
        return $this;
    }

    /**
     * @return int
     */
    public function getStudKiekis(): int
    {
        return $this->studKiekis;
    }

    /**
     * @param int $studKiekis
     * @return Grupe
     */
    public function setStudKiekis(int $studKiekis): Grupe
    {
        $this->studKiekis = $studKiekis;
        return $this;
    }

    public function __toString()
    {
        return $this->getPavadinimas() . " - ".$this->getAdresas();
    }
}
