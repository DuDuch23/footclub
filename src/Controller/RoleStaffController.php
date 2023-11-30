<?php

namespace App\Controller;

use App\Database\MySql;

final class RoleStaffController
{
    public static function getAll(): array
    {
        $connexion = MySql::connect();
        $request = $connexion->prepare("SELECT * from role_membre_staff");

        $request->execute();
        return $request->fetchAll();
    }
}