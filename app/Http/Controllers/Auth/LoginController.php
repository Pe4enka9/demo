<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    // Форма входа
    public function loginForm(): View
    {
        return view('auth.login');
    }

    // Вход
    public function login(LoginRequest $request): RedirectResponse
    {
        $user = Auth::attempt([
            'login' => $request->login,
            'password' => $request->password,
        ]);

        if (!$user) {
            return redirect()->route('login')
                ->withErrors(['auth' => 'Неверный логин или пароль.'])
                ->withInput();
        }

        return redirect()->route('home');
    }

    // Выход
    public function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
