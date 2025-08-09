<?php

namespace Controllers;

// require_once('libraries/utils.php');  // on garde utils car ici c'est des fonctions pas des classes  // ôter en class

/* INUTILE AVEC AUTOLOAD.PHP
require_once('libraries/controllers/Controller.php');
require_once('libraries/models/Article.php');
require_once('libraries/models/Comment.php');
*/

class Article extends Controller
{
    protected $modelName = "\Models\Article";  // ou protected $modelName = \Models\Article::class;

    public function index()
    {
        // Montrer la liste
        //   PAS DE LANGAGE SQL DIRECTMENT DANS INDEX.PHP !!!

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
<?php
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

        /*  DANS PROTECTED MODEL DU CONTROLLER ARTICLE.PHP
        $model = new \Models\Article();
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
        $articles = $this->model->findAll("created_at DESC");

        /**
         * 3. Affichage
         */
        $pageTitle = "Accueil";

        //render('articles/index', compact('pageTitle', 'articles'));  avec class static  devient:
        \Renderer::render('articles/index', compact('pageTitle', 'articles'));
    }







    public function show()
    {
        // Montrer UN article

        /*  DANS PROTECTED MODEL DU CONTROLLER ARTICLE.PHP
        $model = new \Models\Article();*/
        $commentModel = new \Models\Comment();

        /**
         * 1. Récupération du param "id" et vérification de celui-ci
         */
        // On part du principe qu'on ne possède pas de param "id"
        $article_id = null;

        // Mais si il y'en a un et que c'est un nombre entier, alors c'est cool
        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {  // ctype_digit: vérifie = entier
            $article_id = $_GET['id'];
        }

        // On peut désormais décider : erreur ou pas ?!
        if (!$article_id) {
            die("Vous devez préciser un paramètre `id` dans l'URL !");
        }

        /**
         * 2. Connexion à la base de données avec PDO
         * Attention, on précise ici deux options :
         * - Le mode d'erreur : le mode exception permet à PDO de nous prévenir violament quand on fait une connerie ;-)
         * - Le mode d'exploitation : FETCH_ASSOC veut dire qu'on exploitera les données sous la forme de tableaux associatifs
         * 
         * PS : Vous remarquez que ce sont les mêmes lignes que pour l'index.php ?!
         */
        // $pdo = getPdo();

        /**
         * 3. Récupération de l'article en question
         * On va ici utiliser une requête préparée car elle inclue une variable qui provient de l'utilisateur : Ne faites
         * jamais confiance à ce connard d'utilisateur ! :D
         */



        /* $article = $articleModel->find($article_id);*/
        $article = $this->model->find($article_id);


        /**
         * 4. Récupération des commentaires de l'article en question
         * Pareil, toujours une requête préparée pour sécuriser la donnée filée par l'utilisateur (cet enfoiré en puissance !)
         */
        $commentaires = $commentModel->findAllWithArticle($article_id);

        /**
         * 5. On affiche 
         */
        $pageTitle = $article['title'];

        /*render('articles/show', [
    'pageTitle'     => $pageTitle,
    'article'       => $article,
    'commentaires'  => $commentaires,
    'article_id'    => $article_id
]);
*/

        \Renderer::render('articles/show', compact('pageTitle', 'article', 'commentaires', 'article_id'));  // compact();  passer une liste d'arguments qui sont les noms des variables à partir desquelles on va créer un tableau associatif

        // Exemple:
        // compact('pageTitle', 'article')
        // revient au tableau associatif où la clé 'pageTitle serait identique à $pageTitle....
        // ['pageTitle' = > $pageArticle, 'article' = > $article]

    }










    public function delete()
    {
        // Supprimer un article
        /*
        require_once('libraries/database.php');
        require_once('libraries/utils.php');
        require_once('libraries/models/Article.php');
*/



        /*  DANS PROTECTED MODEL DU CONTROLLER ARTICLE.PHP
        $model = new \Models\Article();
*/


        /**
         * 1. On vérifie que le GET possède bien un paramètre "id" (delete.php?id=202) et que c'est bien un nombre
         */
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Ho ?! Tu n'as pas précisé l'id de l'article !");
        }

        $id = $_GET['id'];

        /**
         * 2. Connexion à la base de données avec PDO
         * Attention, on précise ici deux options :
         * - Le mode d'erreur : le mode exception permet à PDO de nous prévenir violament quand on fait une connerie ;-)
         * - Le mode d'exploitation : FETCH_ASSOC veut dire qu'on exploitera les données sous la forme de tableaux associatifs
         * 
         * PS : Vous remarquez que ce sont les mêmes lignes que pour l'index.php ?!
         */
        // $pdo = getPdo();

        /**
         * 3. Vérification que l'article existe bel et bien
         */
        //$query = $pdo->prepare('SELECT * FROM articles WHERE id = :id');
        //$query->execute(['id' => $id]);
        $article = $this->model->find($id);

        // if ($query->rowCount() === 0) {
        if (!$article) {
            die("L'article $id n'existe pas, vous ne pouvez donc pas le supprimer !");
        }

        /**
         * 4. Réelle suppression de l'article
         */
        $this->model->delete($id);

        /**
         * 5. Redirection vers la page d'accueil
         */
        \Http::redirect('index.php');
    }
}
