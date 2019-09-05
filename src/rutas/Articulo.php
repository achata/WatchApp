<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

//$app = AppFactory::create();
//GET Estudiante

$app->get('/api/articulo/estudiante/{id}',function(Request $request, Response $response){
    $id_estudiante = $request->getAttribute('id');
    $usp = "CALL USP_SEL_ARTICULO($id_estudiante)";
    $array = array();
    //$array = [1,2,3];

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

$app->post('/api/articulo',function(Request $request, Response $response){
    
    $idEstudiante = $request->getParam("idEstudiante");
    $nombre = $request->getParam("nombre");
    $marca = $request->getParam("marca");
    $detalle1 = $request->getParam("detalle1");
    $detalle2 = $request->getParam("detalle2");
    $detalle3 = $request->getParam("detalle3");
    $qr = $request->getParam("qr");
    $foto = $request->getParam("foto");

    $usp = "CALL USP_INS_ARTICULO(
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        @p_retorno
)";

    try {
        $conexion = Conexion::openConnect();
        $resultado = $conexion->prepare($usp);
        
        $resultado->bind_Param('ssssssss',
            $idEstudiante,
            $nombre,
            $marca,
            $detalle1,
            $detalle2,
            $detalle3,
            $qr,
            $foto
        );

        $resultado->execute();

        $callRetorno = $conexion->query("Select @p_retorno");
        $temp = $callRetorno->fetch_assoc();
        $retorno = $temp["@p_retorno"];

        echo json_encode($retorno);
        
    } catch (mysqli_sql_exception $e) {
        echo json_encode($e);
    }

    return $response;
});

//$app->run();

?>