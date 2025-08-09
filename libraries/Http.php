<?php

class Http
{
    /**
     * Redirige le visiteur vers $url
     * @param string $url
     * @return void
     */

    //public function getPdo(): PDO  // méthode qui appartient à l'objet: pour l'utiliser => créer une nouvelle instance de la class database
    /* exemple:
    $db = new Databse();
    $pdo = $db->getPdo();
    // alors que : $pdo = Database::getPdo();  ici méthode statique ou "méthode de la classe", ici on appelle la méthode directement sur la class
    */

    public static function redirect(string $url): void
    {
        header("Location: $url");
        exit();
    }
}
