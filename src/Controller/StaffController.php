<?php

namespace App\Controller;

use App\Database\MySql;
use App\Model\Staff;

final class StaffController
{
    public static function getAll(): array
    {
        $connexion = MySql::connect();
        $request = $connexion->prepare("SELECT * from member_staff");

        $request->execute();
        return $request->fetchAll();
    }

    public static function add(Staff $staffMember): bool
    {
        $connexion = MySql::connect();
        $insert = $connexion->prepare("INSERT INTO member_staff (firstname_member_staff, lastname_member_staff, picture_member_staff, role_member_staff_name)
        VALUES (:firstname_member_staff, :lastname_member_staff, :picture_member_staff, :role_member_staff_name)");
        $staffMemberFirstName = $staffMember->getFirstName();
        $staffMemberLastName = $staffMember->getLastName();
        $staffMemberPicture = $staffMember->getPicture();
        $staffMemberRole = $staffMember->getRole();
        $insert->bindParam(':firstname_member_staff', $staffMemberFirstName);
        $insert->bindParam(':lastname_member_staff', $staffMemberLastName);
        $insert->bindParam(':picture_member_staff', $staffMemberPicture);
        $insert->bindParam(':role_member_staff_name', $staffMemberRole);

        return $insert->execute();
    }

    public static function update(Staff $staffMember): bool
    {
        $connexion = MySql::connect();
        $update = $connexion->prepare("UPDATE member_staff SET firstname_member_staff = :firstname, lastname_member_staff = :lastname, 
        picture_member_staff = :picture, role_member_staff_name = :role WHERE member_staff.id_member_staff = :id");
        $staffMemberFirstName = $staffMember->getFirstName();
        $staffMemberLastName = $staffMember->getLastName();
        $staffMemberPicture = $staffMember->getPicture();
        $staffMemberRole = $staffMember->getRole();
        $staffMemberId = $staffMember->getId();

        $update->bindValue(":firstname", $staffMemberFirstName);
        $update->bindValue(":lastname", $staffMemberLastName);
        $update->bindValue(":picture", $staffMemberPicture);
        $update->bindValue(":role", $staffMemberRole);
        $update->bindValue(":id", $staffMemberId);

        return $update->execute();
    }

}