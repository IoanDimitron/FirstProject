<?php

namespace App\Http\Controllers;

use Illuminate\Support\Request;


class HomeController extends Controller
{
 function index() {
    $user = Auth()->user();
    $name = $user != null ? $user->name : "";
        return view('home',
        ['name' => $name]);
    }
}
