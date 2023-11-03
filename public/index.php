<?php 

require './vendor/autoload.php';

use Symfony\Component\HttpFoundation\Response;

function getApiServiceClassName($url) {
    if (empty($url)) {
        return null;
    }

    $serviceName = 'App\Services\\'.ucfirst(array_shift($url) . 'Service');

    return class_exists($serviceName) ? $serviceName : null;
}

function handleApiRequest($url) {
    $serviceClassName = getApiServiceClassName($url);
    
    if ($serviceClassName === null) {
        return new Response('Faltando Serviço', Response::HTTP_BAD_REQUEST);
    }

    array_shift($url);
    $method = strtolower($_SERVER['REQUEST_METHOD']);
  
    $id = isset($url[0]) ? intval($url[0]) : null;
    
    try {
        $service = new $serviceClassName();
        $result = call_user_func([$service, $method], $id);

        if ($result !== null) {
            return new Response($result, Response::HTTP_OK);
        } else {
            return new Response('Recurso não encontrado', Response::HTTP_NOT_FOUND);
        }
    } catch (\PDOException $err) {
        return new Response('Erro interno do servidor', Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}

if (!isset($_SERVER['REQUEST_URI'])) {
    $response = new Response('Faltando REQUEST_URI', Response::HTTP_BAD_REQUEST);
} else {
    $url = explode('/', ltrim($_SERVER['REQUEST_URI'], '/'));
    array_shift($url);
    $response = handleApiRequest($url);
}

$response->send();