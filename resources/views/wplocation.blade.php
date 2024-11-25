@include('Layout_forms.headlayout')
<section class="contentlocation">
    <h1>Lokalizacje</h1>
    <a href="{{route('Location.create')}}"> <button type="submit" class="addlocation">Dodaj lokalizacje</button></a>
    <section class="location">
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
                            <a href="{{ route('Location.edit', ['Location' => $info])}}"><button>Edit</button></a> <br>
                            <form action="{{ route('Location.destroy', ['Location' => $info]) }}" method="post">
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
