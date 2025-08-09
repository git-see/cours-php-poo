<?php

namespace Models;

// plus besoin de require quand parle d'une class car autoload s'en charge!!
//require_once('libraries/models/Model.php');

class Comment extends Model
{
    protected $table = "comments";

    /**
     * Retourne la liste des commentaires d'un article donné
     * 
     *  @param integer $article_id
     *  @ return array
     */
    public function findAllWithArticle(int $article_id)
    {
        $query = $this->pdo->prepare("SELECT * FROM comments WHERE article_id = :article_id");
        $query->execute(['article_id' => $article_id]);
        $commentaires = $query->fetchAll();

        return $commentaires;
    }


/*  TOUT DANS Model.php
    /* ICI REDEFINITION
    /**
     *  Retourne un commentaire dans la base de données grâce à son identifiant
     * 
     *  @param integer $id
     *  @return array/bool le commentaire si on le trouve, false si on ne le trouve pas
     */
    /*
    public function find(int $id)
    {
        $query = $this->pdo->prepare('SELECT * FROM comments WHERE id = :id');
        $query->execute(['id' => $id]);
        $comment = $query->fetch();

        return $comment;
    }
        */


/*  TOUT DANS Model.php
    /**
     * Supprime un commentaire grâce à son identifiant
     */
    /*
    public function delete(int $id): void
    {
        $query = $this->pdo->prepare('DELETE FROM comments WHERE id = :id');
        $query->execute(['id' => $id]);
    }
*/


    /**
     *  Insère un commentaire dans la base de données
     * 
     *  @param string $author
     *  @param string $content
     *  @param integer $article_id
     *  @return void
     */
    public function insert(string $author, string $content, int $article_id): void
    {
        $query = $this->pdo->prepare('INSERT INTO comments SET author = :author, content = :content, article_id = :article_id, created_at = NOW()');
        $query->execute(compact('author', 'content', 'article_id'));
    }
}
