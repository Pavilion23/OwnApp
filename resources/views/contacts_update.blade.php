@extends('include.main')

@section('title')Редагування контакту@endsection

@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<!-- -->
    <form action=" {{route('contacts.update', $data->id) }} " class="mt-3" method="put">
        @csrf

        <div class="form-group">
            <label for="name">Введіть ім'я</label>
            <input type="text" name="name" value="{{ $data->name }}" id="name" class="form-control">
        </div>

        <div class="form-group">
            <label for="email">Введіть ваш email</label>
            <input type="text" name="email" value="{{ $data->email }}" id="email" class="form-control">
        </div>

        <div class="form-group">
            <label for="subject">Введіть тему повідомлення</label>
            <input type="text" name="subject" value="{{ $data->subject }}" id="subject" class="form-control">
        </div>

        <div class="form-group">
            <label for="message">Повідомлення</label>
            <textarea name="message" id="message" class="form-control">{{ $data->message }}</textarea>
        </div>

        <button type="submit" class="mt-3 btn btn-warning">Зберігти</button>
        <a href="{{ route('contacts.index') }}"><button class="mt-3 btn btn-info">Відмінити</button></a>    
    </form>
<!-- -->
@endsection