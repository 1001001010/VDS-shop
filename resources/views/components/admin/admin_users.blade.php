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
                <form method="get" action="{{ route('admin_users_search') }}">
                    <div class="fifth__input flex align-center">
                        <input type="text" placeholder="Поиск" name="search_users" id="search_users" />
                        <button type="submit">Поиск</button>
                    </div>
                </form>
                @if (count($users))
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
                                            <div class="table__item percent">
                                                {{ number_format($user->balance, 0, '', ' ') }}₽</div>
                                            @if ($user->created_at == '')
                                                <div class="table__item volume">None</div>
                                            @else
                                                <div class="table__item volume">{{ $user->created_at }}</div>
                                            @endif
                                            <div class="table__item button_ban">
                                                @if ($user->ban == 1)
                                                    <a href="{{ route('ban_user', ['id' => $user->id]) }}">Unban</a>
                                                @else
                                                    <a href="{{ route('ban_user', ['id' => $user->id]) }}">Ban</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @else
                    <p>Записей не найдено...</p>
                @endif
            </div>
        </section>
    </main>
@endsection
