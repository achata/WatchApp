<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->post('/api/estudiante/{id}',function(Request $request, Response $response){
    
    $id = $request->getAttribute('id');
    $usp = "USP_SEL_ESTUDIANTE_ID($id)";
    $array = array();
    try {
        $conexion = Conexion::openConnect();
        $resultado = $conexion->query($usp);
        if($resultado->num_rows > 0){
            while($row = $resultado->fetch_array(MYSQLI_ASSOC)){
                $array[] = $row;
            }
            echo json_encode($array);
        }   
    } catch (mysqli_sql_exception $e) {
        echo $e;
    }

    return $response;
});

?>