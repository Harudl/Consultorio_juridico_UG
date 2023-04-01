<?php
   session_start();

class HomeController {
  private $model;

   /* public function __construct() {
        $this->model = new HomeModel();
    }*/

  public function mostrarHomeAdmi() {
    require_once 'views/Home/Home_Admi.php';
  }

  public function mostrarHomeAsesor() {
      require_once 'views/Home/Home_Asesor.php';
  }
}

