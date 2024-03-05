@extends('layouts.admin_app')

@section('admin_content')
    <main>
        <section class="first__section first">
            <div class="container flex align-center justify-between">
                <div class="first__left">
                    <h1>Серверы</h1>
                </div>
            </div>
        </section>
        <section class="second__section second">
            <div class="container">
                <div class="fifth__input flex align-center">
                    <input type="text" placeholder="Поиск" />
                    <a href="/">Поиск</a>
                </div>
                @if (count($servers))
                    <div class="table__wrapper">
                        <div class="table">
                            <div class="table__head table__row">
                                <div class="table__right">
                                    <div class="table__item id">ID</div>
                                    <div class="table__item">IP-адрес</div>
                                    <div class="table__item">Локация</div>
                                    <div class="table__item volume">Цена на месяц</div>
                                    <div class="table__item">Состояние сервера</div>
                                </div>
                            </div>
                            @foreach ($servers as $server)
                                <a href="/">
                                    <div class="table__body">
                                        <div class="table__row light">
                                            <div class="table__right">
                                                <a href="/" class="table__item">
                                                    <div class="table__item-name">{{ $server->id }}</div>
                                                </a>
                                                <a href="" class="table__item">
                                                    <div class="table__item percent">{{ $server->ip }}</div>
                                                </a>
                                                <div class="table__item">{{ $server->location }}</div>
                                                <div class="table__item volume">{{ $server->price_month }}₽</div>
                                                <div class="table__item">
                                                    <a target="_blank">{{ $server->status }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        @else
                            <p>Записей не найдено...</p>
                @endif
            </div>
            </div>
            </div>
        </section>
    </main>
@endsection
