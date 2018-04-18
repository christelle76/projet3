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

    function addArticle($titre, $contenu, $date) {
        $addArticle = $this->bdd->getBdd()->prepare("INSERT INTO blog_article (article_titre, article_contenu, article_date) VALUES ('" . $titre . "' ,'" . $contenu . "','" . $date . "')");
        $addArticle->execute();
    }

    function deleteArticle($id) {
        $deleteArticle = $this->bdd->getBdd()->query("DELETE FROM blog_article WHERE article_id = " . $id . "");
    }

    function updateArticle($id, $titre, $contenu, $date) {
        $updateArticle = $this->bdd->getBdd()->query("UPDATE blog_article SET article_titre = '" . $titre . "', article_contenu = '" . $contenu . "', article_date = '" . $date . "' WHERE article_id =" . $id . "");
        var_dump($updateArticle);
    }

    function getComments() {
        $comments = $this->bdd->getBdd()->query("SELECT comment_id as id, comment_author as auteur, comment_message as 'message', comment_report as report FROM blog_comment ORDER BY comment_report DESC")->fetchAll();
        return $comments;
    }

    function getComment($id) {
        $comment = $this->bdd->getBdd()-query("SELECT * FROM blog_comment WHERE comment_id = " . $id . "");    
        return $comment;
    }

    function deleteComment($id) {
        $delete = $this->bdd->getBdd()->query("DELETE FROM blog_comment WHERE comment_id =" . $id . "");
    }

    function validateComment($id) {
        $validate = $this->bdd->getBdd()->query("UPDATE blog_comment SET comment_report = 0 WHERE comment_id = " . $id . "");
    }
}





