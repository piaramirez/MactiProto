<?php


class recursosController{
    public function __construct() { }
    public static function buscarFacultad($facultad){
        
        
    }
}

$recursos = new recursosController();
$action  = $_POST['action'] ?? '';
header('Content-Type: application/json');
switch($action){
    case 'bFacultad':
        $facultad = $_POST['subdominio'] ?? '';
        $respuesta = $recursos::buscarFacultad($facultad);

        echo json_encode([
            'success' => true,
            'respuesta' => $respuesta
        ]);
        exit;
        break;
    default:
    echo json_encode([
        'success' => false,
        'respuesta' => "Acción desconocida"
    ]);
    exit;
    break;
}    