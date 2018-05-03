<?php

require_once "modele.php";

class Admin extends Modele {

    protected $bdd;
            
    function __construct() {
        $this->bdd = new Modele();
    }

    function getArticles() {
        $articles = $this->bdd->getBdd()->query("SELECT article_id as id, article_titre as titre, article_contenu as contenu, article_date as 'date' FROM blog_article")->fetchAll();
        return $articles;
    }

    function addArticle($titre, $contenu, $datePost) {
        $addArticle = $this->bdd->getBdd()->prepare("INSERT INTO blog_article (article_titre, article_contenu, article_date) VALUES (:titre , :contenu, :datePost)");
        $addArticle->execute(array(
            'titre'=>$titre,
            'contenu'=>$contenu,
            'datePost'=>$datePost,
        ));
    }

    function deleteArticle($id) {
        $deleteArticle = $this->bdd->getBdd()->prepare("DELETE FROM blog_article WHERE article_id = ?");
        $deleteArticle->bindParam(1, $id);
        $deleteArticle->execute();
    }

    function updateArticle($id, $titre, $contenu, $datePost) {
        $updateArticle = $this->bdd->getBdd()->prepare("UPDATE blog_article SET article_titre = :titre, article_contenu = :contenu, article_date = :datePost WHERE article_id = :id");
        $updateArticle->execute(array(
            'id'=>$id,
            'titre'=>$titre,
            'contenu'=>$contenu,
            'datePost'=>$datePost,
        ));
    }

    function getComments() {
        $comments = $this->bdd->getBdd()->query("SELECT comment_id as id, comment_author as auteur, comment_message as 'message', comment_report as report FROM blog_comment ORDER BY comment_report DESC")->fetchAll();
        return $comments;
    }

    function getComment($id) {
        $comment = $this->bdd->getBdd()->prepare("SELECT * FROM blog_comment WHERE comment_id = ?");    
        $comment->bindParam(1, $id);
        $comment->execute();
        return $comment;
    }

    function deleteComment($id) {
        $deleteComment = $this->bdd->getBdd()->prepare("DELETE FROM blog_comment WHERE comment_id = ?");
        $deleteComment->bindParam(1, $id);
        $deleteComment->execute();
    }

    function deleteComments($id) {
        $deleteComments = $this->bdd->getBdd()->prepare("DELETE FROM blog_comment WHERE article_id = ?");
        $deleteComments->bindParam(1, $id);
        $deleteComments->execute();
    }

    function validateComment($id) {
        $validate = $this->bdd->getBdd()->prepare("UPDATE blog_comment SET comment_report = 0 WHERE comment_id = ?");
        $validate->bindParam(1, $id);
        $validate->execute();
    }
}





