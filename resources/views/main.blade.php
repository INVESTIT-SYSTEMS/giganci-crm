<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Giganci Programowania</title>
    @vite('resources/css/app.css')

</head>
<body>
@include('Layout_forms.headlayout')
<main class="w-100">
    <h1>Giganci programowania CRM</h1>
    <h3>Siema Marcin</h3>

    <section class="modal-active" id="modal">
        @if(session('send'))
            <p>{{session('send')}}</p>
        @endif
        <button class="close" type="button" id="close">X</button>
    </section>

    <section class="bg-gray-300 contentmain">
        <a href="{{ route('students.index') }}"><div class="maindiv">
            <p><b>Uczniowie</b></p>
        </div></a>

        <a href="{{ route('teachers.index') }}"><div class="maindiv">
            <p><b>Nauczyciele</b></p>
        </div></a>

        <a href="{{ route('potentialStudents.index') }}"><div class="maindiv">
            <P><b>Potencjalni uczniowie</b></P>
        </div></a>

        <a href="{{route('groups.index')}}"><div class="maindiv">
            <P><b>Grupy</b></P>
        </div></a>

        <a href="{{route('locations.index')}}"><div class="maindiv">
            <P><b>Lokalizacja</b></P>
        </div></a>
    </section>
</main>
@include('Layout_forms.footerlayout')


<script>
    const buttonClose = document.getElementById("close");
    let windowClose = document.getElementById("modal");
    buttonClose.addEventListener("click", () => {
        windowClose.setAttribute("class", "modal-active");
    });
</script>
</body>
</html>



