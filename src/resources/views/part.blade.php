<link rel="stylesheet" href={{ asset("css/parts.css") }}>
<link rel="stylesheet" href={{ asset("css/detail.css") }}>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<div class="header_parts">
    <p class="paragraph_header">Склад</p>
</div>
<a class="back1" href="{{route('index')}}" style="text-decoration: none">  Назад</a>
<div class="form" style="margin: 30px">
    <form method="POST" action="{{route('create_part')}}" class="create-form" enctype="multipart/form-data">
        @csrf

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="draft" placeholder="Чертеж" name="draft">
            <label for="floatingInput">Чертеж</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="name" placeholder="Название" name="name">
            <label for="floatingInput">Название</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="provider" placeholder="Поставщик" name="provider">
            <label for="floatingInput">Поставщик</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="value" placeholder="Количество" name="value">
            <label for="floatingInput">Количество</label>
        </div>

        <button type="submit" class="btn btn-primary" style="margin-top: 5px; width: 100%">Создать</button>
    </form>
</div>
<div style="margin: 50px">
    <table class="table table-hover">
        <thead>
        <tr>
            <th class="table_th">№ п/п</th>
            <th class="table_th">Чертеж</th>
            <th class="table_th">Название</th>
            <th class="table_th">Поставщик</th>
            <th class="table_th">Количество</th>
        </tr>
        </thead>
        <tbody>
        @foreach($parts as $part)
            <tr>
                <td style="width: 40px; text-align: center">{{$loop->index+1}}</td>
                <td class="table_part">{{$part->draft}}</td>
                <td class="table_part">{{$part->name}}</td>
                <td class="table_part">{{$part->provider}}</td>
                <td class="table_part">{{$part->value}}</td>

                @if(\Illuminate\Support\Facades\Auth::user()->role->name == 'Admin')
                <td style="text-align: center"><a class="table_a" href="{{route('edit_part' , ['part' => $part->id])}}">Изменить</a></td>
                    <td style="text-align: center"> <form  action="{{route('destroy_part', ['part' => $part->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm">Удалить</button>
                        </form></td>
                @endif

            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
