<?php 

// require_once './vendor/autoload.php';

if ($_SERVER['REQUEST_URI']) {
    $url = explode('/', ltrim($_SERVER['REQUEST_URI'], '/'));

    if ($url[0] === 'api') {
        array_shift($url);
        
        if (isset($url[0])) {
            $service = $url[0];
            array_shift($url);
        }

        var_dump($url);

        $method = strtolower($_SERVER['REQUEST_METHOD']);

        try {
            call_user_func_array
        } catch (\Exception $err) {

        }
    }
}
