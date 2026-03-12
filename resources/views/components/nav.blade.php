<nav class="navbar-nav">
    @auth
        @if(auth()->user()->is_admin)
            <a
                href="{{ route('admin.applications.index') }}"
                class="nav-link {{ request()->routeIs('admin.*') ? 'active' : '' }}"
            >
                Админ-панель
            </a>
        @else
            <a
                href="{{ route('applications.index') }}"
                class="nav-link {{ request()->routeIs('applications.*') ? 'active' : '' }}"
            >
                Мои заявки
            </a>
        @endif

        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="nav-link text-danger">Выйти</button>
        </form>
    @else
        <a
            href="{{ route('register') }}"
            class="nav-link {{ request()->routeIs('register') ? 'active' : '' }}"
        >
            Регистрация
        </a>

        <a
            href="{{ route('login') }}"
            class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}"
        >
            Вход
        </a>
    @endauth
</nav>
