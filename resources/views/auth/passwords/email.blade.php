@extends('layouts.app')

@section('content')
    <a href="{{ route('index', ['location' => 'Moscow']) }}" class="header__reg button__back">⬅ Назад</a>
    <div class="form_zapoln">
        <img class="right_photo" src="{{ asset('img/glare/first_part-2.png') }}" alt="blick" />
        <img class="left_photo" src="{{ asset('img/glare/first_part-1.png') }}" alt="blick" />
        <h1 class="text-center">Вход</h1>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="reg__input flex align-center">
                <img src="{{ asset('img/mail.svg') }}" alt="mail">
                <input id="email" placeholder="Email" type="email" class="input @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            </div>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <ul class="header__reg flex justify-center">
                <li><button type="submit" href="/">{{ __('Восстановить') }}</button></li>
            </ul>
        </form>
    </div>
@endsection
