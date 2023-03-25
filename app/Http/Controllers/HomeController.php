<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title = "Dashbord";

        return view('dashboard' , ['title' => $title]);
    }
}
