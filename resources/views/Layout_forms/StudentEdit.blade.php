<form action="{{route('students.update', ['student'=>$student])}}" method="POST" id="StudentForm">
    @csrf
    @method('put')
    <input type="text" name="name" id="name" value="{{$student['name']}}"> <br>
    <input type="text" name="surname" id="surname" value="{{$student['surname']}}"> <br>
    <input type="text" name="birth_year" id="birth_year" value="{{$student['birth_year']}}"> <br>
    <input type="text" name="parent_name" id="" value="{{$student['parent_name']}}"> <br>
    <input type="text" name="parent_surname" id="" value="{{$student['parent_surname']}}"> <br>
    <input type="text" name="parent_phone_number" id="" value="{{$student['parent_phone_number']}}"> <br>
    <input type="email" name="parent_email" id="" value="{{$student['parent_email']}}"> <br>
    <select form="StudentForm" name="group_id">
        @foreach($group as $name)
            <option value="{{$name['id']}}">{{$name['name']}}</option>
        @endforeach
    </select>
    <button type="submit">Edytuj</button>
</form>
