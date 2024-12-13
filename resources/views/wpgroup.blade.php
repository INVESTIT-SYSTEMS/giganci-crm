<head>
    <title>Grupy</title>
</head>
<script>
    function checkAll(source) {
        checkboxes = document.getElementsByName('check[]');
        for(var i=0, n=checkboxes.length;i<n;i++) {
            checkboxes[i].checked = source.checked;
        }
    }
</script>
@include('Layout_forms.headlayout')
<section class="contentgroup">
    <h1>Grupy</h1>

    <div class="helpo">
        <div class="searchinput">
            <form method="get" action="{{route ('groups.index')}}" id="search">
                <input type="text" name="search" placeholder="Wpisz wyszukiwaną wartość" value="{{request('search')}}">
                <select name="Location" class="select2">
                    <option value="">Lokalizacja</option>
                    @foreach($location as $locations)
                        <option value="{{$locations->id}}" @selected(request('Location') == $locations->id)>{{$locations->town}}</option>
                    @endforeach
                </select>
                <select name="Teacher" class="select2">
                    <option value="">Nauczyciel</option>
                    @foreach($teacher as $teachers)
                        <option value="{{$teachers->id}}" @selected(request('Teacher') == $teachers->id)>{{$teachers->name}} {{$teachers->surname}}</option>
                    @endforeach
                </select>
        </div>

        <div class="buttsearch">
            <label>
            <button class="look"><i class="fa-solid fa-magnifying-glass"></i></button>
            <a href="{{route('groups.index')}}"> <button class="refresh" type="button"><i class="fa-solid fa-rotate-left"></i></button> </a>
            </label>
            </form>
        </div>


        <div class="addimail">
            <form action="{{route('messageGroup.index')}}" method="get" id="send">
                <a href="{{route('groups.create')}}"><button type="button" class="addgroup"><i class="fa-solid fa-plus"></i></button></a>

                <button type="submit" class="smsbutton"><i class="fa-solid fa-envelope"></i></button>
            </form>
        </div>
    </div>

    <section class=" bg-gray-300 group">
        <table class="">
            <tr>
                <th><input type="checkbox" name="" id="" onclick="checkAll(this)"></th>
                <th>Nazwa</th>
                <th>Dzień</th>
                <th>Godzina</th>
                <th>Nauczyciel</th>
                <th>Lokalizacja</th>
                <th colspan="2"></th>
            </tr>
            @foreach($group as $info)
                @if($info->id!=1)
                <div class="gap">
                    <tr>
                        <td><input type="checkbox" class="checkboxes" name="check[]" form="send" id="" value="{{$info->id}}"></td>
                        <td class="colored">{{$info->name}}</td>
                        <td>{{$info->classes_day}}</td>
                        <td class="colored">{{$info->classes_hour}}</td>
                        <td>{{$info->teacher ? $info->teacher->name:'brak' }} {{$info->teacher ? $info->teacher->surname:'nauczyciela'}}</td>
                        <td class="colored">{{$info->location ? $info->location->town:'brak lokalizacji'  }}</td>
                        <td>
                            <a href="{{ route('groups.edit', ['group' => $info])}}"><button class="edit"><i class="fa-solid fa-pencil fa-sm"></i></button></a> <br>
                            <form action="{{ route('groups.destroy', ['group' => $info['id']]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button onclick="return confirm('Jesteś pewny usunięcia grupy?\nNie będzie można przywrócić tych zmian')" type="submit" class="del"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                        <td class="colored">
                            <form action="{{route('groups.show', ['group'=>$info])}}" method="get">
                                <button type="submit">Podgląd</button>
                            </form>
                        </td>
                    </tr>
                </div>
                @endif
            @endforeach
        </table>
    </section>
</section>
@include('Layout_forms.footerlayout')
