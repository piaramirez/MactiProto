<?php
class Controllers{
    protected $view;
    protected $model;
    public function __construct(){
       // echo   " <br >Hola desde Controllers <br>";
        $this->view = new Views();
        $this->loadModel();
    }
    public function loadModel(){
        $model = get_class($this)."Model";
        $routClass = "models/".$model.".php";
        //var_dump($routClass);
        
        if(file_exists($routClass)){
            require_once($routClass);
            $this->model = new $model();
        }else{
            echo "No existe el archivo solicitado </br>";
        }   
        
    }
    
}