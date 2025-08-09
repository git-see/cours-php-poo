<?php

namespace Models;

// require_once('libraries/database.php');  // ici c'est des fonctions, pas une class DONC PAS D'AUTOLOAD  ==> supprimer quans devient une class !!

abstract class Model  // abstract : cette class ne sera JAMAIS appelée pour être instanciée ( qqch = new model)
{
    protected $pdo;
    protected $table;

    public function __construct()
    {
        // $this->pdo = getPdo(); n'existe plus avec class static Database
         $this->pdo = \Database::getPdo();  // ATTENTION: Database::getPdo(); seul sans \ signifie chercher dans un namespace : ce n'est pas le cas ici donc ajouter \
    }

    /**
     * Retourne un article grâce à son identifiant
     * 
     *  @param integer $id
     *  return void
     */
    public function find(int $id)
    {
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);
        $item = $query->fetch();

        return $item;
    }

    /**
     * Supprime un commentaire grâce à son identifiant
     */
    public function delete(int $id): void
    {
        $query = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);
    }

    /**
     * Retourne la liste des articles classés par date de création
     * 
     *  @ return arrray
     */
    public function findAll(?string $order = "") // ici non obligatoire (?) : ajout de tri par dates descendantes
    // NB: le tri est commandé depuis index.php
    {
        $sql = "SELECT * FROM {$this->table}";

        if ($order) {
            $sql .= " ORDER BY " . $order;
        }

        $resultats = $this->pdo->query($sql);
        $articles = $resultats->fetchAll();

        return $articles;
    }
}
