@extends('loyauts.app')

@section('content')

    <a href="/">На главную</a>
    <a href="/substances">Все вещества</a>
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
        @foreach($medicines as $medicine)
            <tr>
                <th>{{ $medicine->id }}</th>
                <td>{{ $medicine->name }}</td>
                <td>{{ $medicine->created_at }}</td>
                <td>{{ $medicine->updated_at }}</td>
                <td><a href="/medicines/visible/{{ $medicine->id }}">{{ $medicine->visible ? 'Видимое' : 'Скрыто' }}</a></td>
                <td><a href="/medicines/edit/{{ $medicine->id }}">редактировать</a></td>
                <td><a href="/medicines/deleted/{{ $medicine->id }}">удалить</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $medicines->links() }}


@endsection


