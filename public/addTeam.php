<?php
require "../vendor/autoload.php";

use App\Controller\TeamController;
use App\Model\Team;

$erreur = [];
if(empty($_POST) === false)
{
    $name = $_POST['name'];

    if(empty($_POST['name']))
    {
        $erreur['name'] = "Veuillez saisir le nom de l'équipe";
    }

    if(empty($erreur))
    {
        $team = new Team(null, $_POST['name']);
        $team->setName($_POST['name']);

        $ajoutPlayer = TeamController::add($team);
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Equipe</title>
</head>
<body>
    <ul class="nav">
        <li>
            <a href="index.php">Accueil</a>
        </li>
        <li>
            <a href="allTeams.php">Voir toutes les équipes</a>
        </li>
    </ul>

    <div class="content_form">
        <h1 class="title_form">Ajout d'Equipe</h1>

        <form action="#" method="POST">
            <label class="label_form" for="name">Nom : </label>
            <input class="input_form" type="text" name="name">
            <?php
                if(isset($erreur['name']))
                {
                    ?><div class="content_message_erreur">
                        <p class="message_erreur"><?php echo $erreur['name']; ?></p>
                    </div><?php
                }
                else
                {
                    echo "";
                }
            ?>
            <input type="submit" value="Ajouter l'équipe">
        </form>
    </div>
    <?php
    //var_dump($_POST);
    ?>
</body>
</html>