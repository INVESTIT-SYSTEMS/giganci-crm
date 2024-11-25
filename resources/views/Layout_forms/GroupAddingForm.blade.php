{{--@section()--}}
    <form action="{{route('addGroup.store')}}" method="post" id="group">
        @csrf
        @method('post')
        <input type="text" name="name" id="">
        <select name="classes_day" form="group">
            <option value="Poniedziałek">Poniedziałek</option>
            <option value="Wtorek">Wtorek</option>
            <option value="Środa">Środa</option>
            <option value="Czwartek">Czwartek</option>
            <option value="Piątek">Piątek</option>
            <option value="Sobota">Sobota</option>
            <option value="Niedziela">Niedziela</option>

        </select>
        <input type="text" name="classes_hour" id="">
        <select name="teacher_id" form="group">
            @foreach($teachers as $teacher)
                <option value="{{ $teacher['id'] }}">{{$teacher['name']}} {{ $teacher['surname']}}</option>
            @endforeach
        </select>
        <select name="location_id" form="group">
                @foreach($locations as $location)
                    <option value="{{ $location['id'] }}">{{$location['town']}}</option>
                @endforeach
        </select>
        <button type="submit">Dodaj Grupę</button>
    </form>

{{--@endsection--}}
