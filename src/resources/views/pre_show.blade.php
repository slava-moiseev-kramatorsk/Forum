<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href={{ asset("css/style_show.css") }}>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<h2 class="title">{{$forum->name}}</h2>
<div class="picture">
    <img src="{{ asset("storage/$forum->image") }}" width="auto" height="600">
</div>
<div class="content">{{$forum->content}}</div>
<div>Загрузил: {{$forum->author}}</div>


<div class="buttons">

    <form method="POST" action="{{ route("public_theme", ['forum' => $forum->id]) }}" class="create-form" enctype="multipart/form-data">
        @csrf
        @method('GET')
        <button type="submit" class="btn btn-outline-primary" style="margin-top: 5px; width: 100%">
            Отправить в архив
        </button>
    </form>

    <form method="POST" action="{{ route("edit", ['forum' => $forum->id]) }}" class="create-form" enctype="multipart/form-data">
        @csrf
        @method('GET')
    <button type="submit" class="btn btn-outline-success" style="margin-top: 5px; width: 100%">
        Изменить
    </button>
    </form>

    @if(\Illuminate\Support\Facades\Auth::user()->role->name == 'Admin')
        <form class="form_delete" action="{{ route('destroy', ['forum' => $forum->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger">Удалить</button>
        </form>
    @endif
</div>

@foreach($forum->comments as $comment)
    <div class="comments">Комментарий от {{$comment->name}} </div>
    <div class="comment">{{$comment->comment}}</div>
@endforeach
</body>
</html>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
