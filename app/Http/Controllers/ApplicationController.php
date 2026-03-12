<?php

namespace App\Http\Controllers;

use App\Enums\AppStatus;
use App\Enums\PaymentMethod;
use App\Http\Requests\Applications\CreateApplicationRequest;
use App\Models\Application;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ApplicationController extends Controller
{
    // Все заявки
    public function index(): View
    {
        $applications = auth()->user()->applications()->latest()->get();
        $appStatuses = AppStatus::cases();

        $statuses = [
            'pending' => 'bg-warning',
            'success' => 'bg-success text-white',
            'cancelled' => 'bg-danger text-white'
        ];

        return view('applications.index', [
            'applications' => $applications,
            'appStatuses' => $appStatuses,
            'statuses' => $statuses,
        ]);
    }

    // Форма создания заявки
    public function create(): View
    {
        $services = Service::all();
        $paymentMethods = PaymentMethod::cases();

        return view('applications.create', [
            'services' => $services,
            'paymentMethods' => $paymentMethods,
        ]);
    }

    // Создание заявки
    public function store(CreateApplicationRequest $request): RedirectResponse
    {
        Application::create([
            'user_id' => auth()->id(),
            'service_id' => $request->service,
            'address' => $request->address,
            'phone' => $request->phone,
            'date' => $request->date,
            'another_service' => $request->service_description,
            'payment_method' => $request->payment_method,
        ]);

        return redirect()->route('applications.index');
    }
}
