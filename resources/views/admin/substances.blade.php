@extends('loyauts.app')

@section('content')

    <a href="/">На главную</a>
    <a href="/medicines">Все лекарства</a>
    <a href="/substances/add">Добавить вещество</a>
    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>Название лекарства</th>
            <th>Создана</th>
            <th>Последнее редактирование</th>
            <th>Видимость</th>
            <th>Редактировать</th>
            <th>Удалить</th>
        </tr>
        </thead>
        <tbody>
        @foreach($substances as $substance)
            <tr>
                <th>{{ $substance->id }}</th>
                <td>{{ $substance->name }}</td>
                <td>{{ $substance->created_at }}</td>
                <td>{{ $substance->updated_at }}</td>
                <td><a href="/substances/visible/{{ $substance->id }}">{{ $substance->deleted_at ? 'Скрыто' : 'Видимое' }}</a></td>
                <td><a href="/substances/edit/{{ $substance->id }}">редактировать</a></td>
                <td><a href="/substances/deleted/{{ $substance->id }}">удалить</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $substances->links() }}


@endsection


