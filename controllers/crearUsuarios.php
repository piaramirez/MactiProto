<?php
class crearUsuarios {
    public function __construct() {}

    public static function crearUsuario($nombre, $apellido, $email, $fac){
        return "Comemdme los huvos";

    }
}


$usuario = new crearUsuarios();
$accion = $_POST['accion'] ?? '';
header('Content-Type: application/json');
switch ($accion){
    case 'insertar':
        $nombre = $_POST['nombre'] ?? '';
        $apellido = $_POST['apellido'] ?? '';
        $email = $_POST['email'] ?? '';
        $fac = $_POST['fac'] ?? '';

        if ($nombre === '' || $apellido === '' || $fac === '' || $email === '') {
            echo json_encode([
                'success' => false,
                'respuesta' => "Uno o más campos están vacíos"
            ]);
            exit;
        } else {
            $mensaje = $usuario::crearUsuario($nombre, $apellido, $email, $fac);

            echo json_encode([
                'success' => true,
                'respuesta' => $mensaje
            ]);
            exit;
        }
        break;

    default:
        echo json_encode([
            'success' => false,
            'respuesta' => "Acción desconocida"
        ]);
        exit;
        break;
}
