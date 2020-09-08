<?php

namespace App\core;

class Router
{
    public $routes = [
        'GET' => [],
        'POST' => []
    ];

    public static function load($file)
    {
        $router = new self();
        require $file;
        return $router;
    }


    // public function define($routes)
    // {
    //     //pass in an array of routes which we now store on the
    //     //object instance using magic keyword $this
    //     $this->routes = $routes;
    // }


    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    public function direct($uri, $method)
    {
        //move the logic of going to controller here
        //if you have a uri that matches your route string
        //then go to that controller file
        //pass in key and pass in array to search

        if (array_key_exists($uri, $this->routes[$method])) {
            $phrase = $this->routes[$method][$uri];
            //explode is like a JS split(), but you put the delimiter first
            $words = explode("@", $phrase);

            //var_dump("what is?", var_dump($this->callAction($words[0], $words[1])));
            return $this->callAction(...$words);
            // $last_piece = strrpos($phrase, "@");
            // $last_part = substr($phrase, $last_piece);
            // $first_part = substr($phrase, 0, $last_piece);
            //return ($this->routes[$method][$uri]);
        }
        throw new Exception("no route defined for this URI.");
    }

    protected function callAction($controller, $action)

    {
        $controller = "App\\Controllers\\{$controller}";
        //die($controller);
        $controller = new $controller;
        if (!method_exists($controller, $action)) {
            throw new Exception("action $action doesn't exist");
        }
        //die(var_dump("what is", (new $controller)->$action()));
        return $controller->$action();
    }
}
