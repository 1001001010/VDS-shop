@extends('layouts.admin_app')

@section('admin_content')
    <main>
        <section class="second__section second">
            <div class="container">
                @if (session('success'))
                    <div id="notification" class="alert alert-success">
                        <span id="notification-text">{{ session('success') }}</span>
                        <button id="close-button"><img src="{{ asset('img/close.svg') }}" alt="Close"></button>
                    </div>
                @endif
                <div class="tovar">
                    <div class="Offers">
                        <div class="left_block">
                            <p class="user__title">Сервер <span class="bold">{{ $server->number }}</span></p>
                            <ul type="circle" class="haracter">
                                <li>
                                    <p>ID: <span class="bold">{{ $server->id }}</span></p>
                                </li>
                                <li>
                                    <p>Локация: <span class="bold">{{ $server->location }}</span></p>
                                </li>
                                <li>
                                    <p>Конфигурация: <span class="bold">{{ $server->cpu }} Core | {{ $server->ram }} GB
                                            DDR4 | {{ $server->ssd }} GB
                                            SSD</span></p>
                                </li>
                                <li>
                                    <p>IP-адрес: <span class="bold">{{ $server->ip }}</span></p>
                                </li>
                                <li>
                                    <p>Имя пользователя: <span class="bold">{{ $server->user_name }}</span></p>
                                </li>
                                <li>
                                    <p>Пароль: <span class="bold">{{ $server->user_pass }}</span></p>
                                </li>
                                <li>
                                    <p>Активен до: <span class="bold">{{ $server->rental_until }}</span></p>
                                </li>
                                <li>
                                    <p>Цена на месяц: <span class="bold">{{ $server->price_month }}₽</span></p>
                                </li>
                                <li>
                                    <p>Цена на час: <span class="bold">{{ $server->price_hour }}₽</span></p>
                                </li>
                                <li>
                                    <p>Статус: <span class="bold">{{ $server->status }}</span></p>
                                </li>
                                <li>
                                    <p>Тип: <span class="bold">{{ $server->type }}</span></p>
                                </li>
                                <div class="flex wrapper button__reduct_user flex-wrap gap__15 padding-t__15">
                                    <div class="table__item">
                                        <a id="open-modal_price">Изменить цену</a>
                                        <div id="modal" class="modal">
                                            <div class="modal-content new_server">
                                                <div class="">
                                                    <form method="POST" action="{{ route('login') }}"
                                                        class="flex flex__col__centr">
                                                        @csrf
                                                        <p>Цена аренды на час</p>
                                                        <div class="reg__input flex align-center">
                                                            <p><span class="bold">₽</span></p>
                                                            <input id="price_hours" type="text" class="input"
                                                                name="price_hours" value="{{ $server->price_hour }}" />
                                                        </div>
                                                        <p>Цена аренды на месяц</p>
                                                        <div class="reg__input flex align-center">
                                                            <p><span class="bold">₽</span></p>
                                                            <input id="price_month" type="text" class="input"
                                                                name="price_hours" value="{{ $server->price_month }}" />
                                                        </div>
                                                        <ul class="header__reg flex justify-start">
                                                            <li>
                                                                <button type="submit">Сохранить</button>
                                                            </li>
                                                        </ul>
                                                        <span class="close">Закрыть</span>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table__item">
                                        <a href="/" target="_blank">Изменить локацию</a>
                                    </div>
                                    <div class="table__item">
                                        <a href="/" target="_blank">Изменить логин</a>
                                    </div>
                                    <div class="table__item">
                                        <a href="{{ route('new_ServerPassword', ['id' => $server->id]) }}">Изменить
                                            пароль</a>
                                    </div>
                                    <div class="table__item">
                                        <a href="/" target="_blank">Изменить IP-адрес</a>
                                    </div>
                                    <div class="table__item">
                                        <a href="/" target="_blank">Изменить конфигурацию</a>
                                    </div>
                                </div>
                            </ul>
                        </div>
                        @if (isset($user))
                            <div class="right_block">
                                <div class="title-centre">
                                    <p>Аренда</p>
                                </div>
                                <div class="serv__inf__block">
                                    <p>ID Пользователя: <span class="bold">{{ $user->id }}</span></p>
                                </div>
                                <div class="serv__inf__block">
                                    <p>Mail: <span class="bold">{{ $user->email }}</span></p>
                                </div>
                                <div class="serv__inf__block">
                                    <p>Срок аренды: <span class="bold">Месяц</span></p>
                                </div>
                                <div class="serv__inf__block">
                                    <p>Цена аренды: <span class="bold">950₽</span></p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script>
        document.getElementById('open-modal_price').addEventListener('click', function() {
            document.getElementById('modal').style.display = 'block';
        });


        document.getElementsByClassName('close')[0].addEventListener('click', function() {
            document.getElementById('modal').style.display = 'none';
        });

        window.addEventListener('click', function(event) {
            if (event.target == document.getElementById('modal')) {
                document.getElementById('modal').style.display = 'none';
            }
        });
    </script>
@endsection
