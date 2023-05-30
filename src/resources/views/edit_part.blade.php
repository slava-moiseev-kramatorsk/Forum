<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link rel="stylesheet" href={{ asset("css/detail.css") }}>
<title>Update</title>
<meta charset="UTF-8">
<head>

    <div
        style="  display: flex;
        justify-content: center;
        padding: 20px;
        width: 100%;
        height: 90px;
        background-color: deepskyblue;">
         <p style="
         color: white;
        font-size: 30px;
        font-weight: 600;
        font-family: BwModelicaCyrillicDEMO-Regular, serif;" >Внесите изменения</p>
    </div>
    <meta charset="UTF-8">

{{--    <link rel="stylesheet" href={{ asset("css/style_registration.css") }}>--}}
</head>
<body style="background-color: white">
<div class="form_reg">
{{--    <div><p>Внесите изменения</p></div>--}}
</div>
{{--<div>--}}
{{--    <form class="form_style" name="feedback" method="POST" action="{{ route('update_detail', ['detail'=> $detail->id]) }}">--}}
{{--        @csrf--}}
{{--        @method('PUT')--}}
{{--        <div><label class="title_ger">Название темы </label></div>--}}
{{--        <input type="text" name="title" value="{{$detail->title}}">--}}
{{--        <div><label class="title_ger">Содержание</label></div>--}}
{{--        <textarea type="text" name="state">{{$detail->state}}</textarea>--}}
{{--        <div><label class="title_ger"><input type="submit" name="pub" value="Отправить"></label></div>--}}
{{--    </form>--}}


    <div class="form" style="margin-top: 200px">
        <form method="POST" action="{{route('update_part', ['part' => $part->id])}}" class="create-form" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="draft" placeholder="Чертеж" value="{{$part->draft}}" name="draft">
                <label for="floatingInput">Чертеж</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="name" placeholder="Название"  value="{{$part->name}}"name="name">
                <label for="floatingInput">Название</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="provider" placeholder="Поставщик" value="{{$part->provider}}" name="provider">
                <label for="floatingInput">Поставщик</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="value" placeholder="Количество" value="{{$part->value}}" name="value">
                <label for="floatingInput">Количество</label>
            </div>

            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-outline-success" style="margin-top: 5px; width: 100%">Изменить</button>
        </form>
    </div>
</div>



</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
