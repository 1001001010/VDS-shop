@extends('layouts.app')

@section('content')
    <main>
        <section class="second__section second">
            <a href="{{ route('profile') }}" class="header__reg button__back">⬅ Назад</a>
            <img class="right_photo" src="{{ asset('img/glare/first_part-2.png') }}" alt="blick" />
            <img class="left_photo" src="{{ asset('img/glare/first_part-1.png') }}" alt="blick" />
            <div class="container">
                <div class="tovar">
                    <div class="Offers">
                        <div class="left_block">
                            <p class="user__title">Пользователь <span class="bold">{{ Auth::user()->name }}</span></p>
                            <ul type="circle" class="haracter">
                                <li>
                                    <p>Цена аренды: <span class="bold">{{ $rental->price }}₽</span></p>
                                </li>
                                <li>
                                    @if ($rental->duration == 'month')
                                        <p>Срок аренды: <span class="bold">Месяц</span></p>
                                    @elseif ($rental->duration == 'hour')
                                        <p>Срок аренды: <span class="bold">Час</span></p>
                                    @endif
                                </li>
                                <li>
                                    <p>Начало аренды: <span class="bold">{{ $rental->created_at }}</span></p>
                                </li>
                                <li>
                                    @if ($server->status == 'active')
                                        <p>Активен до: <span class="bold">{{ $rental->endDate }}</span></p>
                                    @else
                                        <p>Аренда закончилась: <span class="bold">{{ $rental->endDate }}</span></p>
                                    @endif
                                </li>
                            </ul>
                            <ul type="circle" class="haracter">
                                <li>
                                    <p>ID сервера: <span class="bold">{{ $server->id }}</span></p>
                                </li>
                                <li>
                                    <p>Конфигурация: <span class="bold">{{ $rental->cpu }} CORE | {{ $rental->ram }} GB
                                            RAM | {{ $rental->ssd }} GB SSD</span></p>
                                </li>
                                @if ($rental->oc)
                                    <li>
                                        <p>Система: <span class="bold">{{ $rental->oc }}</span></p>
                                    </li>
                                @else
                                    <li>
                                        <p>Система: <span class="bold">Без ОС</span></p>
                                    </li>
                                @endif
                                @if ($rental->panel)
                                    <li>
                                        <p>Инструменты: <span class="bold">{{ $rental->panel }}</span></p>
                                    </li>
                                @else
                                    <li>
                                        <p>Инструменты: <span class="bold">Без ОС</span></p>
                                    </li>
                                @endif
                                @if ($server->status == 'active')
                                    <li>
                                        <p>IP-адрес сервера: <span class="bold">{{ $server->ip }}</span></p>
                                    </li>
                                    <li>
                                        <p>Имя пользователя: <span class="bold">{{ $server->user_name }}</span></p>
                                    </li>
                                    <li>
                                        <p>Пароль: <span class="bold">{{ $server->user_pass }}</span></p>
                                    </li>
                                @endif
                                @if ($server->status == 'active')
                                    <li>
                                        <p>Текущее состояние сервера: <span class="bold">Активен</span>
                                        </p>
                                    </li>
                                @else
                                    <li>
                                        <p>Текущее состояние сервера: <span class="bold">Неактивен</span>
                                        </p>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
