<?php

namespace App\Controller;

use App\Database\MySql;
use App\Model\MatchClass;

final class MatchController
{
    public static function getAll(): array
    {
        $connexion = MySql::connect();
        $request = $connexion->prepare("SELECT * from match_foot");

        $request->execute();
        return $request->fetchAll();
    }

    public static function add(MatchClass $match): bool
    {
        $connexion = MySql::connect();
        $insert = $connexion->prepare("INSERT INTO match_foot (score_team, score_team_opponent, date_match, 
        team_id, city_match, team_opponent_id) 
        VALUES (:score_team, :score_team_opponent, :date_match, :team_id, :city_match, :team_opponent_id)");
        $matchScore = $match->getScore();
        $matchScoreOpponent = $match->getScoreOpponent();
        $matchDate = $match->getDate();
        $matchTeam = $match->getTeam();
        $matchCity = $match->getCity();
        $matchTeamOpponent = $match->getTeamOpponent();

        $insert->bindParam(':score_team', $matchScore);
        $insert->bindParam(':score_team_opponent', $matchScoreOpponent);
        $insert->bindParam(':date_match', $matchDate);
        $insert->bindParam(':team_id', $matchTeam);
        $insert->bindParam(':city_match', $matchCity);
        $insert->bindParam(':team_opponent_id', $matchTeamOpponent);

        return $insert->execute();
    }

    public static function update(MatchClass $match): bool
    {
        $connexion = MySql::connect();
        $update = $connexion->prepare("UPDATE match_foot SET score_team = :score_team, score_team_opponent = :score_team_opponent, 
        date_match = :date_match, team_id = :team_id, city_match = :city_match, team_opponent_id = :team_opponent_id
        WHERE match_foot.id_match = :id");
        $matchScore = $match->getScore();
        $matchScoreOpponent = $match->getScoreOpponent();
        $matchDate = $match->getDate();
        $matchTeam = $match->getTeam();
        $matchCity = $match->getCity();
        $matchTeamOpponent = $match->getTeamOpponent();
        $matchId = $match->getId();

        $update->bindValue(":score_team", $matchScore);
        $update->bindValue(":score_team_opponent", $matchScoreOpponent);
        $update->bindValue(":date_match", $matchDate);
        $update->bindValue(":team_id", $matchTeam);
        $update->bindValue(":city_match", $matchCity);
        $update->bindValue(":team_opponent_id", $matchTeamOpponent);
        $update->bindValue(":id", $matchId);

        return $update->execute();
    }
}