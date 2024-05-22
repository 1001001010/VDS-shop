@extends('layouts.app')
@section('title')
    ZETRIX - Профиль {{ Auth::user()->name }}
@endsection

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
                            </ul>
                        </div>
                        <div class="right_block">
                            <div class="title-centre">
                                <p>Всего аренд: <span class="bold">{{ $count_rent }}</span></p>
                            </div>
                            <div class="testblock">
                                @foreach ($rents as $rent)
                                    <a href="{{ route('profile_rentals', ['rentals_id' => $rent->id]) }}" class="light">
                                        <div class="serv__inf__block">
                                            <p>Аренда <b>{{ $rent->created_at }}</b></p>
                                            <p>Цена <b>{{ $rent->price }}₽</b></p>
                                            @if ($rent->status == 'active')
                                                <p><b>Активен</b></p>
                                            @else
                                                <p><b>Неактивен</b></p>
                                            @endif
                                        </div>
                                    </a>
                                @endforeach
                            </div>
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
