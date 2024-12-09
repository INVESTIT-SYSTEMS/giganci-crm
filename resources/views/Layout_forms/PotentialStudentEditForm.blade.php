<head>
    <title>Edytuj potencjalnego ucznia</title>
</head>
@include('Layout_forms.headlayout')

<section class="contentpotentialedit">
    <h1>Edytuj potencjalnego ucznia</h1>
    <section class="bg-gray-300 potentialuseredit">
        <form action="{{route('potentialStudents.update', ['potentialStudent'=>$user])}}" method="post" id="potential">
            @csrf
            @method('put')
        <table class="">
            <tr>
                <td>Imie:</td>
                <td><input type="text" name="name" id="" value="{{$user->name}}" placeholder="Podaj imie">
                    <br>
                    <span>@error('name'){{$message}}@enderror</span>
                </td>
            </tr>
            <tr>
                <td>Nazwisko:</td>
                <td><input type="text" name="surname" id="" value="{{$user->surname}}" placeholder="Podaj nazwisko">
                    <br>
                    <span>@error('surname'){{$message}}@enderror</span>
                </td>
            </tr>
            <tr>
                <td>Rok urodzenia:</td>
                <td><input type="text" name="birth_year" id="" value="{{$user->birth_year}}" placeholder="Podaj rok urodzin">
                    <br>
                    <span>@error('birth_year'){{$message}}@enderror</span>
                </td>
            </tr>
            <tr>
                <td>Status:</td>
                <td>
                    <select name="status" form="potential">
                        <option @selected($user->status == "Zapis na zajęcia pokazowe") value="Zapis na zajęcia pokazowe">Zapis na zajęcia pokazowe</option>
                        <option @selected($user->status == "Rezygnacja") value="Rezygnacja">Rezygnacja</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Komentarz:</td>
                <td><textarea form="potential" name="comment">{{$user->comment}}</textarea></td>
            </tr>
            <tr>
                <td>Imie rodzica:</td>
                <td><input type="text" name="parent_name" id="" value="{{$user->parent_name}}" placeholder="Podaj imie rodzica">
                    <br>
                    <span>@error('parent_name'){{$message}}@enderror</span>
                </td>
            </tr>
            <tr>
                <td>Nazwisko rodzica:</td>
                <td><input type="text" name="parent_surname" id="" value="{{$user->parent_surname}}" placeholder="Podaj nazwisko rodzica">
                    <br>
                    <span>@error('parent_surname'){{$message}}@enderror</span>
                </td>
            </tr>
            <tr>
                <td>Numer telefonu rodzica:</td>
                <td><input type="text" name="parent_phone_number" id="" value="{{$user->parent_phone_number}}" placeholder="Podaj numer telefonu rodzica">
                    <br>
                    <span>@error('parent_phone_number'){{$message}}@enderror</span>
                </td>
            </tr>
            <tr>
                <td>E-mail rodzica:</td>
                <td><input type="email" name="parent_email" id="" value="{{$user->parent_email}}" placeholder="Podaj e-mail rodzica">
                    <br>
                    <span>@error('parent_email'){{$message}}@enderror</span>
                </td>
            </tr>
        </table>
            <button type="submit" class="editpotential">Edytuj Użytkownika</button>
        </form>
    </section>
</section>
@include('Layout_forms.footerlayout')
