{{--@section()--}}
    <form action="{{route('addPStudent.store')}}" method="post" id="potential">
        @csrf

        <input type="text" name="name" id="">
        <input type="text" name="surname" id="">
        <input type="number" name="birth_year" id="">
        <select name="status" form="potential">
            <option value="jeden">opcja pierwsza</option>
            <option value="dwa">opcja druga</option>
            <option value="trzy">opcja trzecia</option>
            <option value="cztery">opcja czwarta</option>
        </select>
        <textarea form="potential" name="comment"></textarea>
        <input type="text" name="parent_name" id="">
        <input type="text" name="parent_surname" id="">
        <input type="text" name="parent_phone_number" id="">
        <input type="email" name="parent_email" id="">
        <button type="submit">Dodaj Użytkownika</button>
    </form>

{{--@endsection--}}
