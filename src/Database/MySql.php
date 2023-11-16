<?php

namespace App\Database;

require "../config/parameters.php";

final readonly class MySql{
    // private const dbName = 'footclub';
    // private const dbHost = '127.0.0.1';
    // private const dbUser = 'root';
    // private const dbPass = '';

    public static function connect(): \PDO
    {
        try
        {
            $user = getenv('DB_USERNAME');
            $pass = getenv('DB_PASSWORD');
            $dbName = getenv('DB_NAME');
            $dbHost = getenv('DB_HOST');
            $connexion = new \PDO ("mysql:host=$dbHost;dbname=$dbName;charset=UTF8", $user, $pass);
        }
        catch(\Exception $exception)
        {
            echo "Erreur lors de la connexion à la base de données. : " . $exception->getMessage();
            exit;
        }
        return $connexion;
    }
}