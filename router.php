<?php 
require_once('Controller/HomeController.php');
require_once('Controller/ArticlesController.php');
require_once('Controller/LoginController.php');

//Ici - on déclares nos classes controleurs
$homeController = new HomeController;
$articlesController = new ArticlesController;
$loginController = new LoginController;


if(isset($_GET['action']))
{
    switch($_GET['action']){
        case "home" : 
            $homeController->home();
            break;
        case "login":
            $loginController->connected();
            break;
        default : echo "def"; 
    }
} else if (isset($_GET['article'])) {

    $articlesController->article($_GET['article']);  

} else {
    $homeController->home();
}

if(isset($_POST['id']) && isset($_POST['password'])) {
    $users = $loginController->bdd->getBdd()->getUsers();
    foreach($users as $user) {
        if (($_POST['id'] == $id) && ($_POST['$password'] == $loginController->hashPassword($password))) {
            $resultConnexion = "true";
            $loginController->connectAdminArea();
        } else {
            $resultConnexion = "false";
            $loginController->loginFailed();
        }
    }
}

?>