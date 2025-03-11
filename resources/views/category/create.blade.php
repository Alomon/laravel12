@extends('layouts.layout')
@section('content')
    <h1>Создать новую категорию</h1>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <label for="name">Название категории</label>
        <input type="text" name="name" id="name" required>
        <input type="submit">
    </form>
    @endsection
