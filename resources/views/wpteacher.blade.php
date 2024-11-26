<head>
    <title>Nauczyciele</title>
</head>

@include('Layout_forms.headlayout')
<section class="contentteacher">
    <h1>Nauczyciele</h1>
    <a href="{{route('teachers.create')}}"> <button type="submit" class="addteacher">Dodaj nauczyciela</button></a>
    <section class="teacher">
        <table class="">
            <tr>
                <th>Imie</th>
                <th>Nazwisko</th>
                <th>Numer telefonu</th>
                <th>E-mail</th>
                <th>Edytor</th>
            </tr>
            @foreach($teacher as $info)
                <div class="gap">
                    <tr>
                        <td class="colored">{{$info->name}}</td>
                        <td>{{$info->surname}}</td>
                        <td class="colored">{{$info->phone_number}}</td>
                        <td>{{$info->email}}</td>
                        <td class="colored">
                            <a href="{{ route('teachers.edit', ['teacher' => $info])}}"><button>Edit</button></a> <br>
                            <form action="{{ route('teachers.destroy', ['teacher' => $info]) }}" method="post">
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
