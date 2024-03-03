<header class="header">
    <div class="container flex align-center justify-between">
        <div class="header__left flex align-center">
            <a href="/" class="header__logo">
                <img src="{{ asset('img/logo.svg') }}" alt="logo" />
            </a>
            <svg class="divider">
                <use xlink:href="{{ asset('img/icons.svg#divider') }}"></use>
            </svg>
            <p>Административная панель</p>
        </div>
        <div class="header__right flex align-center">
            <ul class="header__ul flex align-center">
                <li><a href="{{ route('admin_AllUsers') }}">Пользователи</a></li>
                <li><a href="/buy_server.html">Серверы</a></li>
                <li><a href="/">Настройки</a></li>
                <li><a href="{{ route('admin_stats') }}">Статистика</a></li>
            </ul>
            <svg class="divider">
                <use xlink:href="{{ asset('img/icons.svg#divider') }}"></use>
            </svg>
            <ul class="header__reg flex align-center">
                <li><a href="{{ route('index') }}">Выход</a></li>
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
        <li><a href="{{ route('admin_AllUsers') }}">Пользователи</a></li>
        <li><a href="/buy_server.html">Серверы</a></li>
        <li><a href="/">Настройки</a></li>
        <li><a href="{{ route('admin_stats') }}">Статистика</a></li>
        <li><a href="{{ route('index') }}">Выход</a></li>
    </ul>
</div>
