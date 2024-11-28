<head>
    <title>Grupy</title>
</head>
@include('Layout_forms.headlayout')
<section class="contentgroup">
    <h1>Grupy</h1>
    <a href="{{route('groups.create')}}"> <button type="submit" class="addgroup">Dodaj grupe</button></a>
    <section class="group">
        <table class="">
            <tr>
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
                        <td class="colored">{{$info->name}}</td>
                        <td>{{$info->classes_day}}</td>
                        <td class="colored">{{$info->classes_hour}}</td>
                        <td>{{$info->teacher ? $info->teacher->name:'brak' }} {{$info->teacher ? $info->teacher->surname:'nauczyciela'}}</td>
                        <td class="colored">{{$info->location ? $info->location->town:'brak lokalizacji'  }}</td>
                        <td>
                            <a href="{{ route('groups.edit', ['group' => $info])}}"><button>Edit</button></a> <br>
                            <form action="{{ route('groups.destroy', ['group' => $info]) }}" method="post">
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
