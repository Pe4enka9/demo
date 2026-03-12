<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    // Главная
    public function index(): View
    {
        return view('home');
    }
}
