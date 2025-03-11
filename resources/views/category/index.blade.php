@extends('layouts.layout')
@section('content')
    <h1>Категории</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
            </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
            </tr>

        @endforeach
        </tbody>
    </table>
@endsection
