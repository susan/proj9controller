<?php

// $router->define([
//     '' => 'controllers/index.controller.php',
//     'about' => 'controllers/about.controller.php',
//     'contact' => 'controllers/contact.controller.php',
//     'names' => 'controllers/add_names.controller.php'
// ]);

$router->get('', 'PagesController@home');
$router->get('about', 'PagesController@about');
$router->get('contact', 'PagesController@contact');
$router->post('users', 'UsersController@store');
