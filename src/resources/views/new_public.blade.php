<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forum</title>

    <link rel="stylesheet" href={{ asset("css/style.css") }}>


</head>
{{--@extends('layouts.app')--}}

<body>
<div class="hello_admin">Администратор {{$user = auth()->user()->name}}</div>
<div><a class="on_main"href="{{route('index')}}">На главную</a></div>

<div class="container">
    <div class="title_column">
        <div class="title_number">Номер</div>
        <div class="title_name">Название</div>
        <div class="title_view">Загрузил</div>
        <div class="title_view">Комментарии</div>
    </div>
    @isset($forums)
        @foreach($forums as $forum)
            <div class="line1">

                <div class="number_theme">{{$loop->index + 1}}</div>
                <div class="name_theme" ><a class="href_theme" href="{{ route('pre_show', ['forum' => $forum->id]) }}">{{$forum->name}}</a></div>

                <div class="view_theme">
                    <span> {{$forum->author}}</span></div>
                <div class="comments_theme">{{$forum->comments->count()}}</div>
            </div>

@endforeach
@endisset

</body>
</html>

