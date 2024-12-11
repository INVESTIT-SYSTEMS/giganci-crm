<head>
    <title>Edytuj ucznia</title>
</head>
@include('Layout_forms.headlayout')

<section class="contentstudentedit">
    <h1>Edytuj ucznia</h1>
    <section class="bg-gray-300 studentsectionedit">
        <form action="{{route('groupView.update', ['student'=>$student])}}" method="POST" id="StudentForm">
            @csrf
            @method('put')
            <table class="">
                <tr>
                    <td>Imie:</td>
                    <td><input type="text" name="name" id="name" value="{{$student->name}}">
                        <br>
                        <span>@error('name'){{$message}}@enderror</span></td>
                </tr>
                <tr>
                    <td>Nazwisko:</td>
                    <td><input type="text" name="surname" id="surname" value="{{$student->surname}}">
                        <br>
                        <span>@error('surname'){{$message}}@enderror</span></td>
                </tr>
                <tr>
                    <td>Rok urodzenia:</td>
                    <td><input type="text" name="birth_year" id="birth_year" value="{{$student->birth_year}}">
                        <br>
                        <span>@error('birth_year'){{$message}}@enderror</span></td>
                </tr>
                <tr>
                    <td>Imie rodzica:</td>
                    <td><input type="text" name="parent_name" id="" value="{{$student->parent_name}}">
                        <br>
                        <span>@error('parent_name'){{$message}}@enderror</span></td>
                </tr>
                <tr>
                    <td>Nazwisko rodzica:</td>
                    <td><input type="text" name="parent_surname" id="" value="{{$student->parent_surname}}">
                        <br>
                        <span>@error('parent_surname'){{$message}}@enderror</span></td>
                </tr>
                <tr>
                    <td>Numer telefonu rodzica:</td>
                    <td><input type="text" name="parent_phone_number" id="" value="{{$student->parent_phone_number}}">
                        <br>
                        <span>@error('parent_phone_number'){{$message}}@enderror</span></td>
                </tr>
                <tr>
                    <td>E-mail rodzica:</td>
                    <td><input type="email" name="parent_email" id="" value="{{$student->parent_email}}"></tr>
                <tr>
                    <td>Grupa</td>
                    <input hidden name="group" value="{{$student->group_id}}">
                    <td> <select form="StudentForm" name="group_id">
                            @foreach($group as $name)
                                <option @selected($student->group_id == $name->id) value="{{$name->id}}">{{$name->name}}</option>
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
