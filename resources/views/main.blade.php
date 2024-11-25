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
    <h3>Kursy programowania dla dzieci i młodzieży</h3>

    <section class="bg-gray-100 contentmain">
        <div class="maindiv">
            <p>Łączymy Studentów i Nauczycieli</p>
        </div>

        <div class="maindiv">
            <p>Laravel</p>
        </div>

        <div class="maindiv">
            <P>Pomagamy w nauce</P>
        </div>
    </section>
</main>
@include('Layout_forms.footerlayout')

</body>
</html>
