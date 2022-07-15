<?php

namespace GachiNameSpace;

class Gachimuchenik2
{
    private ?int $id;
    private ?string $surname;
    private ?string $name;
    private ?string $fathername;
    private ?string $city;
    private ?string $rang;
    private ?int $ZarplataInBucks;


    public function __construct(?int $id = null, ?string $surname = null, ?string $name = null, ?string $fathername = null, ?string $city = null, ?string $rang = null, ?int $ZarplataInBucks = null)
    {
        $this->id = $id;
        $this->surname = $surname;
        $this->name = $name;
        $this->fathername = $fathername;
        $this->city = $city;
        $this->rang = $rang;
        $this->ZarplataInBucks = $ZarplataInBucks;
    }




    public function getID(): ?int
    {
        return $this->id;
    }
    public function getSurname(): ?string
    {
        return $this->surname;
    }
    public function getName(): ?string
    {
        return $this->name;
    }
    public function getFathername(): ?string
    {
        return $this->fathername;
    }
    public function getCity(): ?string
    {
        return $this->city;
    }
    public function getRang(): ?string
    {
        return $this->rang;
    }
    public function getZarplataInBucks(): ?string
    {
        return $this->ZarplataInBucks;
    }



    public function setID(?int $id): void
    {
        $this->id = $id;
    }
    public function setSurname(?string $surname): void
    {
        $this->surname = $surname;
    }
    public function setName(?string $name): void
    {
        $this->name = $name;
    }
    public function setFathername(?string $fathername): void
    {
        $this->fathername = $fathername;
    }
    public function setCity(?string $city): void
    {
        $this->city = $city;
    }
    public function setRang(?string $rang): void
    {
        $this->rang = $rang;
    }
    public function setZarplataInBucks(?int $ZarplataInBucks): void
    {
        $this->ZarplataInBucks = $ZarplataInBucks;
    }



}