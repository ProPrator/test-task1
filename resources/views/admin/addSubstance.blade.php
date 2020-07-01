@extends('loyauts.app')

@section('content')

    <form action="/substances/add" method="post">
        @csrf
        <input type="text" name="name" placeholder="введите название вещества">
        <input type="submit" value="добавить">
    </form>

@endsection
