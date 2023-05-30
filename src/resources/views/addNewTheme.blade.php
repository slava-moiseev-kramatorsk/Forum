<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href={{ asset("css/style_registration.css") }}>
</head>
<body>
<div class="container">
        <div class="form_reg">
            <div><p class="title_ger">Добавьте документ</p></div>
        </div>
        <div>
            <form class="form_style" name="feedback" method="POST" action="{{route('create_theme')}}" enctype="multipart/form-data">
                @csrf
{{--                <div><label class="title_ger">Название</label></div>--}}
{{--                <input type="text" name="name">--}}

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="title" placeholder="Наименование" name="name">
                    <label for="floatingInput">Название</label>
                </div>

{{--                <div><label class="title_ger">описание</label></div>--}}
{{--                <div><textarea type="text" name="content"></textarea></div>--}}

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="title" placeholder="Описание" name="content">
                    <label for="floatingInput">Оисание</label>
                </div>

                <div><label for="image">Добавить изображение</label></div>
                <input class="form-control" type="file" id="image" name="image">
                <input type="hidden" name="author" value="{{$user = auth()->user()->name}}">



                <button type="submit" class="btn btn-primary" style="margin-top: 5px; width: 100%">Создать</button>
            </form>
        </div>
</div>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
