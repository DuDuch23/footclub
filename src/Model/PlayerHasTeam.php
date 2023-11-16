<?php

namespace App\Model;

class PlayerHasTeam{
    
    private Player $idPlayer;
    private Team $idTeam;
    private string $role;

    public function __construct(Player $idPlayer, Team $idTeam, string $role)
    {
        $this->idPlayer = $idPlayer;
        $this->idTeam = $idTeam;
        $this->role = $role;
    }

    public function getIdPlayer(): int
    {
        return $this->idPlayer->getId();
    }

    public function setIdPlayer(Player $idPlayer): static
    {
        $this->idPlayer = $idPlayer;

        return $this;
    }
    
    public function getIdTeam(): int
    {
        return $this->idTeam->getId();
    }

    public function setIdTeam(Team $idTeam): static
    {
        $this->idTeam = $idTeam;

        return $this;
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