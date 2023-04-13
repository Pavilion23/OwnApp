@extends('include.main')

@section('title')Контакти@endsection

@section('content')
    <h3>Зв'яжіться с нами</h3>
    <a href="{{ route('contacts.create') }}"><button class="mb-3 btn btn-info">Добавити</button></a>

    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif

    @if(count($data)=== 0)
        <div class="alert alert-warning">Немає записів</div>
    @else
        @foreach($data as $dat)
            <div class="alert alert-info">
                <h3>Автор : <b>{{ $dat->name }}</b></h3>
                <p>Email адреса : <b>{{ $dat->email }}</b></p>
                <p>Тема : <b>{{ $dat->subject }}</b></p>
                <p>Повідомлення : <b>{{ $dat->message }}</b></p>
                <a href="{{ route('contacts.edit', $dat->id) }}"><button class="btn btn-warning">Редагувати</button></a>
                <a href="{{ route('contacts.destroy', $dat->id) }}"><button class="btn btn-danger">Видалити</button></a>
            </div>
        @endforeach
    @endif
@endsection