@extends('theme')
@section('title', 'Авторизация')
@section('content')
    <form
        action="{{ route('login') }}" method="post"
        class="col-sm-10 col-md-8 col-lg-6 col-xl-5 m-auto bg-white p-4 rounded-3 shadow-sm needs-validation"
        novalidate
    >
        @csrf
        <h1 class="mb-3 text-center">Авторизация</h1>

        <div class="mb-3">
            <label for="login" class="form-label">Логин</label>
            <input
                type="text" name="login" id="login"
                class="form-control {{ $errors->has('login') ? 'is-invalid' : '' }}"
                placeholder="Ваш логин"
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
                required
            >
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success w-100 mb-3">Войти</button>

        <div class="text-center mb-3">
            Еще нет аккаунта? <a href="{{ route('register') }}" class="text-decoration-none">Зарегистрироваться</a>
        </div>

        @error('auth')
        <div class="text-danger text-center">{{ $message }}</div>
        @enderror
    </form>
@endsection

@push('scripts')
    <script src="{{ asset('js/validation.js') }}"></script>
@endpush
