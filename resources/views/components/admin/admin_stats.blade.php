@extends('layouts.admin_app')

@section('admin_content')
    <main>
        <section class="first__section first">
            <img src="{{ asset('img/glare/third_part_1.png') }}" alt="glare" class="third__part-1" />
            <div class="container flex align-center justify-between">
                <div class="first__left">
                    <h1>Статистика</h1>
                </div>
            </div>
        </section>
        <section class="second__section second">
            <div class="container">
                <div class="tovar">
                    <div class="Offers">
                        <div class="left_block">
                            <ul type="circle" class="haracter">
                                <li>
                                    <p>Всего пользователей: <span class="bold">{{ $users }}</span></p>
                                </li>
                                <li>
                                    <p>Заблокированно пользователей: <span class="bold">{{ $ban_user }} |
                                            {{ round(($ban_user * 100) / $users, 1) }}%</span></p>
                                </li>
                                <li>
                                    <p>Сумма балансов всех пользователей: <span class="bold">{{ $sum }}₽</span>
                                    </p>
                                </li>
                                <li>
                                    <p>Всего серверов: <span class="bold">{{ $servers }}</span></p>
                                </li>
                                <li>
                                    <p>Арендованно: <span class="bold">{{ $rented }}</span></p>
                                </li>
                                <li>
                                    <p>Всего локаций: <span class="bold">{{ $location }}</span></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
