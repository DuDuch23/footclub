<?php

namespace App\Controller;

use App\Database\MySql;
use App\Model\PlayerHasTeam;
use App\Model\Player;
use App\Model\Team;

final class PlayerHasTeamController
{
    public static function getAll(): array
    {
        $connexion = MySql::connect();
        $request = $connexion->prepare("SELECT * from player_has_team");

        $request->execute();
        return $request->fetchAll();
    }

    public static function add(PlayerHasTeam $playerHasTeam): bool
    {
        $connexion = MySql::connect();
        $insert = $connexion->prepare("INSERT INTO player_has_team (id_player, id_team, role)
        VALUES (:id_player, :id_team, :role)");
        $playerHasTeamIdPlayer = $playerHasTeam->getIdPlayer();
        $playerHasTeamIdTeam = $playerHasTeam->getIdTeam();
        $playerHasTeamRole = $playerHasTeam->getRole();
        $insert->bindParam(':id_player', $playerHasTeamIdPlayer);
        $insert->bindParam(':id_team', $playerHasTeamIdTeam);
        $insert->bindParam(':role', $playerHasTeamRole);

        return $insert->execute();
    }
}