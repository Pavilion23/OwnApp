@extends('include.main')

@section('title')Редагування клієнта@endsection

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

    <form action="{{ route('clients.update', $data->id) }}" class="mt-3" method="post">
        @csrf

        <label for="client">Найменування клієнта</label>
        <input type="text" value="{{ $data->client }}" name="client" id="client" class="form-control">
        

        <label for="adres">Адреса клієнта</label>
        <input type="text" value="{{ $data->adres }}" name="adres" id='adres' class="form-control">

        <label for="edrpou">Код ЄДРПОУ кліента</label>
        <input type="number" value="{{ $data->edrpou }}" name="edrpou" id="edrpou" class="form-control">

        <label for="nomer_pdv">Номер свідоцтва платника ПДВ</label>
        <input type="text" value="{{ $data->nomer_pdv }}" name="nomer_pdv" id="nomer_pdv" class="form-control">
        
        <div class="form-group">
            <label for="platnyk_pdv">Платник ПДВ</label>
            @if($data->platnyk_pdv)
                <input type="checkbox" name="platnyk_pdv" id="platnyk_pdv" class="mt-3 mb-3" checked>
            @else
                <input type="checkbox" name="platnyk_pdv" id="platnyk_pdv" class="mt-3 mb-3">
            @endif
        </div>

        <label for="statut_fond">Статутний капітал</label>
        <input type="text" value="{{ $data->statut_fond }}" name="statut_fond" id="statut_fond" class="form-control">

        <button type="submit" class="mt-3 btn btn-warning">Зберігти</button>
        
        <a href="{{ route('clients.index') }}"><button class="mb-3 btn btn-info">Відміна</button></a>
    </form>

@endsection