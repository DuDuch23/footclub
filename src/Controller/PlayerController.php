<?php

namespace App\Controller;

use App\Database\MySql;
use App\Model\Player;

final readonly class PlayerController
{

    public static function getLastId(): int
    {
        $connexion = MySql::connect();
        return $connexion->lastInsertId();
    }

    public static function getAll(): array
    {
        $connexion = MySql::connect();
        $request = $connexion->prepare("SELECT * from player");

        $request->execute();
        return $request->fetchAll();
    }

    public static function add(Player $player): bool
    {
        $connexion = MySql::connect();
        $insert = $connexion->prepare("INSERT INTO player (firstname_player, lastname_player, birthday_player, picture_player)
        VALUES (:firstname_player, :lastname_player, :birthday_player, :picture_player)");
        $playerFirstName = $player->getFirstName();
        $playerLastName = $player->getLastName();
        $playerBirthday = $player->getBirthday();
        $playerPicture = $player->getPicture();
        $insert->bindParam(':firstname_player', $playerFirstName);
        $insert->bindParam(':lastname_player', $playerLastName);
        $insert->bindParam(':birthday_player', $playerBirthday);
        $insert->bindParam(':picture_player', $playerPicture);

        return $insert->execute();
    }

    public static function update(Player $player): bool
    {
        $connexion = MySql::connect();
        $update = $connexion->prepare("UPDATE player SET firstname_player = :firstname, lastname_player = :lastname, birthday_player = :birthday, picture_player = :picture
        WHERE player.id_player = :id");
        $playerFirstName = $player->getFirstName();
        $playerLastName = $player->getLastName();
        $playerBirthday = $player->getBirthday();
        $playerPicture = $player->getPicture();
        $playerId = $player->getId();

        $update->bindValue(":firstname", $playerFirstName);
        $update->bindValue(":lastname", $playerLastName);
        $update->bindValue(":birthday", $playerBirthday);
        $update->bindValue(":picture", $playerPicture);
        $update->bindValue(":id", $playerId);

        return $update->execute();
    }

    public static function delete(Player $player): bool
    {
        $connexion = MySql::connect();
        $delete = $connexion->prepare("DELETE FROM player WHERE player.id_player");

        return $delete->execute();
    }
}