<?php 

class Conexion{
    

    public static function openConnect() {
        $conexion = new mysqli('85.10.205.173:3306','watchapp','','watchapp');
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