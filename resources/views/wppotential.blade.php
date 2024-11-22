<head>
    <title>Potencjalni uczniowie</title>
</head>
@include('Layout_forms.headlayout')

<section class="contentpotential">
    <h1>Potencjalni uczniowie</h1>
    <a href="{{route('addingPotential.index')}}"> <button type="submit" class="addpotential">Dodaj potencjalnego ucznia</button></a>
    <section class="potentialuser">
        <table class="">
            <tr>
                <th>Id</th>
                <th>Imie</th>
                <th>Nazwisko</th>
                <th>Rok urodzenia</th>
                <th>Status</th>
                <th>Komentarz</th>
                <th>Imie rodzica</th>
                <th>Nazwisko rodzica</th>
                <th>Numer telefonu rodzica</th>
                <th>E-mail rodzica</th>
                <th>Edytor</th>
            </tr>
            @foreach($user as $info)
            <tr>
                <td>{{$info->id}}</td>
                <td>{{$info->name}}</td>
                <td>{{$info->surname}}</td>
                <td>{{$info->birth_year}}</td>
                <td>{{$info->status}}</td>
                <td>{{$info->comment}}</td>
                <td>{{$info->parent_name}}</td>
                <td>{{$info->parent_surname}}</td>
                <td>{{$info->parent_phone_number}}</td>
                <td>{{$info->parent_email}}</td>
                <td>
                    <a href="{{ route('addingPotential.edit', ['addingPotential' => $info])}}"><button>Edit</button></a> <br>
                    <form action="{{ route('addingPotential.destroy', ['addingPotential' => $info]) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit">X</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </section>
</section>
@include('Layout_forms.footerlayout')


{{--<a href="{{route('PotentialStudent_routes.edit', ['user' => $users])}}"></a>--}}


