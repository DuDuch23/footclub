<?php

namespace App\Model;

class TeamOpponent{
    private $id;
    private string $address;
    private string $city;

    public function __construct($id = null, string $address, string $city)
    {
        $this->id = $id;
        $this->address = $address;
        $this->city = $city;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $newAddress): void
    {
        $this->address = $newAddress;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $newCity): void
    {
        $this->city = $newCity;
    }
}