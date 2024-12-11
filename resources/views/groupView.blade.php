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
    <h1 class="">Uczniowie z grupy {{$group->name}}</h1>
    <div class="helpo">

        <div class="searchinput">

        </div>

        <div class="buttsearch">

        </div>


        <div class="addimail">
            <form action="{{route('showGroups')}}" method="get" id="groupName">
                <a><button type="submit" class="addstudent"><i class="fa-solid fa-plus"></i></button></a>
                <input hidden name="groupName" value="{{$group->name}}">
                <input hidden name="id" value="{{$group->id}}">
            </form>
            <form action="{{route('messageStudent.index')}}" method="get" id="send">
                <button type="submit" class="smsbutton"><i class="fa-solid fa-envelope"></i></button>
            </form>
        </div>
    </div>
    <section class="bg-gray-300 student">
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
                    <th>Lokalizacaja</th>
                    <th>Edytor</th>
                </tr>

                    @foreach($student as $info)
                        <div class="gap">

                                <tr>
                                    <td><input type="checkbox" class="checkboxes" name="check[]" form="send" id="" value="{{$info->id}}"></td>
                                    <td class="colored">{{$info->name}}</td>
                                    <td>{{$info->surname}}</td>
                                    <td class="colored">{{$info->birth_year}}</td>
                                    <td>{{$info->parent_name}}</td>
                                    <td class="colored">{{$info->parent_surname}}</td>
                                    <td>{{$info->parent_phone_number}}</td>
                                    <td class="colored">{{$info->parent_email}}</td>
                                    <td>
                                        {{$info->group ? $info->group->name:'Brak grupy'}}
                                    </td>
                                    <td class="colored">{{$info->group->location->town ??'Brak lokalizacji'}}</td>
                                   <td>
                                        <a href="{{ route('groupView.edit', ['student' => $info])}}"><button type="button" class="edit"><i class="fa-solid fa-pencil fa-sm"></i></button></a> <br>
                                        <form action="{{ route('groupView.destroy', ['student' => $info]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <input hidden name="group" value="{{$info->group_id}}">
                                            <button type="submit" class="del"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                        </div>
                    @endforeach

            </table>
    </section>
</section>

@include('Layout_forms.footerlayout')
