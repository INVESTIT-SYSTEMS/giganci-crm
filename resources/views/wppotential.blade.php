<head>
    <title>Potencjalni uczniowie</title>
</head>
@include('Layout_forms.headlayout')

<section class="contentpotential">
    <h1>Potencjalni uczniowie</h1>
    <a href="{{route('potentialStudents.create')}}"> <button type="submit" class="addpotential">Dodaj potencjalnego ucznia</button></a>
    <section class="potentialuser">
        <table class="">
            <tr>
                <th>Zaznacz <br> <input type="checkbox" name="" id=""></th>
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
                <th>Edytor</th>
                <th>Przenieś</th>
            </tr>
            @foreach($user as $info)
                <div class="gap">
            <tr>
                <td><input type="checkbox" name="" id=""></td>
                <td class="colored">{{$info->name}}</td>
                <td>{{$info->surname}}</td>
                <td class="colored">{{$info->birth_year}}</td>
                <td>{{$info->status}}</td>
                <td class="colored">{{$info->comment}}</td>
                <td>{{$info->parent_name}}</td>
                <td class="colored">{{$info->parent_surname}}</td>
                <td>{{$info->parent_phone_number}}</td>
                <td class="colored">{{$info->parent_email}}</td>
                <td>{{$info->updated_at}}</td>
                <td class="colored">
                    <a href="{{ route('potentialStudents.edit', ['potentialStudent' => $info])}}"><button>Edit</button></a> <br>
                    <form action="{{ route('potentialStudents.destroy', ['potentialStudent' => $info]) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="del">X</button>
                    </form>
                </td>
                <td><button>Przenieś</button></td>
            </tr>
                </div>
            @endforeach
        </table>
    </section>
</section>
@include('Layout_forms.footerlayout')





