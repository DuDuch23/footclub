<?php 

namespace App\Model;

class Player extends Person{
    private $id;
    protected string $firstName;
    protected string $lastName;
    private string $birthday;
    private string $picture;

    public function __construct($id = null, string $firstName, string $lastName, string $birthday, string $picture)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->birthday = $birthday;
        $this->picture = $picture;
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

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $newFirstName): void
    {
        $this->firstName = $newFirstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $newLastName): void
    {
        $this->lastName = $newLastName;
    }

    public function getBirthday(): string
    {
        return $this->birthday;
    }

    public function setBirthday(string $newBirthday): void
    {
        $this->birthday = $newBirthday;
    }

    public function getPicture(): string
    {
        return $this->picture;
    }

    public function setPicture(string $newPicture): void
    {
        $this->picture = $newPicture;
    }

    public function getInformation()
    {
        return $this->firstName . ' ' . $this->lastName . ' né à la date du : ' . $this->birthday . $this->picture;
    }
}