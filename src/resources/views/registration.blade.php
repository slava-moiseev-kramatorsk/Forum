<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" href={{ asset("css/style_registration.css") }}>
</head>
<body>
<div class="form_reg">
    <div><p class="title_ger">Зарегестрируйтесь</p></div>
</div>
<div>
    <form class="form_style" name="feedback" method="get" action="{{route('new_user')}}" enctype="multipart/form-data">
        <div><label class="title_ger">Имя </label></div>
        <input type="text" name="user_name">
        <div><label class="title_ger">Пароль</label></div>
        <input type="password" name="password">
{{--        <div><label class="title_ger">Повторите пароль</label></div> <input type="password" name="password_confirm">--}}
        <div><label class="title_ger">Электронная почта</label></div><input type="email" name="email">


        <div><label class="title_ger"><input type="submit" name="pub" value="Отправить"></label></div>
    </form>
</div>
</body>
</html>
