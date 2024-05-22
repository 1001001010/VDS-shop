@extends('layouts.app')
@section('title')
    ZETRIX - Список серверов
@endsection
@section('content')
    <main>
        <section class="first__section first">
            <img src="{{ asset('img/glare/third_part_1.png') }}" alt="glare" class="third__part-1" />
            <div class="container flex align-center justify-between">
                <div class="first__left">
                    <div class="first__name flex align-center">
                        <img src="{{ asset('img/fav.svg') }}" alt="" />
                        <span>виртуальные серверы на мощных процессорах AMD и NVMe SSD накопителях</span>
                    </div>
                    <h1>Виртуаль­ные серверы</h1>
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
                                <a href="{{ route('servers', ['region' => $location->link]) }}"
                                    class="table__item emoji @if (request()->region == $location->link) active @endif">
                                    {{ $location->name }}
                                </a>
                            @endforeach
                        </div>
                        @if (count($Shared_servers) > 0)
                            <div class="Offers">
                                <div class="left_block">
                                    <div class="dropdown">
                                        <a id="dropdown-toggle" class="for_what1 dropdown">Для чего подходит?</a>
                                        <div id="dropdown-content" class="dropdown-content">
                                            <p>
                                                <p3>
                                                    Облачные серверы базового уровня по сбалансированной цене на базе
                                                    процессора AMD Ryzen 9 7950X3D, с общим vCPU и NVMe накопителем.
                                                    Идеальный вариант для таких задач, как размещение веб-сайтов, VPN, или
                                                    разработка проектов. Вложенная виртуализация отключена
                                                </p3>
                                            </p>
                                        </div>
                                    </div>
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
                                                    <p>{{ $Shared_server->price_hour }}₽</p>
                                                </a>
                                            </div>
                                            <div class="price_month">
                                                <a href="{{ route('buyServers', ['time' => 'month', 'region' => $Shared_server->location_id, 'server_id' => $Shared_server->id]) }}"
                                                    class="buy_serv">
                                                    <p>{{ $Shared_server->price_month }}₽</p>
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
                                    <div class="dropdown">
                                        <a id="dropdown-toggle" class="for_what1 dropdown">Для чего подходит?</a>
                                        <div id="dropdown-content" class="dropdown-content">
                                            <p>
                                                <p3>
                                                    Облачные серверы высшего уровня с гарантированными ресурсами
                                                    процессора
                                                    AMD Ryzen 9 7950X3D и хранилищем NVMe с RAM Cache для самых
                                                    требовательных задач, например 1С, Битрикс или размещение
                                                    высоконагруженных сервисов. Вложенная виртуализация отключена
                                                </p3>
                                            </p>
                                        </div>
                                    </div>
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
                                                    <p>{{ $Delicated_server->price_hour }}₽</p>
                                                </a>
                                            </div>
                                            <div class="price_month">
                                                <a href="{{ route('buyServers', ['time' => 'month', 'region' => $Delicated_server->location_id, 'server_id' => $Delicated_server->id]) }}"
                                                    class="buy_serv">
                                                    <p>{{ $Delicated_server->price_month }}₽</p>
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
            <div class="middle__container flex oc">
                <div class="third__left">
                    <h1>Операционные системы</h1>
                    <h2>
                        Выбирай подходящую операционную систему из списка и мы поставим ее на ваш сервер
                    </h2>
                </div>
                <div class="flex flex__col__centr gap__50">
                    <div class="flex justify-around gap__100 col-12">
                        <div class="flex wrapper flex__col__centr gap__15">
                            <img src="{{ asset('img/OC/alma.svg') }}" alt="almalinux">
                            <p>Almalinux</p>
                        </div>
                        <div class="flex wrapper flex__col__centr gap__15">
                            <img src="{{ asset('img/OC/centos.svg') }}" alt="centos">
                            <p>Centos</p>
                        </div>
                        <div class="flex wrapper flex__col__centr gap__15">
                            <img src="{{ asset('img/OC/debian.svg') }}" alt="debian">
                            <p>Debian</p>
                        </div>
                        <div class="flex wrapper flex__col__centr gap__15">
                            <img src="{{ asset('img/OC/ubuntu.svg') }}" alt="ubuntu">
                            <p>Ubuntu</p>
                        </div>
                    </div>
                    <div class="flex justify-around gap__100 col-12">
                        <div class="flex wrapper flex__col__centr gap__15">
                            <img src="{{ asset('img/OC/astra.svg') }}" alt="astralinux">
                            <p>Astralinux</p>
                        </div>
                        <div class="flex wrapper flex__col__centr gap__15">
                            <img src="{{ asset('img/OC/windows.svg') }}" alt="windows">
                            <p>Windows</p>
                        </div>
                        <div class="flex wrapper flex__col__centr gap__15">
                            <img src="{{ asset('img/OC/freebsd.svg') }}" alt="freebsd">
                            <p>FreeBSD</p>
                        </div>
                        <div class="flex wrapper flex__col__centr gap__15">
                            <img src="{{ asset('img/OC/rocky.svg') }}" alt="rockylinux">
                            <p>Rockylinux</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="third__section third__without__line">
            <div class="middle__container flex oc">
                <div class="third__left">
                    <h1>Приложения и панели управления</h1>
                    <h2>
                        Выбирай нужные компаненты из списка и мы поставим их вам на сервер
                    </h2>
                </div>
                <div class="flex flex__col__centr gap__50">
                    <div class="flex justify-around gap__100 col-12">
                        <div class="flex wrapper flex__col__centr gap__15">
                            <img src="{{ asset('img/utils/gitlab.svg') }}" alt="gitlab">
                            <p>Gitlab</p>
                        </div>
                        <div class="flex wrapper flex__col__centr gap__15">
                            <img src="{{ asset('img/utils/doker.svg') }}" alt="doker">
                            <p>Doker</p>
                        </div>
                        <div class="flex wrapper flex__col__centr gap__15">
                            <img src="{{ asset('img/utils/fastpanel.svg') }}" alt="fastpanel">
                            <p>Fastpanel</p>
                        </div>
                        <div class="flex wrapper flex__col__centr gap__15">
                            <img src="{{ asset('img/utils/Node.js.svg') }}" alt="node js">
                            <p>Node js</p>
                        </div>
                    </div>
                    <div class="flex justify-around gap__100 col-12">
                        <div class="flex wrapper flex__col__centr gap__15">
                            <img src="{{ asset('img/utils/redmine.svg') }}" alt="redmine">
                            <p>Redmine</p>
                        </div>
                        <div class="flex wrapper flex__col__centr gap__15">
                            <img src="{{ asset('img/utils/wireguard.svg') }}" alt="wireguard">
                            <p>Wireguard</p>
                        </div>
                        <div class="flex wrapper flex__col__centr gap__15">
                            <img src="{{ asset('img/utils/rails.svg') }}" alt="Ruby on Rails">
                            <p>Ruby on Rails</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="third__section third">
            <img src="{{ asset('img/glare/third_part_2.png') }}" alt="glare" class="third__part-1" />
            <div class="middle__container flex oc">
                <div class="third__left">
                    <h1>Нет подходящего сервера?</h1>
                    <h2>
                        Не нашли подходящего сервера? Соберите нужную сборку и установить на нее нужную ОС и
                        приложения
                    </h2>
                </div>
                <div class="third__right_centre">
                    <form method="POST" action="{{ route('mineServer') }}" class="form_config">
                        @csrf
                        <h2>Регион размещения</h2>
                        @foreach ($locations as $location)
                            <div class="form_radio_btn cursor__pointer">
                                <input id="{{ $location->id }}" type="radio" name="radio_region"
                                    value="{{ $location->id }}">
                                <label for="{{ $location->id }}"
                                    class="cursor__pointer emoji">{{ $location->name }}</label>
                            </div>
                        @endforeach

                        {{-- тут бы цикл с бд, мне боюсь, что мне лень --}}

                        <h2>Операционная система</h2>
                        <div class="form_radio_btn cursor__pointer">
                            <input id="Almalinux" type="radio" name="system" value="Almalinux">
                            <label for="Almalinux" class="cursor__pointer">
                                <p>Almalinux</p>
                            </label>
                        </div>
                        <div class="form_radio_btn cursor__pointer">
                            <input id="Centos" type="radio" name="system" value="Centos">
                            <label for="Centos" class="cursor__pointer">Centos</label>
                        </div>
                        <div class="form_radio_btn cursor__pointer">
                            <input id="Debian" type="radio" name="system" value="Debian">
                            <label for="Debian" class="cursor__pointer">Debian</label>
                        </div>
                        <div class="form_radio_btn cursor__pointer">
                            <input id="Ubuntu" type="radio" name="system" value="Ubuntu">
                            <label for="Ubuntu" class="cursor__pointer">Ubuntu</label>
                        </div>
                        <div class="form_radio_btn cursor__pointer">
                            <input id="Windows" type="radio" name="system" value="Windows">
                            <label for="Windows" class="cursor__pointer">Windows</label>
                        </div>
                        <div class="form_radio_btn cursor__pointer">
                            <input id="Astrelinux" type="radio" name="system" value="Astrelinux">
                            <label for="Astrelinux" class="cursor__pointer">Astrelinux</label>
                        </div>
                        <div class="form_radio_btn cursor__pointer">
                            <input id="Rockylinux" type="radio" name="system" value="Rockylinux">
                            <label for="Rockylinux" class="cursor__pointer">Rockylinux</label>
                        </div>
                        <h2>Приложения и панели управления</h2>
                        <div class="form_radio_btn cursor__pointer">
                            <input id="Gitlab" type="radio" name="panel" value="Gitlab">
                            <label for="Gitlab" class="cursor__pointer">Gitlab</label>
                        </div>
                        <div class="form_radio_btn cursor__pointer">
                            <input id="Doker" type="radio" name="panel" value="Doker">
                            <label for="Doker" class="cursor__pointer">Doker</label>
                        </div>
                        <div class="form_radio_btn cursor__pointer">
                            <input id="Fastpanel" type="radio" name="panel" value="Fastpanel">
                            <label for="Fastpanel" class="cursor__pointer">Fastpanel</label>
                        </div>
                        <div class="form_radio_btn cursor__pointer">
                            <input id="Node_js" type="radio" name="panel" value="Node js">
                            <label for="Node_js" class="cursor__pointer">Node js</label>
                        </div>
                        <div class="form_radio_btn cursor__pointer">
                            <input id="Redmine" type="radio" name="panel" value="Redmine">
                            <label for="Redmine" class="cursor__pointer">Redmine</label>
                        </div>
                        <div class="form_radio_btn cursor__pointer">
                            <input id="Wireguard" type="radio" name="panel" value="Wireguard">
                            <label for="Wireguard" class="cursor__pointer">Wireguard</label>
                        </div>
                        <div class="form_radio_btn cursor__pointer">
                            <input id="Ruby" type="radio" name="panel" value="Ruby on Rails">
                            <label for="Ruby" class="cursor__pointer">Ruby on Rails</label>
                        </div>
                        <h2>Количество ядер vCPU</h2>
                        <div class="border__button">
                            <div class="polzunok">
                                <p id="min_cpu"></p>
                                <input type="range" min="1" max="24" step="1" value="4"
                                    id="cpu" class="cursor__pointer" name="CPU">
                                <p id="max_cpu"></p>
                            </div>
                            <p id="cpu_screen"></p>
                        </div>
                        <h2>Размер памяти RAM, ГБ</h2>
                        <div class="border__button">
                            <div class="polzunok">
                                <p id="min_ram"></p>
                                <input type="range" min="1" max="48" step="1" value="4"
                                    id="ram" class="cursor__pointer" name="RAM">
                                <p id="max_ram"></p>
                            </div>
                            <p id="ram_screen"></p>
                        </div>
                        <h2>Объем диска, ГБ</h2>
                        <div class="border__button">
                            <div class="polzunok">
                                <p id="min_hdd"></p>
                                <input type="range" min="20" max="480" step="20" value="40"
                                    id="hdd" class="cursor__pointer" name="SSD">
                                <p id="max_hdd"></p>
                            </div>
                            <p id="hdd_screen"></p>
                        </div>
                        <h2>Срок аренды</h2>
                        <div class="form_radio_btn cursor__pointer">
                            <input id="hour" type="radio" name="term" value="hour">
                            <label for="hour" class="cursor__pointer">
                                <p>Час</p>
                            </label>
                        </div>
                        <div class="form_radio_btn cursor__pointer">
                            <input id="month" type="radio" name="term" value="month">
                            <label for="month" class="cursor__pointer">Месяц</label>
                        </div>
                        <button type="submit" class="zakazat cursor__pointer">Заказать</button>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var cpu = document.getElementById('cpu');
            var cpu_screen = document.getElementById('cpu_screen');
            var min_cpu = document.getElementById('min_cpu');
            var max_cpu = document.getElementById('max_cpu');

            cpu.addEventListener('input', function() {
                cpu_screen.textContent = cpu.value;
            });

            var ram = document.getElementById('ram');
            var ram_screen = document.getElementById('ram_screen');
            var min_ram = document.getElementById('min_ram');
            var max_ram = document.getElementById('max_ram');

            ram.addEventListener('input', function() {
                ram_screen.textContent = ram.value;
            });

            var hdd = document.getElementById('hdd');
            var hdd_screen = document.getElementById('hdd_screen');
            var min_hdd = document.getElementById('min_hdd');
            var max_hdd = document.getElementById('max_hdd');

            hdd.addEventListener('input', function() {
                hdd_screen.textContent = hdd.value;
            });

            cpu_screen.textContent = cpu.value;
            min_cpu.textContent = cpu.min;
            max_cpu.textContent = cpu.max;

            ram_screen.textContent = ram.value;
            min_ram.textContent = ram.min;
            max_ram.textContent = ram.max;

            hdd_screen.textContent = hdd.value;
            min_hdd.textContent = hdd.min;
            max_hdd.textContent = hdd.max;
        });

        const notification = document.getElementById('notification');
        const closeButton = document.getElementById('close-button');
    </script>
@endsection
