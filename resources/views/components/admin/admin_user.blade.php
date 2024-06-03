@extends('layouts.admin_app')
@section('title')
    ZETRIX - Админ/Пользователь {{ $user->name }}
@endsection

@section('admin_content')
    <main>
        <section class="second__section second">
            <div class="container">
                @if (session('success'))
                    <div id="notification" class="alert alert-success">
                        <span id="notification-text">{{ session('success') }}</span>
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
                                    <p>Балланс: <span id="balanceValue" class="bold"></span></p>
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
                                        <a id="addBalance">Пополнить балланс</a>
                                    </div>
                                    <div class="table__item">
                                        <a id="reworkBalance">Изменить балланс</a>
                                    </div>
                                    <div class="table__item">
                                        @if ($user->is_admin == 0)
                                            <a href="{{ route('make_admin', ['id' => $user->id]) }}">Назначить
                                                администратором</a>
                                        @else
                                            <a href="{{ route('make_admin', ['id' => $user->id]) }}">Забрать админку</a>
                                        @endif
                                        {{-- <a href="/" target="_blank">Назначить администратором</a> --}}
                                    </div>
                                </div>
                            </ul>
                        </div>
                        <div class="right_block">
                            <div class="title-centre">
                                <p>Всего аренд: <span class="bold">{{ count($user->rentals) }}</span></p>
                            </div>
                            <div class="testblock">
                                @foreach ($user->rentals as $rent)
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
        function addBalance() {
            let result = prompt("Введите сумму");
            const numberPattern = /^[0-9]+(.[0-9]+)?$/;
            if (!numberPattern.test(result)) {
                alert("Пожалуйста, введите число.");
                return;
            }
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `/admin/user/addbalance/${id}`;
            const csrfField = document.createElement('input');
            csrfField.type = 'hidden';
            csrfField.name = '_token';
            csrfField.value = '{{ csrf_token() }}';
            const numberField = document.createElement('input');
            numberField.type = 'hidden';
            numberField.name = 'number';
            numberField.value = result;
            form.appendChild(csrfField);
            form.appendChild(numberField);
            document.body.appendChild(form);
            form.submit();
        }

        function reworkBalance() {
            let result2 = prompt("Введите сумму");
            const numberPattern2 = /^[0-9]+(.[0-9]+)?$/;
            if (!numberPattern2.test(result2)) {
                alert("Пожалуйста, введите число.");
                return;
            }
            const form2 = document.createElement('form');
            form2.method = 'POST';
            form2.action = `/admin/user/reworkbalance/${id}`;
            const csrfField2 = document.createElement('input');
            csrfField2.type = 'hidden';
            csrfField2.name = '_token';
            csrfField2.value = '{{ csrf_token() }}';
            const numberField2 = document.createElement('input');
            numberField2.type = 'hidden';
            numberField2.name = 'number';
            numberField2.value = result2;
            form2.appendChild(csrfField2);
            form2.appendChild(numberField2);
            document.body.appendChild(form2);
            form2.submit();
        }

        const id = '{{ $user->id }}';

        const addBtn = document.getElementById('addBalance');
        const reworkBtn = document.getElementById('reworkBalance');

        addBtn.addEventListener('click', addBalance);
        reworkBtn.addEventListener('click', reworkBalance);

        function formatNumber(num) {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1 ');
        }

        $(document).ready(function() {
            const balanceValue = $('#balanceValue');
            const newBalance = '{{ $user->balance }}';
            balanceValue.animate({
                num: parseFloat(newBalance)
            }, {
                duration: 500,
                step: function(num) {
                    $(this).text(formatNumber(Math.floor(num)) + '₽');
                }
            });
        });

        const notification = document.getElementById('notification');
        const closeButton = document.getElementById('close-button');
    </script>
@endsection
