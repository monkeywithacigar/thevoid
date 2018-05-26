<?php
/**
 * Created using PhpStorm.
 * Creator: Michael Dart
 *
 * AppName: The Void Framework
 */

class Router
{
    private $routes;

    public function __construct()
    {
        $this->routes = $GLOBALS["config"]["routes"];
        $route = $this->findRoute();

        $controller_name = $route["controller"]."Controller";
        $method_name = $route["method"]."Method";

        if (class_exists($controller_name))
        {
            $controller = new $controller_name;

            if (method_exists($controller_name, $method_name))
            {
                $controller->$method_name();
            } else {

                InternalError::show(404);
            }

        } else {
            InternalError::show(404);
        }
    }

    private function routePart($route)
    {
           if (is_array($route))
           {
               $route =  $route["url"];
           }

           $parts = explode("/", $route);

           return $parts;
    }

    private static function url($part)
    {
        $parts = explode("/", $_SERVER["REQUEST_URI"]);

        if ($parts[1] == $GLOBALS["config"]["path"]["index"])
        {
            $part++;
        }

        return (isset($parts[$part])) ? $parts[$part] : "" ;
    }

    private function findRoute()
    {

        if (!empty($this->routes))
        {
            foreach($this->routes as $route)
            {
                $parts = $this->routePart($route);
                $allMatch = true;

                foreach ($parts as $key => $value)
                {
                    if ($value != "*")
                    {
                        if (Router::url($key) != $value)
                        {
                            $allMatch = false;
                        }
                    }
                }

                if ($allMatch)
                {
                    return $route;
                }
            }
        }

        $uri_1 = Router::url(1);
        $uri_2 = Router::url(2);

        if ($uri_1 == "")
        {
            $uri_1 = $GLOBALS["config"]["defaults"]["controller"];

        }

        if ($uri_2 == "")
        {
            $uri_2 = $GLOBALS["config"]["defaults"]["method"];

        }

        $route = array(
            "controller"    => $uri_1,
            "method"        => $uri_2
        );

        return $route;
    }
}