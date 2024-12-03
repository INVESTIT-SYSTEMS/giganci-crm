<html>
<head>
    <title>Dodaj ucznia</title>
</head>
@include('Layout_forms.headlayout')

<section class="contentstudentadd">
    <h1>Przenieś ucznia</h1>
    <h2>Sprawdź poprawność danych</h2>
    <section class="bg-gray-300 studentsectionadd">

        <form action="{{route('students.store')}}" method="POST" id="StudentForm">
            @csrf
            <table class="">
                <tr>
                    <td>Imie:</td>
                    <td><input type="text" name="name" id="name" placeholder="Podaj imie" value="{{$studentData->name}}"></td>
                </tr>
                <tr>
                    <td>Nazwisko:</td>
                    <td><input type="text" name="surname" id="surname" placeholder="Podaj nazwisko" value="{{$studentData->surname}}"></td>
                </tr>
                <tr>
                    <td>Rok urodzenia:</td>
                    <td><input type="text" name="birth_year" id="birth_year" placeholder="Podaj rok urodzin" value="{{$studentData->birth_year}}"></td>
                </tr>
                <tr>
                    <td>Imie rodzica:</td>
                    <td><input type="text" name="parent_name" id="" placeholder="Podaj imie rodzica" value="{{$studentData->parent_name}}"></td>
                </tr>
                <tr>
                    <td>Nazwisko rodzica:</td>
                    <td><input type="text" name="parent_surname" id="" placeholder="Podaj nazwisko rodzica" value="{{$studentData->parent_surname}}"></td>
                </tr>
                <tr>
                    <td>Numer telefonu rodzica:</td>
                    <td><input type="text" name="parent_phone_number" id="" placeholder="Podaj numer telefonu rodzica" value="{{$studentData->parent_phone_number}}"></td>
                </tr>
                <tr>
                    <td>E-mail rodzica:</td>
                    <td><input type="email" name="parent_email" id="" placeholder="Podaj e-mail rodzica" value="{{$studentData->parent_email}}"></td>
                </tr>
                <tr>
                    <td>Grupa:</td>
                    <td><select form="StudentForm" name="group_id">
                            @foreach($group as $name)
                                <option value="{{$name->id}}">{{$name->name}}</option>
                            @endforeach
                        </select></td>
                </tr>
            </table>
            <button type="submit" class="studentadd">Przenieś Ucznia</button>
        </form>
    </section>
</section>
@include('Layout_forms.footerlayout')
</html>
