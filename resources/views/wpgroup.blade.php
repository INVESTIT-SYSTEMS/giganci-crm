<head>
    <title>Grupy</title>
</head>
@include('Layout_forms.headlayout')
<section class="contentgroup">
    <h1>Grupy</h1>
    <a href="{{route('groups.create')}}"> <button type="submit" class="addgroup">Dodaj grupe</button></a>
    <form method="get" action="{{route ('groups.index')}}">
        <input type="text" name="search" placeholder="Wpisz wyszukiwaną wartość">
        <select name="Location">
            <option value="">Lokalizacja</option>
            @foreach($location as $locations)
                <option value="{{$locations->id}}">{{$locations->town}}</option>
            @endforeach
        </select>
        <select name="Teacher">
            <option value="">Nauczyciel</option>
            @foreach($teacher as $teachers)
                <option value="{{$teachers->id}}">{{$teachers->name}} {{$teachers->surname}}</option>
            @endforeach
        </select>
        <button>Szukaj</button>
        <a href="{{route('groups.index')}}"> <button>Reset</button> </a>
    </form>
    <section class=" bg-gray-300 group">
        <table class="">
            <tr>
                <th><input type="checkbox" name="" id=""></th>
                <th>Nazwa</th>
                <th>Dzień</th>
                <th>Godzina</th>
                <th>Nauczyciel</th>
                <th>Lokalizacja</th>
                <th>Edytor</th>
                <th>Podgląd grupy</th>
            </tr>
            @foreach($group as $info)
                <div class="gap">
                    <tr>
                        <td><input type="checkbox" name="" id=""></td>
                        <td class="colored">{{$info->name}}</td>
                        <td>{{$info->classes_day}}</td>
                        <td class="colored">{{$info->classes_hour}}</td>
                        <td>{{$info->teacher ? $info->teacher->name:'brak' }} {{$info->teacher ? $info->teacher->surname:'nauczyciela'}}</td>
                        <td class="colored">{{$info->location ? $info->location->town:'brak lokalizacji'  }}</td>
                        <td>
                            <a href="{{ route('groups.edit', ['group' => $info])}}"><button>Edit</button></a> <br>
                            <form action="{{ route('groups.destroy', ['group' => $info['id']]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="del">X</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{route('groups.show', ['group'=>$info])}}" method="get">
                                <button type="submit">Podgląd grupy</button>
                            </form>
                        </td>
                    </tr>
                </div>
            @endforeach
        </table>
    </section>
</section>
@include('Layout_forms.footerlayout')
