@extends('index')

@section('content')
    <main>
        <section class="second__section second">
            <a href="{{ route('servers', ['region' => 'Moscow']) }}" class="header__reg button__back">⬅ Назад</a>
            <img class="right_photo" src="{{ asset('img/glare/first_part-2.png') }}" alt="blick" />
            <img class="left_photo" src="{{ asset('img/glare/first_part-1.png') }}" alt="blick" />
            <div class="container">
                <div class="tovar">
                    <div class="Offers">
                        <div class="left_block">
                            <p class="user__title">Пользователь <span class="bold">{{ Auth::user()->name }}</span></p>
                            <p class="user__title">Балланс: <span id="balanceValue"
                                    class="bold">{{ Auth::user()->balance }}₽</span></p>
                            <form method="POST"
                                action="{{ route('confirmRental', ['time' => $time, 'region' => $location->id, 'server_id' => $server->id]) }}">
                                @csrf
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
                                        <p id="os-error-message" class="error-message" style="color:#0fb5ff"></p>
                                        <h2>Операционная система</h2>
                                        <div class="padding-t__15">
                                            <div class="form_radio_btn cursor__pointer">
                                                <input id="oc-1" type="radio" name="radio_oc" value="Almalinux">
                                                <label for="oc-1" class="cursor__pointer">
                                                    <p>Almalinux</p>
                                                </label>
                                            </div>
                                            <div class="form_radio_btn cursor__pointer">
                                                <input id="oc-2" type="radio" name="radio_oc" value="Centos">
                                                <label for="oc-2" class="cursor__pointer">Centos</label>
                                            </div>
                                            <div class="form_radio_btn cursor__pointer">
                                                <input id="oc-3" type="radio" name="radio_oc" value="Debian">
                                                <label for="oc-3" class="cursor__pointer">Debian</label>
                                            </div>
                                            <div class="form_radio_btn cursor__pointer">
                                                <input id="oc-4" type="radio" name="radio_oc" value="Ubuntu">
                                                <label for="oc-4" class="cursor__pointer">Ubuntu</label>
                                            </div>
                                            <div class="form_radio_btn cursor__pointer">
                                                <input id="oc-5" type="radio" name="radio_oc" value="Windows">
                                                <label for="oc-5" class="cursor__pointer">Windows</label>
                                            </div>
                                            <div class="form_radio_btn cursor__pointer">
                                                <input id="oc-6" type="radio" name="radio_oc" value="Astrelinux">
                                                <label for="oc-6" class="cursor__pointer">Astrelinux</label>
                                            </div>
                                            <div class="form_radio_btn cursor__pointer">
                                                <input id="oc-7" type="radio" name="radio_oc" value="Rockylinux">
                                                <label for="oc-7" class="cursor__pointer">Rockylinux</label>
                                            </div>
                                        </div>
                                    </li>
                                    <h2 class="padding-t__15">Приложения и панели управления</h2>
                                    <div class="padding-t__15">
                                        <div class="form_radio_btn cursor__pointer">
                                            <input id="dop-2" type="radio" name="radio_po" value="Gitlab">
                                            <label for="dop-2" class="cursor__pointer">Gitlab</label>
                                        </div>
                                        <div class="form_radio_btn cursor__pointer">
                                            <input id="dop-3" type="radio" name="radio_po" value="Doker">
                                            <label for="dop-3" class="cursor__pointer">Doker</label>
                                        </div>
                                        <div class="form_radio_btn cursor__pointer">
                                            <input id="dop-4" type="radio" name="radio_po" value="Fastpanel">
                                            <label for="dop-4" class="cursor__pointer">Fastpanel</label>
                                        </div>
                                        <div class="form_radio_btn cursor__pointer">
                                            <input id="dop-5" type="radio" name="radio_po" value="Node_js">
                                            <label for="dop-5" class="cursor__pointer">Node js</label>
                                        </div>
                                        <div class="form_radio_btn cursor__pointer">
                                            <input id="dop-1" type="radio" name="radio_po" value="Redmine">
                                            <label for="dop-1" class="cursor__pointer">Redmine</label>
                                        </div>
                                        <div class="form_radio_btn cursor__pointer">
                                            <input id="dop-6" type="radio" name="radio_po" value="Wireguard2">
                                            <label for="dop-6" class="cursor__pointer">Wireguard</label>
                                        </div>
                                        <div class="form_radio_btn cursor__pointer">
                                            <input id="dop-7" type="radio" name="radio_po" value="Ruby_on_Rails">
                                            <label for="dop-7" class="cursor__pointer">Ruby on Rails</label>
                                        </div>
                                    </div>
                                    @if ($time == 'month')
                                        <li>
                                            <p>Срок аренды: <span id="balanceValue" class="bold">Месяц</span></p>
                                        </li>
                                        <li>
                                            <p>Цена аренды: <span id="balanceValue"
                                                    class="bold">{{ $server->price_month }}₽</span>
                                            </p>
                                        </li>
                                    @endif
                                    @if ($time == 'hour')
                                        <li>
                                            <p>Срок аренды: <span id="balanceValue" class="bold">Час</span></p>
                                        </li>
                                        <li>
                                            <p>Цена аренды: <span id="balanceValue"
                                                    class="bold">{{ $server->price_hour }}₽</span>
                                            </p>
                                        </li>
                                    @endif
                                    <div class="flex wrapper flex__col__start button__reduct_user gap__15 padding-t__15">
                                        <div class="table__item">
                                            <button type="submit" class="table__item">Арендовать</button>
                                        </div>
                                    </div>
                                </ul>
                            </form>
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

        function isOsSelected() {
            const osRadioButtons = document.getElementsByName('radio_oc');
            let osSelected = false;

            for (let i = 0; i < osRadioButtons.length; i++) {
                if (osRadioButtons[i].checked) {
                    osSelected = true;
                    break;
                }
            }

            return osSelected;
        }

        const rentButton = document.querySelector('.button__reduct_user a');

        rentButton.addEventListener('click', (event) => {
            if (!isOsSelected()) {
                event.preventDefault();
                document.getElementById('os-error-message').innerText =
                    'Пожалуйста, выберите операционную систему.';
            } else {
                document.getElementById('os-error-message').innerText = '';
            }
        });
    </script>
@endsection
