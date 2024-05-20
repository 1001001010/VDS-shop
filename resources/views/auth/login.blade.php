@extends('layouts.app')

@section('content')
    <a href="{{ route('index', ['region' => 'Moscow']) }}" class="header__reg button__back">⬅ Назад</a>
    <div class="form_zapoln">
        <img class="right_photo" src="{{ asset('img/glare/first_part-2.png') }}" alt="blick" />
        <img class="left_photo" src="{{ asset('img/glare/first_part-1.png') }}" alt="blick" />
        <h1 class="text-center">Вход</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="reg__input flex align-center">
                <img src="{{ asset('img/mail.svg') }}" alt="mail">
                <input id="email" type="email" placeholder="Email" class="input @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
            </div>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong class="alert-center">{{ $message }}</strong>
                </span>
            @enderror
            <div class="reg__input flex align-center">
                <img src="{{ asset('img/touch.svg') }}" alt="fingers">
                <input id="password" type="password" placeholder="Password"
                    class="input @error('password') is-invalid @enderror" name="password" required
                    autocomplete="current-password" />
            </div>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong class="alert-center">{{ $message }}</strong>
                </span>
            @enderror
            <ul class="header__reg flex justify-center">
                <li><button type="submit" href="/">{{ __('Войти') }}</button></li>
            </ul>
        </form>
        <div class="text-center link__list">
            <a href="{{ route('register') }}">Регистрация</a>
        </div>
    </div>
@endsection
