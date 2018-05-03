<?php

    require_once "modele.php";

    class Comments extends Modele {

        protected $bdd;

        public function __construct() {
            $this->bdd = new Modele();
        }

        public function getComments($idArticle) {
            $getComments = $this->bdd->getBdd()->prepare("SELECT comment_id as 'id', comment_author as 'author', comment_message as 'message', comment_date as 'date', comment_report as report, article_id FROM blog_comment WHERE article_id= :idArticle");
            $getComments->execute(array('idArticle'=>$idArticle));
            return $getComments;
        }

        public function getComment($idComment) {
            $getComment = $this->bdd->getBdd()->prepare("SELECT comment_id as id, comment_author as author, comment_message as 'message', comment_date as 'date', comment_report as report, article_id FROM blog_comment WHERE comment_id= :idComment");
            $getComment->execute(array('idComment'=>$idComment));
            return $getComment;
        }

        public function addComments($idArticle) {
            $addComments = $this->bdd->getBdd()->prepare("SELECT comment_id as id, comment_author as author, comment_message as 'message', comment_date as 'date', comment_report as report, article_id FROM blog_comment WHERE article_id= :idArticle");
            $addComments->execute(array('idArticle'=>$idArticle));
            return $addComments;
        }

        public function report($idComment) {
            $report = $this->bdd->getbdd()->prepare("UPDATE blog_comment SET comment_report = comment_report+1 WHERE comment_id = :idComment");
            $report->execute(array('idComment'=>$idComment));
        }

        public function addComment($auteur, $messageCom, $datePost, $articleId) {
            $comment = $this->bdd->getBdd()->prepare("INSERT INTO blog_comment(comment_author, comment_message, comment_date, article_id) VALUES (:auteur, :messageCom, :datePost, :articleId)");
            $comment->execute(array(
                'auteur'=>$auteur,
                'messageCom'=>$messageCom,
                'datePost'=>$datePost,
                'articleId'=>$articleId,
            ));
        }

        public function deleteComments($id)  {
            $deleteComments = $this->bdd->getBdd()->prepare("DELETE FROM blog_comment WHERE article_id = :id");
            $deleteComments->execute(array('id'=>$id));
        }

        
    }