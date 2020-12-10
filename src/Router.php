<?php

declare(strict_types=1);

namespace alkimisti\simplerouter;


class Router
{
    public function resolve()
    {
        $url = $this->get_path_info();
        $klasa = (!isset($url[1]) || empty($url[1])) ? "Home" : $url[1];
        $controller = "\\App\\Controllers\\" . ucfirst($klasa) . "Controller";
        $method = (!isset($url[2]) || empty($url[2])) ? "index" : $url[2];

        if (class_exists($controller)) {
            $c = new \ReflectionClass($controller);
            if ($c->isInstantiable()) {
                $cont = new $controller;
                if ($c->hasMethod($method)) {
                    $m = new \ReflectionMethod($controller, $method);
                    if ($m->isPublic() && !$m->isAbstract()) {
                        $u = array_slice($url, 3);
                        $cont->$method(...$u);
                        die();
                    }
                }
            }
        }

        header("HTTP/1.0 404 Not Found");
    }

    public function get_path_info()
    {
        if (isset($_SERVER['PATH_INFO'])) {
            $path_info = $_SERVER['PATH_INFO'];
        } else {
            $pos = strpos($_SERVER['REQUEST_URI'], "?");
            if ($pos !== false) {
                $path_info = substr($_SERVER['REQUEST_URI'], 0, $pos);
            } else {
                $path_info = $_SERVER['REQUEST_URI'];
            }
        }

        $path_info = rtrim($path_info, "/");
        return explode("/", $path_info);
    }
}