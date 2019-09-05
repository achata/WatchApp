<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


require '../vendor/autoload.php';
require '../src/config/Conexion.php';

$app = new  \Slim\App;

require  '../src/rutas/Articulo.php';
require  '../src/rutas/Login.php';
/*$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");
    return $response;
});*/

$app->run();