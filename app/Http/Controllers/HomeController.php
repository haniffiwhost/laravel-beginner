<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $data = ['title' => 'Welcome to Blade'];
        $name = ['title' => 'Welcome to Blade'];
        return view('home', $data, $name);
    }
}
