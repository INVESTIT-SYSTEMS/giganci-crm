<form action="{{route('addTeacher.update', ['addTeacher'=>$teacher])}}" method="POST">
    @csrf
    @method('put')
    <input type="text" name="name" id="name" value="{{$teacher['name']}}"> <br>
    <input type="text" name="surname" id="surname" value="{{$teacher['surname']}}"> <br>
    <input type="text" name="phone_number" id="phone_number" value="{{$teacher['phone_number']}}"> <br>
    <input type="text" name="email" id="email" value="{{$teacher['email']}}"> <br>
    <button type="submit">Dodaj</button>
</form>
