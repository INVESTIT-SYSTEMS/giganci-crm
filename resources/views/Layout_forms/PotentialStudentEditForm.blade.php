<head>
    <title>Edytuj potencjalnego ucznia</title>
</head>
@include('Layout_forms.headlayout')

<section class="contentpotentialedit">
    <h1>Edytuj potencjalnego ucznia</h1>
    <section class="potentialuseredit">
        <form action="{{route('PotentialStudent.update', ['addPStudent'=>$user])}}" method="post" id="potential">
            @csrf
            @method('put')
        <table class="">
            <tr>
                <td>Imie:</td>
                <td><input type="text" name="name" id="" value="{{$user['name']}}" placeholder="Podaj imie"></td>
            </tr>
            <tr>
                <td>Nazwisko:</td>
                <td><input type="text" name="surname" id="" value="{{$user['surname']}}" placeholder="Podaj nazwisko"></td>
            </tr>
            <tr>
                <td>Rok urodzenia:</td>
                <td><input type="number" name="birth_year" id="" value="{{$user['birth_year']}}" placeholder="Podaj rok urodzin"></td>
            </tr>
            <tr>
                <td>Status:</td>
                <td>
                    <select name="status" form="potential" value="{{$user['status']}}">
                        <option value="jeden">opcja pierwsza</option>
                        <option value="dwa">opcja druga</option>
                        <option value="trzy">opcja trzecia</option>
                        <option value="cztery">opcja czwarta</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Komentarz:</td>
                <td><textarea form="potential" name="comment">{{$user['comment']}}</textarea></td>
            </tr>
            <tr>
                <td>Imie rodzica:</td>
                <td><input type="text" name="parent_name" id="" value="{{$user['parent_name']}}" placeholder="Podaj imie rodzica"></td>
            </tr>
            <tr>
                <td>Nazwisko rodzica:</td>
                <td><input type="text" name="parent_surname" id="" value="{{$user['parent_surname']}}" placeholder="Podaj nazwisko rodzica"></td>
            </tr>
            <tr>
                <td>Numer telefonu rodzica:</td>
                <td><input type="text" name="parent_phone_number" id="" value="{{$user['parent_phone_number']}}" placeholder="Podaj numer telefonu rodzica"></td>
            </tr>
            <tr>
                <td>E-mail rodzica:</td>
                <td><input type="email" name="parent_email" id="" value="{{$user['parent_email']}}" placeholder="Podaj e-mail rodzica"></td>
            </tr>
        </table>
            <button type="submit" class="editpotential">Edytuj Użytkownika</button>
        </form>
    </section>
</section>
@include('Layout_forms.footerlayout')

{{--@section()--}}
{{--    <form action="{{route('addPStudent.update', ['addPStudent'=>$user])}}" method="post" id="potential">--}}
{{--        @csrf--}}
{{--        @method('put')--}}
{{--        <input type="text" name="name" id="" value="{{$user['name']}}">--}}
{{--        <input type="text" name="surname" id="" value="{{$user['surname']}}">--}}
{{--        <input type="number" name="birth_year" id="" value="{{$user['birth_year']}}">--}}
{{--        <select name="status" form="potential" value="{{$user['status']}}">--}}
{{--            <option value="jeden">opcja pierwsza</option>--}}
{{--            <option value="dwa">opcja druga</option>--}}
{{--            <option value="trzy">opcja trzecia</option>--}}
{{--            <option value="cztery">opcja czwarta</option>--}}
{{--        </select>--}}
{{--        <textarea form="potential" name="comment">{{$user['comment']}}</textarea>--}}
{{--        <input type="text" name="parent_name" id="" value="{{$user['parent_name']}}">--}}
{{--        <input type="text" name="parent_surname" id="" value="{{$user['parent_surname']}}">--}}
{{--        <input type="text" name="parent_phone_number" id="" value="{{$user['parent_phone_number']}}">--}}
{{--        <input type="email" name="parent_email" id="" value="{{$user['parent_email']}}">--}}
{{--        <button type="submit">Edytuj Użytkownika</button>--}}


{{--@endsection--}}
