<?php

require_once('Modele/modele.php');
require_once('Modele/articles.php');
require_once('Modele/comments.php');

class ArticlesController {

  private $article;
  private $comments;

  public function __construct() {
    
  }

  public function article($idArticle) {
    $this->article = new Article;
    $this->comments = new Comments;
    $article = $this->article->getArticle($idArticle);
    $comments = $this->comments->getComments($idArticle);
    require_once("View/articleView.php");
  }
}