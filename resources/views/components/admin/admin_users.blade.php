@extends('layouts.admin_app')

@section('admin_content')
    <main>
        <section class="first__section first">
            <div class="container flex align-center justify-between">
                <div class="first__left">
                    <h1>Пользователи</h1>
                </div>
            </div>
        </section>
        <section class="second__section second">
            <div class="container">
                <div class="fifth__input flex align-center">
                    <input type="text" placeholder="Поиск" />
                    <a href="/">Поиск</a>
                </div>
                <div class="table__wrapper">
                    <div class="table">
                        <div class="table__head table__row">
                            <div class="table__right">
                                <div class="table__item id">ID</div>
                                <div class="table__item">E-mail</div>
                                <div class="table__item">Балланс</div>
                                <div class="table__item volume">Дата регистрации</div>
                                <div class="table__item">Блокировка</div>
                            </div>
                        </div>
                        <div class="table__body">
                            @foreach ($users as $user)
                                <div class="table__row">
                                    <div class="table__right">
                                        <a href="/" class="table__item">
                                            <div class="table__item-name">{{ $user->id }}</div>
                                        </a>
                                        <a href="{{ route('admin_user', ['id' => $user->id]) }}" class="table__item">
                                            <div class="table__item">{{ $user->email }}</div>
                                        </a>
                                        <div class="table__item percent">{{ $user->balance }}₽</div>
                                        @if ($user->created_at == '')
                                            <div class="table__item volume">None</div>
                                        @else
                                            <div class="table__item volume">{{ $user->created_at }}</div>
                                        @endif
                                        <div class="table__item button_ban">
                                            @if ($user->ban == 1)
                                                <a href="/" target="_blank">Unban</a>
                                            @else
                                                <a href="/" target="_blank">Ban</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
