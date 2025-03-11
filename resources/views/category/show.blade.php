@extends('layouts.layout')
@section('content')
    <p>
        ID: {{ $category->id }}
    </p>
    <p>
        Название: {{ $category->name }}
    </p>
@endsection
