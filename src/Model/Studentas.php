<?php

declare(strict_types=1);

namespace KCS\Model;

class Studentas
{
    /** @var string */
    private $id;

    /** @var string */
    private $vardas;

    /** @var string */
    private $pavarde;

    /** @var string */
    private $ak;

    /** @var Grupe */
    private $grupe;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Studentas
     */
    public function setId(string $id): Studentas
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getVardas(): string
    {
        return $this->vardas;
    }

    /**
     * @param string $vardas
     * @return Studentas
     */
    public function setVardas(string $vardas): Studentas
    {
        $this->vardas = $vardas;
        return $this;
    }

    /**
     * @return string
     */
    public function getPavarde(): string
    {
        return $this->pavarde;
    }

    /**
     * @param string $pavarde
     * @return Studentas
     */
    public function setPavarde(string $pavarde): Studentas
    {
        $this->pavarde = $pavarde;
        return $this;
    }

    /**
     * @return string
     */
    public function getAk(): string
    {
        return $this->ak;
    }

    /**
     * @param string $ak
     * @return Studentas
     */
    public function setAk(string $ak): Studentas
    {
        $this->ak = $ak;
        return $this;
    }

    /**
     * @return Grupe
     */
    public function getGrupe(): Grupe
    {
        return $this->grupe;
    }

    /**
     * @param Grupe $grupe
     * @return Studentas
     */
    public function setGrupe(Grupe $grupe): Studentas
    {
        $this->grupe = $grupe;
        return $this;
    }
}
