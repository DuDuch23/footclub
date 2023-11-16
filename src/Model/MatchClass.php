<?php

namespace App\Model;

class MatchClass{
    private $id;
    private int $score;
    private int $scoreOpponent;
    // private \DateTime $date;
    // private Team $team;

    private string $date;
    private int $team;
    private string $city;
    // private TeamOpponent $teamOpponent;
    private int $teamOpponent;

    public function __construct($id = null, int $score, int $scoreOpponent, string $date, int $team, string $city, int $teamOpponent)
    {
        $this->id = $id;
        $this->score = $score;
        $this->scoreOpponent = $scoreOpponent;
        $this->date = $date;
        $this->team = $team;
        $this->city = $city;
        $this->teamOpponent = $teamOpponent;
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

    public function getScore(): int
    {
        return $this->score;
    }

    public function setScore(int $newScore): void
    {
        $this->score = $newScore;
    }

    public function getScoreOpponent(): int
    {
        return $this->scoreOpponent;
    }

    public function setScoreOpponent(int $newScoreOpponent): void
    {
        $this->scoreOpponent = $newScoreOpponent;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function setDate(string $newDate): void
    {
        $this->date = $newDate;
    }

    public function getTeam(): int
    {
        return $this->team;
    }

    public function setTeam(int $newTeam): void
    {
        $this->team = $newTeam;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $newCity): void
    {
        $this->city = $newCity;
    }

    public function getTeamOpponent(): int
    {
        return $this->teamOpponent;
    }

    public function setTeamOpponent(int $newTeamOpponent): void
    {
        $this->teamOpponent = $newTeamOpponent;
    }
}