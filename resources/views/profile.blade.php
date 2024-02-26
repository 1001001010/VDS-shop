@extends('layouts.app')

@section('content')
    <section class="second__section second">
        <div class="container">
            <div class="tovar">
                <div class="Offers">
                    <div class="left_block">
                        <p class="user__title">Пользователь <span class="bold">{{ Auth::user()->name }}</span></p>
                        <ul type="circle" class="haracter">
                            <li>
                                <p>Email: <span class="bold">{{ Auth::user()->email }}</span></p>
                            </li>
                            <li>
                                <p>Балланс: <span class="bold">{{ Auth::user()->balance }}₽</span></p>
                            </li>
                            <li>
                                <p>Дата регистрации: <span class="bold">{{ Auth::user()->created_at }}</span></p>
                            </li>
                            <div class="flex wrapper flex__col__start button__reduct_user gap__15 padding-t__15">
                                <div class="table__item">
                                    <a target="_blank">Изменить информацию</a>
                                </div>
                            </div>
                        </ul>
                    </div>
                    <div class="right_block">
                        <div class="title-centre">
                            <p>Всего аренд: <span class="bold">6</span></p>
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
@endsection
