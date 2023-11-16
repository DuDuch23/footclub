<?php
require('../config/parameters.php');
require_once('../config/autoloader.php');

use App\Model\Staff;
use App\Controller\StaffController;
use App\Model\RoleStaff;
use App\Controller\RoleStaffController;

$erreur = [];
$erreurValueRoleStaff = null;
$expressionReguliere = '/[\d\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
if(empty($_POST) === false)
{
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $picture = $_POST['picture']; 
    $role = $_POST['role'];

    if(empty($_POST['firstName']))
    {
        $erreur['firstName'] = "Veuillez saisir le prénom du membre du staff";
    }
    else if(preg_match($expressionReguliere, $_POST["firstName"]))
    {
        $erreur["firstName"] = "Le prénom saisi n'est pas valide";
    }

    if(empty($_POST['lastName']))
    {
        $erreur['lastName'] = "Veuillez saisir le nom du membre du staff";
    }
    else if(preg_match($expressionReguliere, $_POST["lastName"]))
    {
        $erreur["lastName"] = "Le nom saisi n'est pas valide";
    }

    if(empty($_POST['picture']))
    {
        $erreur['picture'] = "Veuillez saisir une photo du membre du staff";
    }

    if($_POST['role'] == $erreurValueRoleStaff)
    {
        $erreur['role'] = "Veuillez saisir le rôle du membre du staff";
    }

    if(empty($erreur))
    {
        $staffMember = new Staff (null, $_POST["firstName"], $_POST["lastName"], $_POST["picture"], $_POST['role']);
        $staffMember->setId($_GET['id']);
        $staffMember->setFirstName($_POST['firstName']);
        $staffMember->setLastName($_POST['lastName']);
        $staffMember->setPicture($_POST['picture']);
        $staffMember->setRole($_POST['role']);

        $modifStaffMember = StaffController::update($staffMember);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un membre du staff</title>
    <link rel="stylesheet" href="footclub.css">
</head>
<body>
    <div class="content_body">
        <ul class="nav">
            <li>
                <a href="addStaffMember.php">Ajouter un membre du staff</a>
            </li>
            <li>
                <a href="allStaffMember.php">Voir tout les membres du staff</a>
            </li>
        </ul>

        <div class="content_form">
            <h1 class="title_form">Modifier un membre du staff : </h1>

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
                    <label class="label_form" for="picture">Photo : </label>
                    <div class="content_input_form_content_message_erreur">
                        <input class="input_form" type="date" name="picture">
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
                    <label class="label_form" for="role">Rôle : </label>
                    <div class="content_input_form_content_message_erreur">
                        <select class="input_form" name="role">
                            <?php
                            $allRolesStaffMember = RoleStaffController::getAll();
                            $allRolesStaffMemberClass = [];
                            foreach($allRolesStaffMember as $rolesStaffMember)
                            {
                                $roleStaffMemberInst = new RoleStaff($rolesStaffMember['name_role_member_staff']);
                                $roleStaffMemberInst->setRole($rolesStaffMember['name_role_member_staff']);
                                array_push($allRolesStaffMemberClass, $roleStaffMemberInst);
                            }
                            ?>
                            <option value="<?= $erreurValueRoleStaff; ?>"></option>
                            <?php
                            foreach($allRolesStaffMemberClass as $roleStaffMember)
                            {
                                ?>
                                <option><?= $roleStaffMember->getRole(); ?></option>
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

                <input class="submit_form" type="submit" value="Ajouter le membre du staff">
            </form>
        </div>
    </div>

</body>
</html>