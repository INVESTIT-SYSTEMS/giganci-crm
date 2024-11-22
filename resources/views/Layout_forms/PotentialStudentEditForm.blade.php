{{--@section()--}}
    <form action="{{route('addingPotential.update', ['addingPotential'=>$user])}}" method="post" id="potential">
        @csrf
        @method('put')
        <input type="text" name="name" id="" value="{{$user['name']}}">
        <input type="text" name="surname" id="" value="{{$user['surname']}}">
        <input type="number" name="birth_year" id="" value="{{$user['birth_year']}}">
        <select name="status" form="potential" value="{{$user['status']}}">
            <option value="jeden">opcja pierwsza</option>
            <option value="dwa">opcja druga</option>
            <option value="trzy">opcja trzecia</option>
            <option value="cztery">opcja czwarta</option>
        </select>
        <textarea form="potential" name="comment">{{$user['comment']}}</textarea>
        <input type="text" name="parent_name" id="" value="{{$user['parent_name']}}">
        <input type="text" name="parent_surname" id="" value="{{$user['parent_surname']}}">
        <input type="text" name="parent_phone_number" id="" value="{{$user['parent_phone_number']}}">
        <input type="email" name="parent_email" id="" value="{{$user['parent_email']}}">
        <button type="submit">Edytuj Użytkownika</button>
    </form>

{{--@endsection--}}
