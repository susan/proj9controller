<?php

namespace App\Controllers;

use App\core\App;

class PagesController
{

    public function home()
    {

        $tasks = App::get('database')->selectAll('todos');
        //require './views/index.view.php';
        // return views('index', [
        //     'tasks' => $tasks
        // ]);
        return views('index', compact("tasks"));
    }

    public function about()
    {
        return views('about');
    }

    public function contact()
    {

        return views('contact');
    }
}
