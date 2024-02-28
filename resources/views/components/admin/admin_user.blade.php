@extends('layouts.admin_app')

@section('admin_content')
    <main>
        <section class="second__section second">
            <div class="container">
                @if (session('success'))
                    {{-- <div class="alert alert-success">
                        {{ session('success') }}
                    </div> --}}
                    <div id="notification" class="alert alert-success">
                        <span id="notification-text">{{ session('success') }}</span>
                        <button id="close-button"><img src="{{ asset('img/close.svg') }}" alt="Close"></button>
                    </div>
                @endif
                <div class="tovar">
                    <div class="Offers">
                        <div class="left_block">
                            <p class="user__title">Пользователь <span class="bold">{{ $user->email }}</span></p>
                            <ul type="circle" class="haracter">
                                <li>
                                    <p>ID: <span class="bold">{{ $user->id }}</span></p>
                                </li>
                                <li>
                                    <p>Mail: <span class="bold">{{ $user->email }}</span></p>
                                </li>
                                <li>
                                    <p>Балланс: <span class="bold">{{ $user->balance }}₽</span></p>
                                </li>
                                <li>
                                    <p>Дата регистрации: <span class="bold">{{ $user->created_at }}</span></p>
                                </li>
                                <li>
                                    <p>Регистрации Unix: <span class="bold">{{ $user->unix }}</span></p>
                                </li>
                                <li>
                                    @if ($user->ban == 1)
                                        <p>Статус блокироки: <span class="bold">Заблокирован</span></p>
                                    @else
                                        <p>Статус блокироки: <span class="bold">Разблокирован</span></p>
                                    @endif
                                </li>
                                <li>
                                    @if ($user->is_admin == 1)
                                        <p>Уровень доступа: <span class="bold">Администратор</span></p>
                                    @else
                                        <p>Уровень доступа: <span class="bold">Пользователь</span></p>
                                    @endif
                                </li>
                                <div class="flex wrapper flex__col__start button__reduct_user gap__15 padding-t__15">
                                    <div class="table__item">
                                        @if ($user->ban == 0)
                                            <a href="{{ route('ban_user', ['id' => $user->id]) }}">Ban</a>
                                        @else
                                            <a href="{{ route('ban_user', ['id' => $user->id]) }}">Unban</a>
                                        @endif
                                    </div>
                                    <div class="table__item">
                                        <a href="/" target="_blank">Выдать балланс</a>
                                    </div>
                                    <div class="table__item">
                                        <a href="/" target="_blank">Изменить балланс</a>
                                    </div>
                                    <div class="table__item">
                                        <a href="/" target="_blank">Назначить администратором</a>
                                    </div>
                                </div>
                            </ul>
                        </div>
                        <div class="right_block">
                            <div class="title-centre">
                                <p>Всего аренд: <span class="bold">{{ $user->total_servers }}</span></p>
                            </div>
                            <div class="serv__inf__block">
                                <p>28.06.2023</p>
                                <p>ID сервера: 23</p>
                                <p>Срок: Месяц</p>
                                <p>Цена: 450</p>
                            </div>
                            <div class="serv__inf__block">
                                <p>28.06.2023</p>
                                <p>ID сервера: 23</p>
                                <p>Срок: Месяц</p>
                                <p>Цена: 450</p>
                            </div>
                            <div class="serv__inf__block">
                                <p>28.06.2023</p>
                                <p>ID сервера: 23</p>
                                <p>Срок: Месяц</p>
                                <p>Цена: 450</p>
                            </div>
                            <div class="serv__inf__block">
                                <p>28.06.2023</p>
                                <p>ID сервера: 23</p>
                                <p>Срок: Месяц</p>
                                <p>Цена: 450</p>
                            </div>
                            <div class="serv__inf__block">
                                <p>28.06.2023</p>
                                <p>ID сервера: 23</p>
                                <p>Срок: Месяц</p>
                                <p>Цена: 450</p>
                            </div>
                            <div class="serv__inf__block">
                                <p>28.06.2023</p>
                                <p>ID сервера: 23</p>
                                <p>Срок: Месяц</p>
                                <p>Цена: 450</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
