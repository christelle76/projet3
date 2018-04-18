<?php

    require_once "modele.php";

    class Comments extends Modele {

        protected $bdd;

        public function __construct() {
            $this->bdd = new Modele();
        }

        public function getComments($idArticle) {
            $comments = $this->bdd->getBdd()->query("SELECT comment_id as 'id', comment_author as 'author', comment_message as 'message', comment_date as 'date', comment_report as report, article_id FROM blog_comment WHERE article_id=" . $idArticle . "");
            return $comments;
        }

        public function getComment($idComment) {
            $comment = $this->bdd->getBdd()->query("SELECT comment_id as id, comment_author as author, comment_message as 'message', comment_date as 'date', comment_report as report, article_id FROM blog_comment WHERE comment_id=" . $idComment . "");
            return $comment;
        }

        public function addComments($idArticle) {
            $comments = $this->bdd->getBdd()->query("SELECT comment_id as id, comment_author as author, comment_message as 'message', comment_date as 'date', comment_report as report, article_id FROM blog_comment WHERE article_id=" . $idArticle . "");
            return $comments;
        }

        public function report($idComment) {
            $report = $this->bdd->getbdd()->prepare("UPDATE blog_comment SET comment_report = comment_report+1 WHERE comment_id = " . $idComment . "");
            $report->execute();
        }

        public function addComment($auteur, $message, $date, $articleId) {
            $comment = $this->bdd->getBdd()->prepare("INSERT INTO blog_comment(comment_author, comment_message, comment_date, article_id) VALUES ('" . $auteur . "' ,'" . $message . "','" . $date . "', '" . $articleId . "')");
            $comment->execute();
        }

        public function deleteComments($id)  {
            $$delete = $this->bdd->getBdd()->query("DELETE FROM blog_comment WHERE article_id =" . $id . "");
        }

        
    }