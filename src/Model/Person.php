<?php 

namespace App\Model;

abstract class Person{
    protected string $firstName;
    protected string $lastName;

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
}