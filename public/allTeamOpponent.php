<?php
require('../config/parameters.php');
require_once('../config/autoloader.php');

use App\Model\TeamOpponent;
use App\Controller\TeamOpponentController;

$allTeamOpponent = TeamOpponentController::getAll();
$allTeamOpponentClass = [];
foreach ($allTeamOpponent as $teamOpponent)
{
    $teamOpponentInst = new TeamOpponent($teamOpponent['id_team_opponent'], $teamOpponent['adress_team_opponent'], $teamOpponent['city_team_opponent']);
    $teamOpponentInst->setId($teamOpponent['id_team_opponent']);
    $teamOpponentInst->setAddress($teamOpponent['adress_team_opponent']);
    $teamOpponentInst->setCity($teamOpponent['city_team_opponent']);
    array_push($allTeamOpponentClass, $teamOpponentInst);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau des équipes adverses</title>
    <link rel="stylesheet" href="footclub.css">
</head>
<body>
    <ul>
        <li><a href="addTeamOpponent.php">Ajouter une équipe adverse</a></li>
    </ul>
    <table>
        <thead>
            <tr>
                <th>Adresse</th>
                <th>Ville</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($allTeamOpponentClass as $itemTeamOpponent)
            {
                ?>
                <tr>
                    <td><?= $itemTeamOpponent->getAddress();?></td>
                    <td><?= $itemTeamOpponent->getCity(); ?></td>
                    <td>
                        <form action="editTeamOpponent.php" method="get">
                            <input type="hidden" name="id" value="<?= $itemTeamOpponent->getId(); ?>">
                            <input type="submit" value="Modifier">
                        </form>
                        <form action="deleteTeamOpponent.php" method="get">
                            <input type="hidden" name="id" value="<?= $itemTeamOpponent->getId(); ?>">
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