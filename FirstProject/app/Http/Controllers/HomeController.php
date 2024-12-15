<?php

namespace App\Http\Controllers;

use Illuminate\Support\Request;


class HomeController extends Controller
{
 function index() {
    $name = "Yoan";
        return view('home',
        ['name' => $name]);
    }
}
