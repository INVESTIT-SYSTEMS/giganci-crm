{{--@section()--}}
    <form action="{{ route('Location.update', ['location'=>$location])}}" method="post">
        @csrf
        @method('put')
        <input type="text" name="town" id="">
        <button type="submit">Edytuj Lokalizację</button>
    </form>

{{--@endsection--}}
