<?php

require_once("Modele/modele.php");
require_once("Modele/admin.php");
require_once("Modele/articles.php");

class AdminController {

    function __construct() {

    }

    function adminPanel(){
        $this->admin = new Admin;
        require_once('View/adminView.php');
    }

    function articles() {
        $this->admin = new Admin;
        $admin = $this->admin->getArticles();
        require_once('View/articlesAdminAreaView.php');
    }

    function deleteArticle($id) {
        $this->admin = new Admin;
        $admin = $this->admin->deleteArticle();
    }

    function comments() {
        $this->admin = new Admin;
        $admin = $this->admin->getComments();
        require_once('View/commentsAdminAreaView.php');
    }

    function validateComment($id){
        $this->admin = new Admin;
        $admin = $this->admin->validateComment($id);
    }

    function deleteComment($id){
        $this->admin = new Admin;
        $admin = $this->admin->deleteComment($id);
    }

    function newArticle($titre, $contenu, $date) {
        $this->admin = new Admin;
        $admin = $this->admin->addArticle($titre, $contenu, $date);
    }

}