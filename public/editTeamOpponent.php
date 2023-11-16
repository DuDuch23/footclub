<?php
require('../config/parameters.php');
require_once('../config/autoloader.php');

use App\Model\TeamOpponent;
use App\Controller\TeamOpponentController;

$erreur = [];
if(empty($_POST) === false)
{
    $firstName = $_POST['address'];
    $lastName = $_POST['city'];

    if(empty($_POST['address']))
    {
        $erreur['address'] = "Veuillez saisir l'adresse de l'équipe adverse";
    }
    if(empty($_POST['city']))
    {
        $erreur['city'] = "Veuillez saisir la ville de l'équipe adverse";
    }

    if(empty($erreur))
    {
        $teamOpponent = new TeamOpponent($_GET['id'], $_POST['address'], $_POST['city']);
        $teamOpponent->setId($_GET['id']);
        $teamOpponent->setAddress($_POST['address']);
        $teamOpponent->setCity($_POST['city']);

        $updateTeamOpponent = TeamOpponentController::update($teamOpponent);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une équipe adverse</title>
    <link rel="stylesheet" href="footclub.css">
</head>
<body>
    <ul>
        <li>
            <a href="addTeamOpponent.php">Ajouter une équipe adverse</a>
        </li>
        <li>
            <a href="allTeamOpponent.php">Voir toutes les équipes adverses</a>
        </li>
    </ul>
    <h1>Modifier une équipe adverse</h1>
    <form action="#" method="post">
        <div class="content_input">
            <label class="label_form" for="address">Adresse : </label>
            <div class="content_input_form_content_message_erreur">
                <input class="input_form" type="text" name="address">
                <?php
                    if(isset($erreur['address']))
                    {
                        ?><div class="content_message_erreur">
                            <p class="message_erreur"><?php echo "<-- ".$erreur['address']; ?></p>
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
            <label class="label_form" for="city">Ville : </label>
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
        <input class="submit_form" type="submit" value="Modifier l'équipe adverse">
    </form>
</body>
</html>