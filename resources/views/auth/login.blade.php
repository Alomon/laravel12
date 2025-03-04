@extends('layouts.layout')

@section('title', 'Аутентификация')

@section('content')
    <section class="log-in">
        <h2>Вход в систему</h2>
        @error('error')
            <p class="warning">{{ $message }}</p>
        @enderror
        <form action="{{ route('login') }}" method="post" enctype="application/x-www-form-urlencoded">
            @csrf
            <div>
                <label for="log-in-email">Электронная почта</label>
                <input id="log-in-email" type="email" name="email" placeholder="Введите вашу почту" required>
            </div>
            <div>
                <label for="log-in-password">Пароль</label>
                <input id="log-in-password" type="password" name="password" placeholder="Введите ваш пароль" required>
            </div>
            <div>
                <button type="submit">Войти</button>
            </div>
        </form>
    </section>
@endsection


