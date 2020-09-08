<?php

namespace App\core;

class Request
{

    //protected $URI;

    public static function makeURI()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        return trim($uri, "/");
    }

    public static function method()
    {
        return ($_SERVER['REQUEST_METHOD']);
    }
}
