<?php
require_once("config/globals.php");
require_once("helpers/helpers.php");
    /**
     * Creamos la función para recibir los parámetros de la URL
    */
    $url = !empty($_GET['url']) ? $_GET['url'] : 'home/home';
    $arrUrl = explode("/", $url);
    $controller = $arrUrl[0];
    $metodo = isset($arrUrl[1]) ? $arrUrl[1] : $controller;
    $submetodo = isset($arrUrl[2]) ? $arrUrl[2] : "";
    $parametros = [];
    if (isset($arrUrl[3])) {
        $parametros = array_slice($arrUrl, 3);
    } elseif (isset($arrUrl[2]) && !$submetodo) {
        $parametros = array_slice($arrUrl, 2);
    }
    $parametros = implode(',', $parametros);
    /*
        echo "Controlador: $controller<br>";
        echo "Método: $metodo<br>";
        echo "Sub-método: $submetodo<br>";
        echo "Parámetros: $parametros<br>";
    */
    
    

    require_once("Assets/Libraries/Core/Autoload.php");
    require_once("Assets/Libraries/Core/Load.php");
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/