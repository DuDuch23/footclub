<?php
require('../config/parameters.php');
require_once('../config/autoloader.php');

use App\Model\Player;
use App\Controller\PlayerController;
use App\Model\PlayerHasTeam;
use App\Controller\PlayerHasTeamController;
use App\Router\Router;

$allPlayers = PlayerController::getAll();
$allPlayersClass = [];
foreach ($allPlayers as $player)
{
    $playerInst = new Player($player['id_player'], $player['firstname_player'], $player['lastname_player'], $player['birthday_player'], $player['picture_player']);
    $playerInst->setId($player['id_player']);
    $playerInst->setFirstName($player['firstname_player']);
    $playerInst->setLastName($player['lastname_player']);
    $playerInst->setBirthday($player['birthday_player']);
    $playerInst->setPicture($player['picture_player']);
    array_push($allPlayersClass, $playerInst);
}

$allPlayerHasTeam = PlayerHasTeamController::getAll();
$allPlayerHasTeamClass = [];
foreach($allPlayerHasTeam as $infoPlayerHasTeam)
{
    $playerHasTeamInst = new PlayerHasTeam($infoPlayerHasTeam['id_player'], $infoPlayerHasTeam['id_team'], $infoPlayerHasTeam['role']);
    $playerHasTeamInst->setIdPlayer($infoPlayerHasTeam['id_player']);
    $playerHasTeamInst->setIdTeam($infoPlayerHasTeam['id_team']);
    $playerHasTeamInst->setRole($infoPlayerHasTeam['role']);
    array_push($allPlayerHasTeamClass, $playerHasTeamInst);
}
// var_dump($listPlayer);  
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau des Joueurs</title>
</head>
<body>
    <ul>
        <li><a href="addPlayer.php">Ajouter un joueur</a></li>
    </ul>
    <table>
        <thead>
            <tr>
                <th>Prénom</th>
                <th>Nom de Famille</th>
                <th>Date de Naissance</th>
                <th>Photo du Joueur</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($allPlayersClass as $itemPlayer)
            {
                ?>
                <tr>
                    <td><?= $itemPlayer->getFirstName();?></td>
                    <td><?= $itemPlayer->getLastName(); ?></td>
                    <td><?= $itemPlayer->getBirthday(); ?></td>
                    <td><?= $itemPlayer->getPicture(); ?></td>
                    <td>
                        <form action="editPlayer.php" method="get">
                            <input type="hidden" name="id" value="<?= $itemPlayer->getId(); ?>">
                            <input type="submit" value="Modifier">
                        </form>
                        <form action="deletePlayer.php" method="get">
                            <input type="hidden" name="id" value="<?= $itemPlayer->getId(); ?>">
                            <input type="submit" value="Supprimer">
                        </form>
                    </td>
            <?php
            }
            ?>
                </tr>
        </tbody>
    </table>
</body>
</html>