<?php
class conn {
    protected $db;

    public function __construct() {
        $url = "localhost";
        $bdname = "proto";
        $user = "root";
        $pass = "17A07n95t%Rmz!";

        try {
            $this->db = new PDO("mysql:host=$url;dbname=$bdname;charset=utf8mb4", $user, $pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
            echo "Conexión exitosa a la base de datos.";
        } catch (PDOException $e) {
            die("Error en la conexión: " . $e->getMessage());
        }
    }
    /*public static function ruta(){
        return "http://localhost/ticket/";
    }
    public static function usuarioAutenticado() {
        return isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
    }*/
    
}
?>