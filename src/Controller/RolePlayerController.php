<?php

namespace App\Controller;

use App\Database\MySql;

final class RolePlayerController
{
    public static function getAll(): array
    {
        $connexion = MySql::connect();
        $request = $connexion->prepare("SELECT * from role_joueur");

        $request->execute();
        return $request->fetchAll();
    }
}