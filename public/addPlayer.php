<?php
require "../vendor/autoload.php";

use App\Model\Player;
use App\Controller\PlayerController;
use App\Model\Team;
use App\Controller\TeamController;
use App\Model\PlayerHasTeam;
use App\Controller\PlayerHasTeamController;
use App\Model\RolePlayer;
use App\Controller\RolePlayerController;

$erreur = [];
$erreurValueTeam = null;
$erreurValueRole = null;
$expressionReguliere = '/[\d\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
if(empty($_POST) === false)
{
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $birthday = $_POST['birthday'];
    $picture = $_POST['picture']; 
    $teams = $_POST['teams'];

    if(empty($_POST['firstName']))
    {
        $erreur['firstName'] = "Veuillez saisir le prénom du joueur";
    }
    else if(preg_match($expressionReguliere, $_POST["firstName"]))
    {
        $erreur["firstName"] = "Le prénom saisi n'est pas valide";
    }

    if(empty($_POST['lastName']))
    {
        $erreur['lastName'] = "Veuillez saisir le nom du joueur";
    }
    else if(preg_match($expressionReguliere, $_POST["lastName"]))
    {
        $erreur["lastName"] = "Le nom saisi n'est pas valide";
    }

    if(empty($_POST['birthday']))
    {
        $erreur['birthday'] = "Veuillez saisir la date de naissance du joueur";
    }

    if(empty($_POST['picture']))
    {
        $erreur['picture'] = "Veuillez saisir une photo du joueur";
    }

    if($_POST['teams'] == $erreurValueTeam)
    {
        $erreur['teams'] = "Veuillez saisir la ou les équipe(s) dont le joueur fait partis";
    }

    if($_POST['role'] == $erreurValueRole)
    {
        $erreur['role'] = "Veuillez saisir le rôle du joueur";
    }

    if(empty($erreur))
    {
        $player = new Player(null, $_POST["firstName"], $_POST["lastName"], $_POST["birthday"], $_POST["picture"]);
        $player->setFirstName($_POST['firstName']);
        $player->setLastName($_POST['lastName']);
        $player->setBirthday($_POST['birthday']);
        $player->setPicture($_POST['picture']);

        $ajoutPlayer = PlayerController::add($player);
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un joueur</title>
    <link rel="stylesheet" href="footclub.css">
</head>
<body>
    <div class="content_body">
        <ul class="nav">
            <li>
                <a href="index.php">Accueil</a>
            </li>
            <li>
                <a href="allPlayers.php">Voir tout les joueurs</a>
            </li>
        </ul>

        <div class="content_form">
            <h1 class="title_form">Ajouter un Joueur : </h1>

            <form class="form" action="#" method="POST">

                <div class="content_input">
                    <label class="label_form" for="firstName">Prénom : </label>
                    <div class="content_input_form_content_message_erreur">
                        <input class="input_form" type="text" name="firstName">
                        <?php
                            if(isset($erreur['firstName']))
                            {
                                ?><div class="content_message_erreur">
                                    <p class="message_erreur"><?php echo "<-- ".$erreur['firstName']; ?></p>
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
                    <label class="label_form" for="lastName">Nom : </label>
                    <div class="content_input_form_content_message_erreur">
                        <input class="input_form" type="text" name="lastName">
                        <?php
                            if(isset($erreur['lastName']))
                            {
                                ?><div class="content_message_erreur">
                                    <p class="message_erreur"><?php echo "<-- ".$erreur['lastName']; ?></p>
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
                    <label class="label_form" for="birthday">Date de Naissance : </label>
                    <div class="content_input_form_content_message_erreur">
                        <input class="input_form" type="date" name="birthday">
                        <?php
                            if(isset($erreur['birthday']))
                            {
                                ?><div class="content_message_erreur">
                                    <p class="message_erreur"><?php echo "<-- ".$erreur['birthday']; ?></p>
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
                    <label class="label_form" for="picture">Photo : </label>
                    <div class="content_input_form_content_message_erreur">
                        <input class="input_form" type="file" name="picture">
                        <?php
                            if(isset($erreur['picture']))
                            {
                                ?><div class="content_message_erreur">
                                    <p class="message_erreur"><?php echo "<-- ".$erreur['picture']; ?></p>
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
                    <label class="label_form" for="teams">Equipe(s) : </label>
                    <div class="content_input_form_content_message_erreur">
                        <select class="input_form" name="teams">
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
                            foreach($allTeamsClass as $teamPlayer)
                            {
                                ?>
                                <option value="<?= $teamPlayer->getId(); ?>"><?= $teamPlayer->getName(); ?></option>
                                <?php
                            }
                            ?>
                        </select>
                            
                        <?php
                            if(isset($erreur['teams']))
                            {
                                ?><div class="content_message_erreur">
                                    <p class="message_erreur"><?php echo "<-- ".$erreur['teams']; ?></p>
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
                    <label class="label_form" for="role">Rôle : </label>
                    <div class="content_input_form_content_message_erreur">
                        <select class="input_form" name="role">
                            <?php
                            $allRoles = RolePlayerController::getAll();
                            $allRolesClass = [];
                            foreach($allRoles as $roles)
                            {
                                $roleInst = new RolePlayer($roles['name_role_player']);
                                $roleInst->setRole($roles['name_role_player']);
                                array_push($allRolesClass, $roleInst);
                            }
                            ?>
                            <option value="<?= $erreurValueRole; ?>"></option>
                            <?php
                            foreach($allRolesClass as $role)
                            {
                                ?>
                                <option><?= $role->getRole(); ?></option>
                                <?php
                            }
                            ?>
                        </select>
                            
                        <?php
                            if(isset($erreur['role']))
                            {
                                ?><div class="content_message_erreur">
                                    <p class="message_erreur"><?php echo "<-- ".$erreur['role']; ?></p>
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
    <?php
    var_dump($_POST);
    ?>
</body>
</html>