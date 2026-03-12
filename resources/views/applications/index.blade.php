@extends('theme')
@section('title', 'Мои заявки')
@section('content')
    <h1 class="mb-3">Мои заявки</h1>
    <a href="{{ route('applications.create') }}" class="mb-3 btn btn-primary">+ Новая заявка</a>

    <div class="row g-3">
        @foreach($applications as $application)
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                <div class="p-3 rounded-3 shadow-sm border bg-white">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div>{{ $application->service->name }}</div>
                        <div class="bg-warning rounded-2 py-1 px-2">{{ $application->status->label() }}</div>
                    </div>

                    <div class="d-flex align-items-end justify-content-between">
                        <div>
                            <div>{{ $application->phone }}</div>
                            <div>{{ $application->payment_method->label() }}</div>
                        </div>

                        <div class="d-flex flex-column align-items-end">
                            <div>{{ $application->address }}</div>
                            <time datetime="2026-03-12T12:00">{{ $application->date }}</time>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
