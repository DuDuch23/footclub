<?php
require('../config/parameters.php');
require_once('../config/autoloader.php');

use App\Model\MatchClass;
use App\Controller\MatchController;
use App\Model\Team;
use App\Controller\TeamController;
use App\Model\TeamOpponent;
use App\Controller\TeamOpponentController;

$erreur = [];
$erreurValueTeam = null;
$erreurValueTeamOpponent = null;
$expressionReguliere = '/[\d\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
if(empty($_POST) === false)
{
    $score = $_POST['score'];
    $scoreOpponent = $_POST['scoreOpponent'];
    $date = $_POST['date'];
    $team = $_POST['team']; 
    $city = $_POST['city'];
    $teamOpponent = $_POST['teamOpponent'];

    if(empty($_POST['score']))
    {
        $erreur['score'] = "Veuillez saisir le score de l'équipe";
    }

    if(empty($_POST['scoreOpponent']))
    {
        $erreur['scoreOpponent'] = "Veuillez saisir le score de l'équipe adverse";
    }

    if(empty($_POST['date']))
    {
        $erreur['date'] = "Veuillez saisir la date du match";
    }

    if($_POST['team'] == $erreurValueTeam)
    {
        $erreur['team'] = "Veuillez saisir l'équipe participant au match";
    }

    if(empty($_POST['city']))
    {
        $erreur['city'] = "Veuillez saisir la ville du match";
    }

    if($_POST['teamOpponent'] == $erreurValueTeamOpponent)
    {
        $erreur['teamOpponent'] = "Veuillez saisir l'équipe adverse du match";
    }

    if(empty($erreur))
    {
        // $date = new \DateTime($_POST['date']);
        // $team = new Team(null, $_POST['team']);
        // $teamOpponent = new TeamOpponent($_POST['teamOpponent'], );
        $match = new MatchClass($_GET['id'], $_POST["score"], $_POST["scoreOpponent"], $_POST['date'], $_POST['team'], $_POST['city'],
        $_POST['teamOpponent']);
        $match->setId($_GET['id']);
        $match->setScore($_POST['score']);
        $match->setScoreOpponent($_POST['scoreOpponent']);
        $match->setDate($_POST['date']);
        $match->setTeam($_POST['team']);
        $match->setCity($_POST['city']);
        $match->setTeamOpponent($_POST['teamOpponent']);        

        $ajoutMatch = MatchController::update($match);
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un match</title>
    <link rel="stylesheet" href="footclub.css">
</head>
<body>
<div class="content_body">
        <ul class="nav">
            <li>
                <a href="addMatch.php">Ajouter un match</a>
            </li>
            <li>
                <a href="allMatch.php">Voir tout les matchs</a>
            </li>
        </ul>

        <div class="content_form">
            <h1 class="title_form">Modifier un Match : </h1>

            <form class="form" action="#" method="POST">

                <div class="content_input">
                    <label class="label_form" for="score">Score : </label>
                    <div class="content_input_form_content_message_erreur">
                        <input class="input_form" type="number" name="score">
                        <?php
                            if(isset($erreur['score']))
                            {
                                ?><div class="content_message_erreur">
                                    <p class="message_erreur"><?php echo "<-- ".$erreur['score']; ?></p>
                                </div><?php
                            }
                            else
                            {
                                echo "";
                            }
                        ?>
                    </div>
                </div>

                <div class="content_input">
                    <label class="label_form" for="scoreOpponent">Score adverse : </label>
                    <div class="content_input_form_content_message_erreur">
                        <input class="input_form" type="number" name="scoreOpponent">
                        <?php
                            if(isset($erreur['scoreOpponent']))
                            {
                                ?><div class="content_message_erreur">
                                    <p class="message_erreur"><?php echo "<-- ".$erreur['scoreOpponent']; ?></p>
                                </div><?php
                            }
                            else
                            {
                                echo "";
                            }
                        ?>
                    </div>
                </div>

                <div class="content_input">
                    <label class="label_form" for="date">Date du Match : </label>
                    <div class="content_input_form_content_message_erreur">
                        <input class="input_form" type="date" name="date">
                        <?php
                            if(isset($erreur['date']))
                            {
                                ?><div class="content_message_erreur">
                                    <p class="message_erreur"><?php echo "<-- ".$erreur['date']; ?></p>
                                </div><?php
                            }
                            else
                            {
                                echo "";
                            }
                        ?>
                    </div>
                </div>

                <div class="content_input">
                    <label class="label_form" for="team">Equipe : </label>
                    <div class="content_input_form_content_message_erreur">
                        <select class="input_form" name="team">
                            <?php
                            $allTeams = TeamController::getAll();
                            $allTeamsClass = [];
                            foreach($allTeams as $teams)
                            {
                                $teamInst = new Team($teams['id_team'], $teams['name_team']);
                                $teamInst->setId($teams['id_team']);
                                $teamInst->setName($teams['name_team']);
                                array_push($allTeamsClass, $teamInst);
                            }
                            ?>
                            <option value="<?= $erreurValueTeam; ?>"></option>
                            <?php
                            foreach($allTeamsClass as $team)
                            {
                                ?>
                                <option value="<?= $team->getId(); ?>"><?= $team->getName(); ?></option>
                                <?php
                            }
                            ?>
                        </select>
                            
                        <?php
                            if(isset($erreur['team']))
                            {
                                ?><div class="content_message_erreur">
                                    <p class="message_erreur"><?php echo "<-- ".$erreur['team']; ?></p>
                                </div><?php
                            }
                            else
                            {
                                echo "";
                            }
                        ?>
                    </div>
                </div>

                <div class="content_input">
                    <label class="label_form" for="city">Ville du Match : </label>
                    <div class="content_input_form_content_message_erreur">
                        <input class="input_form" type="text" name="city">
                        <?php
                            if(isset($erreur['city']))
                            {
                                ?><div class="content_message_erreur">
                                    <p class="message_erreur"><?php echo "<-- ".$erreur['city']; ?></p>
                                </div><?php
                            }
                            else
                            {
                                echo "";
                            }
                        ?>
                    </div>
                </div>

                <div class="content_input">
                    <label class="label_form" for="teamOpponent">Equipe adverse : </label>
                    <div class="content_input_form_content_message_erreur">
                        <select class="input_form" name="teamOpponent">
                            <?php
                            $allTeamOpponent = TeamOpponentController::getAll();
                            $allTeamOpponentClass = [];
                            foreach($allTeamOpponent as $teamOpponents)
                            {
                                $teamOpponentInst = new TeamOpponent($teamOpponents['id_team_opponent'], 
                                $teamOpponents['adress_team_opponent'], $teamOpponents['city_team_opponent']);

                                $teamOpponentInst->setId($teamOpponents['id_team_opponent']);
                                $teamOpponentInst->setAddress($teamOpponents['adress_team_opponent']);
                                $teamOpponentInst->setCity($teamOpponents['city_team_opponent']);

                                array_push($allTeamOpponentClass, $teamOpponentInst);
                            }
                            ?>
                            <option value="<?= $erreurValueTeamOpponent; ?>"></option>
                            <?php
                            foreach($allTeamOpponentClass as $teamOpponent)
                            {
                                ?>
                                <option><?= $teamOpponent->getId(); ?></option>
                                <?php
                            }
                            ?>
                        </select>
                            
                        <?php
                            if(isset($erreur['teamOpponent']))
                            {
                                ?><div class="content_message_erreur">
                                    <p class="message_erreur"><?php echo "<-- ".$erreur['teamOpponent']; ?></p>
                                </div><?php
                            }
                            else
                            {
                                echo "";
                            }
                        ?>
                    </div>
                </div>

                <input class="submit_form" type="submit" value="Ajouter le Joueur">
            </form>
        </div>
    </div>
</body>
</html>