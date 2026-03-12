<?php

namespace App\Http\Controllers\Admin;

use App\Enums\AppStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Applications\UpdateApplicationRequest;
use App\Models\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ApplicationController extends Controller
{
    // Все заявки
    public function index(): View
    {
        $applications = Application::latest()->get();

        $appStatuses = array_filter(
            AppStatus::cases(),
            fn($status) => $status->name !== 'PENDING'
        );

        $statuses = [
            'pending' => 'bg-warning',
            'success' => 'bg-success text-white',
            'cancelled' => 'bg-danger text-white'
        ];

        return view('admin.applications.index', [
            'applications' => $applications,
            'appStatuses' => $appStatuses,
            'statuses' => $statuses,
        ]);
    }

    // Изменение статуса заявки
    public function update(
        Application              $application,
        UpdateApplicationRequest $request,
    ): RedirectResponse
    {
        $application->update([
            'status' => $request->status,
            'reason' => $request->reason,
        ]);

        return redirect()->route('admin.applications.index');
    }
}
