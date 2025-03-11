@extends('layouts.layout')
@section('content')
    <h1>Редактировать категорию</h1>
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @method('PUT')
        @csrf
        <label for="name">Название категории</label>
        <input type="text" name="name" id="name" required value="{{ $category->name }}">
        <button type="submit">Обновить</button>
    </form>
@endsection
