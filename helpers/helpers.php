<?php
date_default_timezone_set('America/Mexico_City');

    class helpers{
        public function __construct() {
        
        }
        public function publicUrl(){
            echo "http://localhost/ticket/public/";
        }
        public function Url(){
            echo "http://localhost/ticket";
        }
        public function foliosTickets(){
            //DíaMesAño+5digitosaleatorios
            $today = date("dmy");     
            $random = str_pad(mt_rand(0, 99999), 5, '0', STR_PAD_LEFT);
            $folio = $today.'-' . $random;
            return $folio;

        }
        public function fechaDehoyHora(){
            $today = date("F j, Y, g:i a");   
            return $today;  
        }
        public static function formatearFecha($fecha){
            // Si la fecha contiene "GMT", la removemos para que sea compatible con el formato
            if (strpos($fecha, 'GMT') !== false) {
                $fecha = str_replace('GMT', '', $fecha);  // Remover "GMT"
            }
        
            // Intentamos crear el objeto DateTime con el formato ajustado
            $fecha_obj = DateTime::createFromFormat('D M d Y H:i:s O', $fecha);
        
            // Si se pudo crear el objeto DateTime, devolvemos la fecha en formato 'Y-m-d'
            if ($fecha_obj) {
                return $fecha_obj->format('Y-m-d');
            } else {
                // Si no se pudo crear el objeto DateTime, devolvemos false
                return false;
            }
        }
        
    }

?>