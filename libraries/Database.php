<?php

// pas de namespace car pas dans un dossier, il reste à la base du projet
class Database
{
    /**
     * Retourne une connexion à la base de données
     * 
     * @return PDO
     */

    //public function getPdo(): PDO  // méthode qui appartient à l'objet: pour l'utiliser => créer une nouvelle instance de la class database
    /* exemple:
    $db = new Databse();
    $pdo = $db->getPdo();
    // alors que : $pdo = Database::getPdo();  ici méthode statique ou "méthode de la classe", ici on appelle la méthode directement sur la class
    */

    public static function getPdo(): PDO

    {
        $pdo = new PDO('mysql:host=localhost;dbname=blogpoo;charset=utf8', 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
        return $pdo;
    }
}







/**
 * Retourne une connexion à la base données
 * 
 * @return PDO
 */
/*
function getPdo(): PDO
{
    $pdo = new PDO('mysql:host=localhost;dbname=blogpoo;charset=utf8', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    return $pdo;
}
*/