<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Giganci Programowania</title>
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/04436fe658.js" crossorigin="anonymous"></script>
</head>
<body>
<header class="text-center">
    <section class="logo">
        <h1>Giganci Programowania</h1>
    </section>
    <section class="navigator">
        <a href="../main"><div class="">
                <p>Strona Główna</p>
            </div></a>
        <a href="{{ route('students.index') }}"><div class="">
                <p>Uczniowie</p>
            </div></a>
        <a href="{{ route('teachers.index') }}"><div class="">
                <p>Nauczyciele</p>
            </div></a>
        <a href="{{ route('potentialStudents.index') }}"><div class="">
                <p>Potencjalni uczniowie</p>
            </div></a>
        <a href="{{route('groups.index')}}"><div class="">
                <p>Grupy</p>
            </div></a>
        <a href="{{route('locations.index')}}"><div class="">
                <p>Lokalizacja</p>
            </div></a>
    </section>
</header>

{{--@include('navi')--}}
</body>
</html>
