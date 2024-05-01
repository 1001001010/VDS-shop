@extends('index')

@section('content')
    <main>
        <section class="second__section second">
            <div class="container">
                <div class="tovar">
                    @if (session('success'))
                        <div id="notification" class="alert alert-success">
                            <span id="notification-text">{{ session('success') }}</span>
                        </div>
                    @endif
                    <div class="Offers">
                        <div class="left_block">
                            <p class="user__title">Пользователь <span class="bold">{{ Auth::user()->name }}</span></p>
                            <ul type="circle" class="haracter">
                                <li>
                                    <p>Email: <span class="bold">{{ Auth::user()->email }}</span></p>
                                </li>
                                <li>
                                    <p>Балланс: <span id="balanceValue" class="bold">{{ Auth::user()->balance }}₽</span>
                                    </p>
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
                                <p>Всего аренд: <span class="bold">{{ $count_rent }}</span></p>
                            </div>
                            @foreach ($rents as $rent)
                                <div class="serv__inf__block">
                                    <p><b>{{ $rent->endDate }}</b></p>
                                    <p>ID сервера: 23</p>
                                    <p>Срок: Месяц</p>
                                    <p>Цена: 450</p>
                                </div>
                            @endforeach
                        </div>
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
