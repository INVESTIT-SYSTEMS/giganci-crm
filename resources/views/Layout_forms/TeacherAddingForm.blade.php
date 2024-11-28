<head>
    <title>Dodaj nauczyciela</title>
</head>
@include('Layout_forms.headlayout')

<section class="contentteacheradd">
    <h1>Dodaj nauczyciela</h1>
    <section class="bg-gray-300 teachercontentadd">
        <form action="{{route('teachers.store')}}" method="POST">
            @csrf
            <table class="">
                <tr>
                    <td>Imie:</td>
                    <td><input type="text" name="name" id="name" placeholder="Podaj imie"></td>
                </tr>
                <tr>
                    <td>Nazwisko:</td>
                    <td><input type="text" name="surname" id="surname" placeholder="Podaj nazwisko"></td>
                </tr>
                <tr>
                    <td>Numer telefonu:</td>
                    <td><input type="text" name="phone_number" id="phone_number" placeholder="Podaj numer telefonu"></td>
                </tr>
                <tr>
                    <td>E-mail:</td>
                    <td><input type="text" name="email" id="email" placeholder="Podaj e-mail"></td>
                </tr>
            </table>
            <button type="submit" class="teacheradd">Dodaj Nauczyciela</button>
        </form>
    </section>
</section>
@include('Layout_forms.footerlayout')
