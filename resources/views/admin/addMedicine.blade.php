@extends('loyauts.app')

@section('content')
    <p>Выберите действующие вещества для лекарства</p>
    <form action="/medicines/add" method="post">
        @csrf
        @foreach($substances as $substance)
            <input type="checkbox" name="{{ $substance->id }}" value="{{ $substance }}">
            <label for="{{ $substance->id }}">{{ $substance->name }}</label><br>
        @endforeach
        <p>Введите название препарата</p>
        <input type="text" name="name">
        <input type="submit" value="добавить">
    </form>

@endsection
