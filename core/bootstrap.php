<?php
//old way where we stored config in app array:
//$app = [];
//$app['config'] = require 'config.php';

//new way where we make a class for App and static bind method for key value pairs
use App\core\App;

App::bind('config', require 'config.php');

//$pdo = Connection::connecttoDB();
//this language to the right is used instead of making new Connection instance
//$query = new QueryBuilder(Connection::connecttoDB( put in the config stuff)) 
//$app['database'] = new QueryBuilder(Connection::connecttoDB($app['config']['database']));
App::bind(
    'database',
    new QueryBuilder(Connection::connecttoDB(App::get('config')['database']))
);

function views($view, $data = [])
{
    extract($data);
    return require "app/views/{$view}.view.php";
}


//die(var_dump(App::$registry));

//dont need to require files if have composer
    // include('core/Router.php');
    // include('core/database/Connection.php');
    // include('core/Request.php');
    // include('core/database/QueryBuilder.php');


//show how $app looks using pre html tags
//echo '<pre>';
//die(var_dump($app));
//echo '</pre>';
