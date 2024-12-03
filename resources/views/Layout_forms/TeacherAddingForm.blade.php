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
                    <td><input type="text" name="name" id="name" placeholder="Podaj imie" value="{{old('name')}}">
                        <br>
                        <span>@error('name'){{$message}}@enderror</span>
                    </td>
                </tr>
                <tr>
                    <td>Nazwisko:</td>
                    <td><input type="text" name="surname" id="surname" placeholder="Podaj nazwisko" value="{{old('surname')}}">
                        <br>
                        <span>@error('surname'){{$message}}@enderror</span>
                    </td>
                </tr>
                <tr>
                    <td>Numer telefonu:</td>
                    <td><input type="text" name="phone_number" id="phone_number" placeholder="Podaj numer telefonu" value="{{old('phone_number')}}">
                        <br>
                        <span>@error('phone_number'){{$message}}@enderror</span>
                    </td>
                </tr>
                <tr>
                    <td>E-mail:</td>
                    <td><input type="text" name="email" id="email" placeholder="Podaj e-mail" value="{{old('email')}}">
                        <br>
                        <span>@error('email'){{$message}}@enderror</span>
                    </td>
                </tr>
            </table>
            <button type="submit" class="teacheradd">Dodaj Nauczyciela</button>
        </form>
    </section>
</section>
@include('Layout_forms.footerlayout')
