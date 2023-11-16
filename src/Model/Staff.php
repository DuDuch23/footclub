<?php 

namespace App\Model;

class Staff extends Person{
    private $id;
    protected string $firstName;
    protected string $lastName;
    private string $picture;
    // private RoleStaff $role;
    private string $role;

    public function __construct($id = null, string $firstName, string $lastName, string $picture, string $role)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->picture = $picture;
        $this->role = $role;
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

    public function getPicture(): string
    {
        return $this->picture;
    }

    public function setPicture(string $newPicture): void
    {
        $this->picture = $newPicture;
    }

    // public function getRole(): RoleStaff
    // {
    //     return $this->role;
    // }

    // public function setRole(RoleStaff $newRole): void 
    // {
    //     $this->role = $newRole;
    // }

    public function getRole(): string
    {
        return $this->role;
    }

    public function setRole(string $newRole): void 
    {
        $this->role = $newRole;
    }
}