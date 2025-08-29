<?php
/**
 * Creamos el método para mandar a llamar los archivos de la carpeta Core
 */
    spl_autoload_register(function($class){
        /*
        Autoload es quien madna a llamar Controler
        */
        if(file_exists("Assets/Libraries/Core/".$class.".php")){
            //echo "Auytoload:  ".$class."<br>";
            require_once("Assets/Libraries/Core/".$class.".php");

        }else{
           //echo"nada, w en autoload";
        }
    });
