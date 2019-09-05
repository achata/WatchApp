<?php 

class Conexion{
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $database = 'watchapp';

    public static function openConnect() {
        $conexion = new mysqli('localhost','root','','watchapp');
        //$conexion = new mysqli($this->$host,$this->$user,$this->$password,$this->$database);
        if($conexion->connection_errno){
            echo "ERROR CONEXION";
        }
        //echo $conexion->host_info;
        return $conexion;
    }

    //cerrar conxion o no? :v
}

?>