<?php
require('../config/parameters.php');
require_once('../config/autoloader.php');

use App\Model\MatchClass;
use App\Controller\MatchController;

$allMatchs = MatchController::getAll();
$allMatchsClass = [];
foreach ($allMatchs as $match)
{
    $matchInst = new MatchClass($match['id_match'], $match['score_team'], $match['score_team_opponent'], $match['date_match'], 
    $match['team_id'] ,$match['city_match'], $match['team_opponent_id']);
    
    $matchInst->setId($match['id_match']);
    $matchInst->setScore($match['score_team']);
    $matchInst->setScoreOpponent($match['score_team_opponent']);
    $matchInst->setDate($match['date_match']);
    $matchInst->setTeam($match['team_id']);
    $matchInst->setCity($match['city_match']);
    $matchInst->setTeamOpponent($match['team_opponent_id']);
    array_push($allMatchsClass, $matchInst);
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de tout les matchs</title>
    <link rel="stylesheet" href="footclub.css">
</head>
<body>
    <ul>
        <li><a href="addMatch.php">Ajouter un match</a></li>
    </ul>
    <table>
        <thead>
            <tr>
                <th>Score de l'équipe</th>
                <th>Score de l'équipe adverse</th>
                <th>Date du match</th>
                <th>Equipe</th>
                <th>Ville du match</th>
                <th>Equipe adverse</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($allMatchsClass as $itemMatch)
            {
                ?>
                <tr>
                    <td><?= $itemMatch->getScore();?></td>
                    <td><?= $itemMatch->getScoreOpponent(); ?></td>
                    <td><?= $itemMatch->getDate(); ?></td>
                    <td><?= $itemMatch->getTeam(); ?></td>
                    <td><?= $itemMatch->getCity(); ?></td>
                    <td><?= $itemMatch->getTeamOpponent(); ?></td>
                    <td>
                        <form action="editMatch.php" method="get">
                            <input type="hidden" name="id" value="<?= $itemMatch->getId(); ?>">
                            <input type="submit" value="Modifier">
                        </form>
                        <form action="deleteMatch.php" method="get">
                            <input type="hidden" name="id" value="<?= $itemMatch->getId(); ?>">
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