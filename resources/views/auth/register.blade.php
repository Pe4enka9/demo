@extends('theme')
@section('title', 'Регистрация')
@section('content')
    <form
        action="{{ route('register') }}" method="post"
        class="col-sm-10 col-md-8 col-lg-6 col-xl-5 m-auto bg-white p-4 rounded-3 shadow-sm needs-validation"
        novalidate
    >
        @csrf
        <h1 class="mb-3 text-center">Регистрация</h1>

        <div class="mb-3">
            <label for="full_name" class="form-label">ФИО</label>
            <input
                type="text" name="full_name" id="full_name"
                class="form-control {{ $errors->has('full_name') ? 'is-invalid' : '' }}"
                placeholder="Иванов Иван Иванович"
                pattern="^[А-Яа-яЁё\s]+$" required
            >

            @error('full_name')
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
            <label for="email" class="form-label">Email</label>
            <input
                type="email" name="email" id="email"
                class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                placeholder="your_email@example.ru"
                required
            >

            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="login" class="form-label">Логин</label>
            <input
                type="text" name="login" id="login"
                class="form-control {{ $errors->has('login') ? 'is-invalid' : '' }}"
                placeholder="Придумайте логин"
                required
            >

            @error('login')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input
                type="password" name="password" id="password"
                class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                placeholder="*******"
                minlength="6" required
            >

            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success w-100 mb-3">Зарегистрироваться</button>
        <div class="text-center">Уже есть аккаунт? <a href="{{ route('login') }}" class="text-decoration-none">Войти</a></div>
    </form>
@endsection

@push('scripts')
    <script src="{{ asset('js/validation.js') }}"></script>
@endpush
