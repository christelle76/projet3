<?php

    require_once "modele.php";

    class Article extends Modele {

        protected $bdd;
        public $lastArticles;
        public $articles;
                
        function __construct() {
            $this->bdd = new Modele();
        }

        public function getLastArticles() {
            $lastArticles = $this->bdd->getBdd()->query("SELECT article_id as id, article_titre as titre, article_contenu as contenu, article_date as 'date' FROM blog_article ORDER BY article_date DESC");
            return $lastArticles;
        }

        public function getArticle($id) {
            $getArticle = $this->bdd->getBdd()->prepare("SELECT article_id, article_titre, article_contenu, article_date FROM blog_article WHERE article_id= :id");
            $getArticle->execute(array('id'=>$id));
            return $getArticle;
        }

        function selectArticleId($id) {
            $selectArticleId = $this->bdd->getBdd()->prepare("SELECT article_id FROM blog_article WHERE article_id= :id");
            $selectArticleId->execute(array('id'=>$id));
            return $selectArticleId;
        }


    }