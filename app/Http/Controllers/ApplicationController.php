<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ApplicationController extends Controller
{
    // Все заявки
    public function index(): View
    {
        $applications = auth()->user()->applications;

        return view('applications.index', ['applications' => $applications]);
    }

    // Форма создания заявки
    public function create(): View
    {
        $services = Service::all();

        return view('applications.create', ['services' => $services]);
    }

    // Создание заявки
    public function store(): RedirectResponse
    {

    }
}
