<?php

namespace App\Controller;

use App\Database\MySql;
use App\Model\Team;

final class TeamController
{
    public static function getAll(): array
    {
        $connexion = MySql::connect();
        $request = $connexion->prepare("SELECT * from team");

        $request->execute();
        return $request->fetchAll();
    }

    public static function add(Team $team): bool
    {
        $connexion = MySql::connect();
        $insert = $connexion->prepare("INSERT INTO team (name_team)VALUES (:name_team)");
        $teamName = $team->getName();
        $insert->bindParam(':name_team', $teamName);

        return $insert->execute();
    }

    public static function update(Team $team): bool
    {
        $connexion = MySql::connect();
        $update = $connexion->prepare("UPDATE team SET name_team = :name_team
        WHERE team.id_team = :id");
        $teamName = $team->getName();
        $teamId = $team->getId();

        $update->bindValue(":name_team", $teamName);
        $update->bindValue(":id", $teamId);

        return $update->execute();
    }
}
