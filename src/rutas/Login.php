<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->post('/api/login',function(Request $request, Response $response){
   
    $usuario = $request->getParam("usuario");
    $clave = $request->getParam("clave");
    $tipoUsuario = $request->getParam("tipoUsuario");

    //$usp = "Select * from articulo";
    $usp = "CALL USP_LOGIN(?,?,?,@p_retorno);";

    try {
        $conexion = Conexion::openConnect();
        $resultado = $conexion->prepare($usp);     

        $resultado->bind_param("isi",
            $usuario,
            $clave,
            $tipoUsuario
        );
 
        $resultado->execute();
        $resultado->bind_result($retorno);
        $resultado->fetch();
        

        /*$callRetorno = $conexion->query("Select @p_retorno;");
        $temp = $callRetorno->fetch_assoc();
        $retorno = $temp["@p_retorno"];*/
        
        echo json_encode($retorno);
        
    } catch (mysqli_sql_exception $e) {
        echo json_encode($e);
    }

    return $response;
});

?>