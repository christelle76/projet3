<?php

require_once("Modele/modele.php");
require_once("Modele/login.php");

class LoginController {

    private $bdd;
    
    public function __construct(){
        
    }
    
    public function home() {
        header("Location: index.php");
        exit();
    }

    public function connectAdminArea(){
        header("Location: index?page=admin&onglet=articles");
        exit();
    }

    public function hashPassword($password) {
        $userPasswordHashed = md5(md5($password));
        return $userPasswordHashed;
    }

    function loginTest($id, $password) {
        $this->login = new Login;
        $user = $this->login->getUser($id);
        $isPasswordCorrect = ($this->hashPassword($password) == $user['user_password']);

        if($isPasswordCorrect){
            $_SESSION['id'] = $id;
            $_SESSION['state'] = "connected";
            $result = $this->connectAdminArea();
        }         
    }

    function sessionTest() {
        if (isset($_SESSION['id']) && isset($_SESSION['state'])) {
            return $session = "true";
        } else {
            $this->home();
        }
    }

    function disconnect() {
        unset($_SESSION['id']);
        unset($_SESSION['state']);
    }

}