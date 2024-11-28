<head>
    <title>Dodaj potencjalnego ucznia</title>
</head>
@include('Layout_forms.headlayout')

<section class="contentpotentialadd">
    <h1>Dodaj potencjalnego ucznia</h1>
    <section class="bg-gray-300 potentialuseradd">
        <form action="{{route('potentialStudents.store')}}" method="post" id="potential">
            @csrf
            <table class="">
                <tr>
                    <td>Imie:</td>
                    <td><input type="text" name="name" id="" placeholder="Podaj imie"></td>
                </tr>
                <tr>
                    <td>Nazwisko:</td>
                    <td><input type="text" name="surname" id="" placeholder="Podaj nazwisko"></td>
                </tr>
                <tr>
                    <td>Rok urodzenia:</td>
                    <td><input type="number" name="birth_year" id="" placeholder="Podaj rok urodzin"></td>
                </tr>
                <tr>
                    <td>Status:</td>
                    <td>
                        <select name="status" form="potential">
                            <option value="Zapis na zajęcia pokazowe">Zapis na zajęcia pokazowe</option>
                            <option value="Rezygnacja">Rezygnacja</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Komentarz:</td>
                    <td><textarea form="potential" name="comment"></textarea></td>
                </tr>
                <tr>
                    <td>Imie rodzica:</td>
                    <td><input type="text" name="parent_name" id="" placeholder="Podaj imie rodzica"></td>
                </tr>
                <tr>
                    <td>Nazwisko rodzica:</td>
                    <td><input type="text" name="parent_surname" id="" placeholder="Podaj nazwisko rodzica"></td>
                </tr>
                <tr>
                    <td>Numer telefonu rodzica:</td>
                    <td><input type="text" name="parent_phone_number" id="" placeholder="Podaj numer telefonu rodzica"></td>
                </tr>
                <tr>
                    <td>E-mail rodzica:</td>
                    <td><input type="email" name="parent_email" id="" placeholder="Podaj e-mail rodzica"></td>
                </tr>
            </table>
            <button type="submit" class="potentialadd">Dodaj Użytkownika</button>
        </form>
    </section>
</section>
@include('Layout_forms.footerlayout')
