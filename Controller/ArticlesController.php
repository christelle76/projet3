<?php

require_once('Modele/modele.php');
require_once('Modele/articles.php');
require_once('Modele/comments.php');

class ArticlesController {

  private $articles;
  private $comments;

  public function __construct() {
    
  }

  public function article($idArticle) {
    $this->articles = new Article;
    $this->comments = new Comments;
    $articles = $this->articles->getArticle($idArticle);
    $comments = $this->comments->getComments($idArticle);
    require_once("View/articleView.php");
  }

  public function addArticle(){

    
  }
}