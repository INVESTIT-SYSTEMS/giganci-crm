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

    <section class="bg-gray-300 contentmain">
        <div class="maindiv">
            <p><b>Uczniowie</b></p>
        </div>

        <div class="maindiv">
            <p><b>Nauczyciele</b></p>
        </div>

        <div class="maindiv">
            <P><b>Potencjalni uczniowie</b></P>
        </div>

        <div class="maindiv">
            <P><b>Grupy</b></P>
        </div>

        <div class="maindiv">
            <P><b>Lokalizacja</b></P>
        </div>
    </section>
</main>
@include('Layout_forms.footerlayout')

</body>
</html>
