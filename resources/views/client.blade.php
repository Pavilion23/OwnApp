@extends('include.main')

@section('title')Перелік клієнтів@endsection

@section('content')
    <h3>Перелік клієнтів</h3>
    <a href="{{ route('clientAdd') }}"><button class="mb-3 btn btn-info">Добавити нового клієнта</button></a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (count($data ) === 0)
        <div class="alert alert-warning">
            <p>Немає записів</p>
        </div>
    @else
        @foreach($data as $client)
            <div class="alert alert-info">
                <P>Найменування клієнта : <b>{{ $client->client }}</b></P>
                <p>Адреса : <b>{{ $client->adres }}</b></p>
                <p>Код ЄДРПОУ : <b>{{ $client->edrpou }}</b></p>
                <p>Номер свідоцтва ПДВ : <b>{{ $client->nomer_pdv }}</b></p>
                @if($client->platnyk_pdv)              
                    <p><b>Платник ПДВ</b></p>
                @else
                    <p><b>Не платник ПДВ</b></p>
                @endif
                <p>Размір статутного фонду : <b>{{ $client->statut_fond }}</b></p>
                <a href="{{ route('client-edit', $client->id) }}"><button class="btn btn-warning">Редагувати</button></a>
                <a href="{{ route('client-delete', $client->id) }}"><button class="btn btn-danger">Видалити</button></a>
            </div>       
        @endforeach
    @endif
@endsection