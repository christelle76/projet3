<?php

require_once("Modele/modele.php");
require_once("Modele/comments.php");

class CommentsController {

    private $bdd;
    
    public function __construct(){
        
    }

    public function report($commentId){
        $this->comments = new Comments;
        $comments = $this->comments->report($commentId);
        
    }

    public function addComment($auteur, $message, $date, $articleId){
        $this->comments = new Comments;
        $comments = $this->comments->addComment($auteur, $message, $date, $articleId);
    }

}