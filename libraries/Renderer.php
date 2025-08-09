<?php

class Renderer
{

    /**
     * Affiche un template HTML en injectant les $variables
     * 
     * @param string $path
     * @param array $variables
     * @return void
     */

    //public function getPdo(): PDO  // méthode qui appartient à l'objet: pour l'utiliser => créer une nouvelle instance de la class database
    /* exemple:
    $db = new Databse();
    $pdo = $db->getPdo();
    // alors que : $pdo = Database::getPdo();  ici méthode statique ou "méthode de la classe", ici on appelle la méthode directement sur la class
    */

    public static function render(string $path, array $variables = [])
    {
        extract($variables);  // extract(); permet de sortir d'un tableau associatif les infos sous forme de véritables variables

        ob_start();   // à partir de maintenant stocker la suite - ici j'ouvre un tampon pour y mettre ce qui suit
        require('templates/' . $path . '.html.php');
        $pageContent = ob_get_clean();   // afficher ce qui est stocké (donc templates/articles/index.html.php   = le corps de la page)

        require('templates/layout.html.php');
    }
}
