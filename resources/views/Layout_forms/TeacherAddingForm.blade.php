<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nauczyciele</title>
</head>
<body>
    <form action="{{route('TeacherController_routes.store')}}" method="POST">
        @csrf
        <input type="text" name="name" id="name"> <br>
        <input type="text" name="surname" id="surname"> <br>
        <input type="text" name="phone_number" id="phone_number"> <br>
        <input type="text" name="email" id="email"> <br>
        <button type="submit">Dodaj</button>
    </form>
{{--<h1>{{$user['name']}}</h1>--}}
</body>
</html>
