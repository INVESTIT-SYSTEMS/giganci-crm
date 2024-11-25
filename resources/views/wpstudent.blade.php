@include('Layout_forms.headlayout')
<section class="contentstudent">
    <h1>Uczniowie</h1>
    <a href="{{route('addPStudent.index')}}"> <button type="submit" class="addstudent">Dodaj ucznia</button></a>
    <section class="student">
        <table class="">
            <tr>
                <th>Id</th>
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
            @foreach($user as $info)
                <div class="gap">
                    <tr>
                        <td>{{$info->id}}</td>
                        <td class="colored">{{$info->name}}</td>
                        <td>{{$info->surname}}</td>
                        <td class="colored">{{$info->birth_year}}</td>
                        <td>{{$info->parent_name}}</td>
                        <td class="colored">{{$info->parent_surname}}</td>
                        <td>{{$info->parent_phone_number}}</td>
                        <td class="colored">{{$info->parent_email}}</td>
                        <td>{{$info->group_id}}</td>
                        <td class="colored">
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
@include('Layout_forms.footerlayout')
