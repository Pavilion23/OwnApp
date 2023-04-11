@extends('include.main')

@section('title')Головна сторінка@endsection

@section('content')
    <h1>Головна сторінка</h1>
    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero beatae molestias facilis ducimus unde consectetur numquam ipsum esse ipsa tenetur, 
        saepe quisquam nam laboriosam obcaecati mollitia atque voluptatem error dolorum.</p>
@endsection

@section('aside')
    @parent
    <p>Додатковий текст Головної сторінки.</p>
@endsection 