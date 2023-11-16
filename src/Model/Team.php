<?php

namespace App\Model;

class Team{

    private $id;
    private array $players = [];
    private string $name;

    public function __construct($id = null, string $name)
    {
        $this->id = $id;
        $this->name = $name;
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

    public function getPlayer(): array
    {
        return $this->players;
    }

    public function setPlayer(array $newPlayers): void
    {
        $this->players = $newPlayers;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $newName): void
    {
        $this->name = $newName;
    }
}