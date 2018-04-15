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
         case "admin" :
            $loginController->sessionTest();
            if(isset($_GET['onglet'])){
                switch($_GET['onglet']){
                    case "articles" :
                        $adminController->articles();
                        break; 
                    case "nouvelArticle" :
                        $adminController->newArticlePage();    
                        if (isset($_POST['titleNewArticle']) && isset($_POST['contentNewArticle'])) {
                            $adminController->newArticle(htmlspecialchar($_POST['titleNewArticle']),htmlspecialchar($_POST['contentNewArticle']), date("Y-m-d  H:i:s"));
                        }   
                        break;
                    case "commentaires" :
                        $adminController->comments();                  
                        break; 
                    default :
                        echo "yolo";
                } 
            } else if(isset($_GET['modifierArticle'])){
                $adminController->modifyArticle($_GET['modifierArticle']);
            }
            break;
        default : 
            echo "def"; 
    }
} else if (isset($_GET['article'])) {
    $articlesController->article($_GET['article']);   
} else {
    $homeController->home();
}

if (isset($_POST['id']) && isset($_POST['password'])) {
    $loginController->loginTest(htmlspecialchar($_POST['id']),htmlspecialchar($_POST['password']));
} 
if(isset($_POST['commentIdValidate'])){
    $adminController->validateComment(htmlspecialchar($_POST['commentIdValidate']));
}
if(isset($_POST['commentIdDelete'])){
    $adminController->deleteComment(htmlspecialchar($_POST['commentIdDelete']));
}
if (isset($_POST["commentId"])) {
    $commentsController->report(htmlspecialchar($_POST["commentId"]));
} 
if (isset($_POST["auteur"]) && isset($_POST["message"])) {
    $commentsController->addComment(htmlspecialchar($_POST["auteur"]), htmlspecialchar($_POST["message"]), date("Y-m-d  H:i:s"), $_POST["articleId"]);
} 

if(isset($_POST['ajouterArticle'])){
    $adminController->newArticlePage();
}
if (isset($_POST["deleteArticle"])) {
    $adminController->deleteArticle(htmlspecialchar($_POST["deleteArticle"]));
} 
?>