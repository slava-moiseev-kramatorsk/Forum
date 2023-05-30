<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link rel="stylesheet" href={{ asset("css/detail.css") }}>

<head>
    <meta charset="UTF-8">
    <head>
        <div class="header1">
            <p class="motto">{{$category->name}}</p>
        </div>
{{--        <div class="header">--}}
{{--            <ul>--}}
{{--                @foreach($categories as $category)--}}
{{--                    <li >--}}
{{--                        <a class="headerLi" href="{{route('show_category', ['category' => $category->id])}}">{{$category->name}}</a>--}}
{{--                    </li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </div>--}}


    </head>
</head>
<body>

{{--@isset($details)--}}

{{--@foreach($category->details as $detail)--}}
{{--    <div>{{$detail->title}} | {{$detail->state}} | {{$detail->secured}} | {{$detail->order}}--}}
{{--        <a href="{{route('edit_detail', ['detail'=> $detail->id])}}">Изменить</a></div>--}}

{{--@endforeach--}}

<a class="lin" href="{{route('show_detail')}}" style="text-decoration: none">  Назад</a>


<div style="margin: 50px">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>№ п/п</th>
            <th>Наименование</th>
            <th>Статус</th>
            <th>Наличие</th>
            <th>Необходимо</th>
        </tr>
        </thead>
        <tbody>
        @foreach($category->details as $detail)
            <tr>
                <td style="width: 30px">{{$loop->index+1}}</td>
                <td style="font-family: BwModelicaCyrillicDEMO-Regular, serif;">{{$detail->title}}</td>
                <td class="tabl">{{$detail->state}}</td>
                <td class="tabl">{{$detail->secured}}</td>
                <td class="tabl">{{$detail->order}}</td>
                <td><a style="text-decoration: none;font-family: BwModelicaCyrillicDEMO-Regular, serif;" href="{{route('edit_detail', ['detail'=> $detail->id])}}">Изменить</a></td>
                @if(\Illuminate\Support\Facades\Auth::user()->role->name == 'Admin')
                <td> <form  action=" {{route('destroy_detail', ['detail' => $detail->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Удалить</button>
                    </form></td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
