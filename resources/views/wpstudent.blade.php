<head>
    <title>Uczniowie</title>
</head>

@include('Layout_forms.headlayout')
<section class="contentstudent">
    <h1>Uczniowie</h1>
    <a href="{{route('students.create')}}"> <button type="submit" class="addstudent">Dodaj ucznia</button></a>
    <section class="student">
        <form method="get" action="{{route ('students.index')}}">
            <input type="text" name="search">
            <button>Szukaj</button>
        </form>
        <table class="">
            <tr>
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
                        <td class="colored">{{$info->name}}</td>
                        <td>{{$info->surname}}</td>
                        <td class="colored">{{$info->birth_year}}</td>
                        <td>{{$info->parent_name}}</td>
                        <td class="colored">{{$info->parent_surname}}</td>
                        <td>{{$info->parent_phone_number}}</td>
                        <td class="colored">{{$info->parent_email}}</td>
                        <td>{{$info->group->name}}</td>
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
    </section>
</section>
@include('Layout_forms.footerlayout')
