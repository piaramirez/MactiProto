<?php
class Registro extends Controllers{
    protected $view;
    public function __construct() {
        parent::__construct();
        //echo "Dentro de C. registro";
    }
    public function Registro(){
        $data['tag_page'] = "Registro";
        $data['page_title'] = "Pagina principal";
        $data['page_name'] = "home";
        $data['page_functions_js'] = "functions_home.js";
        $this->view->getView($this, "Registro", $data);
    }
}