<?php

require_once("Modele/modele.php");
require_once("Modele/articles.php");

class HomeController {

    function __construct() {

    }

    function home(){
        $this->articles = new Article;
        $articles = $this->articles->getLastArticles();
        require_once('View/articlesView.php');
    }

 
}
