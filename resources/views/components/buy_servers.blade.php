@extends('index')

@section('content')
    <main>
        <section class="second__section second">
            <div class="container">
                <div class="tovar">
                    <div class="Offers">
                        <div class="left_block">
                            <p class="user__title">Пользователь <span class="bold">{{ Auth::user()->name }}</span></p>
                            <p class="user__title">Балланс: <span id="balanceValue"
                                    class="bold">{{ Auth::user()->balance }}₽</span></p>
                            <ul type="circle" class="haracter">
                                <li>
                                    <p>ID Сервера: <span id="balanceValue" class="bold">{{ $server->id }}</span></p>
                                </li>
                                <li>
                                    <p>Локация: <span id="balanceValue" class="bold">{{ $location->name }}</span></p>
                                </li>
                                <li>
                                    <p>CPU: <span id="balanceValue" class="bold">{{ $server->cpu }}</span></p>
                                </li>
                                <li>
                                    <p>RAM: <span id="balanceValue" class="bold">{{ $server->ram }}</span></p>
                                </li>
                                <li>
                                    <p>SSD: <span id="balanceValue" class="bold">{{ $server->ssd }}GB</span></p>
                                </li>
                                <li>
                                    <p>SSD: <span id="balanceValue" class="bold">{{ $server->ssd }}GB</span></p>
                                </li>
                                <li>
                                    <p>Цена: <span id="balanceValue" class="bold">{{ $rental->price }}₽</span></p>
                                </li>
                                <div class="flex wrapper flex__col__start button__reduct_user gap__15 padding-t__15">
                                    <div class="table__item">
                                        <a target="_blank">Арендовать</a>
                                    </div>
                                </div>
                            </ul>
                        </div>
                        {{-- <div class="right_block">
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
                        </div> --}}
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script>
        function formatNumber(num) {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1 ');
        }

        $(document).ready(function() {
            const balanceValue = $('#balanceValue');
            const newBalance = '{{ Auth::user()->balance }}';
            const newBalanceInt = Math.trunc(newBalance);
            balanceValue.animate({
                num: newBalanceInt
            }, {
                duration: 500,
                step: function(num) {
                    $(this).text(formatNumber(Math.trunc(num)) + '₽');
                }
            });
        });
    </script>
@endsection
