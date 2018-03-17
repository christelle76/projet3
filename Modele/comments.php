<?php

    require_once "modele.php";

    class Comments extends Modele {

        protected $bdd;

        public function __construct() {
            $this->bdd = new Modele();
        }

        public function getComments($idArticle) {
            $comments = $this->bdd->getBdd()->query("SELECT comment_id as id, comment_author as author, comment_message as 'message', comment_date as 'date', comment_report as report, article_id FROM blog_comment WHERE article_id=" . $idArticle . "");
            return $comments;
        }

        
    }