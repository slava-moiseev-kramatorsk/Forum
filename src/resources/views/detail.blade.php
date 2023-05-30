<!DOCTYPE html>
<html lang="en">


<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link rel="stylesheet" href={{ asset("css/detail.css") }}>


<head>
    <meta charset="UTF-8">
    <div class="header">
   <ul>
       @foreach($categories as $category)
           <li >
               <a class="headerLi" href="{{route('show_category', ['category' => $category->id])}}">{{$category->name}}</a>
           </li>
       @endforeach
   </ul>
    </div>


</head>
<body>
<div class="back">
    <a class="back1" href="{{route('index')}}">Назад</a>
</div>
{{--@isset($details)--}}


<div class="form">
<form method="POST" action="{{ route('create_detail',['category' => $category->id]) }}" class="create-form" enctype="multipart/form-data">
    @csrf

    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="title" placeholder="Наименование" name="title">
        <label for="floatingInput">Наименование</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="state" placeholder="Статус" name="state">
        <label for="floatingInput">Статус</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="secured" placeholder="Наличие" name="secured">
        <label for="floatingInput">Наличие</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="order" placeholder="Необходимо" name="order">
        <label for="floatingInput">Необходимо</label>
    </div>

        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    <div >
        <label for="category">Категория</label>
        <select name="category" id="category" class="form-control" aria-label="Default select example">
            @foreach($categories as $category)
                <option
                    {{ $categories->contains($category->id) ? 'selected' : '' }}
                    value="{{ $category->id }}">{{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary" style="margin-top: 5px; width: 100%">Создать</button>
</form>
</div>
--------------------------------------------
@foreach($categories as $category)
    <div>{{$category->name}}</div>
@foreach($category->details as $detail)
    <div>
    <span>{{$detail->title}}</span>
    <span>{{$detail->state}}</span>
    </div>
@endforeach
@endforeach



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
    @foreach($details as $detail)
    <tr>
        <td>{{$loop->index+1}}</td>
        <td>{{$detail->title}}</td>
        <td>{{$detail->state}}</td>
        <td>{{$detail->secured}}</td>
        <td>{{$detail->order}}</td>
    </tr>
    @endforeach
    </tbody>
</table>

</body>



</html>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

