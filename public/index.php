<?php 

use App\Services\UserService;

if ($_SERVER['REQUEST_URI']) {
    $url = explode('/', ltrim($_SERVER['REQUEST_URI'], '/'));

    if ($url[0] === 'api') {
        array_shift($url);
        
        if (isset($url[0])) {
            $service = 'App\Services\\'.ucfirst($url[0].'Service');
            $method = strtolower($_SERVER['REQUEST_METHOD']);
            array_shift($url);
        }

        try {
            // $func = (new UserService);
            // var_dump($func);
            // echo call_user_func(array(new $service, $method), $url);
        } catch (\PDOException $err) {
            return $err->getMessage();
        }

        var_dump($service, $method, $url);

      
    }
} else {
    echo 'Faltando REQUEST_URI';
}
