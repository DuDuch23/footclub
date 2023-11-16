<?php

namespace App\Model;

class RolePlayer{
    private string $role;

    public function __construct(string $role)
    {
        $this->role = $role;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function setRole(string $newRole): void
    {
        $this->role = $newRole;
    }
}