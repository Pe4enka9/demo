@extends('theme')
@section('title', 'Новая заявка')
@section('content')
    <form
        action="{{ route('applications.store') }}" method="post"
        class="col-sm-10 col-md-8 col-lg-6 col-xl-5 m-auto bg-white p-4 rounded-3 needs-validation shadow-sm"
        novalidate
    >
        @csrf
        <h1 class="mb-3 text-center">Новая заявка</h1>

        <div class="mb-3">
            <label for="address" class="form-label">Адрес</label>
            <input
                type="text" name="address" id="address"
                class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}"
                placeholder="Укажите ваш адрес"
                required
            >

            @error('address')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Телефон</label>
            <input
                type="tel" name="phone" id="phone"
                class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                placeholder="+7(XXX)-XXX-XX-XX"
                pattern="^\+7\(\d{3}\)-\d{3}-\d{2}-\d{2}$" required
            >

            @error('phone')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Дата и время</label>
            <input
                type="datetime-local" name="date" id="date"
                class="form-control {{ $errors->has('date') ? 'is-invalid' : '' }}"
                required
            >

            @error('date')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="service" class="form-label">Услуга</label>
            <select
                name="service" id="service"
                class="form-select {{ $errors->has('service') ? 'is-invalid' : '' }}"
                required
            >
                <option value="">Выберите услугу</option>
                @foreach($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                @endforeach
            </select>

            @error('service')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="another_service" id="another_service" value="1">
                <label class="form-check-label" for="another_service">Иная услуга</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="service_description" class="form-label">Ваша услуга</label>
            <textarea
                name="service_description" id="service_description"
                class="form-control {{ $errors->has('service_description') ? 'is-invalid' : '' }}"
                placeholder="Опишите вашу услугу..." disabled
            ></textarea>

            @error('service_description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="payment_method" class="form-label">Способ оплаты</label>
            <select
                name="payment_method" id="payment_method"
                class="form-select {{ $errors->has('payment_method') ? 'is-invalid' : '' }}"
                required
            >
                <option value="" hidden>Выберите способ оплаты</option>
                @foreach($paymentMethods as $paymentMethod)
                    <option value="{{ $paymentMethod }}">{{ $paymentMethod->label() }}</option>
                @endforeach
            </select>

            @error('payment_method')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success w-100 mb-3">Отправить</button>
    </form>
@endsection

@push('scripts')
    <script src="{{ asset('js/validation.js') }}"></script>

    <script>
        const serviceDescription = document.getElementById('service_description');
        const service = document.getElementById('service');

        document.getElementById('another_service').addEventListener('change', function () {
            serviceDescription.disabled = !this.checked;
            serviceDescription.required = this.checked;
            service.disabled = this.checked;
            service.required = !this.checked;
        });
    </script>
@endpush
