<?php

namespace App\Controller;

use App\Database\MySql;
use App\Model\TeamOpponent;
use App\Model\Team;

final class TeamOpponentController
{
    public static function getAll(): array
    {
        $connexion = MySql::connect();
        $request = $connexion->prepare("SELECT * from team_opponent");

        $request->execute();
        return $request->fetchAll();
    }

    public static function add(TeamOpponent $teamOpponent): bool
    {
        $connexion = MySql::connect();
        $insert = $connexion->prepare("INSERT INTO team_opponent (adress_team_opponent, city_team_opponent)
        VALUES (:adress_team_opponent, :city_team_opponent)");
        $teamOpponentAdress = $teamOpponent->getAddress();
        $teamOpponentCity = $teamOpponent->getCity();
        $insert->bindParam(":adress_team_opponent", $teamOpponentAdress);
        $insert->bindParam(":city_team_opponent", $teamOpponentCity);

        return $insert->execute();
    }

    public static function update(TeamOpponent $teamOpponent): bool
    {
        $connexion = MySql::connect();
        $update = $connexion->prepare("UPDATE team_opponent SET adress_team_opponent = :adress_team_opponent, city_team_opponent = :city_team_opponent
        WHERE team_opponent.id_team_opponent = :id");
        $teamOpponentAdress = $teamOpponent->getAddress();
        $teamOpponentCity = $teamOpponent->getCity();
        $teamOpponentId = $teamOpponent->getId();

        $update->bindValue(":adress_team_opponent", $teamOpponentAdress);
        $update->bindValue(":city_team_opponent", $teamOpponentCity);
        $update->bindValue(":id", $teamOpponentId);

        return $update->execute();
    }
}
