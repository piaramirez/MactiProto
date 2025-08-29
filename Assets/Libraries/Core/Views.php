<?php
class Views{
    public function getView($controller, $view, $data=""){
        $controller = get_class($controller);
        //var_dump($controller ."w");
        if($controller == "home"){
            $view = "view/".$view.".php";
            //echo "esta es la vista:".$view." </br>";
        }else if($controller == "Registro"){
            $view = "view/".$view.".php";
            //echo "esta es la vista:".$view." </br>";
        }else{
            $view = "view/".$controller."/".$view.".php";
        }

        require_once($view); 
    }
  
    
}