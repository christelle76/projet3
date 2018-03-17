<?php

class Modele {

    protected $bdd;

    function __contruct() {
        
    }

    public function getBdd() {
    $bdd = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '');
    return $bdd;
    }
}