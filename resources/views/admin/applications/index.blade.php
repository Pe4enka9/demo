@extends('theme')
@section('title', 'Админ-панель')
@section('content')
    <h1 class="mb-3">Админ-панель</h1>

    <div class="row g-3">
        @foreach($applications as $application)
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                <div class="p-3 rounded-3 shadow-sm border bg-white">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div>{{ $application->service ? $application->service->name : $application->another_service }}</div>

                        <div class="{{ $statuses[$application->status->value] }} rounded-2 py-1 px-2">
                            {{ $application->status->label() }}
                        </div>
                    </div>

                    <div class="d-flex align-items-end justify-content-between mb-3">
                        <div>
                            <div>{{ $application->phone }}</div>
                            <div>{{ $application->payment_method->label() }}</div>
                        </div>

                        <div class="d-flex flex-column align-items-end">
                            <div>{{ $application->address }}</div>

                            <time datetime="{{ $application->date->format('Y-m-d\TH:i') }}">
                                {{ $application->date->format('d.m.Y H:i') }}
                            </time>
                        </div>
                    </div>

                    <form
                        action="{{ route('admin.applications.update', $application) }}" method="post"
                        class="status-form needs-validation" novalidate
                    >
                        @csrf
                        @method('PATCH')

                        <div class="mb-3">
                            <select name="status" class="form-select" required>
                                @foreach($appStatuses as $status)
                                    <option
                                        value="{{ $status }}"
                                        @selected($status === $application->status)
                                    >
                                        {{ $status->label() }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3 reason d-none">
                            <textarea
                                name="reason" class="form-control"
                                placeholder="Укажите причину"
                                disabled></textarea>
                        </div>

                        <button type="submit" class="btn btn-success w-100">Изменить</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/validation.js') }}"></script>

    <script>
        const selects = document.querySelectorAll('select[name="status"]');

        selects.forEach(select => {
            select.addEventListener('change', function () {
                const reason = select.closest('form').querySelector('.reason');
                const reasonTextarea = select.closest('form').querySelector('textarea[name="reason"]');
                reason.classList.toggle('d-none', this.value !== 'cancelled');

                if (this.value === 'cancelled') {
                    reasonTextarea.required = true;
                    reasonTextarea.disabled = false;
                } else {
                    reasonTextarea.required = false;
                    reasonTextarea.disabled = true;
                }
            });
        });
    </script>
@endpush
