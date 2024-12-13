<!doctype html>
<html lang=pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="https://i.ibb.co/mF5578K/icon.jpg" type="image/x-icon">
    <script src="https://kit.fontawesome.com/04436fe658.js" crossorigin="anonymous"></script>
    <title>Giganci Programowania</title>
    @vite('resources/css/app.css')
</head>
<body>
<header class="text-center">
    <section class="logo">
        <h1>Giganci Programowania</h1>
    </section>
    <section class="navigator">
        <nav class="menu" id="menu">
        </nav>
    </section>
</header>
<section class="login">
<div class="bg-gray-300 center">
    @if(session('send'))
        <section class="modal" id="modal">
            <p>{{session('send')}}</p>
            <button class="close" type="button" id="close"><i class="fa-solid fa-xmark"></i></button>
        </section>
    @endif
    <h1>Logowanie</h1>
    <form method="post" action="{{route('login.store')}}">
        @csrf
        <div class="text_field">
            <input type="text" name="login" required>
            <span></span>
            <label>Login</label>
        </div>
        <div class="text_field">
            <input type="password" name="password" required>
            <span></span>
            <label>Hasło</label>
        </div>
        <div class="pass">Pamiętaj hasło!</div>
        <input type="submit" value="Login">
        <div class="singup_link">
        </div>
    </form>
</div>
</section>
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
