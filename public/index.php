<?php
require "../vendor/autoload.php";

use App\Router\Router;
use App\Database\MySql;
use App\Model\Player;

$db = new MySql();
// $router = new Router($_GET['url']);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footclub</title>
    <link rel="stylesheet" href="footclub.css">
</head>
<body>
    <div class="back_blue">
        <ul class="nav">
            <li>
                <a href="addPlayer.php">Ajouter un joueur</a>
            </li>
            <li>
                <a href="addTeam.php">Ajouter une équipe</a>
            </li>
            <li>
                <a href="addTeamOpponent.php">Ajouter une équipe adverse</a>
            </li>
            <li>
                <a href="addStaffMember.php">Ajouter un membre du staff</a>
            </li>
            <li>
                <a href="addMatch.php">Ajouter un Match</a>
            </li>
        </ul>
    </div>
</body>
</html>