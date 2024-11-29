<head>
    <title>Uczniowie</title>
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
<section class="contentstudent">
    <h1 class="">Uczniowie</h1>
    <div class="contener">
        <div class="looking">
            <form method="get" action="{{route ('students.index')}}" id="search">
            <input type="text" name="search" placeholder="Wpisz wyszukiwaną wartość">
            <select name="NameGroup">
                <option value="">Nazwa Grupy</option>
                @foreach($group as $GroupName)
                    <option value="{{$GroupName->id}}">{{$GroupName->name}}</option>
                @endforeach
            </select>
            <button>Szukaj</button>
            <a href="{{route('students.index')}}"> <button>Reset</button> </a>
            </form>
        </div>

        <div class="add">

            <a href="{{route('students.create')}}"> <button type="submit" class="addstudent">Dodaj ucznia</button></a>
            <a href={{route('corespodation.index')}}> <button class="smsbutton">Korespondencja</button> </a>
        </div>
    </div>


    <section class="bg-gray-300 student">


        <form action="">
            <table class="">
                <tr>
                    <th><input type="checkbox" name="" id="" onclick="checkAll(this)"></th>
                    <th>Imie</th>
                    <th>Nazwisko</th>
                    <th>Rok urodzenia</th>
                    <th>Imie rodzica</th>
                    <th>Nazwisko rodzica</th>
                    <th>Numer telefonu rodzica</th>
                    <th>E-mail rodzica</th>
                    <th>Nazwa grupy</th>
                    <th>Edytor</th>
                </tr>

                    @foreach($student as $info)
                        <div class="gap">
                            <tr>
                                <td><input type="checkbox" class="checkboxes" name="check" id="{{$info->id}}"></td>
                                <td class="colored">{{$info->name}}</td>
                                <td>{{$info->surname}}</td>
                                <td class="colored">{{$info->birth_year}}</td>
                                <td>{{$info->parent_name}}</td>
                                <td class="colored">{{$info->parent_surname}}</td>
                                <td>{{$info->parent_phone_number}}</td>
                                <td class="colored">{{$info->parent_email}}</td>
                                <td>{{$info->group ? $info->group->name:'Brak grupy'}}</td>
                               <td class="colored">
                                    <a href="{{ route('students.edit', ['student' => $info])}}"><button>Edit</button></a> <br>
                                    <form action="{{ route('students.destroy', ['student' => $info]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="del">X</button>
                                    </form>
                                </td>
                            </tr>
                        </div>
                    @endforeach
            </table>
        </form>
    </section>
</section>
@include('Layout_forms.footerlayout')
