@extends('index')

@section('title')
    ZETRIX - надежный хостинг для вашего бизнеса.
@endsection

@section('content')
    <main>
        <section class="first__section first">
            <img src="{{ asset('img/glare/third_part_1.png') }}" alt="glare" class="third__part-1" />
            <div class="container flex align-center justify-between">
                <div class="first__left">
                    <div class="first__name flex align-center">
                        <img src="{{ asset('img/fav.svg') }}" alt="" />
                        <span>Облачные VPS нового поколения для хостинга, разработки и обучения</span>
                    </div>
                    <h1>VPS-серверы в аренду</h1>
                </div>
            </div>
        </section>
        <section class="second__section second">
            @if (count($Delicated_servers) > 0 || count($Shared_servers) > 0)
                <div class="container">
                    @if (session('success'))
                        <div id="notification" class="alert alert-success">
                            <span id="notification-text">{{ session('success') }}</span>
                        </div>
                    @endif
                    <div class="tovar">
                        <div class="country">
                            @foreach ($locations as $location)
                                <a href="{{ route('index', ['region' => $location->link]) }}"
                                    class="table__item @if (request()->region == $location->link) active @endif">
                                    {{ $location->name }}
                                </a>
                            @endforeach
                        </div>
                        @if (count($Shared_servers) > 0)
                            <div class="Offers">
                                <div class="left_block">
                                    <p class="for_what1"
                                        data-tooltip="Облачные серверы с процессором AMD Ryzen 9 7950X3D, общим vCPU и NVMe накопителем, идеальны для размещения веб-сайтов, VPN и разработки проектов. Вложенная виртуализация отключена.">
                                        Для чего подходит?
                                    </p>
                                    <p class="for_what">Облачные серверы базового уровня по сбалансированной цене на базе
                                        процессора
                                        AMD Ryzen 9
                                        7950X3D, с общим vCPU и NVMe накопителем. Идеальный вариант для таких задач, как
                                        размещение
                                        веб-сайтов, VPN, или разработка проектов. Вложенная виртуализация отключена.</p>
                                    <h1>Shared</h1>
                                    <ul type="circle" class="haracter">
                                        <li>
                                            <p>Процессор AMD Ryzen 9 7950X3D</p>
                                        </li>
                                        <li>
                                            <p>Частота 4.2-5.7 ГГц</p>
                                        </li>
                                        <li>
                                            <p>Базовая DDoS-защита</p>
                                        </li>
                                        <li>
                                            <p>1 адрес IPv4</p>
                                        </li>
                                        <li>
                                            <p>Интернет до 1 Гбит/с</p>
                                        </li>
                                        <li>
                                            <p>Трафик ∞</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="right_block">
                                    <div class="title">
                                        <div class="Characteristics">
                                            <p>Характеристики</p>
                                        </div>
                                        <div class="hour">
                                            <p>Час</p>
                                        </div>
                                        <div class="month">
                                            <p>Месяц</p>
                                        </div>
                                    </div>
                                    @foreach ($Shared_servers as $Shared_server)
                                        <div class="price_block">
                                            <div class="Characteristic">
                                                <p>{{ $Shared_server->cpu }} Core</p>
                                                <p>{{ $Shared_server->ram }} GB RAM</p>
                                                <p>{{ $Shared_server->ssd }} GB NVME</p>
                                            </div>
                                            <div class="price_hour">
                                                <a href="{{ route('buyServers', ['time' => 'hour', 'region' => $Shared_server->location_id, 'server_id' => $Shared_server->id]) }}"
                                                    class="buy_serv">
                                                    <p>{{ $Shared_server->price_hour }}€</p>
                                                </a>
                                            </div>
                                            <div class="price_month">
                                                <a href="{{ route('buyServers', ['time' => 'month', 'region' => $Shared_server->location_id, 'server_id' => $Shared_server->id]) }}"
                                                    class="buy_serv">
                                                    <p>{{ $Shared_server->price_month }}€</p>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        @if (count($Delicated_servers) > 0)
                            <div class="Offers">
                                <div class="left_block">
                                    <p class="for_what1"
                                        data-tooltip="Облачные серверы с процессором AMD Ryzen 9 7950X3D, общим vCPU и NVMe накопителем, идеальны для размещения веб-сайтов, VPN и разработки проектов. Вложенная виртуализация отключена.">
                                        Для чего подходит?
                                    </p>
                                    <h1>Delicated</h1>
                                    <ul type="circle" class="haracter">
                                        <li>
                                            <p>Процессор AMD Ryzen 9 7950X3D</p>
                                        </li>
                                        <li>
                                            <p>Частота 4.2-5.7 ГГц</p>
                                        </li>
                                        <li>
                                            <p>Базовая DDoS-защита</p>
                                        </li>
                                        <li>
                                            <p>1 адрес IPv4</p>
                                        </li>
                                        <li>
                                            <p>Интернет до 1 Гбит/с</p>
                                        </li>
                                        <li>
                                            <p>Трафик ∞</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="right_block">
                                    <div class="title">
                                        <div class="Characteristics">
                                            <p>Характеристики</p>
                                        </div>
                                        <div class="hour">
                                            <p>Час</p>
                                        </div>
                                        <div class="month">
                                            <p>Месяц</p>
                                        </div>
                                    </div>
                                    @foreach ($Delicated_servers as $Delicated_server)
                                        <div class="price_block">
                                            <div class="Characteristic">
                                                <p>{{ $Delicated_server->cpu }} Core</p>
                                                <p>{{ $Delicated_server->ram }} GB RAM</p>
                                                <p>{{ $Delicated_server->ssd }} GB NVME</p>
                                            </div>
                                            <div class="price_hour">
                                                <a href="{{ route('buyServers', ['time' => 'hour', 'region' => $Delicated_server->location_id, 'server_id' => $Delicated_server->id]) }}"
                                                    class="buy_serv">
                                                    <p>{{ $Delicated_server->price_hour }}€</p>
                                                </a>
                                            </div>
                                            <div class="price_month">
                                                <a href="{{ route('buyServers', ['time' => 'month', 'region' => $Delicated_server->location_id, 'server_id' => $Delicated_server->id]) }}"
                                                    class="buy_serv">
                                                    <p>{{ $Delicated_server->price_month }}€</p>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @endif
        </section>
        <section class="third__section third">
            <img src="{{ asset('img/glare/third_part_1.png') }}" alt="glare" class="third__part-1" />
            <div class="middle__container flex justify-between">
                <div class="third__left">
                    <h1>Нам доверяют крупнейшие бренды</h1>
                    <h2>
                        Мы работаем с крупнейшими брендами по всему миру, предоставляя
                        им надежные и высокопроизводительные серверы для их бизнеса.
                        Наша компания гарантирует безопасность и стабильность работы
                        серверов, что позволяет нашим клиентам сосредоточиться на своих
                        задачах и достижении успеха.
                    </h2>
                </div>
                <div class="third__right flex justify-between">
                    <div class="col">
                        <div class="third__img">
                            <img src="{{ asset('img/bank/t1.svg') }}" alt="" />
                        </div>
                        <div class="third__img">
                            <img src="{{ asset('img/bank/t2.svg') }}" alt="" />
                        </div>
                        <div class="third__img">
                            <img src="{{ asset('img/bank/t3.svg') }}" alt="" />
                        </div>
                    </div>
                    <img src="{{ asset('img/glare/third_part_2.png') }}" alt="" class="third__part-2" />
                </div>
            </div>
        </section>
        <section class="fourth__section fourth">
            <div class="mini__container">
                <div class="row">
                    <div class="col-4">
                        <div class="fourth__card">
                            <div class="fourth__back">
                                <img src="{{ asset('img/why/c1.svg') }}" alt="" />
                            </div>
                            <div class="fourth__name">Пропускная способность</div>
                            <div class="fourth__desc">
                                Базовая скорость: от 100 до 200 мбит в секунду. Но вы можете
                                увеличить ее до 1 гбита. Трафик неограничен
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="fourth__card">
                            <div class="fourth__back">
                                <img src="{{ asset('img/why/c2.svg') }}" alt="" />
                            </div>
                            <div class="fourth__name">Сверхбыстрые диски</div>
                            <div class="fourth__desc">
                                Данные на дисках NVMe записываются и читаются в 5 раз
                                быстрее, чем на обычных SSD
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="fourth__card">
                            <div class="fourth__back">
                                <img src="{{ asset('img/why/c3.svg') }}" alt="" />
                            </div>
                            <div class="fourth__name">Гарантированная доля CPU</div>
                            <div class="fourth__desc">
                                Выделяем конкретное количество ядер процессора, которыми
                                можете пользоваться только вы
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="fourth__card">
                            <div class="fourth__back">
                                <img src="{{ asset('img/why/c4.svg') }}" alt="" />
                            </div>
                            <div class="fourth__name">Поддержка 24/7</div>
                            <div class="fourth__desc">
                                24/7 поддержка в режиме реального времени всегда готова вам
                                помочь.
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="fourth__card">
                            <div class="fourth__back">
                                <img src="{{ asset('img/why/c5.svg') }}" alt="" />
                            </div>
                            <div class="fourth__name">Мощные процессоры</div>
                            <div class="fourth__desc">
                                Intel Xeon Gold 6230R 2,8 ГГц<br />AMD EPYC 7502 3,3 ГГц<br />Intel
                                i9-9900KF 5,0 ГГц
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="fourth__card">
                            <div class="fourth__back">
                                <img src="{{ asset('img/why/c6.svg') }}" alt="" />
                            </div>
                            <div class="fourth__name">Ваши данные надежно защищены</div>
                            <div class="fourth__desc">
                                Серверы сертифицированы и отвечают всем требованиям по
                                защите данных:
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @guest
            <section class="fifth__section fifth">
                <div class="container">
                    <img class="fifth__part" src="{{ asset('img/glare/fifth_part.png') }}" alt="" />
                    <h1>Регистрируйся и пользуйся самыми быстрыми серверами</h1>
                    <div class="fifth__input flex align-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22"
                            fill="none">
                            <path
                                d="M19.7083 16.5001L13.619 11.0001M8.38093 11.0001L2.29168 16.5001M1.83331 6.41675L9.31782 11.6559C9.9239 12.0802 10.2269 12.2923 10.5566 12.3744C10.8477 12.447 11.1522 12.447 11.4434 12.3744C11.773 12.2923 12.0761 12.0802 12.6821 11.6559L20.1666 6.41675M6.23331 18.3334H15.7666C17.3068 18.3334 18.0769 18.3334 18.6651 18.0337C19.1826 17.77 19.6033 17.3493 19.8669 16.8319C20.1666 16.2436 20.1666 15.4736 20.1666 13.9334V8.06675C20.1666 6.5266 20.1666 5.75653 19.8669 5.16827C19.6033 4.65083 19.1826 4.23013 18.6651 3.96648C18.0769 3.66675 17.3068 3.66675 15.7666 3.66675H6.23331C4.69317 3.66675 3.9231 3.66675 3.33484 3.96648C2.81739 4.23013 2.3967 4.65083 2.13305 5.16827C1.83331 5.75653 1.83331 6.5266 1.83331 8.06675V13.9334C1.83331 15.4736 1.83331 16.2436 2.13305 16.8319C2.3967 17.3493 2.81739 17.77 3.33484 18.0337C3.9231 18.3334 4.69317 18.3334 6.23331 18.3334Z"
                                stroke="#B2BEE2" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <input type="email" placeholder="Example@gmail.com" />
                        <a href="/registr.html">Регистрация</a>
                    </div>
                </div>
            </section>
        @endguest
    </main>
@endsection
