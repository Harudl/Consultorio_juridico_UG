<?php

$controlador = (isset($_GET['c']))?$_GET['c']:'Index';
$accion =(isset($_GET['a']))?$_GET['a']:'index';


if(!empty($controlador) && !empty($accion)){
    $controlador = ucwords(strtolower($controlador)).'Controller';   
    require_once './controller/'.$controlador.'.php';
    $objControlador = new $controlador();
    $objControlador->$accion();
}
    