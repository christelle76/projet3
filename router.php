<?php 
require_once('Controller/HomeController.php');
require_once('Controller/ArticlesController.php');
require_once('Controller/LoginController.php');
require_once('Controller/CommentsController.php');
require_once('Controller/AdminController.php');
require_once('Controller/ErrorController.php');
require_once('Controller/PostController.php');

$homeController = new HomeController;
$articlesController = new ArticlesController;
$loginController = new LoginController;
$commentsController = new CommentsController;
$adminController = new AdminController;
$errorController = new ErrorController;
$postController = new PostController;

$postController->testLoginTest();
$postController->testDisconnect();
$postController->testLoginTest();

if (isset($_GET['page'])) {
    switch($_GET['page']){
        case "admin" :
            $loginController->sessionTest();
            if(empty($_GET['onglet']) && empty($_GET['modifierArticle'])){
                $errorController->error();
            }
            if(isset($_GET['onglet'])){
                switch($_GET['onglet']){
                    case "articles" :
                        $postController->testDeleteArticle();
                        $adminController->articles();
                        break; 
                    case "nouvelArticle" :
                        $postController->testNewArticle();
                        $adminController->newArticlePage();    
                        break;
                    case "commentaires" :
                        $postController->testValidateComment();
                        $postController->testDeleteComment();
                        $adminController->comments();                  
                        break; 
                    case "":
                        $errorController->error();
                        break;
                    default :
                        $errorController->error();
                } 
            } else if(isset($_GET['modifierArticle'])){
                $postController->testUpdateArticle();
                $adminController->modifyArticle($_GET['modifierArticle']);
            }
            break;
        case "":
            $errorController->error();
            break;
        default : 
            $errorController->error();
    }
} else if (isset($_GET['article'])) {
    switch($_GET['article']){
        case "" :
            $errorController->error();
            break;
        default : 
            $postController->testReport();
            $postController->testAddComment();
            $articlesController->testArticleId($_GET['article']);  
    } 
} else {
    $homeController->home();
}



?>