<head>
    <title>Potencjalni uczniowie</title>
</head>
<script>
    function checkAll(source) {
        checkboxes = document.getElementsByName('check');
        for(var i=0, n=checkboxes.length;i<n;i++) {
            checkboxes[i].checked = source.checked;
        }
    }
</script>
@include('Layout_forms.headlayout')

<section class="contentpotential">
    <h1>Potencjalni uczniowie</h1>
    <div class="helpo">
        <div class="looking">
            <form action="{{route('potentialStudents.index')}}" method="get" id="search" >
                <input type="text" name="search" placeholder="Wpisz wyszukiwaną wartość" value="{{request('search')}}">
                    <select name="status" form="search">
                        <option  value="">Wszystkie</option>
                        <option @selected(request('status') == 'Zapis na zajęcia pokazowe') value="Zapis na zajęcia pokazowe">Zapis na zajęcia pokazowe</option>
                        <option @selected(request('status') == 'Rezygnacja') value="Rezygnacja">Rezygnacja</option>
                    </select>
                <button><i class="fa-solid fa-magnifying-glass"></i></button>
                <a href="{{route('potentialStudents.index')}}"> <button type="button"><i class="fa-solid fa-rotate-left"></i></button> </a>
            </form>

        </div>

        <div class="add">
            <a href="{{route('potentialStudents.create')}}"> <button type="submit" class="addpotential"><i class="fa-solid fa-plus"></i></button></a>
            <a href={{route('message.index')}}> <button class="smsbutton"><i class="fa-solid fa-envelope"></i></button> </a>
        </div>
    </div>

    <section class="bg-gray-300 potentialuser">
        <table class="tablescale">
            <tr>
                <th><input type="checkbox" name="" id="" onclick="checkAll(this)"></th>
                <th>Imie</th>
                <th>Nazwisko</th>
                <th>Rok urodzenia</th>
                <th>Status</th>
                <th>Komentarz</th>
                <th>Imie rodzica</th>
                <th>Nazwisko rodzica</th>
                <th>Numer telefonu rodzica</th>
                <th>E-mail rodzica</th>
                <th>Ostatnia edycja</th>
                <th colspan="2"></th>
            </tr>
            @foreach($user as $info)
                <div class="gap">
            <tr>
                <td><input type="checkbox" class="checkboxes" name="check" id="{{$info->id}}"></td>
                <td class="colored">{{$info->name}}</td>
                <td>{{$info->surname}}</td>
                <td class="colored">{{$info->birth_year}}</td>
                <td>{{$info->status}}</td>
                <td class="colored">{{$info->comment ?? 'brak' }}</td>
                <td>{{$info->parent_name}}</td>
                <td class="colored">{{$info->parent_surname}}</td>
                <td>{{$info->parent_phone_number}}</td>
                <td class="colored">{{$info->parent_email ?? 'brak'}}</td>
                <td>{{$info->updated_at}}</td>
                <td class="colored">
                    <a href="{{ route('potentialStudents.edit', ['potentialStudent' => $info])}}"><button class="edit"><i class="fa-solid fa-pencil fa-sm"></i></button></a> <br>
                    <form action="{{ route('potentialStudents.destroy', ['potentialStudent' => $info]) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="del"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </td>
                <td><a href="{{route('moveStudent.index', ['studentData' =>$info])}}"><button>Przenieś</button></a></td>
            </tr>
                </div>
            @endforeach
        </table>
    </section>
</section>

@include('Layout_forms.footerlayout')





