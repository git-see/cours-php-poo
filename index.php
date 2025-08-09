<?php

require_once('libraries/autoload.php');

// require_once('libraries/controllers/Article.php');

\Application::process();   // a opartir d'ici :  MODIFIER LES TEMPLATES INDEX.HTML.PHP ET SHOW.HTML.PHP

/* APRES AVOIR CREE CLASS APPLICATION
$controller = new \Controllers\Article();
$controller->index();
*/

 











/* DANS CONTROLLERS Article.php
< ?php  //   PAS DE LANGAGE SQL DIRECTMENT DANS INDEX.PHP !!!

/**
 * CE FICHIER A POUR BUT D'AFFICHER LA PAGE D'ACCUEIL !
 * 
 * On va donc se connecter à la base de données, récupérer les articles du plus récent au plus ancien (SELECT * FROM articles ORDER BY created_at DESC)
 * puis on va boucler dessus pour afficher chacun d'entre eux
 */
/*

require_once('libraries/database.php');
require_once('libraries/utils.php');
require_once('libraries/models/Article.php');

*/
/* ICI ON TEST LA CLASS User extends Model
1) créer un fichier user.php:
< ?php
require_once('libraries/models/Model.php');
class User extends Model{
protected $table = "users";
}
2) dans index.php, ajouter:
require_once('libraries/models/User.php');
$userModel = new User();
$users = $userModel->findAll();
3) tester dans un var_dump();
var_dump($users);
die();
*/
/*

$model = new Article();

*/
/**
 * 1. Connexion à la base de données avec PDO
 * Attention, on précise ici deux options :
 * - Le mode d'erreur : le mode exception permet à PDO de nous prévenir violament quand on fait une connerie ;-)
 * - Le mode d'exploitation : FETCH_ASSOC veut dire qu'on exploitera les données sous la forme de tableaux associatifs
 */
// $pdo = getPdo();

/**
 * 2. Récupération des articles
 */
// On utilisera ici la méthode query (pas besoin de préparation car aucune variable n'entre en jeu)
// $resultats = $pdo->query('SELECT * FROM articles ORDER BY created_at DESC');
// On fouille le résultat pour en extraire les données réelles
/*

$articles = $model->findAll("created_at DESC");

*/
/**
 * 3. Affichage
 */
/*
$pageTitle = "Accueil";

render('articles/index', compact('pageTitle', 'articles'));
-->
*/