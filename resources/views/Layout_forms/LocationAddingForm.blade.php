<head>
    <title>Dodaj lokalizacje</title>
</head>
@include('Layout_forms.headlayout')

<section class="contentlocationadd">
    <h1>Dodaj lokalizacje</h1>
    <section class=" bg-gray-300 locationsectionadd">
        <form action="{{route('locations.store')}}" method="post">
            @csrf
            @method('post')
            <table class="">
                <tr>
                    <td>Nazwa lokalizacji:</td>
                    <td><input type="text" name="town" id="" placeholder="Podaj nazwę lokalizacji">
                        <br>
                        <span>@error('town'){{$message}}@enderror</span></td></td>
                </tr>
            </table>
            <button type="submit" class="locationadd">Dodaj Lokalizację</button>
        </form>
    </section>
</section>
@include('Layout_forms.footerlayout')
