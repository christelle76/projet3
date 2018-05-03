<?php

require_once("Modele/modele.php");
require_once("Modele/admin.php");
require_once("Modele/articles.php");

class AdminController {

    function __construct() {

    }

    function articles() { 
        $this->admin = new Admin;
        $articles = $this->admin->getArticles();
        require_once("View/articlesAdminAreaView.php"); 
    }

    function deleteArticle($id) {
        $this->admin = new Admin;
        $admin = $this->admin->deleteArticle($id);
    }

    function modifyArticle($id){
        $this->article = new Article;
        $articles = $this->article->getArticle($id);
        require_once("View/modifyArticleView.php");  
    }

    function comments() {
        $this->admin = new Admin;
        $comments = $this->admin->getComments();
        require_once("View/commentsAdminAreaView.php");       
    }

    function validateComment($id){
        $this->admin = new Admin;
        $admin = $this->admin->validateComment($id);
    }

    function deleteComment($id){
        $this->admin = new Admin;
        $admin = $this->admin->deleteComment($id);
    }

    function deleteComments($id){
        $this->admin = new Admin;
        $admin = $this->admin->deleteComments($id);
    }

    function newArticlePage() {
        require_once("View/createArticleView.php");
    }

    function newArticle($titre, $contenu, $date) {
        $this->admin = new Admin;
        $admin = $this->admin->addArticle($titre, $contenu, $date);
    }

    function updateArticle($id, $titre, $contenu, $date) {
        $this->admin = new Admin;
        $admin = $this->admin->updateArticle($id, $titre, $contenu, $date);
    }

}