@extends('index')

@section('content')
    <main>
        <section class="first__section first">
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
                    <div class="tovar">
                        <div class="country">
                            @foreach ($locations as $location)
                                <a href="{{ route('servers', ['region' => $location->link]) }}"
                                    class="table__item">{{ $location->name }}</a>
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
                                                <a href="/" class="buy_serv">
                                                    <p>{{ $Shared_server->price_hour }}€</p>
                                                </a>
                                            </div>
                                            <div class="price_month">
                                                <a href="/" class="buy_serv">
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
                                                <a href="/" class="buy_serv">
                                                    <p>{{ $Delicated_server->price_hour }}€</p>
                                                </a>
                                            </div>
                                            <div class="price_month">
                                                <a href="/" class="buy_serv">
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
                    <form action="" class="form_config">
                        <h2>Регион размещения</h2>
                        <div class="form_radio_btn cursor__pointer">
                            <input id="region-1" type="radio" name="radio_region" value="1" checked>
                            <label for="region-1" class="cursor__pointer">
                                <p>Москва</p>
                            </label>
                        </div>
                        <div class="form_radio_btn cursor__pointer">
                            <input id="region-2" type="radio" name="radio_region" value="2">
                            <label for="region-2" class="cursor__pointer">Фалькенштайн</label>
                        </div>
                        <div class="form_radio_btn cursor__pointer">
                            <input id="region-3" type="radio" name="radio_region" value="3">
                            <label for="region-3" class="cursor__pointer">Хельсинки</label>
                        </div>
                        <h2>Операционная система</h2>
                        <div class="form_radio_btn cursor__pointer">
                            <input id="oc-1" type="radio" name="radio_oc" value="">
                            <label for="oc-1" class="cursor__pointer">
                                <p>Almalinux</p>
                            </label>
                        </div>
                        <div class="form_radio_btn cursor__pointer">
                            <input id="oc-2" type="radio" name="radio_oc" value="2">
                            <label for="oc-2" class="cursor__pointer">Centos</label>
                        </div>
                        <div class="form_radio_btn cursor__pointer">
                            <input id="oc-3" type="radio" name="radio_oc" value="3">
                            <label for="oc-3" class="cursor__pointer">Debian</label>
                        </div>
                        <div class="form_radio_btn cursor__pointer">
                            <input id="oc-4" type="radio" name="radio_oc" value="4">
                            <label for="oc-4" class="cursor__pointer">Ubuntu</label>
                        </div>
                        <div class="form_radio_btn cursor__pointer">
                            <input id="oc-5" type="radio" name="radio_oc" value="5">
                            <label for="oc-5" class="cursor__pointer">Windows</label>
                        </div>
                        <div class="form_radio_btn cursor__pointer">
                            <input id="oc-6" type="radio" name="radio_oc" value="6">
                            <label for="oc-6" class="cursor__pointer">Astrelinux</label>
                        </div>
                        <div class="form_radio_btn cursor__pointer">
                            <input id="oc-7" type="radio" name="radio_oc" value="7">
                            <label for="oc-7" class="cursor__pointer">Rockylinux</label>
                        </div>
                        <h2>Приложения и панели управления</h2>
                        <div class="form_radio_btn cursor__pointer">
                            <input id="dop-2" type="radio" name="radio_po" value="2">
                            <label for="dop-2" class="cursor__pointer">Gitlab</label>
                        </div>
                        <div class="form_radio_btn cursor__pointer">
                            <input id="dop-3" type="radio" name="radio_po" value="3">
                            <label for="dop-3" class="cursor__pointer">Doker</label>
                        </div>
                        <div class="form_radio_btn cursor__pointer">
                            <input id="dop-4" type="radio" name="radio_po" value="2">
                            <label for="dop-4" class="cursor__pointer">Fastpanel</label>
                        </div>
                        <div class="form_radio_btn cursor__pointer">
                            <input id="dop-5" type="radio" name="radio_po" value="3">
                            <label for="dop-5" class="cursor__pointer">Node js</label>
                        </div>
                        <div class="form_radio_btn cursor__pointer">
                            <input id="dop-1" type="radio" name="radio_po" value="">
                            <label for="dop-1" class="cursor__pointer">Redmine</label>
                        </div>
                        <div class="form_radio_btn cursor__pointer">
                            <input id="dop-6" type="radio" name="radio_po" value="2">
                            <label for="dop-6" class="cursor__pointer">Wireguard</label>
                        </div>
                        <div class="form_radio_btn cursor__pointer">
                            <input id="dop-7" type="radio" name="radio_po" value="3">
                            <label for="dop-7" class="cursor__pointer">Ruby on Rails</label>
                        </div>
                        <h2>Количество ядер vCPU</h2>
                        <div class="border__button">
                            <div class="polzunok">
                                <p id="min_cpu"></p>
                                <input type="range" min="1" max="24" step="1" value="4"
                                    id="cpu" class="cursor__pointer">
                                <p id="max_cpu"></p>
                            </div>
                            <p id="cpu_screen"></p>
                        </div>
                        <h2>Размер памяти RAM, ГБ</h2>
                        <div class="border__button">
                            <div class="polzunok">
                                <p id="min_ram"></p>
                                <input type="range" min="1" max="48" step="1" value="4"
                                    id="ram" class="cursor__pointer">
                                <p id="max_ram"></p>
                            </div>
                            <p id="ram_screen"></p>
                        </div>
                        <h2>Объем диска, ГБ</h2>
                        <div class="border__button">
                            <div class="polzunok">
                                <p id="min_hdd"></p>
                                <input type="range" min="20" max="480" step="20" value="40"
                                    id="hdd" class="cursor__pointer">
                                <p id="max_hdd"></p>
                            </div>
                            <p id="hdd_screen"></p>
                        </div>
                        <h2>Срок аренды</h2>
                        <div class="form_radio_btn cursor__pointer">
                            <input id="hour" type="radio" name="radio" value="1">
                            <label for="hour" class="cursor__pointer">
                                <p>Час</p>
                            </label>
                        </div>
                        <div class="form_radio_btn cursor__pointer">
                            <input id="month" type="radio" name="radio" value="2">
                            <label for="month" class="cursor__pointer">Месяц</label>
                        </div>
                        <button class="zakazat cursor__pointer">Заказать</button>
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
    </script>
@endsection
