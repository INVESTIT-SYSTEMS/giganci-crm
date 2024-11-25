<head>
    <title>Edytuj lokalizacje</title>
</head>
@include('Layout_forms.headlayout')

<section class="contentlocationedit">
    <h1>Edytuj lokalizacje</h1>
    <section class="locationsectionedit">
        <form action="{{ route('Location.update', ['Location'=> $Location])}}" method="post">
            @csrf
            @method('put')
            <table class="">
                <tr>
                    <td>Nazwa lokalizacji:</td>
                    <td><input type="text" name="town" id="" value="{{$Location['name']}}"></td>
                </tr>
            </table>
            <button type="submit" class="locationedit">Edytuj Lokalizację</button>
        </form>
    </section>
</section>
@include('Layout_forms.footerlayout')

{{--@section()--}}
{{--    <form action="{{ route('Location.update', ['location'=>$location])}}" method="post">--}}
{{--        @csrf--}}
{{--        @method('put')--}}
{{--        <input type="text" name="town" id="">--}}
{{--        <button type="submit">Edytuj Lokalizację</button>--}}
{{--    </form>--}}

{{--@endsection--}}
