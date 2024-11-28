<head>
    <title>Lokalizacje</title>
</head>
@include('Layout_forms.headlayout')
<section class="contentlocation">
    <h1>Lokalizacje</h1>
    <a href="{{route('locations.create')}}"> <button type="submit" class="addlocation">Dodaj lokalizacje</button></a>
    <section class="bg-gray-300 location">
        <table class="">
            <tr>
                <th>Miasto</th>
                <th>Edytor</th>
            </tr>
            @foreach($location as $info)
                <div class="gap">
                    <tr>
                        <td>{{$info->town}}</td>
                        <td class="colored">
                            <a href="{{ route('locations.edit', ['location' => $info])}}"><button>Edit</button></a> <br>
                            <form action="{{ route('locations.destroy', ['location' => $info]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="del">X</button>
                            </form>
                        </td>
                    </tr>
                </div>
            @endforeach
        </table>
    </section>
</section>
@include('Layout_forms.footerlayout')
