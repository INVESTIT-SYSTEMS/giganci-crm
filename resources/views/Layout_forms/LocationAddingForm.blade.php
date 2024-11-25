{{--@section()--}}
    <form action="{{route('location.store')}}" method="post">
        @csrf
        @method('post')
        <input type="text" name="town" id="">
        <button type="submit">Dodaj Lokalizację</button>
    </form>

{{--@endsection--}}
