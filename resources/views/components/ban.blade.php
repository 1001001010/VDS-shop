@extends('layouts.app')

@section('title')
    ZETRIX - Вы заблокированы.
@endsection

@section('content')
    <div class="form_zapoln">
        <img class="right_photo" src="{{ asset('img/glare/first_part-2.png') }}" alt="blick" />
        <img class="left_photo" src="{{ asset('img/glare/first_part-1.png') }}" alt="blick" />
        <h1 class="text-center">Вы заблокированы</h1>
        <h3 class="text-center">Если это произошло по ошибкe - отпишите администратору</h3>
        <ul class="header__reg flex justify-center padding-t__15">
        </ul>
    </div>
@endsection
