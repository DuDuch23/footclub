<?php
require('../config/parameters.php');
require_once('../config/autoloader.php');

use App\Model\Team;
use App\Controller\TeamController;

$allTeams = TeamController::getAll();
$allTeamsClass = [];
foreach ($allTeams as $team)
{
    $teamInst = new Team($team['id_team'], $team['name_team']);
    $teamInst->setId($team['id_team']);
    $teamInst->setName($team['name_team']);
    array_push($allTeamsClass, $teamInst);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau des Equipes</title>
</head>
<body>
    <ul>
        <li><a href="addTeam.php">Ajouter une Equipe</a></li>
    </ul>
    <table>
        <thead>
            <tr>
                <th>Nom d'Equipes</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($allTeamsClass as $itemTeam)
            {
                ?>
                <tr>
                    <td><?= $itemTeam->getName();?></td>
                    <td>
                        <form action="editTeam.php" method="get">
                            <input type="hidden" name="id" value="<?= $itemTeam->getId(); ?>">
                            <input type="submit" value="Modifier">
                        </form>
                        <form action="deleteTeam.php" method="get">
                            <input type="hidden" name="id" value="<?= $itemTeam->getId(); ?>">
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