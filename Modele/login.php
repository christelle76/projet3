<?php

require_once "modele.php";

class Login extends Modele {

    protected $bdd;
    public $listUsers;
    public $user;

    function __construct() {
        $this->bdd = new Modele();
    }

    public function getUsers() {
        $listUsers = $this->bdd->getBdd()->query("SELECT 'user_id' as id, user_password as 'password' FROM blog_user");
        return $listUsers;
    }

    public function getUser($id) {
        $user = $this->bdd->getBdd()->query("SELECT * FROM blog_user WHERE user_id ='" . $id . "'")->fetch();
        return $user;
    }

}