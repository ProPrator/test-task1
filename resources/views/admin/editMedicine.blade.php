@extends('loyauts.app')

@section('content')

    <form action="/medicines/edit/{{ $medicine->id }}" method="post">
        @csrf
        <input type="text" name="name" value="{{ $medicine->name }}">
        <input type="submit" value="изменить">
    </form>

@endsection
