<?php

require_once('Modele/modele.php');

class ErrorController {

  public function __construct() {
    
  }

  public function error() {
      require_once("View/errorView.php");
  }

}