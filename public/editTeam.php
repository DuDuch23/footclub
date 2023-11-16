<?php
require('../config/parameters.php');
require_once('../config/autoloader.php');

use App\Model\Team;
use App\Controller\TeamController;

$erreur = [];
$expressionReguliere = '/[\d\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
if(empty($_POST) === false)
{
    $name = $_POST['name'];

    if(empty($_POST['name']))
    {
        $erreur['name'] = "Veuillez saisir le nom de l'équipe";
    }
    else if(preg_match($expressionReguliere, $_POST["name"]))
    {
        $erreur["name"] = "Le nom saisi n'est pas valide";
    }

    if(empty($erreur))
    {
        $team = new Team($_GET['id'], $_POST['name']);
        $team->setId($_GET['id']);
        $team->setName($_POST['name']);

        $updateTeam = TeamController::update($team);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une équipe</title>
    <link rel="stylesheet" href="footclub.css">
</head>
<body>
    <ul>
        <li>
            <a href="addTeam.php">Ajouter une équipe</a>
        </li>
        <li>
            <a href="allTeams.php">Voir toutes les équipes</a>
        </li>
    </ul>

    <h1>Modifier une équipe</h1>
    <form action="#" method="post">
        <div class="content_input">
            <label class="label_form" for="name">Nom : </label>
            <div class="content_input_form_content_message_erreur">
                <input class="input_form" type="text" name="name">
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

        <input class="submit_form" type="submit" value="Modifier l'équipe">

    </form>
</body>
</html>