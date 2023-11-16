<?php
require "../vendor/autoload.php";

use App\Model\TeamOpponent;
use App\Controller\TeamOpponentController;

$erreur = [];
if(empty($_POST) === false)
{
    $address = $_POST['address'];
    $city = $_POST['city'];

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
        $teamOpponent = new TeamOpponent(null, $_POST['address'], $_POST['city']);
        $teamOpponent->setAddress($_POST['address']);
        $teamOpponent->setCity($_POST['city']);

        $ajoutPlayer = TeamOpponentController::add($teamOpponent);
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Equipe adverse</title>
    <link rel="stylesheet" href="footclub.css">
</head>
<body>
    <ul class="nav">
        <li>
            <a href="index.php">Accueil</a>
        </li>
        <li>
            <a href="allTeamOpponent.php">Voir toutes les équipes adverses</a>
        </li>
    </ul>

    <div class="content_form">
        <h1 class="title_form">Ajout d'une Equipe adverse</h1>

        <form action="#" method="POST">
            <label class="label_form" for="address">Adresse : </label>
            <input class="input_form" type="text" name="address">
            <?php
                if(isset($erreur['address']))
                {
                    ?><div class="content_message_erreur">
                        <p class="message_erreur"><?php echo $erreur['address']; ?></p>
                    </div><?php
                }
                else
                {
                    echo "";
                }
            ?>
            <label class="label_form" for="city">Ville : </label>
            <input class="input_form" type="text" name="city">
            <?php
                if(isset($erreur['city']))
                {
                    ?><div class="content_message_erreur">
                        <p class="message_erreur"><?php echo $erreur['city']; ?></p>
                    </div><?php
                }
                else
                {
                    echo "";
                }
            ?>
            <input class="submit_form" type="submit" value="Ajouter le Joueur">
        </form>
    </div>
</body>
</html>