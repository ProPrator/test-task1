@extends('loyauts.app')

@section('content')

    <form action="/substances/edit/{{ $substance->id }}" method="post">
        @csrf
        <input type="text" name="name" value="{{ $substance->name }}">
        <input type="submit" value="изменить">
    </form>

@endsection
