@include('Layout_forms.headlayout')
<section class="contentteacher">
    <h1>Nauczyciele</h1>
    <p>Gruby m.in.</p>
    <a href="{{route('addPStudent.index')}}"> <button type="submit" class="addteacher">Dodaj nauczyciela</button></a>
    <section class="teacher">
        <table class="">
            <tr>
                <th>Id</th>
                <th>Imie</th>
                <th>Nazwisko</th>
                <th>Numer telefonu</th>
                <th>E-mail</th>
                <th>Edytor</th>
            </tr>
            @foreach($teacher as $info)
                <div class="gap">
                    <tr>
                        <td>{{$info->id}}</td>
                        <td class="colored">{{$info->name}}</td>
                        <td>{{$info->surname}}</td>
                        <td class="colored">{{$info->phone_number}}</td>
                        <td>{{$info->email}}</td>
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


@foreach($teacher as $user)
    {{$user['name']}}
    <a href="{{ route('addTeacher.edit', ['addTeacher'=>$user])  }}">Edit</a>
@endforeach
@include('Layout_forms.footerlayout')
