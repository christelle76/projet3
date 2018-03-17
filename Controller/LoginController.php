<?php

require_once("Modele/modele.php");
require_once("Modele/login.php");

class LoginController {

    private $bdd;
    
    public function __construct(){
        
    }

    public function connectAdminArea(){
        echo "vous etes connecté";
        require_once('View/loginResultView.php');
    }

    public function loginFailed(){
        echo "vous n'etes pas connecté.";
        require_once('View/loginResultView.php');
    }

    public function hashPassword($userPassword) {
        $this->userPasswordHashed = password_hash($userPassword, PASSWORD_DEFAULT);
        return $this->userPasswordHashed;
    }
}