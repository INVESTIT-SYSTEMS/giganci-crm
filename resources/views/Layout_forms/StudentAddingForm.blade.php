<html>
<head>
    <title>Dodaj ucznia</title>
</head>
@include('Layout_forms.headlayout')

<section class="contentstudentadd">
    <h1>Dodaj ucznia</h1>
    <section class="bg-gray-300 studentsectionadd">
        <form action="{{route('students.store')}}" method="POST" id="StudentForm">
            @csrf
            <table class="">
                <tr>
                    <td>Imie:</td>
                    <td><input type="text" name="name" id="name" placeholder="Podaj imie">
                        <br>
                        <span>@error('name'){{$message}}@enderror</span>
                    </td>

                </tr>

                <tr>
                    <td>Nazwisko:</td>
                    <td><input type="text" name="surname" id="surname" placeholder="Podaj nazwisko">
                        <br>
                        <span>@error('surname'){{$message}}@enderror</span>
                    </td>

                </tr>
                <tr>
                    <td>Rok urodzenia:</td>
                    <td><input type="text" name="birth_year" id="birth_year" placeholder="Podaj rok urodzin">
                        <br>
                        <span>@error('birth_year'){{$message}}@enderror</span>
                    </td>
                </tr>
                <tr>
                    <td>Imie rodzica:</td>
                    <td><input type="text" name="parent_name" id="" placeholder="Podaj imie rodzica">
                        <br>
                        <span>@error('parent_name'){{$message}}@enderror</span>
                    </td>
                </tr>
                <tr>
                    <td>Nazwisko rodzica:</td>
                    <td><input type="text" name="parent_surname" id="" placeholder="Podaj nazwisko rodzica">
                        <br>
                        <span>@error('parent_surname'){{$message}}@enderror</span>
                    </td>
                </tr>
                <tr>
                    <td>Numer telefonu rodzica:</td>
                    <td><input type="text" name="parent_phone_number" id="" placeholder="Podaj numer telefonu rodzica">
                        <br>
                        <span>@error('parent_phone_number'){{$message}}@enderror</span>
                    </td>
                </tr>
                <tr>
                    <td>E-mail rodzica:</td>
                    <td><input type="email" name="parent_email" id="" placeholder="Podaj e-mail rodzica">
                        <br>
                        <span>@error('parent_email'){{$message}}@enderror</span>
                    </td>
                </tr>
                <tr>
                    <td>Grupa:</td>
                    <td><select form="StudentForm" name="group_id">
                            @foreach($group as $name)
                                <option value="{{$name['id']}}">{{$name['name']}}</option>
                            @endforeach
                        </select></td>
                </tr>
            </table>
            <button type="submit" class="studentadd">Dodaj Ucznia</button>
        </form>
    </section>
</section>
@include('Layout_forms.footerlayout')
</html>
