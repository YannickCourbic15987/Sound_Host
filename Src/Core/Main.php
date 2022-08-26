<?php

namespace App\Src\Core;

use App\Src\Controller\HomeController;

class Main
{

    public function start()
    {

        session_start();
        if (empty($_GET['page'])) {
            require_once ROOT . "/Views/Home/home.php";
        } else {
            /**
             * *je retire le trailing slash 
             */
            $uri = $_SERVER['REQUEST_URI'];
            $slash = substr($_GET['page'], -1);
            if ($slash === "/") {
                $uri = substr($uri, 0, -1);

                header('location:' . $uri);
            }
            // var_dump($_GET);

            /**
             * * je récupère 
             */
            // var_dump($uri);
            $params = explode("/", $_GET['page']);

            $controller = "App\\Src\\Controller\\" . ucfirst($params[0]) . "Controller";

            if (class_exists($controller)) {
                $controller = new $controller;
                if (count($params) > 1) {
                    call_user_func_array(array($controller, "display"), array($params[1]));
                } else {

                    $controller->index();
                }
            } else {
                echo "la page n'existe pas !";
            }
        }
    }
}
