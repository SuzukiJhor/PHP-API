<?php 

// require_once './vendor/autoload.php';

if ($_SERVER['REQUEST_URI']) {
    $url = explode('/', ltrim($_SERVER['REQUEST_URI'], '/'));

    if ($url[0] === 'api') {
        array_shift($url);
        $service = $url[0];

        array_shift($url);

        $method = $_SERVER['REQUEST_METHOD'];
        
    }
}
