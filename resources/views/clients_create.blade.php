@extends('include.main')

@section('title')Добавлення клієнта@endsection

@section('content')
    <form action="{{ route('clients.store') }}" class="mr-3" method="post">
        @csrf

        <div class="form-group">
            <label for="client">Найменування клієнта</label>
            <input type="text" name="client" class="form-control @error('client') is-invalid @enderror" value="{{ old('client') }}"> 
            @error('client')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="adres">Адреса кліента</label>
            <input type="text" name="adres" class="form-control @error('adres') is-invalid @enderror" value="{{ old('adres') }}"> 
            @error('adres')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
         <div class="form-group">
            <label for="edrpou">Код ЄДРПОУ клієнта</label>
            <input type="number" name="edrpou" class="form-control @error('edrpou') is-invalid @enderror" value="{{ old('edrpou') }}"> 
            @error('edrpou')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="nomer_pdv">Номер свідоцтва платника ПДВ</label>
            <input type="text" name="nomer_pdv" class="form-control @error('nomer_pdv') is-invalid @enderror" value="{{ old('nomer_pdv') }}"> 
            @error('nomer_pdv')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="platnyk_pdv">Платник ПДВ</label>
            <input type="checkbox" name="platnyk_pdv" class="mt-3 mb-3"> 
        </div>
        <div class="form-group">
            <label for="statut_fond">Статутний капітал</label>
            <input type="number" name="statut_fond" class="form-control @error('statut_fond') is-invalid @enderror" value="{{ old('statut_fond') }}"> 
            @error('statut_fond')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="mt-3 btn btn-danger">Save</button>
    </form>
    <a href="{{ route('clients.index') }}"><button class="mt-3 btn btn-warning">Відміна</button></a>
@endsection