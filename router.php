<?php 
require_once('Controller/HomeController.php');
require_once('Controller/ArticlesController.php');
require_once('Controller/LoginController.php');
require_once('Controller/CommentsController.php');
require_once('Controller/AdminController.php');

$homeController = new HomeController;
$articlesController = new ArticlesController;
$loginController = new LoginController;
$commentsController = new CommentsController;
$adminController = new AdminController;

if (isset($_GET['page'])) {
    switch($_GET['page']){
        case "home" : 
            $homeController->home();
            break;
        case "admin" :
            $loginController->sessionTest();
            if(isset($_GET['onglet'])){
                switch($_GET['onglet']){
                    case "articles" :
                        $adminController->articles();
                        if (isset($_POST["deleteArticle"])) {
                            $adminController->deleteArticle($_POST["deleteArticle"]);
                        } 
                        break; 
                    case "nouvelArticle" :
                        $adminController->newArticle();
                        if(isset($_POST['ajouterArticle'])){
                            $adminController->newArticle($titre, $contenu, date("d-m-Y  H:i:s"));
                        }
                        break;
                    case "commentaires" :
                        $adminController->comments();
                        if(isset($_POST['commentIdValidate'])){
                            $adminController->validateComment($_POST['commentIdValidate']);
                        }
                        if(isset($_POST['commentIdDelete'])){
                            $adminController->deleteComment($_POST['commentIdValidate']);
                        }
                        break;
                    default :
                        echo "yolo";
                } 
            }
            var_dump($_GET['onglet']);
            break;
        default : 
            echo "def"; 
    }
} else if (isset($_GET['article'])) {
    $articlesController->article($_GET['article']);  
    //$articlesController->addArticle(isset($_POST['']));
    if (isset($_POST["commentId"])) {
        $commentsController->report($_POST["commentId"]);
    } 
    if (isset($_POST["auteur"]) && isset($_POST["message"])) {
        $commentsController->addComment($_POST["auteur"], $_POST["message"], date("d-m-Y  H:i:s"), $_POST["articleId"]);
        var_dump("test ajout");
    } 
} else {
    $homeController->home();
}

if (isset($_POST['id']) && isset($_POST['password'])) {
    $loginController->loginTest($_POST['id'],$_POST['password']);
} 

?>