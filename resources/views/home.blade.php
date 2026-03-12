@extends('theme')
@section('title', 'Главная')
@section('content')
    <h1 class="mb-3">Главная</h1>

    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-danger">Выйти</button>
    </form>
@endsection
