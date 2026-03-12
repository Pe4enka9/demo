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
            <input type="text" name="address" id="address" class="form-control" placeholder="Укажите ваш адрес"
                   required>
            <div class="invalid-feedback">Обязательное поле</div>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Телефон</label>
            <input type="tel" name="phone" id="phone" class="form-control" placeholder="+7(XXX)-XXX-XX-XX"
                   pattern="^\+7\(\d{3}\)-\d{3}-\d{2}-\d{2}$" required>
            <div class="invalid-feedback">Обязательное поле</div>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Дата и время</label>
            <input type="datetime-local" name="date" id="date" class="form-control" required>
            <div class="invalid-feedback">Обязательное поле</div>
        </div>

        <div class="mb-3">
            <label for="service" class="form-label">Услуга</label>
            <select name="service" id="service" class="form-select">
                <option value="">Выберите услугу</option>
                @foreach($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="another_service">
                <label class="form-check-label" for="another_service">Иная услуга</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="service_description" class="form-label">Ваша услуга</label>
            <textarea name="service_description" id="service_description" class="form-control"
                      placeholder="Опишите вашу услугу..." disabled></textarea>
        </div>

        <div class="mb-3">
            <label for="payment_method" class="form-label">Способ оплаты</label>
            <select name="payment_method" id="payment_method" class="form-select" required>
                <option value="" hidden>Выберите способ оплаты</option>
                <option value="cash">Наличные</option>
                <option value="card">Банковская карта</option>
            </select>
            <div class="invalid-feedback">Обязательное поле</div>
        </div>

        <button type="submit" class="btn btn-success w-100 mb-3">Отправить</button>
    </form>
@endsection

@push('scripts')
    <script src="{{ asset('js/validate.js') }}"></script>
@endpush
