<?php

require_once(__DIR__ . '/../config/conn.php'); 
class recursosModel extends conn{
    public function __construct(){
        parent::__construct();
    }
    public function consultarFacultad($facultad){
        try {
            $facultad = "%$facultad%";
            $pdo = $this->db->prepare("SELECT * FROM facultades WHERE nombre LIKE :facultad");
            $pdo->bindParam(':facultad', $facultad, PDO::PARAM_STR);
            $pdo->execute();
            $resultado = $pdo->fetch(PDO::FETCH_ASSOC);
            return $resultado;
            
            return implode(", ", $nombres);
        } catch (PDOException $e) {
            error_log("Error en consultarFacultad: " . $e->getMessage());
            return false;
        }
    }
    
        
}
