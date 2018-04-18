<?php 
require_once('Controller/HomeController.php');
require_once('Controller/ArticlesController.php');
require_once('Controller/LoginController.php');
require_once('Controller/CommentsController.php');
require_once('Controller/AdminController.php');
require_once('Controller/ErrorController.php');

$homeController = new HomeController;
$articlesController = new ArticlesController;
$loginController = new LoginController;
$commentsController = new CommentsController;
$adminController = new AdminController;
$errorController = new ErrorController;

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
            $articlesController->article($_GET['article']);  
    } 
} else {
    $homeController->home();
}

if (isset($_POST['id']) && isset($_POST['password'])) {
    $loginController->loginTest(htmlspecialchars($_POST['id']),htmlspecialchars($_POST['password']));
} 
if(isset($_POST['commentIdValidate'])){
    $adminController->validateComment(htmlspecialchars($_POST['commentIdValidate']));
}
if(isset($_POST['commentIdDelete'])){
    $adminController->deleteComment(htmlspecialchars($_POST['commentIdDelete']));
}
if (isset($_POST["commentId"])) {
    $commentsController->report(htmlspecialchars($_POST["commentId"]));
} 
if (isset($_POST["auteur"]) && isset($_POST["message"])) {
    $commentsController->addComment(htmlspecialchars($_POST["auteur"]), htmlspecialchars($_POST["message"]), date("Y-m-d  H:i:s"), $_POST["articleId"]);
} 

if(isset($_POST['titleNewArticle']) && $_POST['contentNewArticle']){
    $adminController->newArticle($_POST['titleNewArticle'],$_POST['contentNewArticle'], date("Y-m-d  H:i:s"));
}

if(isset($_POST['titleModifyArticle']) && $_POST['contentModifyArticle']){
    $adminController->updateArticle($_GET['modifierArticle'],$_POST['titleModifyArticle'],$_POST['contentModifyArticle'], date("Y-m-d  H:i:s"));
}

if (isset($_POST["deleteArticle"])) {
    $adminController->deleteArticle(htmlspecialchars($_POST["deleteArticle"]));
    $commentsController->deleteComments(htmlspecialchars($_POST["deleteArticle"]));
} 
if (isset($_POST["disconnect"])) {
    $loginController->disconnect(htmlspecialchars($_POST["disconnect"]));
}

?>