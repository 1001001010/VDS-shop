<header class="header">
    <div class="container flex align-center justify-between">
        <div class="header__left flex align-center">
            <a href="/" class="header__logo">
                <img src="{{ asset('img/logo.svg') }}" alt="" />
            </a>
            <svg class="divider">
                <use xlink:href="{{ asset('img/icons.svg#divider') }}"></use>
            </svg>
            <div class="header__search flex align-center">
                <svg>
                    <use xlink:href="{{ asset('img/icons.svg#search') }}"></use>
                </svg>
                <input type="text" placeholder="Поиск" />
            </div>
        </div>
        <div class="header__right flex align-center">
            <ul class="header__ul flex align-center">
                <li><a href="/">Главная</a></li>
                <li><a href="/buy_server.html">Серверы</a></li>
                <li><a href="/">Информация</a></li>
                @if (Auth::user() && Auth::user()->is_admin == 1)
                    <li><a href="/admin">Админка</a></li>
                @endif
            </ul>
            <svg class="divider">
                <use xlink:href="{{ asset('img/icons.svg#divider') }}"></use>
            </svg>
            <ul class="header__reg flex align-center">
                @if (Route::has('login'))
                    @auth
                        <li><a href="{{ url('/home') }}">Профиль</a></li>
                    @else
                        <li><a href="{{ route('login') }}">Вход</a></li>
                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}">Регистрация</a></li>
                        @endif
                    @endauth
                @endif
            </ul>
        </div>
        <div class="menu__icon">
            <svg viewBox="0 0 800 650" class="menu__icon">
                <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200"
                    class="top">
                </path>
                <path d="M300,320 L540,320" class="middle"></path>
                <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190"
                    class="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
            </svg>
        </div>
    </div>
</header>
<div class="menu__body">
    <ul class="menu__list">
        <li><a href="/">Главная</a></li>
        <li><a href="/buy_server.html">Серверы</a></li>
        <li><a href="/">Информация</a></li>
        <li><a href="/registr.html">Регистрация</a></li>
        <li><a href="/sign_in.html">Вход</a></li>
    </ul>
</div>

{{-- @if (Route::has('login'))
    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
        @auth
            <a href="{{ url('/home') }}"
                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
        @else
            <a href="{{ route('login') }}"
                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}"
                    class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
            @endif
        @endauth
    </div>
@endif --}}
