<?php

namespace App\Controllers;

use App\core\App;

class UsersController
{
    //grab the pdo instance which is now sitting in app array

    //$user = App::get('database')->createRow('users', 'user_name', $_POST['name']);

    //more than one key when you add the row
    public function store()
    {
        App::get('database')->createRow(
            'users',
            [
                'user_name' => $_POST['name'],
                'fav_food' => $_POST['food']
            ]
        );

        $user_last = App::get('database')->selectOne('users', 'user_name', $_POST['name']);

        return views('users', compact('user_last'));
    }
}
