<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forum</title>

    <link rel="stylesheet" href={{ asset("css/style.css") }}>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


</head>
@extends('layouts.app')

<body>
@isset($user)
<div class="hello_user"> Добро пожаловать, {{$user = auth()->user()->name}}</div>
<div class="line3">

    @endisset
    <div>
        <ul class="">
            <li><a class="text_menu2" href="{{route('parts')}}">Склад</a></li>
            <li><a class="text_menu2" href="{{route('addTheme')}}">Добавить документ</a></li>
            @isset($user)
            @if(\Illuminate\Support\Facades\Auth::user()->role->name == 'Admin')
            <li><a class="text_menu2" href="{{route('new_public')}}">Архив</a></li>
            @endif
            @endisset
            <li><a class="text_menu2" href="{{route('show_detail')}}">Комбайн</a></li>

        </ul>
    </div>

</div>

<div class="container">
    <div class="title_column">
        <div class="title_number">Номер</div>
        <div class="title_name">Название темы</div>
        <div class="title_view">Загрузил</div>
        <div class="title_view">Комментарии</div>
    </div>
    @isset($forums)
    @foreach($forums as $forum)
        <div class="line1">

            <div class="number_theme">{{$loop->index+1}}</div>
            <div class="name_theme" ><a class="href_theme" href="{{ route('show', ['forum' => $forum->id]) }}">{{$forum->name}}</a></div>

            <div class="view_theme">
                <span> {{$forum->author}}</span></div>
            <div class="comments_theme">{{$forum->comments->count()}}</div>
        </div>
@endforeach

{{--       <img src="storage/app/public/ITLogo.jpg" alt="then" width="653" height="205">--}}

@endisset


</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
