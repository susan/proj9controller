<?php
//require './controllers/index.controller.php';
require 'vendor/autoload.php';
$query = require 'core/bootstrap.php';

use App\core\{Router, Request};

//require 'core/bootstrap.php';

// $router = new Router();
// require 'routes.php';

//var_dump(trim($_SERVER['REQUEST_URI'], '/'));

//$uri = trim($_SERVER['REQUEST_URI'], '/');

//require Router::load('routes.php')->direct(Request::makeURI());
// $file = Router::load('./routes.php')->direct(Request::makeURI(), Request::method());
// die(var_dump("what is", $file));
Router::load('app/routes.php')->direct(Request::makeURI(), Request::method());
