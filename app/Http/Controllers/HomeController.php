<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $users = [
            ['name' => 'Chenje', 'age' => 19],
            ['name' => 'Alice', 'age' => 22],
            ['name' => 'Bob', 'age' => 25]
        ];
        return view ('home', ['users' => $users]);
    }
}
// 'home' -> refers to the home.blade.php file in resources/views folder
// ['name' => $name] -> associative array to pass data to the view   