<head>
    <title>Edytuj lokalizacje</title>
</head>
@include('Layout_forms.headlayout')

<section class="contentlocationedit">
    <h1>Edytuj lokalizacje</h1>
    <section class="bg-gray-300 locationsectionedit">
        <form action="{{ route('locations.update', ['location'=> $locations])}}" method="post">
            @csrf
            @method('put')
            <table class="">
                <tr>
                    <td>Nazwa lokalizacji:</td>
                    <td><input type="text" name="town" id="" value="{{$locations['town']}}">
                        <br>
                        <span>@error('town'){{$message}}@enderror</span></td></td>
                </tr>
            </table>
            <button type="submit" class="locationedit">Edytuj Lokalizację</button>
        </form>
    </section>
</section>
@include('Layout_forms.footerlayout')
