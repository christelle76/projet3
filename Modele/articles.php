<?php

    require_once "modele.php";

    class Article extends Modele {

        protected $bdd;
        public $lastArticles;
        public $article;
                
        function __construct() {
            $this->bdd = new Modele();
        }

        public function getLastArticles() {
            $lastArticles = $this->bdd->getBdd()->query("SELECT article_id as id, article_titre as titre, article_contenu as contenu, article_date as 'date' FROM blog_article ORDER BY article_date DESC");
            return $lastArticles;
        }

        public function getArticle($id) {
            $article = $this->bdd->getBdd()->query("SELECT article_id as id, article_titre as titre, article_contenu as contenu, article_date as 'date' FROM blog_article WHERE id=" . $id . "");
            return $article; 
        }

    }