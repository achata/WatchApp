<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->post('/api/estudiante',function(Request $request, Response $response){
    
    try {

        
    } catch (mysqli_sql_exception $e) {
        
    }

    return $response;
});

?>