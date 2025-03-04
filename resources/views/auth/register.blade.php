@extends('layouts.layout')

@section('title', 'Регистрация')

@section('content')
    <section class="register">
        <h2>Регистрация</h2>
        <form action="{{ route('register') }}" method="post" enctype="application/x-www-form-urlencoded">
            @csrf
            <div>
                <label for="user-surname">Фамилия</label>
                <input id="user-surname" type="text" name="surname" placeholder="Введите вашу фамилию" required>
                @error('surname')
                    <p class="warning">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="user-name">Имя</label>
                <input id="user-name" type="text" name="name" placeholder="Введите ваше имя" required>
                @error('name')
                <p class="warning">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="user-patronymic">Отчество</label>
                <input id="user-patronymic" type="text" name="patronymic" placeholder="Введите ваше отчество">
                @error('patronymic')
                <p class="warning">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label>Пол</label>
                <input type="radio" name="sex" value="1" checked> Мужской
                <input type="radio" name="sex" value="0"> Женский
                @error('sex')
                <p class="warning">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="user-birthday">Дата рождения</label>
                <input id="user-birthday" type="date" name="birthday" required>
                @error('birthday')
                <p class="warning">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="user-email">Электронная почта</label>
                <input id="user-email" type="email" name="email" placeholder="Введите вашу почту" required>
                @error('email')
                <p class="warning">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="user-password">Пароль</label>
                <input id="user-password" type="password" name="password" placeholder="Введите ваш пароль" required>
                @error('password')
                <p class="warning">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="user-password-confirmation">Подтверждение пароля</label>
                <input id="user-password-confirmation" type="password" name="password_confirmation" placeholder="Введите ваш пароль" required>
            </div>
            <div>
                <button type="submit">Зарегистрироваться</button>
            </div>
        </form>
    </section>
@endsection
