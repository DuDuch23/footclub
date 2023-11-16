<?php
require('../config/parameters.php');
require_once('../config/autoloader.php');

use App\Model\Staff;
use App\Controller\StaffController;
use App\Model\RoleStaff;
use App\Controller\RoleStaffController;

$allStaffMember = StaffController::getAll();
$allStaffMemberClass = [];
foreach ($allStaffMember as $staffMember)
{
    $staffMemberInst = new Staff($staffMember['id_member_staff'], $staffMember['firstname_member_staff'], $staffMember['lastname_member_staff'], $staffMember['picture_member_staff'], $staffMember['role_member_staff_name']);
    $staffMemberInst->setId($staffMember['id_member_staff']);
    $staffMemberInst->setFirstName($staffMember['firstname_member_staff']);
    $staffMemberInst->setLastName($staffMember['lastname_member_staff']);
    $staffMemberInst->setPicture($staffMember['picture_member_staff']);
    $staffMemberInst->setRole($staffMember['role_member_staff_name']);
    array_push($allStaffMemberClass, $staffMemberInst);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de tout les membres du staff</title>
    <link rel="stylesheet" href="footclub.css">
</head>
<body>
    <ul>
        <li><a href="addStaffMember.php">Ajouter un membre du staff</a></li>
    </ul>
    <table>
        <thead>
            <tr>
                <th>Prénom</th>
                <th>Nom de Famille</th>
                <th>Photo</th>
                <th>Rôle</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($allStaffMemberClass as $itemStaffMember)
            {
                ?>
                <tr>
                    <td><?= $itemStaffMember->getFirstName();?></td>
                    <td><?= $itemStaffMember->getLastName(); ?></td>
                    <td><?= $itemStaffMember->getPicture(); ?></td>
                    <td><?= $itemStaffMember->getRole(); ?></td>
                    <td>
                        <form action="editStaffMember.php" method="get">
                            <input type="hidden" name="id" value="<?= $itemStaffMember->getId(); ?>">
                            <input type="submit" value="Modifier">
                        </form>
                        <form action="deleteStaffMember.php" method="get">
                            <input type="hidden" name="id" value="<?= $itemStaffMember->getId(); ?>">
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