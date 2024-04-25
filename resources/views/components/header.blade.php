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
                <li><a href="{{ route('index', ['region' => 1]) }}">Главная</a></li>
                <li><a href="{{ route('servers', ['region' => 'Moscow']) }}">Серверы</a></li>
                <li><a href="/">Информация</a></li>
                @if (Auth::user() && Auth::user()->is_admin == 1)
                    <li><a href="{{ route('admin_AllUsers') }}">Админка</a></li>
                @endif
            </ul>
            <svg class="divider">
                <use xlink:href="{{ asset('img/icons.svg#divider') }}"></use>
            </svg>
            {{-- <ul class="header__reg flex align-center"> --}}
            @if (Route::has('login'))
                @auth
                    @if (request()->is('profile'))
                        <ul class="header__ul flex align-center">
                            <div class="dropdown">
                                <li><a id="dropdown-toggle">{{ Auth::user()->name }}</a></li>
                                <div id="dropdown-content" class="dropdown-content">
                                    <a href="{{ route('profile') }}">Мой профиль</a>
                                    <a href="">{{ Auth::user()->balance }}₽</a>
                                    <a href="#">Настройки</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                        {{ __('Выйти') }}
                                    </a>
                                </div>
                            </div>
                        </ul>
                    @else
                        <ul class="header__ul flex align-center">
                            <div class="dropdown">
                                <li><a id="dropdown-toggle">{{ Auth::user()->name }}</a></li>
                                <div id="dropdown-content" class="dropdown-content">
                                    <a href="{{ route('profile') }}">Мой профиль</a>
                                    <a href="">{{ Auth::user()->balance }}₽</a>
                                    <a href="#">Настройки</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                        {{ __('Выйти') }}
                                    </a>
                                </div>
                            </div>
                        </ul>
                    @endif
                @else
                    <ul class="header__reg flex align-center">
                        <li><a href="{{ route('login') }}">Вход</a></li>
                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}">Регистрация</a></li>
                        @endif
                    </ul>
                @endauth
            @endif
            {{-- </ul> --}}
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
        <li><a href="{{ route('index') }}">Главная</a></li>
        <li><a href="{{ route('servers', ['region' => 'Moscow']) }}">Серверы</a></li>
        <li><a href="/">Информация</a></li>
        @if (Auth::user() && Auth::user()->is_admin == 1)
            <li><a href="{{ route('admin_AllUsers') }}">Админка</a></li>
        @endif
        @if (Route::has('login'))
            @auth
                @if (request()->is('profile'))
                    <li><a>{{ Auth::user()->name }}</a></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                            {{ __('Выйти') }}
                        </a>
                    </li>
                @else
                    <li><a href="{{ route('profile') }}">Профиль</a></li>
                @endif
            @else
                <li><a href="{{ route('login') }}">Вход</a></li>
                @if (Route::has('register'))
                    <li><a href="{{ route('register') }}">Регистрация</a></li>
                @endif
            @endauth
        @endif
    </ul>
</div>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
