<?php

require_once("modele.php");

class Login extends Modele {

    protected $bdd;
    protected $listUsers;
    private $user_id;
    private $user_password;
    private $user_password_hashed;

    function __construct() {
        $this->bdd = new Modele();
    }

    public function getUsers() {
        $listUsers = $this->bdd->getBdd()->query("SELECT 'user_id' as id, user_password as 'password' FROM blog_user");
        return $listUsers;
    }

    

}