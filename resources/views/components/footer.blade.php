<footer class="footer">
    <div class="container">
        <div class="footer__top flex justify-between">
            <div class="footer__left">
                <div class="footer__logo">
                    <a href="/"><img src="{{ asset('img/footer_logo.svg') }}" alt="" /></a>
                </div>
                <ul class="footer__media flex align-center">
                    <li>
                        <a href="/" target="_blank">
                            <img src="{{ asset('img/telegram.svg') }}" alt="telegram" />
                        </a>
                    </li>
                    <li>
                        <a href="/" target="_blank">
                            <img src="{{ asset('img/facebook.svg') }}" alt="facebook" />
                        </a>
                    </li>
                    <li>
                        <a href="/" target="_blank">
                            <img src="{{ asset('img/twitter.svg') }}" alt="twitter" />
                        </a>
                    </li>
                </ul>
                @guest
                    <ul class="header__reg flex align-center">
                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}">Регистрация</a></li>
                        @endif
                        @if (Route::has('login'))
                            <li><a href="{{ route('login') }}">Вход</a></li>
                        @endif
                    </ul>
                @endguest
            </div>
            <div class="footer__right">
                <div class="flex">
                    <div class="footer__col">
                        <ul>
                            <li><a href="{{ route('index', ['region' => 'Moscow']) }}">Главная</a></li>
                            <li><a href="{{ route('servers', ['region' => 'Moscow']) }}">Серверы</a></li>
                            <li><a href="https://10010010s-organization.gitbook.io/baza-znanii-zetrix/">Информация</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__text">Zetrix© All Rights Reserved</div>
    </div>
</footer>
