<head>
    <title>Edytuj ucznia</title>
</head>
@include('Layout_forms.headlayout')

<section class="contentstudentedit">
    <h1>Edytuj ucznia</h1>
    <section class="bg-gray-300 studentsectionedit">
        <form action="{{route('students.update', ['student'=>$student])}}" method="POST" id="StudentForm">
            @csrf
            @method('put')
            <table class="">
                <tr>
                    <td>Imie:</td>
                    <td><input type="text" name="name" id="name" value="{{$student['name']}}"></td>
                </tr>
                <tr>
                    <td>Nazwisko:</td>
                    <td><input type="text" name="surname" id="surname" value="{{$student['surname']}}"></td>
                </tr>
                <tr>
                    <td>Rok urodzenia:</td>
                    <td><input type="text" name="birth_year" id="birth_year" value="{{$student['birth_year']}}"></td>
                </tr>
                <tr>
                    <td>Imie rodzica:</td>
                    <td><input type="text" name="parent_name" id="" value="{{$student['parent_name']}}"></td>
                </tr>
                <tr>
                    <td>Nazwisko rodzica:</td>
                    <td><input type="text" name="parent_surname" id="" value="{{$student['parent_surname']}}"></td>
                </tr>
                <tr>
                    <td>Numer telefonu rodzica:</td>
                    <td><input type="text" name="parent_phone_number" id="" value="{{$student['parent_phone_number']}}"></td>
                </tr>
                <tr>
                    <td>E-mail rodzica:</td>
                    <td><input type="email" name="parent_email" id="" value="{{$student['parent_email']}}"></td>
                </tr>
                <tr>
                    <td>Grupa</td>
                    <td> <select form="StudentForm" name="group_id">
                            @foreach($group as $name)
                                <option value="{{$name['id']}}">{{$name['name']}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
            </table>
            <button type="submit" class="studentedit">Edytuj Ucznia</button>
        </form>
    </section>
</section>
@include('Layout_forms.footerlayout')
