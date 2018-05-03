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


if (isset($_GET['page'])) {
    switch($_GET['page']){
        case "admin" :
            $session = $loginController->sessionTest();
            $postController->testDeleteArticle();
            $postController->testNewArticle();
            $postController->testValidateComment();
            $postController->testDeleteComment();
            $postController->testUpdateArticle();
   
            if ($session == "false") {
                $homeController->home();
            }   else {
                if(empty($_GET['onglet']) && empty($_GET['modifierArticle'])){
                    $errorController->error();
                }
                if(isset($_GET['onglet'])){
                    switch($_GET['onglet']){
                        case "articles" :
                            $adminController->articles();
                            break; 
                        case "nouvelArticle" :
                            $adminController->newArticlePage();    
                            break;
                        case "commentaires" :
                            $adminController->comments();                  
                            break; 
                        case "":
                            $errorController->error();
                            break;
                        default :
                            $errorController->error();
                    } 
                } else if(isset($_GET['modifierArticle'])){  
                    $adminController->modifyArticle($_GET['modifierArticle']);
                }
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