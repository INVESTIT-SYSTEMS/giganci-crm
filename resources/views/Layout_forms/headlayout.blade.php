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

{{--            <input type="checkbox" id="menu-toggle">--}}
{{--            <label  class="menu-button-nontainer" for="menu-toggle">--}}
{{--                <div class="menu-button">X</div>--}}
{{--            </label>--}}

                <div class="hamburger" id="hamburger">
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                </div>

        <nav class="menu" id="menu">

{{--            <div class="hamburger" id="hamburger">--}}
{{--                <div class="line"></div>--}}
{{--                <div class="line"></div>--}}
{{--                <div class="line"></div>--}}
{{--            </div>--}}

            <a href="../main"><div class="n">
                <p>Strona Główna</p>
            </div></a>
            <a href="{{ route('students.index') }}"><div class="n">
                <p>Uczniowie</p>
            </div></a>
            <a href="{{ route('teachers.index') }}"><div class="n">
                <p>Nauczyciele</p>
            </div></a>
            <a href="{{ route('potentialStudents.index') }}"><div class="n">
                <p>Potencjalni uczniowie</p>
            </div></a>
            <a href="{{route('groups.index')}}"><div class="n">
                <p>Grupy</p>
            </div></a>
            <a href="{{route('locations.index')}}"><div class="n">
               <p>Lokalizacja</p>
            </div></a>
        </nav>
        </section>
    </header>

    <script>
        const hamburger = document.getElementById('hamburger');
        const menu = document.getElementById('menu');

        hamburger.addEventListener('click', () => {
            menu.classList.toggle('active');
        });
    </script>
{{--@include('navi')--}}
</body>
</html>
