<form action="{{route('teachers.update', ['teacher'=>$teachers])}}" method="POST" id="teacherForm">
    @csrf
    @method('put')
    <input type="text" name="name" id="name" value="{{$teachers['name']}}"> <br>
    <input type="text" name="surname" id="surname" value="{{$teachers['surname']}}"> <br>
    <input type="text" name="phone_number" id="phone_number" value="{{$teachers['phone_number']}}"> <br>
    <input type="text" name="email" id="email" value="{{$teachers['email']}}"> <br>

    <button type="submit">Edytuj</button>
</form>
