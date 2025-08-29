<?php
class crearUsuarios {
    public function __construct() {}

    public static function crearUsuario($nombre, $apellido, $username, $email, $accessToken){
        $userData = [
            "username" => $username,
            "firstName" => $nombre,
            "lastName" => $apellido,
            "email" => $email,
            "enabled" => true,
            "credentials" => [
                [
                    "type" => "password",
                    "value" => "17A07n95t%Rmz!",
                    "temporary" => false
                ]
            ]
        ];

        $ch = curl_init("http://localhost:8080/admin/realms/master/users");
        // cambia master si tu realm es otro
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($userData));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json",
            "Authorization: Bearer $accessToken"
        ]);

        $response = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if($httpcode === 201){
            return ["success" => true, "respuesta" => "Usuario creado en Keycloak"];
        } else {
            return ["success" => false, "respuesta" => $response, "http_code" => $httpcode];
        }
    }
}


$usuario = new crearUsuarios();
$accion = $_POST['accion'] ?? '';
header('Content-Type: application/json');
$accessToken = "eyJhbGciOiJIUzI1NiIsInR5cCIgOiAiSldUIiwia2lkIiA6ICJhY2EzOTBiMS01MjQwLTQ3NDctYWMzMC01Yzc2YTJiOWQ1YjQifQ.eyJleHAiOjE3NTY1Mjk2ODgsImlhdCI6MTc1NjQ0MzI4OCwianRpIjoiYWYzNDljOWQtZjJkMS00ZDBkLWEyZTgtMmJkNzg2ZDBlMmUzIiwiaXNzIjoiaHR0cDovL2xvY2FsaG9zdDo4MDgwL3JlYWxtcy9tYXN0ZXIiLCJhdWQiOiJodHRwOi8vbG9jYWxob3N0OjgwODAvcmVhbG1zL21hc3RlciIsInR5cCI6IkluaXRpYWxBY2Nlc3NUb2tlbiJ9.OlZVSfwdxFaTynH-j06QsMoi63pOoghlR6v0AGMys3M"; 
switch ($accion){
    case 'insertar':
        $nombre = $_POST['nombre'] ?? '';
        $apellido = $_POST['apellido'] ?? '';
        $username = $_POST['username'] ?? '';
        $email = $_POST['email'] ?? '';

        if ($nombre === '' || $apellido === '' || $username === '' || $email === '') {
            echo json_encode([
                'success' => false,
                'respuesta' => "Uno o más campos están vacíos"
            ]);
            exit;
        } else {
            $mensaje = $usuario::crearUsuario($nombre, $apellido, $username, $email);

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
