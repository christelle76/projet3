<?php

require_once("Modele/modele.php");
require_once('ArticlesController.php');
require_once('LoginController.php');
require_once('CommentsController.php');
require_once('AdminController.php');

class PostController {

    private $bdd;
    
    public function __construct(){
        
    }
    
    function testLoginTest(){
        if (isset($_POST['id']) && isset($_POST['password'])) {
            $loginController = new LoginController;
            $loginController->loginTest(htmlspecialchars($_POST['id']),htmlspecialchars($_POST['password']));
        } 
    }

    function testValidateComment(){
        if(isset($_POST['commentIdValidate'])){
            $adminController = new AdminController;
            $adminController->validateComment(htmlspecialchars($_POST['commentIdValidate']));
        }
    }

    function testDeleteComment(){
        if(isset($_POST['commentIdDelete'])){
            $adminController = new AdminController;
            $adminController->deleteComment(htmlspecialchars($_POST['commentIdDelete']));
        }
    }

    function testReport(){
        if (isset($_POST["commentId"])) {
            $commentsController = new CommentsController;
            $commentsController->report($_POST["commentId"]);
        } 
    }

    function testAddComment(){
        if ((isset($_POST["auteur"]) && (!empty($_POST["auteur"]))) && (isset($_POST["message"]) && (!empty($_POST["message"])))) {
            $commentsController = new CommentsController;
            $commentsController->addComment(htmlspecialchars($_POST["auteur"]), htmlspecialchars($_POST["message"]), date("Y-m-d  H:i:s"), $_POST["articleId"]);
        } 
    }

    function testNewArticle(){
        if(isset($_POST['titleNewArticle']) && $_POST['contentNewArticle']){
            $adminController = new AdminController;
            $adminController->newArticle($_POST['titleNewArticle'],$_POST['contentNewArticle'], date("Y-m-d  H:i:s"));
        }
    }

    function testUpdateArticle(){
        if(isset($_POST['titleModifyArticle']) && $_POST['contentModifyArticle'] && isset($_POST['modifierArticle'])){
            $adminController = new AdminController;
            $adminController->updateArticle($_POST['modifierArticle'],$_POST['titleModifyArticle'],$_POST['contentModifyArticle'], date("Y-m-d  H:i:s"));
        }
    }

    function testDeleteArticle(){
        if (isset($_POST["deleteArticle"])) {
            $adminController = new AdminController;
            $commentsController = new CommentsController;
            $adminController->deleteArticle(htmlspecialchars($_POST["deleteArticle"]));
            $adminController->deleteComments(htmlspecialchars($_POST["deleteArticle"]));
        } 
    }

    function testDisconnect(){
        if (isset($_POST["disconnect"])) {
            $loginController = new LoginController;
            $loginController->disconnect(htmlspecialchars($_POST["disconnect"]));
        }
    }

}

    
    
    
    
    
    
    
    
    
    
    
    