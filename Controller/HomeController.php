<?php

require_once("Modele/modele.php");
require_once("Modele/articles.php");
require_once("Modele/login.php");

class HomeController {

    function __construct() {

    }

    function home(){
        $this->articles = new Article;
        $articles = $this->articles->getLastArticles();
        require_once('View/articlesView.php');
    }

    function loginResult() {
        $this->login = new Login;
    }
}
