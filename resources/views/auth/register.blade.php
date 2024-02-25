@extends('layouts.app')

@section('content')
    <a href="/index.html" class="header__reg button__back">⬅ Назад</a>
    <div class="form_zapoln">
        <img class="right_photo" src="{{ asset('img/glare/first_part-2.png') }}" alt="blick" />
        <img class="left_photo" src="{{ asset('img/glare/first_part-1.png') }}" alt="blick" />
        <h1 class="text-center">Регистрация</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="reg__input flex align-center">
                <img src="{{ asset('img/mail.svg') }}" alt="fingers">
                <input id="name" placeholder="Name" type="text" class="input @error('name') is-invalid @enderror"
                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus />
            </div>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div class="reg__input flex align-center">
                <img src="{{ asset('img/mail.svg') }}" alt="fingers">
                <input id="email" placeholder="Email" type="email" class="input @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="email" />
            </div>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div class="reg__input flex align-center">
                <img src="{{ asset('img/touch.svg') }}" alt="fingers">
                <input id="password" placeholder="Password" type="password"
                    class="input @error('password') is-invalid @enderror" name="password" required
                    autocomplete="new-password" />
            </div>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div class="reg__input flex align-center">
                <img src="{{ asset('img/touch.svg') }}" alt="fingers">
                <input id="password-confirm" placeholder="Confirm password" type="password" class="input"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>
            <ul class="header__reg flex justify-center">
                <li><button type="submit" href="/">{{ __('Зарегистрироваться') }}</button></li>
            </ul>
            <div class="text-center link__list">
                <a href="/sign_in.html">Войти</a>
            </div>
        </form>
    </div>
@endsection
