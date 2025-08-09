<?php
//  accès BDD ==> models
namespace Models;

// plus besoin de require quand parle d'une class car autoload s'en charge!!
//require_once('libraries/models/Model.php');

class Article extends Model
{
    protected $table = "articles";

/*  TOUT dans Model.php
    /**
     * Retourne la liste des articles classés par date de création
     * 
     *  @ return arrray
     */
    /*
    public function findAll()
    {
        $resultats = $this->pdo->query('SELECT * FROM articles ORDER BY created_at DESC');
        $articles = $resultats->fetchAll();

        return $articles;
    }
*/



    /*  TOUT dans Model.php
    /**
     * Retourne un article grâce à son identifiant
     * 
     *  @param integer $id
     *  return void
     */
    /*
    public function find(int $id)
    {
        $query = $this->pdo->prepare("SELECT * FROM articles WHERE id = :article_id");
        $query->execute(['article_id' => $id]);
        $article = $query->fetch();

        return $article;
    }
*/


/*  TOUT DANS Model.php
    /**
     * Supprime un article grâce à son identifiant
     */
    /*
    public function delete(int $id): void
    {
        $query = $this->pdo->prepare('DELETE FROM articles WHERE id = :id');
        $query->execute(['id' => $id]);
    }
*/
}
