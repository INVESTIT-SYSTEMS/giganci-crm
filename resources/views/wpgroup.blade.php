@include('Layout_forms.headlayout')
<section class="contentgroup">
    <h1>Grupy</h1>
    <a href="{{route('addPStudent.index')}}"> <button type="submit" class="addgroup">Dodaj grupe</button></a>
    <section class="group">
        <table class="">
            <tr>
                <th>Id</th>
                <th>Nazwa</th>
                <th>Dzień</th>
                <th>Godzina</th>
                <th>Nauczyciel</th>
                <th>Lokalizacja</th>
                <th>Edytor</th>
            </tr>
            @foreach($group as $info)
                <div class="gap">
                    <tr>
                        <td>{{$info->id}}</td>
                        <td class="colored">{{$info->name}}</td>
                        <td>{{$info->classes_day}}</td>
                        <td class="colored">{{$info->classes_hour}}</td>
                        <td>{{$info->teacher_id}}</td>
                        <td class="colored">{{$info->location_id}}</td>
                        <td>
                            <a href="{{ route('addingPotential.edit', ['addingPotential' => $info])}}"><button>Edit</button></a> <br>
                            <form action="{{ route('addingPotential.destroy', ['addingPotential' => $info]) }}" method="post">
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

